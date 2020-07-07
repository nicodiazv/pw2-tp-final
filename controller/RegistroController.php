<?php

class RegistroController {
    private $renderer;
    private $model;

    public function __construct($model, $renderer) {
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index() {
        echo $this->renderer->render("view/homeView.php");
    }

    public function registrar() {
        try {
            //Valida que los parámetros no sean nulos
            $data["nombre"] = isset($_POST["nombre"]) ? $_POST["nombre"] : false;
            $data["apellido"] = isset($_POST["apellido"]) ? $_POST["apellido"] : false;
            $data["email"] = isset($_POST["email"]) ? $_POST["email"] : false;
            $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : false;
            $data["direccion"] = isset($_POST["direccion"]) ? $_POST["direccion"] : false;
            $data["telefono"] = isset($_POST["telefono"]) ? $_POST["telefono"] : false;

            ValidateParameter::validateCleanParameter($data["nombre"]);
            ValidateParameter::validateCleanParameter($data["apellido"]);
            ValidateParameter::validateEmailSyntax($data["email"]);
            ValidateParameter::validateCleanParameter($data["password"]);
            ValidateParameter::validateCleanParameter($data["direccion"]);
            ValidateParameter::validateNumberPhone($data["telefono"]);

            $this->model->validarQueEmailNoExista($data["email"]);
            //Registra al usuario
            $this->model->registrarUsuarioLector($data);
            SubscribeEmail::subscribe($data["email"]);

            $data["alert"] = array("class" => "success", "message" => "Usuario registrado correctamente");

        } catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => $e->getMessage());
        }
        echo $this->renderer->render("view/homeView.php", $data);
    }

}