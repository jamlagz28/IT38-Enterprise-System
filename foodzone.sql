-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 07:01 AM
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
-- Database: `foodzone`
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
(23, 'chuy', 2147483647, 'chuy@main.com', '$2y$10$RUG297wy54VVNEXbEGDn4uOa/uO820/h3O1hTAW1IfvsUD5RnlTtW', 'employe');

-- --------------------------------------------------------

--
-- Table structure for table `ordre`
--

CREATE TABLE `ordre` (
  `oid` int(11) NOT NULL,
  `qty` int(25) NOT NULL,
  `status` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ordre`
--

INSERT INTO `ordre` (`oid`, `qty`, `status`, `pid`, `cid`) VALUES
(97, 1, 1, 27, 5),
(98, 1, 1, 28, 5),
(99, 1, 1, 31, 5),
(100, 1, 1, 33, 5),
(101, 1, 1, 31, 5),
(102, 1, 1, 33, 5),
(103, 1, 1, 31, 5),
(104, 1, 1, 33, 5),
(105, 1, 1, 31, 5),
(106, 1, 1, 33, 5),
(107, 1, 1, 29, 5),
(108, 1, 1, 31, 5),
(109, 1, 1, 33, 5),
(110, 1, 1, 29, 5),
(111, 1, 1, 31, 5),
(112, 1, 1, 31, 5),
(113, 1, 1, 31, 5),
(114, 1, 1, 31, 5),
(115, 1, 1, 31, 5),
(116, 1, 1, 31, 5),
(117, 1, 1, 33, 5),
(118, 1, 1, 33, 5),
(119, 1, 0, 31, 7),
(120, 1, 0, 29, 7),
(121, 1, 0, 33, 7),
(122, 1, 0, 42, 7),
(123, 1, 0, 42, 7),
(124, 1, 0, 42, 7),
(125, 1, 0, 40, 7),
(126, 1, 0, 42, 7),
(127, 1, 0, 42, 7),
(128, 1, 0, 42, 7),
(129, 2, 0, 29, 7),
(130, 1, 0, 31, 7),
(131, 1, 0, 33, 7),
(132, 5, 0, 31, 7);

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
(49, 'Bulul', 'Hand carved Filipino Bulul rice god figures, each depicted in a seated position with their knees pulled to their chests and arms resting on their knees.  Size of each approximately 15 3/4\" H', 499, '1747100597_craft2.jpg', 'lunch'),
(50, 'Tikog Bag', 'The age-old tradition of mat weaving using tikog, a naturally grown grass used to be for personal use only.', 99, '1747100932_weav4.png', 'breakfast'),
(52, 'Acacia Bowl', 'A beautiful set consisting of one larger and six smaller bowls in a simple, cylindrical shape. Made of light tropical wood. Handcrafted in the Philippines', 200, '1747101721_craft1.png', 'lunch'),
(53, 'Bamboo flask', 'These Bamboo Flasks have lots of Eco-appeal and a high perceived value with their stainless steel finish. Designed to hold an individual cup of coffee or tea.', 799, '1747102827_craft4.png', 'lunch'),
(54, 'Carved Fishing boy ', 'Hand-carved wooden figure from Paete, Philippines, depicting a boy spearing fish. He holds a traditional fishing spear, with one fish caught and another at his feet, set on a sculpted base.', 899, '1747103054_craft5.png', 'lunch'),
(55, 'Abaca purse', 'Handwoven indigenous covers can be made from abaca fabrics such as T\'nalak or Hinabol (Bukidnon), cotton-based fabrics such as Ramit from Binakol  weaves.', 499, '1747103623_Weav1.png', 'breakfast'),
(56, 'Willow Basket', 'Willow baskets feature supple, breathable and very light weight. Rich with a beautiful candy color due to natural discoloration when drying', 399, '1747104460_weav3.png', 'breakfast'),
(57, 'Rattan Basket', 'Woven Rattan Basket. This basket would be used to carry fruits and vegetables from local markets. This basket would be a lovely addition to your collection or to display in your home.\r\n', 199, '1747106393_weav9.png', 'breakfast'),
(58, 'Last Supper ', 'Last Supper carved from wood its good for house decorations it gives spiritual presence in the households.', 1499, '1747107631_craft8.jpg', 'lunch'),
(59, 'Wooden Carabao Figurine', 'A hand made Carabao figurine made from mahogany wood it is traditional carving in bukidnon for its rice production and also its tribute for the carabao\'s.', 249, '1747108064_craft3.png', 'lunch'),
(60, 'Habol', 'Habol is a woven in a precise way it composed with abaca or pinya fabric. It\'s characterized by its vibrant colors and distinctive plaid or checkered patterns.', 299, '1747109512_weav11.png', 'breakfast'),
(61, 'Banig', 'This banig is used for sleeping in the kubo or in the floor it gives warm and comfy feeling when you sleep on it.', 299, '1747109925_weav12.png', 'breakfast'),
(62, 'Bamboo flute', 'Played by blowing the instrument with the nose rather than the mouth. Holding one nostril shut with thumb or finger.', 499, '1747112343_craft9.png', 'lunch');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employé`
--
ALTER TABLE `employé`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ordre`
--
ALTER TABLE `ordre`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
