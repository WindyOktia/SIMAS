-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2020 pada 15.48
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `jadwal_guru`
--

CREATE TABLE `jadwal_guru` (
  `id_jadwal_guru` int(11) NOT NULL,
  `tahun_akademik` text NOT NULL,
  `semester` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_guru`
--

INSERT INTO `jadwal_guru` (`id_jadwal_guru`, `tahun_akademik`, `semester`, `id_guru`, `hari`, `id_kelas`, `id_mapel`, `jam_mulai`, `jam_selesai`) VALUES
(71, '2019 / 2020', 'Genap', 56, 'Senin', 12, 4, '07:00:00', '07:45:00'),
(73, '2019 / 2020', 'Genap', 56, 'Senin', 12, 4, '07:46:00', '08:30:00'),
(74, '2019 / 2020', 'Genap', 56, 'Senin', 13, 4, '10:00:00', '10:45:00'),
(75, '2019 / 2020', 'Genap', 56, 'Senin', 13, 4, '10:46:00', '11:30:00'),
(76, '2019 / 2020', 'Genap', 56, 'Senin', 13, 4, '12:30:00', '13:15:00'),
(77, '2019 / 2020', 'Genap', 56, 'Senin', 14, 4, '13:16:00', '14:00:00'),
(78, '2019 / 2020', 'Genap', 56, 'Selasa', 14, 4, '07:00:00', '07:45:00'),
(79, '2019 / 2020', 'Genap', 56, 'Selasa', 14, 4, '07:46:00', '08:30:00'),
(80, '2019 / 2020', 'Genap', 56, 'Selasa', 14, 4, '08:31:00', '09:15:00'),
(81, '2019 / 2020', 'Genap', 56, 'Selasa', 14, 4, '09:16:00', '10:00:00'),
(82, '2019 / 2020', 'Genap', 56, 'Selasa', 15, 4, '10:01:00', '10:45:00'),
(83, '2019 / 2020', 'Genap', 56, 'Selasa', 15, 4, '10:46:00', '11:30:00'),
(84, '2019 / 2020', 'Genap', 56, 'Selasa', 15, 4, '12:00:00', '12:45:00'),
(85, '2019 / 2020', 'Genap', 56, 'Rabu', 20, 4, '07:00:00', '07:45:00'),
(86, '2019 / 2020', 'Genap', 56, 'Rabu', 20, 4, '07:46:00', '08:30:00'),
(87, '2019 / 2020', 'Genap', 56, 'Rabu', 20, 4, '08:31:00', '09:15:00'),
(88, '2019 / 2020', 'Genap', 56, 'Rabu', 21, 4, '09:16:00', '10:00:00'),
(89, '2019 / 2020', 'Genap', 56, 'Rabu', 21, 4, '10:01:00', '10:45:00'),
(90, '2019 / 2020', 'Genap', 56, 'Rabu', 22, 4, '10:46:00', '11:30:00'),
(91, '2019 / 2020', 'Genap', 56, 'Rabu', 23, 4, '12:00:00', '12:45:00'),
(96, '2019 / 2020', 'Genap', 56, 'Kamis', 21, 4, '07:00:00', '07:45:00'),
(97, '2019 / 2020', 'Genap', 56, 'Kamis', 21, 4, '07:46:00', '08:30:00'),
(98, '2019 / 2020', 'Genap', 56, 'Kamis', 21, 4, '08:31:00', '09:15:00'),
(99, '2019 / 2020', 'Genap', 56, 'Kamis', 22, 4, '10:00:00', '10:45:00'),
(100, '2019 / 2020', 'Genap', 56, 'Kamis', 22, 4, '10:46:00', '11:30:00'),
(101, '2019 / 2020', 'Genap', 56, 'Kamis', 23, 4, '12:00:00', '12:45:00'),
(102, '2019 / 2020', 'Genap', 56, 'Kamis', 24, 4, '12:46:00', '13:30:00'),
(103, '2019 / 2020', 'Genap', 56, 'Jumat', 26, 4, '07:00:00', '07:45:00'),
(104, '2019 / 2020', 'Genap', 56, 'Jumat', 26, 4, '07:46:00', '08:30:00'),
(105, '2019 / 2020', 'Genap', 56, 'Jumat', 27, 4, '08:31:00', '09:15:00'),
(106, '2019 / 2020', 'Genap', 56, 'Jumat', 29, 4, '09:16:00', '10:00:00'),
(107, '2019 / 2020', 'Genap', 56, 'Jumat', 30, 4, '10:01:00', '10:45:00'),
(108, '2019 / 2020', 'Genap', 56, 'Jumat', 20, 4, '10:46:00', '11:30:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  ADD PRIMARY KEY (`id_jadwal_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  MODIFY `id_jadwal_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
