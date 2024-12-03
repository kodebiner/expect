-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 08:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expect`
--

--
-- Truncate table before insert `gallery`
--

TRUNCATE TABLE `gallery`;
--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dummy-1.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(2, 'dummy-2.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(3, 'dummy-3.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(4, 'dummy-4.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(5, 'dummy-5.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(6, 'dummy-6.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(7, 'dummy-7.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL),
(8, 'dummy-8.jpg', '2024-12-03 08:33:39', '2024-12-03 08:33:39', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
