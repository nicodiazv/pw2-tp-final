<?php
class NotaModel{

    private $connexion;

    public function __construct($database){
        $this->connexion = $database;
    }

    public function guardarNota($data){
        $nota_id = $this->connexion->query("INSERT INTO nota 
            (titulo, ubicacion, seccion_id, cuerpo) 
            VALUES ('{$data["titulo"]}','{$data["ubicacion"]}', {$data['seccion']},'{$data['cuerpo']}'  )");


        $this->connexion->query("INSERT INTO contenidista_escribe_nota 
            (usuario_id, nota_id) 
            VALUES ('{$data['usuario']}',$nota_id)");

}

}