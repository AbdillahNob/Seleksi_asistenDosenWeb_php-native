-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2024 at 10:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_asistendosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `ipk` decimal(10,2) NOT NULL,
  `suratRekomendasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(40) NOT NULL,
  `semester` int(10) NOT NULL,
  `jadwalTes` datetime NOT NULL,
  `jumlah_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilaiMatkul` decimal(10,2) NOT NULL,
  `nilaiUjian` decimal(10,1) NOT NULL,
  `nilaiWawancara` decimal(10,1) NOT NULL,
  `nilaiTotalTes` decimal(10,1) NOT NULL,
  `hasil` enum('belum_ada','lulus') NOT NULL DEFAULT 'belum_ada',
  `suratRekomendasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nomor`, `username`, `password`, `status`) VALUES
(10, 123, 'daffa', '$2y$10$bJHxepvHYATZZhLAa/L8E.6V/0H8YQS63ymV0JNgID3xoR.kYXMrO', 'admin'),
(11, 202300, 'abdillah', '$2y$10$i9mLD2GXViLyDApRdr12zuVUuo9Iqv6D4VKwa89eiSCSYt15aZSSe', 'mahasiswa'),
(12, 202310, 'mande', '$2y$10$4SbEUOEN8t2wCzV8cfFmn.VNnRgRU79m3kq22JMOUZ/mCgFks4Jhi', 'mahasiswa'),
(13, 202301, 'andi aini', '$2y$10$1x8bBmnFUVTJleKeQGaCi.Tdw3eU/dwdnTB5QM1WDbA0hbL1Gf1Wi', 'mahasiswa'),
(14, 111, 'komang', '$2y$10$l9Rn7Zex4HnaVdW0O0GxGOXXcxn3R45BpTqO0wQj2GHWADUrRHTJG', 'dosen'),
(15, 202304, 'habibi', '$2y$10$uETYbqyTR8LJavcgqh6CcuyFkzWlhIztMRu.noVHfcol24czeZB0C', 'mahasiswa'),
(18, 202110, 'jusma', '$2y$10$DoJ2g6zFY3p.lLr66xdNG.M20jiEw5Njy6ZOj1b7nVFi0bEMrMCA6', 'mahasiswa'),
(19, 202308, 'oka', '$2y$10$zweZfe8xtJLFFzwWAKvey.JncuW6SVQpyI84TuRBB7qQcmHbgqzRu', 'mahasiswa'),
(20, 202305, 'meyye', '$2y$10$IcKqr..4EVBssIzFbmERsOf0aeXTG8ZzLl3KpVESwzIEbQjU805B.', 'mahasiswa'),
(21, 198100, 'hanna ', '$2y$10$VJ6AMU5Gux1qJJaBhfbz3OvUlLYtDllNEtxDyFDdtMmRbLd1L.iCW', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_user` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD CONSTRAINT `tb_penilaian_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
