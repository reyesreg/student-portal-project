<?php

  $id = '';
  if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
  }

?>

<html>
<head>
  <link rel="stylesheet" href="../assets/styles/main.css">
</head>
<body>
  <div id="fb-root"></div>
  <div class="container">
    <div class="nav">
      <img src="../assets/img/DLS-CSB_Seal.png" alt="benilde logo" height="60px"/>
      <span class="logo-title">WE BENILDE</span>
    </div>
    <div class="content">
      <div class="col-side">
        <?php include_once('./main/sidebar-student.html'); ?>
      </div>
      <div class="col-main">
        <div class="announcement-wrapper">
          <?php echo $id ?>
        </div>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <script src="../assets/scripts/announcement-scripts.js"></script>
</body>
</html>