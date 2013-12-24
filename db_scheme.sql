-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 24, 2013 at 03:47 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `league`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_items`
--

CREATE TABLE `form_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `league_forms_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_1` varchar(100) NOT NULL,
  `team_2` varchar(100) NOT NULL,
  `team_1_won` int(11) DEFAULT NULL,
  `network` varchar(45) DEFAULT NULL,
  `play_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `team_1`, `team_2`, `team_1_won`, `network`, `play_date`) VALUES
(1, 'Colorado State', 'Washington State', NULL, 'ESPN', '2013-12-21 00:00:00'),
(2, 'Fresno State', 'USC', NULL, 'ABC', '2013-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `game_comments`
--

CREATE TABLE `game_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `text` text NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `description` text,
  `creatation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `title`, `description`, `creatation`) VALUES
(1, 'Fall 2013 Friends Bowl', 'This is a league for a group of friends playing across the southeast.', '2013-12-22 21:53:22'),
(2, 'Test League 2', 'This is a play league. I does not matter what you think...', '2013-12-23 19:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `league_admins`
--

CREATE TABLE `league_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leauges_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `league_forms`
--

CREATE TABLE `league_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagues_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `league_games`
--

CREATE TABLE `league_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagues_id` int(11) NOT NULL,
  `games_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `league_games`
--

INSERT INTO `league_games` (`id`, `leagues_id`, `games_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `user_level` int(11) NOT NULL DEFAULT '0',
  `password` varchar(250) NOT NULL,
  `pic_url` varchar(100) DEFAULT NULL,
  `use_gravatar` int(1) NOT NULL DEFAULT '0',
  `gravatar_email` varchar(100) DEFAULT NULL,
  `description` text,
  `twitter` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `google` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `name`, `user_level`, `password`, `pic_url`, `use_gravatar`, `gravatar_email`, `description`, `twitter`, `facebook`, `google`) VALUES
(1, 'weseldridge', 'weseldridge@gmail.com', 'Wesley Eldridge', 5, '4193da08faea237c36c73a9f95647dd6098dcea4', NULL, 1, 'weseldridge@gmail.com', 'I am the creator. Get your act together and win a damn game!', 'weseldridge', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_leagues`
--

CREATE TABLE `user_leagues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `leagues_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
