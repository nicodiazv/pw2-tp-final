<?php

class AprobacionesController{
    private $renderer;
    private $notaModel;
    private $publicacionModel;


    public function __construct($notaModel,$publicacionModel, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->publicacionModel = $publicacionModel;

    }

    public function index(){
        $data['notas'] = $this->notaModel->cantidad_notasPendientesAprobacion();
        $data['notasPublicaciones'] = $this->publicacionModel->cantidad_obtenerNotasEnPublicacionesPendientes();
        echo $this->renderer->render( "view/administradorViews/aprobacionesView.php", $data);
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }

    public function notasPendientes(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $data['nota'] = $this->notaModel->getNota($_GET['id']);

            echo $this->renderer->render( "view/administradorViews/notaPendienteView.php",$data);
            return;
        }
        $data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }
    public function aprobarNota(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $this->notaModel->aprobarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }

    public function rechazarNota(){
        $this->modelSideBar($data);
        if(isset($_GET['id']))
        {
            $this->notaModel->rechazarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render( "view/administradorViews/notasPendientesView.php",$data);
    }

    public function notasEnPublicacionesPendientes(){
        $data['notasEnPublicacionPendientesAprobacion'] = $this->publicacionModel->obtenerNotasEnPublicacionesPendientes();
        echo $this->renderer->render( "view/administradorViews/notasEnPublicacionesPendientesView.php",$data);
    }

    public function aprobarNotaEnPublicacion(){
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $this->publicacionModel->aprobarNotaEnPublicacion($nota_id, $publicacion_id);
        $this->index();
    }




}