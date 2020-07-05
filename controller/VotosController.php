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

    public function index(){
        $this->administrar();
    }
    // Ajax Method
    public function guardarVoto(){
        ValidateSession::validarSesionLector();
        $idUsuario = $this->data["usuario"]["id"];
        $puntaje = isset($_POST["puntaje"]) ? $_POST["puntaje"] : false;
        $idNota = isset($_POST["id_nota"]) ? $_POST["id_nota"] : false;

        try {
            ValidateParameter::validateCleanParameter($puntaje);
            $this->votosModel->yaVotoEstaNota($idUsuario, $idNota);
            $this->votosModel->guardarVoto($puntaje, $idUsuario, $idNota);
        } catch (FortException $e) {
            echo json_encode(false);
            exit();
        }
        echo json_encode(true);
    }

    public function administrar(){
        ValidateSession::validarSesionAdministrador();
        $this->data["votos_positivos"] = $this->votosModel->obtenerVotosPositivos();
        $this->data["votos_regulares"] = $this->votosModel->obtenerVotosRegulares();
        $this->data["votos_negativos"] = $this->votosModel->obtenerVotosNegativos();
        echo $this->renderer->render( "view/administradorViews/votosView.php",$this->data);
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"] = $_SESSION["cantRevistasPorCatalogo"];
        }
        if (ValidateSession::esContenidista()) {
            $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        }
    }
}