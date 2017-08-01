<?php

    #get link categories
    $display_cat = "";
    $get_cat = "SELECT liCatName, liCatID FROM link_categories";
    $result_cat = $con->query($get_cat) or die(mysqli_error($con));
    while($row_cat = mysqli_fetch_array($result_cat)) {
      $cat = $row_cat['liCatName'];
      $liID = $row_cat['liCatID'];

      $display_cat .= "
      <div class='box'>
      <span class='title'>$cat</span></br></br>";

      $get_link = "SELECT linkName, link FROM links WHERE liCatID = $liID";
      $result_link = $con->query($get_link) or die(mysqli_error($con));
      while($row_link = mysqli_fetch_array($result_link)) {
        $name = $row_link['linkName'];
        $link = $row_link['link'];

        $display_cat .= "
        &nbsp&nbsp&nbsp&nbsp&nbsp<a href='$link' target='_blank'>$name</a></br>";
      }

      $display_cat .= "</div>";
    }


?>