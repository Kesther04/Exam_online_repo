<?php

if (isset($_GET['items'])) {
    
    $items = explode('|',$_GET['items']);

    $reg = $items[0];
    $subcode = $items[1];
    $subject = $items[2];
    $qno = $items[3];
    $ans = $items[4];
    require('../date_la_time.php');

    require('../class/ins_class.php');

    $ins_ob = new INS();

    require('../class/sel_class.php');

    $sel_ob = new SEL();

    require('../class/up_class.php');

    $up_ob = new UPD();

    $sel_con = $sel_ob->sel_quest_mng($reg,$subcode,$subject,$qno);
    $row = $sel_con->fetch_assoc();
    if ($row['reg_no'] == $reg AND $row['subject_code'] == $subcode AND $row['subjects'] == $subject AND $row['quest_no'] == $qno) {
        $up_con = $up_ob->upd_quest_mng($ans,$reg,$subcode,$subject,$qno);
        if ($up_con) {
            echo "Update Successful";
        }
    }else {
       
        $ins_con = $ins_ob->ins_question_manager($reg,$subcode,$subject,$qno,$ans,$date,$fullDate,$time);
        if ($ins_con) {
            echo "Inserted Successfully";
        }
    }
}




?>