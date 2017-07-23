<?php
  include_once('./php/header_control.php');
?>

<html>
<head>
  <link rel="stylesheet" href="./assets/styles/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
  <div id="fb-root"></div>
  <div class="container">
    <div class="nav">
      <div class="logo-wrapper" onclick="window.location = './';">
        <img src="./assets/img/DLS-CSB_Seal.png" alt="benilde logo" height="60px"/>
        <span class="logo-title">WE BENILDE</span>
      </div>
      <?php echo $display_welcome ?>
    </div>
    <div class="content">
      <div class="col-side">
        <?php include_once('./views/main/sidebar-student.php'); ?>
      </div>
      <div class="col-main">