
\<?php
session_start();
include 'dbconnect.php';
print_r($_SESSION);
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
      print_r($result);
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
?>
