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
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `cat_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Administrasi dan Legal Treasury untuk Perbankan', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(2, 1, 'Administrasi Kredit Sindikasi Dan Aspek Hukumnya', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(3, 1, 'Advanced Finance Management & Accounting', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(4, 1, 'Akuntansi Dalam Penyusutan Laporan Keuangan', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(5, 1, 'Akuntansi Perpajakan', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(6, 1, 'Analisa Kelayakan Kredit Investsai dan Refinancing', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(7, 1, 'Analisa Laporan Keuangan, Teknik Penilaian Agunan dan Strategi pembiayaan UMKM', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(8, 1, 'Analisa Pemberian dan Penanganan Kredit UMKM Bermasalah', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(9, 1, 'Analisa Proyeksi Keuangan dan Cash Flow', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00'),
(10, 1, 'Analisa Laporan Keuangan', '2024-11-18 03:34:51', '2024-11-18 03:34:51', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
