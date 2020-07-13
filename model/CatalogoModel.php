<?php

class CatalogoModel
{

    private $connection;

    public function __construct($database)
    {
        $this->connection = $database;
    }

    public function obtenerCatalogos()
    {
        return $this->connection->query("SELECT * FROM catalogo");
    }

    public function obtenerCatalogo($id)
    {
        $catalogo =  $this->connection->query("SELECT * FROM catalogo WHERE id = $id");
        if ($catalogo) {
            return $catalogo;
        } else {
            throw new FortException("El catálogo no existe.");
        }
    }

    public function cantRevistasPorCatalogo()
    {
        return $this->connection->query("SELECT ca.id, ca.nombre,COUNT(*) as cantidad
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        GROUP BY (catalogo_id)");
    }

    public function revistasPorCatalogo($catalogo_id)
    {
        return $this->connection->query("SELECT * 
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)
                                        WHERE car.catalogo_id = $catalogo_id
                                              AND re.aprobada = 1");
    }

    public function misRevistasPorCatalogo($catalogo_id, $usuario_id)
    {
        return $this->connection->query("SELECT * -- revistas a las que esta suscrito el usuario --
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)
                                        JOIN usuario_suscribe_revista usr ON ( usr.revista_id = re.id)
                                        WHERE car.catalogo_id = $catalogo_id
                                             AND re.aprobada = 1
                                            AND usr.usuario_id = $usuario_id
                                            AND CURDATE() BETWEEN usr.fecha_inicio AND usr.fecha_fin");
    }

    public function revistasNoAdquiridasDelCatalogo($catalogo_id, $usuario_id)
    {
        return $this->connection->query("SELECT *
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)
                                        WHERE car.catalogo_id = $catalogo_id
                                            AND re.aprobada = 1
                                            AND re.id NOT IN ( SELECT re.id -- revistas a las que esta suscrito el usuario --
                                                                FROM catalogo_agrupa_revistas car
                                                                JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                                                JOIN revista re ON (car.revista_id = re.id)
                                                                JOIN usuario_suscribe_revista usr ON ( usr.revista_id = re.id)
                                                                WHERE car.catalogo_id = $catalogo_id
                                                                    AND usr.usuario_id = $usuario_id
                                                                    AND CURDATE() BETWEEN usr.fecha_inicio AND usr.fecha_fin)");
    }
}
