<?php
class InicioLectorController {
    private $renderer;
    private $catalogoModel;
    private $notaModel;
    private $data;

    public function __construct($catalogoModel,$notaModel, $renderer){
        ValidateSession::validarSesionLector();
        $this->renderer = $renderer;
        $this->catalogoModel = $catalogoModel;
        $this->notaModel = $notaModel;
        $this->modelSideBar($this->data);

    }

    public function index(){
        $this->data["catalogos"] = $this->catalogoModel->obtenerCatalogos();
        $this->data["notas"] = $this->notaModel->obtenerNotas();
        echo $this->renderer->render( "view/lectorViews/inicioLectorView.php",$this->data);
        return;
    }

    public function modelSideBar(&$refArrayData){
        $this->data["usuario"] = $_SESSION["usuario"];
        //Por única vez se carga en sesión
        $_SESSION["cantRevistasPorCatalogo"] = $this->catalogoModel->cantRevistasPorCatalogo();
        $this->data["cantRevistasPorCatalogo"]  = $_SESSION["cantRevistasPorCatalogo"];


//        $clima = new Clima();
//        $climaActual = $clima->getClimaActualResumido();
//        $this->data["climaActual"] = $climaActual;
    }
}