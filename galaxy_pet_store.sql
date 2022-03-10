-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2021 at 06:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxy_pet_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories_toys`
--

DROP TABLE IF EXISTS `accessories_toys`;
CREATE TABLE IF NOT EXISTS `accessories_toys` (
  `accessoriesID` int(11) NOT NULL AUTO_INCREMENT,
  `accessories_name` varchar(50) NOT NULL,
  `accessories_price` float(6,2) NOT NULL,
  `accessories_image` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`accessoriesID`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accessories_toys`
--

INSERT INTO `accessories_toys` (`accessoriesID`, `accessories_name`, `accessories_price`, `accessories_image`, `type`) VALUES
(1, 'Red Collar', 65.00, 'collar1.jpg', 'dogs'),
(2, 'Collar with treat tag', 69.00, 'collar2.jpg', 'dogs'),
(3, 'Red & White Collar', 72.00, 'collar3.jpg', 'dogs'),
(4, 'Red Leather Collar', 169.00, 'collar4.jpg', 'dogs'),
(5, 'Blue Collar', 75.00, 'collar5.jpg', 'dogs'),
(6, 'Black Leather Collar', 169.00, 'collar6.jpg', 'dogs'),
(7, 'Brown Leather Collar ', 172.00, 'collar7.jpg', 'dogs'),
(8, 'Metal Collar', 180.00, 'collar8.jpg', 'dogs'),
(9, 'Red Nylon Leash', 23.90, 'leash1.jpg', 'dogs'),
(10, 'Brown Leash', 56.00, 'leash2.jpg', 'dogs'),
(11, 'Blue Nylon Leash', 19.00, 'leash3.jpg', 'dogs'),
(12, 'Brown Leather Leash', 60.00, 'leash4.jpg', 'dogs'),
(13, 'Red Leash', 24.00, 'leash5.jpg', 'dogs'),
(14, 'Red Retractable Leash', 67.00, 'leash6.jpg', 'dogs'),
(15, 'Red Nylon Leash', 19.90, 'leash7.jpg', 'dogs'),
(16, 'Blue Leash', 34.00, 'leash8.jpg', 'dogs'),
(17, 'Blue & White Stripes', 75.00, 'clothes1.jpg', 'dogs'),
(18, 'Pink Collored Sweater', 86.00, 'clothes2.jpg', 'dogs'),
(19, 'Pink Sweater', 83.00, 'clothes3.jpg', 'dogs'),
(20, 'Colorful Checkered', 108.00, 'clothes4.jpg', 'dogs'),
(21, 'White Sweater', 80.00, 'clothes5.jpg', 'dogs'),
(22, 'Yellow Windbreaker', 123.00, 'clothes6.jpg', 'dogs'),
(23, 'Black & White Suit+Bow Tie', 156.00, 'clothes7.jpg', 'dogs'),
(24, 'Santa Hat', 118.00, 'clothes8.jpg', 'dogs'),
(25, 'White/Peach Cage (Small) ', 360.00, 'cage1.jpg', 'dogs'),
(26, 'White Pet Fence (Medium)', 376.00, 'cage2.jpg', 'dogs'),
(27, 'Black Metal Fence (Medium)', 468.00, 'cage3.jpg', 'dogs'),
(28, 'Neon Green/Black (Small)', 408.00, 'cage4.jpg', 'dogs'),
(29, 'Stainless Steel Cage (Large)', 768.00, 'cage5.jpg', 'dogs'),
(30, 'Dark Blue/Grey Cage (Small)', 348.00, 'cage6.jpg', 'dogs'),
(31, 'Aqua/White (Small)', 388.00, 'cage7.jpg', 'dogs'),
(32, 'Black Metal Cage (Medium)', 365.00, 'cage8.jpg', 'dogs'),
(33, 'Blue Collar + bell', 35.00, 'ccollar1.jpg', 'cats'),
(34, 'Blue & Orange Collar', 50.00, 'ccollar2.jpg', 'cats'),
(35, 'Pink & Black Collar', 55.00, 'ccollar3.jpg', 'cats'),
(36, 'Red Nylon Collar + Red bell', 33.00, 'ccollar4.jpg', 'cats'),
(37, 'Red Nylon Collar + Blue bell', 59.90, 'ccollar5.jpg', 'cats'),
(38, 'Red Leather Collar', 85.00, 'ccollar6.jpg', 'cats'),
(39, 'Blue Collar + Silver bell', 68.00, 'ccollar7.jpg', 'cats'),
(40, 'Blue Collar + gold bell', 58.00, 'ccollar8.jpg', 'cats'),
(41, 'Orange Leash', 20.00, 'catleash1.jpg', 'cats'),
(42, 'Red Leash', 36.00, 'catleash2.jpg', 'cats'),
(43, 'Purple Nylon Leash', 49.00, 'catleash3.jpg', 'cats'),
(44, 'Deep Blue Retractable Leash', 60.00, 'catleash4.jpg', 'cats'),
(45, 'Blue Leash', 24.00, 'catleash5.jpg', 'cats'),
(46, 'Purple Leash', 57.00, 'catleash6.jpg', 'cats'),
(47, 'Mix Colored Leash', 66.00, 'catleash7.jpg', 'cats'),
(48, 'Black Leash + leopard pattern', 67.00, 'catleash8.jpg', 'cats'),
(49, 'Red Sweater', 80.00, 'cclothes1.jpg', 'cats'),
(50, 'Pink Sweater (Cats)', 99.00, 'cclothes2.jpg', 'cats'),
(51, 'Blue Sweater', 110.00, 'cclothes3.jpg', 'cats'),
(52, 'Deep Pink Windbreaker', 140.00, 'cclothes4.jpg', 'cats'),
(53, 'Pink Hoodie', 80.00, 'cclothes5.jpg', 'cats'),
(54, 'Black Bow Tie', 23.00, 'cclothes6.jpg', 'cats'),
(55, 'Yellow Skirt', 57.00, 'cclothes7.jpg', 'cats'),
(56, 'White Unicorn Hoodie', 108.00, 'cclothes8.jpg', 'cats'),
(57, 'White Cage', 160.00, 'ccage1.jpg', 'cats'),
(58, 'Red Cage (Small)', 206.00, 'ccage2.jpg', 'cats'),
(59, 'White & Black Cage (Small)', 308.00, 'ccage3.jpg', 'cats'),
(60, 'Soft Blue Cage (Small)', 208.00, 'ccage4.jpg', 'cats'),
(61, 'White & Red Cage (Small)', 258.00, 'ccage5.jpg', 'cats'),
(62, 'White & Grey Cage (Small)', 308.00, 'ccage6.jpg', 'cats'),
(63, 'Yellow & Black Cage (Small)', 328.00, 'ccage7.jpg', 'cats'),
(64, 'Peach & Dark Green Cage (Small)', 315.00, 'ccage8.jpg', 'cats'),
(65, 'Plastic Bird Feeder', 56.00, 'tray1.jpg', 'birds'),
(66, 'Glass Bird Feeder', 70.00, 'tray2.jpg', 'birds'),
(67, 'Blue Bird Feeder', 45.00, 'tray3.jpg', 'birds'),
(68, 'Net Bird Feeder (Plastic Base)', 63.00, 'tray4.jpg', 'birds'),
(69, 'Net Bird Feeder (Metal Base)', 69.90, 'tray5.jpg', 'birds'),
(70, 'Orange & Black Bird Feeder', 85.00, 'tray6.jpg', 'birds'),
(71, 'Wooden House Bird Feeder', 98.00, 'tray7.jpg', 'birds'),
(72, 'Plastic Bird Feeder (Green Base)', 58.00, 'tray8.jpg', 'birds'),
(73, 'SilverCage (Small)', 80.00, 'bcage1.jpg', 'birds'),
(74, 'Silver Cage (Large)', 166.00, 'bcage2.jpg', 'birds'),
(75, 'White Cage (Large)', 228.00, 'bcage3.jpg', 'birds'),
(76, 'Pink Cage (Small)', 108.00, 'bcage4.jpg', 'birds'),
(77, 'Black Cage (Large)', 318.00, 'bcage5.jpg', 'birds'),
(78, 'Bamboo Designed Cage (Small)', 308.00, 'bcage6.jpg', 'birds'),
(79, 'Purple Cage (Small)', 118.00, 'bcage7.jpg', 'birds'),
(80, 'Gold & Pink Cage (Small)', 215.00, 'bcage8.jpg', 'birds'),
(81, 'Dog Bone (chewable)', 55.00, 'toys1.jpg', 'dogstoys'),
(82, 'Giraffe Toy (chewable)', 68.00, 'toys2.jpg', 'dogstoys'),
(83, 'Blue Dog Bone (chewable)', 32.00, 'toys3.jpg', 'dogstoys'),
(84, 'Colorful String Toy', 23.00, 'toys4.jpg', 'dogstoys'),
(85, 'Fluffy Raindeer (chewable)', 49.90, 'toys5.jpg', 'dogstoys'),
(86, 'Fluffy White Chicken (chewable)', 85.00, 'toys6.jpg', 'dogstoys'),
(87, 'Grey String Toy', 48.00, 'toys7.jpg', 'dogstoys'),
(88, 'Yellow Pig Toy (chewable)', 28.00, 'toys8.jpg', 'dogstoys'),
(89, 'Grey Thread Mice', 28.90, 'ctoys1.jpg', 'catstoys'),
(90, 'Colorful Fish Toy (Small)', 18.00, 'ctoys2.jpg', 'catstoys'),
(91, 'Colorful Ball Toy', 22.90, 'ctoys3.jpg', 'catstoys'),
(92, 'Orange Plastic Ball', 15.00, 'ctoys4.jpg', 'catstoys'),
(93, 'White Fish Toy', 14.90, 'ctoys5.jpg', 'catstoys'),
(94, 'Purple Mice Toy', 25.00, 'ctoys6.jpg', 'catstoys'),
(95, 'Fluffy Bear Toy', 38.00, 'ctoys7.jpg', 'catstoys'),
(96, 'Colorful Fish Toy', 22.00, 'ctoys8.jpg', 'catstoys'),
(97, 'Yellow & Pink Toy Ball+Bell', 18.90, 'btoys1.jpg', 'birdstoys'),
(98, 'Green Toy Ball', 20.00, 'btoys2.jpg', 'birdstoys'),
(99, 'Wooden Blocks', 25.90, 'btoys3.jpg', 'birdstoys'),
(100, 'Pink Hemisphere+White Strings', 19.90, 'btoys4.jpg', 'birdstoys');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `contact_number` char(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `services` varchar(20) NOT NULL,
  `animals` varchar(5) NOT NULL,
  `breed` varchar(15) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `FK_userrr` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `userID`, `name`, `contact_number`, `email_address`, `services`, `animals`, `breed`, `booking_date`, `booking_time`) VALUES
