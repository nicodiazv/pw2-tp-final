<?php


class RevistasController {
    private $renderer;
    private $revistaModel;
    private $catalogoModel;
    private $notaModel;

    public function __construct($revistaModel,$catalogoModel,$notaModel,$renderer) {
        $this->renderer = $renderer;
        $this->revistaModel = $revistaModel;
        $this->catalogoModel = $catalogoModel;
        $this->notaModel = $notaModel;
    }

    public function index(){
        $this->modelSideBar($data);
        $this->revistas();
    }

    public function revistas(){
        ValidateSession::validarSesionLector();
        $this->modelSideBar($data);
        $data['revistas'] = $this->revistaModel->obtenerRevistas();
        $data['catalogosDeLaRevista'] = $this->revistaModel->catalogosDeLaRevista();
        $data['adquirida'] = $this->revistaModel->obtenerRevistasDelUsuario($data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/RevistasView.php", $data);
    }

    public function misRevistas(){
        ValidateSession::validarSesionLector();
        $this->modelSideBar($data);
        $data['misRevistas'] = $this->revistaModel->obtenerRevistasDelUsuario($data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/misRevistasView.php", $data);
    }

    public function crearRevista(){
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
        }

    public function guardarRevista(){
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        try{
            $nombre = ValidateParameter::validateParam($_POST["nombre"]);
            $descripcion = ValidateParameter::validateParam($_POST["descripcion"]);
            $precioMensual = ValidateParameter::validateParam($_POST["precioMensual"]);

            $this->revistaModel->validarRevistaYaExiste($nombre);

            //Subir imagen de la nota
            $imagen = $_FILES['uploadedImage'];
            $imagenNombre = UploadImage::subirFoto($imagen,ImagesDirectory::REVISTAS);

            // Guardar revista
            $idUsuario = $data['usuario']['id'];
            $data["revistaCreada"] = $this->revistaModel->guardarRevista($nombre,$descripcion,$imagenNombre,$precioMensual,$idUsuario);

            $data["alert"] = array("class" => "success", "message" => "La revista \"$nombre\" se ha creado correctamente");
            echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);

        }catch (FortException $e){
            $data["alert"] = array("class" => "danger", "message" => $e->getMessage());
            echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
        } catch (Exception $e) {
            $data["alert"] = array("class" => "danger", "message" => 'Ocurrió un error en la subida de la imágen \"$imagen\" ');
            echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
        }
    }

    public function estadoRevistas(){
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        $data['revistas'] = $this->revistaModel->RevistasDelContenidista($data["usuario"]["id"]);
        echo $this->renderer->render( "view/contenidistaViews/estadoRevistasView.php", $data);
    }

    public function verRevista(){
        ValidateSession::validarSesionContenidista();
        $id = $_GET["id"];
        $this->modelSideBar($data);
        $data['revista'] = $this->revistaModel->obtenerRevistaPorId($id);
        echo $this->renderer->render( "view/contenidistaViews/verRevistaView.php", $data);
    }


    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
        }
        if (ValidateSession::esContenidista()) {
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        }
    }

}