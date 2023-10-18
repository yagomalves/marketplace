<?php
include_once "header.php";
?>



<h1>Reset Password</h1><br><br>
<form action="includes/resetpassword.inc.php" method="post">
    <input type="text" name="email"><br><br>
    <button type="submit" name="reset-request-submit">Receber nova senha</button><br><br>

    <?php
        if(isset($_GET["reset"])) 
        {
            if($_GET["reset"] == "success") 
            {
                echo "Check your email";
            }
        }
    ?>

</form>