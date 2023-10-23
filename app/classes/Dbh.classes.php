<?php

class Dbh
{

    protected function connect()
    {
        try 
        {
            $username = "root";
            $pass = "";
            $dbh = new PDO("mysql:host=localhost;dbname=ooplogin", $username, $pass);
            return $dbh;
        }
        catch(PDOException $e)
        {
            print "Error :" . $e->getMessage() . "<br/>";
            die();
        }
    }
 

}