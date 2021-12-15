<?php
include 'header.php';
include 'Artist.php';

$artistList = (new Artist())->artistList();

?>

<div class="container my-5">

    <a class="btn btn-primary mb-5" href="artistForm.php">Ajouter un artiste</a>

    <table class="table table-dark table-striped table-hover text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Age</th>
            <th class="w-25"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($artistList as $artist) {
            ?>
            <tr>
                <td> <?php
                    echo $artist['id']
                    ?>
                </td>
                <td><?php
                    echo $artist['name']
                    ?>
                </td>
                <td><?php
                    echo $artist['age']
                    ?>
                </td>
                <td>
                    <a href="artistDetail.php?artistId=<?php echo $artist['id'] ?>" class="btn btn-light">Détails</a>
                    <a href="artistForm.php?edit=<?php echo $artist['id'] ?>" class="btn btn-success">Modifier</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'un artiste</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Etes-vous sur de vouloir supprimer cet artiste ainsi que ses chansons ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <a href="artistDelete.php?delete=<?php echo $artist['id'] ?>" class="btn btn-danger">Oui, supprimer l'artiste et ses chansons</a>
                </div>
            </div>
        </div>
    </div>


<?php
include "footer.php";
