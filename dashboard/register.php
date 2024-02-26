<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <form class="reg-req" action="backend_requests/backend_register.php" method="post">
            <div class="sec-div-container">
            
                <h1>REGISTER CANDIDATES</h1>
                
                <div class="fir-div-container">
                    <table>
                        <tr>
                            <td>
                                <span>Name Of Candidate</span>
                                <input type="text" name="name" placeholder="Enter the Name of the candidate" required>
                            </td>


                            <td>
                                <span>Date Of Birth</span>
                                <input type="date" name="dob"  required>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <span>Email Address</span>
                                <input type="email" name="email" placeholder="Enter Candidate Email Address"  required>
                            </td>

                            

                            
                        

                        
                            <td>
                                <span>Gender</span>
                                <select name="gender" required>
                                    <option></option>
                                    <option>MALE</option>
                                    <option>FEMALE</option>
                                </select>
                            </td>
                        
                        </tr>

                        <tr>
                            
                            <td>
                                <span>State Of Origin</span>
                                <select name="state" id="state" onchange="show(ele)" required></select>
                            </td>

                            
                            <td id="slga1" style="display:none;">
                                <span>LGA</span>
                                <select name="lga" id="slga" required></select>
                            </td>

                        </tr>

                        <tr>
                            

                            <td>
                                <span>Contact No.</span>
                                <input type="number" name="cno" placeholder="Enter Candidate contact number" required>
                            </td>

                            <td>
                                <span>Level Of Education</span>
                                <input type="text" name="loe" placeholder="Enter Your Level Of Education" required>
                            </td>
                            
                        </tr>

                    </table>
                </div>

                
                <div class="con-btn-div">
                    <button class="con-btn">REGISTER</button>
                </div>

            </div>
        </form>
    </section>
    
    <script src="../js/loc_form.js"></script>
</body>
</html>