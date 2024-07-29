<?php 
session_start();

if(!isset($_SESSION['halaman'])){
    echo"
        <script>
            window.location.replace('index.php');
        </script>
    ";
}

$nomor = $_SESSION['nomor'];
$conn = mysqli_connect('localhost','root','','db_asistendosen');
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor='$nomor'");
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>Seleksi Asisten Dosen Universitas Dipa Makassar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/Logo-Universitas-Dipa-Makassar.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Icon FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <style>
    .upper {
        text-transform: uppercase;
        color: white;
    }
    </style>

</head>

<body>


    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="nav-header">
            <div class="brand-logo">
                <a href="#">
                    <span class="nav-text">
                        <h4 class="upper"><?= $row['status'] ?></h4>
                    </span>
                </a>
            </div>
        </div>

        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-right">

                    <li class="icons dropdown">
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <span class="activity active"></span>
                            <img src="images/user/1.png" height="40" width="40" alt="">
                        </div>
                        <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>

                                    <li><a href="logOut.php" onclick="return confirm('Yakin Mau Keluar ?')"><i
                                                class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label"><?= $row['username'] ?></li>
                    <?php if($row['status'] == 'mahasiswa') : ?>
                    <li>
                        <a class="has-arrow" href="jadwalTes.php" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Jadwal Tes</span>
                        </a>
                    </li>
                    <?php endif; ?>

                    <?php if($row['status'] !== 'mahasiswa') : ?>
                    <li>

                        <a class="has-arrow" href="dashboard.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <li class="nav-label">Fitur Aplikasi</li>
                    <li><a class="has-arrow" href="dataPeserta.php" aria-expanded="false">
                            <i class="fa-solid fa-users"></i><span class="nav-text">Peserta Asdos</span>
                        </a>

                    </li>
                    <?php endif; ?>
                    <?php if($row['status'] == 'admin') : ?>
                    <li>
                        <a class="has-arrow" href="mataKuliah.php" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Mata Kuliah</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="penilaian.php" aria-expanded="false"><i
                                class="fa-solid fa-bookmark"></i><span class="nav-text">Penilaian</span></a>
                    </li>
                    <?php endif; ?>

                    <li><a href="logOut.php" onclick="return confirm('Yakin Mau Keluar')"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i><span class="nav-text">Log
                                Out</span></a></li>

                </ul>
            </div>
        </div>