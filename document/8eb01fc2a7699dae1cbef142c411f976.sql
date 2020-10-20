-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2020 pada 13.40
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
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `role`, `status`) VALUES
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 0),
(14, 'kesiswaan', 'accc7841ce41b0f788a737bf9798ea4f', 'kesiswaan', 2, 0),
(15, 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala sekolah', 4, 0),
(16, 'osis', '5ee4f2e5c3c3a0e841a8b216c6c28e88', 'Asep', 5, 1),
(17, 'kurikulum', '4e7f2477836fa0c289105740fee0ebb1', 'Bram', 3, 0),
(18, 'adminmutu', '9af5911dbb72da13e87e53fefc4ae262', 'Admin mutu', 1, 0),
(19, 'timsekolah', '6bc0d2ac0c9ceabe9c96ed212f1b91b2', 'tim sekolah', 8, 0),
(20, 'pj', 'c983d071bd4bda32ff24c2234d4fc9a4', 'pj', 7, 0),
(21, 'asede', '55f4f9bdcc0d87f3d6ff626f7f83c682', 'adminmutu', 6, 1),
(23, '2', 'c81e728d9d4c2f636f067f89cc14862c', 'test 2', 2, 0),
(31, '4321', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'Daniel Setiawan', 15, 0),
(32, '4322', '22a57394810fd219eb7bbd163021c270', 'Windy Puji Oktiagraha', 15, 0),
(33, '4323', '56ea8b83122449e814e0fd7bfb5f220a', 'Ricky Hendzen', 15, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
