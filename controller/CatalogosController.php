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
        $idCatalogo = isset($_GET["id"]) ? $_GET["id"] : false;
        try {
            ValidateParameter::validateCleanParameter($idCatalogo);
            $this->data["catalogo"] = $this->model->obtenerCatalogo($idCatalogo);
//            $this->data["revistasPorCatalogo"] = $this->model->revistasPorCatalogo($id);
            $this->data["misRevistasPorCatalogo"] = $this->model->misRevistasPorCatalogo($idCatalogo,$this->data["usuario"]["id"]);
            $this->data["revistasNoAdquiridasDelCatalogo"] = $this->model->revistasNoAdquiridasDelCatalogo($idCatalogo,$this->data["usuario"]["id"]);
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }
        echo $this->renderer->render( "view/lectorViews/catalogoView.php", $this->data );
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        $this->data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];
    }
}