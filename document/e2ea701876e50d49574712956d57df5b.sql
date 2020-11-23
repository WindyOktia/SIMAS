-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 04:12 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simas`
--

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_proposal`
--

CREATE TABLE `verifikasi_proposal` (
  `id_verifikasi_proposal` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` text NOT NULL,
  `catatan` text NOT NULL,
  `tgl_verifikasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verifikasi_proposal`
--

INSERT INTO `verifikasi_proposal` (`id_verifikasi_proposal`, `id_proposal`, `id_user`, `status`, `catatan`, `tgl_verifikasi`) VALUES
(1, 1, 20, 'Revisi', '<p>jelaskan lebih rinci tentang seni</p>\r\n', '2020-11-14'),
(2, 1, 14, 'Revisi', '<p>Masukan apa itu seni dan fungsinya pada latar belakang</p>\r\n', '2020-11-14'),
(3, 1, 15, 'Revisi', '<p>anggaran dana jika bisa jangan melebihi 10 juta</p>\r\n', '2020-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `verifikasi_proposal`
--
ALTER TABLE `verifikasi_proposal`
  ADD PRIMARY KEY (`id_verifikasi_proposal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `verifikasi_proposal`
--
ALTER TABLE `verifikasi_proposal`
  MODIFY `id_verifikasi_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
