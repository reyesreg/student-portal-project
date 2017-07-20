<?php
  include_once('./php/announcement_control.php');
  include_once('./views/main/header.php');
?>
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