<?php 
require 'function/function.php';
require 'template/header.php';

$query_peserta = view("SELECT * FROM tb_mahasiswa");

?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Daftar Peserta Asdos</h4>
                        </div>

                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Nim</th>
                                        <th>Semester</th>
                                        <th>IPK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php $n = 1;
                                    while($row = (mysqli_fetch_assoc($query_peserta))):
                                ?>
                                <tbody>
                                    <tr>
                                        <th style="text-align: center;"><?= $n++; ?></th>
                                        <td><?= $row['namaLengkap']; ?></td>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?= $row['semester']; ?></td>
                                        <td><?= number_format($row['ipk'], 2); ?></td>
                                        <td>
                                            <div class="">
                                                <a href="edit_peserta.php?id_mahasiswa=<?= $row['id_mahasiswa'] ?>"><button
                                                        class="btn mb-2 btn-success" type="button" title="Edit"><i
                                                            class="fas fa-edit"></i></button></a>
                                                <a
                                                    href="hapus_peserta.php?id_mahasiswa=<?= $row['id_mahasiswa'] ?> && no_file=3"><button
                                                        class="btn mb-2 btn-danger" type="button" title="Hapus"
                                                        onclick="return confirm('Yakin Mau Hapus?')"><i
                                                            class="fas fa-trash-alt"></i></button></a>
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