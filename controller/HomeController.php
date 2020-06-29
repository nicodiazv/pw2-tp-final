<?php

class HomeController{
    private $renderer;
    private $model;
    private $data;

    public function __construct($model, $renderer){
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $vista = $this->inicioPorTipoDeUsuario();
            echo $this->renderer->render( "view/$vista.php", $this->data);
            return;
        }
        echo $this->renderer->render( "view/homeView.php");
    }

    public function inicioPorTipoDeUsuario(){
        switch ($this->data['usuario']['usuario_tipo_id']){
            case 1: return 'administradorViews/inicioAdministradorView'; break;
            case 2: return 'contenidistaViews/inicioContenidistaView'; break;
            case 3: return 'lectorViews/inicioLectorView'; break;
        }
        exit();
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : false;
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];
        }
        if (ValidateSession::esContenidista()) {
            $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        }
    }

}