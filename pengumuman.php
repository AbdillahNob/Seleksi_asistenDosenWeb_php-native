<?php 
require 'function/function.php';
require 'template/header.php';

// agar dari halaman InputNilai bs lngsng ke Halaman Ini
if(isset($_SESSION['id_matkul'])){
    $id_matkul = $_SESSION['id_matkul'];

}else{
    $id_matkul = $_GET['id_matkul'];
}

$query_pendaftaranAsdos = view("SELECT tb_pendaftaranasdos.id_pendaftaran, tb_mahasiswa.namaLengkap, tb_mahasiswa.nim, tb_mahasiswa.ipk, tb_mahasiswa.noTelpon,   
                        tb_pendaftaranasdos.nilaiMatkul, tb_pendaftaranasdos.hasil
                        FROM tb_pendaftaranasdos
                        JOIN tb_mahasiswa ON tb_pendaftaranasdos.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_pendaftaranasdos.id_matkul ='$id_matkul'");
$query_matkul = view("SELECT * FROM tb_matkul WHERE id_matkul='$id_matkul'");                        
$rowM = mysqli_fetch_assoc($query_matkul);



if(isset($_POST['submit'])){
    // agr stlh update Hasil, id_matkul sebelumnya di halaman ini ttp di ada
    $_SESSION['id_matkul'] = $_POST['id_matkul'];
    
    if(updateHasil($_POST) > 0){
        echo"
        <script type='text/javascript'>

            window.setTimeout(function(){
                window.location.replace('daftarAsdosDetail.php');
            },10);
        </script>
        ";  
    }   
}                        

?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>PENGUMUMAN Peserta <?= $rowM['nama_matkul'] ?></h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>No.Telpon/Wa</th>
                                        <th>IPK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Hasil</th>

                                    </tr>
                                </thead>
                                <?php $n =1;
                                    while($row=mysqli_fetch_assoc($query_pendaftaranAsdos)):
                                ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>

                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['namaLengkap'] ?></td>
                                        <td><?= $row['noTelpon'] ?></td>
                                        <td><?= $row['ipk'] ?></td>
                                        <td><?= $row['nilaiMatkul'] ?></td>
                                        <td>
                                            <button
                                                class="btn mb-1 btn-rounded <?= $row['hasil']=='TIDAK LULUS'?'btn-danger':'btn-success' ?>">
                                                <?= htmlspecialchars($row['hasil']=='TIDAK LULUS'?'TIDAK LULUS':'LULUS') ?></button>
                                        </td>

                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div>
    </div>

</div>

<?php 
require 'template/footer.php'
?>