-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2023 at 01:53 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Research Group Manager'),
(2, 'Research Study Manager'),
(3, 'Researcher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(5, 'rgm', '$2y$10$zQ1C.OsGlfrr.P2MZ5BImOcUH0WdRGNLdGFSX6wpa8/JefhWZeyXC', 'rgm@gmail.com', 'Research Group Manager'),
(6, 'rsm', '$2y$10$7/VnD162fViYeg6GVfNu8eJpUxdqVaWhup6b4vNfiSuCqxUN0Ma7i', 'rsm@gmail.com', 'Research Study Manager'),
(7, 'sy', '$2y$10$MJtwCZ1/iD2EF17yRqakP.sHYUjHdewvCDMHvMWUHSPQfgE4yARDq', 'sy@gmail.com', 'Researcher'),
(21, 'Hillary', '$2y$10$NVqjNQsx8MrPQ/Ys91EUR.WvQD7dP/Mvsbi5qae54uaAI4OrtU4bG', 'hillary@gmail.com', 'Research Group Manager'),
(22, 'Frankie', '$2y$10$BeXLbD2P2V9lVtHDHC2krOrL05R1eOntDROkM0oAh9QeNhONGw3YC', 'FRoll@outlook.com', 'Research Group Manager'),
(23, 'Jessica', '$2y$10$rjHOwivwkPSAjna.9sDXjewQRAEYMOIIRbTp4CsN5cHxLUM1SIPzi', 'jess@gmail.com', 'Research Study Manager'),
(24, 'Bishop', '$2y$10$L94de/VBEyGU/zkCj6sB5OF2uYdnN5Ywa2PNR.wENrugokhoY4pA6', 'bman@gmail.com', 'Researcher'),
(25, 'Mateo', '$2y$10$VG3jMBly2lJcqI2e3jMJ0.vX.gI0ujxsE6BnOEUz1ggzgaM.nogMm', 'matt@gmail.com', 'Research Group Manager'),
(26, 'Lilly', '$2y$10$l7jHPJbY9dQ//eK3Gfqp1eklbcvirprqf5zCOPyFNksAHycstBiBy', 'lilly@gmail.com', 'Research Group Manager'),
(27, 'Phillip', '$2y$10$E20fxtExoZIw/wwx48kE6eqw8CThhiuNe0oA6qEO60yhuNsjCRoMG', 'Phillip@gmail.com', 'Researcher'),
(28, 'Loopy', '$2y$10$BuORHD//5JXTcpcB3f04BOzAucLyNcvIsWnb9yo0Y8GG10aC5Dt.u', 'L@gmail.com', 'Research Study Manager'),
(19, 'Tyreese', '$2y$10$MwzTobN07sc4q3kSKmIwVOFzeNdFDw/GTEPzX6ptRR4pbdm/GDuFm', 'Ty@gmail.com', 'Researcher');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_levels`
--

DROP TABLE IF EXISTS `user_access_levels`;
CREATE TABLE IF NOT EXISTS `user_access_levels` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `access_level` enum('Research Group Manager','Research Study Manager','Researcher') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_access_levels`
--

INSERT INTO `user_access_levels` (`id`, `email`, `access_level`) VALUES
(27, 'Phillip@gmail.com', 'Researcher'),
(28, 'L@gmail.com', 'Research Study Manager');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
