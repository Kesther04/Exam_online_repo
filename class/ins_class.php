<?php
//class for inserting data in database
class INS
{
    public function ins_candidate($name,$reg,$dob,$gender,$email,$cno,$state,$lga,$level,$sub,$estats,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO candidates (name,reg_no,dob,gender,email,contact_no,state_of_org,lga,level_of_edu,subjects,exam_status,date,fullDay,time)VALUE('$name','$reg','$dob','$gender','$email','$cno','$state','$lga','$level','$sub','$estats','$date','$fullDay','$time')");

        return $ins;

    }

    public function ins_subject($subcode,$sub,$qno,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO subjects (subject_code,subjects,quest_no,date,fullDay,time)VALUE('$subcode','$sub','$qno','$date','$fullDay','$time')");

        return $ins;
    }

    public function ins_question($subcode,$sub,$qno,$quest,$A,$B,$C,$D,$corr,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO questions (subject_code,subjects,quest_no,question,A,B,C,D,correct,date,fullDay,time)VALUE('$subcode','$sub','$qno','$quest','$A','$B','$C','$D','$corr','$date','$fullDay','$time')");

        return $ins;
    }

    public function ins_question_manager($reg,$subcode,$sub,$qno,$ans,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO question_manager (reg_no,subject_code,subjects,quest_no,answer,date,fullDay,time)VALUE('$reg','$subcode','$sub','$qno','$ans','$date','$fullDay','$time')");

        return $ins;
    }

    public function ins_result($name,$reg,$subcode,$sub,$score,$total,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO results (name,reg_no,subject_code,subjects,score,total,date,fullDay,time)VALUE('$name','$reg','$subcode','$sub','$score','$total','$date','$fullDay','$time')");

        return $ins;
    }

    public function ins_exam_period($name,$reg,$start_time,$end_time,$exam_period,$date,$fullDay,$time){
        require("db/database_connection.php");

        $ins = $con->query("INSERT INTO exam_period(name,reg_no,start_time,end_time,exam_period,date,fullDay,time)VALUE('$name','$reg','$start_time','$end_time','$exam_period','$date','$fullDay','$time')");

        return $ins;
    }
}


?>