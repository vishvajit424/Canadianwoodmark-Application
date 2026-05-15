-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 103.191.208.56:3306
-- Generation Time: Apr 05, 2026 at 11:10 AM
-- Server version: 11.4.10-MariaDB-ubu2404
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `champ_421_cwm_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `assemblies`
--

CREATE TABLE `assemblies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `completed_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `cabinets_size` varchar(255) DEFAULT NULL,
  `missing_pieces` text DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assemblies`
--

INSERT INTO `assemblies` (`id`, `task_id`, `user_id`, `completed_items`, `cabinets_size`, `missing_pieces`, `status`, `created_at`, `updated_at`) VALUES
(1, 26, 1, '[\"Cabinets\"]', '17', 'd3ed3e', 'completed', '2026-04-01 13:28:12', '2026-04-01 15:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `assembly_checklists`
--

CREATE TABLE `assembly_checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assembly_checklists`
--

INSERT INTO `assembly_checklists` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(5, 'Cabinets', 'cabinets', '2026-01-20 08:42:15', '2026-01-20 08:42:15'),
(6, 'Drawers', 'drawers', '2026-01-20 08:43:03', '2026-01-20 08:43:03'),
(8, 'Doors', 'doors', '2026-01-20 08:44:26', '2026-01-20 08:44:26'),
(9, 'Hinges', 'hinges', '2026-01-20 08:44:41', '2026-01-20 08:44:41'),
(10, 'Handles', 'handles', '2026-01-20 08:44:58', '2026-01-20 08:44:58'),
(11, 'Handles', 'handles', '2026-01-20 08:45:12', '2026-01-20 08:45:12');

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
-- Table structure for table `c_n_c_s`
--

CREATE TABLE `c_n_c_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `timer_start` timestamp NULL DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `total_time` int(100) NOT NULL DEFAULT 0,
  `recut_pieces` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c_n_c_s`
--

INSERT INTO `c_n_c_s` (`id`, `task_id`, `user_id`, `timer_start`, `start_time`, `end_time`, `total_time`, `recut_pieces`, `content`, `status`, `created_at`, `updated_at`) VALUES
(42, 26, 1, NULL, NULL, '2026-03-31 14:25:52', 0, NULL, NULL, 'completed', '2026-03-31 08:26:42', '2026-03-31 14:25:52'),
(43, 27, 12, NULL, NULL, NULL, 0, NULL, NULL, 'pending', '2026-04-02 02:33:53', '2026-04-02 02:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin', '2026-01-16 10:05:57', '2026-01-16 10:05:57'),
(7, 'Measurements', 'measurements', '2026-01-09 15:05:04', '2026-01-09 15:05:04'),
(8, 'Designing', 'designing', '2026-01-09 15:05:55', '2026-01-09 15:05:55'),
(9, 'CNC', 'cnc', '2026-01-09 15:06:15', '2026-01-09 15:06:15'),
(10, 'Edge Bender', 'edge-bender', '2026-01-09 15:06:42', '2026-01-09 15:06:42'),
(11, 'Assembly', 'assembly', '2026-01-09 15:07:00', '2026-01-09 15:07:00'),
(12, 'Installing', 'installing', '2026-01-09 15:07:17', '2026-01-09 15:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `designings`
--

CREATE TABLE `designings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) NOT NULL,
  `lock_code` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `installation_date` date DEFAULT NULL,
  `material` text DEFAULT NULL,
  `tape` text DEFAULT NULL,
  `handle` text DEFAULT NULL,
  `layout_pdf` varchar(255) NOT NULL,
  `updated_pdf` varchar(255) DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_pdf_user_role` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designings`
--

INSERT INTO `designings` (`id`, `task_id`, `user_id`, `name`, `email`, `phone_no`, `lock_code`, `address`, `installation_date`, `material`, `tape`, `handle`, `layout_pdf`, `updated_pdf`, `updated_by`, `updated_pdf_user_role`, `content`, `status`, `created_at`, `updated_at`) VALUES
(17, 26, 1, 'vishvajit kumar', 'vishvajitkumar424@gmail.com', '09988351875', '23233', 'House no:125, Aman Avenue', NULL, NULL, NULL, NULL, 'designing/1kJNTYj7UuzfDb1WFi3k8BvyiIPUspt9E2my4LuM.pdf', 'designing/ybdHui7NJdiqT2wxPrjVz4fA8ycTkyjZmLaU7wvs.pdf', 14, 'CNC', NULL, 'completed', '2026-03-31 08:40:22', '2026-03-31 16:12:32'),
(18, 27, 1, 'vishvajit kumar', 'vishvajitkumar424@gmail.com', '09988351875', '222222', 'House no:125, Aman Avenue', NULL, NULL, NULL, NULL, 'designing/JmnFgq1IXDDYw5thOUusjdNyBfPdwSUoGMHD7Vdp.pdf', NULL, NULL, NULL, NULL, 'completed', '2026-04-02 04:33:29', '2026-04-02 04:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `edge_benders`
--

CREATE TABLE `edge_benders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `timer_start` timestamp NULL DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `total_time` int(11) NOT NULL DEFAULT 0,
  `missing_pieces` text DEFAULT NULL,
  `finishing_materials` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`finishing_materials`)),
  `special_instructions` text DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `edge_benders`
