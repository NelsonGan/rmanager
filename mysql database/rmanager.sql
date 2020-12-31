-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 31, 2020 at 05:17 PM
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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Type` text NOT NULL,
  `Price` double NOT NULL,
  `Desciption` text NOT NULL,
  PRIMARY KEY (`Item_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Item_ID`, `Name`, `Type`, `Price`, `Desciption`) VALUES
(1, 'salad', 'food', 4, 'nice salad'),
(2, 'burger', 'food', 6.9, 'cheesy burger');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `customername` text NOT NULL,
  `tableno` int(11) NOT NULL,
  `odatetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `netamount` double NOT NULL,
  `paidstatus` text NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customername`, `tableno`, `odatetime`, `netamount`, `paidstatus`) VALUES
(10, 'me', 2, '2020-12-24 04:25:20', 21.94, 'UNPAID'),
(2, 'first customer', 2, '2020-12-20 15:10:51', 8.48, 'UNPAID'),
(8, 'second', 9, '2020-12-24 03:37:35', 27.35, 'UNPAID'),
(9, 'you', 3, '2020-12-24 03:41:00', 219.42, 'UNPAID'),
(11, 'new', 8, '2020-12-31 15:54:03', 0, 'UNPAID'),
(12, 'new', 2, '2020-12-31 15:58:52', 0, 'UNPAID'),
(13, 'neww', 4, '2020-12-31 16:00:15', 12.72, 'UNPAID'),
(14, 'boy', 1, '2020-12-31 16:07:26', 0, 'UNPAID'),
(15, 'boy', 4, '2020-12-31 16:07:43', 0, 'UNPAID'),
(16, 'girl', 3, '2020-12-31 16:08:21', 0, 'UNPAID');

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
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_ID`, `orderid`, `Item_ID`, `quantity`, `price`, `amount`) VALUES
(110, '16', '1', 4, 4, 16),
(109, '16', '2', 3, 6.9, 20.7),
(108, '13', '1', 3, 4, 12),
(88, '2', '1', 2, 4, 8),
(107, '10', '2', 3, 6.9, 20.7),
(106, '9', '2', 30, 6.9, 207),
(105, '8', '2', 2, 6.9, 13.8),
(104, '8', '1', 3, 4, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
