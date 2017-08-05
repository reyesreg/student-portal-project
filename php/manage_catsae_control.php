<?php

error_reporting(0);

$id = "";
$name = "";
$desc = "";
$twit = "";
$face = "";

#populate textboxes with data
if($id = $_GET['id'] > 0 ){
$id = $_GET['id'];
$get_cat = "SELECT catName, description, twitterlink, facebooklink FROM categories WHERE catid = $id";
$result_cat = $con->query($get_cat) or die(mysqli_error($con));
while($row_cat = mysqli_fetch_array($result_cat)) {
    $name = $row_cat['catName'];
    $desc = $row_cat['description'];
    $twit = $row_cat['twitterlink'];
    $face = $row_cat['facebooklink'];
    }
}

#update contact
if (isset($_POST['save'])){
    $catname = mysqli_real_escape_string($con, $_POST['catname']);
    $catdesc = mysqli_real_escape_string($con, $_POST['catdesc']);
    $cattwit = mysqli_real_escape_string($con, $_POST['cattwit']);
    $catface = mysqli_real_escape_string($con, $_POST['catface']);

    $sql_save = "";

    if($id = $_GET['id'] > 0 ) {
        $id = $_GET['id'];
        $sql_save = "UPDATE 
        categories 
        SET catName = '$catname', 
        description  = '$catdesc', 
        twitterlink = '$cattwit',
        facebooklink = '$catface'
        WHERE catID = $id";
    } else {
        $cat = $_GET['cat'];
        $sql_save = "INSERT INTO categories VALUES ('',  '$catname', '$catdesc', '$cattwit', '$catface')";
    }

   
    $con->query($sql_save) or die(mysqli_error($con));
    header('location: manage_categories.php');
}

?>