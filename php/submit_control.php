<?php
  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

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
    header('location: index.php');
  }
?>