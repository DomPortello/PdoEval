<?php

class PdoConnect
{
    protected $pdo;
    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function connect(){
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=evaluation_pdo', 'root', '');
        }catch (Exception $e){
            echo $e->getMessage();
        }
        return $pdo;
    }
}