-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 12:12 AM
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
-- Database: `bukid_crafts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@bukidcrafts.com', '$2y$10$5EVcVruVh4hXefZqZ0IrcuEUggsEqrSAjo/BX91soId52uNsnHA1u');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `responded` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `responded`) VALUES
(1, 7, 1, 5, 'It was nice i though its not', '2025-05-10 11:17:44', 1),
(2, 7, 2, 5, 'It was nice i though its not', '2025-05-10 11:17:44', 1),
(3, 7, 3, 5, 'It was nice i though its not', '2025-05-10 11:17:44', 0),
(4, 7, 3, 5, 'nice', '2025-05-10 11:31:00', 1),
(6, 7, 3, 3, 'The Products is not good', '2025-05-10 14:44:45', 0),
(7, 7, 6, 4, 'Nice', '2025-05-10 14:48:29', 0),
(8, 7, 7, 5, 'SO good', '2025-05-10 14:50:21', 0),
(9, 7, 6, 1, 'the parcel is broken', '2025-05-10 14:56:59', 0),
(10, 7, 10, 5, 'Solid', '2025-05-10 15:03:59', 0),
(11, 7, 9, 1, 'bobo anlala pangit in actual', '2025-05-10 15:34:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `harsh_words`
--

CREATE TABLE `harsh_words` (
  `id` int(11) NOT NULL,
  `word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `harsh_words`
--

INSERT INTO `harsh_words` (`id`, `word`) VALUES
(1, 'mura'),
(2, 'bobo'),
(3, 'tanga'),
(4, 'ulol'),
(5, 'gago'),
(6, 'peste'),
(7, 'trash'),
(8, 'idiot'),
(9, 'stupid'),
(10, 'dumb'),
(11, 'bastard'),
(12, 'fool'),
(13, 'loser'),
(14, 'retard'),
(15, 'sh*t'),
(16, 'f*ck'),
(17, 'b*tch'),
(18, 'asshole'),
(19, 'motherf*cker'),
(20, 'faggot'),
(21, 'c*nt'),
(22, 'sl*t'),
(23, 'whore'),
(24, 'stinky'),
(25, 'ugly'),
(26, 'useless'),
(27, 'w*ore'),
(28, 'b*tch'),
(29, 'ass'),
(30, 'cock'),
(31, 'bastards'),
(32, 'stfu'),
(33, 'suck'),
(34, 'douche'),
(35, 'slut'),
(36, 'gay'),
(37, 'cocksucker'),
(38, 'retarded'),
(39, 'bullsh*t'),
(40, 'p*ssy'),
(41, 'p*ssed'),
(42, 'wh*re');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `status`) VALUES
(1, 'Hinabol Woven Cloth ', 750, 1),
(2, 'T\'nalak-Inspired Pouch', 350, 1),
(3, 'Handwoven Table Runner', 500, 1),
(4, 'Hinabol Shoulder Bag', 950, 1),
(5, 'Bamboo Tray', 300, 1),
(6, 'Wooden Mortar & Pestle', 450, 1),
(7, 'Carved Bamboo Lantern', 600, 1),
(8, 'Bamboo Mug Set', 400, 1),
(9, 'Beaded Tribal Necklace', 250, 1),
(10, 'Beaded Coin Purse', 150, 1),
(11, 'Beaded Headband', 180, 1),
(12, 'Beaded Earrings', 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(7, 'James', 'jameslaag2003@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9120394751', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon'),
(8, 'Rona Bucio', 'ronab@gmail.com', '05c2c674a552b0ced0009665599e595a', '9120394759', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon'),
(10, 'Arjie Tacasan', 'arjietacasan@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929294994', 'Manolo', 'Bukidnon'),
(11, 'Pidol', 'pidolgwapo@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929294992', 'Manolo Fortich', 'Bukidnon'),
(15, 'Admin', 'admin@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929294996', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon');

-- --------------------------------------------------------

--
-- Table structure for table `user_item`
--

CREATE TABLE `user_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed','','') NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_item`
--

INSERT INTO `user_item` (`id`, `user_id`, `item_id`, `status`, `date_time`, `quantity`) VALUES
(1, 1, 2, 'Confirmed', '2020-06-07 21:08:35', 1),
(2, 1, 10, 'Confirmed', '2020-06-07 21:08:38', 1),
(3, 3, 7, 'Confirmed', '2020-06-07 21:09:06', 1),
(4, 3, 12, 'Confirmed', '2020-06-07 21:09:10', 1),
(5, 5, 5, 'Confirmed', '2020-06-07 21:22:01', 1),
(6, 5, 1, 'Confirmed', '2020-06-07 21:22:03', 1),
(8, 10, 3, 'Confirmed', '2025-05-03 16:25:12', 1),
(9, 7, 1, 'Confirmed', '2025-05-03 16:28:01', 1),
(10, 7, 2, 'Confirmed', '2025-05-03 16:41:26', 1),
(11, 7, 3, 'Confirmed', '2025-05-03 16:41:29', 1),
(12, 7, 4, 'Confirmed', '2025-05-03 16:41:45', 1),
(13, 7, 5, 'Confirmed', '2025-05-03 16:41:48', 1),
(14, 7, 3, 'Confirmed', '2025-05-03 16:48:34', 1),
(15, 7, 11, 'Confirmed', '2025-05-03 16:49:19', 1),
(16, 7, 3, 'Confirmed', '2025-05-03 16:55:02', 1),
(17, 14, 10, 'Confirmed', '2025-05-04 07:30:26', 1),
(20, 7, 7, 'Confirmed', '2025-05-10 09:53:54', 3),
(21, 7, 2, 'Confirmed', '2025-05-10 09:58:47', 2),
(22, 7, 8, 'Confirmed', '2025-05-10 10:58:14', 5),
(23, 7, 2, 'Confirmed', '2025-05-10 11:05:49', 1),
(24, 7, 3, 'Confirmed', '2025-05-10 11:06:03', 1),
(25, 7, 6, 'Confirmed', '2025-05-10 11:06:54', 5),
(26, 7, 8, 'Confirmed', '2025-05-10 11:07:25', 4),
(27, 7, 4, 'Confirmed', '2025-05-10 11:30:26', 50),
(28, 15, 7, 'Confirmed', '2025-05-10 12:17:04', 6),
(29, 7, 3, 'Confirmed', '2025-05-10 14:43:49', 5),
(30, 7, 6, 'Confirmed', '2025-05-10 14:47:46', 1),
(31, 7, 7, 'Confirmed', '2025-05-10 14:49:43', 2),
(32, 7, 4, 'Confirmed', '2025-05-10 14:52:26', 2),
(33, 7, 5, 'Confirmed', '2025-05-10 14:54:57', 2),
(34, 7, 6, 'Confirmed', '2025-05-10 14:55:53', 3),
(35, 7, 11, 'Confirmed', '2025-05-10 15:00:13', 5),
(36, 7, 7, 'Confirmed', '2025-05-10 15:02:09', 1),
(37, 7, 10, 'Confirmed', '2025-05-10 15:03:10', 3),
(38, 7, 9, 'Confirmed', '2025-05-10 15:33:48', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harsh_words`
--
ALTER TABLE `harsh_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_item`
--
ALTER TABLE `user_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `harsh_words`
--
ALTER TABLE `harsh_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_item`
--
ALTER TABLE `user_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
