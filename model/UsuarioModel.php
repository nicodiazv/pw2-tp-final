<?php

class UsuarioModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function obtenerUsuarioPorEmail($data){
        $email = $data['email'];
        $password = $data['password'];

        return $this->connexion->query("SELECT * FROM usuario where email = '$email' and password = '$password'" );
    }

    public function registrarUsuarioLector($data){
        $email = $data['email'];
        $password = $data['password'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $this->connexion->query("INSERT INTO usuario (nombre, apellido, email, password, usuario_tipo_id) VALUES ('$nombre', '$apellido', '$email', '$password', 1) ");
    }

}
