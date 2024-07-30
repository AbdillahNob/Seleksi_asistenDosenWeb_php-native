<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_POST['submit'])){
    $no_file = $_GET['no_file'];
    if(insert($_POST,$no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Tambah Peserta Asdos',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('dataPeserta.php');
            },2500);
        </script>
        ";  
    }else{
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Gagal Tambah Peserta Asdos',
                    icon: 'warning',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('dataPeserta.php');
            },2500);
        </script>
        ";
    }
}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <h3>Edit Peserta Asdos</h3>
                            <form class="form-valide" action="?no_file=3" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mahasiswa">Nama Mahasiswa<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mahasiswa"
                                            name="nama-mahasiswa" placeholder="Masukkan Nama Mahasiswa.." required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nim">Nim<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            placeholder="Masukkan Nim.." required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="semester">Semester <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="semester" name="semester" required>
                                            <option selected disabled>Semester</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="ipk">IPK<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="ipk" name="ipk"
                                            placeholder="Masukkan IPK..." required />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary" name="submit">
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