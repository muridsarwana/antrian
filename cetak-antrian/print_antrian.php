<?php
date_default_timezone_set('Asia/Jakarta');
$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) . Chr(4);
$initialized = chr(27) . chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$centerAlign = Chr(27) . Chr(97) . Chr(1);
$doubleHeight = Chr(27) . Chr(4);
$normalHeight = Chr(27) . Chr(5);

$x_value = $_GET['x'];
$y_value = $_GET['y'];
$date = date("D, d-m-Y"); // Get current date in format Day(week), DD-MM-YYYY
$time = date("H:i"); // Get current time in format HH:MM

$Data  = $initialized;
$Data .= $condensed1;
$Data .= $centerAlign; // Set alignment to center
$Data .= $bold1; // Set bold on
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "* NOMOR-ANTRIAN *\n";
$Data .= "==========================\n";
$Data .= $x_value . "\n";
$Data .= "\n";
$Data .= $doubleHeight. $y_value + 1 . "\n". $normalHeight;
$Data .= "\n";
$Data .= "==========================\n";
$Data .= $bold0; // Set bold off
$Data .= $date . "\n"; // Set @z with current date
$Data .= $time . "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "\n";
$Data .= "--------------------------\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/POS58 Printer");  # Lakukan cetak
unlink($file);
?>