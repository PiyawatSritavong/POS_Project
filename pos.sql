-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 10:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `od_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `pd_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `qty` int(6) NOT NULL,
  `price` int(6) NOT NULL,
  `total_price` int(6) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `od_id`, `pd_id`, `qty`, `price`, `total_price`, `time`, `date`) VALUES
(000051, 000105, 000001, 2, 120, 240, '00:32:41', '2023-01-05'),
(000052, 000105, 000002, 1, 80, 80, '00:32:41', '2023-01-05'),
(000053, 000106, 000001, 1, 120, 120, '00:32:58', '2023-01-05'),
(000054, 000106, 000002, 2, 80, 160, '00:32:58', '2023-01-05'),
(000055, 000107, 000001, 3, 120, 360, '01:24:02', '2023-01-05'),
(000056, 000107, 000002, 3, 80, 240, '01:24:02', '2023-01-05'),
(000057, 000108, 000002, 1, 80, 80, '01:45:03', '2023-01-05'),
(000058, 000108, 000002, 16, 100, 1600, '15:29:05', '2023-01-13'),
(000059, 000108, 000002, 14, 100, 1400, '15:30:46', '2023-01-13'),
(000060, 000109, 000002, 9, 100, 900, '15:31:58', '2023-01-13'),
(000061, 000109, 000024, 4, 1200, 4800, '16:21:20', '2023-01-13'),
(000062, 000110, 000002, 7, 100, 700, '16:23:07', '2023-01-13'),
(000063, 000110, 000024, 2, 1200, 2400, '16:23:33', '2023-01-13'),
(000064, 000110, 000024, 1, 1200, 1200, '16:24:19', '2023-01-13'),
(000065, 000110, 000024, 1, 1200, 1200, '16:24:37', '2023-01-13'),
(000066, 000110, 000024, 1, 1200, 1200, '16:24:55', '2023-01-13'),
(000067, 000110, 000024, 1, 1200, 1200, '16:25:28', '2023-01-13'),
(000068, 000110, 000024, 1, 1200, 1200, '16:25:42', '2023-01-13'),
(000069, 000110, 000024, 1, 1200, 1200, '16:26:47', '2023-01-13'),
(000070, 000111, 000002, 2, 100, 200, '16:30:25', '2023-01-13'),
(000071, 000111, 000002, 3, 100, 300, '16:30:47', '2023-01-13'),
(000072, 000111, 000024, 1, 1200, 1200, '16:30:47', '2023-01-13'),
(000073, 000111, 000002, 2, 100, 200, '16:31:07', '2023-01-13'),
(000074, 000111, 000024, 2, 1200, 2400, '16:31:07', '2023-01-13'),
(000075, 000111, 000002, 2, 100, 200, '16:31:30', '2023-01-13'),
(000076, 000111, 000024, 2, 1200, 2400, '16:31:30', '2023-01-13'),
(000077, 000112, 000002, 2, 100, 200, '16:31:41', '2023-01-13'),
(000078, 000113, 000002, 2, 100, 200, '16:31:52', '2023-01-13'),
(000079, 000114, 000002, 5, 100, 500, '16:32:11', '2023-01-13'),
(000080, 000114, 000024, 1, 1200, 1200, '16:32:28', '2023-01-13'),
(000081, 000114, 000002, 1, 100, 100, '16:32:28', '2023-01-13'),
(000082, 000115, 000001, 1, 120, 120, '16:32:42', '2023-01-13'),
(000083, 000116, 000002, 1, 100, 100, '16:45:41', '2023-01-13'),
(000084, 000116, 000002, 1, 100, 100, '16:46:01', '2023-01-13'),
(000085, 000116, 000024, 1, 1200, 1200, '16:46:01', '2023-01-13'),
(000086, 000117, 000002, 3, 100, 300, '16:47:28', '2023-01-13'),
(000087, 000117, 000024, 1, 1200, 1200, '16:47:46', '2023-01-13'),
(000088, 000117, 000002, 1, 100, 100, '16:47:46', '2023-01-13'),
(000089, 000118, 000001, 1, 120, 120, '16:48:30', '2023-01-13'),
(000090, 000118, 000002, 1, 100, 100, '16:48:30', '2023-01-13'),
(000091, 000118, 000001, 1, 120, 120, '16:48:44', '2023-01-13'),
(000092, 000118, 000024, 1, 1200, 1200, '16:48:44', '2023-01-13'),
(000093, 000119, 000001, 1, 120, 120, '16:48:56', '2023-01-13'),
(000094, 000119, 000024, 1, 1200, 1200, '16:49:11', '2023-01-13'),
(000095, 000119, 000024, 1, 1200, 1200, '16:49:34', '2023-01-13'),
(000096, 000119, 000024, 1, 1200, 1200, '16:49:49', '2023-01-13'),
(000097, 000119, 000024, 1, 1200, 1200, '16:50:05', '2023-01-13'),
(000098, 000120, 000001, 1, 120, 120, '16:50:35', '2023-01-13'),
(000099, 000120, 000024, 1, 1200, 1200, '16:50:49', '2023-01-13'),
(000100, 000121, 000002, 1, 100, 100, '16:51:02', '2023-01-13'),
(000101, 000122, 000002, 1, 100, 100, '17:18:35', '2023-01-15'),
(000102, 000122, 000024, 1, 1200, 1200, '17:18:51', '2023-01-15'),
(000103, 000123, 000001, 1, 120, 120, '17:19:17', '2023-01-15'),
(000104, 000123, 000024, 1, 1200, 1200, '17:19:31', '2023-01-15'),
(000105, 000123, 000024, 1, 1200, 1200, '17:19:45', '2023-01-15'),
(000106, 000124, 000002, 1, 100, 100, '17:19:58', '2023-01-15'),
(000107, 000125, 000002, 1, 100, 100, '17:20:26', '2023-01-15'),
(000108, 000126, 000001, 1, 120, 120, '17:20:38', '2023-01-15'),
(000109, 000127, 000002, 1, 100, 100, '17:20:51', '2023-01-15'),
(000110, 000127, 000024, 1, 1200, 1200, '17:21:05', '2023-01-15'),
(000111, 000128, 000001, 1, 120, 120, '17:33:55', '2023-01-15'),
(000112, 000129, 000002, 1, 100, 100, '17:34:12', '2023-01-15'),
(000113, 000129, 000024, 1, 1200, 1200, '17:34:27', '2023-01-15'),
(000114, 000130, 000001, 5, 120, 600, '17:37:14', '2023-01-15'),
(000115, 000131, 000001, 5, 120, 600, '17:37:43', '2023-01-15'),
(000116, 000132, 000001, 5, 120, 600, '17:38:01', '2023-01-15'),
(000117, 000133, 000002, 1, 100, 100, '17:38:18', '2023-01-15'),
(000118, 000133, 000024, 1, 1200, 1200, '17:38:34', '2023-01-15'),
(000119, 000133, 000024, 1, 1200, 1200, '17:40:21', '2023-01-15'),
(000120, 000133, 000001, 2, 120, 240, '02:53:52', '2023-02-25'),
(000121, 000133, 000002, 1, 100, 100, '02:53:52', '2023-02-25'),
(000122, 000133, 000024, 3, 1200, 3600, '02:53:52', '2023-02-25'),
(000123, 000133, 000001, 8, 120, 960, '14:49:18', '2023-02-25'),
(000124, 000133, 000002, 1, 100, 100, '14:49:18', '2023-02-25'),
(000125, 000133, 000024, 1, 1200, 1200, '14:49:18', '2023-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `od_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `cash` int(6) NOT NULL,
  `discount` text NOT NULL,
  `total` int(6) NOT NULL,
  `change` int(6) NOT NULL,
  `status` enum('cancel','success') NOT NULL,
  `date` date NOT NULL,
  `month` varchar(8) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`od_id`, `cash`, `discount`, `total`, `change`, `status`, `date`, `month`, `time`) VALUES
