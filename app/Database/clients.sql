-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 09:59 AM
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
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Asahimas Chemical', 'asahimas-chemical.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(2, 'Asahimas Flat Glass', 'asahimas-flat-glass.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(3, 'Bank Bengkulu', 'bank-bengkulu.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(4, 'Bank Jatim', 'bank-jatim.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(5, 'Bank Kalteng', 'bank-kalteng.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(6, 'Bank Papua', 'bank-papua.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(7, 'Bosowa', 'bosowa.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(8, 'BRI', 'bri.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(9, 'Bumi Siak Pusako', 'bumi-siak-pusako.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(10, 'Cirebon Power', 'cirebon-power.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(11, 'Dua Kelinci', 'dua-kelinci.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(12, 'Inalum', 'inalum.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(13, 'Kaltim Data Mandiri', 'kaltim-data-mandiri.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(14, 'Kangean Energy Indonesia', 'kangean-energy-indonesia.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(15, 'Pelayaran Tonas Lines', 'pelayaran-tonas-lines.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(16, 'PELINDO', 'pelindo.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(17, 'PERTAMINA', 'pertamina.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(18, 'pindad', 'pindad.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(19, 'PLN', 'pln.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(20, 'PLN Indonesia Power', 'pln-indonesia-power.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(21, 'PU', 'pu.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(22, 'Pupuk Kaltim', 'pupuk-kaltim.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(23, 'Putra Perkasa Abadi', 'putra-perkasa-abadi.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(24, 'Semen Padang', 'semen-padang.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(25, 'Semen Tonasa', 'semen-tonasa.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(26, 'SKKMIGAS', 'skkmigas.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(27, 'Transgasindo', 'transgasindo.png', '2024-11-14 09:36:50', '2024-11-14 09:36:50', '0000-00-00 00:00:00'),
(28, 'Musim Mas', 'musim-mas.png', '2024-11-14 09:56:31', '2024-11-14 09:56:31', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
