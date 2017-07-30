<?php
  include_once('./includes/main/header.php');
  include_once('./php/submit_control.php');
?>
         <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <h1>Submit Post</h1>
              <hr/>
              <form id="submit-post-form" method="POST" action="./php/inv_controllers/user_func/submit_post.php">
                <label style="color: #0b8e4f">Categories</label>
                <div class="box">
                  <div style="display: flex;">
                    <select id="select-cat" style="width:100%;">
                      <?php echo $display_categories ?>
                    </select>
                    <button class="add" onclick="addCategory(event)">Add</button>
                  </div>
                  <br/>
                  <div id="selected-cat-wrapper">
                    <div>Selected Categories:&nbsp;&nbsp;</div>
                    <div id="selected-cat"></div>
                  </div>
                </div>
                <div class="input-wrapper">
                  <label for="">Title</label>
                  <input id="txt-title" type="text" placeholder="Post title..." name="title" required/>
                </div>
                <div class="input-wrapper">
                  <label for="">Description</label>
                  <textarea  id="txt-desc" name="desc" rows="10" placeholder="Details about the announcement..." required></textarea>
                </div>
                <button class="submit" onclick="openSubmitModal(event)">Submit Post</button>
                <div id="inv-input"></div>
              </form>
            </div>
        </div>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <?php
    include_once('./includes/modals/submit-post.php');
  ?>
  <script src="./assets/scripts/user_func.js"></script>
</body>
</html>