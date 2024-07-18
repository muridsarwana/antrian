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
 
  <!-- <script type="text/javascript">
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
</script> -->

<script>
  $(document).ready(function() {
  // reload PHP files every second
  setInterval(function() {
    $('#gts_1').load('gts.php', function() {
      changeColor($('#gts_1'));
    });
    $('#gts_2').load('gts2.php', function() {
      changeColor($('#gts_2'));
    });
    $('#gts_3').load('gts3.php', function() {
      changeColor($('#gts_3'));
    });
    $('#gts_4').load('gts4.php', function() {
      changeColor($('#gts_4'));
    });
    $('#gts_5').load('gts5.php', function() {
      changeColor($('#gts_5'));
    });
    $('#gts_6').load('gts6.php', function() {
      changeColor($('#gts_6'));
    });
  }, 1000);
});

function changeColor(element) {
  element.addClass('change-color');
  setTimeout(function() {
    element.removeClass('change-color');
  }, 3000);
}
</script>

</body>

</html>