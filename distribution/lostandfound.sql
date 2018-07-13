-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 09:58 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lostandfound`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `adminID` int(5) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`adminID`, `firstname`, `lastname`, `email`, `telephone`, `address`, `postcode`, `city`, `country`) VALUES
(1, 'Abbie', 'Anderson', 'aanderson@lostandfound.com', '02085031692', '36 Gurney Close', 'E15 1SJ', 'London ', 'United Kingdom'),
(2, 'Ross', 'Grieve', 'rgrieve@lostandfound.com', '02085031690', '36 Gurney Close', 'E15 1SJ', 'London', 'United Kingdom'),
(3, 'Philip', 'Stone', 'pstone@lostandfound.com', '02085031691', '36 Gurney Close  ', ' E15 1SJ', 'London', 'United Kingdom'),
(4, 'Buphender', 'Kaushal', 'bkaushal@lostandfound.com', '02085031693', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(5, 'Amanda', 'Nicholson', 'anicholson@lostandfound.com', '02085031694', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(6, 'Ahmed', 'Qaiser', 'aqaiser@lostandfound.com', '02085031695', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(7, 'Jane ', 'Cleland', 'jcleland@lostandfound.com', '02085031696', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(8, 'James ', 'Watson', 'jwatson@lostandfound.com', '02085031697', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(9, 'Joan ', 'Rennie', 'jrennie@lostandfound.com', '02085031698', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(10, 'Paul ', 'Tailor', 'ptaylor@lostandfound.com', '02085031699', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom'),
(11, 'John ', 'Martin', 'jmartin@lostandfound.com', '02085031700', '36 Gurney Close ', 'E15 1SJ', 'London', 'United Kingdom');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `Cat_name` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `Cat_name`) VALUES
(3, 'Clothes'),
(4, 'Fashion accessories'),
(5, 'Glasses'),
(6, 'Bags and Wallets'),
(7, 'Mobile Phones'),
(8, 'Tech Accessories'),
(9, 'Tech'),
(10, 'Toys'),
(11, 'Pets'),
(12, 'Jewelry'),
(13, 'Other items');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `adminID` int(11) DEFAULT NULL,
  `seekerID` int(11) DEFAULT NULL,
  `finderID` int(11) DEFAULT NULL,
  `shipping company` varchar(30) NOT NULL,
  `shipping_status` enum('Sent','In transit','Delivered','Collected','Delivery attempt') NOT NULL,
  `delivery_cost` decimal(7,2) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  `admin_fees` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryID`, `itemID`, `adminID`, `seekerID`, `finderID`, `shipping company`, `shipping_status`, `delivery_cost`, `delivery_date`, `admin_fees`) VALUES
(1, 4, 1, 28, 30, 'DPD', 'Sent', '4.89', '2018-01-30', '4.50'),
(2, 5, 7, 16, 8, 'YODEL', 'Delivered', '7.89', '2017-05-15', '4.50'),
(3, 7, 8, 27, 3, 'UBS', 'Delivery attempt', '8.46', '2018-01-19', '4.50'),
(4, 8, 10, 15, 7, 'DPD', 'Delivery attempt', '8.98', '2018-01-29', '4.00'),
(5, 9, 4, 13, 5, 'UBS', 'Delivered', '7.48', '2017-05-03', '4.50'),
(6, 10, 5, 12, 1, 'DHL', 'Delivered', '167.78', '2017-02-01', '4.50'),
(7, 12, 2, 17, 9, 'YODEL', 'In transit', '8.76', '2017-11-25', '4.50');

-- --------------------------------------------------------

--
-- Table structure for table `finders`
--

