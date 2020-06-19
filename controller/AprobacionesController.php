<?php

class AprobacionesController{
    private $renderer;
    private $model;
    private $seccionModel;

    public function __construct($model, $seccionModel, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->model = $model;
        $this->seccionModel = $seccionModel;
    }

    public function index(){
        echo $this->renderer->render( "view/administradorViews/aprobacionesView.php");
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
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

    public function seccionesPendientes()
    {
        $this->modelSideBar($data);
        $data['seccionesPendientesAprobacion'] = $this->seccionModel->seccionesPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/seccionesPendientesView.php",$data);
    }

    public function aprobarSeccion()
    {
        if(isset($_GET['id']))
            $this->seccionModel->aprobarSeccion($_GET['id']);
        $this->seccionesPendientes();
    }

    public function rechazarSeccion()
    {
        if(isset($_GET['id']))
            $this->seccionModel->rechazarSeccion($_GET['id']);
        $this->seccionesPendientes();
    }

}