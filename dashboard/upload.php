<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" media="all">
    <link rel="stylesheet" href="../css/style_rep.css" media="all">
    <script src="../js/jquery.js"></script>
    <script src="../js/rev.js"></script>
    <script src="../js/ajax.js"></script>
    <script src="../js/snd_dash.js"></script>
    <title>DASHBOARD</title>
</head>
<body id="total-div">
    <div id='masag'></div>

    <?php require("dashboard_layout.php"); ?>

    
    <section class="main-div-container">
        <form class="upl-req" action="backend_requests/backend_upload.php" method="post">
            <div class="sec-div-container">
            
                <h1>UPLOAD SUBJECT TEST QUESTIONS</h1>
                
                <div class="fir-div-container">
                    <table>
                        <tr>
                            <td>
                                <span>Select Subject</span>
                                <select name="sub" required>
                                    <option></option>
                                    <option>Mathematics</option>
                                    <option>English Language</option>
                                </select>
                            </td>

                            <td>
                                <span>Number Of Questions</span>
                                <input type="number" name="noq" id="noq" Placeholder="Enter The Number Of Questions for the selected subject" required>
                            </td>
                        </tr>   
                    </table>

                    <table class="ques-tab"></table>
                </div>

                
                <div class="con-btn-div">
                    <button class="con-btn">UPLOAD</button>
                </div>

            </div>
        </form>
    </section>
</body>
</html>