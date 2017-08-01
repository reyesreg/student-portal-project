<?php

error_reporting(0);

$id = "";
$name = "";
$link = "";

if($id = $_GET['id'] > 0 ){
$get_link = "SELECT linkName, link FROM links WHERE liCatID = $id";
$result_link = $con->query($get_link) or die(mysqli_error($con));
while($row_link = mysqli_fetch_array($result_link)) {
    $name = $row_link['linkName'];
    $link = $row_link['link'];
    }
}

?>