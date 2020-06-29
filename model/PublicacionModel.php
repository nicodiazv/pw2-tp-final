<?php


class PublicacionModel {
    private $connection;

    public function __construct($database) {
        $this->connection = $database;
    }

    /* ------------------NRO PUBLICACIONES (NRO DE REVISTA)-----------------*/

    public function obtenerNroPublicaciones() {
        return $this->connection->query("SELECT * FROM nro_revista");
    }

    public function obtenerPublicacionPorId($id) {
        return $this->connection->query("SELECT * FROM nro_revista WHERE id = $id");
    }

    public function enviarSolicitudNota($nota_id, $publicacion_id) {
        return $this->connection->query("INSERT INTO nro_revista_tiene_notas 
                                        SET nota_id = $nota_id, nro_revista_id = $publicacion_id");
    }

    public function obtenerNotasEnNroPublicacionesPendientes() {
        return $this->connection->query("SELECT rtn.nro_revista_id as publicacion_id, rtn.nota_id ,n.titulo, s.nombre as seccion_nombre, u.nombre as usuario_nombre, u.apellido as usuario_apellido, n.ubicacion_nombre, r.nombre as publicacion_nombre FROM nro_revista_tiene_notas rtn
                                        JOIN nota n on n.id = rtn.nota_id
                                        JOIN usuario u on u.id = n.usuario_id
                                        JOIN seccion s on s.id = n.seccion_id
                                        JOIN nro_revista r on r.id = rtn.nro_revista_id
                                        where rtn.aprobada = 0 or rtn.aprobada is NULL");
    }

    public function obtenerNotasEnNroPublicacionesPorNotaId($id) {
        return $this->connection->query("SELECT rtn.nro_revista_id as publicacion_id, rtn.nota_id ,n.titulo, 
                                                r.nombre as publicacion_nombre, rtn.aprobada as aprobada 
                                        FROM nro_revista_tiene_notas rtn
                                        JOIN nota n on n.id = rtn.nota_id
                                        JOIN nro_revista r on r.id = rtn.nro_revista_id
                                        where rtn.nota_id = $id");
    }

    public function cantidad_obtenerNotasEnNroPublicacionesPendientes() {
        return $this->connection->query("SELECT count(*) as cantidad FROM nro_revista_tiene_notas rtn 
                                        where rtn.aprobada is null OR rtn.aprobada = 0");
    }

    public function aprobarNotaEnNroPublicacion($nota_id, $publicacion_id) {
        return $this->connection->query("UPDATE nro_revista_tiene_notas SET aprobada = 1 
                                        WHERE nota_id = $nota_id  and nro_revista_id = $publicacion_id");
    }

    public function rechazarNotaEnNroPublicacion($nota_id, $publicacion_id) {
        return $this->connection->query("UPDATE nro_revista_tiene_notas SET aprobada = 2 
                                        WHERE nota_id = $nota_id  and nro_revista_id = $publicacion_id");
    }

    /* ------------------PUBLICACIONES (REVISTA)-----------------*/

    public function obtenerPublicaciones() {
        return $this->connection->query("SELECT * FROM revista");
    }

    public function obtenerPublicacionesDisponiblesParaUsuario($usuarioId) {
        return $this->connection->query("SELECT nr.id as id_publicacion, re.nombre as revista_nombre, 
                                                nr.nombre as publicacion_nombre, nr.fecha_publicacion as fecha_publicacion  
                                        FROM usuario_suscribe_revista usr
                                        JOIN revista re ON (usr.revista_id = re.id)
                                        JOIN nro_revista nr ON (re.id = nr.revista_id)
                                        WHERE usr.usuario_id = $usuarioId");
    }

    public function obtenerNotasDisponiblesDePublicacion($idPublicacion) {
        return $this->connection->query("SELECT titulo, ubicacion_nombre, n.imagen_nombre, copete, n.aprobada aprobada, seccion_id
                                        FROM nro_revista_tiene_notas nrtn
                                        JOIN nota n ON (nrtn.nota_id = n.id)
                                        WHERE nro_revista_id = $idPublicacion AND nrtn.aprobada = 1");
    }
}