<?php
  session_start();
  if (!isset($_SESSION['userID'])) {}

  function login() {
    $_SESSION['status'] = 'login';
?>
      <div class="container">

      <form class="" action="ws.php" method="post">
        <fieldset>
        <legend>Login form</legend>
        <div class="">
          <label>Username:</label>
          <input type="text" name="username" id="username" onkeyup="usernameCheck(this)" value="">
        </div>
        <div class="">
          <label>First Name:</label>
          <input type="text" name="fname" value="">
        </div>
        <div>
          <label>Password:</label>
          <input type="text" name="password" value="">
        </div>
        <button type="submit" name="button">Login</button>
      </fieldset>
      </form>
      </div>
<?php }
  function start() {
    $_SESSION['status'] = 'startchat';
  }
?>
