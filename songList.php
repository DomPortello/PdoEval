<?php
include 'header.php';
include 'Song.php';
include 'Artist.php';

$songList = (new Song())->getAllSongs();
$artistName = new Artist();
var_dump($songList);
//var_dump($artistName);

?>

<div class="container my-5">

    <a class="btn btn-primary mb-5" href="songForm.php">Ajouter une chanson</a>

    <table class="table table-dark table-striped table-hover text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Chanteur</th>
            <th>Titre</th>
            <th>Durée</th>
            <th>Date de sortie</th>
            <th class="w-25"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($songList as $song) {
            ?>
            <tr>
                <td> <?php
                    echo $song['id']
                    ?>
                </td>
                <td><?php
                       $artistName->artistDetail($song['artist_id']);
                    ?>
                </td>
                <td><?php
                    echo $song['title']
                    ?>
                </td>
                <td><?php
                    echo $song['time']
                    ?>
                </td>
                <td><?php
                    echo $song['published_at']
                    ?>
                </td>
<!--                <td>-->
<!--                    <a href="artistDetail.php?artistId=--><?php //echo $song['id'] ?><!--" class="btn btn-light">Détails</a>-->
<!--                    <a href="artistForm.php?edit=--><?php //echo $song['id'] ?><!--" class="btn btn-success">Modifier</a>-->
<!--                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">-->
<!--                        Supprimer-->
<!--                    </button>-->
<!--                </td>-->
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div>
    </div>
</div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'un artiste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes-vous sur de supprimer cet artiste ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <a href="artistDelete.php?delete=<?php echo $song['id'] ?>" class="btn btn-danger">Oui, supprimer l'artiste</a>
                </div>
            </div>
        </div>
    </div>


<?php
include "footer.php";
