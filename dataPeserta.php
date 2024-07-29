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
                            <h4>Daftar Peserta Asdos</h4>
                        </div>
                        <a href="tambah_peserta.php"><button class="btn btn-primary" type="submit"
                                title="Tambah">Tambah</button></a>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
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
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Kolor Tea Shirt For Man </td>
                                        <td><span class="badge badge-primary px-2">Sale</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 22</td>
                                        <td>
                                            <div class="">
                                                <a href="edit_peserta.php"><button class="btn mb-2 btn-success"
                                                        type="button" title="Edit"><i
                                                            class="fas fa-edit"></i></button></a>
                                                <a href="#"><button class="btn mb-2 btn-danger" type="button"
                                                        title="Hapus"><i class="fas fa-trash-alt"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Kolor Tea Shirt For Women</td>
                                        <td><span class="badge badge-danger px-2">Tax</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 30</td>
                                        <td>
                                            <div class="">
                                                <a href="edit_peserta.php"><button class="btn mb-2 btn-success"
                                                        type="button" title="Edit"><i
                                                            class="fas fa-edit"></i></button></a>
                                                <a href="#"><button class="btn mb-2 btn-danger" type="button"
                                                        title="Hapus"><i class="fas fa-trash-alt"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Blue Backpack For Baby</td>
                                        <td><span class="badge badge-success px-2">Extended</span>
                                        </td>
                                        <td>2</td>
                                        <td>January 25</td>
                                        <td>
                                            <div class="">
                                                <a href="edit_peserta.php"><button class="btn mb-2 btn-success"
                                                        type="button" title="Edit"><i
                                                            class="fas fa-edit"></i></button></a>
                                                <a href="#"><button class="btn mb-2 btn-danger" type="button"
                                                        title="Hapus"><i class="fas fa-trash-alt"></i></button></a>
                                            </div>
                                        </td>
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