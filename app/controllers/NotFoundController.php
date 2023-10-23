<?php
namespace app\controllers;

class NotFoundController
{
    public function index()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";
        echo 'ERROR 404';
    }
}