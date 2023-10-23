<?php

namespace app\controllers;

use NewPasswordController;

class NewPassword
{
    public function show()
    {
        include_once "../app/helpers/navbar.php";

        $selector = $_GET["selector"];
        $validator = $_GET["validator"];
    
        if(empty($selector) || empty($validator)) 
        {
            die("Não pudemos validar seu pedido.");
        } else {
    
        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
    ?>
    
            <form action="/setnewpass" method="post">
                <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                <input type="password" name="pwd" placeholder="Digite sua nova senha">
                <input type="password" name="pwd-repeat" placeholder="Repita a nova senha">
                <button type="submit" name="reset-password-submit">Resetar senha</button>
            </form>
    
    <?php } else { die("Solicitação inválida. Tente novamente."); }
        }
    }

    public function set()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            //PEGAR DADOS
            $selector = $_POST["selector"];
            $validator = $_POST["validator"];
            $password = $_POST["pwd"];
            $passwordRepeat = $_POST["pwd-repeat"];
            $currentDate = date("U");
        
            // INSTANCIAR CLASSES
            include '../app/classes/Dbh.classes.php';
            include '../app/classes/createnewpassword.classes.php';
            include '../app/controllers/createnewpassword_controller.classes.php';
        
            
            $createPassword = new NewPasswordController($selector, $validator, $password, $passwordRepeat, $currentDate);
            
            // RUN ERRORS HANDLERS
            $createPassword->CreatePassword();
            // VOLTAR PARA PAGE
            header("Location: /");
        } else {
            header("Location: /");
        }
    }
}