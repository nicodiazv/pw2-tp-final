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
    public function actualizarNota($nota_id,$usuario_id, $titulo, $ubicacion, $place_id, $lat, $lng, $seccion_id, $cuerpo, $imagenNombre, $enlace, $copete) {
        return $this->connexion->query("UPDATE nota 
            set 
            titulo ='$titulo', 
            ubicacion_nombre = '$ubicacion',
            ubicacion_place_id = '$place_id',
            ubicacion_lat = '$lat',
            ubicacion_lng = '$lng', 
            seccion_id = $seccion_id, 
            cuerpo = '$cuerpo',
            usuario_id = $usuario_id, 
            imagen_nombre = '$imagenNombre', 
            enlace = '$enlace',
            copete = '$copete',
            aprobada = null
            WHERE id = $nota_id");

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
        return $this->connexion->query("SELECT n.*,n.id as id_nota, n.enlace as enlance, s.nombre as seccion_nombre, u.nombre as autor_nombre, u.apellido as autor_apellido from nota n join seccion s on s.id = n.seccion_id join usuario u on u.id = n.usuario_id where n.id = $id");
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

    public function validarAccesoNota($idUsuario, $idNota) {
        $accesoPermitido =  $this->connexion->query("SELECT 1 -- El usuario esta suscrito a la revista que contiene la publicacion que contiene la nota elegida --
                                        FROM nro_revista nr
                                        JOIN usuario_suscribe_revista usr ON (usr.revista_id = nr.revista_id)
                                        JOIN nro_revista_tiene_notas nrtn ON (nrtn.nro_revista_id = nr.id)
                                        WHERE nrtn.nota_id = $idNota 
                                        AND usr.usuario_id = $idUsuario
                                        UNION
                                        SELECT 1 -- El usuario compro compro la publicacion que contiene la nota elegida -- 
                                        FROM nro_revista nr
                                        JOIN usuario_compra_nro_revista ucnr ON (ucnr.nro_revista_id = nr.revista_id)
                                        JOIN nro_revista_tiene_notas nrtn ON (nrtn.nro_revista_id = ucnr.nro_revista_id)
                                        WHERE nrtn.nota_id = $idNota 
                                        AND ucnr.usuario_id = $idUsuario");
        if(!$accesoPermitido){
            throw new FortException("No tiene acceso a esta nota.");
        }
    }

    public function notasPermitidas($usuario_id){
        return $this->connexion->query("SELECT 
        *
    FROM
        nota
    WHERE
        id IN (SELECT 
                nrtn.nota_id
            FROM
                pw2.usuario_compra_nro_revista ucr
                    JOIN
                nro_revista_tiene_notas nrtn ON nrtn.nro_revista_id = ucr.nro_revista_id
            WHERE
                ucr.usuario_id = $usuario_id UNION SELECT 
                nrtn.nota_id
            FROM
                pw2.usuario_suscribe_revista usr
                    JOIN
                nro_revista nr ON nr.revista_id = usr.revista_id
                    JOIN
                nro_revista_tiene_notas nrtn ON nrtn.nro_revista_id = nr.id
            WHERE
                usr.usuario_id = $usuario_id)");
    }

}