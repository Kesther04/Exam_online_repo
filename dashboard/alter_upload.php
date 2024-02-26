<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <link rel="stylesheet" href="../css/dt.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/rev.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/snd_dash.js"></script>
    <script src="../js/dt.js"></script>
    <script>
        $(document).ready(function(){

            new DataTable('.myTable');
        })
    </script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">
    <div id="masag"></div>
    <?php require("dashboard_layout.php"); ?>

    <section class="main-div-container">
        <div class="sec-div-container">
            <h1>SUBJECT TESTS</h1>


            <div class="secun-div-container">
                <table class="myTable">
                    <thead>
                        <tr id="top-line-div-table">
                            <th>SUBJECTS</th>
                            <th>SUBJECT_CODE</th>
                            <th>QUESTION_NUMBER</th>
                            <th>DATE</th>
                            <th>TIME</th>    
                            <th>VIEW</th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php  
                            require("../class/sel_class.php");
                            $sel_ob = new SEL();
                            $sel_con = $sel_ob->sel_subject();
                            if ($sel_con) {while ($row = $sel_con->fetch_assoc()) {
                    
                        ?>
                        <tr>
                            <td><?php echo $row['subjects']; ?></td>
                            <td><?php echo $row['subject_code']; ?></td>
                            <td><?php echo $row['quest_no']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['time']; ?></td>
                            <td>
                                <a href="view_subject.php?sub=<?php echo str_replace(' ','_',$row['subjects']); ?>&scode=<?php echo $row['subject_code']; ?>">
                                    <button class="cond-btn">VIEW</button>
                                </a>
                            </td>
                            <td>
                                <a href="upd_upload.php?sub=<?php echo str_replace(' ','_',$row['subjects']); ?>&scode=<?php echo $row['subject_code']; ?>">
                                    <button class="cond-btn">UPDATE</button>
                                </a>
                            </td>
                            <td>
                                <form class="vwsubdel" action="backend_requests/subj_confirm.php" method="post">
                                    <input type="hidden" name="vcn" value="<?php echo $row['id'].'|'.$row['subjects'].'|'.$row['subject_code'];?>" required readonly>
                                    <button class="cond-btn">DELETE</button>
                                </form>
                            </td>
                        </tr>
                        <?php } } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</body>
</html>