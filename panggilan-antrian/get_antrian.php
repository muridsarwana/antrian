<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
  // panggil file "database.php" untuk koneksi ke database
  require_once "../config/database.php";

  // ambil tanggal sekarang
  $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

  // sql statement untuk menampilkan data dari tabel "tbl_antrian" berdasarkan "tanggal"
  $query = mysqli_query($mysqli, "SELECT 
                                    id, 
                                    no_antrian AS original_no_antrian, 
                                    CONCAT(no_antrian, ' - ', kode_bidang) AS dftr_antrian, 
                                    kode_bidang, 
                                    status 
                                  FROM 
                                    tbl_antrian 
                                  WHERE 
                                    tanggal='$tanggal' 
                                  ORDER BY 
                                    CAST(no_antrian AS UNSIGNED) DESC")
                                    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
  // ambil jumlah baris data hasil query
  $rows = mysqli_num_rows($query);

  // cek hasil query
  // jika data ada
  if ($rows <> 0) {
    $response         = array();
    $response["data"] = array();

    // create mapping array for kode_bidang values
    $kode_bidang_map = array(
      1 => 'sekretariat',
      2 => 'pembinaan s m a',
      3 => 'pembinaan s m k',
      4 => 'pembinaan diksus',
      5 => 'Pembinaan kebudayaan',
      6 => 'ketenagaan'
    );

    // ambil data hasil query
    while ($row = mysqli_fetch_assoc($query)) {
      $data['id']           = $row["id"];
      $data['original_no_antrian'] = $row["original_no_antrian"];
      $data['dftr_antrian']   = $row["dftr_antrian"];
      $data['status']       = $row["status"];
      $data['kode_bidang']  = $row["kode_bidang"];

      // replace kode_bidang value with corresponding label
      $no_antrian_parts = explode(' - ', $data['dftr_antrian']);
      $kode_bidang = $no_antrian_parts[1];
      $data['dftr_antrian'] = $no_antrian_parts[0] . ' - ' . $kode_bidang_map[$kode_bidang];

      array_push($response["data"], $data);
    }

    // tampilkan data
    echo json_encode($response);
  }
  // jika data tidak ada
  else {
    $response         = array();
    $response["data"] = array();

    // buat data kosong untuk ditampilkan
    $data['id']         = "";
    $data['original_no_antrian'] = "";
    $data['dftr_antrian'] = "-";
    $data['status']     = "";
    $data['kode_bidang'] = "";

    array_push($response["data"], $data);

    // tampilkan data
    echo json_encode($response);
  }
}