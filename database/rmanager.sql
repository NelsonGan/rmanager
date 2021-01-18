-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 18, 2021 at 09:36 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `Attendance_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Staff_ID` int(20) DEFAULT NULL,
  `workdate` date DEFAULT NULL,
  `clockin` time DEFAULT NULL,
  `clockout` time DEFAULT NULL,
  PRIMARY KEY (`Attendance_ID`),
  KEY `Staff_ID` (`Staff_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Attendance_ID`, `Staff_ID`, `workdate`, `clockin`, `clockout`) VALUES
(1, 2, '2021-01-11', '08:18:48', '14:51:07'),
(2, 2, '2020-12-01', '09:01:52', '17:14:52'),
(3, 2, '2020-12-02', '08:15:39', '18:15:39'),
(4, 2, '2020-12-03', '10:15:58', '17:15:58'),
(5, 2, '2020-12-07', '10:16:16', '22:16:16'),
(6, 2, '2020-12-08', '10:16:39', '21:16:39'),
(7, 2, '2020-12-10', '10:16:55', '17:16:55'),
(8, 2, '2020-12-18', '11:17:11', '20:17:11'),
(9, 2, '2020-12-19', '14:17:22', '20:17:22'),
(10, 2, '2020-12-20', '08:17:35', '19:17:35'),
(11, 2, '2020-12-22', '11:17:52', '21:19:07'),
(12, 2, '2020-12-23', '09:18:02', '14:18:02'),
(13, 2, '2020-12-30', '12:18:16', '16:18:16'),
(14, 2, '2020-12-31', '10:18:35', '20:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Inventory_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Supplier_ID` int(20) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `itemname` varchar(20) DEFAULT NULL,
  `unit` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`Inventory_ID`),
  KEY `Supplier_ID` (`Supplier_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inventory_ID`, `Supplier_ID`, `location`, `itemname`, `unit`, `price`) VALUES
(1, 1, '3', 'Potato', 'kg', '20.00'),
(2, 1, '2', 'Onion', 'kg', '4.00'),
(3, 1, '2', 'Coconut', 'pcs', '4.00'),
(5, 1, '1', 'fish', 'kg', '5.00'),
(6, 1, '1', 'Cucumber', 'kg', '9.60');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_log`
--

DROP TABLE IF EXISTS `inventory_log`;
CREATE TABLE IF NOT EXISTS `inventory_log` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `creationdate` date DEFAULT NULL,
  `logmonth` int(10) DEFAULT NULL,
  `logyear` int(11) DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Log_ID`),
  KEY `Staff_ID` (`Staff_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory_log`
--

INSERT INTO `inventory_log` (`Log_ID`, `creationdate`, `logmonth`, `logyear`, `Staff_ID`) VALUES
(1, '2021-01-04', 4, 2021, 1),
(2, '2021-01-07', 1, 2021, 2),
(3, '2021-01-07', 4, 2020, 2),
(4, '2021-01-07', 2, 2021, 2),
(5, '2021-01-07', 10, 2018, 2),
(6, '2021-01-14', 3, 2021, 2),
(7, '2021-01-18', 7, 2021, 2);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `Leave_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Staff_ID` int(20) DEFAULT NULL,
  `leavedate` date DEFAULT NULL,
  `reason` varchar(500) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Leave_ID`),
  KEY `Staff_ID` (`Staff_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`Leave_ID`, `Staff_ID`, `leavedate`, `reason`, `status`) VALUES
(1, 2, '2021-01-26', 'Hometown', 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `Location_ID` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Location_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`Location_ID`, `name`) VALUES
(1, 'Kitchen'),
(2, 'Fridge'),
(3, 'Storeroom'),
(4, 'Counter'),
(9, ''),
(8, 'Drawer');

-- --------------------------------------------------------

--
-- Table structure for table `log_details`
--

