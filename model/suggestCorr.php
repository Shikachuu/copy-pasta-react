<?php
    class Correction  
    {
        private $pastaName;
        private $correction;
        private $corrector;
        private $description;
        private $mdb;
        public function __construct($name,$corr,$who,$desc)
        {
            $this->pastaName = $name;
            $this->correction = $corr;
            $this->corrector = $who;
            $this->description = $desc;
            include_once("../controller/mongo.php");
            $mdb = mongodb::get();
        }
    }
    
?>