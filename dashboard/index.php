<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" media="all">
  <link rel="stylesheet" href="../css/style_rep.css" media="all">
  <script src="../js/jquery.js"></script>
  <script src="../js/snd_dash.js"></script>
  <title>DASHBOARD</title>
</head>
<body>
  <?php 
    require("dashboard_layout.php"); 
    require("../class/sel_class.php"); 
    $sel_ob = new SEL();
    $sel_sub = $sel_ob->sel_subject();
    $sel_can = $sel_ob->sel_candidate();
  ?>

    
  <section class="main-div-container">
    <div class="sec-div-container">

      <h1>ACCESS TO ALL FEATURES</h1>
      
      <div class="contrl-div-con">
        <div class="fst-contrl-div-con">
          
          <div class="inner-fcdc">
            <h3>TOTAL NUMBER OF STUDENTS REGISTERED</h3>
            <p><?php echo mysqli_num_rows($sel_can); ?></p>
          </div>

          <div class="inner-fcdc">
            <h3>TOTAL SUBJECT QUESTIONS UPLOADED</h3>
            <p><?php echo mysqli_num_rows($sel_sub); ?></p>
          </div>

        </div>

        <div class="snd-contrl-div-con"></div>
      </div>

    </div>
  </section>
    

  <script src="../js/bt_strap.js" ></script>
</body>
</html>