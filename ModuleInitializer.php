<?php
require_once("helper/Renderer.php");
include_once("helper/Database.php");
include_once("helper/Config.php");
include_once("helper/Clima.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');
// Custom
include_once('helper/UploadImage.php');
require_once("helper/ValidateSession.php");
require_once("helper/ValidateParameter.php");
require_once("helper/FortException.php");
require_once("helper/ImagesDirectory.php");


class ModuleInitializer {
    private $renderer;
    private $config;
    private $database;

    public function __construct() {
        $this->renderer = new Renderer('view/partial');
        $this->config = new Config("config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }

    public function createRegistroController() {
        include_once("model/UsuarioModel.php");
        include_once("controller/RegistroController.php");
        $model = new UsuarioModel($this->database);
        return new RegistroController($model, $this->renderer);
    }

    public function createLoginController() {
        include_once("model/UsuarioModel.php");
        include_once("controller/LoginController.php");
        $model = new UsuarioModel($this->database);
        return new LoginController($model, $this->renderer);
    }


    public function createHomeController() {
        include_once("model/HomeModel.php");
        include_once("controller/HomeController.php");
        $model = new HomeModel($this->database);
        return new HomeController($model, $this->renderer);
    }

    public function createNotaController() {
        include_once("model/NotaModel.php");
        include_once("model/SeccionModel.php");
        include_once("model/PublicacionModel.php");

        include_once("controller/NotaController.php");
        $notaModel = new NotaModel($this->database);
        $seccionModel = new SeccionModel($this->database);
        $publicacionModel = new PublicacionModel($this->database);

        return new notaController($notaModel, $seccionModel, $publicacionModel, $this->renderer);
    }

    public function createInicioContenidistaController() {
        include_once("model/NotaModel.php");
        include_once("model/SeccionModel.php");

        include_once("controller/InicioContenidistaController.php");
        $notaModel = new NotaModel($this->database);
        $seccionModel = new SeccionModel($this->database);
        return new InicioContenidistaController($notaModel, $seccionModel, $this->renderer);
    }

    public function createInicioLectorController() {
        include_once("model/CatalogoModel.php");
        include_once("controller/InicioLectorController.php");
        $model = new CatalogoModel($this->database);
        return new InicioLectorController($model, $this->renderer);
    }

    public function createInicioAdministradorController() {
        include_once("controller/InicioAdministradorController.php");
        return new InicioAdministradorController($this->renderer);
    }

    public function createRevistasController() {
        include_once("model/RevistaModel.php");
        include_once("model/CatalogoModel.php");
        include_once("controller/RevistasController.php");
        $revistaModel = new RevistaModel($this->database);
        $catalogoModel = new CatalogoModel($this->database);
        return new RevistasController($revistaModel, $catalogoModel, $this->renderer);
    }

    public function createUsuariosController() {
        include_once("model/UsuarioModel.php");
        include_once("controller/UsuariosController.php");
        $Model = new UsuarioModel($this->database);
        return new UsuariosController($Model, $this->renderer);
    }

    
    public function createPublicacionesController()
    {
        include_once("model/PublicacionModel.php");
        include_once("controller/PublicacionesController.php");
        $Model = new PublicacionModel($this->database);
        return new PublicacionesController($Model,$this->renderer);
    }

    public function createCatalogosController()
    {
        include_once("model/CatalogoModel.php");
        include_once("controller/CatalogosController.php");
        $model = new CatalogoModel($this->database);
        return new CatalogosController($model, $this->renderer);
    }

    public function createSuscripcionesController() {
        include_once("model/SuscripcionModel.php");
        include_once("model/RevistaModel.php");
        include_once("model/CatalogoModel.php");
        include_once("model/TransaccionModel.php");
        include_once("controller/SuscripcionesController.php");
        $suscripcionModel = new SuscripcionModel($this->database);
        $catalogoModel = new CatalogoModel($this->database);
        $revistaModel = new RevistaModel($this->database);
        $transaccionModel = new TransaccionModel($this->database);
        return new SuscripcionesController($suscripcionModel, $catalogoModel, $revistaModel,$transaccionModel, $this->renderer);
    }

    public function createAprobacionesController() {
        include_once("model/SeccionModel.php");
        include_once("model/NotaModel.php");
        include_once("model/RevistaModel.php");

        include_once("model/PublicacionModel.php");
        include_once("controller/AprobacionesController.php");
        $notaModel = new NotaModel($this->database);
        $seccionModel = new SeccionModel($this->database);
        $revistaModel = new RevistaModel($this->database);
        $publicacionModel = new PublicacionModel($this->database);
        return new AprobacionesController($notaModel, $seccionModel, $revistaModel, $publicacionModel, $this->renderer);
    }

    public function createSeccionController() {
        include_once("model/SeccionModel.php");
        include_once("controller/SeccionController.php");

        $Model = new SeccionModel($this->database);
        return new SeccionController($Model, $this->renderer);
    }

    public function createDefaultController() {
        return $this->createHomeController();
    }
}