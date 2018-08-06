-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2018 at 05:47 AM
-- Server version: 5.7.22-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieat`
--

-- --------------------------------------------------------

--
-- Table structure for table `areasofdelivery`
--

CREATE TABLE `areasofdelivery` (
  `zipcode` varchar(7) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areasofdelivery`
--

INSERT INTO `areasofdelivery` (`zipcode`, `price`) VALUES
('H3H 2J3', 7),
('H3H 2N2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `baverages`
--

CREATE TABLE `baverages` (
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `ddesc` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `custid` varchar(20) NOT NULL,
  `passwd` varchar(30) NOT NULL,
  `custname` varchar(40) NOT NULL,
  `custemail` varchar(50) NOT NULL,
  `custaddress` varchar(200) NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `cellno` int(15) NOT NULL,
  `vcode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`custid`, `passwd`, `custname`, `custemail`, `custaddress`, `zipcode`, `cellno`, `vcode`) VALUES
('bababose', 'admin', 'chaim', 'baapkamail@mail.com', 'decarie somewhere', 'H3H 2NJ', 1121212121, 'C623E');

-- --------------------------------------------------------

--
-- Table structure for table `order_dtl`
--

CREATE TABLE `order_dtl` (
  `oid` int(5) NOT NULL,
  `custid` varchar(20) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `cname` varchar(50) NOT NULL,
  `del_address` varchar(200) NOT NULL,
  `apptno` varchar(5) NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phonemo` int(15) NOT NULL,
  `delInstruction` varchar(200) NOT NULL,
  `subtotal` float NOT NULL,
  `gst` float NOT NULL,
  `qst` float NOT NULL,
  `total` float NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_dtl`
--

CREATE TABLE `order_item_dtl` (
  `oid` int(5) NOT NULL,
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` float NOT NULL,
  `spe_inst` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `ddesc` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`did`, `dname`, `ddesc`, `price`, `image`) VALUES
('P001', 'Cheese Pizza', 'Margerita style plain cheese pizza with italiano sause on base', 21.95, 'plain.jpg\r\n'),
('P002', 'Mexican Pizza', 'In has sizzling hot peppers with greek hebs and a pinch of merijuana  ', 32.56, 'mexican.jpg'),
('P003', 'All Dressed Pizza', 'All dressed with Green olives, green peppers, Mozzarella cheese, Mushrooms, red onions and tomato', 23.44, 'alldressed.jpg'),
('P004', 'Greek Pizza', 'It includes Feta Cheese, Fresh Tomato, red onions and black olives and also includes Love from us', 21.95, 'greek.jpg'),
('P005', 'Mushroom Pizza', 'Fresh mushroom with Cheesy texture on top of italiano base.', 24.99, 'mushroom.jpg\r\n'),
('P006', 'Green Olive Pizza', 'Full of green olives direct from Italy, with mozzarella cheese. ', 24.99, 'olive-1.jpg'),
('P007', 'Pepperoni Pizza', 'Fresh salami with tasty sause base full of cheese.', 21.65, 'pepperoni.jpg'),
('P008', 'Hawaiian Pizza', 'Native Canadian topped with tomato sauce, cheese, pineapple, and bacon or ham.', 30.05, 'hawaiian.jpg'),
('P009', 'Sicilian pizza', 'Full of veggies and cheese; direct from Sicily, Italy.', 26.95, 'sissilian.jpg'),
('P010', 'Student Special', 'Green papper, onion and mushroom which i had tonight', 10, 'thinkcrust.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(4) NOT NULL,
  `did` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restrotime`
--

CREATE TABLE `restrotime` (
  `srno` int(2) NOT NULL,
  `day` varchar(10) NOT NULL,
  `startsfrom` float NOT NULL,
  `endto` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restrotime`
--

INSERT INTO `restrotime` (`srno`, `day`, `startsfrom`, `endto`) VALUES
(5, 'friday', 8, 17),
(1, 'monday', 8, 22),
(6, 'saturday', 9, 4),
(0, 'sunday', 8, 22),
(4, 'thursday', 8, 22),
(2, 'tuesday', 8, 22),
(3, 'wednesday', 8, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `gst` float NOT NULL,
  `qst` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`gst`, `qst`) VALUES
(5, 9.98);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areasofdelivery`
--
ALTER TABLE `areasofdelivery`
  ADD PRIMARY KEY (`zipcode`);

--
-- Indexes for table `baverages`
--
ALTER TABLE `baverages`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `order_dtl`
--
ALTER TABLE `order_dtl`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `custid` (`custid`);

--
-- Indexes for table `order_item_dtl`
--
ALTER TABLE `order_item_dtl`
  ADD KEY `oid` (`oid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `INDEX` (`did`);

--
-- Indexes for table `restrotime`
--
ALTER TABLE `restrotime`
  ADD PRIMARY KEY (`day`),
  ADD UNIQUE KEY `srno` (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_dtl`
--
ALTER TABLE `order_dtl`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restrotime`
--
ALTER TABLE `restrotime`
  MODIFY `srno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_dtl`
--
ALTER TABLE `order_dtl`
  ADD CONSTRAINT `order_dtl_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `cust` (`custid`);

--
-- Constraints for table `order_item_dtl`
--
ALTER TABLE `order_item_dtl`
  ADD CONSTRAINT `order_item_dtl_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `order_dtl` (`oid`),
  ADD CONSTRAINT `order_item_dtl_ibfk_2` FOREIGN KEY (`did`) REFERENCES `pizzas` (`did`),
  ADD CONSTRAINT `order_item_dtl_ibfk_3` FOREIGN KEY (`did`) REFERENCES `baverages` (`did`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`did`) REFERENCES `pizzas` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
