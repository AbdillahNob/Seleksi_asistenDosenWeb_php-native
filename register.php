<?php 

require 'function/function.php';


if(isset($_POST['submit']) && isset($_POST['status'])){

    $no_file = $_GET['no_file'];
    $password = $_POST['password'];
    $rePassword = $_POST['rePassword'];
    $nomor = $_POST['nomor'];

    // 1. Validasi Konfirmasi Password
    if($password === $rePassword ){

        $resultN = view("SELECT * FROM tb_user WHERE nomor='$nomor'");
        // 2. Validasi agr Nim/Nid hanya blh 1 atau nim yg di input sdh di daftar sebelumnya.
        if(mysqli_num_rows($resultN) == 0){
                        
            // 3. Validasi Insert dan perintah masukkan Data
            if(insert($_POST, $no_file) > 0){
                echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Berhasil Register Akun',
                            icon: 'success',
                            timer: '3200',
                            showConfirmButton: false
                        });
                    },10);
                    window.setTimeout(function(){
                        window.location.replace('index.php');
                    },2000);
                </script>
                ";

            // 3. End Validasi dan perintah Insert 
            }else{
                echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Gagal Register Akun',
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
            
        // 2. End Validasi Nim/Nid
        }else{
            echo"
                <script type='text/javascript'>
                    setTimeout(function () {
                        Swal.fire({
                            title: 'INFO',
                            text: 'Nim/Nid anda sudah terdaftar sebelumnya',
                            icon: 'warning',
                            timer: '3200',
                            showConfirmButton: false
                        });
                    },10);
                    window.setTimeout(function(){
                        window.location.replace('register.php');
                    },2500);
                </script>
                ";
        }

    // 1. End Validasi Konfirmasi Password  
    }else{
        echo"
            <script type='text/javascript'>
                setTimeout(function () {
                    Swal.fire({
                        title: 'INFO',
                        text: 'Konfirmasi Password anda salah!',
                        icon: 'warning',
                        timer: '3200',
                        showConfirmButton: false
                    });
                },10);
                window.setTimeout(function(){
                    window.location.replace('register.php');
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
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/Logo-Universitas-Dipa-Makassar.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <style>
    .small-text {
        color: red;
    }
    </style>

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->





    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href="index.html">
                                    <h4>Register Akun Anda</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" action="?no_file=1" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Buat Username Anda"
                                            name="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Buat Nim/Nid Anda"
                                            name="nomor" required>
                                        <small class="small-text">Nim untuk Mahasiswa dan Nid utk Dosen</small>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Buat Password Anda"
                                            name="password" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control"
                                            placeholder="Konfirmasi Password Anda" name="rePassword" required>
                                    </div>

                                    <div class="form-group">
                                        <select class="custom-select" name="status">
                                            <option selected disabled>Status</option>
                                            <option value="mahasiswa">Mahasiswa</option>
                                            <option value="dosen">Dosen</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" name="submit">Sign in</button>
                                </form>
                                <p class="mt-5 login-form__footer">Have account <a href="index.php"
                                        class="text-primary">Sign Up </a> now</p>
                                </p>
                            </div>
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