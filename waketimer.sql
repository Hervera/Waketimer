-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 03:50 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waketimer`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensor_values`
--

CREATE TABLE `sensor_values` (
  `id` int(11) NOT NULL,
  `acceleration` varchar(100) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor_values`
--

INSERT INTO `sensor_values` (`id`, `acceleration`, `time`) VALUES
(2, '2.0351567959764338E-4', '15:17:00'),
(3, '0.04075716307216304', '15:17:00'),
(4, '0.026595791860806628', '15:17:00'),
(5, '0.10275873971995964', '15:17:10'),
(6, '0.025402142757094737', '15:17:10'),
(7, '0.14775041062315353', '15:17:10'),
(8, '0.07541097887492931', '15:17:10'),
(9, '0.10798739342886066', '15:17:10'),
(10, '0.27074460205398765', '15:17:20'),
(11, '0.19842109647698614', '15:17:20'),
(12, '0.4568619452142908', '15:17:20'),
(13, '0.023816360139221615', '15:17:20'),
(14, '0.3113778947228276', '15:17:20'),
(15, '0.10985280824082366', '15:17:30'),
(16, '0.3034966429248165', '15:17:30'),
(17, '0.02096052364123757', '15:17:30'),
(18, '0.03754503633171957', '15:17:30'),
(19, '0.027981010469533274', '15:17:30'),
(20, '0.005962054077452095', '15:17:30'),
(21, '0.05444992671274562', '15:17:40'),
(22, '0.3128743914400829', '15:17:40'),
(23, '0.12796536661118196', '15:17:40'),
(24, '0.06416606010167669', '15:17:40'),
(25, '0.12216133649241456', '15:17:40'),
(26, '0.012177348270233423', '15:17:40'),
(27, '0.08148534807458852', '15:17:50'),
(28, '0.07061516855799965', '15:17:50'),
(29, '0.006051724314330542', '15:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensor_values`
--
ALTER TABLE `sensor_values`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensor_values`
--
ALTER TABLE `sensor_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
