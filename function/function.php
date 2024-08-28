<?php 
 $conn = mysqli_connect("localhost","root","","db_asistendosen");


function view($query){
        global $conn;

        $result = mysqli_query($conn, $query);
         
        return $result;
    }

function insert($data, $no_file){
    global $conn;

    // no_file
    // 1. user
    // 2. Mata Kuliah
    // 3. Registrasi Mahasiswa
    // 4. Registrasi Asdos
    // 5. Registrasi Dosen

    if($no_file == 1){
        $username = strtolower(stripslashes($data['username']));
        $nomor = mysqli_real_escape_string($conn, $data['nomor']);
        $password = mysqli_real_escape_string($conn, $data['password']);
        $status = $data['status'];
        
        if($status == 'admin'){

            $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE status='$status'");

            // Validasi agar admin hanya 1 akun
            if(mysqli_num_rows($result) > 0){
                echo "
                    <script>
                        alert('Maaf Admin hanya boleh 1 akun !');
                    </script>
                ";
                return false;
            }
        }
         
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO tb_user (username, nomor, password, status) VALUES ('$username','$nomor','$password','$status')";

    } else if($no_file == 2){
        $kode_mataKuliah = $data['kode-mata-kuliah'];
        $nama_mataKuliah = mysqli_real_escape_string($conn, stripslashes($data['nama-mata-kuliah']));
        $semester = $data['semester'];        
        $jumlahKelas = $data['jumlah-kelas'];

        $result = mysqli_query($conn, "SELECT * FROM tb_matkul WHERE kode_matkul='$kode_mataKuliah'");

        if(mysqli_num_rows($result) > 0){
            echo "
                    <script>
                        alert('Maaf Kode Mata Kuliah yang anda input sudah TERDAFTAR');
                    </script>
                ";
                return false;
        }
        $query = "INSERT INTO tb_matkul (kode_matkul, nama_matkul, semester,jumlah_kelas) VALUES('$kode_mataKuliah','$nama_mataKuliah','$semester','$jumlahKelas')";


    }else if($no_file == 3){
        $namaMahasiswa = mysqli_real_escape_string($conn, stripslashes($data['nama-mahasiswa']));
        $nim = $data['nim'];
        $semester = $data['semester'];
        $noTelpon = $data['noTelpon'];
        $ipk = $data['ipk'];
        $dosenRekomendasi = $data['dosenRekomendasi'];

        $result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
        if(mysqli_num_rows($result) > 0 ){
            echo "
            <script>
                alert('Maaf Nim anda sudah terdaftar sebelumnya');
            </script>
        ";
        return false;
        }

          // Validasi agr inputan nilai tdk lebih dari 4.00
          if($ipk > 4.00){
            echo "
            <script>
                alert('Nilai Anda melebihi dari nilai Maksimal !');
            </script>
        ";
        return false;
        }

        $query = "INSERT INTO tb_mahasiswa (id_dosen, nim, namaLengkap, semester, ipk, noTelpon) VALUES('$dosenRekomendasi','$nim','$namaMahasiswa','$semester','$ipk', '$noTelpon')";
    }
    else if($no_file == 4){
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_matkul = $data['id_matkul'];
        $nilai_matkul = $data['nilai-matkul'];
        
        $surat_rekomendasi = upload($no_file);


        // Validasi agr Peserta tdk mendaftar 2X pada MATKUL yang sama.
        $result = mysqli_query($conn, "SELECT * FROM tb_pendaftaranasdos WHERE id_matkul='$id_matkul' AND id_mahasiswa='$id_mahasiswa'");
        if(mysqli_num_rows($result) > 0){
            echo "
            <script>
                alert('Maaf Anda hanya bisa mendaftar 1X pada mata kuliah ini');
            </script>
        ";
        return false;
        }
       
        $nilaiIpk = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id_mahasiswa='$id_mahasiswa'");
        $nilaiIpkD = mysqli_fetch_assoc($nilaiIpk);
        if($nilaiIpkD['ipk'] < 3.00){
            echo "
            <script>
                alert('IPK Anda tidak memenuhi Standar !');
            </script>
        ";
        return false;
        }

        if($nilai_matkul == 'A' || $nilai_matkul == 'A-' || $nilai_matkul == "B" ||$nilai_matkul == "B+"){
            $hasil = 'LULUS';    
        }else{
            $hasil ='TIDAK LULUS';
        }
        $query = "INSERT INTO tb_pendaftaranasdos (id_matkul, id_mahasiswa, nilaiMatkul, hasil, suratRekomendasi) 
                      VALUES ('$id_matkul','$id_mahasiswa','$nilai_matkul','$hasil','$surat_rekomendasi')";
        
    }
    else if($no_file == 5){
        $nid = $data['nid'];
        $namaLengkap = $data['nama-dosen'];
        $id_matkul = $data['namaMatkul'];

        // Validasi agr dosen tdk registrasi lebih dri 1X
        $result = mysqli_query($conn, "SELECT * FROM tb_dosen WHERE nid='$nid'");
        if(mysqli_num_rows($result) > 0){
            echo "
            <script>
                alert('Maaf Anda sudah Registrasi sebelumnya!);
            </script>
        ";
        return false;
        }

        $query = "INSERT INTO tb_dosen (id_matkul, nid, namaLengkap) VALUES ('$id_matkul','$nid','$namaLengkap')";

    }
    else{
        return false;
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update ($data, $no_file){
    global $conn;

    // 2. Mata Kuliah
    // 3. Mahasiswa/Peserta
    // 4. Input Nilai Tes Asdos
    // 5. Serahkan Surat Rekomendasi ke PESERTA/MAHASISWA


    if($no_file == 2){
        
    $id_matkul = $data['id_matkul'];
    $kodeMatkul = $data['kode-mata-kuliah'];
    $namaMatkul = mysqli_real_escape_string($conn, stripslashes($data['nama-mata-kuliah']));
    $semesterBaru = $data['semesterBaru'];    
    $jumlahKelas = $data['jumlah-kelas'];

    $result = mysqli_query($conn, "SELECT * FROM tb_matkul WHERE kode_matkul='$kodeMatkul'");

    if(mysqli_num_rows($result) > 1){
        echo "
                    <script>
                        alert('Maaf Kode Mata Kuliah tidak boleh lebih dari 1');
                    </script>
                ";
                return false;
    }

    if(!$semesterBaru){
        $semester = $data['semesterLama'];
    }else{
        $semester = $semesterBaru;
    }

    $query = "UPDATE tb_matkul SET 
                    kode_matkul='$kodeMatkul',
                    nama_matkul='$namaMatkul',
                    semester='$semester',                    
                    jumlah_kelas='$jumlahKelas'
                    WHERE id_matkul='$id_matkul'";
    }else if($no_file ==  3){
        $id_mahasiswa = $data['id_mahasiswa'];
        $namaMahasiswa = mysqli_real_escape_string($conn, stripslashes($data['nama-mahasiswa']));
        $nimBaru = $data['nimBaru'];
        $nimLama = $data['nimLama'];
        $semesterBaru = $data['semesterBaru'];
        $ipk = $data['ipk'];
        $noTelpon = $data['noTelpon'];

        $result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim='$nimBaru'");
        // Validasi agr Nim baru yg di Input tdk sama dgn nim yg sdh trdftr sebelumnya
        if(mysqli_num_rows($result) > 0 && $nimBaru !=$nimLama){
            echo "
            <script>
                alert('Maaf Nim yang Anda input sudah terdaftar sebelumnya');
            </script>
        ";
        return false;   
        }

          // Validasi agr inputan nilai tdk lebih dari 4.00
          if($ipk > 4.00){
            echo "
            <script>
                alert('Nilai Anda melebihi dari nilai Maksimal !');
            </script>
        ";
        return false;
        }

        if(!$semesterBaru){
            $semester = $data['semesterLama'];
        }else{
            $semester = $semesterBaru;
        }

        if(!$nimBaru){
            $nim = $nimLama;
        }else{
            $nim = $nimBaru;
        }

        $query = "UPDATE tb_mahasiswa SET                            
                            namaLengkap='$namaMahasiswa',
                            nim='$nim',
                            semester='$semester',
                            ipk='$ipk',
                            noTelpon='$noTelpon'
                            WHERE id_mahasiswa='$id_mahasiswa'";
        
    }
 
    else if($no_file == 5){
        $id_mahasiswa = $data;
        $surat = upload($no_file);

    $query = "UPDATE tb_mahasiswa SET suratRekomendasi='$surat' WHERE id_mahasiswa='$id_mahasiswa'";
    }
    else{
        return false;
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload($no_file){

    // 4. Daftar Asdos
    // 5. Dosen Serahkan Surat Rekomendasi ke Mahasiswa

    $namaFile = $_FILES['surat']['name'];
    $ukuranFile = $_FILES['surat']['size'];
    $tmpFile = $_FILES['surat']['tmp_name'];
    // $error = $_FILES['gambar']['error'];

    // Validasi agr file harus pdf
        $ekstensiValid = ["pdf"];
        $ekstensiPdf = explode(".", $namaFile);
        $ekstensiPdf = strtolower(end($ekstensiPdf));
        if (!in_array($ekstensiPdf, $ekstensiValid)) {
            echo "<script>
                    alert('File harus Ber-Ekstensi pdf');
                    </script>
                ";
            return false;
        }    

    // validasi size
    if ($ukuranFile > 10000000) {
        echo "<script>
                alert('Ukuran file terlalu besar');
                </script>
            ";
        return false;
    }

    if($no_file == 4){
        $fileDIR = "images/suratRekomDaftar/";
    }
    else if($no_file == 5){
        $fileDIR = "images/suratRekomendasi/";
    }

// acak nama file foto biar tidak ada yang sama trus sambun dgn ekstensi foto
$namaPdfBaru = uniqid();
$namaPdfBaru .= ".";
$namaPdfBaru .= $ekstensiPdf;

$fileUpload = $fileDIR . basename($namaPdfBaru);

// ambil foto dari server lalu pindahkan ke $fileupload yg isiny folder 
move_uploaded_file($tmpFile, $fileUpload);
return $namaPdfBaru;

}

function delete($id, $no_file){

    global $conn;
    // 2. Mata Kuliah
    // 3. Mahasiswa/Peserta

    if($no_file == 2){
        $id_matkul = $id;
        $query = "DELETE FROM tb_matkul WHERE id_matkul='$id_matkul'";
    }else if($no_file == 3){
        $id_mahasiswa = $id;
        $query = "DELETE FROM tb_mahasiswa WHERE id_mahasiswa = '$id_mahasiswa'";
    }
    else{
        return false;
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


?>