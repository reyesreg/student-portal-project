<?php
    #get link categories
    $display_man = "<form method='POST'><div class='box'>";
    $get_man = "SELECT liCatName, liCatID FROM link_categories";
    $result_man = $con->query($get_man) or die(mysqli_error($con));
    while($row_man = mysqli_fetch_array($result_man)) {
      $cat = $row_man['liCatName'];
      $liID = $row_man['liCatID'];

      $display_man .= "
      <span class='title'>$cat</span>&nbsp&nbsp&nbsp
      <span class='subtitle'><a href='/webdev/student-portal-project-develop/linkae.php?cat=$liID'>Add</a></span>
      </br></br>
      <table style='width:100%'>";
    
      #get links
      $get_link = "SELECT linkid, linkName, link FROM links WHERE liCatID = $liID";
      $result_link = $con->query($get_link) or die(mysqli_error($con));
      while($row_link = mysqli_fetch_array($result_link)) {
        $lid = $row_link['linkid'];
        $name = $row_link['linkName'];
        $link = $row_link['link'];

        $display_man .= "        
        <tr>    
            <td align='center'><label>$lid</label></td>
            <td><input value='$name' style='width:95%' disabled /></td>
            <td><input value='$link' style='width:110%' disabled /></td>
            <td align ='center'>
            <a href='/webdev/student-portal-project-develop/linkae.php?id=$lid'>Edit</a>&nbsp&nbsp|&nbsp 
            <a href='/webdev/student-portal-project-develop/linkdel.php?id=$lid'>Delete</a>
            </td>
        </tr>";
      }
      $display_man .= "</table></br><hr/></br>";
    }
    $display_man .= "</div></form>";
?>