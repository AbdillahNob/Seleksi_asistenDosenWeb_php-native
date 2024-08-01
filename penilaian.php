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
                            <h4>Daftar Penilaian</h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>jadwal Tes</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php 
                                $n =1;
                                while($row=mysqli_fetch_assoc($query_matkul)):
                                 ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>
                                        <td><?= $row['kode_matkul'] ?></td>
                                        <td><?= $row['nama_matkul'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td><?= $row['jadwalTes'] ?> WITA</td>
                                        <td><a href="penilaianDetail.php?id_matkul=<?= $row['id_matkul'] ?>"><button
                                                    type="button" class="btn mb-1 btn-primary">Lihat Peserta</button>
                                            </a></td>
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