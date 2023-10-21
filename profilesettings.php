<?php
include_once "header.php";
include_once "includes/protect.inc.php";

include "./classes/Dbh.classes.php";
include "./classes/profileinfo.classes.php";
include "./views/profileinfo_view.classes.php";

$profileInfo = new ProfileInfoView();

echo "<br><br>";
?>

<section>
    <br>
    <form action="includes/profileinfo.inc.php" method="post">


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



<p><a href="profile.php">Profile</a></p>
<br>
<p><a href="index.php">HOME</a></p>

<?php
include_once "adFooter.php";
?>