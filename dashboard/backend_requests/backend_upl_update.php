<?php

if ($_SERVER['REQUEST_METHOD']=="POST") {

    $sub = $_POST['sub'];
    $scode = $_POST['scode'];
    $quest = $_POST['quest'];
    $corr = $_POST['corr'];
    $A = $_POST['A'];
    $B = $_POST['B'];
    $C = $_POST['C'];
    $D = $_POST['D'];
    $qno = $_POST['qno'];
    require("../../date_la_time.php");

    require("../../class/up_class.php");

    $up_ob = new UPD();
        
    $upconSuccess = '';
    foreach ($qno as $key => $value) {

        $up_con = $up_ob->upd_question($quest[$key],$A[$key],$B[$key],$C[$key],$D[$key],$corr[$key],$sub,$scode,$value);
        if ($up_con) {
            $upconSuccess = "<div class='msg'><div class='msa'>Updated Successfully</div><button class='aj-btn'>COMPLETE</button></div>";
        }else {
            $upconSuccess = "<div class='msg'><div class='msa'>Not Updated</div><button class='aj-btn'>COMPLETE</button></div>";
        }
    }

    echo $upconSuccess;


}

?>