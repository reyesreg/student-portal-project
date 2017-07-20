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
      <form method="POST" action="">
        <span>LOGIN&nbsp;&nbsp;</span>
        <input type="text" name="email" placeholder="ID Number...">
        <input type="password" name="pass" placeholder="Password...">
        <button style="background: none; padding: 0; outline: none;">
          <i class="material-icons" style="color: white;margin-left: 20px;background: rgba(255, 255, 255, 0.2);border-radius: 50%;padding: 5px;">arrow_forward</i>
        </button>
      </form>
    </div>
    <div class="content">
      <div class="col-side">
        <?php include_once('./views/main/sidebar-student.html'); ?>
      </div>
      <div class="col-main">