CREATE TABLE `finders` (
  `finderID` int(11) NOT NULL,
  `firstname` varchar(8) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `email` varchar(24) NOT NULL,
  `telno` varchar(12) NOT NULL,
  `address` varchar(21) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `city` varchar(14) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finders`
--

INSERT INTO `finders` (`finderID`, `firstname`, `lastname`, `dob`, `nationality`, `email`, `telno`, `address`, `postcode`, `city`, `country`, `password`) VALUES
(1, 'Stephen ', 'Green', '0000-00-00', '', 'greensteve@outlook.com', '0207572 4842', '1 Baldwin\'s Gardens', 'WC1X 8LP', 'London', 'United Kingdom', 996546),
(2, 'Eduardo ', 'Nascimento', '0000-00-00', '', 'ednas@yahoo.com', '0206368 6123', '5 Guilford Pl', 'WC1N 1EA', 'London', 'United Kingdom', 238310),
(3, 'Saba ', 'Khan', '0000-00-00', '', 'saba.khan@gmail.com', '0204376 3848', '39 Charlotte St', 'W1T 1RU', 'London', 'United Kingdom', 954547),
(4, 'Noeleen ', 'Hill', '0000-00-00', '', 'noeleenhill@yahoo.co.uk', '1902313642', 'Bridgnorth Rd', 'WV5 5AD', 'Wolverhampton ', 'United Kingdom', 764523),
(5, 'Joanne ', 'Grimwood', '0000-00-00', '', 'jgrim@gmail.com', '1785600384', '18 Lavender Cl', 'ST18 9PY', 'Stafford', 'United Kingdom', 216548),
(6, 'Peter', 'White', '0000-00-00', '', 'white654@gmail.com', '1743182374', 'Preston Montford Ln', 'SY4 1DY', 'Shrewsbury', 'United Kingdom', 905466),
(7, 'Ian ', 'Collins', '0000-00-00', '', 'ian_collins@yahoo.com', '1722142453', '18 Kivel Ct', 'SP4 6PG', 'Salisbury', 'United Kingdom', 725477),
(8, 'Antonio', 'Giglio', '0000-00-00', '', 'antonio.giglio@yahoo.com', '1992870432', '22 Ware Rd', 'EN11 9EZ', 'Hoddesdon ', 'United Kingdom', 554387),
(9, 'Helen ', 'Young', '0000-00-00', '', 'young.h@gmail.com', '1299106723', '142A Walter Nash Rd W', 'DY14 0DH', 'Kidderminster', 'United Kingdom', 342345),
(10, 'Pamela ', 'Martin', '0000-00-00', '', 'p.martin@google.com', '01344465120', '5 Drummond Cl, Brackn', 'RG12 2QG', 'Bracknell', 'United Kingdom', 163620),
(30, 'Daniel ', 'Raine', '0000-00-00', '', 'rained@outlook.com', '01923140250', '111 Kenmore Rd', 'HA3 9EY', ' Harrow ', 'United Kingdom', 546554),
(31, 'Mickey', 'Mouse', '2018-06-13', 'AX', 'test@gmail.com', '787978', 'jkhkjhkhk', '65567', 'mnnlklkj', 'AF', 0),
(32, 'Mickey', 'Mouse', '2018-05-29', 'AX', 'test@gmail.com', '787978', 'jkhkjhkhk', '65567', 'mnnlklkj', 'AX', 0);

-- --------------------------------------------------------

--
-- Table structure for table `found_item`
--

CREATE TABLE `found_item` (
  `foundID` int(11) NOT NULL,
  `finderID` int(11) NOT NULL,
  `found_location` varchar(100) NOT NULL,
  `found_country` varchar(50) NOT NULL,
  `found_date` date DEFAULT NULL,
  `found_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `found_item`
--

INSERT INTO `found_item` (`foundID`, `finderID`, `found_location`, `found_country`, `found_date`, `found_time`) VALUES
(1, 1, 'London', '', '2017-01-08', '15:00:00'),
(2, 2, 'London', '', '2018-01-30', '11:00:00'),
(3, 3, 'London', '', '2018-01-01', '18:00:00'),
(4, 4, 'BIRMINGHAM\r\n', '', '2017-03-19', '17:30:00'),
(5, 5, 'ILFORD', '', '2017-05-03', '13:00:00'),
(6, 6, 'Dewsbury', '', '2015-09-08', '19:00:00'),
(7, 7, 'Yovil', '', '2018-01-12', '15:00:00'),
(8, 8, 'Near NEWTON-STEWARD', '', '2017-04-22', '10:00:00'),
(9, 9, 'STORNOWAY', '', '2017-11-03', '07:00:00'),
(10, 10, 'BRACKNELL', '', '2018-01-12', '00:10:00'),
(11, 30, 'Harrow', '', '2018-01-19', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(7) NOT NULL,
  `item_name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `categoryID` int(11) NOT NULL,
  `brand` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  `weight` decimal(6,2) DEFAULT NULL,
  `height` decimal(6,2) DEFAULT NULL,
  `width` decimal(6,2) DEFAULT NULL,
  `material` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `size` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `color` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `item_picture` tinyblob,
  `status` enum('Found','Returned') CHARACTER SET latin1 DEFAULT NULL,
  `est_shipping_cost` decimal(6,2) DEFAULT NULL,
  `item_fate` enum('Keeping allowed','Return to administrator','Given to charities','Send item back to seeker') CHARACTER SET latin1 DEFAULT NULL,
  `lostID` int(11) DEFAULT NULL,
  `foundID` int(11) DEFAULT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `item_name`, `categoryID`, `brand`, `description`, `weight`, `height`, `width`, `material`, `size`, `color`, `item_picture`, `status`, `est_shipping_cost`, `item_fate`, `lostID`, `foundID`, `adminID`) VALUES
(1, 'Samsung Galaxy', 7, '', 'grey with scratches on the screen', '0.55', NULL, NULL, 'plastic and metal', '', 'grey', '', '', '8.48', 'Send item back to seeker', 6, NULL, 3),
(2, 'gloves', 4, '', 'black  wool gloves', NULL, NULL, NULL, 'wool', 'S', 'black', '', 'Found', '6.17', 'Keeping allowed', NULL, 4, 3),
(3, '1984 book', 13, 'penguin', '1984 by George Orwell, old looking cover,\r\nred and yellow front cover', '5.00', '0.00', '0.00', '', '', '', 0xffd8ffe000104a46494600010100000100010000ffdb00840009060713131215131212151515151715151618181517171515151515171617181518181d2820181a251e151722312125292b2e2e2e171f3338332d37282d302b010a0a0a0e0d0e1b10101b2b2620252f2d2f322e2d2e2f2d2f2d2f2f2d2e2d2d2d2d2d2f2d2d2f2d2d2d2d2f2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2d2dffc0001108010300c303012200021101031101ffc4001c0000010403010000000000000000000000000405060701030802ffc4004b1000020003050405060a070607010000000102000311040512213106415161132271819107324252a1d1141723547292, '', '5.49', 'Keeping allowed', 13, NULL, 0),
(4, 'bracelet', 12, '', 'gold bracelet with garnet stones', NULL, NULL, NULL, 'gold and garnet stone', '', 'yellow and red', '', 'Returned', '6.89', 'Send item back to seeker', 12, 11, 3),
(5, 'winter coat', 3, 'H & M', 'white winter soat with a big hole in one of the pocket', NULL, NULL, '0.00', 'synthetic', '8', 'white', '', 'Returned', '5.34', 'Given to charities', 8, 8, 7),
(7, 'wallet', 6, '', 'black leather wallet which can hold an id card and 3 credit card. one pocket to put bills and one pocket to hold coins.', '0.50', '0.40', '0.00', 'leather', '', 'black', '', 'Returned', '6.00', 'Send item back to seeker', 3, 3, 8),
(8, 'Asus laptop hc34344535', 9, 'Asus', '13\" laptop with 2 usb sockets. space grey color with an \"I love laptops\" sticker on the keyboard', '1.50', NULL, NULL, 'plastic', '', 'space grey', '', '', '10.43', 'Send item back to seeker', 7, 7, 10),
(9, 'teddy bear', 10, '', 'Pink teddy bear with one eye missing.', NULL, NULL, NULL, 'plush ', NULL, 'pink', '', 'Returned', '4.50', 'Send item back to seeker', 5, 5, 4),
(10, 'Dog', 11, '', 'black and white female bulldog.  Its name is Poppy.', '5.60', NULL, NULL, '', '', 'black and white', '', 'Returned', '99.00', 'Send item back to seeker', 1, 1, 5),
(11, 'swimming suit', 3, 'adidas', 'one piece women swimming suit ', '0.00', NULL, NULL, 'syntetic', '12', 'green', '', 'Returned', '2.80', 'Keeping allowed', 2, 2, 1),
(12, 'iphone', 7, 'apple', 'iphone 5. champagne color, in a good state protected by a transparent plastic case.', NULL, NULL, NULL, '', '', '', '', '', '8.54', 'Send item back to seeker', 9, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lost_item`
--

CREATE TABLE `lost_item` (
  `lostID` int(11) NOT NULL,
  `seekerID` int(11) NOT NULL,
  `lost_date` date NOT NULL,
  `lost_time` time DEFAULT NULL,
  `lost_location` varchar(100) NOT NULL,
  `lost_country` varchar(50) NOT NULL,
  `reward` enum('Yes','No') NOT NULL,
  `reward_details` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_item`
--

INSERT INTO `lost_item` (`lostID`, `seekerID`, `lost_date`, `lost_time`, `lost_location`, `lost_country`, `reward`, `reward_details`) VALUES
(1, 12, '2017-02-18', '16:00:00', 'LONDON', '', 'Yes', '200'),
(2, 26, '2018-05-15', '12:00:00', 'LONDON\r\n', '', 'No', NULL),
(3, 27, '2017-02-14', '12:00:00', 'LONDON', '', 'No', NULL),
(4, 11, '2017-02-03', '16:00:00', 'BIRMINGHAM', '', 'No', NULL),
(5, 13, '2017-04-17', '08:00:00', 'ILFORD\r\n\r\n', '', 'No', NULL),
(6, 14, '2015-05-02', '13:00:00', 'DEWSBURY', '', 'No', NULL),
(7, 15, '2018-01-02', '14:30:00', 'Yeovil', '', 'No', NULL),
(8, 16, '2017-04-12', '20:00:00', 'Newton-stewart', '', 'No', NULL),
(9, 17, '2017-03-10', '18:00:00', 'Stornoway', '', 'No', NULL),
(10, 18, '2018-01-11', '15:15:00', 'Edinburgh', '', 'No', NULL),
(11, 28, '2018-01-17', '07:00:00', 'london', '', 'No', NULL),
(12, 28, '2018-01-01', '04:00:00', 'harrow', '', 'No', NULL),
(13, 29, '2018-01-17', '00:12:00', 'ilford', '', 'Yes', '10');

-- --------------------------------------------------------

--
-- Table structure for table `seekers`
--

CREATE TABLE `seekers` (
  `seekerID` int(11) NOT NULL,
  `firstname` varchar(8) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `email` varchar(24) NOT NULL,
  `telno` varchar(12) NOT NULL,
  `address` varchar(21) NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `city` varchar(14) NOT NULL,
  `country` varchar(14) NOT NULL,
  `password` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seekers`
--

INSERT INTO `seekers` (`seekerID`, `firstname`, `lastname`, `dob`, `nationality`, `email`, `telno`, `address`, `postcode`, `city`, `country`, `password`) VALUES
(11, 'Tin', 'Lo', '0000-00-00', '', 'tin.lo51@yahoo.co.uk', '01204884758', '9 Waters Meeting Rd', 'BL1 8TU', 'Bolton', 'United Kingdom', 234510),
(12, 'Nicola ', 'Howes', '0000-00-00', '', 'nic_howes@gmail.com', '0202583 0887', '153-154 Lever St', 'EC1V 8EJ', 'London', 'United Kingdom', 674326),
(13, 'Jeffrey ', 'McMahon', '0000-00-00', '', 'jef.mac@gmail.com', '01708352684', '60 Otley Dr', 'IG2 6SN', 'Ilford', 'United Kingdom', 865734),
(14, 'Patrick', 'Keeley', '0000-00-00', '', 'keeley_p@hotmail.com', '01924406235', '33-45 Carlton Rd', 'WF13 2NG', 'Dewsbury', 'United Kingdom', 796543),
(15, 'Tariq ', 'Khan', '0000-00-00', '', 'tkhan@outlook.com', '01935015288', 'Greenmoor Ln', 'BA21 3QE', 'Yeovil', 'United Kingdom', 786677),
(16, 'Julian ', ' Potts', '0000-00-00', '', 'jpotts@gmail.com', '01671604725', 'Windsor Terrace', 'DG8 6HU', 'Newton Stewart', 'United Kingdom', 765476),
(17, 'Mukund', 'Mistry', '0000-00-00', '', 'mukundmistry@gmail.com', '01851871030', '1A Urquhart Gardens', 'HS1 2TX', 'Stornoway ', 'United Kingdom', 485409),
(18, 'Robert ', 'Hind', '0000-00-00', '', 'robhind75@hotmail.com', '0116670 8768', 'Arnesby Ln', 'LE8 5UP', 'Leicester', 'United Kingdom', 673541),
(19, 'Caroline', 'Legg', '0000-00-00', '', 'c.legg23@gmail.com', '01509675078', '2 Pasture Ln, Hathern', 'LE12 5LJ', 'Loughborough', 'United Kingdom', 467744),
(26, 'John', 'Meade', '0000-00-00', '', 'jmeade@lhotmail.com', '02085036544', '11B King Henry\'s Walk', 'N1 4NW', 'London', 'United Kingdom', 876534),
(27, 'Mahian ', 'Shah', '0000-00-00', '', 'mahianshah@gmail.com', '02064543676', '110 Drury Ln', 'WC2B 4AT', 'London', 'United Kingdom', 875643),
(28, 'Joan ', 'twist', '0000-00-00', '', 'jtwist@yahoo.co.uk', '02054343357', '7 Torbridge Cl', 'HA2 8AQ', 'Harrow', 'United Kingdom', 767794),
(29, 'Jane ', 'Tailor', '0000-00-00', '', 'j_taylor@gmail.com', '02085035432', '37 Looe Gardens', 'IG6 2BA', 'Ilford', 'United Kingdom', 654576),
(30, 'Mickey', 'Mouse', '2018-06-13', 'AX', 'isabelleprenez@outlook.c', '787978', 'jkhkjhkhk', '65567', 'mnnlklkj', 'DZ', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryID`),
  ADD KEY `itemID` (`itemID`),
  ADD KEY `adminID` (`adminID`),
  ADD KEY `seekerID` (`seekerID`),
  ADD KEY `finderID` (`finderID`);

--
-- Indexes for table `finders`
--
ALTER TABLE `finders`
  ADD PRIMARY KEY (`finderID`);

--
-- Indexes for table `found_item`
--
ALTER TABLE `found_item`
  ADD PRIMARY KEY (`foundID`),
  ADD KEY `finderID` (`finderID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `lostID` (`lostID`),
  ADD KEY `foundID` (`foundID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `lost_item`
--
ALTER TABLE `lost_item`
  ADD PRIMARY KEY (`lostID`),
  ADD KEY `seekerID` (`seekerID`);

--
-- Indexes for table `seekers`
--
ALTER TABLE `seekers`
  ADD PRIMARY KEY (`seekerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `adminID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finders`
--
ALTER TABLE `finders`
  MODIFY `finderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `found_item`
--
ALTER TABLE `found_item`
  MODIFY `foundID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lost_item`
--
ALTER TABLE `lost_item`
  MODIFY `lostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `seekers`
--
ALTER TABLE `seekers`
  MODIFY `seekerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`),
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`adminID`) REFERENCES `administrators` (`adminID`),
  ADD CONSTRAINT `delivery_ibfk_3` FOREIGN KEY (`seekerID`) REFERENCES `seekers` (`seekerID`),
  ADD CONSTRAINT `delivery_ibfk_4` FOREIGN KEY (`finderID`) REFERENCES `finders` (`finderID`);

--
-- Constraints for table `found_item`
--
ALTER TABLE `found_item`
  ADD CONSTRAINT `found_item_ibfk_1` FOREIGN KEY (`finderID`) REFERENCES `finders` (`finderID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`lostID`) REFERENCES `lost_item` (`lostID`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`foundID`) REFERENCES `found_item` (`foundID`);

--
-- Constraints for table `lost_item`
--
ALTER TABLE `lost_item`
  ADD CONSTRAINT `lost_item_ibfk_1` FOREIGN KEY (`seekerID`) REFERENCES `seekers` (`seekerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
