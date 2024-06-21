<?php
  // Connect to database
  $conn = mysqli_connect("localhost", "username", "password", "database");

  // Check connection
  if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
  }

  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    // Query to check if user exists
    $query = "SELECT * FROM users WHERE uname='$uname' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Check if user exists
    if (mysqli_num_rows($result) > 0) {
      // User exists, redirect to dashboard
      header("Location: dashboard.php");
      exit;
    } else {
      // User does not exist, display error message
      header("Location: index.php?error=Invalid username or password");
      exit;
    }
  }
?>