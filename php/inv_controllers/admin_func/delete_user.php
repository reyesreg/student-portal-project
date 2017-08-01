<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if ($_SESSION['uType'] == 'super_mod' && $_REQUEST['id']) {
      $id = $_REQUEST['id'];
      $type = '';

      $delete_user = "DELETE FROM users WHERE uID=$id";
      $con->query($delete_user) or die(mysqli_error($con));

      $delete_sub = "DELETE FROM user_cat WHERE uID=$id";
      $con->query($delete_sub) or die(mysqli_error($con));

      $delete_mod = "DELETE FROM mod_cat WHERE uID=$id";
      $con->query($delete_mod) or die(mysqli_error($con));
      
      header('location: ../../../manage-users.php');

    } else {
      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>s