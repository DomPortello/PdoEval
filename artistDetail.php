<?php

include "header.php";
include "Artist.php";
include "Song.php";

if (isset($_GET['artistId'])) {
    $id = $_GET['artistId'];
}
$artistDetail = (new Artist())->artistDetail($id);

?>

    <div class="container my-5">
        <a href="artistList.php" class="btn btn-primary mb-5">Retour à la liste</a>
        <table class="table table-dark table-striped table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Age</th>
                <th>Songs</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td> <?php
                        echo $artistDetail['id']
                        ?>
                    </td>
                    <td><?php
                        echo $artistDetail['name']
                        ?>
                    </td>
                    <td><?php
                        echo $artistDetail['age']
                        ?>
                    </td>
                    <td>
                        <?php
                        $artistSongs = (new Song())->getAllSongsFromArtist($artistDetail['id']);
                        if (!empty($artistSongs)){
                            foreach ($artistSongs as $song) {
                                echo $song['title'];
                                echo '<br>';
                            }} else{
                             echo "L'artiste n'a pas de musique.";
                            }

                        ?>
                    </td>
                    <td>
                        <a href="songDelete.php?delete=<?php echo $song['id'] ?>" class="btn btn-danger">Supprimer les chansons ?</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
        </div>
    </div>
<?php
include 'footer.php';
