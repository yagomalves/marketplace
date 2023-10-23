<?php

class ResetController extends ResetPassword
{
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function SendResetEmail()
    {
        $this->GenerateToken($this->email);
    }
}