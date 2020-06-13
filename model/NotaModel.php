<?php
class NotaModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function guardarNota($usuario_id, $titulo, $ubicacion, $seccion_id, $cuerpo, $imagenNombre){
        return $this->connexion->query("INSERT INTO nota 
            (titulo, ubicacion, seccion_id, cuerpo, usuario_id, imagen_nombre) 
            VALUES ('$titulo','$ubicacion', $seccion_id,'$cuerpo', $usuario_id, '$imagenNombre'  )");

    }
    public function notasPorSeccionYUsuario($usuario_id, $seccion_id){
        return $this->connexion->query("SELECT * from nota WHERE usuario_id = $usuario_id AND seccion_id = $seccion_id");
    }
    public function cantidadNotasPorSeccionYUsuario($usuario_id){
        return $this->connexion->query("SELECT count(*) as cantidad,s.nombre,s.id FROM nota n join seccion s on s.id = n.seccion_id where usuario_id = $usuario_id group by seccion_id, usuario_id ");
    }

}