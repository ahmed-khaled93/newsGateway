-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2018 at 05:34 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.1.20-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsGateway`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Movies', '2018-08-30 11:55:48', '2018-08-30 11:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `catg_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `catg_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'sport', 'sportsport', 1, '1532598509.jpg', '2018-07-01 23:23:00', '2018-07-01 23:26:00'),
(2, 'Something Just Like This', 'bivbui hgddsl\r\nkllh\r\nbcfhl', 2, '1535639027.jpg', '2018-08-30 12:23:48', '2018-08-30 12:24:16'),
(3, 'history', 'history table test', 3, '1536149622.jpeg', '2018-09-05 10:13:42', '2018-09-05 13:56:01'),
(4, 'history', 'history table test', 3, '1536149722.jpeg', '2018-09-05 10:15:22', '2018-09-05 10:15:22'),
(5, 'history', 'history table test', 3, '1536149748.jpeg', '2018-09-05 10:15:48', '2018-09-05 10:15:48'),
(6, 'history', 'history table test', 3, '1536149806.jpeg', '2018-09-05 10:16:46', '2018-09-05 10:16:46'),
(7, 'history', 'history table test', 3, '1536149859.jpeg', '2018-09-05 10:17:39', '2018-09-05 10:17:39'),
(8, 'history', 'history table test', 3, '1536149926.jpeg', '2018-09-05 10:18:46', '2018-09-05 10:18:46'),
(9, 'history', 'history table test', 3, '1536149971.jpeg', '2018-09-05 10:19:31', '2018-09-05 10:19:31'),
(10, 'history', 'history table test', 3, '1536150187.jpeg', '2018-09-05 10:23:07', '2018-09-05 10:23:07'),
(11, 'history', 'history table test', 3, '1536150234.jpeg', '2018-09-05 10:23:54', '2018-09-05 10:23:54'),
(13, 'history', 'history table test 2', 3, '1536150520.jpeg', '2018-09-05 10:28:40', '2018-09-06 09:19:33'),
(14, 'history', 'history table test', 3, '1536150540.jpeg', '2018-09-05 10:29:00', '2018-09-05 10:29:00'),
(15, 'history', 'history table test', 3, '1536150682.jpeg', '2018-09-05 10:31:22', '2018-09-05 10:31:22'),
(16, 'history', 'history table test', 3, '1536151768.jpeg', '2018-09-05 10:49:28', '2018-09-05 10:49:28'),
(17, 'history', 'history table test', 3, '1536152225.jpeg', '2018-09-05 10:57:05', '2018-09-05 10:57:05'),
(18, 'history', 'history table test', 3, '1536152883.jpeg', '2018-09-05 11:08:03', '2018-09-05 11:08:03'),
(20, 'event history', 'event history test 2', 4, '1536157148.jpeg', '2018-09-05 12:19:08', '2018-09-05 12:19:08'),
(21, 'Something Just Like This', 'giugui hgj\r\nkf', 1, '1536157267.jpg', '2018-09-05 12:21:07', '2018-09-05 13:53:54'),
(22, 'zootopia', 'kgkg', 2, '1536162211.jpg', '2018-09-05 13:43:31', '2018-09-05 13:43:31'),
(23, 'final post', 'fca', 4, '1536162376.jpg', '2018-09-05 13:46:16', '2018-09-05 13:46:16'),
(24, 'fwfiw', 'fjqiofjwo', 4, '1536229005.jpeg', '2018-09-06 08:16:45', '2018-09-06 08:16:45'),
(25, 'fwfiw', 'fjqiofjwo', 4, '1536231750.jpeg', '2018-09-06 09:02:30', '2018-09-06 09:02:30'),
(26, 'fwfiw', 'fjqiofjwo', 4, '1536231878.jpeg', '2018-09-06 09:04:38', '2018-09-06 09:04:38'),
(27, 'fwfiw', 'fjqiofjwo', 4, '1536231916.jpeg', '2018-09-06 09:05:16', '2018-09-06 09:05:16'),
(28, 'fwfiw', 'fjqiofjwo', 4, '1536231930.jpeg', '2018-09-06 09:05:30', '2018-09-06 09:05:30'),
(29, 'non', 'fjqiofjwo', 4, '1536490275.jpg', '2018-09-06 09:05:46', '2018-09-09 08:51:15'),
(30, 'fwfiw', 'fjqiofjwo', 4, '1536231951.jpeg', '2018-09-06 09:05:51', '2018-09-06 09:05:51'),
(31, 'THANK YOU FOR BEING A PART OF THIS WONDERFUL JOURNEY.', 'fjqiofjwo', 4, '1536231974.jpeg', '2018-09-06 09:06:14', '2018-09-06 09:08:20'),
(32, 'fwfiw', 'fjqiofjwo', 4, '1536231999.jpeg', '2018-09-06 09:06:39', '2018-09-06 09:06:39'),
(33, 'fwfiw', 'fjqiofjwo', 4, '1536232023.jpeg', '2018-09-06 09:07:03', '2018-09-06 09:07:03'),
(34, 'Ninja Turtles', 'fjqiofjwo', 4, '1536232040.jpeg', '2018-09-06 09:07:20', '2018-09-09 08:50:06'),
(35, 'The Flash', 'ok', 4, '1536496382.jpg', '2018-09-09 10:33:03', '2018-09-09 10:33:03'),
(36, 'first post', 'hh', 1, '1536504340.jpg', '2018-09-09 12:45:40', '2018-09-09 12:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `article_translations`
--

CREATE TABLE `article_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_translations`
--

INSERT INTO `article_translations` (`id`, `article_id`, `title`, `body`, `locale`) VALUES
(1, 1, 'english title', 'english body', 'en'),
(2, 1, 'عنوان عربي', 'خبر عربي', 'ar');

-- --------------------------------------------------------

--
-- Table structure for table `catgs`
--

CREATE TABLE `catgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catgs`
--

INSERT INTO `catgs` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Sport', '2018-08-30 09:15:00', '2018-08-30 09:16:00'),
(2, 'Art', '2018-08-30 09:24:16', '2018-08-30 09:27:31'),
(3, 'History', '2018-08-30 10:18:30', '2018-08-30 10:29:25'),
(4, 'Science', '2018-08-30 11:22:14', '2018-08-30 11:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `event_histories`
--

CREATE TABLE `event_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `eventName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2018_06_11_130922_create_verify_users_table', 1),
(9, '2018_06_20_152114_create_articles_table', 1),
(10, '2018_06_24_140546_create_catgs_table', 1),
(11, '2018_07_08_143937_create_photos_table', 1),
(12, '2018_07_08_144300_create_albums_table', 1),
(13, '2018_08_01_141244_create_urgents_table', 1),
(14, '2018_08_27_134858_create_roles_table', 1),
(15, '2018_08_27_135148_create_role_user_table', 1),
(17, '2018_09_04_151511_create_event_histories_table', 2),
(20, '2018_09_13_141201_create_article_translations', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `image`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 'Something Just Like This', '1535639155.jpg', 1, '2018-08-30 12:25:55', '2018-08-30 12:25:55'),
(2, 'Something Just Like This', '1535639182.jpg', 1, '2018-08-30 12:26:22', '2018-08-30 12:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'User', 'A Normal User who can browse the blog posts', '2018-08-27 13:00:31', '2018-08-27 13:00:31'),
(2, 'Admin', 'An Admin control every thing in the dashboard', '2018-08-27 13:00:31', '2018-08-27 13:00:31'),
(3, 'Author', 'The Author who is responsible for articles category ', '2018-08-30 10:38:09', '2018-08-30 10:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 8, NULL, NULL),
(6, 1, 9, NULL, NULL),
(7, 3, 9, NULL, NULL),
(8, 3, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `urgents`
--

CREATE TABLE `urgents` (
  `id` int(10) UNSIGNED NOT NULL,
  `news` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `urgents`
--

INSERT INTO `urgents` (`id`, `news`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed mostafa goes to the bathroom', '2018-09-06 11:27:56', '2018-09-06 11:27:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User Name', 'user@example.com', '$2y$10$PrfxmLjO6FdNoRRcz9yjbeBzH9hmQ8qud6oKCGmEnzCsG8Sw7lgk.', 0, NULL, '2018-08-27 13:00:31', '2018-08-27 13:00:31'),
(2, 'Admin Name', 'admin@example.com', '$2y$10$U4y2cpi2ToUEPeI2rdjgmuPRXrORcJppUsyCZiC5HOMV75GIeMfPK', 1, '0f3YTbZO21kJiQlnfVYmrneUM8rpTUDDq6C7OVoLeQzOgBSPeHaGnvY33guG', '2018-08-27 13:00:31', '2018-08-27 13:00:31'),
(3, 'ahmed', 'a7med_c2000@hotmail.com', '$2y$10$vG4NyCekZc9WO4YV0sTsHu1UYaDOkIV1X01JyArfRFkz.HuchGg9W', 0, NULL, '2018-08-27 13:35:38', '2018-08-27 13:35:38'),
(4, 'Ahmed Khaled', 'a.khaled@entlaqa.com', '$2y$10$IAxwzSO9Vre.PP4z/VE1e.3.QHp9Lp6uarcgF40p3XkfMh/TKOk.i', 1, 'aRY9gEtZqRHh4v9kzSBOeh6OrguqHMwE71JDNNmePfQRBAmCblFsgQ4mGKnI', '2018-08-27 13:37:24', '2018-08-27 13:37:24'),
(8, 'rami', 'rami@entlaqa3.com', '$2y$10$PGf8NW0K2xQ8r/Bu9NFUGuwGMwHAWrVOVJX8SF5BlwrE1WeUlC3aO', 1, 'LAwcwNElrvIJOYTHfSKYtSxEqTsUH3NBNAWSTrFun4qxmgEkHf8Kq3yKFiSI', '2018-08-28 10:17:55', '2018-08-28 10:17:55'),
(9, 'ahmed', 'a.samir@entlaqa.com', '$2y$10$U9BYAE2Avtsq12AjROy5VOjxG1x4KBI4wzs8SdrZpIp7Y5K2NCkCa', 1, 'hSL6xkGnxQtSCOucdjwkpIVZBtTz1OltWvX54p3ORoFrJEicuG65tAR5AJpT', '2018-08-28 10:18:54', '2018-08-28 10:19:08'),
(10, 'karem', 'karem@entlaqa.com', '$2y$10$O1nGrfvwUkSFKAzVqNPbGeBzr5ddYp3zXJlOD9KYEVUM8DOg3ncly', 1, '1mJVnJx3dAcK11JeBAmSDDTaYkg5UdXk4M0p4bnU5vd8cXStJVCMcCjUqx04', '2018-08-30 10:57:59', '2018-08-30 10:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(8, 'MfrO9mwNz6lA32zjiRUhqFUXEMTOt6Q0jxgKUdBk', '2018-08-28 10:17:55', '2018-08-28 10:17:55'),
(9, 'HiHN2O0qyeVYbv1G0jjvuXB3vKWJBfzt4Ne4rt5n', '2018-08-28 10:18:54', '2018-08-28 10:18:54'),
(10, 'BRBdKcILoVF1rOKJG0wb1D3yC7IWH8ynJDVZqvAt', '2018-08-30 10:57:59', '2018-08-30 10:57:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `article_translations_article_id_locale_unique` (`article_id`,`locale`),
  ADD KEY `article_translations_locale_index` (`locale`);

--
-- Indexes for table `catgs`
--
ALTER TABLE `catgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_histories`
--
ALTER TABLE `event_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urgents`
--
ALTER TABLE `urgents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `article_translations`
--
ALTER TABLE `article_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `catgs`
--
ALTER TABLE `catgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `event_histories`
--
ALTER TABLE `event_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `urgents`
--
ALTER TABLE `urgents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_translations`
--
ALTER TABLE `article_translations`
  ADD CONSTRAINT `article_translations_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
