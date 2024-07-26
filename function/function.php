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

    }else{
        return false;
    }

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>