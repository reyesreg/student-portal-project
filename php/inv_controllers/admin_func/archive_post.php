<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if ($_SESSION['uType'] !== 'student') {
      if (isset($_REQUEST['anID'])) {
        $anID = $_REQUEST['anID'];

        $approve_post = "UPDATE announcements 
          SET status = 'archived'
          WHERE anID=$anID";
          
        $con->query($approve_post) or die(mysqli_error($con));
        header('location: ../../../manage-posts.php');
      }
    } else {
      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>s