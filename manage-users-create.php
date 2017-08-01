<?php
  include_once('./includes/main/header.php');
  include_once('./php/manage-users-create_control.php');
?>
        <div class="cat-wrapper">
            <div class="cat-sub-wrapper">
              <h1>Create User</h1>
              <hr/>
              <form id="create-user-form" method="POST" action="./php/inv_controllers/admin_func/create_user.php">
                <div class="input-wrapper">
                  <label for="">School No</label>
                  <input type="text" placeholder="School ID..." name="schoolID" required/>
                </div>
                <div class="input-wrapper">
                  <label for="">Name</label>
                  <div style="display: flex; justify-content: space-between;">
                    <input type="text" placeholder="First Name..." name="firstName" style="width: 49%;" required/>
                    <input type="text" placeholder="Last Name..." name="lastName" style="width: 49%;" required/>
                  </div>
                </div>
                <div class="input-wrapper">
                  <label for="">Email</label>
                  <input type="text" placeholder="Email..." name="email" required/>
                </div>
                <div class="input-wrapper">
                  <label for="">User Type</label>
                  <select name="type">
                    <option value="student">Student</option>
                    <option value="student_mod">Student Moderator</option>
                    <option value="faculty">Faculty</option>
                    <option value="personnel">Personnel</option>
                    <option value="super_admin">Super Admin</option>
                  </select>
                </div>
                <button class="submit">Create User</button>
              </form>
            </div>
        </div>
      </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
</body>
</html>