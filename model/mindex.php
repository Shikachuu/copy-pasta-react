<?php
    include_once('../controller/mongo.php');
  
    //$sdb = db::get();
    class Pasta
    {
        private $allPasta;
        private $mdb;
        public function __construct(bool $isAdmin){
            $mdb = mongodb::get();
            if (!$isAdmin) {
                $this->allPasta = $mdb->getFilteredContent("pasta",['is_private'=>false]);
            }
            else {
                $this->allPasta = $mdb->getAllTableContent("pasta");
            }
        }
        public function GetPasta()
        {
            return $this->allPasta;
        }
    }
    
?>