<?php

class HomeController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            $vista = $this->inicioPorTipoDeUsuario();
            echo $this->renderer->render( "view/$vista.php", $usuario);
            return;
        }

        echo $this->renderer->render( "view/homeView.php");
    }

    public function inicioPorTipoDeUsuario(){
        switch ($_SESSION['usuario']['usuario_tipo_id']){
            case 1:
                return 'administradorViews/inicioAdministradorView';
                break;
            case 2:
                return 'contenidistaViews/inicioContenidistaView';
                break;
            case 3:
                return 'lectorViews/inicioLectorView';
                break;
        }
    }

}