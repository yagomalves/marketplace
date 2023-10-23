<?php
namespace app\controllers;

use MyAdsInfoView;

class MyAds
{
    public function show()
    {
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/myAdsInfo.classes.php";
        include "../app/views/myAdsInfo_view.classes.php";


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
<?php        
    }
}