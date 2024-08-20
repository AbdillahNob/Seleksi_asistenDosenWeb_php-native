<?php 
require 'function/function.php';
require 'template/header.php';


// Jika aksesnya berasal dri RegisAsdos
if(isset($_SESSION['id_mahasiswa'])){
    $id_mahasiswa = $_SESSION['id_mahasiswa'];
    $id_matkul = $_SESSION['id_matkul'];
}else{
// Jika Aksesnya berasal dari listDaftarAsdos
    $id_mahasiswa = $_GET['id_mahasiswa'];
    $id_matkul = $_GET['id_matkul'];
}

$query_pendaftaranAsdos = view("SELECT * FROM tb_pendaftaranasdos WHERE id_matkul='$id_matkul' AND id_mahasiswa='$id_mahasiswa'");
$row = mysqli_fetch_assoc($query_pendaftaranAsdos);

$query_matkul = view("SELECT * FROM tb_matkul WHERE id_matkul ='$id_matkul'");
$rowM = mysqli_fetch_assoc($query_matkul);


?>

<div class="content-body">

    <div class="container-fluid">

        <?php if(isset($row)): ?>
        <?php if($row['hasil'] == 'LULUS'): ?>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="fas fa-bullhorn"></i></span>
                        <h2 class="mt-3">Pengumuman</h2>
                        <p><?= $rowM['nama_matkul'] ?></p>
                        <a href="javascript:void()" class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Selamat Anda
                            Lulus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="fas fa-bullhorn"></i></span>
                        <h2 class="mt-3">Pengumuman</h2>
                        <p><?= $rowM['nama_matkul'] ?></p><a href="javascript:void()"
                            class="btn gradient-5 btn-lg border-0 btn-rounded px-7">Mohon Maaf anda tidak Lulus</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <?php else: ?>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <span class="display-5"><i class="fas fa-bullhorn"></i></span>
                        <h2 class="mt-3">Info</h2>
                        <p><?= $rowM['nama_matkul'] ?></p><a href="javascript:void()"
                            class="btn gradient-5 btn-lg border-0 btn-rounded px-7">Anda Belum Mendaftar Pada Mata
                            Kuliah ini</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>

    </div>

</div>

<?php 
require 'template/footer.php'
?>