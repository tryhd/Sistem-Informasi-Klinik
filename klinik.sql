-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 01:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `resep_id` bigint(20) UNSIGNED NOT NULL,
  `rkm_id` bigint(20) UNSIGNED NOT NULL,
  `tagihan` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id`, `created_at`, `updated_at`, `resep_id`, `rkm_id`, `tagihan`) VALUES
(2, '2021-07-11 09:39:11', '2021-07-11 09:39:11', 4, 3, 104500.00);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_09_110303_create_wilayah_table', 1),
(2, '2021_07_09_110304_create_pasien_table', 1),
(3, '2021_07_09_111748_create_obat_table', 1),
(4, '2021_07_09_111918_create_tindakan_table', 1),
(5, '2021_07_09_111955_create_pegawai_table', 1),
(6, '2021_07_09_112028_create_resep_table', 1),
(7, '2021_07_09_112050_create_rk_medis_table', 1),
(8, '2021_07_09_112205_create_faktur_table', 1),
(9, '2021_07_10_200603_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double(8,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `created_at`, `updated_at`, `nama`, `harga`, `stok`) VALUES
(1, '2021-07-11 06:56:55', '2021-07-11 12:36:55', 'Paracetamol', 4500.00, 19);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('pria','wanita') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('antri','periksa','obat','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `layanan_dokter` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `created_at`, `updated_at`, `nama`, `jenis_kelamin`, `alamat`, `wilayah_id`, `tgl_lahir`, `telp`, `pekerjaan`, `status`, `layanan_dokter`) VALUES
(1, '2021-07-11 06:36:04', '2021-07-11 09:06:36', 'Pasien Test', 'pria', 'Jalan Caringin', 1, '2000-07-05', '123433123456', 'Dagang', 'antri', '1'),
(3, '2021-07-11 06:39:07', '2021-07-11 12:36:40', 'Pasien Lama', 'pria', 'Pasar Caringin', 1, '1998-02-12', '089123765435', 'Dagang', 'selesai', '7');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_tlp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `created_at`, `updated_at`, `nama`, `tgl_lahir`, `no_tlp`, `alamat`, `wilayah_id`, `jabatan`, `photo`) VALUES
(1, '2021-07-11 04:18:03', '2021-07-11 04:18:03', 'Dokter Test', '1985-02-11', '123321345654', 'Cigondewah Kaler', 2, 'Dokter', '20210711111750.png'),
(2, '2021-07-11 04:23:08', '2021-07-11 05:02:40', 'Admin Test', '1985-10-21', '321456432123', 'Jalan Caringin', 1, 'Admin', '20210711112307.png'),
(3, '2021-07-11 04:25:15', '2021-07-11 04:25:15', 'Manager Test', '1980-09-10', '098768987654', 'Kelurahan Bancip', 1, 'Manager', '20210711112515.png'),
(4, '2021-07-11 04:27:07', '2021-07-11 04:27:07', 'Resepsionis Test', '1997-10-24', '089123321234', 'Cigondewah Kaler', 2, 'Resepsionis', '20210711112707.png'),
(5, '2021-07-11 04:28:14', '2021-07-11 04:28:14', 'Apoteker Test', '1990-12-12', '081321123453', 'Pasar Caringin', 1, 'Apoteker', '20210711112814.png');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dokter_id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum','selesai') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id`, `created_at`, `updated_at`, `dokter_id`, `obat_id`, `pasien_id`, `keterangan`, `status`) VALUES
(4, '2021-07-11 09:39:11', '2021-07-11 12:36:56', 1, 1, 3, '3x1', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `rk_medis`
--

CREATE TABLE `rk_medis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `dokter_id` bigint(20) UNSIGNED NOT NULL,
  `diagnosa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tindakan_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergi_obat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bb` double(8,2) NOT NULL,
  `tb` double(8,2) NOT NULL,
  `tensi` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rk_medis`
--

INSERT INTO `rk_medis` (`id`, `created_at`, `updated_at`, `pasien_id`, `dokter_id`, `diagnosa`, `keluhan`, `tindakan_id`, `keterangan`, `alergi_obat`, `bb`, `tb`, `tensi`) VALUES
(3, '2021-07-11 09:39:11', '2021-07-11 09:39:11', 3, 1, 'Demam', 'Demam', 1, 'Demam biasa', 'tidak', 60.00, 160.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_tindakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarif` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `created_at`, `updated_at`, `jenis_tindakan`, `tarif`) VALUES
(1, '2021-07-11 06:56:32', '2021-07-11 06:56:32', 'Pemeriksaan Biasa', 100000.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `email`, `email_verified_at`, `password`, `role`, `pegawai_id`, `remember_token`) VALUES
(1, '2021-07-11 04:18:04', '2021-07-11 04:18:04', 'Dokter Test', 'dokter@test.com', NULL, '$2y$10$4O6dodu6fflzHDGw.NUpzOzLq07zy/zYl4dizAO.hIKTxXLLN23eu', 'Dokter', 1, NULL),
(2, '2021-07-11 04:23:08', '2021-07-11 04:23:08', 'Admin Test', 'admin@test.com', NULL, '$2y$10$Q1PcIwA5YTHWgFa2TxbwG.OY2gf.hcTTvkVu6K8PbqDgMWHWRd8ja', 'Admin', 2, NULL),
(3, '2021-07-11 04:25:15', '2021-07-11 04:25:15', 'Manager Test', 'manager@test.com', NULL, '$2y$10$DBwEN8yFTC788XYhEr8E.e0Q9iw.O5JQCVfdDocHpvURRqfRXPh5i', 'Manager', 3, NULL),
(4, '2021-07-11 04:27:07', '2021-07-11 04:27:07', 'Resepsionis Test', 'resepsionis@test.com', NULL, '$2y$10$4oDpandCZCUdz6RFfuCrIe5U3tWkkZk5Gs.agBgmGuLZsYJU7H1pq', 'Resepsionis', 4, NULL),
(5, '2021-07-11 04:28:15', '2021-07-11 04:28:15', 'Apoteker Test', 'apoteker@test.com', NULL, '$2y$10$1yoUMPDsoY0Gz5r7lHtRXOappblJ4cohJzl4yjkrqG3QACodBmw4e', 'Apoteker', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `created_at`, `updated_at`, `kota`, `kecamatan`) VALUES
(1, '2021-07-11 03:35:19', '2021-07-11 03:35:19', 'Bandung', 'Babakan Ciparay'),
(2, '2021-07-11 03:35:34', '2021-07-11 03:35:34', 'Bandung', 'Cigondewah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faktur_resep_id_foreign` (`resep_id`),
  ADD KEY `faktur_rkm_id_foreign` (`rkm_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasien_wilayah_id_foreign` (`wilayah_id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_wilayah_id_foreign` (`wilayah_id`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resep_dokter_id_foreign` (`dokter_id`),
  ADD KEY `resep_obat_id_foreign` (`obat_id`),
  ADD KEY `resep_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `rk_medis`
--
ALTER TABLE `rk_medis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rk_medis_dokter_id_foreign` (`dokter_id`),
  ADD KEY `rk_medis_tindakan_id_foreign` (`tindakan_id`),
  ADD KEY `rk_medis_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_pegawai_id_foreign` (`pegawai_id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rk_medis`
--
ALTER TABLE `rk_medis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_resep_id_foreign` FOREIGN KEY (`resep_id`) REFERENCES `resep` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_rkm_id_foreign` FOREIGN KEY (`rkm_id`) REFERENCES `rk_medis` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_wilayah_id_foreign` FOREIGN KEY (`wilayah_id`) REFERENCES `wilayah` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `pegawai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `rk_medis`
--
ALTER TABLE `rk_medis`
  ADD CONSTRAINT `rk_medis_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `pegawai` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rk_medis_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rk_medis_tindakan_id_foreign` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
