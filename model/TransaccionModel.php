<?php


class TransaccionModel {

    private $connection;

    public function __construct($database){
        $this->connection = $database;
    }


    public function registrarTransaccion($importe, $fecha, $idPago){
        return $this->connection->query("INSERT INTO transaccion (importe_total, fecha, tipo_pago_id) VALUES
                                        ($importe, '$fecha', $idPago);");
    }
}