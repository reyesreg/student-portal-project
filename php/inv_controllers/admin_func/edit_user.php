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
        $sub_array = spliti (",", $sub);

        $update_user = "UPDATE users SET 
          studentID = $sID, 
          firstName ='$fn', 
          lastName = '$ln', 
          email = '$email', 
          type = '$type' 
          WHERE uID = $uID";
        $con->query($update_user) or die(mysqli_error($con));

        $del_subs = "DELETE FROM user_cat WHERE uID = $uID";
        $con->query($del_subs) or die(mysqli_error($con));
        
        foreach ($sub_array as $value) {
          $add_sub= "INSERT INTO user_cat VALUES ($uID, $value)";
          $con->query($add_sub) or die(mysqli_error($con));
        }

        if (isset($_POST['mod'])) {
          $mod = $_POST['mod'];
          if($mod !== '') {
            $mod_array = spliti (",", $mod);

            $del_mods = "DELETE FROM mod_cat WHERE uID = $uID";
            $con->query($del_mods) or die(mysqli_error($con));

            foreach ($mod_array as $value) {
              $add_mod= "INSERT INTO mod_cat VALUES ($uID, $value)";
              $con->query($add_mod) or die(mysqli_error($con));
            }
          }
        }

        header('location: ../../../manage-users.php');
      }
    } else {
      header('location: ../../../index.php');
    }
  } else {
    header('location: ../../../index.php');
  }
?>