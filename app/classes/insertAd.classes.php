<?php

class InsertAd extends Dbh
{

    protected function setAd($title, $type, $description, $user_id, $adDate, $price, $cep, $state, $city, $district)
    {   
        $user_id = $_SESSION["userid"];
        $stmt = $this->connect()->prepare("INSERT INTO ad (ad_title, ad_type, ad_description, users_id, ad_date, ad_price, ad_cep, ad_state, ad_city, ad_district) VALUES (?,?,?,?,?,?,?,?,?,?);");

        if (!$stmt->execute(array($title, $type, $description, $user_id, $adDate, $price, $cep, $state, $city, $district))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }

}