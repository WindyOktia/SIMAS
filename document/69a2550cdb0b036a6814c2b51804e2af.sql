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
-- Table structure for table `trans_kuesioner`
--

CREATE TABLE `trans_kuesioner` (
  `id_tkuesioner` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `nipd` int(11) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_kuesioner`
--

INSERT INTO `trans_kuesioner` (`id_tkuesioner`, `id_kuesioner`, `nipd`, `saran`) VALUES
(1, 1, 0, 'kegiatannya mantab'),
(2, 2, 0, 'renang kuy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_kuesioner`
--
ALTER TABLE `trans_kuesioner`
  ADD PRIMARY KEY (`id_tkuesioner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_kuesioner`
--
ALTER TABLE `trans_kuesioner`
  MODIFY `id_tkuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
