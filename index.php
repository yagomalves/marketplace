<?php
    include_once "header.php";
?>

<section>
    <div>
    <?php
        if(isset($_SESSION["userid"]))
        {
    ?>
        <div>
            <h2>Bem-vindo ao seu marketplace</h2>
            <p><a href="profile.php">ACESSE SEU PERFIL</a></p>
            </form>
        </div>
            <?php
                }
                else
                {
            ?>
        <div>
            <h2>Cadastrar</h2>
            <form action="includes/signup.inc.php" method="post">
                
                <input type="email" name="email" placeholder="E-mail"> <br>
                <input type="password" name="password" placeholder="Password"> <br>
                <input type="password" name="passwordRepeat" placeholder="Repeat password"> <br>
                <input type="text" name="firstName" placeholder="First name"> <br>
                <input type="text" name="lastName" placeholder="Last name"> <br>
                <input type="tel" name="phone" placeholder="(11) 9.1234-5678"><br>
                
                <button type="submit" name="submit">Sign Up</button>
                
            </form>
        </div>
<br>
<hr>
<br>

        <div>
            <h2>Entrar</h2>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="email" placeholder="Username"> <br>
                <input type="password"  name="password" placeholder="Password"> <br>
                <button type="submit" name="submit">Login</button>
            </form>
            <p><a href="resetpassword.php">Esqueceu a senha?</a></p>
        </div>
            <?php
                }
            ?>
            <?php 
            if(isset($_GET["newpwd"])) {
                if($_GET["newpwd"] ==  "passwordupdated") {
                    echo "Sua senha foi resetada!";
                }
            }
            ?>
        

        
    </div>

    </section>

<?php
    if(isset($_SESSION["userid"]))
    {
        include_once "adFooter.php";
    }