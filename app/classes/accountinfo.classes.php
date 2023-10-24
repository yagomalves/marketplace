<?php

class AccountInfo extends Dbh
{
    protected function GetAccountInfo($userId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_id = ?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: /user?error=profilenotfound");
            exit();
        }

        $accountData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $accountData;
    }

    protected function SetNewAccountInfo($accountEmail, $accountPhone, $accountFirstName, $accountLastName, $userId)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET user_email = ?, user_phone = ?, user_first_name = ?, user_last_name = ? WHERE users_id = ?;");

        if(!$stmt->execute(array($accountEmail, $accountPhone, $accountFirstName, $accountLastName, $userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


}