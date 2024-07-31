<?php 
require 'template/header.php';
require 'function/function.php';

$query_matkul = view("SELECT * FROM tb_matkul");
$query_pesertaAsdos = view("SELECT * FROM tb_mahasiswa");


?>
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Peserta Asdos</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= mysqli_num_rows($query_pesertaAsdos); ?></h2>
                            <p class="text-white mb-0">September 10-20 2024</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i
                                class="fa-solid fa-chalkboard-user"></i></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Mata Kuliah Praktikum</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= mysqli_num_rows($query_matkul); ?></h2>
                            <p class="text-white mb-0">September - Desember 2024</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa-solid fa-receipt"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Asdos yang di Terima</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">23</h2>
                            <p class="text-white mb-0">Jan - March 2019</p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-users"></i></span>
                    </div>
                </div>
            </div>

        </div>


    </div>
    <!-- #/ container -->
</div>

<?php 
require 'template/footer.php';
?>