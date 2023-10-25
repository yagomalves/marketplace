<?php

class MyAdsInfo extends Dbh
{
    protected function GetAdInfo($userId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM ad WHERE users_id = ?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: /myads?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: /myads?error=adnotfound");
            exit();
        }

        $adsInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $adsInfo;
    }

    
    protected function DeleteAdInfo($adId)
    {
        $stmt = $this->connect()->prepare("DELETE FROM ad WHERE ad_id = ?;");

        if(!$stmt->execute(array($adId))) {
            $stmt = null;
            header("Location: /myads?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function SetNewAdInfo($title, $type, $description, $price, $cep, $state, $city, $district, $adId)
    {
        $stmt = $this->connect()->prepare("UPDATE ad SET ad_title = ?, ad_type = ?, ad_description = ?, ad_price = ?, ad_cep = ?, ad_state = ?, ad_city = ?, ad_district = ? WHERE ad_id = ?;");

        if(!$stmt->execute(array($title, $type, $description, $price, $cep, $state, $city, $district, $adId))) {
            $stmt = null;
            header("Location: /myads?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}