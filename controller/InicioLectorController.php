<?php
class InicioLectorController {
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if(!isset($_SESSION["usuario"])) $this->redirigeAlHome();

        $data["usuario"] = $_SESSION["usuario"];
        $data["catalogos"] = $this->model->obtenerCatalogos();

        echo $this->renderer->render( "view/lectorViews/inicioLectorView.php",$data);
    }


    public function redirigeAlHome(){
        header("location: /home");
        exit();
    }

}