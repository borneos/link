-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 09:33 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landings`
--

CREATE TABLE `landings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landings`
--

INSERT INTO `landings` (`id`, `post_id`, `image`, `title`, `description`, `social_facebook`, `social_twitter`, `social_youtube`, `social_instagram`, `social_linkedin`, `links`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 64, 'https://res.cloudinary.com/borneos-img/image/upload/v1649912797/imgprofile/2022-04-14_050629_Kousei_Arima_Infobox.webp', 'Ashari Novaldi', 'Ini Deskripsii', '', 'twitter.com', 'https://www.youtube.com/channel/UCD54BaKftOewconKxjG_9bg', '', '', '[{\"id\":1,\"url\":\"https:\\/\\/www.tutorialrepublic.com\\/codelab.php?topic=faq&file=jquery-append-and-remove-table-row-dynamically\",\"text\":\"jQuery Add Row Columns\"},{\"id\":2,\"url\":\"https:\\/\\/stackoverflow.com\\/questions\\/35837214\\/i-want-to-redirect-laravel-version-5-2-default-404-page-to-my-template-page-of-4\",\"text\":\"Laravel Redirect 404\"},{\"id\":3,\"url\":\"https:\\/\\/laravel.com\\/docs\\/7.x\\/middleware\",\"text\":\"Laravel Middleware\"}]', '2022-04-05 23:30:32', '2022-04-14 21:35:24', NULL),
(14, 66, 'https://res.cloudinary.com/borneos-img/image/upload/v1649657045/imgprofile/2022-04-11_060403_borneos.svg', 'Borneos.co', 'Marketplace UMKM Kota Bontang', 'facebook.com', '', 'youtube.com', '', '', '', '2022-04-06 20:48:13', '2022-04-21 00:22:57', NULL);

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
(1, 14, 'Laravel Short URL', 'https://laravel-news.com/short-url', 0, '2022-04-21 00:52:27', '2022-04-23 18:02:54'),
(3, 14, 'asharinovaldi', 'https://laravel-news.com/short-url', 0, '2022-04-23 18:13:32', '2022-04-23 18:13:32'),
(4, 14, 'asharinovald', 'https://laravel-news.com/short-url', 0, '2022-04-23 20:43:58', '2022-04-23 20:54:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_17_091300_create_post_table', 2),
(5, '2022_02_18_033625_rename_table', 3),
(6, '2022_03_23_003320_create_landings_table', 4),
(7, '2022_04_19_014230_create_links_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortUrl` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT ' ',
  `visited` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `prefix`, `value`, `shortUrl`, `type`, `visited`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'S9Tbp9E', 'form.google.com', '', '', 0, 0, '2022-02-22 18:25:40', '2022-02-28 20:29:36'),
