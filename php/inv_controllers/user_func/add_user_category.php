<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if (isset($_REQUEST['catID'])) {
      $catID = $_REQUEST['catID'];

      $add_user_category = "INSERT INTO user_cat 
      VALUES ($uID, $catID)";
        
      $con->query($add_user_category) or die(mysqli_error($con));
      header('location: ../../../categories.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>s