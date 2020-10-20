-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 12:53 PM
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
-- Database: `sicuti_oku`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `agama_id` int(11) NOT NULL,
  `agama_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`agama_id`, `agama_nama`) VALUES
(1, 'Kristen'),
(2, 'Khatolik'),
(3, 'Islam'),
(4, 'Hindu'),
(5, 'Budha'),
(9, 'Lainnya'),
(13, 'Kong Hu Cu'),
(14, 'Penganut');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `gol_id` int(11) NOT NULL,
  `gol_nama` varchar(5) NOT NULL,
  `gol_ket` varchar(50) NOT NULL,
  `gol_kode` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`gol_id`, `gol_nama`, `gol_ket`, `gol_kode`) VALUES
(1, 'I/c', 'Pembina', '13'),
(5, 'II/b', 'Juru', '23'),
(6, 'IV/a', 'Pembina Utama Madya', '42'),
(7, 'III/d', 'Juru', '34');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `instansi_kode` char(50) NOT NULL,
  `instansi_nama` varchar(50) NOT NULL,
  `instansi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`instansi_kode`, `instansi_nama`, `instansi_id`) VALUES
('A5EB03E23B2FF6A0E040640A040252AD', 'Pemerintah Kab. Ogan Komering Ulu', 1),
('A43ERT12SD11', 'Pemerintah Kab. Ogan Komerling Timur', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `sub_jabatan` int(11) NOT NULL,
  `uraian` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `sub_jabatan`, `uraian`) VALUES
(1, 0, 'Jabatan Fungsional Tertentu'),
(2, 1, 'Jabatan Fungsional Umum');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `jenis_cuti_id` int(11) NOT NULL,
  `jcuti_nama` varchar(50) NOT NULL,
  `quota` int(11) NOT NULL,
  `ket_waktu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`jenis_cuti_id`, `jcuti_nama`, `quota`, `ket_waktu`) VALUES
(2, 'Cuti Tahunan', 12, 'Hari'),
(3, 'Cuti Melahirkan', 90, 'Hari'),
(4, 'Cuti Sakit', 10, 'Hari'),
(8, 'Cuti Besar', 12, 'hari'),
(9, 'Cuti Karena Alasan Penting', 30, 'hari'),
(10, 'Cuti Bersama', 10, 'hari'),
(11, 'Cuti Diluar Tanggungan Negara', 365, 'hari');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti_tmp`
--

