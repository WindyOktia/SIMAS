-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 08:55 AM
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
-- Structure for view `v_minat_siswa`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_minat_siswa`  AS SELECT `proposal`.`id_proposal` AS `id_proposal`, `proposal`.`tahun_akademik` AS `tahun_akademik`, `proposal`.`semester` AS `semester`, `proposal`.`nama_kegiatan` AS `nama_kegiatan`, count(`trans_kuesioner`.`id_siswa`) AS `Jumlah_siswa_mengisi` FROM ((`trans_kuesioner` join `proposal`) join `kuesioner_kegiatan`) WHERE `proposal`.`id_proposal` = `kuesioner_kegiatan`.`id_proposal` AND `kuesioner_kegiatan`.`id_kuesioner` = `trans_kuesioner`.`id_kuesioner` GROUP BY `trans_kuesioner`.`id_kuesioner`, `proposal`.`tahun_akademik`, `proposal`.`semester`, `proposal`.`nama_kegiatan` ;

--
-- VIEW `v_minat_siswa`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
