<?php
class InicioAdministradorController {
    private $renderer;
    private $model;

    public function __construct($renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
    }

    public function index(){
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/administradorViews/inicioAdministradorView.php",$data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }
}