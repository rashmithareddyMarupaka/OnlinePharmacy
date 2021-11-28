-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 07:59 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `pid` int(11) NOT NULL,
  `storeid` int(11) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`pid`, `storeid`, `unitprice`, `quantity`) VALUES
(1, 3, 11, 10),
(1, 4, 33, 12),
(2, 2, 33, 50),
(2, 3, 12, 32),
(2, 5, 11, 10),
(3, 3, 33, 22),
(3, 4, 11, 50),
(4, 3, 56, 100),
(5, 1, 12, 12),
(5, 4, 12, 22),
(5, 5, 11, 55),
(6, 1, 11, 55),
(6, 3, 33, 22),
(7, 1, 11, 10),
(7, 3, 56, 67),
(7, 4, 56, 45),
(8, 1, 12, 25),
(8, 3, 33, 50),
(8, 5, 2, 25),
(9, 1, 2, 25),
(9, 3, 11, 111),
(9, 5, 33, 25),
(10, 3, 12, 99),
(10, 4, 56, 111),
(11, 3, 17, 20),
(12, 1, 12, 22),
(12, 3, 55, 100),
(12, 5, 11, 23),
(13, 3, 21, 30),
(13, 4, 12, 22),
(13, 5, 11, 66),
(14, 1, 12, 25),
(14, 3, 56, 12),
(14, 5, 33, 50),
(15, 1, 11, 10),
(15, 3, 18, 57),
(15, 5, 33, 50);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `firstname`, `lastname`, `email`, `phonenumber`, `address`, `dob`, `password`) VALUES
(2, 'Rashmitha', 'Marupaka', 'rashmitha@gmail.com', '890-456-7890', '789 Arlington Avenue, Pitssburgh,PA-15219', '1999-08-26', '8cc9484c825e3265872df853a7884e9a'),
(4, 'Rashu', 'Maru', 'ras@gmail.com', '123-245-5678', 'dasfasdfs', '2021-11-11', '202cb962ac59075b964b07152d234b70'),
(5, 'Rash', 'fadf', 'asdf@eerr.com', '123-567-8990', 'fasdfas', '2021-11-08', '25d55ad283aa400af464c76d713c07ad'),
(7, 'ras', 'mar', 'ras@mar.com', '123-245-5678', '12345', '2010-12-08', '25d55ad283aa400af464c76d713c07ad'),
(8, 'rty', 'rty', 'rty@rty.com', '123-456-7890', 'dfa', '1998-07-01', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `productname`, `description`, `type`) VALUES
(1, 'Atorvastatin', 'Cholesterol', 'Tablet'),
(2, 'Levothyroxine', 'Thyroid', 'Tablet'),
(3, 'Lisinopril', 'Bloodpressure', 'Tablet'),
(4, 'Metformin', 'Diabetes', 'Tablet'),
(5, 'Amlodipine', 'Chestpain', 'Tablet'),
(6, 'Paracetamol', 'Fever', 'Tablet'),
(7, 'Hydrocortisone Cream', 'Inflammation', 'Cream'),
(8, 'Antiseptic Cream', 'scrapes ', 'Cream'),
(9, 'Delsym', 'Cough', 'Syrup'),
(10, 'Mucinex', 'Cough', 'Syrup'),
(11, 'Theraflu', 'Cold', 'Syrup'),
(12, 'Atomy Vitamin B', 'B Complex', 'Capsule'),
(13, 'Evion', 'Vitamin E', 'Capsule'),
(14, 'Exuviance', 'Vitamin E', 'Capsule'),
(15, 'Ibuprofen', 'Pain relief', 'Capsule');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(11) NOT NULL,
  `stafflevel` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `stafflevel`, `firstname`, `lastname`, `password`, `email`, `phonenumber`) VALUES
(1, 0, 'Rashmitha', 'Marupaka', 'e10adc3949ba59abbe56e057f20f883e', 'rashmithareddy.marupaka@gmail.com', '2147483647'),
(2, 1, 'Jane', 'Doe', '85166E7085BCB97034733B8CBEE5CE92', 'jane.doe@gmai.com', '789-564-3210'),
(3, 1, 'Tim', 'Miller', '296E00E7E4B9251296BBD51F51C2A8A8', 'timmiller@gmail.com', '978-654-3345'),
(4, 1, 'Harry', 'Manson', '049E5F3636BCD1351375757E3D4CC554', 'harrymanson@gmail.com', '567-893-4021'),
(5, 1, 'Lisa', 'Joe', '86CDF5FB234C7F31965DB50121415678', 'lisajoe@gmail.com', '876-534-5690'),
(6, 1, 'Sally', 'Dan', 'F3AD0E822DE5C1F9BFCADB735654F354', 'sallydan@gmail.com', '657-894-0231');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `storeid` int(11) NOT NULL,
  `region` varchar(50) NOT NULL,
  `staffid` int(11) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `storename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`storeid`, `region`, `staffid`, `phonenumber`, `storename`) VALUES
(1, 'Home Wood', 1, '234-567-0890', 'Home Wood_678'),
(2, 'Shady Side', 2, '678-564-7865', 'Shady Side_345'),
(3, 'Squirrel Hill', 3, '432-437-7890', 'squirrel Hill_543'),
(4, 'Oak Land', 4, '779-899-9078', 'Oak Land_789'),
(5, 'Point Breeze', 5, '567-987-66666', 'Point Breeze_321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`pid`,`storeid`),
  ADD KEY `storeid_fk` (`storeid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`),
  ADD UNIQUE KEY `email_ID` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`storeid`),
  ADD KEY `store_storeid_fk` (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `storeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available`
--
ALTER TABLE `available`
  ADD CONSTRAINT `pid_fk` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `storeid_fk` FOREIGN KEY (`storeid`) REFERENCES `store` (`storeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_storeid_fk` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
