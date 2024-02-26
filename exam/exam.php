<?php 
    session_start(); 
    if (!isset($_SESSION['id'])) {
        print('<script>window.location="index.php"</script>');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <title>EXAMINATION</title>
</head>
<body id="total-div">
    <div id="masag">
        <div class="msgas">
            <div id="pre-inner-masag-cot-back">
                <div class="inner-masag-cot-back" title="back to page">
                    <img src="../images/arro.svg" width="30" class="sec-img">
                    <img src="../images/arro-fill.svg" width="30" class="fir-img">
                </div>
            </div>

            <div class="calculator">
                <form name="calcForm">
                    <div><input type="text" name="display" readonly></div>
                    <div>
                        <input type="button" value="C" onclick="calcForm.display.value=''">
                        <input type="button" value="(" onclick="calcForm.display.value+='('">
                        <input type="button" value=")" onclick="calcForm.display.value+=')'">
                        <input type="button" value="/" onclick="calcForm.display.value+='/'">
                    </div>
                    <div>
                        <input type="button" value="1" onclick="calcForm.display.value+='1'">
                        <input type="button" value="2" onclick="calcForm.display.value+='2'">
                        <input type="button" value="3" onclick="calcForm.display.value+='3'">
                        <input type="button" value="+" onclick="calcForm.display.value+='+'">
                    </div>
                    <div>
                        <input type="button" value="4" onclick="calcForm.display.value+='4'">
                        <input type="button" value="5" onclick="calcForm.display.value+='5'">
                        <input type="button" value="6" onclick="calcForm.display.value+='6'">
                        <input type="button" value="-" onclick="calcForm.display.value+='-'">
                    </div>
                    <div>
                        <input type="button" value="7" onclick="calcForm.display.value+='7'">
                        <input type="button" value="8" onclick="calcForm.display.value+='8'">
                        <input type="button" value="9" onclick="calcForm.display.value+='9'">
                        <input type="button" value="*" onclick="calcForm.display.value+='*'">
                    </div>
                    <div>
                        <input type="button" value="0" onclick="calcForm.display.value+='0'">
                        <input type="button" value="." onclick="calcForm.display.value+='.'">
                        <input type="button" value="%" onclick="calcForm.display.value=(calcForm.display.value)/100">
                        
                        <input type="button" value="=" onclick="calcForm.display.value=eval(calcForm.display.value)">
                    </div>

                </form>
            </div>
        </div>

    </div>

    <?php $refreshRate = 30;//Refresh every 30 seconds ?>
    <div id="reflex">
        <meta http-equiv="refresh" content="<?php echo $refreshRate; ?>">    
    </div>
    <section class="examination">
        <header>
            <button id="use_calc">USE CALCULATOR</button>
            <ul>
                
                <?php 
                    $sub = explode('-|-',$_SESSION['subjects']);
                    foreach ($sub as $key => $value) {
                    if ($value == $_GET['sub']){
                ?>
                    <li id="prs-li"><a href="exam.php?sub=<?php echo $value; ?>&quest=1"><?php echo str_replace('_',' ',$value); ?></a></li>
                <?php }else { ?>
                    <li><a href="exam.php?sub=<?php echo $value; ?>&quest=1"><?php echo str_replace('_',' ',$value); ?></a></li>        
                <?php } ?>
                
                <?php } ?>
                <li id="time"></li>
            </ul>
            
        </header>
        <?php 
            require("../class/sel_class.php");
            $sel_ob = new SEL();
          
            $sel_sub = $sel_ob->sel_subj(str_replace('_',' ',$_GET['sub']));
            $row = $sel_sub->fetch_assoc();
            $sel_con = $sel_ob->sel_question_sub_code($row['subjects'],$row['subject_code']);
            $sel_cono = $sel_ob->sel_question_sub_code($row['subjects'],$row['subject_code']);
            $sel_sono = $sel_ob->sel_question_sub_code($row['subjects'],$row['subject_code']);
            $sel_rono = $sel_ob->sel_question_sub_code($row['subjects'],$row['subject_code']);
            $selep = $sel_ob->sel_begin_exam($_SESSION['name'],$_SESSION['reg']);
        ?>
        <div style="display:none;">
            <div id="tyear"><?php echo date('Y'); ?></div>
            <div id="tmon"><?php echo date('m'); ?></div>
            <div id="tday"><?php echo date('d'); ?></div>
            <?php 
                $sen = $selep->fetch_assoc();
                 
                require('backend_exam_period.php');
                if ($end_tpd[0] >= 0 AND $end_tpd[0] <= 9) {
                    echo '<div id="thour">'.'0'.$end_tpd[0].'</div>';
                }else {
                    echo '<div id="thour">'.$end_tpd[0].'</div>';
                }

                if ($end_tpd[1] >= 0 AND $end_tpd[1] <= 9) {
                    echo '<div id="tmin">'.'0'.$end_tpd[1].'</div>';
                }else {
                    echo '<div id="tmin">'.$end_tpd[1].'</div>';
                }

                if ($end_tpd[2] >= 0 AND $end_tpd[2] <= 9) {
                    echo '<div id="tsec">'.'0'.$end_tpd[2].'</div>';
                }else {
                    echo '<div id="tsec">'.$end_tpd[2].'</div>';
                }
               
            
            ?>
        </div>
        
        <div class="main-exam">
            <main>
                
                <div class="single-question">

                    <?php  while ($dow = $sel_con->fetch_assoc()) { if($dow['quest_no'] == $_GET['quest']){ ?>
            
                        <div class="questions">
                            <!-- question number -->
                            <span><?php echo $dow['quest_no'].'.'; ?></span>

                            <!-- Actual Question -->
                            <?php echo $dow['question']; ?>
                        </div>
                        <div class="options">
                            <!-- Options for Question -->
                            <?php
                                $selqstmng = $sel_ob->sel_quest_mng($_SESSION['reg'],$dow['subject_code'],$dow['subjects'],$dow['quest_no']);
                                $sow = $selqstmng->fetch_assoc();
                            ?>

                            <?php if(isset($sow['answer'])){ ?>
                                <div>
                                    <?php if ($sow['answer'] == "A") { ?>
                                        <span>A.</span>
                                        <input type="radio" name="option" id="aopt" value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|A' ;?>" checked>
                                        <?php echo $dow['A']; ?>
                                    <?php }else{  ?>
                                        <span>A.</span>
                                        <input type="radio" name="option" id="aopt" value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|A' ;?>" >
                                        <?php echo $dow['A']; ?>
                                    <?php } ?>
                                </div>
                                <div>
                                    <?php if ($sow['answer'] == "B") { ?>
                                        <span>B.</span>
                                        <input type="radio" name="option"  id="bopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|B' ;?>" checked>
                                        <?php echo $dow['B']; ?>
                                    <?php }else{ ?>
                                        <span>B.</span>
                                        <input type="radio" name="option"  id="bopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|B' ;?>">
                                        <?php echo $dow['B']; ?>
                                    <?php } ?>
                                </div>
                                <div>
                                    <?php if ($sow['answer'] == "C") { ?>
                                        <span>C.</span>
                                        <input type="radio" name="option" id="copt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|C' ;?>" checked>
                                        <?php echo $dow['C']; ?>
                                    <?php }else{ ?>
                                        <span>C.</span>
                                        <input type="radio" name="option" id="copt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|C' ;?>">
                                        <?php echo $dow['C']; ?>
                                    <?php } ?>
                                </div>
                                <div>
                                    <?php if ($sow['answer'] == "D") { ?>
                                        <span>D.</span>
                                        <input type="radio" name="option" id="dopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|D' ;?>" checked>
                                        <?php echo $dow['D']; ?>
                                    <?php }else{ ?>
                                        <span>D.</span>
                                        <input type="radio" name="option" id="dopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|D' ;?>">
                                        <?php echo $dow['D']; ?>
                                    <?php } ?>
                                </div>
                                
                            <?php }else{ ?>
                                <div>
                                
                                    <span>A.</span>
                                    <input type="radio" name="option" id="aopt" value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|A' ;?>" >
                                    <?php echo $dow['A']; ?>
                                    
                                </div>
                                <div>
                                
                                    <span>B.</span>
                                    <input type="radio" name="option"  id="bopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|B' ;?>">
                                    <?php echo $dow['B']; ?>
                                    
                                </div>
                                <div>

                                    <span>C.</span>
                                    <input type="radio" name="option" id="copt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|C' ;?>">
                                    <?php echo $dow['C']; ?>
                                
                                </div>
                                <div>        
                                    <span>D.</span>
                                    <input type="radio" name="option" id="dopt"  value="<?php echo $_SESSION['reg'].'|'.$dow['subject_code'].'|'.$dow['subjects'].'|'.$dow['quest_no'].'|D' ;?>">
                                    <?php echo $dow['D']; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php }else {echo "";} } ?>
                </div>

                <div class="nav-unt">
                    <?php
                        $snv=0;
                        while ($sel_bon = $sel_sono->fetch_assoc()){ $snv = $sel_bon['quest_no'];}
                    ?>
                    <div>
                        <?php $qon = $_GET['quest']-1; ?>  
                        <?php  if ($qon < 1) { ?>
                            <a href="exam.php?sub=<?php echo $_GET['sub']; ?>&quest=<?php echo $snv; ?>"><button>PREVIOUS</button></a>
                        <?php }else{ ?>
                            <a href="exam.php?sub=<?php echo $_GET['sub']; ?>&quest=<?php echo $_GET['quest']-1; ?>"><button>PREVIOUS</button></a>
                        <?php } ?>
                        
                    </div>

                    <div>
                        <?php $qron = $_GET['quest']+1;?>  
                        <?php  if ($qron > $snv) { ?>
                            <a href="exam.php?sub=<?php echo $_GET['sub']; ?>&quest=1"><button>NEXT</button></a>
                        <?php }else{ ?>
                            <a href="exam.php?sub=<?php echo $_GET['sub']; ?>&quest=<?php echo $_GET['quest']+1; ?>"><button>NEXT</button></a>
                        <?php } ?>
                    </div>
                </div>

                <div class="question-stack">
                    <?php while($don = $sel_cono->fetch_assoc()){ 
                        $selqstmnge = $sel_ob->sel_quest_mng($_SESSION['reg'],$don['subject_code'],$don['subjects'],$don['quest_no']);
                        $sow = $selqstmnge->fetch_assoc();
                        
                        if (isset($sow['subject_code']) AND isset($sow['subjects']) AND isset($sow['quest_no'])) { 
                    ?> 
                        <a href="exam.php?sub=<?php echo str_replace(' ','_',$don['subjects']); ?>&quest=<?php echo $don['quest_no']; ?>">
                            <button class="btn-qmrk"><?php echo $don['quest_no']; ?></button>
                        </a>
                    <?php }else{  ?>
                        <a href="exam.php?sub=<?php echo str_replace(' ','_',$don['subjects']); ?>&quest=<?php echo $don['quest_no']; ?>">
                            <button><?php echo $don['quest_no']; ?></button>
                        </a>
                    <?php } ?> 
                        
                    <?php } ?>
                </div>
                
            </main>
           
            <div class="total-attempts">
                <div class="main-total-attempts">
                    <h3>ATTEMPT ALL QUESTIONS</h3>
                    <div>
                        
                        <?php 
                            $totat = 0;
                            $totall = 0;
                            $sub = explode('-|-',$_SESSION['subjects']);
                            foreach ($sub as $key => $value) {    
                            $sel_sunlb = $sel_ob->sel_subj_unl(str_replace('_',' ',$value));
                            $dono = $sel_sunlb->fetch_assoc();
                            $sel_man = $sel_ob->sel_qmng($_SESSION['reg'],str_replace('_',' ',$value),$dono['subject_code']);

                            $totat += mysqli_num_rows($sel_man);
                            $totall += $dono['quest_no'];
                        ?>
                            <p><?php echo str_replace('_',' ',$value).' | '.mysqli_num_rows($sel_man) .' Out Of '.$dono['quest_no'];  ?></p>
                        <?php } ?>

                        <p><?php echo 'Total | '.$totat.' Out Of '.$totall;  ?></p>
                    </div>
                </div>
                <div class="con-btn-div">
                    <button onclick="if(window.confirm('Are you sure you wish to End Exam')){window.location='backend_result_calculator.php';}" class="con-btn">SUBMIT</button>
                </div>
            </div>
        </div>
        <footer></footer>
    </section>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/rev.js"></script>
    <script src="../js/time.js"></script>
    <script src="../js/calc.js"></script>
</body>
</html>