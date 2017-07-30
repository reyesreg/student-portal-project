<?php
  include_once('./includes/main/header.php');
  include_once('./php/manage-users_control.php');
?>
          <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <h1>Manage Users</h1>
              <hr/>
            </div>
          </div>
          <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'students')" id="defaultOpen">Students</button>
                <button class="tablinks" onclick="openTab(event, 'student_mod')">Student Mods</button>
                <button class="tablinks" onclick="openTab(event, 'super_mod')">Super Mods</button>
              </div>

              <div id="students" class="tabcontent">
                <table class="pretty">
                  <thead>
                    <th width="10%">School ID</th>
                    <th width="20%">Name</th>
                    <th width="60%">Subscribed</th>
                    <th width="10%"></th>
                  </thead>
                  <tbody>
                    <?php echo $display_students ?>
                  </tbody>
                </table>
              </div>

              <div id="student_mod" class="tabcontent">
                <table class="pretty">
                  <thead>
                    <th width="10%">School ID</th>
                    <th width="20%">Name</th>
                    <th width="30%">Subscribed</th>
                    <th width="30%">Moderated</th>
                    <th width="10%"></th>
                  </thead>
                  <tbody>
                    <?php echo $display_student_mods ?>
                  </tbody>
                </table>
              </div>

              <div id="super_mod" class="tabcontent">
                <table class="pretty">
                  <thead>
                    <th width="10%">School ID</th>
                    <th width="20%">Name</th>
                    <th width="60%">Subscribed</th>
                    <th width="10%"></th>
                  </thead>
                  <tbody>
                    <?php echo $display_super_mods ?>
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
  <script src="./assets/scripts/tabs.js"></script>
  <script src="./assets/scripts/admin_func.js"></script>
</body>
</html>