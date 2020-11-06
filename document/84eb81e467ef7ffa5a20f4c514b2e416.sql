-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 03:26 PM
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
-- Structure for view `laporan_view`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_view`  AS  select `laporan`.`id_laporan` AS `id_laporan`,`laporan`.`id_proposal` AS `id_proposal`,`laporan`.`id_user` AS `id_user`,`proposal`.`nama_kegiatan` AS `nama_kegiatan`,`proposal`.`tahun_akademik` AS `tahun_akademik`,`proposal`.`semester` AS `semester`,`proposal`.`tgl_pelaksanaan` AS `tgl_pelaksanaan`,`proposal`.`tempat` AS `tempat`,`laporan`.`lb_laporan` AS `lb_laporan`,`laporan`.`tujuan_laporan` AS `tujuan_laporan`,`laporan`.`lp_jln_kegiatan` AS `lp_jln_kegiatan`,`laporan`.`hasil_kegiatan` AS `hasil_kegiatan`,`laporan`.`kendala_kegiatan` AS `kendala_kegiatan`,`laporan`.`solusi_kegiatan` AS `solusi_kegiatan`,`laporan`.`kesimpulan` AS `kesimpulan`,`laporan`.`saran` AS `saran`,`proposal`.`tot_anggaran` AS `tot_anggaran`,`laporan`.`biaya_pendapatan` AS `biaya_pendapatan`,`laporan`.`biaya_pengeluaran` AS `biaya_pengeluaran`,`laporan`.`tgl_pengajuan_lp` AS `tgl_pengajuan_lp`,`laporan`.`status_pj` AS `status_pj`,`laporan`.`status_waka` AS `status_waka`,`laporan`.`status_kepsek` AS `status_kepsek`,`user`.`nama` AS `nama`,`user`.`username` AS `username`,`user`.`role` AS `role` from ((`laporan` join `proposal`) join `user`) where `laporan`.`id_proposal` = `proposal`.`id_proposal` and `laporan`.`id_user` = `user`.`id_user` ;

--
-- VIEW `laporan_view`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
