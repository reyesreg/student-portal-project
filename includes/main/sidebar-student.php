<?php
  $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $route = explode('/', $actual_link);

  $user_type = "";
  if (isset($_SESSION['uType'])) {
    $user_type = $_SESSION['uType'];
  }
?>

<input type="text" placeholder="Search..."/>
<ul>
  <li id="li-home" <?php if($route[2]=='' || $route[2]=='index.php') echo 'class="active"' ?>>
    <a href="./">HOME</a>
  </li>

  <?php
    if($user_type !== '') {
      echo "<li";
      if($route[2]=='categories.php') 
        echo ' class="active"';
      echo "><a href='./categories.php'>VIEW CATEGORIES</a></li>";
    }
  ?>

  <li id="li-links" <?php if($route[2]=='links.php') echo 'class="active"' ?>><a href="./links.php">LINKS</a></li>
  <li id="li-links" <?php if($route[2]=='profile.php') echo 'class="active"' ?>><a href="./profile.php">PROFILE</a></li>

  <?php
    if($user_type !== "") {
      echo "<hr />
            <li id='li-links'";
      if($route[2]=='submit.php') 
        echo ' class="active"';
      echo "><a href='./submit.php' style='color: #0b8e4f'>
        <i class='material-icons'>add_circle</i>&nbsp;&nbsp;SUBMIT POST</a>
      </li>";
    }
  ?>

  <?php
    if($user_type === 'super_mod'|| $user_type === 'student_mod') {
      echo "
            <hr />
            <li";
          if($route[2]=='posts-manage.php') 
            echo ' class="active"';
          echo "><a href='./posts-manage.php'>MANAGE POSTS</a>
            </li>";
    }
    if($user_type === 'super_mod') {
      echo "<li><a href='./users-manage.php'>MANAGE USERS</a></li>";
    }
  ?>
</ul>