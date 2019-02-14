<?php
    //$mdb = mdb::get();
    //$sdb = db::get();
    class Pasta
    {
        private $allPasta;
        public function __construct(bool $isAdmin){
            if ($isAdmin) {
                //SELECT * FROM pasta;
                $this->allPasta = array("id", "p_name", "p_created", "p_creator", "p_content" =>"1", "Test", "2018-11-03 16:34", "Guest","if(dögöljmeg) ? fasz: geci;");
            }
            else {
                //SELECT * FROM pasta WHERE isPrivate==0;
                $this->allPasta = array("id", "p_name", "p_created", "p_creator", "p_content"=>"1", "Test", "2018-11-03 16:34", "Guest","if(dögöljmeg) ? fasz: geci;");
            }
        }
        public function GetPasta()
        {
            return $this->allPasta;
        }
        public function GetComments(string $pid)
        {
            //SELECT * FROM comments WHERE pid == $pid;
            $comments = array("c_id"=>"1","2","3", "c_creator"=>"Guest","Guest","Guest", "c_created"=>"2018-12-13 14:22", "2018-11-07 20:41", "2018-11-03 19:04", "c_content"=>"Dögöljt meg!", "Halj éhen!", "Anyád szűz.");
            return $comments;
        }
    }
    
?>