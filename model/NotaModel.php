<?php

class NotaModel {

    private $connexion;

    public function __construct($database) {
        $this->connexion = $database;
    }

    public function guardarNota($usuario_id, $titulo, $ubicacion, $place_id, $lat, $lng, $seccion_id, $cuerpo, $imagenNombre, $enlace, $copete) {
        return $this->connexion->query("INSERT INTO nota 
            (titulo, ubicacion_nombre,ubicacion_place_id,ubicacion_lat,ubicacion_lng, seccion_id, cuerpo, usuario_id, imagen_nombre, enlace,copete) 
            VALUES ('$titulo','$ubicacion','$place_id' , '$lat' ,'$lng',$seccion_id,'$cuerpo', $usuario_id, '$imagenNombre','$enlace', '$copete'  )");

    }

    public function notasPorSeccionYUsuario($usuario_id, $seccion_id) {
        return $this->connexion->query("SELECT n.*,u.nombre as autor from nota n 
                                        join usuario u on u.id = n.usuario_id 
                                        WHERE usuario_id = $usuario_id AND seccion_id = $seccion_id");
    }

    public function cantidadNotasPorSeccionYUsuario($usuario_id) {
        return $this->connexion->query("SELECT count(*) as cantidad,s.nombre,s.id 
                                        FROM nota n join seccion s on s.id = n.seccion_id 
                                        where usuario_id = $usuario_id 
                                        group by seccion_id, usuario_id ");
    }

    public function notasPendientesAprobacion() {
        return $this->connexion->query("SELECT n.*, s.nombre as seccion_nombre, u.nombre as usuario_nombre, u.apellido as usuario_apellido 
                                        FROM nota n join seccion s on s.id = n.seccion_id JOIN usuario u ON u.id = n.usuario_id 
                                        WHERE n.aprobada is null OR n.aprobada = 0 ");
    }

    public function cantidad_notasPendientesAprobacion() {
        return $this->connexion->query("SELECT count(*) as cantidad 
                                        from nota n
                                         where n.aprobada is NULL OR n.aprobada = 0");
    }

    public function getNota($id) {
        return $this->connexion->query("SELECT n.*, s.nombre as seccion_nombre, u.nombre as autor_nombre, u.apellido as autor_apellido from nota n join seccion s on s.id = n.seccion_id join usuario u on u.id = n.usuario_id where n.id = $id");
    }

    // todas las notas
    public function obtenerNotas() {
        return $this->connexion->query("SELECT n.*, s.nombre as seccion_nombre, u.nombre as autor_nombre, u.apellido as autor_apellido from nota n join seccion s on s.id = n.seccion_id join usuario u on u.id = n.usuario_id");
    }

    // notas creadas por el contenidista
    public function obtenerNotasCreadas($id) {
        return $this->connexion->query("SELECT n.*, s.nombre as seccion_nombre, u.nombre as autor_nombre, u.apellido as autor_apellido 
        from nota n join seccion s on s.id = n.seccion_id 
        join usuario u on u.id = n.usuario_id
        WHERE n.usuario_id = $id
        ");
    }

    // notas aprobadas
    public function obtenerNotasAprobadas() {
        return $this->connexion->query("SELECT n.*, s.nombre as seccion_nombre, u.nombre as autor_nombre, u.apellido as autor_apellido 
        from nota n join seccion s on s.id = n.seccion_id 
        join usuario u on u.id = n.usuario_id
        WHERE n.aprobada = 1
        ");
    }

    public function aprobarNota($id) {
        return $this->connexion->query("UPDATE nota set aprobada = 1 where id = $id");
    }

    public function rechazarNota($id) {
        return $this->connexion->query("UPDATE nota set aprobada = 2 where id = $id");
    }

}