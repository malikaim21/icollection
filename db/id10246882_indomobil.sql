-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 11:51 AM
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
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'malik', 'malikaim21', '1af2f0535aa3f287ea2e4e634b5600fa'),
(2, 'bokir', 'bokri212', '57b7c1c80e091fca8d5559109b6d3344');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `no_kontrak` bigint(30) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `tenor` int(11) NOT NULL,
  `nilai_angsuran` int(11) NOT NULL,
  `tgl_jt_tempo` int(11) NOT NULL,
  `tgl_mulai_angsuran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `no_kontrak`, `id_unit`, `tenor`, `nilai_angsuran`, `tgl_jt_tempo`, `tgl_mulai_angsuran`) VALUES
(24, 1600006, 8, 60, 2910000, 12, '2016-12-11 17:00:00'),
(25, 1502143, 1, 48, 4500000, 12, '2018-09-11 17:00:00'),
(27, 1700007, 11, 35, 1668000, 13, '2017-02-12 17:00:00'),
(28, 1801884, 10, 48, 4760000, 1, '2017-12-31 17:00:00'),
(29, 1700316, 12, 60, 8000000, 8, '2017-08-02 17:00:00'),
(30, 1700315, 15, 48, 10500000, 1, '2017-03-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_tagihan`
--

CREATE TABLE `daftar_tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_angsuran` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_tagihan`
--

INSERT INTO `daftar_tagihan` (`id_tagihan`, `id_angsuran`, `nik`, `tgl_input`) VALUES
(51, 25, 2015141410, '2019-02-05 14:36:01'),
(60, 24, 20170203, '2019-02-09 13:21:14'),
(61, 25, 2015141410, '2019-02-09 13:55:20'),
(62, 27, 2015141410, '2019-02-09 13:55:20'),
(63, 25, 2015141410, '2019-02-09 19:21:30'),
(64, 27, 2015141410, '2019-02-09 19:21:30'),
(65, 24, 2015141410, '2019-02-10 18:52:50'),
(66, 25, 20170203, '2019-02-10 18:55:44'),
(67, 24, 2015141410, '2019-02-11 17:45:18'),
(68, 25, 2015141410, '2019-02-11 17:45:18'),
(69, 28, 20170203, '2019-02-11 18:44:00'),
(70, 29, 2015141410, '2019-02-11 18:44:10'),
(72, 24, 2015141410, '2019-02-12 17:53:39'),
(73, 28, 2015141410, '2019-02-12 17:53:39'),
(74, 24, 2015141410, '2019-02-17 04:31:28'),
(75, 27, 2015141410, '2019-02-17 04:31:28'),
(76, 29, 2015141410, '2019-02-17 13:02:33'),
(77, 30, 2015141410, '2019-02-17 13:02:33'),
(78, 24, 2015141410, '2019-02-19 15:19:15'),
(79, 25, 2015141410, '2019-02-19 16:42:10'),
(80, 27, 2015141410, '2019-02-19 16:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `followup`
--

CREATE TABLE `followup` (
  `id_tagihan` int(11) NOT NULL,
  `konsumen` varchar(10) DEFAULT NULL,
  `kondisi_unit` varchar(10) DEFAULT NULL,
  `realisasi` varchar(20) DEFAULT NULL,
  `tgl_janji_bayar` date DEFAULT NULL,
  `via` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup`
--

