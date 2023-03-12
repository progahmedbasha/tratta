-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 01, 2023 at 05:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tratta`
--

-- --------------------------------------------------------

--
-- Table structure for table `ages`
--

CREATE TABLE `ages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` int UNSIGNED NOT NULL,
  `to` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ages`
--

INSERT INTO `ages` (`id`, `name`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 'adult', 20, 50, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'category 1', NULL, '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(2, 'sub', 1, '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(3, 'sub sub ', 2, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'red', '##eb220c', '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(2, 'black', '#171616', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` tinyint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Egypt', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `crcl_ranges`
--

CREATE TABLE `crcl_ranges` (
  `id` int UNSIGNED NOT NULL,
  `illness_category_id` int UNSIGNED NOT NULL,
  `range_from` int UNSIGNED NOT NULL,
  `range_to` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crcl_ranges`
--

INSERT INTO `crcl_ranges` (`id`, `illness_category_id`, `range_from`, `range_to`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 80, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sub_cat_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `name`, `sub_sub_cat_id`, `created_at`, `updated_at`) VALUES
(1, 'drug 1', 3, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `drug_formulas`
--

CREATE TABLE `drug_formulas` (
  `id` int UNSIGNED NOT NULL,
  `drug_id` int UNSIGNED NOT NULL,
  `formula_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drug_formulas`
--

INSERT INTO `drug_formulas` (`id`, `drug_id`, `formula_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `drug_indications`
--

CREATE TABLE `drug_indications` (
  `id` int UNSIGNED NOT NULL,
  `drug_id` int UNSIGNED NOT NULL,
  `indication_id` int UNSIGNED NOT NULL,
  `sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `effects`
--

CREATE TABLE `effects` (
  `id` int UNSIGNED NOT NULL,
  `effect_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` tinyint NOT NULL,
  `color_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `effects`
--

INSERT INTO `effects` (`id`, `effect_type`, `number`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 'effect type 1', 1, 1, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formulas`
--

CREATE TABLE `formulas` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formulas`
--

INSERT INTO `formulas` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'formula 1', NULL, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` tinyint UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'male', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `illness_categories`
--

CREATE TABLE `illness_categories` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `illness_categories`
--

INSERT INTO `illness_categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'ilness category 1', NULL, '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(2, 'ilness  category 2', 1, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `indications`
--

CREATE TABLE `indications` (
  `id` int UNSIGNED NOT NULL,
  `indication_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indications`
--

INSERT INTO `indications` (`id`, `indication_title`, `created_at`, `updated_at`) VALUES
(1, 'indication 1', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_02_11_193524_create_user_types_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_20_181028_create_ages_table', 1),
(7, '2023_02_20_183510_create_genders_table', 1),
(8, '2023_02_20_183812_create_categories_table', 1),
(9, '2023_02_21_133615_create_illness_categories_table', 1),
(10, '2023_02_21_142450_create_indications_table', 1),
(11, '2023_02_21_150251_create_weights_table', 1),
(12, '2023_02_21_174605_create_pregnancy_stages_table', 1),
(13, '2023_02_22_124154_create_pregnancy_safeties_table', 1),
(14, '2023_02_22_141035_create_nursing_safty_categories_table', 1),
(15, '2023_02_22_151247_create_formulas_table', 1),
(16, '2023_02_22_153520_create_colors_table', 1),
(17, '2023_02_22_154318_create_effects_table', 1),
(18, '2023_02_22_164335_create_countries_table', 1),
(19, '2023_02_23_095400_create_weight_genders_table', 1),
(20, '2023_02_23_105614_create_crcl_ranges_table', 1),
(21, '2023_02_23_111932_create_scrs_table', 1),
(22, '2023_02_23_115656_create_drugs_table', 1),
(23, '2023_02_23_122649_create_drug_formulas_table', 1),
(24, '2023_02_23_130051_create_drug_indications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nursing_safety_categories`
--

CREATE TABLE `nursing_safety_categories` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nursing_safety_categories`
--

INSERT INTO `nursing_safety_categories` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'type', 'value', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_safeties`
--

CREATE TABLE `pregnancy_safeties` (
  `id` int UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pregnancy_safeties`
--

INSERT INTO `pregnancy_safeties` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'type', 'value', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `pregnancy_stages`
--

CREATE TABLE `pregnancy_stages` (
  `id` int UNSIGNED NOT NULL,
  `pregnancy_stage` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pregnancy_stages`
--

INSERT INTO `pregnancy_stages` (`id`, `pregnancy_stage`, `created_at`, `updated_at`) VALUES
(1, 'stage 1', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `scrs`
--

CREATE TABLE `scrs` (
  `id` int UNSIGNED NOT NULL,
  `illness_category_id` int UNSIGNED NOT NULL,
  `gender_id` tinyint UNSIGNED NOT NULL,
  `range_from` int UNSIGNED NOT NULL,
  `range_to` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scrs`
--

INSERT INTO `scrs` (`id`, `illness_category_id`, `gender_id`, `range_from`, `range_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, 80, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` tinyint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$Gv4vFEcHjwmP.DSVACz9s.YshX5VPI6RK2YI1a0WO10KR1OeUd0jK', 1, NULL, '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$zLjN6BvLxkFj4jrVVf6NNOOVRpSThcm8Rvl1R.QgjF9s4LF0iJQY6', 2, NULL, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` tinyint UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-03-01 17:02:56', '2023-03-01 17:02:56'),
(2, 'user', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` int UNSIGNED NOT NULL,
  `weight` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'weight', '2023-03-01 17:02:56', '2023-03-01 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `weight_genders`
--

CREATE TABLE `weight_genders` (
  `id` int UNSIGNED NOT NULL,
  `weight_id` int UNSIGNED NOT NULL,
  `gender_id` tinyint UNSIGNED NOT NULL,
  `range_from` int UNSIGNED NOT NULL,
  `range_to` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weight_genders`
--

INSERT INTO `weight_genders` (`id`, `weight_id`, `gender_id`, `range_from`, `range_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, 90, '2023-03-01 17:02:56', '2023-03-01 17:02:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ages`
--
ALTER TABLE `ages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crcl_ranges`
--
ALTER TABLE `crcl_ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crcl_ranges_illness_category_id_foreign` (`illness_category_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drugs_sub_sub_cat_id_foreign` (`sub_sub_cat_id`);

--
-- Indexes for table `drug_formulas`
--
ALTER TABLE `drug_formulas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_formulas_drug_id_foreign` (`drug_id`),
  ADD KEY `drug_formulas_formula_id_foreign` (`formula_id`);

--
-- Indexes for table `drug_indications`
--
ALTER TABLE `drug_indications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_indications_drug_id_foreign` (`drug_id`),
  ADD KEY `drug_indications_indication_id_foreign` (`indication_id`);

--
-- Indexes for table `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `effects_color_id_foreign` (`color_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formulas`
--
ALTER TABLE `formulas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illness_categories`
--
ALTER TABLE `illness_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `illness_categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `indications`
--
ALTER TABLE `indications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nursing_safety_categories`
--
ALTER TABLE `nursing_safety_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pregnancy_safeties`
--
ALTER TABLE `pregnancy_safeties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pregnancy_stages`
--
ALTER TABLE `pregnancy_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scrs`
--
ALTER TABLE `scrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scrs_illness_category_id_foreign` (`illness_category_id`),
  ADD KEY `scrs_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_genders`
--
ALTER TABLE `weight_genders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weight_genders_weight_id_foreign` (`weight_id`),
  ADD KEY `weight_genders_gender_id_foreign` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ages`
--
ALTER TABLE `ages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `crcl_ranges`
--
ALTER TABLE `crcl_ranges`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drug_formulas`
--
ALTER TABLE `drug_formulas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `drug_indications`
--
ALTER TABLE `drug_indications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `effects`
--
ALTER TABLE `effects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formulas`
--
ALTER TABLE `formulas`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `illness_categories`
--
ALTER TABLE `illness_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indications`
--
ALTER TABLE `indications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `nursing_safety_categories`
--
ALTER TABLE `nursing_safety_categories`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pregnancy_safeties`
--
ALTER TABLE `pregnancy_safeties`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pregnancy_stages`
--
ALTER TABLE `pregnancy_stages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scrs`
--
ALTER TABLE `scrs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weight_genders`
--
ALTER TABLE `weight_genders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `crcl_ranges`
--
ALTER TABLE `crcl_ranges`
  ADD CONSTRAINT `crcl_ranges_illness_category_id_foreign` FOREIGN KEY (`illness_category_id`) REFERENCES `illness_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `drugs`
--
ALTER TABLE `drugs`
  ADD CONSTRAINT `drugs_sub_sub_cat_id_foreign` FOREIGN KEY (`sub_sub_cat_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `drug_formulas`
--
ALTER TABLE `drug_formulas`
  ADD CONSTRAINT `drug_formulas_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `drug_formulas_formula_id_foreign` FOREIGN KEY (`formula_id`) REFERENCES `formulas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `drug_indications`
--
ALTER TABLE `drug_indications`
  ADD CONSTRAINT `drug_indications_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `drug_indications_indication_id_foreign` FOREIGN KEY (`indication_id`) REFERENCES `indications` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `effects`
--
ALTER TABLE `effects`
  ADD CONSTRAINT `effects_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `illness_categories`
--
ALTER TABLE `illness_categories`
  ADD CONSTRAINT `illness_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `illness_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `scrs`
--
ALTER TABLE `scrs`
  ADD CONSTRAINT `scrs_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `scrs_illness_category_id_foreign` FOREIGN KEY (`illness_category_id`) REFERENCES `illness_categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `weight_genders`
--
ALTER TABLE `weight_genders`
  ADD CONSTRAINT `weight_genders_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `weight_genders_weight_id_foreign` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
