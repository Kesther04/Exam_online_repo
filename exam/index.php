<?php 
    @session_start();
    @session_destroy(); 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css" media="all">
    <link rel="stylesheet" href="../css/login_rep.css" media="all">
    <title>LOGIN</title>
</head>
<body>
    <div class="login-sec">


        <h1>SIGN IN</h1>

        <form name="login-form" action="backend_login.php" method="post">

            <?php
                if (isset($_GET['msg'])) {
                    echo "<div class='msg-log'>$_GET[msg]</div>";
                }
            ?>

            <table>
            
                <tr>
                    <td><span>REGISTRATION NO.</span>
                    <input type="text" name="reg" placeholder="Enter Your Registration No." ></td>
                </tr>

                <script src="js/jquery.js"></script>
                <script src="js/reg.js"></script>


            </table>

            

            <div class="btn-div">
                <button class="btn">ENTER</button>
            </div>
            
        </form>


    </div>
</body>
</html>