<?php 
require 'template/header.php';
require 'function/function.php';


$nomor = $_SESSION['nomor'];
$query_user = view("SELECT * FROM tb_user WHERE nomor='$nomor'");
$row = mysqli_fetch_assoc($query_user);


if(isset($_POST['submit'])){
    $no_file = $_GET['no_file'];
    $semester = $_POST['semester'];
    if(!$semester){
        echo "
        <script>
            alert('Maaf anda harus input Semester');
            window.setTimeout(function(){
                window.location.replace('registrasiMahasiswa.php');
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
                    text: 'Anda Berhasil Registrasi',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('jadwalTes.php');
            },2000);
        </script>
        ";  
    }else{
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Anda Gagal Registrasi',
                    icon: 'warning',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('registrasiMahasiswa.php');
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
                            <h3>Registrasi Peserta Calon Asisten Dosen</h3>
                            <form class="form-valide" action="?no_file=3" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nim">Nim Anda <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            value="<?= $row['nomor']; ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mahasiswa">Nama Lengkap<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mahasiswa"
                                            name="nama-mahasiswa" placeholder="Masukkan nama Lengkap Anda.." required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="semester">Semester <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="semester" name="semester" required>
                                            <option selected disabled>Semester</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
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