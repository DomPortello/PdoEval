<?php
include 'header.php';
include 'Artist.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $artistDetail = (new Artist())->artistDetail($id);
    $age = $artistDetail['age'];
    $date = (new DateTime())->modify("- $age years");
}
?>

<div class="container">

    <?php
    if (isset($_GET['edit'])) {
        ?>
        <h2 class="mt-5">Modification d'un artiste</h2>
        <?php
    } else {
        ?>
        <h2 class="mt-5">Ajout d'un artiste</h2>
        <?php
    }
    ?>

    <form action="formTreatment.php" method="post">
        <div class="form-group mt-5">

            <label for="name"><i class="fas fa-user m-2"></i>Name</label>
            <input id="name" type="text" name="artistName" value="<?php if (isset($_GET['edit'])) {
                echo $artistDetail['name'];
            } ?>" class="form-control mb-4">

            <label for="age"><i class="fas fa-calendar-day m-2"></i>Date de naissance</label>
            <input id="age" type="date" name="age" value="<?php if (isset($_GET['edit'])) {
                echo $date->format('Y-m-d'); //TODO date a partir d'un chiffre = A FIX
            } ?>" class="form-control mb-4">

            <button class="btn btn-success" type="submit">Valider</button>
            <?php
            if (isset($_GET['edit'])) {
                ?>
                <input type="hidden" value="<?php if (isset($_GET['edit'])) {
                    echo $artistDetail['id'];
                } ?>" name="edit">
                <?php
            }
            ?>
        </div>
    </form>
</div>