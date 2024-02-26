<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">
    <div id='masag'></div>

    <?php 
        require("dashboard_layout.php"); 
        if (!isset($_GET['id']) AND !isset($_GET['reg'])) {
            print("<script>window.location='candidates.php'</script>");
        }elseif (isset($_GET['id']) AND !isset($_GET['reg'])) {
            print("<script>window.location='candidates.php'</script>");
        }elseif (!isset($_GET['id']) AND isset($_GET['reg'])) {
            print("<script>window.location='candidates.php'</script>");
        }else {
            $id = $_GET['id'];   
            $reg = $_GET['reg'];
        }
        
        
        require("../class/sel_class.php");
        $sel_ob = new SEL();

        $sel_con = $sel_ob->sel_candid_reg($id,$reg);
        $row = $sel_con->fetch_assoc();
        if (!isset($row['id']) OR !isset($row['reg_no'])) {
            print("<script>window.location='candidates.php'</script>");
        }elseif (!isset($row['id']) AND !isset($row['reg_no'])) {
            print("<script>window.location='candidates.php'</script>");
        }else{
        
        
    ?>
    <section class="main-div-container">
        <form class="upd-reqc" action="backend_requests/backend_upd_cand.php" method="post">
            <div class="sec-div-container">
                    
                <h1>UPDATE CANDIDATE INFO</h1>
                
                <div class="fir-div-container">
                    <table>
                        <tr>
                            <td>
                                <span>Name Of Candidate</span>
                                <input type="text" name="name" placeholder="Enter the Name of the candidate" required value="<?php echo $row['name']; ?>">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" required readonly>
                                <input type="hidden" name="reg" value="<?php echo $row['reg_no']; ?>" require readonly>
                            </td>


                            <td>
                                <span>Date Of Birth</span>
                                <input type="date" name="dob" value="<?php echo $row['dob']; ?>"  required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <span>Email Address</span>
                                <input type="email" name="email" placeholder="Enter Candidate Email Address"  required value="<?php echo $row['email']; ?>">
                            </td>

                            <td>
                                <span>Gender</span>
                                <select name="gender" required>
                                    <?php if($row['gender']=='MALE'){ ?>
                                    <option>MALE</option>
                                    <option>FEMALE</option>
                                    <?php }else{ ?>
                                    <option>FEMALE</option>
                                    <option>MALE</option>
                                    <?php } ?>
                                </select>
                            </td>
                        
                        </tr>

                        <tr>
                            
                            <td>
                                <span>State Of Origin</span>
                                <select name="state" id="state" onchange="show(ele)" required>
                                    <option value="<?php echo $row['state_of_org']; ?>"><?php echo $row['state_of_org']; ?></option>
                                </select>
                            </td>

                            
                            <td id="slga1">
                                <span>LGA</span>
                                <select name="lga" id="slga" required>
                                    <option value="<?php echo $row['lga']; ?>"><?php echo $row['lga']; ?></option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            

                            <td>
                                <span>Contact No.</span>
                                <input type="number" name="cno" placeholder="Enter Candidate contact number" required value="<?php echo $row['contact_no']; ?>">
                            </td>

                            <td>
                                <span>Level Of Education</span>
                                <input type="text" name="loe" placeholder="Enter Your Level Of Education" required value="<?php echo $row['level_of_edu']; ?>">
                            </td>
                            
                        </tr>

                    </table>
                </div>

                
                <div class="con-btn-div">
                    <button class="con-btn">UPDATE</button>
                </div>

            </div>
        </form>
    </section>
    <?php }?>
    <script src="../js/loc_form.js"></script>
</body>
</html>