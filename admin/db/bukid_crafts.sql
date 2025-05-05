-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 03:07 AM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'Hinabol Woven Cloth', 850),
(2, 'T\'nalak-Inspired Pouch', 350),
(3, 'Handwoven Table Runner', 500),
(4, 'Hinabol Shoulder Bag', 950),
(5, 'Bamboo Tray', 300),
(6, 'Wooden Mortar & Pestle', 450),
(7, 'Carved Bamboo Lantern', 600),
(8, 'Bamboo Mug Set', 400),
(9, 'Beaded Tribal Necklace', 250),
(10, 'Beaded Coin Purse', 150),
(11, 'Beaded Headband', 180),
(12, 'Beaded Earrings', 120);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sender_info` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`sender_info`, `subject`, `message`, `created_at`) VALUES
('Ed Caluag', 'Approving Email', 'edcaluag@gmail.com', '2025-05-03 12:40:23'),
('Christine', 'Approving Email', 'dasda', '2025-05-03 12:46:52');

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
(12, 'Hello', 'HelloWorld@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929294993', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon'),
(13, 'Daniel', 'DanielPadilla@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929294996', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon'),
(14, 'Gwapo', 'GwapoAko@gmail.com', '19e56e0e8e9e4d6fafae554524aa4801', '9929295996', 'Manolo Fortich', 'Zone 5 , San Isidro, Lunocan, Manolo Fortich, Bukidnon');

-- --------------------------------------------------------

--
-- Table structure for table `user_item`
--

CREATE TABLE `user_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed','','') NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_item`
--

INSERT INTO `user_item` (`id`, `user_id`, `item_id`, `status`, `date_time`) VALUES
(1, 1, 2, 'Confirmed', '2020-06-07 21:08:35'),
(2, 1, 10, 'Confirmed', '2020-06-07 21:08:38'),
(3, 3, 7, 'Confirmed', '2020-06-07 21:09:06'),
(4, 3, 12, 'Confirmed', '2020-06-07 21:09:10'),
(5, 5, 5, 'Confirmed', '2020-06-07 21:22:01'),
(6, 5, 1, 'Confirmed', '2020-06-07 21:22:03'),
(8, 10, 3, 'Confirmed', '2025-05-03 16:25:12'),
(9, 7, 1, 'Confirmed', '2025-05-03 16:28:01'),
(10, 7, 2, 'Confirmed', '2025-05-03 16:41:26'),
(11, 7, 3, 'Confirmed', '2025-05-03 16:41:29'),
(12, 7, 4, 'Confirmed', '2025-05-03 16:41:45'),
(13, 7, 5, 'Confirmed', '2025-05-03 16:41:48'),
(14, 7, 3, 'Confirmed', '2025-05-03 16:48:34'),
(15, 7, 11, 'Confirmed', '2025-05-03 16:49:19'),
(16, 7, 3, 'Confirmed', '2025-05-03 16:55:02'),
(17, 14, 10, 'Confirmed', '2025-05-04 07:30:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_item`
--
ALTER TABLE `user_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
