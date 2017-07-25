<?php
  include_once('./includes/main/header.php');
  include_once('./php/categories_control.php');
?>
        <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              This section displays categories wherein users can subscribe or unsubscribe to announcements shown on the homepage.
              <hr/>
            </div>
            <div class="cat-sub-wrapper">
              <h3>Your Subscriptions (<?php echo $catUserCount ?>)</h3>
              <?php echo $display_sub ?>
            </div>
            <div class="cat-sub-wrapper">
              <h3>All Categories (<?php echo $catAllCount ?>)</h3>
              <?php echo $display_unsub ?>
            </div>
        </div>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <script src="./assets/scripts/announcement-scripts.js"></script>
</body>
</html>