<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    //PEGAR DADOS
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    $currentDate = date("U");

    // INSTANCIAR CLASSES
    include '../classes/Dbh.classes.php';
    include '../classes/createnewpassword.classes.php';
    include '../controllers/createnewpassword_controller.classes.php';

    
    $createPassword = new NewPasswordController($selector, $validator, $password, $passwordRepeat, $currentDate);
    
    // RUN ERRORS HANDLERS
    $createPassword->CreatePassword();
    // VOLTAR PARA PAGE
    header("Location: ../index.php?reset=success");
} else {
    header("Location: ../index.php?reset=error");
}