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


// $csrfToken = $_SESSION['csrf_token'];

// if(!$csrfToken){
//     $csrfToken = bin2hex(random_bytes(32));
//     $_SESSION['csrf_token'] = $csrfToken;
// }
    
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
                            <h4>Penilaian Peserta Praktikum Algoritma</h4>
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
                                        <th>Aksi</th>
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
                                            <form method="POST" action="">
                                                <input type="hidden" name="id_penilaian"
                                                    value="<?= $row['id_penilaian'] ?>">
                                                <input type="hidden" name="id_matkul" value="<?= $id_matkul ?>">
                                                <input type="hidden" name="hasil" value="<?= $row['hasil'] ?>">
                                                <input type="hidden" name="method" value="PUT">
                                                <!-- <input type="hidden" name="token"
                                                    value="<?= htmlspecialchars($csrfToken) ?>"> -->

                                                <button type="submit"
                                                    class="btn mb-1 btn-rounded <?= htmlspecialchars($row['hasil']=='belum_ada'?'btn-danger':'btn-success') ?>"
                                                    name="submit"><?= htmlspecialchars($row['hasil']=='belum_ada'?'belum_ada':'lulus') ?></button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="">
                                                <a
                                                    href="inputNilai.php?id_penilaian=<?= $row['id_penilaian'] ?> && id_matkul=<?= $id_matkul ?>"><button
                                                        class="btn mb-2 btn-primary" type="button" title="Input">Input
                                                        Nilai Tes</button></a>
                                            </div>
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