(1, 1, 'Ali', '0123456789', 'ali@gmail.com', 'Full Grooming', 'Cat', 'medium breed', '2021-10-25', '14:15:00'),
(2, NULL, 'Lit Tsen', '0133333333', 'lit@gmail.com', 'Wash & Dry ', 'Dog', 'large breed', '2021-10-26', '13:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cartID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `foodID` int(11) DEFAULT NULL,
  `accessoriesID` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `FK_accessories` (`accessoriesID`),
  KEY `FK_food` (`foodID`),
  KEY `FK_user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userID`, `foodID`, `accessoriesID`, `quantity`) VALUES
(1, 1, NULL, 2, 1),
(2, 1, NULL, 81, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(6) NOT NULL,
  `name_on_card` varchar(50) NOT NULL,
  `credit_card_number` bigint(16) NOT NULL,
  `exp_date` varchar(6) NOT NULL,
  `cvv` int(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`paymentID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `full_name`, `email_address`, `address`, `city`, `state`, `zipcode`, `name_on_card`, `credit_card_number`, `exp_date`, `cvv`, `time`) VALUES
(1, 'Ali', 'ali@gmail.com', 'No111, Jalan AB 1/2, Taman Rambutan', 'Petaling Jaya', 'Selangor', 46000, 'Ali Bahba Bin Mohammad', 4012123412341234, '12/12', 123, '2021-11-12 14:13:58'),
(2, 'Ali', 'ali@hotmail.com', 'No111, Jalan AB 1/2, Taman Rambutan', 'Petaling Jaya', 'Selangor', 46000, 'Ali Bahba Bin Mohammad', 4012123412341234, '12/22', 123, '2021-11-12 17:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

DROP TABLE IF EXISTS `pet`;
CREATE TABLE IF NOT EXISTS `pet` (
  `petID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `price` float(6,2) NOT NULL,
  `age` float NOT NULL,
  `colour` varchar(30) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `vaccine_status` varchar(2) NOT NULL,
  `dewormed_status` varchar(2) NOT NULL,
  `additional_info` varchar(300) DEFAULT NULL,
  `picture1` varchar(100) NOT NULL,
  `picture2` varchar(100) NOT NULL,
  `picture3` varchar(100) NOT NULL,
  `picture4` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `available_status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`petID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`petID`, `type`, `name`, `breed`, `price`, `age`, `colour`, `gender`, `vaccine_status`, `dewormed_status`, `additional_info`, `picture1`, `picture2`, `picture3`, `picture4`, `link`, `available_status`) VALUES
(1, 'puppies', 'Welsh Corgi', 'welsh_corgi', 6200.00, 3, 'Red & White', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div>\r\n<div class=\'description\'>+ Kid Friendly<br/></div>\r\n<div class=\'description\'>+ Easy to Train<br/></div>\r\n<div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'corgi1-0.jpg', 'corgi1-1.jpg', 'corgi1-2.jpg', 'corgi1-3.jpg', 'welsh_corgi_1.php', 1),
(2, 'puppies', 'Welsh Corgi', 'welsh_corgi', 6000.00, 5, 'Red & White', 'M', 'Y', 'Y', '<div class=\'description\'>+ Adorable <br/></div>\r\n<div class=\'description\'>+ Great Energy Level<br/></div>\r\n<div class=\'description\'>+ Learn Quickly<br/></div>\r\n<div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'corgi2-0.jpg\r\n', 'corgi2-1.jpg', 'corgi2-2.jpg', 'corgi2-3.jpg', 'welsh_corgi_2.php', 1),
(3, 'puppies', 'Siberian Husky', 'siberian_husky', 2000.00, 2.5, 'Black & White', 'F', 'Y', 'Y', '<div class=\'description\'>+ Friendly <br/></div><div class=\'description\'>+ Naturally Clean<br/></div><div class=\'description\'>+ High Energy and Athletic<br/></div><div class=\'description\'>+ Playful<br/></div>', 'husky1-0.jpg', 'husky1-1.jpg', 'husky1-2.jpg', 'husky1-3.jpg', 'siberian_husky.php', 1),
(4, 'puppies', 'Poodle', 'poodle', 2000.00, 1, 'White', 'F', 'Y', 'Y', '<div class=\'description\'>+ Energetic <br/></div><div class=\'description\'>+ Friendly<br/></div><div class=\'description\'>+ Does Not Shed<br/></div><div class=\'description\'>+ Easy to Train<br/></div>', 'poddle1-0.jpg', 'poddle1-1.jpg', 'poddle1-2.jpg', 'poddle1-3.jpg', 'poodle.php', 1),
(5, 'puppies', 'Shiba-Inu', 'shiba_inu', 6200.00, 2, 'White', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate <br/></div><div class=\'description\'>+ Friendly<br/></div><div class=\'description\'>+ Love to Stay Clean<br/></div><div class=\'description\'>+ Intelligent<br/></div>', 'shiba1-0.jpg', 'shiba1-1.jpg', 'shiba1-2.jpg', 'shiba1-3.jpg', 'shiba.php', 1),
(6, 'puppies', 'Pomeranian', 'pomeranian', 4000.00, 2.5, 'White', 'F', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Do not required much grooming<br/></div><div class=\'description\'>+ High Energy Level<br/></div>', 'pomeranian1-0.jpg', 'pomeranian1-1.jpg', 'pomeranian1-2.jpg', 'pomeranian1-3.jpg', 'pomeranian_1.php', 1),
(7, 'puppies', 'Pomeranian', 'pomeranian', 4500.00, 2, 'Black & Tan', 'F', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Extra Cute<br/></div><div class=\'description\'>+ Adapt Well to Small Home<br/></div>', 'pomeranian2-0.jpg', 'pomeranian2-1.jpg', 'pomeranian2-2.jpg', 'pomeranian2-3.jpg', 'pomeranian_2.php', 1),
(8, 'kitten', 'Maine Coon', 'maine_coon', 3000.00, 3, 'Black & White', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Easy to Train<br/></div><div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'maine_coon1-0.jpg', 'maine_coon1-1.jpg', 'maine_coon1-2.jpg', 'maine_coon1-3.jpg', 'maine_coon_1.php', 1),
(9, 'kitten', 'Maine Coon', 'maine_coon', 2800.00, 2.5, 'White & Orange', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Easy to Train<br/></div><div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'maine_coon2-0.jpg', 'maine_coon2-1.jpg', 'maine_coon2-2.jpg', 'maine_coon2-3.jpg', 'maine_coon_2.php', 1),
(10, 'kitten', 'Maine Coon', 'maine_coon', 2500.00, 9, 'Black & Brown', 'M', 'Y', 'Y', '<div class=\'description\'>+ Adorable <br/></div><div class=\'description\'>+ Great Energy Level<br/></div><div class=\'description\'>+ Learn Quickly<br/></div><div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'maine_coon3-0.jpg', 'maine_coon3-1.jpg', 'maine_coon3-2.jpg', 'maine_coon3-3.jpg', 'maine_coon_3.php', 1),
(11, 'kitten', 'Exotic Shorthair', 'shorthair', 4000.00, 4, 'Red Tabby', 'M', 'Y', 'Y', '<div class=\'description\'>+ Friendly <br/></div>\r\n<div class=\'description\'>+ Naturally Clean<br/></div><div class=\'description\'>+ High Energy and Athletic<br/></div><div class=\'description\'>+ Playful<br/></div>', 'exotic_shorthair1-0.jpg', 'exotic_shorthair1-1.jpg', 'exotic_shorthair1-2.jpg', 'exotic_shorthair1-3.jpg', 'exotic_shorthair.php', 1),
(12, 'kitten', 'American Shorthair', 'shorthair', 2500.00, 3, 'Black & White', 'F', 'Y', 'Y', '<div class=\'description\'>+ Energetic <br/></div><div class=\'description\'>+ Friendly<br/></div><div class=\'description\'>+ Does Not Shed<br/></div><div class=\'description\'>+ Easy to Train<br/></div>', 'american_shorthair1-1.jpg', 'american_shorthair1-0.jpg', 'american_shorthair1-2.jpg', 'american_shorthair1-3.jpg', 'american_shorthair_1.php', 1),
(13, 'kitten', 'Persian', 'persian', 2400.00, 2, 'Gold', 'F', 'Y', 'Y', '<div class=\'description\'>+ Affectionate <br/></div><div class=\'description\'>+ Friendly<br/></div><div class=\'description\'>+ Love to Stay Clean<br/></div><div class=\'description\'>+ Intelligent<br/></div>', 'persian1-0.jpg', 'persian1-1.jpg', 'persian1-2.jpg', 'persian1-3.jpg', 'persian.php', 1),
(14, 'kitten', 'British Shorthair', 'shorthair', 7000.00, 8, 'Silver Shaded', 'F', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Do not required much grooming<br/></div><div class=\'description\'>+ High Energy Level<br/></div>', 'british_shorthair1-0.jpg', 'british_shorthair1-1.jpg', 'british_shorthair1-2.jpg', 'british_shorthair1-3.jpg', 'british_shorthair.php', 1),
(15, 'kitten', 'Ragdoll', 'ragdoll', 5800.00, 3, 'White & Brown', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Extra Cute<br/></div><div class=\'description\'>+ Adapt Well to Small Home<br/></div>', 'ragdoll1-0.jpg', 'ragdoll1-1.jpg', 'ragdoll1-2.jpg', 'ragdoll1-3.jpg', 'ragdoll.php', 1),
(16, 'bird', 'Love Bird', 'love_bird', 200.00, 2.5, 'white', 'F', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Socialable<br/></div><div class=\'description\'>+ Intelligent<br/></div>', 'lovebird1-0.jpg', 'lovebird1-1.jpg', 'lovebird1-2.jpg', 'lovebird1-3.jpg', 'love_bird.php', 1),
(17, 'bird', 'Blue and Yellow Macaw Parrot', 'blue_parrot', 5000.00, 4, 'blue & yellow', 'M', 'Y', 'Y', '<div class=\'description\'>+ Affectionate with Family <br/></div><div class=\'description\'>+ Kid Friendly<br/></div><div class=\'description\'>+ Easy to Train<br/></div><div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'macaw_parrot1-0.jpg', 'macaw_parrot1-1.jpg', 'macaw_parrot1-2.jpg', 'macaw_parrot1-3.jpg', 'macaw_parrot_1.php', 1),
(18, 'bird', 'Scarlet Macaw Parrot', 'scarlet_parrot', 9000.00, 3, 'rainbow', 'M', 'Y', 'Y', '<div class=\'description\'>+ Adorable <br/></div><div class=\'description\'>+ Great Energy Level<br/></div><div class=\'description\'>+ Learn Quickly<br/></div><div class=\'description\'>+ Adapt Well to Apartment Living<br/></div>', 'macaw_parrot2-0.jpg', 'macaw_parrot2-1.jpg', 'macaw_parrot2-2.jpg', 'macaw_parrot2-3.jpg', 'macaw_parrot_2.php', 1),
(19, 'bird', 'SunConure HighYellow Bird Parrot', 'yellow_parrot', 900.00, 2, 'yellow & green', 'F', 'Y', 'Y', '<div class=\'description\'>+ Friendly <br/></div><div class=\'description\'>+ Obedient<br/></div><div class=\'description\'>+ High Energy and Athletic<br/></div><div class=\'description\'>+ Playful<br/></div>', 'yellow_parrot1-0.jpg', 'yellow_parrot1-1.jpg', 'yellow_parrot1-2.jpg', 'yellow_parrot1-3.jpg', 'yellow_parrot.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pet_food`
--

DROP TABLE IF EXISTS `pet_food`;
CREATE TABLE IF NOT EXISTS `pet_food` (
  `foodID` int(11) NOT NULL AUTO_INCREMENT,
  `Food_Name` varchar(50) NOT NULL,
  `Price` float(10,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_food`
--

INSERT INTO `pet_food` (`foodID`, `Food_Name`, `Price`, `image`) VALUES
(1, 'smart heart chicken', 17.90, 'smartheartchickenandegg.png'),
(2, 'monge fresh 100g', 1.55, 'mongefresh.jpg'),
(3, 'dr keresdog food', 21.60, 'drkeres.jfif'),
(4, 'alps natural chunk', 39.15, 'alpsnaturalchunk.jpg'),
(5, 'paradise 10kg', 13.60, 'paradise10kg.jfif'),
(6, 'soft pet food s $ c', 13.30, 'softpetfood.jfif'),
(7, 'adragna premium lamb 5kg', 9.60, 'Adragnalamp.png'),
(8, 'iskhan holistic senior 1.2kg', 6.65, 'iskhan.jpg'),
(9, 'royal canin health nutrition', 4.90, 'royalcanin.jfif'),
(10, 'misha cat food', 11.20, 'mishacatfood.jfif'),
(11, 'dzahara adult', 8.55, 'zahara.jfif'),
(12, 'whiskas 80/85kg', 3.30, 'whiskas.png'),
(13, 'petland cat food', 7.65, 'petland.jfif'),
(14, 'leonardo cat food', 8.40, 'leornardo.jpeg'),
(15, 'benefeed feline c & t', 8.40, 'belif.jfif'),
(16, 'reflex plus adult', 6.75, 'reflex.jfif'),
(17, 'equilibrio adult dry', 5.25, 'equilibrio.jfif'),
(18, 'dormeos longhair', 3.60, 'dormeo.jfif'),
(19, 'aquanice xinyang trophical gold', 7.30, 'AquaNice XinYang.webp'),
(20, 'takana sakana-il f-pallets', 6.35, 'takana.jfif'),
(21, 'sanyu guppy mini floating pallets', 6.00, 'sanyu.jfif'),
(22, 'shogun advance pallets', 12.35, 'shogun.jfif'),
(23, 'trophical gold fish food', 12.65, 'TrophicalGold.jpg'),
(24, 'hulx gold - special mix', 2.45, 'hulx.jfif'),
(25, 'aquanice premium koi', 2.25, 'fujikoi.jpg'),
(26, 'atlas 5kg fast red koi', 4.20, 'atlas.jfif'),
(27, 'aqua master koi fish', 4.20, 'aquamaster.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `orderID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `accessoriesID` int(11) DEFAULT NULL,
  `petID` int(11) DEFAULT NULL,
  `foodID` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderID`),
  KEY `FK_usersID` (`userID`),
  KEY `FK_accessoriess` (`accessoriesID`),
  KEY `FK_foodd` (`foodID`),
  KEY `FK_petType` (`petID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`orderID`, `userID`, `accessoriesID`, `petID`, `foodID`, `quantity`, `time`) VALUES
(1, 1, NULL, NULL, 1, 3, '2021-11-12 14:13:58'),
(2, 1, NULL, NULL, 6, 3, '2021-11-12 17:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `contact_number` varchar(12) DEFAULT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `roles` varchar(10) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `name`, `password`, `email_address`, `contact_number`, `gender`, `dob`, `profile_pic`, `roles`) VALUES
(1, 'test', 'Ali Ahmad', 'pass', 'ali@gmail.com', '0123456789', 'M', '2002-02-22', 'amongUS.jpg', 'user'),
(2, 'admin', '', '1234', 'admin@gmail.com', NULL, NULL, NULL, NULL, 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_userrr` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_accessories` FOREIGN KEY (`accessoriesID`) REFERENCES `accessories_toys` (`accessoriesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_fooood` FOREIGN KEY (`foodID`) REFERENCES `pet_food` (`foodID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD CONSTRAINT `FK_accessoriess` FOREIGN KEY (`accessoriesID`) REFERENCES `accessories_toys` (`accessoriesID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_petType` FOREIGN KEY (`petID`) REFERENCES `pet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usersID` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_Food` FOREIGN KEY (`foodID`) REFERENCES `pet_food` (`foodID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
