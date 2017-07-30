<?php
  //ugly spaghetti code

  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    if ($_SESSION['uType'] !== 'student' && $_SESSION['uType'] !== 'personnel') {

      $display_sub = "";      //show moderated categories
      $catArray = array();    //map categories to announcement
      $catCount = 0;

      if($_SESSION['uType'] == 'student_mod') {
        $get_user_categories = "SELECT 
          mc.catID, c.catName, mc.uID 
          FROM mod_cat mc 
          INNER JOIN categories c ON mc.catID=c.catID  
          WHERE uID=$id";
        $result_user_categories = $con->query($get_user_categories) or die(mysqli_error($con));
        while($row_user_categories = mysqli_fetch_array($result_user_categories)) {
          $catID = $row_user_categories['catID'];
          $catName = $row_user_categories['catName'];
          $mcID = $row_user_categories['uID'];

          $catArray[$catCount] = $catID;
          $catCount++;

          if($mcID == $id) {
            $display_sub .= "<span class='tag subbed'>$catName</span>";
          }
        }
      } else {
        $display_sub .= "<span class='tag subbed'>All Categories</span>";

        $get_all_categories = "SELECT catID FROM categories";
        $result_all_categories = $con->query($get_all_categories) or die(mysqli_error($con));
        while($row_all_categories = mysqli_fetch_array($result_all_categories)) {
          $catID = $row_all_categories['catID'];
          $catArray[$catCount] = $catID;
          $catCount++;
        }
      }

      $display_pending = "";
      $display_approved = "";
      $display_archived = "";

      $an_array = array();     //prevent double-post if multiple categories
      $an_count = 0;

      $get_an = "SELECT 
        a.anID, 
        a.title,
        u.firstName, 
        u.lastName, 
        a.dateCreated, 
        a.status, 
        a.approverID 
        FROM announcements a
        INNER JOIN an_cat ac ON a.anID=ac.anID 
        INNER JOIN users u ON u.uID=a.authorID 
        WHERE ac.catID IN (".implode(',',$catArray).")";

      $result_an = $con->query($get_an) or die(mysqli_error($con));
      while($row_an = mysqli_fetch_array($result_an)) {
        $anID = $row_an['anID'];
        $title = $row_an['title'];
        $fname = $row_an['firstName'];
        $lname = $row_an['lastName'];
        $date = $row_an['dateCreated'];
        $status = $row_an['status'];

        $display_cat = "";

        $get_an_cat = "SELECT 
          c.catName 
          FROM an_cat ac 
          INNER JOIN announcements a ON a.anID = ac.anID 
          INNER JOIN categories c ON c.catID = ac.catID 
          WHERE ac.anID = $anID";

          $result_an_cat = $con->query($get_an_cat) or die(mysqli_error($con));
          while($row_an_cat = mysqli_fetch_array($result_an_cat)) {
            $cat = $row_an_cat['catName'];
            
            $display_cat .= "$cat ";
          }
        
        if($status == 'pending' && !in_array($anID, $an_array)) {
          $display_pending .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td>$display_cat</td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openApproveModal($anID)'>check_circle</i>
                &nbsp;&nbsp;
                <i class='material-icons' onclick='openArchiveModal($anID)'>cancel</i>
              </td>
            </tr>
          ";
        } else if($status == 'approved' && !in_array($anID, $an_array)) {
          $display_approved .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td>$display_cat</td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openArchiveModal($anID)'>cancel</i>
              </td>
            </tr>
          ";
        } else if($status == 'archived' && !in_array($anID, $an_array)) {
          $display_archived .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td>$display_cat</td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openApproveModal($anID)'>check_circle</i>
              </td>
            </tr>
          ";
        }

        $an_array[$an_count] = $anID;
        $an_count++;
      }
      
    } else {
      #redirect if usertype is student/personnel
      header('location: ./index.php');
    }
  } else {
    #redirect if user isnt logged in
    header('location: ./index.php');
  }
?>