(000105, 400, '0%', 320, 80, 'success', '2023-01-05', '2023-01', '00:32:41'),
(000106, 300, '0%', 280, 20, 'success', '2023-01-05', '2023-01', '00:32:58'),
(000107, 600, '0%', 600, 0, 'success', '2023-01-05', '2023-01', '01:24:02'),
(000108, 100, '0%', 80, 20, 'success', '2023-01-05', '2023-01', '01:45:03'),
(000109, 1000, '0%', 900, 100, 'success', '2023-01-13', '2023-01', '15:31:58'),
(000110, 1000, '0%', 500, 500, 'success', '2023-01-13', '2023-01', '16:23:07'),
(000111, 500, '5%', 190, 310, 'success', '2023-01-13', '2023-01', '16:30:25'),
(000112, 500, '0%', 200, 300, 'success', '2023-01-13', '2023-01', '16:31:41'),
(000113, 500, '5%', 190, 310, 'success', '2023-01-13', '2023-01', '16:31:52'),
(000114, 500, '10%', 450, 50, 'success', '2023-01-13', '2023-01', '16:32:11'),
(000115, 150, '5%', 114, 36, 'success', '2023-01-13', '2023-01', '16:32:42'),
(000116, 200, '5%', 95, 105, 'success', '2023-01-13', '2023-01', '16:45:41'),
(000117, 500, '0%', 300, 200, 'success', '2023-01-13', '2023-01', '16:47:28'),
(000118, 500, '0%', 220, 280, 'success', '2023-01-13', '2023-01', '16:48:30'),
(000119, 200, '0%', 120, 80, 'success', '2023-01-13', '2023-01', '16:48:56'),
(000120, 200, '5%', 114, 86, 'success', '2023-01-13', '2023-01', '16:50:35'),
(000121, 500, '0%', 100, 400, 'success', '2023-01-13', '2023-01', '16:51:02'),
(000122, 100, '5%', 95, 5, 'success', '2023-01-15', '2023-01', '17:18:35'),
(000123, 200, '5%', 114, 86, 'success', '2023-01-15', '2023-01', '17:19:17'),
(000124, 200, '5%', 95, 105, 'success', '2023-01-15', '2023-01', '17:19:58'),
(000125, 100, '10%', 90, 10, 'success', '2023-01-15', '2023-01', '17:20:26'),
(000126, 120, '15%', 102, 18, 'success', '2023-01-15', '2023-01', '17:20:38'),
(000127, 100, '10%', 90, 10, 'success', '2023-01-15', '2023-01', '17:20:51'),
(000128, 150, '0%', 120, 30, 'success', '2023-01-15', '2023-01', '17:33:55'),
(000129, 100, '5%', 95, 5, 'success', '2023-01-15', '2023-01', '17:34:12'),
(000130, 1000, '5%', 570, 430, 'success', '2023-01-15', '2023-01', '17:37:14'),
(000131, 1000, '15%', 510, 490, 'success', '2023-01-15', '2023-01', '17:37:43'),
(000132, 1000, '10%', 540, 460, 'success', '2023-01-15', '2023-01', '17:38:01'),
(000133, 500, '10%', 90, 410, 'success', '2023-01-15', '2023-01', '17:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` decimal(5,0) NOT NULL,
  `qty` int(7) NOT NULL,
  `comment` text NOT NULL,
  `barcode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `name`, `price`, `qty`, `comment`, `barcode`) VALUES
(000001, 'ค้อนตอกตะปู', '120', 100, 'ดำด้าน', '<p class=\"show-barcode\">\r\n    <table cellpadding=\"0\" cellspacing=\"0\">\r\n        <tbody>\r\n            <tr>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:4\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:2\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:3\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:3\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:3\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:3;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:1;width:1\"></div>\r\n                </td>\r\n                <td>\r\n                    <div class=\"b128\" style=\"border-left-width:2;width:0\"></div>\r\n                </td>\r\n            </tr>\r\n        </tbody>\r\n    </table>\r\n    </p>'),
(000002, 'ค้อนยาง', '100', 120, 'ด้ามไม้', '<p class=\"show-barcode\"><table cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><td><div class=\"b128\" style=\"border-left-width:2;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:4\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:2\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:3\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:3\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:3\"></div></td><td><div class=\"b128\" style=\"border-left-width:3;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:1;width:1\"></div></td><td><div class=\"b128\" style=\"border-left-width:2;width:0\"></div></td></tr></tbody></table></p>'),
(000024, 'โคมไฟ', '1200', 100, 'สีขาว', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `od_id` (`od_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `od_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pd_id`) REFERENCES `products` (`pd_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`od_id`) REFERENCES `order_details` (`od_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
