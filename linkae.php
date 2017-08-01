<?php
  include_once('./includes/main/header.php');
  include_once('./php/announcement_control.php');
  include_once('./php/manage_linksae_control.php');
?>
    
    <form method="POST">
    <div class="box">
    <label class="title">Name of Link</label></br>
    <input name="nameol" style='width:100%' value='<?php echo $name; ?>'/></br></br>
    <label class="title">Address</label></br>
    <input name="address" style='width:100%'value='<?php echo $link; ?>'/></br></br></br>
    <button name="save">Save</td>
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