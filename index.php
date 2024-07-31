<?php 
require 'function/function.php';

session_start();

// Jika Login tapi belum LogOut
if(isset($_SESSION['halaman'])){
    echo"
        <script>
            window.location.replace('dashboard.php');
        </script>
    ";
}



if(isset($_POST['login']) && isset($_POST['status']) ){

    $username = $_POST['username'];    
    $result = view("SELECT * FROM tb_user WHERE username='$username'");

    // 1. Validasi Username
    if(mysqli_num_rows($result) > 0){
        $status = $_POST['status'];        
        $row = mysqli_fetch_assoc($result);

        // 2. Validasi status
        if($status == $row['status']){  
            $password = $_POST['password'];

            // 3. Validasi Password
            if(password_verify($password, $row['password'])){
                $_SESSION['nomor'] =  $row['nomor'];
                $_SESSION['halaman'] = true;
            
                echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Berhasil Login',
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

            // 3. End Validasi Password
            }else{
                echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Password Anda Salah!',
                            icon: 'warning',
                            timer: '3200',
                            showConfirmButton: false
                        });
                    },10);
                    window.setTimeout(function(){
                        window.location.replace('index.php');
                    },1500);
                </script>
                ";
            }
                  
        //2. End Validasi Status
        }else{
            echo"
            <script type='text/javascript'>
                setTimeout(function () {
                    Swal.fire({
                        title: 'INFO',
                        text: 'Status Anda Salah!',
                        icon: 'warning',
                        timer: '2200',
                        showConfirmButton: false
                    });
                },10);
                window.setTimeout(function(){
                    window.location.replace('index.php');
                },2000);
            </script>
            ";
        }
                
    //1. End Validasi Username 
    }else{
              
        echo"
        <script type='text/javascript'>
            setTimeout(function () {
                Swal.fire({
                    title: 'INFO',
                    text: 'Maaf username Anda belum terdaftar !',
                    icon: 'warning',
                    timer: '3200',
                    showConfirmButton: false
                });
            },10);
            window.setTimeout(function(){
                window.location.replace('index.php');
            },2500);
        </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta na me="viewport" content="width=device-width,initial-scale=1">
    <title>Seleksi Asisten Dosen Universitas Dipa Makassar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/Logo-Universitas-Dipa-Makassar.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
    /* CSS Kustom untuk select */
    .custom-select {
        background-color: #007bff;
        /* Warna latar belakang */
        color: white;
        /* Warna teks */
        border: 1px solid #007bff;
        /* Warna border */
    }

    .custom-select option {
        background-color: #007bff;
        /* Warna latar belakang untuk opsi */
        color: white;
        /* Warna teks untuk opsi */
    }

    .custom-select option:hover {
        background-color: #0056b3;
        /* Warna latar belakang saat hover */
    }
    </style>

</head>

<body class="h-100">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html">
                                    <h4>Seleksi Asisten Dosen</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Masukkan Username Anda">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Masukkan Password Anda">
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select" name="status">
                                            <option selected disabled>Status</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="admin">Admin</option>

                                        </select>
                                    </div>

                                    <button class="btn login-form__btn submit w-100" type="submit"
                                        name="login">Login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Anda sudah punya Akun? <a href="register.php"
                                        class="text-primary">Register Akun</a> sekarang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

</body>

</html>