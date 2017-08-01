<?php
  include_once('./includes/main/header.php');
  include_once('./php/announcement_control.php');
  include('./php/settings_control.php');
?>  
    <form method="POST">
    <div class='box'>
      <span class='title'>Settings</span></br></br>

      <div class="form-group">
        <label class="control-label col-lg-4">ID Number: </label>
        <label class="control-label col-lg-4"><?php echo $setID; ?></label>   
      </div>

      </br>

      <div class="form-group">
        <label class="control-label col-lg-4">Name: </label>
        <label class="control-label col-lg-4"><?php echo $setfn . ' ' . $setln; ?></label>  
      </div>

      </br>

      <div class="form-group">
        <label class="control-label col-lg-4">Priviledges: </label>
        <label class="control-label col-lg-4"><?php echo $settype; ?></label>  
      </div>  

      </br>

      <div class="form-group">
        <label class="control-label col-lg-4">Email: </label>
        <input name="setemail" type="text" class="form-control" value="<?php echo $setemail; ?>"/>
        <button name="upemail">Update</button>
      </div>   

      </br>

      <div class="form-group">
        <label class="control-label col-lg-4">Contact Number: </label>
        <input name="setcontact" type="text" class="form-control" value="<?php echo $setcontact; ?>"/>
        <button name="upcon">Update</button>
      </div>  

      </br>

      <?php echo $display_subs; ?>

      </div>
    </div>
    </form>

    </div>
      <div class="col-side">
        <div class="calendar"></div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="./assets/scripts/announcement-scripts.js"></script>
  <script src="./assets/scripts/main.js"></script>
</body>
</html>