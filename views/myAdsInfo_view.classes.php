<?php

class MyAdsInfoView extends MyAdsInfo
{
    public function FetchAllAdsTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        if (!empty($adsInfo)) {
            foreach ($adsInfo as $ad) {
                echo "<a href='adSolo.php'>" . $ad["ad_title"] . "</a><br><br>";
            }
        }
    }

    public function FetchAdTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_title"] . "</p>";
    }
    public function FetchAdId($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_id"] . "</p>";
    }

    public function FetchType($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo $adsInfo[0]["ad_type"];
    }

    public function FetchDescription($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo $adsInfo[0]["ad_description"];
    } 
}