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
    // 3. Peserta Asdos/Mahasiswa

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
        $jadwalTes = $data['jadwal-tes'];
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
        $query = "INSERT INTO tb_matkul (kode_matkul, nama_matkul, semester, jadwalTes, jumlah_kelas) VALUES('$kode_mataKuliah','$nama_mataKuliah','$semester','$jadwalTes','$jumlahKelas')";


    }else if($no_file == 3){
        $namaMahasiswa = mysqli_real_escape_string($conn, stripslashes($data['nama-mahasiswa']));
        $nim = $data['nim'];
        $semester = $data['semester'];
        $ipk = $data['ipk'];

        $result = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim='$nim'");
        if(mysqli_num_rows($result) > 0 ){
            echo "
            <script>
                alert('Maaf Nim anda sudah terdaftar sebelumnya');
            </script>
        ";
        return false;
        }

        $query = "INSERT INTO tb_mahasiswa (nim, namaLengkap, semester, ipk) VALUES('$nim','$namaMahasiswa','$semester','$ipk')";
    }
    else if($no_file == 4){
        $id_mahasiswa = $data['id_mahasiswa'];
        $id_matkul = $data['id_matkul'];
        $nilai_matkul = $data['nilai-matkul'];

        // Validasi agr Peserta tdk mendaftar 2X pada MATKUL yang sama.
        $result = mysqli_query($conn, "SELECT * FROM tb_penilaian WHERE id_matkul='$id_matkul' AND id_mahasiswa='$id_mahasiswa'");
        if(mysqli_num_rows($result) > 0){
            echo "
            <script>
                alert('Maaf Anda hanya bisa mendaftar 1X pada mata kuliah ini');
            </script>
        ";
        return false;
        }
        if($nilai_matkul < 3.50){
            echo "
            <script>
                alert('Nilai Mata Kuliah Anda tidak memenuhi Standar !');
            </script>
        ";
        return false;
        }

        $query = "INSERT INTO tb_penilaian (id_matkul, id_mahasiswa, nilaiMatkul) VALUES ('$id_matkul','$id_mahasiswa','$nilai_matkul')";
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

    if($no_file == 2){
        
    $id_matkul = $data['id_matkul'];
    $kodeMatkul = $data['kode-mata-kuliah'];
    $namaMatkul = mysqli_real_escape_string($conn, stripslashes($data['nama-mata-kuliah']));
    $semesterBaru = $data['semesterBaru'];    
    $jadwalTes = $data['jadwal-tes'];
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
                    jadwalTes='$jadwalTes',
                    jumlah_kelas='$jumlahKelas'
                    WHERE id_matkul='$id_matkul'";
    }else if($no_file ==  3){
        $id_mahasiswa = $data['id_mahasiswa'];
        $namaMahasiswa = mysqli_real_escape_string($conn, stripslashes($data['nama-mahasiswa']));
        $nimBaru = $data['nimBaru'];
        $nimLama = $data['nimLama'];
        $semesterBaru = $data['semesterBaru'];
        $ipk = $data['ipk'];

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
                            ipk='$ipk' WHERE id_mahasiswa='$id_mahasiswa'";
        
    }
    else{
        return false;
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
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