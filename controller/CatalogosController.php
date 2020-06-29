<?php
class CatalogosController {
    private $renderer;
    private $model;
    private $data;

    public function __construct($model, $renderer) {
        ValidateSession::validarSesionLector();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        $this->catalogos();
    }

    public function catalogos(){
        $this->data['catalogos'] = $this->model->obtenerCatalogos();
        echo $this->renderer->render( "view/lectorViews/catalogosView.php", $this->data);
    }

    public function catalogo(){
        $id = $_GET["id"];
        $this->data["catalogos"] = $this->model->obtenerCatalogos();
        $this->data["catalogo"] = $this->model->obtenerCatalogo($id);
        $this->data["revistasPorCatalogo"] = $this->model->revistasPorCatalogo($id);
        echo $this->renderer->render( "view/lectorViews/catalogoView.php", $this->data );
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        $this->data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];
    }
}