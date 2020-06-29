<?php
class InicioAdministradorController {
    private $renderer;
    private $data;

    public function __construct($renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->modelSideBar($this->data);
    }

    public function index(){
        echo $this->renderer->render( "view/administradorViews/inicioAdministradorView.php",$this->data);
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}