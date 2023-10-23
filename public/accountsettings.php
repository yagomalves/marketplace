<?php
include_once "header.php";
include_once "includes/protect.inc.php";

include './classes/Dbh.classes.php';
include './classes/accountinfo.classes.php';
include './views/accountinfo_view.classes.php';

$accountInfo = new AccountInfoView();

echo "<br><br>";
?>

<section>
    <br>
    <form action="includes/accountinfo.inc.php" method="post">


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



<p><a href="profile.php">Profile</a></p>
<br>
<p><a href="index.php">HOME</a></p>

<?php
include_once "adFooter.php";
?>