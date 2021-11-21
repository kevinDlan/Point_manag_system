-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2021 at 10:50 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pres_manag_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

CREATE TABLE `competencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_competencyBlock` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competency_blocks`
--

CREATE TABLE `competency_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_referencial` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDay` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_19_000129_create_partners_table', 1),
(7, '2021_11_19_000240_create_referentials_table', 1),
(8, '2021_11_19_000353_create_competency_blocks_table', 1),
(9, '2021_11_19_000507_create_competencies_table', 1),
(10, '2021_11_19_000622_create_trainings_table', 1),
(11, '2021_11_19_000829_create_registers_table', 1),
(12, '2021_11_19_000937_create_validate_competencies_table', 1),
(13, '2021_11_19_001023_create_instructors_table', 1),
(14, '2021_11_19_001834_create_students_table', 1),
(15, '2021_11_19_004005_create_sessions_table', 1),
(16, '2021_11_20_203344_create_routers_ips_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `activity_domain`, `address`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Fondation MTN', 'ONG', 'BP01-Abidjan', '+22577298466', '2021-11-19 12:10:01', '2021-11-19 12:10:01'),
(2, 'Société Générale', 'Banque', 'SGB', '+2250707389562', '2021-11-19 15:56:34', '2021-11-19 15:56:34');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referentials`
--

CREATE TABLE `referentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referentials`
--

INSERT INTO `referentials` (`id`, `label`, `created_at`, `updated_at`) VALUES
(1, 'Developper Data IA', '2021-11-19 14:45:41', '2021-11-19 14:45:41'),
(2, 'Dévéloppeur Web Mobile', '2021-11-19 15:57:47', '2021-11-19 15:57:47'),
(3, 'Référent Digital', '2021-11-19 15:58:33', '2021-11-19 15:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `dayDate` date NOT NULL,
  `morningSignIn` datetime NOT NULL,
  `eveningSignIn` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `id_student`, `dayDate`, `morningSignIn`, `eveningSignIn`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-11-20', '2021-11-20 21:34:28', '2021-11-20 21:37:26', '2021-11-20 21:34:28', '2021-11-20 21:37:26');

-- --------------------------------------------------------

--
-- Table structure for table `routers_ips`
--

CREATE TABLE `routers_ips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `public_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routers_ips`
--

INSERT INTO `routers_ips` (`id`, `public_address`, `region`, `country`, `created_at`, `updated_at`) VALUES
(1, '160.155.130.215', 'Abidjan', 'CI', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_training` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `sex` enum('F','M') COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branchOfStudy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentContact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `id_training`, `firstName`, `lastName`, `birthday`, `sex`, `educationLevel`, `branchOfStudy`, `email`, `address`, `tel`, `parentContact`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ben Yaya', 'Konante', '2021-11-25', 'M', 'Licence', 'Informatique', 'benkonate56@gmail.com', 'Abidjan-Cocody-Campus', '0777298466', '0786546213', '2021-11-20 07:59:57', '2021-11-20 07:59:57'),
(2, 1, 'Lebron', 'James', '1999-10-12', 'M', 'Licence', 'Mathématique', 'lebron.james@gmail.com', 'Abidjan-Yopougon-Ananeraie', '0789451250', '0708789875', '2021-11-20 18:25:51', '2021-11-20 18:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_partner` bigint(20) UNSIGNED NOT NULL,
  `id_referential` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beginDate` date NOT NULL,
  `endDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `id_partner`, `id_referential`, `label`, `beginDate`, `endDate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Formation des développeurs web & mobile', '2021-11-12', '2022-03-25', '2021-11-19 16:06:24', '2021-11-19 16:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','student','instructor','null') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kevin', 'kevinkone19@gmail.com', 'admin', NULL, '$2y$10$sOVuxto6y/c/H93nityaV.ahCQ23eGRbgT8n1XaLD0dJnaUe1eqNu', NULL, '2021-11-19 10:26:07', '2021-11-19 10:26:07'),
(3, 'Konate', 'benkonate56@gmail.com', 'student', NULL, '$2y$10$hSqkH6MjxzZIRS.3fftqee.2rEQkdBjvas4c7wlV2b2mmnZAzkn4.', NULL, '2021-11-20 07:59:58', '2021-11-20 10:56:53'),
(4, 'James', 'lebron.james@gmail.com', 'student', NULL, '$2y$10$eTR9LkUOp97KXVt4fyI/fuOVM2qKMlbipYmwkhMyP0xY0ZFKh6zhS', NULL, '2021-11-20 18:25:51', '2021-11-20 19:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `validate_competencies`
--

CREATE TABLE `validate_competencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `id_competencies` bigint(20) UNSIGNED NOT NULL,
  `validateLevel` enum('imiter','adapter','étendre') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competency_blocks`
--
ALTER TABLE `competency_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `referentials`
--
ALTER TABLE `referentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routers_ips`
--
ALTER TABLE `routers_ips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `validate_competencies`
--
ALTER TABLE `validate_competencies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competency_blocks`
--
ALTER TABLE `competency_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `referentials`
--
ALTER TABLE `referentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `routers_ips`
--
ALTER TABLE `routers_ips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `validate_competencies`
--
ALTER TABLE `validate_competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
