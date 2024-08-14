<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_POST['submit'])){
    $no_file = $_GET['no_file'];
    
    $semester = $_POST['semester'];
    if(!$semester){
        echo "
        <script>
            alert('Maaf anda harus input Semester');
            window.setTimeout(function(){
                window.location.replace('tambah_matkul.php');
            },500);
        </script>
    ";
    return false;
    }

    if(insert($_POST, $no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Tambah Mata Kuliah',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('mataKuliah.php');
            },2000);
        </script>
        ";  
    }else{
        echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Gagal Tambah Mata Kuliah',
                            icon: 'warning',
                            timer: '3200',
                            showConfirmButton: false
                        });
                    },10);
                    window.setTimeout(function(){
                        window.location.replace('mataKuliah.php');
                    },1500);
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
                            <h3>Tambah Mata Kuliah</h3>
                            <form class="form-valide" action="?no_file=2" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="kode-mata-kuliah">Kode Mata Kuliah <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="kode-mata-kuliah"
                                            name="kode-mata-kuliah" placeholder="Masukkan Kode Mata Kuliah.."
                                            required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mata-kuliah">Nama Mata Kuliah <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mata-kuliah"
                                            name="nama-mata-kuliah" placeholder="Masukkan Nama Mata Kuliah.."
                                            required />
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
                                    <label class="col-lg-4 col-form-label" for="jumlah-kelas">Jumlah Kelas <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="jumlah-kelas" name="jumlah-kelas"
                                            placeholder="Masukkan Jumlah Kelas.." required />
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