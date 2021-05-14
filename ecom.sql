-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 02, 2020 at 04:24 AM
-- Server version: 10.3.23-MariaDB-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invebuty_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_prods`
--

CREATE TABLE `cart_prods` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `prod_price` varchar(11) NOT NULL,
  `prod_img` text NOT NULL,
  `prod_desc` varchar(2666) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(35) NOT NULL,
  `cat_img` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`, `cat_img`, `date`) VALUES
(21, 'FASHION', 'FB_IMG_15638222385567202.jpg', '2020-01-28 04:02:21'),
(22, 'TRAVEL AND TOURS', 'bg.JPG', '2020-01-28 04:02:37'),
(23, 'ACCESSORIES', 'gear.png', '2020-01-28 04:02:51'),
(24, 'SECURITY', 'w.jpg', '2020-01-28 04:03:12'),
(25, 'ASSISTS', 'hp-support.png', '2020-01-28 04:03:36'),
(26, 'MOBILE', 'm3.jpg', '2020-01-29 01:50:09'),
(27, 'FOOD AND BEVERAGES', '540305077.jpg', '2020-02-29 19:24:53'),
(28, 'BOOKS', 'pexels-photo-2781814.jpeg', '2020-03-06 01:10:42'),
(29, 'PRINTERS', 'Xerox WC 5024D.jpg', '2020-03-07 12:40:06'),
(30, 'GENERATOR', 'IMG-20170421-WA0008.jpg', '2020-03-07 12:53:08'),
(31, 'HOME GAGS', 'air-condition-18-24k.jpg', '2020-03-07 12:59:17');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_mail` varchar(255) NOT NULL,
  `con_msg` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `con_name`, `con_mail`, `con_msg`, `date`) VALUES
(1, 'enoch@gmail.com', 'Can i be employed', 'What are the possibilities of obtaining work', '2020-01-31 06:13:41'),
(2, 'atutechsdev@gmail.com', 'NOTIFICAITON', 'Can this be stopped!\r\n', '2020-02-01 03:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`, `date`) VALUES
(17, 188.9, '2VL33044PG845345C', 'Completed', 'USD', '2020-02-13 03:19:29'),
(33, 810, '8JK0959265259571H', 'Completed', 'USD', '2020-02-13 03:19:29'),
(34, 2670.12, '84954486PE5685933', 'Completed', 'USD', '2020-03-06 03:10:35'),
(35, 78.13, '7XN68807EL062221D', 'Completed', 'USD', '2020-03-06 05:53:48'),
(36, 360.88, '1D8451770S1672341', 'Completed', 'USD', '2020-03-06 07:59:57'),
(37, 156.26, '5B6400407C865272J', 'Completed', 'USD', '2020-03-06 20:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `prod_title` varchar(255) NOT NULL,
  `prod_cat` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `prod_price` varchar(11) NOT NULL,
  `prod_quantity` int(255) NOT NULL,
  `prod_img` text NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `prod_desc` varchar(2666) NOT NULL,
  `review` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'draft',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `prod_title`, `prod_cat`, `author`, `prod_price`, `prod_quantity`, `prod_img`, `short_desc`, `prod_desc`, `review`, `comment`, `status`, `date`) VALUES
