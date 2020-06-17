<?php

class AprobacionesController{
    private $renderer;
    private $model;

    public function __construct($model, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->model = $model;
    }

    public function index(){

    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }

    public function registrar(){
        echo $this->renderer->render( "view/crearusuarioView.php");
    }

    public function notasPendientes(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $data['nota'] = $this->model->getNota($_GET['id']);

            echo $this->renderer->render( "view/administradorViews/notaPendienteView.php",$data);
            return;
        }
        $data['notasPendientesAprobacion'] = $this->model->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }
    public function aprobarNota(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $this->model->aprobarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $data['notasPendientesAprobacion'] = $this->model->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }

    public function rechazarNota(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $this->model->rechazarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $data['notasPendientesAprobacion'] = $this->model->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }




}