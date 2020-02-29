-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2020 at 02:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbBugsAreUs`
--

-- --------------------------------------------------------

--
-- Table structure for table `CUSTOMER`
--

CREATE TABLE `CUSTOMER` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `customerContact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `SERVICE`
--

CREATE TABLE `SERVICE` (
  `serviceCode` int(11) NOT NULL,
  `serviceName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SERVICE`
--

INSERT INTO `SERVICE` (`serviceCode`, `serviceName`) VALUES
(1, 'Termites'),
(2, 'Mice'),
(3, 'Cockcroaches');

-- --------------------------------------------------------

--
-- Table structure for table `SERVICEBOOKING`
--

CREATE TABLE `SERVICEBOOKING` (
  `bookingNumber` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `timeOfTheDay` enum('Morning','Afternoon') NOT NULL,
  `comments` longtext DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `serviceCode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `SERVICE`
--
ALTER TABLE `SERVICE`
  ADD PRIMARY KEY (`serviceCode`);

--
-- Indexes for table `SERVICEBOOKING`
--
ALTER TABLE `SERVICEBOOKING`
  ADD PRIMARY KEY (`bookingNumber`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `serviceCode` (`serviceCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CUSTOMER`
--
ALTER TABLE `CUSTOMER`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `SERVICE`
--
ALTER TABLE `SERVICE`
  MODIFY `serviceCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `SERVICEBOOKING`
--
ALTER TABLE `SERVICEBOOKING`
  MODIFY `bookingNumber` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `SERVICEBOOKING`
--
ALTER TABLE `SERVICEBOOKING`
  ADD CONSTRAINT `SERVICEBOOKING_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `CUSTOMER` (`customerID`),
  ADD CONSTRAINT `SERVICEBOOKING_ibfk_2` FOREIGN KEY (`serviceCode`) REFERENCES `SERVICE` (`serviceCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
