<?php
// Include database configuration
include '../config/database.php';

// Function to get department name based on kode_bidang
function getDepartmentName($kode_bidang) {
    $departments = [
        1 => 'Sekretariat',
        2 => 'Pembinaan SMA', 
        3 => 'Pembinaan SMK',
        4 => 'Pembinaan DIKSUS',
        5 => 'Pembinaan Kebudayaan',
        6 => 'Ketenagaan'
    ];
    return isset($departments[$kode_bidang]) ? $departments[$kode_bidang] : 'Unknown';
}

// Handle form submission for date range
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-01'); // Default to first day of current month
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-d'); // Default to today

// Handle export request
if (isset($_POST['export']) && $_POST['export'] == 'csv') {
    $filename = "queue_report_" . str_replace('-', '', $start_date) . "_to_" . str_replace('-', '', $end_date) . ".csv";
    
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    $output = fopen('php://output', 'w');
    
    // CSV Header
    fputcsv($output, ['Year', 'Month', 'Day', 'Date', 'Total Queue', 'Sekretariat', 'Pembinaan SMA', 'Pembinaan SMK', 'Pembinaan DIKSUS', 'Pembinaan Kebudayaan', 'Ketenagaan']);
    
    // Get report data for CSV
    $query = "SELECT 
                tanggal,
                YEAR(tanggal) as year,
                MONTH(tanggal) as month,
                DAY(tanggal) as day,
                COUNT(*) as total_queue,
                SUM(CASE WHEN kode_bidang = 1 THEN 1 ELSE 0 END) as dept_1,
                SUM(CASE WHEN kode_bidang = 2 THEN 1 ELSE 0 END) as dept_2,
                SUM(CASE WHEN kode_bidang = 3 THEN 1 ELSE 0 END) as dept_3,
                SUM(CASE WHEN kode_bidang = 4 THEN 1 ELSE 0 END) as dept_4,
                SUM(CASE WHEN kode_bidang = 5 THEN 1 ELSE 0 END) as dept_5,
                SUM(CASE WHEN kode_bidang = 6 THEN 1 ELSE 0 END) as dept_6
              FROM tbl_antrian 
              WHERE tanggal BETWEEN '$start_date' AND '$end_date'
              GROUP BY tanggal
              ORDER BY tanggal DESC";
              
    $result = mysqli_query($mysqli, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, [
            $row['year'],
            $row['month'], 
            $row['day'],
            $row['tanggal'],
            $row['total_queue'],
            $row['dept_1'],
            $row['dept_2'], 
            $row['dept_3'],
            $row['dept_4'],
            $row['dept_5'],
            $row['dept_6']
        ]);
    }
    
    fclose($output);
    exit();
}

// Get report data for display
$query = "SELECT 
            tanggal,
            YEAR(tanggal) as year,
            MONTH(tanggal) as month,
            DAY(tanggal) as day,
            COUNT(*) as total_queue,
            SUM(CASE WHEN kode_bidang = 1 THEN 1 ELSE 0 END) as dept_1,
            SUM(CASE WHEN kode_bidang = 2 THEN 1 ELSE 0 END) as dept_2,
            SUM(CASE WHEN kode_bidang = 3 THEN 1 ELSE 0 END) as dept_3,
            SUM(CASE WHEN kode_bidang = 4 THEN 1 ELSE 0 END) as dept_4,
            SUM(CASE WHEN kode_bidang = 5 THEN 1 ELSE 0 END) as dept_5,
            SUM(CASE WHEN kode_bidang = 6 THEN 1 ELSE 0 END) as dept_6
          FROM tbl_antrian 
          WHERE tanggal BETWEEN '$start_date' AND '$end_date'
          GROUP BY tanggal
          ORDER BY tanggal DESC";

$result = mysqli_query($mysqli, $query);

// Get summary statistics
$summary_query = "SELECT 
                    COUNT(DISTINCT tanggal) as total_days,
                    COUNT(*) as total_queues,
                    AVG(daily_count) as avg_daily_queue
                  FROM (
                    SELECT tanggal, COUNT(*) as daily_count 
                    FROM tbl_antrian 
                    WHERE tanggal BETWEEN '$start_date' AND '$end_date'
                    GROUP BY tanggal
                  ) as daily_stats";

$summary_result = mysqli_query($mysqli, $summary_query);
$summary = mysqli_fetch_assoc($summary_result);
?>

