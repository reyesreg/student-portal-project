<?php
  include('./php/_config.php');

  #get public announcements
  #TODO: limit to upcoming 5
  $display_announcements = "";
  $get_announcements = "SELECT 
    a.title, 
    a.description, 
    a.dateCreated,
    a.anID 
    FROM an_cat ac
    INNER JOIN announcements a ON a.anID = ac.anID
    WHERE ac.catID = 1";
  $result_announcements = $con->query($get_announcements) or die(mysqli_error($con));
    while($row_announcements = mysqli_fetch_array($result_announcements)) {
      $title = $row_announcements['title'];
      $description = $row_announcements['description'];
      $dateCreated = $row_announcements['dateCreated'];
      $id = $row_announcements['anID'];

      $display_announcements .= "
        <div class='box'>
          <div class='date'>$dateCreated</div>
          <div class='title'>$title</div>
          <span class='tag'>General</span>
          <div class='message'>
            $description
          </div>
          <div class='card-footer'>
            <span class='read-more'><a href='./announcement.php?id=$id'>Read More...</a></span>
            <div class='media-buttons'>
              <a class='twitter-share-button'
                href='https://twitter.com/intent/tweet?text=Hello%20world'>
              Tweet</a>
              <div class='fb-share-button' data-href='https://developers.facebook.com/docs/plugins/' data-layout='button_count' data-size='small' data-mobile-iframe='true'>
                <a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Share</a>
              </div>
            </div>
          </div>
        </div>
      ";
    }
?>