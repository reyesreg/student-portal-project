<?php
    if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    #get settings
    $get_settings = "SELECT uID, firstName, lastName, type, contactNo, studentID, email FROM users WHERE uID = $id";
    $result_settings = $con->query($get_settings) or die(mysqli_error($con));
    while($row_settings = mysqli_fetch_array($result_settings)) {
      $setID = $row_settings['studentID'];
      $setln = $row_settings['lastName'];
      $setfn = $row_settings['firstName'];

      $settype = "";
      if($row_settings['type'] == 'student_mod'){
        $settype = "Student Mod";
      } else if ($row_settings['type'] == 'student'){
        $settype = "Student";
      } else {
        $settype = "Super Mod";
      }

      $setemail = $row_settings['email'];
      $setcontact = $row_settings['contactNo'];      
    }

    #get subscriptions
    $display_subs = "";
    $display_subs = "<span class='title'>Subscriptions</span></br></br>";
    $get_subs = "SELECT catID, catName FROM categories";
    $result_subs = $con->query($get_subs) or die(mysqli_error($con));
    while($row_subs = mysqli_fetch_array($result_subs)){
      $cid = $row_subs['catID'];
      $catName = $row_subs['catName'];
      $or = "";

      if($cid == 1){
        $or = "subbed";
      }

      $get_subbed = "SELECT a.catID FROM categories a INNER JOIN user_cat b ON b.catID = a.catID WHERE b.uID = $id";
      $result_subbed = $con->query($get_subbed) or die(mysqli_error($con));
      while($row_subbed = mysqli_fetch_array($result_subbed)){
        $cidsubbed = $row_subbed['catID'];
        
        if($cid == $cidsubbed){
          $or = "subbed";
         }        
      }
      $display_subs .= "<span class='tag $or'>$catName</span>";
    }    

    #update contact
    if (isset($_POST['upcon'])){
      $contact = mysqli_real_escape_string($con, $_POST['setcontact']);

      $sql_con_update = "UPDATE users SET contactNo = '$contact' WHERE uID = $id";
      $con->query($sql_con_update) or die(mysqli_error($con));
      header('location: settings.php');
    }
    
    #update email
    if (isset($_POST['upemail'])){
      $email = mysqli_real_escape_string($con, $_POST['setemail']);

      $sql_email_update = "UPDATE users SET email = '$email' WHERE uID = $id";
      $con->query($sql_email_update) or die(mysqli_error($con));
      header('location: settings.php');
    }

    } else {
      header('location: index.php');
    }
?>