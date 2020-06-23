<?php


class RevistaModel {
    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

        public function obtenerRevistas(){
        return $this->connection->query("SELECT * 
                                        FROM revista");
    }

    public function obtenerRevistaPorId($id){
        return $this->connection->query("SELECT * 
                                        FROM revista 
                                        WHERE id = $id");
    }

    public function obtenerRevistasDelUsuario($idUsuario){
        return $this->connection->query("SELECT * 
                                        FROM revista re
                                        JOIN usuario_suscribe_revista usr ON (re.id = usr.revista_id)
                                        WHERE usr.usuario_id = $idUsuario;");
    }

    public function catalogosDeLaRevista(){
        return $this->connection->query("SELECT ca.id as id_catalogo, ca.nombre as nombre_catalogo, re.nombre as nombre_revista, re.id as id_revista
                                        FROM catalogo_agrupa_revistas car
                                        JOIN catalogo ca ON ( car.catalogo_id = ca.id)
                                        JOIN revista re ON (car.revista_id = re.id)");
    }

    public function guardarRevista($nombre, $descripcion, $imagen, $precioMensual, $idUsuario){
        return $this->connection->query("INSERT INTO revista (nombre, descripcion, imagen_nombre, precio_suscripcion_mensual, usuario_id) VALUES
                                        ('$nombre', '$descripcion', '$imagen', $precioMensual, $idUsuario) ");
    }

    public function validarRevistaYaExiste($nombreRevista) {
        $yaExiste = $this->connection->query("SELECT nombre 
                                              FROM revista
                                              WHERE nombre = '$nombreRevista'");
        if($yaExiste){
            throw new FortException("Ya existe la revista \"$nombreRevista\"");
        }else{
            return true;
        }
    }

    public function revistasPendientesAprobacion(){
        return $this->connection->query("SELECT re.id as id_re,re.nombre as nombre_revista, re.precio_suscripcion_mensual as precio_mensual, us.nombre as nombre_usuario, us.apellido as apellido_usuario
                                        FROM revista re JOIN usuario us ON (re.usuario_id = us.id) 
                                        WHERE re.aprobada IS NULL;");
    }

    public function cantidad_revistasPendientesAprobacion(){
        return $this->connection->query("SELECT count(*) as cantidad 
                                        FROM revista re 
                                        WHERE re.aprobada IS NULL;");
    }

    public function obtenerRevistaPendienteAprobacion($idRevista){
        return $this->connection->query("SELECT *,re.id as id_revista, re.nombre as nombre_revista, us.nombre as nombre_usuario, re.imagen_nombre as imagen_nombre
                                        FROM revista re JOIN usuario us ON (re.usuario_id = us.id)
                                        WHERE re.id = $idRevista");
    }

    public function aprobarRevista($idRevista){
        return $this->connection->query("UPDATE revista SET aprobada = 1 
                                        WHERE id = $idRevista");
    }

    public function rechazarRevista($idRevista){
        return $this->connection->query("UPDATE revista SET aprobada = 2 
                                        WHERE id = $idRevista");
    }

    public function RevistasDelContenidista($idContenidista){
        return $this->connection->query("select * 
                                        FROM revista
                                        WHERE usuario_id = $idContenidista;");
    }
}