<?php
date_default_timezone_set('Asia/Jakarta'); // Set timezone to Indonesia
require('fpdf.php'); // path to fpdf.php
require('../config/database.php'); // shared database config

// --- CONFIG ---
// Get year from GET/POST parameter, default to current year
$year = isset($_GET['year']) ? intval($_GET['year']) : (isset($_POST['year']) ? intval($_POST['year']) : date('Y'));
// Validate year (between 2020 and current year + 1)
if ($year < 2020 || $year > date('Y') + 1) {
    $year = date('Y');
}
$logoPath = __DIR__ . '/logo.png'; // change to your logo file
$uniqueStamp = '10 1 10 1 4'; // top-right unique number
// --- END CONFIG ---

// department mapping
$departments = [
    1 => 'Sekretariat',
    2 => 'Pembinaan SMA',
    3 => 'Pembinaan SMK',
    4 => 'Pembinaan DIKSUS',
    5 => 'Pembinaan Kebudayaan',
    6 => 'Ketenagaan',
];

$monthNames = [
    1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',5=>'Mei',6=>'Juni',
    7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
];

// Convert MySQLi connection to PDO for prepared statements
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die("DB connection failed: " . $e->getMessage());
}

// --- fetch summary counts per month x department for the year ---
$sql = "SELECT MONTH(tanggal) as m, kode_bidang, COUNT(*) as cnt
        FROM tbl_antrian
        WHERE YEAR(tanggal) = :year
        GROUP BY MONTH(tanggal), kode_bidang";
$stmt = $pdo->prepare($sql);
$stmt->execute([':year' => $year]);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// build a matrix months x departments
$summary = [];
for ($m=1;$m<=12;$m++) {
    $summary[$m] = [];
    foreach ($departments as $k=>$v) $summary[$m][$k] = 0;
}

foreach ($rows as $r) {
    $m = intval($r['m']);
    $k = intval($r['kode_bidang']);
    $cnt = intval($r['cnt']);
    if (!isset($summary[$m])) $summary[$m] = [];
    $summary[$m][$k] = $cnt;
}

// pre-calc totals per department (yearly)
$totalsPerDept = [];
foreach ($departments as $k=>$v) $totalsPerDept[$k] = 0;
for ($m=1;$m<=12;$m++) {
    foreach ($departments as $k=>$v) {
        $totalsPerDept[$k] += $summary[$m][$k];
    }
}

// --- class extending FPDF for header/footer control ---
class PDF_Report extends FPDF {
    public $logoPath;
    public $year;
    public $uniqueStamp;
    public function Header() {
        // header is built per page in main code because page 1 has different layout vs month pages
        // leave empty to avoid default
    }
    public function Footer() {
        // position at 1.0 cm from bottom
        $this->SetY(-12);
        $this->SetFont('Arial','BI',7); // bold italic if available
        $printedAt = date('d-m-Y H:i');
        $text = "dicetak melalui aplikasi antrian Disdikbud pada tanggal $printedAt";
        $this->Cell(0,6, $text, 0, 0, 'L');
    }
}

// create PDF
$pdf = new PDF_Report('L','mm','A4'); // landscape for wider table
$pdf->logoPath = $logoPath;
$pdf->year = $year;
$pdf->uniqueStamp = $uniqueStamp;
$pdf->SetAutoPageBreak(true, 15);

// ---------------- Page 1: Summary Yearly ----------------
$pdf->AddPage();

// Header block with logo and titles (stacked vertically without overlap)
$leftMargin = 10;
$pdf->SetMargins($leftMargin, 10, 10);

// Object 1: Logo (centered)
$logoY = 10;
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, (297 - 22) / 2, $logoY, 22); // centered logo
}

// Object 2: Text 1 "REPORTING ANTRIAN TAHUN" (centered, 2mm below logo)
$text1Y = $logoY + 22 + 2; // logo height 22 + 2mm spacing
$pdf->SetFont('Arial','B',14);
$title = "REPORTING ANTRIAN TAHUN $year";
$titleWidth = $pdf->GetStringWidth($title);
$centerX = (297 - $titleWidth) / 2;
$pdf->SetXY($centerX, $text1Y);
$pdf->Cell(0,6, $title, 0, 1);

// Object 3: Text 2 "DINAS PENDIDIKAN DAN KEBUDAYAAN" (centered, 2mm below text 1)
$text2Y = $text1Y + 6 + 2; // text height 6 + 2mm spacing
$pdf->SetFont('Arial','',12);
$dept = "DINAS PENDIDIKAN DAN KEBUDAYAAN";
$deptWidth = $pdf->GetStringWidth($dept);
$centerX2 = (297 - $deptWidth) / 2;
$pdf->SetXY($centerX2, $text2Y);
$pdf->Cell(0,6, $dept, 0, 1);

// Object 4: Text 3 "PROVINSI JAWA TENGAH" (centered, 2mm below text 2)
$text3Y = $text2Y + 6 + 2; // text height 6 + 2mm spacing
$prov = "PROVINSI JAWA TENGAH";
$provWidth = $pdf->GetStringWidth($prov);
$centerX3 = (297 - $provWidth) / 2;
$pdf->SetXY($centerX3, $text3Y);
$pdf->Cell(0,6, $prov, 0, 1);

// unique stamp at top-right
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(-60, 10);
$pdf->Cell(50,6, $uniqueStamp, 0, 1,'R');

// Object 5: Table (below text 3)
$tableY = $text3Y + 10;
$pdf->SetXY($leftMargin, $tableY);
$pdf->SetFont('Arial','B',8);

