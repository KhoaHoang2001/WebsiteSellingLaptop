-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 06:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_weblaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MAHINH` varchar(11) NOT NULL,
  `MASP` varchar(11) NOT NULL,
  `LINK` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`MAHINH`, `MASP`, `LINK`) VALUES
('H1', 'SP1', '1_asus-vivobook.jpg'),
('H10', 'SP10', '10_apple-macbook-pro.JPG'),
('H2', 'SP2', '2_lenovo-ideapad.jpg'),
('H3', 'SP3', '3_hp-15s.jpg'),
('H4', 'SP4', '4_acer-aspire-5.jpg'),
('H5', 'SP5', '5_dell-g3.JPG'),
('H6', 'SP6', '6_acer-aspire-7.JPG'),
('H7', 'SP7', '7_lg-gram-15-i5.JPG'),
('H8', 'SP8', '8_huawei-matebook.JPG'),
('H9', 'SP9', '9_msi-gl65.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`MAHINH`),
  ADD KEY `hinhanh_ibfk_1` (`MASP`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `hinhanh_ibfk_1` FOREIGN KEY (`MASP`) REFERENCES `sanpham` (`MASP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
