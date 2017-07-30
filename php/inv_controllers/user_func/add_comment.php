<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if (isset($_POST['comment'])) {
      $comment = $_POST['comment'];
      $anID = $_POST['anID'];

      $add_comment = "INSERT INTO comments VALUES 
        ('', 
        $uID, 
        $anID, 
        '$comment', 
        NOW(), 
        NULL,
        'active')";
      $con->query($add_comment) or die(mysqli_error($con));
      header('location: ../../../announcement.php?id='. $anID);
    }
  } else {
    header('location: ../../../index.php');
  }
?>