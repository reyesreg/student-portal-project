<?php
  include('../_config.php');
  if(ctype_digit($_REQUEST['id'])) {
    if (isset($_POST['id'])) {

      session_start();

      $id = mysqli_real_escape_string($con, $_POST['id']);
      $pass = mysqli_real_escape_string($con, $_POST['pass']);

      $get_user = "SELECT 
        uID, type
        FROM users
        WHERE 
        studentID = $id
        AND
        password = '$pass'";
      $result_user = $con->query($get_user) or die(mysqli_error($con));
      while($row_user = mysqli_fetch_array($result_user)) {
        $_SESSION['uID'] = $row_user['uID'];
        $_SESSION['uType'] = $row_user['type'];
      }

      header('location: ../../index.php');

    } else {
      header('location: ../../index.php');
    }
  } else {
    header('location: ../../index.php');
  }
?>