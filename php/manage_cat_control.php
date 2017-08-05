<?php
    #get link categories
    $display_mancat = "<form method='POST'>
    <div class='box'>
    <span class='title'>Categories</span>&nbsp&nbsp&nbsp
    <span class='subtitle'><a href='/webdev/student-portal-project-develop/catae.php?'>Add</a></span>
    <table style='width:100%'>";

    $get_mancat = "SELECT catID, catName, description FROM categories";
    $result_mancat = $con->query($get_mancat) or die(mysqli_error($con));
    while($row_mancat = mysqli_fetch_array($result_mancat)) {
        $cid = $row_mancat['catID'];
        $name = $row_mancat['catName'];
        $desc = $row_mancat['description'];

        $display_mancat .= "        
        <tr>    
            <td><label>$cid</label></td>
            <td><input value='$name' style='width:95%' disabled /></td>
            <td><input value='$desc' style='width:110%' disabled /></td>
            <td align ='center'>
            <a href='/webdev/student-portal-project-develop/catae.php?id=$cid'>Edit</a>&nbsp&nbsp|&nbsp 
            <a href='/webdev/student-portal-project-develop/catdel.php?id=$cid'>Delete</a>
            </td>
        </tr>";
    }
    $display_mancat .= "</table></div></form>";
?>