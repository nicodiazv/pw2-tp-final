<?php

class RevistasController {
    private $renderer;
    private $revistaModel;
    private $data;

    public function __construct($revistaModel, $renderer) {
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->revistaModel = $revistaModel;
    }

    public function index() {
        $this->revistas();
    }

    public function revistas() {
        ValidateSession::validarSesionLector();
        $this->data['revistasAdquiridas'] = $this->revistaModel->obtenerRevistasDelUsuario($this->data["usuario"]["id"]);
        $this->data['revistasNoAdquiridas'] = $this->revistaModel->obtenerRevistasNoAdquiridasDelUsuario($this->data["usuario"]["id"]);
        echo $this->renderer->render("view/lectorViews/RevistasView.php", $this->data);
    }

    public function misRevistas() {
        ValidateSession::validarSesionLector();
        $this->data['misRevistas'] = $this->revistaModel->obtenerRevistasDelUsuario($this->data["usuario"]["id"]);
        echo $this->renderer->render("view/lectorViews/misRevistasView.php", $this->data);
    }

    public function crearRevista($data = null) {
        ValidateSession::validarSesionContenidista();
        echo $this->renderer->render("view/contenidistaViews/crearRevistaView.php", $this->data);
    }

    public function guardarRevista() {
        ValidateSession::validarSesionContenidista();
        try {
            $nombreRevista = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : false;
            $precioMensual = isset($_POST["precioMensual"]) ? $_POST["precioMensual"] : false;

            ValidateParameter::validateCleanParameter($nombreRevista);
            ValidateParameter::validateCleanParameter($descripcion);
            ValidateParameter::validateCleanParameter($precioMensual);

            $this->revistaModel->validarRevistaYaExiste($nombreRevista);

            //Subir imagen de la nota
            $imagen = isset($_FILES['uploadedImage']) ? $_FILES['uploadedImage'] : false;
            $imagenNombre = UploadImage::subirFoto($imagen, ImagesDirectory::REVISTAS);

            // Guardar revista
            $idUsuario = $this->data['usuario']['id'];
            $this->data["revistaCreada"] = $this->revistaModel->guardarRevista($nombreRevista, $descripcion, $imagenNombre, $precioMensual, $idUsuario);
            $this->data["alert"] = array("class" => "success", "message" => "La revista \"$nombreRevista\" se ha creado correctamente y pasará a estado de aprobación");
            echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $this->data);

        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
            echo $this->renderer->render("view/contenidistaViews/crearRevistaView.php", $this->data);
        } catch (Exception $e) {
            $this->data["alert"] = array("class" => "danger", "message" => 'Ocurrió un error en la subida de la imágen \"$imagen\" ');
            echo $this->renderer->render("view/contenidistaViews/crearRevistaView.php", $this->data);
        }
    }

    public function verRevista() {
        ValidateSession::validarSesionContenidista();
        $id = $_GET["id"];
        $this->data['revista'] = $this->revistaModel->obtenerRevistaPorId($id);
        echo $this->renderer->render("view/contenidistaViews/verRevistaView.php", $this->data);
    }

    public function estadoRevistas() {
        ValidateSession::validarSesionContenidista();
        $this->data['revistas'] = $this->revistaModel->RevistasDelContenidista($this->data["usuario"]["id"]);
        echo $this->renderer->render("view/contenidistaViews/estadoRevistasView.php", $this->data);
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"] = $_SESSION["cantRevistasPorCatalogo"];
        }
        if (ValidateSession::esContenidista()) {
            $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
            $this->data["publicaciones"] = $_SESSION["publicaciones"];
        }
    }

}