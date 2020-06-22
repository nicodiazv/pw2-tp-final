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
        $this->modelSideBar($data);
        $data['revistas'] = $this->revistaModel->obtenerRevistas();
        $data['catalogosDeLaRevista'] = $this->revistaModel->catalogosDeLaRevista();
        $data['adquirida'] = $this->revistaModel->obtenerRevistasDelUsuario($data["usuario"]["id"]);

        echo $this->renderer->render( "view/lectorViews/RevistasView.php", $data);
    }

    public function misRevistas(){
        ValidateSession::validarSesionLector();
        $this->modelSideBar($data);
        $data['misRevistas'] = $this->revistaModel->obtenerRevistasDelUsuario($data["usuario"]["id"]);
        echo $this->renderer->render( "view/lectorViews/misRevistasView.php", $data);
    }

    public function crearRevista(){
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
        }


        public function guardarRevista(){
            ValidateSession::validarSesionContenidista();
            $this->modelSideBar($data);
            try{
                $nombre = ValidateParameter::validateParam($_POST["nombre"]);
//                $imagen= ValidateParameter::validateParam($_POST["imagen"]);
                $descripcion = ValidateParameter::validateParam($_POST["descripcion"]);
                $precioMensual = ValidateParameter::validateParam($_POST["precioMensual"]);

                $this->revistaModel->validarNombreRevista($nombre);

                //Subir imagen de la nota
                $imagen = $_FILES['uploadedImage'];
                $imagenNombre = UploadImage::subirFoto($imagen,ImagesDirectory::REVISTAS);

                // Guardar revista
                $idUsuario = $data['usuario']['id'];
                $data["revistaCreada"] = $this->revistaModel->guardarRevista($nombre,$descripcion,$imagenNombre,$precioMensual,$idUsuario);
                $data["alert"] = array("class" => "success", "message" => "La revista se ha creado correctamente");
                echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);

            }catch (FortException $e){
                $data["alert"] = array("class" => "danger", "message" => "Ocurrió un error en la creación de la revista");
                echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
            } catch (Exception $e) {
                $data["alert"] = array("class" => "danger", "message" => "Ocurrió un error en la subida de la imágen");
                echo $this->renderer->render( "view/contenidistaViews/crearRevistaView.php", $data);
            }

        }
    public function modelSideBar(&$data){
        $data["usuario"] = $_SESSION["usuario"];
        $data["cantRevistasPorCatalogo"]  = $this->catalogoModel->cantRevistasPorCatalogo();
    }

}