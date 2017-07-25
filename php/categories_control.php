<?php
  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    $display_sub = "
      <table>
        <tr>
          <td><span class='tag subbed'>General</span></td>
          <td>Open to the public and cannot be disabled</td>
        </tr>
    ";
    $display_unsub = "<table>";

    $catArray = array(1);
    $catUserCount = 1;
    $catAllCount = 0;

    $get_user_categories = "SELECT 
      uc.catID, c.catName, uc.uID, c.description 
      FROM user_cat uc 
      INNER JOIN categories c ON uc.catID=c.catID  
      WHERE uID=$id";
    $result_user_categories = $con->query($get_user_categories) or die(mysqli_error($con));
    while($row_user_categories = mysqli_fetch_array($result_user_categories)) {
      $catID = $row_user_categories['catID'];
      $catName = $row_user_categories['catName'];
      $catDesc = $row_user_categories['description'];
      $ucID = $row_user_categories['uID'];

      $catArray[$catUserCount] = $catID;
      $catUserCount++;

      if($ucID == $id) {
        $display_sub .= "
          <tr>
            <td><span class='tag subbed' onclick='delUserCategory($catID)'>$catName</span></td>
            <td>$catDesc</td>
          </tr>
        ";
      }
    }
    $display_sub .= "
      </table>
    ";

    $get_all_categories = "SELECT 
      catID, catName, description 
      FROM categories 
      WHERE catID NOT IN (".implode(',',$catArray).")";
    $result_all_categories = $con->query($get_all_categories) or die(mysqli_error($con));
    while($row_all_categories = mysqli_fetch_array($result_all_categories)) {
      $catID = $row_all_categories['catID'];
      $catName = $row_all_categories['catName'];
      $catDesc = $row_all_categories['description'];
      $catAllCount++;

      $display_unsub .= "
        <tr>
            <td><span class='tag' onclick='addUserCategory($catID)'>$catName</span></td>
            <td>$catDesc</td>
          </tr>
      ";
    }

    $display_unsub .= "</table>";
  }
  else {
    header('location: index.php');
  }
?>