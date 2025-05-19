-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 06:07 AM
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
-- Database: `bukidcraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `idcar` int(10) UNSIGNED NOT NULL,
  `status` int(2) NOT NULL,
  `vehiculenumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`idcar`, `status`, `vehiculenumber`) VALUES
(3, 0, '123'),
(5, 0, '456');

-- --------------------------------------------------------

--
-- Table structure for table `chariot`
--

CREATE TABLE `chariot` (
  `id` int(11) NOT NULL,
  `qty` int(250) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cid`, `name`, `email`, `pwd`, `phonenumber`, `adresse`, `img`) VALUES
(5, 'Aech', 'aek@gmail.com', '$2y$10$DIy2GCS4I2AE4VcS26fnxeJ67MeW79PPqthHgBnj62sHWIjzhX12G', 123456789, 'Manolo', 'profilpic/default-avatar.jpg'),
(7, 'arj', 'rj@gmail.com', '$2y$10$gGQSy.712n1vU/9qLgEQsuWF9IJzFHBZ8QdJgXpryBrxXQyReVZTm', 2147483647, 'tankulan', 'profilpic/default-avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employé`
--

CREATE TABLE `employé` (
  `eid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phno` int(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(120) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `employé`
--

INSERT INTO `employé` (`eid`, `name`, `phno`, `email`, `password`, `type`) VALUES
(1, 'admin', 26248366, 'admin@food.com', '$2y$10$bhZgfD5jh22aUimjxwvkZue8BsM2SVgCAvJmJFARKfp16XVcA2UnK', 'admin'),
(22, 'aaekk', 123454321, 'aaekk@gmail.com', '$2y$10$7gZL3OnHoI0bibD4UjFpFeo/6JvMHmAmc.EzbXME5nM8YWPBE5qXe', 'employe'),
(23, 'chuy', 2147483647, 'chuy@main.com', '$2y$10$RUG297wy54VVNEXbEGDn4uOa/uO820/h3O1hTAW1IfvsUD5RnlTtW', 'employe'),
(26, 'Admin', 0, 'admin@craft.com', '$2y$10$h/Z7gd5HHCP1oXkcJFlFke0Bsfpfy1rfEbGISS6RoSdMkT3oUt.uy', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ordre`
--

CREATE TABLE `ordre` (
  `oid` int(11) NOT NULL,
  `qty` int(25) NOT NULL,
  `status` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ordre`
--

INSERT INTO `ordre` (`oid`, `qty`, `status`, `pid`, `cid`, `order_date`) VALUES
(97, 1, 1, 27, 5, '2025-01-19 10:18:45'),
(98, 1, 1, 28, 5, '2025-02-19 10:18:45'),
(99, 1, 1, 31, 5, '2025-03-19 10:18:45'),
(100, 1, 1, 33, 5, '2025-04-19 10:18:45'),
(101, 1, 1, 31, 5, '2025-05-19 10:18:45'),
(102, 1, 1, 33, 5, '2025-06-19 10:18:45'),
(103, 1, 1, 31, 5, '2025-07-19 10:18:45'),
(104, 1, 1, 33, 5, '2025-08-19 10:18:45'),
(105, 1, 1, 31, 5, '2025-09-19 10:18:45'),
(106, 1, 1, 33, 5, '2025-10-19 10:18:45'),
(107, 1, 1, 29, 5, '2025-11-19 10:18:45'),
(108, 1, 1, 31, 5, '2025-12-19 10:18:45'),
(109, 1, 1, 33, 5, '2025-01-10 10:18:45'),
(110, 1, 1, 29, 5, '2025-02-11 10:18:45'),
(111, 1, 1, 31, 5, '2025-03-12 10:18:45'),
(112, 1, 1, 31, 5, '2025-04-13 10:18:45'),
(113, 1, 1, 31, 5, '2025-05-14 10:18:45'),
(114, 1, 1, 31, 5, '2025-06-15 10:18:45'),
(115, 1, 1, 31, 5, '2025-07-16 10:18:45'),
(116, 1, 1, 31, 5, '2025-08-17 10:18:45'),
(117, 1, 1, 33, 5, '2025-09-18 10:18:45'),
(118, 1, 1, 33, 5, '2025-10-19 10:18:45'),
(119, 1, 0, 31, 7, '2025-11-20 10:18:45'),
(120, 1, 0, 29, 7, '2025-12-21 10:18:45'),
(121, 1, 0, 33, 7, '2025-01-22 10:18:45'),
(122, 1, 0, 42, 7, '2025-02-23 10:18:45'),
(123, 1, 0, 42, 7, '2025-03-24 10:18:45'),
(124, 1, 0, 42, 7, '2025-04-25 10:18:45'),
(125, 1, 0, 40, 7, '2025-05-26 10:18:45'),
(126, 1, 0, 42, 7, '2025-06-27 10:18:45'),
(127, 1, 0, 42, 7, '2025-07-28 10:18:45'),
(128, 1, 0, 42, 7, '2025-08-29 10:18:45'),
(129, 2, 0, 29, 7, '2025-09-30 10:18:45'),
(130, 1, 0, 31, 7, '2025-10-01 10:18:45'),
(131, 1, 0, 33, 7, '2025-11-02 10:18:45'),
(132, 5, 0, 31, 7, '2025-12-03 10:18:45'),
(133, 10, 0, 64, 7, '2025-01-04 10:18:45'),
(134, 8, 0, 56, 7, '2025-02-05 10:18:45'),
(135, 8, 0, 53, 7, '2025-03-06 10:30:13'),
(136, 2, 1, 52, 5, '2025-04-05 09:15:22'),
(137, 1, 1, 53, 5, '2025-04-07 11:30:45'),
(138, 3, 1, 54, 7, '2025-04-10 14:22:18'),
(139, 1, 1, 55, 5, '2025-04-12 16:45:33'),
(140, 2, 1, 56, 7, '2025-04-15 10:10:10'),
(141, 1, 1, 57, 5, '2025-04-18 13:25:47'),
(142, 1, 1, 58, 7, '2025-04-20 15:30:00'),
(143, 2, 1, 59, 5, '2025-04-22 17:45:29'),
(144, 3, 1, 60, 7, '2025-04-25 12:12:12'),
(145, 1, 1, 61, 5, '2025-04-28 09:45:38'),
(146, 5, 1, 52, 7, '2025-05-01 10:00:00'),
(147, 3, 1, 53, 5, '2025-05-03 11:15:25'),
(148, 2, 1, 54, 7, '2025-05-05 14:30:50'),
(149, 4, 1, 55, 5, '2025-05-07 16:45:15'),
(150, 2, 1, 56, 7, '2025-05-09 09:20:35'),
(151, 6, 1, 57, 5, '2025-05-11 12:35:40'),
(152, 1, 1, 58, 7, '2025-05-13 15:50:05'),
(153, 3, 1, 59, 5, '2025-05-15 18:05:30'),
(154, 2, 1, 60, 7, '2025-05-17 10:30:55'),
(155, 5, 1, 61, 5, '2025-05-19 13:45:20'),
(156, 1, 1, 62, 7, '2025-05-21 16:00:45'),
(157, 4, 1, 64, 5, '2025-05-23 19:15:10'),
(158, 2, 1, 65, 7, '2025-05-25 11:30:35'),
(159, 3, 1, 52, 5, '2025-05-27 14:45:00'),
(160, 2, 1, 53, 7, '2025-05-30 17:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `pid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `file` text NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`pid`, `name`, `description`, `price`, `file`, `type`) VALUES
(52, 'Acacia Bowl', 'A beautiful set consisting of one larger and six smaller bowls in a simple, cylindrical shape. Made of light tropical wood. Handcrafted in the Philippines', 200, '1747101721_craft1.png', 'lunch'),
(53, 'Bamboo flask', 'These Bamboo Flasks have lots of Eco-appeal and a high perceived value with their stainless steel finish. Designed to hold an individual cup of coffee or tea.', 799, '1747102827_craft4.png', 'lunch'),
(54, 'Carved Fishing boy ', 'Hand-carved wooden figure from Paete, Philippines, depicting a boy spearing fish. He holds a traditional fishing spear, with one fish caught and another at his feet, set on a sculpted base.', 899, '1747103054_craft5.png', 'lunch'),
(55, 'Abaca purse', 'Handwoven indigenous covers can be made from abaca fabrics such as T\'nalak or Hinabol (Bukidnon), cotton-based fabrics such as Ramit from Binakol  weaves.', 399, '1747103623_Weav1.png', 'breakfast'),
(56, 'Willow Basket', 'Willow baskets feature supple, breathable and very light weight. Rich with a beautiful candy color due to natural discoloration when drying', 399, '1747104460_weav3.png', 'breakfast'),
(57, 'Rattan Basket', 'Woven Rattan Basket. This basket would be used to carry fruits and vegetables from local markets. This basket would be a lovely addition to your collection or to display in your home.\r\n', 199, '1747106393_weav9.png', 'breakfast'),
(58, 'Last Supper ', 'Last Supper carved from wood its good for house decorations it gives spiritual presence in the households.', 1499, '1747107631_craft8.jpg', 'lunch'),
(59, 'Wooden Carabao Figurine', 'A hand made Carabao figurine made from mahogany wood it is traditional carving in bukidnon for its rice production and also its tribute for the carabao\'s.', 249, '1747108064_craft3.png', 'lunch'),
(60, 'Habol', 'Habol is a woven in a precise way it composed with abaca or pinya fabric. It\'s characterized by its vibrant colors and distinctive plaid or checkered patterns.', 299, '1747109512_weav11.png', 'breakfast'),
(61, 'Banig', 'This banig is used for sleeping in the kubo or in the floor it gives warm and comfy feeling when you sleep on it.', 299, '1747109925_weav12.png', 'breakfast'),
(62, 'Bamboo flute', 'Played by blowing the instrument with the nose rather than the mouth. Holding one nostril shut with thumb or finger.', 499, '1747112343_craft9.png', 'lunch'),
(64, 'Bulul', 'Hand carved Filipino Bulul rice god figures, each depicted in a seated position with their knees pulled to their chests and arms resting on their knees.', 499, '1747119255_craft2.jpg', 'lunch'),
(65, 'Tikog Bag', 'The age-old tradition of mat weaving using tikog, a naturally grown grass used to be for personal use only.', 199, '1747553978_weav4.png', 'breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `Did` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phno` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idcar`);

--
-- Indexes for table `chariot`
--
ALTER TABLE `chariot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `employé`
--
ALTER TABLE `employé`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `ordre`
--
ALTER TABLE `ordre`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`Did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `idcar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chariot`
--
ALTER TABLE `chariot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employé`
--
ALTER TABLE `employé`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ordre`
--
ALTER TABLE `ordre`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chariot`
--
ALTER TABLE `chariot`
  ADD CONSTRAINT `chariot_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `clients` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chariot_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `produits` (`pid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
