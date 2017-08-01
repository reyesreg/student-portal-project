<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if ($_SESSION['uType'] !== 'student') {
      if (isset($_POST['schoolID'])) {
        $sID = $_POST['schoolID'];
        $fn = $_POST['firstName'];
        $ln = $_POST['lastName'];
        $email = $_POST['email'];
        $type = $_POST['type'];
        

        $insert_user = "INSERT INTO users VALUES  
          ('',
          '$fn', 
          '$ln', 
          '$type',
          $sID, 
          '$email',
          'password', 
          NULL)";
          
        $con->query($insert_user) or die(mysqli_error($con));
        header('location: ../../../manage-users.php');
      }
    } else {
      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>s