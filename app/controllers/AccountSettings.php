<?php
namespace app\controllers;

use AccountInfoView;
use AccountInfoController;

class AccountSettings
{
    public function show()
    {
        include_once "../app/helpers/protect.php";
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";

        include "../app/classes/Dbh.classes.php";
        include "../app/classes/accountinfo.classes.php";
        include "../app/views/accountinfo_view.classes.php";

        $accountInfo = new AccountInfoView();

        echo "<br><br>";
        ?>

        <section>
            <br>
            <form action="/accountsettings" method="POST">


                <input type="text" placeholder="Title" name="email" value="
        <?php
                $accountInfo->FetchEmail($_SESSION["userid"]);
        ?>
        ">

                <br><br>

                <textarea name="accountPhone" cols="30" rows="10" placeholder="Type something about you right here!!">
        <?php
                $accountInfo->FetchPhone($_SESSION["userid"]);
        ?>
                </textarea>

                <br><br>

                <textarea name="firstName" cols="30" rows="10" placeholder="Type your first name">
        <?php
                $accountInfo->FetchFirstName($_SESSION["userid"]);
        ?>
                </textarea>
                <textarea name="lastName" cols="30" rows="10" placeholder="Type your last name">
        <?php
                $accountInfo->FetchLastName($_SESSION["userid"]);
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

            $userId = $_SESSION["userid"];
            $accountEmail = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
            $accountPhone = htmlspecialchars($_POST["accountPhone"], ENT_QUOTES, "UTF-8");
            $accountFirstName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, "UTF-8");
            $accountLastName = htmlspecialchars($_POST["lastName"], ENT_QUOTES, "UTF-8");
        
            include "../app/classes/Dbh.classes.php";
            include "../app/classes/accountinfo.classes.php";
            include "../app/controllers/accountinfo_controller.classes.php";
            
            $accountInfo = new AccountInfoController($accountEmail, $accountPhone, $accountFirstName, $accountLastName, $userId);
        
            
            $accountInfo->UpdateAccountInfo();
        
            header("Location: /user");
        
        }
    }
}