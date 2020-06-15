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

    public function registrarUsuario($data){
        $email = $data['email'];
        $password = $data['password'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $rol = $data["rol"];
        $direccion = $data["direccion"];
        $telefono = $data["telefono"];

        $this->connection->query("INSERT INTO usuario (nombre, apellido, email, password, direccion, telefono, usuario_tipo_id) VALUES ('$nombre', '$apellido', '$email', '$password', '$direccion','$telefono','$rol') ");
    }

    public function editarUsuario($data){
        $id = $data['id'];
        $email = $data['email'];
        $password = $data['password'];
        $nombre = $data['nombre'];
        $apellido = $data['apellido'];
        $rol = $data["rol"];
        $direccion = $data["direccion"];
        $telefono = $data["telefono"];
        $changepass = $data["changepass"];
        if($changepass){
            $this->connection->query("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', email = '$email', password = '$password', direccion='$direccion', telefono='$telefono', usuario_tipo_id='$rol' WHERE id = '$id'");
        }
        else{
            $this->connection->query("UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', email = '$email', direccion='$direccion', telefono='$telefono', usuario_tipo_id='$rol' WHERE id = '$id'");
        }
  }


    public function obtenerUsuarioPorEmail($data){
        $email = $data['email'];
        $password = $data['password'];

        return $this->connection->query( "SELECT * FROM usuario WHERE email = '$email' AND password = '$password'" );
    }

    public function obtenerUsuarioPorId($data){
        $id = $data['id'];
        return $this->connection->query( "SELECT * FROM usuario WHERE id = '$id'" );
    }

    public function obtenerTodosLosUsuarios(){
        return $this->connection->query( "SELECT * FROM usuario" );
    }

}
