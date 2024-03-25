-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 06:38 AM
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
-- Database: `furniche`
--

-- --------------------------------------------------------

--
-- Table structure for table `basketproducts`
--

CREATE TABLE `basketproducts` (
  `basketId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basketproducts`
--

INSERT INTO `basketproducts` (`basketId`, `productId`, `quantity`) VALUES
(1, 4, 4),
(1, 5, 3),
(1, 2, 1),
(63, 3, 1),
(64, 2, 1),
(65, 1, 1),
(66, 3, 1),
(67, 1, 1),
(68, 1, 1),
(69, 3, 1),
(70, 4, 1),
(71, 2, 1),
(149, 1, 2),
(149, 3, 1),
(149, 5, 3),
(150, 2, 1),
(150, 4, 2),
(150, 6, 1),
(151, 1, 3),
(151, 3, 2),
(151, 4, 1),
(152, 2, 2),
(152, 3, 1),
(152, 5, 3),
(153, 1, 1),
(153, 4, 2),
(153, 6, 2),
(154, 2, 3),
(154, 3, 1),
(154, 5, 1),
(155, 1, 2),
(155, 4, 2),
(155, 6, 1),
(156, 2, 1),
(156, 3, 1),
(156, 5, 3),
(157, 1, 1),
(157, 3, 2),
(157, 4, 1),
(158, 2, 2),
(158, 4, 3),
(158, 6, 1),
(159, 1, 3),
(159, 3, 1),
(159, 5, 2),
(160, 2, 1),
(160, 3, 2),
(160, 4, 2),
(161, 1, 2),
(161, 3, 1),
(161, 5, 3),
(162, 2, 1),
(162, 4, 2),
(162, 6, 1),
(163, 1, 3),
(163, 3, 2),
(163, 4, 1),
(164, 2, 2),
(164, 3, 1),
(164, 5, 3),
(165, 1, 1),
(165, 4, 2),
(165, 6, 2),
(166, 2, 3),
(166, 3, 1),
(166, 5, 1),
(167, 1, 2),
(167, 4, 2),
(167, 6, 1),
(168, 2, 1),
(168, 3, 1),
(168, 5, 3),
(169, 1, 1),
(169, 3, 2),
(169, 4, 1),
(170, 2, 2),
(170, 4, 3),
(170, 6, 1),
(171, 1, 3),
(171, 3, 1),
(171, 5, 2),
(172, 2, 1),
(172, 3, 2),
(172, 4, 2),
(173, 1, 2),
(173, 3, 1),
(173, 5, 3),
(174, 2, 1),
(174, 4, 2),
(174, 6, 1),
(175, 1, 3),
(175, 3, 2),
(175, 4, 1),
(176, 2, 2),
(176, 3, 1),
(176, 5, 3),
(177, 1, 1),
(177, 4, 2),
(177, 6, 2),
(178, 2, 3),
(178, 3, 1),
(178, 5, 1),
(179, 1, 2),
(179, 4, 2),
(179, 6, 1),
(180, 2, 1),
(180, 3, 1),
(180, 5, 3),
(181, 1, 1),
(181, 3, 2),
(181, 4, 1),
(182, 2, 2),
(182, 4, 3),
(182, 6, 1),
(183, 1, 3),
(183, 3, 1),
(183, 5, 2),
(184, 2, 1),
(184, 3, 2),
(184, 4, 2),
(185, 1, 2),
(185, 3, 1),
(185, 5, 3),
(186, 2, 1),
(186, 4, 2),
(186, 6, 1),
(187, 1, 3),
(187, 3, 2),
(187, 4, 1),
(188, 2, 2),
(188, 3, 1),
(188, 5, 3),
(189, 1, 1),
(189, 4, 2),
(189, 6, 2),
(190, 2, 3),
(190, 3, 1),
(190, 5, 1),
(191, 1, 2),
(191, 4, 2),
(191, 6, 1),
(192, 2, 1),
(192, 3, 1),
(192, 5, 3),
(193, 1, 1),
(193, 3, 2),
(193, 4, 1),
(194, 2, 2),
(194, 4, 3),
(194, 6, 1),
(195, 1, 3),
(195, 3, 1),
(195, 5, 2),
(196, 2, 1),
(196, 3, 2),
(196, 4, 2),
(2, 1, 2),
(2, 3, 1),
(2, 5, 3),
(3, 2, 1),
(3, 4, 2),
(3, 6, 1),
(4, 1, 3),
(4, 3, 2),
(4, 4, 1),
(5, 2, 2),
(5, 3, 1),
(5, 5, 3),
(6, 1, 1),
(6, 4, 2),
(6, 6, 2),
(7, 2, 3),
(7, 3, 1),
(7, 5, 1),
(8, 1, 2),
(8, 4, 2),
(8, 6, 1),
(9, 2, 1),
(9, 3, 1),
(9, 5, 3),
(10, 1, 1),
(10, 3, 2),
(10, 4, 1),
(11, 2, 2),
(11, 4, 3),
(11, 6, 1),
(12, 1, 3),
(12, 3, 1),
(12, 5, 2),
(13, 2, 1),
(13, 3, 2),
(13, 4, 2),
(14, 1, 2),
(14, 3, 1),
(14, 5, 3),
(15, 2, 1),
(15, 4, 2),
(15, 6, 1),
(16, 1, 3),
(16, 3, 2),
(16, 4, 1),
(17, 2, 2),
(17, 3, 1),
(17, 5, 3),
(18, 1, 1),
(18, 4, 2),
(18, 6, 2),
(19, 2, 3),
(19, 3, 1),
(19, 5, 1),
(20, 1, 2),
(20, 4, 2),
(20, 6, 1),
(21, 2, 1),
(21, 3, 1),
(21, 5, 3),
(22, 1, 1),
(22, 3, 2),
(22, 4, 1),
(23, 2, 2),
(23, 4, 3),
(23, 6, 1),
(24, 1, 3),
(24, 3, 1),
(24, 5, 2),
(25, 2, 1),
(25, 3, 2),
(25, 4, 2),
(26, 1, 2),
(26, 3, 1),
(26, 5, 3),
(27, 2, 1),
(27, 4, 2),
(27, 6, 1),
(28, 1, 3),
(28, 3, 2),
(28, 4, 1),
(29, 2, 2),
(29, 3, 1),
(29, 5, 3),
(30, 1, 1),
(30, 4, 2),
(30, 6, 2),
(31, 2, 3),
(31, 3, 1),
(31, 5, 1),
(32, 1, 2),
(32, 4, 2),
(32, 6, 1),
(33, 2, 1),
(33, 3, 1),
(33, 5, 3),
(34, 1, 1),
(34, 3, 2),
(34, 4, 1),
(35, 2, 2),
(35, 4, 3),
(35, 6, 1),
(36, 1, 3),
(36, 3, 1),
(36, 5, 2),
(37, 2, 1),
(37, 3, 2),
(37, 4, 2),
(2, 1, 2),
(2, 3, 1),
(2, 5, 3),
(3, 2, 1),
(3, 4, 2),
(3, 6, 1),
(4, 1, 3),
(4, 3, 2),
(4, 4, 1),
(5, 2, 2),
(5, 3, 1),
(5, 5, 3),
(6, 1, 1),
(6, 4, 2),
(6, 6, 2),
(7, 2, 3),
(7, 3, 1),
(7, 5, 1),
(8, 1, 2),
(8, 4, 2),
(8, 6, 1),
(9, 2, 1),
(9, 3, 1),
(9, 5, 3),
(10, 1, 1),
(10, 3, 2),
(10, 4, 1),
(11, 2, 2),
(11, 4, 3),
(11, 6, 1),
(12, 1, 3),
(12, 3, 1),
(12, 5, 2),
(13, 2, 1),
(13, 3, 2),
(13, 4, 2),
(14, 1, 2),
(14, 3, 1),
(14, 5, 3),
(15, 2, 1),
(15, 4, 2),
(15, 6, 1),
(16, 1, 3),
(16, 3, 2),
(16, 4, 1),
(17, 2, 2),
(17, 3, 1),
(17, 5, 3),
(18, 1, 1),
(18, 4, 2),
(18, 6, 2),
(19, 2, 3),
(19, 3, 1),
(19, 5, 1),
(20, 1, 2),
(20, 4, 2),
(20, 6, 1),
(21, 2, 1),
(21, 3, 1),
(21, 5, 3),
(22, 1, 1),
(22, 3, 2),
(22, 4, 1),
(23, 2, 2),
(23, 4, 3),
(23, 6, 1),
(24, 1, 3),
(24, 3, 1),
(24, 5, 2),
(25, 2, 1),
(25, 3, 2),
(25, 4, 2),
(26, 1, 2),
(26, 3, 1),
(26, 5, 3),
(27, 2, 1),
(27, 4, 2),
(27, 6, 1),
(28, 1, 3),
(28, 3, 2),
(28, 4, 1),
(29, 2, 2),
(29, 3, 1),
(29, 5, 3),
(30, 1, 1),
(30, 4, 2),
(30, 6, 2),
(31, 2, 3),
(31, 3, 1),
(31, 5, 1),
(32, 1, 2),
(32, 4, 2),
(32, 6, 1),
(33, 2, 1),
(33, 3, 1),
(33, 5, 3),
(34, 1, 1),
(34, 3, 2),
(34, 4, 1),
(35, 2, 2),
(35, 4, 3),
(35, 6, 1),
(36, 1, 3),
(36, 3, 1),
(36, 5, 2),
(37, 2, 1),
(37, 3, 2),
(37, 4, 2),
(38, 1, 2),
(38, 3, 1),
(38, 5, 3),
(39, 2, 1),
(39, 4, 2),
(39, 6, 1),
(40, 1, 3),
(40, 3, 2),
(40, 4, 1),
(41, 2, 2),
(41, 3, 1),
(41, 5, 3),
(42, 1, 1),
(42, 4, 2),
(42, 6, 2),
(43, 2, 3),
(43, 3, 1),
(43, 5, 1),
(44, 1, 2),
(44, 4, 2),
(44, 6, 1),
(45, 2, 1),
(45, 3, 1),
(45, 5, 3),
(46, 1, 1),
(46, 3, 2),
(46, 4, 1),
(47, 2, 2),
(101, 1, 2),
(101, 3, 1),
(101, 5, 3),
(102, 2, 1),
(102, 4, 2),
(102, 6, 1),
(103, 1, 3),
(103, 3, 2),
(103, 4, 1),
(104, 2, 2),
(104, 3, 1),
(104, 5, 3),
(105, 1, 1),
(105, 4, 2),
(105, 6, 2),
(106, 2, 3),
(106, 3, 1),
(106, 5, 1),
(107, 1, 2),
(107, 4, 2),
(107, 6, 1),
(108, 2, 1),
(108, 3, 1),
(108, 5, 3),
(109, 1, 1),
(109, 3, 2),
(109, 4, 1),
(110, 2, 2),
(110, 4, 3),
(110, 6, 1),
(111, 1, 3),
(111, 3, 1),
(111, 5, 2),
(112, 2, 1),
(112, 3, 2),
(112, 4, 2),
(113, 1, 2),
(113, 3, 1),
(113, 5, 3),
(114, 2, 1),
(114, 4, 2),
(114, 6, 1),
(115, 1, 3),
(115, 3, 2),
(115, 4, 1),
(116, 2, 2),
(116, 3, 1),
(116, 5, 3),
(117, 1, 1),
(117, 4, 2),
(117, 6, 2),
(118, 2, 3),
(118, 3, 1),
(118, 5, 1),
(119, 1, 2),
(119, 4, 2),
(119, 6, 1),
(120, 2, 1),
(120, 3, 1),
(120, 5, 3),
(121, 1, 1),
(121, 3, 2),
(121, 4, 1),
(122, 2, 2),
(122, 4, 3),
(122, 6, 1),
(123, 1, 3),
(123, 3, 1),
(123, 5, 2),
(124, 2, 1),
(124, 3, 2),
(124, 4, 2),
(72, 12, 1),
(125, 1, 2),
(125, 2, 1),
(125, 3, 3),
(126, 2, 2),
(126, 3, 2),
(127, 1, 1),
(127, 2, 2),
(127, 3, 1),
(128, 2, 3),
(128, 3, 1),
(128, 4, 2),
(129, 1, 2),
(129, 2, 2),
(130, 1, 3),
(131, 2, 2),
(131, 3, 2),
(131, 4, 1),
(132, 1, 1),
(132, 3, 2),
(132, 4, 2),
(133, 2, 3),
(133, 3, 1),
(134, 1, 2),
(134, 2, 1),
(134, 3, 3),
(135, 1, 1),
(135, 3, 2),
(136, 2, 2),
(136, 3, 1),
(136, 4, 2),
(137, 1, 2),
(137, 2, 1),
(137, 3, 3),
(138, 2, 2),
(138, 3, 2),
(139, 1, 1),
(139, 2, 2),
(139, 3, 1),
(140, 2, 3),
(140, 3, 1),
(140, 4, 2),
(141, 1, 2),
(141, 2, 2),
(142, 1, 3),
(143, 2, 2),
(143, 3, 2),
(143, 4, 1),
(144, 1, 1),
(144, 3, 2),
(144, 4, 2),
(145, 2, 3),
(145, 3, 1),
(146, 1, 2),
(146, 2, 1),
(146, 3, 3),
(147, 1, 1),
(147, 3, 2),
(148, 2, 2),
(148, 3, 1),
(148, 4, 2),
(161, 1, 2),
(162, 2, 3),
(163, 3, 1),
(164, 4, 4),
(165, 5, 2),
(166, 1, 3),
(167, 2, 2),
(168, 3, 1),
(169, 4, 1),
(170, 5, 3),
(171, 1, 2),
(172, 2, 4),
(173, 1, 3),
(174, 2, 2),
(175, 3, 2),
(176, 4, 3),
(177, 5, 1),
(178, 1, 2),
(179, 2, 1),
(180, 3, 3),
(181, 4, 2),
(182, 5, 2),
(183, 1, 1),
(184, 2, 3),
(185, 1, 4),
(186, 2, 2),
(187, 3, 3),
(188, 4, 3),
(189, 5, 1),
(190, 1, 2),
(191, 2, 4),
(192, 3, 2),
(193, 4, 2),
(194, 5, 3),
(195, 1, 3),
(196, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `basketId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `discountId` int(11) DEFAULT NULL,
  `currentUserBasket` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`basketId`, `userId`, `dateAdded`, `discountId`, `currentUserBasket`) VALUES
(1, 1, '2024-02-07 12:22:40', 1, 0),
(2, 2, '2023-01-01 08:00:00', NULL, 0),
(3, 3, '2023-01-02 09:00:00', NULL, 0),
(4, 4, '2023-01-03 10:00:00', NULL, 0),
(5, 5, '2023-01-04 11:00:00', NULL, 0),
(6, 6, '2023-01-05 12:00:00', NULL, 0),
(7, 7, '2023-01-06 13:00:00', NULL, 0),
(8, 8, '2023-01-07 14:00:00', NULL, 0),
(9, 9, '2023-01-08 15:00:00', NULL, 0),
(10, 1, '2023-01-09 16:00:00', NULL, 0),
(11, 2, '2023-01-10 17:00:00', NULL, 0),
(12, 3, '2023-01-11 18:00:00', NULL, 0),
(13, 4, '2023-01-12 19:00:00', NULL, 0),
(14, 5, '2023-02-01 08:00:00', NULL, 0),
(15, 6, '2023-02-02 09:00:00', NULL, 0),
(16, 7, '2023-02-03 10:00:00', NULL, 0),
(17, 8, '2023-02-04 11:00:00', NULL, 0),
(18, 9, '2023-02-05 12:00:00', NULL, 0),
(19, 1, '2023-02-06 13:00:00', NULL, 0),
(20, 2, '2023-02-07 14:00:00', NULL, 0),
(21, 3, '2023-02-08 15:00:00', NULL, 0),
(22, 4, '2023-02-09 16:00:00', NULL, 0),
(23, 5, '2023-02-10 17:00:00', NULL, 0),
(24, 6, '2023-02-11 18:00:00', NULL, 0),
(25, 7, '2023-02-12 19:00:00', NULL, 0),
(26, 8, '2023-03-01 08:00:00', NULL, 0),
(27, 9, '2023-03-02 09:00:00', NULL, 0),
(28, 1, '2023-03-03 10:00:00', NULL, 0),
(29, 2, '2023-03-04 11:00:00', NULL, 0),
(30, 3, '2023-03-05 12:00:00', NULL, 0),
(31, 4, '2023-03-06 13:00:00', NULL, 0),
(32, 5, '2023-03-07 14:00:00', NULL, 0),
(33, 6, '2023-03-08 15:00:00', NULL, 0),
(34, 7, '2023-03-09 16:00:00', NULL, 0),
(35, 8, '2023-03-10 17:00:00', NULL, 0),
(36, 9, '2023-03-11 18:00:00', NULL, 0),
(37, 1, '2023-03-12 19:00:00', NULL, 0),
(38, 2, '2023-04-01 07:00:00', NULL, 0),
(39, 3, '2023-04-02 08:00:00', NULL, 0),
(40, 4, '2023-04-03 09:00:00', NULL, 0),
(41, 5, '2023-04-04 10:00:00', NULL, 0),
(42, 6, '2023-04-05 11:00:00', NULL, 0),
(43, 7, '2023-04-06 12:00:00', NULL, 0),
(44, 8, '2023-04-07 13:00:00', NULL, 0),
(45, 9, '2023-04-08 14:00:00', NULL, 0),
(46, 1, '2023-04-09 15:00:00', NULL, 0),
(47, 2, '2023-04-10 16:00:00', NULL, 0),
(48, 3, '2023-04-11 17:00:00', NULL, 0),
(49, 4, '2023-04-12 18:00:00', NULL, 0),
(50, 5, '2023-05-01 07:00:00', NULL, 0),
(51, 6, '2023-05-02 08:00:00', NULL, 0),
(52, 7, '2023-05-03 09:00:00', NULL, 0),
(53, 8, '2023-05-04 10:00:00', NULL, 0),
(54, 9, '2023-05-05 11:00:00', NULL, 0),
(55, 1, '2023-05-06 12:00:00', NULL, 0),
(56, 2, '2023-05-07 13:00:00', NULL, 0),
(57, 3, '2023-05-08 14:00:00', NULL, 0),
(58, 4, '2023-05-09 15:00:00', NULL, 0),
(59, 5, '2023-05-10 16:00:00', NULL, 0),
(60, 6, '2023-05-11 17:00:00', NULL, 0),
(61, 7, '2023-05-12 18:00:00', NULL, 0),
(63, 1, '2024-03-24 11:51:39', NULL, 0),
(64, 1, '2024-03-24 12:20:21', NULL, 0),
(65, 1, '2024-03-24 12:25:58', NULL, 0),
(66, 1, '2024-03-24 12:30:25', NULL, 0),
(67, 1, '2024-03-24 12:31:25', NULL, 0),
(68, 1, '2024-03-24 12:36:30', NULL, 0),
(69, 1, '2024-03-24 12:37:32', NULL, 0),
(70, 1, '2024-03-24 12:45:30', NULL, 0),
(71, 1, '2024-03-24 12:48:59', NULL, 0),
(72, 1, '2024-03-24 12:51:15', NULL, 1),
(73, 5, '2024-03-25 09:00:00', NULL, 0),
(74, 6, '2024-03-25 09:15:00', NULL, 0),
(75, 7, '2024-03-26 10:00:00', NULL, 0),
(76, 8, '2024-03-26 10:15:00', NULL, 0),
(77, 5, '2024-03-25 09:00:00', NULL, 0),
(78, 6, '2024-03-25 09:15:00', NULL, 0),
(79, 7, '2024-03-26 10:00:00', NULL, 0),
(80, 8, '2024-03-26 10:15:00', NULL, 0),
(81, 5, '2024-03-25 09:00:00', NULL, 0),
(82, 6, '2024-03-25 09:15:00', NULL, 0),
(83, 7, '2024-03-26 10:00:00', NULL, 0),
(84, 8, '2024-03-26 10:15:00', NULL, 0),
(101, 5, '2023-05-01 07:00:00', NULL, 0),
(102, 6, '2023-05-02 08:00:00', NULL, 0),
(103, 7, '2023-05-03 09:00:00', NULL, 0),
(104, 8, '2023-05-04 10:00:00', NULL, 0),
(105, 9, '2023-05-05 11:00:00', NULL, 0),
(106, 1, '2023-05-06 12:00:00', NULL, 0),
(107, 2, '2023-05-07 13:00:00', NULL, 0),
(108, 3, '2023-05-08 14:00:00', NULL, 0),
(109, 4, '2023-05-09 15:00:00', NULL, 0),
(110, 5, '2023-05-10 16:00:00', NULL, 0),
(111, 6, '2023-05-11 17:00:00', NULL, 0),
(112, 7, '2023-05-12 18:00:00', NULL, 0),
(113, 8, '2023-06-01 07:00:00', NULL, 0),
(114, 9, '2023-06-02 08:00:00', NULL, 0),
(115, 1, '2023-06-03 09:00:00', NULL, 0),
(116, 2, '2023-06-04 10:00:00', NULL, 0),
(117, 3, '2023-06-05 11:00:00', NULL, 0),
(118, 4, '2023-06-06 12:00:00', NULL, 0),
(119, 5, '2023-06-07 13:00:00', NULL, 0),
(120, 6, '2023-06-08 14:00:00', NULL, 0),
(121, 7, '2023-06-09 15:00:00', NULL, 0),
(122, 8, '2023-06-10 16:00:00', NULL, 0),
(123, 9, '2023-06-11 17:00:00', NULL, 0),
(124, 1, '2023-06-12 18:00:00', NULL, 0),
(125, 2, '2023-07-01 07:00:00', NULL, 0),
(126, 3, '2023-07-02 08:00:00', NULL, 0),
(127, 4, '2023-07-03 09:00:00', NULL, 0),
(128, 5, '2023-07-04 10:00:00', NULL, 0),
(129, 6, '2023-07-05 11:00:00', NULL, 0),
(130, 7, '2023-07-06 12:00:00', NULL, 0),
(131, 8, '2023-07-07 13:00:00', NULL, 0),
(132, 9, '2023-07-08 14:00:00', NULL, 0),
(133, 1, '2023-07-09 15:00:00', NULL, 0),
(134, 2, '2023-07-10 16:00:00', NULL, 0),
(135, 3, '2023-07-11 17:00:00', NULL, 0),
(136, 4, '2023-07-12 18:00:00', NULL, 0),
(137, 5, '2023-08-01 07:00:00', NULL, 0),
(138, 6, '2023-08-02 08:00:00', NULL, 0),
(139, 7, '2023-08-03 09:00:00', NULL, 0),
(140, 8, '2023-08-04 10:00:00', NULL, 0),
(141, 9, '2023-08-05 11:00:00', NULL, 0),
(142, 1, '2023-08-06 12:00:00', NULL, 0),
(143, 2, '2023-08-07 13:00:00', NULL, 0),
(144, 3, '2023-08-08 14:00:00', NULL, 0),
(145, 4, '2023-08-09 15:00:00', NULL, 0),
(146, 5, '2023-08-10 16:00:00', NULL, 0),
(147, 6, '2023-08-11 17:00:00', NULL, 0),
(148, 7, '2023-08-12 18:00:00', NULL, 0),
(149, 8, '2023-09-01 07:00:00', NULL, 0),
(150, 9, '2023-09-02 08:00:00', NULL, 0),
(151, 1, '2023-09-03 09:00:00', NULL, 0),
(152, 2, '2023-09-04 10:00:00', NULL, 0),
(153, 3, '2023-09-05 11:00:00', NULL, 0),
(154, 4, '2023-09-06 12:00:00', NULL, 0),
(155, 5, '2023-09-07 13:00:00', NULL, 0),
(156, 6, '2023-09-08 14:00:00', NULL, 0),
(157, 7, '2023-09-09 15:00:00', NULL, 0),
(158, 8, '2023-09-10 16:00:00', NULL, 0),
(159, 9, '2023-09-11 17:00:00', NULL, 0),
(160, 1, '2023-09-12 18:00:00', NULL, 0),
(161, 2, '2023-10-01 07:00:00', NULL, 0),
(162, 3, '2023-10-02 08:00:00', NULL, 0),
(163, 4, '2023-10-03 09:00:00', NULL, 0),
(164, 5, '2023-10-04 10:00:00', NULL, 0),
(165, 6, '2023-10-05 11:00:00', NULL, 0),
(166, 7, '2023-10-06 12:00:00', NULL, 0),
(167, 8, '2023-10-07 13:00:00', NULL, 0),
(168, 9, '2023-10-08 14:00:00', NULL, 0),
(169, 1, '2023-10-09 15:00:00', NULL, 0),
(170, 2, '2023-10-10 16:00:00', NULL, 0),
(171, 3, '2023-10-11 17:00:00', NULL, 0),
(172, 4, '2023-10-12 18:00:00', NULL, 0),
(173, 5, '2023-11-01 08:00:00', NULL, 0),
(174, 6, '2023-11-02 09:00:00', NULL, 0),
(175, 7, '2023-11-03 10:00:00', NULL, 0),
(176, 8, '2023-11-04 11:00:00', NULL, 0),
(177, 9, '2023-11-05 12:00:00', NULL, 0),
(178, 1, '2023-11-06 13:00:00', NULL, 0),
(179, 2, '2023-11-07 14:00:00', NULL, 0),
(180, 3, '2023-11-08 15:00:00', NULL, 0),
(181, 4, '2023-11-09 16:00:00', NULL, 0),
(182, 5, '2023-11-10 17:00:00', NULL, 0),
(183, 6, '2023-11-11 18:00:00', NULL, 0),
(184, 7, '2023-11-12 19:00:00', NULL, 0),
(185, 8, '2023-12-01 08:00:00', NULL, 0),
(186, 9, '2023-12-02 09:00:00', NULL, 0),
(187, 1, '2023-12-03 10:00:00', NULL, 0),
(188, 2, '2023-12-04 11:00:00', NULL, 0),
(189, 3, '2023-12-05 12:00:00', NULL, 0),
(190, 4, '2023-12-06 13:00:00', NULL, 0),
(191, 5, '2023-12-07 14:00:00', NULL, 0),
(192, 6, '2023-12-08 15:00:00', NULL, 0),
(193, 7, '2023-12-09 16:00:00', NULL, 0),
(194, 8, '2023-12-10 17:00:00', NULL, 0),
(195, 9, '2023-12-11 18:00:00', NULL, 0),
(196, 1, '2023-12-12 19:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discountId` int(11) NOT NULL,
  `discountTitle` varchar(100) NOT NULL,
  `discountDescription` varchar(500) NOT NULL,
  `value` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discountId`, `discountTitle`, `discountDescription`, `value`) VALUES
(1, 'test', 'test', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `inquiryId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `inquiryDate` date DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `reply` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`inquiryId`, `userId`, `inquiryDate`, `subject`, `message`, `reply`) VALUES
(1, 1, '2023-12-12', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderreviews`
--

CREATE TABLE `orderreviews` (
  `reviewId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(1) NOT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `basketId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `deliveryOption` enum('standard','premium') DEFAULT NULL,
  `deliveryDate` date DEFAULT NULL,
  `deliveryStatus` enum('Delivered','Currently Delivering','Dispatching','Pending Approval') DEFAULT NULL,
  `notes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `basketId`, `userId`, `dateAdded`, `deliveryOption`, `deliveryDate`, `deliveryStatus`, `notes`) VALUES
(3, 4, 4, '2023-01-03 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(4, 5, 5, '2023-01-04 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(5, 6, 6, '2023-01-05 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(6, 7, 7, '2023-01-06 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(7, 8, 8, '2023-01-07 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(8, 9, 9, '2023-01-08 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(9, 10, 1, '2023-01-09 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(10, 11, 2, '2023-01-10 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(11, 12, 3, '2023-01-11 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(12, 13, 4, '2023-01-12 19:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(13, 14, 5, '2023-02-01 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(14, 15, 6, '2023-02-02 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(15, 16, 7, '2023-02-03 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(16, 17, 8, '2023-02-04 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(17, 18, 9, '2023-02-05 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(18, 19, 1, '2023-02-06 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(19, 20, 2, '2023-02-07 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(20, 21, 3, '2023-02-08 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(21, 22, 4, '2023-02-09 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(22, 23, 5, '2023-02-10 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(23, 24, 6, '2023-02-11 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(24, 25, 7, '2023-02-12 19:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(25, 26, 8, '2023-03-01 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(26, 27, 9, '2023-03-02 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(27, 28, 1, '2023-03-03 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(28, 29, 2, '2023-03-04 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(29, 30, 3, '2023-03-05 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(30, 31, 4, '2023-03-06 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(31, 32, 5, '2023-03-07 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(32, 33, 6, '2023-03-08 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(33, 34, 7, '2023-03-09 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(34, 35, 8, '2023-03-10 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(35, 36, 9, '2023-03-11 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(36, 37, 1, '2023-03-12 19:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(37, 38, 2, '2023-04-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(38, 39, 3, '2023-04-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(39, 40, 4, '2023-04-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(40, 41, 5, '2023-04-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(41, 42, 6, '2023-04-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(42, 43, 7, '2023-04-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(43, 44, 8, '2023-04-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(44, 45, 9, '2023-04-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(45, 46, 1, '2023-04-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(46, 47, 2, '2023-04-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(47, 48, 3, '2023-04-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(48, 49, 4, '2023-04-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(49, 101, 5, '2023-05-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(50, 102, 6, '2023-05-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(51, 103, 7, '2023-05-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(52, 104, 8, '2023-05-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(53, 105, 9, '2023-05-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(54, 106, 1, '2023-05-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(55, 107, 2, '2023-05-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(56, 108, 3, '2023-05-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(57, 109, 4, '2023-05-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(58, 110, 5, '2023-05-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(59, 111, 6, '2023-05-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(60, 112, 7, '2023-05-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(61, 113, 8, '2023-06-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(62, 114, 9, '2023-06-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(63, 115, 1, '2023-06-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(64, 116, 2, '2023-06-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(65, 117, 3, '2023-06-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(66, 118, 4, '2023-06-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(67, 119, 5, '2023-06-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(68, 120, 6, '2023-06-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(69, 121, 7, '2023-06-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(70, 122, 8, '2023-06-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(71, 123, 9, '2023-06-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(72, 124, 1, '2023-06-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(73, 125, 2, '2023-07-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(74, 126, 3, '2023-07-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(75, 127, 4, '2023-07-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(76, 128, 5, '2023-07-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(77, 129, 6, '2023-07-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(78, 130, 7, '2023-07-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(79, 131, 8, '2023-07-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(80, 132, 9, '2023-07-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(81, 133, 1, '2023-07-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(82, 134, 2, '2023-07-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(83, 135, 3, '2023-07-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(84, 136, 4, '2023-07-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(85, 137, 5, '2023-08-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(86, 138, 6, '2023-08-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(87, 139, 7, '2023-08-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(88, 140, 8, '2023-08-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(89, 141, 9, '2023-08-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(90, 142, 1, '2023-08-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(91, 143, 2, '2023-08-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(92, 144, 3, '2023-08-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(93, 145, 4, '2023-08-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(94, 146, 5, '2023-08-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(95, 147, 6, '2023-08-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(96, 148, 7, '2023-08-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(97, 149, 8, '2023-09-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(98, 150, 9, '2023-09-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(99, 151, 1, '2023-09-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(100, 152, 2, '2023-09-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(101, 153, 3, '2023-09-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(102, 154, 4, '2023-09-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(103, 155, 5, '2023-09-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(104, 156, 6, '2023-09-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(105, 157, 7, '2023-09-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(106, 158, 8, '2023-09-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(107, 159, 9, '2023-09-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(108, 160, 1, '2023-09-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(119, 69, 1, '2024-03-24 12:45:30', 'standard', NULL, NULL, ''),
(120, 70, 1, '2024-03-24 12:48:59', 'standard', NULL, NULL, ''),
(121, 71, 1, '2024-03-24 12:51:15', 'standard', NULL, NULL, ''),
(126, 66, 5, '2024-03-25 09:30:00', 'standard', NULL, NULL, ''),
(127, 67, 6, '2024-03-25 09:45:00', 'standard', NULL, NULL, ''),
(128, 69, 7, '2024-03-26 10:30:00', 'standard', NULL, NULL, ''),
(129, 70, 8, '2024-03-26 10:45:00', 'standard', NULL, NULL, ''),
(130, 1, 1, '2024-02-07 12:22:40', 'standard', NULL, NULL, ''),
(131, 63, 1, '2024-03-24 11:51:39', 'standard', NULL, NULL, ''),
(132, 64, 1, '2024-03-24 12:20:21', 'standard', NULL, NULL, ''),
(133, 65, 1, '2024-03-24 12:25:58', 'standard', NULL, NULL, ''),
(134, 66, 1, '2024-03-24 12:30:25', 'standard', NULL, NULL, ''),
(135, 67, 1, '2024-03-24 12:31:25', 'standard', NULL, NULL, ''),
(136, 68, 1, '2024-03-24 12:36:30', 'standard', NULL, NULL, ''),
(137, 69, 1, '2024-03-24 12:37:32', 'standard', NULL, NULL, ''),
(138, 70, 1, '2024-03-24 12:45:30', 'standard', NULL, NULL, ''),
(139, 71, 1, '2024-03-24 12:48:59', 'standard', NULL, NULL, ''),
(140, 72, 1, '2024-03-24 12:51:15', 'standard', NULL, NULL, ''),
(201, 101, 5, '2023-05-01 07:00:00', 'standard', '2023-05-07', 'Delivered', 'No special notes'),
(202, 102, 6, '2023-05-02 08:00:00', 'premium', '2023-05-08', 'Delivered', 'No special notes'),
(203, 103, 7, '2023-05-03 09:00:00', 'standard', '2023-05-09', 'Delivered', 'No special notes'),
(204, 104, 8, '2023-05-04 10:00:00', 'standard', '2023-05-10', 'Delivered', 'No special notes'),
(205, 105, 9, '2023-05-05 11:00:00', 'premium', '2023-05-11', 'Delivered', 'No special notes'),
(206, 106, 1, '2023-05-06 12:00:00', 'standard', '2023-05-12', 'Delivered', 'No special notes'),
(207, 107, 2, '2023-06-07 13:00:00', 'premium', '2023-06-13', 'Delivered', 'No special notes'),
(208, 108, 3, '2023-06-08 14:00:00', 'standard', '2023-06-14', 'Delivered', 'No special notes'),
(209, 109, 4, '2023-06-09 15:00:00', 'standard', '2023-06-15', 'Delivered', 'No special notes'),
(210, 110, 5, '2023-06-10 16:00:00', 'standard', '2023-06-16', 'Delivered', 'No special notes'),
(211, 111, 6, '2023-06-11 17:00:00', 'standard', '2023-06-17', 'Delivered', 'No special notes'),
(212, 112, 7, '2023-06-12 18:00:00', 'premium', '2023-06-18', 'Delivered', 'No special notes'),
(301, 161, 2, '2023-10-01 07:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(302, 162, 3, '2023-10-02 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(303, 163, 4, '2023-10-03 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(304, 164, 5, '2023-10-04 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(305, 165, 6, '2023-10-05 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(306, 166, 7, '2023-10-06 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(307, 167, 8, '2023-10-07 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(308, 168, 9, '2023-10-08 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(309, 169, 1, '2023-10-09 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(310, 170, 2, '2023-10-10 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(311, 171, 3, '2023-10-11 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(312, 172, 4, '2023-10-12 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(313, 173, 5, '2023-11-01 08:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(314, 174, 6, '2023-11-02 09:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(315, 175, 7, '2023-11-03 10:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(316, 176, 8, '2023-11-04 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(317, 177, 9, '2023-11-05 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(318, 178, 1, '2023-11-06 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(319, 179, 2, '2023-11-07 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(320, 180, 3, '2023-11-08 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(321, 181, 4, '2023-11-09 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(322, 182, 5, '2023-11-10 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(323, 183, 6, '2023-11-11 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(324, 184, 7, '2023-11-12 19:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(328, 188, 2, '2023-12-04 11:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(329, 189, 3, '2023-12-05 12:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(330, 190, 4, '2023-12-06 13:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(331, 191, 5, '2023-12-07 14:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(332, 192, 6, '2023-12-08 15:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(333, 193, 7, '2023-12-09 16:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(334, 194, 8, '2023-12-10 17:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(335, 195, 9, '2023-12-11 18:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully'),
(336, 196, 1, '2023-12-12 19:00:00', 'standard', NULL, 'Delivered', 'Order delivered successfully');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productDescription` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT current_timestamp(),
  `countSold` int(11) DEFAULT NULL,
  `countStock` int(11) DEFAULT NULL,
  `productCategory` enum('modern','minimal','rustic','bohemian','tropical') DEFAULT NULL,
  `productType` enum('sofa','bed','desk','chair','wardrobe') DEFAULT NULL,
  `imageName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productDescription`, `price`, `dateAdded`, `countSold`, `countStock`, `productCategory`, `productType`, `imageName`) VALUES
(1, 'Modern Sofa', 'Living room\r\n', '499.99', '2023-12-01 13:25:36', 13, 47, 'modern', 'sofa', 'modern_sofa.jpg'),
(2, 'Minimal Desk', 'Dressing table', '199.99', '2023-12-01 13:25:36', 8, 17, 'minimal', 'desk', 'minimal_desk.jpg'),
(3, 'Rustic Chair', 'Kitchen', '129.99', '2023-12-01 13:25:36', 11, 27, 'rustic', 'chair', 'rustic_chair.jpg'),
(4, 'Bohemian Bed', 'Double bedroom', '699.99', '2023-12-01 13:25:36', 17, 35, 'bohemian', 'bed', 'bohemian_bed.jpg'),
(5, 'Tropical Wardrobe', 'Bedroom', '299.99', '2023-12-01 13:25:36', 9, 22, 'tropical', 'wardrobe', 'tropical_wardrobe.jpg'),
(6, 'Modern Chair', 'Gaming', '149.99', '2023-12-01 13:25:36', 9, 35, 'modern', 'chair', 'modern_chair.jpg'),
(7, 'Minimal Bed', 'Double bedroom', '599.99', '2023-12-01 13:25:36', 15, 45, 'minimal', 'bed', 'minimal_bed.jpg'),
(8, 'Rustic Desk', 'Kitchen', '179.99', '2023-12-01 13:25:36', 7, 28, 'rustic', 'desk', 'rustic_desk.jpg'),
(9, 'Bohemian Sofa', 'Living room', '549.99', '2023-12-01 13:25:36', 11, 38, 'bohemian', 'sofa', 'bohemian_sofa.jpg'),
(10, 'Tropical Chair', 'Kitchen', '169.99', '2023-12-01 13:25:36', 10, 32, 'tropical', 'chair', 'tropical_chair.jpg'),
(11, 'Modern Sofa 2', 'Living room', '479.99', '2023-12-01 13:25:36', 8, 45, 'modern', 'sofa', 'modern_sofa_2.jpg'),
(12, 'Minimal Desk 2', 'Office', '219.99', '2023-12-01 13:25:36', 6, 18, 'minimal', 'desk', 'minimal_desk_2.jpg'),
(13, 'Rustic Chair 2', 'Bedroom', '149.99', '2023-12-01 13:25:36', 7, 32, 'rustic', 'chair', 'rustic_chair_2.jpg'),
(14, 'Bohemian Bed 2', 'Double bedroom', '679.99', '2023-12-01 13:25:36', 10, 35, 'bohemian', 'bed', 'bohemian_bed_2.jpg'),
(15, 'Tropical Wardrobe 2', 'Single bedroom', '279.99', '2023-12-01 13:25:36', 5, 28, 'tropical', 'wardrobe', 'tropical_wardrobe_2.jpg'),
(16, 'Modern Chair 2', 'Office', '129.99', '2023-12-01 13:25:36', 12, 30, 'modern', 'chair', 'modern_chair_2.jpg'),
(17, 'Minimal Bed 2', 'Office', '569.99', '2023-12-01 13:25:36', 14, 40, 'minimal', 'bed', 'minimal_bed_2.jpg'),
(18, 'Rustic Desk 2', 'Kitchen', '199.99', '2023-12-01 13:25:36', 10, 26, 'rustic', 'desk', 'rustic_desk_2.jpg'),
(19, 'Bohemian Sofa 2', 'Living room', '529.99', '2023-12-01 13:25:36', 13, 38, 'bohemian', 'sofa', 'bohemian_sofa_2.jpg'),
(20, 'Tropical Chair 2', 'Bedroom', '149.99', '2023-12-01 13:25:36', 11, 30, 'tropical', 'chair', 'tropical_chair_2.jpg'),
(21, 'Modern Sofa 3', 'Living room', '459.99', '2023-12-01 13:25:36', 9, 42, 'modern', 'sofa', 'modern_sofa_3.jpg'),
(22, 'Minimal Desk 3', 'Bedroom', '239.99', '2023-12-01 13:25:36', 8, 22, 'minimal', 'desk', 'minimal_desk_3.jpg'),
(23, 'Rustic Chair 3', 'Kitchen', '139.99', '2023-12-01 13:25:36', 11, 28, 'rustic', 'chair', 'rustic_chair_3.jpg'),
(24, 'Bohemian Bed 3', 'Single bedroom', '649.99', '2023-12-01 13:25:36', 13, 30, 'bohemian', 'bed', 'bohemian_bed_3.jpg'),
(25, 'Tropical Wardrobe 3', 'Double bedroom', '259.99', '2023-12-01 13:25:36', 9, 25, 'tropical', 'wardrobe', 'tropical_wardrobe_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('approved','pending') NOT NULL DEFAULT 'pending',
  `cardDetails` varchar(255) DEFAULT NULL,
  `transactionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `orderId`, `amount`, `status`, `cardDetails`, `transactionDate`) VALUES
(2, 121, '199.99', 'approved', '|000|00/00', '2024-03-24 12:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `admin` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `secretAnswer` varchar(255) NOT NULL,
  `contactByEmail` tinyint(1) NOT NULL DEFAULT 0,
  `contactByText` tinyint(1) NOT NULL DEFAULT 0,
  `pendingApproval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `admin`, `firstname`, `surname`, `address`, `email`, `username`, `phone`, `password`, `dateCreated`, `secretAnswer`, `contactByEmail`, `contactByText`, `pendingApproval`) VALUES
(1, 'admin', 'admin', 'admin', 'address', 'admin@admins', 'admin', '123456', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2022-11-30 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 0, 0, 1),
(2, 'admin', 'lucy', 'lucy', '33 lucy lane', 'luc@luc.ac.uk', 'lucy', '1010101', '$2y$10$Nyu9gtGpqtGuGm5ba5Us1ehd3E0cLbp5gISxBYmCPip9Z6Rh2VULe', '2022-03-15 13:13:47', '', 0, 0, 1),
(3, 'admin', 'test', 'test', '22 Jump Street', 'email@email.com', 'test', '1212112', '$2y$10$u12r0JbNCCJVI5duBVY/.edBMmvUXQh6Xg3ICc6XTGrpVCp3AuGLO', '2023-01-01 13:14:12', '', 0, 0, 0),
(4, 'admin', 'test', 'test', '22 Jump Street', 'email@email.com', 'test', '1212112', '$2y$10$ckMq8OPirQBTIGstfkY6geyXICfrYnk7cONtjmQ6tjcTLdBDT49kO', '2022-05-24 12:54:34', '', 0, 0, 0),
(5, 'customer', 'John', 'Doe', '123 Main St', 'john@example.com', 'johndoe', '123456789', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2022-02-15 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(6, 'customer', 'Alice', 'Smith', '456 Oak St', 'alice@example.com', 'alicesmith', '987654321', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2022-09-28 10:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(7, 'customer', 'Emily', 'Johnson', '789 Elm St', 'emily@example.com', 'emilyjohnson', '987123654', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2022-10-31 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(8, 'customer', 'Michael', 'Brown', '321 Pine St', 'michael@example.com', 'michaelbrown', '456789123', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2022-12-29 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(9, 'customer', 'John', 'Doe', '123 Main St', 'john@example.com', 'johndoe', '123456789', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2023-01-01 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(10, 'customer', 'Alice', 'Smith', '456 Oak St', 'alice@example.com', 'alicesmith', '987654321', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(11, 'customer', 'Emily', 'Johnson', '789 Elm St', 'emily@example.com', 'emilyjohnson', '987123654', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(12, 'customer', 'Michael', 'Brown', '321 Pine St', 'michael@example.com', 'michaelbrown', '456789123', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(13, 'customer', 'John', 'Doe', '123 Main St', 'john@example.com', 'johndoe', '123456789', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(14, 'customer', 'Alice', 'Smith', '456 Oak St', 'alice@example.com', 'alicesmith', '987654321', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(15, 'customer', 'Emily', 'Johnson', '789 Elm St', 'emily@example.com', 'emilyjohnson', '987123654', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0),
(16, 'customer', 'Michael', 'Brown', '321 Pine St', 'michael@example.com', 'michaelbrown', '456789123', '$2y$10$AcbFhwU3/CXVOVgY7..zvOxByK/tiVOB/b5jGVbahEzHOHRQdC9aq', '2024-02-07 11:51:07', '$2y$10$.CpVg5QHunYIiOpJECtS7.iU9w7lbPnaHd/eTlZOfamtxYZOKh5zO', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD KEY `pivot_basket` (`basketId`),
  ADD KEY `pivot_product` (`productId`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basketId`),
  ADD KEY `basket_discount` (`discountId`),
  ADD KEY `basket_user` (`userId`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discountId`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`inquiryId`),
  ADD KEY `inquiry_user` (`userId`);

--
-- Indexes for table `orderreviews`
--
ALTER TABLE `orderreviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `fk_order_reviews_order_id` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `order_basket` (`basketId`),
  ADD KEY `order_user` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basketId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderreviews`
--
ALTER TABLE `orderreviews`
  MODIFY `reviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basketproducts`
--
ALTER TABLE `basketproducts`
  ADD CONSTRAINT `pivot_basket` FOREIGN KEY (`basketId`) REFERENCES `baskets` (`basketId`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_product` FOREIGN KEY (`productId`) REFERENCES `products` (`productId`) ON DELETE CASCADE;

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `basket_discount` FOREIGN KEY (`discountId`) REFERENCES `discounts` (`discountId`) ON DELETE CASCADE,
  ADD CONSTRAINT `basket_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiry_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `orderreviews`
--
ALTER TABLE `orderreviews`
  ADD CONSTRAINT `fk_order_reviews_order_id` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_basket` FOREIGN KEY (`basketId`) REFERENCES `baskets` (`basketId`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_user` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
