-- Table structure for table `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `first_login` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `first_login`) VALUES
(1, 'rayon', '$2y$10$Jpi/YNeMV8ucPMjGkfRPKuXHscP5h8OVYjybkn3NKAWwYG1WTTdQy', '2024-06-02 21:26:41', 1);

--
-- --------------------------------------------------------
--
-- Table structure for table `user_info`
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL, -- Changed data type to varchar
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_info_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `user_info`
INSERT INTO `user_info` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 1, 'Evarine', 'Rayon', '2147483647'); -- Changed phone_number to a string value
--
-- --------------------------------------------------------
--
-- Table structure for table `products`
CREATE TABLE `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Barako', 'Barako is known for its strong and bold flavor.', 105, 85, 100, 'https://thehouseofgoodies.com/cdn/shop/products/coffee_1080x.png?v=1554386136', '2024-05-12 02:47:06'),
(2, 'Sagada', 'Arabica coffee is known for its smooth and balanced taste.', 67, 89, 333, 'https://imgs.search.brave.com/QfMwV_bZDIDS5GmJVRo4z5D5NJeTay8lY_v47TGRK0w/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAy/MS8wOC9zYWdhZGEt/Y29mZmVlLWJlYW5z/LXdhc2hlZC1wcm9j/ZXNzLWJ5LWNvZmZl/ZWxsZXJhLmpwZWc_/Zml0PTE2MzksMjA0/OCZzc2w9MQ', '2024-05-12 08:15:10'),
(3, 'Benguet', 'It offers a bright acidity with a clean and crisp taste notes.', 470, 60, 96, 'https://imgs.search.brave.com/Yt_evyzbh6tvBa3Y2sCsHNZ6i24VWWQFDc6xZYiNomc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9zYWlu/dG5pY2hvbGFzY29m/ZmVldGVhLmNvbS9j/ZG4vc2hvcC9wcm9k/dWN0cy9CZW5ndWV0/cG91Y2hhbmR0dWJl/LnBuZz92PTE1OTU1/MTM2OTY', '2024-05-12 04:01:53'),
(4, 'Matutum', 'Grown in the province of South Cotabato and Matutum coffee is an Arabica variety renowned for its complex flavor profile.', 320, 28, 40, 'https://imgs.search.brave.com/D3O_g8-BbhfXWVp01XBb5MRC6ve-3NlPGIPVmXrUG6M/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/OS8wMy9tdC1tYXR1/dHVtLWNvZmZlZS1i/ZWFucy13YXNoZWQt/cHJvY2Vzcy1hcmFi/aWNhLmpwZz9maXQ9/MTA4MCwxMDgwJnNz/bD0x', '2024-05-12 06:21:30'),
(5, 'Amadeo', 'Known as the Coffee Capital of the Philippines Amadeo in Cavite produces a significant amount of Robusta coffee.', 410, 30, 30, 'https://imgs.search.brave.com/uG6EjGjlWPTYxLk8cZGUw3VGHy6wOruBLL5SYMxl_t0/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9ibG9n/Z2VyLmdvb2dsZXVz/ZXJjb250ZW50LmNv/bS9pbWcvYi9SMjl2/WjJ4bC9BVnZYc0Vp/UXp5bUI0TDFmRHFG/V2JZcHdwMG9hdUNs/MG1vb1dBVHFzNUp2/ek4tXzZnUjFzZmtZ/QVBiQngwTXlMSjJz/U3NOQVRFb2hHNEtw/eGwySV8tWXhlYVNE/cHgyN25uS2lYZkVZ/cDRsaTl0bnpZM18t/YXVmaGxqNTBLN3df/ZlJrUE9Jc3lHWDMz/alUwa2RuZVlkL3Mx/NjAwLXJ3L2NhZmUt/YW1hZGVvLWNhdml0/ZS1yZXZpZXctY29m/ZmVlLWJhZy5qcGc', '2024-05-12 03:29:28'),
(6, 'Atok', 'Atok coffee comes from the municipality of Atok in Benguet province.', 270, 30, 30, 'https://imgs.search.brave.com/-t04l4CqqQu1rDjmPioZLGBt-A7-pFcDPHmhKpVUoQI/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/Ym9zY29mZmVlLmNv/bS9jZG4vc2hvcC9w/cm9kdWN0cy9QaGls/aXBwaW5lQ29mZmVl/QXRva0JlYW5zMjUw/Zy5qcGc_dj0xNjY1/MzgyODM3', '2024-05-12 07:12:51'),
(7, 'Alamid (Civet)', 'Considered one of the rarest and most exotic coffees globally also produced from beans that have been ingested and excreted by smooth and mellow brew with low acidity and hints of caramel and chocolate.', 957, 30, 36, 'https://imgs.search.brave.com/0UJ3XuUktY-NxtWuVz3hK5rjpLvfjtLTBHQs7Ztga1w/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9zYWlu/dG5pY2hvbGFzY29m/ZmVldGVhLmNvbS9j/ZG4vc2hvcC9wcm9k/dWN0cy9BbGFtaWRu/Z010LkFwb3BvdWNo/YW5kdHViZS5wbmc_/dj0xNTk1NTA2Mzk1', '2024-05-12 04:18:11'),
(8, 'Mount Apo', 'Grown in the fertile soils of Mount Apo and the highest peak in the Philippines.', 259, 30, 30, 'https://imgs.search.brave.com/TaX7GHlAO97HJYqtAkX_O1WokyI8YYMycUnzqlY5zG0/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/OS8wMy9tdC1hcG8t/Y29mZmVlLWJlYW5z/LW5hdHVyYWwtcHJv/Y2Vzcy1hcmFiaWNh/LmpwZz9maXQ9MTA4/MCwxMDgwJnNzbD0x', '2024-05-12 02:06:41');


