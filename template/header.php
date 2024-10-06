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
$conn = mysqli_connect("localhost","root","","db_asistendosen");
$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE nomor='$nomor'");
$row = mysqli_fetch_assoc($result);


// utk mendeteksi apkh nim mahasiswa ini sdh Registrasi 
$query_mahasiswa = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim='$nomor'");
$rowM = mysqli_fetch_assoc($query_mahasiswa);

// untuk mendeteksi apkh nid dosen ini sudah registrasi
$query_dosen = mysqli_query($conn,"SELECT * FROM tb_dosen WHERE nid='$nomor'");
$rowD = mysqli_fetch_assoc($query_dosen);

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
                    <?php if($row['status'] == 'mahasiswa' && mysqli_num_rows($query_mahasiswa) > 0): ?>


                    <?php endif; ?>
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
                    <li class="nav-label">Hello, <?= $row['username'] ?></li>

                    <li>

                        <a class="has-arrow" href="dashboard.php" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>

                    </li>
                    <li class="nav-label">Fitur Aplikasi</li>
                    <?php if($row['status'] == 'mahasiswa') : ?>
                    <li>
                        <a class="has-arrow" href="registrasiMahasiswa.php" aria-expanded="false">
                            <i class="fas fa-user-shield"></i><span class="nav-text">Registrasi</span>
                        </a>
                    </li>
                    <!-- Jika Nomor/NIM yang login sdh regitrasi -->
                    <?php if(mysqli_num_rows($query_mahasiswa) > 0):?>
                    <li>
                        <a class="has-arrow" href="listDaftarAsdos.php?id_mahasiswa=<?= $rowM['id_mahasiswa']; ?>"
                            aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Daftar Asdos</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if($row['status'] == 'dosen'): ?>
                    <li><a class="has-arrow" href="registrasiDosen.php" aria-expanded="false">
                            <i class="fas fa-user-shield"></i><span class="nav-text">Registrasi</span>
                        </a>

                    </li>
                    <?php endif; ?>
                    <?php if($row['status'] == 'dosen' && mysqli_num_rows($query_dosen)> 0) : ?>
                    <li><a class="has-arrow" href="pengumuman.php?id_matkul=<?= $rowD['id_matkul'] ?>"
                            aria-expanded="false">
                            <i class="fa-solid fa-users"></i><span class="nav-text">Lihat Peserta Anda</span>
                        </a>

                    </li>

                    <li><a class="has-arrow"
                            href="serahkanRekomendasi.php?status=<?= $row['status'] ?>&&id_dosen=<?= $rowD['id_dosen'] ?>"
                            aria-expanded="false">
                            <i class="fas fa-paste"></i><span class="nav-text">Surat Rekomendasi</span>
                        </a>

                    </li>
                    <?php endif; ?>
                    <?php if($row['status'] == 'admin'): ?>
                    <li><a class="has-arrow" href="dataPeserta.php?status=<?= $row['status'] ?>" aria-expanded="false">
                            <i class="fas fa-user"></i><span class="nav-text">Lihat Peserta</span>
                        </a>

                    </li>
                    <?php endif; ?>
                    <?php if($row['status'] == 'admin') : ?>
                    <li>
                        <a class="has-arrow" href="mataKuliah.php" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Mata Kuliah</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="daftarAsdos.php" aria-expanded="false"><i
                                class="fa-solid fa-bookmark"></i><span class="nav-text">Daftar Asdos</span></a>
                    </li>
                    <?php endif; ?>

                    <li><a href="logOut.php" onclick="return confirm('Yakin Mau Keluar')"><i
                                class="fa-solid fa-arrow-right-from-bracket"></i><span class="nav-text">Log
                                Out</span></a></li>

                </ul>
            </div>
        </div>