<?php

class ChangePasswd extends User
{

    public function forgotPasswd($email, $changedPassword, $confirmPassword)
    {
        if ($changedPassword != $confirmPassword) {
            echo "Password do not match";
            exit;
        }

        if (empty($email) || empty($changedPassword) || empty($confirmPassword)) {
            echo "Please fill up all fields";
            exit;
        }

        $this->changePasswd($email, $changedPassword);
    }
}