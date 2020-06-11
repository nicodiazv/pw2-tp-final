<?php

class Database{

    private $connection;

    public function __construct($servername, $username, $password, $dbname){
        $this->connection  = mysqli_connect($servername, $username, $password, $dbname)
                or die("Connection failed: " . mysqli_connect_error());
    }

    public function query($sql){
        $resultAsAssocArray = array( );
        $result = mysqli_query($this->connection, $sql);
        // mysqli_query: Para SELECT, SHOW, DESCRIBE o EXPLAIN, va a devolver un objeto
        // del tipo mysqli_result, pero para INSERT u otros comandos, va a devolver
        // TRUE o FALSE según el resultado

        // Si el resultado fue del tipo "object", se puede ejecutar mysqli_fetch_all,
        // si fuese del tipo "boolean" no.
        $tipo = gettype($result);
        if ($tipo == "object")
        {
            $resultAsAssocArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $resultAsAssocArray;
        }else{
            return mysqli_insert_id($this->connection);
        }
    }


    public function __destruct(){
        mysqli_close($this->connection);
    }

    public static function createDatabaseFromConfig(Config $config){
        return new Database(
            $config->get( "database","servername"),
            $config->get("database","username"),
            $config->get("database","password"),
            $config->get("database","dbname")
        );
    }
}