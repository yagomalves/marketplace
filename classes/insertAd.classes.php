<?php

class InsertAd extends Dbh
{

    protected function setAd($title, $type, $description, $user_id, $adDate)
    {   
        $user_id = $_SESSION["userid"];
        $stmt = $this->connect()->prepare("INSERT INTO ad (ad_title, ad_description, ad_type, users_id, ad_date) VALUES (?,?,?,?,?);");

        if (!$stmt->execute(array($title, $type, $description, $user_id, $adDate))) {
            $stmt = null;
            header("Location: ./profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}