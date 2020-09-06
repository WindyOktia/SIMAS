-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 05:45 PM
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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `rfid` text NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `rfid`, `nip`, `nama_guru`, `alamat`) VALUES
(38, '0011724833', 777, 'anu', 'anu');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `judul_informasi` text NOT NULL,
  `detail_informasi` text NOT NULL,
  `dibuat_tanggal` date NOT NULL,
  `dibuat_oleh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `judul_informasi`, `detail_informasi`, `dibuat_tanggal`, `dibuat_oleh`) VALUES
(6, 'informasi umum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2020-08-06', 'admin'),
(7, 'tes', 'tes', '2020-08-07', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_guru`
--

CREATE TABLE `jadwal_guru` (
  `id_jadwal_guru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_guru`
--

INSERT INTO `jadwal_guru` (`id_jadwal_guru`, `id_guru`, `hari`, `id_kelas`, `jam_mulai`, `jam_selesai`) VALUES
(13, 7, 'Kamis', 14, '14:11:00', '11:11:00'),
(14, 7, 'Kamis', 14, '11:11:00', '11:11:00'),
(15, 7, 'Senin', 12, '11:11:00', '11:11:00'),
(16, 8, 'Senin', 12, '08:30:00', '10:00:00'),
(17, 8, 'Senin', 12, '10:30:00', '12:00:00'),
(18, 8, 'Senin', 12, '12:30:00', '13:30:00'),
(19, 38, 'Rabu', 13, '22:00:00', '22:30:00'),
(20, 38, 'Selasa', 13, '12:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `jurusan` text NOT NULL,
  `sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `sub`) VALUES
(12, 'X', 'IPA', 1),
(13, 'X', 'IPA', 2),
(14, 'X', 'IPA', 3),
(15, 'X', 'IPS', 1),
(16, 'X', 'IPS', 2),
(17, 'X', 'IPS', 3),
(19, 'X', 'IPS', 4);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_proposal` int(11) NOT NULL,
  `lb_laporan` text NOT NULL,
  `tujuan_laporan` text NOT NULL,
  `lp_jln_kegiatan` text NOT NULL,
  `hasil_kegiatan` text NOT NULL,
  `kendala_kegiatan` text NOT NULL,
  `solusi_kegiatan` text NOT NULL,
  `kesimpulan` text NOT NULL,
  `saran` text NOT NULL,
  `tot_biaya` int(11) NOT NULL,
  `tgl_pengajuan_lp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_proposal`, `lb_laporan`, `tujuan_laporan`, `lp_jln_kegiatan`, `hasil_kegiatan`, `kendala_kegiatan`, `solusi_kegiatan`, `kesimpulan`, `saran`, `tot_biaya`, `tgl_pengajuan_lp`) VALUES
(1, 5, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 11133124, '4412-12-22'),
(2, 6, 'sadsad', 'cxzcxz', 'adasds', 'menang', 'itulah', 'itulah', 'yaitulah', 'tidak', 300000, '2019-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `deskripsi`) VALUES
(1, 'tesa', 'jajal lu');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_harian`
--

CREATE TABLE `presensi_harian` (
  `id_presensi_harian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi_harian`
--

INSERT INTO `presensi_harian` (`id_presensi_harian`, `tanggal`, `hari`, `id_guru`, `jam_masuk`, `jam_pulang`) VALUES
(1, '2020-03-28', 'Saturday', 37, '00:11:26', '00:11:26'),
(2, '2020-03-28', 'Saturday', 37, '00:11:53', '00:11:53'),
(3, '2020-03-28', 'Saturday', 37, '00:13:44', '00:13:44'),
(4, '2020-03-28', 'Saturday', 37, '00:13:45', '00:13:45'),
(5, '2020-03-28', 'Saturday', 37, '00:14:19', '00:14:19'),
(6, '2020-03-28', 'Saturday', 37, '00:14:21', '00:14:21'),
(7, '2020-03-28', 'Saturday', 37, '00:14:30', '00:14:30'),
(8, '2020-03-28', 'Saturday', 37, '00:14:39', '00:14:39'),
(9, '2020-03-28', 'Saturday', 37, '00:15:08', '00:15:08'),
(10, '2020-03-28', 'Saturday', 37, '00:16:16', '00:16:16'),
(11, '2020-03-28', 'Saturday', 37, '00:16:23', '00:16:23'),
(12, '2020-03-28', 'Saturday', 37, '00:16:56', '00:16:56'),
(13, '2020-03-28', 'Saturday', 37, '00:17:10', '00:17:10'),
(14, '2020-03-28', 'Saturday', 37, '00:17:22', '00:17:22'),
(15, '2020-03-28', 'Saturday', 37, '00:17:40', '00:17:40'),
(16, '2020-03-28', 'Saturday', 37, '00:18:51', '00:18:51'),
(17, '2020-03-28', 'Saturday', 37, '00:18:58', '00:18:58'),
(18, '2020-03-28', 'Saturday', 37, '00:19:01', '00:19:01'),
(19, '2020-03-28', 'Saturday', 37, '00:21:17', '00:21:17'),
(20, '2020-03-28', 'Saturday', 37, '00:21:19', '00:21:19'),
(21, '2020-03-28', 'Saturday', 37, '00:21:25', '00:21:25'),
(22, '2020-03-28', 'Saturday', 37, '00:21:27', '00:21:27'),
(23, '2020-04-13', 'Monday', 38, '01:28:26', '01:28:26'),
(24, '2020-04-13', 'Monday', 38, '01:28:31', '01:28:31'),
(25, '2020-04-13', 'Monday', 38, '01:28:44', '01:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `presensi_mengajar`
--

CREATE TABLE `presensi_mengajar` (
  `id_presensi_mengajar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_jadwal_guru` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `tahun_akademik` text NOT NULL,
  `semester` text NOT NULL,
  `lb_kegiatan` text NOT NULL,
  `tujuan_kegiatan` text NOT NULL,
  `harapan_kegiatan` text NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `tempat` text NOT NULL,
  `tot_anggaran` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `id_user`, `nama_kegiatan`, `tahun_akademik`, `semester`, `lb_kegiatan`, `tujuan_kegiatan`, `harapan_kegiatan`, `tgl_pelaksanaan`, `tempat`, `tot_anggaran`, `tgl_pengajuan`) VALUES
(5, 0, 'test system', '2019/2020', 'Ganjil', 'test', 'test', 'test', '2020-12-19', 'UKDW', 1000000, '2020-08-12'),
(6, 0, 'basket', '10/2020', 'Genap', 'Seperti itu', 'ingin menang', 'menang', '2019-09-10', 'Sekolah', 10000000, '2019-10-10'),
(7, 0, 'basket', '2019/2020', 'Ganjil', 'Seperti itu', 'ingin menang', 'menang', '2017-10-25', 'Sekolah', 10000000, '2018-09-10'),
(8, 0, 'gaiso', '2018/2019', 'Ganjil', 'ga iso e', 'mbuh', 'mbuh', '2018-09-12', 'mbuh', 300000, '2018-01-10'),
(9, 0, 'asda', '2018/2020', 'Ganjil', 'asdasd', 'SADSAD', 'SADSAD', '2019-12-12', 'SADADSA', 121212121, '2019-12-10'),
(10, 0, 'asdllakda', '2017/2018', 'Ganjil', 'asedsakdjsa', 'asjhdsald', 'sadsads', '2018-10-10', 'sadsa', 99999999, '2020-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nipd` int(11) NOT NULL,
  `nama_siswa` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_ibu` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nipd`, `nama_siswa`, `id_kelas`, `nama_ibu`, `alamat`) VALUES
(6, 222, 'Windy Puji Oktiagraha', 12, 'dana', 'Gunungkidul, Yogyakarta'),
(7, 666, 'Danu', 12, 'riana', 'Yogyakarta, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia'),
(8, 22581, 'sanu', 14, 'riana', 'Yogyakarta, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia'),
(9, 9999, 'Windy Puji Oktiagraha', 12, 'aa', 'Gunungkidul, Yogyakarta'),
(10, 2212, 'tesss', 18, 'dana', 'asaassss');

-- --------------------------------------------------------

--
-- Table structure for table `trans_doc`
--

CREATE TABLE `trans_doc` (
  `id_trans_doc` int(11) NOT NULL,
  `code_id` text NOT NULL,
  `nama_doc` text NOT NULL,
  `link_file` text NOT NULL,
  `type_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_doc`
--

INSERT INTO `trans_doc` (`id_trans_doc`, `code_id`, `nama_doc`, `link_file`, `type_file`) VALUES
(6, 'proposal_3', 'Peserta', 'c62b52a9c4afdcdad0606618a3715d51.xlsx', '.xlsx'),
(7, 'proposal_3', 'Rincian Agenda', '72cd6d10a9422b5912154cc6d9b9d823.xlsx', '.xlsx'),
(8, 'proposal_4', 'Peserta', '8fc4110f250ddea7cd82277ff6ea0504.xlsx', '.xlsx'),
(9, 'proposal_4', 'Rincian Anggaran', 'c33e18c1074f5681d3ac7c036160f881.xls', '.xls'),
(10, 'proposal_4', 'Sumber Dana', 'ea406bc32788bb74d618f2e02631bba7.xls', '.xls'),
(11, 'proposal_5', 'Peserta', '6ea22b02afc2d2a86510f8af79a2569c.xlsx', '.xlsx'),
(12, 'laporan_1', 'Peserta', '74abd6cc8384864a0a6dc866d69dff75.xlsx', '.xlsx'),
(13, 'laporan_2', 'Peserta', '0ad5cb9fcf1b6138d697e0c185cdc9c5.docx', '.docx'),
(14, 'proposal_8', 'Peserta', 'ec57b7366bcab7020c07e8897339e95a.docx', '.docx'),
(15, 'proposal_9', 'Peserta', '1830167bb9a73caaa8be0e8b3aec93d5.docx', '.docx'),
(16, 'proposal_9', 'Rincian Anggaran', '404bfc7be9a6ffbefc8127a42a45b37d.docx', '.docx'),
(17, 'proposal_9', 'Sumber Dana', '6fec65c765f6c7b4ec4b1379f91f38f0.docx', '.docx'),
(18, 'proposal_10', 'Peserta', '69a6eae56a1da33dc4ccf3ebd502bbeb.png', '.png'),
(19, 'proposal_10', 'Rincian Agenda', 'a7711c7e1ca218902596fd8e28fc0cb5.png', '.png'),
(20, 'proposal_10', 'Rincian Anggaran', '82f2c9d41bcd3bbd981008f6d6ae5f5c.png', '.png'),
(21, 'proposal_10', 'Sumber Dana', '169516f4166f1f67f496a5e96d582cc6.png', '.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`, `status`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 0),
(14, 'kesiswaan', 'accc7841ce41b0f788a737bf9798ea4f', 'kesiswaan', 2, 0),
(15, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala sekolah', 4, 1),
(16, 'osis', '5ee4f2e5c3c3a0e841a8b216c6c28e88', 'Asep', 5, 0),
(17, 'kurikulum', '4e7f2477836fa0c289105740fee0ebb1', 'Bram', 3, 0),
(18, 'adminmutu', '9af5911dbb72da13e87e53fefc4ae262', 'Admin mutu', 1, 0),
(19, 'timsekolah', '6bc0d2ac0c9ceabe9c96ed212f1b91b2', 'tim sekolah', 8, 0),
(20, 'pj', 'c983d071bd4bda32ff24c2234d4fc9a4', 'pj', 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  ADD PRIMARY KEY (`id_jadwal_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `presensi_harian`
--
ALTER TABLE `presensi_harian`
  ADD PRIMARY KEY (`id_presensi_harian`);

--
-- Indexes for table `presensi_mengajar`
--
ALTER TABLE `presensi_mengajar`
  ADD PRIMARY KEY (`id_presensi_mengajar`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `trans_doc`
--
ALTER TABLE `trans_doc`
  ADD PRIMARY KEY (`id_trans_doc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  MODIFY `id_jadwal_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi_harian`
--
ALTER TABLE `presensi_harian`
  MODIFY `id_presensi_harian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `presensi_mengajar`
--
ALTER TABLE `presensi_mengajar`
  MODIFY `id_presensi_mengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trans_doc`
--
ALTER TABLE `trans_doc`
  MODIFY `id_trans_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
