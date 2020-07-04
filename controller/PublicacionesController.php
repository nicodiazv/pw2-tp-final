<?php

class PublicacionesController {
    private $renderer;
    private $publicacionModel;
    private $revistaModel;
    private $data;


    public function __construct($publicacionModel,$revistaModel, $renderer) {
        $this->modelSideBar($this->data);
        $this->renderer = $renderer;
        $this->publicacionModel = $publicacionModel;
        $this->revistaModel = $revistaModel;
    }

    public function index() {
        $usuario_id = $_SESSION["usuario"]["id"];
        if (ValidateSession::esContenidista()) {
            $this->data['publicaciones'] = $this->publicacionModel->obtenerMisPublicaciones($usuario_id);
            echo $this->renderer->render("view/contenidistaViews/verPublicacionesView.php", $this->data);
        }
        if (ValidateSession::esLector()) {
            $this->data['publicaciones'] = $this->publicacionModel->obtenerPublicacionesDisponiblesParaUsuario($this->data['usuario']['id']);
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $this->data);
        }
    }

    public function publicacion() {
        try {
            $idPublicacion = isset($_GET['id']) ? $_GET['id'] : false;
            ValidateParameter::validateCleanParameter($idPublicacion);

            $this->data['publicacion'] = $this->publicacionModel->obtenerPublicacionPorId($idPublicacion);
            $this->data['notasDePublicacion'] = $this->publicacionModel->obtenerNotasDisponiblesDePublicacion($idPublicacion);
            echo $this->renderer->render("view/lectorViews/verPublicacionView.php", $this->data);
        } catch (FortException $e) {
            echo $this->renderer->render("view/lectorViews/verPublicacionesView.php", $this->data);
        }
    }

    public function revista() {
        try {
            $idRevista = isset($_GET['id']) ? $_GET['id'] : false;
            ValidateParameter::validateCleanParameter($idRevista);

            $this->data['publicacionesDeRevista'] = $this->publicacionModel->obtenerPublicacionesDeRevista($idRevista);
            $this->data['nombre_revista'] = Array("nombre_revista" => $this->data['publicacionesDeRevista'][0]["nombre_revista"]);
        } catch (FortException $e) {

        }
        echo $this->renderer->render("view/lectorViews/publicacionesDeRevistaView.php", $this->data);
    }

    public function crearPublicacion(){
        try {

            $this->data['revistas'] = $this->revistaModel->obtenerRevistasAprobadas();
            echo $this->renderer->render("view/contenidistaViews/crearPublicacionView.php",$this->data);
        } catch (FortException $e) {

        }
    }

    public function desactivar(){
        $usuario_id = $_SESSION["usuario"]["id"];
        $id = ValidateParameter::validateCleanParameter($_GET['id']);
        $this->data["alert"] = array("class" => "success", "message" => "La publicación ha sido desactivada correctamente.");
        $this->publicacionModel->desactivarPublicacion($id);
        $this->data['publicaciones'] = $this->publicacionModel->obtenerMisPublicaciones($usuario_id);
        echo $this->renderer->render("view/contenidistaViews/verPublicacionesView.php", $this->data);
    }

    public function guardarPublicacion() {
        ValidateSession::validarSesionContenidista();
        $usuario_id = $_SESSION["usuario"]["id"];
        try {
            $nombre = ValidateParameter::validateCleanParameter($_POST["titulo"]);
            $revista_id = ValidateParameter::validateCleanParameter($_POST["revista"]);
            $precio = ValidateParameter::validateCleanParameter($_POST["precio"]);
        } catch (Exception $e) {
            $this->error["class"] = "danger";
            $this->error["message"] = "Error al crear la publicación";
            echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $this->data);
            return;
        }

        $guardada = $this->publicacionModel->guardarPublicacion($nombre,$precio,$revista_id,$usuario_id);

        if ($guardada) $this->data["alert"] = array("class" => "success", "message" => "La publicación \"$nombre\" ha sido creada correctamente y pasará a estado pendiente de aprobación."); else $data["alert"] = array("class" => "danger", "message" => "La publicación no ha sido creada por algún error imprevisto");
        echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $this->data);

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