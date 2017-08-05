<?php
  $actual_link = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $route = explode('/', $actual_link);

  $user_type = "";
  if (isset($_SESSION['uType'])) {
    $user_type = $_SESSION['uType'];
  }
?>

<form action="search.php" method="get">
<input name="query" type="text" placeholder="Search..." style="width : 55%"/>
<button style="width : 20%">?</button>
</form>

<ul>
  <li id="li-home" <?php if($route[2]=='' || $route[2]=='index.php') echo 'class="active"' ?>><a href="./">HOME</a></li>

  <?php
    if($user_type === 'student'|| $user_type === 'student_mod' || $user_type === 'super_mod') {
      echo "<li";
      if($route[2]=='categories.php') 
        echo ' class="active"';
      echo "><a href='./categories.php'>VIEW CATEGORIES</a></li>
            <li>
             <a href='./settings.php'>SETTINGS</a>
             </li>";
    } 
  ?>

  <li id="li-links" <?php if($route[2]=='links.php') echo 'class="active"' ?>><a href="./links.php">LINKS</a></li>

  <?php
    if($user_type === 'super_mod'|| $user_type === 'student_mod') {
      echo "<li";
      if($route[2]=='settings.php') 
        echo ' class="active"';
      echo "> 
            <hr />
            <li>
            <a href='#'>MANAGE POSTS</a></li>";
    }
    if($user_type === 'super_mod') {
      echo "<li><a href='#'>MANAGE USERS</a></li>
            <li><a href='http://localhost/webdev/student-portal-project-develop/manage_links.php'>MANAGE LINKS</a></li>
            <li><a href='./manage_categories.php'>MANAGE CATEGORIES</a></li>";
    }
  ?>
</ul>