-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 07:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(20) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`,  `updated_date`) VALUES
(1, 'Nescafe (300g)', 'Beverage brewed from roasted coffee beans.', 250, 280, 30, 'https://e7.pngegg.com/pngimages/648/793/png-clipart-instant-coffee-tea-espresso-latte-coffee-nescafe-jar-food-coffee-tumbnail.png', '2024-05-18 00:00:00', '2025-08-25 00:00:00'),
(2, 'Gardenia Bread', 'Sliced breads are also flavored.', 90, 120, 30, 'https://e7.pngegg.com/pngimages/957/212/png-clipart-white-bread-sliced-bread-gardenia-loaf-bread-cooking-bread.png', '2024-05-18 00:00:00', '2026-02-01 00:00:00'),
(3, 'Birch Tree (33g)', '100% pure cows milk with no added sugar.', 10, 15, 30, 'https://filebroker-cdn.lazada.com.ph/kf/S90ad38324327484890464b56752c1e355.jpg', '2024-05-18 00:00:00', '2027-05-28 00:00:00'),
(4, 'Brown Sugar (1kl)', 'All sweet carbohydrates.', 80, 100, 40, 'https://mygroceryph.com/pub/media/catalog/product/cache/942fb7ebd8f124d7d8ad39312cbc983a/h/e/hermano_brown_sugar_1kg.png', '2024-05-18 00:00:00', '2030-10-05 00:00:00');

-- --------------------------------------------------------


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'rayon', 'q1w2e3r4t5y6u7i8o9', '2024-04-29 16:39:58');

--
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
