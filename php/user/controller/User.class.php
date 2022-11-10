<?php
class User extends Dbh
{

    protected function changePasswd($email, $changedPassword)
    {
        try {
            $sql = "SELECT email FROM users WHERE email = ?;";

            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute([$email])) {
                echo "Statement failed!";
                exit();
            } else {
                if ($stmt->rowCount() > 0) {

                    $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    $email = $results['email'];

                    $sql = "UPDATE users SET password = :password WHERE email = :email";
                    $stmt = $this->connect()->prepare($sql);

                    $passwordHashed = password_hash($changedPassword, PASSWORD_DEFAULT);

                    $stmt->bindParam(":password", $passwordHashed, PDO::PARAM_STR);
                    $stmt->bindParam(":email",  $email, PDO::PARAM_STR);
                    $execute = $stmt->execute();

                    if (!$execute) {
                        echo "Statement failed!";
                        exit();
                    } else {
                        if ($stmt->rowCount() > 0) {
                            echo "Password Successfully Updated";
                        }
                    }
                }
                // if email not exist
                echo "No account found";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    // Check email if existing
    protected function checkUser($email)
    {
        try {
            $sql = "SELECT email FROM users WHERE email = ?";

            $stmt = $this->connect()->prepare($sql);

            if (!$stmt->execute([$email])) {
                echo "Statement failed!";
                exit();
            } else {

                if ($stmt->rowCount() > 0) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    // Register User to Database
    protected function register($user_uid, $username, $email, $password, $profileImgName)
    {

        try {
            $sql = "INSERT INTO users ( user_uid, username, email, password, profileImgName) 
                    VALUE (:user_uid, :username, :email, :password, :profileImgName);";

            $stmt = $this->connect()->prepare($sql);

            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bindParam(":user_uid", $user_uid, PDO::PARAM_STR);
            $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->bindParam(":password", $passwordHashed, PDO::PARAM_STR);
            $stmt->bindParam(":profileImgName", $profileImgName, PDO::PARAM_STR);

            $execute = $stmt->execute();

            if ($execute) {
                if ($stmt->rowCount() > 0) {
                    echo "User Registered Successfully";
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    protected function login($email, $password)
    {

        try {
            $sql = "SELECT user_uid, username, profileImgName, password FROM users WHERE email = ?";

            $stmt = $this->connect()->prepare($sql);
            $execute = $stmt->execute([$email]);

            if ($execute) {
                if ($stmt->rowCount() > 0) {
                    $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    if (password_verify($password, $results['password'])) {
                        session_start();

                        $_SESSION['user_uid'] = $results['user_uid'];
                        $_SESSION['username'] = $results['username'];
                        $_SESSION['profileImgName'] = $results['profileImgName'];
                        $_SESSION['timeout'] = time();
                        echo "User Login Successfully";
                    } else {
                        echo "Wrong Password";
                    }
                } else {
                    echo "No account found";
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}