--

INSERT INTO `edge_benders` (`id`, `task_id`, `user_id`, `timer_start`, `start_time`, `end_time`, `total_time`, `missing_pieces`, `finishing_materials`, `special_instructions`, `status`, `created_at`, `updated_at`) VALUES
(22, 26, 1, '2026-03-31 23:07:43', NULL, '2026-03-31 23:08:23', 32, 'edcdec', '[\"Laminate\"]', 'edce', 'completed', '2026-03-31 08:26:42', '2026-03-31 23:14:20'),
(23, 27, 12, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'pending', '2026-04-02 02:33:53', '2026-04-02 02:33:53');

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
-- Table structure for table `finishing_materials`
--

CREATE TABLE `finishing_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finishing_materials`
--

INSERT INTO `finishing_materials` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Polish', 'polish', '2026-01-20 14:20:10', '2026-01-20 14:20:10'),
(2, 'Laminate', 'laminate', '2026-01-20 14:20:22', '2026-01-20 14:20:22'),
(3, 'Paint', 'paint', '2026-01-20 14:20:34', '2026-01-20 14:20:34'),
(4, 'Veneer', 'veneer', '2026-01-20 14:20:45', '2026-01-20 14:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `handels`
--

CREATE TABLE `handels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `handels`
--

INSERT INTO `handels` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Handal', 'handal', '2026-02-16 16:13:37', '2026-02-16 16:13:37'),
(4, 'e3d3ed', 'e3d3ed', '2026-03-02 14:38:27', '2026-03-02 14:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `installings`
--

CREATE TABLE `installings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `special_instructions` varchar(255) NOT NULL,
  `missing_stuff` varchar(255) NOT NULL,
  `pdf_file` varchar(255) DEFAULT NULL,
  `status` enum('pending','complete') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installings`
--

INSERT INTO `installings` (`id`, `task_id`, `user_id`, `special_instructions`, `missing_stuff`, `pdf_file`, `status`, `created_at`, `updated_at`) VALUES
(13, 26, 1, 'd dcd', 'dc dc dc', NULL, 'complete', '2026-04-02 00:36:19', '2026-04-02 00:36:19'),
(14, 26, 1, 'd dcd', 'dc dc dc', NULL, 'complete', '2026-04-02 00:36:19', '2026-04-02 00:36:19');

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
-- Table structure for table `kitchen_colors`
--

CREATE TABLE `kitchen_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design_id` bigint(20) UNSIGNED NOT NULL,
  `upper_cabinet` varchar(255) DEFAULT NULL,
  `riser` varchar(255) DEFAULT NULL,
  `base_cabinet` varchar(255) DEFAULT NULL,
  `handle` varchar(255) DEFAULT NULL,
  `island` varchar(255) DEFAULT NULL,
  `garbage_bin` varchar(255) DEFAULT NULL,
  `vanities` varchar(255) DEFAULT NULL,
  `spice_rack` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_colors`
--

INSERT INTO `kitchen_colors` (`id`, `design_id`, `upper_cabinet`, `riser`, `base_cabinet`, `handle`, `island`, `garbage_bin`, `vanities`, `spice_rack`, `created_at`, `updated_at`) VALUES
(12, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-03-31 14:10:22', '2026-03-31 14:10:22'),
(13, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-04-02 04:33:29', '2026-04-02 04:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Mat 1', 'Mat 1', '2026-01-12 13:36:49', '2026-01-12 13:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'completed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `task_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(27, 26, 1, 'This is a kitchen Task', 'completed', '2026-03-31 08:27:28', '2026-03-31 08:27:28'),
(28, 27, 12, 'this is a test', 'completed', '2026-04-02 02:34:44', '2026-04-02 02:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_images`
--

CREATE TABLE `measurement_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `measurement_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurement_images`
--

INSERT INTO `measurement_images` (`id`, `measurement_id`, `image_path`, `created_at`, `updated_at`) VALUES
(124, 27, 'measurements/SH79vtN2cgmmYsIi6iSgNQ5OL6THP4jnrO04Pnro.png', '2026-03-31 08:27:28', '2026-03-31 08:27:28'),
(125, 27, 'measurements/CWWJgyLR6fXMJrjTTWnh2VbMshPY5hoisD6DwMXh.jpg', '2026-03-31 08:27:28', '2026-03-31 08:27:28'),
(126, 27, 'measurements/NWV51NkCf2xneVmR9upRRqn5XcSYRWjfKIQ9QRkI.jpg', '2026-03-31 08:27:28', '2026-03-31 08:27:28'),
(127, 28, 'measurements/ukhsJ3aqwP3QzE7iOfnLnzVCF3sUTmUvKNbOTAH8.png', '2026-04-02 02:34:44', '2026-04-02 02:34:44'),
(128, 28, 'measurements/uc1hDoEv6molyZGnuYHvex8Yscc8KqWK54UuY0k5.png', '2026-04-02 02:34:44', '2026-04-02 02:34:44'),
(129, 28, 'measurements/wQCh0dFqpxYu8LNGdUIpxayzpB7Jqa3sgzFBdGd5.png', '2026-04-02 02:34:44', '2026-04-02 02:34:44'),
(130, 28, 'measurements/wf2oMHC55ezu8n6oPVTSgEnp6zxk2H155Xv8MYa8.png', '2026-04-02 02:34:44', '2026-04-02 02:34:44');

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
(6, '2025_12_29_111306_create_setting_table', 2),
(8, '2025_12_29_103205_create_user_roles_table', 3),
(9, '2025_12_30_124035_create_roles_table', 4),
(11, '2026_01_01_112954_create_departments_table', 5),
(12, '2026_01_04_202229_add_timestamps_to_user_details_table', 6),
(15, '2026_01_10_200638_create_materials_table', 8),
(16, '2026_01_10_200657_create_tapes_table', 8),
(17, '2026_01_10_200736_create_handels_table', 8),
(20, '2026_01_12_201132_create_tasks_table', 9),
(21, '2026_01_12_202812_create_task_user_table', 9),
(22, '2026_01_15_083504_create_measurements_table', 10),
(23, '2026_01_15_085009_create_measurement_images_table', 10),
(28, '2026_01_18_083541_create_installings_table', 15),
(30, '2026_01_20_091543_create_finishing_materials_table', 16),
(33, '2026_01_18_180450_create_kitchen_colors_table', 17),
(35, '2026_01_18_083411_create_c_n_c_s_table', 18),
(36, '2026_01_18_083453_create_edge_benders_table', 19),
(37, '2026_01_20_091637_create_assembly_checklists_table', 19),
(39, '2025_12_29_102644_create_user_details_table', 20),
(42, '2026_01_18_083353_create_designings_table', 21),
(43, '2026_01_18_083522_create_assemblies_table', 22);

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
('3QOJwXHA7DPAfLxFl4N5G3ux4MowJXdw4AhmvKg8', 1, '103.187.103.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMWxtTWoyYW1HTG5PaEhiNE12bTVZVlVmUFZudkhZbTNwdnlkb0s4QyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjc2OiJodHRwczovL2NoYW1wLTQyNjI3NDQ1Lmhlcm9zaXRlcHJvLmNvbS9jd21fYXBwbGljYXRpb24vcHVibGljL3NpbmdsZS90YXNrLzI3IjtzOjU6InJvdXRlIjtzOjExOiJzaW5nbGUudGFzayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775124506),
('ss8GpzHXEhlMHP1Dfpe6QXHhqbDum4QvoFILqrRE', 13, '103.187.103.17', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaXdqc1BhRzZxa0lSQktkNElsaXNGbWdTY1RXWDRPbEVkWjJBbDExZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NzE6Imh0dHBzOi8vY2hhbXAtNDI2Mjc0NDUuaGVyb3NpdGVwcm8uY29tL2N3bV9hcHBsaWNhdGlvbi9wdWJsaWMvZGFzaGJvYXJkIjtzOjU6InJvdXRlIjtzOjk6ImRhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEzO30=', 1775124427),
('wYFPJrbub9wTriCZkpvrxnf6NAHq62GeUL7cZdQg', 1, '180.188.251.192', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiR0VpOEhHMklFUzlQUmJYNHdZcWFaZWUzVVhGSjhiMzZ5d0hlZ1h2SyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjc2OiJodHRwczovL2NoYW1wLTQyNjI3NDQ1Lmhlcm9zaXRlcHJvLmNvbS9jd21fYXBwbGljYXRpb24vcHVibGljL2ZpbmlzaGVkL3Rhc2tzIjtzOjU6InJvdXRlIjtzOjE0OiJmaW5pc2hlZC50YXNrcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1775244349);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `short_title`, `email`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'CWM Application', 'CWM', 'info@canadianwoodmark.com', 'profiles/an4jq3T4tXBKdSyU5IsFXOlPuHl9s9xECsrUfIDg.png', NULL, '2026-02-01 14:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `tapes`
--

CREATE TABLE `tapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tapes`
--

INSERT INTO `tapes` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Tape 1', 'tape-1', '2026-01-19 16:19:46', '2026-01-19 16:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `assign_user` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('measurements','designings','cnc','edge-bender','assembly','installing','finished') NOT NULL DEFAULT 'measurements',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `date`, `tag`, `assign_user`, `description`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(26, 'Kitchen Task', '2026-04-01', 'dddd', NULL, 'This is a Kitchen Task.', 1, 'finished', '2026-03-31 08:26:34', '2026-04-02 00:36:19'),
(27, 'task 1', '2026-04-30', 'dddd', NULL, 'this is a test task', 1, 'cnc', '2026-04-02 02:33:33', '2026-04-02 04:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `user_id`, `created_at`, `updated_at`) VALUES
(95, 26, 1, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(96, 26, 12, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(97, 26, 13, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(98, 26, 14, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(99, 26, 15, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(100, 26, 17, '2026-03-31 08:26:34', '2026-03-31 08:26:34'),
(101, 27, 12, '2026-04-02 02:33:33', '2026-04-02 02:33:33'),
(102, 27, 13, '2026-04-02 02:33:33', '2026-04-02 02:33:33'),
(103, 27, 14, '2026-04-02 02:33:33', '2026-04-02 02:33:33'),
(104, 27, 15, '2026-04-02 02:33:33', '2026-04-02 02:33:33'),
(105, 27, 17, '2026-04-02 02:33:33', '2026-04-02 02:33:33'),
(106, 27, 21, '2026-04-02 02:33:33', '2026-04-02 02:33:33');

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
(1, 'vishvajit424', 'vishvajit.vish@yahoo.in', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2025-12-27 02:03:50', '2026-01-04 09:18:03'),
(12, 'employes1', 'emp1@gmail.com', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2026-01-20 23:21:36', '2026-01-20 23:21:36'),
(13, 'employes2', 'emp2@gmail.com', NULL, '$2y$12$bEMFOCAzefz53vypvJnRRuHAzzVXCv4SW4oULdSYQEwrWiVPu0aNy', NULL, '2026-01-20 23:22:35', '2026-02-16 16:11:28'),
(14, 'employes3', 'emp3@gmail.com', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2026-01-20 23:24:09', '2026-01-20 23:24:09'),
(15, 'employes4', 'emp4@gmail.com', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2026-01-20 23:25:18', '2026-01-20 23:25:18'),
(17, 'employes5', 'emp5@gmail.com', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2026-01-23 11:17:37', '2026-01-23 11:46:01'),
(21, 'employes6', 'emp6@gmail.com', NULL, '$2y$12$JcrMk/QP33XBYzIz9JOIM.SdnJxGF7PnfUT5Cc6W1sVAlxwCHsRfm', NULL, '2026-02-16 06:19:47', '2026-02-16 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `bio`, `role_id`, `department_id`, `status`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'vishvajit', 'kumar', '9988351875', 'amritsar', 'amritsar', 12, 6, '1', 'profiles/qG6cW4COTqDnzYPp2ISI4u4GvWvWyj0rFoz0fpuA.jpg', NULL, '2026-01-05 21:50:06'),
(3, 12, 'employes1', 'employee', '9988776655', NULL, NULL, 14, 7, '1', NULL, '2026-01-20 17:51:36', '2026-01-20 17:51:36'),
(4, 13, 'employes2', 'employee', '9988776655', NULL, NULL, 14, 8, '1', NULL, '2026-01-20 17:52:35', '2026-01-20 17:52:35'),
(5, 14, 'employes3', 'employes', '9988776655', NULL, NULL, 14, 9, '1', NULL, '2026-01-20 17:54:09', '2026-01-20 17:54:09'),
(6, 15, 'employes4', 'employes', '9988776655', NULL, NULL, 14, 10, '1', NULL, '2026-01-20 17:55:18', '2026-01-20 17:55:18'),
(8, 17, 'employes5', 'employee', '9988776655', NULL, NULL, 14, 11, '1', NULL, '2026-01-23 05:47:37', '2026-01-23 05:47:37'),
(9, 21, 'employes6', 'employes', '09988776655', NULL, NULL, 14, 12, '1', NULL, '2026-02-16 06:19:47', '2026-02-16 06:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `navmenu_data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `navmenu_data`, `created_at`, `updated_at`) VALUES
(12, 'Admin', '\"[\\\"Dashboard\\\",\\\"Profile\\\",\\\"Employee\\\",\\\"Roles\\\",\\\"Settings\\\"]\"', '2026-01-04 14:12:24', '2026-01-04 14:12:24'),
(13, 'Manager', '\"[\\\"Dashboard\\\",\\\"Profile\\\",\\\"Employee\\\",\\\"Roles\\\",\\\"Settings\\\"]\"', '2026-01-09 15:08:38', '2026-01-09 15:08:38'),
(14, 'Employees', '\"[\\\"Tasks\\\",\\\"Profile\\\"]\"', '2026-01-09 15:11:13', '2026-01-09 15:11:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assemblies`
--
ALTER TABLE `assemblies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assemblies_task_id_foreign` (`task_id`),
  ADD KEY `assemblies_user_id_foreign` (`user_id`);

--
-- Indexes for table `assembly_checklists`
--
ALTER TABLE `assembly_checklists`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `c_n_c_s`
--
ALTER TABLE `c_n_c_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_n_c_s_task_id_foreign` (`task_id`),
  ADD KEY `c_n_c_s_user_id_foreign` (`user_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designings`
--
ALTER TABLE `designings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designings_task_id_foreign` (`task_id`),
  ADD KEY `designings_user_id_foreign` (`user_id`),
  ADD KEY `designings_updated_by_foreign` (`updated_by`),
  ADD KEY `designings_status_index` (`status`);

--
-- Indexes for table `edge_benders`
--
ALTER TABLE `edge_benders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `edge_benders_task_id_foreign` (`task_id`),
  ADD KEY `edge_benders_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finishing_materials`
--
ALTER TABLE `finishing_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `handels`
--
ALTER TABLE `handels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installings`
--
ALTER TABLE `installings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installings_task_id_foreign` (`task_id`),
  ADD KEY `installings_user_id_foreign` (`user_id`);

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
-- Indexes for table `kitchen_colors`
--
ALTER TABLE `kitchen_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitchen_colors_design_id_foreign` (`design_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measurements_task_id_foreign` (`task_id`),
  ADD KEY `measurements_user_id_foreign` (`user_id`);

--
-- Indexes for table `measurement_images`
--
ALTER TABLE `measurement_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measurement_images_measurement_id_foreign` (`measurement_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tapes`
--
ALTER TABLE `tapes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_created_by_foreign` (`created_by`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `task_user_task_id_user_id_unique` (`task_id`,`user_id`),
  ADD KEY `task_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`),
  ADD KEY `user_details_role_id_foreign` (`role_id`),
  ADD KEY `user_details_department_id_foreign` (`department_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assemblies`
--
ALTER TABLE `assemblies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assembly_checklists`
--
ALTER TABLE `assembly_checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `c_n_c_s`
--
ALTER TABLE `c_n_c_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `designings`
--
ALTER TABLE `designings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `edge_benders`
--
ALTER TABLE `edge_benders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finishing_materials`
--
ALTER TABLE `finishing_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `handels`
--
ALTER TABLE `handels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installings`
--
ALTER TABLE `installings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kitchen_colors`
--
ALTER TABLE `kitchen_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `measurement_images`
--
ALTER TABLE `measurement_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tapes`
--
ALTER TABLE `tapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assemblies`
--
ALTER TABLE `assemblies`
  ADD CONSTRAINT `assemblies_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assemblies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `c_n_c_s`
--
ALTER TABLE `c_n_c_s`
  ADD CONSTRAINT `c_n_c_s_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `c_n_c_s_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designings`
--
ALTER TABLE `designings`
  ADD CONSTRAINT `designings_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `designings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `designings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `edge_benders`
--
ALTER TABLE `edge_benders`
  ADD CONSTRAINT `edge_benders_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `edge_benders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `installings`
--
ALTER TABLE `installings`
  ADD CONSTRAINT `installings_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `installings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kitchen_colors`
--
ALTER TABLE `kitchen_colors`
  ADD CONSTRAINT `kitchen_colors_design_id_foreign` FOREIGN KEY (`design_id`) REFERENCES `designings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `measurements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `measurement_images`
--
ALTER TABLE `measurement_images`
  ADD CONSTRAINT `measurement_images_measurement_id_foreign` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `task_user_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_details_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
