<?php 
require 'function/function.php';

$id_surat = $_GET['id_surat'];
$result = mysqli_query($conn, "SELECT * FROM tb_suratrekomendasi WHERE id_surat = '$id_surat'");
$data = mysqli_fetch_assoc($result);

// header yang menunjukkan nama file yang akan didownload
header("Content-Disposition: attachment; filename=".$data['suratRekomendasi']);

 // proses membaca isi file yang akan didownload dari folder 'data'
 $fp  = fopen("images/suratRekomendasi/".$data['suratRekomendasi'], 'r');
 $content = fread($fp, filesize('images/suratRekomendasi/'.$data['suratRekomendasi']));
 fclose($fp);

 // menampilkan isi file yang akan didownload
 echo $content;

 exit;
?>