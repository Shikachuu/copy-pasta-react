<?php
    class Correction  
    {
        private $pastaID;
        private $correction;
        private $corrector;
        private $description;
        private $mdb;
        private $db;
        private $uploadReady;
        public $errorMSG;
        public function __construct($id,$corr,$who,$desc)
        {
            if (empty($id) || empty($corr) || empty($who) || empty($desc)) {
                $errorMSG = "None of the infromation fileds can be empty.";
            }else {
                $this->pastaID = $id;
                $this->correction = $corr;
                $this->corrector = $who;
                $this->description = $desc;
                include_once("../controller/mongo.php");
                $mdb = mongodb::get();
            }
        }
        private function Validate()
        {
            $originalContent = $mdb->getFilteredContent("pasta", $this->pastaID)["pasta_content"];
            if (is_string($originalContent) && $originalContent != $this->correction) {
                $this->uploadReady["correction"] = $this->correction;
                include_once(userservice.php);
                $userservice = new UserService();
                $userservice->username = $this->corrector;
                if ($userservice->isUserExist() === true) {
                    $this->uploadReady["corrector"] = $this->corrector;
                    if (strlen($this->description)>4) {
                        $this->uploadReady["desc"] = $this->description;
                    }else {
                        $errorMSG = "The description must be at least 4 char.";
                    }
                }else {
                    $errorMSG = "The user doesn't exist.";
                }
            }else {
                $errorMSG = "You can't submit a correction without correcting the text.";
            }
        }
    }
    
?>