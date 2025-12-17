<!DOCTYPE html>
<html lang="id" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Antrian Mandiri">
    <title>Antrian Mandiri</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/style2.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="antrian-container">
            <!-- Header -->
            <header class="antrian-header">
                <div class="company-logo">
                    <img src="../assets/img/logo.png" alt="Company Logo">
                </div>
                <h1 class="header-title">ANJUNGAN ANTRIAN MANDIRI</h1>
                <div class="current-time" id="currentTime">12:30:45</div>
            </header>

            <!-- Main Content -->
            <div class="antrian-main">
                <!-- Stacked Major Buttons -->
                <div class="major-buttons-stack">
                    <button class="major-btn sekretariat-btn" id="sekretariatBtn">
                        <i class="bi bi-building"></i>
                        SEKRETARIAT
                    </button>
                    <button class="major-btn bidang-btn" id="bidangBtn">
                        <i class="bi bi-people-fill"></i>
                        BIDANG
                    </button>
                </div>

                <!-- Dynamic Content Panels -->
                <div class="content-panel panel-sekretariat" id="panelSekretariat">
                    <div class="panel-header">
                        <h2>SEKRETARIAT</h2>
                        <button class="back-btn">Kembali</button>
                    </div>
                    <div class="sub-buttons-grid">
                        <button class="sub-btn" data-dept="umum">UMUM</button>
                        <button class="sub-btn" data-dept="aset">ASET</button>
                        <button class="sub-btn" data-dept="kepegawaian">KEPEGAWAIAN</button>
                        <button class="sub-btn" data-dept="program">PROGRAM</button>
                        <button class="sub-btn" data-dept="keuangan">KEUANGAN</button>
                    </div>
                </div>

                <div class="content-panel panel-bidang" id="panelBidang">
                    <div class="panel-header">
                        <h2>BIDANG</h2>
                        <button class="back-btn">Kembali</button>
                    </div>
                    <div class="sub-buttons-grid">
                        <button class="sub-btn" data-dept="sma">SMA</button>
                        <button class="sub-btn" data-dept="smk">SMK</button>
                        <button class="sub-btn" data-dept="diksus">DIKSUS</button>
                        <button class="sub-btn" data-dept="ketenagaan">KETENAGAAN</button>
                        <button class="sub-btn" data-dept="kebudayaan">KEBUDAYAAN</button>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="antrian-footer">
                <p>Pelayanan yang cepat dan memuaskan adalah prioritas kami</p>
            </footer>
        </div>
    </main>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="../assets/js/antrian.js"></script>
</body>
</html>