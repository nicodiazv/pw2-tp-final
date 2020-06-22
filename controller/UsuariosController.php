<?php

class UsuariosController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){
        if(isset($_SESSION["usuario"])){
            $data["usuarios"] = $this->model->obtenerTodosLosUsuarios();
            $this->modelSideBar($data);
            echo $this->renderer->render( "view/administradorViews/usuariosView.php",$data);
            return;
        }
        echo $this->renderer->render( "view/homeView.php");
    }

    public function registrar(){
        echo $this->renderer->render( "view/administradorViews/crearusuarioView.php");
    }

    public function editar(){
        $this->modelSideBar($data);
        $idusuario = $_GET["id"];
        $data["id"] = $idusuario;
        $data["usuario"] = $this->model->obtenerUsuarioPorId($data);
        $rol = $data["usuario"][0]["usuario_tipo_id"];
        if($rol == 1){
            $data["administrador"] = "Selected";
        }
        if($rol == 2){
            $data["contenidista"] = "Selected";
        }
        if($rol == 3){
            $data["lector"] = "Selected";
        }

        echo $this->renderer->render( "view/administradorViews/editarusuarioView.php",$data);
    }

    public function crearUsuario(){
        $data["nombre"] = isset($_POST["nombre"]) ?  $_POST["nombre"] : "";
        $data["apellido"] = isset($_POST["apellido"]) ?  $_POST["apellido"] : "";
        $data["email"] = isset($_POST["email"]) ?  $_POST["email"] : "";
        $data["password"] = isset($_POST["password"]) ? md5($_POST["password"]) : "";
        $data["rol"] = isset($_POST["rol"]) ?  $_POST["rol"] : "";
        $data["direccion"] = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
        $data["telefono"] = isset($_POST["telefono"]) ? $_POST["telefono"] : "";

        // Validación del lado del servidor
        if(!($data["nombre"]) or !($data["rol"]) or !($data["telefono"]) or  !($data["apellido"]) or !($data["email"]) or !($data["direccion"])){
            $data["alert"] = array("class" => "danger", "message" => "Debe Ingresar todos los campos del formulario.");
            echo $this->renderer->render("view/administradorViews/editarusuarioView.php",$data);
        }

        $this->model->registrarUsuario($data);
        $data["alert"] = array("class" => "success", "message" => "Usuario creado con éxito !!");
        echo $this->renderer->render("view/administradorViews/crearusuarioView.php",$data);
    }

    public function editarUsuario(){
        $this->modelSideBar($data);
        $data["id"] = isset($_POST["id"]) ?  $_POST["id"] : "";
        $data["nombre"] = isset($_POST["nombre"]) ?  $_POST["nombre"] : "";
        $data["apellido"] = isset($_POST["apellido"]) ?  $_POST["apellido"] : "";
        $data["email"] = isset($_POST["email"]) ?  $_POST["email"] : "";

        $data["rol"] = isset($_POST["rol"]) ?  $_POST["rol"] : "";
        $data["direccion"] = isset($_POST["direccion"]) ? $_POST["direccion"] : "";
        $data["telefono"] = isset($_POST["telefono"]) ? $_POST["telefono"] : "";

        $data["usuario"] = $this->model->obtenerUsuarioPorId($data);
        $pass = $data["usuario"][0]["password"];
        $password = $_POST["password"];
        $data["changepass"] = false;
        if($pass != $password){
            $password = md5($_POST["password"]);
            $data["changepass"] = true;
        }
        $data["password"] = $password;

        // Validación del lado del servidor
        if(!($data["id"]) or !($data["nombre"]) or !($data["rol"]) or !($data["telefono"]) or  !($data["apellido"]) or !($data["email"]) or !($data["direccion"])){
            $data["alert"] = array("class" => "danger", "message" => "Debe Ingresar todos los campos del formulario.");
        }

        $this->model->editarUsuario($data);
        $data["alert"] = array("class" => "success", "message" => "Usuario editado con éxito !!");
        echo $this->renderer->render("view/administradorViews/crearusuarioView.php",$data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }
}