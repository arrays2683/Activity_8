-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 01:38 AM
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
-- Database: `parane1`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `street`, `city`, `state`, `zip`, `country`, `created_at`, `payment_id`) VALUES
(1, 'kalanawa', 'bukidnon', 'mindanao', '3232', 'Philippines', '2024-05-23 09:47:34', 0),
(2, 'Calanawan', 'Manolo Fortich Bukidnon', 'Mindanao', '8703', 'Philippines', '2024-05-24 02:23:42', 0),
(3, 'kalanawa', 'bukidnon', 'mindanao', '3232', 'Philippines', '2024-05-27 09:14:23', 0),
(4, 'kalanawa', 'bukidnon', 'mindanao', '3232', 'Philippines', '2024-05-27 09:34:12', 0),
(5, 'Calanawan', 'Manolo Fortich, Bukidnon', 'Mindanao', '3232', 'Philippines', '2024-05-29 22:51:55', 0),
(6, 'Calanawan', 'Manolo Fortich, Bukidnon', 'Mindanao', '3232', 'Philippines', '2024-05-29 23:12:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `product_name`, `price`, `total`, `payment_method`, `created_at`, `product_id`) VALUES
(3, 'Taho', 30.00, 0.00, 'PayPal', '2024-05-23 09:26:10', 0),
(5, 'Fish Balls', 18.00, 0.00, 'PayMaya', '2024-05-23 09:27:36', 0),
(6, 'Balut', 20.00, 0.00, 'GCash', '2024-05-23 09:28:55', 0),
(7, 'Balut', 20.00, 0.00, 'PayPal', '2024-05-24 02:23:09', 0),
(8, 'Isaw', 25.00, 0.00, 'PayPal', '2024-05-27 09:14:19', 0),
(9, 'Balut', 20.00, 0.00, 'PayPal', '2024-05-27 09:34:06', 0),
(10, 'Balut', 20.00, 0.00, 'PayPal', '2024-05-29 22:51:49', 0),
(11, 'Fish Balls', 18.00, 0.00, 'PayPal', '2024-05-29 23:11:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`, `user_id`) VALUES
(1, 'Isaw', 'Grilled chicken or pork intestines marinated in a tangy and spicy sauce.', 20, 25, 50, 'https://www.lasabbq.com/cdn/shop/products/BBQChickenIsaw1.jpg', '2024-05-08 00:00:00', 0),
(2, 'Balut', 'Fertilized duck embryo boiled and commonly sold as street food in the Philippines.', 15, 20, 30, 'https://facts.net/wp-content/uploads/2020/10/AdobeStock_279704615.jpeg', '2024-05-08 00:00:00', 0),
(3, 'Kwek-Kwek', 'Quail eggs coated in orange batter and deep-fried, often served with vinegar.', 10, 15, 40, 'https://www.kawalingpinoy.com/wp-content/uploads/2019/07/kwek-kwek-14.jpg', '2024-05-08 00:00:00', 0),
(4, 'Fish Balls', 'Deep-fried fish balls served with sweet and spicy sauce.', 12, 18, 60, 'https://www.foxyfolksy.com/wp-content/uploads/2021/05/fish-balls.jpg', '2024-05-08 00:00:00', 0),
(5, 'Taho', 'Silken tofu topped with sweet syrup and tapioca pearls.', 25, 30, 20, 'https://i0.wp.com/iankewks.com/wp-content/uploads/2023/06/IMG_2347.jpg', '2024-05-08 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(2, 'arlene', '$2y$10$JbxintLe9rHvRuCGIVZfd.fk943ESa5pITzzXJ6.4bTBsdUj3CqJa', '2024-05-23 23:22:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
