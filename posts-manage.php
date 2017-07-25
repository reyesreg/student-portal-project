<?php
  include_once('./includes/main/header.php');
  include_once('./php/post-manage_control.php');
?>
          <div class="cat-wrapper">
            <div class="cat-sub-wrapper" style="padding-bottom: 30px;">
              Moderated Categories&nbsp;&nbsp;<?php echo $display_sub ?>
              <div style="float:right;"><button><i class="material-icons">add_circle_outline</i>&nbsp;&nbsp;New Post</button></div>
            </div>
            <div class="cat-sub-wrapper">
              <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'pending')" id="defaultOpen">Pending</button>
                <button class="tablinks" onclick="openTab(event, 'approved')">Approved</button>
                <button class="tablinks" onclick="openTab(event, 'archived')">Archived</button>
              </div>

              <div id="pending" class="tabcontent">
                <table>
                  <thead>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php echo $display_pending ?>
                  </tbody>
                </table>
              </div>

              <div id="approved" class="tabcontent">
                <table>
                  <thead>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php echo $display_approved ?>
                  </tbody>
                </table>
              </div>

              <div id="archived" class="tabcontent">
                <table>
                  <thead>
                    <th>Title</th>
                    <th>Categories</th>
                    <th>Author</th>
                    <th>Created</th>
                    <th></th>
                  </thead>
                  <tbody>
                    <?php echo $display_archived ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-side">
          <div class="calendar"></div>
        </div>
      </div>
    </div>
  </div>
  <script src="./assets/scripts/social.js"></script>
  <script src="./assets/scripts/tabs.js"></script>
</body>
</html>