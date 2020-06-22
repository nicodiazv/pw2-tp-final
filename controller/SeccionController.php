<?php

class SeccionController{

    private $renderer;
    private $seccionModel;

    public function  __construct($model, $renderer)
    {
        $this->renderer = $renderer;
        $this->seccionModel = $model;
    }

    public function index()
    {
        if(isset($_SESSION["usuario"]))
        {
            $usuario = $_SESSION["usuario"];
            echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $usuario);
            exit;
        }

        echo $this->renderer->render( "view/homeView.php");
    }

    public function crearSeccion()
    {
        if(isset($_SESSION["usuario"]) && $_SESSION['usuario']['usuario_tipo_id'] == 2)
        {
            echo $this->renderer->render("view/contenidistaViews/crearSeccionView.php");
            return;
        }
        $data["flashMessage"] = array("class"=>"danger","message"=>"No posee permisos para crear secciones");
        echo $this->renderer->render( "view/homeView.php",$data);
    }

    public function guardarSeccion()
    {
        if(isset($_POST["nombre"]))
        {
            $seccionName = $_POST["nombre"];
            $id = $this->seccionModel->guardarSeccion($seccionName);

            if ($id !== 0)
                $data["alert"] = array("class"=>"success","message"=>"Sección creada correctamente ($seccionName)");
            else
                $data["alert"] = array("class"=>"danger","message"=>"No se pudo guardar la sección ($seccionName). Valide si ya existe y vuelva a intentarlo.");

            echo $this->renderer->render( "view/contenidistaViews/inicioContenidistaView.php", $data);
            return;
        }

    }


}