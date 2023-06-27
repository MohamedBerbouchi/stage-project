-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 10:11 PM
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
-- Database: `iks`
--

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_28_084029_create_utilisateurs_table', 1),
(3, '2023_02_25_100811_create_type_defaut_table', 1),
(4, '2023_02_25_100822_create_type_anomalie_table', 1),
(5, '2023_02_25_103825_create_reclamation_client_table', 1),
(6, '2023_03_27_091055_create_saisir_defaut_table', 1);

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
-- Table structure for table `reclamation_client`
--

CREATE TABLE `reclamation_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(255) NOT NULL,
  `id_anomalie` bigint(20) UNSIGNED NOT NULL,
  `commentaire` longtext NOT NULL,
  `image` longtext DEFAULT NULL,
  `reponse` longtext DEFAULT NULL,
  `email` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reclamation_client`
--

INSERT INTO `reclamation_client` (`id`, `ref`, `id_anomalie`, `commentaire`, `image`, `reponse`, `email`, `created_at`, `updated_at`) VALUES
(1, '0233', 1, 'Bonjour monsieur\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially .\r\n\r\nmerci cordialement', 'images/1680782040Bsodwindows10.png', 'ok', '[\"berbouchimh01@gmail.com\"]', '2023-04-06 11:54:03', '2023-05-12 09:13:29'),
(2, '11111111111', 1, 'Bonjour monsieur\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially .\r\n\r\nmerci cordialement', 'images/1680782194EN_US_32_pixel_sbs_step02.png', 'this is the reponse \r\nof\r\nthe \r\nreclamation', '[\"berbouchimh01@gmail.com\"]', '2023-04-06 11:56:40', '2023-04-09 09:47:06'),
(3, 'bbbbbbbb', 1, 'Bonjour monsieur\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially .\r\n\r\nmerci cordialement', NULL, NULL, '[\"berbouchimh01@gmail.com\"]', '2023-04-06 11:57:13', '2023-04-06 11:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `saisir_defaut`
--

CREATE TABLE `saisir_defaut` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `of` varchar(255) NOT NULL,
  `operatrice` varchar(255) NOT NULL,
  `N_programme` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `id_defaut` bigint(20) UNSIGNED DEFAULT NULL,
  `id_utilisateur` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saisir_defaut`
--

INSERT INTO `saisir_defaut` (`id`, `of`, `operatrice`, `N_programme`, `quantite`, `id_defaut`, `id_utilisateur`, `created_at`, `updated_at`) VALUES
(2, 'GkdobMJ9UW', 'Ms. Laura Kling PhD', 'oB9tBSGa', 'E', 1, 1, '2023-04-09 09:37:34', '2023-04-09 09:37:34'),
(3, '95zsoHJDUe', 'Mrs. Evalyn Von', 'Rgv0vSNA', 'f', 1, 2, '2023-01-09 08:37:34', '2023-04-09 09:37:34'),
(4, 'KZYVLawNL1', 'Madilyn Lubowitz', 'VefdRlPX', 'E', 1, 1, '2023-01-09 08:37:34', '2023-04-09 09:37:34'),
(5, '4kO4qUW8Fk', 'Prof. Ardith Simonis III', 'RXWf1lE0', '2', 1, 2, '2023-04-09 09:37:34', '2023-04-09 09:37:34'),
(6, 'f15LBL5Xwe', 'Griffin Hahn', 'uOE9tKuO', 'w', 1, 3, '2023-02-09 08:37:34', '2023-04-09 09:37:34'),
(7, '2chQAxWyqJ', 'Prof. Olen Hermann PhD', 'kmuvKTuC', 'n', 1, 4, '2023-03-09 08:37:34', '2023-04-09 09:37:34'),
(8, '5AQQNM8zbX', 'Cristopher Mann', 'PK6JpsOc', 'j', 1, 5, '2023-03-09 08:37:34', '2023-04-09 09:37:34'),
(9, 'oO19FzmcSs', 'Rachael Ferry', '3r28IhKF', 'J', 1, 1, '2023-03-09 08:37:34', '2023-04-09 09:37:34'),
(10, 'wZaYIVnAjQ', 'Millie Oberbrunner DVM', 'ZMVMViPs', 'R', 1, 6, '2023-04-09 09:37:34', '2023-04-09 09:37:34'),
(11, 'uCoLUAEMwp', 'Mrs. Alverta Schaefer IV', '7jMckumQ', 'B', 1, 2, '2023-04-09 09:37:34', '2023-04-09 09:37:34'),
(13, '12345', 'FAaaaaa', 'NHFGFGGG', '3', 2, 1, '2023-05-11 17:52:53', '2023-05-11 17:52:53'),
(14, '12345', 'S1111111', 'NHFGFGGG', '2', 2, 1, '2023-05-11 17:53:12', '2023-05-11 17:53:12'),
(15, '12345', 'FAaaaaa', 'NHFGFGGG', '3', 2, 1, '2023-05-11 17:53:34', '2023-05-11 17:53:34'),
(17, '12345', 'S1111111', 'NHFGFGGG', '3', 4, 2, '2023-05-12 09:15:03', '2023-05-12 09:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `type_anomalie`
--

CREATE TABLE `type_anomalie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_anomalie`
--

INSERT INTO `type_anomalie` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'anomalie 1', NULL, NULL),
(2, 'anamolie 2', NULL, NULL),
(3, 'anamolie 3', NULL, NULL),
(4, 'anamolie 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_defaut`
--

CREATE TABLE `type_defaut` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_defaut`
--

INSERT INTO `type_defaut` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'defaut 1', NULL, NULL),
(2, 'defaut 2', NULL, NULL),
(3, 'defaut 3', NULL, NULL),
(4, 'defaut 3', NULL, NULL),
(11, 'defaut A', '2023-05-12 09:14:30', '2023-05-12 09:14:30'),
(12, 'defaut B', '2023-05-12 09:14:30', '2023-05-12 09:14:30'),
(13, 'defaut C', '2023-05-12 09:14:30', '2023-05-12 09:14:30'),
(14, 'defaut D', '2023-05-12 09:14:30', '2023-05-12 09:14:30'),
(15, 'defaut E', '2023-05-12 09:14:30', '2023-05-12 09:14:30'),
(16, 'defaut F', '2023-05-12 09:14:30', '2023-05-12 09:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL DEFAULT '',
  `matricule` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `matricule`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL, NULL),
(2, 'user', 'user', 'user', 'user', NULL, NULL),
(3, 'Ms. Telly Corkery', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(4, 'Adam Koch', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(5, 'Presley Bednar', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(6, 'Juwan Hilpert', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(7, 'Erwin Konopelski', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(8, 'Kelsi Morissette DDS', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(9, 'Trycia Lang', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00'),
(10, 'Prof. Jewel Kuhn', 'user', 'user', 'user', '2023-04-09 00:00:00', '2023-04-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reclamation_client`
--
ALTER TABLE `reclamation_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reclamation_client_id_anomalie_foreign` (`id_anomalie`);

--
-- Indexes for table `saisir_defaut`
--
ALTER TABLE `saisir_defaut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saisir_defaut_id_utilisateur_foreign` (`id_utilisateur`),
  ADD KEY `saisir_defaut_id_defaut_foreign` (`id_defaut`);

--
-- Indexes for table `type_anomalie`
--
ALTER TABLE `type_anomalie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_defaut`
--
ALTER TABLE `type_defaut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reclamation_client`
--
ALTER TABLE `reclamation_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saisir_defaut`
--
ALTER TABLE `saisir_defaut`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `type_anomalie`
--
ALTER TABLE `type_anomalie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_defaut`
--
ALTER TABLE `type_defaut`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reclamation_client`
--
ALTER TABLE `reclamation_client`
  ADD CONSTRAINT `reclamation_client_id_anomalie_foreign` FOREIGN KEY (`id_anomalie`) REFERENCES `type_anomalie` (`id`);

--
-- Constraints for table `saisir_defaut`
--
ALTER TABLE `saisir_defaut`
  ADD CONSTRAINT `saisir_defaut_id_defaut_foreign` FOREIGN KEY (`id_defaut`) REFERENCES `type_defaut` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `saisir_defaut_id_utilisateur_foreign` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
