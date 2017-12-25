-- phpMyAdmin SQL Dump
-- version 4.2.11
-- //www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2017 at 02:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buy_sell`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_car_motorcycle`
--

CREATE TABLE IF NOT EXISTS `add_car_motorcycle` (
`acm_id` int(11) NOT NULL,
  `uploader` varchar(255) NOT NULL DEFAULT 'admin',
  `number_plate` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_sub_cat_id` int(11) NOT NULL,
  `listing_type` int(11) NOT NULL DEFAULT '1' COMMENT '0=> Classified, 1=>Auction',
  `list_in_second_cat` int(11) NOT NULL,
  `cat1_id` int(11) NOT NULL,
  `sub_cat1_id` int(11) NOT NULL,
  `sub_sub_cat1_id` int(11) NOT NULL,
  `listing_title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `brand_item` int(11) NOT NULL COMMENT '1=>USED, 2=>UNUSED',
  `start_price` decimal(12,2) NOT NULL,
  `reserve_price` decimal(12,2) NOT NULL,
  `buy_now` decimal(12,2) NOT NULL,
  `allow_bid` int(11) NOT NULL COMMENT '1=>authenticated',
  `listing_duration` int(11) NOT NULL COMMENT '0=>Pre Defined, 1=>Customize',
  `listing_length` date NOT NULL,
  `item_desc` text NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posting_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `sold_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_car_motorcycle`
--

INSERT INTO `add_car_motorcycle` (`acm_id`, `uploader`, `number_plate`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `listing_type`, `list_in_second_cat`, `cat1_id`, `sub_cat1_id`, `sub_sub_cat1_id`, `listing_title`, `subtitle`, `brand_item`, `start_price`, `reserve_price`, `buy_now`, `allow_bid`, `listing_duration`, `listing_length`, `item_desc`, `posting_date`, `posting_status`, `status`, `sold_status`) VALUES
(10, 'admin', '', 2, 10, 20, 0, 0, 0, 0, 0, 'Racing Boots', 'Lether Boots', 1, '300.00', '300.00', '900.00', 1, 0, '2017-05-03', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-18 12:08:40', 1, 1, 0),
(12, '1', '', 2, 10, 21, 1, 0, 0, 0, 0, 'Racing Bikes Gloves', '', 2, '30.00', '30000.00', '50.00', 1, 0, '2017-06-01', 'PERFECT FOR MEN & WOMEN : AllExtreme Bike Gloves are designed with stretchable fabrics to ensure easy wearing by men as well as women. Moreover, the Velcro strap at the wrist will let the rider enjoy a comfortable snug fit throughout the riding session.', '2017-05-23 09:59:36', 1, 1, 1),
(13, '1', '', 2, 10, 21, 1, 1, 2, 0, 0, 'Lether Gloves', 'Racing Gloves', 2, '345.00', '700.00', '900.00', 1, 0, '2017-05-30', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-25 21:21:18', 1, 1, 0),
(15, '1', '', 1, 0, 0, 0, 0, 0, 0, 0, 'Sujuki', '', 2, '50000.00', '50000.00', '600000.00', 1, 0, '2017-06-23', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-06-14 07:34:10', 0, 1, 0),
(16, '1', '', 1, 0, 0, 0, 0, 0, 0, 0, 'Sujuki', '', 2, '50000.00', '50000.00', '600000.00', 1, 0, '2017-06-23', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-06-14 07:38:27', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_car_motorcycle_extra_field`
--

CREATE TABLE IF NOT EXISTS `add_car_motorcycle_extra_field` (
`acmef_id` int(11) NOT NULL,
  `ccef_id` int(11) NOT NULL,
  `acm_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_car_motorcycle_extra_field`
--

INSERT INTO `add_car_motorcycle_extra_field` (`acmef_id`, `ccef_id`, `acm_id`, `value`, `status`) VALUES
(13, 2, 10, ' Black ', 1),
(14, 3, 10, 'Leather ', 1),
(15, 0, 12, 'Red ', 1),
(16, 0, 13, 'Red ', 1),
(17, 4, 16, 'dont_know ', 1),
(18, 5, 16, '23234', 1),
(19, 6, 16, 'Yes ', 1),
(20, 7, 16, 'sfzsdgdfghdf', 1),
(21, 8, 16, 'ABS Brakes  ||  Air Conditioning  ||  Alarm ', 1),
(22, 9, 16, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_car_motorcycle_listing_features`
--

CREATE TABLE IF NOT EXISTS `add_car_motorcycle_listing_features` (
`acmlf_id` int(11) NOT NULL,
  `acm_id` int(11) NOT NULL DEFAULT '0',
  `Feature_Combo` int(11) NOT NULL DEFAULT '0',
  `Featured` int(11) NOT NULL DEFAULT '0',
  `Highlight` int(11) NOT NULL DEFAULT '0',
  `Bold_Title` int(11) NOT NULL DEFAULT '0',
  `MotorWeb_Basic_Report` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_car_motorcycle_listing_features`
--

INSERT INTO `add_car_motorcycle_listing_features` (`acmlf_id`, `acm_id`, `Feature_Combo`, `Featured`, `Highlight`, `Bold_Title`, `MotorWeb_Basic_Report`) VALUES
(6, 10, 1, 1, 1, 1, 0),
(7, 12, 0, 0, 1, 0, 0),
(8, 13, 0, 0, 0, 0, 0),
(9, 16, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_car_motorcycle_photo`
--

CREATE TABLE IF NOT EXISTS `add_car_motorcycle_photo` (
`acmp_id` int(11) NOT NULL,
  `acm_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_car_motorcycle_photo`
--

INSERT INTO `add_car_motorcycle_photo` (`acmp_id`, `acm_id`, `image`, `status`) VALUES
(19, 12, '1495533587797rsz_aaa.jpg', 1),
(20, 12, '1495533587961rsz_aaaa.jpg', 1),
(21, 12, '1495533587615rsz_aaaaa.jpg', 1),
(23, 13, '14957473017881495533587797rsz_aaa.jpg', 1),
(24, 13, '14957473018621495533587961rsz_aaaa.jpg', 1),
(25, 10, '149604425263rsz_lrgscaleblack-venom-motorcycle-race-boots-red-1.jpg', 1),
(26, 10, '1496044252476rsz_sidi-stealth-st-motorcycle-racing-boots-red-1.jpg', 1),
(27, 16, '1497426165387rsz_1_bmw_car_wallpaperpreview.jpg', 0),
(28, 16, '1497426165348rsz_2017-bmw-m4-cs-exterior-1.jpg', 0),
(29, 16, '1497426165992rsz_jaguar-xf.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_general_items`
--

CREATE TABLE IF NOT EXISTS `add_general_items` (
`agi_id` int(11) NOT NULL,
  `uploader` varchar(255) NOT NULL DEFAULT 'admin',
  `cat_id` int(11) NOT NULL COMMENT 'gic_id->general_item_category',
  `sub_cat_id` int(11) NOT NULL COMMENT 'gic_id->general_item_category',
  `sub_sub_cat_id` int(11) NOT NULL COMMENT 'gic_id->general_item_category',
  `sub_sub_sub_cat_id` int(11) NOT NULL COMMENT 'gic_id->general_item_category',
  `list_in_second_cat` int(11) NOT NULL COMMENT '0-> for one category,  1->for 2nd category',
  `cat1_id` int(11) NOT NULL,
  `sub_cat1_id` int(11) NOT NULL,
  `sub_sub_cat1_id` int(11) NOT NULL,
  `sub_sub_sub_cat1_id` int(11) NOT NULL,
  `listing_type` int(11) NOT NULL DEFAULT '0' COMMENT '0=>both 1=> Classified 2=> Auction',
  `listing_title` varchar(255) NOT NULL,
  `subtitle` text NOT NULL,
  `brand_item` int(11) NOT NULL COMMENT '1=>USED, 2=>UNUSED',
  `start_price` decimal(12,2) NOT NULL,
  `reserve_price` decimal(12,2) NOT NULL,
  `buy_now` decimal(12,2) NOT NULL,
  `allow_bid` int(11) NOT NULL COMMENT '1=>authenticated',
  `listing_duration` int(11) NOT NULL COMMENT '0=>Pre Defined, 1=>Customize',
  `listing_length` date NOT NULL,
  `pick_ups` int(11) NOT NULL COMMENT '1=>No Pick Ups, 2=>Buyer Must Pick Ups, 3=>buyer can pickups',
  `shipping_cost` decimal(12,2) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `item_desc` text NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posting_status` int(11) NOT NULL DEFAULT '0',
  `stock_status` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  `sold_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_general_items`
--

INSERT INTO `add_general_items` (`agi_id`, `uploader`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `sub_sub_sub_cat_id`, `list_in_second_cat`, `cat1_id`, `sub_cat1_id`, `sub_sub_cat1_id`, `sub_sub_sub_cat1_id`, `listing_type`, `listing_title`, `subtitle`, `brand_item`, `start_price`, `reserve_price`, `buy_now`, `allow_bid`, `listing_duration`, `listing_length`, `pick_ups`, `shipping_cost`, `payment`, `item_desc`, `posting_date`, `posting_status`, `stock_status`, `status`, `sold_status`) VALUES
(26, 'admin', 5, 8, 12, 20, 1, 5, 7, 0, 0, 0, 'Li-on Battery', 'Laptop Battery', 2, '300.00', '1000.00', '900.00', 1, 0, '2017-05-31', 1, '0.00', 'cash || safe_trader', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-18 10:39:16', 1, 1, 1, 0),
(27, '1', 5, 8, 12, 20, 0, 0, 0, 0, 0, 0, 'Lithium Battery', '', 1, '300.00', '300.00', '900.00', 1, 0, '2017-05-31', 1, '0.00', 'cash || safe_trader', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-18 10:39:16', 1, 1, 1, 1),
(28, '1', 5, 8, 14, 0, 0, 0, 0, 0, 0, 0, 'Laptop Charger', 'Adapter For Acer LAPTOPS', 2, '297.00', '297.00', '400.00', 1, 0, '2017-05-28', 1, '30.00', 'credit_card || bank_deposit || cash || safe_trader', 'An item that has been restored to working order. This means the item has been inspected, cleaned, and repaired to full working order and is in excellent condition. This item may or may not be in original packaging. See the seller''s listing for full details.', '2017-05-23 05:17:40', 1, 1, 1, 0),
(29, '1', 5, 8, 14, 0, 1, 5, 7, 0, 0, 0, 'iball Rocky Headset Over-Ear Headphone with Mic', '3D Headphone', 2, '511.00', '700.00', '900.00', 1, 0, '2017-05-31', 1, '0.00', 'credit_card || bank_deposit || cash', 'Crystal clear sound. Useful for internet voice chat, multi - player internet gaming, video conferencing, speech recognition and dictation, language and other training\r\nMade to be used with PC/laptop\r\nAlso compatible with many other devices using compatible audio convertor. Crystal clear sound. Useful for internet voice chat, multi - player internet gaming, video conferencing, speech recognition and dictation, language and other training\r\nMade to be used with PC/laptop\r\nAlso compatible with many other devices using compatible audio convertor', '2017-05-26 10:09:45', 1, 1, 1, 0),
(30, '1', 5, 7, 0, 0, 0, 0, 0, 0, 0, 2, 'Power bank', 'Redmi Power Bank', 2, '300.00', '800.00', '0.00', 1, 0, '2017-06-05', 1, '1.00', 'credit_card || bank_deposit', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-31 10:04:59', 1, 1, 1, 0),
(32, '1', 5, 7, 0, 0, 1, 5, 8, 14, 0, 1, 'Data Cable', '', 2, '0.00', '0.00', '900.00', 1, 0, '2017-06-05', 1, '1.00', 'bank_deposit || cash', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-31 11:12:19', 1, 1, 1, 0),
(33, '1', 3, 23, 0, 0, 0, 0, 0, 0, 0, 2, 'Baby Gear Red Color', '', 2, '689.00', '1000.00', '0.00', 1, 0, '2017-06-09', 2, '0.00', 'credit_card || safe_trader', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', '2017-05-31 11:26:22', 1, 1, 1, 0),
(34, '1', 4, 25, 0, 0, 1, 4, 24, 0, 0, 0, 'SQL Books', 'Oracle Books', 2, '200.00', '500.00', '445.00', 1, 1, '2017-06-27', 1, '1.00', 'credit_card || bank_deposit', 'SQL is a standard language for storing, manipulating and retrieving data in databases.\r\n\r\nOur SQL tutorial will teach you how to use SQL in: MySQL, SQL Server, MS Access, Oracle, Sybase, Informix, Postgres, and other database systems.', '2017-05-31 11:37:11', 1, 1, 1, 0),
(35, '1', 15, 16, 17, 0, 1, 15, 16, 18, 0, 0, 'Nivia Pro Grip Basketball', 'Basketball', 2, '455.00', '800.00', '700.00', 1, 0, '2017-06-05', 1, '30.00', 'credit_card || safe_trader', 'This is a nice and decent ball...the build quality looks good...colours make it look like the money ball of all star game...has nice grip pretty much similar to the nivia engraver but not par with it...it has the official size and weight...it is good for improving your skills if you are an advanced beginner in the game....overall a nice ball by nivia...don''t worry about the quality due to the pricing and go for it...', '2017-05-31 11:50:32', 1, 1, 1, 0),
(36, '1', 15, 16, 18, 0, 0, 0, 0, 0, 0, 1, 'Cosco Baketball', 'Basketball size 5', 2, '0.00', '0.00', '890.00', 1, 0, '2017-06-09', 1, '45.00', 'credit_card || safe_trader', 'This is a nice and decent ball...the build quality looks good...colours make it look like the money ball of all star game...has nice grip pretty much similar to the nivia engraver but not par with it...it has the official size and weight...it is good for improving your skills if you are an advanced beginner in the game....overall a nice ball by nivia...don''t worry about the quality due to the pricing and go for it...', '2017-05-31 11:53:00', 1, 1, 1, 0),
(38, '1', 15, 16, 18, 0, 0, 0, 0, 0, 0, 0, '5 Size Basketball', '', 1, '400.00', '500.00', '500.00', 1, 0, '2017-06-05', 1, '1.00', 'credit_card', 'This is a nice and decent ball...the build quality looks good...colours make it look like the money ball of all star game...has nice grip pretty much similar to the nivia engraver but not par with it...it has the official size and weight...it is good for improving your skills if you are an advanced beginner in the game....overall a nice ball by nivia...don''t worry about the quality due to the pricing and go for it...', '2017-05-31 12:13:50', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_general_items_extra_field`
--

CREATE TABLE IF NOT EXISTS `add_general_items_extra_field` (
`agief_id` int(11) NOT NULL,
  `gcef_id` int(11) NOT NULL COMMENT 'db->general_cat_extra_field',
  `agi_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_general_items_extra_field`
--

INSERT INTO `add_general_items_extra_field` (`agief_id`, `gcef_id`, `agi_id`, `value`, `status`) VALUES
(3, 2, 26, '40,000 mah', 1),
(4, 5, 33, '11World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_general_items_photo`
--

CREATE TABLE IF NOT EXISTS `add_general_items_photo` (
`agip_id` int(11) NOT NULL,
  `agi_id` int(11) NOT NULL COMMENT 'DB->add_general_items',
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_general_items_photo`
--

INSERT INTO `add_general_items_photo` (`agip_id`, `agi_id`, `image`, `status`) VALUES
(17, 26, '1490964275537Disconnecting-Laptop-Battery.jpg', 1),
(18, 26, '1490964275856rsz_344.jpg', 0),
(19, 26, '1490964275249rsz_949f61af__bps-22.jpg', 1),
(22, 26, '1490964306726rsz_949f61af__bps-22.jpg', 0),
(23, 26, '1490964337294Disconnecting-Laptop-Battery.jpg', 1),
(25, 26, '1491391879542rsz_344.jpg', 0),
(26, 27, '1490964275537Disconnecting-Laptop-Battery.jpg', 1),
(32, 27, '149561370577camera-icon-png-nTXB8LgMc.png', 0),
(33, 28, '1495630104241rsz_19-5v-4-62a-font-b-notebook-b-font-replacements-ac-font-b-adapter-b-font.jpg', 1),
(34, 28, '1495630105226rsz_dell-195v-462a-adapter-repair-in-dwarka.jpg', 1),
(35, 28, '1495630105835rsz_-font-b-laptop-b-font-charger-19v-4-74a-5-5-3-0mm-ac-font.jpg', 1),
(36, 28, '1495630203486rsz_19-5v-4-62a-font-b-notebook-b-font-replacements-ac-font-b-adapter-b-font.jpg', 1),
(37, 29, '1495793404878rsz_61k9xus0qil_sl1000_.jpg', 1),
(38, 29, '1495793404330rsz_0000256_wireless-bluetooth-headphone-w-microphone-over-ear-foldable-portable-stereo-headset-for-cellphones-l.jpg', 1),
(39, 29, '1495793404342rsz_500281813_744.jpg', 1),
(40, 29, '149579340438rsz_allwin-headset-gaming-microphone-headphone-with-35mm-for-pc-laptopcomputer-black-6370-3977003-4185622c79c77ec2a586022a6e32c3a7.jpg', 1),
(41, 30, '1496225121816rsz_516wf6bjfol_sl1000_.jpg', 1),
(42, 30, '1496225121642rsz_anker_powercore_10000_2_thumb800.jpg', 1),
(43, 30, '1496225121838rsz_aukey_30000mah_lightning_power_bank_thumb800.jpg', 1),
(44, 30, '1496225121464rsz_lumsing_glory_p2_power_bank_thumb800.jpg', 1),
(45, 32, '1496229159436rsz_data-cable-for-gionee-elife-s7-maxbhi-3-3-2.jpg', 1),
(46, 32, '1496229159632rsz_data-cable-for-huawei-honor-4x-maxbhi-5-6-1.jpg', 1),
(47, 32, '1496229159803rsz_orion-data-cable-for-samsung-galaxy-tab-2-p3100-original-imaebxwcsjang4s8.jpg', 1),
(48, 33, '1496230002606rsz_baby-gear-master-thumbnail-image-v1 (1).jpg', 1),
(49, 33, '1496230002111rsz_baby-gear-master-thumbnail-image-v1.jpg', 1),
(50, 33, '1496230002125rsz_sb10.jpg', 1),
(51, 33, '1496230002479rsz_t2ec16vhjhqffhocn95zbsqfusyzo--_32.jpg', 1),
(52, 34, '149623064933rsz_1cover.jpg', 1),
(53, 34, '1496230649417rsz_819l5onwvzl.jpg', 1),
(54, 34, '1496230649184rsz_a-book-a-week-image.jpg', 1),
(55, 34, '1496230649988rsz_book-1769228_960_720.jpg', 1),
(56, 34, '1496230649463rsz_books-922321_960_720.jpg', 1),
(57, 35, '1496231450754rsz_9965999-ncaa-basketball-ncaa-tournament-east-regional-practice.jpg', 1),
(58, 35, '1496231450702rsz_635960876832893706181535308_basketball.jpg', 1),
(59, 35, '1496231450218rsz_basketball.jpg', 1),
(60, 35, '1496231450410rsz_moltenusa_homepage-basketball4__05239.jpg', 1),
(63, 36, '1496231618628rsz_hoops.jpg', 1),
(64, 36, '1496231618415rsz_round2.png', 1),
(65, 36, '149623161864rsz_s558697907727836376_p6_i1_w1740.jpg', 1),
(67, 38, '1496232841852rsz_635960876832893706181535308_basketball.jpg', 1),
(68, 38, '1496232841950rsz_basketball.jpg', 1),
(69, 38, '149623284176rsz_hoops.jpg', 1),
(70, 38, '1496232978264rsz_s558697907727836376_p6_i1_w1740.jpg', 1),
(71, 36, '1496233006953rsz_635960876832893706181535308_basketball.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_job`
--

CREATE TABLE IF NOT EXISTS `add_job` (
`aj_id` int(11) NOT NULL,
  `uploader` varchar(255) NOT NULL DEFAULT 'admin',
  `cat_id` int(11) NOT NULL COMMENT 'db->job_category',
  `sub_cat_id` int(11) NOT NULL COMMENT 'db->job_category',
  `sub_sub_cat_id` int(11) NOT NULL COMMENT 'db->job_category',
  `listing_title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `job_type1` int(11) NOT NULL COMMENT '1-> Full Time, 2-> Part Time',
  `job_type2` int(11) NOT NULL COMMENT '1->Permanent, 2->Contract / Temp',
  `pay_benefit` varchar(255) NOT NULL,
  `approx_pay_type` int(11) NOT NULL COMMENT '1-> Annual , 2-> Hourly',
  `min_scale` int(11) NOT NULL,
  `max_scale` int(11) NOT NULL,
  `visa_required` int(11) NOT NULL COMMENT '1->Yes, 2-> No',
  `reference` varchar(255) NOT NULL,
  `short_summery` text NOT NULL,
  `job_desc` text NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `send_application` varchar(255) NOT NULL,
  `application_sendTo` varchar(255) NOT NULL,
  `application_instruction` text NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posting_status` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job`
--

INSERT INTO `add_job` (`aj_id`, `uploader`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `listing_title`, `company`, `country`, `city`, `region`, `job_type1`, `job_type2`, `pay_benefit`, `approx_pay_type`, `min_scale`, `max_scale`, `visa_required`, `reference`, `short_summery`, `job_desc`, `contact_name`, `mobile_no`, `landline`, `send_application`, `application_sendTo`, `application_instruction`, `posting_date`, `posting_status`, `status`) VALUES
(13, 'admin', 16, 21, 24, 'Costing', 'Ambit.Co', 5, 10, 6, 1, 2, '5k & Home allowance', 1, 28, 30, 2, 'Cherry Agarwal', 'The job posting should also include a concise picture of the skills required for the position to attract qualified job candidates. Organize the job description into five sections: Company Information, Job Description, Job Requirements, Benefits and a Call to Action. Be sure to include keywords that will help make your job posting searchable.', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'Prosenjit Agarwal', 7602632739, '0334340834', 'Email', 'dassiddhartha.ambit@gmail.com', 'The job posting should also include a concise picture of the skills required for the position to attract qualified job candidates. Organize the job description into five sections: Company Information, Job Description, Job Requirements, Benefits and a Call to Action. Be sure to include keywords that will help make your job posting searchable.', '2017-05-18 11:33:26', 1, 1),
(14, 'admin', 16, 21, 24, 'Accountant', 'Ambit.Co', 5, 11, 7, 1, 2, '5k & Home allowance', 1, 30, 60, 2, 'Cherry Agarwal', 'The job posting should also include a concise picture of the skills required for the position to attract qualified job candidates. Organize the job description into five sections: Company Information, Job Description, Job Requirements, Benefits and a Call to Action. Be sure to include keywords that will help make your job posting searchable.', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'Prosenjit Agarwal', 7602632739, '0334340834', 'Email', 'dassiddhartha.ambit@gmail.com', 'The job posting should also include a concise picture of the skills required for the position to attract qualified job candidates. Organize the job description into five sections: Company Information, Job Description, Job Requirements, Benefits and a Call to Action. Be sure to include keywords that will help make your job posting searchable.', '2017-05-18 11:33:26', 1, 1),
(17, '1', 2, 9, 0, 'SQL Administrator', 'Infosys', 5, 10, 6, 1, 0, '35k & All allowncw Applicable', 1, 20, 81, 1, 'Boishakhi Barua', 'Experience in managing MacAfee AV with EP management, exposure to DLP and data security is must.Experience in Desktop Support, Outlook troubleshooting, backup & recovery, user and group creation, Network printer installation, troubleshooting of Shared & NTFS Permissions.Good communication skills with ability to communicate effectively with technical and non - technical colleagues at all levels in the organisation. 	Diagnose and resolve software and hardware problems, including windows server and client operating systems and range of software applications.', 'Experience in managing MacAfee AV with EP management, exposure to DLP and data security is must.Experience in Desktop Support, Outlook troubleshooting, backup & recovery, user and group creation, Network printer installation, troubleshooting of Shared & NTFS Permissions.Good communication skills with ability to communicate effectively with technical and non - technical colleagues at all levels in the organisation. 	Diagnose and resolve software and hardware problems, including windows server and client operating systems and range of software applications.', 'Arpita Das', 8745124592, '03378534509', 'Email', 'dassiddhartha.10@gmail.com', 'Experience in managing MacAfee AV with EP management, exposure to DLP and data security is must.Experience in Desktop Support, Outlook troubleshooting, backup & recovery, user and group creation, Network printer installation, troubleshooting of Shared & NTFS Permissions.Good communication skills with ability to communicate effectively with technical and non - technical colleagues at all levels in the organisation. 	Diagnose and resolve software and hardware problems, including windows server and client operating systems and range of software applications.', '2017-05-26 12:01:09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_job_extra_field`
--

CREATE TABLE IF NOT EXISTS `add_job_extra_field` (
`ajef_id` int(11) NOT NULL,
  `jcef_id` int(11) NOT NULL,
  `aj_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job_extra_field`
--

INSERT INTO `add_job_extra_field` (`ajef_id`, `jcef_id`, `aj_id`, `value`, `status`) VALUES
(1, 2, 13, '6 Months ', 1),
(2, 3, 13, 'Yes ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_job_listing_features`
--

CREATE TABLE IF NOT EXISTS `add_job_listing_features` (
`ajlf_id` int(11) NOT NULL,
  `aj_id` int(11) NOT NULL,
  `Featured` int(11) NOT NULL DEFAULT '0',
  `Branding` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job_listing_features`
--

INSERT INTO `add_job_listing_features` (`ajlf_id`, `aj_id`, `Featured`, `Branding`) VALUES
(1, 13, 0, 0),
(2, 14, 0, 0),
(3, 17, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_job_photo`
--

CREATE TABLE IF NOT EXISTS `add_job_photo` (
`ajp_id` int(11) NOT NULL,
  `aj_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job_photo`
--

INSERT INTO `add_job_photo` (`ajp_id`, `aj_id`, `image`, `status`) VALUES
(22, 13, '1490963784769233.jpg', 1),
(23, 13, '1490963784763gfncfgmh.jpg', 1),
(24, 13, '1490963784932rsz_164123455_0.jpg', 1),
(25, 13, '1490963784228rsz_careers-hero.jpg', 1),
(26, 13, '149096378455rsz_job-interview-ftr.jpg', 1),
(27, 13, '1490963784560rsz_jobs2.jpg', 1),
(28, 13, '1490963854736gnghjm.jpg', 1),
(29, 13, '1490963854470rsz_core_promo.jpg', 1),
(30, 14, '1490963784228rsz_careers-hero.jpg', 1),
(35, 17, '1495800089629rsz_14798122301377043837-small.jpg', 1),
(36, 17, '149580008988rsz_hospital-administrator-job.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_job_video`
--

CREATE TABLE IF NOT EXISTS `add_job_video` (
`ajv_id` int(11) NOT NULL,
  `aj_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_job_video`
--

INSERT INTO `add_job_video` (`ajv_id`, `aj_id`, `video`, `status`) VALUES
(5, 13, 'https://www.youtube.com/embed/3WrUd5nl1lI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_price_for_classified`
--

CREATE TABLE IF NOT EXISTS `add_price_for_classified` (
`apfc_id` int(11) NOT NULL,
  `for_what` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `min_price` decimal(12,2) NOT NULL,
  `max_price` decimal(12,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_price_for_classified`
--

INSERT INTO `add_price_for_classified` (`apfc_id`, `for_what`, `price`, `min_price`, `max_price`, `status`) VALUES
(1, 'classified', '2', '0.00', '0.00', 1),
(2, 'auction', '5', '0.00', '0.00', 1),
(3, 'listed_in_second_cat', '5', '0.00', '0.00', 1),
(4, 'subtitle', '101', '0.00', '0.00', 1),
(5, 'reserve_price', '10', '0.00', '0.00', 1),
(6, 'Feature_Combo', '39', '0.00', '0.00', 1),
(7, 'Featured', '34', '0.00', '0.00', 1),
(8, 'Highlight', '9', '0.00', '0.00', 1),
(9, 'Bold_Title', '9', '0.00', '0.00', 1),
(11, 'MotorWeb_Basic_Report', '9', '0.00', '0.00', 1),
(12, 'Branding', '33', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_price_for_listing`
--

CREATE TABLE IF NOT EXISTS `add_price_for_listing` (
`apfl_id` int(11) NOT NULL,
  `for_what` varchar(255) NOT NULL,
  `price` text NOT NULL,
  `term` text NOT NULL,
  `min_price` varchar(255) NOT NULL,
  `max_price` varchar(255) NOT NULL,
  `price_term` text NOT NULL,
  `rent_min` varchar(255) NOT NULL,
  `rent_max` varchar(255) NOT NULL,
  `rent_term` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_price_for_listing`
--

INSERT INTO `add_price_for_listing` (`apfl_id`, `for_what`, `price`, `term`, `min_price`, `max_price`, `price_term`, `rent_min`, `rent_max`, `rent_term`, `status`) VALUES
(1, 'general_item', 'Success fees for sold items only.', '', '', '', '', '', '', '', 1),
(2, 'car', '9.99', 'For Listing', '', '', '', '', '', '', 1),
(3, 'property', '11', 'For Listing', '', '', '', '', '', '', 1),
(4, 'job', '10', 'For Listing', '', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_property`
--

CREATE TABLE IF NOT EXISTS `add_property` (
`ap_id` int(11) NOT NULL,
  `uploader` varchar(255) NOT NULL DEFAULT 'admin',
  `cat_id` int(11) NOT NULL COMMENT 'DB->property_category',
  `sub_cat_id` int(11) NOT NULL COMMENT 'DB->property_category',
  `sub_sub_cat_id` int(11) NOT NULL COMMENT 'DB->property_category',
  `listing_title` text NOT NULL,
  `listing_duration` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `unit_flat` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `region` int(11) NOT NULL,
  `rateable_value` decimal(12,2) NOT NULL,
  `rateable_value_hide` int(11) NOT NULL COMMENT '0->NO, 1-> YES',
  `expected_sale_price` decimal(12,2) NOT NULL,
  `bedroom` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `floor_area` int(11) NOT NULL,
  `land_area` int(11) NOT NULL,
  `open_home_date` date NOT NULL,
  `open_home_strt_time` varchar(255) NOT NULL,
  `open_home_end_time` varchar(255) NOT NULL,
  `prop_desc` text NOT NULL,
  `parking` text NOT NULL,
  `amenities` text NOT NULL,
  `smoke_alarm` int(11) NOT NULL COMMENT '0-> Don''t Know, 1-> No, 2-> Yes',
  `agency_reference` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `posting_status` int(11) NOT NULL DEFAULT '0',
  `classified_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=> For Sale, 1=> Sold',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property`
--

INSERT INTO `add_property` (`ap_id`, `uploader`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `listing_title`, `listing_duration`, `street`, `unit_flat`, `street_name`, `region`, `rateable_value`, `rateable_value_hide`, `expected_sale_price`, `bedroom`, `bathroom`, `floor_area`, `land_area`, `open_home_date`, `open_home_strt_time`, `open_home_end_time`, `prop_desc`, `parking`, `amenities`, `smoke_alarm`, `agency_reference`, `posting_date`, `posting_status`, `classified_status`, `status`) VALUES
(11, '1', 1, 7, 10, '32/A Sealdaha', '2017-06-29', '32/A', 'Suryataran Building', 'Amhar Street', 6, '10000.00', 1, '20000.00', 6, 2, 1000, 1000, '2017-04-28', '05:19', '20:07', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'Residents , club , Banquet hall , Swimming pool , Open badminton court', 0, 'Siddhartha', '2017-05-18 12:27:02', 1, 0, 0),
(12, 'admin', 1, 8, 16, 'RDB', '2017-06-21', 'Webel More', 'RDB Building', 'Saltlake, Sec-v', 7, '60000.00', 1, '50000.00', 50, 10, 40000, 60000, '2017-05-29', '05:00', '21:30', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'A strickingly attractive housing complex with all the modern smart living facilities at an affordable price. Welly connected by Road, Rail and Air and very close to Rajarhat New Town, upcoming financial hub and smart city of East India', 1, 'Subhadeep', '2017-05-18 12:27:02', 1, 0, 1),
(15, '1', 3, 5, 18, 'Sampoorna Housing Complex', '2017-06-23', 'Kalipark', 'Mangalam Vidya Niketan', 'Newtown', 6, '640.00', 1, '9000.00', 2, 1, 1400, 2300, '2017-07-28', '05:19', '20:07', 'Bengal DCL - an esteemed name in the real estate industry - is a joint enterprise of the West Bengal Housing Board and DC Properties Limited, a member of Development Consultants-Kuljian Group, the transnational engineering consulting group founded by Late Dr. Sadhan C. Dutt and headed by Smt. Shanta Ghosh. Associated with the conception and development of New Town, Kolkata, since the mid nineties, Development Consultants has contributed significantly to the preparation of Master Land Use Plan of the town, Detail Sector Level Plans for Action Area 1 and other important studies. And Bengal DCL has conceived the Urban Design Plan of the 200 hectare Central Business District of New Town', 'Bengal DCL - an esteemed name in the real estate industry - is a joint enterprise of the West Bengal Housing Board and DC Properties Limited, a member of Development Consultants-Kuljian Group, the transnational engineering consulting group founded by Late Dr. Sadhan C. Dutt and headed by Smt. Shanta Ghosh. Associated with the conception and development of New Town, Kolkata, since the mid nineties, Development Consultants has contributed significantly to the preparation of Master Land Use Plan of the town, Detail Sector Level Plans for Action Area 1 and other important studies. And Bengal DCL has conceived the Urban Design Plan of the 200 hectare Central Business District of New Town', 'Bengal DCL - an esteemed name in the real estate industry - is a joint enterprise of the West Bengal Housing Board and DC Properties Limited, a member of Development Consultants-Kuljian Group, the transnational engineering consulting group founded by Late Dr. Sadhan C. Dutt and headed by Smt. Shanta Ghosh. Associated with the conception and development of New Town, Kolkata, since the mid nineties, Development Consultants has contributed significantly to the preparation of Master Land Use Plan of the town, Detail Sector Level Plans for Action Area 1 and other important studies. And Bengal DCL has conceived the Urban Design Plan of the 200 hectare Central Business District of New Town', 2, 'Rittwik Das', '2017-05-26 11:18:50', 1, 0, 1),
(16, '1', 3, 6, 0, 'Signum Windflower', '2017-06-16', 'Viveka Nanda Nagar', 'Sec-3', 'Sonarpur', 7, '10000.00', 1, '7000.00', 1, 1, 40000, 4000, '2017-07-28', '06:40', '20:48', 'Sampoorna is Bengal DCL''s latest residential project at Action Area II, New Town Kolkata. Since we have been associated with New Town from the time it was conceived, we recognize that Action Area II is going to be the nerve-centre of the locality. Sampoorna, on a 4-acre plot, comprises 320 apartments in two clusters: Tritiya is a160 HIG units (Three-bedroom apartments and four and five-bedroom duplexes) in five10-storied towers.', 'Sampoorna is Bengal DCL''s latest residential project at Action Area II, New Town Kolkata. Since we have been associated with New Town from the time it was conceived, we recognize that Action Area II is going to be the nerve-centre of the locality. Sampoorna, on a 4-acre plot, comprises 320 apartments in two clusters: Tritiya is a160 HIG units (Three-bedroom apartments and four and five-bedroom duplexes) in five10-storied towers.', 'Sampoorna is Bengal DCL''s latest residential project at Action Area II, New Town Kolkata. Since we have been associated with New Town from the time it was conceived, we recognize that Action Area II is going to be the nerve-centre of the locality. Sampoorna, on a 4-acre plot, comprises 320 apartments in two clusters: Tritiya is a160 HIG units (Three-bedroom apartments and four and five-bedroom duplexes) in five10-storied towers.', 0, 'Suman Nandi', '2017-05-26 11:28:12', 1, 0, 1),
(17, '1', 1, 7, 12, 'Rajwada Royals Gardens', '2017-06-22', '140/3 Rammohon Sarani', 'SDF Building', 'Saltlake', 6, '10000.00', 1, '20000.00', 1, 1, 1600, 4000, '2017-07-28', '09:24', '21:30', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 1, 'Sujit Singha', '2017-05-26 11:34:28', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_property_contact_dtls`
--

CREATE TABLE IF NOT EXISTS `add_property_contact_dtls` (
`apcd_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL,
  `contact_type` int(11) NOT NULL COMMENT '1-> Contact me, 2->Realestate Agent',
  `realestate_agent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `agency` varchar(255) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `landline` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_contact_dtls`
--

INSERT INTO `add_property_contact_dtls` (`apcd_id`, `ap_id`, `contact_type`, `realestate_agent`, `name`, `agency`, `mobile`, `landline`) VALUES
(5, 11, 1, 1, 'Siddhartha Das', 'Home', 7602632739, 334340834),
(6, 12, 2, 0, 'Sidd', 'Home', 9876893421, 3378904567),
(12, 15, 2, 0, 'Ritwik Das', 'Rittwik Das', 9807345689, 7894562123),
(13, 16, 2, 0, 'Suman Nandi', 'Suman Nandi', 6789452671, 337890654),
(14, 17, 1, 0, 'Sujit Singha', 'Assets.com', 1234567898, 337890654),
(15, 18, 1, 0, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_property_extra_field`
--

CREATE TABLE IF NOT EXISTS `add_property_extra_field` (
`apef_id` int(11) NOT NULL,
  `pcef_id` int(11) NOT NULL COMMENT 'db->property_cat_extra_field',
  `ap_id` int(11) NOT NULL COMMENT 'db->add_product',
  `value` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_extra_field`
--

INSERT INTO `add_property_extra_field` (`apef_id`, `pcef_id`, `ap_id`, `value`, `status`) VALUES
(1, 1, 11, ' 4 ', 1),
(2, 2, 11, '30000', 1),
(3, 3, 11, 'Yes', 1),
(4, 1, 12, '  2  ', 1),
(6, 0, 17, '  2  ', 1),
(7, 0, 17, '23000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_property_listing_features`
--

CREATE TABLE IF NOT EXISTS `add_property_listing_features` (
`aplf_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL DEFAULT '0',
  `Feature_Combo` int(11) NOT NULL DEFAULT '0',
  `Featured` int(11) NOT NULL DEFAULT '0',
  `Highlight` int(11) NOT NULL DEFAULT '0',
  `Bold_Title` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_listing_features`
--

INSERT INTO `add_property_listing_features` (`aplf_id`, `ap_id`, `Feature_Combo`, `Featured`, `Highlight`, `Bold_Title`) VALUES
(1, 11, 0, 0, 0, 0),
(2, 12, 0, 0, 0, 0),
(3, 15, 0, 0, 0, 0),
(4, 16, 0, 0, 0, 0),
(5, 17, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_property_photo`
--

CREATE TABLE IF NOT EXISTS `add_property_photo` (
`app_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_photo`
--

INSERT INTO `add_property_photo` (`app_id`, `ap_id`, `image`, `status`) VALUES
(10, 11, '14907678825611480070717property2.jpg', 0),
(11, 11, '14907678824431480071302property10.jpg', 1),
(12, 11, '14907678824221480073903property5-map - Copy.jpg', 1),
(13, 11, '14907678825931480576608property10.jpg', 1),
(14, 11, '14907678821981480576686property7.jpg', 1),
(17, 11, '14907678824141480578777property8.jpg', 0),
(20, 11, '1490961519363rsz_2.jpg', 0),
(21, 11, '1490961519537rsz_3.jpg', 1),
(22, 11, '1490961519410rsz_7.jpg', 0),
(23, 11, '1490961519422rsz_16.jpg', 0),
(24, 11, '1490961519914rsz_hd-beautiful-architecture-wallpaper.jpg', 1),
(25, 11, '1490961554762rsz_maxresdefault.jpg', 0),
(26, 12, '1491290326614rsz_56ab3d09e86031fc7ad9069272.jpg', 1),
(27, 12, '1491290326188rsz_170-20160922042734998-693.jpg', 0),
(28, 12, '1491290326356rsz_el-dorado.jpg', 1),
(29, 12, '1491290326839rsz_hd-beautiful-architecture-wallpaper.jpg', 0),
(30, 12, '1491290326367rsz_home-wallpaper-25.jpg', 1),
(32, 12, '1491290326580rsz_prop7.jpg', 1),
(33, 12, '1491290326285rsz_realtycompass-set_2-3.jpg', 1),
(40, 15, '14957975776251480071302property10.jpg', 1),
(41, 16, '14957981003561480576608property10.jpg', 1),
(42, 17, '149579848247014810289501480577097keawe-interior-preview.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `add_property_price_dtls`
--

CREATE TABLE IF NOT EXISTS `add_property_price_dtls` (
`appd_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL COMMENT 'db->add_property',
  `price_type` int(11) NOT NULL,
  `label_name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_price_dtls`
--

INSERT INTO `add_property_price_dtls` (`appd_id`, `ap_id`, `price_type`, `label_name`, `value`) VALUES
(5, 11, 3, 'Auction Date', '2017-03-31'),
(6, 12, 1, 'Asking price', '100000'),
(9, 15, 1, 'Asking price', '3400'),
(10, 16, 1, 'Asking price', '3400'),
(11, 17, 1, 'Asking price', '3400'),
(12, 18, 1, 'Asking price', '');

-- --------------------------------------------------------

--
-- Table structure for table `add_property_video`
--

CREATE TABLE IF NOT EXISTS `add_property_video` (
`apv_id` int(11) NOT NULL,
  `ap_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_property_video`
--

INSERT INTO `add_property_video` (`apv_id`, `ap_id`, `video`, `status`) VALUES
(1, 11, 'https://www.youtube.com/embed/3WrUd5nl1lI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_watch_car`
--

CREATE TABLE IF NOT EXISTS `add_to_watch_car` (
`atwc_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `add_to_watch_general_item`
--

CREATE TABLE IF NOT EXISTS `add_to_watch_general_item` (
`atwgi_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_watch_general_item`
--

INSERT INTO `add_to_watch_general_item` (`atwgi_id`, `cus_id`, `item_id`) VALUES
(35, 1, 27),
(36, 1, 30),
(38, 9, 28);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_watch_job`
--

CREATE TABLE IF NOT EXISTS `add_to_watch_job` (
`atwj_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_watch_job`
--

INSERT INTO `add_to_watch_job` (`atwj_id`, `cus_id`, `item_id`) VALUES
(8, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_watch_property`
--

CREATE TABLE IF NOT EXISTS `add_to_watch_property` (
`atwp_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_watch_property`
--

INSERT INTO `add_to_watch_property` (`atwp_id`, `cus_id`, `item_id`) VALUES
(12, 1, 14),
(13, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `full_name`, `image`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Siddhartha Das', 'admin.png', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin_website_link`
--

CREATE TABLE IF NOT EXISTS `admin_website_link` (
`id` int(11) NOT NULL,
  `for_link` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL COMMENT '1=>emailm, 2=>contact no, 3=> social media link'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_website_link`
--

INSERT INTO `admin_website_link` (`id`, `for_link`, `link`, `status`, `type`) VALUES
(1, 'Contact', 'contact@scriptsbundle.com', 1, 1),
(2, 'Sales', 'admin@scriptsbundle.com', 1, 1),
(3, 'Info', 'info@scriptsbundle.com', 1, 1),
(4, 'Facebook', 'https://www.facebook.com/', 1, 3),
(5, 'Contact', '9912345674', 1, 2),
(6, 'Sales', '8790653412', 1, 2),
(7, 'Info', '1234567897', 1, 2),
(8, 'Google Plus', 'https://www.google.com', 1, 3),
(9, 'Twitter', '//www.twitter.com', 1, 3),
(10, 'Pinterest', 'https://in.pinterest.com/', 1, 3),
(11, 'Youtube', 'https://www.youtube.com', 1, 3),
(12, 'Linkedin', 'https://in.linkedin.com/', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_about`
--

CREATE TABLE IF NOT EXISTS `ambit_about` (
`id` int(11) NOT NULL,
  `about` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_about`
--

INSERT INTO `ambit_about` (`id`, `about`, `date`) VALUES
(6, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p> 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>', '2016-11-15 10:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_car_bid`
--

CREATE TABLE IF NOT EXISTS `ambit_car_bid` (
`acb_id` int(11) NOT NULL,
  `acm_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid_price` decimal(12,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `won` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_car_bid`
--

INSERT INTO `ambit_car_bid` (`acb_id`, `acm_id`, `cus_id`, `bid_price`, `date`, `won`) VALUES
(1, 12, 1, '35.00', '2017-05-29 09:09:04', 2),
(2, 12, 1, '36.00', '2017-05-29 09:24:57', 2),
(3, 12, 1, '37.00', '2017-05-29 10:19:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_car_review`
--

CREATE TABLE IF NOT EXISTS `ambit_car_review` (
`acr_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_car_review`
--

INSERT INTO `ambit_car_review` (`acr_id`, `cus_id`, `item_id`, `rating`, `comment`, `date`, `status`) VALUES
(1, 1, 10, 5, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 09:31:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_city`
--

CREATE TABLE IF NOT EXISTS `ambit_city` (
`ct_id` int(11) NOT NULL,
  `ct_cn_id` int(11) NOT NULL,
  `ct_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_city`
--

INSERT INTO `ambit_city` (`ct_id`, `ct_cn_id`, `ct_name`) VALUES
(10, 5, 'Auckland'),
(11, 5, 'Nelson'),
(12, 5, 'Napier'),
(13, 5, 'Hastings');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_country`
--

CREATE TABLE IF NOT EXISTS `ambit_country` (
`cn_id` int(11) NOT NULL,
  `cn_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_country`
--

INSERT INTO `ambit_country` (`cn_id`, `cn_name`) VALUES
(5, 'New Zealand'),
(10, 'FIJI');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_cus_social_media`
--

CREATE TABLE IF NOT EXISTS `ambit_cus_social_media` (
`id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `acnt_type` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_cus_social_media`
--

INSERT INTO `ambit_cus_social_media` (`id`, `cus_id`, `acnt_type`, `link`) VALUES
(1, 1, 'Facebook', 'https://www.facebook.com/'),
(2, 1, 'Twitter', '//www.twitter.com'),
(3, 1, 'Google +', '//www.google.com'),
(4, 1, 'LinkedIn', 'https://in.linkedin.com/'),
(5, 3, 'Facebook', 'https://www.facebook.com/'),
(6, 3, 'Twitter', 'https://www.facebook.com/'),
(7, 3, 'Google +', 'https://www.facebook.com/'),
(8, 3, 'LinkedIn', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_faq`
--

CREATE TABLE IF NOT EXISTS `ambit_faq` (
`id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_faq`
--

INSERT INTO `ambit_faq` (`id`, `question`, `answer`, `date`) VALUES
(1, 'How do i recover password?', 'Go to home page. and click on sign in tab. and next click on recovery password', '2016-11-14 08:00:00'),
(8, 'Can I change the size of my images?', 'No, the size of your images is automatically set by the webpage template you chose.', '2016-11-16 07:25:29'),
(9, 'If I buy Premium Package , will I get a discount?', 'No, there are no discounts on Premium Purchase', '2016-11-16 07:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_general_item_bid`
--

CREATE TABLE IF NOT EXISTS `ambit_general_item_bid` (
`agib_id` int(11) NOT NULL,
  `agi_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `bid_price` decimal(12,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `won` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_general_item_bid`
--

INSERT INTO `ambit_general_item_bid` (`agib_id`, `agi_id`, `cus_id`, `bid_price`, `date`, `won`) VALUES
(1, 27, 1, '301.00', '2017-05-29 10:46:59', 2),
(2, 27, 1, '302.00', '2017-05-29 11:27:59', 2),
(3, 26, 1, '310.00', '2017-05-30 05:52:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_general_item_review`
--

CREATE TABLE IF NOT EXISTS `ambit_general_item_review` (
`agir_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_general_item_review`
--

INSERT INTO `ambit_general_item_review` (`agir_id`, `cus_id`, `item_id`, `rating`, `comment`, `date`, `status`) VALUES
(1, 1, 26, 4, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 07:43:10', 1),
(2, 1, 26, 5, '11Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 07:43:31', 1),
(3, 1, 26, 1, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 09:04:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_job_apply`
--

CREATE TABLE IF NOT EXISTS `ambit_job_apply` (
`aja_id` int(11) NOT NULL,
  `aj_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_job_apply`
--

INSERT INTO `ambit_job_apply` (`aja_id`, `aj_id`, `cus_id`, `date`) VALUES
(2, 13, 1, '2017-05-29 06:14:31'),
(3, 17, 2, '2017-05-30 10:10:22'),
(4, 17, 3, '2017-05-30 10:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_job_review`
--

CREATE TABLE IF NOT EXISTS `ambit_job_review` (
`ajr_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_job_review`
--

INSERT INTO `ambit_job_review` (`ajr_id`, `cus_id`, `item_id`, `rating`, `comment`, `date`, `status`) VALUES
(1, 1, 13, 3, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 09:28:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_privacy_policy`
--

CREATE TABLE IF NOT EXISTS `ambit_privacy_policy` (
`id` int(11) NOT NULL,
  `privacy` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_privacy_policy`
--

INSERT INTO `ambit_privacy_policy` (`id`, `privacy`, `date`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p> 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p> 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>', '2016-11-15 09:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_property_review`
--

CREATE TABLE IF NOT EXISTS `ambit_property_review` (
`apr_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_property_review`
--

INSERT INTO `ambit_property_review` (`apr_id`, `cus_id`, `item_id`, `rating`, `comment`, `date`, `status`) VALUES
(1, 1, 11, 1, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 09:21:58', 1),
(2, 1, 11, 3, 'Did you notice different sidebars on different pages? With that option i can have right content at right place, I will be gutted if i was forced to display same sidebars on all pages. I must say the small but important things were taken cared of nicely in this theme.', '2017-05-21 09:24:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ambit_region`
--

CREATE TABLE IF NOT EXISTS `ambit_region` (
`ar_id` int(11) NOT NULL,
  `ct_id` int(11) NOT NULL,
  `cn_id` int(11) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_region`
--

INSERT INTO `ambit_region` (`ar_id`, `ct_id`, `cn_id`, `region`) VALUES
(6, 10, 5, 'Parnell'),
(7, 11, 5, 'Devonport');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_registration`
--

CREATE TABLE IF NOT EXISTS `ambit_registration` (
`ar_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `landline` bigint(20) NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `about` text NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0=>Male, 1=> Feamale',
  `dob` date NOT NULL,
  `terms` int(11) NOT NULL,
  `acnt_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_registration`
--

INSERT INTO `ambit_registration` (`ar_id`, `name`, `email`, `password`, `phone`, `landline`, `country`, `city`, `company`, `address`, `image`, `joined_on`, `status`, `about`, `gender`, `dob`, `terms`, `acnt_created`) VALUES
(1, 'Siddhartha Das', 'userdemo@yourmail.com', '8db565fc4a30b682cb31ab78fa4c4008', 7602632777, 334340834, 5, 10, 'Ambit.Co', 'Sonarpur,kamrabad(N), Kol-700150', '14957055892051493124249719profile-avatar.jpg', '2017-05-19 13:39:06', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-02-25 06:25:02'),
(2, 'Subhodip Dey', 's@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 8465238907, 1176593721, 5, 10, 'SS Company', 'Sealdaha, 80/2 S N Road, Kol-700001', '14956267815031477991244389image-14.jpg', '2017-05-24 11:53:01', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-02-18 06:25:02'),
(3, 'Devraj', 'd@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 8554041239, 5679234, 5, 10, 'Techmonastic', 'Barabazar, Kol-700156', '1495704873113149329672997411.jpg', '2017-05-25 09:34:33', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-06-13 05:25:02'),
(4, 'Gopal Das', 'g@gamil.com', 'c4ca4238a0b923820dcc509a6f75849b', 9876237648, 9874321678, 5, 10, 'SRV Creation', 'Pune, Das Colony, PIN-721897', '149570518795514932968286461.jpg', '2017-05-25 09:39:47', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-06-13 05:25:02'),
(5, 'Shib Sankar Das', 's1@gmai.com', 'c4ca4238a0b923820dcc509a6f75849b', 6789351293, 6783459128, 5, 10, 'Indus.co', 'Saltlake, Sec-v, SDF Building, Kol-700134', '14957053242681493296457244.jpg', '2017-05-25 09:42:04', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-06-13 05:25:02'),
(6, 'Partha Ghorai', 'p@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 8923569129, 6540237896, 5, 10, 'Lily Company', 'Behala, Sarsunna,Kol-700123', '1495705509654149329693439213.jpg', '2017-05-25 09:45:09', 1, 'World''s longest rooftop skywalk connecting eight towers with a 1.1 kilometre .Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', 0, '0000-00-00', 0, '2017-06-13 05:25:02');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_terms_services`
--

CREATE TABLE IF NOT EXISTS `ambit_terms_services` (
`id` int(11) NOT NULL,
  `terms` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_terms_services`
--

INSERT INTO `ambit_terms_services` (`id`, `terms`, `date`) VALUES
(5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p> 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p> 							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>', '2016-11-15 09:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `ambit_won_lost`
--

CREATE TABLE IF NOT EXISTS `ambit_won_lost` (
`awl_id` int(11) NOT NULL,
  `db` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `cus_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambit_won_lost`
--

INSERT INTO `ambit_won_lost` (`awl_id`, `db`, `item_id`, `price`, `cus_id`, `date`, `status`) VALUES
(2, 'add_general_items', 27, '310.00', 1, '2017-07-03 21:09:19', 1),
(3, 'add_car_motorcycle', 12, '37.00', 1, '2017-07-04 00:17:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_category`
--

CREATE TABLE IF NOT EXISTS `car_category` (
`cc_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_category`
--

INSERT INTO `car_category` (`cc_id`, `category`, `parent_id`, `status`) VALUES
(1, 'Cars', 0, 1),
(2, 'Motorbikes', 0, 1),
(3, 'Boats & Marine', 0, 1),
(4, 'Car Parts', 0, 1),
(5, 'Aircraft', 0, 1),
(6, 'Buses', 0, 1),
(7, 'House Floats', 0, 1),
(9, 'Motorbikes', 2, 1),
(10, 'Helmets, Clothing', 2, 1),
(11, 'Parts for Sale', 2, 1),
(12, 'Dinghies & rowboats', 3, 1),
(13, 'Jetskis', 3, 1),
(14, 'Marina Berths', 3, 1),
(15, 'Aircraft', 5, 1),
(16, 'Parts', 5, 1),
(17, 'Classics', 9, 1),
(18, 'Cruiser', 9, 1),
(19, 'Dirt Bikes', 9, 1),
(20, 'Boots', 10, 1),
(21, 'Gloves', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `car_cat_extra_field`
--

CREATE TABLE IF NOT EXISTS `car_cat_extra_field` (
`ccef_id` int(11) NOT NULL,
  `cc_id` int(11) NOT NULL,
  `extra_field_type` int(11) NOT NULL COMMENT '1=>dropdown, 2=>checkbox, 3=>textbox, 4=>textarea',
  `label_name` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value_no` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_cat_extra_field`
--

INSERT INTO `car_cat_extra_field` (`ccef_id`, `cc_id`, `extra_field_type`, `label_name`, `field_name`, `value_no`, `value`) VALUES
(2, 10, 1, 'Color', 'color_name', 4, 'Red :: Red || Green :: Green || Black :: Black || Brown :: Brown || Leather :: Leather || Others :: Others'),
(3, 20, 1, 'Material', 'material', 2, 'Leather :: Leather || Others :: Others'),
(4, 1, 1, 'WoF Expires', 'wof_expires', 1, 'dont_know :: Don''t Know'),
(5, 1, 3, 'Number Plate', 'number_plate', 0, ''),
(6, 1, 2, 'Vehicle has an AA Inspection Report', 'inspection_report', 1, 'Yes :: Yes'),
(7, 1, 3, 'Stereo Description', 'stereo_description', 0, ''),
(8, 1, 2, 'Features', 'features', 10, 'ABS Brakes :: ABS Brakes || Air Conditioning :: Air Conditioning || Alarm :: Alarm || Central Locking :: Central Locking || Driver Airbag :: Driver Airbag || Passenger Airbag :: Passenger Airbag || Sunroof :: Sunroof || towbar :: towbar || Alloy wheels :: Alloy wheels || Power Steering :: Power Steering'),
(9, 1, 3, 'Description', 'description', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cus_acnt_blnce`
--

CREATE TABLE IF NOT EXISTS `cus_acnt_blnce` (
`cab_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cus_acnt_blnce`
--

INSERT INTO `cus_acnt_blnce` (`cab_id`, `cus_id`, `balance`, `date`, `status`) VALUES
(1, 1, '159.05', '2017-05-25 09:29:34', 1),
(2, 2, '10.00', '2017-05-25 09:29:40', 1),
(3, 3, '0.00', '2017-05-25 09:34:33', 1),
(4, 4, '0.00', '2017-05-25 09:39:47', 1),
(5, 5, '0.00', '2017-05-25 09:42:04', 1),
(6, 6, '0.00', '2017-05-25 09:45:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_cat_extra_field`
--

CREATE TABLE IF NOT EXISTS `general_cat_extra_field` (
`gcef_id` int(11) NOT NULL,
  `gic_id` int(11) NOT NULL COMMENT 'DB=>general_item_category',
  `extra_field_type` int(11) NOT NULL COMMENT '1=>dropdown, 2=>checkbox, 3=>textbox, 4=>textarea',
  `label_name` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value_no` int(11) NOT NULL,
  `value` text NOT NULL COMMENT 'value :: option'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_cat_extra_field`
--

INSERT INTO `general_cat_extra_field` (`gcef_id`, `gic_id`, `extra_field_type`, `label_name`, `field_name`, `value_no`, `value`) VALUES
(1, 1, 1, 'Camera', 'camera', 2, '12MP ::   12MP   ||   21MP   ::   21MP'),
(2, 12, 3, 'Battery', 'battery', 0, ''),
(4, 1, 2, 'Activities', 'hobbies', 2, 'Cricket  ::    Cricket    ||    Football    ::    Football'),
(5, 3, 4, 'Details', 'dtls', 0, ''),
(9, 13, 1, 'Memory Capacity', 'memory', 2, '32 :: 32 GB || 64 :: 64 GB');

-- --------------------------------------------------------

--
-- Table structure for table `general_item_category`
--

CREATE TABLE IF NOT EXISTS `general_item_category` (
`gic_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_item_category`
--

INSERT INTO `general_item_category` (`gic_id`, `category`, `parent_id`, `status`) VALUES
(1, 'Antiques & collectables', 0, 1),
(2, 'Art', 0, 1),
(3, 'Baby Gear', 0, 1),
(4, 'Books', 0, 1),
(5, 'Computers', 0, 1),
(7, 'components', 5, 1),
(8, 'Laptops', 5, 1),
(11, 'Bags & Carry Cases', 8, 1),
(12, 'Batteries', 8, 1),
(13, 'Memory', 8, 1),
(14, 'Power Adapter', 8, 1),
(15, 'Sports', 0, 1),
(16, 'Basketball', 15, 1),
(17, 'Ball', 16, 1),
(18, 'Hoops', 16, 1),
(19, 'Acer', 12, 1),
(20, 'Apple', 12, 1),
(22, 'Car Seats', 3, 1),
(23, 'Clothing', 3, 1),
(24, 'Comic Books', 4, 1),
(25, 'Fiction', 4, 1),
(26, 'Non-fiction', 4, 1),
(27, 'Drawing', 2, 1),
(28, 'Tattos', 2, 1),
(29, 'Prints', 2, 1),
(30, 'Photographs', 2, 1),
(31, 'Advertising', 1, 1),
(32, 'Coins', 1, 1),
(33, 'Appliances', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE IF NOT EXISTS `job_category` (
`jc_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`jc_id`, `category`, `parent_id`, `status`) VALUES
(1, 'Marketing, Media & Communication', 0, 1),
(2, 'Office Administartion', 0, 1),
(3, 'Retail', 0, 1),
(4, 'Sales', 0, 1),
(5, 'Trade & Services', 0, 1),
(7, 'Advertising', 1, 1),
(8, 'Design', 1, 1),
(9, 'Data Entry', 2, 1),
(10, 'Buying', 3, 1),
(11, 'Management', 3, 1),
(12, 'Engineering', 0, 1),
(13, 'Civil', 12, 1),
(14, 'Electrical', 12, 1),
(15, 'Geo-Technical', 12, 1),
(16, 'Accounting', 0, 1),
(17, 'Accounts Receivable', 16, 1),
(18, 'Management', 16, 1),
(19, 'Payroll', 16, 1),
(20, 'Finance Manager', 16, 1),
(21, 'Accountants', 16, 1),
(22, 'Audit', 21, 1),
(23, 'Tax', 21, 1),
(24, 'Assistant Accountants', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_cat_extra_field`
--

CREATE TABLE IF NOT EXISTS `job_cat_extra_field` (
`jcef_id` int(11) NOT NULL,
  `jc_id` int(11) NOT NULL,
  `extra_field_type` int(11) NOT NULL COMMENT '1=>dropdown, 2=>checkbox, 3=>textbox, 4=>textarea',
  `label_name` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value_no` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_cat_extra_field`
--

INSERT INTO `job_cat_extra_field` (`jcef_id`, `jc_id`, `extra_field_type`, `label_name`, `field_name`, `value_no`, `value`) VALUES
(2, 16, 2, 'Working Experience', 'work_knowledge', 2, '6 Months :: 6 Months || 12 Months :: 1 Year'),
(3, 21, 1, 'If Any Bond ?', 'bond', 2, 'Yes :: Yes || No :: No');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway`
--

CREATE TABLE IF NOT EXISTS `payment_gateway` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pg_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `name`, `pg_id`, `status`) VALUES
(1, 'paypal', 'xyz@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paypal_buy_now`
--

CREATE TABLE IF NOT EXISTS `paypal_buy_now` (
`pbn_id` int(11) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=>pay wrong amount',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_buy_now`
--

INSERT INTO `paypal_buy_now` (`pbn_id`, `txn_id`, `table_name`, `item_id`, `cus_id`, `amount`, `status`, `date`) VALUES
(1, 'fcsdgdf3423', 'add_general_item', 27, 1, '900.00', 1, '2017-05-29 12:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_transaction_table`
--

CREATE TABLE IF NOT EXISTS `paypal_transaction_table` (
`ptt_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `transaction_by` varchar(255) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `amount` decimal(12,2) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=>credit, 2=>debit',
  `for_what` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal_transaction_table`
--

INSERT INTO `paypal_transaction_table` (`ptt_id`, `transaction_id`, `transaction_by`, `cus_id`, `amount`, `type`, `for_what`, `date`) VALUES
(1, '13234234', 'Paypal', 1, '10.00', 1, '', '2017-05-25 11:22:53'),
(2, 'fdtg5345646', 'Paypal', 1, '40.00', 1, '', '2017-05-25 11:23:30'),
(3, 'er455456', 'Paypal', 1, '36.00', 1, '', '2017-05-25 11:23:46'),
(4, 'dfasr4535', 'Paypal', 1, '89.00', 1, '', '2017-05-25 11:23:54'),
(5, 'dfdg456', 'Paypal', 2, '60.00', 1, '', '2017-05-25 11:24:38'),
(6, 'msTJj1495793385', 'Admin', 1, '152.00', 0, 'add_general_items ||29', '2017-05-26 10:09:45'),
(9, 'kX6zq1495798468', 'Admin', 1, '11.00', 0, 'add_property ||17', '2017-05-26 11:34:28'),
(10, 'rxDT81495800069', 'Admin', 1, '10.00', 0, 'add_job ||17', '2017-05-26 12:01:09'),
(11, '28ohQ1495747278', 'Admin', 1, '36.99', 0, 'add_car_motorcycle ||13', '2017-05-25 21:21:18'),
(12, 'PpCT11496044203', 'Admin', 1, '5.00', 0, 'add_car_motorcycle ||12', '2017-05-29 07:50:03'),
(13, 'OiVXt1496044409', 'Admin', 1, '5.00', 0, 'add_car_motorcycle ||12', '2017-05-29 07:53:29'),
(14, '1E2T91496225099', 'Admin', 1, '111.00', 0, 'add_general_items ||30', '2017-05-31 10:04:59'),
(15, 'rKg0T1496228939', 'Admin', 1, '5.00', 0, 'add_general_items ||31', '2017-05-31 11:08:59'),
(16, 'ZCFRv1496229139', 'Admin', 1, '5.00', 0, 'add_general_items ||32', '2017-05-31 11:12:19'),
(17, 'm3Pwv1496229982', 'Admin', 1, '10.00', 0, 'add_general_items ||33', '2017-05-31 11:26:22'),
(18, 'PoUwi1496230631', 'Admin', 1, '116.00', 0, 'add_general_items ||34', '2017-05-31 11:37:11'),
(19, 'hxTuL1496231433', 'Admin', 1, '116.00', 0, 'add_general_items ||35', '2017-05-31 11:50:33'),
(20, 'y2H1k1496231580', 'Admin', 1, '101.00', 0, 'add_general_items ||36', '2017-05-31 11:53:00'),
(21, 'GJVK81496232830', 'Admin', 1, '10.00', 0, 'add_general_items ||38', '2017-05-31 12:13:50'),
(22, 'bO2aU1497424967', 'Admin', 1, '11.99', 0, 'add_car_motorcycle ||14', '2017-06-14 07:22:47'),
(23, 'K4i9f1497425650', 'Admin', 1, '11.99', 0, 'add_car_motorcycle ||15', '2017-06-14 07:34:10'),
(24, 'oHyIe1497425907', 'Admin', 1, '11.99', 0, 'add_car_motorcycle ||16', '2017-06-14 07:38:27'),
(25, '0PlOK1497426192', 'Admin', 1, '9.00', 0, 'add_car_motorcycle ||', '2017-06-14 07:43:12'),
(26, 'hP7Fq1497426376', 'Admin', 1, '11.99', 0, 'add_car_motorcycle ||17', '2017-06-14 07:46:16'),
(27, 'x9MJR1497426424', 'Admin', 1, '9.00', 0, 'add_car_motorcycle ||', '2017-06-14 07:47:04'),
(28, 'pErMq1497426650', 'Admin', 1, '11.99', 0, 'add_car_motorcycle ||18', '2017-06-14 07:50:50'),
(29, 'EkFqe1497426702', 'Admin', 1, '9.00', 0, 'add_car_motorcycle ||18', '2017-06-14 07:51:42'),
(30, '86lDw1497656584', 'Admin', 1, '11.00', 0, 'add_property ||18', '2017-06-16 23:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `property_category`
--

CREATE TABLE IF NOT EXISTS `property_category` (
`pc_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_category`
--

INSERT INTO `property_category` (`pc_id`, `category`, `parent_id`, `status`) VALUES
(1, 'Residential', 0, 1),
(2, 'Rulal', 0, 1),
(3, 'Commercial', 0, 1),
(5, 'For Sale', 3, 1),
(6, 'For Lease', 3, 1),
(7, 'For Sale', 1, 1),
(8, 'For Rent', 1, 1),
(10, 'Appartment', 7, 1),
(11, 'House', 7, 1),
(12, 'Townhouse', 7, 1),
(13, 'Unit', 7, 1),
(14, 'Apartment', 8, 1),
(15, 'Car Park', 8, 1),
(16, 'Townhouse', 8, 1),
(17, 'Development Site', 5, 1),
(18, 'Hotel', 5, 1),
(19, 'Industrial', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_cat_extra_field`
--

CREATE TABLE IF NOT EXISTS `property_cat_extra_field` (
`pcef_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL COMMENT 'DB=>property_category',
  `extra_field_type` int(11) NOT NULL COMMENT '1=>dropdown, 2=>checkbox, 3=>textbox, 4=>textarea',
  `label_name` varchar(255) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `value_no` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_cat_extra_field`
--

INSERT INTO `property_cat_extra_field` (`pcef_id`, `pc_id`, `extra_field_type`, `label_name`, `field_name`, `value_no`, `value`) VALUES
(1, 1, 1, 'Bathroom', 'bathroom', 3, '1  ::  1  ||  2  ::  2  || 4 :: 4'),
(2, 7, 3, 'Area', 'area', 0, ''),
(3, 10, 4, 'Boundary Wall', 'any_boundary_wall', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
`st_id` int(10) NOT NULL,
  `st_field` varchar(100) NOT NULL,
  `st_value` longtext NOT NULL,
  `st_updated_date` date NOT NULL,
  `st_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`st_id`, `st_field`, `st_value`, `st_updated_date`, `st_status`) VALUES
(20, 'currency_sign', 'US$', '2016-11-16', 1),
(22, 'Free Line For You', '0123456789', '2016-12-16', 1),
(19, 'currency', 'USD', '2016-11-16', 1),
(18, 'default_country', '1', '2016-11-16', 1),
(14, 'title', 'Trade Express', '2016-11-16', 1),
(15, 'meta_keyword', 'werfawetfgsert61', '2016-11-16', 1),
(16, 'meta_description', 'wdfawefsert', '2016-11-16', 1),
(17, 'logo', 'logo.png', '2016-11-16', 1),
(23, 'Email Us', ' sales@yourcompany.com', '2016-12-16', 1),
(24, 'Working Hours', '24 * 7', '2016-12-02', 1),
(25, 'site_name', 'MultiVendor.com', '2016-12-04', 1),
(26, 'company_name', 'My Company', '2016-12-20', 1),
(28, 'company_address', '42 avenue des Champs Elyses 75000 Paris Frances', '2016-12-12', 1),
(27, 'company_details', 'Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.Maecenas euismod felis et purus consectetur, quis fermentum velition. Aenean egestas quis turpis vehicula.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. ', '2016-12-29', 1),
(29, 'withdraw_limit', '1000', '2016-12-29', 1),
(30, 'commision', '11||10', '2016-12-29', 1),
(31, 'facebook', 'https://www.facebook.com/', '2016-12-29', 1),
(32, 'twitter', '//www.twitter.com', '2016-12-29', 1),
(33, 'youtube', '//www.youtube.com', '2016-12-29', 1),
(34, 'min_cus_balance', '10', '2017-05-25', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_car_motorcycle`
--
ALTER TABLE `add_car_motorcycle`
 ADD PRIMARY KEY (`acm_id`);

--
-- Indexes for table `add_car_motorcycle_extra_field`
--
ALTER TABLE `add_car_motorcycle_extra_field`
 ADD PRIMARY KEY (`acmef_id`);

--
-- Indexes for table `add_car_motorcycle_listing_features`
--
ALTER TABLE `add_car_motorcycle_listing_features`
 ADD PRIMARY KEY (`acmlf_id`);

--
-- Indexes for table `add_car_motorcycle_photo`
--
ALTER TABLE `add_car_motorcycle_photo`
 ADD PRIMARY KEY (`acmp_id`);

--
-- Indexes for table `add_general_items`
--
ALTER TABLE `add_general_items`
 ADD PRIMARY KEY (`agi_id`);

--
-- Indexes for table `add_general_items_extra_field`
--
ALTER TABLE `add_general_items_extra_field`
 ADD PRIMARY KEY (`agief_id`);

--
-- Indexes for table `add_general_items_photo`
--
ALTER TABLE `add_general_items_photo`
 ADD PRIMARY KEY (`agip_id`);

--
-- Indexes for table `add_job`
--
ALTER TABLE `add_job`
 ADD PRIMARY KEY (`aj_id`);

--
-- Indexes for table `add_job_extra_field`
--
ALTER TABLE `add_job_extra_field`
 ADD PRIMARY KEY (`ajef_id`);

--
-- Indexes for table `add_job_listing_features`
--
ALTER TABLE `add_job_listing_features`
 ADD PRIMARY KEY (`ajlf_id`);

--
-- Indexes for table `add_job_photo`
--
ALTER TABLE `add_job_photo`
 ADD PRIMARY KEY (`ajp_id`);

--
-- Indexes for table `add_job_video`
--
ALTER TABLE `add_job_video`
 ADD PRIMARY KEY (`ajv_id`);

--
-- Indexes for table `add_price_for_classified`
--
ALTER TABLE `add_price_for_classified`
 ADD PRIMARY KEY (`apfc_id`);

--
-- Indexes for table `add_price_for_listing`
--
ALTER TABLE `add_price_for_listing`
 ADD PRIMARY KEY (`apfl_id`);

--
-- Indexes for table `add_property`
--
ALTER TABLE `add_property`
 ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `add_property_contact_dtls`
--
ALTER TABLE `add_property_contact_dtls`
 ADD PRIMARY KEY (`apcd_id`);

--
-- Indexes for table `add_property_extra_field`
--
ALTER TABLE `add_property_extra_field`
 ADD PRIMARY KEY (`apef_id`);

--
-- Indexes for table `add_property_listing_features`
--
ALTER TABLE `add_property_listing_features`
 ADD PRIMARY KEY (`aplf_id`);

--
-- Indexes for table `add_property_photo`
--
ALTER TABLE `add_property_photo`
 ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `add_property_price_dtls`
--
ALTER TABLE `add_property_price_dtls`
 ADD PRIMARY KEY (`appd_id`);

--
-- Indexes for table `add_property_video`
--
ALTER TABLE `add_property_video`
 ADD PRIMARY KEY (`apv_id`);

--
-- Indexes for table `add_to_watch_car`
--
ALTER TABLE `add_to_watch_car`
 ADD PRIMARY KEY (`atwc_id`);

--
-- Indexes for table `add_to_watch_general_item`
--
ALTER TABLE `add_to_watch_general_item`
 ADD PRIMARY KEY (`atwgi_id`);

--
-- Indexes for table `add_to_watch_job`
--
ALTER TABLE `add_to_watch_job`
 ADD PRIMARY KEY (`atwj_id`);

--
-- Indexes for table `add_to_watch_property`
--
ALTER TABLE `add_to_watch_property`
 ADD PRIMARY KEY (`atwp_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_website_link`
--
ALTER TABLE `admin_website_link`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_about`
--
ALTER TABLE `ambit_about`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_car_bid`
--
ALTER TABLE `ambit_car_bid`
 ADD PRIMARY KEY (`acb_id`);

--
-- Indexes for table `ambit_car_review`
--
ALTER TABLE `ambit_car_review`
 ADD PRIMARY KEY (`acr_id`);

--
-- Indexes for table `ambit_city`
--
ALTER TABLE `ambit_city`
 ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `ambit_country`
--
ALTER TABLE `ambit_country`
 ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `ambit_cus_social_media`
--
ALTER TABLE `ambit_cus_social_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_faq`
--
ALTER TABLE `ambit_faq`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_general_item_bid`
--
ALTER TABLE `ambit_general_item_bid`
 ADD PRIMARY KEY (`agib_id`);

--
-- Indexes for table `ambit_general_item_review`
--
ALTER TABLE `ambit_general_item_review`
 ADD PRIMARY KEY (`agir_id`);

--
-- Indexes for table `ambit_job_apply`
--
ALTER TABLE `ambit_job_apply`
 ADD PRIMARY KEY (`aja_id`);

--
-- Indexes for table `ambit_job_review`
--
ALTER TABLE `ambit_job_review`
 ADD PRIMARY KEY (`ajr_id`);

--
-- Indexes for table `ambit_privacy_policy`
--
ALTER TABLE `ambit_privacy_policy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_property_review`
--
ALTER TABLE `ambit_property_review`
 ADD PRIMARY KEY (`apr_id`);

--
-- Indexes for table `ambit_region`
--
ALTER TABLE `ambit_region`
 ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `ambit_registration`
--
ALTER TABLE `ambit_registration`
 ADD PRIMARY KEY (`ar_id`);

--
-- Indexes for table `ambit_terms_services`
--
ALTER TABLE `ambit_terms_services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ambit_won_lost`
--
ALTER TABLE `ambit_won_lost`
 ADD PRIMARY KEY (`awl_id`);

--
-- Indexes for table `car_category`
--
ALTER TABLE `car_category`
 ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `car_cat_extra_field`
--
ALTER TABLE `car_cat_extra_field`
 ADD PRIMARY KEY (`ccef_id`);

--
-- Indexes for table `cus_acnt_blnce`
--
ALTER TABLE `cus_acnt_blnce`
 ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `general_cat_extra_field`
--
ALTER TABLE `general_cat_extra_field`
 ADD PRIMARY KEY (`gcef_id`);

--
-- Indexes for table `general_item_category`
--
ALTER TABLE `general_item_category`
 ADD PRIMARY KEY (`gic_id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
 ADD PRIMARY KEY (`jc_id`);

--
-- Indexes for table `job_cat_extra_field`
--
ALTER TABLE `job_cat_extra_field`
 ADD PRIMARY KEY (`jcef_id`);

--
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal_buy_now`
--
ALTER TABLE `paypal_buy_now`
 ADD PRIMARY KEY (`pbn_id`);

--
-- Indexes for table `paypal_transaction_table`
--
ALTER TABLE `paypal_transaction_table`
 ADD PRIMARY KEY (`ptt_id`);

--
-- Indexes for table `property_category`
--
ALTER TABLE `property_category`
 ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `property_cat_extra_field`
--
ALTER TABLE `property_cat_extra_field`
 ADD PRIMARY KEY (`pcef_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
 ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_car_motorcycle`
--
ALTER TABLE `add_car_motorcycle`
MODIFY `acm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `add_car_motorcycle_extra_field`
--
ALTER TABLE `add_car_motorcycle_extra_field`
MODIFY `acmef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `add_car_motorcycle_listing_features`
--
ALTER TABLE `add_car_motorcycle_listing_features`
MODIFY `acmlf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `add_car_motorcycle_photo`
--
ALTER TABLE `add_car_motorcycle_photo`
MODIFY `acmp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `add_general_items`
--
ALTER TABLE `add_general_items`
MODIFY `agi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `add_general_items_extra_field`
--
ALTER TABLE `add_general_items_extra_field`
MODIFY `agief_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `add_general_items_photo`
--
ALTER TABLE `add_general_items_photo`
MODIFY `agip_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `add_job`
--
ALTER TABLE `add_job`
MODIFY `aj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `add_job_extra_field`
--
ALTER TABLE `add_job_extra_field`
MODIFY `ajef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `add_job_listing_features`
--
ALTER TABLE `add_job_listing_features`
MODIFY `ajlf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `add_job_photo`
--
ALTER TABLE `add_job_photo`
MODIFY `ajp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `add_job_video`
--
ALTER TABLE `add_job_video`
MODIFY `ajv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `add_price_for_classified`
--
ALTER TABLE `add_price_for_classified`
MODIFY `apfc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `add_price_for_listing`
--
ALTER TABLE `add_price_for_listing`
MODIFY `apfl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `add_property`
--
ALTER TABLE `add_property`
MODIFY `ap_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `add_property_contact_dtls`
--
ALTER TABLE `add_property_contact_dtls`
MODIFY `apcd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `add_property_extra_field`
--
ALTER TABLE `add_property_extra_field`
MODIFY `apef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `add_property_listing_features`
--
ALTER TABLE `add_property_listing_features`
MODIFY `aplf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `add_property_photo`
--
ALTER TABLE `add_property_photo`
MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `add_property_price_dtls`
--
ALTER TABLE `add_property_price_dtls`
MODIFY `appd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `add_property_video`
--
ALTER TABLE `add_property_video`
MODIFY `apv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `add_to_watch_car`
--
ALTER TABLE `add_to_watch_car`
MODIFY `atwc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `add_to_watch_general_item`
--
ALTER TABLE `add_to_watch_general_item`
MODIFY `atwgi_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `add_to_watch_job`
--
ALTER TABLE `add_to_watch_job`
MODIFY `atwj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `add_to_watch_property`
--
ALTER TABLE `add_to_watch_property`
MODIFY `atwp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_website_link`
--
ALTER TABLE `admin_website_link`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ambit_about`
--
ALTER TABLE `ambit_about`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ambit_car_bid`
--
ALTER TABLE `ambit_car_bid`
MODIFY `acb_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_car_review`
--
ALTER TABLE `ambit_car_review`
MODIFY `acr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_city`
--
ALTER TABLE `ambit_city`
MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ambit_country`
--
ALTER TABLE `ambit_country`
MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ambit_cus_social_media`
--
ALTER TABLE `ambit_cus_social_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ambit_faq`
--
ALTER TABLE `ambit_faq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ambit_general_item_bid`
--
ALTER TABLE `ambit_general_item_bid`
MODIFY `agib_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_general_item_review`
--
ALTER TABLE `ambit_general_item_review`
MODIFY `agir_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambit_job_apply`
--
ALTER TABLE `ambit_job_apply`
MODIFY `aja_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ambit_job_review`
--
ALTER TABLE `ambit_job_review`
MODIFY `ajr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ambit_privacy_policy`
--
ALTER TABLE `ambit_privacy_policy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ambit_property_review`
--
ALTER TABLE `ambit_property_review`
MODIFY `apr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ambit_region`
--
ALTER TABLE `ambit_region`
MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ambit_registration`
--
ALTER TABLE `ambit_registration`
MODIFY `ar_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ambit_terms_services`
--
ALTER TABLE `ambit_terms_services`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ambit_won_lost`
--
ALTER TABLE `ambit_won_lost`
MODIFY `awl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `car_category`
--
ALTER TABLE `car_category`
MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `car_cat_extra_field`
--
ALTER TABLE `car_cat_extra_field`
MODIFY `ccef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cus_acnt_blnce`
--
ALTER TABLE `cus_acnt_blnce`
MODIFY `cab_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `general_cat_extra_field`
--
ALTER TABLE `general_cat_extra_field`
MODIFY `gcef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `general_item_category`
--
ALTER TABLE `general_item_category`
MODIFY `gic_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
MODIFY `jc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `job_cat_extra_field`
--
ALTER TABLE `job_cat_extra_field`
MODIFY `jcef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paypal_buy_now`
--
ALTER TABLE `paypal_buy_now`
MODIFY `pbn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `paypal_transaction_table`
--
ALTER TABLE `paypal_transaction_table`
MODIFY `ptt_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `property_category`
--
ALTER TABLE `property_category`
MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `property_cat_extra_field`
--
ALTER TABLE `property_cat_extra_field`
MODIFY `pcef_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
MODIFY `st_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
