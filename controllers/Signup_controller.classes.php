<?php

class SignupController extends Signup
{
    private $password;
    private $passwordRepeat;
    private $email;
    private $firstName;
    private $lastName;
    private $phone;
    private $signupDate;

    public function __construct($password, $passwordRepeat, $email, $firstName, $lastName, $phone, $signupDate)
    {
        $this->password = $password; 
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->signupDate = $signupDate;
    }

    public function SignupUser()
    {
        if($this->emptyInput() == false) {
            header("Location: ../index.php?error=emptyinput");
            exit();
        } 
        if($this->invalidEmail() == false) {
            header("Location: ../index.php?error=email");
            exit();
        }
        if($this->PwdMatch() == false) {
            header("Location: ../index.php?error=passwordmatch");
            exit();
        }
        if($this->UidTakenCheck() == false) {
            header("Location: ../index.php?error=useroremailtaken");
            exit();
        }

    $this->setUser($this->password, $this->email, $this->firstName, $this->lastName, $this->phone, $this->signupDate);

    }

    private function emptyInput()
    {
        if(empty($this->password) || empty($this->passwordRepeat) || empty($this->email)  || empty($this->firstName) || empty($this->lastName))
        {
            $result = false;
        } else {
            $result = true;
        }
    return $result;
    } 


    private function invalidEmail()
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        {
            $result = false;
        } else {
            $result = true;
        }
    return $result;
    }

    private function PwdMatch()
    {
        if($this->password !== $this->passwordRepeat)
        {
            $result = false;
        } else {
            $result = true;
        }
    return $result;
    }

    private function UidTakenCheck()
    {
        if(!$this->checkUser($this->email))
        {
            $result = false;
        } else {
            $result = true;
        }
    return $result;
    }

    public function FetchUserId($email) 
    {
        $userId = $this->GetUserId($email);
        return $userId[0]["users_id"];
    }

}