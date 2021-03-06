<?php
    class GAddPasta
    {
        private $inName;
        private $inCont;
        private $inPass;
        private $inLang;
        private $inIsPrivate;
        private $errorMsg;
        public function __construct($name,$content,$pass,$lang,$ispriv)
        {
            $this->inName = $name;
            $this->inCont = $content;
            $this->inPass = $pass;
            $this->inLang = $lang;
            $this->inIsPrivate = $ispriv;
        }
        private function Verify()
        {
            $isVerified = false;
            if((strlen($this->inName) >= 4) && (strlen($this->inName) <= 64)){
                if (!empty($this->inPass)) {
                    if (strlen($this->inCont)>=4) {
                        $isVerified = true;
                    }else {
                        $this->errorMsg = "Error Processing Request, The Password Is Too Short";
                    }
                }else {
                    $this->errorMsg = "Error Processing Request, The Password Is Too Short";
                }
            }else {
                $this->errorMsg = "Error Processing Request, The User Name Is Too Short Or Too Long";
                var_dump($this->inName);
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
                $insertAssocArr = ['_id' => $mongoID,'pasta_name' => $this->inName,'pasta_content' => $this->inCont, 'created_at' => $nowmongo, 'edited_at' => $nowmongo, 'language' => $this->inLang, 'password' => $this->inPass, 'is_private' => $priv];
                $mdb->insertObject("pasta", $insertAssocArr);
                return ["Your Pasta Has Been Submited. :)",$mongoID];
            }else {
                return $this->errorMsg;
            }
        }
    }
    
?>