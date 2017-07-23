<?php
  include_once('./views/main/header.php');
  #include_once('./php/categories_control.php');
?>
        <div>
            <div>
              Subscribed Categories
              <table>
                <tr>
                  <td><span class="tag subbed">General</span></td>
                  <td>Open to the public and cannot be disabled</td>
                </tr>
                <tr>
                  <td><span class="tag subbed">SMIT</span></td>
                  <td>All announcements related to SMIT</td>
                </tr>
              </table>
            </div>
            <div>
              All Categories
            </div>
        </div>
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