<?php

class UsuarioModel{

    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }

    public function registrarUsuarioLector($data){
        $email = $data['email'];
        $password = $data['password'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $this->connection->query("INSERT INTO usuario (nombre, apellido, email, password, usuario_tipo_id) VALUES ('$nombre', '$apellido', '$email', '$password', 3) ");
    }

    public function obtenerUsuarioPorEmail($data){
        $email = $data['email'];
        $password = $data['password'];

        return $this->connection->query( "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'" );
    }

}
