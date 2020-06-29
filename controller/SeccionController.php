<?php

class SeccionController{

    private $renderer;
    private $seccionModel;
    private $notaModel;

    public function  __construct($seccionModel,$notaModel, $renderer) {
        $this->renderer = $renderer;
        $this->seccionModel = $seccionModel;
        $this->notaModel = $notaModel;
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
        $this->modelSideBar($data);
        if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] == 2)
        {
            echo $this->renderer->render("view/contenidistaViews/crearSeccionView.php");
            return;
        }
        $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear secciones");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

    public function guardarSeccion() {
        $this->modelSideBar($data);
        if(isset($_POST["nombre"]))
        {
            $seccionName = $_POST["nombre"];
            $id = $this->seccionModel->guardarSeccion($seccionName);

            if ($id !== 0)
                $data["alert"] = array("class"=>"success","message"=>"Sección \"$seccionName \" creada correctamente");
            else
                $data["alert"] = array("class"=>"danger","message"=>"No se pudo crear la sección \"$seccionName \". Valide si ya existe y vuelva a intentarlo.");

            echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $data);
            return;
        }

    }

    public function modelSideBar(&$data) {
        if (ValidateSession::esLector()) {

        }
        if (ValidateSession::esContenidista()) {
            $data["usuario"] = $_SESSION["usuario"];
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        }
    }

}