<?php

class MyAdsInfoView extends MyAdsInfo
{
    public function FetchAllAdsTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        if (!empty($adsInfo)) {
            foreach ($adsInfo as $ad) {
                echo "<a href='adSolo.php?'>" . $ad["ad_title"] . "</a><br><br>";
            }
        }
    }

    public function FetchAdTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_title"] . "</p><br><br>";
    }

    public function FetchType($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_type"] . "</p><br><br>";
    }

    public function FetchDescription($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_description"] . "</p><br><br>";
    } 
    public function FetchDate($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        echo "<p>" . $adsInfo[0]["ad_date"] . "</p><br><br>";
    } 
    
}