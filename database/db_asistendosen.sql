-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2025 at 05:02 AM
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
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `id_matkul`, `nid`, `namaLengkap`) VALUES
(3, 11, 222, 'aprizal'),
(6, 10, 11223344, 'Dr. Ahmad ST., MT'),
(7, 12, 12345, 'Indo Intan ST., MT'),
(8, 11, 123456, 'DR. Nasaruddin SE ., MM.'),
(9, 9, 112345, 'Dr. Abdul Rauf SH., MH.');

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
  `noTelpon` varchar(11) NOT NULL,
  `suratRekomendasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `nim`, `namaLengkap`, `semester`, `ipk`, `noTelpon`, `suratRekomendasi`) VALUES
(49, 202300, 'Abdillah P Al-Iman', '9', 3.70, '08229195233', ''),
(50, 202305, 'Andi Meiyati', '3', 3.00, '08276589033', ''),
(51, 233100, 'Muh.Khoilulah', '3', 3.60, '08288966510', ''),
(52, 198100, 'Hanna Ishikawa', '5', 3.90, '08288966510', '66c70e4c1e6e4.pdf'),
(53, 202304, 'Muh.habibi Putra Al-Iman', '3', 3.59, '08234640917', '66c70e53310ab.pdf'),
(55, 202301, 'Andi Aini', '3', 3.89, '08276589033', ''),
(56, 213054, 'ratih andini', '5', 4.00, '08214566790', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(20) NOT NULL,
  `nama_matkul` varchar(40) NOT NULL,
  `semester` int(10) NOT NULL,
  `jumlah_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `semester`, `jumlah_kelas`) VALUES
(9, 'P1042-T', 'PRAK.ALGORITMA DAN PEMROGRAMAN', 1, 9),
(10, 'E2011-T', 'Prak.Elektronika Analog', 1, 10),
(11, 'K1212-T', 'Prak. PTI dan PLA', 1, 10),
(12, 'E3021-T', 'Prak.Elektronika Digital', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaranasdos`
--

CREATE TABLE `tb_pendaftaranasdos` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `nilaiMatkul` text NOT NULL,
  `hasil` text NOT NULL DEFAULT 'belum_ada',
  `suratRekomendasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pendaftaranasdos`
--

INSERT INTO `tb_pendaftaranasdos` (`id_pendaftaran`, `id_matkul`, `id_mahasiswa`, `nilaiMatkul`, `hasil`, `suratRekomendasi`) VALUES
(40, 9, 55, 'A-', 'LULUS', '6702a1300d8cd.pdf'),
(41, 11, 55, 'A', 'LULUS', '6702a9cfc76a2.pdf'),
(42, 11, 49, 'B+', 'LULUS', '6702ab0485c61.pdf'),
(44, 9, 52, 'A', 'LULUS', '676033f568292.pdf'),
(46, 9, 49, 'D', 'TIDAK LULUS', '6760e71c5b300.pdf'),
(47, 9, 56, 'A-', 'LULUS', '6760f46a13b60.pdf'),
(48, 9, 53, 'B', 'LULUS', '6760f49b8e875.pdf'),
(49, 9, 50, 'D', 'TIDAK LULUS', '6760f693e5aa4.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratrekomendasi`
--

CREATE TABLE `tb_suratrekomendasi` (
  `id_surat` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `suratRekomendasi` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_suratrekomendasi`
--

INSERT INTO `tb_suratrekomendasi` (`id_surat`, `id_mahasiswa`, `id_dosen`, `id_matkul`, `suratRekomendasi`) VALUES
(17, 49, 3, 11, '6702a0ea34142.pdf'),
(22, 55, 3, 11, '6702a0d8a066d.pdf'),
(24, 56, 9, 9, '6760dfc31a11e.pdf'),
(27, 52, 9, 9, '6760dfc7da47b.pdf'),
(28, 52, 6, 10, '6760dffcd4aa0.pdf'),
(29, 52, 3, 11, '6760e02452eb4.pdf'),
(30, 52, 7, 12, '6760e04cd633f.pdf'),
(31, 49, 9, 9, '6760e54d6adb8.pdf'),
(32, 53, 9, 9, '6760f489ee855.pdf'),
(33, 50, 9, 9, '6760f67604720.pdf');

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
(21, 198100, 'hanna ', '$2y$10$VJ6AMU5Gux1qJJaBhfbz3OvUlLYtDllNEtxDyFDdtMmRbLd1L.iCW', 'mahasiswa'),
(23, 233100, 'lulu', '$2y$10$M5TANAUR.t/hLR2lTAEhvOsMOlMaMpizLnvCIt9eWyKZ1GKrvCIvi', 'mahasiswa'),
(24, 222, 'aprizal', '$2y$10$491WS0CdAtIRNv5Q7APTQeS5FldIAAWS7lHHq8.I9dnfcJtEFGp3m', 'dosen'),
(25, 333, 'koro', '$2y$10$LYepe0ASvHjF6a76wgoc2uC7Hm5HOmVR60RkpX93MObk0dRj7K4mS', 'dosen'),
(26, 888, 'najwar', '$2y$10$BQWco/LLkQcBajFuUDnNueyypPaOQpHc0BRFIoMWPfqwl5/bCnyri', 'dosen'),
(27, 11223344, 'ahmad', '$2y$10$CSQ9MR5wPbImHQLDMJFNUOtALwnjSNxLcRLg2GOBhLkyHdFBvie2u', 'dosen'),
(28, 12345, 'intan', '$2y$10$8DLYw0nBsByboceKyMvCAOwIPc6NZ0BT9I6pk4vh7fa3l6NCcmly6', 'dosen'),
(29, 123456, 'nasaruddin', '$2y$10$B6U/a79MdF4w2WrnO/AGdujG1s9VsJeB/TSi/gbnXKYSlg/wkk5MC', 'dosen'),
(30, 112345, 'rauf', '$2y$10$UfWEYnhufQeqzBLIIH0Zyu74BET0GqILsJ5i2kQYDOB3p3LfsdJlK', 'dosen'),
(31, 213054, 'ratih', '$2y$10$YiWYTji2y2QzFul/N/lvbu2XSeQqKOIkkMRsyIOyT1m9jtInv.bH.', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nid` (`nid`),
  ADD KEY `id_matkul` (`id_matkul`);

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
  ADD PRIMARY KEY (`id_matkul`),
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `tb_pendaftaranasdos`
--
ALTER TABLE `tb_pendaftaranasdos`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tb_suratrekomendasi`
--
ALTER TABLE `tb_suratrekomendasi`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_matkul` (`id_matkul`);

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
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_pendaftaranasdos`
--
ALTER TABLE `tb_pendaftaranasdos`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_suratrekomendasi`
--
ALTER TABLE `tb_suratrekomendasi`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`nid`) REFERENCES `tb_user` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tb_user` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pendaftaranasdos`
--
ALTER TABLE `tb_pendaftaranasdos`
  ADD CONSTRAINT `tb_pendaftaranasdos_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pendaftaranasdos_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_suratrekomendasi`
--
ALTER TABLE `tb_suratrekomendasi`
  ADD CONSTRAINT `tb_suratrekomendasi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tb_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratrekomendasi_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `tb_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_suratrekomendasi_ibfk_3` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
