<?php

include_once "header.php";
include_once "includes/protect.inc.php";

include "./classes/Dbh.classes.php";
include "./classes/myAdsInfo.classes.php";
include "./views/myAdsInfo_view.classes.php";


$adsInfo = new MyAdsInfoView();
?>

<body>
    <main>
        <div class="myAds">
            <div class="title">
                <h2>Meus anúncios</h2>
            </div>
            <ul>
                <li>
                        <h4><?= $adsInfo->FetchAllAdsTitle($_SESSION["userid"]); ?></h4>                 
                </li>
            </ul>
        </div>
    </main>
</body>