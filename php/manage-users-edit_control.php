<?php
  //ugly spaghetti code

  if (isset($_SESSION['uID'])) {
    if ($_SESSION['uType'] == 'super_mod') {
      if($uID = $_REQUEST['id']) {
        $uID = $_REQUEST['id'];

        $firstName = "";
        $lastName= "";
        $selectedType= "";
        $studentID= "";
        $email = "";

        $sub_cat = array();
        $sub_display = "<span class='tag subbed sub-tag' id='sub-1'>General</span>";
        $sub_index = 0;

        $mod_cat = array();
        $mod_display = "";
        $mod_index = 0;
      
        $get_user = "SELECT 
          firstName, 
          lastName, 
          type, 
          studentID, 
          email 
          FROM users 
          WHERE uID=$uID";
        $result_user = $con->query($get_user) or die(mysqli_error($con));
        while($row_user = mysqli_fetch_array($result_user)) {
          $firstName = $row_user['firstName'];
          $lastName = $row_user['lastName'];
          $type = $row_user['type'];
          $studentID = $row_user['studentID'];
          $email = $row_user['email'];

          $get_sub = "SELECT 
            c.catID, 
            c.catName 
            FROM categories c 
            INNER JOIN user_cat uc ON c.catID=uc.catID 
            WHERE uc.uID=$uID";
          $result_sub = $con->query($get_sub) or die(mysqli_error($con));
          while($row_sub = mysqli_fetch_array($result_sub)) {
            $catID = $row_sub['catID'];
            $catName =$row_sub['catName'];

            $sub_display .= "<span class='tag subbed sub-tag' id='sub-$catID' onclick='removeSub($catID)'>$catName</span>";
            $sub_cat[$sub_index] = $catID;
            $sub_index++;
          }

          if($type == 'student_mod' || $type == 'faculty') {
            $get_mod = "SELECT 
              c.catID, 
              c.catName 
              FROM categories c 
              INNER JOIN mod_cat mc ON c.catID=mc.catID 
              WHERE mc.uID=$uID";
            $result_mod = $con->query($get_mod) or die(mysqli_error($con));
            while($row_mod = mysqli_fetch_array($result_mod)) {
              $catID = $row_mod['catID'];
              $catName =$row_mod['catName'];

              $mod_display .= "<span class='tag subbed mod-tag' id='mod-$catID' onclick='removeMod($catID)'>$catName</span>";
              $mod_cat[$mod_index] = $catID;
              $mod_index++;
            }
          }
        }

        $display_categories = "";

        $get_categories = "SELECT 
          catID, catName
          FROM categories";
        $result_categories = $con->query($get_categories) or die(mysqli_error($con));
        while($row_categories = mysqli_fetch_array($result_categories)) {
          $catID = $row_categories['catID'];
          $catName = $row_categories['catName'];

          $display_categories .= "<option value='$catID'>$catName</option>";
        }
        
      } else {
        header('location: ./index.php');
      }
    } else {
      header('location: ./index.php');
    }
  } else {
    header('location: ./index.php');
  }

?>