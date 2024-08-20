<?php 
require 'template/header.php';
require 'function/function.php';

$id_matkul = $_GET['id_matkul'];

$nim = $_SESSION['nomor'];
$result = view("SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    $nilai_matkul = $_POST['nilai-matkul'];

    $_SESSION['id_mahasiswa'] = $row['id_mahasiswa'];
    $_SESSION['id_matkul'] = $id_matkul;
    if(!$nilai_matkul){
        echo "
        <script>
            alert('Maaf anda harus input Nilai Mata Kuliah');
            window.setTimeout(function(){
                window.location.replace('registrasiAsdos.php');
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
                    text: 'Anda Berhasil Mendaftar Asisten Dosen',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('daftarHasil.php');
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
                window.location.replace('daftarHasil.php');
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
                            <form class="form-valide" action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="no_file" value="4">
                                <input type="hidden" name="id_matkul" value="<?= $id_matkul ?>">
                                <input type="hidden" name="id_mahasiswa" value="<?= $row['id_mahasiswa'] ?>">

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nilai-matkul">Nilai Mata Kuliah<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="nilai-matkul" name="nilai-matkul" required>
                                            <option selected disabled>Nilai Bobot</option>
                                            <option value="A">A</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B">B</option>
                                            <option value="B-">B-</option>
                                            <option value="C+">C+</option>
                                            <option value="C">C</option>
                                            <option value="C-">C-</option>
                                            <option value="D+">D+</option>
                                            <option value="D">D</option>
                                            <option value="D-">D-</option>
                                            <option value="E">E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="suratRekomendasi" class="col-lg-4 col-form-label">
                                        Upload Surat Rekomendasi<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="file" class="form-control" id="surat" name="surat" required>
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