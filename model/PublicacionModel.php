<?php


class PublicacionModel {
    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

    public function obtenerPublicaciones(){
        return $this->connection->query("SELECT * FROM nro_revista");
    }

    public function obtenerPublicacionPorId($id){
        return $this->connection->query("SELECT * FROM nro_revista WHERE id = $id");
    }

    public function enviarSolicitudNota($nota_id, $publicacion_id){
        return $this->connection->query("INSERT INTO nro_revista_tiene_notas SET nota_id = $nota_id, nro_revista_id = $publicacion_id");
    }

    public function obtenerNotasEnPublicacionesPendientes(){
        return $this->connection->query("SELECT rtn.nro_revista_id as publicacion_id, rtn.nota_id ,n.titulo, s.nombre as seccion_nombre, u.nombre as usuario_nombre, u.apellido as usuario_apellido, n.ubicacion_nombre, r.nombre as publicacion_nombre FROM nro_revista_tiene_notas rtn
        JOIN nota n on n.id = rtn.nota_id
        JOIN usuario u on u.id = n.usuario_id
        JOIN seccion s on s.id = n.seccion_id
        JOIN nro_revista r on r.id = rtn.nro_revista_id
        where rtn.aprobada is null");
    }
    public function obtenerNotasEnPublicacionesPorNotaId($id){
        return $this->connection->query("SELECT rtn.nro_revista_id as publicacion_id, rtn.nota_id ,n.titulo, r.nombre as publicacion_nombre, rtn.aprobada as aprobada FROM nro_revista_tiene_notas rtn
        JOIN nota n on n.id = rtn.nota_id
        JOIN nro_revista r on r.id = rtn.nro_revista_id
        where rtn.nota_id = $id");
    }

    public function cantidad_obtenerNotasEnPublicacionesPendientes(){
        return $this->connection->query("SELECT count(*) as cantidad FROM nro_revista_tiene_notas rtn where rtn.aprobada is null");
    }

    public function aprobarNotaEnPublicacion($nota_id, $publicacion_id){
        return $this->connection->query("UPDATE nro_revista_tiene_notas SET aprobada = 1 WHERE nota_id = $nota_id  and nro_revista_id = $publicacion_id");
    }



}