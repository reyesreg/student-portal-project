<?php
include_once('./includes/main/header.php');

$id = $_GET['id'];
 
$sql_delete = "DELETE FROM categories WHERE catid=$id";
$con->query($sql_delete) or die(mysqli_error($con));
 
header("Location: manage_categories.php");
?>