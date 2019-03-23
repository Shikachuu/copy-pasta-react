<?php
    class Profiler
    {
        private $mdb;
        private $mysql;
        public $username;
        public $email;
        public function __construct($username) {
            include_once("mongod.php");
            include_once("sql.php");
            $this->mdb = mongodb::get();
            $this->mysql = db::get();
            $dummy = ("SELECT * FROM users WHERE username='".$username."'");
            $this->username = $dummy["username"];
            $this->email = $dummy["email"];
        }
        public function GetUserPastas()
        {
            return $this->mdb->getFilteredContent("pasta",['username'=>$this->username]);
        }
    }
    
?>