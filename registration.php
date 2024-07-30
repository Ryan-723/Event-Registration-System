<?php
// Start a new session 
session_start();

// Redirect to the login page if user is not logged in
if (!isset($_SESSION['loggedIn'])) {
  header('Location: login.php');
}

// Include the database connection file
include('includes/db_connection.php');

// Retrieve data from the 'registration' table
$retrieveQuery = "SELECT * FROM registration";
$sqlDatabaseOutput = $db->query($retrieveQuery);

// Check the number of rows in the query result
$resultCheck = mysqli_num_rows($sqlDatabaseOutput);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="js/custom.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Bilbo+Swash+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Kalam" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/registrationStyle.css">
</head>

<body>
  <header>
    <h2 id="store_name">Events Registered List: </h2>
  </header>
  <nav>
    <a href="index.php" id="navLinks">Home</a>
    <a href="registration.php" id="navLinks">Registration</a>
    <a href="Login.php" id="navLinks">Log In</a>
    <a href="LogOut.php" id="navLinks">Log Out</a>
  </nav>
  <main>
    <table class="registrationList">
      <thead>


        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Postcode</th>
          <th>address</th>
          <th>city</th>
          <th>Province</th>
          <th>Participants</th>
          <th>event</th>
        </tr>
      </thead>
      <tbody>



        <?php
        // Loop through the rows and display data
        if ($sqlDatabaseOutput->num_rows > 0) {
          while ($row = $sqlDatabaseOutput->fetch_assoc()) {
        ?>


            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><?php echo $row['postcode']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['province']; ?></td>
              <td><?php echo $row['participants']; ?></td>
              <td><?php echo $row['event']; ?></td>
            </tr>



        <?php
          }
        } else {
          // Display a message if no data is found
          echo "
              <tr>
                <td>No data</td>
              </tr>
            ";
        }
        ?>

      </tbody>
    </table>
  </main>

</body>

</html>