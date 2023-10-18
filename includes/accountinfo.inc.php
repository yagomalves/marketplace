<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION["userid"];
    $accountEmail = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $accountPhone = htmlspecialchars($_POST["accountPhone"], ENT_QUOTES, "UTF-8");
    $accountFirstName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, "UTF-8");
    $accountLastName = htmlspecialchars($_POST["lastName"], ENT_QUOTES, "UTF-8");

    include '../classes/Dbh.classes.php';
    include '../classes/accountinfo.classes.php';
    include '../controllers/accountinfo_controller.classes.php';
    
    $accountInfo = new AccountInfoController($accountEmail, $accountPhone, $accountFirstName, $accountLastName, $userId);

    
    $accountInfo->UpdateAccountInfo();

    header("Location: ../profile.php?error=none");

}