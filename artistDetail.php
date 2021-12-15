<?php

include "header.php";
include "Artist.php";

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
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($artistDetail as $artist) {
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
<?php
include 'footer.php';
