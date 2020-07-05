<?php


class VotosController {

    private $renderer;
    private $votosModel;
    private $data;

    public function __construct($votosModel, $renderer) {
        $this->renderer = $renderer;
        $this->votosModel = $votosModel;
        $this->modelSideBar($this->data);
    }

    public function guardarVoto(){
        $idUsuario = $this->data["usuario"]["id"];
        $puntaje = isset($_POST["puntaje"]) ? $_POST["puntaje"] : false;
        $idNota = isset($_POST["id_nota"]) ? $_POST["id_nota"] : false;

        try {
            ValidateParameter::validateCleanParameter($puntaje);
            $this->votosModel->yaVotoEstaNota($idUsuario, $idNota);
            $this->votosModel->guardarVoto($puntaje, $idUsuario, $idNota);
        } catch (FortException $e) {
            return "hola";
        }

        echo $this->renderer->render( "view/lectorViews/verNotaView.php");
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        $this->data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];
    }
}