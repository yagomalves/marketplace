<?php
namespace app\controllers;

class LogoutController
{
    public function execute()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: /");
    }
}