(12, '4cCdsLy', 'example', '', '', 0, 0, '2022-02-24 18:42:51', '2022-02-24 22:56:43'),
(13, 'RSwFGuZ', 'example.com', '', '', 0, 0, '2022-02-24 18:43:04', '2022-02-24 18:43:04'),
(15, 'oKICPLU', 'example.com', '', '', 0, 0, '2022-02-28 18:41:10', '2022-02-28 18:41:10'),
(16, 'h7iL7Wz', 'example.com', '', '', 0, 0, '2022-02-28 18:55:50', '2022-02-28 18:55:50'),
(18, 'dvtJdW7', 'example', '', '', 0, 1, '2022-03-07 21:10:42', '2022-03-11 02:08:40'),
(19, 'opcbcW2', 'example.com', '', '', 0, 1, '2022-03-07 22:44:41', '2022-03-07 22:44:41'),
(20, 'CKBtmEp', 'https://stackoverflow.com/questions/34378122/load-blade-assets-with-https-in-laravel', '', '', 0, 1, '2022-03-08 18:41:28', '2022-03-08 18:41:28'),
(21, '146Snbn', 'https://stackoverflow.com/questions/24794601/laravel-assets-url', '', '', 0, 1, '2022-03-08 18:43:00', '2022-03-08 18:43:00'),
(22, '5DnGR5M', 'https://medikre.com/stories/bagaimana-cara-membuat-shortener-url-menggunakan-laravel', 'http://localhost/5DnGR5M', '', 0, 1, '2022-03-08 19:36:27', '2022-03-08 19:36:27'),
(23, '4vQdBf0', 'https://www.twoh.co/mudengdroid-belajar-android-bersama-twohs-engineering/basic-belajar-membuat-aplikasi-android-untuk-pemula-di-android-studio/', 'https://http://127.0.0.1:8000//4vQdBf0', '', 0, 1, '2022-03-09 17:55:37', '2022-03-09 17:55:37'),
(24, 'uyqHzWU', 'https://www.twoh.co/mudengdroid-belajar-android-bersama-twohs-engineering/basic-belajar-membuat-aplikasi-android-untuk-pemula-di-android-studio/', 'https:/127.0.0.1:8000/uyqHzWU', '', 0, 1, '2022-03-09 17:56:51', '2022-03-09 17:56:51'),
(25, 'JgV7Ssr', 'https://www.twoh.co/mudengdroid-belajar-android-bersama-twohs-engineering/basic-belajar-membuat-aplikasi-android-untuk-pemula-di-android-studio/', 'https://127.0.0.1:8000/JgV7Ssr', '', 0, 1, '2022-03-09 17:58:40', '2022-03-09 17:58:40'),
(26, 'aTVrzx4', 'https://www.twoh.co/mudengdroid-belajar-android-bersama-twohs-engineering/basic-belajar-membuat-aplikasi-android-untuk-pemula-di-android-studio/', 'http://127.0.0.1/aTVrzx4', '', 0, 1, '2022-03-09 18:25:05', '2022-03-09 18:25:05'),
(27, 'Lre5KPm', 'https://google.com', 'http://127.0.0.1:8000/Lre5KPm', '', 0, 0, '2022-03-14 23:09:51', '2022-03-14 23:09:51'),
(28, 'paMoN5s', 'https://google.com', 'http://127.0.0.1:8000/paMoN5s', '', 0, 0, '2022-03-14 23:09:59', '2022-03-14 23:09:59'),
(29, '0twlPsu', 'https://stackoverflow.com/questions/42359582/laravel-route-with-parameters', 'http://127.0.0.1:8000/0twlPsu', '', 0, 0, '2022-03-14 23:11:07', '2022-03-14 23:11:07'),
(30, 'OJHaEbm', 'https://jagongoding.com/web/php/menengah/bekerja-dengan-json/', 'http://127.0.0.1:8000/OJHaEbm', '', 0, 0, '2022-03-15 20:46:35', '2022-03-15 20:46:35'),
(31, 'FdNdshg', 'https://jagongoding.com/web/php/menengah/bekerja-dengan-json', 'http://127.0.0.1:8000/FdNdshg', 'WA', 0, 0, '2022-03-16 20:46:30', '2022-03-16 20:46:30'),
(32, 'Sbqq4bZ', 'gmap', 'http://127.0.0.1:8000/Sbqq4bZ', 'Address', 0, 0, '2022-03-16 20:46:31', '2022-03-16 20:46:31'),
(33, 'B2AtoFO', 'https://jagongoding.com/web/php/menengah/bekerja-dengan-json', 'http://127.0.0.1:8000/B2AtoFO', 'wa', 0, 0, '2022-03-17 04:56:20', '2022-03-17 04:56:20'),
(34, 'mvZiwOS', 'gmap', 'http://127.0.0.1:8000/mvZiwOS', 'address', 0, 0, '2022-03-17 04:56:22', '2022-03-17 04:56:22'),
(36, 'pYb9ilp', 'wa.me', 'http://127.0.0.1:8000/pYb9ilp', 'wa', 0, 0, '2022-03-20 20:06:06', '2022-03-20 20:06:06'),
(37, 'vhVruu6', 'gmap', 'http://127.0.0.1:8000/vhVruu6', 'address', 0, 0, '2022-03-20 20:06:06', '2022-03-20 20:06:06'),
(38, 'jAQP0vp', 'wa.me', 'http://127.0.0.1:8000/jAQP0vp', 'wa', 0, 0, '2022-03-20 20:06:15', '2022-03-20 20:06:15'),
(39, 'ZTRDspO', 'gmap', 'http://127.0.0.1:8000/ZTRDspO', 'address', 0, 0, '2022-03-20 20:06:25', '2022-03-20 20:06:25'),
(40, '1xsTm0g', 'gmap', 'http://127.0.0.1:8000/1xsTm0g', 'address', 0, 0, '2022-03-29 22:21:32', '2022-03-29 22:21:32'),
(41, '3zPQtTU', 'https://docs.google.com/spreadsheets/d/1vtaiEOjj_1L_wF0CQtGfdU3DZLDdBnTMF_J5xFt4Rls/edit#gid=0', 'bit.ly/3zPQtTU', '', 0, 1, '2022-03-30 00:09:58', '2022-03-30 00:09:58'),
(42, 'L5lAUIb', 'https://docs.google.com/spreadsheets/d/1vtaiEOjj_1L_wF0CQtGfdU3DZLDdBnTMF_J5xFt4Rls/edit#gid=0', 'http://127.0.0.1:8000/L5lAUIb', '', 0, 1, '2022-03-30 00:11:41', '2022-03-30 00:11:41'),
(60, 'Mdh3XIh', 'https://www.positronx.io/laravel-dynamically-add-or-remove-multiple-input-fields-with-jquery/', 'http://localhost/Mdh3XIh', '', 0, 1, '2022-04-05 00:01:59', '2022-04-05 00:01:59'),
(61, 'odETNAT', 'https://www.positronx.io/laravel-dynamically-add-or-remove-multiple-input-fields-with-jquery/', 'http://localhost/odETNAT', '', 0, 1, '2022-04-05 00:02:44', '2022-04-05 00:02:44'),
(64, 'kaoryy', 'http://localhost/kaoryy', 'http://localhost/kaoryy', 'landing', 0, 2, '2022-04-05 23:30:32', '2022-04-05 23:30:32'),
(65, 'ssOa4q4', 'https://laracasts.com/discuss/channels/laravel/how-to-decrypt-hash-password-in-laravel', 'http://localhost/ssOa4q4', '', 0, 2, '2022-04-06 00:14:12', '2022-04-14 21:36:07'),
(66, 'kaory', 'http://localhost/kaory', 'http://localhost/kaory', 'landing', 0, 1, '2022-04-06 20:48:13', '2022-04-06 20:48:13'),
(71, '6GB8t0a', 'https://getbootstrap.com/docs/4.6/components/forms/', 'http://localhost/6GB8t0a', NULL, 0, 1, '2022-04-13 22:27:08', '2022-04-13 22:27:08'),
(72, 'BEwHApp', 'https://laravel.com/docs/7.x/middleware', 'http://localhost/BEwHApp', ' ', 0, 2, '2022-04-14 21:34:29', '2022-04-14 21:34:29');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashari Novaldi', 'asharinovaldi6319@gmail.com', NULL, '$2y$10$kIL/PX5SGvRQNBzOgarwjOt5Jt46Wq3GQc.ZFRHdG03ELNV9hdULu', NULL, '2022-02-13 20:20:43', '2022-02-13 20:20:43'),
(2, 'Nopal', 'nopal@gmail.com', NULL, '$2y$10$i5CxrYbncYKvQTzsbRwfguMdio2maLrB0Y.TR2ghFh1NSDdBtjb0a', NULL, '2022-03-30 01:04:31', '2022-04-14 22:06:13'),
(3, 'Moccachino Panas', 'mocha@gmail.com', NULL, '$2y$10$0bNyi5DGeBng3VeW/Fc8BeZrPNekWXXWR5s00d3XXG9QHF1E097du', NULL, '2022-04-07 18:32:29', '2022-04-07 18:32:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landings`
--
ALTER TABLE `landings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `landings`
--
ALTER TABLE `landings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
