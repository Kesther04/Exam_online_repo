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
    <title>INSTRUCTIONS</title>
</head>
<body>

    <div class="instructions">
        <h1>INSTRUCTIONS</h1>
        <div class="main-instructions">
            <?php
             echo 
             'Dear '.$_SESSION['name']; 
             echo date('H');
            ?>
        </div>
        <div class="con-btn-div">
            <a href="backend_begin_exam.php"><button class="con-btn">BEGIN</button></a>
        </div>
    </div>
    
</body>
</html>