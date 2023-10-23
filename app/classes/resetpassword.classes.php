<?php

class ResetPassword extends  Dbh
{
    public function GenerateToken($email)
    {

        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
        if (empty($email)) {
            die("Location: resetpassword.php?error=emailmissing");
        }

        $stmt = $this->connect()->prepare("DELETE FROM pwdreset WHERE pwdResetEmail = :email;");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            die("Location: resetpassword.php?error=stmtfailed");
        }

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $expires = date("U") + 1800;
        $url = "http://localhost:8000/setnewpass?selector=" . $selector . "&validator=" . bin2hex($token);
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);


        $newPass = $this->connect()->prepare("INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);");

        if (!$newPass->execute(array($email, $selector, $hashedToken, $expires))) {
            die("error=stmtfailed");
        }

        $to = $email;
        $subject = "Resete sua senha";
        $message = "Recebemos uma solicitação para resetar senha. O link para resetar está abaixo. Caso não tenha solicitado, ignore esta mensagem.";
        $message .= " Aqui está o link: ";
        $message .= $url;

        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text\r\n";
        $headers = "From: Yago <hartzleryago@gmail.com>\r\n";
        $headers .= "Reply-To: hartzleryago@gmail.com\r\n";

        mail($to, $subject, $message, $headers);

        header("Location: resetpassword.php?reset=success");
    }
}
