<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_SESSION['status'])){
    $status = $_SESSION['status'];
    $id_dosen = $_SESSION['id_dosen'];

}else{
    $status = $_GET['status'];
    $id_dosen = $_GET['id_dosen'];
    $_SESSION['status'] = $status;
    $_SESSION['id_dosen'] = $id_dosen;
}
$query_peserta = view("SELECT tb_suratrekomendasi.id_surat, tb_mahasiswa.namaLengkap, tb_mahasiswa.nim, tb_mahasiswa.ipk, tb_mahasiswa.noTelpon, tb_mahasiswa.semester,
                        tb_suratrekomendasi.id_mahasiswa, tb_suratrekomendasi.id_matkul, tb_suratrekomendasi.suratRekomendasi
                        from tb_suratrekomendasi
                        JOIN tb_mahasiswa ON tb_suratrekomendasi.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_suratrekomendasi.id_dosen = '$id_dosen'
                    ");

if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    $id_mahasiswa = $_POST['id_mahasiswa'];
    $_SESSION['status'] = $status;

    if(update($_POST,$no_file) > 0){
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
                window.location.replace('serahkanRekomendasi.php');
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
                window.location.replace('serahkanRekomendasi.php');
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
                            <h4>Daftar Peserta yang minta Surat Rekomendasi dari Anda</h4>
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
                                        <th>Surat Rekomendasi</th>

                                    </tr>
                                </thead>
                                <?php $n = 1;
                                    while($row = mysqli_fetch_assoc($query_peserta)):
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
                                        <form role="form" action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="no_file" value="5">
                                            <input type="hidden" name="id_mahasiswa"
                                                value="<?= $row['id_mahasiswa'] ?>">
                                            <input type="hidden" name="id_dosen" value="<?= $id_dosen ?>">

                                            <td><input type="file" name="surat" id="file">
                                                <button type="submit" name="submit"
                                                    class="btn mb-1 btn-primary">Serahkan</button>
                                            </td>
                                        </form>

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
require 'template/footer.php';
?>