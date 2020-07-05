<?php

class NotaController {

    private $renderer;
    private $notaModel;
    private $seccionModel;
    private $publicacionModel;
    private $data;

    private $error = array();

    public function __construct($notaModel, $seccionModel, $publicacionModel, $renderer) {
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->publicacionModel = $publicacionModel;
    }

    public function index() {
        if (ValidateSession::esContenidista()) {
            $this->data['notas'] = $this->notaModel->obtenerNotasCreadas($this->data["usuario"]["id"]);
            echo $this->renderer->render("view/contenidistaViews/verNotasView.php", $this->data);
        }
        if (ValidateSession::esLector()) {
            $this->data['notas'] = $this->notaModel->obtenerNotasAprobadas();
            echo $this->renderer->render("view/lectorViews/verNotasView.php", $this->data);
        }
    }

    public function crearNota() {
        ValidateSession::validarSesionContenidista();
        $this->data['secciones'] = $this->seccionModel->obtenerSecciones();
        $this->data['flashMessage'] = $this->error;

        echo $this->renderer->render("view/contenidistaViews/crearNotaView.php", $this->data);
        return;
    }

    public function guardarNota() {
        ValidateSession::validarSesionContenidista();
        $usuario_id = $_SESSION["usuario"]["id"];
        try {

            $titulo = ValidateParameter::validateCleanParameter($_POST["titulo"]);
            $ubicacion = ValidateParameter::validateCleanParameter($_POST["ubicacion"]);
            $place_id = $_POST["place_id"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];
            $enlace = ValidateParameter::validateCleanParameter($_POST["enlace"]);
            $seccion_id = ValidateParameter::validateCleanParameter($_POST["seccion"]);
            $cuerpo = ValidateParameter::validateCleanParameter($_POST["cuerpo"]);
            $copete = ValidateParameter::validateCleanParameter($_POST["copete"]);

            //Subir imagen de la nota
            $imagen = $_FILES['uploadedImage'];
            $imagenNombre = UploadImage::subirFoto($imagen, ImagesDirectory::NOTAS);
        } catch (Exception $e) {
            $this->error["class"] = "danger";
            $this->error["message"] = "Error en la carga de la nota";
            //$this->crearNota();
            return;
        }

        $nota_guardada = $this->notaModel->guardarNota($usuario_id, $titulo, $ubicacion, $place_id, $lat, $lng, $seccion_id, $cuerpo, $imagenNombre, $enlace, $copete);

        if ($nota_guardada) $this->data["alert"] = array("class" => "success", "message" => "La nota \"$titulo\" ha sido creada correctamente y pasará a estado de aprobación."); else $data["alert"] = array("class" => "danger", "message" => "La nota no ha sido creada por algun error imprevisto");
        echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $this->data);

    }

    public function verNota() {
        try {
            $nota_id = isset($_GET['id']) ? $_GET['id'] : false;
            ValidateParameter::validateCleanParameter($nota_id);
            $this->notaModel->validarAccesoNota($this->data["usuario"]["id"], $nota_id);
            $this->data['nota'] = $this->notaModel->getNota($nota_id);
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
            echo $this->renderer->render("view/lectorViews/inicioLectorView.php", $this->data);
            exit();
        }

        if (ValidateSession::esLector()) {
            echo $this->renderer->render("view/lectorViews/verNotaView.php", $this->data);
            exit();
        }

        $this->data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        echo $this->renderer->render("view/contenidistaViews/verNotaView.php", $this->data);
    }

    public function agregarNotaAPublicacion() {
        ValidateSession::validarSesionContenidista();
        $nota_id = ValidateParameter::validateCleanParameter($_GET['id']);
        $this->data['nota'] = $this->notaModel->getNota($nota_id);
        $this->data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        $this->data['notasPublicaciones'] = $this->publicacionModel->obtenerNotasEnNroPublicacionesPorNotaId($nota_id);
        echo $this->renderer->render("view/contenidistaViews/agregarNotaAPublicacionView.php", $this->data);
    }

    public function notasPorCategoria() {
        ValidateSession::validarSesionContenidista();
        $usuario_id = $_SESSION["usuario"]["id"];
        $seccion_id = $_GET['id'];
        $this->data["notas"] = $this->notaModel->notasPorSeccionYUsuario($usuario_id, $seccion_id);
        echo $this->renderer->render("view/contenidistaViews/verNotasView.php", $this->data);
    }

    public function enviarSolicitud() {
        ValidateSession::validarSesionContenidista();
        $nota_id = ValidateParameter::validateCleanParameter($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateCleanParameter($_POST['publicacion_id']);
        $resultado = $this->publicacionModel->enviarSolicitudNota($nota_id, $publicacion_id);
        $this->index();
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"] = $_SESSION["cantRevistasPorCatalogo"];
        }
        if (ValidateSession::esContenidista()) {
            $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        }
    }
}
