<?php

class NotaController{
    private $renderer;
    private $notaModel;
    private $seccionModel;


    public function __construct($notaModel,$seccionModel, $renderer){
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            echo $this->renderer->render( "view/inicioLectorView.php", $usuario);
        }
        echo $this->renderer->render( "view/homeView.php");
    }
    public function crearNota(){
        if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] == 2){
            $data['usuario'] = $_SESSION["usuario"];
            $data['secciones'] = $this->seccionModel->obtenerSecciones();
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
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
        $seccion_id = isset($_POST["seccion"]) ?  $_POST["seccion"] : false;
        $cuerpo = isset($_POST["cuerpo"]) ?  $_POST["cuerpo"] : false;

        $nota_guardada = $this->notaModel->guardarNota($usuario_id, $titulo, $ubicacion, $seccion_id, $cuerpo);
//        $data["usuario"] = $_SESSION["usuario"];
        header("Location: /InicioContenidista");
        echo $this->renderer->render( "view/inicioContenidistaView.php");

        return;
    }

    public function notasPorCategoria(){
        $usuario_id = $_SESSION["usuario"]["id"];
        $seccion_id = $_GET['seccion_id'];

        $data["notas"] = $this->notaModel->notasPorSeccionYUsuario($usuario_id, $seccion_id);
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        echo $this->renderer->render( "view/notasPorCategoriaView.php", $data);
    }

    public function validarUsuarioContenidista(){
        if ($_SESSION["usuario"]["usuario_tipo_id"] == 2) return true;
    }





}