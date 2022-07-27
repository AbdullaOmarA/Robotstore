-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2021 at 01:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
CREATE DATABASE RCELstore;
--
-- Database: `RCELstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `AID`) VALUES
('98@gmail.com','12345',1),
('bjacobson@gmail.com', 'Tril_0101', 9),
('breanne81@huels.org', 'Bre292929', 2),
('conn.providenci@gibson.biz', 'nopO818hd', 10),
('fermin.abbott@lakin.info', 'F55858a.1', 5),
('jcummings@hotmail.com', 'Jcu112233', 4),
('mafalda82@purdy.com', 'Lad890082', 6),
('quentin38@bergstrom.biz', 'Queanloo9', 8),
('schultz.bud@gmail.com', 'Win_bud999', 7),
('yesenia61@yahoo.com', 'Y6116nia', 3);
-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

CREATE TABLE `collect` (
  `productID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collect`
--


INSERT INTO `collect` (`productID`, `customerID`, `Quantity`, `price`) VALUES
('1', '1', '1', '2000'),
('1', '7', '2', '2000'), 
('2', '7', '3', '3000'),
('3', '5', '1', '400'), 
('4', '6', '1', '240'), 
('5', '3', '1', '899'), 
('5', '4', '2', '1798'), 
('6', '4', '1', '250'), 
('6', '5', '2', '500'),
('6', '6', '3', '750'), 
('6', '7', '1', '250');

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

CREATE TABLE `contain` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contain`
--

INSERT INTO `contain` (`orderID`, `productID`, `quantity`) VALUES
('2', '2', '2'),
('2', '6', '1'),
('3', '2', '2'),
('4', '6', '1'),
('5', '1', '2'),
('5', '6', '1'),
('7', '5', '3'),
('8', '4', '2'),
('9', '5', '2'),
('10', '5', '1'),
('10', '6', '1'),
('11', '1', '2'),
('12', '1', '1'),
('12', '5', '1'),
('13', '1', '1'),
('14', '6', '2');


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `password` varchar(100) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `cID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`password`, `phoneNumber`, `name`, `city`, `address`, `emailAddress`, `cID`)VALUES
('Fk19191919','539281763','Fahad Khalid', 'Dharan', 'Alrabwah-4064','Fahad-K@outlook.com', '1'),
( 'Fm73737373','548391023','Fawaz Mohammed', 'Dharan', 'AlDanah-st3-350','FawazMohammed@gmail.com', '3'),
('Sa123123','561538495','Suliman Ali', 'Jubail', 'Fanateer-2993', 'Suliman_129@hotmail.com','6'),
('Aa989898','561729829','Abdulwahab Abdullah', 'Dharan',  'Aramco-Alrabyah-110', 'Ab-3302@outlook.com',  '7'),
('Tm64646464','572839105','Turki Mohammed', 'Dammam', 'Alrakah-3021',  'Turki_Mohammed@yahoo.com',  '4'),
('If50505050','583647593', 'Ibrahim Fathi', 'Khobar',  'Ulya', 'Ib_687@gmail.com', '5'),
('Oa82828282','583921743','Omar Ahmed', 'Dammam',  'Rawdah',  'O-Ahmed@hotmail.com', '2');

-- --------------------------------------------------------




--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `date` date NOT NULL,
  `paymentMethod` varchar(100) NOT NULL,
  `bill` double DEFAULT NULL,
  `cutomerID` int(11) NOT NULL,
  `oID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`date`, `paymentMethod`, `bill`, `cutomerID`, `oID`) VALUES
('2022-04-02', 'Cash', '787', '1', 1),
 ('2022-05-01', 'Cash', '1056', '2', 2),
 ('2022-01-20', 'Credit Card', '240', '1', 3),
 ('2022-03-30', 'Cash', '899', '5', 4),
 ('2022-01-04', 'Credit Card', '2000', '7', 5), 
 ('2022-03-03', 'Cash', '500', '6', 7), 
 ('2022-03-08', 'Cash', '400', '7', 8), 
 ('2022-01-02', 'Credit Card', '1000', '3', 9), 
 ('2022-02-22', 'Credit Card', '999', '4', 10),
  ('2022-08-07', 'Cash', '987', '2', 11), 
  ('2022-03-05', 'Cash', '988', '5', 12), 
  ('2022-04-25', 'Cash', '245', '6', 13),
   ('2022-04-05', 'Credit Card', '874', '7', 14),
   ('2022-01-13', 'Credit Card', '600', '7', 15);
-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `PName` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT 5,
  `adminID` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `pic` varchar(100) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `PName`,`price`, `quantity`, `adminID`, `description`, `pic`) VALUES
('6', 'Arduino Starter Kit', '250', '2', '8', 'Starter kit.','ArduinoStarterKit.jpg'), 
('4',  'Alexa', '240 ', '5', '3', 'Virtual Assistant robot.','Alexa.jpg'), 
('3',  'CORSAIR CV750', '400', '7', '10', 'Uses air as a colling method.','CORSAIRCV750.jpg'), 
('5',  'COZMO',  '899', '3', '2', 'Educational toy robot for kids.','COZMO.jpg'),
('1',  'GTX NVIDIA 3070', '2000', '13', '1', 'Latest technology from nividia.','GTXNVIDIA3070.png'), 
('2', 'CPU', '1000', '9', '7', 'One of the best processors in the market.','Intel100282.jpg');



CCREATE TABLE `rcelstore`.`last_purchase` ( 
  `P_name` VARCHAR(255) NOT NULL 
  , `P_quantity` INT(50) NOT NULL ,
   `P_unitPrice` DOUBLE NOT NULL , `
   Items_total` DOUBLE NOT NULL , 
   `pic` varchar(100) DEFAULT 'default.png' ) ENGINE = InnoDB;

-- --------------------------------------------------------



--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `collect`
--
ALTER TABLE `collect`
  ADD PRIMARY KEY (`productID`,`customerID`),
  ADD KEY `customerID` (`customerID`) USING BTREE,
  ADD KEY `productID` (`productID`) USING BTREE;

--
-- Indexes for table `contain`
--
ALTER TABLE `contain`
  ADD PRIMARY KEY (`orderID`,`productID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cID`),
  ADD UNIQUE KEY `emailAddress` (`emailAddress`);


--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oID`),
  ADD KEY `cutomerID` (`cutomerID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `adminID` (`adminID`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_ibfk_3` FOREIGN KEY (`customerID`) REFERENCES `customer` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collect_ibfk_4` FOREIGN KEY (`productID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`oID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cutomerID`) REFERENCES `customer` (`cID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`adminID`) REFERENCES `admin` (`AID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
