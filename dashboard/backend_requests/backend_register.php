<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {

    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $cno = $_POST['cno'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $level = $_POST['loe'];
    $sub = "Mathematics-|-English_Language";
    $reg = pint().lint();
    $estats = "Unchecked";
    require("../../date_la_time.php");

    require("../../class/ins_class.php");

    $ins_ob = new INS();


    $ins_con = $ins_ob->ins_candidate($name,$reg,$dob,$gender,$email,$cno,$state,$lga,$level,$sub,$estats,$date,$fullDate,$time);

    if ($ins_con) {
        $ins_don = $ins_ob->ins_exam_period($name,$reg,'NULL','NULL','02:00:00',$date,$fullDate,$time);
        if ($ins_don) {
            echo "<div class='msg'><div class='msa'>Inserted Successfully</div><button class='aj-btn'>COMPLETE</button></div>";    
        }else {
            echo "<div class='msg'><div class='msa'>Exam Period Not Established For This Candidate</div><button class='aj-btn'>COMPLETE</button></div>";
        }
        
    }else{
        echo "<div class='msg'><div class='msa'>Not Inserted</div><button class='aj-btn'>COMPLETE</button></div>";
    }
}



function pint(){
    $len = 7;
    $char = '0123456789';
    $pin = '';
    
    for ($i=0; $i <=$len; $i++) {
       @$pin.=$char[mt_rand(0,strlen($char))];
    }
    return $pin;
}


function lint(){
    $len = 2;
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pin = '';
    
    for ($i=0; $i <=$len; $i++) {
       @$pin.=$char[mt_rand(0,strlen($char))];
    }
    return $pin;
}

?>