<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // PEGAR DADOS
    
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $passwordRepeat = htmlspecialchars($_POST["passwordRepeat"], ENT_QUOTES, 'UTF-8');
    $firstName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($_POST["lastName"], ENT_QUOTES, 'UTF-8');
    $phone = preg_replace("/[^0-9]/", "", htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8'));
    
    date_default_timezone_set("America/Sao_Paulo");
    $signupDate = date("Y-m-d H:i:s");


    // INSTANCIAR SIGNUPCONTROLLER CLASS
    include '../classes/Dbh.classes.php';
    include '../classes/Signup.classes.php';
    include '../controllers/Signup_controller.classes.php';

    $signUp = new SignupController($password, $passwordRepeat, $email, $firstName, $lastName, $phone, $signupDate);
    

    // RUN ERRORS HANDLERS
    $signUp->SignupUser();

    $userId = $signUp->FetchUserId($email);
 

    // INSTANTIATE PROFILE INFO CONTROLLER
    include '../classes/Profileinfo.classes.php';
    include '../controllers/Profileinfo_controller.classes.php';
    $profileInfo = new ProfileInfoController($userId, $firstName);
    $profileInfo->DefaultProfileInfo();


    // VOLTAR PARA HOME PAGE
    header("Location: ../index.php?error=none");
}