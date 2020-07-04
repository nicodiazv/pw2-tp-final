<?php


class ComprasModel
{
    private $connection;

    public function __construct($database)
    {
        $this->connection = $database;
    }

    public function obtenerComprasDelUsuario($idUsuario)
    {
        return $this->connection->query("SELECT nr.id as id_publicacion, re.nombre as nombre_revista, nr.nombre as nombre_publicacion, 
                                            nr.precio as precio_publicacion, nr.fecha_publicacion as fecha_publicacion
                                            FROM usuario_compra_nro_revista ucr
                                            JOIN nro_revista nr ON (nr.id = ucr.nro_revista_id)
                                            JOIN revista re ON (re.id = nr.revista_id)
                                            WHERE re.aprobada = 1 
                                                AND ucr.usuario_id = $idUsuario
                                                AND re.id NOT IN (SELECT revista_id -- Revistas a las que ya se encuentra suscrito el usuario --
                                                        FROM pw2.usuario_suscribe_revista	
                                                        WHERE usuario_id = $idUsuario)");
    }

    public function obtenerPublicacionesNoCompradasDelUsuario($idUsuario)
    {
        return $this->connection->query("SELECT nr.id as id_publicacion, re.nombre as nombre_revista, nr.nombre as nombre_publicacion, 
                                            nr.precio as precio_publicacion, nr.fecha_publicacion as fecha_publicacion -- Publicaciones no compradas por el usuario -- 
                                        FROM nro_revista nr 
                                        JOIN revista re ON (re.id = nr.revista_id)
                                        WHERE re.aprobada = 1
                                            AND nr.id NOT IN (SELECT nr.id -- Publicaciones a las que esta suscrito el usuario --
                                                                FROM usuario_compra_nro_revista ucr
                                                                JOIN nro_revista nr ON (nr.id = ucr.nro_revista_id)
                                                                JOIN revista re ON (re.id = nr.revista_id)
                                                                WHERE re.aprobada = 1 
                                                                    AND ucr.usuario_id = $idUsuario)
                                            AND re.id NOT IN ( SELECT revista_id -- Revistas a las que ya se encuentra suscrito el usuario, entonces no deben aparecerme las publicaciones --
                                                                FROM pw2.usuario_suscribe_revista
                                                                WHERE usuario_id = $idUsuario)");
    }

    public function obtenerPublicacionesAdquiridasDelUsuario($idUsuario)
    {
        return $this->connection->query("SELECT nr.id as id_publicacion, re.nombre as nombre_revista, nr.nombre as nombre_publicacion, nr.precio as precio_publicacion,
                                        nr.fecha_publicacion as fecha_publicacion, usr.fecha_fin as fecha_fin_suscripcion-- Publicaciones adquiridas porque se suscribio a la revista --
                                        FROM nro_revista nr
                                        JOIN revista re ON (re.id = nr.revista_id)
                                        JOIN usuario_suscribe_revista usr ON (re.id = usr.revista_id)
                                        WHERE re.aprobada = 1 
                                            AND usr.usuario_id = $idUsuario
                                            AND re.id IN ( SELECT revista_id -- Revistas a las que ya se encuentra suscrito el usuario, entonces no deben aparecerme las publicaciones --
                                                            FROM pw2.usuario_suscribe_revista	
                                                            WHERE usuario_id = $idUsuario)");
    }


    public function validarSiTieneAdquiridaLaRevistaDeLaPublicacion($idPublicacion, $idUsuario)
    {
        $yaSuscrito =  $this->connection->query("SELECT 1 
                                                FROM nro_revista nr
                                                JOIN usuario_suscribe_revista usr ON (usr.revista_id = nr.revista_id)
                                                WHERE nr.id = $idPublicacion
                                                    AND usr.usuario_id = $idUsuario
                                                    AND CURDATE() BETWEEN usr.fecha_inicio AND usr.fecha_fin");

        if ($yaSuscrito) throw new FortException("Ya te encuentras suscrito a la revista que contiene esta publicación.");
    }

    public function validarSiYaComproLaPublicacion($idPublicacion, $idUsuario)
    {
        $yaSuscrito =  $this->connection->query("SELECT 1
                                                FROM usuario_compra_nro_revista
                                                WHERE usuario_id = $idUsuario
                                                    AND nro_revista_id = $idPublicacion;");

        if ($yaSuscrito) throw new FortException("Ya has comprado esta publicación.");
    }

    public function confirmarCompraDePublicacion($idPublicacion, $idUsuario, $idTransaccion)
    {
        return $this->connection->query("INSERT INTO usuario_compra_nro_revista (nro_revista_id, usuario_id, transaccion_id) VALUES 
                                                ($idPublicacion, $idUsuario, $idTransaccion)");
    }

    public function obtenerCantidadComprasPorRevista($revista_id)
    {
        return $this->connection->query("SELECT 
        count(ucr.nro_revista_id) as compras, nr.nombre
    FROM
        pw2.usuario_compra_nro_revista ucr
            JOIN
        nro_revista nr ON nr.id = ucr.nro_revista_id
        where nr.revista_id = $revista_id
        group by ucr.nro_revista_id");
    }
}
