<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if (isset($_REQUEST['catID'])) {
      $catID = $_REQUEST['catID'];

      $del_user_category = "DELETE FROM user_cat 
        WHERE uID=$uID AND catID=$catID";
        
      $con->query($del_user_category) or die(mysqli_error($con));
      header('location: ../../../categories.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>