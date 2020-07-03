<?php

class ReportesController {
    private $renderer;
    private $usuarioModel;
    private $tcpdf;
    private $notaModel;
    private $publicacionModel;
    private $seccionModel;
    private $revistaModel;
    private $data;

    public function __construct($tcpdf,$usuarioModel,$notaModel, $seccionModel, $revistaModel, $publicacionModel, $renderer) {
        ValidateSession::validarSesionAdministrador();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->tcpdf = $tcpdf;

        $this->usuarioModel = $usuarioModel;

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


    

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}