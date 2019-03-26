<?php
    class UAddPasta
    {
        private $inName;
        private $inCont;
        private $inUser;
        private $inUserID;
        private $inLang;
        private $inIsPrivate;
        private $errorMsg;
        public function __construct($name,$username,$content,$lang,$ispriv,$userID)
        {
            $this->inName = $name;
            $this->inCont = $content;
            $this->inUser = $username;
            $this->inLang = $lang;
            $this->inIsPrivate = $ispriv;
            $this->inUserID =$userID;
        }
        private function Verify()
        {
            $isVerified = false;
            if((strlen($this->inName) > 4) && (strlen($this->inName) < 64)){
                if (!empty($this->inUser) && !empty($this->inUserID)) {
                    $isVerified = true;
                }else {
                    $this->errorMsg = "Error getting the username, please log in first.";
                }
            }else {
                $this->errorMsg = "Error Processing Request, The Pasta Name Is Too Short Or Too Long";
            }
            return $isVerified;
        }
        public function Upload()
        {
            if ($this->Verify() === true) {
                include_once('../controller/mongo.php');
                $mdb = mongodb::get();
                if ($this->inIsPrivate == 1) {
                    $priv = true;
                }else {
                    $priv = false;
                }
                $now = new DateTime();
                $nowmongo = new MongoDB\BSON\UTCDateTime($now->getTimestamp()*1000);
                $mongoID = new MongoDB\BSON\ObjectID;
                $insertAssocArr = ['_id' => $mongoID,'pasta_name' => $this->inName,'pasta_content' => $this->inCont, 'created_at' => $nowmongo, 'edited_at' => $nowmongo, 'language' => $this->inLang, 'username' => $this->inUser, 'is_private' => $priv, 'user_id' => $this->inUserID];
                $mdb->insertObject("pasta", $insertAssocArr);
                return ["Your Pasta Has Been Submited. :)",$mongoID];
            }else {
                return $this->errorMsg;
            }
        }
    }
    
?>