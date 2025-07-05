-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2025 at 11:12 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_domba_pakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id` int UNSIGNED NOT NULL,
  `penyakit_id` int UNSIGNED NOT NULL,
  `gejala_id` int UNSIGNED NOT NULL,
  `cf_pakar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id`, `penyakit_id`, `gejala_id`, `cf_pakar`) VALUES
(1, 1, 3, 0.8),
(2, 1, 5, 0.7),
(3, 1, 6, 0.4),
(4, 1, 7, 0.5),
(5, 1, 21, 0.3),
(6, 2, 6, 0.6),
(7, 2, 7, 0.8),
(8, 2, 8, 0.7),
(9, 2, 13, 0.9),
(10, 2, 17, 0.5),
(11, 2, 18, 0.4),
(12, 3, 6, 0.5),
(13, 3, 9, 1),
(14, 3, 10, 0.8),
(15, 3, 21, 0.6),
(16, 4, 6, 0.5),
(17, 4, 11, 0.9),
(18, 4, 12, 0.6),
(19, 4, 20, 0.4),
(20, 5, 6, 0.3),
(21, 5, 14, 0.9),
(22, 5, 15, 0.8),
(23, 5, 16, 0.6),
(24, 6, 6, 0.5),
(25, 6, 7, 0.6),
(26, 6, 8, 0.8),
(27, 6, 17, 0.7),
(28, 6, 18, 0.9),
(29, 6, 21, 0.7),
(30, 7, 6, 0.6),
(31, 7, 7, 0.5),
(32, 7, 10, 0.7),
(33, 7, 19, 0.9),
(34, 7, 20, 0.8),
(35, 7, 21, 0.6),
(36, 2, 3, 0.2),
(37, 2, 5, 0.1),
(38, 1, 8, 0.2),
(39, 1, 13, 0.3),
(40, 1, 20, 0.2),
(41, 2, 10, 0.2),
(42, 2, 21, 0.5),
(43, 3, 7, 0.3),
(44, 3, 8, 0.2),
(45, 4, 7, 0.3),
(46, 4, 21, 0.4),
(47, 5, 7, 0.2),
(48, 5, 20, 0.3),
(49, 6, 13, 0.4),
(50, 6, 20, 0.5),
(51, 7, 8, 0.2),
(52, 7, 13, 0.3),
(53, 1, 14, 0.1),
(54, 1, 15, 0.1),
(55, 1, 19, 0.1),
(56, 4, 3, 0.1),
(57, 4, 5, 0.2),
(58, 4, 8, 0.2),
(59, 4, 13, 0.2),
(60, 2, 14, 0.2),
(61, 2, 15, 0.2),
(62, 2, 16, 0.3),
(63, 2, 19, 0.3),
(64, 2, 20, 0.3),
(65, 3, 3, 0.1),
(66, 3, 13, 0.2),
(67, 3, 17, 0.1),
(68, 3, 18, 0.2),
(69, 5, 3, 0.1),
(70, 5, 5, 0.1),
(71, 5, 7, 0.3),
(72, 5, 8, 0.2),
(73, 5, 13, 0.3),
(74, 6, 3, 0.2),
(75, 6, 5, 0.1),
(76, 6, 10, 0.3),
(77, 6, 11, 0.1),
(78, 6, 12, 0.1),
(79, 7, 3, 0.2),
(80, 7, 5, 0.2),
(81, 7, 8, 0.3),
(82, 7, 11, 0.1),
(83, 7, 12, 0.1),
(84, 7, 13, 0.4),
(85, 7, 14, 0.2),
(86, 7, 15, 0.2),
(87, 7, 16, 0.2),
(88, 7, 17, 0.2),
(89, 7, 18, 0.3),
(90, 1, 11, 0.2),
(91, 1, 12, 0.2),
(92, 1, 17, 0.1),
(93, 1, 18, 0.3),
(94, 5, 19, 0.2),
(95, 5, 21, 0.2),
(96, 6, 9, 0.2),
(97, 6, 14, 0.3),
(98, 6, 15, 0.3),
(99, 6, 16, 0.3),
(100, 6, 19, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int UNSIGNED NOT NULL,
  `kode_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode_gejala`, `nama_gejala`) VALUES
(3, 'G01', 'Bulu rontok dan kulit  menebal/berkerak'),
(5, 'G02', 'Domba sering menggaruk-garuk  badan ke kandang atau pohon'),
(6, 'G03', 'Nafsu makan menurun drastis'),
(7, 'G04', 'Badan kurus, lemah, dan lesu'),
(8, 'G05', 'Diare atau mencret (feses cair)'),
(9, 'G06', 'Perut sisi kiri membesar dan  tegang jika ditepuk'),
(10, 'G07', 'Sulit bernapas, terengah-engah,  dan gelisah'),
(11, 'G08', 'Terdapat luka, bintil, atau keropeng di sekitar mulut, gusi, dan hidung'),
(12, 'G09', 'Gusi bengkak dan kemerahan'),
(13, 'G10', 'Anemia (selaput mata, gusi, dan kulit terlihat pucat)'),
(14, 'G11', 'Mata berair, merah, dan bengkak'),
(15, 'G12', 'Kornea mata terlihat keruh  atau kebiruan'),
(16, 'G13', 'Domba sering mengedipkan atau menutup mata'),
(17, 'G14', 'Feses berwarna tidak normal (kehijauan/kemerahan/kehitaman)'),
(18, 'G15', 'Dehidrasi (kulit dicubit tidak cepat kembali)'),
(19, 'G16', 'Batuk dan keluar ingus dari hidung'),
(20, 'G17', 'Demam (suhu tubuh tinggi)'),
(21, 'G18', 'Tidak mau bergerak atau berdiri');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int UNSIGNED NOT NULL,
  `kode_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `deskripsi` text,
  `solusi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`) VALUES
