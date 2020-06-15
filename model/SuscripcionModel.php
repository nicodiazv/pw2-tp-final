<?php


class SuscripcionModel {
    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

    public function revistasALasQueEstaSuscrito($usuario_id){
        return $this->connection->query("select *, re.nombre as nombre_revista 
                                        FROM usuario_suscribe_revista usr
                                        JOIN revista re ON (usr.revista_id = re.id)
                                        WHERE usuario_id = $usuario_id");

    }

    public function revistasALasQueEstaNoEstaSuscrito($usuario_id){
        return $this->connection->query("SELECT * 
                                        FROM revista re 
                                        WHERE re.id NOT IN (
                                                        SELECT DISTINCT revista_id
                                                        FROM usuario_suscribe_revista usr
                                                        WHERE usuario_id = $usuario_id)");
    }

    public function suscribir($idUsuario,$idTipoUsuario,$idRevista,$idTransaccion,$fechaInicio,$fechaFin){
        return $this->connection->query("INSERT INTO usuario_suscribe_revista (usuario_id, usuario_usuario_tipo_id, revista_id, transaccion_id, fecha_inicio, fecha_fin)
                                         VALUES
                                         ($idUsuario,$idTipoUsuario , $idRevista , $idTransaccion , '$fechaInicio','$fechaFin')");
    }
}