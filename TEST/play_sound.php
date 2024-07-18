<?php
// Define the queue file
$queueFile = 'audio_queue.json';

// Handle POST request to add a play command to the queue
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $queue = [];
    if (file_exists($queueFile)) {
        $queue = json_decode(file_get_contents($queueFile), true);
    }
    $queue[] = ['play' => true];
    file_put_contents($queueFile, json_encode($queue));
    echo "Play command added to the queue";
    exit();
}

// Handle GET request to check and process the play command queue
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($queueFile)) {
        $queue = json_decode(file_get_contents($queueFile), true);
        if (!empty($queue) && $queue[0]['play'] === true) {
            array_shift($queue); // Remove the first command from the queue
            file_put_contents($queueFile, json_encode($queue));
            echo "playSound";
            exit();
        }
    }
    echo "noAction";
    exit();
}
?>
