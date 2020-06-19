<?php


class SuscripcionesController {
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
        echo $this->renderer->render( "view/lectorViews/SuscripcionesView.php",$data);
    }

    public function suscripcionRevista(){
        $this->modelSideBar($data);
        $idRevista = $_GET["id"];
        $data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
        echo $this->renderer->render( "view/lectorViews/suscripcionRevista.php",$data);
    }

    public function desuscripcionRevista(){
        $this->modelSideBar($data);
        $idRevista = $_GET["id"];
        $data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
        echo $this->renderer->render( "view/lectorViews/desuscripcionRevista.php",$data);
    }

    public function suscribir(){
        $this->modelSideBar($data);
        $idRevista = $_POST["id"];
        $idUsuario = $data["usuario"]["id"];
        $idTransaccion = "1"; // Todavia no aplicada la transaccion
        $fechaInicio = '2020-03-03';
        $fechaFin = '2020-03-04';
        $data["revista"] = $this->suscripcionModel->suscribir($idUsuario,$idRevista,$idTransaccion,$fechaInicio,$fechaFin);
        header("Location: /suscripciones");
        echo $this->renderer->render( "view/lectorViews/SuscripcionesView.php",$data);
    }

    public function desuscribir(){
        $this->modelSideBar($data);
        $idRevista = $_POST["id"];
        $idUsuario = $data["usuario"]["id"];
        $data["revista"] = $this->suscripcionModel->desuscribir($idUsuario,$idRevista);
        header("Location: /suscripciones");
        echo $this->renderer->render( "/suscripciones",$data);
    }


    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }
}