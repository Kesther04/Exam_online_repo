
<?php
    //class for selecting data in database
   
    class SEL
    {
        

        public function sel_log_admin($email,$pass) {
        
            require("db/database_connection.php");

            $sel = $con->query(" SELECT * FROM admin_table WHERE email = '$email' AND password = '$pass' ");
    
            return $sel;
            
        }   

        public function sel_log_admin_uname($uname,$pass) {

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM admin_table WHERE username = '$uname' AND password = '$pass' ");
    
            return $sel;
            
        }   


        public function sel_subj($sub){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM subjects WHERE subjects = '$sub' ORDER BY id DESC LIMIT 1");
    
            return $sel;
            
        }

        

        public function sel_subj_unl($sub){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM subjects WHERE subjects = '$sub'");
    
            return $sel;
            
        }

        public function sel_subj_uncode($sub,$scode){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM subjects WHERE subjects = '$sub' AND subject_code='$scode' ");
    
            return $sel;
            
        }

        public function sel_subject(){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM subjects  ");
    
            return $sel;
        }

        public function sel_question(){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM questions ");
    
            return $sel;
        }

        public function sel_candidate(){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM candidates ");
    
            return $sel;
        }

        public function sel_reg_no_cand($reg){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM candidates WHERE reg_no = '$reg' ");
    
            return $sel;
        }
    
        public function sel_question_sub_code($sub,$subcode){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM questions WHERE subjects = '$sub' AND subject_code='$subcode' ");
    
            return $sel;
        }

        public function sel_question_subcode_quest($sub,$subcode,$quest){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM questions WHERE subjects = '$sub' AND subject_code='$subcode' AND quest_no = '$quest' ");
    
            return $sel;
        }

        public function sel_quest_mng($reg,$subcode,$sub,$qno){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM question_manager WHERE reg_no = '$reg' AND subject_code='$subcode' AND subjects='$sub' AND quest_no='$qno' ");
    
            return $sel;
        }

        public function sel_qmng($reg,$sub){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM question_manager WHERE reg_no = '$reg' AND subjects = '$sub' ");
    
            return $sel;
        }

        public function sel_qmng_code($reg,$sub,$subcode){

            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM question_manager WHERE reg_no = '$reg' AND subjects = '$sub' AND subject_code = '$subcode' ");
    
            return $sel;
        }

        public function sel_begin_exam($name,$reg){
            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM exam_period WHERE  name = '$name' AND reg_no = '$reg' ");
    
            return $sel;
        }

        public function sel_candid_reg($id,$reg){
            require("db/database_connection.php");
            
            $sel = $con->query(" SELECT * FROM candidates WHERE  id = '$id' AND reg_no = '$reg' ");
    
            return $sel;
        }
    }


?>