-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 06:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(5, 'Aech', 'aek@gmail.com', '$2y$10$DIy2GCS4I2AE4VcS26fnxeJ67MeW79PPqthHgBnj62sHWIjzhX12G', 123456789, 'Manolo', 'profilpic/default-avatar.jpg');

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
(22, 'aaekk', 123454321, 'aaekk@gmail.com', '$2y$10$7gZL3OnHoI0bibD4UjFpFeo/6JvMHmAmc.EzbXME5nM8YWPBE5qXe', 'employe');

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
(118, 1, 1, 33, 5);

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
(27, 'kaldereta', 'made with tender meat, often goat, beef, or chicken, slow-cooked in a rich tomato-based sauce, potatoes, carrots, bell peppers, and sometimes olives for a tangy twist.', 40, 'kaldereta.jpg', 'breakfast'),
(28, 'pancit bihon', 'made with vegetables like carrots, cabbage, and bell peppers, along with meat such as chicken, pork, or shrimp.', 25, 'pancit bihon.jpg', 'lunch'),
(29, 'mechado', 'flavored with tomato-basedd sauce, vinegar, garlic, and onions, and vegetables like potatoes, carrots, and bell peppers.', 40, 'mechado.jpg', 'lunch'),
(31, 'batchoy', 'made with miki noodles, pork, beef, or chicken, topped with pork liver, chicharon, green onions, garlic, and egg.', 60, 'batchoy.jpg', 'lunch'),
(32, 'adobo', 'made by simmering meat, typically chicken or pork, in a flavorful mix of soy sauce, vinegar, garlic, bay leaves, and peppercorns.', 45, 'adobo.jpg', 'breakfast'),
(33, 'bulalo', 'made with tender beef chunks simmered to perfection with potatoes, carrots, cabbage, and pechay (bok choy).', 55, 'bulalo.jpg', 'lunch'),
(40, 'arroz caldo', ' a creamy, hearty dish made by simmering rice in a ginger-infused broth until it reaches a porridge-like consistency.', 30, 'arroz caldo.jpg', 'breakfast'),
(41, 'beef nilaga', 'made with tender beef chunks simmered to perfection with potatoes, carrots, cabbage, and pechay (bok choy).', 45, 'beef nilaga.jpg', 'lunch'),
(42, 'pancit bihon', 'a stir-fried noodle dish where bihon noodles are cooked with a blend of meat, vegetables, and savory seasonings.', 25, 'pancit bihon.jpg', 'breakfast'),
(43, 'pancit malabon', 'topped with an array of ingredients such as shrimp, squid, smoked fish flakes, boiled eggs, and crushed chicharon.', 50, 'pancit malabon.jpg', 'breakfast'),
(45, 'tortang talong', 'features grilled or roasted eggplant, which is flattened and dipped in a seasoned egg mixture, then pan-fried to perfection.', 80, 'tortang talong.jpg', 'breakfast'),
(46, 'lechon kawali', 'made by deep-frying pork belly, juicy meat with a crunchy skin is often served with a side of liver sauce, and soy-vinegar dip.', 80, 'lechon kawali.jpg', 'lunch'),
(47, 'sinigang', 'made with tender pork, vegetables like kangkong, radish, eggplant, and okra, all simmered in a tamarind-based broth.', 80, 'sinigang na baboy.jpg', 'lunch'),
(48, 'kare kare', 'made with oxtail, tripe, or pork, cooked in a savory peanut-based sauce.Vegetables like eggplant and string beans.', 80, 'kare kare.jpg', 'breakfast');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employé`
--
ALTER TABLE `employé`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `ordre`
--
ALTER TABLE `ordre`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
