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
        $data["nombre"] = isset($_POST["nombre"]) ?  $_POST["nombre"] : null;
        $data["apellido"] = isset($_POST["apellido"]) ?  $_POST["apellido"] : null;
        $data["email"] = isset($_POST["email"]) ?  $_POST["email"] : null;
        $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : null;

        // Validación del lado del servidor
        if($data["nombre"] == null or $data["apellido"] = null or $data["email"] == null or $data["password"]){
            $data["alertRegistroCorrecto"] = array("class" => "danger", "message" => "Debe Ingresar todos los campos");
            echo $this->renderer->render( "view/homeView.php",$data);
        }

        $this->model->registrarUsuarioLector($data);
        $data["alertRegistroCorrecto"] = array("class" => "success", "message" => "Usuario registrado correctamente");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

}