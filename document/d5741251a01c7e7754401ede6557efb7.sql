-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 03:27 PM
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
-- Structure for view `v_jmlh_jam_tidakterpenuhi`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jmlh_jam_tidakterpenuhi`  AS  select `v_tot_jam_kerja`.`tahun_akademik` AS `tahun_akademik`,`v_tot_jam_kerja`.`semester` AS `semester`,`v_tot_jam_kerja`.`id_guru` AS `id_guru`,count(`v_tot_jam_kerja`.`total_jam_kerja`) AS `jmlh_jam_tidak_terpenuhi` from `v_tot_jam_kerja` where `v_tot_jam_kerja`.`total_jam_kerja` < '07:55:00' group by `v_tot_jam_kerja`.`tahun_akademik`,`v_tot_jam_kerja`.`semester`,`v_tot_jam_kerja`.`id_guru` ;

--
-- VIEW `v_jmlh_jam_tidakterpenuhi`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
