<?php

class PublicacionesController {
    private $renderer;
    private $publicacionModel;
    private $notaModel;


    public function __construct($publicacionModel, $notaModel, $renderer) {
        $this->renderer = $renderer;
        $this->publicacionModel = $publicacionModel;
        $this->notaModel = $notaModel;
    }

    public function index() {
//        $this->sideBarModel->obtenerSideBar();
        if (ValidateSession::esContenidista()) {
            $data['publicaciones'] = $this->publicacionModel->obtenerPublicaciones();
            echo $this->renderer->render("view/contenidistaViews/verPublicacionesView.php", $data);
        }
        if (ValidateSession::esLector()) {
            $data['publicaciones'] = $this->publicacionModel->obtenerPublicacionesDisponiblesParaUsuario($data['usuario']['id']);
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $data);
        }


    }

    public function publicacion() {

        try {
            $idPublicacion = ValidateParameter::validateParam($_GET['id']);
            $data['publicacion'] = $this->publicacionModel->obtenerPublicacionPorId($idPublicacion);
            $data['notasDePublicacion'] = $this->publicacionModel->obtenerNotasDisponiblesDePublicacion($idPublicacion);
            echo $this->renderer->render("view/lectorViews/verPublicacionView.php", $data);
        } catch (FortException $e) {
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $data);
        }

    }

}