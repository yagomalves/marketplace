<?php
namespace app\controllers;

use ProfileInfoView;
use ProfileInfoController;

class ProfileSettings
{
    public function show()
    {
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/profileinfo.classes.php";
        include "../app/views/profileinfo_view.classes.php";

        $profileInfo = new ProfileInfoView();

        echo "<br><br>";
        ?>

        <section>
            <br>
            <form action="/profilesettings" method="post">


                <input type="text" placeholder="Title" name="introtitle" value="
        <?php
                $profileInfo->FetchTitle($_SESSION["userid"]);
        ?>
        ">

                <br><br>

                <textarea name="about" cols="30" rows="10" placeholder="Type something about you right here!!">
        <?php
                $profileInfo->FetchAbout($_SESSION["userid"]);
        ?>
                </textarea>

                <br><br>

                <textarea name="introtext" cols="30" rows="10" placeholder="Type a text as your introduction">
        <?php
                $profileInfo->FetchText($_SESSION["userid"]);
        ?>
                </textarea>

                <br><br>
                <button type="submit" name="submit">SUBMIT</button>
            </form>
        </section>

        <?php
    }

    public function set()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_SESSION["userid"];
            $firstName = $_SESSION["user_first_name"];
            $about = htmlspecialchars($_POST["about"], ENT_QUOTES, "UTF-8");
            $introTitle = htmlspecialchars($_POST["introtitle"], ENT_QUOTES, "UTF-8");
            $introText = htmlspecialchars($_POST["introtext"], ENT_QUOTES, "UTF-8");
        
            include '../app/classes/Dbh.classes.php';
            include '../app/classes/profileinfo.classes.php';
            include '../app/controllers/profileinfo_controller.classes.php';
            
            $profileInfo = new ProfileInfoController($id, $firstName);
        
            
            $profileInfo->UpdateProfileInfo($about, $introTitle, $introText);
        
            header("Location: /user");
        
        }
    }
}