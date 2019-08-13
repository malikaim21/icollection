-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 09:04 PM
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
-- Database: `indomobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `nama`, `username`, `password`) VALUES
(1, 'malik', 'malikaim21', '1af2f0535aa3f287ea2e4e634b5600fa'),
(2, 'bokir', 'bokri212', '57b7c1c80e091fca8d5559109b6d3344');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tagihan`
--

CREATE TABLE `daftar_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `no_kontrak` bigint(30) NOT NULL,
  `nik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tagihan`
--

INSERT INTO `daftar_tagihan` (`id_tagihan`, `no_kontrak`, `nik`) VALUES
(18, 170314, 20170203),
(19, 1700007, 20170203),
(20, 1502143, 20170203);

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `id_tagihan` int(11) NOT NULL,
  `konsumen` varchar(10) NOT NULL,
  `kondisi_unit` varchar(10) NOT NULL,
  `realisasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id_tagihan`, `konsumen`, `kondisi_unit`, `realisasi`) VALUES
(18, 'Tidak Ada', 'Tidak Ada', 'Janji Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `kolektor`
--

CREATE TABLE `kolektor` (
  `nik` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kolektor`
--

INSERT INTO `kolektor` (`nik`, `nama`, `alamat`, `no_hp`, `username`, `password`) VALUES
(20170203, 'Mimi Fahmi Rani', 'Buaran Indah', '089712345678', 'mimiperi', '23bc34d675bea0ad87d5943d592f8d09'),
(20171420, 'Paulus Sandos', 'Karawaci', '081273213612', 'paulus007', 'bedeb'),
(20181188, 'Chresly ', 'Jelambar', '089712345678', 'ambon21', 'maluku'),
(20181199, 'Usman Felani', 'Poris Gaga', '089712345678', 'usman1', 'gembrot'),
(1112220033, 'Lukman', 'poris', '081273213612', 'lukman11', 'lukman11'),
(2015141410, 'Maulana Malik Ibrahim', 'Muncul', '089712345678', 'malikaim212', '1af2f0535aa3f287ea2e4e634b5600fa');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `no_kontrak` bigint(30) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `unit` varchar(70) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `nopol` varchar(30) NOT NULL,
  `tenor` int(11) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `tgl_jt_tempo` date NOT NULL,
  `nilai_angsuran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`no_kontrak`, `nama_konsumen`, `unit`, `warna`, `angsuran_ke`, `nopol`, `tenor`, `kelurahan`, `kecamatan`, `alamat`, `no_tlp`, `tgl_jt_tempo`, `nilai_angsuran`) VALUES
(170314, 'Heni Nuraeni', 'Karimun Wagon R G/S', 'Silver', 10, 'B 14045 CZN', 60, 'PakuJaya', 'Serpong Utara', 'kp. dongkal rt. 003/005', '089712345678', '2019-01-16', 3714000),
(1502143, 'Bahrudin', 'Pickup Apv', 'Hitam', 11, 'F 1732 NOZ', 48, 'Gunung Sindur', 'Gunung Sindur', 'Jl. Pedurenan 3, Gunung Sindur', '083877779999', '2019-01-03', 2954000),
(1600006, 'Diana Sari', 'Datsun GO+ ', 'Putih', 12, 'B 14022 CUM', 60, 'Jelupang', 'Serpong Utara', 'Villa Melati Mas', '081314022897', '2019-01-01', 3722000),
(1602440, 'Sukarmen', 'Datsun Go+', 'Putih', 26, 'KMZ 214 WAY', 60, 'Kademangan', 'Setu', 'Jl. Hk', '08777111222', '2016-03-09', 3172000),
(1700006, 'Dian Atika Mawasti', 'Datsun Go+', 'Putih', 36, 'B 1771 DOG', 60, 'Bojongsari', 'Bojongsari', 'Sawangan, Depok', '08777111222', '2017-02-08', 2910000),
(1700007, 'Manileh', 'Beat', 'Hitam', 2, 'B 4179 WAX', 36, 'Periyang', 'Serpong Utara', 'Kampung Sawah Lama', '087778889111', '2019-01-02', 1668000),
(1800214, 'Doni Saputra', 'Ertiga GL M/T', 'Merah Metalic', 1, 'B 1992 WAY', 60, 'Bojong Sari', 'Bojong Sari', 'Sawangan, Depok', '0877788899910', '2018-01-01', 4760000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD UNIQUE KEY `no_pjj` (`no_kontrak`),
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD UNIQUE KEY `id_tagihan` (`id_tagihan`);

--
-- Indexes for table `kolektor`
--
ALTER TABLE `kolektor`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`no_kontrak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `followup`
--
ALTER TABLE `followup`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  ADD CONSTRAINT `daftar_tagihan_ibfk_1` FOREIGN KEY (`no_kontrak`) REFERENCES `konsumen` (`no_kontrak`),
  ADD CONSTRAINT `daftar_tagihan_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `kolektor` (`nik`);

--
-- Constraints for table `followup`
--
ALTER TABLE `followup`
  ADD CONSTRAINT `followup_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `daftar_tagihan` (`id_tagihan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
