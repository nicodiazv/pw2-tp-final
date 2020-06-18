<?php


class RevistaModel {
    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

        public function obtenerRevistas(){
        return $this->connection->query("SELECT * FROM revista");
    }

    public function obtenerRevistaPorId($id){
        return $this->connection->query("SELECT * FROM revista WHERE id = $id");
    }

    public function catalogosDeLaRevista(){
        return $this->connection->query("SELECT ca.id as id_catalogo, ca.nombre as nombre_catalogo, re.nombre as nombre_revista, re.id as id_revista
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)");
    }

    public function guardarRevista($nombre,$descripcion,$imagen,$precioMensual){
        return $this->connection->query("INSERT INTO revista (nombre, descripcion, imagen_nombre, precio_suscripcion_mensual) VALUES
                                        ('$nombre', '$descripcion', '$imagen',,2000)  ");

    }

}