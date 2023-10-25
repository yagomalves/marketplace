<?php

class MyAdsInfoView extends MyAdsInfo
{
    public function FetchAllAdsTitle($userId)
    {
        $adsInfo = $this->GetAdInfo($userId);
        if (!empty($adsInfo)) {
            foreach ($adsInfo as $ad) {
                $adId = $ad['ad_id'];
                echo "<a href='/ad/{$adId}'>" . $ad['ad_title'] . "</a><br><br>"
                 ."<a href='/delete/{$adId}'>-deletar<br>"
                 ."<a href='/edit/{$adId}'>-editar<br><br><br><br><br>";
                
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
                    echo $anuncio['ad_title'];
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
                    echo $anuncio['ad_type'];
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
                    echo $anuncio['ad_description'];
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
                    echo $anuncio['ad_date'];
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
                    echo $anuncio['ad_price'];
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
                    echo $anuncio['ad_cep'];
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
                    echo $anuncio['ad_state'];
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
                    echo $anuncio['ad_city'];
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
                    echo $anuncio['ad_district'];
                }
                
            }
    } 

    public function DeleteAd($userId)
    {
        $this->DeleteAdInfo($userId);
        header('Location: /myads');
    }

    public function EditAd($title, $type, $description, $price, $cep, $state, $city, $district, $adId)
    {
        $this->SetNewAdInfo($title, $type, $description, $price, $cep, $state, $city, $district, $adId);
    }
    
}