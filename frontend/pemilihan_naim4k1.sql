-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2023 at 03:56 AM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilihan_naim4k1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kod_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `kod_jenama` varchar(10) DEFAULT NULL,
  `harga` double(7,2) DEFAULT NULL,
  `ciri` varchar(120) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `nokp_staff` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kod_barang`, `nama_barang`, `kod_jenama`, `harga`, `ciri`, `gambar`, `nokp_staff`) VALUES
(2, 'CASIO EDIFECE ORIGINAL', 'C06', 399.00, 'water resistance', '2023-05-11-035820.webp', '102021321209'),
(6, 'Casio Analog Men', 'C06', 414.00, 'Water resistance,Glass Screw Lock', '2023-05-11-040233.webp', '102021321209'),
(7, 'Casio Digital Sport Men', 'C06', 190.00, 'Water Resistance,durable and suitable for sports', '2023-05-11-040645.webp', '102021321209'),
(9, 'Casio Denim Texture', 'C06', 250.00, 'Water Resistance,Light', '2023-05-11-040949.webp', '102021321209'),
(10, 'Jam Tangan Digitec DA', 'DG2', 200.99, 'DURABLE,WATER RESISTANCE', '2023-05-17-033853.webp', '212121322123'),
(11, 'Digitec Digital D-a', 'DG2', 450.00, 'Water Wesistance,Durable', '2023-05-17-034257.jpg', '212121322123'),
(12, 'Digitec Original Digital 511', 'DG2', 599.00, 'Water Resistance', '2023-05-17-034523.webp', '212121322123'),
(13, 'Digitec Pro Digital', 'DG2', 600.00, 'Digital,Durable,Water Resistancde', '2023-05-17-034819.png', '212121322123'),
(19, 'Rolex Cok', 'R34', 300.00, 'Water Resistance', '2023-05-17-040452.webp', '562345620876'),
(21, 'Rolex Pro Edition', 'R34', 250.00, 'Durable', '2023-05-17-040711.webp', '562345620876'),
(24, 'G-Shock BlackDragon', 'G01', 799.00, 'Durable,Water Resistance', '2023-05-17-041403.webp', '562345620876'),
(27, 'G-Shock PinkMen Special Editio', 'G01', 450.99, 'Water Resistance', '2023-05-17-041817.png', '562345620876');

-- --------------------------------------------------------

--
-- Table structure for table `jenama`
--

CREATE TABLE `jenama` (
  `kod_jenama` varchar(10) NOT NULL,
  `jenama_barang` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenama`
--

INSERT INTO `jenama` (`kod_jenama`, `jenama_barang`) VALUES
('C06', 'JAM TANGAN CASIO'),
('DG2', 'JAM TANGAN DIGITEC'),
('G01', 'JAM TANGAN G SHOCK'),
('R34', 'JAM TANGAN ROLEX');

-- --------------------------------------------------------

--
-- Table structure for table `jualan`
--

CREATE TABLE `jualan` (
  `nokp_pembeli` varchar(12) NOT NULL,
  `tarikh_beli` date NOT NULL,
  `kod_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jualan`
--

INSERT INTO `jualan` (`nokp_pembeli`, `tarikh_beli`, `kod_barang`) VALUES
('012435762063', '2023-05-18', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `nokp_pembeli` varchar(12) NOT NULL,
  `nama_pembeli` varchar(60) DEFAULT NULL,
  `katalaluan_pembeli` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`nokp_pembeli`, `nama_pembeli`, `katalaluan_pembeli`) VALUES
('012435762063', 'ALI BIN SHABIL', '012435762063'),
('023075220752', 'SAFUAN BIN ANUAR', '023075220752'),
('068653245674', 'Amir Bin Haidar', '068653245674'),
('081625320653', 'AZFAR AIMAN BIN OTHMAN', '065308162532'),
('891275320643', 'AMIR BIN AIMAN', '891275320643'),
('896524320736', 'AFAN BIN AFIQ', '8965243207364');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `nokp_staff` varchar(12) NOT NULL,
  `nama_staff` varchar(60) DEFAULT NULL,
  `katalaluan_staff` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nokp_staff`, `nama_staff`, `katalaluan_staff`) VALUES
('102021321209', 'AIMAR BIN ALI', '102021321209'),
('212121322123', 'ZAMER BIN SYAMER', '212121322123'),
('562345620876', 'ALIF BIN BAHAROM', '562345620876');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kod_barang`),
  ADD KEY `kod_jenama` (`kod_jenama`),
  ADD KEY `nokp_staff` (`nokp_staff`);

--
-- Indexes for table `jenama`
--
ALTER TABLE `jenama`
  ADD PRIMARY KEY (`kod_jenama`);

--
-- Indexes for table `jualan`
--
ALTER TABLE `jualan`
  ADD PRIMARY KEY (`nokp_pembeli`,`tarikh_beli`,`kod_barang`),
  ADD KEY `kod_barang` (`kod_barang`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`nokp_pembeli`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nokp_staff`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kod_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`kod_jenama`) REFERENCES `jenama` (`kod_jenama`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`nokp_staff`) REFERENCES `staff` (`nokp_staff`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jualan`
--
ALTER TABLE `jualan`
  ADD CONSTRAINT `jualan_ibfk_1` FOREIGN KEY (`kod_barang`) REFERENCES `barang` (`kod_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jualan_ibfk_2` FOREIGN KEY (`nokp_pembeli`) REFERENCES `pembeli` (`nokp_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
