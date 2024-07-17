<?php
  // Connect to your database
  $conn = mysqli_connect("localhost", "root", "", "db_antrian");

  if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
  }

  $id = $_POST['id'];
  $sql = "SELECT no_antrian, status_panggilan";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    echo json_encode(array('error' => 'Database query failed'));
    exit;
  }

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode(array('no_antrian' => $row['no_antrian'], 'status_panggilan' => $row['status_panggilan']));
  } else {
    echo json_encode(array('no_antrian' => '', 'status_panggilan' => '0'));
  }

  mysqli_close($conn);
?>