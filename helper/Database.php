<?php

class Database{

    private $connection;

    public function __construct($servername, $username, $password, $dbname){
        $this->connection  = mysqli_connect($servername, $username, $password, $dbname)
                or die("Connection failed: " . mysqli_connect_error());
    }

    public function query($sql){
        $result = mysqli_query($this->connection, $sql);

        //var_dump($result);
        $resultAsAssocArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $resultAsAssocArray;
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