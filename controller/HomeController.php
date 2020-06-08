<?php

class HomeController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if($_SESSION["usuario"]){
            $usuario = $_SESSION["usuario"];
            echo $this->renderer->render( "view/inicioView.php", $usuario);
        } 
        echo $this->renderer->render( "view/homeView.php", $usuario);
    }

    // public function login(){
    //     $data["email"] = $_POST["email"];
    //     $data["password"] = md5($_POST["password"]);

    //     $usuario = $this->model->obtenerUsuarioPorEmail($data);
        
    //     $data["usuario"] = $usuario;
    //     echo $this->renderer->render( "view/homeView.php", $data );
    // }

   
}