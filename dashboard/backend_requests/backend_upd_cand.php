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
        $reg = $_POST['reg'];
        $id = $_POST['id'];
        require("../../date_la_time.php");

        require("../../class/up_class.php");

        $up_ob = new UPD();

        $up_con = $up_ob->upd_candidate($name,$dob,$gender,$email,$cno,$state,$lga,$level,$id,$reg);

        if ($up_con) {
            $up_don = $up_ob->upd_name_exp($name,$reg);
            $up_eon = $up_ob->upd_name_res($name,$reg);
            echo "<div class='msg'><div class='msa'>Candidate Info Updated</div><button class='aj-btn'>COMPLETE</button></div>";
        }else{
            echo "<div class='msg'><div class='msa'>Candidate Info Not Updated</div><button class='aj-btn'>COMPLETE</button></div>";
        }

    }
?>