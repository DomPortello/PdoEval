<?php
include "Artist.php";

if (isset($_POST['artistName']) && isset($_POST['age'])){
    $name = $_POST['artistName'];
    $birthDate = $_POST['age'];
    $newArtist = new Artist();
    if (isset($_POST['edit'])){
        $id = $_POST['edit'];
        $newArtist->updateArtist($name,$birthDate,$id);
    }else{
        $newArtist->addArtist($name, $birthDate);
    }
    header('location:artistList.php');
}