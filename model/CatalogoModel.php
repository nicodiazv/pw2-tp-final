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

    public function cantRevistasPorCatalogo(){
        return $this->connection->query("SELECT ca.id, ca.nombre,COUNT(*) as cantidad
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        GROUP BY (catalogo_id)");
    }

    public function revistasPorCatalogo($catalogo_id){
        return $this->connection->query("SELECT *
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)
                                        WHERE car.catalogo_id = $catalogo_id");
    }

}