INSERT INTO `followup` (`id_tagihan`, `konsumen`, `kondisi_unit`, `realisasi`, `tgl_janji_bayar`, `via`) VALUES
(63, 'Ada', 'Ada', 'Bayar', NULL, NULL),
(64, 'Ada', 'Ada', 'Janji Bayar', '2019-02-17', 'Payment Point'),
(65, 'Ada', 'Ada', 'Bayar', NULL, NULL),
(67, 'Ada', 'Ada', 'Bayar', NULL, NULL),
(68, 'Ada', 'Ada', 'Bayar', NULL, NULL),
(70, 'Ada', 'Ada', 'Janji Bayar', '2019-02-19', 'Payment Point'),
(75, 'Ada', 'Ada', 'Janji Bayar', '2019-02-18', 'Payment Point'),
(75, 'Ada', 'Ada', 'Janji Bayar', '2019-02-20', 'Payment Point'),
(75, 'Ada', 'Ada', 'Bayar', NULL, NULL),
(77, 'Ada', 'Ada', 'Janji Bayar', '2019-02-18', 'Payment Point'),
(76, 'Ada', 'Ada', 'Janji Bayar', '2019-02-19', 'Payment Point');

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
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`no_kontrak`, `nama_konsumen`, `kelurahan`, `kecamatan`, `alamat`, `no_tlp`) VALUES
(170314, 'Heni Nuraeni', 'PakuJaya', 'Serpong Utara', 'kp. dongkal rt. 003/005', '089712345678'),
(1502143, 'Bahrudin', 'PakuJaya', 'Gunung Sindur', 'kp. dongkal rt. 003/005', '089712345678'),
(1600006, 'Diana Sari', 'Jelupang', 'Serpong Utara', 'Villa Melati Mas', '081314022897'),
(1602440, 'Sukarmen', 'Kademangan', 'Setu', 'Jl. Hk', '08777111222'),
(1700006, 'Dian Atika Mawasti', 'Bojongsari', 'Bojongsari', 'Sawangan, Depok', '08777111222'),
(1700007, 'Manileh', 'Periyang', 'Gunung Sindur', 'Kampung Sawah Lama', '087778889111'),
(1700315, 'Hilman', 'Bojong Nangka ', 'Kelapa Dua', 'Dasana Indah', '087778889112'),
(1700316, 'Kunto Adji', 'Kuta Jaya', 'Pasar Kemis', 'Perum Pasar Kemis', '08771122433'),
(1700317, 'Monique Angel', 'Kuta Jaya', 'Pasar Kemis', 'Perum Pasar Kemis', '08771122433'),
(1800214, 'Doni Saputra', 'Bojong Sari', 'Bojong Sari', 'Sawangan, Depok', '0877788899910'),
(1801884, 'VIdi', 'Bojong Nangka', 'Kelapa Dua', 'Dasana Indah', '087778889111'),
(1802162, 'Mariyam', 'Salatiga', 'Salaempat', 'Rawa Bamban', '081231341456'),
(1802172, 'Dikibulin', 'Salatiga', 'Salaempat', 'Rawa Bamban', '081231341456');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_angsuran` int(11) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `nominal_denda` int(11) DEFAULT NULL,
  `tgl_bayar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_angsuran`, `nominal_pembayaran`, `nominal_denda`, `tgl_bayar`) VALUES
(4, 25, 4500000, 0, '2019-02-10 11:47:51'),
(6, 25, 4500000, 0, '2019-02-10 12:56:29'),
(7, 25, 4500000, 0, '2019-02-10 14:21:49'),
(8, 24, 2910000, 0, '2019-02-10 19:07:59'),
(9, 24, 2910000, 0, '2019-02-11 18:32:12'),
(10, 24, 2910000, 0, '2019-02-11 18:39:54'),
(11, 24, 2910000, 0, '2019-02-11 18:42:23'),
(12, 25, 450000, 0, '2019-02-11 18:43:14'),
(14, 27, 1668000, 0, '2019-02-17 12:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `tipe_kendaraan` varchar(30) DEFAULT NULL,
  `merk` varchar(30) DEFAULT NULL,
  `jenis_kendaraan` varchar(20) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `thn_kendaraan` int(11) DEFAULT NULL,
  `no_rangka` varchar(30) DEFAULT NULL,
  `no_mesin` varchar(30) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nopol`, `tipe_kendaraan`, `merk`, `jenis_kendaraan`, `warna`, `thn_kendaraan`, `no_rangka`, `no_mesin`, `kondisi`) VALUES
(1, 'B 14045 CZN', 'ERTIGA', 'SUZUKI', 'R4', 'HITAM', 2015, 'MHY1111QQQQ2222', 'KBT121290', 'BARU'),
(8, 'B 1771 DOG', 'Go+ TOption', 'Datsun', 'R4', 'Putih', 2016, 'MHYKZE123', 'BT2122222', 'BARU'),
(10, 'KMZ 214 WAY', 'Grand Livina', 'Nissan', 'R4', 'Merah Metalic', 2017, 'MHYKZE123333333', 'BT212', 'BARU'),
(11, 'B 1771 DOGi', 'Ninja', 'Kawasaki', 'R2', 'Hijau', 2015, 'MHYKZE531', 'kb212', 'BARU'),
(12, 'B 4179 WAY', 'X-Trail', 'Nissan', 'R4', 'Hitam', 2018, 'MHYKZE531212', 'BT212313', 'BARU'),
(15, 'B 14045 CZZ', 'Pajero Sport', 'Mitsubishi', 'R4', 'Putih', 2018, 'MHYKZE531', 'BT212', 'LAMA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`),
  ADD KEY `id_unit` (`id_unit`),
  ADD KEY `no_kontrak` (`no_kontrak`) USING BTREE;

--
-- Indexes for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_angsuran` (`id_angsuran`) USING BTREE,
  ADD KEY `nik` (`nik`) USING BTREE;

--
-- Indexes for table `followup`
--
ALTER TABLE `followup`
  ADD KEY `id_tagihan` (`id_tagihan`) USING BTREE;

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_angsuran` (`id_angsuran`) USING BTREE;

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD CONSTRAINT `angsuran_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  ADD CONSTRAINT `angsuran_ibfk_2` FOREIGN KEY (`no_kontrak`) REFERENCES `konsumen` (`no_kontrak`);

--
-- Constraints for table `daftar_tagihan`
--
ALTER TABLE `daftar_tagihan`
  ADD CONSTRAINT `daftar_tagihan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `kolektor` (`nik`),
  ADD CONSTRAINT `daftar_tagihan_ibfk_2` FOREIGN KEY (`id_angsuran`) REFERENCES `angsuran` (`id_angsuran`);

--
-- Constraints for table `followup`
--
ALTER TABLE `followup`
  ADD CONSTRAINT `followup_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `daftar_tagihan` (`id_tagihan`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_angsuran`) REFERENCES `angsuran` (`id_angsuran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
