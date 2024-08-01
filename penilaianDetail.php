<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_SESSION['id_matkul'])){
    $id_matkul = $_SESSION['id_matkul'];

    unset($_SESSION['id_matkul']);    

}else{
    $id_matkul = $_GET['id_matkul'];
}

$query_penilaian = view("SELECT tb_penilaian.id_penilaian, tb_mahasiswa.namaLengkap, tb_mahasiswa.nim, tb_mahasiswa.ipk,    
                        tb_penilaian.nilaiMatkul, tb_penilaian.hasil, tb_penilaian.nilaiUjian, tb_penilaian.nilaiWawancara, tb_penilaian.nilaiTotalTes
                        FROM tb_penilaian
                        JOIN tb_mahasiswa ON tb_penilaian.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_penilaian.id_matkul ='$id_matkul'
                        ");

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
                                                <button type="submit"
                                                    class="btn mb-1 btn-rounded btn-danger"><?= $row['hasil'] ?></button>
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