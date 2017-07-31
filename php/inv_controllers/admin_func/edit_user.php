<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if ($_SESSION['uType'] == 'super_mod') {
      if (isset($_POST['uID'])) {
        $uID = $_POST['uID'];
        $sID = $_POST['schoolID'];
        $fn = $_POST['firstName'];
        $ln = $_POST['lastName'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        $sub = $_POST['sub'];
        
        if (isset($_POST['mod'])) {
          $mod = $_POST['mod'];
        }

        $update_user = "UPDATE users SET 
          studentID = $sID, 
          firstName ='$fn', 
          lastName = '$ln', 
          email = '$email', 
          type = '$type' 
          WHERE uID = $uID";
          
        $con->query($update_user) or die(mysqli_error($con));
        header('location: ../../../manage-users.php');
      }
    } else {
      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>s