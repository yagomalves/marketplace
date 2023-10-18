<?php
    include_once "header.php";
    include_once "includes/protect.inc.php";
?>

<div class="adPage">

<form method="POST" action="includes/insertAd.inc.php">

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
