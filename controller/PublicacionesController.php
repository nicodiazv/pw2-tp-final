<?php

class PublicacionesController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        ValidateSession::validarSesionContenidista();
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $this->modelSideBar($data);
        $data['publicaciones'] = $this->model->obtenerPublicaciones();
        echo $this->renderer->render( "view/contenidistaViews/verPublicacionesView.php",$data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }
}