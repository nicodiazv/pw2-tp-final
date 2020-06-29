<?php

class AprobacionesController{
    private $renderer;
    private $notaModel;
    private $publicacionModel;
    private $seccionModel;
    private $revistaModel;

    public function __construct($notaModel,$seccionModel,$revistaModel,$publicacionModel, $renderer){
        ValidateSession::validarSesionAdministrador();
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->revistaModel = $revistaModel;
        $this->publicacionModel = $publicacionModel;
    }

    public function index(){
        $this->modelSideBar($data);
        $data['notas'] = $this->notaModel->cantidad_notasPendientesAprobacion();
        $data['notasPublicaciones'] = $this->publicacionModel->cantidad_obtenerNotasEnNroPublicacionesPendientes();
        $data['secciones'] = $this->seccionModel->cantidad_seccionesPendientesAprobacion();
        $data['revistas'] = $this->revistaModel->cantidad_revistasPendientesAprobacion();

        echo $this->renderer->render( "view/administradorViews/aprobacionesView.php", $data);
    }



    public function notasPendientes(){
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
        $data['notasEnPublicacionPendientesAprobacion'] = $this->publicacionModel->obtenerNotasEnNroPublicacionesPendientes();
        echo $this->renderer->render( "view/administradorViews/notasEnPublicacionesPendientesView.php",$data);
    }

    public function aprobarNotaEnNroPublicacion(){
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $this->publicacionModel->aprobarNotaEnNroPublicacion($nota_id, $publicacion_id);
        $this->index();
    }

    public function rechazarNotaEnNroPublicacion(){
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $this->publicacionModel->rechazarNotaEnNroPublicacion($nota_id, $publicacion_id);
        $this->index();
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

    public function revistasPendientes(&$data=array()){
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
            return $this->revistasPendientes($data);
            // echo $this->renderer->render( "view/administradorViews/revistasPendientesView.php",$data);

        }catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en la aprobación de la revista");
            return $this->revistasPendientes($data);
            // echo $this->renderer->render("view/administradorViews/revistasPendientesView.php", $data);
        }
    }

    public function rechazarRevista() {
        $this->modelSideBar($data);
        try {
            $idRevista = ValidateParameter::validateParam($_POST['id']);
            $this->revistaModel->rechazarRevista($idRevista);
            $data["alert"] = array("class" => "success", "message" => "La revista ha sido rechazada correctamente");
            return $this->revistasPendientes($data);
            echo $this->renderer->render( "view/administradorViews/aprobacionesView.php",$data);

        }catch (FortException $e) {
            $data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en el rechazo de la revista");
            return $this->revistasPendientes($data);
            echo $this->renderer->render("view/administradorViews/aprobacionesView.php", $data);
        }
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
    }
}