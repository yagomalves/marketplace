<?php
namespace app\controllers;

use MyAdsInfoView;
use MyAdsInfo;

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
        echo "<br><br>";
        $adsInfo->FetchDescription($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchType($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchDate($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchCep($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchState($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchCity($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchDistrict($_SESSION["userid"]);
        echo "<br><br>";
        $adsInfo->FetchPrice($_SESSION["userid"]);
        echo "<br><br>";
    }

    public function edit()
    {
        
        
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];
        

        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/myAdsInfo.classes.php";
        include "../app/views/myAdsInfo_view.classes.php";

        $adsInfo = new MyAdsInfo();
        $adsInfo->ValidateUserAd($_SESSION["userid"], $adId);
        

                
                $editAd = new MyAdsInfoView();
        ?>

                <section>
                <br>
                <form action="/edit/<?=$adId?>" method="POST">

                <label>Título</label><br>
                <input type="text" placeholder="Title" name="title" value="
        <?php
                $editAd->FetchAdTitle($_SESSION["userid"]);
        ?>
        ">

                <br><br>

                <label for="type">Tipo</label><br>
                <select name="type" value="oi">
        <option>
        <?php
        $editAd->FetchType($_SESSION["userid"]);
        ?>          
        </option>
                        <option>Doméstico</option>
                        <option>Babá</option>
                        <option>Jurídico</option>
                        <option>Economia</option>
                        <option>Festa e Evento</option>
                        <option>Manutenção e Reforma</option>
                        <option>Saúde e Beleza</option>
                        <option>Informática</option>
                        <option>Transporte</option>
                        <option>Frete</option>
                        <option>Turismo</option>
                </select>
                

                <br><br>

                <label>Descrição</label><br>
                <textarea name="description" cols="30" rows="10" placeholder="Type a text as your introduction">
        <?=$editAd->FetchDescription($_SESSION["userid"]);?>
                </textarea><br><br>

                <label>Preço</label><br>
                <textarea name="price" cols="30" rows="10" placeholder="00,00">
        <?php
                $editAd->FetchPrice($_SESSION["userid"]);
        ?>
                </textarea><br><br>

                <label>CEP</label><br>
                <textarea name="cep" cols="30" rows="10" placeholder="00000-000">
        <?php
                $editAd->FetchCep($_SESSION["userid"]);
        ?>
                </textarea><br><br>

                <label>Estado</label><br>
                <textarea name="state" cols="30" rows="10" placeholder="Estado">
        <?php
                $editAd->FetchState($_SESSION["userid"]);
        ?>
                </textarea><br><br>

                <label>Cidade</label><br>
                <textarea name="city" cols="30" rows="10" placeholder="Cidade">
        <?php
                $editAd->FetchCity($_SESSION["userid"]);
        ?>
                </textarea><br><br>

                <label>Bairro</label><br>
                <textarea name="district" cols="30" rows="10" placeholder="Bairro">
        <?php
                $editAd->FetchDistrict($_SESSION["userid"]);
        ?>
                </textarea><br><br>

                <br><br>
                <button type="submit" name="submit">EDITAR</button>
                </form>
        </section>

        <?php
        
        
    }

    public function set()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/myAdsInfo.classes.php";
        include "../app/views/myAdsInfo_view.classes.php";
        
        $editAd = new MyAdsInfoView();
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];
        
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
            $type = htmlspecialchars($_POST["type"], ENT_QUOTES, "UTF-8");
            $description = htmlspecialchars($_POST["description"], ENT_QUOTES, "UTF-8");
            $price = htmlspecialchars($_POST["price"], ENT_QUOTES, "UTF-8");
            $cep = htmlspecialchars($_POST["cep"], ENT_QUOTES, "UTF-8");
            $state = htmlspecialchars($_POST["state"], ENT_QUOTES, "UTF-8");
            $city = htmlspecialchars($_POST["city"], ENT_QUOTES, "UTF-8");
            $district = htmlspecialchars($_POST["district"], ENT_QUOTES, "UTF-8");

            $editAd->EditAd($title, $type, $description, $price, $cep, $state, $city, $district, $adId);
        
            header("Location: /user");
        
        }
        
    }

    public function delete()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/myAdsInfo.classes.php";
        include "../app/views/myAdsInfo_view.classes.php";

        $deleteAd = new MyAdsInfoView();
        $urr = explode('/',parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)); 
        $adId = $urr[2];
        $deleteAd->DeleteAd($adId);
    }
}