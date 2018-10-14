<?php
  session_start();
  if (!isset($_SESSION['userID'])) {}

  function login() {
    $_SESSION['status'] = 'login';
?>
      <div class="container" id="signIn">
        <form class="" action="ws.php" method="post">
          <fieldset>
            <legend>Login form</legend>
            <div class="">
              <label>Username:</label>
              <input type="text" name="username" id="username" value="">
            </div>
            <div>
              <label>Password:</label>
              <input type="text" name="user_pass" value="">
            </div>
            <button type="submit" name="button">Login</button>
          </fieldset>
        </form>
      </div>
      <div class="container" id="signUp">
        <form class="" action="ws.php" method="post">
          <fieldset>
            <legend>Sign Up form</legend>
            <div class="">
              <label>Username:</label>
              <input type="text" name="username" id="username" onkeyup="usernameCheck(this)" value="">
            </div>
            <div class="">
              <label>First Name:</label>
              <input type="text" name="fname" value="">
            </div>
            <div>
              <label>Last Name:</label>
              <input type="text" name="lname" value="">
            </div>
            <div>
              <label>Password:</label>
              <input type="text" name="password" value="">
            </div>
            <button type="submit" name="button">Sign Up</button>
          </fieldset>
        </form>
      </div>
      <button type="button" name="button" onclick="changeBetweenSignUpAndSignIn()">Switch bettween Sign In and Sign Up</button>
<?php }
  function start() {
    ?>
    <div class="container" id="chat">
      <div id="liveChat"></div> <!-- Chat window -->

      <form id="messageBox" method="post">
        <fieldset>
          <div class="">
            <label>Message:</label>
            <input type="text" name="messageTextBox" id="messageTextBox" placeholder="Message">
            <button type="button" name="Send" onclick="sendMessage()">Send Message</button>
        </fieldset>
      </form>
      <a href="supportFiles/reset.php">Logout</a>
    </div>
    <?php
  }
?>
