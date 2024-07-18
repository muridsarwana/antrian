<!-- index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Call Back Listener</title>
</head>
<body>
    <audio id="audioPlayer" src="../assets/audio/test_sound.mp3"></audio>

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
                        setTimeout(fetchDataAndProcess, 3000); // Retry after 1 second
                    } else {
                        // Play sound
                        document.getElementById('audioPlayer').play();

                        // Delay 700ms before speaking
                        setTimeout(function() {
                            speakData(data);
                        }, 700);
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                    setTimeout(fetchDataAndProcess, 3000); // Retry after 1 second
                });
        }

        function speakData(data) {
            // Map kode_bidang to its corresponding string
            let kode_bidang_string = '';
            switch (data.kode_bidang) {
                case 1:
                    kode_bidang_string = 'sekretariat';
                    break;
                case 2:
                    kode_bidang_string = 'pembinaan s m a';
                    break;
                case 3:
                    kode_bidang_string = 'pembinaan s m k';
                    break;
                case 4:
                    kode_bidang_string = 'pembinaan diksus';
                    break;
                case 5:
                    kode_bidang_string = 'pembinaan kebudayaan';
                    break;
                case 6:
                    kode_bidang_string = 'ketenagaan';
                    break;
            }

            // Construct the message to speak
            let message = `Nomor Antrian ${data.no_antrian}, menuju loket pelayanan ${kode_bidang_string}`;

            // Speak using ResponsiveVoice.js
            responsiveVoice.speak(message, 'Indonesian Female', {
                rate: 0.9,
                pitch: 1,
                volume: 1 // Adjust volume as needed
            });

            // Repeat every 1000ms
            setTimeout(fetchDataAndProcess, 3000);
        }

        // Start fetching and processing data on page load
        fetchDataAndProcess();
    </script>
</body>
</html>
