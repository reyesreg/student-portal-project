<?php
  
  error_reporting(0);
  
  $query = "";

  if(empty($_GET['query'])){
    header('location: index.php');
  } else {
    $query = $_GET['query'];

    $catArray = array(1);
    $catIndex = 1;
    
    $display_announcements = "";
    $get_announcements = "SELECT 
      a.title, 
      a.description, 
      a.dateCreated,
      a.anID
      FROM announcements a
      INNER JOIN an_cat b ON a.anID = b.anID
      INNER JOIN categories c ON b.catID = c.catID
      WHERE (a.title LIKE '%$query%' or c.catName LIKE '%$query%') 
      AND YEAR(dateCreated) = YEAR(NOW())
      GROUP BY a.title
      ";

    $result_announcements = $con->query($get_announcements) or die(mysqli_error($con));

    if(0 === mysqli_num_rows($result_announcements)){
      $display_announcements .= "
      <div class='box'>
      <div class='title' align='center'>No results found!</div>
      </div>";
    } else {
       while($row_announcements = mysqli_fetch_array($result_announcements)) {
      $title = $row_announcements['title'];
      $description = $row_announcements['description'];
      $dateCreated = $row_announcements['dateCreated'];
      $anID = $row_announcements['anID'];
      
      $display_categories = "";
      $get_ac = "SELECT 
        c.catName 
        FROM an_cat ac
        INNER JOIN categories c ON ac.catID=c.catID 
        WHERE ac.anID=$anID";
      $result_ac = $con->query($get_ac) or die(mysqli_error($con));
      while($row_ac = mysqli_fetch_array($result_ac)) {
        $catName = $row_ac['catName'];

        $display_categories .= "<span class='tag subbed'>$catName</span>";
      }

      $display_announcements .= "
        <div class='box'>
          <div class='date'>$dateCreated</div>
          <div class='title'>$title</div>
          $display_categories
          <p class='message'>
            $description
          </p>
          <div class='card-footer'>
            <span class='read-more'><a href='./announcement.php?id=$anID'>Read More...</a></span>
            <div class='media-buttons'>
            <div style='margin-right:10px'>
                <a class='twitter-share-button'
                  href='https://twitter.com/intent/tweet?text=Hello%20world'>
                Tweet</a>
              </div>
              <div class='fb-share-button' data-href='https://developers.facebook.com/docs/plugins/' data-layout='button_count' data-size='small' data-mobile-iframe='true'>
                <a class='fb-xfbml-parse-ignore' target='_blank' href='https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse'>Share</a>
              </div>
            </div>
          </div>
        </div>
      ";
    }
    }
   
  }
?>