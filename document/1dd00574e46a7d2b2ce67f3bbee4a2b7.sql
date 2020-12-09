-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Des 2020 pada 19.40
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
-- Database: `es`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aksi_guru`
--

CREATE TABLE `aksi_guru` (
  `id_aksi_guru` int(11) NOT NULL,
  `nipd` varchar(128) NOT NULL,
  `tgl_isi` datetime NOT NULL,
  `id_survei_guru` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aksi_guru`
--

INSERT INTO `aksi_guru` (`id_aksi_guru`, `nipd`, `tgl_isi`, `id_survei_guru`, `id_guru`) VALUES
(72, '22889', '2019-11-12 02:56:00', 26, 60),
(73, '23003', '2019-11-12 02:56:05', 26, 60),
(74, '22889', '2019-11-12 02:56:21', 26, 61),
(75, '23056', '2019-11-12 02:56:29', 26, 60),
(76, '22998', '2019-11-12 02:56:30', 26, 60),
(77, '23003', '2019-11-12 02:56:32', 26, 61),
(78, '22889', '2019-11-12 02:56:40', 26, 63),
(79, '23056', '2019-11-12 02:56:54', 26, 61),
(80, '22889', '2019-11-12 02:56:54', 26, 66),
(81, '22998', '2019-11-12 02:56:56', 26, 61),
(82, '22889', '2019-11-12 02:57:03', 26, 67),
(83, '23056', '2019-11-12 02:57:13', 26, 63),
(84, '22998', '2019-11-12 02:57:19', 26, 63),
(85, '23003', '2019-11-12 02:57:24', 26, 63),
(86, '23056', '2019-11-12 02:58:11', 26, 67),
(87, '23003', '2019-11-12 02:58:39', 26, 66),
(88, '23003', '2019-11-12 02:59:00', 26, 67),
(89, '22998', '2019-11-12 02:59:55', 26, 66),
(90, '23060', '2019-11-12 03:00:01', 26, 60),
(91, '22998', '2019-11-12 03:00:13', 26, 67),
(92, '23060', '2019-11-12 03:00:16', 26, 61),
(93, '23060', '2019-11-12 03:01:41', 26, 63),
(94, '23049', '2019-11-12 03:02:05', 26, 60),
(95, '23082', '2019-11-12 03:02:07', 26, 60),
(96, '23060', '2019-11-12 03:02:09', 26, 66),
(97, '23049', '2019-11-12 03:02:36', 26, 67),
(98, '23051', '2019-11-12 03:02:38', 26, 61),
(99, '23060', '2019-11-12 03:02:42', 26, 67),
(100, '23082', '2019-11-12 03:02:54', 26, 63),
(101, '22952', '2019-11-12 03:03:04', 26, 61),
(102, '23063', '2019-11-12 03:03:13', 26, 60),
(103, '23049', '2019-11-12 03:03:27', 26, 66),
(104, '22952', '2019-11-12 03:04:02', 26, 67),
(105, '23051', '2019-11-12 03:04:06', 26, 66),
(106, '23074', '2019-11-12 03:04:08', 26, 60),
(107, '23049', '2019-11-12 03:04:22', 26, 61),
(108, '23063', '2019-11-12 03:04:23', 26, 66),
(109, '23063', '2019-11-12 03:04:31', 26, 61),
(110, '23074', '2019-11-12 03:04:38', 26, 61),
(111, '23082', '2019-11-12 03:04:47', 26, 66),
(112, '23063', '2019-11-12 03:04:51', 26, 63),
(113, '23049', '2019-11-12 03:04:58', 26, 63),
(114, '23076', '2019-11-12 03:04:59', 26, 66),
(115, '23074', '2019-11-12 03:05:04', 26, 63),
(116, '23063', '2019-11-12 03:05:09', 26, 67),
(117, '23051', '2019-11-12 03:05:11', 26, 60),
(118, '23067', '2019-11-12 03:05:12', 26, 60),
(119, '23056', '2019-11-12 03:05:18', 26, 66),
(120, '23074', '2019-11-12 03:05:30', 26, 66),
(121, '23076', '2019-11-12 03:05:36', 26, 61),
(122, '22984', '2019-11-12 03:05:39', 26, 60),
(123, '22952', '2019-11-12 03:05:40', 26, 60),
(124, '23074', '2019-11-12 03:05:43', 26, 67),
(125, '23047', '2019-11-12 03:05:43', 26, 60),
(126, '23067', '2019-11-12 03:05:48', 26, 61),
(127, '23076', '2019-11-12 03:06:10', 26, 67),
(128, '23051', '2019-11-12 03:06:19', 26, 67),
(129, '23078', '2019-11-12 03:06:21', 26, 60),
(130, '23067', '2019-11-12 03:06:22', 26, 63),
(131, '23082', '2019-11-12 03:06:27', 26, 61),
(132, '23058', '2019-11-12 03:06:27', 26, 60),
(133, '22984', '2019-11-12 03:06:31', 26, 61),
(134, '23076', '2019-11-12 03:06:39', 26, 60),
(135, '23067', '2019-11-12 03:06:40', 26, 67),
(136, '23065', '2019-11-12 03:06:43', 26, 60),
(137, '22952', '2019-11-12 03:06:44', 26, 63),
(138, '23078', '2019-11-12 03:06:58', 26, 66),
(139, '23076', '2019-11-12 03:07:05', 26, 63),
(140, '23065', '2019-11-12 03:07:06', 26, 61),
(141, '23067', '2019-11-12 03:07:08', 26, 66),
(142, '22984', '2019-11-12 03:07:12', 26, 63),
(143, '23078', '2019-11-12 03:07:20', 26, 67),
(144, '23047', '2019-11-12 03:07:21', 26, 61),
(145, '23065', '2019-11-12 03:07:25', 26, 63),
(146, '23058', '2019-11-12 03:07:35', 26, 61),
(147, '23057', '2019-11-12 03:07:40', 26, 61),
(148, '23082', '2019-11-12 03:07:43', 26, 67),
(149, '23001', '2019-11-12 03:07:47', 26, 60),
(150, '23078', '2019-11-12 03:07:51', 26, 61),
(151, '23051', '2019-11-12 03:07:55', 26, 63),
(152, '23001', '2019-11-12 03:07:58', 26, 61),
(153, '22984', '2019-11-12 03:08:03', 26, 66),
(154, '23001', '2019-11-12 03:08:09', 26, 62),
(155, '23058', '2019-11-12 03:08:11', 26, 63),
(156, '23047', '2019-11-12 03:08:13', 26, 63),
(157, '23061', '2019-11-12 03:08:15', 26, 66),
(158, '23001', '2019-11-12 03:08:20', 26, 63),
(159, '23078', '2019-11-12 03:08:21', 26, 63),
(160, '22984', '2019-11-12 03:08:22', 26, 67),
(161, '22952', '2019-11-12 03:08:24', 26, 66),
(162, '23001', '2019-11-12 03:08:31', 26, 66),
(163, '23057', '2019-11-12 03:08:42', 26, 60),
(164, '23001', '2019-11-12 03:08:42', 26, 67),
(165, '23061', '2019-11-12 03:08:45', 26, 60),
(166, '22997', '2019-11-12 03:08:59', 26, 60),
(167, '23061', '2019-11-12 03:08:59', 26, 61),
(168, '23047', '2019-11-12 03:09:02', 26, 66),
(169, '23065', '2019-11-12 03:09:02', 26, 66),
(170, '23058', '2019-11-12 03:09:07', 26, 66),
(171, '23061', '2019-11-12 03:09:13', 26, 63),
(172, '22997', '2019-11-12 03:09:15', 26, 61),
(173, '23065', '2019-11-12 03:09:22', 26, 67),
(174, '23061', '2019-11-12 03:09:23', 26, 67),
(175, '22997', '2019-11-12 03:09:30', 26, 63),
(176, '23047', '2019-11-12 03:09:34', 26, 67),
(177, '22997', '2019-11-12 03:09:43', 26, 66),
(178, '22997', '2019-11-12 03:10:00', 26, 67),
(179, '23058', '2019-11-12 03:10:11', 26, 67),
(180, '23057', '2019-11-12 03:11:01', 26, 66),
(181, '23057', '2019-11-12 03:11:15', 26, 63),
(182, '23057', '2019-11-12 03:11:28', 26, 67),
(183, '22972', '2019-11-12 05:19:43', 26, 60),
(184, '22972', '2019-11-12 05:20:04', 26, 61),
(185, '23041', '2019-11-12 05:21:00', 26, 60),
(186, '23041', '2019-11-12 05:21:18', 26, 61),
(187, '22972', '2019-11-12 05:21:39', 26, 65),
(188, '23073', '2019-11-12 05:21:40', 26, 60),
(189, '22921', '2019-11-12 05:21:48', 26, 60),
(190, '23073', '2019-11-12 05:21:52', 26, 61),
(191, '22921', '2019-11-12 05:22:08', 26, 61),
(192, '22921', '2019-11-12 05:22:55', 26, 65),
(193, '23073', '2019-11-12 05:22:55', 26, 65),
(194, '23041', '2019-11-12 05:22:55', 26, 65),
(195, '22932', '2019-11-12 05:24:03', 26, 60),
(196, '22932', '2019-11-12 05:24:28', 26, 61),
(197, '22932', '2019-11-12 05:24:47', 26, 65),
(198, '23077', '2019-11-12 05:24:53', 26, 65),
(199, '23077', '2019-11-12 05:25:19', 26, 61),
(200, '23055', '2019-11-12 05:25:36', 26, 60),
(201, '23030', '2019-11-12 05:25:45', 26, 60),
(202, '23077', '2019-11-12 05:25:46', 26, 60),
(203, '23030', '2019-11-12 05:26:00', 26, 61),
(204, '23055', '2019-11-12 05:26:24', 26, 61),
(205, '23030', '2019-11-12 05:26:31', 26, 65),
(206, '23055', '2019-11-12 05:26:39', 26, 65),
(207, '23071', '2019-11-12 05:29:18', 26, 60),
(208, '23071', '2019-11-12 05:29:28', 26, 61),
(209, '23022', '2019-11-12 05:29:43', 26, 60),
(210, '23071', '2019-11-12 05:29:44', 26, 65),
(211, '23064', '2019-11-12 05:30:17', 26, 60),
(212, '23022', '2019-11-12 05:30:27', 26, 61),
(213, '23025', '2019-11-12 05:30:33', 26, 60),
(214, '23064', '2019-11-12 05:30:38', 26, 61),
(215, '23025', '2019-11-12 05:30:45', 26, 61),
(216, '23064', '2019-11-12 05:30:59', 26, 65),
(217, '23022', '2019-11-12 05:31:01', 26, 65),
(218, '23025', '2019-11-12 05:31:05', 26, 65),
(219, '23066', '2019-11-12 05:31:34', 26, 60),
(220, '23066', '2019-11-12 05:31:52', 26, 61),
(221, '23066', '2019-11-12 05:32:24', 26, 65),
(222, '22999', '2019-11-12 05:32:55', 26, 60),
(223, '22999', '2019-11-12 05:33:13', 26, 61),
(224, '22999', '2019-11-12 05:33:39', 26, 65),
(225, '22989', '2019-11-12 05:34:36', 26, 60),
(226, '23033', '2019-11-12 05:34:41', 26, 60),
(227, '22989', '2019-11-12 05:34:54', 26, 61),
(228, '23033', '2019-11-12 05:35:02', 26, 61),
(229, '22878', '2019-11-12 05:35:03', 26, 61),
(230, '22989', '2019-11-12 05:35:17', 26, 65),
(231, '23033', '2019-11-12 05:35:33', 26, 65),
(232, '22878', '2019-11-12 05:35:36', 26, 60),
(233, '22878', '2019-11-12 05:36:09', 26, 65),
(234, '23079', '2019-11-12 05:36:15', 26, 60),
(235, '23079', '2019-11-12 05:36:39', 26, 61),
(236, '23079', '2019-11-12 05:37:43', 26, 65),
(237, '22870', '2019-11-12 05:38:06', 26, 60),
(238, '22870', '2019-11-12 05:38:18', 26, 61),
(239, '22870', '2019-11-12 05:38:34', 26, 65),
(240, '22954', '2019-11-12 06:35:21', 26, 60),
(241, '22954', '2019-11-12 06:35:32', 26, 61),
(242, '22954', '2019-11-12 06:36:17', 26, 63),
(243, '22954', '2019-11-12 06:36:34', 26, 66),
(244, '23012', '2019-11-12 06:36:34', 26, 60),
(245, '22954', '2019-11-12 06:36:49', 26, 67),
(246, '23012', '2019-11-12 06:37:04', 26, 61),
(247, '22931', '2019-11-12 06:37:18', 26, 60),
(248, '23012', '2019-11-12 06:37:27', 26, 63),
(249, '22931', '2019-11-12 06:37:38', 26, 63),
(250, '22973', '2019-11-12 06:37:47', 26, 60),
(251, '23012', '2019-11-12 06:37:54', 26, 66),
(252, '22931', '2019-11-12 06:37:58', 26, 66),
(253, '22973', '2019-11-12 06:38:02', 26, 61),
(254, '23012', '2019-11-12 06:38:10', 26, 67),
(255, '22931', '2019-11-12 06:38:11', 26, 61),
(256, '22973', '2019-11-12 06:38:24', 26, 63),
(257, '22931', '2019-11-12 06:38:27', 26, 67),
(258, '23014', '2019-11-12 06:38:29', 26, 60),
(259, '22973', '2019-11-12 06:38:40', 26, 67),
(260, '23014', '2019-11-12 06:38:44', 26, 61),
(261, '22973', '2019-11-12 06:38:57', 26, 66),
(262, '23014', '2019-11-12 06:39:23', 26, 63),
(263, '23014', '2019-11-12 06:39:31', 26, 62),
(264, '23014', '2019-11-12 06:39:44', 26, 66),
(265, '23014', '2019-11-12 06:40:00', 26, 67),
(266, '22946', '2019-11-12 06:40:19', 26, 60),
(267, '22962', '2019-11-12 06:40:23', 26, 60),
(268, '22946', '2019-11-12 06:40:29', 26, 61),
(269, '22962', '2019-11-12 06:40:39', 26, 61),
(270, '22946', '2019-11-12 06:40:50', 26, 63),
(271, '22962', '2019-11-12 06:40:56', 26, 63),
(272, '22985', '2019-11-12 06:40:58', 26, 60),
(273, '22946', '2019-11-12 06:41:08', 26, 66),
(274, '22985', '2019-11-12 06:41:12', 26, 61),
(275, '22938', '2019-11-12 06:41:18', 26, 60),
(276, '22946', '2019-11-12 06:41:20', 26, 67),
(277, '22962', '2019-11-12 06:41:24', 26, 67),
(278, '22985', '2019-11-12 06:41:39', 26, 63),
(279, '22938', '2019-11-12 06:41:41', 26, 61),
(280, '22962', '2019-11-12 06:42:00', 26, 66),
(281, '22938', '2019-11-12 06:42:09', 26, 63),
(282, '22938', '2019-11-12 06:42:24', 26, 67),
(283, '22985', '2019-11-12 06:42:41', 26, 66),
(284, '22938', '2019-11-12 06:42:42', 26, 66),
(285, '22977', '2019-11-12 06:42:53', 26, 60),
(286, '22929', '2019-11-12 06:42:54', 26, 60),
(287, '22929', '2019-11-12 06:43:04', 26, 61),
(288, '22985', '2019-11-12 06:43:07', 26, 67),
(289, '22977', '2019-11-12 06:43:07', 26, 61),
(290, '22929', '2019-11-12 06:43:24', 26, 63),
(291, '22977', '2019-11-12 06:43:33', 26, 63),
(292, '23023', '2019-11-12 06:43:42', 26, 60),
(293, '22977', '2019-11-12 06:43:53', 26, 66),
(294, '23023', '2019-11-12 06:43:54', 26, 62),
(295, '22929', '2019-11-12 06:43:58', 26, 66),
(296, '22977', '2019-11-12 06:44:08', 26, 67),
(297, '22929', '2019-11-12 06:44:08', 26, 67),
(298, '23023', '2019-11-12 06:44:11', 26, 61),
(299, '23023', '2019-11-12 06:44:23', 26, 63),
(300, '23023', '2019-11-12 06:44:37', 26, 66),
(301, '23023', '2019-11-12 06:44:52', 26, 67),
(302, '23029', '2019-11-12 06:47:08', 26, 60),
(303, '23029', '2019-11-12 06:47:32', 26, 61),
(304, '23029', '2019-11-12 06:48:01', 26, 63),
(305, '22990', '2019-11-12 06:48:06', 26, 60),
(306, '23043', '2019-11-12 06:48:14', 26, 60),
(307, '22990', '2019-11-12 06:48:43', 26, 61),
(308, '23043', '2019-11-12 06:48:43', 26, 61),
(309, '23029', '2019-11-12 06:48:49', 26, 66),
(310, '22990', '2019-11-12 06:49:11', 26, 63),
(311, '23043', '2019-11-12 06:49:20', 26, 63),
(312, '23020', '2019-11-12 06:49:27', 26, 60),
(313, '23029', '2019-11-12 06:49:33', 26, 67),
(314, '22964', '2019-11-12 06:49:42', 26, 60),
(315, '23020', '2019-11-12 06:49:42', 26, 61),
(316, '22964', '2019-11-12 06:49:51', 26, 61),
(317, '23043', '2019-11-12 06:49:56', 26, 66),
(318, '22964', '2019-11-12 06:50:04', 26, 63),
(319, '23020', '2019-11-12 06:50:06', 26, 63),
(320, '23043', '2019-11-12 06:50:08', 26, 67),
(321, '22990', '2019-11-12 06:50:09', 26, 66),
(322, '23020', '2019-11-12 06:50:25', 26, 66),
(323, '22964', '2019-11-12 06:50:28', 26, 66),
(324, '22990', '2019-11-12 06:50:33', 26, 67),
(325, '23020', '2019-11-12 06:50:37', 26, 67),
(326, '22964', '2019-11-12 06:50:39', 26, 67),
(327, '23040', '2019-11-12 06:50:53', 26, 60),
(328, '23040', '2019-11-12 06:51:25', 26, 61),
(329, '23019', '2019-11-12 06:51:33', 26, 60),
(330, '23040', '2019-11-12 06:52:00', 26, 63),
(331, '23019', '2019-11-12 06:52:24', 26, 61),
(332, '22982', '2019-11-12 06:52:44', 26, 60),
(333, '23040', '2019-11-12 06:52:44', 26, 66),
(334, '23040', '2019-11-12 06:53:07', 26, 67),
(335, '22982', '2019-11-12 06:53:11', 26, 61),
(336, '22971', '2019-11-12 06:53:31', 26, 60),
(337, '22982', '2019-11-12 06:53:40', 26, 63),
(338, '22971', '2019-11-12 06:53:58', 26, 61),
(339, '23019', '2019-11-12 06:54:00', 26, 63),
(340, '22982', '2019-11-12 06:54:17', 26, 66),
(341, '22982', '2019-11-12 06:54:28', 26, 67),
(342, '22971', '2019-11-12 06:54:33', 26, 63),
(343, '23019', '2019-11-12 06:54:56', 26, 66),
(344, '23019', '2019-11-12 06:55:38', 26, 67),
(345, '22971', '2019-11-12 06:55:54', 26, 66),
(346, '22971', '2019-11-12 06:56:14', 26, 67),
(347, '22939', '2019-11-12 07:00:26', 26, 60),
(348, '22939', '2019-11-12 07:01:45', 26, 61),
(349, '22943', '2019-11-12 07:02:05', 26, 60),
(350, '22943', '2019-11-12 07:02:22', 26, 61),
(351, '22943', '2019-11-12 07:02:39', 26, 63),
(352, '22939', '2019-11-12 07:02:57', 26, 63),
(353, '22943', '2019-11-12 07:03:33', 26, 66),
(354, '22943', '2019-11-12 07:04:11', 26, 67),
(355, '22936', '2019-11-12 07:04:47', 26, 60),
(356, '22939', '2019-11-12 07:04:47', 26, 66),
(357, '22936', '2019-11-12 07:05:29', 26, 61),
(358, '22939', '2019-11-12 07:05:42', 26, 67),
(359, '22936', '2019-11-12 07:05:53', 26, 63),
(360, '22936', '2019-11-12 07:06:42', 26, 66),
(361, '22936', '2019-11-12 07:07:11', 26, 67),
(362, '22950', '2019-11-13 06:36:51', 26, 60),
(363, '22934', '2019-11-13 06:37:34', 26, 60),
(364, '22934', '2019-11-13 06:37:51', 26, 61),
(365, '22963', '2019-11-13 06:37:57', 26, 60),
(366, '22934', '2019-11-13 06:38:05', 26, 65),
(367, '22950', '2019-11-13 06:38:30', 26, 61),
(368, '22963', '2019-11-13 06:38:47', 26, 61),
(369, '22924', '2019-11-13 06:39:04', 26, 61),
(370, '22924', '2019-11-13 06:39:33', 26, 60),
(371, '22950', '2019-11-13 06:39:59', 26, 65),
(372, '22963', '2019-11-13 06:40:01', 26, 65),
(373, '22924', '2019-11-13 06:40:24', 26, 65),
(374, '22988', '2019-11-13 06:42:00', 26, 60),
(375, '22988', '2019-11-13 06:42:16', 26, 61),
(376, '22988', '2019-11-13 06:42:36', 26, 65),
(377, '22965', '2019-11-13 06:43:07', 26, 60),
(378, '22965', '2019-11-13 06:43:25', 26, 61),
(379, '22965', '2019-11-13 06:43:54', 26, 65),
(380, '22959', '2019-11-13 06:44:38', 26, 60),
(381, '22992', '2019-11-13 06:44:40', 26, 60),
(382, '22992', '2019-11-13 06:44:57', 26, 61),
(383, '22995', '2019-11-13 06:45:14', 26, 60),
(384, '22992', '2019-11-13 06:45:18', 26, 65),
(385, '22959', '2019-11-13 06:45:40', 26, 61),
(386, '22970', '2019-11-13 06:46:50', 26, 60),
(387, '22995', '2019-11-13 06:46:56', 26, 61),
(388, '22942', '2019-11-13 06:47:03', 26, 60),
(389, '22970', '2019-11-13 06:47:04', 26, 61),
(390, '22970', '2019-11-13 06:47:31', 26, 65),
(391, '22942', '2019-11-13 06:47:31', 26, 61),
(392, '22980', '2019-11-13 06:47:32', 26, 60),
(393, '22942', '2019-11-13 06:47:52', 26, 65),
(394, '22959', '2019-11-13 06:47:57', 26, 65),
(395, '22980', '2019-11-13 06:48:43', 26, 61),
(396, '22995', '2019-11-13 06:48:44', 26, 65),
(397, '22980', '2019-11-13 06:49:54', 26, 65),
(398, '22987', '2019-11-13 06:50:09', 26, 61),
(399, '22987', '2019-11-13 06:50:24', 26, 60),
(400, '22987', '2019-11-13 06:50:47', 26, 65),
(401, '22955', '2019-11-13 06:52:29', 26, 60),
(402, '22975', '2019-11-13 06:52:31', 26, 60),
(403, '22955', '2019-11-13 06:52:41', 26, 61),
(404, '22975', '2019-11-13 06:52:45', 26, 61),
(405, '22955', '2019-11-13 06:53:00', 26, 65),
(406, '22968', '2019-11-13 06:53:10', 26, 60),
(407, '22975', '2019-11-13 06:53:19', 26, 65),
(408, '22926', '2019-11-13 06:53:31', 26, 60),
(409, '22926', '2019-11-13 06:53:44', 26, 61),
(410, '22968', '2019-11-13 06:53:50', 26, 61),
(411, '22926', '2019-11-13 06:54:14', 26, 65),
(412, '22968', '2019-11-13 06:54:46', 26, 65),
(413, '22948', '2019-11-13 06:55:09', 26, 60),
(414, '22969', '2019-11-13 06:55:09', 26, 60),
(415, '22948', '2019-11-13 06:55:28', 26, 61),
(416, '22969', '2019-11-13 06:55:34', 26, 61),
(417, '22969', '2019-11-13 06:56:01', 26, 65),
(418, '22948', '2019-11-13 06:56:20', 26, 65),
(419, '22956', '2019-11-13 06:56:28', 26, 60),
(420, '22956', '2019-11-13 06:56:49', 26, 61),
(421, '22956', '2019-11-13 06:57:05', 26, 65),
(422, '22986', '2019-11-13 06:59:34', 26, 60),
(423, '23084', '2019-11-13 06:59:35', 26, 60),
(424, '23084', '2019-11-13 06:59:51', 26, 61),
(425, '22986', '2019-11-13 06:59:54', 26, 61),
(426, '23084', '2019-11-13 07:00:10', 26, 65),
(427, '22986', '2019-11-13 07:00:17', 26, 65),
(428, '22981', '2019-11-13 07:00:24', 26, 60),
(429, '22981', '2019-11-13 07:00:38', 26, 61),
(430, '22981', '2019-11-13 07:00:53', 26, 65),
(431, '22951', '2019-11-13 07:02:01', 26, 60),
(432, '22935', '2019-11-13 07:02:24', 26, 60),
(433, '22966', '2019-11-13 07:02:27', 26, 60),
(434, '22951', '2019-11-13 07:02:31', 26, 61),
(435, '22935', '2019-11-13 07:02:37', 26, 61),
(436, '22966', '2019-11-13 07:02:45', 26, 61),
(437, '22951', '2019-11-13 07:02:52', 26, 65),
(438, '22935', '2019-11-13 07:03:10', 26, 65),
(439, '22966', '2019-11-13 07:03:10', 26, 65),
(440, '22941', '2019-11-13 07:05:09', 26, 60),
(441, '22941', '2019-11-13 07:05:27', 26, 61),
(442, '22941', '2019-11-13 07:05:39', 26, 65),
(443, '23002', '2019-11-13 07:06:56', 26, 60),
(444, '23002', '2019-11-13 07:07:04', 26, 61),
(445, '23002', '2019-11-13 07:07:16', 26, 65);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aksi_guru`
--
ALTER TABLE `aksi_guru`
  ADD PRIMARY KEY (`id_aksi_guru`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aksi_guru`
--
ALTER TABLE `aksi_guru`
  MODIFY `id_aksi_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=446;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
