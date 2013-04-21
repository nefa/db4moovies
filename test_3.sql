-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 08:34 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `type_category` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type_category`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Animation'),
(4, 'Commedy'),
(5, 'Drama'),
(6, 'Horror'),
(7, 'S.F.'),
(8, 'Thriller'),
(9, 'Violence'),
(10, 'XXX'),
(11, 'Family'),
(12, 'Documentary'),
(13, 'Crime');

-- --------------------------------------------------------

--
-- Table structure for table `merge1`
--

CREATE TABLE IF NOT EXISTS `merge1` (
  `categories_movies_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  PRIMARY KEY (`categories_movies_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `merge1`
--

INSERT INTO `merge1` (`categories_movies_id`, `category_id`, `movie_id`) VALUES
(18, 1, 32),
(19, 7, 32),
(20, 1, 34),
(21, 2, 34),
(22, 13, 36),
(23, 5, 36),
(24, 3, 39),
(25, 4, 39),
(26, 13, 39),
(27, 12, 39),
(44, 7, 40),
(43, 6, 40),
(42, 11, 40),
(41, 2, 40),
(32, 7, 41),
(33, 8, 41),
(34, 9, 41),
(35, 10, 41),
(36, 3, 42),
(37, 3, 42);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `synopsis` text NOT NULL,
  `image_name` varchar(225) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `synopsis`, `image_name`, `user_id`) VALUES
(32, ' Prometheus ', 'Prequel to ''Alien 1979''', NULL, 1),
(37, ' exxxorcism ', '', NULL, 2),
(34, ' Iron Man 3 ', 'This time there''s a darker twist to our friendly superhero....', NULL, 2),
(36, ' Taxi Driver ', 'A night time taxi driver with a taste for violence and the righteousness of an ex war vet.', NULL, 1),
(40, ' bzzlla ', 'bubulation shi a luat bmw', '1989mbwm5.JPG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`) VALUES
(1, 'nefa', 'pass'),
(2, 'gaby', 'otherpass');
