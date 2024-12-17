<?php 
require 'function/function.php';
require 'template/header.php';

// agar dari halaman InputNilai bs lngsng ke Halaman Ini
if(isset($_SESSION['id_matkul'])){
    $id_matkul = $_SESSION['id_matkul'];

}else{
    $id_matkul = $_GET['id_matkul'];
}

$query_pendaftaranAsdos = view("SELECT tb_pendaftaranasdos.id_pendaftaran, tb_mahasiswa.namaLengkap, tb_mahasiswa.nim, tb_mahasiswa.ipk, tb_mahasiswa.noTelpon, tb_mahasiswa.semester,   
                        tb_pendaftaranasdos.nilaiMatkul, tb_pendaftaranasdos.hasil
                        FROM tb_pendaftaranasdos
                        JOIN tb_mahasiswa ON tb_pendaftaranasdos.id_mahasiswa = tb_mahasiswa.id_mahasiswa
                        WHERE tb_pendaftaranasdos.id_matkul ='$id_matkul'");

$query_matkul = view("SELECT * FROM tb_matkul WHERE id_matkul='$id_matkul'");                        
$rowM = mysqli_fetch_assoc($query_matkul);

$nilaiHurufAngka = [
    'A' => 4.0,
    'A-'=> 3.7,
    'B+'=> 3.4,
    'B'=>3.1,
    'B-'=>2.8,
    'C+'=>2.6,
    'C'=>2.3,
    'C-'=>2.0,
    'D+'=>1.7,
    'D'=>1.5,
    'D-'=>1.2,
    'E'=>1.0
];

function konversiNilai($nilaiHuruf, $nilaiHurufAngka){                                            
    return $nilaiHurufAngka[$nilaiHuruf] ?? null;
}

$data = [];

// Masukkan semua Data PendaftaranAsdos ke Array data
while($row = mysqli_fetch_assoc($query_pendaftaranAsdos)){
    $nilaiHuruf = $row['nilaiMatkul'];
    $nilaiAngka = konversiNilai($nilaiHuruf, $nilaiHurufAngka);

    $totalNilai = $row['ipk'] + $nilaiAngka;

    $data[] = [
        'nim'=>$row['nim'],
        'namaLengkap'=>$row['namaLengkap'],
        'semester'=>$row['semester'],
        'noTelpon'=>$row['noTelpon'],
        'ipk'=>$row['ipk'],
        'nilaiMatkul'=>$row['nilaiMatkul'],
        'hasil'=>$row['hasil'],
        'totalNilai'=>$totalNilai
    ];
    
}
// Mengurutkan data berdasarkan total nilai (descending)
usort($data, function ($a, $b) {
    return $b['totalNilai'] <=> $a['totalNilai'];
});

?>

<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Penilaian Peserta <?= $rowM['nama_matkul']; ?></h4>
                        </div>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nim</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Semester</th>
                                        <th>No.Telpon/Wa</th>
                                        <th>IPK</th>
                                        <th>Mata Kuliah</th>
                                        <th>Hasil</th>
                                        <th>Total Nilai</th>

                                    </tr>
                                </thead>
                                <?php $n =1;
                                    foreach($data as $row):
                                ?>
                                <tbody>
                                    <tr>
                                        <th><?= $n++; ?></th>
                                        <td><?= htmlspecialchars($row['nim']) ?></td>
                                        <td><?= htmlspecialchars($row['namaLengkap']) ?></td>
                                        <td><?= htmlspecialchars($row['semester']) ?></td>
                                        <td><?= htmlspecialchars($row['noTelpon']) ?></td>
                                        <td><?= htmlspecialchars($row['ipk']) ?></td>
                                        <td><?= htmlspecialchars($row['nilaiMatkul']) ?></td>
                                        <td>
                                            <button type="submit"
                                                class="btn mb-1 btn-rounded <?= htmlspecialchars($row['hasil']=='TIDAK LULUS'?'btn-danger':'btn-success') ?>"
                                                name="submit"><?= htmlspecialchars($row['hasil']=='TIDAK LULUS'?'TIDAK LULUS':'LULUS') ?></button>

                                        </td>

                                        <td><?= number_format($row['totalNilai'], 2); ?></td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
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