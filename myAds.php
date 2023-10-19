<?php

    include_once "header.php";
    include_once "includes/protect.inc.php";

    include './classes/Dbh.classes.php';
    include './classes/myAdsInfo.classes.php';
    include './views/myAdsInfo_view.classes.php';


    $adsInfo = new MyAdsInfoView();
?>

<p><a href="adSolo.php">
    <?= $adsInfo->FetchAllAdsTitle($_SESSION["userid"]); ?>
</a></p>

<?php
    include_once "adFooter.php";
?>