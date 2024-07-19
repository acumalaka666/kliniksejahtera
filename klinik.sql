-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 05:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(44) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `keluhan` varchar(123) NOT NULL,
  `penyakit` varchar(44) NOT NULL,
  `alamat` varchar(123) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perawatan` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `keluhan`, `penyakit`, `alamat`, `tanggal_lahir`, `status_perawatan`) VALUES
(2, 'Vieri', 'L', 'Sering kekurangan dana di akhir bulan', 'Gaji pas-pasan', 'Perumahan Laugh Tale', '2010-10-10', 'Memasuki bulan kedua perawatan'),
(3, 'Dadosta', 'L', 'Tidak pernah mengeluh', 'Sok kuat', 'Jalan raya bikini bottom', '2222-12-19', 'Rawat inap'),
(4, 'Sembiring', 'L', 'Tidak peduli terhadap diri sendiri', 'Sakit jiwa', 'Boulevard of broken dreams', '0000-00-00', 'Sedang belajar merawat diri sendiri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
