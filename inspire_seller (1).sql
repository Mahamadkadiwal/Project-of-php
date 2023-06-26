-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 11:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `product_quantity` varchar(250) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addsinglecategory`
--

INSERT INTO `addsinglecategory` (`id`, `category`, `subcategory`, `image`, `date`, `seller_price`, `return_price`, `product_name`, `product_weight`, `sizes`, `product_details`, `manufacturer_details`, `product_quantity`, `status`) VALUES
(26, '1', '2', 'Casual-Shirts-2.png', '2023-06-21', 400, 0, 'Casual Shirts', 400, 'S,M,L,XL', 'A long- or short-sleeved garment for the upper part of the body, usually lightweight and having a collar and a front opening', '', '100', 1),
(27, '1', '2', 'Casual-Shirts-2.png', '2023-06-23', 350, 300, 'Casual Shirts', 200, 'S,M,L,XL', 'A long- or short-sleeved garment for the upper part of the body, usually lightweight and having a collar and a front opening', 'dsds', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `mobile`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Zeel Patel', '8696059685', 'zeel@gmail.com', '$2y$10$/Fk8YB9rrX2ukG81T1ARE.z2eOEf6nhB0WskXkDdEgtOFLzHyERoi', 0, '2023-06-24 04:37:24'),
(2, 'Mahamadali kadiwala ', '8696059685', 'mahamad@gmail.com', '$2y$10$6U3roXugSt5jsvHh2yLHj..2gPWJvYvZ0D.o9K79Kq/MG8dz2zSRK', 1, '2023-06-24 04:37:24');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `status`, `created_at`) VALUES
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
  `landmark` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` varchar(30) NOT NULL,
  `user_id` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `price`, `token`, `floor`, `street`, `landmark`, `city`, `state`, `pincode`, `user_id`, `created_at`) VALUES
(1, 'Mahamad ali kadiwal', 'zeel@gmail.com', '9876543256', 35000, 'tok_1NM2EAS', 101, 'Rangnagar', 'Kothi', 'Sidhpur', 'Gujarat', '384151', '2', '2023-06-23 05:08:14'),
(3, 'Mahamad ali kadiwal', 'zeel@gmail.com', '89798479848', 400, 'tok_1NM2qvS', 101, 'Rangnagar', 'Kothi', 'Sidhpur', 'Gujarat', '385415', '2', '2023-06-23 05:48:17'),
(4, 'Mahamad ali kadiwal', 'zeel@gmail.com', '7897879878', 400, 'tok_1NM2uJS', 101, 'Rangnagar', 'Kothi', 'Sidhpur', 'Gujarat', '398855', '2', '2023-06-23 05:51:47'),
(5, 'Mahamad ali kadiwal', 'zakir@gmail.com', '879864763514', 400, 'tok_1NN9NNS', 101, 'Rangnagar', 'Kothi', 'Sidhpur', 'Gujarat', '384290', '2', '2023-06-26 06:58:21');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_detail`
--

INSERT INTO `seller_detail` (`id`, `seller_id`, `floor`, `street`, `landmark`, `city`, `state`, `pincode`, `account_number`, `confirm_account_number`, `ifsc_code`, `store_name`, `seller_name`, `status`) VALUES
(1, 1, '112', 'Rampura', 'Patharpaul', 'Kakoshi', 'Gujarat', 384290, 78000122236999, 7800012223699, 'BOBA1233', 'LATHAL Clothes', 'Haresh Chaidhary', 1),
(12, 2, '100', 'Rampura', 'Patharpaul', 'Kakoshi', 'Gujarat', 384290, 78500200036900, 78500200036900, 'BABOSID12', 'LATHAL Clothes', 'Haresh Godad', 1);

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
  `email_verified_at` datetime DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_login`
--

INSERT INTO `seller_login` (`id`, `mobile`, `email`, `password`, `verification_code`, `email_verified_at`, `role`) VALUES
(2, '9313048913', 'mahamad@gmail.com', '$2y$10$OslziVWyE7L0VnZ5yCUKKuAkYlGDT.eoPX5qsH1n5Gdg8dWAiWLcq', '164547', '2023-06-15 11:50:22', 1),
(11, '7898565986', 'mahamad@gmail.com', '$2y$10$6MyY1gdisZAro5x6mka3cu5vrpHIdqHVYV5bA8oYSBChCDm9/PfgW', '100400', '2023-06-15 11:06:34', 1),
(20, '9087878781', 'zakir@gmail.com', '$2y$10$vrnh3UGF/a3muIfjt7Ngw.cOjMcmZijHn/O5xton..GU0vnpX9HxC', '137094', '2023-06-20 07:43:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `image`, `status`, `created_at`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_detail`
--
ALTER TABLE `seller_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seller_login`
--
ALTER TABLE `seller_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
