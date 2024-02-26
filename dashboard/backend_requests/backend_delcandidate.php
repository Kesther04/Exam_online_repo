<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $vcn = explode('|',$_POST['vcn']);
    $id = $vcn[0];
    $reg = $vcn[1];

    require('../../class/del_class.php');
    $del_ob = new DEL();
    $del_con = $del_ob->del_candidate($id,$reg);
    if ($del_con) {
        echo "<div class='msg'><div class='msa'>CANDIDATE INFO DELETED</div><button class='aj-btn'>OKAY</button></div>";
    }else {
        echo "<div class='msg'><div class='msa'>CANDIDATE INFO NOT DELETED</div><button class='aj-btn'>OKAY</button></div>";
    }
}


?>