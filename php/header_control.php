<?php
  include('./php/_config.php');

  session_start();

  $display_welcome = "
    <form method='POST' action='./php/inv_controllers/login.php'>
        <span><strong>LOGIN&nbsp;&nbsp;&nbsp;&nbsp;</strong></span>
        <input type='text' name='id' placeholder='ID Number...'>
        <input type='password' name='pass' placeholder='Password...'>
        <button style='background: none; padding: 0; outline: none;'>
          <i class='material-icons' style='color: white;margin-left: 20px;background: rgba(255, 255, 255, 0.2);border-radius: 50%;padding: 5px;'>arrow_forward</i>
        </button>
      </form>
  ";
  if(isset($_SESSION['uID'])) {
    $uID = $_SESSION['uID'];

    $get_user = "SELECT 
      firstName, lastName, type
      FROM users
      WHERE uID = $uID";
    $result_user = $con->query($get_user) or die(mysqli_error($con));
    while($row_user = mysqli_fetch_array($result_user)) {
      $firstName = $row_user['firstName'];
      $lastName = $row_user['lastName'];
      $type = $row_user['type'];

      $display_welcome = "
        <div style='display: flex; align-items: center;'>
          Welcome, $firstName $lastName!&nbsp;&nbsp;&nbsp;
          <a href='./php/inv_controllers/logout.php' style='color: white;'>
            <i class='material-icons'>exit_to_app</i>
          </a>
        </div>
      ";
    }
  }

?>