<?php
include_once "header.php";
include_once "includes/protect.inc.php";

include './classes/Dbh.classes.php';
include './classes/myAdsInfo.classes.php';
include './views/myAdsInfo_view.classes.php';

$adsInfo = new MyAdsInfoView();


?>
 <?=


$adsInfo->FetchAdTitle($_SESSION["userid"]) . "<br><br>";
$adsInfo->FetchDescription($_SESSION["userid"]) . "<br><br>";
$adsInfo->FetchType($_SESSION["userid"]) . "<br><br>";




?> 




<?php
include_once "adFooter.php";