<?php 
require 'template/header.php';
require 'function/function.php';


$nomor = $_SESSION['nomor'];
$query_user = view("SELECT * FROM tb_user WHERE nomor='$nomor'");
$row = mysqli_fetch_assoc($query_user);

$query_matkul = view("SELECT * FROM tb_matkul");



if(isset($_POST['submit'])){
    $no_file = $_GET['no_file'];
    $namaMatkul = $_POST['namaMatkul'];
    if(!$namaMatkul){
        echo "
        <script>
            alert('Maaf anda harus input Mata Kuliah Anda');
            window.setTimeout(function(){
                window.location.replace('registrasiDosen.php');
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
                window.location.replace('dashboard.php');
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
                window.location.replace('registrasiDosen.php');
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
                            <form class="form-valide" action="?no_file=5" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nid">Nid Anda <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nid" name="nid"
                                            value="<?= $row['nomor']; ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-dosen">Nama Lengkap<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-dosen" name="nama-dosen"
                                            placeholder="Masukkan nama Lengkap Anda.." required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="namaMatkul">Pilih Mata Kuliah<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="namaMatkul" name="namaMatkul" required>
                                            <option selected disabled>Mata Kuliah</option>
                                            <?php 
                                                while($rowM = mysqli_fetch_assoc($query_matkul)): 
                                            ?>
                                            <option value="<?= $rowM['id_matkul'] ?>"><?= $rowM['nama_matkul'] ?>
                                            </option>
                                            <?php endwhile;?>
                                        </select>
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