-- Table structure for table `addresses`
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) DEFAULT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_address_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `state`, `postal_code`, `country`, `created_at`) VALUES
(1, 22, 'afawf', 'awfwaf', 'awfwaf', 'awfwaf', 'PHI', '2024-06-02 22:07:46'),
(2, 22, 'afawf', 'awfwaf', 'awfwaf', 'awfwaf', 'PHI', '2024-06-02 22:37:02'),
(3, 22, 'afawf', 'awfwaf', 'awfwaf', 'awfwaf', 'PHI', '2024-06-02 22:38:53');

-- 
-- --------------------------------------------------------
-- 

-- Table structure for table `payments`
CREATE TABLE `payments` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_payment_address` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `card_number`, `expiry_date`, `cvv`, `amount`) VALUES
(12, '1234231212121212', '2024-06', '454', 60.00);

--
-- --------------------------------------------------------
-- Table structure for table `purchases`
CREATE TABLE `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_purchase_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `product_id`, `productName`, `price`, `purchase_date`) VALUES
(1, 100, 'erwer', 144.00, '2024-06-02 13:59:40'),
(2, 101, 'dasd', 600.00, '2024-06-02 14:01:16'),
(3, 102, 'dasd', 123.00, '2024-06-02 14:04:55'),
(4, 103, 'bfkewb', 1354.00, '2024-06-02 14:08:59'),
(5, 104, 'efdsf', 5767.00, '2024-06-02 14:12:15');

-- --------------------------------------------------------

-- Add foreign key constraint for user_info table
ALTER TABLE user_info
ADD CONSTRAINT fk_user_info_user
FOREIGN KEY (user_id) REFERENCES users(id);

-- Add foreign key constraint for addresses table
ALTER TABLE addresses
ADD CONSTRAINT fk_address_user
FOREIGN KEY (user_id) REFERENCES users(id);

-- Add foreign key constraint for payments table
ALTER TABLE payments
ADD CONSTRAINT fk_payment_address
FOREIGN KEY (address_id) REFERENCES addresses(id);

-- Add foreign key constraint for purchases table
ALTER TABLE purchases
ADD CONSTRAINT fk_purchase_product
FOREIGN KEY (product_id) REFERENCES products(id);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
