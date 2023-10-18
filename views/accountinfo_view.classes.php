<?php

class AccountInfoView extends AccountInfo
{
    public function FetchEmail($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["user_email"];
    }

    public function FetchPhone($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["user_phone"];
    }

    public function FetchFirstName($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["user_first_name"];
    } 

    public function FetchLastName($userId)
    {
        $accountInfo = $this->GetAccountInfo($userId);
        echo $accountInfo[0]["user_last_name"];
    } 
}