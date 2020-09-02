-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2020 at 02:43 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abcd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL,
  `notes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `url`, `type`, `notes`) VALUES
(1, 'Saree Wiki', 'https://i.pinimg.com/564x/36/82/e7/3682e7caa082b9e86d9085180339e5f5.jpg', 'image', 'Saree wiki'),
(2, 'Gagracholi', 'https://www.youtube.com/embed/6EeLwYPUVHM', 'video', 'Gagracholi wiki'),
(3, 'Crop Top', 'https://en.wikipedia.org/wiki/Gagra_choli', 'wiki.', '12345678910'),
(4, 'Saree Wiki', 'https://en.wikipedia.org/wiki/Gagra_choli', 'url', 'Saree wiki'),
(7, 'Test', 'https://i.pinimg.com/564x/36/82/e7/3682e7caa082b9e86d9085180339e5f5.jpg', 'IMAGE', 'test notes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
