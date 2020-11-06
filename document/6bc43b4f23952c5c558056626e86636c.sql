-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 01:53 PM
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
-- Table structure for table `kuesioner_kegiatan`
--

CREATE TABLE `kuesioner_kegiatan` (
  `id_kuesioner` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuesioner_kegiatan`
--

INSERT INTO `kuesioner_kegiatan` (`id_kuesioner`, `id_proposal`, `id_kategori`, `deskripsi`, `tgl_mulai`, `tgl_selesai`) VALUES
(1, 2, 1, '<p>test</p>\r\n', '2020-10-02', '2020-10-15'),
(2, 3, 1, '<p>renang kuy</p>\r\n', '2020-10-04', '2020-10-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kuesioner_kegiatan`
--
ALTER TABLE `kuesioner_kegiatan`
  ADD PRIMARY KEY (`id_kuesioner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kuesioner_kegiatan`
--
ALTER TABLE `kuesioner_kegiatan`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
