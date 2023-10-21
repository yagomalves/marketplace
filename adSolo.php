<?php
include_once "header.php";
include_once "includes/protect.inc.php";

include "./classes/Dbh.classes.php";
include "./classes/myAdsInfo.classes.php";
include "./views/myAdsInfo_view.classes.php";


$adsInfo = new MyAdsInfoView();


$adsInfo->FetchAdTitle($_SESSION["userid"]);
$adsInfo->FetchDescription($_SESSION["userid"]);
$adsInfo->FetchType($_SESSION["userid"]);
$adsInfo->FetchDate($_SESSION["userid"]);


include_once "adFooter.php";