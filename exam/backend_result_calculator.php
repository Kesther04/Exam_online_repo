<?php
    session_start();
    
    $_SESSION['reg'];

    require("../class/sel_class.php");
    $sel_ob = new SEL();

    require("../class/ins_class.php");
    $ins_ob = new INS();

    
    require("../class/up_class.php");
    $up_ob = new UPD();

    
    require("../date_la_time.php");

    $ssubb = explode('-|-',$_SESSION['subjects']);
    $tot = 0;
    foreach ($ssubb as $key => $value) {
        $stum = 0;
        $sux = str_replace('_',' ',$value);
        $sel_con = $sel_ob->sel_qmng($_SESSION['reg'],$sux);
        while ($row = $sel_con->fetch_assoc()){
            
            $sel_don = $sel_ob->sel_question_subcode_quest($row['subjects'],$row['subject_code'],$row['quest_no']);
            $dow = $sel_don->fetch_assoc();
            if ($dow['correct'] === $row['answer']) {
                $stum += 1;
            }else {
                $stum += 0;
            }
        }
        $sel_ton = $sel_ob->sel_subj($sux);
        $tow = $sel_ton->fetch_assoc();
        $ins_con = $ins_ob->ins_result($_SESSION['name'],$_SESSION['reg'],$tow['subject_code'],$sux,$stum,0,$date,$fullDate,$time);

        $tot +=  $stum;
    }
    $up_con = $up_ob->upd_result($tot,$_SESSION['reg'],$_SESSION['name']);
    if ($up_con) {
        print("<script>window.location='exam_end.php'</script>");
    }
    


?>