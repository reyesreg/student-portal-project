<?php
  //ugly spaghetti code

  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    if ($_SESSION['uType'] == 'super_mod') {
      $display_students = "";
      $display_student_mods = "";
      $display_super_mods = "";

      $get_users = "SELECT 
        uID, 
        studentID, 
        firstName,
        lastName, 
        type 
        FROM users";
      $result_users = $con->query($get_users) or die(mysqli_error($con));
      while($row_users = mysqli_fetch_array($result_users)) {
        $uID = $row_users['uID'];
        $sID = $row_users['studentID'];
        $firstName = $row_users['firstName'];
        $lastName = $row_users['lastName'];
        $type = $row_users['type'];

        $display_subs = "";
        $get_subs = "SELECT 
          c.catName 
          FROM categories c 
          INNER JOIN user_cat uc ON c.catID=uc.catID 
          WHERE uc.uID = $uID";
        $result_subs = $con->query($get_subs) or die(mysqli_error($con));
        while($row_subs = mysqli_fetch_array($result_subs)) {
          $catName = $row_subs['catName'];
          $display_subs .= "$catName ";
        }

        if($type == 'student') {
          $display_students .= "
            <tr>
              <td>$sID</td>
              <td>$firstName $lastName</td>
              <td>$display_subs</td>
              <td></td>
            </tr>
          ";
        }
        else if($type == 'student_mod') {
          $display_mod = "";

          $get_mod = "SELECT 
            c.catName 
            FROM categories c 
            INNER JOIN mod_cat mc ON c.catID=mc.catID 
            WHERE mc.uID = $uID";
          $result_mod = $con->query($get_mod) or die(mysqli_error($con));
          while($row_mods = mysqli_fetch_array($result_mod)) {
            $catName = $row_mods['catName'];
            $display_mod .= "$catName ";
          }

          $display_student_mods .= "
            <tr>
              <td>$sID</td>
              <td>$firstName $lastName</td>
              <td>$display_subs</td>
              <td>$display_mod</td>
              <td></td>
            </tr>
          ";
        } else if($type == 'super_mod') {
          $display_super_mods .= "
            <tr>
              <td>$sID</td>
              <td>$firstName $lastName</td>
              <td>$display_subs</td>
              <td></td>
            </tr>
          ";
        }
      }


    } else {
      header('location: ./index.php');
    }
  } else {
    header('location: ./index.php');
  }

?>