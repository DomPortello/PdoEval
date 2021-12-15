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
        $results = $pdo->prepare($query);
        $results->execute();
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSongsFromArtist(string $id)
    {
        $query = 'SELECT * FROM song WHERE artist_id = :id';
        $pdo = $this->pdo;
        $results = $pdo->prepare($query);
        $results->execute([
            'id' => $id
        ]);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchSong(string $name)
    {
        $query = 'SELECT * FROM song WHERE title LIKE :songName';
        $pdo = $this->pdo;
        $results = $pdo->prepare($query);
        $results->execute([
            ':songName' => '%'.$name.'%'
        ]);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeSong(string $id)
    {
        $query = 'DELETE FROM `song` WHERE `id` = :song_id ';

        $results = $this->pdo->prepare($query);
        $results->execute([
            'song_id' => $id
        ]);
    }

}