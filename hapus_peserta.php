<?php 
require 'template/sweetAlert.php';
require 'function/function.php';

$id_mahasiswa = $_GET['id_mahasiswa'];
$no_file = $_GET['no_file'];


    if(delete($id_mahasiswa, $no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Hapus Peserta',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('dataPeserta.php');
            },2000);
        </script>
        ";  
    }else{
        echo"
            <script type='text/javascript'>
                setTimeout(function () {
                    Swal.fire({
                        title: 'INFO',
                        text: 'Gagal Hapus Peserta',
                        icon: 'warning',
                        timer: '3200',
                        showConfirmButton: false
                    });
                },10);
                window.setTimeout(function(){
                    window.location.replace('dataPeserta.php');
                },1500);
            </script>
            ";
    }


?>