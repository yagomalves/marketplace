<?php
namespace app\controllers;

use LoginController;

class NewLogin
{
    public function get()
    {
        $this->fetchUser();
    }

    protected function fetchUser()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {

            // PEGAR DADOS
            $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
            $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

            // INSTANCIAR SIGNUPCONTROLLER CLASS
            include '../app/classes/Dbh.classes.php';
            include '../app/classes/Login.classes.php';
            include '../app/controllers/Login_controller.classes.php';

            $login = new LoginController($email, $password);

            // RUN ERRORS HANDLERS
            $login->LoginUser();
    
        }
    }
}