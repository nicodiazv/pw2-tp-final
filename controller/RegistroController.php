<?php

class RegistroController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render( "view/homeView.php");
    }

    public function registrar(){
        try {
            //Valida que los parámetros no sean nulos
            $data["nombre"] = ValidateParameter::validateParam($_POST["nombre"]);
            $data["apellido"] = ValidateParameter::validateParam($_POST["apellido"]);
            $data["email"] = ValidateParameter::validateEmailSyntax($_POST["email"]);
            $data["password"] = ValidateParameter::validateParam(md5($_POST["password"]));
            $data["direccion"] = ValidateParameter::validateParam($_POST["direccion"]);
            $data["telefono"] = ValidateParameter::validateNumberPhone($_POST["telefono"]);

            $this->model->validarQueEmailNoExista($data["email"]);
            //Registra al usuario
            $this->model->registrarUsuarioLector($data);
            
            $data["alert"] = array("class" => "success", "message" => "Usuario registrado correctamente");

        } catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }
        echo $this->renderer->render( "view/homeView.php",$data);
    }

}