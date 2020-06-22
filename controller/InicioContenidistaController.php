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
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $data);
    }
    public function crearNota(){
        $this->modelSideBar($data);
        if(!isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] != 2){
            $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear notas");
            echo $this->renderer->render( "view/homeView.php",$data);
            $this->redirigeAlHome();
        }

        $data['secciones'] = $this->seccionModel->obtenerSecciones();
        echo $this->renderer->render( "view/contenidistaViews/crearNotaView.php", $data);
        return;
    }

    public function redirigeAlHome(){
        header("location: /home");
        exit();
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];

    }

}