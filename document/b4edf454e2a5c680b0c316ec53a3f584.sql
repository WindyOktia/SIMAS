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
-- Table structure for table `jawaban_kuesioner`
--

CREATE TABLE `jawaban_kuesioner` (
  `id_jawaban` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `skor_jawaban` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_kuesioner`
--

INSERT INTO `jawaban_kuesioner` (`id_jawaban`, `jawaban`, `skor_jawaban`, `id_kategori`) VALUES
(1, 'sangat baik', 5, 1),
(2, 'baik', 4, 1),
(3, 'cukup', 3, 1),
(4, 'buruk', 2, 1),
(5, 'sangat buruk', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban_kuesioner`
--
ALTER TABLE `jawaban_kuesioner`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban_kuesioner`
--
ALTER TABLE `jawaban_kuesioner`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
