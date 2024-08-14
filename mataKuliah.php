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
                        <a href="tambah_matkul.php"><button class="btn btn-primary" type="submit"
                                title="Tambah">Tambah</button></a>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Jumlah Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php 
                                $n = 1;
                                while($row = mysqli_fetch_assoc($query_matkul)) :                            
                                ?>
                                <tbody>
                                    <tr>
                                        <th>
                                            <p align="center"><?= $n++ ?></p>
                                        </th>
                                        <td><?= $row['kode_matkul']; ?></td>
                                        <td><?= $row['nama_matkul']; ?></td>
                                        <td>
                                            <p align="center"><?= $row['semester']; ?></p>
                                        </td>
                                        <td class="color-primary">
                                            <p align="center"><?= $row['jumlah_kelas']; ?></p>
                                        </td>
                                        <td>
                                            <div class="">
                                                <a href="edit_matkul.php?id_matkul=<?= $row['id_matkul']; ?>"><button
                                                        class="btn mb-2 btn-success" type="button" title="Edit"><i
                                                            class="fas fa-edit"></i></button></a>
                                                <a
                                                    href="hapus_matkul.php?id_matkul=<?= $row['id_matkul']; ?> && no_file=2"><button
                                                        class="btn mb-2 btn-danger" type="button" title="Hapus"
                                                        onclick="return confirm('Yakin Mau Hapus ?')"><i
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