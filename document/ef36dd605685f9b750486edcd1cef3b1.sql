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
-- Structure for view `v_jam_kerja`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jam_kerja`  AS  select `v_tot_jam_kerja`.`id_guru` AS `id_guru`,`v_tot_jam_kerja`.`tahun_akademik` AS `tahun_akademik`,`v_tot_jam_kerja`.`semester` AS `semester`,sec_to_time(avg(time_to_sec(`v_tot_jam_kerja`.`total_jam_kerja`))) AS `average_time` from `v_tot_jam_kerja` group by `v_tot_jam_kerja`.`id_guru`,`v_tot_jam_kerja`.`tahun_akademik` desc,`v_tot_jam_kerja`.`semester` desc ;

--
-- VIEW `v_jam_kerja`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
