<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {

    $sub = $_POST['sub'];
    $noq = $_POST['noq'];
    $quest = $_POST['quest'];
    $corr = $_POST['corr'];
    $A = $_POST['A'];
    $B = $_POST['B'];
    $C = $_POST['C'];
    $D = $_POST['D'];
    $qno = $_POST['qno'];
    $subcode = pint().lint().'SUB';
    //$subcode = "";
    require("../../date_la_time.php");

    require("../../class/ins_class.php");

    $ins_ob = new INS();

    
    require("../../class/sel_class.php");

    $sel_ob = new SEL();
    

    $ins_sub = $ins_ob->ins_subject($subcode,$sub,$noq,$date,$fullDate,$time);
    if ($ins_sub) {
        
        $sel_con = $sel_ob->sel_subj($sub);
        if ($sel_con) {
            $row = $sel_con->fetch_assoc();
            $subcd = $row['subject_code'];

            $insconSuccess = '';
            foreach ($quest as $key => $value) {

                $ins_con = $ins_ob->ins_question($subcd,$sub,$qno[$key],$value,$A[$key],$B[$key],$C[$key],$D[$key],$corr[$key],$date,$fullDate,$time);
                if ($ins_con) {
                    $insconSuccess = "<div class='msg'><div class='msa'>Inserted Successfully</div><button class='aj-btn'>COMPLETE</button></div>";
                }else {
                    $insconSuccess = "<div class='msg'><div class='msa'>Not Inserted</div><button class='aj-btn'>COMPLETE</button></div>";
                }
            }

            echo $insconSuccess;

        }
    }else {
        echo "<div class='msg'><div class='msa'>Not Inserted At All</div><button class='aj-btn'>COMPLETE</button></div>";
    }
}



function pint(){
    $len = 9;
    $char = '0123456789';
    $pin = '';
    
    for ($i=0; $i <=$len; $i++) {
       @$pin.=$char[mt_rand(0,strlen($char))];
    }
    return $pin;
}


function lint(){
    $len = 3;
    $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pin = '';
    
    for ($i=0; $i <=$len; $i++) {
       @$pin.=$char[mt_rand(0,strlen($char))];
    }
    return $pin;
}

?>