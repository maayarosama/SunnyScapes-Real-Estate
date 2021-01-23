-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2020 at 06:12 PM
-- Server version: 10.1.43-MariaDB-cll-lve
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
-- Database: `mmcmfheu_realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE `account_type` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `name`) VALUES
(1, 'Buyer'),
(2, 'Seller'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `username`, `email`, `subject`, `message`, `answer`) VALUES
(15, 'maria', 'georgo@yahoo.com', 'SunnyScapes Support', 'what are the requirements?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`id`, `type`) VALUES
(1, 'Rent'),
(2, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `buyerID` varchar(50) NOT NULL,
  `sellerID` varchar(50) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `buyerID`, `sellerID`, `feedback`) VALUES
(6, 'maria', 'zeyad', 'Fast Payment'),
(12, 'zahwa', 'zeyad', 'She left the place in a good condition and didn\'t change anything.\r\n '),
(13, 'maria', 'zeyad', 'very fast payement');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `question`, `answer`) VALUES
(1, 'Why should we list our home for sale with you?', 'You should hire us for the same reason that hundreds of sellers use us year in and year out. They know that they can depend on us to get them the most money, in the shortest amount of time, with the fewest hassles and the least amount of risk.\r\n\r\nOur No Risk or Obligation Home Marketing system offers benefits that the ordinary agent does not. Our program offers flexible commissions to put more money in your pocket, a client reward program when both buying and selling that actually rebates cash back to you, a cancel anytime policy, and more marketing power than any other agent in Orange County, San Diego or the Inland Empire. Not surpisingly, our listings sell for 2.4% more and in about 40% less time than the average agent. What\'s 2.4% of your home\'s value?'),
(2, 'I heard that there are limited service agents who charge less. Why shouldn\'t I hire the cheapest age', 'Everyone wants to get as good a deal as possible and net as much money as possible when selling. But if you save 1%-2% (which is typically what a discount broker will save you) on selling costs and then sell your home for 5%-10% less, obviously you haven\'t saved anything. 1% disappears pretty quickly when you are negotiating the sale of a $500K+ piece of real estate.'),
(3, 'Why do you sell so many homes?', 'Due to our extensive radio and TV campaigns, more buyers and sellers are familiar with us than any other agent in Southern California. Additionally, experience, product knowledge, doing the little things right, effective marketing programs, and our skilled team all add up to positive results. Every field has people who, through their drive and passion, manage to excel.'),
(4, 'Why do your homes sell so fast? Do you price them too low?', 'No. While we sell a lot of homes we sell them one at a time. The fact that we have a large staff means we have more time for our clients. Matt Battiata, the Broker, and Lead Agent, has more time for our clients because he has a lot of help behind the scenes. Compare this with the agent who is trying to do everything themselves.'),
(5, 'If we list with you, will my home be on the internet?', 'Absolutely! All of our yard signs, as well as our TV and radio ads prominently feature our website address. No other local agent offers that benefit. Our media promotion drives thousands of buyers to view homes on our website. Your home will also be prominently featured on Realtor.com, the number one real estate website in the world, as well as Zillow, Trulia, Google, eHomes, Yahoo, just to name a few. In addition, to increase buyer interest in our properties we’ve secured featured homes positions.'),
(6, 'How long does it take to get my home on the market?', 'Once we have a signed listing agreement and a spare key, we can have your home on the market within 24 hours. However, it usually takes a day or two for the sign company to professionally install the sign.'),
(7, 'How do you set the price for my home?', 'We will meet with you to review a complete market analysis of your home, evaluate supply and demand for the area, and examine the property condition. At that point, we can guide you to the correct range of pricing.'),
(8, 'I don\'t have any money to fix up my home. Can you still sell it in its current condition?', 'Absolutely! Just like any home, we will simply evaluate the condition issues, supply/demand in the neighborhood, and pricing relative to those factors.'),
(9, 'How long is your listing agreement for?', 'For ease of paperwork, we typically use a six month period. But remember, unlike most agents, you are free to cancel anytime.');

-- --------------------------------------------------------

--
-- Table structure for table `human`
--

CREATE TABLE `human` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobile` char(11) NOT NULL,
  `age` int(11) NOT NULL,
  `acctype` int(20) NOT NULL DEFAULT '1',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `human`
--

