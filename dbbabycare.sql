-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2022 at 09:05 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbbabycare1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`bid`, `brand`, `status`) VALUES
(4, 'Jonson', '1'),
(5, 'Himalaya', '1'),
(6, 'babyhug', '1'),
(7, 'sebamed', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card`
--

CREATE TABLE IF NOT EXISTS `tbl_card` (
  `cardid` int(11) NOT NULL AUTO_INCREMENT,
  `cardno` bigint(20) NOT NULL,
  `cardname` varchar(30) NOT NULL,
  `expiry` date NOT NULL,
  `cardtype` varchar(30) NOT NULL,
  `custid` int(11) NOT NULL,
  PRIMARY KEY (`cardid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_card`
--

INSERT INTO `tbl_card` (`cardid`, `cardno`, `cardname`, `expiry`, `cardtype`, `custid`) VALUES
(2, 999999999999, 'cera jo', '2021-11-01', 'debit card', 7),
(3, 888999999999, 'sona', '2021-12-08', 'debit card', 8),
(4, 567856789877, 'sona', '2021-12-10', 'credit', 8),
(5, 456256721234, 'Rithi George', '2023-09-29', 'Debit', 10),
(6, 2345678912344444, 'alan', '2021-12-31', 'credit', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `cname`, `status`) VALUES
(3, 'Powders', 1),
(4, 'Oil', 1),
(5, 'lotions', 1),
(6, 'bath&skin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cchild`
--

CREATE TABLE IF NOT EXISTS `tbl_cchild` (
  `cchildid` int(11) NOT NULL AUTO_INCREMENT,
  `cmasterid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `odate` date NOT NULL,
  `custid` int(11) NOT NULL,
  `cstatus` varchar(30) NOT NULL,
  PRIMARY KEY (`cchildid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `tbl_cchild`
--

INSERT INTO `tbl_cchild` (`cchildid`, `cmasterid`, `itemid`, `qty`, `totalprice`, `odate`, `custid`, `cstatus`) VALUES
(43, 72, 9, 1, 200, '2021-11-27', 7, 'Order Placed'),
(44, 73, 9, 2, 400, '2021-11-27', 8, 'Order Placed'),
(47, 74, 10, 1, 300, '2021-11-27', 8, 'Order Placed'),
(48, 74, 12, 2, 340, '2021-11-27', 8, 'Cancelled, Refunded'),
(49, 75, 9, 3, 600, '2021-11-29', 8, 'Order Placed'),
(50, 76, 9, 3, 600, '2021-11-29', 8, 'Order Placed'),
(51, 77, 13, 40, 7200, '2021-11-29', 8, 'Cancelled, Refunded'),
(52, 78, 12, 2, 340, '2021-11-29', 10, 'Order Placed'),
(53, 79, 13, 10, 1800, '2021-11-30', 8, 'Order Placed'),
(54, 81, 8, 1, 140, '2021-12-01', 8, 'Cancelled, Refunded'),
(55, 81, 10, 1, 300, '2021-12-01', 8, 'Order Placed'),
(56, 82, 11, 2, 400, '2021-12-02', 11, 'Cancelled, Refunded'),
(57, 80, 14, 5, 900, '2021-12-02', 10, 'Order Pending'),
(58, 83, 14, 7, 1260, '2021-12-02', 11, 'Order Placed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cmaster`
--

CREATE TABLE IF NOT EXISTS `tbl_cmaster` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `custid` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `tbl_cmaster`
--

INSERT INTO `tbl_cmaster` (`orderid`, `custid`, `totalprice`, `status`) VALUES
(72, 7, 200, 'Order Placed'),
(73, 8, 400, 'Order Placed'),
(74, 8, 300, 'Order Placed'),
(75, 8, 600, 'Order Placed'),
(76, 8, 600, 'Order Placed'),
(77, 8, 0, 'Order Cancelled'),
(78, 10, 340, 'Order Placed'),
(79, 8, 1800, 'Order Placed'),
(80, 10, 900, 'Order Pending'),
(81, 8, 300, 'Order Placed'),
(82, 11, 0, 'Order Cancelled'),
(83, 11, 1260, 'Order Placed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `housename` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `fname`, `lname`, `phone`, `housename`, `city`, `district`, `pincode`, `email`, `status`, `date`) VALUES
(8, 'sona', 'joy', '9090909090', 'rosevilla', 'thrissur', 'thrissur', 680789, 'sona@gmail.com', '1', '2021-11-09'),
(9, 'akhil', 'joy', '8908908909', 'abc villa', 'mala', 'thrissur', 897898, 'akhil@gmail.com', '1', '2021-11-01'),
(10, 'Rithi', 'George', '9876456735', 'hno 64', 'kochi', 'ernakulam', 682017, 'rithi@gmail.com', '1', '2021-11-28'),
(11, 'alan', 'joji', '9876567854', 'hno121', 'kochi', 'ernakulam', 682017, 'alan@gmail.com', '1', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(19, 'cera@gmail.com', 'cera@123', 'Customer'),
(20, 'sona@gmail.com', 'sona@123', 'Customer'),
(21, 'akhil@gmail.com', 'akhil@123', 'Customer'),
(22, 'bibi@gmail.com', 'bibi@123', 'Staff'),
(25, 'tom@gmail.com', 'tom@123', 'Staff'),
(26, 'rithi@gmail.com', 'rithi@123', 'Customer'),
(27, 'alan@gmail.com', 'alan@123', 'Customer'),
(28, 'mark@gmail.com', 'mark@123', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `cmasterid` int(11) NOT NULL,
  `odate` date NOT NULL,
  `ostatus` varchar(30) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`oid`, `cmasterid`, `odate`, `ostatus`) VALUES
(8, 72, '2021-11-27', 'paid'),
(9, 73, '2021-11-27', 'paid'),
(10, 74, '2021-11-27', 'paid'),
(11, 75, '2021-11-29', 'paid'),
(12, 76, '2021-11-29', 'paid'),
(13, 77, '2021-11-29', 'paid'),
(14, 78, '2021-11-29', 'paid'),
(15, 79, '2021-11-30', 'paid'),
(16, 81, '2021-12-01', 'paid'),
(17, 82, '2021-12-02', 'paid'),
(18, 83, '2021-12-02', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custid` int(11) NOT NULL,
  `orderid` int(50) NOT NULL,
  `cardid` int(50) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `pdate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `custid`, `orderid`, `cardid`, `cvv`, `amount`, `status`, `pdate`) VALUES
(8, 7, 8, 2, '888', '200', 'paid', '2021-11-27'),
(9, 8, 9, 3, '777', '400', 'paid', '2021-11-27'),
(10, 8, 10, 3, '123', '300', 'paid', '2021-11-27'),
(11, 8, 11, 3, '123', '600', 'paid', '2021-11-29'),
(12, 8, 12, 4, '765', '600', 'paid', '2021-11-29'),
(13, 8, 13, 3, '123', '0', 'paid', '2021-11-29'),
(14, 10, 14, 5, '122', '340', 'paid', '2021-11-29'),
(15, 8, 15, 3, '123', '1800', 'paid', '2021-11-30'),
(16, 8, 16, 4, '123', '300', 'paid', '2021-12-01'),
(17, 11, 17, 6, '123', '0', 'paid', '2021-12-02'),
(18, 11, 18, 6, '123', '1260', 'paid', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(50) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `itemimage` varchar(100) NOT NULL,
  `rate` varchar(50) NOT NULL,
  `stock` int(12) NOT NULL,
  `status` int(11) NOT NULL,
  `scat` varchar(40) NOT NULL,
  `starvalue` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `pname`, `cat`, `description`, `itemimage`, `rate`, `stock`, `status`, `scat`, `starvalue`) VALUES
(8, 'Jonson', '3', 'Quality Product', '../images/John-Baby-Powder-1.jpg', '140', 434, -1, '4', 4),
(9, 'Jonson', '3', 'Quality Product', '../images/johnsons-baby-cornstarch-powder.jpg', '200', 81, 1, '5', 5),
(10, 'Jonson', '4', 'Quality product', '../images/jogn oil.jpg', '300', 98, 1, '6', 5),
(11, 'Himalaya', '4', 'quality product', '../images/himalaoil.jpg', '250', 416, 1, '6', 4),
(12, 'Himalaya', '4', 'quality product', '../images/hnoil.jpg', '170', 88, 1, '7', 3),
(13, 'babyhug', '5', 'moisturizing lotion', '../images/p2.jfif', '180', 220, 1, '8', 4),
(14, 'sebamed', '6', 'babysoap', '../images/soap1.webp', '180', 33, 1, '9', 4),
(15, 'sebamed', '5', 'lotion', '../images/bodywash1.webp', '200', 0, 1, '8', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasechild`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasechild` (
  `pchildid` int(11) NOT NULL AUTO_INCREMENT,
  `supid` int(11) NOT NULL,
  `pmasterid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `costprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `date` date NOT NULL,
  `sellingprice` decimal(10,0) NOT NULL,
  PRIMARY KEY (`pchildid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tbl_purchasechild`
--

INSERT INTO `tbl_purchasechild` (`pchildid`, `supid`, `pmasterid`, `itemid`, `costprice`, `quantity`, `totalprice`, `date`, `sellingprice`) VALUES
(14, 0, 10, 0, 180, 30, 5400, '2021-11-27', '0'),
(15, 0, 10, 11, 190, 79, 15010, '2021-11-27', '0'),
(16, 0, 11, 8, 120, 40, 4800, '2021-11-27', '0'),
(17, 0, 15, 0, 0, 0, 0, '2021-11-28', '0'),
(18, 0, 19, 0, 120, 20, 2400, '2021-11-29', '0'),
(19, 0, 22, 13, 100, 20, 2000, '2021-11-29', '0'),
(20, 0, 23, 8, 100, 4, 400, '2021-11-30', '0'),
(21, 0, 26, 8, 120, 4, 480, '2021-11-30', '0'),
(22, 0, 30, 11, 300, 4, 1200, '2021-11-30', '0'),
(23, 0, 30, 0, 0, 0, 0, '2021-11-30', '0'),
(24, 0, 30, 13, 200, 100, 20000, '2021-11-30', '0'),
(25, 0, 31, 13, 200, 10, 2000, '2021-11-30', '0'),
(26, 0, 32, 13, 200, 10, 2000, '2021-11-30', '0'),
(27, 0, 35, 8, 200, 200, 40000, '2021-11-30', '0'),
(28, 0, 37, 8, 200, 10, 2000, '2021-12-01', '0'),
(29, 0, 37, 8, 200, 10, 2000, '2021-12-01', '0'),
(30, 0, 38, 15, 200, 10, 2000, '2021-12-01', '0'),
(31, 0, 38, 15, 200, 10, 2000, '2021-12-01', '0'),
(32, 0, 40, 8, 200, 10, 2000, '2021-12-01', '0'),
(33, 0, 42, 13, 200, 10, 2000, '2021-12-02', '0'),
(34, 0, 43, 0, 0, 0, 0, '2021-12-02', '0'),
(35, 0, 44, 10, 200, 10, 2000, '2021-12-02', '0'),
(36, 0, 45, 12, 200, 20, 4000, '2021-12-02', '0'),
(37, 0, 46, 14, 130, 10, 1300, '2021-12-02', '0'),
(38, 0, 47, 13, 200, 10, 2000, '2021-12-02', '0'),
(39, 0, 48, 8, 200, 10, 2000, '2021-12-02', '0'),
(40, 0, 48, 8, 300, 20, 6000, '2021-12-02', '0'),
(41, 0, 48, 0, 300, 20, 6000, '2021-12-02', '0'),
(42, 0, 49, 14, 300, 30, 9000, '2021-12-02', '0'),
(43, 0, 51, 11, 300, 20, 6000, '2021-12-02', '100'),
(44, 0, 52, 0, 300, 30, 9000, '2021-12-02', '100'),
(45, 0, 53, 0, 300, 20, 6000, '2021-12-02', '100'),
(46, 0, 53, 0, 0, 0, 0, '2021-12-02', '0'),
(47, 10, 70, 11, 150, 10, 1500, '2022-01-15', '200'),
(48, 10, 72, 11, 150, 10, 1500, '2022-01-15', '200'),
(49, 8, 74, 11, 210, 10, 2100, '2022-01-15', '250'),
(50, 9, 74, 11, 210, 100, 21000, '2022-01-15', '250'),
(51, 9, 74, 11, 210, 100, 21000, '2022-01-15', '250'),
(52, 9, 76, 11, 210, 100, 21000, '2022-01-15', '250'),
(53, 9, 77, 11, 150, 100, 15000, '2022-01-15', '250');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchasemaster`
--

CREATE TABLE IF NOT EXISTS `tbl_purchasemaster` (
  `pmasterid` int(11) NOT NULL AUTO_INCREMENT,
  `supid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `totalamt` int(11) NOT NULL,
  `pstatus` varchar(50) NOT NULL,
  PRIMARY KEY (`pmasterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `tbl_purchasemaster`
--

INSERT INTO `tbl_purchasemaster` (`pmasterid`, `supid`, `staffid`, `totalamt`, `pstatus`) VALUES
(10, 8, 9, 370, ''),
(11, 8, 9, 120, ''),
(12, 8, 9, 0, ''),
(13, 8, 9, 0, ''),
(14, 9, 5, 0, ''),
(15, 9, 5, 0, ''),
(16, 8, 9, 0, ''),
(17, 8, 9, 0, ''),
(18, 8, 9, 0, ''),
(19, 9, 9, 0, ''),
(20, 9, 9, 0, ''),
(21, 0, 9, 0, ''),
(22, 9, 9, 100, ''),
(23, 8, 9, 0, ''),
(24, 8, 9, 0, ''),
(25, 8, 9, 0, ''),
(26, 8, 9, 120, ''),
(27, 9, 9, 0, ''),
(28, 8, 9, 0, ''),
(29, 9, 9, 0, ''),
(30, 9, 9, 500, ''),
(31, 8, 9, 200, ''),
(32, 8, 9, 200, ''),
(33, 8, 5, 0, ''),
(34, 8, 5, 0, ''),
(35, 8, 5, 200, ''),
(36, 8, 9, 0, ''),
(37, 8, 9, 400, ''),
(38, 8, 9, 400, ''),
(39, 8, 9, 0, ''),
(40, 8, 9, 200, ''),
(41, 8, 9, 340, ''),
(42, 8, 9, 200, ''),
(43, 8, 9, 0, ''),
(44, 8, 9, 200, ''),
(45, 9, 9, 200, ''),
(46, 10, 9, 130, ''),
(47, 9, 5, 200, ''),
(48, 8, 9, 800, ''),
(49, 8, 9, 300, ''),
(50, 8, 9, 0, ''),
(51, 10, 9, 300, ''),
(52, 9, 9, 300, ''),
(53, 8, 9, 300, ''),
(54, 10, 9, 0, ''),
(55, 9, 9, 0, ''),
(56, 8, 9, 0, ''),
(57, 9, 9, 0, ''),
(58, 8, 9, 0, ''),
(59, 0, 9, 0, ''),
(60, 0, 5, 0, ''),
(61, 9, 0, 0, ''),
(62, 8, 9, 0, ''),
(63, 9, 5, 0, ''),
(64, 9, 5, 0, ''),
(65, 9, 9, 0, ''),
(66, 9, 9, 0, ''),
(67, 8, 0, 0, 'Purchased'),
(68, 8, 0, 0, 'Purchased'),
(69, 9, 0, 0, ''),
(70, 0, 0, 1500, 'Purchased'),
(71, 8, 9, 0, ''),
(72, 0, 9, 1500, 'Purchased'),
(73, 8, 9, 0, ''),
(74, 0, 9, 0, 'Purchased'),
(75, 9, 9, 0, ''),
(76, 0, 9, 21000, 'Purchased'),
(77, 0, 10, 15000, 'Purchased');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remark`
--

CREATE TABLE IF NOT EXISTS `tbl_remark` (
  `remarkid` int(11) NOT NULL AUTO_INCREMENT,
  `cchildid` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  PRIMARY KEY (`remarkid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_remark`
--

INSERT INTO `tbl_remark` (`remarkid`, `cchildid`, `remarks`) VALUES
(1, 48, 'asdd\r\n'),
(2, 51, 'arrr'),
(3, 54, 'asf\r\n'),
(4, 56, 'abcss');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `houseno` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`sid`, `fname`, `lname`, `phone`, `houseno`, `street`, `district`, `pincode`, `email`, `status`, `date`) VALUES
(5, 'Bibi', 'joy', '7897897897', '365', 'aynikkal', 'thrissur', 679789, 'bibi@gmail.com', '1', '2021-11-26'),
(8, 'Tom', 'joy', '8080808080', 'rose villa', 'Aluva', 'Ernakulam', 679789, 'tom@gmail.com', '-1', '2021-11-27'),
(9, 'Admin', '', '7897897897', '879', 'Aluva', 'Ernakulam', 679789, 'admin@gmail.com', '1', '2015-11-01'),
(10, 'mark', 'ben', '9895763882', 'hno34', 'kochi', 'ernakulam', 682018, 'mark@gmail.com', '1', '2021-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE IF NOT EXISTS `tbl_subcat` (
  `scid` int(11) NOT NULL AUTO_INCREMENT,
  `catid` varchar(30) NOT NULL,
  `category` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`scid`, `catid`, `category`, `status`) VALUES
(4, '3', 'Herbals Baby Powder', '1'),
(5, '3', 'dusting Powder with Organic Oa', '1'),
(6, '4', 'Bath Oil', '1'),
(7, '4', 'Nourishing oil', '1'),
(8, '5', 'Moisturizers', '1'),
(9, '6', 'soap', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE IF NOT EXISTS `tbl_supplier` (
  `sup_id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` varchar(30) NOT NULL,
  `supname` varchar(30) NOT NULL,
  `supphone` bigint(12) NOT NULL,
  `supemail` varchar(30) NOT NULL,
  `supcity` varchar(30) NOT NULL,
  `supdistrict` varchar(30) NOT NULL,
  `suppincode` int(11) NOT NULL,
  `supstate` varchar(30) NOT NULL,
  `supstatus` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`sup_id`, `staffid`, `supname`, `supphone`, `supemail`, `supcity`, `supdistrict`, `suppincode`, `supstate`, `supstatus`, `date`) VALUES
(8, '9', 'Aiswarya j', 8080808080, 'ais@gmail.com', 'thrissur', 'thrissur', 679789, 'kerala', 1, '2021-11-27'),
(9, '5', 'Frank ', 8975774367, 'frank@gmail.com', 'kochi', 'ernakulam', 682017, 'Kerala', 1, '2021-11-28'),
(10, '9', 'merin', 8793567321, 'merin@gmail.com', 'kochi', 'ernakulam', 682019, 'Kerala', 1, '2021-12-02');
