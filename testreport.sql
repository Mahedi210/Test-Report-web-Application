-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2021 at 07:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `order_number`, `status`, `created_at`, `updated_at`) VALUES
(45, 'category1', 1, 1, '2021-09-22 04:23:20', '2021-09-22 04:23:20'),
(46, 'category2', 2, 1, '2021-09-22 04:23:31', '2021-09-22 04:23:31'),
(47, 'Category-3', 3, 1, '2021-09-22 05:48:52', '2021-09-22 05:48:52'),
(48, 'category4', 4, 1, '2021-10-04 06:29:05', '2021-10-04 06:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `category_tests`
--

CREATE TABLE `category_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_tests`
--

INSERT INTO `category_tests` (`id`, `category_id`, `test_id`, `status`, `created_at`, `updated_at`) VALUES
(139, 46, 20, 1, NULL, NULL),
(140, 45, 20, 1, NULL, NULL),
(141, 45, 19, 1, NULL, NULL),
(142, 46, 19, 1, NULL, NULL),
(144, 47, 19, 1, NULL, NULL),
(145, 47, 20, 1, NULL, NULL),
(148, 47, 23, 1, NULL, NULL),
(149, 50, 19, 1, NULL, NULL),
(151, 50, 23, 1, NULL, NULL),
(153, 50, 20, 1, NULL, NULL),
(154, 45, 21, 1, NULL, NULL),
(155, 45, 22, 1, NULL, NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_24_094923_create_categories_table', 2),
(5, '2021_08_25_042940_create_tests_table', 3),
(6, '2021_08_25_061107_create_cats_table', 4),
(7, '2021_08_26_031920_create_category_tests_table', 5),
(8, '2021_09_02_064800_create_students_table', 6),
(9, '2021_09_03_101841_create_teachers_table', 7),
(10, '2021_09_03_104215_create_teachers_table', 8),
(11, '2021_09_05_065452_create_test_results_table', 9),
(12, '2021_09_07_081213_create_test_results_table', 10),
(13, '2021_09_07_102651_create_testresults_table', 11),
(14, '2021_09_07_112333_create_test_results_table', 12),
(15, '2021_09_12_155048_create_tasks_table', 13),
(16, '2021_09_16_090108_create_test_results_table', 14),
(17, '2021_09_16_090235_create_test_result_details_table', 14),
(18, '2021_09_19_154502_create_test_result1s_table', 15),
(19, '2021_09_19_154622_create_testresult_detail1s_table', 15);

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
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`, `created_at`, `updated_at`) VALUES
(1, 'mahedi', 'mahedi@gmail.com', '01753160954', 'csw', '2021-10-26 04:54:59', '2021-10-26 04:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `email`, `phone`, `course`, `created_at`, `updated_at`) VALUES
(1, 'mahedi', 'ma@gmail.com', '099', 'yu', '2021-09-12 22:19:21', '2021-09-12 22:19:21'),
(2, 'm', 'l@gmail.com', '01744', '1234', '2021-09-17 05:50:09', '2021-09-17 05:50:09'),
(3, 'karim', 'ra@gmail.com', '09', 'er', '2021-09-17 06:46:33', '2021-09-17 06:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `order_number`, `created_at`, `updated_at`) VALUES
(19, 'test1', 1, '2021-09-22 04:23:54', '2021-09-22 04:23:54'),
(20, 'test2', 2, '2021-09-22 04:24:04', '2021-09-22 04:24:04'),
(21, 'test3', 3, '2021-09-22 05:49:11', '2021-09-22 05:49:11'),
(22, 'test4', 4, '2021-09-22 05:49:27', '2021-09-22 05:49:27'),
(23, 'Test Object', 787, '2021-10-21 05:02:50', '2021-10-21 05:02:50'),
(24, 'Test Object new', 34, '2021-10-25 23:14:31', '2021-10-25 23:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `category_id`, `title`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, '45', 'Title1', '2021-10-04 12:30:29', 1, '2021-10-04 06:30:29', '2021-10-04 06:30:29'),
(2, '45', 'Title1', '2021-10-04 12:31:46', 1, '2021-10-04 06:31:46', '2021-10-04 06:31:46'),
(3, '45', 'Title1', '2021-10-04 12:32:50', 1, '2021-10-04 06:32:50', '2021-10-04 06:32:50'),
(4, '45', 'Title1', '2021-10-04 12:33:12', 1, '2021-10-04 06:33:12', '2021-10-04 06:33:12'),
(5, '46', 'Title2', '2021-10-04 12:34:10', 1, '2021-10-04 06:34:10', '2021-10-04 06:34:10'),
(6, '46', 'Title2', '2021-10-04 12:34:49', 1, '2021-10-04 06:34:49', '2021-10-04 06:34:49'),
(7, '46', 'Title2', '2021-10-04 12:35:25', 1, '2021-10-04 06:35:25', '2021-10-04 06:35:25'),
(8, '46', 'Title2', '2021-10-04 12:35:47', 1, '2021-10-04 06:35:47', '2021-10-04 06:35:47'),
(9, '50', 'Arif', '2021-10-24 11:41:42', 1, '2021-10-24 05:41:42', '2021-10-24 05:41:42'),
(10, '47', 'rt', '2021-10-25 13:02:07', 1, '2021-10-25 07:02:07', '2021-10-25 07:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `test_result_details`
--

CREATE TABLE `test_result_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_result_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `results` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_result_details`
--

INSERT INTO `test_result_details` (`id`, `test_result_id`, `category_id`, `test_id`, `results`, `remarks`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '45', '20', '34', 'good', '2021-10-01', 1, '2021-10-04 06:30:30', '2021-10-04 06:30:30'),
(2, '1', '45', '19', '67', 'good', '2021-10-01', 1, '2021-10-04 06:30:30', '2021-10-04 06:30:30'),
(3, '2', '45', '20', '55', 'good', '2021-10-02', 1, '2021-10-04 06:31:46', '2021-10-04 06:31:46'),
(4, '2', '45', '19', '67', 'good', '2021-10-02', 1, '2021-10-04 06:31:46', '2021-10-04 06:31:46'),
(5, '3', '45', '20', '90', 'good', '2021-10-03', 1, '2021-10-04 06:32:50', '2021-10-04 06:32:50'),
(6, '3', '45', '19', '27', 'good', '2021-10-03', 1, '2021-10-04 06:32:50', '2021-10-04 06:32:50'),
(7, '4', '45', '20', '125', 'good', '2021-10-04', 1, '2021-10-04 06:33:12', '2021-10-04 06:33:12'),
(8, '4', '45', '19', '250', 'good', '2021-10-04', 1, '2021-10-04 06:33:12', '2021-10-04 06:33:12'),
(9, '5', '46', '20', '10', 'good', '2021-10-01', 1, '2021-10-04 06:34:10', '2021-10-04 06:34:10'),
(10, '5', '46', '19', '100', 'good', '2021-10-01', 1, '2021-10-04 06:34:10', '2021-10-04 06:34:10'),
(11, '5', '46', '21', '50', 'good', '2021-10-01', 1, '2021-10-04 06:34:10', '2021-10-04 06:34:10'),
(12, '6', '46', '20', '40', 'good', '2021-10-02', 1, '2021-10-04 06:34:49', '2021-10-04 06:34:49'),
(13, '6', '46', '19', '70', 'good', '2021-10-02', 1, '2021-10-04 06:34:49', '2021-10-04 06:34:49'),
(14, '6', '46', '21', '20', 'good', '2021-10-02', 1, '2021-10-04 06:34:49', '2021-10-04 06:34:49'),
(15, '7', '46', '20', '70', 'good', '2021-10-03', 1, '2021-10-04 06:35:25', '2021-10-04 06:35:25'),
(16, '7', '46', '19', '30', 'good', '2021-10-03', 1, '2021-10-04 06:35:25', '2021-10-04 06:35:25'),
(17, '7', '46', '21', '90', 'good', '2021-10-03', 1, '2021-10-04 06:35:25', '2021-10-04 06:35:25'),
(18, '8', '46', '20', '100', 'good', '2021-10-04', 1, '2021-10-04 06:35:47', '2021-10-04 06:35:47'),
(19, '8', '46', '19', '100', 'good', '2021-10-04', 1, '2021-10-04 06:35:47', '2021-10-04 06:35:47'),
(20, '8', '46', '21', '100', 'good', '2021-10-04', 1, '2021-10-04 06:35:47', '2021-10-04 06:35:47'),
(21, '9', '50', '19', '4.5', 'good', '2021-10-05', 1, '2021-10-24 05:41:42', '2021-10-24 05:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mahedi', 'admin@gmail.com', NULL, '$2y$10$4moR8CKFPBA3hMcQBaIkmegAmqWe8bG6jGdhCbsRIHC3FvUqRSKxO', 'qb9eP5xR5TpGATIOBf2ZFdwujBTpfEX8HY4gZFr9whZVGuYoDvdFaj6utOo0', '2021-08-23 22:52:13', '2021-08-23 22:52:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_order_number_unique` (`order_number`);

--
-- Indexes for table `category_tests`
--
ALTER TABLE `category_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_order_number_unique` (`order_number`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_result_details`
--
ALTER TABLE `test_result_details`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `category_tests`
--
ALTER TABLE `category_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_result_details`
--
ALTER TABLE `test_result_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
