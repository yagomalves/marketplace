<?php

class Status extends Dbh
{
    public function UpdateStatusToOff()
    {
        $userId = $_SESSION['userid'];
        $stmt = $this->connect()->prepare("UPDATE users SET status = 'Offline now' WHERE users_id = ?;");

        if(!$stmt->execute(array($userId))) {
            $stmt = null;
            header("Location: /user?error=stmtfailed");
            exit();
        }

        $stmt = null;

    }
    
}