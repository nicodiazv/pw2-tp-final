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
        $usuario_id = $_SESSION["usuario"]["id"];
        $_SESSION["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        $this->data["publicaciones"] = $this->publicacionModel->obtenerMisPublicaciones($usuario_id);
    }

}