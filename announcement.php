<?php
  include('./assets/php/config.php');

  $id = '';
  if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    #get announcement details
    $get_announcement = "SELECT 
      a.title, 
      a.description, 
      a.dateCreated, 
      u.firstName, 
      u.lastName 
      FROM announcements a
      INNER JOIN users u ON a.authorID = u.uID
      WHERE a.anID = $id";
    $result_announcement = $con->query($get_announcement) or die(mysqli_error($con));
    while($row_announcement = mysqli_fetch_array($result_announcement)) {
      $title = $row_announcement['title'];
      $description = $row_announcement['description'];
      $dateCreated = $row_announcement['dateCreated'];
      $firstName = $row_announcement['firstName'];
      $lastName = $row_announcement['lastName'];
    }

    #get comments of announcement
    $display_comments = "";
    $display_commentNo = 0;
    $get_comments = "SELECT 
      c.comment, 
      c.dateCreated, 
      u.firstName, 
      u.lastName, 
      u.img 
      FROM comments c 
      INNER JOIN users u ON c.authorID = u.uID 
      WHERE c.anID = $id";
    $result_comments = $con->query($get_comments) or die(mysqli_error($con));
    while($row_comments = mysqli_fetch_array($result_comments)) {
      $comment = $row_comments['comment'];
      $commentDate = $row_comments['dateCreated'];
      $commentFirstName = $row_comments['firstName'];
      $commentLastName = $row_comments['lastName'];
      $commentImg = $row_comments['img'];

      $display_commentNo++;

      $display_comments .= "
        <div class='box'>
          <div class='comment-details'>
            <div>
              <img class='avatar' src='.$commentImg'/>
              <span>$commentFirstName $commentLastName</span>
            </div>
            <div>$commentDate</div>
          </div>
          <p>$comment</p>
        </div>";
    }

    #get tags/categories of announcement
    $display_tags = "";
    $get_tags = "SELECT 
      c.catName 
      FROM an_cat ac 
      INNER JOIN announcements a ON a.anID = ac.anID 
      INNER JOIN categories c ON c.catID = ac.catID 
      WHERE ac.anID = $id";
    $result_tags = $con->query($get_tags) or die(mysqli_error($con));
    while($row_tags = mysqli_fetch_array($result_tags)) {
      $tag = $row_tags['catName'];
      
      $display_tags .= "<span class='tag'>$tag</span>";
    }
  }

?>

<html>
<head>
  <link rel="stylesheet" href="./assets/styles/main.css">
</head>
<body>
  <div id="fb-root"></div>
  <div class="container">
    <div class="nav">
      <img src="./assets/img/DLS-CSB_Seal.png" alt="benilde logo" height="60px"/>
      <span class="logo-title">WE BENILDE</span>
    </div>
    <div class="content">
      <div class="col-side">
        <?php include_once('./views/main/sidebar-student.html'); ?>
      </div>
      <div class="col-main">
        <div class="announcement-wrapper">
          <h1><?php echo $title ?></h1>
          <span class="subtitle">
            Posted by 
            <a href="#"><?php echo $firstName . ' ' . $lastName; ?></a> 
            on <?php echo $dateCreated ?></span>
          <br/><br/>
          <?php echo $display_tags ?>
          <p><?php echo $description ?></p>
          <div class="card-footer">
            <span class="read-more"><strong>Viewing <?php echo $display_commentNo ?> comments</strong></span>
            <div class="media-buttons">
              <a class="twitter-share-button"
                href="https://twitter.com/intent/tweet?text=Hello%20world">
              Tweet</a>
              <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a>
              </div>
            </div>
          </div>
        </div>
        <form method="POST" action="">
          <textarea id="" rows="5" placeholder="Write a comment..." name="comment"></textarea>
          <div class="form-submit">
            <button>Submit</button>
          </div>
        </form>
        <?php echo $display_comments ?>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <script src="./assets/scripts/announcement-scripts.js"></script>
</body>
</html>