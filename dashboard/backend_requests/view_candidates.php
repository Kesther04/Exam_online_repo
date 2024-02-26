<?php if ($_SERVER['REQUEST_METHOD']=="POST") { 
    $vcn = explode('|',$_POST['vcn']);
    $id = $vcn[0];
    $reg = $vcn[1];

    require('../../class/sel_class.php');
    $sel_ob = new SEL();

    $sel_con = $sel_ob->sel_candid_reg($id,$reg);
?>
    <link rel="stylesheet" href="../../css/style.css" media="all">
    <link rel="stylesheet" href="../../css/style_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <?php $row = $sel_con->fetch_assoc(); ?>
    <div class="msgas">
        <div id="pre-inner-masag-cot-back">
            <div class="inner-masag-cot-back" title="back to page">
                <img src="../images/arro.svg" width="30" class="sec-img">
                <img src="../images/arro-fill.svg" width="30" class="fir-img">
            </div>
        </div>

        <h1>DETAILS OF <?php echo $row['name']; ?></h1>
        <div class="fir-div-container">
            <table>
                
                <tr>
                    <td><span class="spx">NAME:</span><span><?php echo $row['name']; ?></span></td>
                    <td><span class="spx">REGISTRATION_NO.:</span><span><?php echo $row['reg_no']; ?></span></td>
                </tr>
                
                <tr>
                    <td><span class="spx">DATE_OF_BIRTH:</span><span><?php echo $row['dob']; ?></span></td>
                    <td><span class="spx">GENDER:</span><span><?php echo $row['gender']; ?></span></td>
                </tr>
                
                <tr>
                    <td><span class="spx">EMAIL_ADDRESS:</span><span><?php echo $row['email']; ?></span></td>
                    <td><span class="spx">CONTACT_NO.:</span><span><?php echo $row['contact_no']; ?></span></td>
                </tr>

                <tr>
                    <td><span class="spx">LOCALITY:</span><span><?php echo $row['state_of_org'].','.$row['lga']; ?></span></td>
                    <td><span class="spx">DATE REGISTERED:</span><span><?php echo $row['fullDay']; ?></span></td>
                </tr>
                <tr>
                    <td><span class="spx">TIME REGISTERED:</span><span><?php echo $row['time']; ?></span></td>
                    <td>
                        <span>
                            <a href="upd_candidate.php?id=<?php echo $row['id']; ?>&reg=<?php echo $row['reg_no']; ?>">
                                <button class="cond-btn">UPDATE</button>
                            </a>
                        </span>
                        <span>
                            <form class="vwcanddel" action="backend_requests/confirm_delete.php" method="post">
                                <input type="hidden" name="vcn" value="<?php echo $row['id'].'|'.$row['reg_no'].'|'.$row['name'];?>" required readonly>
                                <button class="cond-btn">DELETE</button>
                            </form>
                        </span>
                    </td>
                </tr>
            </table>
        </div>
    </div>    
<?php } ?>