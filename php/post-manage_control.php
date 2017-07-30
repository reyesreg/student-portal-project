<?php
  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    if ($_SESSION['uType'] !== 'student' && $_SESSION['uType'] !== 'personnel') {

      $display_sub = "";
      $catArray = array();
      $catCount = 0;

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

      $display_pending = "";
      $display_approved = "";
      $display_archived = "";

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
        
        if($status == 'pending') {
          $display_pending .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td></td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openApproveModal($anID)'>check_circle</i>
                &nbsp;&nbsp;
                <i class='material-icons' onclick='openArchiveModal($anID)'>cancel</i>
              </td>
            </tr>
          ";
        } else if($status == 'approved') {
          $display_approved .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td></td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openArchiveModal($anID)'>cancel</i>
              </td>
            </tr>
          ";
        } else if($status == 'archived') {
          $display_archived .= "
            <tr>
              <td class='title'><a href='./announcement.php?id=$anID'>$title</a></td>
              <td></td>
              <td>$fname $lname</td>
              <td>$date</td>
              <td align='center'>
                <i class='material-icons' onclick='openApproveModal($anID)'>check_circle</i>
              </td>
            </tr>
          ";
        }
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