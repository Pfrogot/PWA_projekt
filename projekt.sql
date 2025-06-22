-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 09:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ImeKorisnika` varchar(50) NOT NULL,
  `Lozinka` varchar(255) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Telefon` int(13) NOT NULL,
  `Privilegije` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ImeKorisnika`, `Lozinka`, `Email`, `Telefon`, `Privilegije`) VALUES
(11, 'Pfrog', '$2y$10$B1n1/.WbnHaVKnXMk1XOtuJWdO.C.gY4SrmihJ2cVdEXkpQlqIQvq', 'pavao.novosel@gmail.com', 915574706, 'korisnik'),
(17, 'Marko Petrović', '$2y$10$17bNpKqulwO86kVFhiXF1OhRnS.K8MDSd.SFr8Mrt09ZFn7Qo.ODy', 'marko.petrovic@example.com', 601234567, 'korisnik'),
(18, 'Ivana Jovanović', '$2y$10$nWravajYtWs2jsIVMuoeNu6vo8BrxBEQ36A5/OZWivPI2E2chm8lq', 'ivana.jovanovic@example.com', 612345678, 'admin'),
(19, 'Luka Nikolić', '$2y$10$lA1nxcMLVDmWWxiQupJtiu1H0/MbXG76V./z2VMTC1SHTXTL4fk4K', 'luka.nikolic@example.com', 623456789, 'korisnik'),
(20, 'Ana Kovačević', '$2y$10$toZG/A95tjE/E9UrQR81EuGyfaoZxEmkpKHFbc5wCV.wkAWSkRj/u', 'ana.kovacevic@example.com', 634567890, 'korisnik'),
(21, 'Stefan Milenković', '$2y$10$4Ojo2erEuwFn887xEF6ize6b/5H3aHqQ/fLOLOeTqe2abiMJoxF8.', 'stefan.milenkovic@example.com', 645678901, 'korisnik'),
(22, 'Pero', '$2y$10$qLiAQRMuaPho673JbCt9rO5yhwDPj2uVRBYdiFmJXO6xLQalpNui.', 'pero.peric', 911234567, 'korisnik'),
(23, 'Mirko', '$2y$10$syP15P4o1I9ghNb7wE.S2uCm8RhAkVZD.rX26HXHIgZZ4A3eEfTI6', 'Mirko.miric@gmail.com', 917654321, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ImeKorisnika` (`ImeKorisnika`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
