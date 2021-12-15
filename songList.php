<?php
include 'header.php';
include 'Song.php';
include 'Artist.php';

if (isset($_POST['song']) && !empty($_POST['song'])){
    $songList = (new Song())->searchSong($_POST['song']);
} else {
    $songList = (new Song())->getAllSongs();
}


?>

<div class="container my-5">

    <form class="container" method="post" action="songList.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="song">
        <button class="btn btn-info my-2" type="submit">Rechercher</button>
    </form>

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
                        $artistName = (new Artist())->artistDetail($song['artist_id']);
                        echo $artistName['name']
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
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Supprimer
                    </button>
                </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'une chanson</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes-vous sur de supprimer cette chanson ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <a href="songDelete.php?delete=<?php echo $song['id'] ?>" class="btn btn-danger">Oui, supprimer la chanson</a>
                </div>
            </div>
        </div>
    </div>


<?php
include "footer.php";
