<?php
// To handle requests from the admin login page 
session_start();

if ($_SERVER['REQUEST_METHOD']=="POST") {    
    $unemail = $_POST['email'];
    $pass = $_POST['pass'];
    
    require("class/sel_class.php");

    $sel_ob = new SEL();


    if (empty($unemail)) {
        echo "<script>window.location='index.php?msg=ENTER YOUR EMAIL ADDRESS OR USERNAME'</script>";
    }
    elseif (empty($pass)) {
        echo "<script>window.location='index.php?msg=ENTER YOUR PASSWORD'</script>";
    }
    elseif (filter_var($unemail,FILTER_VALIDATE_EMAIL)) {
        //to select from the database where email and password provided are available
        $sel_con = $sel_ob->sel_log_admin($unemail,$pass);
        if($sel_con->num_rows>0){
            $row =$sel_con->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['name'] = $row['username'];
            $_SESSION['pno'] = $row['phone_no'];
            

    
            echo "<script>window.location='dashboard/'</script>";
        }else {
            echo "<script>window.location='index.php?msg=INCORRECT EMAIL OR PASSWORD'</script>";
        }
    }else {
        //to select from the database where username and password provided are available
        $sel_con = $sel_ob->sel_log_admin_uname($unemail,$pass);
        if($sel_con->num_rows>0){
            $row =$sel_con->fetch_assoc();
            $_SESSION['id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['pass'] = $row['password'];
            $_SESSION['name'] = $row['username'];
            $_SESSION['pno'] = $row['phone_no'];

            
            echo "<script>window.location='dashboard/'</script>";
        }else {
            echo "<script>window.location='index.php?msg=INCORRECT USERNAME OR PASSWORD'</script>";
        }
    }
}





?>