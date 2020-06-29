<?php


class SuscripcionesController {
    private $renderer;
    private $suscripcionModel;
    private $catalogoModel;
    private $revistaModel;
    private $transaccionModel;

    public function __construct($suscripcionModel,$catalogoModel,$revistaModel,$transaccionModel, $renderer) {
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->suscripcionModel = $suscripcionModel;
        $this->catalogoModel = $catalogoModel;
        $this->revistaModel = $revistaModel;
        $this->transaccionModel = $transaccionModel;
    }

    public function index(){
        $this->misSuscripciones();
    }

    public function misSuscripciones(&$data=null){
        $this->modelSideBar($data);
        $data["misSuscripciones"] = $this->suscripcionModel->revistasALasQueEstaSuscrito($data["usuario"]["id"]);
        $data["revistasNoSuscripto"] = $this->suscripcionModel->revistasALasQueEstaNoEstaSuscrito($data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/SuscripcionesView.php",$data);
    }

//    Vista de suscripción a una revista
    public function suscripcionRevista(){
        $this->modelSideBar($data);
        $idRevista = $_GET["id"];
        $data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
        echo $this->renderer->render( "view/lectorViews/suscripcionRevista.php",$data);
    }

    //    Vista de desuscripción a una revista
    public function desuscripcionRevista(){
        $this->modelSideBar($data);
        $idRevista = $_GET["id"];
        $data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
        echo $this->renderer->render( "view/lectorViews/desuscripcionRevista.php",$data);
    }

    public function suscribir(){
        $this->modelSideBar($data);
        try {
            $idRevista = ValidateParameter::validateParam($_POST["id"]);
            $idUsuario = $data["usuario"]["id"];
            $fechaInicio = date('Y-m-d');
            $fechaFin = date('Y-m-d', strtotime("+1 months", strtotime($fechaInicio)));
            $this->suscripcionModel->usuarioYaSeEncuentraSuscrito($idUsuario,$idRevista,$fechaFin);
            $revista = $this->revistaModel->obtenerRevistaPorId($idRevista);
            $idTransaccion = $this->transaccionModel->registrarTransaccion($revista[0]['precio_suscripcion_mensual'],$fechaInicio,2);
            $this->suscripcionModel->suscribir($idUsuario,$idRevista,$idTransaccion,$fechaInicio,$fechaFin);

            $data["alert"] = array("class" => "success", "message" => "Se ha suscrito a la revista ". $revista[0]['nombre']." correctamente");
        }catch (FortException $e){
            $data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

       $this->misSuscripciones($data);
    }

    public function desuscribir(){
        $this->modelSideBar($data);
        try {
            $idRevista = ValidateParameter::validateParam($_POST["id"]);
            $idUsuario = $data["usuario"]["id"];
            $this->suscripcionModel->desuscribir($idUsuario,$idRevista);
            $revista = $this->revistaModel->obtenerRevistaPorId($idRevista);

            $data["alert"] = array("class" => "success", "message" => "Te has desuscrito a la revista ". $revista[0]['nombre']." correctamente");
        } catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        $this->misSuscripciones($data);
    }


    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }
}