-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 09:12 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id` int(11) NOT NULL,
  `bobot` varchar(50) DEFAULT NULL,
  `nilai` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`id`, `bobot`, `nilai`) VALUES
(1, 'Bobot Masa Kerja', 0.7),
(2, 'Bobot Tingkat Pendidikan', 4),
(3, 'Bobot Pengalaman Kerja', 0.65),
(4, 'Bobot Kelompok Kerja', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id` int(11) NOT NULL,
  `pegawai` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `skor_masakerja` double NOT NULL,
  `skor_tingkatpendidikan` double NOT NULL,
  `skor_pengalamankerja` double NOT NULL,
  `skor_kelompokkerja` double NOT NULL,
  `skor_total` double NOT NULL,
  `pengali` double NOT NULL,
  `gaji_pokok` double NOT NULL,
  `tunjangan` double NOT NULL,
  `total_gaji` double NOT NULL,
  `tanggal_simpan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id`, `pegawai`, `nama`, `skor_masakerja`, `skor_tingkatpendidikan`, `skor_pengalamankerja`, `skor_kelompokkerja`, `skor_total`, `pengali`, `gaji_pokok`, `tunjangan`, `total_gaji`, `tanggal_simpan`) VALUES
(9, 1, 'Rohman', 0.35, 4, 0.65, 1.5, 6.5, 102500, 666250, 6841000, 7507250, '2020-01-04'),
(10, 2, 'Suryanti', 0.35, 4, 0.65, 1, 6, 102500, 615000, 5700001, 6315001, '2020-01-04'),
(11, 3, 'Atmojo', 0.35, 4, 0.65, 1, 6, 102500, 615000, 5832647, 6447647, '2020-01-04'),
(12, 1, 'Rohman', 0.35, 4, 0.65, 1.5, 6.5, 102500, 666250, 6841000, 7507250, '2020-01-06'),
(13, 2, 'Suryanti', 0.35, 4, 0.65, 1, 6, 102500, 615000, 5700001, 6315001, '2020-01-06'),
(14, 3, 'Atmojo', 0.35, 4, 0.65, 1, 6, 102500, 615000, 5832647, 6447647, '2020-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan_struktural`
--

CREATE TABLE `tb_jabatan_struktural` (
  `id` int(11) NOT NULL,
  `jabatan` text,
  `tunjangan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan_struktural`
--

INSERT INTO `tb_jabatan_struktural` (`id`, `jabatan`, `tunjangan`) VALUES
(1, 'Direktur Utama', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kel_kerja`
--

CREATE TABLE `tb_kel_kerja` (
  `id` int(11) NOT NULL,
  `kelompok` varchar(50) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `id_bobot` int(11) NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kel_kerja`
--

INSERT INTO `tb_kel_kerja` (`id`, `kelompok`, `rating`, `id_bobot`) VALUES
(1, 'Non Medis', 1, 4),
(2, 'Medis-non Paramedis', 1.5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_masa_kerja`
--

CREATE TABLE `tb_masa_kerja` (
  `id` int(11) NOT NULL,
  `masakerja` double DEFAULT NULL,
  `id_bobot` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_masa_kerja`
--

INSERT INTO `tb_masa_kerja` (`id`, `masakerja`, `id_bobot`) VALUES
(1, 0.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(11) NOT NULL,
  `nik` int(50) DEFAULT NULL,
  `nama_lengkap` text,
  `jenis_kelamin` text,
  `agama` text,
  `tempat_lahir` text,
  `tanggal_lahir` date DEFAULT NULL,
  `status_nikah` varchar(25) DEFAULT NULL,
  `masa_kerja` int(11) NOT NULL,
  `status_pegawai` int(11) NOT NULL,
  `jabatan_struktural` int(11) NOT NULL,
  `tunjangan_lain` int(11) NOT NULL,
  `kel_pekerjaan` int(11) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_diangkat` date DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `no_bpjs_kes` varchar(30) DEFAULT NULL,
  `no_bpjs_ketenag` varchar(30) DEFAULT NULL,
  `no_kk` varchar(20) DEFAULT NULL,
  `tingkat_pendidikan` int(11) NOT NULL,
  `pengalaman_kerja` varchar(10) DEFAULT NULL,
  `pkwt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `status_nikah`, `masa_kerja`, `status_pegawai`, `jabatan_struktural`, `tunjangan_lain`, `kel_pekerjaan`, `tanggal_masuk`, `tanggal_diangkat`, `no_ktp`, `no_bpjs_kes`, `no_bpjs_ketenag`, `no_kk`, `tingkat_pendidikan`, `pengalaman_kerja`, `pkwt`) VALUES
(1, 0, 'Rohman Asmara', 'Pria', 'Islam', 'Sidoarjo', '2017-01-01', 'Menikah', 1, 1, 1, 1, 2, '2018-02-02', '2019-03-03', '0123423', '124135', '123325', '2341241', 1, '1', 1),
(2, 0, 'Suryanti', 'Pria', 'Islam', 'Sidoarjo', '2019-12-10', 'Menikah', 1, 1, 1, 1, 1, '2019-12-12', '2019-12-05', '34235', '23523', '23524365', '235235', 1, '2', 1),
(3, 0, 'Atmojo', 'Pria', 'Islam', 'Sidoarjo', '2019-12-12', 'Belum Menikah', 1, 3, 1, 1, 1, '2019-12-27', '2019-12-22', '1242351', '32465436', '564375', '3456457', 1, '1', 1),
(4, 2019001, 'Ananda Rizki', 'Pria', 'Islam', 'Sidoarjo', '2020-01-03', 'Menikah', 1, 1, 1, 1, 1, '2020-01-03', '2020-01-14', '243254673', '3462345657', '345257457', '43265725', 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengalaman_kerja`
--

CREATE TABLE `tb_pengalaman_kerja` (
  `id` int(11) NOT NULL,
  `pengalaman` double DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `id_bobot` int(11) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengalaman_kerja`
--

INSERT INTO `tb_pengalaman_kerja` (`id`, `pengalaman`, `rating`, `id_bobot`) VALUES
(1, 0.7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkwt`
--

CREATE TABLE `tb_pkwt` (
  `id` int(11) NOT NULL,
  `nama` text,
  `gaji` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pkwt`
--

INSERT INTO `tb_pkwt` (`id`, `nama`, `gaji`) VALUES
(1, 'PKWT', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_status_pegawai`
--

CREATE TABLE `tb_status_pegawai` (
  `id` int(11) NOT NULL,
  `status` text,
  `tunjanganJHT` double DEFAULT NULL,
  `intensif` double DEFAULT NULL,
  `transport` double DEFAULT NULL,
  `makan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_status_pegawai`
--

INSERT INTO `tb_status_pegawai` (`id`, `status`, `tunjanganJHT`, `intensif`, `transport`, `makan`) VALUES
(1, 'Pegawai', 100000, 200000, 290000, 551000),
(2, 'PKWT', 0, 0, 0, 1),
(3, 'Magang', 21434, 35255, 23522, 52436);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkat_pendidikan`
--

CREATE TABLE `tb_tingkat_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` varchar(50) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  `id_bobot` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tingkat_pendidikan`
--

INSERT INTO `tb_tingkat_pendidikan` (`id`, `pendidikan`, `rating`, `id_bobot`) VALUES
(1, 'SD/SMP', 1, 2),
(2, 'SMA', 1.25, 2),
(3, 'D1', 1.45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunjangan_lain`
--

CREATE TABLE `tb_tunjangan_lain` (
  `id` int(11) NOT NULL,
  `tunjangan` text,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tunjangan_lain`
--

INSERT INTO `tb_tunjangan_lain` (`id`, `tunjangan`, `jumlah`) VALUES
(1, 'Anak', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jabatan_struktural`
--
ALTER TABLE `tb_jabatan_struktural`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kel_kerja`
--
ALTER TABLE `tb_kel_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_masa_kerja`
--
ALTER TABLE `tb_masa_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengalaman_kerja`
--
ALTER TABLE `tb_pengalaman_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pkwt`
--
ALTER TABLE `tb_pkwt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status_pegawai`
--
ALTER TABLE `tb_status_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tingkat_pendidikan`
--
ALTER TABLE `tb_tingkat_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tunjangan_lain`
--
ALTER TABLE `tb_tunjangan_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_jabatan_struktural`
--
ALTER TABLE `tb_jabatan_struktural`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kel_kerja`
--
ALTER TABLE `tb_kel_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_masa_kerja`
--
ALTER TABLE `tb_masa_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pengalaman_kerja`
--
ALTER TABLE `tb_pengalaman_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pkwt`
--
ALTER TABLE `tb_pkwt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_status_pegawai`
--
ALTER TABLE `tb_status_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tingkat_pendidikan`
--
ALTER TABLE `tb_tingkat_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tunjangan_lain`
--
ALTER TABLE `tb_tunjangan_lain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
