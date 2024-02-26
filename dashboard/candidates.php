<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <link rel="stylesheet" href="../css/dt.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/snd_dash.js"></script>
    <script src="../js/dt.js"></script>
    <script>$(document).ready(function(){new DataTable('.myTable');});</script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">
    <div id='masag'></div>

    <?php require("dashboard_layout.php"); ?>

    <section class="main-div-container">
        <div class="sec-div-container">
            <h1>CANDIDATE INFORMATION</h1>


            <div class="secun-div-container">
                <table class="myTable">
                    <thead>
                        <tr id="top-line-div-table">
                            <th>FULLNAME</th>
                            <th>REGISTRATION_NO.</th>
                            <th>VIEW</th>    
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php  
                            require("../class/sel_class.php");
                            $sel_ob = new SEL();
                            $sel_con = $sel_ob->sel_candidate();
                            if ($sel_con) {while ($row = $sel_con->fetch_assoc()) {
                    
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['reg_no']; ?></td>
                            <td>
                                <form class="vwcand" action="backend_requests/view_candidates.php" method="post">
                                    <input type="hidden" name="vcn" value="<?php echo $row['id'].'|'.$row['reg_no']; ?>">
                                    <button class="cond-btn">VIEW</button>
                                </form>
                            </td>
                            <td>
                                <a href="upd_candidate.php?id=<?php echo $row['id']; ?>&reg=<?php echo $row['reg_no']; ?>"><button class="cond-btn">UPDATE</button></a>
                            </td>
                            <td>
                                <form class="vwcanddel" action="backend_requests/confirm_delete.php" method="post">
                                    <input type="hidden" name="vcn" value="<?php echo $row['id'].'|'.$row['reg_no'].'|'.$row['name'];?>" required readonly>
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