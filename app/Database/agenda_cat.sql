-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 05:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Dumping data for table `agenda_cat`
--

INSERT INTO `agenda_cat` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banking & Insurance', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(2, 'Technical Engineering', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(3, 'Health, Safety & Security', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(4, 'Electrical, Instrument & Telecomunication', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(5, 'Human Resources', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(6, 'Financial, Budgeting, Tax, Law & Legal', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(7, 'Logistic, Supplychain, Purchasing, Procurement & Transportation', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(8, 'Soft Skills', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(9, 'Information & Technology', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00'),
(10, 'Sertifikasi BNSP', '2024-11-18 03:27:45', '2024-11-18 03:27:45', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
