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

            <label>Title</label><br>
            <input type="text" name="title" placeholder="Ad title here"><br><br>

            <label>Type</label><br>
            <input type="text" name="type" placeholder="Ad type here"><br><br>

            <label>Description</label><br>
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

            date_default_timezone_set("America/Sao_Paulo");
            $adDate = date("Y-m-d H:i:s"); 
            // $image =  $_FILES["image"];

            include '../app/classes/Dbh.classes.php';
            include '../app/classes/insertAd.classes.php';
            include '../app/controllers/insertAd_controller.classes.php';
            
            $insertAd = new InsertAdController($title, $type, $description, $user_id, $adDate);
            
            
            $insertAd->SubmitAd();

            header("Location: /user");

        }
    }
}