(2, 'iPhone 6x', 26, 'JAMES LIVING', '890.04', 5, '5.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-23 00:00:00'),
(3, 'APPLE WATCH', 23, 'JENNIFER STRONG', '90', 10, 'appleWatch.png', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-30 00:00:00'),
(4, 'CAR CHARGER', 23, 'MIKE STROLLERS', '78', 20, '6.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and management is the normal tradition/conAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theventional way which the customer, guest must be present to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-23 00:00:00'),
(5, 'TOUR SACKS', 22, 'SUNDAY CHUKWU', '222', 8, '61mIEj15wjL._SL1200_.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thebe present to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-24 00:00:00'),
(6, 'ADIDAS SMART\r\n', 21, 'LARRY GAGS', '89.00', 5, 'FB_IMG_15739481176424379.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-23 00:00:00'),
(8, 'HACKET T-SHIRT', 21, 'JENNIFER STRONG', '78.13', 10, 'FB_IMG_15638222143523124.jpg', '<p>Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'Published', '0000-00-00 00:00:00'),
(9, 'POLO SHIRT\r\n', 21, 'MIKE STROLLERS', '130.03', 11, 'FB_IMG_15638222452883234.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'The method of booking and mAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theanagement is the normal tradition/conventional way which the customer, guest must be present to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '2020-01-30 00:00:00'),
(10, 'POLO SHIRT', 21, 'JAMES LIVING', '98.91', 12, 'FB_IMG_15638222580385098.jpg', 'Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 'Methods of booking and management is the normal tradition/conventional way Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thewhich the customer, guest must be present to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the', 0, '', 'Published', '0000-00-00 00:00:00'),
(11, 'Creamy Chop', 27, 'Newton Faith', '89.11', 12, '-698239916.jpg', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem o', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the ', 0, '', 'Published', '0000-00-00 00:00:00'),
(12, 'Creamy Silk', 27, 'Newton Faith', '90.22', 78, '-664278069.jpg', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem o', 'The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the ', 0, '', 'Published', '0000-00-00 00:00:00'),
(13, 'Educollections', 28, 'Martins Silas', '20.11', 10, 'education.jpg', '<p>A key requirement for effective credit management is the ability to intelligently and efficiently manage customer credit lines. In order to minimize exposure to bad debt, over-reserving and bankruptcies, companies must have greater insight into custome', '<p>A key requirement for effective credit management is the ability to intelligently and efficiently manage customer credit lines. In order to minimize exposure to bad debt, over-reserving and bankruptcies, companies must have greater insight into customer financial strength, credit score history and changing payment patterns. The ability to penetrate new markets and customers hinges on the ability to quickly and easily make well-informed credit decisions and set appropriate lines of credit. Credit management starts with the sale and does not stop until the full and final payment has been received. It is as important as part of the deal as closing credit policy as the combination of the variables of credit policy is quite difficult to obtain. A firm will change one or two variables at a time and observe the effect. It should be noted that the firm&rsquo;s credit policy is greatly influenced by economic condition</p>', 0, '', 'Published', '0000-00-00 00:00:00'),
(14, 'Printer x1 series', 29, 'Hiltop Newton', '23.55', 3, 'Brother - intelliFAX-2820.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '0000-00-00 00:00:00'),
(15, 'Printer x2 series', 29, 'Kenneth Mark', '45.23', 3, 'Canon Pixma MX394 Inkjet.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '0000-00-00 00:00:00'),
(16, 'Printer x3 series', 29, 'Newton Faith', '55.23', 4, 'DCP-7020 Monochrome Laser Printer, Copier, and Color Scanner.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-24 00:00:00'),
(17, 'Printer x4', 29, '98', '55,55', 4, 'office-fax-machine-500x500.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-03 00:00:00'),
(18, 'Print scan', 29, 'Beth Grey', '77.44', 10, 'printscan.png', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-10 00:00:00'),
(19, 'Print x5', 29, 'Victor Moses', '88', 88, 'promark4.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-11 00:00:00'),
(20, 'Printer x8 series', 29, 'Newton Faith', '99', 1, 'Xerox WC 5024D.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-25 00:00:00'),
(21, 'iphone 7 pro', 26, 'JAMES LIVING', '123.22', 33, 'apple-iphone-2017-00-1.png', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-25 00:00:00'),
(22, 'Handlite C234', 30, 'Gary Mattews', '554', 44, 'IMG-20170421-WA0010.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-10 00:00:00'),
(23, 'Handlite C234', 30, 'MIKE STROLLERS', '444', 44, 'IMG-20170421-WA0009.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-11 00:00:00'),
(24, 'Handlite C237', 30, 'Newton Faith', '333', 3, 'IMG-20170421-WA0008.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-25 00:00:00'),
(25, 'Handlite C238', 30, 'Martin Silas', '332', 23, 'images (33).jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-24 00:00:00'),
(26, 'Air Condition', 31, 'Chikwado Chukwuka', '444', 4, 'air-condition-18-24k.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-24 00:00:00'),
(27, 'Station ', 31, 'Jennifer Ambrose', '333', 2, 'IMG-20170421-WA0006.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-18 00:00:00'),
(28, 'Lite Pull', 31, 'Sandra Chukwukaobi', '77.44', 4, 'IMG-20170421-WA0002.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-31 00:00:00'),
(29, 'Tv', 31, 'Yeonna Damascus', '454', 55, 'images (42).jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-17 00:00:00'),
(30, 'Stand fan', 31, 'LARRY GAGS', '20.11', 3, 'images (38).jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-25 00:00:00'),
(31, 'Refrigerator stand', 31, 'Newton Faith', '44', 4, '1126.png', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-24 00:00:00'),
(32, 'Refrigerator x1', 31, 'Newton Faith', '999.00', 5, 'i65-0.jpg', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact proble', '<p>The method of booking and management is the normal tradition/conventional way which the customer, guest must be Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help theAutomobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help thepresent to book a room even before the time when he/she needs it, when the customer gets to Automobile diagnosing and solution system is a software that will help the engineers and car owners to discover or identify the exact problem of their cars and how to solve the problem. This research work is to help the</p>', 0, '', 'published', '2020-03-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_total_price` float NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `prod_id`, `order_id`, `prod_total_price`, `prod_quantity`, `date`) VALUES
(4, 3, 17, 90, 1, '2020-02-13 01:55:38'),
(6, 2, 34, 2670.12, 3, '2020-03-06 03:10:35'),
(7, 8, 35, 78.13, 1, '2020-03-06 05:53:48'),
(8, 12, 36, 360.88, 4, '2020-03-06 07:59:57'),
(9, 8, 37, 156.26, 2, '2020-03-06 20:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `status`) VALUES
(8, 'Gallary bests', 'camera-and-photographs.jpg', 'Approved'),
(12, 'T-shirts', 'FB_IMG_15638222385567202.jpg', 'Approved'),
(13, 'For men', 'FB_IMG_15638222235332987.jpg', 'Approved'),
(18, 'Spotline Foots', 'FB_IMG_15695239298226599.jpg', 'Approved'),
(19, 'Travel and Tours', 'ss.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL DEFAULT 'hl.png',
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unappoved',
  `user_role` varchar(255) NOT NULL DEFAULT 'subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `firstname`, `lastname`, `passport`, `password`, `status`, `user_role`) VALUES
(21, 'Tonio', 'devs@gmail.com', 'Tonio', 'A', 'hl.png', '$2y$12$fVl8ygkpScFx9dmNIHKNKe3qlwJ7JT.jpIM1JkOFY9HIz767H6d/C', 'Approved', 'subscriber'),
(22, 'jaga222', 'donxipanthera@gmail.com', 'nna', 'zona', 'hl.png', '$2y$12$AAiqs4aMTL.oZWLqsbMQJuYTwNRgy0kc5QT/KhatU6oAR5fU8chdS', 'unappoved', 'subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_prods`
--
ALTER TABLE `cart_prods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_prods`
--
ALTER TABLE `cart_prods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
