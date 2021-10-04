-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 09:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `uid` int(20) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `upass` varchar(30) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `uemail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`uid`, `uname`, `upass`, `fullname`, `uemail`) VALUES
(1, 'mamun', '1234', 'Abdullah Al Mamun', 'mamunwitchbug@gmail.com'),
(3, 'jinat', 'jinat', 'Jinat Afroj', 'afrojjinat@gmail.com'),
(6, 'admin', '1234', 'admin', 'admin@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `roomcategory`
--

CREATE TABLE `roomcategory` (
  `room_category_id` int(11) NOT NULL,
  `room_category_image` text NOT NULL,
  `room_type` varchar(127) NOT NULL,
  `price` int(11) NOT NULL,
  `facilities` varchar(255) NOT NULL,
  `bed_type` varchar(127) NOT NULL DEFAULT 'Double',
  `no_of_beds` tinyint(4) NOT NULL DEFAULT 1,
  `no_of_sofas` tinyint(4) NOT NULL DEFAULT 0,
  `discount_offer` tinyint(4) NOT NULL,
  `total_rooms` int(11) NOT NULL,
  `available_rooms` int(11) NOT NULL,
  `booked_rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roomcategory`
--

INSERT INTO `roomcategory` (`room_category_id`, `room_category_image`, `room_type`, `price`, `facilities`, `bed_type`, `no_of_beds`, `no_of_sofas`, `discount_offer`, `total_rooms`, `available_rooms`, `booked_rooms`) VALUES
(101, 'images/rooms/101.jpg', 'Duplex Rooms', 1500, 'AC, TV, Wifi', 'Single', 2, 0, 25, 10, 10, 0),
(102, 'images/rooms/102.jpg', 'Super Comfort Rooms', 2200, 'AC, TV, WIFI', 'Double', 1, 0, 30, 10, 10, 0),
(103, 'images/rooms/103.jpg', 'Family Rooms', 3500, 'TV, WIFI, Balcony, AC', 'Double', 2, 0, 40, 10, 10, 0),
(104, 'images/rooms/104.jpg', 'Signature Rooms', 4200, 'AC, TV, WIFI, Fridge, Sofa, Balcony', 'Double', 2, 1, 50, 10, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_cat` text NOT NULL,
  `room_category_id` tinyint(4) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `name` text NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `book` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_cat`, `room_category_id`, `checkin`, `checkout`, `name`, `phone`, `book`) VALUES
(23, 'Family Rooms', 103, '2021-10-01', '2021-12-31', 'Aman Pasricha', 1234987655, 'true'),
(24, 'Family Rooms', 103, '2021-10-01', '2021-12-31', '', 0, 'false'),
(25, 'Family Rooms', 103, '2021-10-01', '2021-12-31', 'Aman', 4294967295, 'true'),
(26, 'Family Rooms', 103, '2021-10-01', '2021-12-31', 'Divy Makkar', 2147483647, 'true'),
(27, 'Family Rooms', 103, '0000-00-00', '0000-00-00', '', 0, 'false'),
(28, 'Super Comfort Rooms', 102, '2017-05-19', '2017-05-22', 'Jinat Afroj', 1524587558, 'true'),
(29, 'Super Comfort Rooms', 102, '0000-00-00', '0000-00-00', 'Aman Pasricha', 9876543210, 'true'),
(30, 'Super Comfort Rooms', 102, '0000-00-00', '0000-00-00', '', 0, 'false'),
(31, 'Super Comfort Rooms', 102, '0000-00-00', '0000-00-00', '', 0, 'false'),
(32, 'Super Comfort Rooms', 102, '0000-00-00', '0000-00-00', '', 0, 'false'),
(33, 'Duplex Rooms', 101, '2021-01-01', '2021-12-31', 'Aman Pasricha', 1234, 'true'),
(34, 'Duplex Rooms', 101, '0000-00-00', '0000-00-00', '', 0, 'false'),
(35, 'Duplex Rooms', 101, '0000-00-00', '0000-00-00', '', 0, 'false'),
(36, 'Duplex Rooms', 101, '0000-00-00', '0000-00-00', '', 0, 'false'),
(37, 'Duplex Rooms', 101, '0000-00-00', '0000-00-00', '', 0, 'false'),
(38, 'Signature Rooms', 104, '0000-00-00', '0000-00-00', 'Aman Pasricha', 9876123455, 'true'),
(39, 'Signature Rooms', 104, '0000-00-00', '0000-00-00', '', 0, 'false'),
(40, 'Signature Rooms', 104, '0000-00-00', '0000-00-00', '', 0, 'false'),
(41, 'Signature Rooms', 104, '0000-00-00', '0000-00-00', '', 0, 'false'),
(42, 'Signature Rooms', 104, '0000-00-00', '0000-00-00', '', 0, 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `roomcategory`
--
ALTER TABLE `roomcategory`
  ADD PRIMARY KEY (`room_category_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roomcategory`
--
ALTER TABLE `roomcategory`
  MODIFY `room_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
