<?php
namespace app\controllers;

use MyAdsInfoView;

class AdSolo
{
    public function show()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/myAdsInfo.classes.php";
        include "../app/views/myAdsInfo_view.classes.php";


        $adsInfo = new MyAdsInfoView();


        $adsInfo->FetchAdTitle($_SESSION["userid"]);
        $adsInfo->FetchDescription($_SESSION["userid"]);
        $adsInfo->FetchType($_SESSION["userid"]);
        $adsInfo->FetchDate($_SESSION["userid"]);
        $adsInfo->FetchCep($_SESSION["userid"]);
        $adsInfo->FetchState($_SESSION["userid"]);
        $adsInfo->FetchCity($_SESSION["userid"]);
        $adsInfo->FetchDistrict($_SESSION["userid"]);
        $adsInfo->FetchPrice($_SESSION["userid"]);
    }

}