<?php
// start the session
session_start();
// Include the database connection file
include('includes/db_connection.php');


// Check if the login form has been submitted
if (!empty($_POST)) {
  // Retrieve username and password from the submitted form
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query to check if the provided login credentials are valid
  $query = "SELECT * FROM `logininfo` WHERE `username` = '$username' AND `password` = '$password'";

  $sqlDatabaseOutput = $db->query($query);

  // If there is a single matching record in the database
  if ($sqlDatabaseOutput->num_rows == 1) {
    while ($row = $sqlDatabaseOutput->fetch_assoc()) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['loggedIn'] = true;
      break;
    }

    // Redirect the user to the registration page
    header('Location: registration.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> Assignment 3</title>
  <link rel="stylesheet" href="css/LoginStyle.css">
</head>

<body>
  <div class="loginForm">
    <h2>Welcome to Waterloo Events!</h2>
    <h4>Please Enter your Login Details</h4>
    <form action="login.php" method="post">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Login</button>
    </form>
    <br><br>
    <a href="index.php" id="navLinks">Go Back</a>
  </div>
</body>

</html>