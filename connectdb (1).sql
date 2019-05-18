-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2019 at 12:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `am_ID` int(20) NOT NULL,
  `am_ttl_ID` int(20) DEFAULT NULL,
  `am_fname` varchar(20) DEFAULT NULL,
  `am_lname` varchar(20) DEFAULT NULL,
  `am_ic` varchar(15) DEFAULT NULL,
  `am_tel` varchar(11) DEFAULT NULL,
  `am_ad` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`am_ID`, `am_ttl_ID`, `am_fname`, `am_lname`, `am_ic`, `am_tel`, `am_ad`) VALUES
(2, 3, 'a', 'g', '1', '2', '3');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_detail_2`
-- (See below for the actual view)
--
CREATE TABLE `admin_detail_2` (
`am_ID` int(20)
,`am_fname` varchar(20)
,`am_lname` varchar(20)
,`am_ic` varchar(15)
,`am_tel` varchar(11)
,`am_ad` varchar(1000)
,`ttl_Name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `generation`
--

CREATE TABLE `generation` (
  `gn_ID` int(50) NOT NULL,
  `gn_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `generation`
--

INSERT INTO `generation` (`gn_ID`, `gn_Name`) VALUES
(1, 'Dslr'),
(2, 'Mirrorless'),
(3, 'FullFrame');

-- --------------------------------------------------------

--
-- Table structure for table `statuss`
--

CREATE TABLE `statuss` (
  `st_ID` int(20) NOT NULL,
  `st_Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuss`
--

INSERT INTO `statuss` (`st_ID`, `st_Name`) VALUES
(1, 'ว่าง'),
(2, 'กำลังเช่า');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `ttl_ID` int(20) NOT NULL,
  `ttl_Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`ttl_ID`, `ttl_Name`) VALUES
(2, 'นาง'),
(3, 'นางสาว'),
(1, 'นาย');

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `us_ID` int(20) NOT NULL,
  `us_ttl_ID` int(20) NOT NULL,
  `us_fname` varchar(20) DEFAULT NULL,
  `us_lname` varchar(20) DEFAULT NULL,
  `us_ic` int(20) NOT NULL,
  `us_tel` int(20) NOT NULL,
  `us_ad` varchar(20) DEFAULT NULL,
  `us_st_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`us_ID`, `us_ttl_ID`, `us_fname`, `us_lname`, `us_ic`, `us_tel`, `us_ad`, `us_st_ID`) VALUES
(1, 2, 'asd', 'ggtr', 111, 1111, '1111', 2);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_detail_2`
-- (See below for the actual view)
--
CREATE TABLE `user_detail_2` (
`us_ID` int(20)
,`us_fname` varchar(20)
,`us_lname` varchar(20)
,`us_ic` int(20)
,`us_tel` int(20)
,`us_ad` varchar(20)
,`ttl_Name` varchar(20)
,`st_Name` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `yihor`
--

CREATE TABLE `yihor` (
  `YH_ID` int(50) NOT NULL,
  `YH_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yihor`
--

INSERT INTO `yihor` (`YH_ID`, `YH_Name`) VALUES
(1, 'Nikon'),
(2, 'Canon'),
(3, 'Fuji'),
(4, 'Sony');

-- --------------------------------------------------------

--
-- Structure for view `admin_detail_2`
--
DROP TABLE IF EXISTS `admin_detail_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_detail_2`  AS  select `admin`.`am_ID` AS `am_ID`,`admin`.`am_fname` AS `am_fname`,`admin`.`am_lname` AS `am_lname`,`admin`.`am_ic` AS `am_ic`,`admin`.`am_tel` AS `am_tel`,`admin`.`am_ad` AS `am_ad`,`title`.`ttl_Name` AS `ttl_Name` from (`admin` join `title` on((`admin`.`am_ttl_ID` = `title`.`ttl_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `user_detail_2`
--
DROP TABLE IF EXISTS `user_detail_2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_detail_2`  AS  select `userr`.`us_ID` AS `us_ID`,`userr`.`us_fname` AS `us_fname`,`userr`.`us_lname` AS `us_lname`,`userr`.`us_ic` AS `us_ic`,`userr`.`us_tel` AS `us_tel`,`userr`.`us_ad` AS `us_ad`,`title`.`ttl_Name` AS `ttl_Name`,`statuss`.`st_Name` AS `st_Name` from ((`userr` join `title` on((`userr`.`us_ttl_ID` = `title`.`ttl_ID`))) join `statuss` on((`userr`.`us_st_ID` = `statuss`.`st_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`am_ID`),
  ADD KEY `admin_ibfk_1` (`am_ttl_ID`);

--
-- Indexes for table `generation`
--
ALTER TABLE `generation`
  ADD PRIMARY KEY (`gn_ID`);

--
-- Indexes for table `statuss`
--
ALTER TABLE `statuss`
  ADD PRIMARY KEY (`st_ID`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`ttl_ID`),
  ADD UNIQUE KEY `ttl_Name` (`ttl_Name`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`us_ID`),
  ADD KEY `us_ttl_ID` (`us_ttl_ID`),
  ADD KEY `us_st_ID` (`us_st_ID`);

--
-- Indexes for table `yihor`
--
ALTER TABLE `yihor`
  ADD PRIMARY KEY (`YH_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `am_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
  MODIFY `gn_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuss`
--
ALTER TABLE `statuss`
  MODIFY `st_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `ttl_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `us_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `yihor`
--
ALTER TABLE `yihor`
  MODIFY `YH_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`am_ttl_ID`) REFERENCES `title` (`ttl_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
