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
        try {
            $data["nombre"] = ValidateParameter::validateParam($_POST["telefono"]);
            $data["apellido"] = ValidateParameter::validateParam($_POST["apellido"]);
            $data["email"] = ValidateParameter::validateEmailSyntax($_POST["email"]);
            $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : false;
            $data["direccion"] = ValidateParameter::validateParam($_POST["direccion"]);
            $data["telefono"] = ValidateParameter::validateNumberPhone($_POST["telefono"]);

            $this->model->registrarUsuarioLector($data);

            $data["alert"] = array("class" => "success", "message" => "Usuario registrado correctamente");
            echo $this->renderer->render( "view/homeView.php",$data);

        } catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Debe Ingresar todos los campos correctamente del formulario para registrarse");
            echo $this->renderer->render( "view/homeView.php",$data);
        }


    }

}