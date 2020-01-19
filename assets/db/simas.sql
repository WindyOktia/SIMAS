-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2020 pada 07.40
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `rfid` text NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` text NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `rfid`, `nip`, `nama_guru`, `alamat`) VALUES
(7, '0011724833', 1, 'guru 1', 'jogja'),
(8, '0001061898', 2, 'guru 2', 'gunungkidul'),
(9, '0006281763', 3, 'guru 3', 'timor'),
(10, '0006283172', 4, 'guru 4', 'solo'),
(11, '0009740658', 5, 'guru 5', 'klaten');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_guru`
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
-- Dumping data untuk tabel `jadwal_guru`
--

INSERT INTO `jadwal_guru` (`id_jadwal_guru`, `id_guru`, `hari`, `id_kelas`, `jam_mulai`, `jam_selesai`) VALUES
(13, 7, 'Kamis', 14, '14:11:00', '11:11:00'),
(14, 7, 'Kamis', 14, '11:11:00', '11:11:00'),
(15, 7, 'Senin', 12, '11:11:00', '11:11:00'),
(16, 8, 'Senin', 12, '08:30:00', '10:00:00'),
(17, 8, 'Senin', 12, '10:30:00', '12:00:00'),
(18, 8, 'Senin', 12, '12:30:00', '13:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `jurusan` text NOT NULL,
  `sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `jurusan`, `sub`) VALUES
(12, 'X', 'IPA', 1),
(13, 'X', 'IPA', 2),
(14, 'X', 'IPA', 3),
(15, 'X', 'IPS', 1),
(16, 'X', 'IPS', 2),
(17, 'X', 'IPS', 3),
(18, 'X', 'Bahasa', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi_harian`
--

CREATE TABLE `presensi_harian` (
  `id_presensi_harian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hari` text NOT NULL,
  `id_guru` int(11) NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_pulang` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi_mengajar`
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
-- Struktur dari tabel `siswa`
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
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nipd`, `nama_siswa`, `id_kelas`, `nama_ibu`, `alamat`) VALUES
(6, 222, 'Windy Puji Oktiagraha', 12, 'dana', 'Gunungkidul, Yogyakarta'),
(7, 666, 'Danu', 12, 'riana', 'Yogyakarta, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia'),
(8, 22581, 'sanu', 14, 'riana', 'Yogyakarta, Kota Yogyakarta, Daerah Istimewa Yogyakarta, Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  ADD PRIMARY KEY (`id_jadwal_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `presensi_harian`
--
ALTER TABLE `presensi_harian`
  ADD PRIMARY KEY (`id_presensi_harian`);

--
-- Indeks untuk tabel `presensi_mengajar`
--
ALTER TABLE `presensi_mengajar`
  ADD PRIMARY KEY (`id_presensi_mengajar`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jadwal_guru`
--
ALTER TABLE `jadwal_guru`
  MODIFY `id_jadwal_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `presensi_harian`
--
ALTER TABLE `presensi_harian`
  MODIFY `id_presensi_harian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi_mengajar`
--
ALTER TABLE `presensi_mengajar`
  MODIFY `id_presensi_mengajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
