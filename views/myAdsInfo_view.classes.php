<?php

class MyAdsInfoView extends MyAdsInfo
{
    public function FetchAllAdsTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        if (!empty($adsInfo)) {
            foreach ($adsInfo as $ad) {
                echo $ad["ad_title"] . "<br><br>";
            }
        }
    }

    public function FetchAddTitle($userId)
    {
        $profileInfo = $this->GetAdInfo($userId);
        echo $profileInfo[0]["ad_title"];
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