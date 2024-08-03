<?php 
require 'function/function.php';

$id_mahasiswa = $_GET['id_mahasiswa'];
$result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'");
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