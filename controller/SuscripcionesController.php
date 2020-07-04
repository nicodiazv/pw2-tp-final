<?php


class SuscripcionesController {
    private $renderer;
    private $suscripcionModel;
    private $revistaModel;
    private $transaccionModel;
    private $data;

    public function __construct($suscripcionModel,$revistaModel,$transaccionModel, $renderer) {
        ValidateSession::validarSesionLector();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->suscripcionModel = $suscripcionModel;
        $this->revistaModel = $revistaModel;
        $this->transaccionModel = $transaccionModel;
    }

    public function index(){
        $this->misSuscripciones($this->data);
    }

    public function misSuscripciones(&$data){
        $this->data["misSuscripciones"] = $this->suscripcionModel->revistasALasQueEstaSuscrito($this->data["usuario"]["id"]);
        $this->data["revistasNoSuscripto"] = $this->suscripcionModel->revistasALasQueEstaNoEstaSuscrito($this->data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/suscripcionesView.php",$this->data);
    }

//    Vista de suscripción a una revista
    public function suscripcionRevista(){
        try {
            $idRevista = isset($_GET["id"]) ? $_GET["id"] : false;
            ValidateParameter::validateCleanParameter($idRevista);
            $this->data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
            $this->data["fecha_inicio"] = date('Y-m-d');
            $this->data["fecha_fin"] = date('Y-m-d', strtotime("+1 months", strtotime(date('Y-m-d'))));
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        echo $this->renderer->render( "view/lectorViews/suscripcionRevista.php",$this->data);
    }

    //    Vista de desuscripción a una revista
    public function desuscripcionRevista(){
        try {
            $idRevista = isset($_GET["id"]) ? ValidateParameter::validateCleanParameter($_GET["id"]) : false;
            $this->data["revista"] = $this->revistaModel->obtenerRevistaPorId($idRevista);
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        echo $this->renderer->render( "view/lectorViews/desuscripcionRevista.php",$this->data);
    }

    public function suscribir(){
        try {
            $idRevista = isset($_POST["id"]) ? $_POST["id"] : false;
            ValidateParameter::validateCleanParameter($idRevista);
            $idTipoPago =isset($_POST["tipoPago"]) ? $_POST["tipoPago"] : false ;
            ValidateParameter::validateCleanParameter($idTipoPago);

            $idUsuario = $this->data["usuario"]["id"];
            $fechaInicio = date('Y-m-d');
            $fechaFin = date('Y-m-d', strtotime("+1 months", strtotime($fechaInicio)));
            $this->suscripcionModel->usuarioYaSeEncuentraSuscrito($idUsuario,$idRevista,$fechaFin);
            $revista = $this->revistaModel->obtenerRevistaPorId($idRevista);
            $idTransaccion = $this->transaccionModel->registrarTransaccion($revista[0]['precio_suscripcion_mensual'],$fechaInicio,$idTipoPago);
            $this->suscripcionModel->suscribir($idUsuario,$idRevista,$idTransaccion,$fechaInicio,$fechaFin);

            $this->data["alert"] = array("class" => "success", "message" => "Se ha suscrito a la revista ". $revista[0]['nombre']." correctamente");
        }catch (FortException $e){
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

       $this->misSuscripciones($this->data);
    }

    public function desuscribir(){
        try {
            $idRevista = isset($_POST["id"]) ? $_POST["id"] : false;
            ValidateParameter::validateCleanParameter($idRevista);

            $idUsuario = $this->data["usuario"]["id"];
            $this->suscripcionModel->desuscribir($idUsuario,$idRevista);
            $revista = $this->revistaModel->obtenerRevistaPorId($idRevista);

            $this->data["alert"] = array("class" => "success", "message" => "Te has desuscrito a la revista ". $revista[0]['nombre']." correctamente");
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        $this->misSuscripciones($this->data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];
    }
}