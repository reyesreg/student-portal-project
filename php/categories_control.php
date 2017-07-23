<?php

  $id = '';
  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    
  }
  else {
    header('location: index.php');
  }
?>