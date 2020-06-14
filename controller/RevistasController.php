<?php


class RevistasController {
    private $renderer;
    private $revistaModel;
    private $catalogoModel;

    public function __construct($revistaModel,$catalogoModel,$renderer) {
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->revistaModel = $revistaModel;
        $this->catalogoModel = $catalogoModel;
    }

    public function index(){
        $this->modelSideBar($data);
        $this->revistas();
    }


    public function revistas(){
        $data['revistas'] = $this->revistaModel->obtenerRevistas();
        $data['catalogosDeLaRevista'] = $this->revistaModel->catalogosDeLaRevista();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/RevistasView.php", $data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }

}