<?php

class NewPasswordController extends NewPassword
{
        private $selector;
        private $validator;
        private $password;
        private $passwordRepeat;
        private $currentDate;

        public function __construct($selector, $validator, $password, $passwordRepeat, $currentDate)
    {
        $this->selector = $selector;
        $this->validator = $validator;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->currentDate = $currentDate;
    }

    public function CreatePassword()
    {
        $this->ValidateToken($this->selector, $this->validator, $this->password, $this->passwordRepeat, $this->currentDate);
    }
}