<?php

class PublicacionesController {
    private $renderer;
    private $publicacionModel;
    private $data;


    public function __construct($publicacionModel, $renderer) {
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->publicacionModel = $publicacionModel;
    }

    public function index() {
        if (ValidateSession::esContenidista()) {
            $this->data['publicaciones'] = $this->publicacionModel->obtenerPublicaciones();
            echo $this->renderer->render("view/contenidistaViews/verPublicacionesView.php", $this->data);
        }
        if (ValidateSession::esLector()) {
            $this->data['publicaciones'] = $this->publicacionModel->obtenerPublicacionesDisponiblesParaUsuario($this->data['usuario']['id']);
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $this->data);
        }
    }

    public function publicacion() {
        try {
            $idPublicacion = ValidateParameter::validateCleanParameter($_GET['id']);
            $this->data['publicacion'] = $this->publicacionModel->obtenerPublicacionPorId($idPublicacion);
            $this->data['notasDePublicacion'] = $this->publicacionModel->obtenerNotasDisponiblesDePublicacion($idPublicacion);
            echo $this->renderer->render("view/lectorViews/verPublicacionView.php", $this->data);
        } catch (FortException $e) {
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $this->data);
        }
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {
            $this->data["cantRevistasPorCatalogo"] = $_SESSION["cantRevistasPorCatalogo"];
        }
        if (ValidateSession::esContenidista()) {
            $this->data["notasPorCategoria"] = $_SESSION["notasPorCategoria"];
        }
    }

}