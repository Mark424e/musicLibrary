<?php
require "settings/init.php";
$id = $_GET['songId'];

$songs = $db->sql("SELECT * FROM songs WHERE songId = $id");
?>

<?php
foreach ($songs as $product){
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>
        <?php
        echo "Songs4You " . "- " . $product->songName;
        ?>
    </title>

    <meta name="robots" content="All">
    <meta name="author" content="Mark Phillip Thomassen">
    <meta name="copyright" content="Mark Phillip Thomassen">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="bg-customPrimary bg-gradient text-light">

    <nav class="justify-content-center justify-content-sm-start navbar navbar-expand-lg navbar-dark bg-customSecondary pe-5 ps-5">
        <a class="navbar-brand" href="index.html">Songs4You</a>
    </nav>

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-md-4 mt-3 h-100">
                <div class="d-md-none">
                    <h2>
                        <?php
                        echo $product->songName;
                        ?>
                    </h2>
                    <p class="text-muted mt-1">By
                        <a class="fw-bold text-decoration-none text-customAccent">
                            <?php
                            echo $product->songArtist;
                            ?>
                        </a>
                    </p>
                    <hr>
                </div>

                <div>
                    <?php
                    echo "<img src='uploads/$product->songImg' alt='Cover Art' class='w-100'>";
                    ?>
                </div>

                <div class="mt-3 mb-3">
                    <?php
                    echo $product->songEmbed;
                    ?>
                </div>
            </div>

            <div class="col-12 col-md-8 pt-3 pb-5 bg-customPrimary h-100">
                <div class="d-none d-md-block">
                    <h2>
                        <?php
                        echo $product->songName;
                        ?>
                    </h2>
                    <hr>
                </div>

                <table class="table table-borderless bg-customPrimary text-light">
                    <tbody>
                    <tr class="d-none d-md-table-row">
                        <th scope="row">Artist</th>
                        <td>
                            <?php
                            echo $product->songArtist;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Album</th>
                        <td>
                            <?php
                            echo $product->songAlbum;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Genre</th>
                        <td>
                            <?php
                            echo $product->songGenre;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Label</th>
                        <td>
                            <?php
                            echo $product->songLabel;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">BPM</th>
                        <td>
                            <?php
                            echo $product->songBPM;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">Energy</th>
                        <td>
                            <?php
                            echo $product->songEnergy;
                            ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

                <div>
                    <div>
                        <?php
                        echo $product->songDescription;
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="text-center text-white bg-customSecondary">
        <div class="text-center p-5" style="background-color: rgba(0, 0, 0, 0.2)">
            <a class="text-white text-decoration-none" href="https://markphillip.dk/" target="_blank">Songs4You 2022</a>
        </div>
    </footer>
<?php
}
?>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>