<?php

class MyAdsInfo extends Dbh
{
    protected function GetAdInfo($userId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM ad WHERE users_id = ?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: ./profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ./profile.php?error=adnotfound");
            exit();
        }

        $adsInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $adsInfo;
    }

    protected function SetNewAdInfo($profileAbout, $profileTitle, $profileText, $userId)
    {
        $stmt = $this->connect()->prepare("UPDATE profiles SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;");

        if(!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("Location: ./profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}