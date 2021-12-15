<?php
include "Song.php";

if (isset($_GET['delete'])){
    $songId = $_GET['delete'];
    $song = new Song();
    $song->removeSong($songId);
    header('location:songList.php');
}