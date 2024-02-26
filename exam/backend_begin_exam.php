<?php
    session_start();

    $name = $_SESSION['name'];
    $reg = $_SESSION['reg'];

    require("../class/sel_class.php");
    $sel_ob = new SEL();
    $sel_con = $sel_ob->sel_begin_exam($name,$reg);
    $row = $sel_con->fetch_assoc();

    $period = explode(':',$row['exam_period']);

    $startHour = date('H')+1;
    $startMin = date('i');
    $startSec = date('s');

    $hrper = $startHour + $period[0];
    $minper = $startMin + $period[1];
    $secper = $startSec + $period[2];

    $start_time = $startHour.':'.$startMin.':'.$startSec;

    if ($secper >= 60 AND $minper < 60) {
        $secdb = $secper - 60;
        $end_time = $hrper.':'.($minper+1).':'.$secdb;
    }elseif ($minper >= 60 AND $secper < 60) {
        $mindb = $minper - 60;
        $end_time = ($hrper + 1).':'.$mindb.':'.$secper;
    }
    elseif ($secper >= 60 AND $minper >= 60) {
        $secdb = $secper - 60;
        $mindb = $minper - 60;
        $end_time = ($hrper + 1).':'.($mindb + 1).':'.$secdb;
    }else {
        $end_time = $hrper.':'.$minper.':'.$secper;
    }

    require("../class/up_class.php");
    $up_ob = new UPD();
    $up_con = $up_ob->upd_beg_exm($start_time,$end_time,$name,$reg);
    $sub = explode('-|-',$_SESSION['subjects']);
    $up_con ? print('<script>window.location="exam.php?sub='.$sub[0].'&quest=1"</script>') : print('<p>not updated</p>');
?>