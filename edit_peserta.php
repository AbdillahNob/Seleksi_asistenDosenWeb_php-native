<?php 
require 'function/function.php';
require 'template/header.php';

$id_mahasiswa = $_GET['id_mahasiswa'];
$result = view("SELECT * FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    if(update($_POST, $no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Edit Peserta',
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
                    text: 'Tidak ada Perubahan',
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
                            <?php while($row=mysqli_fetch_assoc($result)): ?>
                            <form class="form-valide" action="" method="post">
                                <input type="hidden" name="id_mahasiswa" value="<?= $row['id_mahasiswa']; ?>">
                                <input type="hidden" name="no_file" value="3">
                                <input type="hidden" name="semesterLama" value="<?= $row['semester']; ?>">
                                <input type="hidden" name="nimLama" value="<?= $row['nim'] ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mahasiswa">Nama Mahasiswa<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mahasiswa"
                                            name="nama-mahasiswa" placeholder="Masukkan Nama Mahasiswa.."
                                            value="<?= $row['namaMahasiswa'] ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nimBaru">Nim<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nimBaru" name="nimBaru"
                                            placeholder="Masukkan Nim.." value="<?= $row['nim'] ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="semesterBaru">Semester<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <select class="form-control" id="semesterBaru" name="semesterBaru">
                                            <option value="">Semester</option>
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
                                            placeholder="Masukkan IPK..." value="<?= $row['ipk'] ?>" />
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
                            <?php endwhile; ?>
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