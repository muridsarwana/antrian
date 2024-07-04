<?php
$tmpdir = sys_get_temp_dir();   # ambil direktori temporary untuk simpan file.
$file =  tempnam($tmpdir, 'ctk');  # nama file temporary yang akan dicetak
$handle = fopen($file, 'w');
$condensed = Chr(27) . Chr(33) . Chr(4);
$bold1 = Chr(27) . Chr(69);
$bold0 = Chr(27) . Chr(70);
$initialized = chr(27).chr(64);
$condensed1 = chr(15);
$condensed0 = chr(18);
$Data  = $initialized;
$Data .= $condensed1;
$Data .= "==========================\n";
$Data .= "|     ".$bold1."AKU LAPAR".$bold0."      |\n";
$Data .= "==========================\n";
$Data .= "aku lapar buk, aku lapar\n";
$Data .= "Pengen makan yang enak buk\n";
$Data .= "contohnya mungkin, mie instan\n";
$Data .= "somay di deket kantor juga enak\n";
$Data .= "jangan gorengan mulu bukkkk\n";
$Data .= "tapi kalau ada enggak nolak\n";
$Data .= "--------------------------\n";
fwrite($handle, $Data);
fclose($handle);
copy($file, "//localhost/POS58 Printer");  # Lakukan cetak
unlink($file);
?>