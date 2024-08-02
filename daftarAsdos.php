<?php 
require 'template/header.php';
require 'function/function.php';

$id_matkul = $_GET['id_matkul'];

$nim = $_SESSION['nomor'];
$result = view("SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    if(insert($_POST, $no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Anda Berhasil Mendaftar Asisten Dosen',
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
                    text: 'Anda Gagal Daftar',
                    icon: 'warning',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('jadwalTes.php');
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
                            <h3>Pendaftaran Asisten Dosen</h3>
                            <form class="form-valide" action="" method="post">
                                <input type="hidden" name="no_file" value="4">
                                <input type="hidden" name="id_matkul" value="<?= $id_matkul ?>">
                                <input type="hidden" name="id_mahasiswa" value="<?= $row['id_mahasiswa'] ?>">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nilai-matkul">
                                        Masukkan Nilai Mata Kuliah Anda<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nilai-matkul" name="nilai-matkul"
                                            placeholder="Masukkan Nilai Bobot Anda..." required />
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