<?php

class LoginController{

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

        }
        echo $this->renderer->render( "view/homeView.php");
    }

    public function validarLogin(){
        $data["email"] = isset($_POST["email"]) ? $_POST["email"] : false;
        $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : false ;

        $usuario = $this->model->obtenerUsuarioPorEmail($data);

        if($usuario){
            $data["usuario"] = $usuario;
            $_SESSION["usuario"] = $usuario[0];

            $vista = $this->inicioPorTipoDeUsuario();
            echo $this->renderer->render("view/$vista.php", $data);
        }else{
            $data["alert"] = array("class" => "danger", "message" => "Usuario y/o Contraseña Incorrecto/s");
            echo $this->renderer->render("view/homeView.php", $data);
        }
    }

    public function cerrarSesion(){
        if(session_destroy()){
            $data["alertSesionCerrada"] = array("class" => "success", "message" => "Sesión cerrada con éxito");
            echo $this->renderer->render("view/homeView.php", $data);
        }

    }

    public function inicioPorTipoDeUsuario(){
        switch ($_SESSION['usuario']['usuario_tipo_id']){
            case 1:
                return 'inicioAdminView';
                break;
            case 2:
                return 'inicioContenidistaView';
                break;
            case 3:
                return 'inicioLectorView';
                break;
        }
    }



}