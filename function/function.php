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


    }
    else{
        return false;
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function update ($data, $no_file){
    global $conn;

    // 1. Mata Kuliah

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
    }else{
        return false;
    }
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id_matkul, $no_file){

    global $conn;
    // 2. Mata Kuliah

    if($no_file == 2){
        $query = "DELETE FROM tb_matkul WHERE id_matkul='$id_matkul'";
    }else{
        return false;
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>