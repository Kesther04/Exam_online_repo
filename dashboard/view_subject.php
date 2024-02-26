<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">
    <div id="masag"></div>
    <?php 
        require("dashboard_layout.php"); 
        
        require("../class/sel_class.php");
        $sel_ob = new SEL();
        
        $sel_don = $sel_ob->sel_question_sub_code(str_replace('_',' ',$_GET['sub']),$_GET['scode']);    
        $don = $sel_don->fetch_assoc();
        if(isset($don['subjects']) AND isset($don['subject_code']) ){
            $sel_con = $sel_ob->sel_question_sub_code(str_replace('_',' ',$_GET['sub']),$_GET['scode']);
    ?>

    <section class="main-div-container">
        <div class="sec-div-container">
            <h1>TEST QUESTIONS</h1>
            <?php  while ($dow = $sel_con->fetch_assoc()) {  ?>
            <div class="single-question">
    
                <div class="questions">
                    <!-- question number -->
                    <span><?php echo $dow['quest_no'].'.'; ?></span>

                    <!-- Actual Question -->
                    <?php echo $dow['question']; ?>
                </div>
                <div class="options">
                    <!-- Options for Question -->
                    
                        <div>
                        
                            <span>A.</span>

                            <?php if($dow['correct'] == 'A'){ ?>
                                <input type="checkbox" name="option"   checked>
                                <?php echo $dow['A']; ?>
                            <?php }else{ ?>
                                <input type="checkbox" name="option" >
                                <?php echo $dow['A']; ?>
                            <?php } ?>
                        </div>
                        <div>
                        
                            <span>B.</span>
                            <?php if($dow['correct'] == 'B'){ ?>
                                <input type="checkbox" name="option"   checked>
                                <?php echo $dow['B']; ?>
                            <?php }else{ ?>
                            <input type="checkbox" name="option">
                            <?php echo $dow['B']; ?>
                            <?php } ?>
                        </div>
                        <div>

                            <span>C.</span>
                            <?php if($dow['correct'] == 'C'){ ?>
                                <input type="checkbox" name="option"   checked>
                                <?php echo $dow['C']; ?>
                            <?php }else{ ?>
                            <input type="checkbox" name="option" >
                            <?php echo $dow['C']; ?>
                            <?php } ?>
                        </div>
                        <div>        
                            <span>D.</span>
                            <?php if($dow['correct'] == 'D'){ ?>
                                <input type="checkbox" name="option"   checked>
                                <?php echo $dow['D']; ?>
                            <?php }else{ ?>
                            <input type="checkbox" name="option">
                            <?php echo $dow['D']; ?>
                            <?php } ?>
                        </div>
                    
                </div>
                
            </div>
            <?php } ?>
        </div>
    </section>
    <?php } ?>
</body>
</html>