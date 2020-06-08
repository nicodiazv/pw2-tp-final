<?php

class LoginController{

    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        echo $this->renderer->render( "view/homeView.php");
    }

    public function validarLogin(){
        $data["email"] = $_POST["email"];
        $data["password"] = md5($_POST["password"]);

        $usuario = $this->model->obtenerUsuarioPorEmail($data);
        if($usuario){
            $data["usuario"] = $usuario;
            
            // var_dump($usuario);
            echo $this->renderer->render( "view/inicioView.php", $data );
        }else{
            $data["alert"] = array("class" => "danger", "message" => "usuario y/o contraseña incorrecto/s");
            echo $this->renderer->render( "view/homeView.php", $data );

        }
    }

    public function cerrarSesion(){
        if(session_destroy()){
            $data= 
            array(
                'mensaje' => "Sesion cerrada con éxito"
              );
            echo $this->renderer->render( "view/homeView.php", $data );
        }

    }
    

   
}