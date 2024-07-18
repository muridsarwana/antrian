<!DOCTYPE html>
<html>
<head>
    <title>Play Sound Control</title>
</head>
<body>
    <button onclick="sendPlayCommand()">Play Audio on Server</button>
    <script>
        function sendPlayCommand() {
            fetch('play_sound.php', {
                method: 'POST'
            })
            .then(response => response.text())
            .then(data => console.log(data));
        }
    </script>
</body>
</html>
