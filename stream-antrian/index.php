<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Title -->
  <title>monitor antrian</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <!-- Custom Style -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container pt-5">
      <div class="row justify-content-lg-center">
        <div class="col-lg mb-4">
          <!-- judul halaman -->
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
          </div>

          <!-- Queue Section -->
          <div class="row mb-4">
            <div class="col-lg-4">
              <!-- 1. Sekretariat -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> SEKRETARIAT</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_1" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 2. Pembinaan SMA -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> PEMBINAAN SMA</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_2" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 3. Pembinaan SMK -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> PEMBINAAN SMK</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_3" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Second Row -->
          <div class="row mb-4">
            <div class="col-lg-4">
              <!-- 4. Pembinaan DIKSUS -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> PEMBINAAN DIKSUS</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_4" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 5. Pembinaan Kebudayaan -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> PEMBINAAN KEBUDAYAAN</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_5" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 6. Ketenagaan -->
              <div class="card border-5 shadow-sm mb-4 border-success">
                <div class="card-body text-center p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> KETENAGAAN</div>
                  <div class="border border-success rounded-2 py-0 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="gts_6" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
 
  <script type="text/javascript">
  $(document).ready(function() {

    // reload PHP files every second
    setInterval(function() {
      $('#gts_1').load('gts.php');
      $('#gts_2').load('gts2.php');
      $('#gts_3').load('gts3.php');
      $('#gts_4').load('gts4.php');
      $('#gts_5').load('gts5.php');
      $('#gts_6').load('gts6.php');
    }, 1000);
  });
</script>

<audio id="audioPlayer" src="../assets/audio/tingtung.mp3"></audio>

    <script src="https://code.responsivevoice.org/responsivevoice.js?key=WxSg6wJK"></script>
    <script>
        function fetchDataAndProcess() {
            fetch('../callback/cb.php')
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