<?php

class HomeModel{

    private $connexion;
    public function __construct($database){
        $this->connexion = $database;
    }

}