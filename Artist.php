<?php

class Artist
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

    public function artistList(): array
    {
        $query = 'SELECT * FROM artist';

        $results = $this->pdo->prepare($query);
        $results->execute();
        return $results->fetchAll(PDO::FETCH_ASSOC);

    }

    public function artistDetail(string $id): array
    {
        $query = 'SELECT * FROM `artist` WHERE `id` = :artist_id';

        $results = $this->pdo->prepare($query);
        $results->execute([
            'artist_id' => $id
        ]);
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addArtist(string $name, string $birthDate)
    {
        $age = new DateTime($birthDate);

        $query = 'INSERT INTO `artist`(`name`, `age`) VALUES (:artistName, :birthDate)';

        $results = $this->pdo->prepare($query);
        $results->execute([
            ':artistName' => $name,
            ':birthDate' => (date_diff($age, (new DateTime())))->y
        ]);
    }

    public function removeArtist(string $id)
    {
        $query = 'DELETE FROM `artist` WHERE `id` = :artist_id ';

        $results = $this->pdo->prepare($query);
        $results->execute([
            'artist_id' => $id
        ]);
    }

    public function updateArtist(string $name, string $birthDate, string $id)
    {
        $age = new DateTime($birthDate);

        $query = 'UPDATE `artist` SET `name`= :artistName,`age`= :birthDate WHERE `id` = :artist_id';
        $results = $this->pdo->prepare($query);
        $results->execute([
            ':artistName' => $name,
            ':birthDate' => (date_diff($age, (new DateTime())))->y,
            ':artist_id' => $id
            ]);
    }
}