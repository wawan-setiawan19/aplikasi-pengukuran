-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 07:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_pengukuran`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_pengajuan`, `file`, `tgl_upload`, `status`, `keterangan`) VALUES
(3, 3, 'uploads/Ujang Bustomi/Ujang Bustomi_KTP.png', '2023-06-05', 'VALID', 'KTP'),
(4, 3, 'uploads/Ujang Bustomi/Ujang Bustomi_KK.png', '2023-06-05', 'VALID', 'KK');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tanah` int(11) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `status_permohonan` varchar(50) NOT NULL,
  `tgl_permohonan` date NOT NULL,
  `tgl_ambil_sertipikat` date NOT NULL,
  `status_hak_tanah` varchar(50) NOT NULL,
  `tgl_survey` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_user`, `id_tanah`, `id_petugas`, `status_permohonan`, `tgl_permohonan`, `tgl_ambil_sertipikat`, `status_hak_tanah`, `tgl_survey`) VALUES
(3, 2, 7, 'PTG002', 'DONE', '2023-05-30', '2023-06-22', 'Hak Pakai', '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nomor_petugas` varchar(30) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akumlasi_beban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nomor_petugas`, `nama_petugas`, `password`, `akumlasi_beban`) VALUES
('PTG002', 'Dadang Kusnandang', '$2y$10$lfi2XLzRmJn5ojkYBN3CbeO.bPYxrbVIVTdPZzaAGWU', 0),
('PTG003', 'Ronelio', '$2y$10$qiNntFn2OJdfgeITk.Y4Zu0mkIc94DGlheoIw8DL2MC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `id_user`, `waktu`, `keterangan`) VALUES
(1, 2, '2023-04-26 14:32:26', 'INPUT TANAH SUDAH BERHASIL'),
(4, 2, '2023-05-30 09:44:44', 'PENGAJUAN DALAM PENINJAUAN'),
(5, 2, '2023-06-05 17:11:10', 'UPLOAD BERKAS KTP DIAJUKAN'),
(6, 2, '2023-06-05 17:13:16', 'UPLOAD BERKAS KTP DIAJUKAN'),
(7, 2, '2023-06-05 17:26:39', 'UPLOAD BERKAS KK DIAJUKAN'),
(8, 2, '2023-06-05 17:59:49', 'PROSES UKUR DIMULAI'),
(9, 2, '2023-06-05 18:02:28', 'PROSES UKUR DIMULAI'),
(11, 2, '2023-06-05 18:27:08', 'BERKAS SUDAH DIVALIDASI'),
(12, 2, '2023-06-05 18:49:25', 'PROSES UKUR DIMULAI'),
(13, 2, '2023-06-05 18:52:28', 'PROSES UKUR DIMULAI'),
(14, 2, '2023-06-05 19:01:09', 'ANDA DAPAT MENGAMBIL SERTIPIKAT PADA TANGGAL 2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tanah`
--

CREATE TABLE `tanah` (
  `id_tanah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `status_tanah` varchar(50) NOT NULL,
  `jenis_tanah` varchar(50) NOT NULL,
  `luas_tanah` double NOT NULL,
  `batas_utara` varchar(50) NOT NULL,
  `batas_selatan` varchar(50) NOT NULL,
  `batas_barat` varchar(50) NOT NULL,
  `batas_timur` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tanah`
--

INSERT INTO `tanah` (`id_tanah`, `id_user`, `nama_pemilik`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `status_tanah`, `jenis_tanah`, `luas_tanah`, `batas_utara`, `batas_selatan`, `batas_barat`, `batas_timur`, `tgl_input`) VALUES
(7, 2, 'Ujang Bustomi', 'Jalan Pegambiran', 'Gamping', 'Campur Darat', 'Kabupaten Tulungagung', 'Jawa Timur', 'Hak Pakai', 'Tanah Bangunan', 100, 'Kebon Kelapa', 'Parit', 'Kebun Singkong', 'Sungai Cimanuk', '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `nik`, `role`, `password`, `nama`) VALUES
(1, 'admin', 'admin@gmail.com', '3171065009101006', 'admin', '$2y$10$RDBBuGfB3H5EBGTx8riO7uAdmSzcO8xqJ4Ux6UuPjjJENClBsaNb.', 'Administrator'),
(2, 'jajangnur', 'jajang@gmail.com', '1671061206100009', 'user', '$2y$10$WHIZRXglJxneCbVpC27haOX.hjBe6UovFlqjxrfMKAGrKIYp0PbC.', 'Jajang Nurjaman'),
(6, 'ukur1', 'ukur1@gmail.com', '3209400090900000', 'user', '$2y$10$Z9FXU4K0VS2GJ6RwlnInbuQwE5MFL4dK4P2/OIDoSTLbno94Z/o9C', 'Petugas Ukur 1'),
(7, 'test', 'test@gmail.com', '1671061206100009', 'user', '$2y$10$5et/IrHVazSWUOlQKGKHmeVntAsDxynJzzdfLMddY3kwqX7sjLgVe', 'Testing'),
(8, 'tes2', 'tes2@gmail.com', '43876789898900009', 'user', '$2y$10$cGHMPDmLXyFLrqhgdTcqLe7tz/QJjnX3uGDfuV5hYnejXkPT3/ZqS', 'testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nomor_petugas`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tanah`
--
ALTER TABLE `tanah`
  ADD PRIMARY KEY (`id_tanah`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tanah`
--
ALTER TABLE `tanah`
  MODIFY `id_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
