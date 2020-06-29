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

    public static function esAdministrador() {
        return (isset($_SESSION["usuario"]) && ($_SESSION["usuario"]["usuario_tipo_id"] == 1));
    }
    public static function esContenidista() {
        return (isset($_SESSION["usuario"]) && ($_SESSION["usuario"]["usuario_tipo_id"] == 2));
    }
    public static function esLector() {
        return (isset($_SESSION["usuario"]) && ($_SESSION["usuario"]["usuario_tipo_id"] == 3));
    }

    public static function tipoUsuario(){
        if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["usuario_tipo_id"] == 1) return "admin";
        if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["usuario_tipo_id"] == 2) return "contenidista";
        if(isset($_SESSION["usuario"]) && $_SESSION["usuario"]["usuario_tipo_id"] == 3) return "lector";

    }

}