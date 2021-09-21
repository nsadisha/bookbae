<?php
  $servername = "https://server54.web-hosting.com:2083";
  $username = "savisuer_testUser";
  $password = "testUser@123.com";
  $dbname = "savisuer_bookbae";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);
  }
?>