<!doctype html>
<html lang="en" class="h-100">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>Daily Queue Report - Aplikasi Antrian</title>

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Custom Style -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <div class="container pt-4">
            <!-- Page Header -->
            <div class="d-flex flex-column flex-md-row px-4 py-3 mb-4 bg-white rounded-2 shadow-sm">
                <div class="d-flex align-items-center me-md-auto">
                    <i class="bi-graph-up text-success me-3 fs-3"></i>
                    <h1 class="h5 pt-2">Daily Queue Report</h1>
                </div>
                <div class="ms-5 ms-md-0 pt-md-3 pb-md-0">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Report Data</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Filter Form -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <form method="POST" class="row g-3">
                        <div class="col-md-4">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo $start_date; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo $end_date; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">&nbsp;</label>
                            <div class="d-grid gap-2 d-md-flex">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi-search me-1"></i> Filter
                                </button>
                                <button type="submit" name="export" value="csv" class="btn btn-success">
                                    <i class="bi-download me-1"></i> Export CSV
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Summary Statistics -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi-calendar-date text-primary fs-1"></i>
                            <h3 class="mt-2"><?php echo $summary['total_days'] ?? 0; ?></h3>
                            <p class="text-muted">Total Days</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi-people text-warning fs-1"></i>
                            <h3 class="mt-2"><?php echo $summary['total_queues'] ?? 0; ?></h3>
                            <p class="text-muted">Total Queues</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <i class="bi-graph-up text-success fs-1"></i>
                            <h3 class="mt-2"><?php echo number_format($summary['avg_daily_queue'] ?? 0, 1); ?></h3>
                            <p class="text-muted">Average Daily Queue</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Report Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">
                        <i class="bi-table me-2"></i>Daily Queue Report 
                        <small class="text-muted">(<?php echo date('d M Y', strtotime($start_date)); ?> - <?php echo date('d M Y', strtotime($end_date)); ?>)</small>
                    </h5>
                    
                    <?php if (mysqli_num_rows($result) > 0): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Day</th>
                                    <th>Date</th>
                                    <th class="text-center">Total Queue</th>
                                    <th class="text-center">Sekretariat</th>
                                    <th class="text-center">Pembinaan SMA</th>
                                    <th class="text-center">Pembinaan SMK</th>
                                    <th class="text-center">Pembinaan DIKSUS</th>
                                    <th class="text-center">Pembinaan Kebudayaan</th>
                                    <th class="text-center">Ketenagaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $grand_total = 0;
                                $dept_totals = [0, 0, 0, 0, 0, 0];
                                
                                while ($row = mysqli_fetch_assoc($result)): 
                                    $grand_total += $row['total_queue'];
                                    $dept_totals[0] += $row['dept_1'];
                                    $dept_totals[1] += $row['dept_2'];
                                    $dept_totals[2] += $row['dept_3'];
                                    $dept_totals[3] += $row['dept_4'];
                                    $dept_totals[4] += $row['dept_5'];
                                    $dept_totals[5] += $row['dept_6'];
                                ?>
                                <tr>
                                    <td><?php echo $row['year']; ?></td>
                                    <td><?php echo str_pad($row['month'], 2, '0', STR_PAD_LEFT); ?></td>
                                    <td><?php echo $row['day']; ?></td>
                                    <td><?php echo date('d M Y', strtotime($row['tanggal'])); ?></td>
                                    <td class="text-center">
                                        <span class="badge bg-primary"><?php echo $row['total_queue']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_1']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_2']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_3']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_4']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_5']; ?></span>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-secondary"><?php echo $row['dept_6']; ?></span>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                            <tfoot class="table-secondary">
                                <tr class="fw-bold">
                                    <td colspan="4" class="text-end">TOTAL:</td>
                                    <td class="text-center">
                                        <span class="badge bg-success fs-6"><?php echo $grand_total; ?></span>
                                    </td>
                                    <?php for($i = 0; $i < 6; $i++): ?>
                                    <td class="text-center">
                                        <span class="badge bg-info fs-6"><?php echo $dept_totals[$i]; ?></span>
                                    </td>
                                    <?php endfor; ?>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-info text-center">
                        <i class="bi-info-circle me-2"></i>
                        No queue data found for the selected date range.
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <!-- jQuery Core -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Auto-adjust end date when start date changes
        document.getElementById('start_date').addEventListener('change', function() {
            const startDate = new Date(this.value);
            const endDateInput = document.getElementById('end_date');
            const endDate = new Date(endDateInput.value);
            
            if (endDate < startDate) {
                endDateInput.value = this.value;
            }
        });
    </script>
</body>

</html>

<?php
// Close database connection
mysqli_close($mysqli);
?>