-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 29, 2018 at 12:57 AM
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
CREATE DATABASE IF NOT EXISTS `ieat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ieat`;

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
  `cellno` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`custid`, `passwd`, `custname`, `custemail`, `custaddress`, `zipcode`, `cellno`) VALUES
('dbbalar', 'IdontKnow1', 'divyesh', 'divyesh@balar.com', '2121 st mathieu, appt 1407', 'h3h 2j3', 1121212121),
('root', 'root', 'frank', 'frank@franky.com', '12212 universe, planet mars', 'notneed', 1658),
('admin', 'admin', 'baap', 'baapkamail@mail.com', 'Baap ka thikana', 'baap111', 1000100010);

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
('P001', 'Greek Pizza', 'It includes Feta Cheese, Fresh Tomato, red onions and black olives and also includes Love from us', 21.95, 'greek.jpg'),
('P002', 'Mexican Pizza', 'In has sizzling hot peppers with greek hebs and a pinch of merijuana  ', 32.56, 'mexican.jpg'),
('P003', 'All Dressed Pizza', 'All dressed with Green olives, green peppers, Mozzarella cheese, Mushrooms, red onions and tomato', 23.44, 'alldressed.jpg'),
('P004', 'Cheese Pizza', 'Margerita style plain cheese pizza with italiano sause on base', 21.95, 'plain.jpg\r\n'),
('P005', 'Mushroom Pizza', 'Fresh mushroom with Cheesy texture on top of italiano base.', 24.99, 'mushroom.jpg\r\n'),
('P006', 'Green Olive Pizza', 'Full of green olives direct from Italy, with mozzarella cheese. ', 24.99, 'olive.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(4) NOT NULL,
  `did` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `did`) VALUES
(1, 'P001');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`did`) REFERENCES `pizzas` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