INSERT INTO `human` (`username`, `password`, `firstname`, `lastname`, `mobile`, `age`, `acctype`, `email`) VALUES
('bella', '10111', 'bella', 'bella', '01163585956', 25, 2, 'bella@miu.com'),
('lina', 'lina', 'lina', 'ayman', '01150878986', 35, 2, 'lina@miu.com'),
('Maged', '1234', 'Maged', 'Tawfek', '01296438625', 33, 2, 'maged@yahoo.com'),
('maria', '1234', 'maria', 'george', '01234569871', 25, 1, 'george@m.com'),
('mazen', 'mazen', 'mazen', 'mazen', '01001566322', 55, 1, 'mazen@miu.com'),
('zahwa', '2017', 'zahwa', 'ehab', '01110864431', 30, 2, 'zahwa@miu.com'),
('zeina', '1452', 'zeina ', 'ehab', '01001488755', 23, 1, 'zeina@miu.com'),
('zeyad', '1234', 'zeyad', 'wael', '01067191933', 25, 2, 'zeyadwael@miu.com'),
('zeyad2', '1234', 'zeyad', 'wael', '01067191932', 25, 3, 'zeyadwael@miu.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `senderid` varchar(20) NOT NULL,
  `receiverid` varchar(20) NOT NULL,
  `propertyid` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageID`, `senderid`, `receiverid`, `propertyid`, `text`) VALUES
(109, 'maria', 'zeyad', 2, 'I would like to know the payment method'),
(110, 'zeyad', 'maria', 2, 'i would like it in cash please!'),
(111, 'Maria', 'Maged', 51, 'When can i come to see it ?');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `sellerID` varchar(20) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `propertyID`, `sellerID`, `picture`) VALUES
(140, 3, 'Zeyad', 'FADB0533-7F9D-4483-846D-4CDE8D9CA92F.jpeg'),
(141, 3, 'Zeyad', '359251F0-310D-4D45-94A0-05E0EED172AF.jpeg'),
(142, 5, 'Zeyad', 'C09B1B41-1545-4734-9383-022CEC4ECF17.jpeg'),
(143, 5, 'Zeyad', '386C7741-7A97-4ABF-85D3-4D97A11EE15F.jpeg'),
(144, 9, 'Zeyad', 'C664859F-7BE8-44DE-9C17-3E47DF034953.jpeg'),
(145, 9, 'Zeyad', '0BE6C57E-1C75-4FC4-A4E8-9EF32B99C070.jpeg'),
(146, 11, 'Zeyad', 'A6E43AD1-0FA7-4980-B589-28A47A70EDA8.jpeg'),
(147, 11, 'Zeyad', '000C9205-475B-4A14-B1CD-5FBCF70BC650.jpeg'),
(148, 11, 'Zeyad', '40D89DCE-55CE-42F6-9719-68519BCB390E.jpeg'),
(149, 6, 'Zeyad', 'E557B604-D91C-453A-B04E-128DE3F90CF0.jpeg'),
(150, 6, 'Zeyad', '20205240-834D-42EF-A0F1-103F6788B27E.jpeg'),
(151, 7, 'Zeyad', 'C612A461-00F8-4EB5-9749-B58E060FA955.jpeg'),
(152, 7, 'Zeyad', 'A4A0D37A-6703-4A96-9D36-F5D1D20CD24E.jpeg'),
(153, 2, 'Zeyad', '04BF04EF-F8CF-466B-9BE2-5F42AB6E5AE7.jpeg'),
(154, 2, 'Zeyad', 'A990CA25-8551-4FA3-8061-A895C2AB4A14.jpeg'),
(155, 2, 'Zeyad', 'C41FAD11-0705-40B1-BC2B-675DE6C68684.jpeg'),
(156, 4, 'Zeyad', 'D38002A9-8149-4C00-A4A6-66231D8F824E.jpeg'),
(157, 4, 'Zeyad', '72ACA86F-A248-4C6B-AEBE-96C4065B910C.jpeg'),
(158, 4, 'Zeyad', '3B0222D3-8820-4BEA-90A0-0CBCE49FE6A2.jpeg'),
(159, 8, 'Zeyad', 'B338A111-B0C7-4E53-9E5C-FD43436E02C6.jpeg'),
(160, 8, 'Zeyad', 'DBFC6420-7A92-4779-A16F-C25A8D3FFE18.jpeg'),
(168, 10, 'Zeyad', '78969EA2-23FB-4FC3-B617-BA96FC0FE16A.jpeg'),
(169, 10, 'Zeyad', '5FC7C09B-3CFE-4724-85ED-1972180D7C50.jpeg'),
(170, 1, 'Zeyad', '11D18FA7-3ACF-498D-8809-82C5996E6F95.jpeg'),
(171, 1, 'Zeyad', '477D80FF-65FF-4B46-AF55-1D8E6863E05B.jpeg'),
(172, 34, 'zeyad', '593176-6a0aao.jpg'),
(173, 34, 'zeyad', '593176-6a0aao.jpg'),
(174, 34, 'zeyad', '200163877.jpg'),
(175, 34, 'zeyad', '200163877.jpg'),
(176, 34, 'zeyad', '211714235.jpg'),
(177, 34, 'zeyad', '211714235.jpg'),
(178, 35, 'zeyad', '16_D.jpg'),
(179, 35, 'zeyad', '16_D.jpg'),
(180, 35, 'zeyad', '23.jpg'),
(181, 35, 'zeyad', '23.jpg'),
(182, 35, 'zeyad', '218910868.jpg'),
(183, 35, 'zeyad', '218910868.jpg'),
(184, 36, 'zeyad', '200174714.jpg'),
(185, 36, 'zeyad', '200174714.jpg'),
(186, 36, 'zeyad', 'FO6c1FtEemiaVXyXm0FgtbcShpNiTR6.jpg'),
(187, 36, 'zeyad', 'FO6c1FtEemiaVXyXm0FgtbcShpNiTR6.jpg'),
(188, 36, 'zeyad', 'The_Lux_Kitchen_2_at_The_James_Apartments_San_Jose_CA.jpg'),
(189, 36, 'zeyad', 'The_Lux_Kitchen_2_at_The_James_Apartments_San_Jose_CA.jpg'),
(190, 37, 'zeyad', '36mjHIAO9SlzMMLyBLFjIenHV6jsXN2.jpg'),
(191, 37, 'zeyad', '36mjHIAO9SlzMMLyBLFjIenHV6jsXN2.jpg'),
(192, 37, 'zeyad', '165140949.jpg'),
(193, 37, 'zeyad', '165140949.jpg'),
(194, 38, 'zeyad', 'Studio21A-5-Control-Room-2.jpg'),
(195, 38, 'zeyad', 'Studio21A-5-Control-Room-2.jpg'),
(196, 38, 'zeyad', 'studio-flat-for-sale-4.jpeg'),
(197, 38, 'zeyad', 'studio-flat-for-sale-4.jpeg'),
(198, 39, 'zeyad', '175357064.jpg'),
(199, 39, 'zeyad', '175357064.jpg'),
(200, 39, 'zeyad', 'Flyte-Tyme-02.jpg'),
(201, 39, 'zeyad', 'Flyte-Tyme-02.jpg'),
(202, 40, 'zeyad', '310recordingstudio-pic6_orig.jpg'),
(203, 40, 'zeyad', '310recordingstudio-pic6_orig.jpg'),
(204, 40, 'zeyad', '93012959.jpg'),
(205, 40, 'zeyad', '93012959.jpg'),
(206, 41, 'zeyad', 'std-apartment-standard.jpg'),
(207, 41, 'zeyad', 'std-apartment-standard.jpg'),
(208, 41, 'zeyad', 'Studio_H_4.jpg'),
(209, 41, 'zeyad', 'Studio_H_4.jpg'),
(232, 42, 'zeyad', 'download (2).jpg'),
(233, 42, 'zeyad', 'download.jpg'),
(234, 43, 'zeyad', '132225_65592083952651.jpg'),
(235, 43, 'zeyad', 'download (1).jpg'),
(240, 45, 'zeyad', '7df14d6a6d2fcc53519971af6912487e.jpg'),
(241, 45, 'zeyad', 'images.jpg'),
(242, 44, 'zeyad', '192-modern-villa-design-saudi-arabia-002-admin.jpg'),
(243, 44, 'zeyad', 'download (1).jpg'),
(244, 46, 'zeyad', '9850141f42ef624d8dbed3d16d44935d.jpg'),
(245, 46, 'zeyad', 'download.jpg'),
(246, 47, 'zeyad', 'interior_design_for_classic_home_in_madrid_2.jpg'),
(247, 47, 'zeyad', 'interior_design_for_classic_home_in_madrid_2.jpg'),
(248, 47, 'zeyad', 'interior-designing.jpg'),
(249, 47, 'zeyad', 'interior-designing.jpg'),
(250, 49, 'Maged', 'F4665C34-6A7C-46CD-B6C3-BC29AB75171F.jpeg'),
(251, 49, 'Maged', 'F4665C34-6A7C-46CD-B6C3-BC29AB75171F.jpeg'),
(252, 49, 'Maged', '0B319B20-A24D-47E8-9390-5E8584337046.jpeg'),
(253, 49, 'Maged', '0B319B20-A24D-47E8-9390-5E8584337046.jpeg'),
(254, 50, 'Maged', '55399D2A-93EB-4B99-8FB3-0FDA95ED046D.jpeg'),
(255, 50, 'Maged', '55399D2A-93EB-4B99-8FB3-0FDA95ED046D.jpeg'),
(256, 50, 'Maged', 'ED6FD0BF-8DE9-4F5E-8C3A-129031E5912A.jpeg'),
(257, 50, 'Maged', 'ED6FD0BF-8DE9-4F5E-8C3A-129031E5912A.jpeg'),
(258, 51, 'Maged', '4ABDA9C5-CBDD-4A37-BF65-B2CFF3542AD8.jpeg'),
(259, 51, 'Maged', '4ABDA9C5-CBDD-4A37-BF65-B2CFF3542AD8.jpeg'),
(260, 51, 'Maged', 'F282E016-8969-4E7D-A183-E629A515F0C5.jpeg'),
(261, 51, 'Maged', 'F282E016-8969-4E7D-A183-E629A515F0C5.jpeg'),
(262, 51, 'Maged', '88BCE5AC-0997-4E5C-B972-D7DBE36D2C0C.jpeg'),
(263, 51, 'Maged', '88BCE5AC-0997-4E5C-B972-D7DBE36D2C0C.jpeg'),
(264, 51, 'Maged', '9A64E7C7-1884-4295-AC15-5A84BCEB6689.jpeg'),
(265, 51, 'Maged', '9A64E7C7-1884-4295-AC15-5A84BCEB6689.jpeg'),
(266, 51, 'Maged', 'CE5B8952-9B37-48BD-93BC-84AEA819A0FB.jpeg'),
(267, 51, 'Maged', 'CE5B8952-9B37-48BD-93BC-84AEA819A0FB.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyID` int(11) NOT NULL,
  `sellerID` varchar(20) NOT NULL,
  `type` int(10) NOT NULL,
  `roomnum` int(11) NOT NULL,
  `bednum` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `deal` int(4) DEFAULT NULL,
  `maxprice` int(11) NOT NULL,
  `minprice` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyID`, `sellerID`, `type`, `roomnum`, `bednum`, `area`, `location`, `deal`, `maxprice`, `minprice`, `availability`) VALUES
(1, 'zeyad', 1, 5, 3, 450, 'Maadi', 1, 11000, 9000, 0),
(2, 'zeyad', 2, 3, 2, 250, 'Dokki', 2, 1120000, 950000, 0),
(3, 'zeyad', 3, 5, 3, 400, 'Fifth Settlement', 1, 8500, 6500, 1),
(4, 'zeyad', 2, 3, 2, 250, 'Maadi', 1, 6000, 5000, 1),
(5, 'zeyad', 3, 4, 2, 350, 'Rehab', 2, 1250000, 1000000, 1),
(6, 'zeyad', 4, 2, 1, 100, '6th October ', 1, 5500, 4500, 1),
(7, 'zeyad', 4, 2, 1, 120, 'Maadi', 2, 50000, 40000, 1),
(8, 'zeyad', 2, 4, 2, 300, 'Rehab', 2, 950000, 750000, 1),
(9, 'zeyad', 3, 5, 3, 450, '6th october', 1, 15000, 13000, 1),
(10, 'zeyad', 1, 4, 2, 350, 'Maadi', 1, 9000, 8000, 1),
(11, 'zeyad', 3, 4, 3, 400, 'Nasr City', 1, 7500, 5500, 1),
(34, 'zeyad', 2, 2, 3, 350, 'Sharm', 2, 1500000, 1250000, 1),
(35, 'zeyad', 2, 2, 3, 450, 'Dahab', 2, 1650000, 1350000, 1),
(36, 'zeyad', 2, 3, 4, 450, 'Mohandseen', 2, 1500000, 1250000, 1),
(37, 'zeyad', 2, 2, 3, 350, 'Zamalek', 2, 1450000, 1150000, 1),
(38, 'zeyad', 4, 1, 1, 150, 'Sharm', 2, 80000, 65000, 1),
(39, 'zeyad', 4, 1, 1, 160, 'Dahab', 1, 10000, 8500, 1),
(40, 'zeyad', 4, 1, 1, 100, 'Mohandseen', 1, 6000, 5000, 1),
(41, 'zeyad', 4, 1, 1, 90, 'Zamalek', 2, 500000, 450000, 1),
(42, 'zeyad', 1, 3, 4, 500, 'Sharm', 2, 1800000, 1550000, 1),
(43, 'zeyad', 1, 2, 4, 450, 'Dahab', 2, 1450000, 1250000, 1),
(44, 'zeyad', 1, 2, 2, 400, 'Mohandseen', 1, 15000, 12000, 1),
(45, 'zeyad', 1, 2, 3, 350, 'Zamalek', 2, 1000000, 850000, 1),
(46, 'zeyad', 1, 2, 3, 350, 'Rehab', 1, 5000, 3000, 1),
(49, 'Maged', 3, 2, 1, 120, 'Makadi  hurghada ', 1, 5000, 4500, 1),
(50, 'Maged', 1, 3, 3, 180, 'Sidi gaber Alex', 2, 5550000, 5500000, 1),
(51, 'Maged', 2, 1, 3, 130, 'Madinty', 1, 6000, 4000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prop_type`
--

CREATE TABLE `prop_type` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prop_type`
--

INSERT INTO `prop_type` (`id`, `type`) VALUES
(1, 'Villa'),
(2, 'Apartment'),
(3, 'Duplex'),
(4, 'Studio');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `buyerID` varchar(20) NOT NULL,
  `propertyID` int(11) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`buyerID`, `propertyID`, `accepted`) VALUES
('maria', 1, 1),
('maria', 2, 0),
('maria', 3, 0),
('Maria', 51, 0),
('zahwa', 11, 0),
('zeina', 1, 0),
('zeina', 4, 0),
('zeyad', 5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_type`
--
ALTER TABLE `account_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buyerID` (`buyerID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `human`
--
ALTER TABLE `human`
  ADD PRIMARY KEY (`username`),
  ADD KEY `acctype` (`acctype`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `buyerid` (`senderid`),
  ADD KEY `message_ibfk_2` (`receiverid`),
  ADD KEY `PropertyId in message` (`propertyid`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `propertyID` (`propertyID`),
  ADD KEY `sellerID` (`sellerID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyID`,`sellerID`) USING BTREE,
  ADD KEY `FOREIGN KEY` (`sellerID`),
  ADD KEY `type` (`type`),
  ADD KEY `deal` (`deal`);

--
-- Indexes for table `prop_type`
--
ALTER TABLE `prop_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`buyerID`,`propertyID`),
  ADD KEY `FOREIGN` (`propertyID`,`buyerID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_type`
--
ALTER TABLE `account_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `prop_type`
--
ALTER TABLE `prop_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`buyerID`) REFERENCES `human` (`username`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`sellerID`) REFERENCES `human` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `human`
--
ALTER TABLE `human`
  ADD CONSTRAINT `human_ibfk_1` FOREIGN KEY (`acctype`) REFERENCES `account_type` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `PropertyId in message` FOREIGN KEY (`propertyid`) REFERENCES `property` (`propertyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`senderid`) REFERENCES `human` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiverid`) REFERENCES `human` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`sellerID`) REFERENCES `human` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`deal`) REFERENCES `deal` (`id`),
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`type`) REFERENCES `prop_type` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `JJJ` FOREIGN KEY (`propertyID`) REFERENCES `property` (`propertyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `KHAZBAK` FOREIGN KEY (`buyerID`) REFERENCES `human` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
