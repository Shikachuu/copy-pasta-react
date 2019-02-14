<?php
    class AddPasta
    {
        private $p_name = "";
        private $p_created = "";
        private $p_creator = "";
        private $p_content = "";
        private $p_password = "";
        private $p_user_id = "";
        public function userPInclude($pname,$pcreated,$pcreator,$pcontent,$puserid){
            $p_name = $pname;
            $p_created = $pcreated;
            $p_creator = $pcreator;
            $pcontent = $p_content;
            $p_user_id = $puserid;
        }
        public function guestPInclude($pname,$pcreated,$pcreator,$pcontent,$ppassword){
            $p_name = $pname;
            $p_created = $pcreated;
            $p_creator = "Guest";
            $pcontent = $p_content;
            $p_password = $ppassword;
        }
        private function insertPaste(){

        }
    }
    
?>