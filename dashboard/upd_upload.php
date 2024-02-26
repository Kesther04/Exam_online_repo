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
    <?php require("dashboard_layout.php"); ?>

    <section class="main-div-container">
        <?php if (isset($_GET['sub']) AND isset($_GET['scode'])) {  ?>
        <?php
            require('../class/sel_class.php');
            $sel_ob = new SEL();
            $sel_don = $sel_ob->sel_subj_uncode(str_replace('_',' ',$_GET['sub']),$_GET['scode']);
            $dow = $sel_don->fetch_assoc();
            if (isset($dow['subjects']) AND isset($dow['subject_code'])) {
        ?>
        <form class="upd-req" action="backend_requests/backend_upl_update.php" method="post">
            <div class="sec-div-container">
                <h1>UPDATE SUBJECT TESTS</h1>
                <div class="fir-div-container">
                   
                    <table>
                        <tr>
                            <td>
                                <span>Subject</span>
                                <input type="text" name="sub" value="<?php echo str_replace('_',' ',$_GET['sub']); ?>" required readonly>
                            </td>

                            <td>
                                <span>Subject Code</span>
                                <input type="text" name="scode" value="<?php echo $_GET['scode']; ?>" required readonly>
                            </td>
                        </tr>   

                        
                    </table>

                    <table class="ques-tab">
                        <?php $sel_sub = $sel_ob->sel_question_sub_code(str_replace('_',' ',$_GET['sub']),$_GET['scode']);?>
                            
                        <?php while ($row = $sel_sub->fetch_assoc()) { ?>
                                
                            <tr>
                                
                                <td>
                                    <span><?php echo 'Question '.$row['quest_no']; ?></span>
                                    <input type="hidden" name="qno[]" value="<?php echo $row['quest_no']; ?>" required readonly>
                                    <textarea name="quest[]" required placeholder="Enter Question"><?php echo $row['question']; ?></textarea>
                                    <span>Select Question Correct Option</span>
                                    <select name="corr[]" required>
                                        <?php if ($row['correct'] == 'A') { ?>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                        <?php  }elseif ($row['correct'] == 'B') { ?>
                                            <option>B</option>
                                            <option>A</option>
                                            <option>C</option>
                                            <option>D</option>
                                        <?php  }elseif ($row['correct'] == 'C') { ?>
                                            <option>C</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>D</option>
                                        <?php }else { ?>
                                            <option>D</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                        <?php } ?>
                                    </select>
                                </td>

                                <td>
                                    <span>A</span>
                                    <input type="text" name="A[]" value="<?php echo $row['A']; ?>" required Placeholder="Enter text for Option A ">
                                    <span>B</span>
                                    <input type="text" name="B[]" value="<?php echo $row['B']; ?>" required Placeholder="Enter text for Option B ">
                                    <span>C</span>
                                    <input type="text" name="C[]" value="<?php echo $row['C']; ?>" required Placeholder="Enter text for Option C ">
                                    <span>D</span>
                                    <input type="text" name="D[]" value="<?php echo $row['D']; ?>" required Placeholder="Enter text for Option D ">
                                </td>
                                
                            </tr>
                        <?php } ?>
                    </table>


                </div>

                                                
                <div class="con-btn-div">
                    <button class="con-btn">UPDATE</button>
                </div>
            </div>
        </form>
        <?php } } ?>

    </section>
</body>
</html>