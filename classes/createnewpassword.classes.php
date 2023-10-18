<?php

class NewPassword extends Dbh
{
    public function ValidateToken()
    {
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd-repeat"];
        $currentDate = date("U");

        if (empty($password) || empty($passwordRepeat)) {
            header("Location: ../resetpassword.php?newpwd=empty");
            exit();
        } else if ($password != $passwordRepeat) {
            header("Location: ../resetpassword.php?newpwd=pwdnotsame");
            exit();
        }

        $stmt = $this->connect()->prepare("SELECT * FROM pwdreset WHERE pwdResetSelector = :pwdResetSelector AND pwdResetExpires >= :pwdResetExpires;");
        $stmt->bindParam(':pwdResetSelector', $selector, PDO::PARAM_STR);
        $stmt->bindParam(':pwdResetExpires', $currentDate, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            die("error=stmtfailed");
        }

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            die("error=stmtfailedVarResult");
        }

        $tokenBin = hex2bin($validator);
        $tokenCheck = password_verify($tokenBin, $result["pwdResetToken"]);

        if ($tokenCheck === false) {
            die("Reenvie seu pedido para resetar senha!");
        } else if ($tokenCheck === true) {

            $tokenEmail = $result["pwdResetEmail"];
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_email = :email;");
            $stmt->bindParam(':email', $tokenEmail, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                die("error=stmtfailed");
            } else {
                //   $result2 = $stmt->fetch(PDO::FETCH_ASSOC);

                $stmt = $this->connect()->prepare("UPDATE users SET user_pwd = :pwd WHERE user_email = :email;");
                $stmt->bindParam(':pwd', $hashedPwd, PDO::PARAM_STR);
                $stmt->bindParam(':email', $tokenEmail, PDO::PARAM_STR);

                if (!$stmt->execute()) {
                    die("error=stmtfailed");
                } else {
                    $stmt = $this->connect()->prepare("DELETE FROM pwdreset WHERE pwdResetEmail = :email;");
                    $stmt->bindParam(':email', $tokenEmail, PDO::PARAM_STR);

                    if (!$stmt->execute()) {
                        die("error=stmtfailed");
                    } else {
                        header("Location: index.php?newpwd=success");
                    }
                }
            }
        }
    }
}
