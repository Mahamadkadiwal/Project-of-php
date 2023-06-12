-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 06:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspire_seller`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `mobile`, `email`, `password`) VALUES
(1, 'Zeel Patel', '8696059685', 'zeel@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `seller_detail`
--

CREATE TABLE `seller_detail` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `floor` varchar(20) NOT NULL,
  `street` varchar(50) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `account_number` bigint(30) NOT NULL,
  `confirm_account_number` bigint(30) NOT NULL,
  `ifsc_code` varchar(20) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `seller_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_login`
--

CREATE TABLE `seller_login` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text DEFAULT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_login`
--

INSERT INTO `seller_login` (`id`, `mobile`, `email`, `password`, `verification_code`, `email_verified_at`) VALUES
(1, '9313048913', 'asgaralikadiwala78693@gmail.com', '$2y$10$PxxeBxAJPoywSoNvc5EpSuCUeSJUIHEA.7Z.pa/pED/gNx/1bYV96', '232546', NULL),
(3, '7879896651', 'mohdkadiwal786@gmail.com', '$2y$10$WJ4cE8IU57KgOYhhLRfmg.x.PJcaaqr19LDl4chQWFkbl4ea4QKnG', '326767', '2023-06-10 16:47:52'),
(4, '7879896651', 'mohdkadiwal786@gmail.com', '$2y$10$O.HsQXzpniMNUjYk4dnhX./jV/v0B3m4GykLe2sOj7gnUzoL1wxNS', '330512', '2023-06-10 16:49:41'),
(6, '7879896651', 'mohdkadiwal786@gmail.com', '$2y$10$lmnGPrvIcp0gEyZ5AxCBxeZ/XTQFKWyH6unObEWeA9yoj7sw4S3Iy', '271194', '2023-06-10 16:58:10'),
(7, '7879896651', 'mohdkadiwal786@gmail.com', '$2y$10$C6yiwrgZ8PfcjNzQEsLa6elVBev0uMBTfZvuR/.BmfYkeuEdPKZ5C', '314016', '2023-06-10 16:59:40'),
(12, '9313048933', 'mohdkadiwal786@gmail.com', '$2y$10$kGdNiYoNfpAU/zizj.DA4.ORfleII4lyur5fL1jjHZ75FaC/k2Kpe', '112388', '2023-06-10 17:33:17'),
(14, '7879896651', 'mohdkadiwal786@gmail.com', '$2y$10$tzEjU202BJ7EPsh6GME1OOSkgifegzlAXy3a9h2P8hb7UfruRYzhq', '250763', '2023-06-10 17:37:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_detail`
--
ALTER TABLE `seller_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `seller_login`
--
ALTER TABLE `seller_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_detail`
--
ALTER TABLE `seller_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `seller_detail`
--
ALTER TABLE `seller_detail`
  ADD CONSTRAINT `seller_detail_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller_login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
