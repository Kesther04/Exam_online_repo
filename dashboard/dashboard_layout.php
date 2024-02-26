<?php 
    @session_start();
    if(!isset($_SESSION['id'])){
        echo "<script>window.location='../'</script>";
    }
?>

<script src="../js/dash.js"></script>

<div  id="peon" >&#9776;</div>

<div class="dashboard">
    <div id="losec">&times;</div>
    

    <img src="../images/logo.png" class="dash-logo">

    
    <div class="dash-b">
        <a href="index.php">
            <span>
                <img src="../images/home.svg"  class="fir-img"><img src="../images/lhome.svg" class="sec-img" >CONTROL CENTRE
            </span>
        </a>
    </div>

    
    <div class="dash-b">
        <a href="register.php">
            <span>
                <img src="../images/item_upload.svg"  class="fir-img"><img src="../images/lblog.svg" class="sec-img" >REGISTER CANDIDATE
            </span>
        </a>
    </div>

        
    <div class="dash-b">
        <a href="candidates.php">
            <span>
                <img src="../images/user-fill.svg"  class="fir-img"><img src="../images/user.svg" class="sec-img" >CANDIDATE INFO
            </span>
        </a>
    </div>

    <div class="dash-b">
        <a href="upload.php">
            <span>
                <img src="../images/item_upload.svg"  class="fir-img"><img src="../images/lblog.svg" class="sec-img" >UPLOAD SUBJECT
            </span>
        </a>
    </div>


    <div class="dash-b">
        <a href="alter_upload.php">
            <span>
                <img src="../images/upd-fill.svg"  class="fir-img"><img src="../images/upd.svg" class="sec-img" >SUBJECT TESTS
            </span>
        </a>
    </div>
    

    <div class="dash-b">                    
        <button onclick="if(window.confirm('Are you sure want to log out of this page')){window.location='../';}">
            <span>
                <img src="../images/box_log (2).svg"  class="fir-img"><img src="../images/litem.svg" class="sec-img">LOG OUT
            </span>
        </button>
    </div>
    
</div>



   

