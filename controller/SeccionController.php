<?php

class SeccionController{

    private $renderer;
    private $seccionModel;

    public function  __construct($seccionModel, $renderer) {
        $this->renderer = $renderer;
        $this->seccionModel = $seccionModel;
    }

    public function index() {
        $this->modelSideBar($data);
        if(isset($_SESSION["usuario"]))
        {
            $usuario = $_SESSION["usuario"];
            echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $usuario);
            exit;
        }

        echo $this->renderer->render( "view/homeView.php");
    }

    public function crearSeccion() {
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        echo $this->renderer->render("view/contenidistaViews/crearSeccionView.php",$data);
    }

    public function guardarSeccion() {
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);

        if(isset($_POST["nombre"]))
        {
            $seccionName = $_POST["nombre"];
            $id = $this->seccionModel->guardarSeccion($seccionName);

            if ($id !== 0)
                $data["alert"] = array("class"=>"success","message"=>"Sección \"$seccionName\" creada correctamente y pasará a estado de aprobación.");
            else
                $data["alert"] = array("class"=>"danger","message"=>"No se pudo crear la sección \"$seccionName \". Valide si ya existe y vuelva a intentarlo.");

            echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $data);
            return;
        }

    }

    public function modelSideBar(&$data) {
        $data["usuario"] = $_SESSION["usuario"];

        if (ValidateSession::esLector()) {

        }
        if (ValidateSession::esContenidista()) {
            $data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        }
    }

}