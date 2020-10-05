-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 01:56 PM
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
-- Table structure for table `trans_kuesioner_opsi`
--

CREATE TABLE `trans_kuesioner_opsi` (
  `id_topsikuesioner` int(11) NOT NULL,
  `id_tkuesioner` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_kuesioner_opsi`
--

INSERT INTO `trans_kuesioner_opsi` (`id_topsikuesioner`, `id_tkuesioner`, `id_pertanyaan`, `id_jawaban`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 1, 3, 3),
(4, 1, 4, 4),
(5, 1, 5, 5),
(6, 2, 1, 5),
(7, 2, 2, 4),
(8, 2, 3, 3),
(9, 2, 4, 2),
(10, 2, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_kuesioner_opsi`
--
ALTER TABLE `trans_kuesioner_opsi`
  ADD PRIMARY KEY (`id_topsikuesioner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_kuesioner_opsi`
--
ALTER TABLE `trans_kuesioner_opsi`
  MODIFY `id_topsikuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
