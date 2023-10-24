<?php

class MyAdsInfoView extends MyAdsInfo
{
    public function FetchAllAdsTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        if (!empty($adsInfo)) {
            foreach ($adsInfo as $ad) {
                $adId = $ad['ad_id'];
                echo "<a href='/ad/{$adId}'>" . $ad['ad_title'] . "</a><br><br>";
                
            }
        }
    }

    
    public function FetchAdTitle($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_title'] . "<br><br>";
                }
                
            }
    }

    public function FetchType($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_type'] . "<br><br>";
                }
                
            }
    }

    public function FetchDescription($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_description'] . "<br><br>";
                }
                
            }
    } 
    public function FetchDate($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_date'] . "<br><br>";
                }
                
            }
    } 
    public function FetchPrice($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_price'] . "<br><br>";
                }
                
            }
    } 
    public function FetchCep($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_cep'] . "<br><br>";
                }
                
            }
    } 
    public function FetchState($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_state'] . "<br><br>";
                }
                
            }
    } 
    public function FetchCity($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_city'] . "<br><br>";
                }
                
            }
    } 
    public function FetchDistrict($userId)
    {
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];

        $anuncios = $this->GetAdInfo($userId);
            foreach ($anuncios as $anuncio) 
            {
                if($anuncio['ad_id'] == $adId){
                    echo $anuncio['ad_district'] . "<br><br>";
                }
                
            }
    } 
    
}