DROP TABLE IF EXISTS `log_details`;
CREATE TABLE IF NOT EXISTS `log_details` (
  `LD_ID` int(20) NOT NULL AUTO_INCREMENT,
  `Log_ID` int(20) DEFAULT NULL,
  `Inventory_ID` int(20) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  PRIMARY KEY (`LD_ID`),
  KEY `Log_ID` (`Log_ID`),
  KEY `Inventory_ID` (`Inventory_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `log_details`
--

INSERT INTO `log_details` (`LD_ID`, `Log_ID`, `Inventory_ID`, `amount`) VALUES
(1, 4, 1, 4),
(2, 4, 2, 3),
(3, 4, 4, 3),
(4, 4, 3, 4),
(5, 4, 0, 0),
(6, 5, 1, 0),
(7, 5, 2, 0),
(8, 5, 4, 0),
(9, 5, 3, 0),
(10, 5, 0, 0),
(11, 6, 5, 2),
(12, 6, 6, 2),
(13, 6, 2, 2),
(14, 6, 3, 2),
(15, 6, 1, 2),
(16, 6, 0, 0),
(17, 7, 5, 2),
(18, 7, 6, 1),
(19, 7, 2, 1),
(20, 7, 3, 5),
(21, 7, 1, 3),
(22, 7, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Type` text NOT NULL,
  `Price` double NOT NULL,
  `Description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_img` text NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Item_ID`, `Name`, `Type`, `Price`, `Description`, `item_img`) VALUES
(3, 'Fish', 'Food', 6.9, 'Feesh deesh', 'fish.jpg'),
(4, 'Ice Cream', 'Desserts', 3, 'Premium ice cream.', 'icecream.jpg'),
(5, 'Green Tea', 'Drinks', 2.5, 'Matcha green tea ', 'greentea.jfif'),
(6, 'Salad', 'Appetizers', 5, 'Healthy food', 'salad.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `customername` text NOT NULL,
  `staffid` int(11) NOT NULL,
  `tableno` int(11) NOT NULL,
  `odatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `netamount` double NOT NULL,
  `paidstatus` text NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customername`, `staffid`, `tableno`, `odatetime`, `netamount`, `paidstatus`) VALUES
(21, 'CJ', 2, 3, '2021-01-18 17:09:04', 23.11, 'PAID'),
(22, 'KL', 2, 3, '2021-01-18 17:14:55', 21.09, 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderdetail_ID` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Item_ID` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`orderdetail_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_ID`, `orderid`, `Item_ID`, `quantity`, `price`, `amount`) VALUES
(118, '21', '5', 2, 2.5, 5),
(117, '22', '4', 1, 3, 3),
(116, '22', '3', 1, 6.9, 6.9),
(115, '22', '5', 2, 2.5, 5),
(114, '22', '6', 1, 5, 5),
(113, '21', '4', 1, 3, 3),
(112, '21', '3', 2, 6.9, 13.8);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `Schedule_ID` int(200) NOT NULL AUTO_INCREMENT,
  `Staff_ID` int(20) DEFAULT NULL,
  `Shift_ID` int(200) DEFAULT NULL,
  PRIMARY KEY (`Schedule_ID`),
  KEY `Staff_ID` (`Staff_ID`),
  KEY `Shift_ID` (`Shift_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Schedule_ID`, `Staff_ID`, `Shift_ID`) VALUES
(19, 1, 12),
(18, 2, 12),
(17, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
CREATE TABLE IF NOT EXISTS `shifts` (
  `Shift_ID` int(200) NOT NULL AUTO_INCREMENT,
  `shiftday` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `starttime` varchar(20) DEFAULT NULL,
  `endtime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Shift_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`Shift_ID`, `shiftday`, `starttime`, `endtime`) VALUES
(9, 'Thursday', '00:51', '13:51'),
(8, 'Monday', '08:30', '14:45'),
(11, 'Thursday', '16:47', '17:47'),
(12, 'Friday', '19:58', '20:58');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `Staff_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `hourlyrate` decimal(10,2) DEFAULT NULL,
  `datejoined` date DEFAULT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `name`, `email`, `pwd`, `gender`, `dob`, `phone`, `address`, `role`, `hourlyrate`, `datejoined`) VALUES
(1, 'Seejay', 'nelson@gmail.com', 'nelson', '', NULL, NULL, NULL, 'Owner', NULL, NULL),
(2, 'Brian Lam', 'brian@gmail.com', 'brian', 'Male', '2019-05-01', '017-819-3029', '25, Jalan Alam Damai 3, Taman Damai', 'Full-time Staff', '8.00', '2021-01-06');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`Supplier_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_ID`, `companyname`, `phonenumber`, `email`, `address`) VALUES
(1, 'Soon Teck Trading Sdn Bhd', '013-94030294', 'sttrading@gmail.com', '28, Jalan Sampin 15 Taman Berjaya 56000 Kuala Lumpur'),
(2, 'Big Brain Daily Sdn Bhd', '013-49294594', 'bigbrain@gmail.com', '24, Jalan Damai 3 Taman Simp 56000 Kuala Lumpur'),
(3, 'Sam Thing Sdn. Bhd', '015-3959394', 'stsb@gmail.com', '25, Jana Daman 3 Taman Mutiana 56000 KL'),
(4, 'Sam Thing Sdn. Bhd', '0169088056', 'seejaymsia2001@gmail.com', '22, Jalan Midah 11 Taman Midah 56000 KL');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
