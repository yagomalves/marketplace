<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classificados</title>
    <link rel="stylesheet" href="./assets/css/global.css">
    <link rel="stylesheet" href="./assets/css/ads.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>

<body>
    <nav class="mainHeader">
        <div>
            <ul class="homeLink">
                <p><a href="/">Home</a></p>
            </ul>
        </div>

        <ul class="mainLinks">
            <?php
            if (isset($_SESSION["userid"])) {
            ?>
                <p><a href="/user"><?php echo $_SESSION["user_first_name"]; ?></a></p>
                <p><a href="/newad">Anuncie</a></p>
                <p><a href="/myads">Meus anúncios</a></p>
                <p><a href="/chat">Chat</a></p>
                <p><a href="/logout">LOGOUT</a></p>


            <?php
            } else {
            ?>
                <p>Efetue Login</p>
            <?php
            }
            ?>
        </ul>

    </nav>
    <hr>
