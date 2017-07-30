<?php
  include_once('./includes/main/header.php');
  include_once('./php/post-manage_control.php');
?>
          <div class="cat-wrapper">
            <div class="cat-sub-wrapper" style="padding-bottom: 30px;">
              Moderated Categories&nbsp;&nbsp;<?php echo $display_sub ?>
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
                    <th width="30%">Title</th>
                    <th width="30%">Categories</th>
                    <th width="20%">Author</th>
                    <th width="10%">Created</th>
                    <th width="10%"></th>
                  </thead>
                  <tbody>
                    <?php echo $display_pending ?>
                  </tbody>
                </table>
              </div>

              <div id="approved" class="tabcontent">
                <table>
                  <thead>
                    <th width="30%">Title</th>
                    <th width="30%">Categories</th>
                    <th width="20%">Author</th>
                    <th width="10%">Created</th>
                    <th width="10%"></th>
                  </thead>
                  <tbody>
                    <?php echo $display_approved ?>
                  </tbody>
                </table>
              </div>

              <div id="archived" class="tabcontent">
                <table>
                  <thead>
                    <th width="30%">Title</th>
                    <th width="30%">Categories</th>
                    <th width="20%">Author</th>
                    <th width="10%">Created</th>
                    <th width="10%"></th>
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
  <?php
    include_once('./includes/modals/approve-post.php');
    include_once('./includes/modals/archive-post.php');
  ?>
  <script src="./assets/scripts/tabs.js"></script>
  <script src="./assets/scripts/admin_func.js"></script>
</body>
</html>