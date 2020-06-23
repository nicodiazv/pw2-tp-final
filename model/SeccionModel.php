<?php

class SeccionModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM seccion WHERE aprobada = 1");
    }

    public function obtenerSeccion($id){
        return $this->connexion->query("SELECT * FROM seccion WHERE id = '$id'");
    }

    public function obtenerSeccionPorNombre($nombre){
        return $this->connexion->query("SELECT id FROM seccion WHERE nombre = '$nombre'");
    }

    public function guardarSeccion($nombre)
    {
        // Si la sección ya existe, no permite crearla
        $seccion = $this->obtenerSeccionPorNombre($nombre);
        if (empty($seccion))
            // Si no existe, intenta insertarla en la BD
            return $this->connexion->query("INSERT INTO seccion (nombre) VALUES ('$nombre')");
        else
            return 0;
    }

    public function seccionesPendientesAprobacion()
    {
        return $this->connexion->query("SELECT * FROM seccion where aprobada is null ");
    }
    public function cantidad_seccionesPendientesAprobacion()
    {
        return $this->connexion->query("SELECT count(*) as cantidad FROM seccion where aprobada is null ");
    }

    public function aprobarSeccion($id){
        return $this->connexion->query("UPDATE seccion set aprobada = 1 where id = $id");
    }

    public function rechazarSeccion($id){
        return $this->connexion->query("UPDATE seccion set aprobada = 2 where id = $id");
    }

}