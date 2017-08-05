<?php
  include_once('./includes/main/header.php');
  include_once('./php/announcement_control.php');
  include_once('./php/manage_catsae_control.php');
?>
    
    <form method="POST">
    <div class="box">
    <label class="title">Name of Category</label></br>
    <input name="catname" style='width:100%' value='<?php echo $name; ?>'/></br></br>
    <label class="title">Description of Category</label></br>
    <input name="catdesc" style='width:100%'value='<?php echo $desc; ?>'/></br></br></br>
    <label class="title">Twitter Link</label></br>
    <input name="cattwit" style='width:100%'value='<?php echo $twit; ?>'/></br></br></br>
    <label class="title">Faceboook Link</label></br>
    <input name="catface" style='width:100%'value='<?php echo $face; ?>'/></br></br></br>
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