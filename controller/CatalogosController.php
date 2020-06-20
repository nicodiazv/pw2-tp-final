<?php
class CatalogosController {
    private $renderer;
    private $model;

    public function __construct($model, $renderer) {
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $this->modelSideBar($data);
        $this->catalogos();
    }

    public function catalogos(){
        $this->modelSideBar($data);
        $data['catalogos'] = $this->model->obtenerCatalogos();
        $data["cantRevistasPorCatalogo"]  = $this->model->cantRevistasPorCatalogo();
        echo $this->renderer->render( "view/lectorViews/inicioLectorView.php", $data);
    }


    public function catalogo(){
        $id = $_GET["id"];
        $data["catalogos"] = $this->model->obtenerCatalogos();
        $data["catalogo"] = $this->model->obtenerCatalogo($id);
        $this->modelSideBar($data);
        $data["revistasPorCatalogo"] = $this->model->revistasPorCatalogo($id);
        echo $this->renderer->render( "view/lectorViews/catalogosView.php", $data );
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->model->cantRevistasPorCatalogo();
    }
}