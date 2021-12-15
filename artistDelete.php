<?php
include "Artist.php";

if (isset($_GET['delete'])){
    $artistId = $_GET['delete'];
    $artist = new Artist();
    $artist->removeArtist($artistId);
    header('location:artistList.php');
}