<?php 
require 'function/function.php';
require 'template/header.php';

$id_matkul = $_GET['id_matkul'];
$id_penilaian = $_GET['id_penilaian'];

$_SESSION['id_matkul'] = $id_matkul;

$query_penilaian = view("SELECT tb_penilaian.id_penilaian, tb_penilaian.id_matkul, tb_penilaian.id_mahasiswa, tb_penilaian.nilaiMatkul,
                        tb_mahasiswa.namaLengkap, tb_mahasiswa.nim
                        FROM tb_penilaian                        
                        JOIN tb_mahasiswa ON tb_penilaian.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_penilaian.id_penilaian = '$id_penilaian'
                    ");

if(isset($_POST['submit'])){
    $no_file = $_POST['no_file'];
    if(update($_POST,$no_file)){
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Berhasil Input Nilai',
                    icon: 'success',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('penilaianDetail.php');
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
                window.location.replace('penilaianDetail.php');
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
                            <h3>Inputan Nilai Tes Peserta</h3>
                            <?php while($row=mysqli_fetch_assoc($query_penilaian)): ?>
                            <form class="form-valide" action="" method="post">
                                <input type="hidden" name="no_file" value="4">
                                <input type="hidden" name="id_penilaian" value="<?= $row['id_penilaian'] ?>">
                                <input type="hidden" name="id_matkul" value="<?= $row['id_matkul'] ?>">
                                <input type="hidden" name="id_mahasiswa" value="<?= $row['id_mahasiswa'] ?>">
                                <input type="hidden" name="nilai_matkul" value="<?= $row['nilaiMatkul'] ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nama-mahasiswa">Nama Mahasiswa<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nama-mahasiswa"
                                            name="nama-mahasiswa" value="<?= $row['namaLengkap'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nim">Nim<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nim" name="nim"
                                            value="<?= $row['nim'] ?>" readonly />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nilai-ujian">Nilai Ujian
                                        Tertulis<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nilai-ujian" name="nilai-ujian"
                                            placeholder="Masukkan Nilai Tes.." required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="nilai-wawancara">Nilai Tes
                                        Wawancara<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="nilai-wawancara"
                                            name="nilai-wawancara" placeholder="Masukkan Nilai Tes.." required />
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