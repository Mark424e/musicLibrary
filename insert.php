<?php
require "settings/init.php";

if (!empty($_POST["data"])) {
    $data = $_POST["data"];
    $file = $_FILES;

    if (!empty($file["songImg"]["tmp_name"])) {
        move_uploaded_file($file["songImg"]["tmp_name"], "uploads/" . basename($file["songImg"]["name"]));
    }

    $sql = "INSERT INTO songs (songArtist, songName, songAlbum, songGenre, songDescription, songDescShort, songDuration, songLabel, songBPM, songEnergy, songImg, songEmbed) VALUES(:songArtist, :songName, :songAlbum, :songGenre, :songDescription, :songDescShort, :songDuration, :songLabel, :songBPM, :songEnergy, :songImg, :songEmbed)";
    $bind = [
        ":songArtist" => $data["songArtist"],
        ":songName" => $data["songName"],
        ":songAlbum" => $data["songAlbum"],
        ":songGenre" => $data["songGenre"],
        ":songDescription" => $data["songDescription"],
        ":songDescShort" => $data["songDescShort"],
        ":songDuration" => $data["songDuration"],
        ":songLabel" => $data["songLabel"],
        ":songBPM" => $data["songBPM"],
        ":songEnergy" => $data["songEnergy"],
        ":songImg" => (!empty($file["songImg"]["tmp_name"])) ? $file["songImg"]["name"] : NULL,
        ":songEmbed" => $data["songEmbed"],
    ];

    $db->sql($sql, $bind, false);

    echo "The song has been inserted. <a href='insert.php'>Insert another song</a>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Indsæt til database</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tiny.cloud/1/3rsmw9ccp9juy3m9rrz59fl5h38b0pjh8g11qyia040fvhuw/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="container mt-5 pt-5 mb-5 pb-5 bg-customPrimary text-light">

    <form method="post" action="insert.php" enctype="multipart/form-data">
        <div class="row g-4">

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songArtist">Artist Name</label>
                    <input class="form-control" type="text" name="data[songArtist]" id="songArtist" placeholder="Artist Name" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songName">Song Name</label>
                    <input class="form-control" type="text" name="data[songName]" id="songName" placeholder="Song Name" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songAlbum">Album Name</label>
                    <input class="form-control" type="text" name="data[songAlbum]" id="songAlbum" placeholder="Album Name" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songGenre">Genre</label>
                    <input class="form-control" type="text" name="data[songGenre]" id="songGenre" placeholder="Genre" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <label class="fw-bold mb-2 form-label" for="songImg">Song Image</label>
                <input type="file" class="form-control" id="songImg" name="songImg">
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songDuration">Duration</label>
                    <input class="form-control" type="number" step="0.1" name="data[songDuration]" id="songDuration" placeholder="Duration" value="0">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songLabel">Label</label>
                    <input class="form-control" type="text" name="data[songLabel]" id="songLabel" placeholder="Label" value="">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songBPM">Beats Per Minute</label>
                    <input class="form-control" type="number" step="0.1" name="data[songBPM]" id="songBPM" placeholder="Beats Per Minute" value="0">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songEmbed">Spotify Embed</label>
                    <input class="form-control" type="text" name="data[songEmbed]" id="songEmbed" placeholder="Spotify Embed">
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songEnergy">Energy level</label>
                    <input class="form-control" type="number" step="0.1" name="data[songEnergy]" id="songEnergy" placeholder="Energy Level" value="0">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songDescription">Long Description</label>
                    <textarea class="form-control" name="data[songDescription]" id="songDescription"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="fw-bold mb-2" for="songDescShort">Short Description</label>
                    <textarea class="form-control" name="data[songDescShort]" id="songDescShort"></textarea>
                </div>
            </div>

            <div class="col-12 col-md-6 offset-md-6">
                <button class="form-control btn btn-customBtn bg-gradient" type="submit" id="btnSubmit">Submit Song</button>
            </div>
    </form>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
    });
</script>
</body>
</html>