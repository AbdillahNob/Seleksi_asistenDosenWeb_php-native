<?php 
require 'function/function.php';
require 'template/header.php';

// agar dari halaman InputNilai bs lngsng ke Halaman Ini
if(isset($_SESSION['id_matkul'])){
    $id_matkul = $_SESSION['id_matkul'];

}else{
    $id_matkul = $_GET['id_matkul'];
}

$query_penilaian = view("SELECT tb_penilaian.id_penilaian, tb_mahasiswa.namaLengkap, tb_mahasiswa.nim, tb_mahasiswa.ipk,    
                        tb_penilaian.nilaiMatkul, tb_penilaian.hasil, tb_penilaian.nilaiUjian, tb_penilaian.nilaiWawancara, tb_penilaian.nilaiTotalTes
                        FROM tb_penilaian
                        JOIN tb_mahasiswa ON tb_penilaian.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_penilaian.id_matkul ='$id_matkul' ORDER BY nilaiTotalTes DESC
                        ");
$query_matkul = view("SELECT * FROM tb_matkul WHERE id_matkul='$id_matkul'");                        
$rowM = mysqli_fetch_assoc($query_matkul);



if(isset($_POST['submit'])){
    // agr stlh update Hasil, id_matkul sebelumnya di halaman ini ttp di ada
    $_SESSION['id_matkul'] = $_POST['id_matkul'];
    
    if(updateHasil($_POST) > 0){
        echo"
        <script type='text/javascript'>

            window.setTimeout(function(){
                window.location.replace('penilaianDetail.php');
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
                                        <th>IPK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Nilai Ujian</th>
                                        <th>Nilai Wawancara</th>
                                        <th>Total Nilai Tes</th>
                                        <th>Hasil</th>

                                    </tr>
                                </thead>
                                <?php $n =1;
                                    while($row=mysqli_fetch_assoc($query_penilaian)):
                                ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>

                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['namaLengkap'] ?></td>
                                        <td><?= $row['ipk'] ?></td>
                                        <td><?= $row['nilaiMatkul'] ?></td>
                                        <td><?= $row['nilaiUjian'] ?></td>
                                        <td><?= $row['nilaiWawancara'] ?></td>
                                        <td><?= $row['nilaiTotalTes'] ?></td>
                                        <td>
                                            <button
                                                class="btn mb-1 btn-rounded <?= $row['hasil']=='belum_ada'?'btn-danger':'btn-success' ?>">
                                                <?= htmlspecialchars($row['hasil']=='belum_ada'?'belum_ada':'lulus') ?></button>
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