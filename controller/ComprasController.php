<?php


class ComprasController {
    private $renderer;
    private $comprasModel;
    private $publicacionModel;
    private $transaccionModel;
    private $data;

    public function __construct($comprasModel,$publicacionModel,$transaccionModel, $renderer){
        ValidateSession::validarSesionLector();
        $this->comprasModel = $comprasModel;
        $this->publicacionModel = $publicacionModel;
        $this->transaccionModel = $transaccionModel;
        $this->renderer = $renderer;
        $this->modelSideBar($this->data);
    }

    public function index() {
        $this->comprasDePublicaciones();
    }

    public function comprasDePublicaciones($data = null) {
        $this->data["publicacionesAdquiridas"] = $this->comprasModel->obtenerPublicacionesAdquiridasDelUsuario($this->data["usuario"]["id"]);
        $this->data["publicacionesCompradas"] = $this->comprasModel->obtenerComprasDelUsuario($this->data["usuario"]["id"]);
        $this->data["publicacionesNoCompradas"] = $this->comprasModel->obtenerPublicacionesNoCompradasDelUsuario($this->data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/comprasPublicacionesView.php",$this->data);
    }

    public function publicacion(){
        $idPublicacion = isset($_GET["id"]) ? $_GET["id"] : false;
        try {
            ValidateParameter::validateCleanParameter($idPublicacion);
            $this->data["publicacion"] = $this->publicacionModel->obtenerPublicacionPorId($idPublicacion);
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        echo $this->renderer->render( "view/lectorViews/compraPublicacionView.php",$this->data);
    }

    public function confirmarCompraPublicacion(){
        $idPublicacion = isset($_POST["id"]) ? $_POST["id"] : false;
        $idTipoPago = isset($_POST["tipoPago"]) ? $_POST["tipoPago"] : false;
        try {
            ValidateParameter::validateCleanParameter($idPublicacion);
            ValidateParameter::validateCleanParameter($idTipoPago);

            $this->comprasModel->validarSiTieneAdquiridaLaRevistaDeLaPublicacion($idPublicacion, $this->data["usuario"]["id"]);
            $this->comprasModel->validarSiYaComproLaPublicacion($idPublicacion, $this->data["usuario"]["id"]);

            $publicacion = $this->publicacionModel->obtenerPublicacionPorId($idPublicacion);
            $fechaTransaccion = date('Y-m-d');
            $idTransaccion = $this->transaccionModel->registrarTransaccion($publicacion[0]['precio'], $fechaTransaccion, $idTipoPago);
            $this->comprasModel->confirmarCompraDePublicacion($idPublicacion, $this->data["usuario"]["id"], $idTransaccion);

            $this->data["alert"] = array("class" => "success", "message" => "Has comprado la publición " . $publicacion[0]["nombre"] . " correctamente");
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }

        $this->comprasDePublicaciones($this->data);
    }


    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"] = $_SESSION["cantRevistasPorCatalogo"];
        }
    }
}