-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 01:04 PM
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
-- Table structure for table `addsinglecategory`
--

CREATE TABLE `addsinglecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `subcategory` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seller_price` int(100) NOT NULL,
  `return_price` int(250) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_weight` int(100) NOT NULL,
  `sizes` varchar(250) NOT NULL,
  `product_details` varchar(250) NOT NULL,
  `manufacturer_details` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addsinglecategory`
--

INSERT INTO `addsinglecategory` (`id`, `category`, `subcategory`, `image`, `date`, `seller_price`, `return_price`, `product_name`, `product_weight`, `sizes`, `product_details`, `manufacturer_details`, `product_quantity`) VALUES
(1, '3', '2', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(2, '3', '2', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(3, '3', '1', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(4, '3', '1', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(5, '3', '1', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(6, '3', '1', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(7, '3', '1', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(8, '3', '2', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(9, '3', '2', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(10, '5', '6', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(11, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(12, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(13, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(14, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(15, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(16, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(17, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(18, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(19, '5', '7', 'Screenshot (65).png', '2023-06-20', 0, 0, '', 0, '', '', '', ''),
(20, '5', '7', 'Screenshot (65).png', '2023-06-20', 100, 100, 'Borad', 50, '', 'light bord ', 'kjwv  ikbwe  uibvw kjbWVB ', '10'),
(21, '3', '2', 'Screenshot (65).png', '2023-06-20', 100, 100, 'piur', 20, '', 'oiuyt', 'ertyui', '20'),
(22, '4', '4', 'Screenshot (65).png', '2023-06-20', 100, 90, 'doll', 200, '', 'ppppp', 'ppp', '200'),
(23, '4', '4', 'Screenshot (65).png', '2023-06-20', 100, 90, 'doll', 200, '', 'ppppp', 'ppp', '200'),
(24, '3', '2', 'Screenshot (65).png', '2023-06-20', 100, 99, 'peankgjyfc', 100, 'XL', 'kugv', 'kugjhv', '20'),
(25, '3', '2', 'Screenshot (65).png', '2023-06-20', 100, 99, 'peankgjyfc', 100, 'XL', 'kugv', 'kugjhv', '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsinglecategory`
--
ALTER TABLE `addsinglecategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addsinglecategory`
--
ALTER TABLE `addsinglecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
