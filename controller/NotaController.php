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
        $data["usuario"] = $_SESSION["usuario"]["id"];
        $data["titulo"] = isset($_POST["titulo"]) ?  $_POST["titulo"] : false;
        $data["ubicacion"] = isset($_POST["ubicacion"]) ?  $_POST["ubicacion"] : false;
        $data["seccion"] = isset($_POST["seccion"]) ?  $_POST["seccion"] : false;
        $data["cuerpo"] = isset($_POST["cuerpo"]) ?  $_POST["cuerpo"] : false;

        $this->notaModel->guardarNota($data);
        echo $this->renderer->render( "view/inicioContenidistaView.php");
        return;
    }

    public function validarUsuarioContenidista(){
        if ($_SESSION["usuario"]["usuario_tipo_id"] == 2) return true;
    }


}