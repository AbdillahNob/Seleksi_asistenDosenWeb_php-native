<?php 
require 'function/function.php';
require 'template/header.php';

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
                                        <th>Aksi</th>
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
                                            <div class="">
                                                <a href="daftarAsdos.php?id_matkul=<?= $row['id_matkul'] ?>"><button
                                                        class="btn mb-2 btn-primary" type="button"
                                                        title="Daftar">DAFTAR</button></a>
                                            </div>
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