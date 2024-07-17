<?php
  // Connect to your database
  $conn = mysqli_connect("localhost", "root", "", "db_antrian");

  if (!$conn) {
    die("Connection failed: ". mysqli_connect_error();
  }

  $status_panggilan = $_POST['status_panggilan'];

  $sql = "UPDATE tbl_antrian SET status_panggilan = '$status_panggilan' WHERE status_panggilan = '1'";
  $result = mysqli_query($conn, $sql);

  mysqli_close($conn);
?>