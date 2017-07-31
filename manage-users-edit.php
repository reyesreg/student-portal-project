<?php
  include_once('./includes/main/header.php');
  include_once('./php/manage-users-edit_control.php');
?>
        <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <h1>Update User</h1>
              <hr/>
              <form id="edit-user-form" method="POST" action="./php/inv_controllers/admin_func/edit_user.php">
                <div class="input-wrapper">
                  <label for="">School No</label>
                  <input type="text" placeholder="School ID..." name="schoolID" value=<?php echo "$studentID" ?> required/>
                </div>
                <div class="input-wrapper">
                  <label for="">Name</label>
                  <div style="display: flex; justify-content: space-between;">
                    <input type="text" placeholder="First Name..." name="firstName" style="width: 49%;" value=<?php echo "$firstName" ?> required/>
                    <input type="text" placeholder="Last Name..." name="lastName" style="width: 49%;" value=<?php echo "$lastName" ?> required/>
                  </div>
                </div>
                <div class="input-wrapper">
                  <label for="">Email</label>
                  <input type="text" placeholder="Email..." name="email" value=<?php echo "$email" ?> required/>
                </div>
                <div class="input-wrapper">
                  <label for="">User Type</label>
                  <select name="type" id="select-type" onchange="toggleModView()">
                    <option value="student" <?php if($type == 'student') echo "selected" ?>>Student</option>
                    <option value="student_mod" <?php if($type == 'student_mod') echo "selected" ?>>Student Moderator</option>
                    <option value="faculty" <?php if($type == 'faculty') echo "selected" ?>>Faculty</option>
                    <option value="personnel" <?php if($type == 'personnel') echo "selected" ?>>Personnel</option>
                    <option value="super_admin" <?php if($type == 'super_admin') echo "selected" ?>>Super Admin</option>
                  </select>
                </div>
                <label style="color: #0b8e4f">Subscribed Categories</label>
                <div class="box">
                  <div style="display: flex;">
                    <select id="select-sub" style="width:100%;">
                      <?php echo $display_categories ?>
                    </select>
                    <button class="add" onclick="addSub(event)">Add</button>
                  </div>
                  <br/>
                  <div id="selected-cat-wrapper">
                    <div>Selected Categories:&nbsp;&nbsp;</div>
                    <div id="sub-selected-cat"><?php echo $sub_display ?></div>
                  </div>
                </div>
                <br/><br/>
                <div id="mod-wrapper">
                  <label style="color: #0b8e4f" id="edit-moderated-cat">Moderated Categories</label>
                  <div class="box">
                    <div style="display: flex;">
                      <select id="select-mod" style="width:100%;">
                        <?php echo $display_categories ?>
                      </select>
                      <button class="add" onclick="addMod(event)">Add</button>
                    </div>
                    <br/>
                    <div id="selected-cat-wrapper">
                      <div>Selected Categories:&nbsp;&nbsp;</div>
                      <div id="mod-selected-cat"><?php echo $mod_display ?></div>
                    </div>
                  </div>
                  <br/><br/>
                </div>
                <button class="cancel" style="width: 200px; float: left;">Delete User</button>
                <button class="submit">Update User</button>
              </form>
            </div>
        </div>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <script src="./assets/scripts/admin_func.js"></script>
</body>
</html>