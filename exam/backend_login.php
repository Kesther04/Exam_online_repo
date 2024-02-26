<?php

session_start();

if ($_SERVER['REQUEST_METHOD']=="POST") {    
    $reg = $_POST['reg'];
    
    require("../class/sel_class.php");

    $sel_ob = new SEL();


    if (empty($reg)) {
        echo "<script>window.location='index.php?msg=ENTER YOUR REGISTRATION NUMBER'</script>";
    }else {
        //to select from the database where registration number provided is available
        $sel_con = $sel_ob->sel_reg_no_cand($reg);
        if($sel_con->num_rows>0){
            $row = $sel_con->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['pno'] = $row['contact_no'];
            $_SESSION['subjects'] = $row['subjects'];
            $_SESSION['reg'] = $row['reg_no'];

            $date = explode('/',$row['date']);
            $day = $date[0];
            $month = $date[1];
            $year = $date[2];

            if ($year !== date('Y')) {
                echo "<script>window.location='index.php?msg=REGISTRATION NUMBER IS OUT OF DATE'</script>";
            }else {
                echo "<script>window.location='instructions.php'</script>";     
            }

           
        }else {
            echo "<script>window.location='index.php?msg=REGISTRATION NUMBER DOES NOT EXIST'</script>";
        }
    }
}





?>