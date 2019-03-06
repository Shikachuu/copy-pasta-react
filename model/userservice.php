<?php
    class UserService{
        private $username;
        private $password;
        private $email;
        private $mysqldb;
        private $errorMSG;
        public function __construct()
        {
            require_once('../controller/sql.php');
            $mysql = db::get();
            $this->mysqldb = $mysql;
        }
        private function validate($username,$password)
        {
            $valid = false;
            if (!empty($username) && !empty($password)) {
                if (strlen($password) >= 8) {
                    $this->username = $this->mysqldb->escape($username);
                    $this->password = md5($this->mysqldb->escape($password));
                    $valid = true;
                }else {
                    $this->errorMSG += " The password must be atleast 8 char long.";
                }
            }else {
                $this->errorMSG += " You should fill all the fields.";
            }
            return $valid;
        }
        // NOTE: separated cause of the login
        private function validateMail($email)
        {
            if (strpos($email,"@") && strpos($email,".")) {
                $this->email = $this->mysqldb->escape($email);
                return true;
            }else {
                $this->errorMSG += " The email address isn't valid.";
                return false;
            }
        }
        // NOTE: always run validaate before isUserExist!!
        private function isUserExist()
        {
            if ($this->mysqldb->numrows("SELECT * FROM users WHERE username=".$this->username)>0) {
                $this->errorMSG += " The user is already exist.";
                return true;
            }else{
                $this->errorMSG += " The user doesn't exist.";
                return false;
            }
        }
        public function register($rusername,$rpassword,$rpasswordag,$remail)
        {
            $success = false;
            if ($this->validate($rusername,$rpassword) && $this->validateMail($remail)) {
                if ($this->isUserExist() === false) {
                    if ($this->password == md5($rpasswordag)) {
                        $this->mysqldb->query("INSERT INTO users (`username`, `password`,`email`) VALUES ($this->username,$this->password,$this->email)");
                        $_SESSION["user_id"] = $this->mysqldb->insert_id();
                        $_SESSION["username"] = $this->username;
                        return "The registration was successful. You have been automaticaly logged in.";
                    }
                }else {
                    return $this->errorMSG;
                }
            }else {
                return $this->errorMSG;
            }
        }
        public function login($lusername,$lpassword)
        {
            if ($this->validate($lusername,$lpassword)) {
                if ($this->isUserExist() === true) {
                    $dummy = $this->mysqldb->query("SELECT * FROM users WHERE username=".$this->username);
                    if (password_verify($lpassword,$dummy["password"])) {
                        //session_start();
                        $_SESSION["user_id"] = $dummy["user_id"];
                        $_SESSION["username"] = $this->username;
                        return "Login successfull, Welcome ".$this->username;
                    }else {
                        $this->errorMSG = "Wrong password.";
                        return $this->errorMSG;
                    }
                }else {
                    return $this->errorMSG;
                }
            }else {
                return $this->errorMSG;
            }
        }
        public function logout()
        {
            if (isset($_SESSION["user_id"])&&isset($_SESSION["username"])) {
                session_unset();
                session_destroy();
                return "You log out successfully.";
            }else {
                $this->errorMSG = "You have to log in first.";
                return $this->errorMSG;
            }
        }
    }
?>