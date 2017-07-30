<?php

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
            <div style='display: flex; align-items: center;'>
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
      
      $display_tags .= "<span class='tag subbed'>$tag</span>";
    }
    
    $display_comment_box = "";
    if(isset($_SESSION['uID'])) {
      $uID = $_SESSION['uID'];

      $display_comment_box = "
        <form method='POST' action='./php/inv_controllers/user_func/add_comment.php'>
          <textarea rows='5' placeholder='Write a comment...' name='comment'></textarea>
          <input type='hidden' name='anID' value='$id'>
          <div class='form-submit'>
            <button>Submit Comment</button>
          </div>
        </form>
      ";
    }
  }

?>