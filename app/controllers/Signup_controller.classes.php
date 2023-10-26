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
    private $uniqueId;
    private $status;
    private $new_img_name;

    public function __construct($password, $passwordRepeat, $email, $firstName, $lastName, $phone, $signupDate, $uniqueId, $status, $new_img_name)
    {
        $this->password = $password; 
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->signupDate = $signupDate;
        $this->uniqueId = $uniqueId;
        $this->status = $status;
        $this->new_img_name = $new_img_name;
    }

    public function SignupUser()
    {
        if($this->emptyInput() == false) {
            header("Location: /?error=emptyinput");
            exit();
        } 
        if($this->invalidEmail() == false) {
            header("Location: /?error=email");
            exit();
        }
        if($this->PwdMatch() == false) {
            header("Location: /?error=passwordmatch");
            exit();
        }
        if($this->UidTakenCheck() == false) {
            header("Location: /?error=useroremailtaken");
            exit();
        }

    $this->setUser($this->password, $this->email, $this->firstName, $this->lastName, $this->phone, $this->signupDate, $this->uniqueId, $this->status, $this->new_img_name);

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