<!DOCTYPE html>
<html>
<head>
    <title>Play Sound Listener</title>
</head>
<body>
    <button id="startButton" style="display: none;">Start Listening for Commands</button>
    <script src="https://code.responsivevoice.org/responsivevoice.js?key=WxSg6wJK"></script>
    <script>
        let isPlaying = false;

        function checkForPlayCommand() {
            if (!isPlaying) {
                fetch('play_sound.php')
                    .then(response => response.text())
                    .then(data => {
                        if (data === 'playSound') {
                            isPlaying = true;
                            const audioElement = document.createElement('audio');
                            audioElement.setAttribute('src', '../assets/audio/test_sound.mp3'); // Adjusted path for audio file
                            audioElement.play().catch(error => {
                                console.error('Audio playback failed:', error);
                            });
                            audioElement.onended = function() {
                                isPlaying = false;
                                checkForPlayCommand(); // Check for the next command after finishing
                            };
                        }
                    });
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            checkForPlayCommand(); // Initial check
            setInterval(checkForPlayCommand, 3000); // Check every 3 seconds
        });
    </script>
</body>
</html>
