<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    // PEGAR DADOS
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

    // INSTANCIAR CLASS
    include '../classes/Dbh.classes.php';
    include '../classes/resetpassword.classes.php';
    include '../controllers/resetpassword_controller.classes.php';


    $reset = new ResetController($email);
    
    // RUN ERRORS HANDLERS
    $reset->SendResetEmail();

    // VOLTAR PARA PAGE
    header("Location: ../resetpassword.php?reset=success");
} 