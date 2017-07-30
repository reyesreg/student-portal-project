<?php
  include_once('./includes/main/header.php');
  include_once('./php/categories_control.php');
?>
        <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <h1>Categories</h1>
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
  <script src="./assets/scripts/user_func.js"></script>
</body>
</html>