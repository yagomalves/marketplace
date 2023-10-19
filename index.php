<?php
include_once "header.php";
?>

<section>
    <div>
        <?php
        if (isset($_SESSION["userid"])) {
        ?>
            <div class='welcomeIndex'>
                <h2>Bem-vindo ao seu marketplace</h2>
                <p><a href="profile.php">Acesse seu perfil</a></p>
                </form>
            </div>
        <?php
        } else {
        ?>
            <div class='mainForm'>
                <div class="mainFormFields">
                    <h2>Cadastrar</h2>
                    <form action="includes/signup.inc.php" method="post">
                        <input type="email" class='txt-camp' name="email" placeholder="E-mail">
                        <input type="password" name="password" class='txt-camp' placeholder="Password">
                        <input type="password" name="passwordRepeat" class='txt-camp' placeholder="Repeat password">
                        <input type="text" name="firstName" class='txt-camp' placeholder="First name">
                        <input type="text" name="lastName" class='txt-camp' placeholder="Last name">
                        <input type="tel" name="phone" class='txt-camp' maxlength="15" placeholder='(99) 99999-9999' onkeyup="handlePhone(event)" required>

                        <button type="submit" name="submit">Sign Up</button>
                    </form>
                </div>
            </div>
            <br>
            <hr>
            <br>

            <div class='mainForm'>
                <div class="mainFormFields">
                    <h2>Entrar</h2>
                    <form action="includes/login.inc.php" method="post">
                        <input type="text" name="email" placeholder="Username">
                        <input type="password" name="password" placeholder="Password"> 
                        <button type="submit" name="submit">Login</button>
                    </form>
                    <p><a href="resetpassword.php">Esqueceu a senha?</a></p>
                </div>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET["newpwd"])) {
            if ($_GET["newpwd"] ==  "passwordupdated") {
                echo "Sua senha foi resetada!";
            }
        }
        ?>



    </div>

</section>

<script src="./assets/js/ui/phoneMask.js"></script>

<?php
if (isset($_SESSION["userid"])) {
    include_once "adFooter.php";
}
