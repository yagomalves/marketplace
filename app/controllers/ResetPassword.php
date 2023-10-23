<?php
namespace app\controllers;

use ResetController;

class ResetPassword
{
    public function show()
    {
        include_once "../app/helpers/bootstrap.php";
        include_once "../app/helpers/navbar.php";
?>
        <h1>Reset Password</h1><br><br>
            <form action="/emailsend" method="post">
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
<?php
    }

    public function reset()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // PEGAR DADOS
            $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');

            // INSTANCIAR CLASS
            include '../app/classes/Dbh.classes.php';
            include '../app/classes/resetpassword.classes.php';
            include '../app/controllers/resetpassword_controller.classes.php';


            $reset = new ResetController($email);
            
            // RUN ERRORS HANDLERS
            $reset->SendResetEmail();

            // VOLTAR PARA PAGE
            header("Location: /");
        } 
    }
}