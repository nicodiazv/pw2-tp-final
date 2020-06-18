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
            try{
//                $nombre= $this->validateParam($_POST["nombre"]);
                $nombre = ValidateParameter::validateParam($_POST["nombre"]);
                $imagen= ValidateParameter::validateParam($_POST["imagen"]);
                $descripcion = ValidateParameter::validateParam($_POST["descripcion"]);
                $precioMensual = ValidateParameter::validateParam($_POST["precioMensual"]);
                $data["revistaCreada"] = $this->revistaModel->guardarRevista($nombre,$imagen,$descripcion,$precioMensual);
                $data["flagProcess"] = "La revista se ha creado correctamente";
                $data["classProcess"] = "success";
                echo $this->renderer->render( "view/crearRevistaView.php", $data);

            }catch (FortException $e){
                $data["flagProcess"] = "Ocurrió un error en la creación de la revista";
                $data["classProcess"] = "danger";
                echo $this->renderer->render( "view/crearRevistaView.php", $data);
            }

        }
    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }

}