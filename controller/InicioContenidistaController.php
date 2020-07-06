<?php

class InicioContenidistaController {
    private $renderer;
    private $notaModel;
    private  $publicacionModel;
    private $data;

    public function __construct($notaModel,$publicacionModel, $renderer) {
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->publicacionModel = $publicacionModel;
        $this->modelSideBar($this->data);
    }

    public function index() {
        ValidateSession::validarSesionContenidista();
        echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $this->data);
    }

    public function modelSideBar(&$refArrayData) {
        $this->data["usuario"] = $_SESSION["usuario"];
        $_SESSION["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        $_SESSION["publicaciones"]  = $this->publicacionModel->obtenerMisPublicaciones($_SESSION["usuario"]["id"]);
        $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        $this->data["publicaciones"] = $_SESSION["publicaciones"];
    }

}