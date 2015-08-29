-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2015 at 11:19 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lrt-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE IF NOT EXISTS `import` (
  `id` int(10) NOT NULL,
  `favorites` varchar(10) NOT NULL,
  `from_url` varchar(255) NOT NULL,
  `to_url` varchar(255) NOT NULL,
  `anchor_text` varchar(255) NOT NULL,
  `link_status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `bldom` varchar(50) NOT NULL,
  `dompop` varchar(50) NOT NULL,
  `power` int(10) NOT NULL,
  `trust` int(10) NOT NULL,
  `power_trust` int(10) NOT NULL,
  `alexa` decimal(10,0) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `cntry` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8496 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8496;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
