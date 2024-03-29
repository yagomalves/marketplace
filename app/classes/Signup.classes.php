<?php

class Signup extends Dbh
{
    protected function setUser($password, $email, $firstName, $lastName, $phone, $signupDate, $uniqueId, $status, $new_img_name)
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (user_pwd, user_email, user_first_name, user_last_name, user_phone, user_signup_date, unique_id, status, user_img) VALUES (?,?,?,?,?,?,?,?,?);");

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($hashedPwd, $email, $firstName, $lastName, $phone, $signupDate, $uniqueId, $status, $new_img_name))) {
            $stmt = null;
            header("Location: /?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function checkUser($email)
    {
        $stmt = $this->connect()->prepare("SELECT user_email FROM users WHERE user_email = ?;");

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: /?error=stmtfailed");
            exit();
        }

        // $resultCheck;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }


    protected function GetUserId($email)
    {
        $stmt = $this->connect()->prepare("SELECT users_id FROM users WHERE user_email = ?;");

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: /user?error=profilenotfound");
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }
}
