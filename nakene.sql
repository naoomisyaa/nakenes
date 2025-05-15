-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 06:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nakene`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_bar` varchar(255) NOT NULL,
  `nama_bar` varchar(255) DEFAULT NULL,
  `id_jen` varchar(255) DEFAULT NULL,
  `id_merk` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `stok_bar` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_bar`, `nama_bar`, `id_jen`, `id_merk`, `harga`, `stok_bar`, `created_at`, `updated_at`) VALUES
('BAR01', 'Buku Tulis Big Boss 42 Lembar', 'JEN01', 'MERK05', '5500', 2, '2025-03-07 11:54:52', '2025-03-16 17:27:38'),
('BAR02', 'Buku Tulis SIDU 38 Lembar', 'JEN01', 'MERK04', '4500', 4, '2025-03-07 12:00:08', '2025-03-16 09:47:51'),
('BAR03', 'Buku Tulis OKEY 58 Lembar', 'JEN01', 'MERK06', '4000', 6, '2025-03-07 12:00:08', '2025-03-16 17:24:31'),
('BAR04', 'Correction Tape 20M x mm', 'JEN04', 'MERK02', '10000', 10, '2025-03-07 12:00:08', '2025-03-07 12:00:08'),
('BAR05', 'Gel Pen Kokoro 0.5', 'JEN02', 'MERK01', '7500', 11, '2025-03-07 12:00:08', '2025-03-16 17:26:41'),
('BAR06', 'Pensil 2B Castell 9000', 'JEN03', 'MERK07', '4500', 0, '2025-03-07 12:00:08', '2025-03-16 04:09:24'),
('BAR07', 'Board Marker Hitam', 'JEN05', 'MERK03', '5000', 20, '2025-03-08 20:39:11', '2025-03-08 20:39:11'),
('BAR08', 'Board Marker Merah', 'JEN05', 'MERK03', '5000', 19, '2025-03-08 20:40:55', '2025-03-21 05:24:05'),
('BAR09', 'Board Marker Hitam', 'JEN05', 'MERK02', '231', 0, '2025-03-14 21:09:08', '2025-03-15 21:45:14'),
('BAR10', 'Stipo bergambar', 'JEN04', 'MERK04', '5000', 0, '2025-03-16 03:43:15', '2025-03-16 03:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jen` varchar(255) NOT NULL,
  `nama_jen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jen`, `nama_jen`) VALUES
('JEN01', 'Buku Tulis'),
('JEN02', 'Bulpoin'),
('JEN03', 'Pensil'),
('JEN04', 'Stipo'),
('JEN05', 'Spidol');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` varchar(255) NOT NULL,
  `nama_merk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
('MERK01', 'Zebra'),
('MERK02', 'Kenko'),
('MERK03', 'Joyko'),
('MERK04', 'SIDU'),
('MERK05', 'BigBoss'),
('MERK06', 'OKEY'),
('MERK07', 'Faber Castell'),
('MERK10', 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_12_024801_create_personal_access_tokens_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_jual` varchar(255) NOT NULL,
  `tanggal_jual` datetime DEFAULT NULL,
  `totalharga_jual` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_jual`, `tanggal_jual`, `totalharga_jual`) VALUES
('JUAL01', '2025-02-06 00:00:00', '9000'),
('JUAL02', '2025-02-06 00:00:00', '22500'),
('JUAL03', '2025-03-09 18:57:16', '12000'),
('JUAL04', '2025-01-11 00:00:00', '15000'),
('JUAL05', '2025-03-16 10:42:02', '20000'),
('JUAL06', '2025-03-16 12:05:46', '30000'),
('JUAL07', '2025-03-17 00:00:00', '7500'),
('JUAL08', '2025-03-17 00:00:00', '5500'),
('JUAL09', '2025-03-21 00:00:00', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id_pd` varchar(255) NOT NULL,
  `id_jual` varchar(255) DEFAULT NULL,
  `id_bar` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id_pd`, `id_jual`, `id_bar`, `jumlah`) VALUES
('1ef98a31-2a83-4f55-b509-3fdbb568b315', 'JUAL07', 'BAR05', '1'),
('6409c2dc-4fa3-44d8-b5e3-51b07461b06f', 'JUAL07', 'BAR03', '1'),
('7a74bbea-ba29-4173-a8e6-4d25879aecb9', 'JUAL09', 'BAR08', '1'),
('7bbc6afb-8a10-43d2-9b06-3db6b11699c1', 'JUAL07', 'BAR01', '1'),
('a7e824a6-fed4-4edd-91d8-4de6be280675', 'JUAL08', 'BAR01', '1'),
('c9eea360-dd12-4961-8516-591d594ed85e', 'JUAL07', 'BAR02', '1'),
('PD01', 'JUAL01', 'BAR01', '2'),
('PD02', 'JUAL02', 'BAR02', '5'),
('PD03', 'JUAL03', 'BAR03', '3'),
('PD04', 'JUAL04', 'BAR08', '3'),
('PD05', 'JUAL04', 'BAR08', '2'),
('PD06', 'JUAL04', 'BAR08', '2'),
('PD07', 'JUAL04', 'BAR08', '2');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XFoPx2aI7goEf7Ps9GWIShktOUZ6sTGyBbbdNT26', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia1p6YkIzcFl1NkI5S3oyOWpVejRoczNHMHFuRWpxbzVZZ0huR1BuViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5qdWFsYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1745466243);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'naomisya', 'naomisya@gmail.com', NULL, '$2y$12$XNsHUf9.APNV0LLsNHlRLeoLJMdD5GARvQK4kCyiCj4.pR97R5S/u', NULL, '2025-03-07 21:40:59', '2025-03-07 21:40:59'),
(2, 'yani tri indriati', 'yanitriindriati@gmail.com', NULL, '$2y$12$dWUdZ2TyUM6jOktr.8lwNOJJvkxegsKAHTNYuxAbmejWuGdxipcny', NULL, '2025-03-09 04:31:38', '2025-03-09 04:31:38'),
(3, 'elma', 'elm@gmail.com', NULL, '$2y$12$0Zwq5CAPPRsL1BAbXQ8.0.LGZFn7Cc0C2CR4DWZr5Ulx0Hbft3FZa', NULL, '2025-03-16 20:53:56', '2025-03-16 20:53:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_bar`),
  ADD KEY `jenis_fk` (`id_jen`),
  ADD KEY `merk_fk` (`id_merk`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jen`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_jual`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id_pd`),
  ADD KEY `penjualan_fk` (`id_jual`),
  ADD KEY `barang_fk` (`id_bar`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `jenis_fk` FOREIGN KEY (`id_jen`) REFERENCES `jenis` (`id_jen`),
  ADD CONSTRAINT `merk_fk` FOREIGN KEY (`id_merk`) REFERENCES `merk` (`id_merk`);

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `barang_fk` FOREIGN KEY (`id_bar`) REFERENCES `barang` (`id_bar`),
  ADD CONSTRAINT `penjualan_fk` FOREIGN KEY (`id_jual`) REFERENCES `penjualan` (`id_jual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
