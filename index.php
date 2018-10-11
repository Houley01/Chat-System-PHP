<?php
  require_once 'include.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/master.css">
    <title>Chat System</title>
  </head>
  <body>
    <?php
      if(!isset($_SESSION['userID'])) {
        login();
      } elseif($_SESSION['status'] = "successfulLogin") {
        start();
      } else {
        login();
      }
   ?>
   <footer>
     Copyright &copy; 2018 Copyright Holder All Rights Reserved.
     <div class="debug">
       <?php print_r($_SESSION); ?>
     </div>
   </footer>
  </body>
  <script src="js/jquery-3.3.1.js" charset="utf-8"></script>
  <script src="js/master.js" charset="utf-8"></script>
</html>
