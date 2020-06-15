<?php
require_once("helper/Renderer.php");
include_once("helper/Database.php");
include_once("helper/Config.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');


class ModuleInitializer
{
    private $renderer;
    private $config;
    private $database;

    public function __construct()
    {
        $this->renderer = new Renderer('view/partial');
        $this->config = new Config("config/config.ini");
        $this->database = Database::createDatabaseFromConfig($this->config);
    }

    public function createPresentacionesController()
    {
        include_once("model/PresentacionesModel.php");
        include_once("controller/PresentacionesController.php");

        $model = new PresentacionesModel($this->database);
        
        return new PresentacionesController($model, $this->renderer);
    }

    public function createCancionesController()
    {
        include_once("model/CancionesModel.php");
        include_once("controller/CancionesController.php");

        $model = new CancionesModel($this->database);
        
        return new CancionesController($model, $this->renderer);
    }

    public function createQuieroSerParteController()
    {
        include_once("controller/QuieroSerParteController.php");
        return new QuieroSerParteController($this->renderer);
    }

    public function createLaBandaController()
    {
        include_once("controller/LaBandaController.php");
        return new LaBandaController($this->renderer);
    }

    public function createRegistroController()
    {
        include_once("model/UsuarioModel.php");
        include_once("controller/RegistroController.php");
        $model = new UsuarioModel($this->database);
        return new RegistroController($model,$this->renderer);
    }

    public function createLoginController()
    {
        include_once("model/UsuarioModel.php");
        include_once("controller/LoginController.php");
        $model = new UsuarioModel($this->database);
        return new LoginController($model,$this->renderer);
    }


    public function createHomeController()
    {
        include_once("model/HomeModel.php");
        include_once("controller/HomeController.php");
        $model = new HomeModel($this->database);
        return new HomeController($model,$this->renderer);
    }

    public function createNotaController()
    {
        include_once("model/NotaModel.php");
        include_once("model/SeccionModel.php");

        include_once("controller/NotaController.php");
        $notaModel = new NotaModel($this->database);
        $seccionModel = new SeccionModel($this->database);

        return new notaController($notaModel,$seccionModel,$this->renderer);
    }

    public function createInicioContenidistaController()
    {
        include_once("model/NotaModel.php");
        include_once("model/SeccionModel.php");

        include_once("controller/InicioContenidistaController.php");
        $notaModel = new NotaModel($this->database);
        $seccionModel = new SeccionModel($this->database);
        return new InicioContenidistaController($notaModel,$seccionModel,$this->renderer);
    }

    public function createInicioLectorController()
    {
        include_once("model/CatalogoModel.php");
        include_once("controller/InicioLectorController.php");
        $model = new CatalogoModel($this->database);
        return new InicioLectorController($model,$this->renderer);
    }

    public function createInicioAdministradorController()
    {
        include_once("controller/InicioAdministradorController.php");
        return new InicioAdministradorController($this->renderer);
    }

    public function createRevistasController()
    {
        include_once("model/RevistaModel.php");
        include_once("model/CatalogoModel.php");
        include_once("controller/RevistasController.php");
        $revistaModel = new RevistaModel($this->database);
        $catalogoModel = new CatalogoModel($this->database);
        return new RevistasController($revistaModel,$catalogoModel,$this->renderer);
    }

    public function createUsuariosController()
    {
        include_once("model/UsuarioModel.php");
        include_once("controller/UsuariosController.php");
        $Model = new UsuarioModel($this->database);
        return new UsuariosController($Model,$this->renderer);
    }

    public function createCatalogosController()
    {
        include_once("model/CatalogoModel.php");
        include_once("controller/CatalogosController.php");
        $model = new CatalogoModel($this->database);
        return new CatalogosController($model,$this->renderer);
    }

    public function createMisSuscripcionesController()
    {
        include_once("model/SuscripcionModel.php");
        include_once("model/RevistaModel.php");
        include_once("model/CatalogoModel.php");
        include_once("controller/MisSuscripcionesController.php");
        $suscripcionModel = new SuscripcionModel($this->database);
        $catalogoModel = new CatalogoModel($this->database);
        $revistaModel = new RevistaModel($this->database);
        return new MisSuscripcionesController($suscripcionModel,$catalogoModel,$revistaModel,$this->renderer);
    }

    public function createDefaultController()
    {
        return $this->createHomeController();
    }
}