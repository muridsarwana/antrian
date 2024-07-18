<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Call Back Listener</title>
</head>
<body>
    <audio id="audioPlayer" src="../assets/audio/tingtung.mp3"></audio>

    <script src="https://code.responsivevoice.org/responsivevoice.js?key=WxSg6wJK"></script>
    <script>
        function fetchDataAndProcess() {
            fetch('cb.php')
                .then(response => {
                    console.log('Fetch response status:', response.status);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        console.error('Server error:', data.error);
                        setTimeout(fetchDataAndProcess, 1000); // Retry after 1 second
                    } else {
                        // Play sound
                        document.getElementById('audioPlayer').play();

                        // Add event listener to wait for the audio to finish playing
                        audioPlayer.onended = function() {
                            // Delay 700ms before speaking
                            setTimeout(function() {
                                speakData(data);
                            }, 700);
                        };
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    setTimeout(fetchDataAndProcess, 1000); // Retry after 1 second
                });
        }

        function speakData(data) {
            // Map kode_bidang to its corresponding string
            let kodeBidangMap = {
    1: 'sekretariat',
    2: 'pembinaan s m a',
    3: 'pembinaan s m k',
    4: 'pembinaan diksus',
    5: 'pembinaan kebudayaan',
    6: 'ketenagaan'
};

            // Construct the message to speak
            let message = `Nomor Antrian ${data.no_antrian}, menuju loket pelayanan ${kodeBidangMap[data.kode_bidang]}`;

            // Speak using ResponsiveVoice.js
            responsiveVoice.speak(message, 'Indonesian Female', {
                rate: 0.9,
                pitch: 1,
                volume: 1 // Adjust volume as needed
            });

            // Repeat every 1000ms
            setTimeout(fetchDataAndProcess, 6000);
        }

        // Start fetching and processing data on page load
        fetchDataAndProcess();
    </script>
</body>
</html>
