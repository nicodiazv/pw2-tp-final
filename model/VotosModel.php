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
}