-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2018 at 09:07 AM
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
  `zipcode` varchar(3) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `areasofdelivery`
--

INSERT INTO `areasofdelivery` (`zipcode`, `price`) VALUES
('H3H', 7),
('H4A', 4),
('H4B', 3),
('H4H', 5),
('H4V', 4),
('H4W', 4);

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

--
-- Dumping data for table `baverages`
--

INSERT INTO `baverages` (`did`, `dname`, `ddesc`, `price`, `image`) VALUES
('B001', '7Up', 'Lemon-lime-flavored non-caffeinated soft drink.', 1.75, '7up.jpg'),
('B002', 'Coke(Regular)', 'Classic Coka-cola', 1.75, 'coke.gif'),
('B003', 'Diet Coke', 'Diet Coke is a sugar-free soft, it contains artificial sweetener.', 1.75, 'dietcoke.gif');

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
('admin', 'admin', 'admin', 'divyeshkumar_balar@outlook.com', '', '', 2147483647, '1'),
('Ieat', 'Ieat', 'Ieat', 'divyeshkumar_balar@outlook.com', '', '', 2147483647, '1'),
('Ishan', 'Ishan', 'Ishan', 'Ishan@kansara.com', '', '', 2147483647, '1'),
('Krunal', 'jogani', 'JETHABHAI BHANDERI', 'joganikrunal29@gmail.com', '', '', 0, '1'),
('Neysa', 'Neysa', 'Neysa', 'divyeshkumar_balar@outlook.com', '', '', 2147483647, '1'),
('root', 'root', 'Divyeshkumar Balar', 'divyeshkumar_balar@outlook.com', '', '', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `order_dtl`
--

CREATE TABLE `order_dtl` (
  `oid` int(5) NOT NULL,
  `custid` varchar(20) NOT NULL,
  `type` varchar(2) NOT NULL DEFAULT '0',
  `cname` varchar(50) NOT NULL,
  `del_address` varchar(200) NOT NULL,
  `apptno` varchar(5) NOT NULL,
  `zipcode` varchar(7) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `delInstruction` varchar(200) NOT NULL,
  `subtotal` float NOT NULL,
  `gst` float NOT NULL,
  `qst` float NOT NULL,
  `total` float NOT NULL,
  `date` varchar(12) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_dtl`
--

INSERT INTO `order_dtl` (`oid`, `custid`, `type`, `cname`, `del_address`, `apptno`, `zipcode`, `city`, `phoneno`, `delInstruction`, `subtotal`, `gst`, `qst`, `total`, `date`, `time`, `status`) VALUES
(36, 'root', 'd', 'Divyeshkumar Balar', '1407-2121 St. Mathieu, near Guy-concordia metro', '1406', 'H3H 2J3', 'Montreal', 2147483647, 'Dont rang the bell', 75.44, 3.772, 6.7896, 86.7409, '08/23/2018', '11:16 AM', 'W'),
(37, 'root', 'd', 'Nitin', '17/18 Maniba park society, Near Kailashdham soc, puna-bombay market road', '1540', 'H3H 2J3', 'Surat', 2147483647, 'Call when arrive', 86.46, 4.323, 7.7814, 99.4117, '08/14/2018', '5:26 PM', 'W'),
(38, 'Ieat', 'd', 'Reema Mohan Dave', 'Shukal Faliyu Third Part Kanjri', '1407', 'H3H 2J3', 'Anand', 2147483647, 'Call me when you reach', 264.26, 13.213, 23.7834, 303.846, '08/19/2018', '3:30 PM', 'W'),
(39, 'Ieat', 'd', 'Pranav Bharatbhai Patel', 'Ananad', '2545', 'H3H 2J3', 'Anand', 2147483647, 'Delivery  Instruction/Allergic instruction\r\n					', 76.16, 3.808, 6.8544, 87.5688, '08/24/2018', '4:54 PM', 'W');

-- --------------------------------------------------------

--
-- Table structure for table `order_spec`
--

CREATE TABLE `order_spec` (
  `oid` int(5) NOT NULL,
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` float NOT NULL,
  `spe_inst` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_spec`
--

INSERT INTO `order_spec` (`oid`, `did`, `dname`, `quantity`, `price`, `spe_inst`) VALUES
(36, 'P008', 'Hawaiian Pizza', 1, 30.05, 'No pepperoni'),
(36, 'P001', 'Cheese Pizza', 1, 21.95, 'no mexicans'),
(36, 'P003', 'All Dressed Pizza', 1, 23.44, 'no veggies'),
(37, 'P004', 'Greek Pizza', 1, 21.95, 'No pepperoni'),
(37, 'P002', 'Mexican Pizza', 1, 32.56, 'no mexicans'),
(37, 'P010', 'Student Special', 1, 10, 'no veggies'),
(37, 'P001', 'Cheese Pizza', 1, 21.95, 'no pepperoni'),
(38, 'P002', 'Mexican Pizza', 1, 32.56, 'No pepperoni'),
(38, 'P004', 'Greek Pizza', 6, 21.95, 'no mexicans'),
(38, 'P010', 'Student Special', 10, 10, 'no veggies'),
(39, 'P007', 'Pepperoni Pizza', 1, 21.65, 'no bread'),
(39, 'P002', 'Mexican Pizza', 1, 32.56, 'no cheese'),
(39, 'P004', 'Greek Pizza', 1, 21.95, 'no oniom');

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
-- Table structure for table `salad`
--

CREATE TABLE `salad` (
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `ddesc` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salad`
--

INSERT INTO `salad` (`did`, `dname`, `ddesc`, `price`, `image`) VALUES
('V001', 'Caeser Salad', 'A Caesar salad is a green salad of romaine lettuce and croutons dressed with lemon juice, olive oil, egg, Worcestershire sauce, anchovies, garlic, Dijon mustard, Parmesan cheese, and black pepper.', 11.95, 'ceasersalad.jpg'),
('V002', 'Greek Salad', 'Made with pieces of tomatoes, sliced cucumbers, onion, feta cheese, and olives, seasoned with salt and oregano,', 13.65, 'greeksalad.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `srno` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`srno`, `name`) VALUES
(2, 'baverages'),
(1, 'pizzas'),
(4, 'salad'),
(3, 'side_Items');

-- --------------------------------------------------------

--
-- Table structure for table `side_items`
--

CREATE TABLE `side_items` (
  `did` varchar(5) NOT NULL,
  `dname` varchar(40) NOT NULL,
  `ddesc` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `side_items`
--

INSERT INTO `side_items` (`did`, `dname`, `ddesc`, `price`, `image`) VALUES
('S001', 'French Fries', 'French-fried potatoes are batonnet or allumette-cut deep-fried potatoes', 3.95, 'fries.jpg'),
('S002', 'Poutine(Reg)', 'French fries and cheese curds topped with a brown gravy.', 6.75, 'poutine.jpg'),
('S003', 'Curly Fries', 'Spiral spicy and salty potato fries. ', 4.25, 'spiralfries1.jpg');

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
-- Indexes for table `order_spec`
--
ALTER TABLE `order_spec`
  ADD KEY `oid` (`oid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `restrotime`
--
ALTER TABLE `restrotime`
  ADD PRIMARY KEY (`day`),
  ADD UNIQUE KEY `srno` (`srno`);

--
-- Indexes for table `salad`
--
ALTER TABLE `salad`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`srno`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `side_items`
--
ALTER TABLE `side_items`
  ADD PRIMARY KEY (`did`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_dtl`
--
ALTER TABLE `order_dtl`
  MODIFY `oid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `restrotime`
--
ALTER TABLE `restrotime`
  MODIFY `srno` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_dtl`
--
ALTER TABLE `order_dtl`
  ADD CONSTRAINT `order_dtl_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `cust` (`custid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
