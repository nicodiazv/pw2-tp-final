<?php
//Valida la sesión del usuario
class ValidateSession {

    public static function validarSesionAdministrador() {
        if (!isset($_SESSION["usuario"]) || ($_SESSION["usuario"]["usuario_tipo_id"] != 1)) {
            header("location: accesoProhibido403");
            exit();
        }
    }

    public static function validarSesionContenidista() {
        if (!isset($_SESSION["usuario"]) || ($_SESSION["usuario"]["usuario_tipo_id"] != 2)) {
            header("location: accesoProhibido403");
            exit();
        }
    }

    public static function validarSesionLector() {
        if (!isset($_SESSION["usuario"]) || ($_SESSION["usuario"]["usuario_tipo_id"] != 3)) {
            header("location: accesoProhibido403");
            exit();
        }
    }

}