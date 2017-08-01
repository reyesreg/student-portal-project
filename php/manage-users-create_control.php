<?php
  //ugly spaghetti code

  if (isset($_SESSION['uID'])) {
    $id = $_SESSION['uID'];

    if ($_SESSION['uType'] == 'super_mod') {
      // I dunno, do I need to do something?
    } else {
      header('location: ./index.php');
    }
  } else {
    header('location: ./index.php');
  }

?>