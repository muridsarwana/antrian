<!doctype html>
<html lang="en" class="h-100">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Title -->
  <title>Live Monitor Antrian - All Departments</title>

  <!-- Favicon icon -->
  <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Raleway', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      padding: 0;
      margin: 0;
      overflow: hidden;
    }

    .header-section {
      background: white;
      padding: 15px 20px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .header-section h1 {
      margin: 0;
      font-weight: 700;
      color: #2c3e50;
      font-size: 1.8rem;
    }

    .live-badge {
      display: inline-block;
      background: #e74c3c;
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      font-size: 0.85rem;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.6; }
    }

    .container-section {
      padding: 20px;
      max-width: 100%;
    }

    .category-title {
      background: white;
      color: #2c3e50;
      padding: 8px 20px;
      margin-bottom: 15px;
      font-weight: 700;
      font-size: 1.3rem;
      display: inline-block;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .sekretariat-container,
    .bidang-container {
      margin-bottom: 20px;
    }

    .boxes-row {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .queue-box {
      background: white;
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      min-width: 180px;
      flex: 1;
      max-width: 220px;
    }

    .sekretariat-container .queue-box {
      border-left: 5px solid #3498db;
    }

    .bidang-container .queue-box {
      border-left: 5px solid #27ae60;
    }

    .box-name {
      font-weight: 700;
      font-size: 1rem;
      color: #2c3e50;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .queue-number {
      font-size: 3rem;
      font-weight: 900;
      line-height: 1;
      color: #667eea;
    }

    /* Compact layout for 1920x1080 or smaller */
    @media (max-width: 1920px) {
      .container-section {
        padding: 15px;
      }
      .queue-box {
        min-width: 160px;
        max-width: 200px;
        padding: 12px;
      }
      .queue-number {
        font-size: 2.5rem;
      }
    }
  </style>
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <div class="container-fluid py-4">
      
      <!-- Header -->
      <div class="header-section">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
          <div class="d-flex align-items-center">
            <i class="bi-tv text-primary me-3 fs-1"></i>
            <div>
              <h1 class="mb-0">Live Monitor Antrian</h1>
              <small class="text-muted">Real-time Queue Display - All Departments</small>
            </div>
          </div>
          <span class="live-badge">
            <i class="bi-broadcast"></i> LIVE
          </span>
        </div>
      </div>

      <!-- Statistics Bar -->
      <div class="stats-bar">
        <div class="stat-item">
          <div class="stat-value" id="totalQueues">-</div>
          <div class="stat-label">Total Antrian Hari Ini</div>
        </div>
        <div class="stat-item">
          <div class="stat-value" id="totalServed">-</div>
          <div class="stat-label">Sudah Dilayani</div>
        </div>
        <div class="stat-item">
          <div class="stat-value" id="currentWaiting">-</div>
          <div class="stat-label">Sedang Menunggu</div>
        </div>
      </div>

      <!-- SEKRETARIAT Section -->
      <div class="category-header">
        <i class="bi-building"></i>
        <span>SEKRETARIAT</span>
      </div>

      <div class="row g-4 mb-4">
        <!-- UMUM -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card sekretariat">
            <div class="dept-name">
              <i class="bi-file-text text-primary"></i> Umum
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_umum">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- ASET -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card sekretariat">
            <div class="dept-name">
              <i class="bi-box-seam text-primary"></i> Aset
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_aset">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- KEPEGAWAIAN -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card sekretariat">
            <div class="dept-name">
              <i class="bi-person-badge text-primary"></i> Kepegawaian
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_kepegawaian">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- PROGRAM -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card sekretariat">
            <div class="dept-name">
              <i class="bi-kanban text-primary"></i> Program
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_program">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- KEUANGAN -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card sekretariat">
            <div class="dept-name">
              <i class="bi-cash-stack text-primary"></i> Keuangan
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_keuangan">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>
      </div>

      <div class="section-divider"></div>

      <!-- BIDANG Section -->
      <div class="category-header">
        <i class="bi-people-fill"></i>
        <span>BIDANG</span>
      </div>

      <div class="row g-4 mb-4">
        <!-- SMA -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card bidang">
            <div class="dept-name">
              <i class="bi-book text-success"></i> Pembinaan SMA
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_sma">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- SMK -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card bidang">
            <div class="dept-name">
              <i class="bi-tools text-success"></i> Pembinaan SMK
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_smk">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- DIKSUS -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card bidang">
            <div class="dept-name">
              <i class="bi-heart text-success"></i> Pembinaan DIKSUS
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_diksus">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- KETENAGAAN -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card bidang">
            <div class="dept-name">
              <i class="bi-person-check text-success"></i> Ketenagaan
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_ketenagaan">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>

        <!-- KEBUDAYAAN -->
        <div class="col-lg-4 col-md-6">
          <div class="queue-card bidang">
            <div class="dept-name">
              <i class="bi-palette text-success"></i> Pembinaan Kebudayaan
            </div>
            <div class="queue-label">Nomor Antrian</div>
            <div class="queue-number" id="queue_kebudayaan">-</div>
            <div class="queue-label">
              <i class="bi-clock"></i> Update Realtime
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- jQuery Core -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
  <script type="text/javascript">
  $(document).ready(function() {
    // Store active AJAX requests to abort old ones
    let activeRequests = [];

    // Clear console every 5 minutes to prevent memory buildup
    setInterval(function() {
      if (console.clear) console.clear();
    }, 300000);

    // Function to load queue data
    function loadQueueData() {
      // Abort pending requests to prevent memory leak
      activeRequests.forEach(function(xhr) {
        if (xhr && xhr.abort) xhr.abort();
      });
      activeRequests = [];

      // Load all queue data (to be connected to backend)
      // SEKRETARIAT
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=umum',
        cache: false,
        success: function(data) { $('#queue_umum').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=aset',
        cache: false,
        success: function(data) { $('#queue_aset').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=kepegawaian',
        cache: false,
        success: function(data) { $('#queue_kepegawaian').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=program',
        cache: false,
        success: function(data) { $('#queue_program').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=keuangan',
        cache: false,
        success: function(data) { $('#queue_keuangan').html(data || '-'); }
      }));

      // BIDANG
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=sma',
        cache: false,
        success: function(data) { $('#queue_sma').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=smk',
        cache: false,
        success: function(data) { $('#queue_smk').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=diksus',
        cache: false,
        success: function(data) { $('#queue_diksus').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=ketenagaan',
        cache: false,
        success: function(data) { $('#queue_ketenagaan').html(data || '-'); }
      }));
      activeRequests.push($.ajax({
        url: 'get_queue.php?dept=kebudayaan',
        cache: false,
        success: function(data) { $('#queue_kebudayaan').html(data || '-'); }
      }));

      // Load statistics
      activeRequests.push($.ajax({
        url: 'get_stats.php',
        cache: false,
        dataType: 'json',
        success: function(data) {
          $('#totalQueues').html(data.total || '-');
          $('#totalServed').html(data.served || '-');
          $('#currentWaiting').html(data.waiting || '-');
        }
      }));
    }

    // Initial load
    loadQueueData();

    // Reload every 2 seconds
    setInterval(loadQueueData, 2000);
  });
</script>

</body>

</html>
