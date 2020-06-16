<?php
class InicioLectorController {
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $data["catalogos"] = $this->model->obtenerCatalogos();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/lectorViews/inicioLectorView.php",$data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->model->cantRevistasPorCatalogo();

        $clima = new Clima();
        $climaActual = $clima->getClimaActualResumido();
        $data["climaActual"] = $climaActual;
    }
}