<?php
class NotaController
{

    private $renderer;
    private $notaModel;
    private $seccionModel;
    private $publicacionModel;

    private $error = array();

    public function __construct($notaModel, $seccionModel, $publicacionModel, $renderer) {
        $this->renderer = $renderer;
        $this->notaModel = $notaModel;
        $this->seccionModel = $seccionModel;
        $this->publicacionModel = $publicacionModel;
    }

    public function index()
    {
        $this->modelSideBar($data);
        
        $usuario = $_SESSION['usuario'];
        if (ValidateSession::esContenidista()){
            $data['notas'] = $this->notaModel->obtenerNotasCreadas($usuario['id']);
            echo $this->renderer->render("view/contenidistaViews/verNotasView.php", $data);  
        } 
        if (ValidateSession::esLector()) {
            $data['notas'] = $this->notaModel->obtenerNotasAprobadas();
            echo $this->renderer->render("view/lectorViews/verNotasView.php", $data);
        }
    }
    public function crearNota()
    {
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        $data['secciones'] = $this->seccionModel->obtenerSecciones();
        $data['flashMessage'] = $this->error;

        echo $this->renderer->render("view/contenidistaViews/crearNotaView.php", $data);
        return;
    }

    public function guardarNota()
    {
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        $usuario_id = $_SESSION["usuario"]["id"];
        try {

            $titulo = ValidateParameter::validateParam($_POST["titulo"]);
            $ubicacion = ValidateParameter::validateParam($_POST["ubicacion"]);
            $place_id = $_POST["place_id"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];
            $enlace = ValidateParameter::validateParam($_POST["enlace"]);
            $seccion_id = ValidateParameter::validateParam($_POST["seccion"]);
            $cuerpo = ValidateParameter::validateParam($_POST["cuerpo"]);
            $copete = ValidateParameter::validateParam($_POST["copete"]);

            //Subir imagen de la nota
            $imagen = $_FILES['uploadedImage'];
            $imagenNombre = UploadImage::subirFoto($imagen, ImagesDirectory::NOTAS);
        } catch (Exception $e) {
            $this->error["class"] = "danger";
            $this->error["message"] = "Error en la carga de la nota";
            $this->crearNota();
            return;
        }

        $nota_guardada = $this->notaModel->guardarNota($usuario_id, $titulo, $ubicacion, $place_id, $lat, $lng, $seccion_id, $cuerpo, $imagenNombre, $enlace, $copete);

        if($nota_guardada) $data["alert"] = array("class" => "success", "message" => "La nota \"$titulo\" ha sido creada correctamente");
        else $data["alert"] = array("class" => "danger", "message" => "La nota no ha sido creada por algun error imprevisto");
        echo $this->renderer->render("view/contenidistaViews/inicioContenidistaView.php", $data);

    }

    public function verNota() {

        try{
            $nota_id = ValidateParameter::validateParam($_GET['id']);

        }catch(FortException $e){
            $this->index();
        }

        $data['nota'] = $this->notaModel->getNota($nota_id);

        if (ValidateSession::esLector()) {
            echo $this->renderer->render("view/lectorViews/verNotaView.php", $data);
            exit();
        }

        $this->modelSideBar($data);
        $data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        echo $this->renderer->render("view/contenidistaViews/verNotaView.php", $data);
    }

    public function agregarNotaAPublicacion()
    {
        ValidateSession::validarSesionContenidista();
        $nota_id = ValidateParameter::validateParam($_GET['id']);
        $this->modelSideBar($data);
        $data['nota'] = $this->notaModel->getNota($nota_id);
        $data['publicaciones'] = $this->publicacionModel->obtenerNroPublicaciones();
        $data['notasPublicaciones'] = $this->publicacionModel->obtenerNotasEnNroPublicacionesPorNotaId($nota_id);
        echo $this->renderer->render("view/contenidistaViews/agregarNotaAPublicacionView.php", $data);
    }

    public function notasPorCategoria()
    {
        ValidateSession::validarSesionContenidista();
        $this->modelSideBar($data);
        $usuario_id = $_SESSION["usuario"]["id"];
        $seccion_id = $_GET['id'];
        $data["notas"] = $this->notaModel->notasPorSeccionYUsuario($usuario_id, $seccion_id);
        // echo $this->renderer->render("view/contenidistaViews/notasPorCategoriaView.php", $data);
        echo $this->renderer->render("view/contenidistaViews/verNotasView.php", $data);
    }

    public function enviarSolicitud()
    {
        ValidateSession::validarSesionContenidista();
        $nota_id = ValidateParameter::validateParam($_POST['nota_id']);
        $publicacion_id = ValidateParameter::validateParam($_POST['publicacion_id']);
        $resultado = $this->publicacionModel->enviarSolicitudNota($nota_id, $publicacion_id);
        $this->index();
    }

    public function modelSideBar(&$data)
    {
        $data["usuario"] = $_SESSION["usuario"];
        if (ValidateSession::esLector()) {

        }
        if (ValidateSession::esContenidista()) {
            $data["notasPorCategoria"] = $this->notaModel->cantidadNotasPorSeccionYUsuario($_SESSION["usuario"]["id"]);
        }
    }
}
