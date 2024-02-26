
<?php
    //class for deleting data in database
   
    class  DEL
    {
        public function del_candidate($id,$reg){
            
            require("db/database_connection.php");

            $delete = $con->query("DELETE FROM candidates WHERE id='$id' AND reg_no='$reg' ");
    
            return $delete;
        }

        public function del_subject($id,$sub,$scode){
            
            require("db/database_connection.php");

            $delete = $con->query("DELETE FROM subjects WHERE id='$id' AND subjects='$sub' AND subject_code='$scode' ");
    
            return $delete;
        }

        public function del_questions($sub,$scode){
            
            require("db/database_connection.php");

            $delete = $con->query("DELETE FROM questions WHERE  subjects='$sub' AND subject_code='$scode' ");
    
            return $delete;
        }
    }
?>