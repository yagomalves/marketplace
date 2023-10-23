<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    
    $user_id = $_SESSION["userid"];
    $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    $type = htmlspecialchars($_POST["type"], ENT_QUOTES, "UTF-8");
    $description = htmlspecialchars($_POST["description"], ENT_QUOTES, "UTF-8");

    date_default_timezone_set("America/Sao_Paulo");
    $adDate = date("Y-m-d H:i:s"); 
    // $image =  $_FILES["image"];

    include '../classes/Dbh.classes.php';
    include '../classes/insertAd.classes.php';
    include '../controllers/insertAd_controller.classes.php';
    
    $insertAd = new InsertAdController($title, $type, $description, $user_id, $adDate);
    
    
    $insertAd->SubmitAd();

    header("Location: ../index.php?error=none");

}