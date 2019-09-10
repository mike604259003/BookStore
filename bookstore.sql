-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2019 at 11:41 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `B_ID` int(11) NOT NULL,
  `B_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B_Price` int(11) NOT NULL,
  `B_author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B_publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `B_category_id` int(11) NOT NULL,
  `B_ISBN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `B_numberpage` int(11) NOT NULL,
  `B_year` int(11) NOT NULL,
  `B_amounta` int(11) NOT NULL,
  `B_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`B_ID`, `B_name`, `B_Price`, `B_author`, `B_publisher`, `B_category_id`, `B_ISBN`, `B_numberpage`, `B_year`, `B_amounta`, `B_pic`) VALUES
(1, 'Write and Wipe กขค หนังสือเขียน', 238, 'WordPlay Kids', 'WordPlay KIDS', 10, '8859287758034', 27, 2560, 50, '1565668079-4.jpg'),
(2, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 1', 352, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '9786167477480', 342, 2560, 50, '1565668833-3.jpg'),
(3, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 2', 352, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '9786167477481', 342, 2560, 50, '1565677580-3.jpg'),
(4, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 3', 238, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '8859287758035', 342, 2560, 50, '1565677737-3.jpg'),
(5, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 4', 238, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '8859287758036', 342, 2562, 50, '1565677863-3.jpg'),
(6, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 5', 238, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '8859287758037', 342, 2562, 50, '1565678155-3.jpg'),
(7, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 6', 342, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '8859287758039', 342, 2562, 50, '1565678184-3.jpg'),
(11, 'ทะลุมิติหักเหลี่ยมจอมมาร เล่ม 2', 356, 'เฟิงหลิวซูไต (Feng Liu Shu Dai)', 'Rose', 13, '9786161830596', 446, 2560, 25, '1565678318-2.jpg'),
(12, 'Write and Wipe 2', 150, 'WordPlay Kids', 'WordPlay KIDS', 10, '9786167477480', 222, 2560, 10, '1568105559-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CA_Number` int(11) NOT NULL,
  `CA_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CA_CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CA_Number`, `CA_Date`, `CA_CID`) VALUES
(1, '2019-08-27 17:30:04', 46),
(2, '2019-08-27 18:08:58', 46);

-- --------------------------------------------------------

--
-- Table structure for table `cartdetail`
--

CREATE TABLE `cartdetail` (
  `CD_Number` int(11) NOT NULL,
  `CD_PID` int(11) NOT NULL,
  `CD_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartdetail`
--

INSERT INTO `cartdetail` (`CD_Number`, `CD_PID`, `CD_Amount`) VALUES
(1, 1, 3),
(1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ca_id`, `ca_name`) VALUES
(10, 'หนังสือเด็ก'),
(13, 'นิยาย');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `C_Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `C_Lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `C_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Lastname`, `C_pic`) VALUES
(42, 'Mike', 'Namchaisuk', '1565627699-1.jpg'),
(43, 'aty', 'sph', '1565664788-1.jpg'),
(44, 'Mind', 'Stick', '1565686208-5.jpg'),
(45, 'test', 'test', '1565688899-7.jpg'),
(46, 'Mike', 'Namchaisuk', '1566792974-1.jpg'),
(47, 'Mike', 'Watzawski', '1568105011-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userinformation`
--

CREATE TABLE `userinformation` (
  `UC_ID` int(11) NOT NULL,
  `UC_username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `UC_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UC_status` enum('ADMIN','USER') COLLATE utf8_unicode_ci DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userinformation`
--

INSERT INTO `userinformation` (`UC_ID`, `UC_username`, `UC_password`, `UC_status`) VALUES
(42, 'admin', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'ADMIN'),
(43, 'adminkoi', 'aea9e24b5b2ca6b14e482e9561427dc061f75fec', 'ADMIN'),
(44, 'mike', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'USER'),
(45, 'test1', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'USER'),
(46, 'mikewasowski', 'fe703d258c7ef5f50b71e06565a65aa07194907f', 'USER'),
(47, 'admin55', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `book` (`B_category_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CA_Number`,`CA_Date`,`CA_CID`),
  ADD KEY `CA_CID` (`CA_CID`);

--
-- Indexes for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD PRIMARY KEY (`CD_Number`,`CD_PID`),
  ADD KEY `CD_PID` (`CD_PID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `userinformation`
--
ALTER TABLE `userinformation`
  ADD PRIMARY KEY (`UC_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CA_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `userinformation`
--
ALTER TABLE `userinformation`
  MODIFY `UC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book` FOREIGN KEY (`B_category_id`) REFERENCES `category` (`ca_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CA_CID`) REFERENCES `customer` (`C_ID`);

--
-- Constraints for table `cartdetail`
--
ALTER TABLE `cartdetail`
  ADD CONSTRAINT `cartdetail_ibfk_1` FOREIGN KEY (`CD_Number`) REFERENCES `cart` (`CA_Number`),
  ADD CONSTRAINT `cartdetail_ibfk_2` FOREIGN KEY (`CD_PID`) REFERENCES `book` (`B_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `userinformation` (`UC_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
