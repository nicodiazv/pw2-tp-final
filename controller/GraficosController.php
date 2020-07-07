<?php

class GraficosController {
    private $renderer;
    private $graficoModel;
    private $notaModel;
    private $publicacionModel;
    private $seccionModel;
    private $revistaModel;
    private $data;

    public function __construct($graficoModel,$notaModel, $seccionModel, $revistaModel, $publicacionModel, $renderer) {
        ValidateSession::validarSesionAdministrador();
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->graficoModel = $graficoModel;
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

        echo $this->renderer->render("view/administradorViews/graficosView.php", $this->data);
    }

    public function notas(){
        $this->data["notasPorSeccion"] = $this->graficoModel->notasCreadasPorSecciones();
        $this->data["cantidadNotas"] = $this->graficoModel->cantidadNotas();

        echo $this->renderer->render("view/administradorViews/graficosNotasView.php", $this->data);
    }

    public function comprasYSuscripciones(){
        $this->data["compras"] = $this->graficoModel->cantidadComprasPorMes();
        $this->data["suscripciones"] = $this->graficoModel->cantidadSuscripcionesPorMes();

        echo $this->renderer->render("view/administradorViews/graficosComprasSuscripcionesView.php", $this->data);
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
    }
}