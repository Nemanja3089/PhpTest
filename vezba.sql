-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2016 at 10:17 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vezba`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `salarie` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `created_at`, `updated_at`, `salarie`) VALUES
(1, 'Admin', 'admin@admin.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:03:32', '2016-06-14 20:03:32', 5000),
(2, 'Nikola', 'nikola@nikola.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:07:52', '2016-06-14 20:07:52', 1000),
(3, 'Zoran', 'zoran@zoran.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:08:24', '2016-06-14 20:08:24', 2000),
(4, 'Goran', 'goran@goran.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:09:07', '2016-06-14 20:09:07', 1500),
(5, 'Nevenka', 'nevenka@nevenka.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '2016-06-14 20:10:10', '2016-06-14 20:10:10', 1200),
(6, 'Aca', 'aca@aca.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:11:29', '2016-06-14 20:11:29', 2300),
(7, 'Jovana', 'jovana@jovana.com', 'da70dfa4d9f95ac979f921e8e623358236313f334afcd06cddf8a5621cf6a1e9', '2016-06-14 20:12:52', '2016-06-14 20:12:52', 1000),
(8, 'Petar', 'petar@petar.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:14:13', '2016-06-14 20:14:13', 2000),
(9, 'Boza', 'boza@boza.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:14:39', '2016-06-14 20:14:39', 2350),
(10, 'Bojan', 'bojan@gmail.com', 'c853dafe07da9d7cf16e7074e9b30a6e22003eac3ee4d0b04dfd0d2a3a73b36e', '2016-06-14 20:15:14', '2016-06-14 20:15:14', 4000),
(11, 'John', 'john@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2016-06-14 20:15:59', '2016-06-14 20:15:59', 3000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
