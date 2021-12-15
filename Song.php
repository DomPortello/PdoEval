<?php

class Song
{
    private PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=evaluation_pdo', 'root', '');
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function getAllSongs(): array
    {
        $query = 'SELECT * FROM song';
        $pdo = $this->pdo;
        var_dump($pdo);
        $results = $pdo->prepare($query);
        var_dump($results->rowCount());
        $results->execute();
        var_dump($results->rowCount());
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }
}