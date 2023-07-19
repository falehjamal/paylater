-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 19 Jul 2023 pada 14.44
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hutang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hutang`
--

CREATE TABLE `tb_hutang` (
  `id` int NOT NULL,
  `jumlah` int NOT NULL,
  `saldo_akhir` int NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_hutang`
--

INSERT INTO `tb_hutang` (`id`, `jumlah`, `saldo_akhir`, `keterangan`, `author`, `created_at`) VALUES
(339, 1, 1, '', 'faleh', '2023-06-19 02:23:17'),
(340, 2, 3, '', 'faleh', '2023-06-19 02:23:20'),
(341, 1, 4, '', 'faleh', '2023-06-19 02:23:24'),
(342, 1, 5, '', 'faleh', '2023-06-19 02:23:30'),
(343, 10, 15, '', 'faleh', '2023-06-19 02:23:43'),
(344, 1, 16, '', 'faleh', '2023-06-19 02:24:48'),
(345, 1, 17, '', 'faleh', '2023-06-19 02:24:51'),
(346, 1, 18, '', 'faleh', '2023-06-19 02:24:55'),
(347, 1, 19, '', 'faleh', '2023-06-19 02:38:48'),
(348, 1000, 1019, '', 'faleh', '2023-06-19 02:41:10'),
(349, -1019, 0, '', 'faleh', '2023-06-19 03:34:43'),
(350, 1, 1, '', 'faleh', '2023-06-20 00:27:00'),
(351, -1, 0, '', 'faleh', '2023-06-20 00:40:12'),
(352, 1, 1, '', 'faleh', '2023-06-27 04:18:36'),
(353, -1, 0, '', 'faleh', '2023-06-27 04:18:45'),
(354, 1, 1, '', 'faleh', '2023-06-27 05:10:31'),
(355, -1, 0, '', 'faleh', '2023-06-27 05:10:41'),
(356, 1, 1, '', 'faleh', '2023-06-27 05:10:57'),
(357, -1, 0, '', 'faleh', '2023-06-27 05:25:40'),
(358, 1, 1, '', 'faleh', '2023-07-19 14:18:09'),
(359, -1, 0, '', 'faleh', '2023-07-19 14:18:20'),
(360, -1, -1, '', 'faleh', '2023-07-19 14:18:28'),
(361, 1, 0, '', 'faleh', '2023-07-19 14:18:31'),
(362, 1, 1, '', 'faris', '2023-07-19 14:22:42'),
(363, 1, 2, '', 'faris', '2023-07-19 14:22:59'),
(364, 1, 3, '', 'faleh', '2023-07-19 14:23:11'),
(365, -3, 0, '', 'faleh', '2023-07-19 14:34:13'),
(366, 1, 1, '', 'faleh', '2023-07-19 14:35:46'),
(367, 1, 2, '', 'faleh', '2023-07-19 14:35:54'),
(368, 2, 4, '', 'faleh', '2023-07-19 14:35:58'),
(369, 3, 7, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'faleh', '2023-07-19 14:36:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `password`) VALUES
(1, 'faleh', 'fd0f29213b3385e6620ad4e035fbc771'),
(2, 'tamu', 'f8829935a87192f3f9fab79856122c0f'),
(6, 'faris', '04f6eda8cd1dd93552a8d35f3dc47f4a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_hutang`
--
ALTER TABLE `tb_hutang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_hutang`
--
ALTER TABLE `tb_hutang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
