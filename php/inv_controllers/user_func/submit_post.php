<?php
  session_start();
  include('../../_config.php');

  if (isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    if (isset($_POST['title'])) {
      $cat = $_POST['cat'];
      $title = $_POST['title'];
      $desc = $_POST['desc'];

      $cat_array = spliti (",", $cat);

      if($_SESSION['uType'] == 'student' || $_SESSION['uType'] == 'personnel') {
        $add_announcement = "INSERT INTO announcements VALUES 
          ('',
          '$title',
          '$desc',
          NOW(),
          NULL,
          $uID,
          'pending', 
          NULL)";
      } else {
        $add_announcement = "INSERT INTO announcements VALUES 
          ('',
          '$title',
          '$desc',
          NOW(),
          NULL,
          $uID,
          'approved', 
          NULL)";
      }
      $con->query($add_announcement) or die(mysqli_error($con));
      $last_id = $con->insert_id;
      
      foreach ($cat_array as $value) {
        echo $value;
        $add_an_cat= "INSERT INTO an_cat VALUES ($last_id, $value)";
        $con->query($add_an_cat) or die(mysqli_error($con));
      }

      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>