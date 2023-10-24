<?php

class MyAdsInfo extends Dbh
{
    protected function GetAdInfo($userId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM ad WHERE users_id = ?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: /user?error=adnotfound");
            exit();
        }

        $adsInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $adsInfo;
    }

    // protected function GetSoloAdInfo($userId)
    // {
    //     $adsInfo = $this->GetAdInfo($userId);
    //     if (!empty($adsInfo)) {
    //         foreach ($adsInfo as $ad) {
    //             $adId = $ad['ad_id'];
    //             echo "<a href='/ad/{$adId}'>" . $ad['ad_title'] . "</a><br><br>";
                
    //             return $adId;
    //         }
    //     }
        // $adId = $this->GetAdInfo($userId);
        // dd($adId);

        // $stmt = $this->connect()->prepare("SELECT * FROM ad WHERE ad_id = ?;");

        // if(!$stmt->execute(array($adId))) {
        //     $stmt = null;
        //     header("Location: /user?error=stmtfailed");
        //     exit();
        // }

        // if($stmt->rowCount() == 0) {
        //     $stmt = null;
        //     header("Location: /user?error=adnotfound");
        //     exit();
        // }

        // $adId = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // }
    // protected function GetSoloAdInfo($userId)
    // {
    //     $adId = $this->GetAdInfo($userId);
    //     dd($adId);

    //     $stmt = $this->connect()->prepare("SELECT * FROM ad WHERE ad_id = ?;");

    //     if(!$stmt->execute(array($adId))) {
    //         $stmt = null;
    //         header("Location: /user?error=stmtfailed");
    //         exit();
    //     }

    //     if($stmt->rowCount() == 0) {
    //         $stmt = null;
    //         header("Location: /user?error=adnotfound");
    //         exit();
    //     }

    //     $adId = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $adId;
    // }

    protected function SetNewAdInfo($profileAbout, $profileTitle, $profileText, $userId)
    {
        $stmt = $this->connect()->prepare("UPDATE profiles SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;");

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}