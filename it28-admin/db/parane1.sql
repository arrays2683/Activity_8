
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Table structure for table `products`
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Dumping data for table `products`
INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Isaw', 'Grilled chicken or pork intestines marinated in a tangy and spicy sauce.', 20, 25, 50, 'https://www.lasabbq.com/cdn/shop/products/BBQChickenIsaw1.jpg', '2024-05-08 00:00:00'),
(2, 'Balut', 'Fertilized duck embryo boiled and commonly sold as street food in the Philippines.', 15, 20, 30, 'https://facts.net/wp-content/uploads/2020/10/AdobeStock_279704615.jpeg', '2024-05-08 00:00:00'),
(3, 'Kwek-Kwek', 'Quail eggs coated in orange batter and deep-fried, often served with vinegar.', 10, 15, 40, 'https://www.kawalingpinoy.com/wp-content/uploads/2019/07/kwek-kwek-14.jpg', '2024-05-08 00:00:00'),
(4, 'Fish Balls', 'Deep-fried fish balls served with sweet and spicy sauce.', 12, 18, 60, 'https://www.foxyfolksy.com/wp-content/uploads/2021/05/fish-balls.jpg', '2024-05-08 00:00:00'),
(5, 'Taho', 'Silken tofu topped with sweet syrup and tapioca pearls.', 25, 30, 20, 'https://i0.wp.com/iankewks.com/wp-content/uploads/2023/06/IMG_2347.jpg', '2024-05-08 00:00:00');

-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58');

-- Table structure for table `payments`
CREATE TABLE `payments` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table structure for table `addresses`
CREATE TABLE `addresses` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `street` VARCHAR(255) NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    `state` VARCHAR(100) NOT NULL,
    `zip` VARCHAR(20) NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


COMMIT;
