-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2013 at 06:16 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `genre` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `year` int(3) NOT NULL,
  `runtime` int(3) DEFAULT NULL,
  `director` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `poster` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `plot` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `year`, `runtime`, `director`, `poster`, `plot`) VALUES
(1, 'Pulp Fiction', 'Drama', 1994, 154, 'Quentin Tarantino', 'http://ia.media-imdb.com/images/M/MV5BMjE0ODk2NjczOV5BMl5BanBnXkFtZTYwNDQ0NDg4._V1_SY317_CR4,0,214,317_.jpg', 'The lives of two mob hit men, a boxer, a gangster''s wife, and a pair of diner bandits intertwine in four tales of violence and redemption.'),
(2, 'Die Hard', 'Action', 1988, 131, 'John McTiernan', 'http://ia.media-imdb.com/images/M/MV5BMTY4ODM0OTc2M15BMl5BanBnXkFtZTcwNzE0MTk3OA@@._V1_SX214_.jpg', 'John McClane, officer of the NYPD, tries to save wife Holly Gennaro and several others, taken hostage by German terrorist Hans Gruber during a Christmas party at the Nakatomi Plaza in Los Angeles.'),
(3, 'Casablanca', 'Drama', 1942, 102, 'Michael Curtiz', 'http://ia.media-imdb.com/images/M/MV5BMTcwNDI5MjI1Ml5BMl5BanBnXkFtZTYwODE4NDI2._V1_SX214_.jpg', 'Set in unoccupied Africa during the early days of World War II: An American expatriate meets a former lover, with unforeseen complications.'),
(5, 'The Shawshank Redemption', 'Drama', 1994, 142, 'Frank Darabont', 'http://ia.media-imdb.com/images/M/MV5BMTc3NjM4MTY3MV5BMl5BanBnXkFtZTcwODk4Mzg3OA@@._V1_SY317_CR4,0,214,317_.jpg', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.'),
(8, 'Fight Club', 'Drama', 1999, 139, 'David Fincher', 'http://ia.media-imdb.com/images/M/MV5BMjIwNTYzMzE1M15BMl5BanBnXkFtZTcwOTE5Mzg3OA@@._V1_SX214_.jpg', 'An insomniac office worker looking for a way to change his life crosses paths with a devil-may-care soap maker and they form an underground fight club that evolves into something much, much more...'),
(9, 'Forrest Gump', 'Drama', 1994, 142, 'Robert Zemeckis', 'http://ia.media-imdb.com/images/M/MV5BMTQwMTA5MzI1MF5BMl5BanBnXkFtZTcwMzY5Mzg3OA@@._V1_SX214_.jpg', 'Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.'),
(10, 'Spirited Away', 'Animation', 2001, 125, 'Hayao Miyazaki', 'http://ia.media-imdb.com/images/M/MV5BMjYxMDcyMzIzNl5BMl5BanBnXkFtZTYwNDg2MDU3._V1_SY317_CR5,0,214,317_.jpg', 'In the middle of her family  move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and monsters.');
