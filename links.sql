-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 07:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `link-borneos`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landings_id` bigint(20) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `visited` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `landings_id`, `name`, `link`, `visited`, `created_at`, `updated_at`) VALUES
(1, 14, 'Laravel Short Link', 'https://laravel-news.com/short-url', 0, '2022-04-21 00:52:27', '2022-04-24 16:16:49'),
(3, 14, 'asharinovaldy', 'https://borneos.link/kaory', 0, '2022-04-23 18:13:32', '2022-04-24 16:52:20'),
(4, 14, 'Larapel', 'https://laravel.com/', 0, '2022-04-23 20:43:58', '2022-04-24 01:07:50'),
(6, 14, 'Borneos Links', 'https://borneos.link/', 0, '2022-04-24 16:54:59', '2022-04-24 16:57:45'),
(10, 19, 'Profiles', 'https://borneos.link/kaory', 0, '2022-04-24 19:13:23', '2022-04-24 19:36:31'),
(11, 19, 'asharinovaldy', 'https://borneos.link/kaory', 0, '2022-04-24 21:10:48', '2022-04-24 21:11:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
