<?php 
require 'function/function.php';
require 'template/header.php';

$id_mahasiswa = $_GET['id_mahasiswa'];

$query_mahasiswa = view("SELECT * FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
$rowM = mysqli_fetch_assoc($query_mahasiswa);
$query_matkul = view("SELECT * FROM tb_matkul");

?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Mata Kuliah Praktikum</h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Jadwal Tes</th>
                                        <th>Jumlah Kelas</th>
                                        <th>Administrasi</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $n = 1;
                                    while($row = mysqli_fetch_assoc($query_matkul)) : ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>
                                        <td><?= $row['kode_matkul']; ?></td>
                                        <td><?= $row['nama_matkul'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td class="color-primary"><?= $row['jadwalTes']; ?></td>
                                        <td><?= $row['jumlah_kelas'] ?></td>
                                        <td>
                                            <?php if($rowM['suratRekomendasi'] ==  true): ?>
                                            <div class="">
                                                <a href="daftarAsdos.php?id_matkul=<?= $row['id_matkul'] ?>"><button
                                                        class="btn mb-2 btn-primary" type="button"
                                                        title="Daftar">DAFTAR</button></a>
                                            </div>
                                            <div class="">
                                                <a href="pengumuman.php?id_matkul=<?= $row['id_matkul']; ?>"><button
                                                        class="btn mb-2 btn-success" type="button"
                                                        title="Daftar">PENGUMUMAN</button></a>
                                            </div>
                                            <?php else: ?>
                                            <div class="">
                                                <span class="badge badge-danger px-2">Harus Di berikan Surat Rekomendasi
                                                    dari
                                                    DOSEN !</span>
                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php endwhile; ?>
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