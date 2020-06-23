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
            $this->inicioPorTipoDeUsuario($_SESSION["usuario"]['usuario_tipo_id']);
        }
    }

    public function validarLogin(){
        try {
            $data["email"] = ValidateParameter::validateParam($_POST["email"]);
            $data["password"] = ValidateParameter::validateParam(md5($_POST["password"]));
            $_SESSION["latitud"] = $_POST["latitud"];
            $_SESSION["longitud"] =  $_POST["longitud"];
        } catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Debe llenar los campos con sus credenciales");
            echo $this->renderer->render("view/homeView.php", $data);
        }

        $usuario = $this->model->obtenerUsuarioPorEmail($data);
        //Si existe el usuario
        if($usuario){
            $_SESSION["usuario"] = $usuario[0]; //Línea importante
            $this->inicioPorTipoDeUsuario($_SESSION["usuario"]['usuario_tipo_id']);
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

    private function inicioPorTipoDeUsuario($tipoUsuario){
        switch ($tipoUsuario){
            case 1: header('location: /inicioAdministrador'); break;
            case 2: header('location: /inicioContenidista'); break;
            case 3: header('location: /inicioLector'); break;
        }
    }
}