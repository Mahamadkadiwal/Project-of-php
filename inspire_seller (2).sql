-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 01:29 PM
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
  `p_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `subcategory` varchar(250) NOT NULL,
  `p_image` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `seller_price` int(100) NOT NULL,
  `return_price` int(250) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_weight` int(100) NOT NULL,
  `sizes` varchar(250) NOT NULL,
  `product_details` varchar(250) NOT NULL,
  `manufacturer_details` varchar(250) NOT NULL,
  `product_quantity` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  `seller_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addsinglecategory`
--

INSERT INTO `addsinglecategory` (`p_id`, `category`, `subcategory`, `p_image`, `date`, `seller_price`, `return_price`, `product_name`, `product_weight`, `sizes`, `product_details`, `manufacturer_details`, `product_quantity`, `status`, `seller_id`) VALUES
(28, '1', '1', 'banner-6-img.jpg', '2023-07-03', 0, 0, '', 0, 'M', '', '', '', 1, 1),
(29, '1', '2', '1.png', '2023-07-03', 1, 1, '', 0, 'M,L', '', '', '1', 1, 3),
(30, '1', '2', '2.jpg', '2023-07-03', 2, 2, '', 0, 'M', '', '', '2', 1, 3),
(31, '1', '1', 'Blazer-3.jpg', '2023-07-03', 3, 3, '', 0, 'L', '', '', '3', 1, 2),
(32, '1', '1', 'banner-6-img.jpg', '2023-07-03', 4, 4, '', 0, 'L', '', '', '4', 1, 3),
(33, '1', '1', 'banner-6-img.jpg', '2023-07-03', 5, 5, '', 0, 'M', '', '', '5', 1, 2),
(34, '1', '1', 'banner-6-img.jpg', '2023-07-03', 123, 123, '', 0, 'L', '', '', '123', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` text DEFAULT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `mobile`, `email`, `password`, `verification_code`, `email_verified_at`, `role`, `status`) VALUES
(2, '9313048913', 'mahamad@gmail.com', '$2y$10$OslziVWyE7L0VnZ5yCUKKuAkYlGDT.eoPX5qsH1n5Gdg8dWAiWLcq', '164547', '2023-06-15 11:50:22', 1, 0),
(11, '7898565986', 'mahamad@gmail.com', '$2y$10$6MyY1gdisZAro5x6mka3cu5vrpHIdqHVYV5bA8oYSBChCDm9/PfgW', '100400', '2023-06-15 11:06:34', 1, 0),
(20, '9087878781', 'zakir@gmail.com', '$2y$10$vrnh3UGF/a3muIfjt7Ngw.cOjMcmZijHn/O5xton..GU0vnpX9HxC', '137094', '2023-06-20 07:43:58', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_image` varchar(250) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Clothes', 'Clothing (also known as clothes, garments, dress, apparel, or attire) is any item worn on the body. Typically, clothing is made of fabrics or textiles, but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment, put together.', 'Casual-Shirts-3.jpg', 1, '2023-06-23 11:15:18'),
(12, 'Electronics', 'Electronic product means any manufactured product or device or component part of such a product or device that has an electronic circuit which during operation can generate or emit a physical field of radiation, such as, but not limited to microwave ovens, laser systems or diathermy machines.', 'electronics.jpg', 1, '2023-06-26 07:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `price` int(10) NOT NULL,
  `token` varchar(11) NOT NULL,
  `floor` int(4) NOT NULL,
  `street` varchar(20) NOT NULL,
  `order_status` int(20) NOT NULL,
  `payment_type` int(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `landmark` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `user_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `price`, `token`, `floor`, `street`, `order_status`, `payment_type`, `payment_status`, `landmark`, `city`, `state`, `pincode`, `user_id`, `created_at`) VALUES
(10, 'jeel', '', '13234423', 123, 'ads', 123, 'wdasc', 2, 122, 'sucess', 'dsc', 'dsczx', 'asc', '2133', 1, '2023-07-03 06:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Canceled'),
(4, 'Complete');

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
  `seller_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_detail`
--

INSERT INTO `seller_detail` (`id`, `seller_id`, `floor`, `street`, `landmark`, `city`, `state`, `pincode`, `account_number`, `confirm_account_number`, `ifsc_code`, `store_name`, `seller_name`, `status`) VALUES
(1, 1, '112', 'Rampura', 'Patharpaul', 'Kakoshi', 'Gujarat', 384290, 78000122236999, 7800012223699, 'BOBA1233', 'LATHAL Clothes', 'Haresh Chaidhary', 1),
(12, 2, '100', 'Rampura', 'Patharpaul', 'Kakoshi', 'Gujarat', 384290, 78500200036900, 78500200036900, 'BABOSID12', 'LATHAL Clothes', 'Haresh Godad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `image`, `status`, `created_at`) VALUES
(1, 1, 'T-shirt', '', 1, '2023-06-26 08:33:53'),
(2, 1, 'Shirt', '', 1, '2023-06-26 07:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `mobile`, `password`, `verification_code`, `email_verified_at`) VALUES
(1, 'mahamad@gmail.com', '987 486-5312', '$2y$10$PpvK2kCPej3K.2LNtZvJjuhSVVJRTZ2uScT1l5FoiJh1QdQOh2uKq', '196829', '2023-06-21 09:07:09'),
(2, 'zeel@gmail.com', '897 986-5564', '$2y$10$6U3roXugSt5jsvHh2yLHj..2gPWJvYvZ0D.o9K79Kq/MG8dz2zSRK', '179979', '2023-06-21 08:49:17'),
(3, 'zeel@gmail.com', '987 486-5312', '$2y$10$/Fk8YB9rrX2ukG81T1ARE.z2eOEf6nhB0WskXkDdEgtOFLzHyERoi', '228233', '2023-06-24 10:51:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsinglecategory`
--
ALTER TABLE `addsinglecategory`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_status` (`order_status`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_detail`
--
ALTER TABLE `seller_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addsinglecategory`
--
ALTER TABLE `addsinglecategory`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_detail`
--
ALTER TABLE `seller_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `addsinglecategory` (`p_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
