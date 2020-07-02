<?php


class GraficoModel
{
    private $connection;

    public function __construct($database)
    {
        $this->connection = $database;
    }

    public function notasCreadasPorSecciones()
    {
        return $this->connection->query("SELECT count(s.nombre) as cantidad, s.nombre as seccion_nombre from nota n join seccion s on s.id = n.seccion_id group by s.id");
    }

}
