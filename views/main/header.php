<?php
  session_start();
  
  $display_welcome = "
    <form method='POST' action='./php/inv_controllers/login_control.php'>
        <span>LOGIN&nbsp;&nbsp;</span>
        <input type='text' name='id' placeholder='ID Number...'>
        <input type='password' name='pass' placeholder='Password...'>
        <button style='background: none; padding: 0; outline: none;'>
          <i class='material-icons' style='color: white;margin-left: 20px;background: rgba(255, 255, 255, 0.2);border-radius: 50%;padding: 5px;'>arrow_forward</i>
        </button>
      </form>
  ";
  if(isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    $get_user = "SELECT 
      firstName, lastName, type
      FROM users
      WHERE uID = $uID";
    $result_user = $con->query($get_user) or die(mysqli_error($con));
    while($row_user = mysqli_fetch_array($result_user)) {
      $firstName = $row_user['firstName'];
      $lastName = $row_user['lastName'];
      $type = $row_user['type'];

      $display_welcome = "
        <div>
          Welcome, $firstName $lastName!
        </div>
      ";
    }
  }

?>

<html>
<head>
  <link rel="stylesheet" href="./assets/styles/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <div id="fb-root"></div>
  <div class="container">
    <div class="nav">
      <div class="logo-wrapper" onclick="window.location = './';">
        <img src="./assets/img/DLS-CSB_Seal.png" alt="benilde logo" height="60px"/>
        <span class="logo-title">WE BENILDE</span>
      </div>
      <?php echo $display_welcome ?>
    </div>
    <div class="content">
      <div class="col-side">
        <?php include_once('./views/main/sidebar-student.html'); ?>
      </div>
      <div class="col-main">