<?php 
require 'function/function.php';
require 'template/header.php';

$id_matkul = $_GET['id_matkul'];
$query_matkul = view("SELECT * FROM tb_matkul WHERE id_matkul = '$id_matkul'");

if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    if(update($_POST, $no_file) > 0){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Edit Mata Kuliah',
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
                    text: 'Tidak ada Perubahan',
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
                            <h3>Edit Matkul</h3>
                            <?php while($row = mysqli_fetch_assoc($query_matkul)) : ?>
                            <form class="form-valide" action="" method="post">
                                <input type="hidden" name="no_file" value="2">
                                <input type="hidden" name="id_matkul" value="<?= $id_matkul; ?>">
                                <input type="hidden" name="semesterLama" value="<?= $row['semester']; ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="kode-mata-kuliah">Kode Mata Kuliah <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="kode-mata-kuliah"
                                            name="kode-mata-kuliah" placeholder="Masukkan Kode Mata Kuliah.."
                                            value="<?= $row['kode_matkul'] ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mata-kuliah">Nama Mata Kuliah <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mata-kuliah"
                                            name="nama-mata-kuliah" placeholder="Masukkan Nama Mata Kuliah.."
                                            value="<?= $row['nama_matkul']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="semesterBaru">Semester <span
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
                                    <label class="col-lg-4 col-form-label" for="jadwal-tes">Jadwal Tes<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type='datetime-local' class="form-control" id="jadwal-tes"
                                            name="jadwal-tes" value="<?= $row['jadwalTes']; ?>" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="jumlah-kelas">Jumlah Kelas <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="jumlah-kelas" name="jumlah-kelas"
                                            placeholder="Masukkan Jumlah Kelas.."
                                            value="<?= $row['jumlah_kelas']; ?>" />
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