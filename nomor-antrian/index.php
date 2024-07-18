<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Antrian Berbasis Web">
  <meta name="author" content="Indra Styawantoro">

  <!-- Title -->
  <title>Aplikasi Antrian Berbasis Web</title>

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
          <div class="px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
            <!-- judul halaman -->
            <div class="d-flex align-items-center me-md-auto">
              <i class="bi-people-fill text-success me-3 fs-3"></i>
              <h1 class="h5 pt-2">Nomor Antrian</h1>
            </div>
          </div>

          <!-- Queue Section -->
          <div class="row mb-4">
            <div class="col-lg-4">
              <!-- 1. Sekretariat -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> SEKRETARIAT</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_1sek" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_1sek" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
             <!-- 2. Bidang Pembinaan SMA -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> P.SMA</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_2sma" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_2sma" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 3. Bidang Pembinaan SMK -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> P.SMK</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_3smk" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_3smk" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Second Row -->
          <div class="row mb-4">
            <div class="col-lg-4">
              <!-- 4. Bidang Pembinaan DIKSUS -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> P.DIKSUS</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_4slb" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_4slb" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 5. Bidang Pembinaan Kebudayaan -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> KEBUDAYAAN</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_5bud" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_5bud" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <!-- 6. KETENAGAAN -->
              <div class="card border-0 shadow-sm mb-4">
                <div class="card-body text-center d-grid p-3">
                  <div class="mb-3 fw-bold fs-3"><span class="text-success">ANTRIAN</span> KETENAGAAN</div>
                  <div class="border border-success rounded-2 py-2 mb-4">
                    <!-- menampilkan informasi jumlah antrian -->
                    <h1 id="antrian_6ket" class="display-1 fw-bold text-success text-center lh-1 pb-2"></h1>
                  </div>
                  <!-- button pengambilan nomor antrian -->
                  <a id="insert_6ket" href="javascript:void(0)" class="btn btn-success btn-block rounded-pill fs-5 px-5 py-4 mb-2">
                    <i class="bi-person-plus fs-4 me-2"></i> Ambil Nomor
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="footer mt-auto py-4">
    <div class="container">
      <!-- copyright -->
      <div class="copyright text-center mb-2 mb-md-0">
        &copy; 2021 - <a href="https://www.indrasatya.com/" target="_blank" class="text-danger text-decoration-none">www.indrasatya.com</a>. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- Handler Section 1. Sekretariat -->
  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_1sek').load('get_antrian_1sek.php');

      // proses insert data
      $('#insert_1sek').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sekretariat
          url: 'insert_1sek.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_1sek').load('get_antrian_1sek.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>

  <!-- Handler Section 2. P.SMA -->
  <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_2sma').load('get_antrian_2sma.php');

      // proses insert data
      $('#insert_2sma').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sma
          url: 'insert_2sma.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_2sma').load('get_antrian_2sma.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>

    <!-- Handler Section 3. P.SMK -->
    <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_3smk').load('get_antrian_3smk.php');

      // proses insert data
      $('#insert_3smk').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sma
          url: 'insert_3smk.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_3smk').load('get_antrian_3smk.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>
  
    <!-- Handler Section 4. P.SLB -->
    <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_4slb').load('get_antrian_4slb.php');

      // proses insert data
      $('#insert_4slb').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sma
          url: 'insert_4slb.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_4slb').load('get_antrian_4slb.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>

    <!-- Handler Section 5. Kebudayaan -->
    <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_5bud').load('get_antrian_5bud.php');

      // proses insert data
      $('#insert_5bud').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sma
          url: 'insert_5bud.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_5bud').load('get_antrian_5bud.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>

      <!-- Handler Section 6. Ketenagaan -->
      <script type="text/javascript">
    $(document).ready(function() {
      // tampilkan jumlah antrian
      $('#antrian_6ket').load('get_antrian_6ket.php');

      // proses insert data
      $('#insert_6ket').on('click', function() {
        $.ajax({
          type: 'POST',                     // mengirim data dengan method POST data sma
          url: 'insert_6ket.php',                // url file proses insert data
          success: function(result) {       // ketika proses insert data selesai
            // jika berhasil
            if (result === 'Sukses') {
              // tampilkan jumlah antrian
              $('#antrian_6ket').load('get_antrian_6ket.php').fadeIn('slow');
            }
          },
        });
      });
    });
  </script>
</body>

</html>