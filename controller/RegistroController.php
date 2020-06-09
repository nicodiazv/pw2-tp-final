<?php

class RegistroController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            echo $this->renderer->render( "view/inicioLectorView.php", $usuario);
        }
        echo $this->renderer->render( "view/homeView.php");
    }

    public function registrar(){
        $data["nombre"] = isset($_POST["nombre"]) ?  $_POST["nombre"] : false;
        $data["apellido"] = isset($_POST["apellido"]) ?  $_POST["apellido"] : false;
        $data["email"] = isset($_POST["email"]) ?  $_POST["email"] : false;
        $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : false;

        // Validación del lado del servidor
        if(!($data["nombre"]) or !($data["apellido"]) or !($data["email"]) or !($data["email"])){
            $data["alertRegistroCorrecto"] = array("class" => "danger", "message" => "Debe Ingresar todos los campos del formulario para registrarse");
            echo $this->renderer->render( "view/homeView.php",$data);
        }

        $this->model->registrarUsuarioLector($data);
        $data["alertRegistroCorrecto"] = array("class" => "success", "message" => "Usuario registrado correctamente");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

}