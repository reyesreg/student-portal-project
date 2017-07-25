<?php
  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    if ($_SESSION['uType'] !== 'student' && $_SESSION['uType'] !== 'personnel') {

      $display_sub = "";
      $catArray = array(1);
      $catCount = 1;

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

        if($mcID == $id) {
          $display_sub .= "<span class='tag subbed'>$catName</span>";
        }
      }

      $display_pending = "";
      $display_approved = "";
      $display_archived = "";

      $get_pending_an = "SELECT 
        a.anID, 
        a.title,
        u.firstName, 
        u.lastName, 
        a.dateCreated, 
        a.status 
        FROM announcements a
        INNER JOIN an_cat ac ON a.anID=ac.anID 
        INNER JOIN users u ON u.uID=a.authorID 
        WHERE ac.catID IN (".implode(',',$catArray).")";

      $result_pending_an = $con->query($get_pending_an) or die(mysqli_error($con));
      while($row_pending_an = mysqli_fetch_array($result_pending_an)) {
        $anID = $row_pending_an['anID'];
        $title = $row_pending_an['title'];
        $fname = $row_pending_an['firstName'];
        $lname = $row_pending_an['lastName'];
        $date = $row_pending_an['dateCreated'];
        $status = $row_pending_an['status'];
        #TODO: $approverID = $row_pending_an['approverID'];
        
        if($status == 'pending') {
          $display_pending .= "
            <tr>
              <td width='30%' class='title'>$title</td>
              <td width='30%'></td>
              <td width='20%'>$fname $lname</td>
              <td width='10%'>$date</td>
              <td align='center' width='10%'>
                <i class='material-icons'>add_circle</i>
                &nbsp;&nbsp;
                <i class='material-icons'>remove_circle</i>
              </td>
            </tr>
          ";
        } else if($status == 'approved') {
          $display_approved .= "
            <tr>
              <td width='30%' class='title'>$title</td>
              <td width='30%'></td>
              <td width='20%'>$fname $lname</td>
              <td width='10%'>$date</td>
              <td align='center' width='10%'>
                <i class='material-icons'>remove_circle</i>
              </td>
            </tr>
          ";
        } else if($status == 'archived') {
          $display_archived .= "
            <tr>
              <td width='30%' class='title'>$title</td>
              <td width='30%'></td>
              <td width='20%'>$fname $lname</td>
              <td width='10%'>$date</td>
              <td align='center' width='10%'>
                <i class='material-icons'>add_circle</i>
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