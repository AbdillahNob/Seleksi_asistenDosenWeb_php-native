<?php 
require 'template/sweetAlert.php';
require 'function/function.php';

$id_matkul = $_GET['id_matkul'];
$no_file = $_GET['no_file'];

if(delete($id_matkul, $no_file) > 0){
    echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Hapus Mata Kuliah',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('mataKuliah.php');
            },2000);
        </script>
        ";  
}else{
    echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Gagal Hapus Mata Kuliah',
                    icon: 'warning',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('mataKuliah.php');
            },1500);
        </script>
        ";
}

?>