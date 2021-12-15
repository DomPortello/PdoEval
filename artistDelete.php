<?php
include "Artist.php";
include "Song.php";

if (isset($_GET['delete'])){
    $artistId = $_GET['delete'];
    $songs = new Song();
    $songs->getAllSongsFromArtist($artistId);
    foreach ($songs as $song){
        (new Song())->removeSong($song['id']);
    }
    $artist = new Artist();
    $artist->removeArtist($artistId);
    header('location:artistList.php');
}