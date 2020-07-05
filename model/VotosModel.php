<?php


class VotosModel {
    private $connection;

    public function __construct($database) {
        $this->connection = $database;
    }

    public function yaVotoEstaNota($idUsuario, $idNota){
        $yaVoto =  $this->connection->query("SELECT * FROM voto WHERE usuario_id = $idUsuario AND nota_id = $idNota");

        if($yaVoto){
            throw new FortException("Ya votaste esta nota");
        }
    }

    public function guardarVoto($puntaje, $idUsuario, $idNota){
        return $this->connection->query("INSERT INTO voto (puntaje, usuario_id, nota_id) VALUES
                                        ($puntaje, $idUsuario, $idNota) ");
    }

    public function obtenerVotosPositivos(){
        return $this->connection->query("SELECT n.titulo as titulo_nota, COUNT(*) as cantidad 
                                        FROM voto v
                                        JOIN nota n ON (n.id = v.nota_id)
                                        WHERE v.puntaje = 1
                                        GROUP BY v.nota_id, v.puntaje");
    }
    public function obtenerVotosRegulares(){
        return $this->connection->query("SELECT n.titulo as titulo_nota, COUNT(*) as cantidad 
                                        FROM voto v
                                        JOIN nota n ON (n.id = v.nota_id)
                                        WHERE v.puntaje = 2
                                        GROUP BY v.nota_id, v.puntaje");
    }
    public function obtenerVotosNegativos(){
        return $this->connection->query("SELECT n.titulo as titulo_nota, COUNT(*) as cantidad 
                                        FROM voto v
                                        JOIN nota n ON (n.id = v.nota_id)
                                        WHERE v.puntaje = 3
                                        GROUP BY v.nota_id, v.puntaje");
    }
}