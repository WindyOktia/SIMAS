-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 04:12 PM
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
-- Table structure for table `pertanyaan_kuesioner`
--

CREATE TABLE `pertanyaan_kuesioner` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan_kuesioner`
--

INSERT INTO `pertanyaan_kuesioner` (`id_pertanyaan`, `pertanyaan`, `id_kategori`) VALUES
(1, 'apakah lokasi kegiatan memuaskan?', 1),
(2, 'apakah acara kegiatan memuaskan?', 1),
(3, 'apakah panitia ramah?', 1),
(4, 'apakah fasilitas memadai?', 1),
(5, 'apakah tim medis selalu siaga?', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pertanyaan_kuesioner`
--
ALTER TABLE `pertanyaan_kuesioner`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pertanyaan_kuesioner`
--
ALTER TABLE `pertanyaan_kuesioner`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
