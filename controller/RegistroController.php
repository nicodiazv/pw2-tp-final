<?php

class RegistroController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render( "view/registroView.php");
    }

    public function registrar(){
        $data["nombre"] = $_POST["nombre"];
        $data["apellido"] = $_POST["apellido"];
        $data["email"] = $_POST["email"];
        $data["password"] = md5 ( $_POST["password"] );

        $this->model->registrarUsuarioLector($data);

        // $data["usuario"] = $usuario;
        echo $this->renderer->render( "view/inicioView.php");
    }

}