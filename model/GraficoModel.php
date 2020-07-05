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

    public function cantidad_notasPendientesAprobacion() {
        return $this->connection->query("SELECT count(*) as cantidad 
                                        from nota n
                                         where n.aprobada is NULL OR n.aprobada = 0");
    }
    public function cantidad_notasAprobadas() {
        return $this->connection->query("SELECT count(*) as cantidad 
                                        from nota n
                                         where n.aprobada = 1");
    }
    public function cantidad_notasTotales() {
        return $this->connection->query("SELECT count(*) as cantidad 
                                        from nota n
                                         ");
    }
    public function cantidadNotas(){
        $notas_pendientes = $this->cantidad_notasPendientesAprobacion();
        $notas_aprobadas = $this->cantidad_notasAprobadas();
        
        $response = array(
            array(
                "nombre" => "notas pendientes",
                "cantidad" => $notas_pendientes[0]['cantidad']
            ),array(
                "nombre" => "notas aprobadas",
                "cantidad" => $notas_aprobadas[0]['cantidad']
            )
        );

        return $response;
    }

}
