<?php
require_once("ModuleInitializer.php");
require_once("Router.php");
require_once("helper/ValidateSession.php");

session_start();

$module = isset($_GET["module"]) ? $_GET["module"] : "login";
$action = isset($_GET["action"]) ? $_GET["action"] : "index";

$moduleInitializer = new ModuleInitializer();
Router::executeActionFromController($moduleInitializer, $module, $action);
