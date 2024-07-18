<?php
// play_sound.php

// Connect to your database (adjust host, username, password, dbname as per your setup)
$mysqli = new mysqli("localhost", "root", "", "db_antrian");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get the posted data
$id_jamu = $_POST['id_jamu'];
$no_antrian = $_POST['no_antrian'];
$kode_bidang = $_POST['kode_bidang'];
$current_time = date('Y-m-d H:i:s'); // Get the current date and time

// Insert data into callback table
$query = "INSERT INTO callback (id_jamu, no_antrian, kode_bidang, date) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssss", $id_jamu, $no_antrian, $kode_bidang, $current_time);
$stmt->execute();

// Close database connection
$mysqli->close();
?>