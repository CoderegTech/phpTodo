<?php

class LoginContrl extends User
{

    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->isEmpty()) {
            echo "Please fill up all Fields!";
            exit;
        }
        $this->login($this->email, $this->password);
    }

    private function isEmpty()
    {
        if (empty($this->email) || empty($this->password)) {
            return true;
        } else {
            return false;
        }
    }
}