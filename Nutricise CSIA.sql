-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Modified for Aiven compatibility: primary keys are now defined
-- inline with CREATE TABLE instead of via separate ALTER TABLE
-- statements, since Aiven enforces sql_require_primary_key=ON
-- and doesn't allow it to be turned off, even for admin users.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `All-Breakfast`
--

CREATE TABLE `All-Breakfast` (
  `id` int NOT NULL,
  `food` varchar(55) DEFAULT NULL,
  `food_link` varchar(55) DEFAULT NULL,
  `food_preference` enum('vegetarian','non-vegetarian') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `All-Breakfast`
--

INSERT INTO `All-Breakfast` (`id`, `food`, `food_link`, `food_preference`) VALUES
(1, 'High Protein Besan Pancake/Chilla', '../HTML/Besan.html', 'vegetarian'),
(2, 'Chickpea Salad', '../HTML/Chickpea.html', 'vegetarian'),
(3, 'Paneer Cheese Sandwich', '../HTML/Paneer Sandwich.html', 'vegetarian'),
(4, 'Paneer Cheese Taco', '../HTML/Paneer Taco.html', 'vegetarian'),
(5, 'High Protein Seed Mix', '../HTML/Seed Mix.html', 'vegetarian'),
(6, 'Peanut Butter Toast + Protien Shake', '../HTML/Toast.html', 'vegetarian'),
(7, 'Veg Breakfast Burrito', '../HTML/Veg Burrito.html', 'vegetarian'),
(8, 'Egg Cheese Taco', '../HTML/Taco.html', 'non-vegetarian'),
(9, 'Egg Cheese Sandwich', '../HTML/Sandwich.html', 'non-vegetarian'),
(10, 'Egg Breakfast Burrito', '../HTML/Burrito.html', 'non-vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `All-Lunch-Dinner`
--

CREATE TABLE `All-Lunch-Dinner` (
  `id` int NOT NULL,
  `food` varchar(100) DEFAULT NULL,
  `food_link` varchar(100) DEFAULT NULL,
  `food_preference` enum('vegetarian','non-vegetarian') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `All-Lunch-Dinner`
--

INSERT INTO `All-Lunch-Dinner` (`id`, `food`, `food_link`, `food_preference`) VALUES
(1, 'Pepper Paneer Curry', '../HTML/Paneer Curry.html', 'vegetarian'),
(2, 'Veg Kathi Roll', '../HTML/Paneer Kathi Roll.html', 'vegetarian'),
(3, 'Palak Paneer Keema', '../HTML/Paneer Palak Keema.html', 'vegetarian'),
(4, 'Paneer Shaami Kebab', '../HTML/Veg Shaami Kebab.html', 'vegetarian'),
(5, 'Healthy Soya Chaap Masala', '../HTML/Soya Chaap.html', 'vegetarian'),
(6, 'Kidney Beans and Rice (Rajma Chawal)', '../HTML/Rajma-Chawal.html', 'vegetarian'),
(7, 'Pepper Chicken Curry', '../HTML/Chicken Curry.html', 'non-vegetarian'),
(8, 'Chicken Kathi Roll', '../HTML/Chicken Kathi Roll.html', 'non-vegetarian'),
(9, 'Palak Chicken Keema', '../HTML/Chicken Palak Keema.html', 'non-vegetarian'),
(10, 'Chicken Shami Kebab', '../HTML/Chicken Shami Kebab.html', 'non-vegetarian'),
(11, 'Murgh Ajmeri', '../HTML/Chicken Murgh Ajmeri.html', 'non-vegetarian'),
(12, 'Healthy Chicken Chaap', '../HTML/Chicken Chaap.html', 'non-vegetarian'),
(13, 'Pepe Chingri', '../HTML/Chingri.html', 'non-vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `UserInfo`
--

CREATE TABLE `UserInfo` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `Username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `UserInfo`
--

INSERT INTO `UserInfo` (`username`, `password`) VALUES
('praneelmohanty', 'praneel@123');

-- --------------------------------------------------------

--
-- Table structure for table `UserProfile`
--

CREATE TABLE `UserProfile` (
  `username` varchar(50) NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `bmi` float DEFAULT NULL,
  `food_preference` enum('vegetarian','non-vegetarian') DEFAULT NULL,
  `workout_days` enum('3 Days','5 Days','7 Days') DEFAULT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `UserInfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `UserProfile`
--

INSERT INTO `UserProfile` (`username`, `height`, `weight`, `bmi`, `food_preference`, `workout_days`) VALUES
('praneelmohanty', 1.69, 56, 19.61, 'non-vegetarian', '5 Days');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;