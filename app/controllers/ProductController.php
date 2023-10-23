<?php
namespace app\controllers;

class ProductController
{
    public function show()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";
        echo 'PRODUCT';
    }
}