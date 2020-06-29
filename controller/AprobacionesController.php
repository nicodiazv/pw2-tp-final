<?php

class AprobacionesController {
    private $renderer;
    private $notaModel;
    private $publicacionModel;
    private $seccionModel;
    private $revistaModel;
    private $data;

    public function __construct($notaModel, $seccionModel, $revistaModel, $publicacionModel, $renderer) {
        ValidateSession::validarSesionAdministrador();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->revistaModel = $revistaModel;
        $this->publicacionModel = $publicacionModel;
    }

    public function index() {
        $this->data['notas'] = $this->notaModel->cantidad_notasPendientesAprobacion();
        $this->data['notasPublicaciones'] = $this->publicacionModel->cantidad_obtenerNotasEnNroPublicacionesPendientes();
        $this->data['secciones'] = $this->seccionModel->cantidad_seccionesPendientesAprobacion();
        $this->data['revistas'] = $this->revistaModel->cantidad_revistasPendientesAprobacion();

        echo $this->renderer->render("view/administradorViews/aprobacionesView.php", $this->data);
    }

    public function notasPendientes() {
        if (isset($_GET['id'])) {
            $this->data['nota'] = $this->notaModel->getNota($_GET['id']);

            echo $this->renderer->render("view/administradorViews/notaPendienteView.php", $this->data);
            return;
        }
        $this->data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/notasPendientesView.php", $this->data);
    }

    public function aprobarNota() {
        if (isset($_GET['id'])) {
            $this->notaModel->aprobarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $this->data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/notasPendientesView.php", $this->data);
    }

    public function rechazarNota() {
        if (isset($_GET['id'])) {
            $this->notaModel->rechazarNota($_GET['id']);
            header('Location: /aprobaciones/notasPendientes');
            exit();
        }
        $this->data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/notasPendientesView.php", $this->data);
    }

    public function notasEnPublicacionesPendientes() {
        $this->data['notasEnPublicacionPendientesAprobacion'] = $this->publicacionModel->obtenerNotasEnNroPublicacionesPendientes();
        echo $this->renderer->render("view/administradorViews/notasEnPublicacionesPendientesView.php", $this->data);
    }

    public function aprobarNotaEnNroPublicacion() {
        $nota_id = ValidateParameter::validateCleanParameter($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateCleanParameter($_POST['publicacion_id']);
        $this->publicacionModel->aprobarNotaEnNroPublicacion($nota_id, $publicacion_id);
        $this->index();
    }

    public function rechazarNotaEnNroPublicacion() {
        $nota_id = ValidateParameter::validateCleanParameter($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateCleanParameter($_POST['publicacion_id']);
        $this->publicacionModel->rechazarNotaEnNroPublicacion($nota_id, $publicacion_id);
        $this->index();
    }

    public function seccionesPendientes() {
        $this->data['seccionesPendientesAprobacion'] = $this->seccionModel->seccionesPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/seccionesPendientesView.php", $this->data);
    }

    public function aprobarSeccion() {
        if (isset($_GET['id'])) $this->seccionModel->aprobarSeccion($_GET['id']);
        $this->seccionesPendientes();
    }

    public function rechazarSeccion() {
        if (isset($_GET['id'])) $this->seccionModel->rechazarSeccion($_GET['id']);
        $this->seccionesPendientes();
    }

    public function revistasPendientes(&$data = array()) {
        $this->data['revistasPendientesAprobacion'] = $this->revistaModel->revistasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/revistasPendientesView.php", $this->data);
    }

    public function revistaPendiente() {
        $idRevista = $_GET['id'];
        $this->data['revistaPendiente'] = $this->revistaModel->obtenerRevistaPendienteAprobacion($idRevista);
        echo $this->renderer->render("view/administradorViews/revistaPendienteView.php", $this->data);
    }

    public function aprobarRevista() {
        try {
            $idRevista = ValidateParameter::validateCleanParameter($_POST['id']);
            $this->revistaModel->aprobarRevista($idRevista);
            $this->data["alert"] = array("class" => "success", "message" => "La revista ha sido aprobada correctamente");
            $this->revistasPendientes($this->data);
            // echo $this->renderer->render( "view/administradorViews/revistasPendientesView.php",$data);

        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en la aprobación de la revista");
            $this->revistasPendientes($this->data);
            // echo $this->renderer->render("view/administradorViews/revistasPendientesView.php", $data);
        }
    }

    public function rechazarRevista() {
        try {
            $idRevista = ValidateParameter::validateCleanParameter($_POST['id']);
            $this->revistaModel->rechazarRevista($idRevista);
            $this->data["alert"] = array("class" => "success", "message" => "La revista ha sido rechazada correctamente");
            $this->revistasPendientes($this->data);

        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en el rechazo de la revista");
            $this->revistasPendientes($this->data);
        }
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}