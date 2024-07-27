<?php 
require 'function/function.php';
require 'template/header.php'

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
                                        <th>Kode</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Nim</th>
                                        <th>Nama Peserta</th>
                                        <th>IPK</th>
                                        <th>Nilai Mata Kuliah</th>
                                        <th>Nilai Tes</th>
                                        <th>Hasil</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>2TKNM-4</td>
                                        <td>Prak.Algoritma dan Pemrograman</td>
                                        <td>202300</td>
                                        <td>Abdillah P Al-Iman</td>
                                        <td>3.57</td>
                                        <td>89</td>
                                        <td>80</td>
                                        <td><span class="badge badge-primary px-2">Lulus</td>
                                        <td>Input Nilai dan Edit</td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>2TKNM-4</td>
                                        <td>Prak.Algoritma dan Pemrograman</td>
                                        <td>202300</td>
                                        <td>Abdillah P Al-Iman</td>
                                        <td>3.57</td>
                                        <td>89</td>
                                        <td>80</td>
                                        <td><span class="badge badge-danger px-2">Tidak Lulus</td>
                                        <td>Input Nilai dan Edit</td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>2TKNM-4</td>
                                        <td>Prak.Algoritma dan Pemrograman</td>
                                        <td>202300</td>
                                        <td>Abdillah P Al-Iman</td>
                                        <td>3.57</td>
                                        <td>89</td>
                                        <td>80</td>
                                        <td><span class="badge badge-primary px-2">Lulus</td>
                                        <td>Input Nilai dan Edit</td>
                                    </tr>
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