-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 02:22 AM
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
-- Database: `x`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `state`, `postal_code`, `country`, `created_at`) VALUES
(4, 1, 'sankana', 'sdjsand', 'sadkjsakd', 'sdnadnsa', 'asdkjasdk', '2024-05-24 02:25:48'),
(5, 1, 'sdasdasd', 'sadasd', 'sadsad', 'asdsad', 'sadasdas', '2024-05-24 02:30:24'),
(6, 1, 'sdfsdf', 'sdfsd', 'sdfsdf', 'sdfsdf', 'sdfsdf', '2024-05-24 02:32:47'),
(7, 1, 'ewrwer', 'werewrwe', '', 'werewrwer', 'erwer', '2024-05-24 02:34:39'),
(8, 1, 'sdasd', 'sadasd', '', 'asdsad', 'dsad', '2024-05-24 02:35:36'),
(9, 1, 'sdfsdf', 'sfdsfsdf', 'sdfsdfsd', 'sdfsdfsd', 'sdfsdfsd', '2024-05-24 02:54:15'),
(10, 1, 'ewrewr', 'ewrewr', 'ewrewr', 'ewrewr', 'ewrwer', '2024-05-25 18:34:42'),
(11, 1, 'asdsad', 'sadsad', 'asdasd', 'sadsad', 'sadsad', '2024-05-25 18:37:58'),
(12, 1, 'sdsad', 'sadsad', 'asdsad', 'sadsa', 'sadsad', '2024-05-25 23:17:16'),
(13, 1, 'sdsad', 'sadsad', 'asdsad', 'sadsa', 'sadsad', '2024-05-25 23:24:43'),
(14, 1, 'sdsad', 'sadsad', 'asdsad', 'sadsa', 'sadsad', '2024-05-25 23:31:39'),
(15, 1, 'dasdsad', 'asdsad', 'asdsad', 'asdsad', 'sadasd', '2024-05-25 23:32:48'),
(16, 1, 'sdasdsa', 'asdsad', 'sdasd', 'asdsad', 'asdasdsad', '2024-05-25 23:48:52'),
(17, 1, 'sdasdsa', 'asdsad', 'sdasd', 'asdsad', 'asdasdsad', '2024-05-25 23:49:04'),
(18, 1, 'dsadasd', 'asdsadsa', 'asdsadsa', 'asdsdw', 'awdawdawd', '2024-05-26 00:07:22'),
(19, 1, 'sdasd', 'asdasd', 'sadsad', 'asdsadsa', 'PHI', '2024-05-26 00:22:01'),
(20, 1, '23213', '23123', '123213', '213213', 'PHI', '2024-05-26 00:29:35'),
(21, 1, '324324', '324324', '23432', '231232', 'CA', '2024-05-26 00:42:30'),
(22, 1, 'dsadsa', 'asdsadas', 'asdasd', 'asdsadsa', 'PHI', '2024-05-26 00:44:41'),
(23, 1, '1232321', '23123', '2312', 'weqeqw', 'CA', '2024-05-26 01:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) UNSIGNED NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_number`, `expiry_date`, `cvv`, `amount`) VALUES
(1, 'asdsad', '2323', 'wew', 21341242.00),
(2, 'joasd', 'asdsads', 'sda', 0.00),
(3, 'dasd', 'asdsad', 'sad', 0.00),
(4, 'dasd', 'asdsad', 'sad', 0.00),
(5, 'sdsad', 'asdasd', 'sad', 0.00),
(6, '1234567890987654', '10/09/2', '456', 200.00),
(7, '1111111111111111', '2024-05', '111', 700.00),
(11, '3322445566554455', '2024-05', '455', 333.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Yami Yami no Mi \r\n(Dark-Dark Fruit)', 'Allows the user to control and manipulate darkness, making it nearly impossible to hit or touch them. Blackbeard’s mastery of this fruit makes him a formidable opponent.', 67000000, 89, 57, 'https://mycollectorsoutpost.com/cdn/shop/files/devil-fruit-pin-blackbeard-dark-dark-fruit_1445x.jpg?v=1699046557', '2024-05-12 00:00:00'),
(2, 'Gura Gura no Mi (Gravity-Gravity Fruit)', 'Enables the user to create devastating earthquakes and shockwaves, making it a powerful tool for combat and destruction.', 58000000, 89, 35, 'https://preview.redd.it/nd7yujwe5ss81.png?width=600&format=png&auto=webp&s=897685d5f796b9a7f116e25fc42a02666567ed6d', '2024-05-12 00:00:00'),
(3, 'Pika Pika no Mi (Light-Light Fruit)', 'Allows the user to control and manipulate light, making them nearly invisible and able to create powerful blasts of energy.', 47000000, 60, 96, 'https://pm1.narvii.com/7556/0a77368b47cbca717d606dbbcbe83e0f3fe8b58ar1-1024-1024v2_uhq.jpg', '2024-05-12 00:00:00'),
(4, 'Hito Hito no Mi (Human-Human Fruit)', ' Grants the user the ability to transform into a human, making them nearly indestructible and allowing them to adapt to any situation.', 32000000, 28, 40, 'https://ih1.redbubble.net/image.3938097939.0541/raf,750x1000,075,t,fafafa:ca443f4786.jpg', '2024-05-12 00:00:00'),
(5, 'Moku Moku no Mi (Smoke-Smoke Fruit)', 'Enables the user to create and control smoke, making it difficult for opponents to track or attack them.', 41000500, 30, 30, 'https://ih1.redbubble.net/image.3669349652.7960/flat,750x,075,f-pad,750x1000,f8f8f8.jpg', '2024-05-12 00:00:00'),
(6, 'Yomi Yomi no Mi (Revive-Revive Fruit)', 'Allows the user to revive themselves and others, making it a powerful tool for survival and combat.', 27000000, 30, 30, 'https://pbs.twimg.com/media/ELpZ7aXX0AUIneo.jpg', '2024-05-12 00:00:00'),
(7, 'Human-Human Fruit, Model: Nika', 'a mythical Zoan-type Devil Fruit that grants the consumer the ability to transform into and gain the attributes of the legendary Sun God Nika.', 95700600, 30, 36, 'https://ih1.redbubble.net/image.5214786803.7431/st,small,507x507-pad,600x600,f8f8f8.u5.jpg', '2024-05-12 00:00:00'),
(8, 'Ope Ope no Mi (Open-Open Fruit)', ' Allows the user to create a space-time distortion, making it difficult for opponents to track or attack them.', 25900897, 30, 30, 'https://ih1.redbubble.net/image.1665104440.1004/st,small,845x845-pad,1000x1000,f8f8f8.jpg', '2024-05-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sale_name` varchar(100) NOT NULL,
  `sale_details` varchar(255) NOT NULL,
  `sale_retail_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_name`, `sale_details`, `sale_retail_price`) VALUES
(0, 'fdsfds', 'sdfdsf', 31232),
(0, 'dsad', 'sdsadsasd', 1234123),
(0, 'adsadasdsa', 'asdsadsad', 4324),
(0, 'slajdlsa', 'dasndlksanlsa', 12312312);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(2, 'opop', '$2y$10$Am8Qz/CkG2DwolWsIRz6wuq4jsq/jxNXLtFUG/wUpZZ1D2m1X642C', '2024-05-24 01:00:35'),
(3, 'OPOP12', '$2y$10$WdT7RnVn2hupQ0m1H4Yite02fuX/A71L8W2U2aW2vbJUfhzE/7tDi', '2024-05-25 13:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `age` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `age`) VALUES
(1, 1, 'joshau', 'quidit', 2147483647, 77),
(2, 1, 'dasdsad', 'asdsads', 3432, 213),
(3, 1, 'joahu', 'Sas', 2324, 12),
(4, 1, 'joshuad', 'qhiowydioa', 2147483647, 12),
(5, 1, 'sdsadsa', 'asdsadsa', 0, 0),
(6, 1, 'sdhlsahdlsald', 'sadasdsa', 0, 0),
(7, 1, '83y43yr', '432rd32', 936756836, 12),
(8, 1, '83y43yr', '432rd32', 936756836, 12),
(9, 1, '83y43yr', '432rd32', 936756836, 12),
(10, 1, 'joshua', 'oqwyeowqiehw', 0, 23),
(11, 1, 'joajsAS', 'SasA', 2147483647, 2),
(12, 1, 'dfsdf', 'sdfsdfds', 2147483647, 23),
(13, 1, 'sndsndsa', 'sdsadsa', 2147483647, 34),
(14, 1, 'sadsd', 'sdsaddsa', 2147483647, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
