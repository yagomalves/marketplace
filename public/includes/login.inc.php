<?php

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

    // PEGAR DADOS
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // INSTANCIAR SIGNUPCONTROLLER CLASS
    include '../classes/Dbh.classes.php';
    include '../classes/Login.classes.php';
    include '../controllers/Login_controller.classes.php';

    $login = new LoginController($email, $password);

    // RUN ERRORS HANDLERS
    $login->LoginUser();

    
}