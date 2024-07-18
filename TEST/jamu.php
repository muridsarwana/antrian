<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connect to your database (adjust host, username, password, dbname as per your setup)
$mysqli = new mysqli("localhost", "root", "", "db_antrian");

// Check connection
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $mysqli->connect_error]);
    exit;
}

// Fetch the oldest record from callback table
$query = "SELECT * FROM callback ORDER BY date ASC LIMIT 1";
$result = $mysqli->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        // Fetch data from the result
        $row = $result->fetch_assoc();
        $id_jamu = $row['id_jamu'];
        $no_antrian = $row['no_antrian'];
        $kode_bidang = $row['kode_bidang'];

        // Close the result set
        $result->close();

        // Delete the fetched row from callback table
        $deleteQuery = "DELETE FROM callback WHERE id_jamu = $id_jamu";
        $deleteResult = $mysqli->query($deleteQuery);

        // Check if deletion was successful
        if ($deleteResult) {
            // Close database connection
            $mysqli->close();

            // Return data as JSON response
            header('Content-Type: application/json');
            echo json_encode([
                'no_antrian' => $no_antrian,
                'kode_bidang' => $kode_bidang
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to delete row: ' . $mysqli->error]);
        }
    } else {
        // No rows found in callback table
        http_response_code(404);
        echo json_encode(['error' => 'No callback data available']);
    }
} else {
    // Query failed
    http_response_code(500);
    echo json_encode(['error' => 'Query failed: ' . $mysqli->error]);
}

// Close database connection
$mysqli->close();
?>