CREATE TABLE `jenis_cuti_tmp` (
  `jenis_cuti_tmp_id` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jenis_cuti_id` int(11) NOT NULL,
  `quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cuti_tmp`
--

INSERT INTO `jenis_cuti_tmp` (`jenis_cuti_tmp_id`, `nip`, `jenis_cuti_id`, `quota`) VALUES
(7, 2312312, 2, 5),
(8, 2312312, 3, 20),
(9, 2312312, 4, 7),
(10, 72160050, 2, 3),
(11, 72160050, 3, 0),
(12, 72160050, 4, 4),
(13, 72160051, 2, 3),
(14, 72160051, 3, 15),
(15, 72160051, 4, 8),
(22, 72160045, 2, 5),
(23, 72160045, 3, 30),
(24, 72160045, 4, 5),
(25, 72160045, 8, 7),
(26, 72160045, 9, 5),
(29, 72160078, 2, 5),
(30, 72160078, 3, 10),
(31, 72160078, 4, 5),
(32, 72160078, 8, 12),
(33, 72160078, 9, 10),
(34, 72160078, 10, 10),
(35, 72160099, 2, 5),
(36, 72160099, 3, 30),
(37, 72160099, 4, 10),
(38, 72160099, 8, 12),
(39, 72160099, 9, 10),
(40, 72160099, 10, 10),
(42, 72160098, 2, 5),
(43, 72160098, 4, 10),
(44, 72160098, 8, 12),
(45, 72160098, 9, 10),
(46, 72160098, 10, 10),
(49, 71160099, 2, 1),
(50, 71160099, 3, 15),
(51, 71160099, 4, 7),
(52, 71160099, 8, 12),
(53, 71160099, 9, 10),
(54, 71160099, 10, 10),
(55, 72160068, 2, 8),
(56, 72160068, 3, 75),
(57, 72160068, 4, 10),
(58, 72160068, 8, 12),
(59, 72160068, 9, 30),
(60, 72160068, 10, 10),
(61, 72160068, 11, 365),
(62, 72160089, 2, 0),
(63, 72160089, 4, 0),
(64, 72160089, 8, 12),
(65, 72160089, 9, 19),
(66, 72160089, 10, 10),
(67, 72160089, 11, 365),
(68, 72160041, 2, 8),
(69, 72160041, 4, 7),
(70, 72160041, 8, 12),
(71, 72160041, 9, 30),
(72, 72160041, 10, 10),
(73, 72160041, 11, 365);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kawin`
--

CREATE TABLE `jenis_kawin` (
  `jenis_kawin_id` int(1) NOT NULL,
  `jenis_kawin_nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kawin`
--

INSERT INTO `jenis_kawin` (`jenis_kawin_id`, `jenis_kawin_nama`) VALUES
(3, 'Janda / Duda'),
(4, 'Sudah Menikah'),
(5, 'Belum Menikah');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_pengajuan`
--

CREATE TABLE `log_pengajuan` (
  `log_id` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `nip` char(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alasan_cuti` varchar(50) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jenis_cuti_id` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `waktu` date NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_pengajuan`
--

INSERT INTO `log_pengajuan` (`log_id`, `pengajuan_id`, `nip`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `alasan_cuti`, `durasi`, `jenis_cuti_id`, `file`, `waktu`, `keterangan`) VALUES
(25, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-07', 'Berhasil Mengajukan Permohonan Cuti'),
(26, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-07', 'Permohonan Cuti telah di Verifikasi Admin'),
(27, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-07', 'Permohonan Cuti Telah Diterima Pimpinan'),
(28, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-07', 'Permohonan Cuti Telah Diterima Pimpinan'),
(30, 41, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'Yahoow', 1, 2, '', '2019-11-07', 'Berhasil Mengajukan Permohonan Cuti'),
(31, 42, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'asadsa', 1, 2, '', '2019-11-07', 'Berhasil Mengajukan Permohonan Cuti'),
(32, 43, '72160068', '2019-11-08', '2019-11-10', '2019-11-15', 'Anak Pertama', 5, 3, '', '2019-11-08', 'Berhasil Mengajukan Permohonan Cuti'),
(33, 43, '72160068', '2019-11-08', '2019-11-10', '2019-11-15', 'Anak Pertama', 5, 3, '', '2019-11-08', 'Permohonan Cuti telah di Verifikasi Admin'),
(34, 43, '72160068', '2019-11-08', '2019-11-10', '2019-11-15', 'Anak Pertama', 5, 3, '', '2019-11-08', 'Permohonan Cuti Ditolak Pimpinan'),
(35, 43, '72160068', '2019-11-08', '2019-11-10', '2019-11-15', 'Anak Pertama', 5, 3, '', '2019-11-08', 'Permohonan Cuti Ditolak Pimpinan'),
(36, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-09', 'Permohonan Cuti Ditolak Admin'),
(37, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-09', 'Permohonan Cuti Ditolak Admin'),
(38, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-09', 'Permohonan Cuti Ditolak Admin'),
(39, 40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                ', 4, 9, '', '2019-11-09', 'Permohonan Cuti Ditolak Admin'),
(43, 41, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'Yahoow', 1, 2, '', '2019-11-09', 'Permohonan Cuti Ditolak Admin'),
(44, 42, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'asadsa', 1, 2, '', '2019-11-09', 'Permohonan Cuti telah di Verifikasi Admin'),
(45, 42, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'asadsa', 1, 2, '', '2019-11-09', 'Permohonan Cuti Telah Diterima Pimpinan'),
(46, 42, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'asadsa', 1, 2, '', '2019-11-09', 'Permohonan Cuti Telah Diterima Pimpinan'),
(48, 44, '72160089', '2019-11-09', '2019-11-21', '2019-11-22', 'LA Mild', 1, 2, '', '2019-11-09', 'Berhasil Mengajukan Permohonan Cuti'),
(49, 46, '72160089', '2019-11-09', '2019-11-19', '2019-11-21', 'UMILD', 2, 4, '', '2019-11-09', 'Berhasil Mengajukan Permohonan Cuti'),
(50, 47, '72160041', '2019-11-09', '2019-11-04', '2019-11-06', 'Bold', 2, 2, '', '2019-11-09', 'Berhasil Mengajukan Permohonan Cuti'),
(51, 48, '72160041', '2019-11-09', '2019-11-01', '2019-11-02', 'Robert', 1, 2, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti1.pdf', '2019-11-09', 'Berhasil Mengajukan Permohonan Cuti'),
(52, 49, '72160041', '2019-11-09', '2019-11-07', '2019-11-06', 'Omah', 1, 4, 'data_awal_OKU1.xlsx', '2019-11-09', 'Berhasil Mengajukan Permohonan Cuti'),
(53, 50, '72160041', '2019-11-11', '2019-11-21', '2019-11-23', 'Ddodod', 2, 4, 'du1.png', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(54, 51, '72160041', '2019-11-11', '2019-11-13', '2019-11-14', 'Mencintaimu', 1, 2, 'it1.png', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(55, 44, '72160089', '2019-11-09', '2019-11-21', '2019-11-22', 'LA Mild', 1, 2, '', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(56, 44, '72160089', '2019-11-09', '2019-11-21', '2019-11-22', 'LA Mild', 1, 2, '', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(57, 44, '72160089', '2019-11-09', '2019-11-21', '2019-11-22', 'LA Mild', 1, 2, '', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(59, 46, '72160089', '2019-11-09', '2019-11-19', '2019-11-21', 'UMILD', 2, 4, '', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(60, 47, '72160041', '2019-11-09', '2019-11-04', '2019-11-06', 'Bold', 2, 2, '', '2019-11-11', 'Permohonan Cuti Ditolak Admin'),
(61, 48, '72160041', '2019-11-09', '2019-11-01', '2019-11-02', 'Robert', 1, 2, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti1.pdf', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(62, 49, '72160041', '2019-11-09', '2019-11-07', '2019-11-06', 'Omah', 1, 4, 'data_awal_OKU1.xlsx', '2019-11-11', 'Permohonan Cuti Ditolak Admin'),
(63, 50, '72160041', '2019-11-11', '2019-11-21', '2019-11-23', 'Ddodod', 2, 4, 'du1.png', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(64, 51, '72160041', '2019-11-11', '2019-11-13', '2019-11-14', 'Mencintaimu', 1, 2, 'it1.png', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(65, 46, '72160089', '2019-11-09', '2019-11-19', '2019-11-21', 'UMILD', 2, 4, '', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(66, 46, '72160089', '2019-11-09', '2019-11-19', '2019-11-21', 'UMILD', 2, 4, '', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(68, 48, '72160041', '2019-11-09', '2019-11-01', '2019-11-02', 'Robert', 1, 2, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti1.pdf', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(69, 48, '72160041', '2019-11-09', '2019-11-01', '2019-11-02', 'Robert', 1, 2, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti1.pdf', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(71, 50, '72160041', '2019-11-11', '2019-11-21', '2019-11-23', 'Ddodod', 2, 4, 'du1.png', '2019-11-11', 'Permohonan Cuti Ditolak Pimpinan'),
(72, 50, '72160041', '2019-11-11', '2019-11-21', '2019-11-23', 'Ddodod', 2, 4, 'du1.png', '2019-11-11', 'Permohonan Cuti Ditolak Pimpinan'),
(74, 51, '72160041', '2019-11-11', '2019-11-13', '2019-11-14', 'Mencintaimu', 1, 2, 'it1.png', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(75, 51, '72160041', '2019-11-11', '2019-11-13', '2019-11-14', 'Mencintaimu', 1, 2, 'it1.png', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(76, 52, '72160089', '2019-11-11', '2019-11-01', '2019-11-02', 'dasdsadsa', 1, 2, '', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(77, 53, '72160089', '2019-11-11', '2019-11-01', '2019-11-02', 'XzXz', 1, 4, 'fr1.png', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(78, 54, '72160068', '2019-11-11', '2019-12-02', '2019-12-10', 'Melahirkan Anak Pertama', 8, 3, 'admin2.jpg', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(79, 54, '72160068', '2019-11-11', '2019-12-02', '2019-12-10', 'Melahirkan Anak Pertama', 8, 3, 'admin2.jpg', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(80, 54, '72160068', '2019-11-11', '2019-12-02', '2019-12-10', 'Melahirkan Anak Pertama', 8, 3, 'admin2.jpg', '2019-11-11', 'Permohonan Cuti Ditolak Pimpinan'),
(81, 54, '72160068', '2019-11-11', '2019-12-02', '2019-12-10', 'Melahirkan Anak Pertama', 8, 3, 'admin2.jpg', '2019-11-11', 'Permohonan Cuti Ditolak Pimpinan'),
(83, 55, '72160068', '2019-11-11', '2019-11-28', '2019-11-29', 'Anak 2', 1, 3, '51.jpg', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(84, 56, '72160068', '2019-11-11', '2019-11-26', '2019-11-27', 'Anak 3', 1, 3, '61.jpg', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(85, 55, '72160068', '2019-11-11', '2019-11-28', '2019-11-29', 'Anak 2', 1, 3, '51.jpg', '2019-11-11', 'Permohonan Cuti Ditolak Admin'),
(86, 56, '72160068', '2019-11-11', '2019-11-26', '2019-11-27', 'Anak 3', 1, 3, '61.jpg', '2019-11-11', 'Permohonan Cuti Ditolak Admin'),
(87, 57, '72160068', '2019-11-11', '2019-11-10', '2019-11-11', 'anak4', 1, 2, '41.jpg', '2019-11-11', 'Berhasil Mengajukan Permohonan Cuti'),
(88, 53, '72160089', '2019-11-11', '2019-11-01', '2019-11-02', 'XzXz', 1, 4, 'fr1.png', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(89, 57, '72160068', '2019-11-11', '2019-11-10', '2019-11-11', 'anak4', 1, 2, '41.jpg', '2019-11-11', 'Permohonan Cuti telah di Verifikasi Admin'),
(90, 57, '72160068', '2019-11-11', '2019-11-10', '2019-11-11', 'anak4', 1, 2, '41.jpg', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(91, 57, '72160068', '2019-11-11', '2019-11-10', '2019-11-11', 'anak4', 1, 2, '41.jpg', '2019-11-11', 'Permohonan Cuti Telah Diterima Pimpinan'),
(92, 47, '72160041', '2019-11-09', '2019-11-04', '2019-11-06', 'Bold', 2, 2, '', '2019-11-12', 'Permohonan Cuti telah di Verifikasi Admin'),
(93, 47, '72160041', '2019-11-09', '2019-11-04', '2019-11-06', 'Bold', 2, 2, '', '2019-11-12', 'Permohonan Cuti telah di Verifikasi Admin'),
(95, 49, '72160041', '2019-11-09', '2019-11-07', '2019-11-06', 'Omah', 1, 4, 'data_awal_OKU1.xlsx', '2019-11-12', 'Permohonan Cuti telah di Verifikasi Admin'),
(96, 49, '72160041', '2019-11-09', '2019-11-07', '2019-11-06', 'Omah', 1, 4, 'data_awal_OKU1.xlsx', '2019-11-12', 'Permohonan Cuti telah di Verifikasi Admin'),
(98, 58, '72160089', '2019-11-12', '2019-11-12', '2019-11-14', 'asaA', 2, 4, '3d_space_mission_mars1.jpg', '2019-11-12', 'Berhasil Mengajukan Permohonan Cuti'),
(99, 58, '72160089', '2019-11-12', '2019-11-12', '2019-11-14', 'asaA', 2, 4, '3d_space_mission_mars1.jpg', '2019-11-12', 'Permohonan Cuti telah di Verifikasi Admin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `pns_id` int(20) NOT NULL,
  `nama_pns` varchar(100) NOT NULL,
  `nip` char(18) NOT NULL,
  `gelar_dpn` varchar(10) NOT NULL,
  `gelar_blk` varchar(20) NOT NULL,
  `nik` char(16) NOT NULL,
  `gol_id` int(11) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jenis_kawin_id` int(1) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `jenis_pegawai` varchar(20) NOT NULL,
  `instansi_id` int(11) NOT NULL,
  `unor_id` int(11) NOT NULL,
  `status_pns` varchar(10) NOT NULL,
  `tgl_diterima` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`pns_id`, `nama_pns`, `nip`, `gelar_dpn`, `gelar_blk`, `nik`, `gol_id`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `jenis_kawin_id`, `agama_id`, `no_hp`, `alamat`, `jabatan_id`, `jenis_pegawai`, `instansi_id`, `unor_id`, `status_pns`, `tgl_diterima`) VALUES
(1, 'Vanesha Glorya', '72160010', 'Ir', 'S.Kom', '535', 13, 'sleman', '2015-09-27', 'Perempuan', 3, 1, '213214213211', 'Seturan Yogyakarta', 1, 'PNS', 0, 1, 'PNS', '2019-10-01'),
(2, 'Ricky Hendzen', '72160011', 'Prof', 'Skom', '72160012', 34, 'Singkawang', '1998-03-16', 'Laki - Laki', 5, 1, '081245785623', 'Yogyakarta', 2, 'PNS', 0, 1, 'Pegawai', '2018-11-01'),
(23, 'Nord', '72160078', 'alm', 'Spd', '789456', 5, 'Sakapatat', '2000-09-27', 'Perempuan', 4, 1, '089812134651', 'Sakapatat', 2, 'Non-PNS', 2, 5, 'Non-Aktif', '2019-10-30'),
(24, 'Pak Wimme da Pooh', '72160099', 'Ir', 'S.Kep', '119001', 5, 'Wates', '1970-09-20', 'Laki-laki', 4, 1, '081213141512', 'Jl. Pengilon Yogyakarta', 1, 'Non-PNS', 2, 5, 'Non-Aktif', '2013-05-17'),
(25, 'Pak Katon Wacana', '72160098', 'Pdt', 'S. Kom', '111902', 1, 'Kartoyono', '1980-12-12', 'Laki-laki', 4, 1, '089912131012', 'Jl. Magelang Yogyakarta', 2, 'PNS', 1, 3, 'Aktif', '2017-09-29'),
(26, 'Raini Debora Sembiring', '71160099', 'Dr', 'S3', '123456', 6, 'Medan', '1995-09-23', 'Perempuan', 4, 5, '082312131415', 'Jl. Medan Barat Sumatra', 2, 'Honorer', 2, 5, 'Aktif', '2014-05-05'),
(27, 'Veren Geltisa', '72160068', 'Dr', 'Dokter', '001122', 6, 'Palu', '1998-10-25', 'Perempuan', 5, 1, '081245211021', 'Jl. Palu Sulawesi Barat', 2, 'PNS', 2, 2, 'Aktif', '2016-05-20'),
(28, 'Albert Christopher', '72160089', 'Prof', 'S. Kom', '112233', 5, 'Batam Kota', '1996-12-30', 'Laki-laki', 5, 2, '081234579750', 'Green Land Blok F4 NO.04', 2, 'Honorer', 2, 4, 'Aktif', '2018-10-02'),
(29, 'Ebet', '72160041', 'Prof', 'Skom', '11220022', 5, 'Timika', '1998-08-23', 'Laki-laki', 4, 1, '089921212112', 'Papua', 1, 'PNS', 2, 2, 'Aktif', '2013-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `pengajuan_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tgl_penerimaan` date NOT NULL,
  `oleh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `pengajuan_id`, `status`, `tgl_penerimaan`, `oleh`) VALUES
(41, 13, 'ditolak_admin', '2019-11-07', 'admin'),
(42, 14, '', '0000-00-00', ''),
(43, 39, 'diterima', '2019-11-08', 'pimpinan'),
(44, 43, 'ditolak', '2019-11-08', 'pimpinan'),
(45, 35, 'diterima', '2019-11-09', 'pimpinan'),
(46, 36, 'diterima', '2019-11-09', 'pimpinan'),
(47, 37, 'diterima', '2019-11-09', 'pimpinan'),
(49, 40, 'ditolak_admin', '2019-11-09', 'admin'),
(50, 41, 'ditolak_admin', '2019-11-09', 'admin'),
(51, 42, 'diterima', '2019-11-09', 'pimpinan'),
(52, 44, 'diterima', '2019-11-11', 'pimpinan'),
(53, 45, 'ditolak_admin', '2019-11-11', 'admin'),
(54, 46, 'diterima', '2019-11-11', 'pimpinan'),
(56, 48, 'diterima', '2019-11-11', 'pimpinan'),
(58, 50, 'ditolak', '2019-11-11', 'pimpinan'),
(59, 51, 'diterima', '2019-11-11', 'pimpinan'),
(60, 54, 'ditolak', '2019-11-11', 'pimpinan'),
(61, 55, 'ditolak_admin', '2019-11-11', 'admin'),
(62, 56, 'ditolak_admin', '2019-11-11', 'admin'),
(63, 53, '', '0000-00-00', ''),
(64, 57, 'diterima', '2019-11-11', 'pimpinan'),
(68, 23, '', '0000-00-00', ''),
(69, 22, '', '0000-00-00', ''),
(70, 38, '', '0000-00-00', ''),
(71, 47, '', '0000-00-00', ''),
(72, 49, '', '0000-00-00', ''),
(73, 58, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `pengajuan_id` int(11) NOT NULL,
  `nip` char(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `alasan_cuti` varchar(200) NOT NULL,
  `durasi` int(11) NOT NULL,
  `jenis_cuti_id` int(11) NOT NULL,
  `file` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`pengajuan_id`, `nip`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `alasan_cuti`, `durasi`, `jenis_cuti_id`, `file`) VALUES
(13, '72160045', '2019-10-29', '2019-10-01', '2019-10-06', 'Jalan Jalan', 5, 8, ''),
(14, '72160051', '2019-10-29', '2019-10-01', '2019-10-06', 'Memang Indah', 5, 3, ''),
(22, '71160099', '2019-11-03', '2019-11-01', '2019-11-03', 'Liburan ke Jepang                                    ', 2, 2, 'joker.jpg'),
(23, '71160099', '2019-11-03', '2019-11-01', '2019-11-11', 'Melahirkan Anak Pertama                                    ', 10, 3, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti.pdf'),
(35, '71160099', '2019-11-05', '2019-11-01', '2019-11-06', 'Kipas angin Muter                                        ', 5, 3, 'XBOX.jpg'),
(36, '71160099', '2019-11-05', '2019-11-01', '2019-11-03', 'Melahirkan                                        ', 2, 2, 'XBOX2.jpg'),
(37, '72160089', '2019-11-06', '2019-11-01', '2019-11-03', 'Phobia                                    ', 2, 4, 'Horror_House2.jpg'),
(38, '71160099', '2019-11-06', '2019-11-01', '2019-11-03', ' 1                                   ', 2, 4, ''),
(39, '72160068', '2019-11-06', '2019-11-01', '2019-11-03', 'sdasa                                        ', 2, 2, ''),
(40, '72160089', '2019-11-07', '2019-11-01', '2019-11-05', 'Mengantar orang tua ke Rumah Sakit                                        ', 4, 9, ''),
(41, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'Yahoow', 1, 2, ''),
(42, '72160089', '2019-11-07', '2019-11-01', '2019-11-02', 'asadsa', 1, 2, ''),
(43, '72160068', '2019-11-08', '2019-11-10', '2019-11-15', 'Anak Pertama', 5, 3, ''),
(44, '72160089', '2019-11-09', '2019-11-21', '2019-11-22', 'LA Mild', 1, 2, ''),
(45, '72160089', '2019-11-09', '2019-11-02', '2019-11-05', ' ddsadsa', 3, 4, 'Walp.jpg'),
(46, '72160089', '2019-11-09', '2019-11-19', '2019-11-21', 'UMILD', 2, 4, ''),
(47, '72160041', '2019-11-09', '2019-11-04', '2019-11-06', 'Bold', 2, 2, ''),
(48, '72160041', '2019-11-09', '2019-11-01', '2019-11-02', 'Robert', 1, 2, 'SE_Nomor_15_Tahun_2018_Pelaksanaan_Cuti.pdf'),
(49, '72160041', '2019-11-09', '2019-11-07', '2019-11-06', 'Omah', 1, 4, 'data_awal_OKU.xlsx'),
(50, '72160041', '2019-11-11', '2019-11-21', '2019-11-23', 'Ddodod', 2, 4, 'du.png'),
(51, '72160041', '2019-11-11', '2019-11-13', '2019-11-14', 'Mencintaimu', 1, 2, 'it.png'),
(53, '72160089', '2019-11-11', '2019-11-01', '2019-11-02', 'XzXz', 1, 4, 'fr.png'),
(54, '72160068', '2019-11-11', '2019-12-02', '2019-12-10', 'Melahirkan Anak Pertama', 8, 3, 'admin1.jpg'),
(55, '72160068', '2019-11-11', '2019-11-28', '2019-11-29', 'Anak 2', 1, 3, '5.jpg'),
(56, '72160068', '2019-11-11', '2019-11-26', '2019-11-27', 'Anak 3', 1, 3, '6.jpg'),
(57, '72160068', '2019-11-11', '2019-11-10', '2019-11-11', 'anak4', 1, 2, '4.jpg'),
(58, '72160089', '2019-11-12', '2019-11-12', '2019-11-14', 'asaA', 2, 4, '3d_space_mission_mars.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `unor`
--

CREATE TABLE `unor` (
  `unor_id` int(10) NOT NULL,
  `unor_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unor`
--

INSERT INTO `unor` (`unor_id`, `unor_nama`) VALUES
(1, 'Dinas Pendidikan'),
(2, 'Sekolah Dasar'),
(3, 'Pemerintah Kabupaten Ogan Komering Ulu'),
(4, 'DINAS PERTANIAN'),
(5, 'KECAMATAN PENINJAUAN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `pns_id` int(20) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `pns_id`, `role_id`) VALUES
(5, 'Vanessha', 'c3ec0f7b054e729c5a716c8125839829', 0, 2),
(6, 'Ricky', '56ea8b83122449e814e0fd7bfb5f220a', 0, 1),
(8, 'Pimpinan', '90973652b88fe07d05a4304f0a945de8', 0, 3),
(10, 'KepalaBKD', '81dc9bdb52d04dc20036dbd8313ed055', 0, 3),
(11, 'bene', 'bfe379567e3fe8c3326892a4faa7fb7c', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'member'),
(3, 'Pimpinan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_dftrpegawai`
-- (See below for the actual view)
--
CREATE TABLE `v_dftrpegawai` (
`nip` char(18)
,`nama_pns` varchar(100)
,`no_hp` varchar(16)
,`jabatan_id` int(11)
,`uraian` char(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_j_cuti`
-- (See below for the actual view)
--
CREATE TABLE `v_j_cuti` (
`jenis_cuti_tmp_id` int(11)
,`nip` int(11)
,`jenis_cuti_id` int(11)
,`quota` int(11)
,`jcuti_nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penerimaan`
-- (See below for the actual view)
--
CREATE TABLE `v_penerimaan` (
`pengajuan_id` int(11)
,`nip` char(20)
,`nama_pns` varchar(100)
,`tgl_pengajuan` date
,`tgl_mulai` date
,`tgl_selesai` date
,`durasi` int(11)
,`alasan_cuti` varchar(200)
,`jenis_cuti` varchar(50)
,`oleh` varchar(50)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengajuan`
-- (See below for the actual view)
--
CREATE TABLE `v_pengajuan` (
`pengajuan_id` int(11)
,`nip` char(20)
,`tgl_pengajuan` date
,`tgl_mulai` date
,`tgl_selesai` date
,`alasan_cuti` varchar(200)
,`durasi` int(11)
,`jcuti_nama` varchar(50)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengajuan_fix`
-- (See below for the actual view)
--
CREATE TABLE `v_pengajuan_fix` (
`pengajuan_id` int(11)
,`nip` char(20)
,`nama` varchar(100)
,`tgl_pengajuan` date
,`tgl_mulai` date
,`tgl_selesai` date
,`alasan_cuti` varchar(200)
,`file` varchar(500)
,`durasi` int(11)
,`jcuti_nama` varchar(50)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_permohonan`
-- (See below for the actual view)
--
CREATE TABLE `v_permohonan` (
`pns_id` int(20)
,`instansi_nama` varchar(50)
,`gol_ket` varchar(50)
,`unor_nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_dftrpegawai`
--
DROP TABLE IF EXISTS `v_dftrpegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dftrpegawai`  AS  select `pegawai`.`nip` AS `nip`,`pegawai`.`nama_pns` AS `nama_pns`,`pegawai`.`no_hp` AS `no_hp`,`pegawai`.`jabatan_id` AS `jabatan_id`,`jabatan`.`uraian` AS `uraian` from (`pegawai` join `jabatan`) where `pegawai`.`jabatan_id` = `jabatan`.`jabatan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_j_cuti`
--
DROP TABLE IF EXISTS `v_j_cuti`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_j_cuti`  AS  select `jenis_cuti_tmp`.`jenis_cuti_tmp_id` AS `jenis_cuti_tmp_id`,`jenis_cuti_tmp`.`nip` AS `nip`,`jenis_cuti_tmp`.`jenis_cuti_id` AS `jenis_cuti_id`,`jenis_cuti_tmp`.`quota` AS `quota`,`jenis_cuti`.`jcuti_nama` AS `jcuti_nama` from (`jenis_cuti` join `jenis_cuti_tmp`) where `jenis_cuti_tmp`.`jenis_cuti_id` = `jenis_cuti`.`jenis_cuti_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_penerimaan`
--
DROP TABLE IF EXISTS `v_penerimaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penerimaan`  AS  select `penerimaan`.`pengajuan_id` AS `pengajuan_id`,`pengajuan`.`nip` AS `nip`,`pegawai`.`nama_pns` AS `nama_pns`,`pengajuan`.`tgl_pengajuan` AS `tgl_pengajuan`,`pengajuan`.`tgl_mulai` AS `tgl_mulai`,`pengajuan`.`tgl_selesai` AS `tgl_selesai`,`pengajuan`.`durasi` AS `durasi`,`pengajuan`.`alasan_cuti` AS `alasan_cuti`,`jenis_cuti`.`jcuti_nama` AS `jenis_cuti`,`penerimaan`.`oleh` AS `oleh`,`penerimaan`.`status` AS `status` from (((`penerimaan` join `pengajuan`) join `pegawai`) join `jenis_cuti`) where `penerimaan`.`pengajuan_id` = `pengajuan`.`pengajuan_id` and `pengajuan`.`nip` = `pegawai`.`nip` and `pengajuan`.`jenis_cuti_id` = `jenis_cuti`.`jenis_cuti_id` group by `penerimaan`.`pengajuan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengajuan`
--
DROP TABLE IF EXISTS `v_pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengajuan`  AS  select `pengajuan`.`pengajuan_id` AS `pengajuan_id`,`pengajuan`.`nip` AS `nip`,`pengajuan`.`tgl_pengajuan` AS `tgl_pengajuan`,`pengajuan`.`tgl_mulai` AS `tgl_mulai`,`pengajuan`.`tgl_selesai` AS `tgl_selesai`,`pengajuan`.`alasan_cuti` AS `alasan_cuti`,`pengajuan`.`durasi` AS `durasi`,`jenis_cuti`.`jcuti_nama` AS `jcuti_nama`,case when `pengajuan`.`pengajuan_id` = `penerimaan`.`pengajuan_id` then `penerimaan`.`status` else 'Belum dikonfirmasi' end AS `status` from ((`pengajuan` left join `penerimaan` on(`penerimaan`.`pengajuan_id` = `pengajuan`.`pengajuan_id`)) left join `jenis_cuti` on(`pengajuan`.`jenis_cuti_id` = `jenis_cuti`.`jenis_cuti_id`)) group by `pengajuan`.`pengajuan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengajuan_fix`
--
DROP TABLE IF EXISTS `v_pengajuan_fix`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengajuan_fix`  AS  select `pengajuan`.`pengajuan_id` AS `pengajuan_id`,`pengajuan`.`nip` AS `nip`,`pegawai`.`nama_pns` AS `nama`,`pengajuan`.`tgl_pengajuan` AS `tgl_pengajuan`,`pengajuan`.`tgl_mulai` AS `tgl_mulai`,`pengajuan`.`tgl_selesai` AS `tgl_selesai`,`pengajuan`.`alasan_cuti` AS `alasan_cuti`,`pengajuan`.`file` AS `file`,`pengajuan`.`durasi` AS `durasi`,`jenis_cuti`.`jcuti_nama` AS `jcuti_nama`,case when `pengajuan`.`pengajuan_id` = `penerimaan`.`pengajuan_id` then `penerimaan`.`status` else 'Belum Dikonfirmasi' end AS `status` from (((`pengajuan` left join `penerimaan` on(`penerimaan`.`pengajuan_id` = `pengajuan`.`pengajuan_id`)) left join `jenis_cuti` on(`pengajuan`.`jenis_cuti_id` = `jenis_cuti`.`jenis_cuti_id`)) left join `pegawai` on(`pegawai`.`nip` = `pengajuan`.`nip`)) group by `pengajuan`.`pengajuan_id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_permohonan`
--
DROP TABLE IF EXISTS `v_permohonan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_permohonan`  AS  select `pegawai`.`pns_id` AS `pns_id`,`instansi`.`instansi_nama` AS `instansi_nama`,`golongan`.`gol_ket` AS `gol_ket`,`unor`.`unor_nama` AS `unor_nama` from (((`pegawai` join `instansi`) join `golongan`) join `unor`) where `pegawai`.`instansi_id` = `instansi`.`instansi_id` and `pegawai`.`gol_id` = `golongan`.`gol_id` and `pegawai`.`unor_id` = `unor`.`unor_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`gol_id`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`instansi_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`jenis_cuti_id`);

--
-- Indexes for table `jenis_cuti_tmp`
--
ALTER TABLE `jenis_cuti_tmp`
  ADD PRIMARY KEY (`jenis_cuti_tmp_id`);

--
-- Indexes for table `jenis_kawin`
--
ALTER TABLE `jenis_kawin`
  ADD PRIMARY KEY (`jenis_kawin_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `log_pengajuan`
--
ALTER TABLE `log_pengajuan`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pns_id`),
  ADD KEY `agama_fk` (`agama_id`),
  ADD KEY `jabatan_fk` (`jabatan_id`),
  ADD KEY `jkawin_fk` (`jenis_kawin_id`),
  ADD KEY `unor_fk` (`unor_id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`pengajuan_id`);

--
-- Indexes for table `unor`
--
ALTER TABLE `unor`
  ADD PRIMARY KEY (`unor_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `agama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `gol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `instansi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `jenis_cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_cuti_tmp`
--
ALTER TABLE `jenis_cuti_tmp`
  MODIFY `jenis_cuti_tmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `jenis_kawin`
--
ALTER TABLE `jenis_kawin`
  MODIFY `jenis_kawin_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_pengajuan`
--
ALTER TABLE `log_pengajuan`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pns_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `pengajuan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `unor`
--
ALTER TABLE `unor`
  MODIFY `unor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `agama_fk` FOREIGN KEY (`agama_id`) REFERENCES `agama` (`agama_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jabatan_fk` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jkawin_fk` FOREIGN KEY (`jenis_kawin_id`) REFERENCES `jenis_kawin` (`jenis_kawin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unor_fk` FOREIGN KEY (`unor_id`) REFERENCES `unor` (`unor_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
