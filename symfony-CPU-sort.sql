-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2022 at 07:54 AM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sym_crud_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `price` float NOT NULL,
  `team` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `team`, `platform`, `slug`) VALUES
(15, 'Ryzen 5 5500 3.6GHz (4.2GHz)', 25999, 'AMD', 'AM4', 'ryzen-5-5500-3-6ghz-4-2ghz'),
(16, 'Ryzen 5 5600X 3.7GHz (4.6GHz)', 41999, 'AMD', 'AM4', 'ryzen-5-5600x-3-7ghz-4-6ghz'),
(17, 'Ryzen 5 5600G 3.9GHz (4.4GHz)', 34999, 'AMD', 'AM4', 'ryzen-5-5600g-3-9ghz-4-4ghz'),
(18, 'Ryzen 7 3800X 3.9GHz (4.5GHz)', 37999, 'AMD', 'AM4', 'ryzen-7-3800x-3-9ghz-4-5ghz'),
(19, 'Ryzen 7 5800X 3.8GHz (4.7GHz)', 49999, 'AMD', 'AM4', 'ryzen-7-5800x-3-8ghz-4-7ghz'),
(20, 'Ryzen 9 5900X 3.7GHz', 71999, 'AMD', 'AM4', 'ryzen-9-5900x-3-7ghz'),
(21, 'Core i7-12700KF 3.6GHz (5.0GHz)', 60999, 'Intel', '1700', 'core-i7-12700kf-3-6ghz-5-0ghz'),
(22, 'Core i9-12900KS 3.4GHz (5.5GHz)', 120999, 'Intel', '1700', 'core-i9-12900ks-3-4ghz-5-5ghz'),
(23, 'Core i5-12400F 2.50 GHz (4.40 GHz)', 26999, 'Intel', '1700', 'core-i5-12400f-2-50-ghz-4-40-ghz'),
(24, 'Core i5-12600KF 2.8GHz', 39999, 'Intel', '1700', 'core-i5-12600kf-2-8ghz'),
(25, 'Core i7-12700K 3.6GHz (5.00GHz)', 62999, 'Intel', '1700', 'core-i7-12700k-3-6ghz-5-00ghz'),
(33, 'Ryzen 56 5500 3.6GHz (4.2GHz)', 25999, 'AMD', 'AM4', 'ryzen-56-5500-3-6ghz-4-2ghz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
