<?php 
require 'function/function.php';
require 'template/header.php';

if(isset($_SESSION['id_mahasiswa'])){
    $id_mahasiswa = $_SESSION['id_mahasiswa'];
    unset($_SESSION['id_mahasiswa']);
    unset($_SESSION['id_matkul']);
}else{
    $id_mahasiswa = $_GET['id_mahasiswa'];
}

// Ambil data surat rekomendasi yang diminta oleh mahasiswa tersebut
$query_surat = view("SELECT * FROM tb_suratrekomendasi WHERE id_mahasiswa='$id_mahasiswa'");

$query_matkul = view("SELECT * FROM tb_matkul");

if(isset($_POST['submit'])){    
    $no_file = $_POST['no_file'];

    $_SESSION['id_mahasiswa'] = $id_mahasiswa;
    insert($_POST,$no_file);
    echo"
        <script type='text/javascript'>    
            window.setTimeout(function(){
                window.location.replace('listDaftarAsdos.php');
            },0);
        </script>
        "; 
}

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Mata Kuliah Praktikum</h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th>Semester</th>
                                        <th>Jumlah Kelas</th>
                                        <th>Administrasi</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $n = 1;
                                    while($row = mysqli_fetch_assoc($query_matkul)) : ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>
                                        <td><?= $row['kode_matkul']; ?></td>
                                        <td><?= $row['nama_matkul'] ?></td>
                                        <td><?= $row['semester'] ?></td>
                                        <td><?= $row['jumlah_kelas'] ?></td>
                                        <td>

                                            <?php 
                                            $surat_list = null; // Reset surat list
                                            $query_surat = view("SELECT * FROM tb_suratrekomendasi WHERE id_mahasiswa='$id_mahasiswa'");
                                            while($rowSu = mysqli_fetch_assoc($query_surat)){
                                                if($rowSu['id_matkul'] == $row['id_matkul']){
                                                    $surat_list = $rowSu; // Ambil surat untuk mata kuliah ini
                                                }
                                            }

                                            // Ambil data dosen yang mengajar mata kuliah ini
                                            $query_dosen = view("SELECT * FROM tb_dosen WHERE id_matkul='{$row['id_matkul']}'");
                                            $has_surat = isset($surat_list);

                                            // Validasi apakah id_dosen dari data suratMahasiswa sama dengan id_dosen dari dosen matkul ini
                                            $rowD1 = null;
                                            while($rowD2 = mysqli_fetch_assoc($query_dosen)){
                                                if(!$has_surat || ($has_surat && $rowD2['id_dosen'] == $surat_list['id_dosen'])){
                                                    $rowD1 = $rowD2;
                                                }
                                            }
                                            ?>

                                            <!-- 1. BILA TIDAK ADA SURAT SAMA SEKALI -->
                                            <?php if(!$has_surat): ?>
                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto">
                                                    <span class="badge badge-warning px-2">Minta Surat
                                                        Rekomendasi pada
                                                        Dosen matkul ini </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <!-- Validasi apakah mata kuliah ini sudah ada Dosennya -->
                                                <?php 
                                                $query_dosen = view("SELECT * FROM tb_dosen WHERE id_matkul='{$row['id_matkul']}'");
                                                if(mysqli_num_rows($query_dosen) > 0): ?>

                                                <form method="post" role="form"
                                                    action="?id_mahasiswa=<?= $id_mahasiswa ?>">
                                                    <input type="hidden" name="id_mahasiswa"
                                                        value="<?= $id_mahasiswa ?>">
                                                    <input type="hidden" name="id_matkul"
                                                        value="<?= $row['id_matkul'] ?>">
                                                    <input type="hidden" name="no_file" value="6">
                                                    <div class="col-lg-12 ml-auto">
                                                        <select class="form-control" id="id_dosen" name="id_dosen"
                                                            required>
                                                            <option selected disabled>Minta Surat Rekomendasi</option>

                                                            <?php while($dataDosen = mysqli_fetch_assoc($query_dosen)): ?>
                                                            <option value="<?= $dataDosen['id_dosen'] ?>">
                                                                <?= $dataDosen['namaLengkap'] ?>
                                                            </option>
                                                            <?php endwhile ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary" name="submit">
                                                            Minta
                                                        </button>
                                                    </div>
                                                </form>
                                                <?php else: ?>

                                                <div class="col-lg-12 ml-auto">
                                                    <span class="badge badge-danger px-2">Dosen pada matkul ini
                                                        belum ada </span>
                                                </div>

                                                <?php endif; ?>

                                            </div>
                                            <!-- END Bila Tidak Surat Sama Sekali -->

                                            <!-- 2. BILA ADA SURAT -->
                                            <?php else: ?>

                                            <!-- 2.1 -->
                                            <?php if(isset($rowD1) && $surat_list['suratRekomendasi'] == true): ?>

                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto">
                                                    <a href="downloadSurat.php?id_surat=<?= $surat_list['id_surat']?>"
                                                        class="btn btn-warning">Download Surat
                                                        Rekomendasi
                                                        Anda</a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto">
                                                    <a href="registrasiAsdos.php?id_matkul=<?= $row['id_matkul'] ?>"><button
                                                            class="btn mb-2 btn-primary" type="button"
                                                            title="Daftar">DAFTAR</button></a>
                                                </div>
                                            </div>
                                            <div class="">
                                                <a
                                                    href="daftarHasil.php?id_mahasiswa=<?= $id_mahasiswa ?>&id_matkul=<?= $row['id_matkul'] ?>"><button
                                                        class="btn mb-2 btn-success" type="button"
                                                        title="Pengumuman">PENGUMUMAN</button></a>
                                            </div>

                                            <!-- 2.1 -->
                                            <?php elseif (isset($rowD1)): ?>
                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto">
                                                    <span class="badge badge-info px-2">Harap Tunggu
                                                        Surat Rekomendasi anda dari
                                                        Dosen matkul ini </span>
                                                </div>
                                            </div>

                                            <!-- 2.1 -->
                                            <?php else: ?>
                                            <div class="form-group row">
                                                <div class="col-lg-12 ml-auto">
                                                    <span class="badge badge-warning px-2">Minta Surat
                                                        Rekomendasi pada
                                                        Dosen matkul ini </span>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <!-- Validasi apakah mata kuliah ini sudah ada Dosennya -->
                                                <?php if(mysqli_num_rows($query_dosen) > 0): ?>

                                                <form method="post" role="form"
                                                    action="?id_mahasiswa=<?= $id_mahasiswa ?>">
                                                    <input type="hidden" name="id_mahasiswa"
                                                        value="<?= $id_mahasiswa ?>">
                                                    <input type="hidden" name="id_matkul"
                                                        value="<?= $row['id_matkul'] ?>">
                                                    <input type="hidden" name="no_file" value="6">
                                                    <div class="col-lg-12 ml-auto">
                                                        <select class="form-control" id="mintaSuratDosen"
                                                            name="id_dosen" required>
                                                            <option selected disabled>Minta Surat Rekomendasi</option>
                                                            <?php while($dataDosen = mysqli_fetch_assoc($query_dosen)): ?>
                                                            <option value="<?= $dataDosen['id_dosen'] ?>">
                                                                <?= $dataDosen['namaLengkap'] ?>
                                                            </option>
                                                            <?php endwhile ?>
                                                        </select>

                                                    </div>
                                                    <div class="col-lg-12 ml-auto">
                                                        <button type="submit" class="btn btn-primary" name="submit">
                                                            Minta
                                                        </button>
                                                    </div>
                                                </form>
                                                <?php else: ?>

                                                <div class="col-lg-12 ml-auto">
                                                    <span class="badge badge-danger px-2">Dosen pada matkul ini
                                                        belum ada </span>
                                                </div>

                                                <?php endif; ?>

                                            </div>

                                            <!-- 2.2 End -->
                                            <?php endif; ?>


                                            <?php endif; ?>
                                            <!-- 3. END Bila Ada Surat -->

                                        </td>
                                    </tr>
                                </tbody>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div>
    </div>

</div>

<?php 
require 'template/footer.php'
?>