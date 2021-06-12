-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2021 at 03:07 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveladmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_06_06_133616_visitor_table', 1),
(2, '2021_06_06_133648_usermanager_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_manager`
--

DROP TABLE IF EXISTS `user_manager`;
CREATE TABLE IF NOT EXISTS `user_manager` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edit_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_manager`
--

INSERT INTO `user_manager` (`id`, `user_id`, `password`, `name`, `designation`, `email`, `status`, `create_by`, `create_date`, `edit_by`, `edit_date`) VALUES
(3, '22169', '$2y$10$f307ArcV5WbZ/FYu.4GUPeA53yESk2.6byqpuDA14n05TDEEIbbLC', 'Zamil', 'ITA', 'test@test.com', 'Y', NULL, '2021-06-06 23:41:18', NULL, '2021-06-11 14:27:52'),
(4, 'zamil', '$2y$10$84xFYhTcNMJMUkG06YYW7e26yMBUmB.3lXBcjITSQnUPeVGa3FSk.', '1212', 'kjashkj', 'test@test.com', 'Y', NULL, '2021-06-06 23:51:31', NULL, '2021-06-12 03:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
CREATE TABLE IF NOT EXISTS `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_time`) VALUES
(1, '127.0.0.1', '2021-06-06 07:38:30pm'),
(2, '127.0.0.1', '2021-06-07 12:16:36am'),
(3, '127.0.0.1', '2021-06-07 12:19:31am'),
(4, '127.0.0.1', '2021-06-07 11:02:41pm'),
(5, '127.0.0.1', '2021-06-10 08:16:44pm'),
(6, '127.0.0.1', '2021-06-10 08:17:16pm'),
(7, '127.0.0.1', '2021-06-10 11:08:00pm'),
(8, '127.0.0.1', '2021-06-10 11:19:59pm'),
(9, '127.0.0.1', '2021-06-11 09:14:16am'),
(10, '127.0.0.1', '2021-06-11 09:45:22am'),
(11, '127.0.0.1', '2021-06-11 06:43:58pm'),
(12, '127.0.0.1', '2021-06-11 08:01:52pm'),
(13, '127.0.0.1', '2021-06-11 08:19:33pm'),
(14, '127.0.0.1', '2021-06-11 08:20:45pm'),
(15, '127.0.0.1', '2021-06-11 08:28:17pm'),
(16, '127.0.0.1', '2021-06-11 09:35:06pm'),
(17, '127.0.0.1', '2021-06-11 09:35:28pm'),
(18, '127.0.0.1', '2021-06-11 09:39:13pm'),
(19, '127.0.0.1', '2021-06-11 09:40:29pm'),
(20, '127.0.0.1', '2021-06-12 09:26:47am'),
(21, '127.0.0.1', '2021-06-12 10:21:35am'),
(22, '127.0.0.1', '2021-06-12 10:21:56am'),
(23, '127.0.0.1', '2021-06-12 10:22:14am'),
(24, '127.0.0.1', '2021-06-12 10:22:29am'),
(25, '127.0.0.1', '2021-06-12 10:54:49am'),
(26, '127.0.0.1', '2021-06-12 10:57:31am'),
(27, '127.0.0.1', '2021-06-12 08:13:27pm'),
(28, '127.0.0.1', '2021-06-12 08:22:21pm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
