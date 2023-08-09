-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 07:04 AM
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
(6, 'Intel Core i5-12400', 10),
(10, 'Intel Core i3-13100', 25),
(17, 'Intel Core i3-12100', 20),
(19, 'Intel Core i5-3470', 20),
(20, 'Intel Core i7-13700', 2),
(21, 'Intel Core i7-3770', 50);

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
(37, 'DDR2', '2', 100),
(39, 'DDR3', '4', 50),
(40, 'DDR3', '8', 20),
(41, 'DDR4', '8', 10),
(42, 'DDR5', '16', 5),
(43, 'DDR2', '1', 100);

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
(7, 'HDD', 1024, 200),
(9, 'SSD', 256, 100),
(10, 'SSD', 128, 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Mohamad Ferdiansyah', 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
(1, 'NVIDIA', 'RTX 2080Ti', 8, 5),
(3, 'NVIDIA', 'RTX 3090', 12, 10),
(4, 'AMD', 'RX 6600XT', 8, 10);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vga`
--
ALTER TABLE `vga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
