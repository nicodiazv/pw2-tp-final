<?php

class HomeModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerUsuarioPorEmail(){
        return $this->connexion->query("SELECT * FROM usuario");
    }

    public function obtenerCancion($id){
        return $this->connexion->query("SELECT * FROM canciones WHERE idCancion = $id ");
    }

}