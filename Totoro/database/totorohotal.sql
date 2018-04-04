-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 08:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `totorohotal`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_ID` int(11) NOT NULL,
  `Cus_IDCard` int(13) NOT NULL,
  `FullName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_ID`, `Cus_IDCard`, `FullName`, `Email`, `Phone`) VALUES
(1, 2147483647, 'Miki   Frog', 'miki@gmail.com', '021354789');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Res_ID` int(11) NOT NULL,
  `Cus_IDCard` int(11) NOT NULL,
  `Room_Key` int(11) NOT NULL,
  `CheckIn` date NOT NULL,
  `CheckOut` date NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Res_ID`, `Cus_IDCard`, `Room_Key`, `CheckIn`, `CheckOut`, `Price`) VALUES
(1, 2147483647, 11, '2018-04-06', '2018-04-08', 5800);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_Key` int(11) NOT NULL,
  `IDRoom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `RT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_Key`, `IDRoom`, `RT_ID`) VALUES
(1, 'LS101', 1),
(2, 'LS102', 1),
(3, 'LS103', 1),
(4, 'LS104', 1),
(5, 'LS105', 1),
(6, 'DS101', 2),
(7, 'DS102', 2),
(8, 'DS103', 2),
(9, 'DS104', 2),
(10, 'DS105', 2),
(11, 'DR101', 3),
(12, 'DR102', 3),
(13, 'DR103', 3),
(14, 'DR104', 3),
(15, 'DR105', 3),
(16, 'SR101', 4),
(17, 'SR102', 4),
(18, 'SR103', 4),
(19, 'SR104', 4),
(20, 'SR105', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE `roomtype` (
  `RT_ID` int(11) NOT NULL,
  `RoomType` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `PriceRoom` double NOT NULL,
  `SizeRoom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`RT_ID`, `RoomType`, `Description`, `PriceRoom`, `SizeRoom`, `img`, `details`) VALUES
(1, 'Luxurious Suites', 'The newly one, the one bedroom feature a living room enhances by a balcony pool, enjoy the outstanding facilities and amenities, as well as privacy. Welcoming bedroom is decorated with unique accessories, fine wood and tasteful furnishings, while the spacious en suite bathrooms include a rain shower, a bathtub, and walk-in closet. This room could touch the peace of scene lake and lush greenery surrounding.', 12000, '72.5 sq.m', 'Luxurious_Suites.jpg', '2 bedroom / 2 bathroom / 1 Living room'),
(2, 'Deluxe Suite', 'The most arresting feature of the Duplex Suite is the two-story suite, a wooden staircase which leads to the upper level and formal living room plus outside private furnished balcony. The suite	is beautifully decorated with a mix of Thai traditional materials and contemporary design', 9600, '58 Sq.m.', 'Deluxe_Suite.jpg', '1 bedroom / 1 bathroom / 1 Living room'),
(3, 'Double Room', 'Standard rooms are appointed with Twin Beds. The elegant room is perfectly decorate in rich Thai traditional fabrics and local wood, included all the amenities of guest room.', 5800, '38 Sq.', 'Double_Room.jpg', '1 Bedroom ( 2 beds ) / 1 bathroom'),
(4, 'Single Room', 'Standard rooms are appointed with King Size bed. The elegant room is perfectly decorate in rich Thai traditional fabrics and local wood, included all the amenities of guest room.', 5200, '38 Sq.', 'Single_room.jpg', '1 Bedroom ( 1 beds ) / 1 bathroom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Res_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_Key`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`RT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Res_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `Room_Key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `RT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
