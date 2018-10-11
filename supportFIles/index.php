<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hashing Password Program</title>
  </head>
  <body>
    <h1>DO NOT USE ON A LIVE PRODUCTION</h1>
    <h2>Development Environment Only</h2>
    <form class="" action="HashingOutput.php" method="post">
      <div class="">
        <h3>Password Hashing Section</h3>
        <div class="">
          <label>Passsword</label>
          <input type="password" name="UserPassword" placeholder="Password">
        </div>
      </div>
      <div class="">
        <h3>Database Details</h3>
        <h3>Insert into a database</h3>
        <div class="">
          <label>What is the name of the database</label>
          <input type="text" name="DatabaseName" placeholder="What the datase called">
        </div>
        <div class="">
          <label>Database Username</label>
          <input type="text" name="DatabaseUser" value="">
        </div>
        <div class="">
          <label>Database Password</label>
          <input type="password" name="DatabasePassword" value="">
        </div>
      </div>
      <input type="submit" name="" value="Submit">
    </form>
    Copyright &copy; 2018 Copyright Holder All Rights Reserved.
  </body>
</html>
