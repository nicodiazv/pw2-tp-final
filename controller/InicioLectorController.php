<?php
class InicioLectorController {
    private $renderer;
    private $catalogoModel;
    private $notaModel;

    public function __construct($catalogoModel,$notaModel, $renderer){
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->catalogoModel = $catalogoModel;
        $this->notaModel = $notaModel;

    }

    public function index(){
        $data["catalogos"] = $this->catalogoModel->obtenerCatalogos();
        $data["notas"] = $this->notaModel->obtenerNotas();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/lectorViews/inicioLectorView.php",$data);
        return;
    }

    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        //Por única vez se carga en sesión
        $_SESSION["cantRevistasPorCatalogo"] = $this->catalogoModel->cantRevistasPorCatalogo();
        $data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];


//        $clima = new Clima();
//        $climaActual = $clima->getClimaActualResumido();
//        $data["climaActual"] = $climaActual;
    }
}