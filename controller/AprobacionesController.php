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
            $this->data["alert"] = array("class" => "success", "message" => "La nota ha sido aprobada correctamente");
        }
        $this->data['notasPendientesAprobacion'] = $this->notaModel->notasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/notasPendientesView.php", $this->data);

    }

    public function rechazarNota() {
        if (isset($_GET['id'])) {
            $this->notaModel->rechazarNota($_GET['id']);
            $this->data["alert"] = array("class" => "success", "message" => "La nota ha sido rechazada correctamente");
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
        $this->data["alert"] = array("class" => "success", "message" => "La nota ha sido aprobada correctamente en la publicación.");
        $this->index();
    }

    public function rechazarNotaEnNroPublicacion() {
        $nota_id = ValidateParameter::validateCleanParameter($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateCleanParameter($_POST['publicacion_id']);
        $this->publicacionModel->rechazarNotaEnNroPublicacion($nota_id, $publicacion_id);
        $this->index();
    }

    public function seccionesPendientes($data = null) {
        $this->data['seccionesPendientesAprobacion'] = $this->seccionModel->seccionesPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/seccionesPendientesView.php", $this->data);
    }

    public function aprobarSeccion() {
        if (isset($_GET['id'])) $this->seccionModel->aprobarSeccion($_GET['id']);
        $this->data["alert"] = array("class" => "success", "message" => "La sección ha sido aprobada correctamente");
        $this->seccionesPendientes($this->data);
    }

    public function rechazarSeccion() {
        if (isset($_GET['id'])) $this->seccionModel->rechazarSeccion($_GET['id']);
        $this->data["alert"] = array("class" => "success", "message" => "La sección ha sido rechazada correctamente");
        $this->seccionesPendientes();
    }

    public function revistasPendientes(&$data = array()) {
        $this->data['revistasPendientesAprobacion'] = $this->revistaModel->revistasPendientesAprobacion();
        echo $this->renderer->render("view/administradorViews/revistasPendientesView.php", $this->data);
    }

    public function revistaPendiente() {
        $idRevista = isset($_GET["id"]) ? $_GET["id"] : false;
        $this->data['revistaPendiente'] = $this->revistaModel->obtenerRevistaPendienteAprobacion($idRevista);
        echo $this->renderer->render("view/administradorViews/revistaPendienteView.php", $this->data);
    }

    public function aprobarRevista() {
        try {
            $idRevista = isset($_POST['id']) ? $_POST['id'] : false;
            $idRevista = ValidateParameter::validateCleanParameter($idRevista);
            $this->revistaModel->aprobarRevista($idRevista);
            $this->data["alert"] = array("class" => "success", "message" => "La revista ha sido aprobada correctamente");
        } catch (FortException $e) {
            $this->data["alert"] = array("class" => "danger", "message" => "Se ha producido un error en la aprobación de la revista");
        }
        $this->revistasPendientes($this->data);
    }

    public function rechazarRevista() {
        try {
            $idRevista = isset($_POST['id']) ? $_POST['id'] : false;
            ValidateParameter::validateCleanParameter($idRevista);
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