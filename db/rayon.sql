-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2024 at 11:00 AM
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
-- Database: `r`
--

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
(1, 'Barako', 'One of the most famous types of Philippine coffee, Barako is known for its strong and bold flavor. It have grown primarily in the Batangas region and is often compared to Liberica beans due to its large size and distinct taste.', 105, 85, 100, 'https://thehouseofgoodies.com/cdn/shop/products/coffee_1080x.png?v=1554386136', '2024-05-12 02:47:06'),
(2, 'Sagada', 'Hailing from the Mountain Province of Sagada, this Arabica coffee is known for its smooth and balanced taste. It has a medium body with floral notes and a slightly nutty finish.\r\n\r\n', 67, 89, 333, 'https://imgs.search.brave.com/QfMwV_bZDIDS5GmJVRo4z5D5NJeTay8lY_v47TGRK0w/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAy/MS8wOC9zYWdhZGEt/Y29mZmVlLWJlYW5z/LXdhc2hlZC1wcm9j/ZXNzLWJ5LWNvZmZl/ZWxsZXJhLmpwZWc_/Zml0PTE2MzksMjA0/OCZzc2w9MQ', '2024-05-12 08:15:10'),
(3, 'Benguet', 'Another Arabica variety, Benguet coffee is cultivated in the Cordillera mountains. It offers a bright acidity with a clean and crisp taste. Its flavor profile includes floral and fruity notes, often accompanied by a subtle sweetness.', 470, 60, 96, 'https://imgs.search.brave.com/Yt_evyzbh6tvBa3Y2sCsHNZ6i24VWWQFDc6xZYiNomc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9zYWlu/dG5pY2hvbGFzY29m/ZmVldGVhLmNvbS9j/ZG4vc2hvcC9wcm9k/dWN0cy9CZW5ndWV0/cG91Y2hhbmR0dWJl/LnBuZz92PTE1OTU1/MTM2OTY', '2024-05-12 04:01:53'),
(4, 'Matutum', 'Grown in the province of South Cotabato, Matutum coffee is an Arabica variety renowned for its complex flavor profile. It features a full-bodied taste with hints of caramel, chocolate, and a pleasant acidity.', 320, 28, 40, 'https://imgs.search.brave.com/D3O_g8-BbhfXWVp01XBb5MRC6ve-3NlPGIPVmXrUG6M/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/OS8wMy9tdC1tYXR1/dHVtLWNvZmZlZS1i/ZWFucy13YXNoZWQt/cHJvY2Vzcy1hcmFi/aWNhLmpwZz9maXQ9/MTA4MCwxMDgwJnNz/bD0x', '2024-05-12 06:21:30'),
(5, 'Amadeo', 'Known as the \"Coffee Capital of the Philippines,\" Amadeo in Cavite produces a significant amount of Robusta coffee. Amadeo Robusta is characterized by its bold flavor, intense aroma, and rich crema, making it ideal for espresso blends.', 410, 30, 30, 'https://imgs.search.brave.com/uG6EjGjlWPTYxLk8cZGUw3VGHy6wOruBLL5SYMxl_t0/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9ibG9n/Z2VyLmdvb2dsZXVz/ZXJjb250ZW50LmNv/bS9pbWcvYi9SMjl2/WjJ4bC9BVnZYc0Vp/UXp5bUI0TDFmRHFG/V2JZcHdwMG9hdUNs/MG1vb1dBVHFzNUp2/ek4tXzZnUjFzZmtZ/QVBiQngwTXlMSjJz/U3NOQVRFb2hHNEtw/eGwySV8tWXhlYVNE/cHgyN25uS2lYZkVZ/cDRsaTl0bnpZM18t/YXVmaGxqNTBLN3df/ZlJrUE9Jc3lHWDMz/alUwa2RuZVlkL3Mx/NjAwLXJ3L2NhZmUt/YW1hZGVvLWNhdml0/ZS1yZXZpZXctY29m/ZmVlLWJhZy5qcGc', '2024-05-12 03:29:28'),
(6, 'Atok', 'Atok coffee comes from the municipality of Atok in Benguet province. This Arabica variety is celebrated for its bright acidity and lively flavors, which often include citrus notes and a smooth, clean finish.', 270, 30, 30, 'https://imgs.search.brave.com/-t04l4CqqQu1rDjmPioZLGBt-A7-pFcDPHmhKpVUoQI/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/Ym9zY29mZmVlLmNv/bS9jZG4vc2hvcC9w/cm9kdWN0cy9QaGls/aXBwaW5lQ29mZmVl/QXRva0JlYW5zMjUw/Zy5qcGc_dj0xNjY1/MzgyODM3', '2024-05-12 07:12:51'),
(7, 'Alamid (Civet)', 'Considered one of the rarest and most exotic coffees globally, Alamid coffee is produced from beans that have been ingested and excreted by civet cats. This unique processing method results in a remarkably smooth and mellow brew with low acidity and hints of caramel and chocolate.', 957, 30, 36, 'https://imgs.search.brave.com/0UJ3XuUktY-NxtWuVz3hK5rjpLvfjtLTBHQs7Ztga1w/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9zYWlu/dG5pY2hvbGFzY29m/ZmVldGVhLmNvbS9j/ZG4vc2hvcC9wcm9k/dWN0cy9BbGFtaWRu/Z010LkFwb3BvdWNo/YW5kdHViZS5wbmc_/dj0xNTk1NTA2Mzk1', '2024-05-12 04:18:11'),
(8, 'Mount Apo', 'Grown in the fertile soils of Mount Apo, the highest peak in the Philippines, this Arabica coffee is prized for its exceptional quality. It typically exhibits a balanced flavor profile with notes of citrus, floral tones, and a velvety mouthfeel.\r\n\r\n', 259, 30, 30, 'https://imgs.search.brave.com/TaX7GHlAO97HJYqtAkX_O1WokyI8YYMycUnzqlY5zG0/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pMC53/cC5jb20vd3d3LmNv/ZmZlZWxsZXJhLmNv/bS93cC1jb250ZW50/L3VwbG9hZHMvMjAx/OS8wMy9tdC1hcG8t/Y29mZmVlLWJlYW5z/LW5hdHVyYWwtcHJv/Y2Vzcy1hcmFiaWNh/LmpwZz9maXQ9MTA4/MCwxMDgwJnNzbD0x', '2024-05-12 02:06:41');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
