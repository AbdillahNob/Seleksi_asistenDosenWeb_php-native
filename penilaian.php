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
                            <h4>Daftar Penilaian</h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
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
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Kolor Tea Shirt For Man </td>
                                        <td><span class="badge badge-primary px-2">Sale</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 22</td>
                                        <td><a href="penilaianDetail.php?id_matkul='2'"><button type="button"
                                                    class="btn mb-1 btn-primary">Lihat Peserta</button>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Kolor Tea Shirt For Women</td>
                                        <td><span class="badge badge-danger px-2">Tax</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 30</td>
                                        <td><a href="penilaianDetail.php?id_matkul='2'"><button type="button"
                                                    class="btn mb-1 btn-primary">Lihat Peserta</button>
                                            </a></td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Blue Backpack For Baby</td>
                                        <td><span class="badge badge-success px-2">Extended</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 25</td>
                                        <td><a href="penilaianDetail.php?id_matkul='2'"><button type="button"
                                                    class="btn mb-1 btn-primary">Lihat Peserta</button>
                                            </a></td>
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