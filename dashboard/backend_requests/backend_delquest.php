<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    $vcn = explode('|',$_POST['vcn']);
    $id = $vcn[0];
    $sub = $vcn[1];
    $scode = $vcn[2];

    require('../../class/del_class.php');
    $del_ob = new DEL();
    $del_con = $del_ob->del_subject($id,$sub,$scode);
    if ($del_con) {
        $del_don = $del_ob->del_questions($sub,$scode);
        if ($del_don) {
            $del = "Deletion Process Complete"; 
        }else{
            $del = 'Deletion Process Not Complete'; 
        }
        
    }else {
        $del = "Deletion Process Not Successful "; 
    }
    echo "<div class='msg'><div class='msa'>$del</div><button class='aj-btn'>OKAY</button></div>";
}


?>