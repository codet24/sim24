-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 04:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_conf24`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conf`
--

CREATE TABLE `tbl_conf` (
  `id` int(11) NOT NULL,
  `database_name` varchar(255) NOT NULL,
  `server` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status_SSL` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = tidak aktif, 1 = aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conf`
--

INSERT INTO `tbl_conf` (`id`, `database_name`, `server`, `port`, `user`, `password`, `status_SSL`) VALUES
(1, 'sim24', 'localhost', 3306, 'root', '', 0),
(2, 'test', 'localhost', 3306, 'root', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conf_apply`
--

CREATE TABLE `tbl_conf_apply` (
  `id` int(11) NOT NULL,
  `conf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conf_apply`
--

INSERT INTO `tbl_conf_apply` (`id`, `conf_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_conf`
--
ALTER TABLE `tbl_conf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_conf_apply`
--
ALTER TABLE `tbl_conf_apply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_conf`
--
ALTER TABLE `tbl_conf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_conf_apply`
--
ALTER TABLE `tbl_conf_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
