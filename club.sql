-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 01:40 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `entity_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_owned` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `title`, `entity_id`, `entity_type`, `only_owned`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'view-member', 'View Member', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(2, 'create-member', 'Create Member', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(3, 'manage-member', 'Manage Member', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(4, 'view-event', 'View Event', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(5, 'create-event', 'Create Event', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(6, 'manage-event', 'Manage Event', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(7, 'view-club-members', 'View Club Members', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(8, 'view-club', 'View Club', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(9, 'create-club', 'Create Club', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(10, 'edit-club', 'Edit Club', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(11, 'delete-club', 'Delete Club', NULL, NULL, 0, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_roles`
--

CREATE TABLE `assigned_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_roles`
--

INSERT INTO `assigned_roles` (`role_id`, `entity_id`, `entity_type`, `scope`) VALUES
(1, 1, 'App\\User', NULL),
(3, 2, 'App\\User', NULL),
(2, 3, 'App\\User', NULL),
(4, 4, 'App\\User', NULL),
(2, 5, 'App\\User', NULL),
(2, 1, 'App\\User', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_logo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairperson_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `description`, `club_logo_path`, `chairperson_id`, `created_at`, `updated_at`) VALUES
(1, 'IT Society', 'IT CLUB', NULL, 2, '2018-04-17 17:27:49', '2018-04-17 17:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `club_user`
--

CREATE TABLE `club_user` (
  `club_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_user`
--

INSERT INTO `club_user` (`club_id`, `user_id`) VALUES
(1, 2),
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `club_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `duration`, `description`, `image_path`, `event_date`, `event_time`, `club_id`, `created_at`, `updated_at`) VALUES
(1, 'Hack2Hired', 3, 'Hacking event to have fun', 'Hack2Hired.jpg', '2018-04-18', '10:00:00', 1, '2018-04-17 17:28:50', '2018-04-17 17:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `event_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_24_142824_create_clubs_table', 1),
(4, '2018_03_25_152254_create_events_table', 1),
(5, '2018_03_25_162418_create_bouncer_tables', 1),
(6, '2018_04_04_150539_create_club_user_table', 1),
(7, '2018_04_16_185700_init_roles_and_permissions', 1),
(8, '2018_04_17_152618_create_event_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `ability_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `entity_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `scope` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`ability_id`, `entity_id`, `entity_type`, `forbidden`, `scope`) VALUES
(1, 1, 'roles', 0, NULL),
(2, 1, 'roles', 0, NULL),
(5, 1, 'roles', 0, NULL),
(3, 1, 'roles', 0, NULL),
(4, 1, 'roles', 0, NULL),
(6, 1, 'roles', 0, NULL),
(7, 1, 'roles', 0, NULL),
(10, 1, 'roles', 0, NULL),
(11, 1, 'roles', 0, NULL),
(8, 1, 'roles', 0, NULL),
(9, 1, 'roles', 0, NULL),
(4, 3, 'roles', 0, NULL),
(5, 3, 'roles', 0, NULL),
(6, 3, 'roles', 0, NULL),
(7, 3, 'roles', 0, NULL),
(10, 3, 'roles', 0, NULL),
(8, 3, 'roles', 0, NULL),
(4, 2, 'roles', 0, NULL),
(8, 2, 'roles', 0, NULL),
(8, 4, 'roles', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT NULL,
  `scope` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `level`, `scope`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Super Admin', NULL, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(2, 'member', 'Member', NULL, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(3, 'clubadmin', 'Club Admin', NULL, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33'),
(4, 'nonmember', 'Non Member', NULL, NULL, '2018-04-17 17:20:33', '2018-04-17 17:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role_name`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@hotmail.com', 'SuperAdmin', '$2y$10$RBzLWNqqiIcnXp5B3DBxQuW9GixeTnskQiXiItp9qCVnxs/5L/J32', 3, NULL, NULL, NULL),
(2, 'Choo Chen Wei', 'choo@hotmail.com', 'choo', '$2y$10$NtKJz5XPJ2EQFEaEC38m6.vnvAoRNKq.v/koghZO.fvHWpFFN2X.i', 2, NULL, '2018-04-17 17:23:07', '2018-04-17 17:23:07'),
(3, 'Boi Poh Leng', 'boi@hotmail.com', 'boi', '$2y$10$PGV/DnfptzfTYfwHVeaPReTH4fAGdroFEVEONowaX3RnsWjF0A/qW', 1, NULL, '2018-04-17 17:23:37', '2018-04-17 17:23:37'),
(4, 'Frango Liew', 'frango@hotmail.com', 'frango', '$2y$10$R/bhNks3GsfPLVlwUwBirOYG604Xw5xKfZy5.mSTfbGMPeMZ5z6DS', 4, NULL, '2018-04-17 17:24:09', '2018-04-17 17:24:09'),
(5, 'ali', 'alioh@gmail.com', 'Alioh', '$2y$10$wN97Xe6fBW1f8lvNnKw/P.rfr9YHHxzG4y94oqM45PSO5I36ABI92', 1, NULL, '2018-04-17 17:30:43', '2018-04-17 17:30:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abilities_scope_index` (`scope`);

--
-- Indexes for table `assigned_roles`
--
ALTER TABLE `assigned_roles`
  ADD KEY `assigned_roles_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `assigned_roles_role_id_index` (`role_id`),
  ADD KEY `assigned_roles_scope_index` (`scope`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_user`
--
ALTER TABLE `club_user`
  ADD KEY `club_user_club_id_foreign` (`club_id`),
  ADD KEY `club_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_club_id_foreign` (`club_id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD KEY `event_user_event_id_foreign` (`event_id`),
  ADD KEY `event_user_user_id_foreign` (`user_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD KEY `permissions_entity_index` (`entity_id`,`entity_type`,`scope`),
  ADD KEY `permissions_ability_id_index` (`ability_id`),
  ADD KEY `permissions_scope_index` (`scope`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`,`scope`),
  ADD KEY `roles_scope_index` (`scope`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_club_id_foreign` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
