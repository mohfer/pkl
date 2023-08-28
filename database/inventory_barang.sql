-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 11:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `komponen` varchar(25) NOT NULL,
  `nama_komponen` varchar(25) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `perusahaan` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `tanggal`, `komponen`, `nama_komponen`, `jumlah`, `perusahaan`, `status`) VALUES
(84, 'Saturday, 26 August 2023, 22:10:18 WIB', 'Processor', 'Intel Core i9-13900K', 20, 'Dover', 'Keluar'),
(85, 'Saturday, 26 August 2023, 23:10:55 WIB', 'Processor', 'Intel Core i9-13900K', 20, 'IPSI', 'Masuk'),
(86, 'Saturday, 26 August 2023, 23:42:47 WIB', 'Processor', 'Intel Core i9-13900K', 10, 'IPSI', 'Masuk'),
(90, 'Sunday, 27 August 2023, 03:06:20 WIB', 'Processor', 'Intel Core i9-13900K', 50, 'IPSI', 'Keluar'),
(91, 'Sunday, 27 August 2023, 03:29:56 WIB', 'Processor', 'Intel Core i9-13900K', 50, 'IPSI', 'Masuk'),
(92, 'Sunday, 27 August 2023, 07:07:21 WIB', 'Processor', 'Intel Core i9-13900K', 20, 'Dover', 'Keluar'),
(93, 'Sunday, 27 August 2023, 08:36:54 WIB', 'Processor', 'Intel Core i9-13900K', 30, 'SMKIN', 'Keluar'),
(94, 'Sunday, 27 August 2023, 12:57:05 WIB', 'Processor', 'Intel Core i9-13900K', 50, 'Dover', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `jk` enum('Laki - Laki','Perempuan') NOT NULL,
  `divisi` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `password`, `nama`, `nip`, `jk`, `divisi`, `level`) VALUES
(9, 'andriant', '646d1e34eee57e93bbcbbbd3c56b511f', 'Andriant', 813716339733501689, 'Laki - Laki', 'IT', 'Karyawan'),
(10, 'heruprabawa', '217028c555ac3cf442f8ad2d89b97c37', 'Heru Prabawa', 502702989963636661, 'Laki - Laki', 'Engineering', 'Karyawan'),
(16, 'Erwin Susanto', 'd9efad9d91b435b3ad8a8854e3f150f5', 'Erwin Susanto', 901673287921250467, 'Laki - Laki', 'Marketing', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `tanggal_masuk` varchar(50) NOT NULL,
  `tanggal_proses` varchar(50) NOT NULL,
  `tanggal_selesai` varchar(50) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `keluhan` text NOT NULL,
  `solusi` text NOT NULL,
  `biaya` int(11) NOT NULL,
  `status` enum('0','Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `tanggal_masuk`, `tanggal_proses`, `tanggal_selesai`, `id_users`, `id_karyawan`, `keluhan`, `solusi`, `biaya`, `status`) VALUES
(106, 'Monday, 28 August 2023, 16:36:02 WIB', 'Monday, 28 August 2023, 16:36:44 WIB', '', 1, 16, 'Kok ngga ada fitur ubah password?', 'Iya nanti saya tambahin', 0, 'Proses'),
(107, 'Monday, 28 August 2023, 16:37:58 WIB', 'Monday, 28 August 2023, 16:38:09 WIB', '', 1, 16, 'Tolong Tambahin saya Komputer Spek Dewa!!!', '', 0, 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `komputer`
--

CREATE TABLE `komputer` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_processor` int(11) NOT NULL,
  `id_ram` int(11) NOT NULL,
  `id_storage` int(11) NOT NULL,
  `id_vga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komputer`
--

INSERT INTO `komputer` (`id`, `id_karyawan`, `id_processor`, `id_ram`, `id_storage`, `id_vga`) VALUES
(49, 9, 20, 40, 12, 6),
(50, 10, 22, 42, 5, 7),
(52, 16, 22, 42, 12, 17);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`id`, `nama`, `stok`) VALUES
(6, 'Intel Core i5-12400F', 10),
(10, 'Intel Core i3-13100', 25),
(17, 'Intel Core i3-12100', 20),
(19, 'Intel Core i5-3470', 20),
(20, 'Intel Core i7-3770', 10),
(21, 'Intel Core i7-13700', 10),
(22, 'Intel Core i9-13900K', 50);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `id` int(11) NOT NULL,
  `tipe_memori` enum('DDR2','DDR3','DDR4','DDR5') NOT NULL,
  `kapasitas` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`id`, `tipe_memori`, `kapasitas`, `stok`) VALUES
(22, 'DDR2', '2', 100),
(39, 'DDR3', '4', 100),
(40, 'DDR3', '8', 50),
(41, 'DDR4', '8', 32),
(42, 'DDR5', '16', 30),
(43, 'DDR2', '1', 100),
(44, 'DDR4', '16', 100);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `tipe`, `kapasitas`, `stok`) VALUES
(5, 'SSD', 512, 50),
(9, 'SSD', 256, 100),
(10, 'SSD', 128, 100),
(12, 'SSD', 1024, 100),
(13, 'HDD', 1024, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Mohamad Ferdiansyah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vga`
--

CREATE TABLE `vga` (
  `id` int(11) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `vram` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vga`
--

INSERT INTO `vga` (`id`, `brand`, `nama`, `vram`, `stok`) VALUES
(5, 'NVIDIA', 'RTX 2080Ti', 16, 0),
(6, 'NVIDIA', 'GTX 1660 Super', 6, 20),
(7, 'AMD', 'RX 6900XT', 16, 20),
(9, 'NVIDIA', 'GTX 1080Ti', 11, 10),
(10, 'NVIDIA', 'RTX 3090', 24, 10),
(11, 'NVIDIA', 'RTX 3080', 16, 20),
(12, 'NVIDIA', 'RTX 3070', 8, 20),
(13, 'NVIDIA', 'GTX 1660TI', 8, 10),
(14, 'AMD', 'RX 580', 8, 20),
(15, 'AMD', 'RX 6600XT', 8, 20),
(16, 'NVIDIA', 'RTX 3060', 8, 25),
(17, 'NVIDIA', 'RTX 4090', 24, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_karyawan` (`id_karyawan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `komputer`
--
ALTER TABLE `komputer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_karyawan_2` (`id_karyawan`),
  ADD KEY `id_karyawan` (`id_karyawan`,`id_processor`,`id_ram`,`id_storage`,`id_vga`),
  ADD KEY `id_processor` (`id_processor`),
  ADD KEY `id_ram` (`id_ram`),
  ADD KEY `id_storage` (`id_storage`),
  ADD KEY `id_vga` (`id_vga`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vga`
--
ALTER TABLE `vga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `komputer`
--
ALTER TABLE `komputer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vga`
--
ALTER TABLE `vga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD CONSTRAINT `keluhan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `keluhan_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `komputer`
--
ALTER TABLE `komputer`
  ADD CONSTRAINT `komputer_ibfk_1` FOREIGN KEY (`id_processor`) REFERENCES `processor` (`id`),
  ADD CONSTRAINT `komputer_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `komputer_ibfk_3` FOREIGN KEY (`id_ram`) REFERENCES `ram` (`id`),
  ADD CONSTRAINT `komputer_ibfk_4` FOREIGN KEY (`id_storage`) REFERENCES `storage` (`id`),
  ADD CONSTRAINT `komputer_ibfk_5` FOREIGN KEY (`id_vga`) REFERENCES `vga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
