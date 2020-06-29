<?php
class DescargasController {
    private $renderer;
    private $descargasModel;
    private $data;

    public function __construct($descargasModel, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->descargasModel = $descargasModel;
        $this->renderer = $renderer;
        $this->modelSideBar($this->data);
    }

    public function index(){
        echo $this->renderer->render( "view/administradorViews/descargasPDFView.php",$this->data);
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}