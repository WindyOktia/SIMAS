-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 12:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
(5, 19, 19, 'Disetujui', 'test', '2020-09-01'),
(6, 19, 19, 'Revisi', '<p>test</p>\r\n', '2020-09-02'),
(7, 19, 19, 'Disetujui', 'test', '2020-09-04'),
(8, 19, 19, 'Revisi', '<p>test</p>\r\n', '2020-09-02'),
(9, 19, 19, 'Disetujui', 'test', '2020-09-04'),
(10, 19, 19, 'Revisi', '<p>test</p>\r\n', '2020-09-02'),
(11, 20, 15, 'Disetujui', '-', '2020-09-14'),
(12, 20, 15, 'Ditolak', '-', '2020-09-14'),
(13, 21, 15, 'Revisi', '<p>revisi su</p>\r\n', '2020-09-14');

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
  MODIFY `id_verifikasi_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
