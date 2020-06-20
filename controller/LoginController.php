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
            $data['usuario'] = $_SESSION["usuario"];
            $vista = $this->inicioPorTipoDeUsuario();
            return;

            echo $this->renderer->render( "view/$vista.php", $data);
            return;

        }
        echo $this->renderer->render( "view/homeView.php");
    }

    public function validarLogin(){
        $data["email"] = isset($_POST["email"]) ? $_POST["email"] : false;
        $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : false ;

        $_SESSION["latitud"] = isset($_POST["latitud"]) ? $_POST["latitud"] : false;
        $_SESSION["longitud"] = isset($_POST["longitud"]) ? $_POST["longitud"] : false;

        $usuario = $this->model->obtenerUsuarioPorEmail($data);

        if($usuario){
            $_SESSION["usuario"] = $usuario[0];
            $data["usuario"] = $usuario;

            $this->inicioPorTipoDeUsuario();
            exit();
        }else{
            $data["alert"] = array("class" => "danger", "message" => "Usuario y/o Contraseña Incorrecto/s");
            echo $this->renderer->render("view/homeView.php", $data);
        }
    }

    public function cerrarSesion(){
        if(session_destroy()){
            $data["alert"] = array("class" => "success", "message" => "Sesión cerrada con éxito");
            echo $this->renderer->render("view/homeView.php", $data);
        }

    }

    public function inicioPorTipoDeUsuario(){
        switch ($_SESSION['usuario']['usuario_tipo_id']){
            case 1:
                header('location: /inicioAdministrador');
                return;
                break;
            case 2:
                header('location: /inicioContenidista');
                return;
                break;
            case 3:
                header('location: /inicioLector');
                return;
                break;
        }
    }



}