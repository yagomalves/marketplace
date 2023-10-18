<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        nav {
            background-color: #ccc;
        }
        section {
            display: flex;
            justify-content: center;
        }
        footer{
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: 10%;
            width: 100%;
            background-color: white; /* Cor de fundo do footer */
            
        }
        p {
            padding: 12px;
        }
        .df {
            display: flex;
        }
        .aic {
            align-items: center;
        }
        .jcsb {
            justify-content: space-between;
        }
        .adImage {
            width: 20%;
            height: 20%;
        }
        .adPage {
            width: 60%;
            align-items: center;
            
        }

    </style>
</head>


<body>

    <nav class="df aic jcsb">
        <div>
            <ul class="df">
                <p><a href="index.php">HOME</a></p>
            </ul>
        </div>

        <ul class="df">
            <?php
                if(isset($_SESSION["userid"]))
                {
            ?>
                <p><a href="profile.php"><?php echo $_SESSION["user_first_name"]; ?></a></p>
                <p><a href="insertAd.php">ANUNCIE</a></p>
                <p><a href="myAds.php">Meus anúncios</a></p>
                <p><a href="./includes/logout.inc.php">LOGOUT</a></p>
                
            <?php
                }
                else
                {
            ?>
                <p>Efetue Login</p>
            <?php
                }
            ?>
        </ul>
    
    </nav>