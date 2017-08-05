<?php

error_reporting(0);

$id = "";
$name = "";
$link = "";

#populate textboxes with data
if($id = $_GET['id'] > 0 ){
$id = $_GET['id'];
$get_link = "SELECT linkName, link FROM links WHERE linkid = $id";
$result_link = $con->query($get_link) or die(mysqli_error($con));
while($row_link = mysqli_fetch_array($result_link)) {
    $name = $row_link['linkName'];
    $link = $row_link['link'];
    }
}

#update contact
if (isset($_POST['save'])){
    $nameol = mysqli_real_escape_string($con, $_POST['nameol']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $sql_save = "";

    if($id = $_GET['id'] > 0 ) {
        $id = $_GET['id'];
        $sql_save = "UPDATE links SET linkName = '$nameol', link = '$address', lastmodified = NOW()
        WHERE linkID = $id";
    } else {
        $cat = $_GET['cat'];
        $sql_save = "INSERT INTO links VALUES ('',  '$nameol', '$address', NOW(), $cat)";
    }

   
    $con->query($sql_save) or die(mysqli_error($con));
    header('location: manage_links.php');
}

?>