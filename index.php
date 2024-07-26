<?php 

if(isset($_POST['login'])){

    echo"
    <script type='text/javascript'>
        setTimeout(function () {
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Login',
                icon: 'success',
                timer: '3200',
                showConfirmButton: false
            });
        },10);
        window.setTimeout(function(){
            window.location.replace('dashboard.php');
        },2500);
    </script>
";

}


?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta na me="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
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
                                        <input type="email" class="form-control" name="password"
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
                                            <option value="admin">admin</option>

                                        </select>
                                    </div>

                                    <button class="btn login-form__btn submit w-100" type="submit"
                                        name="login">Login</button>
                                </form>
                                <p class="mt-5 login-form__footer">Anda sudah punya Akun? <a href="page-register.html"
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