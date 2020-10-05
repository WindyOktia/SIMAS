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
-- Structure for view `proposal_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `proposal_view`  AS  select `proposal`.`id_proposal` AS `id_proposal`,`proposal`.`id_user` AS `id_user`,`proposal`.`nama_kegiatan` AS `nama_kegiatan`,`proposal`.`tahun_akademik` AS `tahun_akademik`,`proposal`.`semester` AS `semester`,`proposal`.`lb_kegiatan` AS `lb_kegiatan`,`proposal`.`tujuan_kegiatan` AS `tujuan_kegiatan`,`proposal`.`harapan_kegiatan` AS `harapan_kegiatan`,`proposal`.`tgl_pelaksanaan` AS `tgl_pelaksanaan`,`proposal`.`tempat` AS `tempat`,`proposal`.`tot_anggaran` AS `tot_anggaran`,`proposal`.`tgl_pengajuan` AS `tgl_pengajuan`,`proposal`.`status_pj` AS `status_pj`,`proposal`.`status_waka` AS `status_waka`,`proposal`.`status_kepsek` AS `status_kepsek`,`user`.`username` AS `username`,`user`.`nama` AS `nama`,`user`.`role` AS `role` from (`proposal` join `user`) where `proposal`.`id_user` = `user`.`id_user` ;

--
-- VIEW `proposal_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
