<?php

class AccountInfoController extends AccountInfo
{
    private $userId;
    private $accountEmail;
    private  $accountPhone;
    private  $accountFirstName;
    private  $accountLastName;

    public function __construct($accountEmail, $accountPhone, $accountFirstName, $accountLastName, $userId)
    {
        $this->userId = $userId;
        $this->accountEmail = $accountEmail;
        $this->accountPhone = $accountPhone;
        $this->accountFirstName = $accountFirstName;
        $this->accountLastName = $accountLastName;

    }


    public function UpdateAccountInfo()
    {

// ERROR HANDLERS 
    /*    if($this->EmptyInputCheck($about, $introTitle, $introText) == true) {
            header("Location: ../profilesettigns.php?error=emptyinput");
            exit();
        } */

        $this->SetNewAccountInfo($this->accountEmail, $this->accountPhone, $this->accountFirstName, $this->accountLastName, $this->userId);
    }

    // private function EmptyInputCheck($about, $introTitle, $introText)
    // {

    //     if(empty($about) || empty($introTitle) || empty($introText)){
    //         $result = true;
    //     } else {
    //         $result = false;
    //     }
    //     return $result;
    // }

}