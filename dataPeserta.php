<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];

}else{
    $status = $_GET['status'];
    $_SESSION['status'] = $status;
}
$query_peserta = view("SELECT * FROM tb_mahasiswa");

if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $_SESSION['status'] = $status;

    if(update($id_mahasiswa,$no_file) > 0){
         echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Serahkan Surat Rekomendasi',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('dataPeserta.php');
            },1500);
        </script>
        ";    
    }else{
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Gagal Serahkan Surat Rekomendasi',
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
                                        <th>No.Telpon/Wa</th>
                                        <th>Keterangan Rekomendasi</th>
                                        <?php if($status == 'dosen'): ?>
                                        <th>Surat Rekomendasi</th>
                                        <?php endif; ?>
                                        <?php if($status == 'admin'): ?>
                                        <th>Aksi</th>
                                        <?php endif; ?>
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
                                        <td><?= $row['noTelpon'] ?></td>
                                        <td><span
                                                class="badge badge-<?= $row['suratRekomendasi']==true?'primary':'danger' ?> px-3">
                                                <?= $row['suratRekomendasi']==true?'Telah DiSerahkan':'Belum Diserahkan' ?>
                                        </td>
                                        <?php if($status == 'dosen') :?>
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="no_file" value="5">
                                            <input type="hidden" name="id_mahasiswa"
                                                value="<?= $row['id_mahasiswa'] ?>">
                                            <td><input type="file" name="surat" id="file">
                                                <button type="submit" name="submit"
                                                    class="btn mb-1 btn-primary">Serahkan</button>
                                            </td>
                                        </form>
                                        <?php endif; ?>
                                        <?php if($status == 'admin'): ?>
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
                                        <?php endif; ?>
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