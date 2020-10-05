-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 03:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
-- Structure for view `v_tot_jam_kerja`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tot_jam_kerja`  AS  select `presensi_harian`.`tahun_akademik` AS `tahun_akademik`,`presensi_harian`.`semester` AS `semester`,`presensi_harian`.`tanggal` AS `tanggal`,`presensi_harian`.`hari` AS `hari`,`presensi_harian`.`id_guru` AS `id_guru`,`presensi_harian`.`jam_masuk` AS `jam_masuk`,`presensi_harian`.`jam_pulang` AS `jam_pulang`,timediff(`presensi_harian`.`jam_pulang`,`presensi_harian`.`jam_masuk`) AS `total_jam_kerja` from `presensi_harian` ;

--
-- VIEW `v_tot_jam_kerja`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
