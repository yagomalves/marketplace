<?php

class Login extends Dbh
{
    protected function getUser($uid, $password)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_email = :email;");
        $stmt->bindParam(':email', $uid, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            $stmt = null;
            header("Location: /?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: /?error=usernotfound");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $pwdHashed = $user["user_pwd"];
        
        if (password_verify($password, $pwdHashed)) {
            session_start();
            $this->UpdateStatusToOn($user["users_id"]);


            $_SESSION["userid"] = $user["users_id"];
            $_SESSION["phone"] = $user["users_phone"];
            $_SESSION["email"] = $user["users_email"];
            $_SESSION["user_first_name"] = $user["user_first_name"];
            $_SESSION["user_last_name"] = $user["user_last_name"];
            $_SESSION["unique_id"] = $user["unique_id"];
            $_SESSION["user_img"] = $user["user_img"];
            
            header("Location: /");
            
            exit();
        } else {
            header("Location: /?error=wrongpassword");
            exit();
        }
    }

    protected function UpdateStatusToOn($userId)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET status = 'Online now' WHERE users_id =?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }
    }
}