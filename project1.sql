-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 05:16 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `image`, `author`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Myles Browning', 'images/161467837486800278_3216767735018992_1228642001373626368_n.jpg', 'Quis laboriosam dol', 'Aliquid ullam id in', '2021-03-02 04:01:14', '2021-03-02 04:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Nicole Elliott', 'nicole-elliott', '2021-02-26 00:16:19', '2021-02-26 00:16:19'),
(3, 'Kaye Bruce', 'kaye-bruce', '2021-02-26 00:16:34', '2021-02-26 00:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `neg_status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` enum('brand_new','used','old') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'brand_new',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cc` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `image`, `brand_id`, `price`, `neg_status`, `condition`, `year`, `model`, `km`, `color`, `cc`, `created_at`, `updated_at`) VALUES
(2, 'Judah Gordon', 'images/16143621111.jpg', 3, 964, 89, 'used', '2000', 'Eum excepturi eos v', 4, 'Ducimus ipsam offic', 92, '2021-02-26 00:31:47', '2021-02-26 12:10:11'),
(3, 'Henry Castro', 'images/161433019810.jpg', 1, 2, 37, 'used', '1988', 'Aliqua Reprehenderi', 20, 'Aut ipsum cillum mi', 74, '2021-02-26 00:40:29', '2021-02-26 03:18:18'),
(4, 'Stuart Farrell', 'images/16143210971.jpg', 3, 200, 20, 'used', '1986gds', 'Consectetur exceptur', 84, 'Dolores in vitae dol', 41, '2021-02-26 00:46:37', '2021-02-26 04:32:08'),
(5, 'Rosalyn Snider', 'images/16144910577.jpg', 3, 315, 28, 'brand_new', '2015', 'Irure eveniet id bl', 36, 'Qui esse non enim of', 99, '2021-02-27 23:59:17', '2021-02-27 23:59:17'),
(6, 'Vernon Lang', 'images/161468134883996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:50:48', '2021-03-02 04:50:48'),
(7, 'Vernon Lang', 'images/161468138983996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:51:29', '2021-03-02 04:51:29'),
(8, 'Vernon Lang', 'images/161468148283996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:53:02', '2021-03-02 04:53:02'),
(10, 'Vernon Lang', 'images/161468151883996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:53:38', '2021-03-02 04:53:38'),
(11, 'Vernon Lang', 'images/161468152783996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:53:47', '2021-03-02 04:53:47'),
(12, 'Vernon Lang', 'images/161468153883996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:53:58', '2021-03-02 04:53:58'),
(13, 'Vernon Lang', 'images/161468155083996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:54:10', '2021-03-02 04:54:10'),
(14, 'Vernon Lang', 'images/161468156583996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:54:25', '2021-03-02 04:54:25'),
(15, 'Vernon Lang', 'images/161468160283996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:55:02', '2021-03-02 04:55:02'),
(16, 'Vernon Lang', 'images/161468162183996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:55:21', '2021-03-02 04:55:21'),
(17, 'Vernon Lang', 'images/161468163183996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:55:31', '2021-03-02 04:55:31'),
(18, 'Vernon Lang', 'images/161468166883996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:56:08', '2021-03-02 04:56:08'),
(19, 'Vernon Lang', 'images/161468168583996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:56:25', '2021-03-02 04:56:25'),
(20, 'Vernon Lang', 'images/161468172583996537_2350299358595145_6076061908341882880_n.jpg', 1, 914, 10, 'used', '2010', 'Nesciunt incidunt', 75, 'Adipisci elit magna', 16, '2021-03-02 04:57:05', '2021-03-02 04:57:05'),
(21, 'Rahim Dennis', 'images/161468175983996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 04:57:39', '2021-03-02 04:57:39'),
(22, 'Rahim Dennis', 'images/161468179983996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 04:58:19', '2021-03-02 04:58:19'),
(23, 'Rahim Dennis', 'images/161468184083996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 04:59:00', '2021-03-02 04:59:00'),
(24, 'Rahim Dennis', 'images/161468184683996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 04:59:06', '2021-03-02 04:59:06'),
(25, 'Rahim Dennis', 'images/161468189483996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 04:59:54', '2021-03-02 04:59:54'),
(26, 'Rahim Dennis', 'images/161468190783996537_2350299358595145_6076061908341882880_n.jpg', 1, 904, 36, 'used', '2019', 'Ut aut earum eaque p', 29, 'Ut consequatur venia', 68, '2021-03-02 05:00:07', '2021-03-02 05:00:07'),
(27, 'Upton Whitfield', 'images/161468196383996537_2350299358595145_6076061908341882880_n.jpg', 3, 887, 45, 'used', '1986', 'Possimus dolor dolo', 26, 'Suscipit repellendus', 24, '2021-03-02 05:01:03', '2021-03-02 05:01:03'),
(28, 'Sebastian Edwards', 'images/161468202583996537_2350299358595145_6076061908341882880_n.jpg', 3, 390, 52, 'used', '1991', 'Dolorem id autem cu', 74, 'Quasi doloribus qui', 50, '2021-03-02 05:02:05', '2021-03-02 05:02:05'),
(29, 'Sebastian Edwards', 'images/161468203583996537_2350299358595145_6076061908341882880_n.jpg', 3, 390, 52, 'used', '1991', 'Dolorem id autem cu', 74, 'Quasi doloribus qui', 50, '2021-03-02 05:02:15', '2021-03-02 05:02:15'),
(30, 'Charity Hawkins', 'images/161468208583996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:03:05', '2021-03-02 05:03:05'),
(31, 'Charity Hawkins', 'images/161468210383996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:03:23', '2021-03-02 05:03:23'),
(32, 'Charity Hawkins', 'images/161468213483996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:03:54', '2021-03-02 05:03:54'),
(33, 'Charity Hawkins', 'images/161468220083996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:05:00', '2021-03-02 05:05:00'),
(34, 'Charity Hawkins', 'images/161468220283996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:05:02', '2021-03-02 05:05:02'),
(35, 'Charity Hawkins', 'images/161468220783996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:05:07', '2021-03-02 05:05:07'),
(36, 'Charity Hawkins', 'images/161468221883996537_2350299358595145_6076061908341882880_n.jpg', 3, 172, 35, 'used', '1997', 'Sunt aliquam eos qui', 15, 'Error suscipit modi', 100, '2021-03-02 05:05:18', '2021-03-02 05:05:18'),
(37, 'Cameron Mcdowell', 'images/161468240383996537_2350299358595145_6076061908341882880_n.jpg', 3, 350, 13, 'used', '1979', 'Nesciunt suscipit f', 24, 'Quia est sed veniam', 4, '2021-03-02 05:08:23', '2021-03-02 05:08:23'),
(38, 'Meredith Drake', 'images/161468274683996537_2350299358595145_6076061908341882880_n.jpg', 3, 912, 48, 'brand_new', '1970', 'Nesciunt voluptatum', 47, 'Reprehenderit sint', 63, '2021-03-02 05:14:06', '2021-03-02 05:14:06'),
(39, 'Wade Le', 'images/161468307086800278_3216767735018992_1228642001373626368_n.jpg', 1, 995, 48, 'used', '1978', 'Maiores at ipsa dol', 86, 'Impedit qui soluta', 66, '2021-03-02 05:19:30', '2021-03-02 05:19:30');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Do rerum quibusdam q', 'Minim et in repudian', '2021-03-01 00:08:33', '2021-03-01 00:36:06'),
(3, 'Labore ut quis et au', 'Perferendis sint lab', '2021-03-01 00:53:12', '2021-03-01 00:53:12');

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
(4, '2021_01_24_051803_create_brands_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2019_08_19_000000_create_failed_jobs_table', 2),
(8, '2021_01_24_051124_create_cars_table', 3),
(9, '2021_01_24_052840_create_roles_table', 3),
(10, '2021_02_28_094119_create_faqs_table', 4),
(14, '2021_03_01_064357_create_teams_table', 5),
(15, '2021_03_01_094248_create_testomonials_table', 6),
(16, '2021_03_02_091835_create_blogs_table', 7),
(18, '2021_03_02_102707_create_specifications_table', 8);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user', '2021-03-04 07:47:43', '2021-03-04 07:47:43'),
(2, 'Admin', 'admin', '2021-03-04 07:47:52', '2021-03-04 07:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `specifications` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specifications`
--

INSERT INTO `specifications` (`id`, `car_id`, `specifications`, `title`, `created_at`, `updated_at`) VALUES
(1, 38, 'a:2:{i:0;s:25:\"Power:101kW @2850-6000rpm\";i:1;s:27:\" Torque:295Nm @1000-2850rpm\";}', 'Engine and Transmission', '2021-03-02 05:14:06', '2021-03-02 05:14:06'),
(2, 39, 'a:2:{i:0;s:25:\"Power:101kW @2850-6000rpm\";i:1;s:27:\"Torque:2750Nm @1000-3000rpm\";}', 'Engine and Transmission', '2021-03-02 05:19:30', '2021-03-02 23:55:54'),
(3, 39, 'a:2:{i:0;s:25:\"Top Speed (Km/h):165km/h \";i:1;s:26:\"Mileage (ARAI kmpl):3511km\";}', 'Performance and Fuel Economy', '2021-03-02 05:19:30', '2021-03-02 23:55:54');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `designation`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Et incidunt et fugi', 'Reese Phillips', 'images/1614593150149543546_1277492549300687_3211511223373462808_o.jpg', 'Necessitatibus error', '2021-03-01 03:24:16', '2021-03-01 04:20:50'),
(2, 'Rem qui quia debitis', 'Xena Mercer', 'images/1614593291136815059_10157610763961604_7392263305591185998_o.jpg', 'Excepturi qui culpa', '2021-03-01 03:34:53', '2021-03-01 04:23:11'),
(3, 'Quod dolore fugiat', 'Edan Merrill', 'images/1614591679152404019_270140631145327_1711703147631121578_n.jpg', 'Voluptatem velit qua', '2021-03-01 03:56:19', '2021-03-01 03:56:19'),
(4, 'Qui sunt quibusdam e', 'Thaddeus Lindsay', 'images/1614592572148852961_3482743088616619_3035673410808964023_o.jpg', 'Labore qui ut libero', '2021-03-01 04:11:12', '2021-03-01 04:11:12');

-- --------------------------------------------------------

--
-- Table structure for table `testomonials`
--

CREATE TABLE `testomonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testomonials`
--

INSERT INTO `testomonials` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Leo Wilkinson', 'images/1614593542148309063_110597667711574_3755361939595352112_o.jpg', 'Aut rem et voluptatesdadas', '2021-03-01 04:27:22', '2021-03-01 05:19:19'),
(2, 'Raphael Summers', 'images/1614597357IMG_0748.JPG', 'Qui sit est impedi', '2021-03-01 05:30:57', '2021-03-01 05:30:57');

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
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$pdWXa94TcosEvsAu631zi.V.EzDOWdnL6aWN6Ud8Fyhwe.A/1wZAu', 2, NULL, '2021-02-27 23:51:54', '2021-02-27 23:51:54'),
(2, 'sujab', 'ssujab9@gmail.com', NULL, '$2y$10$2VsIvWn6w9Xu8K.gx2G/OOjSZOP8ymMmsAw2XaG0nGNhKkxdHgg5.', 1, NULL, '2021-03-04 08:12:29', '2021-03-04 08:12:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specifications_car_id_foreign` (`car_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testomonials`
--
ALTER TABLE `testomonials`
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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testomonials`
--
ALTER TABLE `testomonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `specifications_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
