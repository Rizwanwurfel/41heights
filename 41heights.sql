-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2017 at 10:15 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `41heights`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambassador`
--

CREATE TABLE `ambassador` (
  `amb_id` int(11) NOT NULL,
  `amb_name` varchar(50) NOT NULL,
  `amb_email` varchar(50) NOT NULL,
  `amb_phone` varchar(15) NOT NULL,
  `amb_password` varchar(100) NOT NULL,
  `hostelite` int(2) NOT NULL DEFAULT '0',
  `amb_address` text NOT NULL,
  `amb_office` text NOT NULL,
  `amb_image` varchar(300) NOT NULL DEFAULT 'public/images/no_profile.png',
  `amb_approved` int(2) NOT NULL DEFAULT '0',
  `amb_email_verified` int(2) NOT NULL DEFAULT '0',
  `amb_ref_id` varchar(25) NOT NULL,
  `amb_ref_points` int(50) NOT NULL DEFAULT '0',
  `amb_ref_by` varchar(25) DEFAULT NULL,
  `amb_signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fcm_id` int(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambassador`
--

INSERT INTO `ambassador` (`amb_id`, `amb_name`, `amb_email`, `amb_phone`, `amb_password`, `hostelite`, `amb_address`, `amb_office`, `amb_image`, `amb_approved`, `amb_email_verified`, `amb_ref_id`, `amb_ref_points`, `amb_ref_by`, `amb_signup_date`, `fcm_id`) VALUES
(9, 'bilal khans', 'bilal.wurfel@gmail.com', '08988717', '301fa1a42a5ccf979972d5917ca91b5a', 0, 'Islamabad', 'kicsit', 'public/amb/9/144x144.png', 1, 0, '201705051233529', 90, '', '2017-05-05 07:33:52', 5),
(10, 'Muhaamad bilal khan', 'super@gmail.com', '03445154543', 'f35364bc808b079853de5a1e343e7159', 1, 'north spring 41 heights, bahria phase 7 , rawalpnind', 'wurfel', 'public/images/no_profile.png', 0, 0, '2017050810303310', 0, '', '2017-05-08 05:30:33', NULL),
(17, 'Muhaamad bilal khan', 'khanss@gmail.com', '03445154543', '5ccbdd4fd268695ef07b17560db82dd4', 1, 'north spring 41 heights, bahria phase 7 , rawalpnind', 'wurfel', 'public/images/no_profile.png', 0, 0, '2017051009331417', 0, '201705051233529', '2017-05-10 04:33:14', NULL),
(18, 'Muhaamad bilal khan', 'bilal.wurfelss@gmail.com', '03445154543', '5ccbdd4fd268695ef07b17560db82dd4', 1, 'north spring 41 heights, bahria phase 7 , rawalpnind', 'wurfel', 'public/images/no_profile.png', 0, 0, '2017051010053618', 0, '', '2017-05-10 05:05:36', NULL),
(19, 'Muhaamad bilal khan', 'bilal.wurfelssd@gmail.com', '03445154543', '5ccbdd4fd268695ef07b17560db82dd4', 1, 'north spring 41 heights, bahria phase 7 , rawalpnind', 'wurfel', 'public/images/no_profile.png', 0, 0, '2017051010054819', 0, '201705051233529', '2017-05-10 05:05:48', NULL),
(20, 'bilal', 'bilal.wurfels@gmail.com', '09009099', '5ccbdd4fd268695ef07b17560db82dd4', 0, 'adfdsdasd', 'adasdas', 'public/images/no_profile.png', 1, 0, '2017051611254720', 0, '', '2017-05-16 06:25:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ambassador_order`
--

CREATE TABLE `ambassador_order` (
  `amb_or_id` int(11) NOT NULL,
  `amb_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `points_used` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `att_category`
--

CREATE TABLE `att_category` (
  `att_cat_id` int(11) NOT NULL,
  `att_cat_name` varchar(30) NOT NULL,
  `att_cat_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `att_cat_deleted` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_category`
--

INSERT INTO `att_category` (`att_cat_id`, `att_cat_name`, `att_cat_added`, `att_cat_deleted`) VALUES
(1, 'pizza spice', '2017-02-24 06:14:59', 0),
(2, 'burger spice', '2017-03-09 05:32:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `att_name`
--

CREATE TABLE `att_name` (
  `att_name_id` int(11) NOT NULL,
  `att_name` varchar(30) NOT NULL,
  `att_cat_id` int(11) NOT NULL,
  `att_selection` varchar(10) NOT NULL DEFAULT 'single',
  `att_name_deleted` int(10) NOT NULL DEFAULT '0',
  `att_name_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_name`
--

INSERT INTO `att_name` (`att_name_id`, `att_name`, `att_cat_id`, `att_selection`, `att_name_deleted`, `att_name_added`) VALUES
(23, 'size', 1, 'single', 0, '2017-04-13 04:59:08'),
(24, 'flavour', 1, 'single', 0, '2017-04-13 05:14:16'),
(25, 'chilly', 1, 'single', 0, '2017-04-13 05:16:48'),
(26, 'vegies', 1, 'multi', 0, '2017-04-13 05:21:47'),
(27, 'pizza type', 1, 'single', 0, '2017-04-13 05:23:54'),
(28, 'extra meat', 1, 'single', 0, '2017-04-13 05:34:17'),
(29, 'extra cheese', 1, 'single', 0, '2017-04-13 05:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `att_values`
--

CREATE TABLE `att_values` (
  `att_value_id` int(11) NOT NULL,
  `att_value` varchar(40) NOT NULL,
  `att_value_price` int(100) NOT NULL,
  `att_value_image` varchar(200) NOT NULL,
  `att_value_afimage` varchar(300) DEFAULT NULL,
  `att_value_webimage` varchar(300) DEFAULT NULL,
  `att_value_selected` int(5) NOT NULL DEFAULT '0',
  `att_value_desc` varchar(200) NOT NULL,
  `att_name_id` int(11) NOT NULL,
  `att_value_deleted` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_values`
--

INSERT INTO `att_values` (`att_value_id`, `att_value`, `att_value_price`, `att_value_image`, `att_value_afimage`, `att_value_webimage`, `att_value_selected`, `att_value_desc`, `att_name_id`, `att_value_deleted`) VALUES
(39, '7', 250, 'public/products/attributes/size/1704491617311.png', 'public/products/attributes/size/17044916312.png', 'public/products/attributes/size/170420174916313_2_6_1.png', 1, 'Small', 23, 0),
(40, '9', 750, 'public/products/attributes/size/170459131708200x200.png', 'public/products/attributes/size/1704591308Large-Cheese.png', 'public/products/attributes/size/17045920171308200x200.png', 0, 'Medium', 23, 0),
(41, '12', 1000, 'public/products/attributes/size/170459131708200x200.png', 'public/products/attributes/size/1704591308Medium-Cheese.png', 'public/products/attributes/size/17045920171308Large-Cheese.png', 0, 'Large', 23, 0),
(42, '15', 1450, 'public/products/attributes/size/170459131708200x200.png', 'public/products/attributes/size/1704591308Large-Cheese.png', 'public/products/attributes/size/17045920171308200x200.png', 0, 'X-large', 23, 0),
(43, 'Margherita', 0, 'public/products/attributes/flavour/170514131716BBQ-2.png', 'public/products/attributes/flavour/1705141316BBQ-1.png', 'public/products/attributes/flavour/17051420171316BBQ-2.png', 1, 'margherita flavour', 24, 0),
(44, 'Chicken Tikka', 0, 'public/products/attributes/flavour/170514131716Beef-2.png', 'public/products/attributes/flavour/1705141316Beef.png', 'public/products/attributes/flavour/17051420171316Beef-2.png', 0, 'chicken tikka description', 24, 0),
(45, 'Chicken Malai Boti ', 0, 'public/products/attributes/flavour/170514131716Large-Beef-2.png', 'public/products/attributes/flavour/1705141316Large-Beef.png', 'public/products/attributes/flavour/17051420171316Large-Beef-2.png', 0, 'chicken malai boti', 24, 0),
(46, 'Hot Shot', 0, 'public/products/attributes/flavour/170514131716Jalapenos-2.png', 'public/products/attributes/flavour/1705141316Jalapenos.png', 'public/products/attributes/flavour/17051420171316Jalapenos-2.png', 0, 'hot shot flavour', 24, 0),
(47, 'American Pizza', 0, 'public/products/attributes/flavour/170514131716200x200.png', 'public/products/attributes/flavour/1705141316Medium-Cheese.png', 'public/products/attributes/flavour/17051420171316200x200.png', 0, 'american pizza flavour', 24, 0),
(48, 'Tandoori Pizza', 0, 'public/products/attributes/flavour/170514131716Tomato-2.png', 'public/products/attributes/flavour/1705141316Tomato.png', 'public/products/attributes/flavour/17051420171316Tomato-2.png', 0, 'tandoori pizza flavour', 24, 0),
(49, 'BBQ Pizza', 0, 'public/products/attributes/flavour/170514131716BBQ-2.png', 'public/products/attributes/flavour/1705141316BBQ-1.png', 'public/images/general_cat.png', 0, 'BBQ pizza flavour', 24, 0),
(50, 'Mild', 0, 'public/products/attributes/Chilly/170516131748Jalapenos-2.png', 'public/products/attributes/Chilly/1705161348Jalapenos.png', 'public/products/attributes/Chilly/17051620171348Jalapenos-2.png', 1, 'Mild chillness', 25, 0),
(51, 'Hot', 0, 'public/products/attributes/Chilly/170516131748Olive-2.png', 'public/products/attributes/Chilly/1705161348Olive.png', 'public/products/attributes/Chilly/17051620171348Olive-2.png', 0, 'hot chillness', 25, 0),
(52, 'Extra Hot', 0, 'public/products/attributes/Chilly/170516131748Vegi-2.png', 'public/products/attributes/Chilly/1705161348vegi-1.png', 'public/products/attributes/Chilly/17051620171348Vegi-2.png', 0, 'extra hot chillness', 25, 0),
(53, 'Onion', 0, 'public/products/attributes/Vegies/170521131747Onion-2.png', 'public/products/attributes/Vegies/1705211347Onion.png', 'public/products/attributes/Vegies/17052120171347Onion.png', 1, 'Onion vegie', 26, 0),
(54, 'Mushroom', 0, 'public/products/attributes/Vegies/170521131747Olive-2.png', 'public/products/attributes/Vegies/1705211347Mushroom.png', 'public/products/attributes/Vegies/17052120171347Olive-2.png', 1, 'mushroom vegie', 26, 0),
(55, 'Capsicum', 0, 'public/products/attributes/Vegies/170521131747Capsicum-2.png', 'public/products/attributes/Vegies/1705211347Capsicum.png', 'public/products/attributes/Vegies/17052120171347Capsicum-2.png', 1, 'capsicum vegie', 26, 0),
(56, 'Black olive', 0, 'public/products/attributes/Vegies/170521131747Olive-2.png', 'public/products/attributes/Vegies/1705211347Olive.png', 'public/products/attributes/Vegies/17052120171347Olive-2.png', 1, 'black olive vegie', 26, 0),
(57, 'Tomato', 0, 'public/products/attributes/Vegies/170521131747Tomato-2.png', 'public/products/attributes/Vegies/1705211347Tomato.png', 'public/products/attributes/Vegies/17052120171347Tomato-2.png', 1, 'tomato vegie', 26, 0),
(58, 'Thin', 0, 'public/products/attributes/Pizza_Type/170523131754Small-Beef-2.png', 'public/products/attributes/Pizza_Type/1705231354Small-Beef.png', 'public/products/attributes/Pizza_Type/17052320171354Small-Beef-2.png', 1, 'thin pizza type', 27, 0),
(59, 'Thick', 0, 'public/products/attributes/Pizza_Type/170523131754Beef-2.png', 'public/products/attributes/Pizza_Type/1705231354Beef.png', 'public/products/attributes/Pizza_Type/17052320171354Beef-2.png', 0, 'thick pizza type', 27, 0),
(60, 'None', 0, 'public/products/attributes/Extra_meat/170534131717200x200.png', 'public/products/attributes/Extra_meat/1705341317Large-Cheese.png', 'public/products/attributes/Extra_meat/17053420171317200x200.png', 1, 'None', 28, 0),
(61, 'Small', 50, 'public/products/attributes/Extra_meat/170534131717Small-Beef-2.png', 'public/products/attributes/Extra_meat/1705341317Small-Beef.png', 'public/products/attributes/Extra_meat/17053420171317Small-Beef-2.png', 0, 'small extra meat', 28, 0),
(62, 'Medium', 100, 'public/products/attributes/Extra_meat/170534131717Medium-Beef-2.png', 'public/products/attributes/Extra_meat/1705341317Medium-Beef.png', 'public/products/attributes/Extra_meat/17053420171317Medium-Beef-2.png', 0, 'medium extra meat', 28, 0),
(63, 'Large', 150, 'public/products/attributes/Extra_meat/170534131717Large-Beef-2.png', 'public/products/attributes/Extra_meat/1705341317Large-Beef.png', 'public/products/attributes/Extra_meat/17053420171317Large-Beef-2.png', 0, 'large extra meat', 28, 0),
(64, 'X-Large', 200, 'public/products/attributes/Extra_meat/170534131717Large-Beef-2.png', 'public/products/attributes/Extra_meat/1705341317Large-Beef.png', 'public/products/attributes/Extra_meat/17053420171317Large-Beef-2.png', 0, 'xlarge extra meat', 28, 0),
(65, 'None', 0, 'public/products/attributes/Extra_Chees/170537131735200x200.png', 'public/products/attributes/Extra_Chees/1705371335Beef.png', 'public/products/attributes/Extra_Chees/17053720171335200x200.png', 1, 'None', 29, 0),
(66, 'Small', 50, 'public/products/attributes/Extra_Chees/170537131735Small-Cheese-2.png', 'public/products/attributes/Extra_Chees/1705371335Small-Cheese.png', 'public/products/attributes/Extra_Chees/17053720171335Small-Cheese-2.png', 0, 'small extra chees', 29, 0),
(67, 'Medium', 100, 'public/products/attributes/Extra_Chees/170537131735Medium-Cheese-2.png', 'public/products/attributes/Extra_Chees/1705371335Medium-Cheese.png', 'public/products/attributes/Extra_Chees/17053720171335Medium-Cheese-2.png', 0, 'medium extra cheese', 29, 0),
(68, 'Large', 150, 'public/products/attributes/Extra_Chees/170537131735Large-cheese-2.png', 'public/products/attributes/Extra_Chees/1705371335Large-Cheese.png', 'public/products/attributes/Extra_Chees/17053720171335Large-cheese-2.png', 0, 'large extra cheese', 29, 0),
(69, 'X-Large', 200, 'public/products/attributes/Extra_Chees/170537131735Large-cheese-2.png', 'public/products/attributes/Extra_Chees/1705371335Large-Cheese.png', 'public/products/attributes/Extra_Chees/17053720171335Large-cheese-2.png', 0, 'xlarge extra cheese', 29, 0),
(70, 'moderate', 0, 'public/products/attributes/pizza_type/171006061706big.png', 'public/products/attributes/pizza_type/1710060606bigafc.png', 'public/products/attributes/pizza_type/17102017070605bigafc.png', 0, 'moderate', 27, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` varchar(500) NOT NULL,
  `cat_image` varchar(300) NOT NULL,
  `cat_icon` varchar(300) DEFAULT NULL,
  `cat_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_visibility` int(2) NOT NULL DEFAULT '1',
  `cat_deleted` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_desc`, `cat_image`, `cat_icon`, `cat_added`, `cat_visibility`, `cat_deleted`) VALUES
(28, 'pizza', 'descrition', 'public/products/categories/pizza/17054350_Pizza.png', 'public/products/categories/pizza/17054350_1.png', '2016-11-23 07:10:09', 1, 0),
(29, 'burger', 'burger', 'public/products/categories/burger/17045311_Chicken-Burger.png', 'public/products/categories/burger/17043225_Burger.png', '2016-11-23 07:10:26', 1, 0),
(30, 'shawarma', 'shwarma', 'public/products/categories/shawarma/17045334_Chicken-Cheese-Shawarma.png', 'public/products/categories/shawarma/17043240_Shwarma.png', '2016-11-23 07:10:48', 1, 0),
(31, 'sidelines', 'sidelines', 'public/products/categories/sidelines/17045358_wings.png', 'public/products/categories/sidelines/17043250_Side_Lines.png', '2016-11-23 07:11:08', 1, 0),
(32, 'drinks', 'drink description', 'public/products/categories/drinks/17045421_2.png', 'public/products/categories/drinks/17045029_regular_water.png', '2016-12-28 10:19:13', 1, 0),
(34, 'Roll Paratha', 'small desc', 'public/products/categories/Roll_Paratha/17045443_Zinger-Roll-Paratha.png', 'public/products/categories/Roll_Paratha/17043323_Roll_paratha.png', '2017-03-24 11:58:44', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `cop_id` int(11) NOT NULL,
  `cop_code` varchar(100) NOT NULL,
  `cop_discount` int(11) NOT NULL,
  `cop_valid` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`cop_id`, `cop_code`, `cop_discount`, `cop_valid`) VALUES
(17, 'WeFurfel123', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `deal_id` int(11) NOT NULL,
  `deal_name` varchar(50) DEFAULT NULL,
  `deal_price` int(10) DEFAULT NULL,
  `deal_image` varchar(300) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `deal_top` int(11) NOT NULL DEFAULT '0',
  `deal_for` int(11) NOT NULL DEFAULT '0' COMMENT 'o for public and 1 for ambassador ',
  `att_cat_id` int(10) DEFAULT NULL,
  `main_pr_qty` int(5) DEFAULT '1',
  `drink_qty` int(5) DEFAULT '0',
  `deal_added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deal_deleted` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`deal_id`, `deal_name`, `deal_price`, `deal_image`, `cat_id`, `deal_top`, `deal_for`, `att_cat_id`, `main_pr_qty`, `drink_qty`, `deal_added`, `deal_deleted`) VALUES
(10, 'Deal1', 390, 'public/products/Deals/28/170413060126Deal1.png', 28, 0, 0, 1, 1, 1, '2017-04-13 06:01:26', 0),
(11, 'Deal 2', 800, 'public/products/Deals/28/170413060214Deal1.png', 28, 0, 0, 1, 1, 2, '2017-04-13 06:02:14', 0),
(12, 'Deal 3', 1150, 'public/products/Deals/28/170413060421Deal1.png', 28, 0, 0, 1, 1, 1, '2017-04-13 06:04:21', 0),
(13, 'Deal 4', 1600, 'public/products/Deals/28/170413060530Deal1.png', 28, 0, 0, 1, 1, 1, '2017-04-13 06:05:30', 0),
(14, 'Deal 5', 500, 'public/products/Deals/28/170413060723Deal1.png', 28, 0, 0, 1, 1, 1, '2017-04-13 06:07:23', 0),
(15, 'Deal 6', 2100, 'public/products/Deals/28/170413060825Deal1.png', 28, 0, 1, 1, 2, 1, '2017-04-13 06:08:25', 0),
(16, 'Deal 7', 3100, 'public/products/Deals/28/170413060935Deal1.png', 28, 0, 0, 1, 2, 2, '2017-04-13 06:09:35', 0),
(17, 'Deal 1 ', 300, 'public/products/Deals/29/170413061145deal.png', 29, 0, 0, 0, 1, 1, '2017-04-13 06:11:45', 0),
(18, 'Deal 2', 430, 'public/products/Deals/29/170413061230deal.png', 29, 0, 1, 1, 1, 1, '2017-04-13 06:12:30', 0),
(19, 'Deal 3', 350, 'public/products/Deals/29/170413061339deal.png', 29, 0, 0, 0, 1, 1, '2017-04-13 06:13:39', 0),
(20, 'Deal 4', 650, 'public/products/Deals/29/170413061435deal.png', 29, 0, 1, 0, 2, 2, '2017-04-13 06:14:35', 0),
(21, 'Deal 5', 900, 'public/products/Deals/29/170413061525deal.png', 29, 0, 0, 0, 4, 4, '2017-04-13 06:15:25', 0),
(22, 'happy deal', 1141, 'public/products/Deals/28/170504124413deal_1.png', 28, 1, 1, 1, 1, 1, '2017-05-04 12:44:13', 0),
(23, 'ramzan amb deal', 400, 'public/products/Deals/29/1705301010061.png', 29, 1, 1, 0, 1, 1, '2017-05-30 10:10:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deals_products`
--

CREATE TABLE `deals_products` (
  `deal_pr_id` int(11) NOT NULL,
  `deal_pr_name` varchar(200) DEFAULT NULL,
  `deal_pr_qty` int(4) DEFAULT NULL,
  `deal_id` int(10) NOT NULL,
  `deal_pr_deleted` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals_products`
--

INSERT INTO `deals_products` (`deal_pr_id`, `deal_pr_name`, `deal_pr_qty`, `deal_id`, `deal_pr_deleted`) VALUES
(1, '7 inches pizza', NULL, 2, 0),
(2, '2 garlic brea or cheese bread or potato ', NULL, 2, 0),
(3, 'fries', NULL, 2, 0),
(4, 'pizza medium', NULL, 3, 0),
(5, '2 drinks', NULL, 3, 0),
(6, 'large pizza', NULL, 4, 0),
(7, '1.5 litre drink', NULL, 4, 0),
(8, '8 garlic breads', NULL, 4, 0),
(9, 'zinger burger', NULL, 5, 0),
(10, 'fries', NULL, 5, 0),
(11, 'drink', NULL, 5, 0),
(12, 'beef burger ', NULL, 6, 0),
(13, 'fries', NULL, 6, 0),
(14, 'drinks', NULL, 6, 0),
(15, 'zinger roll paratha', NULL, 7, 0),
(16, 'fries', NULL, 7, 0),
(17, '1 drink', NULL, 7, 0),
(18, 'bbq roll paratha', NULL, 8, 0),
(19, '8 garlic breads', NULL, 8, 0),
(20, 'fries', NULL, 8, 0),
(21, 'large pizza', NULL, 9, 0),
(22, 'fries', NULL, 9, 0),
(23, 'drink', NULL, 9, 0),
(24, 'pizza(small)', NULL, 10, 0),
(25, 'Drink', NULL, 10, 0),
(26, '2 Garlic bread/Wings', NULL, 10, 0),
(27, 'pizza medium', NULL, 11, 0),
(28, 'drinks', NULL, 11, 0),
(29, 'pizza large', NULL, 12, 0),
(30, '1.5 ltr drink', NULL, 12, 0),
(31, '8 Garlicbread/wings', NULL, 12, 0),
(32, 'Pizza X-Large', NULL, 13, 0),
(33, '1.5 ltr drink', NULL, 13, 0),
(34, 'fries', NULL, 13, 0),
(35, 'Pizza small', NULL, 14, 0),
(36, 'Drink', NULL, 14, 0),
(37, 'Roll', NULL, 14, 0),
(38, 'Fries', NULL, 14, 0),
(39, '2 pizza large', NULL, 15, 0),
(40, '1.5 ltr drink', NULL, 15, 0),
(41, '8 wings', NULL, 15, 0),
(42, '2 pizza (X-Large)', NULL, 16, 0),
(43, '2 (1.5 ltr) drink', NULL, 16, 0),
(44, '8 wings', NULL, 16, 0),
(45, 'Zinger Burger', NULL, 17, 0),
(46, 'Fries', NULL, 17, 0),
(47, 'Drinks', NULL, 17, 0),
(48, 'Beef Burger', NULL, 18, 0),
(49, 'Fries', NULL, 18, 0),
(50, 'Drink', NULL, 18, 0),
(51, 'Chicken Burger', NULL, 19, 0),
(52, 'Drink', NULL, 19, 0),
(53, '2 garlic bread/wings', NULL, 19, 0),
(54, '2 Zinger Burger', NULL, 20, 0),
(55, '2 Drinks', NULL, 20, 0),
(56, '4 Wings', NULL, 20, 0),
(57, '4 Zinger burger', NULL, 21, 0),
(58, '4 Drinks', NULL, 21, 0),
(59, 'x large pizza', NULL, 22, 0),
(60, '1.5 ltr drink', NULL, 22, 0),
(61, 'burger cheese', NULL, 23, 0),
(62, 'fries', NULL, 23, 0),
(63, 'dates', NULL, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_locations`
--

CREATE TABLE `delivery_locations` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(200) NOT NULL,
  `loc_charges` int(100) NOT NULL DEFAULT '0',
  `min_order` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_locations`
--

INSERT INTO `delivery_locations` (`loc_id`, `loc_name`, `loc_charges`, `min_order`) VALUES
(11, 'Adayala Road Charges 50 Min Order 500', 50, 500),
(34, 'Askari Villas Charges 50 Min Order 500', 50, 500),
(35, 'Aslam Shaheed Road Charges 50 Min Order 500', 50, 500),
(40, 'Bahria Garden City Min Order 250', 0, 250),
(41, 'Bahria Safari Apt Min Order 250', 0, 250),
(42, 'Bahria Safari Villas Min Order 250', 0, 250),
(50, 'Bahria Phase 8 Charges 50 Min Order 500', 50, 500),
(62, 'Chaklala Charges 50 Min Order 500', 50, 500),
(63, 'Chaklala Cantt Charges 50 Min Order 500', 50, 500),
(64, 'Chaklala Scheme 1 Charges 50 Min Order 500', 50, 500),
(66, 'Chaklala Scheme 2 Charges 50 Min Order 500', 50, 500),
(67, 'Chaklala Scheme 3 Charges 50 Min Order 500', 50, 500),
(68, 'Chaklala Scheme 4 Charges 50 Min Order 500', 50, 500),
(76, 'Defense Villas Min Order 250', 0, 250),
(77, 'DHA Phase 1 Min Order 250', 0, 250),
(78, 'DHA Phase 2 Min Order 250', 0, 250),
(80, 'Dheri Hasnabad Charges 50 Min Order 500', 50, 500),
(89, 'Falcon Complex Charges 50 Min Order 500', 50, 500),
(90, 'Fauji Foundation Min Order 250', 0, 250),
(94, 'Gulistan Colony Charges 50 Min Order 500', 50, 500),
(95, 'Gulrez Min Order 250', 0, 250),
(102, 'Jan Colony Charges 50 Min Order 500', 50, 500),
(103, 'Jhanda Chichi Charges 50 Min Order 500', 50, 500),
(104, 'Judicial Colony Charges 50 Min Order 500', 50, 500),
(108, 'Korang Town Min order 250', 0, 250),
(111, 'Lalazar Charges 50 Min Order 500', 50, 500),
(116, 'Media Town Min Order 250', 0, 250),
(119, 'Model Town Humak Charges 50 min Order 500', 50, 500),
(121, 'Morgah Charges 50 Min Order 500', 50, 500),
(127, 'Naval Anchorage Charges 50 Min Order 500', 50, 500),
(129, 'New Lalazar Charges 50 Min Order 500', 50, 500),
(131, 'PAF Colony Charges 50 Min Order 500', 50, 500),
(132, 'Pakistan Town Min Order 250', 0, 250),
(142, 'Police Foundation Min Order 250', 0, 250),
(143, 'PWD Housing Society Min Order 250', 0, 250),
(144, 'Rabia Banglows Charges 50 Min Order 500', 0, 500),
(151, 'Safari 1 Min Order 250', 0, 250),
(152, 'Safari 2 Min Order 250', 0, 250),
(153, 'Safari 3 Min Order 250', 0, 250),
(154, 'Safari Villas Min Order 250', 0, 250),
(156, 'Scheme 1 Charges 50 Min Order 500', 50, 500),
(157, 'Scheme 3 Charges 50 Min Order 500', 50, 500),
(162, 'Soan Gardens Charges 50 Min Order 500', 50, 500),
(167, 'Lal Kurti Charges 50 Min Order 500', 50, 500),
(168, 'Askari 1-14 Charges 50 Min Order 500', 50, 500),
(169, 'Bahria Phase 1-7 Min Order 250', 0, 250);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `dis_id` int(11) NOT NULL,
  `discount` int(100) NOT NULL DEFAULT '0',
  `ref_discount` int(11) NOT NULL DEFAULT '0',
  `ref_points_products` int(11) NOT NULL DEFAULT '0' COMMENT 'refference points to ambassador on products when customer place refferral order',
  `ref_points_deals` int(11) NOT NULL DEFAULT '0' COMMENT 'refference points to ambassador on deals when customer place refferral order'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`dis_id`, `discount`, `ref_discount`, `ref_points_products`, `ref_points_deals`) VALUES
(1, 2, 5, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `fcm_tokens`
--

CREATE TABLE `fcm_tokens` (
  `fcm_id` int(11) NOT NULL,
  `fcm_token` varchar(500) NOT NULL,
  `fcm_added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcm_tokens`
--

INSERT INTO `fcm_tokens` (`fcm_id`, `fcm_token`, `fcm_added_at`) VALUES
(3, 'bilalkhan', '2017-04-06 12:54:00'),
(4, 'khan1', '2017-05-10 05:55:03'),
(5, 'asdsadsad', '2017-05-10 06:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fb_id` int(11) NOT NULL,
  `fb_name` varchar(50) DEFAULT NULL,
  `fb_phone` varchar(20) DEFAULT NULL,
  `fb_star` int(5) DEFAULT NULL,
  `fb_text` text NOT NULL,
  `fb_type` varchar(10) DEFAULT NULL,
  `order_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fb_id`, `fb_name`, `fb_phone`, `fb_star`, `fb_text`, `fb_type`, `order_id`) VALUES
(4, NULL, NULL, 5, '///////////////deleting feedback from admin portal////////// 	public function delete_feedback() 	{', NULL, 64);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(100) NOT NULL,
  `gallery_image` varchar(500) NOT NULL,
  `gallery_text` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_image`, `gallery_text`) VALUES
(44, 'public/gallery_images/170811095641_seeking.png', 'yess'),
(45, 'public/gallery_images/170811095713_smile-male.png', 'wrong'),
(46, 'public/gallery_images/170811101332_tauheed.png', 'great'),
(40, 'public/gallery_images/170811062530_smile-mug.png', 'text1'),
(41, 'public/gallery_images/170811062931_smile-female.png', '55555'),
(42, 'public/gallery_images/170811080031_smile-male.png', 'lk'),
(43, 'public/gallery_images/170811095232_ramazankareem.png', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `fcm_id` int(11) NOT NULL DEFAULT '0',
  `order_no` varchar(50) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_address` text,
  `user_area` varchar(100) DEFAULT NULL,
  `total_bill` int(10) DEFAULT NULL,
  `discounted_bill` int(20) DEFAULT NULL,
  `service_charges` int(10) DEFAULT NULL,
  `order_note` text,
  `error_bill` int(5) NOT NULL DEFAULT '0',
  `total_items` int(10) DEFAULT NULL,
  `order_status` varchar(20) DEFAULT 'pending',
  `order_confirmed` int(10) NOT NULL DEFAULT '0',
  `order_deleted` int(10) NOT NULL DEFAULT '0',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_notify` int(10) NOT NULL DEFAULT '0',
  `alerted` int(10) NOT NULL DEFAULT '0',
  `seen_detail` int(10) NOT NULL DEFAULT '0',
  `referred_by` varchar(20) DEFAULT NULL,
  `source` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `fcm_id`, `order_no`, `user_name`, `user_email`, `user_phone`, `user_address`, `user_area`, `total_bill`, `discounted_bill`, `service_charges`, `order_note`, `error_bill`, `total_items`, `order_status`, `order_confirmed`, `order_deleted`, `order_date`, `order_notify`, `alerted`, `seen_detail`, `referred_by`, `source`) VALUES
(64, 0, '', 'bilal khan', 'super@gmail.com', '0344565657', 'complete address', 'Adayala Road Charges 50 Min Order 500', 2380, 1384, 50, NULL, 0, 9, 'pending', 0, 0, '2017-04-19 06:28:55', 1, 1, 1, NULL, NULL),
(65, 0, '', 'bilal', 'SUPER@GMAIL.COM', '090090909', 'complete address', 'Adayala Road Charges 50 Min Order 500', 3950, 400, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 12:47:50', 1, 1, 1, NULL, NULL),
(66, 0, '', 'bilal', 'SUPER@GMAIL.COM', '090090900', 'complete address', 'Adayala Road Charges 50 Min Order 500', 7050, 400, 50, NULL, 0, 5, 'pending', 0, 0, '2017-04-21 12:55:03', 1, 1, 1, NULL, NULL),
(67, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'cladsdada', 'Adayala Road Charges 50 Min Order 500', 3950, 400, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 13:00:51', 1, 1, 1, NULL, NULL),
(68, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'complate addess', 'Adayala Road Charges 50 Min Order 500', 3950, 3500, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 13:06:02', 1, 1, 1, NULL, NULL),
(69, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'complete address', 'Adayala Road Charges 50 Min Order 500', 3950, 3500, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 13:11:12', 1, 1, 1, NULL, NULL),
(70, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'complete address', 'Adayala Road Charges 50 Min Order 500', 3950, 3500, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 13:12:19', 1, 1, 1, NULL, NULL),
(71, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'complete address', 'Adayala Road Charges 50 Min Order 500', 3950, 3500, 50, NULL, 0, 4, 'pending', 0, 0, '2017-04-21 13:20:24', 1, 1, 1, NULL, NULL),
(72, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0909099', 'complete address', 'Adayala Road Charges 50 Min Order 500', 500, 400, 50, NULL, 0, 2, 'pending', 0, 0, '2017-04-21 13:28:39', 1, 1, 1, NULL, NULL),
(73, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'com[ladsdas', 'Adayala Road Charges 50 Min Order 500', 500, 0, 50, NULL, 0, 2, 'pending', 0, 0, '2017-04-21 14:07:50', 1, 1, 1, NULL, NULL),
(74, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'comlete address', 'Adayala Road Charges 50 Min Order 500', 1920, 1898, 50, NULL, 0, 3, 'pending', 0, 0, '2017-04-21 14:51:07', 1, 1, 1, NULL, NULL),
(76, 0, '', 'wurfel test', 'super@gmail.com', '0900090', 'completea drrr', 'Adayala Road Charges 50 Min Order 500', 500, 450, 50, NULL, 0, 2, 'pending', 0, 0, '2017-04-28 07:51:33', 1, 1, 1, NULL, 'web'),
(77, 0, '', 'bilal', 'bilal.wurfel@gmail.com', '0909090', 'complete address', 'Adayala Road Charges 50 Min Order 500', 500, 450, 50, 'order note testing from site', 0, 2, 'pending', 0, 0, '2017-05-04 05:18:19', 1, 1, 1, NULL, 'web'),
(78, 0, '', 'bilal', 'super@gmail.com', '0900090', 'complete adress', 'Adayala Road Charges 50 Min Order 500', 500, 450, 50, 'cart should be destroy', 0, 2, 'pending', 0, 0, '2017-05-04 05:21:49', 1, 1, 1, NULL, 'web'),
(79, 0, '', 'bilal', 'SUPER@GMAIL.COM', '0900090', 'address', 'Adayala Road Charges 50 Min Order 500', 3100, 3100, 50, 'no comment', 0, 1, 'pending', 0, 0, '2017-05-04 05:39:50', 1, 1, 1, NULL, 'web'),
(80, 0, '', 'wurfel test', '', '0900090', 'adress', 'Adayala Road Charges 50 Min Order 500', 3100, 3100, 50, '', 0, 1, 'pending', 0, 0, '2017-05-04 05:59:13', 1, 1, 1, NULL, 'web'),
(81, 0, '', 'bilal', '', '0900090', 'kmkmk', 'Adayala Road Charges 50 Min Order 500', 6200, 6200, 50, '', 0, 2, 'pending', 0, 0, '2017-05-04 06:02:58', 1, 1, 1, NULL, 'web'),
(82, 0, '', 'bilal', 'bilal.wurfel@gmail.com', '034489898', '\'~~11``,@#$%^&*(//\\\'\\\'<html><script>alert("khanss");\r\n</script>\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';<asd`~1`~!!~!222././`>\'\r\n<>', 'Adayala Road Charges 50 Min Order 500', 1500, 1350, 50, '~!@~~!@~!@~!@~~!!@1211```1;;\'ds;\'\'`1;2;122\'1;\'', 0, 6, 'pending', 0, 0, '2017-05-16 05:06:36', 1, 1, 1, NULL, 'web'),
(83, 0, '', '\'bilal\'', '\'bilal.wurfel@gmail.com\'', '\'099909090\'', '\'~~11``,@#$%^&*(//\\\'\\\'<html><script>alert("bk");\r\n</script>\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';<asd`~1`~!!~!222././`>\'\r\n<>', 'Adayala Road Charges 50 Min Order 500', 1000, 900, 50, '\'`1~!~@!@~@~!@``1111@2\r\n<html><script>alert("onote");</script></html>\'', 0, 4, 'pending', 0, 0, '2017-05-16 05:20:13', 1, 1, 1, NULL, 'web'),
(84, 0, '', '\'bilal khan\'', '\'bilal.wurfel@gmail.com\'', '\'090090909\'', '\'\\\'~~11``,@#$%^&*(//\\\\\\\'\\\\\\\'<html><script>alert(\\"khanads\\");\\r\\n</script>\\\\\\\'\\\\\\\'::\\\\\\"\\\\\\"||\\\\\\"}{}!~~!!~@!````11212\\\\\\\'\\\\\\\'\\\\\\\\\\\\\\\\\\\\\\\'\\\\\\\';;;\\\\\\\';<asd`~1`~!!~!222././`>\\\'\\r\\n<>\'', 'Adayala Road Charges 50 Min Order 500', 1250, 1125, 50, '\'\\\'~~11``,@#$%^&*(//\\\\\\\'\\\\\\\'<html><script>alert(\\"khans34s\\");\\r\\n</script>\\\\\\\'\\\\\\\'::\\\\\\"\\\\\\"||\\\\\\"}{}!~~!!~@!````11212\\\\\\\'\\\\\\\'\\\\\\\\\\\\\\\\\\\\\\\'\\\\\\\';;;\\\\\\\';<asd`~1`~!!~!222././`>\\\'\\r\\n<>\'', 0, 5, 'pending', 0, 0, '2017-05-16 05:39:45', 1, 1, 1, NULL, 'web'),
(85, 0, '', '\'bilal khan\'', '\'bilal.wurfel@gmail.com\'', '\'09009029\'', '\'~~11``,@#$%^&*(//\\\'\\\'<html><script>alert("khanssaa");\r\n</script>\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';<asd`~1`~!!~!222././`>\'\r\n<>', 'Adayala Road Charges 50 Min Order 500', 1250, 1125, 50, '\'sadsad\'', 0, 5, 'pending', 0, 0, '2017-05-16 05:42:23', 1, 1, 1, NULL, 'web'),
(86, 0, '', 'bilal', '\'bilalzaijk@yahoo.com\'', '\'038898989\'', '\'~~11``,@#$%^&*(//\\\'\\\'&lt;html&gt;[removed]alert&#40;"xss check"&#41;;\r\n[removed]\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';<asd>\'\r\n<>', 'Adayala Road Charges 50 Min Order 500', 1250, 1125, 50, '\'~~11``,@#$%^&*(//\\\'\\\'&lt;html&gt;[removed]alert&#40;"kois"&#41;;\r\n[removed]\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';<asd>\'\r\n<>', 0, 5, 'pending', 0, 0, '2017-05-16 05:50:24', 1, 1, 1, NULL, 'web'),
(87, 0, '', 'bilal', 'bilal.wurfel@gmail.com', '08990909', '\'~~11``,@#$%^&*(//\\\'\\\'&lt;html&gt;[removed]alert&#40;"checked"&#41;;\r\n[removed]\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';\'\r\n', 'Adayala Road Charges 50 Min Order 500', 1250, 1125, 50, '\'~~11``,@#$%^&*(//\\\'\\\'&lt;html&gt;[removed]alert&#40;"khanssaa"&#41;;\r\n[removed]\\\'\\\'::\\"\\"||\\"}{}!~~!!~@!````11212\\\'\\\'\\\\\\\\\\\'\\\';;;\\\';\'\r\n', 0, 5, 'pending', 0, 0, '2017-05-16 06:00:58', 1, 1, 1, '2013782u192', 'web'),
(88, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '034454655676', 'ok address', 'Adayala Road Charges 50 Min Order 500', 1500, 1350, 50, 'order', 0, 6, 'pending', 0, 0, '2017-05-18 07:13:57', 1, 1, 1, NULL, 'web'),
(89, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '034454655676', 'ok address', 'Adayala Road Charges 50 Min Order 500', 1500, 1350, 50, 'order', 0, 6, 'pending', 0, 0, '2017-05-18 07:13:59', 1, 1, 1, NULL, 'web'),
(90, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '034454655676', 'ok address', 'Adayala Road Charges 50 Min Order 500', 8000, 8000, 50, 'order', 0, 5, 'pending', 0, 0, '2017-05-18 07:17:14', 1, 1, 1, '201705051233529', 'web'),
(91, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '034454655676', 'ok address', 'Adayala Road Charges 50 Min Order 500', 8000, 8000, 50, 'order', 0, 5, 'pending', 0, 0, '2017-05-18 07:23:00', 1, 1, 1, '201705051233529', 'web'),
(92, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '034454655676', 'ok address', 'Adayala Road Charges 50 Min Order 500', 1250, 1125, 50, 'order', 0, 5, 'pending', 0, 0, '2017-05-18 10:09:34', 1, 1, 1, '201705051233529', 'web'),
(93, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'complete adress', 'Adayala Road Charges 50 Min Order 500', 880, 836, 50, 'order now', 0, 4, 'pending', 0, 0, '2017-05-18 10:11:53', 1, 1, 1, '201705051233529', 'web'),
(94, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '0233456563', 'complete address', 'Adayala Road Charges 50 Min Order 500', 800, 760, 50, 'ordewr notea', 0, 4, 'pending', 0, 0, '2017-05-18 10:28:09', 1, 1, 1, '201705051233529', 'web'),
(95, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'complete address', 'Adayala Road Charges 50 Min Order 500', 800, 760, 50, 'order note', 0, 4, 'pending', 0, 0, '2017-05-18 10:30:52', 1, 1, 1, '201705051233529', 'web'),
(96, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '08990909', 'complete addreess', 'Adayala Road Charges 50 Min Order 500', 600, 570, 50, 'order note', 0, 2, 'pending', 0, 0, '2017-05-18 10:32:04', 1, 1, 1, '201705051233529', 'web'),
(97, 0, '', 'test', 'bilal.wurfel@gmail.com', '0322121230', 'COMPLETE ADDRESS', 'Adayala Road Charges 50 Min Order 500', 660, 627, 50, 'ORDER NOTE', 0, 3, 'pending', 0, 0, '2017-05-18 11:10:18', 1, 1, 1, '201705051233529', 'web'),
(98, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'cgcggcg  gy gvygt', 'Adayala Road Charges 50 Min Order 500', 560, 560, 50, 'kmkmlkmlkmlk', 0, 14, 'pending', 0, 0, '2017-05-18 11:11:20', 1, 1, 1, '201705051233529', 'web'),
(99, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'n hj nh jnjn  jnjn jn', 'Adayala Road Charges 50 Min Order 500', 250, 250, 50, 'order note', 0, 5, 'pending', 0, 0, '2017-05-18 11:12:50', 1, 1, 1, '201705051233529', 'web'),
(100, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'jnjn j jnjnj j', 'Adayala Road Charges 50 Min Order 500', 1400, 1400, 50, 'order note', 0, 4, 'pending', 0, 0, '2017-05-18 11:13:45', 1, 1, 1, '201705051233529', 'web'),
(101, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'vookok jikjj iijij', 'Adayala Road Charges 50 Min Order 500', 1400, 0, 50, 'jnnjn jnijn', 0, 4, 'pending', 0, 0, '2017-05-18 11:15:08', 1, 1, 1, '', 'web'),
(102, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'complrtef asfdsfef', 'Adayala Road Charges 50 Min Order 500', 750, 713, 50, 'ordernote', 0, 5, 'pending', 0, 0, '2017-05-18 11:33:53', 1, 1, 1, '201705051233529', 'web'),
(103, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'aDSASDASD', 'Adayala Road Charges 50 Min Order 500', 1500, 1425, 50, ' SADSDASD', 0, 6, 'pending', 0, 0, '2017-05-18 11:35:54', 1, 1, 1, '201705051233529', 'web'),
(104, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'KNKANSDKN', 'Adayala Road Charges 50 Min Order 500', 1250, 1250, 50, 'SADMSADLA\r\n', 0, 5, 'pending', 0, 0, '2017-05-18 11:37:44', 1, 1, 1, '201705051233529', 'web'),
(105, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'COMPLET ADDRESS', 'Adayala Road Charges 50 Min Order 500', 1250, 0, 50, 'ORDE RNOTE', 0, 5, 'pending', 0, 0, '2017-05-18 11:39:03', 1, 1, 1, '', 'web'),
(106, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '0990909', 'ksadnfkasfd', 'Adayala Road Charges 50 Min Order 500', 1941, 1941, 50, 'sdfsds', 0, 2, 'pending', 0, 0, '2017-05-31 07:29:15', 1, 1, 1, '', 'web'),
(107, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'ssdssdsd', 'Adayala Road Charges 50 Min Order 500', 250, 245, 50, '', 0, 1, 'pending', 0, 0, '2017-06-23 12:04:06', 1, 1, 1, '', 'web'),
(108, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'bilal', 'Adayala Road Charges 50 Min Order 500', 750, 735, 50, 'no note', 0, 3, 'pending', 0, 0, '2017-06-23 12:35:01', 1, 1, 1, '', 'web'),
(109, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'sdsadasd', 'Adayala Road Charges 50 Min Order 500', 1000, 980, 50, '', 0, 4, 'pending', 0, 0, '2017-06-23 12:38:36', 1, 1, 1, '', 'web'),
(110, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'sdsdsds', 'Adayala Road Charges 50 Min Order 500', 750, 675, 50, '', 0, 3, 'pending', 0, 0, '2017-06-23 12:43:25', 1, 1, 1, '', 'web'),
(111, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'sdsdsds', 'Adayala Road Charges 50 Min Order 500', 750, 675, 50, '', 0, 3, 'pending', 0, 0, '2017-06-23 12:43:26', 1, 1, 1, '', 'web'),
(112, 0, '', 'wurfel test', 'bilal.wurfel@gmail.com', '09009029', 'adasdsad', 'Adayala Road Charges 50 Min Order 500', 1000, 900, 50, 'asdsada', 0, 4, 'pending', 0, 0, '2017-06-23 12:46:44', 1, 1, 1, '', 'web'),
(113, 0, '', 'bilal khan', 'bilal.wurfel@gmail.com', '09009029', 'adsadsad', 'Adayala Road Charges 50 Min Order 500', 750, 675, 50, '', 0, 3, 'pending', 0, 0, '2017-06-23 12:48:04', 1, 1, 1, '', 'web');

-- --------------------------------------------------------

--
-- Table structure for table `order_description`
--

CREATE TABLE `order_description` (
  `order_desc_id` int(11) NOT NULL,
  `item_type` varchar(40) DEFAULT NULL,
  `item_id` int(10) NOT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `item_image` varchar(255) DEFAULT NULL,
  `item_ind_price` int(50) DEFAULT NULL,
  `order_id` int(100) NOT NULL,
  `item_total_price` int(50) DEFAULT NULL,
  `item_qty` int(10) DEFAULT NULL,
  `item_attribute` text,
  `order_desc_deleted` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_description`
--

INSERT INTO `order_description` (`order_desc_id`, `item_type`, `item_id`, `item_name`, `item_image`, `item_ind_price`, `order_id`, `item_total_price`, `item_qty`, `item_attribute`, `order_desc_deleted`) VALUES
(145, 'sidelines', 18, 'Nuggets', 'public/products/products/31/Nuggest.png', 200, 64, 200, 1, '{"pizza":[],"drink":[]}', 0),
(146, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 750, 64, 750, 1, '{"pizza":[{"size":"Medium"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(147, 'burger', 11, 'zinger burger', 'public/products/products/29/zinger.png', 220, 64, 440, 2, '{"pizza":[],"drink":[]}', 0),
(148, 'drinks', 16, '1.5', 'public/products/products/32/250ml.png', 100, 64, 100, 1, '{"pizza":[],"drink":[]}', 0),
(149, 'drinks', 19, 'Water(regular)', 'public/products/products/32/water-Regular.png', 40, 64, 40, 1, '{"pizza":[],"drink":[]}', 0),
(150, 'burger', 20, 'Deal 4', 'public/products/Deals/29/170413061435deal.png', 650, 64, 650, 1, '{"pizza":[],"drink":[{"drink":["sprite","coca cola"]}]}', 0),
(151, 'drinks', 16, '1.5', 'public/products/products/32/250ml.png', 100, 64, 100, 1, '{"pizza":[],"drink":[{"drink":"sprite"}]}', 0),
(152, 'drinks', 16, '1.5', 'public/products/products/32/250ml.png', 100, 64, 100, 1, '{"pizza":[],"drink":[{"drink":"fanta"}]}', 0),
(153, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 65, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(154, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 65, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(155, 'burger', 16, 'Deal 7', 'public/products/Deals/29/170413061339deal.png', 3100, 65, 3100, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"}],"drink":[]}', 0),
(156, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 66, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(157, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 66, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(158, 'burger', 16, 'Deal 7', 'public/products/Deals/29/170413061339deal.png', 3100, 66, 3100, 1, '{"pizza":[{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[]}', 0),
(159, 'burger', 16, 'Deal 7', 'public/products/Deals/29/170413061339deal.png', 3100, 66, 3100, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[]}', 0),
(160, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 67, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(161, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 67, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(162, 'burger', 16, 'Deal 7', 'public/products/Deals/29/170413061339deal.png', 3100, 67, 3100, 1, '{"pizza":[{"1":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}},{"2":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}}],"drink":[{"drink":["Dew","Dew"]}]}', 0),
(163, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 68, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(164, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 68, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(165, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 68, 3100, 1, '{"pizza":[{"1":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}},{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"2":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[{"drink":["Dew","Dew"]}]}', 0),
(166, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 69, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(167, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 69, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(168, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 69, 3100, 1, '{"pizza":[{"1":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}},{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"2":{"flavour":"Margherita","chilly":"Mild","vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"],"pizza_type":"Thin","extra_meat":"None","extra_cheese":"None"}},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[{"drink":["Dew","Dew"]}]}', 0),
(169, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 70, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(170, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 70, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(171, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 70, 3100, 1, '{"pizza":[{"1":"---------------------------"},{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"2":"---------------------------"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[{"drink":"---------------------------"}]}', 0),
(172, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 71, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(173, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 71, 350, 1, '{"pizza":[],"drink":[{"drink":["sprite"]}]}', 0),
(174, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 71, 3100, 1, '{"pizza":[{"1":"---------------------------"},{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"2":"---------------------------"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[{"drink":"---------------------------"}]}', 0),
(175, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 72, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(176, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 73, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(177, 'pizza', 13, 'Deal 4', 'public/products/Deals/28/170413060530Deal1.png', 1600, 74, 1600, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"0drink":"Dew"}],"drink":[]}', 0),
(178, 'Roll Paratha', 21, 'BBQ Roll Paratha', 'public/products/products/34/170413055731chicken_sharam.png', 220, 74, 220, 1, '{"pizza":[],"drink":[]}', 0),
(179, 'drinks', 16, '1.5', 'public/products/products/32/250ml.png', 100, 74, 100, 1, '{"pizza":[],"drink":[{"drink":"coca cola"}]}', 0),
(180, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 76, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(181, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 77, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(182, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 78, 500, 2, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(183, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 79, 3100, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"},{"0drink":"Dew"},{"1drink":"coca cola"}],"drink":[]}', 0),
(184, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 80, 3100, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"}],"drink":[]}', 0),
(185, 'pizza', 16, 'Deal 7', 'public/products/Deals/28/170413060935Deal1.png', 3100, 81, 6200, 2, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"flavour2":"Margherita"},{"chilly2":"Mild"},{"vegies2":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type2":"Thin"},{"extra_meat2":"None"},{"extra_cheese2":"None"}],"drink":[]}', 0),
(186, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 82, 1500, 6, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(187, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 83, 1000, 4, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(188, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 84, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(189, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 85, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(190, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 86, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(191, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 87, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(192, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 88, 1500, 6, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(193, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 89, 1500, 6, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(194, 'pizza', 13, 'Deal 4', 'public/products/Deals/28/170413060530Deal1.png', 1600, 90, 8000, 5, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"0drink":"coca cola"}],"drink":[]}', 0),
(195, 'pizza', 13, 'Deal 4', 'public/products/Deals/28/170413060530Deal1.png', 1600, 91, 8000, 5, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"0drink":"coca cola"}],"drink":[]}', 0),
(196, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 92, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(197, 'Roll Paratha', 21, 'BBQ Roll Paratha', 'public/products/products/34/170516045817-ice-cream-containers-.jpg', 220, 93, 880, 4, '{"pizza":[],"drink":[]}', 0),
(198, 'sidelines', 18, 'Nuggets', 'public/products/products/31/Nuggest.png', 200, 94, 800, 4, '{"pizza":[],"drink":[]}', 0),
(199, 'sidelines', 18, 'Nuggets', 'public/products/products/31/Nuggest.png', 200, 95, 800, 4, '{"pizza":[],"drink":[]}', 0),
(200, 'burger', 1, 'beef burger', 'public/products/products/29/beef.png', 300, 96, 600, 2, '{"pizza":[],"drink":[]}', 0),
(201, 'Roll Paratha', 15, 'zinger roll paratha', 'public/products/products/34/Zinger-Roll-Paratha.png', 220, 97, 660, 3, '{"pizza":[],"drink":[]}', 0),
(202, 'drinks', 19, 'Water(regular)', 'public/products/products/32/water-Regular.png', 40, 98, 560, 14, '{"pizza":[],"drink":[]}', 0),
(203, 'drinks', 10, 'Regular', 'public/products/products/32/coke-regular.png', 50, 99, 250, 5, '{"pizza":[],"drink":[{"drink":"coca cola"}]}', 0),
(204, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 100, 1400, 4, '{"pizza":[],"drink":[{"drink":["fanta"]}]}', 0),
(205, 'burger', 19, 'Deal 3', 'public/products/Deals/29/170413061339deal.png', 350, 101, 1400, 4, '{"pizza":[],"drink":[{"drink":["fanta"]}]}', 0),
(206, 'sidelines', 17, 'Fries', 'public/products/products/31/fries.png', 150, 102, 750, 5, '{"pizza":[],"drink":[]}', 0),
(207, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 103, 1500, 6, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(208, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 104, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(209, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 105, 1250, 5, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(210, 'pizza', 22, 'happy deal', 'public/products/Deals/28/170504124413deal_1.png', 1141, 106, 1141, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"0drink":"coca cola"}],"drink":[]}', 0),
(211, 'pizza', 11, 'Deal 2', 'public/products/Deals/28/170413060214Deal1.png', 800, 106, 800, 1, '{"pizza":[{"flavour1":"Margherita"},{"chilly1":"Mild"},{"vegies1":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type1":"Thin"},{"extra_meat1":"None"},{"extra_cheese1":"None"},{"0drink":"Dew"},{"1drink":"Dew"}],"drink":[]}', 0),
(212, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 107, 250, 1, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(213, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 108, 750, 3, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(214, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 109, 1000, 4, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(215, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 110, 750, 3, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(216, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 111, 750, 3, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(217, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 112, 1000, 4, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0),
(218, 'pizza', 14, 'pizza', 'public/products/products/28/170324025921pizzabg2.jpg', 250, 113, 750, 3, '{"pizza":[{"size":"Small"},{"flavour":"Margherita"},{"chilly":"Mild"},{"vegies":["Onion","Mushroom","Capsicum","Black olive","Tomato"]},{"pizza_type":"Thin"},{"extra_meat":"None"},{"extra_cheese":"None"}],"drink":[]}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pr_id` int(11) NOT NULL,
  `pr_name` varchar(50) DEFAULT NULL,
  `pr_note` varchar(100) DEFAULT NULL,
  `pr_price` int(10) DEFAULT NULL,
  `pr_image` varchar(255) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `att_cat_id` int(10) DEFAULT NULL,
  `pr_deleted` int(10) NOT NULL DEFAULT '0',
  `pr_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pr_id`, `pr_name`, `pr_note`, `pr_price`, `pr_image`, `cat_id`, `att_cat_id`, `pr_deleted`, `pr_added`) VALUES
(1, 'beef burger', 'small desc of beef', 300, 'public/products/products/29/beef.png', 29, 0, 0, '2017-03-16 10:04:29'),
(3, 'grilled', 'smal desc', 100, 'public/products/products/29/1703161008122.png', 29, 0, 1, '2017-03-16 10:08:12'),
(6, 'chicken burger', 'chicken burger small desc', 200, 'public/products/products/29/chicken.png', 29, 0, 0, '2017-03-17 06:39:28'),
(8, 'chicken  cheese shawarma', 'chick shawarma desc', 220, 'public/products/products/30/Chicken-Cheese-Shawarma.png', 30, 0, 0, '2017-03-17 11:34:03'),
(9, 'wings 6 pcs', 'desc', 250, 'public/products/products/31/Chicken-wings.png', 31, 0, 0, '2017-03-17 11:38:49'),
(10, 'Regular', 'small description', 50, 'public/products/products/32/coke-regular.png', 32, 0, 0, '2017-03-17 11:40:15'),
(11, 'zinger burger', 'small desc', 220, 'public/products/products/29/zinger.png', 29, 0, 0, '2017-03-22 06:47:49'),
(12, 'new burger', 'kdkfnkjs', 200, 'public/products/products/28/170322014902canada.png', 29, 0, 1, '2017-03-22 06:49:02'),
(13, 'chicken shawarma', 'chicken shawarma small desc', 220, 'public/products/products/30/Chicken-shawarma.png', 30, 0, 0, '2017-03-22 06:50:05'),
(14, 'pizza', 'pizza small', 0, 'public/products/products/28/170324025921pizzabg2.jpg', 28, 1, 0, '2017-03-24 07:59:22'),
(15, 'zinger roll paratha', 'smalldesc', 220, 'public/products/products/34/Zinger-Roll-Paratha.png', 34, 0, 0, '2017-03-31 05:43:08'),
(16, '1.5', '1.5 ltr drink', 100, 'public/products/products/32/250ml.png', 32, 0, 0, '2017-03-31 06:34:49'),
(17, 'Fries', 'fries is in side lines', 150, 'public/products/products/31/fries.png', 31, 0, 0, '2017-04-13 05:42:20'),
(18, 'Nuggets', 'nuggets sideline', 200, 'public/products/products/31/Nuggest.png', 31, 0, 0, '2017-04-13 05:42:48'),
(19, 'Water(regular)', 'water regular drink', 40, 'public/products/products/32/water-Regular.png', 32, 0, 0, '2017-04-13 05:49:16'),
(20, 'water', 'water', 80, 'public/products/products/32/170516045807-ice-cream-containers-.jpg', 32, 0, 0, '2017-04-13 05:50:40'),
(21, 'BBQ Roll Paratha', 'bbq roll paratha', 220, 'public/products/products/34/170516045817-ice-cream-containers-.jpg', 34, 0, 0, '2017-04-13 05:57:31');

-- --------------------------------------------------------

--
-- Table structure for table `rest_timing`
--

CREATE TABLE `rest_timing` (
  `time_d` int(11) NOT NULL,
  `emergency_status` varchar(10) NOT NULL DEFAULT 'open',
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rest_timing`
--

INSERT INTO `rest_timing` (`time_d`, `emergency_status`, `opening_time`, `closing_time`) VALUES
(1, 'open', '11:30:00', '04:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(100) NOT NULL,
  `slider_order` int(20) NOT NULL,
  `slider_image` varchar(500) NOT NULL,
  `slider_text` varchar(100) NOT NULL,
  `slider_disabled` int(5) NOT NULL DEFAULT '0',
  `slider_platform` int(10) NOT NULL COMMENT '1 for web, 0 for android'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_order`, `slider_image`, `slider_text`, `slider_disabled`, `slider_platform`) VALUES
(1, 1, 'public/slider/1/170803112955_slider1.jpg', 'faisal mosque', 0, 0),
(2, 2, 'public/slider/2/bilal_14.jpg', '14 august', 1, 0),
(4, 3, 'public/slider/4/170803113101_slider2.jpg', 'viewa islamabad', 0, 0),
(5, 4, 'public/slider/5/170803113130_slider3.jpg', 'nice view', 0, 0),
(6, 5, 'public/slider/6/170810061708_3.jpg', 'slider', 1, 0),
(7, 7, 'public/wslider/w1.png', 'a', 1, 1),
(8, 8, 'public/slider/8/170803094723_baby.jpg', 'b', 1, 1),
(9, 9, 'public/slider/9/170803094440_w1.png', 'c', 0, 1),
(10, 10, 'public/slider/10/170810060604_1.png', 'fvrhn', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `email` varchar(25) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`email`, `ID`) VALUES
('rizwan.wurfel@gmail.com', 1),
('rizwanshaukat94@gmail.com', 2),
('hiw@gmail.com', 3),
('rizwan94@gmail.com', 4),
('asdasd@asda.com', 5),
('asdasd@sfasd.com', 6),
('rizwan9asdasdas4@gmail.co', 7),
('rizwan9asdasdas4@gmail.co', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `user_address` varchar(1000) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_role` int(10) NOT NULL,
  `user_verified` bit(1) NOT NULL DEFAULT b'0',
  `user_suspended` bit(1) NOT NULL DEFAULT b'0',
  `user_deleted` bit(1) NOT NULL DEFAULT b'0',
  `user_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_address`, `user_phone`, `user_role`, `user_verified`, `user_suspended`, `user_deleted`, `user_created`) VALUES
(12, 'Bilal khans', 'rizwan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'public/uploads/bilal@gmail.com/23_02_17_04_55_09_deal.png', 'jinnah garden islamabad', '03331529878', 1, b'1', b'0', b'0', '2016-12-09 07:32:52'),
(16, 'ali ahmed', 'ali@gmail.com', 'dbcff85b4ad32c7ee6e56b33f9c687e6', '', '', '', 2, b'1', b'0', b'0', '2016-12-21 16:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role_name` varchar(30) NOT NULL,
  `user_role_deleted` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role_name`, `user_role_deleted`) VALUES
(1, 'super_admin', 0),
(2, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `waiter_call`
--

CREATE TABLE `waiter_call` (
  `wc_id` int(11) NOT NULL,
  `call_status` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiter_call`
--

INSERT INTO `waiter_call` (`wc_id`, `call_status`) VALUES
(1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassador`
--
ALTER TABLE `ambassador`
  ADD PRIMARY KEY (`amb_id`);

--
-- Indexes for table `ambassador_order`
--
ALTER TABLE `ambassador_order`
  ADD PRIMARY KEY (`amb_or_id`);

--
-- Indexes for table `att_category`
--
ALTER TABLE `att_category`
  ADD PRIMARY KEY (`att_cat_id`);

--
-- Indexes for table `att_name`
--
ALTER TABLE `att_name`
  ADD PRIMARY KEY (`att_name_id`),
  ADD KEY `att_cat_id_fk` (`att_cat_id`);

--
-- Indexes for table `att_values`
--
ALTER TABLE `att_values`
  ADD PRIMARY KEY (`att_value_id`),
  ADD KEY `att_name_id_fk` (`att_name_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`cop_id`),
  ADD UNIQUE KEY `cop_code` (`cop_code`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `deals_products`
--
ALTER TABLE `deals_products`
  ADD PRIMARY KEY (`deal_pr_id`);

--
-- Indexes for table `delivery_locations`
--
ALTER TABLE `delivery_locations`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `fcm_tokens`
--
ALTER TABLE `fcm_tokens`
  ADD PRIMARY KEY (`fcm_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_description`
--
ALTER TABLE `order_description`
  ADD PRIMARY KEY (`order_desc_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `rest_timing`
--
ALTER TABLE `rest_timing`
  ADD PRIMARY KEY (`time_d`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `waiter_call`
--
ALTER TABLE `waiter_call`
  ADD PRIMARY KEY (`wc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassador`
--
ALTER TABLE `ambassador`
  MODIFY `amb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `ambassador_order`
--
ALTER TABLE `ambassador_order`
  MODIFY `amb_or_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `att_category`
--
ALTER TABLE `att_category`
  MODIFY `att_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `att_name`
--
ALTER TABLE `att_name`
  MODIFY `att_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `att_values`
--
ALTER TABLE `att_values`
  MODIFY `att_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `cop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `deals_products`
--
ALTER TABLE `deals_products`
  MODIFY `deal_pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `delivery_locations`
--
ALTER TABLE `delivery_locations`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;
--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fcm_tokens`
--
ALTER TABLE `fcm_tokens`
  MODIFY `fcm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `order_description`
--
ALTER TABLE `order_description`
  MODIFY `order_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `rest_timing`
--
ALTER TABLE `rest_timing`
  MODIFY `time_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `waiter_call`
--
ALTER TABLE `waiter_call`
  MODIFY `wc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `att_name`
--
ALTER TABLE `att_name`
  ADD CONSTRAINT `att_cat_id_fk` FOREIGN KEY (`att_cat_id`) REFERENCES `att_category` (`att_cat_id`);

--
-- Constraints for table `att_values`
--
ALTER TABLE `att_values`
  ADD CONSTRAINT `att_name_id_fk` FOREIGN KEY (`att_name_id`) REFERENCES `att_name` (`att_name_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
