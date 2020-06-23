<?php
class NotaController{

    private $renderer;
    private $notaModel;
    private $seccionModel;
    private $publicacionModel;

    private $error = array();

    public function __construct($notaModel,$seccionModel, $publicacionModel,$renderer){
        ValidateSession::validarSesionContenidista();
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->publicacionModel = $publicacionModel;
    }

    public function index(){
        $this->modelSideBar($data);
        $data['notas'] = $this->notaModel->obtenerNotas();
        echo $this->renderer->render( "view/contenidistaViews/verNotasView.php", $data);
    }

    public function crearNota(){
        $this->modelSideBar($data);
        if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] == 2){
            $data['secciones'] = $this->seccionModel->obtenerSecciones();
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
            if($this->error){
                $data["flashMessage"] = $this->error;
            }

            echo $this->renderer->render( "view/contenidistaViews/crearNotaView.php", $data);
            return;
        }

        $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear notas");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

    public function guardarNota(){
        $usuario_id = $_SESSION["usuario"]["id"];
        $titulo = isset($_POST["titulo"]) ?  $_POST["titulo"] : false;
        $ubicacion = isset($_POST["ubicacion"]) ?  $_POST["ubicacion"] : false;
        $place_id = isset($_POST["place_id"]) ?  $_POST["place_id"] : false;
        $lat = isset($_POST["lat"]) ?  $_POST["lat"] : false;
        $lng = isset($_POST["lng"]) ?  $_POST["lng"] : false;
        $enlace = isset($_POST["enlace"]) ?  $_POST["enlace"] : false;


        $seccion_id = isset($_POST["seccion"]) ?  $_POST["seccion"] : false;
        $cuerpo = isset($_POST["cuerpo"]) ?  $_POST["cuerpo"] : false;
        $copete = isset($_POST["copete"]) ?  $_POST["copete"] : false;

        //Subir imagen de la nota
        try{
            $imagen = $_FILES['uploadedImage'];
            $imagenNombre = UploadImage::subirFoto($imagen,ImagesDirectory::NOTAS);
        }catch(Exception $e){
            $this->error["class"] = "danger";
            $this->error["message"] = "No se pudo subir la foto";
            $this->crearNota();
            return;
        }

        $nota_guardada = $this->notaModel->guardarNota($usuario_id, $titulo, $ubicacion, $place_id, $lat,$lng,$seccion_id, $cuerpo, $imagenNombre, $enlace,$copete);

//        header("Location: /InicioContenidista");
        $data["alert"] = array("class" => "success", "message" => "La nota ha sido creada correctamente");
        echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php",$data);

//        return;
    }

    public function verNota(){
        $nota_id = ValidateParameter::validateParam($_GET['id']);
        $this->modelSideBar($data);
        $data['nota'] = $this->notaModel->getNota($nota_id);
        $data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        echo $this->renderer->render( "view/contenidistaViews/verNotaView.php", $data);
    }

    public function agregarNotaAPublicacion(){
        $nota_id = ValidateParameter::validateParam($_GET['id']);
        $this->modelSideBar($data);
        $data['nota'] = $this->notaModel->getNota($nota_id);
        $data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        $data['notasPublicaciones'] = $this->publicacionModel->obtenerNotasEnNroPublicacionesPorNotaId($nota_id);
        echo $this->renderer->render( "view/contenidistaViews/agregarNotaAPublicacionView.php", $data);
    }

    public function notasPorCategoria(){
        $this->modelSideBar($data);
        $usuario_id = $_SESSION["usuario"]["id"];
        $seccion_id = $_GET['id'];
        $data["notas"] = $this->notaModel->notasPorSeccionYUsuario($usuario_id, $seccion_id);
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        echo $this->renderer->render( "view/contenidistaViews/notasPorCategoriaView.php", $data);
    }

    public function enviarSolicitud(){
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $resultado = $this->publicacionModel->enviarSolicitudNota($nota_id,$publicacion_id);
        $this->index();
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
    }

}