// Abbreviated month names
$abbrMonths = ['JAN','FEB','MAR','APR','MEI','JUN','JUL','AGT','SEP','OKT','NOV','DES'];

// Column widths: Dept 40mm, Months 15mm each (12), Total 25mm
$deptColW = 40;
$monthColW = 15;
$totalColW = 25;

$pdf->SetFillColor(230,230,230);
// Header row
$pdf->Cell($deptColW,10,'Department',1,0,'C',true);
foreach ($abbrMonths as $m) {
    $pdf->Cell($monthColW,10, $m,1,0,'C',true);
}
$pdf->Cell($totalColW,10,'Total',1,1,'C',true);

// Data rows for each department
$pdf->SetFont('Arial','',8);
foreach ($departments as $k=>$v) {
    $pdf->Cell($deptColW,10, $v,1,0,'L');
    $rowTotal = 0;
    for ($m=1; $m<=12; $m++) {
        $val = $summary[$m][$k] ?? 0;
        $rowTotal += $val;
        $pdf->Cell($monthColW,10, $val,1,0,'C');
    }
    $pdf->Cell($totalColW,10, $rowTotal,1,1,'C');
}

// Final totals row
$pdf->SetFont('Arial','B',8);
$pdf->Cell($deptColW,10,'Total',1,0,'R',true);
$grandTotal = 0;
for ($m=1; $m<=12; $m++) {
    $monthTotal = 0;
    foreach ($departments as $k=>$v) {
        $monthTotal += $summary[$m][$k] ?? 0;
    }
    $grandTotal += $monthTotal;
    $pdf->Cell($monthColW,10, $monthTotal,1,0,'C',true);
}
$pdf->Cell($totalColW,10, $grandTotal,1,1,'C',true);

// ---------------- Pages 2.. : Month details ----------------
for ($m=1;$m<=12;$m++) {
    // fetch daily breakdown for month $m
    $sql2 = "SELECT DATE(tanggal) as dt, kode_bidang, COUNT(*) as cnt
             FROM tbl_antrian
             WHERE YEAR(tanggal)=:year AND MONTH(tanggal)=:month
             GROUP BY DATE(tanggal), kode_bidang
             ORDER BY DATE(tanggal)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([':year'=>$year, ':month'=>$m]);
    $rows2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    // build days set and matrix
    $days = [];
    $matrix = []; // matrix[date][kode] = cnt
    foreach ($rows2 as $r) {
        $d = $r['dt'];
        $k = intval($r['kode_bidang']);
        $cnt = intval($r['cnt']);
        if (!isset($matrix[$d])) {
            $matrix[$d] = [];
            foreach ($departments as $kk=>$vv) $matrix[$d][$kk]=0;
        }
        $matrix[$d][$k] = $cnt;
    }

    // if no entries for that month, still make a page with header and "No data"
    $pdf->AddPage();
    // Month header left alignment
    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(0,6, strtoupper($monthNames[$m]), 0,1,'L');
    $pdf->Ln(4);

    // Table header: Date + departments + Total Antrian
    $pdf->SetFont('Arial','B',10);
    $dateColW = 30;
    $deptColW = 28;
    $totalColW = 28;
    $pdf->SetFillColor(230,230,230);
    $headerHeight = 12;
    $startY = $pdf->GetY();
    $pdf->Cell($dateColW, $headerHeight, 'Tanggal', 1, 0, 'C', true);
    $currentX = $pdf->GetX();
    foreach ($departments as $k => $v) {
        $pdf->SetXY($currentX, $startY);
        if (strpos($v, ' ') === false) {
            // Single word, use Cell for full height centering
            $pdf->Cell($deptColW, $headerHeight, $v, 1, 0, 'C', true);
        } else {
            // Multi-word, use MultiCell for wrapping
            $pdf->MultiCell($deptColW, 6, $v, 1, 'C', true);
        }
        $currentX += $deptColW;
    }
    $pdf->SetXY($currentX, $startY);
    $pdf->Cell($totalColW, $headerHeight, 'Total Antrian', 1, 1, 'C', true);

    $pdf->SetFont('Arial','',9);
    if (empty($matrix)) {
        $pdf->Cell($dateColW + count($departments)*$deptColW + $totalColW,8,'Tidak ada data pada bulan ini.',1,1,'C');
        continue;
    }

    // rows: per date
    $monthTotal = 0;
    // sort matrix keys by date
    ksort($matrix);
    foreach ($matrix as $d => $row) {
        // format date as dd-mm-yyyy
        $displayDate = date('d-m-Y', strtotime($d));
        $pdf->Cell($dateColW,7, $displayDate,1,0,'L');
        $rowTotal = 0;
        foreach ($departments as $k=>$v) {
            $val = $row[$k] ?? 0;
            $rowTotal += $val;
            $pdf->Cell($deptColW,7, $val,1,0,'C');
        }
        $pdf->Cell($totalColW,7, $rowTotal,1,1,'C');
        $monthTotal += $rowTotal;
    }

    // month totals footer
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell($dateColW,7,'Total',1,0,'R',true);
    foreach ($departments as $k=>$v) {
        // sum per department in this month
        $sumDept = 0;
        foreach ($matrix as $d=>$row) {
            $sumDept += ($row[$k] ?? 0);
        }
        $pdf->Cell($deptColW,7, $sumDept,1,0,'C',true);
    }
    $pdf->Cell($totalColW,7, $monthTotal,1,1,'C',true);
}

// output PDF to browser
$filename = "report_antrian_$year.pdf";
$pdf->Output('I', $filename);
exit;
?>
