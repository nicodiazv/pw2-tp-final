<?php


class RevistasController {
    private $renderer;
    private $revistaModel;
    private $catalogoModel;

    public function __construct($revistaModel,$catalogoModel,$renderer) {
        $this->renderer = $renderer;
        $this->revistaModel = $revistaModel;
        $this->catalogoModel = $catalogoModel;
    }

    public function index(){
        $this->modelSideBar($data);
        $this->revistas();
    }


    public function revistas(){
        ValidateSession::validarSesionLector();
        $data['revistas'] = $this->revistaModel->obtenerRevistas();
        $data['catalogosDeLaRevista'] = $this->revistaModel->catalogosDeLaRevista();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/RevistasView.php", $data);
    }

    public function crearRevista(){
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);

            echo $this->renderer->render( "view/crearRevistaView.php", $data);
        }


        public function guardarRevista(){
            ValidateSession::validarSesionContenidista();
            $this->modelSideBar($data);
            $nombre= $this->validateParam($_POST["nombre"]);
            $imagen= $this->validateParam($_POST["imagen"]);
            $descripcion = $this->validateParam($_POST["descripcion"]);
            $precioMensual = $this->validateParam($_POST["precioMensual"]);
            $data["revistaCreada"] = $this->revistaModel->guardarRevista($nombre,$imagen,$descripcion,$precioMensual);
            header("Location: /");
            echo $this->renderer->render( "view/crearRevistaView.php", $data);


        }
    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }

    public function validateParam($parametro){
        if(isset($parametro) && $parametro!=""){
            return $parametro;
        }else{
            return new Exception();
        }
    }
}