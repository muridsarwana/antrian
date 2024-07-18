<!DOCTYPE html>
<html>
<head>
    <title>Play Sound Listener</title>
</head>
<body>
    <script>
        function checkForPlayCommand() {
            fetch('play_sound.php')
                .then(response => response.text())
                .then(data => {
                    if (data === 'playSound') {
                        const audioElement = document.createElement('audio');
                        audioElement.setAttribute('src', '../assets/audio/test_sound.mp3');
                        audioElement.play();
                    }
                });
        }

        setInterval(checkForPlayCommand, 1000); // Check every seconds
    </script>
</body>
</html>
