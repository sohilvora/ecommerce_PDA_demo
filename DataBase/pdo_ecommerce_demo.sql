-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 07:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdo_ecommerce_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slug_url` text NOT NULL,
  `brand_category_id` varchar(50) NOT NULL,
  `brand_created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_slug_url`, `brand_category_id`, `brand_created_at`) VALUES
(1, 'Realme', 'realme', '2', '2024-04-17 15:59:29'),
(2, 'Oppo', 'oppo', '2', '2024-04-17 15:59:38'),
(3, 'Sony', 'sony', '3', '2024-04-17 15:59:46'),
(4, 'Oneplus', 'oneplus', '3', '2024-04-17 15:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug_url` text NOT NULL,
  `cat_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_slug_url`, `cat_created_at`) VALUES
(2, 'Mobile', 'mobile', '2024-04-17 11:40:53'),
(3, 'TV', 'tv', '2024-04-17 11:41:02'),
(4, 'Clothes', 'clothes', '2024-04-17 11:41:13'),
(5, 'Grocery', 'grocery', '2024-04-17 11:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `category_id` int(20) NOT NULL,
  `brand_id` int(20) NOT NULL,
  `regular_price` varchar(50) NOT NULL,
  `selling_price` varchar(50) NOT NULL,
  `product_thumbnail` text NOT NULL,
  `short_description` text NOT NULL,
  `long_description` longtext NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `category_id`, `brand_id`, `regular_price`, `selling_price`, `product_thumbnail`, `short_description`, `long_description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Realme 12 5g', 2, 1, '17999', '15999', '20240417082015.jpg', 'fbfjhfjhrefjbrjfbrj', 'rkjfrjkfkrjfrbfrbbfnrf', '1', '2024-04-17 20:20:15', '2024-04-17 18:20:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_thumbnails`
--

CREATE TABLE `product_thumbnails` (
  `thumbnail_id` int(11) NOT NULL,
  `product_id` int(20) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `thumbnail_name` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_age` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_thumbnails`
--
ALTER TABLE `product_thumbnails`
  ADD PRIMARY KEY (`thumbnail_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_thumbnails`
--
ALTER TABLE `product_thumbnails`
  MODIFY `thumbnail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
