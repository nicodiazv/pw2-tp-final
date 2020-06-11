<?php

class SeccionModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerSecciones(){
        return $this->connexion->query("SELECT * FROM seccion");
    }
    public function obtenerSeccion($id){
        return $this->connexion->query("SELECT * FROM seccion WHERE id = $id");
    }

}