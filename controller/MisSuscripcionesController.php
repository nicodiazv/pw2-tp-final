<?php


class MisSuscripcionesController {
    private $renderer;
    private $suscripcionModel;
    private $catalogoModel;
    private $revistaModel;

    public function __construct($suscripcionModel,$catalogoModel,$revistaModel,$renderer) {
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->suscripcionModel = $suscripcionModel;
        $this->catalogoModel = $catalogoModel;
        $this->revistaModel = $revistaModel;
    }

    public function index(){
        $this->misSuscripciones();
    }

    public function misSuscripciones(){
        $this->modelSideBar($data);
        $data["misSuscripciones"] = $this->suscripcionModel->revistasALasQueEstaSuscrito($data["usuario"]["id"]);
        $data["revistasNoSuscripto"] = $this->suscripcionModel->revistasALasQueEstaNoEstaSuscrito($data["usuario"]["id"]);
        echo $this->renderer->render( "view/misSuscripcionesView.php",$data);
    }



    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }
}