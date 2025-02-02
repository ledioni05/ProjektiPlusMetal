-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2025 at 12:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `produktet`
--

CREATE TABLE `produktet` (
  `Id` int(50) NOT NULL,
  `Imazhi` varchar(300) NOT NULL,
  `Produkti` varchar(30) NOT NULL,
  `Çmimi` decimal(30,2) NOT NULL,
  `Sasia` int(50) NOT NULL,
  `Totali` decimal(30,2) NOT NULL,
  `Emri` varchar(100) NOT NULL,
  `Mbiemri` varchar(100) NOT NULL,
  `Telefoni` varchar(100) NOT NULL,
  `Adresa` varchar(300) NOT NULL,
  `Komente` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produktet`
--

INSERT INTO `produktet` (`Id`, `Imazhi`, `Produkti`, `Çmimi`, `Sasia`, `Totali`, `Emri`, `Mbiemri`, `Telefoni`, `Adresa`, `Komente`) VALUES
(25, 'Hidranti1.png', 'Hidranti', 50.00, 1, 50.00, 'Ledion', 'Krasniqi', '04533801', 'Ferizaj', ''),
(26, 'Hidranti1.png', 'Hidranti', 50.00, 1, 50.00, 'Ledion', 'Krasniqi', '04533801', 'Ferizaj', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produktet`
--
ALTER TABLE `produktet`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_2` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produktet`
--
ALTER TABLE `produktet`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
