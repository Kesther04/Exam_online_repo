
<?php
    //class for updating data in database
    class UPD
    {
        public function upd_quest_mng($ans,$reg,$subcode,$sub,$qno){

            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE question_manager SET answer='$ans' WHERE reg_no = '$reg' AND subject_code='$subcode' AND subjects='$sub' AND quest_no='$qno' ");
    
            return $update;
        }

        public function upd_result($tot,$reg,$name){

            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE results SET total='$tot' WHERE reg_no = '$reg' AND name = '$name' ");
    
            return $update;
        }

        public function upd_beg_exm($stime,$etime,$name,$reg){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE exam_period SET start_time='$stime',end_time='$etime' WHERE name = '$name' AND reg_no = '$reg' ");
    
            return $update;
        }

        public function upd_exm_per($exper,$name,$reg){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE exam_period SET exam_period='$exper' WHERE name = '$name' AND reg_no = '$reg' ");
    
            return $update;
        }

        public function upd_name_exp($name,$reg){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE exam_period SET name='$name' WHERE reg_no = '$reg' ");
    
            return $update;
        }

        public function upd_name_res($name,$reg){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE results SET name='$name' WHERE reg_no = '$reg' ");
    
            return $update;
        }

        public function upd_question($quest,$A,$B,$C,$D,$corr,$sub,$scode,$qno){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE questions SET question='$quest',A='$A',B='$B',C='$C',D='$D',correct='$corr' WHERE subjects = '$sub' AND subject_code = '$scode' AND quest_no = '$qno' ");
    
            return $update;
        }

        public function upd_candidate($name,$dob,$gender,$email,$cno,$state,$lga,$level,$id,$reg){
            
            require("db/database_connection.php");
            
            $update = $con->query(" UPDATE candidates SET name='$name',dob='$dob',gender='$gender',email='$email',contact_no='$cno',state_of_org='$state',lga='$lga',level_of_edu='$level' WHERE id = '$id' AND reg_no = '$reg' ");
    
            return $update;
        }
    }

?>