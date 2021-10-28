-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 12:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comtelindo_rai`
--

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
(1, '2021_10_28_024150_create_udangs_table', 1),
(2, '2021_10_28_024725_create_status_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kolam` int(11) NOT NULL,
  `suhu` int(11) NOT NULL,
  `th` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `id_kolam`, `suhu`, `th`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 12, '2021-10-25', NULL, NULL),
(2, 1, 50, 23, '2021-10-26', NULL, NULL),
(3, 1, 41, 12, '2021-10-28', NULL, NULL),
(4, 1, 31, 41, '2021-10-27', NULL, NULL),
(5, 2, 13, 31, '2021-10-28', NULL, NULL),
(6, 3, 13, 41, '2021-10-28', NULL, NULL),
(7, 4, 14, 53, '2021-10-28', NULL, NULL),
(8, 2, 41, 51, '2021-10-25', NULL, NULL),
(9, 2, 41, 52, '2021-10-26', NULL, NULL),
(10, 2, 41, 53, '2021-10-27', NULL, NULL),
(11, 3, 14, 41, '2021-10-25', NULL, NULL),
(12, 3, 46, 78, '2021-10-26', NULL, NULL),
(13, 3, 41, 56, '2021-10-27', NULL, NULL),
(14, 4, 17, 18, '2021-10-26', NULL, NULL),
(15, 4, 57, 41, '2021-10-27', NULL, NULL),
(16, 1, 14, 16, '2021-10-29', NULL, NULL),
(17, 2, 14, 51, '2021-10-29', NULL, NULL),
(18, 3, 141, 14, '2021-10-29', NULL, NULL),
(19, 4, 13, 43, '2021-10-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `udangs`
--

CREATE TABLE `udangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kolam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `udangs`
--

INSERT INTO `udangs` (`id`, `nama_kolam`, `created_at`, `updated_at`) VALUES
(1, 'KOLAM 001', NULL, NULL),
(2, 'KOLAM 002', NULL, NULL),
(3, 'KOLAM 003', NULL, NULL),
(4, 'KOLAM 004', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `udangs`
--
ALTER TABLE `udangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `udangs`
--
ALTER TABLE `udangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
