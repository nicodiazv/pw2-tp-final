<?php


class SuscripcionModel {
    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

    public function revistasALasQueEstaSuscrito($usuario_id){
        return $this->connection->query("select re.id as revista_id, re.nombre as nombre_revista, fecha_inicio, fecha_fin, usr.usuario_id, re. precio_suscripcion_mensual, imagen_nombre
                                        FROM usuario_suscribe_revista usr
                                        JOIN revista re ON (usr.revista_id = re.id)
                                        WHERE usr.usuario_id = $usuario_id");
    }

    public function revistasALasQueEstaNoEstaSuscrito($usuario_id){
        return $this->connection->query("SELECT * 
                                        FROM revista re 
                                        WHERE re.id NOT IN (
                                                        SELECT DISTINCT revista_id
                                                        FROM usuario_suscribe_revista usr
                                                        WHERE usuario_id = $usuario_id)");
    }

    public function suscribir($idUsuario,$idRevista,$idTransaccion,$fechaInicio,$fechaFin){
        return $this->connection->query("INSERT INTO usuario_suscribe_revista (usuario_id, revista_id, transaccion_id, fecha_inicio, fecha_fin)
                                         VALUES
                                         ($idUsuario, $idRevista , $idTransaccion , '$fechaInicio','$fechaFin')");
    }

    public function desuscribir($idUsuario,$idRevista){
        return $this->connection->query("DELETE FROM usuario_suscribe_revista
                                         WHERE usuario_id = $idUsuario AND revista_id = $idRevista;");
    }

    public function usuarioYaSeEncuentraSuscrito($idUsuario,$idRevista,$fechaFin){
        $yaSuscrito = $this->connection->query("SELECT 1
                                                FROM usuario_suscribe_revista usr
                                                WHERE usuario_id = $idUsuario AND revista_id = $idRevista AND fecha_fin <= '$fechaFin';");
        if($yaSuscrito){
            throw new FortException("Ya te encuentras suscrito a la revista");
        }else{
            return true;
        }
    }

    public function obtenerCantidadSuscripcionesPorRevista($revista_id){
        return $this->connection->query("SELECT count(usr.revista_id) as suscripciones FROM pw2.usuario_suscribe_revista usr 
        where usr.revista_id = $revista_id
        group by usr.revista_id");
    }
}