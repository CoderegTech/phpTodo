<?php

class SignupContrl extends User
{

    private $user_uid;
    private $username;
    private $email;
    private $password;
    private $confirmPassword;
    private $profileImg;

    public function __construct($user_uid, $username, $email, $password,  $confirmPassword, $profileImg)
    {
        $this->user_uid = $user_uid;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->profileImg = $profileImg;
    }

    public function registerUser()
    {

        if ($this->isEmpty() === false) {
            echo "Please fill up all Fields!";
            exit;
        }


        if ($this->isEmailValid() === false) {
            echo "Please enter valid email";
            exit;
        }

        if ($this->passwordNotMatch() === false) {
            echo "Password do not match";
            exit;
        }

        if ($this->isUserExist()) {
            echo "Email is Already exist";
            exit;
        }

        if ($this->passwordValid()) {
            echo "Your Password Must Contain At Least 8 Characters!";
            exit;
        }


        $profileImgName =  $this->profileImage();

        $this->register(
            $this->user_uid,
            $this->username,
            $this->email,
            $this->password,
            $profileImgName
        );
    }

    public function profileImage()
    {

        $fileName = $this->profileImg['name'];
        $fileTmpName = $this->profileImg['tmp_name'];
        $fileSize = $this->profileImg['size'];
        $fileError = $this->profileImg['error'];
        $fileType = $this->profileImg['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (empty($this->profileImg['name'])) {
            echo "Please insert image!";
            exit;
        }

        if (!in_array($fileActualExt, $allowed)) {
            echo "File type is not allowed!";
            exit;
        }

        if ($fileError !== 0) {
            echo "There was an error uploading your file!";
            exit;
        }

        if ($fileSize > 1000000) {
            echo "Your file is too big!";
            exit;
        }
        $fileNameNew = uniqid('') . "." . $fileActualExt;
        $folder = "profileImages";

        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }

        $fileDestination = $folder . "/" . $fileNameNew;

        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            echo "Upload file Failed";
            exit;
        }
        return $fileNameNew;
    }

    public function isUserExist()
    {
        if ($this->checkUser($this->email)) {
            return true;
        }
        return false;
    }

    public function isEmpty()
    {
        if (
            !empty($this->username) || !empty($this->email) || !empty($this->password)
        ) {
            return true;
        }
        return false;
    }

    public function isEmailValid()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function passwordNotMatch()
    {
        if ($this->password === $this->confirmPassword) {
            return true;
        }
        return false;
    }

    public function passwordValid()
    {

        if (strlen($this->password) <= 8) {
            return true;
        }
        return false;
    }
}