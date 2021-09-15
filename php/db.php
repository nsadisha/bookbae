<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bookbae";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
  }
?>