<?php
    require('../class/up_class.php');
    $up_ob = new UPD();

    
    $end_tpd = explode(':',$sen['end_time']);
    $startHour = date('H')+1;
    $startMin = date('i');
    $startSec = date('s');

    $hrper = $end_tpd[0] - $startHour;
    $minper = $end_tpd[1] - $startMin;
    $secper = $end_tpd[2] - $startSec;


    if ($minper < 0 AND $secper > 0) {
        $mindb = $minper + 60;
        $exper = ($hrper-1).':'.$mindb.':'.$secper;
    }elseif ($secper < 0 AND $minper > 0) {
        $secdb = $secper + 60;
        $exper = $hrper.':'.($minper-1).':'.$secdb;
    }elseif ($secper < 0 AND $minper < 0) {
        $secdb = $secper + 60;
        $mindb = $minper + 60;
        $exper = ($hrper - 1).':'.($mindb - 1).':'.$secdb;
    }else {
        $exper = $hrper.':'.$minper.':'.$secper;
    }

    $up_con = $up_ob->upd_exm_per($exper,$_SESSION['name'],$_SESSION['reg']);

   
?>