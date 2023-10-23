<?php
namespace app\controllers;

use ProfileInfoView;
use AccountInfoView;

class UserController
{

    public function show()
    {
        
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        $profileInfo = new ProfileInfoView();

        ?>
        <h3><a href="myAds.php">Meus Anúncios</a></h3><br>
        
        <div class='infos'>
            <?php
            echo "--Perfil-- <br> <br>";
            echo "<h2>Título</h2> <br>";
            $profileInfo->FetchTitle($_SESSION["userid"]);
            echo "<br> <br>";
            echo "<h2>Sobre</h2> <br>";
            $profileInfo->FetchAbout($_SESSION["userid"]);
            echo "<br> <br>";
            echo "<h2>Descrição</h2> <br>";
            $profileInfo->FetchText($_SESSION["userid"]);
            echo "<br> <br>";
            ?>
        </div>
        
        <p><a href="profilesettings.php">Profile settings</a></p>
        <hr>
        <br>
        
        <?php
        $accountInfo = new AccountInfoView();
        echo "--ACCOUNT-- <br> <br>";
        echo "<h3>Email</h3> <br>";
        $accountInfo->FetchEmail($_SESSION["userid"]);
        echo "<br> <br>";
        echo "<h3>Telefone</h3> <br>";
        $accountInfo->FetchPhone($_SESSION["userid"]);
        echo "<br> <br>";
        echo "<h3>Primeiro Nome</h3> <br>";
        $accountInfo->FetchFirstName($_SESSION["userid"]);
        echo "<br> <br>";
        echo "<h3>Último nome</h3> <br>";
        $accountInfo->FetchLastName($_SESSION["userid"]);
        echo "<br> <br>";
        ?>
        
        <p><a href="accountsettings.php">Account settings</a></p>
        
        <?php

    }

    public function edit()
    {
        echo 'USER EDIT';
    }

}