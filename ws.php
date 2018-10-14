<?php
session_start();
include 'dbconnect.php';
  switch ($_SESSION['status']) {
    case 'login':
      $Username = $_POST["username"];
      // Searchs the database for the username.
      $conn = dbConnect();
      $login = "SELECT * FROM user WHERE username = :Username;";
      $stmt = $conn->prepare($login);
      $stmt->bindParam(':Username', $Username);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      // Gets User login credential and changes the name of the object.
      $UP = $_POST["user_pass"];
      $DP = $result["password"];
      // If user email is not found throw an error on reload
      if($stmt->rowcount() == 0) {
        $_SESSION['message'] = "Login details are invalid please try again";
        // header('Location: index.php');
      } else {
        // Checks User input password agentist the hashed password in the database
        if (password_verify($UP, $DP)) {
          echo 'Password is valid!';
          //Set Users details into session.
          $_SESSION['userID'] = $result['userID'];
          $_SESSION['username'] = $result['username'];
          $_SESSION['f.name'] = $result['fname'];
          $_SESSION['status'] = "successfulLogin";
          unset($_SESSION['message']);
          header('Location: index.php');
        } else {
          // if an username was found but your password was wrong.
          $_SESSION['message'] = "Login details are invalid please try again";
          // header('Location: index.php');
        }
      break;
    }
    case 'signUp':
      // code...
      break;

    default:
      // code...
      break;
  }

  // Get message from database
  if ($_GET["messageGet"] == 'true' && isset($_SESSION["f.name"])) {
    $select_sql = "SELECT username, message, `timestamp` FROM message
    INNER JOIN user ON message.userID = user.userID WHERE `timestamp` > NOW() - INTERVAL 1 DAY;"; // SELECT username, message, and timestamp from table(message) get data from another table. Where timestamp is less then 1 day old.
    $conn = dbConnect();
    $stmt = $conn->prepare($select_sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    return;
  }

  // Post message to database
  if ($_GET["messagePost"] == 'post' && isset($_SESSION["f.name"])) {
    $_SESSION["message"] = $_POST["messageTextBox"];
    $insert_sql = "INSERT INTO message (messageID, userID, message, `timestamp`) VALUES (NULL, :userID, :message, CURRENT_TIMESTAMP);";
    $conn = dbConnect();
    $stmt = $conn->prepare($insert_sql);
    $stmt->bindValue(':userID', $_SESSION['userID']);
    $stmt->bindValue(':message', $_SESSION['message']);
    $stmt->execute();
    exit();
  }


?>
