<?php 
require 'function/function.php';
require 'template/header.php';

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Inputan Nilai Mahasiswa</h3>
                            <form class="form-valide" action="#" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mahasiswa">Nama Mahasiswa<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mahasiswa"
                                            name="nama-mahasiswa" placeholder="Masukkan Nama Mahasiswa.." />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nim">Nim<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            placeholder="Masukkan Nim.." />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nilai-tes">Nilai Tes<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nilai-tes" name="nilai-tes"
                                            placeholder="Masukkan Nilai Tes.." />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require 'template/footer.php';

?>