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
        private function validate($username,$password,$email)
        {
            $valid = false;
            if (!empty($username) && !empty($password) && !empty($email)) {
                if (strlen($password) >= 8) {
                    if (strpos($email,"@") && strpos($email,".")) {
                        $this->username = $this->mysqldb->escape($username);
                        $this->password = md5($this->mysqldb->escape($password));
                        $this->email = $this->mysqldb->escape($email);
                        $valid = true;
                    }else {
                        $this->errorMSG += " The email address isn't valid.";
                    }
                }else {
                    $this->errorMSG += " The password must be atleast 8 char long.";
                }
            }else {
                $this->errorMSG += " You should fill all the fields.";
            }
            return $valid;
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
            if ($this->validate($rusername,$rpassword,$remail)) {
                if ($this->isUserExist() === false) {
                    if ($this->password == md5($rpasswordag)) {
                        $this->mysqldb->query("INSERT INTO users (`username`, `password`,`email`) VALUES ($this->username,$this->password,$this->email)");
                        $this->login($this->username,$this->password);
                        return "The registration was successful.";
                    }
                }else {
                    return $this->errorMSG;
                }
            }else {
                return $this->errorMSG;
            }
        }
        public function login($username,$password)
        {
            
        }
    }
?>