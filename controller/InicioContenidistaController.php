<?php

class InicioContenidistaController{
    private $renderer;
    private $notaModel;
    private $seccionModel;


    public function __construct($notaModel,$seccionModel, $renderer){
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
    }

    public function index(){
        if(!isset($_SESSION["usuario"])) $this->redirigeAlHome();
        $data["usuario"] = $_SESSION["usuario"];
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        echo $this->renderer->render( "view/inicioContenidistaView.php", $data);
    }
    public function crearNota(){
        if(!isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] != 2){
            $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear notas");
            echo $this->renderer->render( "view/homeView.php",$data);
            $this->redirigeAlHome();
        }

        $data['usuario'] = $_SESSION["usuario"];
        $data['secciones'] = $this->seccionModel->obtenerSecciones();
        echo $this->renderer->render( "view/crearNotaView.php", $data);
        return;
    }

    public function validarUsuarioContenidista(){
        if ($_SESSION["usuario"]["usuario_tipo_id"] == 2) return true;
    }


    public function redirigeAlHome(){
        header("location: /home");
        exit();
    }


    public function modelSideBar(&$data){

    }

}