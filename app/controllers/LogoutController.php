<?php

namespace app\controllers;

use Status;

class LogoutController
{
    public function execute()
    {

        include "../app/classes/Dbh.classes.php";
        include '../app/classes/status.classes.php';

        $status = new Status();
        $status->UpdateStatusToOff();

        session_start();
        session_unset();
        session_destroy();

        header("Location: /");
    }
}