(1, 'P01', 'Kudis (Scabies)', 'Kudis (scabies) adalah infeksi kulit yang disebabkan oleh tungau Sarcoptes scabiei. Gejalanya meliputi gatal hebat, terutama di malam hari, ruam merah, dan bintik-bintik kecil atau garis seperti terowongan di kulit.', 'solasi domba, suntik Ivermectin, semprot dengan antiseptik.\r\n'),
(2, 'P02', 'Cacingan (Helminthiasis)', 'Cacingan (Helminthiasis) adalah infeksi yang disebabkan oleh cacing parasit, seperti cacing gelang (Ascaris lumbricoides), cacing tambang (Ancylostoma duodenale atau Necator americanus), atau cacing cambuk (Trichuris trichiura).', 'Berikan obat cacing (Albendazole) secara rutin dan jaga sanitasi kandang.\r\n'),
(3, 'P03', 'Kembung (Bloat)', 'Kembung (bloating) adalah kondisi di mana perut terasa penuh, kencang, atau membesar akibat penumpukan gas, cairan, atau makanan di saluran pencernaan.', 'Berikan minyak nabati untuk mengurangi gas, tusuk rumen dengan trokar jika darurat.\r\n'),
(4, 'P04', 'Orf (Mulut Berkeropeng)', 'Orf (Mulut Berkeropeng) adalah penyakit kulit zoonotik yang disebabkan oleh Parapoxvirus, terutama menyerang domba dan kambing.', 'Olesi luka dengan salep antibiotik dan Povidone-iodine, jaga kebersihan kandang\r\n'),
(5, 'P05', 'Pinkeye', 'Pinkeye (Konjungtivitis) adalah peradangan atau infeksi pada konjungtiva, lapisan tipis yang melapisi bagian putih mata dan kelopak mata bagian dalam.', 'Bersihkan mata dengan larutan garam, berikan salep atau tetes mata antibiotik\r\n'),
(6, 'P06', 'Diare (Scours)', 'Diare (Scours) adalah kondisi tinja cair atau encer yang keluar lebih sering dari biasanya, sering disebut sebagai diare pada hewan ternak (seperti sapi, domba, atau kambing).', 'Berikan cairan elektrolit untuk mencegah dehidrasi, berikan antibiotik jika disebabkan bakteri\r\n'),
(7, 'P07', 'Pneumonia', 'Pneumonia adalah infeksi pada paru-paru yang menyebabkan peradangan pada alveoli (kantong udara) di salah satu atau kedua paru.', 'Berikan antibiotik (misal: Oxytetracycline), sediakan kandang yang hangat dan kering\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_detail`
--

CREATE TABLE `riwayat_detail` (
  `id` int UNSIGNED NOT NULL,
  `riwayat_id` int UNSIGNED NOT NULL,
  `gejala_id` int UNSIGNED NOT NULL,
  `cf_user` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `riwayat_detail`
--

INSERT INTO `riwayat_detail` (`id`, `riwayat_id`, `gejala_id`, `cf_user`) VALUES
(1, 1, 7, 0.8),
(2, 1, 10, 0.6),
(3, 1, 19, 1),
(4, 1, 20, 0.8),
(5, 2, 3, 0.2),
(6, 3, 3, 0.6),
(7, 3, 13, 0.8),
(8, 3, 17, 0.4),
(9, 3, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_diagnosa`
--

CREATE TABLE `riwayat_diagnosa` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `hasil_penyakit_id` int UNSIGNED NOT NULL,
  `hasil_cf` float NOT NULL,
  `tanggal_diagnosa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `riwayat_diagnosa`
--

INSERT INTO `riwayat_diagnosa` (`id`, `user_id`, `hasil_penyakit_id`, `hasil_cf`, `tanggal_diagnosa`) VALUES
(1, 2, 7, 0.9875, '2025-07-04 21:29:28'),
(2, 2, 1, 0.16, '2025-07-04 22:30:12'),
(3, 2, 7, 0.9163, '2025-07-04 22:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Administrator', 'admin', '$2y$10$sM8O5cBdqaW.hCG0biV8eOZ8IZ5g0Fqu/Uwo0XZxkKEpVgwuGlxPS', 'admin', '2025-07-03 16:48:40'),
(2, 'nashir', 'anas', '$2y$10$5G55m375YTET8OAk68w3lerSsuGGk6n562F.ykF0PzA3zfQABKvbC', 'user', '2025-07-03 17:07:12'),
(3, 'nass', 'nass', '$2y$10$j0BMapIHzn5LKK2yd3icJOrFI.iLKJnEOVmxc34LZpl5Z2pGUB9HS', 'user', '2025-07-04 18:39:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penyakit_id` (`penyakit_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_gejala` (`kode_gejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_id` (`riwayat_id`),
  ADD KEY `gejala_id` (`gejala_id`);

--
-- Indexes for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `hasil_penyakit_id` (`hasil_penyakit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_detail`
--
ALTER TABLE `riwayat_detail`
  ADD CONSTRAINT `riwayat_detail_ibfk_1` FOREIGN KEY (`riwayat_id`) REFERENCES `riwayat_diagnosa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_detail_ibfk_2` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD CONSTRAINT `riwayat_diagnosa_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_diagnosa_ibfk_2` FOREIGN KEY (`hasil_penyakit_id`) REFERENCES `penyakit` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
