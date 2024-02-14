-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2024 at 07:11 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercewebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsubcategory`
--

DROP TABLE IF EXISTS `addsubcategory`;
CREATE TABLE IF NOT EXISTS `addsubcategory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `subcategory` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `addsubcategory`
--

INSERT INTO `addsubcategory` (`id`, `category`, `subcategory`) VALUES
(1, 'Mobiles & Tablets', 'Android'),
(3, '8', 'IOS'),
(4, '10', 'Table');

-- --------------------------------------------------------

--
-- Table structure for table `carttable`
--

DROP TABLE IF EXISTS `carttable`;
CREATE TABLE IF NOT EXISTS `carttable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carttable`
--

INSERT INTO `carttable` (`id`, `product_id`, `user_id`, `status`) VALUES
(51, 6, 5, '1'),
(54, 6, 5, '1'),
(53, 7, 5, '1'),
(52, 5, 5, '1'),
(50, 9, 5, '1'),
(49, 4, 5, '1'),
(55, 5, 7, '1'),
(56, 8, 7, '1'),
(57, 8, 7, '0'),
(58, 4, 0, '0'),
(59, 4, 0, '0'),
(60, 4, 0, '0'),
(61, 4, 0, '0'),
(62, 4, 5, '0'),
(63, 4, 5, '0'),
(64, 8, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(30) NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `description`, `image`) VALUES
(8, 'Mobiles & Tablets', 'A mobile device is a portable computing device such as a smartphone or tablet computer. These devices range in size, shape, and model and all have various operating systems (OS) and functions.', 'mobiles.jpeg'),
(9, 'TV & Appliances', '\r\nAn appliance is a device or machine in your home that you use to do a job such as cleaning or cooking. Appliances are often electrical. ...the vacuum cleaner, washing machine and other household appliances.', 'tv.jpeg'),
(10, 'Home & Furniture', 'Furniture includes objects such as tables, chairs, beds, desks, dressers, and cupboards. These objects are usually kept in a house or other building to make it suitable or comfortable for living or working in.', 'home.jpeg'),
(11, 'Sports,Books&more', 'Boards for surfing, skateboarding, wakeboarding and snowboarding.\r\nCricket spikes.\r\nRoad cycling shoes.\r\nFlat pedal shoes and clipless shoes for mountain biking.\r\nFootball boots.\r\nGolf shoes.', 'sports.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`) VALUES
(61, 4, 5),
(60, 9, 5),
(59, 5, 5),
(58, 6, 5),
(57, 4, 5),
(56, 9, 5),
(55, 5, 5),
(54, 6, 5),
(53, 4, 5),
(52, 9, 5),
(51, 5, 5),
(50, 6, 5),
(49, 4, 5),
(48, 9, 5),
(47, 6, 5),
(46, 4, 5),
(45, 9, 5),
(44, 6, 5),
(43, 4, 5),
(42, 9, 5),
(41, 4, 5),
(40, 9, 5),
(62, 6, 5),
(63, 5, 5),
(64, 9, 5),
(65, 4, 5),
(66, 6, 5),
(67, 6, 5),
(68, 7, 5),
(69, 5, 5),
(70, 9, 5),
(71, 4, 5),
(72, 6, 5),
(73, 6, 5),
(74, 7, 5),
(75, 5, 5),
(76, 9, 5),
(77, 4, 5),
(78, 5, 7),
(79, 8, 7),
(80, 5, 7),
(81, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `productstable`
--

DROP TABLE IF EXISTS `productstable`;
CREATE TABLE IF NOT EXISTS `productstable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productname` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subcategory` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productstable`
--

INSERT INTO `productstable` (`id`, `productname`, `category`, `subcategory`, `description`, `image`, `price`, `quantity`) VALUES
(4, 'Mi A series 80 cm (32 inch) HD', '9', 'Android', 'With the Xiaomi TV, your living room becomes a gateway to an entertainment paradise.', 'mitv.jpeg', 12499, 1),
(5, 'WESTIDO Emporio Fabric 3 + 1 +', '10', 'Sofaset', 'DIY - Basic assembly to be done with simple tools by the customer, comes with instructions.', 'sofaset.jpeg', 16999, 1),
(6, 'GO RUN RIDE 10 Running Shoes F', '11', 'Running shoes', 'Bank Offer10% Instant Discount on PNB Credit Cards, up to ₹1500, on orders of ₹5,000 and aboveT&C', 'sketchers.jpeg', 8399, 1),
(7, 'SAMSUNG 80 cm (32 Inch) HD Rea', '9', 'Samsung TV', 'Supported Apps: Netflix|Prime Video|Disney+Hotstar|Youtube', 'samsungtv.jpeg', 13990, 1),
(8, 'Lenovo Tab M10 2nd Gen 3 GB RA', '8', 'Tablet', '3 GB RAM | 32 GB ROM | Expandable Upto 1 TB 25.65 cm (10.1 inch) HD Display', 'lenovotab.jpeg', 8999, 1),
(9, 'Oppo Pad Air 4 GB RAM 128 GB R', '8', 'Tablet', '4 GB RAM | 128 GB ROM 26.31 cm (10.36 inch) 2K Display 8 MP Primary Camera | 5 MP Front', 'oppotab.jpeg', 13999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `signuptable`
--

DROP TABLE IF EXISTS `signuptable`;
CREATE TABLE IF NOT EXISTS `signuptable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `usertype` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signuptable`
--

INSERT INTO `signuptable` (`id`, `fullname`, `username`, `password`, `usertype`) VALUES
(5, 'jithin', 'jithin@gmail.com', '123', 1),
(4, 'Aslam', 'aslam@gmail.com', 'test', 1),
(6, 'superadmin', 'admin@gmail.com', 'admin123', 0),
(7, 'Gopika', 'gopika@gmail.com', 'gopika123', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
