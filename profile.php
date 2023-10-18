<?php
include_once "header.php";
include_once "includes/protect.inc.php";

include './classes/Dbh.classes.php';
include './classes/profileinfo.classes.php';
include './views/profileinfo_view.classes.php';
include './classes/accountinfo.classes.php';
include './views/accountinfo_view.classes.php';


$profileInfo = new ProfileInfoView();

?>
<h3><a href="myAds.php">Meus Anúncios</a></h3><br>
<?php
echo "--PROFILE-- <br> <br>";
echo "TITLE <br>";
$profileInfo->FetchTitle($_SESSION["userid"]);
echo "<br> <br>";
echo "ABOUT <br>";
$profileInfo->FetchAbout($_SESSION["userid"]);
echo "<br> <br>";
echo "DESCRIPTION <br>";
$profileInfo->FetchText($_SESSION["userid"]);
echo "<br> <br>";
?>


<p><a href="profilesettings.php">Profile settings</a></p>
<hr>
<br>

<?php

$accountInfo = new AccountInfoView();
echo "--ACCOUNT-- <br> <br>";
echo "Email <br>";
$accountInfo->FetchEmail($_SESSION["userid"]);
echo "<br> <br>";
echo "Phone <br>";
$accountInfo->FetchPhone($_SESSION["userid"]);
echo "<br> <br>";
echo "First name <br>";
$accountInfo->FetchFirstName($_SESSION["userid"]);
echo "<br> <br>";
echo "Last name <br>";
$accountInfo->FetchLastName($_SESSION["userid"]);
echo "<br> <br>";
?>

<p><a href="accountsettings.php">Account settings</a></p>

<?php
include_once "adFooter.php";
?>