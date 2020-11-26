-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 08:56 AM
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
-- Structure for view `v_keterlibatan_siswa`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_keterlibatan_siswa`  AS SELECT `trans_kuesioner`.`id_kuesioner` AS `id_kuesioner`, `proposal`.`nama_kegiatan` AS `nama_kegiatan`, `proposal`.`tahun_akademik` AS `tahun_akademik`, `proposal`.`semester` AS `semester`, floor(sum(`jawaban_kuesioner`.`skor_jawaban`) / (count(`trans_kuesioner_opsi`.`id_pertanyaan`) * (select max(`jawaban_kuesioner`.`skor_jawaban`) from `jawaban_kuesioner`)) * 100) AS `Nilai` FROM ((((((`trans_kuesioner_opsi` join `jawaban_kuesioner`) join `pertanyaan_kuesioner`) join `trans_kuesioner`) join `kategori_kuesioner`) join `proposal`) join `kuesioner_kegiatan`) WHERE `trans_kuesioner_opsi`.`id_jawaban` = `jawaban_kuesioner`.`id_jawaban` AND `trans_kuesioner_opsi`.`id_pertanyaan` = `pertanyaan_kuesioner`.`id_pertanyaan` AND `trans_kuesioner_opsi`.`id_tkuesioner` = `trans_kuesioner`.`id_tkuesioner` AND `proposal`.`id_proposal` = `kuesioner_kegiatan`.`id_proposal` AND `kuesioner_kegiatan`.`id_kuesioner` = `trans_kuesioner`.`id_kuesioner` GROUP BY `trans_kuesioner`.`id_kuesioner`, `proposal`.`tahun_akademik` ;

--
-- VIEW `v_keterlibatan_siswa`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
