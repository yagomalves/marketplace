<?php

include_once "header.php";
include_once "includes/protect.inc.php";

include './classes/Dbh.classes.php';
include './classes/myAdsInfo.classes.php';
include './views/myAdsInfo_view.classes.php';


$adsInfo = new MyAdsInfoView();
?>

<body>
    <main>
        <div class="myAds">
            <div class="adTitle">
                <h2>Meus anúncios</h2>
            </div>
            <ul>
                <li>
                    <a href="adSolo.php">
                        <h4><?= $adsInfo->FetchAllAdsTitle($_SESSION["userid"]); ?></h4>
                    </a>
                        <p><?= $adsInfo->FetchDescription($_SESSION['userid']) ?></p>

                </li>
            </ul>
        </div>
    </main>

</body>


<?php
include_once "adFooter.php";
?>