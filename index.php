<?php
require "settings/init.php";

$songs = $db->sql("SELECT * FROM songs");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Sigende titel</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <?php
    foreach ($songs as $product){
    ?>

    <div class="row border-bottom p-2">

        <div class="col-12 col-md-4">
            <?php
            echo $product->songArtist;
            ?>
        </div>

        <div class="col-12 col-md-4">
            <?php
            echo $product->songName;
            ?>
        </div>

        <div class="col-12 col-md-2">
            <?php
            echo "BPM: " . number_format($product->songBPM, 2, ",", ".");
            ?>
        </div>

        <div class="col-12 col-md-2">
            <?php
            echo "Energy: " . number_format($product->songEnergy, 2, ",", ".");
            ?>
        </div>

    </div>



    <?php
}
?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>