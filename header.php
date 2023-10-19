<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/ads.css">
</head>
<body>
    <nav class="mainHeader">
        <div>
            <ul class="homeLink">
                <p><a href="index.php">Home</a></p>
            </ul>
        </div>

        <ul class="mainLinks">
            <?php
            if (isset($_SESSION["userid"])) {
            ?>
                <p><a href="profile.php"><?php echo $_SESSION["user_first_name"]; ?></a></p>
                <p><a href="insertAd.php">Anuncie</a></p>
                <p><a href="myAds.php">Meus anúncios</a></p>
                <p><a href="./includes/logout.inc.php">LOGOUT</a></p>

            <?php
            } else {
            ?>
                <p>Efetue Login</p>
            <?php
            }
            ?>
        </ul>

    </nav>