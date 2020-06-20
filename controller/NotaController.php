<?php
include_once ('helper/UploadImage.php');
class NotaController{

    private $renderer;
    private $notaModel;
    private $seccionModel;
    private $publicacionModel;

    private $error = array();


    public function __construct($notaModel,$seccionModel, $publicacionModel,$renderer){
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->publicacionModel = $publicacionModel;

    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $data['usuario'] = $_SESSION["usuario"];
            $data['notas'] = $this->notaModel->obtenerNotas();
            $this->modelSideBar($data);
            echo $this->renderer->render( "view/verNotasView.php", $data);
        }

        echo $this->renderer->render( "view/homeView.php");
    }
    public function crearNota(){
        if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] == 2){
            $data['usuario'] = $_SESSION["usuario"];
            $data['secciones'] = $this->seccionModel->obtenerSecciones();
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
            if($this->error){
                $data["flashMessage"] = $this->error;
            }

            echo $this->renderer->render( "view/crearNotaView.php", $data);
            return;
        }

        $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear notas");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

    public function guardarNota(){
        if (!$this->validarUsuarioContenidista()){
            echo $this->renderer->render( "view/homeView.php");
            return;
        }
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


        $uploadedImage = new UploadImage($_FILES['uploadedImage']);
        try{
            $imagenNombre = $uploadedImage->subirFoto();
        }catch(Exception $e){

            $this->error["class"] = "danger";
            $this->error["message"] = "No se pudo subir la foto";
            $this->crearNota();
            return;
        }

        $nota_guardada = $this->notaModel->guardarNota($usuario_id, $titulo, $ubicacion, $place_id, $lat,$lng,$seccion_id, $cuerpo, $imagenNombre, $enlace,$copete);

//        $data["usuario"] = $_SESSION["usuario"];
        header("Location: /InicioContenidista");
        echo $this->renderer->render( "view/inicioContenidistaView.php");

        return;
    }

    public function verNota(){
        $nota_id = ValidateParameter::validateParam($_GET['id']);
        $this->modelSideBar($data);
        $data['nota'] = $this->notaModel->getNota($nota_id);
        $data['publicaciones'] = $this->publicacionModel->obtenerPublicaciones();
        echo $this->renderer->render( "view/verNotaView.php", $data);
    }

    public function agregarNotaAPublicacion(){
        $nota_id = ValidateParameter::validateParam($_GET['id']);
        $this->modelSideBar($data);
        $data['nota'] = $this->notaModel->getNota($nota_id);
        $data['publicaciones'] = $this->publicacionModel->obtenerPublicaciones();
        echo $this->renderer->render( "view/agregarNotaAPublicacionView.php", $data);
    }

    public function notasPorCategoria(){
        $usuario_id = $_SESSION["usuario"]["id"];
        $seccion_id = $_GET['seccion_id'];
        $data["notas"] = $this->notaModel->notasPorSeccionYUsuario($usuario_id, $seccion_id);
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        echo $this->renderer->render( "view/notasPorCategoriaView.php", $data);
    }

    public function enviarSolicitud(){
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $resultado = $this->publicacionModel->enviarSolicitudNota($nota_id,$publicacion_id);
        $this->index();
    }
    public function modelSideBar(&$data){
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);

    }

    public function validarUsuarioContenidista(){
        if ($_SESSION["usuario"]["usuario_tipo_id"] == 2) return true;
    }





}