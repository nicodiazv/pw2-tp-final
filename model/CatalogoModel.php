<?php

class CatalogoModel{

    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

    public function obtenerCatalogos(){
        return $this->connection->query("SELECT * FROM catalogo");
    }

    public function obtenerCatalogo($id){
        return $this->connection->query("SELECT * FROM catalogo WHERE id = $id");
    }

}