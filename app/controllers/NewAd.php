<?php
namespace app\controllers;

use InsertAdController;

class NewAd
{
    public function show()
    {
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";
?>
    <div class="adPage">

        <form method="post" action="/newad">

            <!-- <label> Image </label><br>
            <img class="adImage" src="assets/images/Default_pfp.png" alt="default profile picture"><br><br>
            <input type="file" name="image"><br><br> -->

            <label>Título</label><br>
            <input type="text" name="title" placeholder="Ad title here"><br><br>

            <label for="type">Tipo</label><br>
            <select name="type">
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
            </select><br><br>

            <label>Preço</label><br>
            <input type="text" name="price" placeholder="$ 00,00"><br><br>

            <label>CEP</label><br>
            <input type="text" name="cep" placeholder="00000-000"><br><br>

            <label>Estado</label><br>
            <input type="text" name="state" placeholder="State"><br><br>

            <label>Cidade</label><br>
            <input type="text" name="city" placeholder="City"><br><br>

            <label>Bairro</label><br>
            <input type="text" name="district" placeholder="District"><br><br>

            <label>Descrição</label><br>
            <textarea name="description" cols="30" rows="10" ></textarea><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
<?php
    }

    public function set()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            
            $user_id = $_SESSION["userid"];
            $title = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
            $type = htmlspecialchars($_POST["type"], ENT_QUOTES, "UTF-8");
            $description = htmlspecialchars($_POST["description"], ENT_QUOTES, "UTF-8");
            $price = htmlspecialchars($_POST["price"], ENT_QUOTES, "UTF-8");
            $cep = htmlspecialchars($_POST["cep"], ENT_QUOTES, "UTF-8");
            $state = htmlspecialchars($_POST["state"], ENT_QUOTES, "UTF-8");
            $city = htmlspecialchars($_POST["city"], ENT_QUOTES, "UTF-8");
            $district = htmlspecialchars($_POST["district"], ENT_QUOTES, "UTF-8");

            date_default_timezone_set("America/Sao_Paulo");
            $adDate = date("Y-m-d H:i:s"); 
            // $image =  $_FILES["image"];

            include '../app/classes/Dbh.classes.php';
            include '../app/classes/insertAd.classes.php';
            include '../app/controllers/insertAd_controller.classes.php';
            
            $insertAd = new InsertAdController($title, $type, $description, $user_id, $adDate, $price, $cep, $state, $city, $district);
            
            
            $insertAd->SubmitAd();

            header("Location: /user");

        }
    }
}