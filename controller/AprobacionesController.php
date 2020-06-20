<?php

class AprobacionesController{
    private $renderer;
    private $model;
    private $seccionModel;
    private $revistaModel;

    public function __construct($model, $seccionModel, $revistaModel, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->model = $model;
        $this->seccionModel = $seccionModel;
        $this->revistaModel = $revistaModel;
    }

    public function index(){
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/administradorViews/aprobacionesView.php",$data);
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

    public function revistasPendientes(){
        $this->modelSideBar($data);
        $data['revistasPendientesAprobacion'] = $this->revistaModel->revistasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/revistasPendientesView.php",$data);
    }

    public function revistaPendiente(){
        $this->modelSideBar($data);
        $idRevista = $_GET['id'];
        $data['revistaPendiente'] = $this->revistaModel->obtenerRevistaPendienteAprobacion($idRevista);
        echo $this->renderer->render( "view/administradorViews/revistaPendienteView.php",$data);
    }

    public function aprobarRevista() {
        $this->modelSideBar($data);
        try {
            $idRevista = ValidateParameter::validateParam($_POST['id']);
            $this->revistaModel->aprobarRevista($idRevista);
            $data["alert"] = array("class" => "success", "message" => "La revista ha sido aprobada correctamente");
            echo $this->renderer->render( "view/administradorViews/aprobacionesView.php",$data);

        }catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en la aprobación de la revista");
            echo $this->renderer->render("view/administradorViews/aprobacionesView.php", $data);
        }
    }

    public function rechazarRevista() {
        $this->modelSideBar($data);
        try {
            $idRevista = ValidateParameter::validateParam($_POST['id']);
            $this->revistaModel->rechazarRevista($idRevista);
            $data["alert"] = array("class" => "success", "message" => "La revista ha sido rechazada correctamente");
            echo $this->renderer->render( "view/administradorViews/aprobacionesView.php",$data);

        }catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en el rechazo de la revista");
            echo $this->renderer->render("view/administradorViews/aprobacionesView.php", $data);
        }
    }
}