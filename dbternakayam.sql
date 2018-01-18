-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 03:24 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbternakayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `detpenyerahanovk`
--

CREATE TABLE `detpenyerahanovk` (
  `IDDetPenyerahanOVK` varchar(4) NOT NULL,
  `IDPenyerahanOVK` varchar(4) NOT NULL,
  `IDOVK` varchar(4) NOT NULL,
  `Harga` varchar(25) NOT NULL,
  `JumlahOVK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detpenyerahanpakan`
--

CREATE TABLE `detpenyerahanpakan` (
  `IDDetPenyerahanPakan` varchar(4) NOT NULL,
  `IDPenyerahanPakan` varchar(4) NOT NULL,
  `IDPakan` varchar(4) NOT NULL,
  `Harga` varchar(25) NOT NULL,
  `JumlahPakan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IDuser` varchar(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDuser`, `username`, `password`, `status`) VALUES
('1', 'admin', '202cb962ac59075b964b07152d234b70', 'ADMIN'),
('1', 'admin', '202cb962ac59075b964b07152d234b70', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tbdatakandang`
--

CREATE TABLE `tbdatakandang` (
  `IDDataKandang` varchar(6) NOT NULL,
  `IDPeternak` varchar(6) NOT NULL,
  `IDJenisKandang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdatakandang`
--

INSERT INTO `tbdatakandang` (`IDDataKandang`, `IDPeternak`, `IDJenisKandang`) VALUES
('KDG01', 'PT001', 'JK001'),
('KDG02', 'PT003', 'JK002'),
('KDG03', 'PT002', 'JK001');

-- --------------------------------------------------------

--
-- Table structure for table `tbjeniskandang`
--

CREATE TABLE `tbjeniskandang` (
  `IDJenisKandang` varchar(6) NOT NULL,
  `LuasKandang` varchar(20) NOT NULL,
  `Kapasitas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbjeniskandang`
--

INSERT INTO `tbjeniskandang` (`IDJenisKandang`, `LuasKandang`, `Kapasitas`) VALUES
('JK001', '200', '1500'),
('JK002', '500', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tbovk`
--

CREATE TABLE `tbovk` (
  `IDOVK` varchar(6) NOT NULL,
  `NamaOVK` varchar(15) NOT NULL,
  `Satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbovk`
--

INSERT INTO `tbovk` (`IDOVK`, `NamaOVK`, `Satuan`) VALUES
('OV001', 'ttt', 'satuan'),
('OV003', 'sulvac oba', 'mg');

-- --------------------------------------------------------

--
-- Table structure for table `tbpakan`
--

CREATE TABLE `tbpakan` (
  `IDPakan` varchar(6) NOT NULL,
  `JenisPakan` varchar(20) NOT NULL,
  `Merek` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpakan`
--

INSERT INTO `tbpakan` (`IDPakan`, `JenisPakan`, `Merek`) VALUES
('PK001', 'dfsggg', 'dsfs'),
('PK003', 'platinum', 'bnbn');

-- --------------------------------------------------------

--
-- Table structure for table `tbpanen`
--

CREATE TABLE `tbpanen` (
  `IDPanen` varchar(4) NOT NULL,
  `IDProduksi` varchar(4) NOT NULL,
  `TanggalPengiriman` date NOT NULL,
  `Umur` int(11) NOT NULL,
  `JumlahAyam` int(11) NOT NULL,
  `TotalBerat` int(11) NOT NULL,
  `BeratRata` int(11) NOT NULL,
  `NamaPembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpemeliharaanharian`
--

CREATE TABLE `tbpemeliharaanharian` (
  `IDPHarian` varchar(4) NOT NULL,
  `IDPMingguan` varchar(4) NOT NULL,
  `Tanggal` date NOT NULL,
  `Umur` int(11) NOT NULL,
  `PakanStd` varchar(15) NOT NULL,
  `PakanAct` varchar(15) NOT NULL,
  `IDPakan` varchar(4) NOT NULL,
  `Mati` int(11) NOT NULL,
  `Culling` varchar(15) NOT NULL,
  `Afkir` varchar(15) NOT NULL,
  `IDOVK` varchar(4) NOT NULL,
  `OVKPakai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpemeliharaanmingguan`
--

CREATE TABLE `tbpemeliharaanmingguan` (
  `IDPMingguan` varchar(4) NOT NULL,
  `IDProduksi` varchar(4) NOT NULL,
  `MingguKe-` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanbibit`
--

CREATE TABLE `tbpenyerahanbibit` (
  `IDProduksi` varchar(6) NOT NULL,
  `IDPeternak` varchar(6) NOT NULL,
  `IDSupplier` varchar(6) NOT NULL,
  `Strain` varchar(6) NOT NULL,
  `TanggalChickIn` date NOT NULL,
  `JumlahChickIn` varchar(11) NOT NULL,
  `Harga` varchar(20) NOT NULL,
  `Periode` varchar(15) NOT NULL,
  `KondisiChickIn` varchar(15) NOT NULL,
  `IDDataKandang` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenyerahanbibit`
--

INSERT INTO `tbpenyerahanbibit` (`IDProduksi`, `IDPeternak`, `IDSupplier`, `Strain`, `TanggalChickIn`, `JumlahChickIn`, `Harga`, `Periode`, `KondisiChickIn`, `IDDataKandang`) VALUES
('PR001', 'PT001', 'SPL03', 'Platin', '2018-01-13', 'yu', '78', '879', 'Tidak Normal', 'KDG02'),
('PR002', 'PT001', 'SPL03', 'Platin', '2018-01-05', '33', '444', '3', 'Tidak Normal', 'KDG01');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanovk`
--

CREATE TABLE `tbpenyerahanovk` (
  `IDPenyerahanOVK` varchar(4) NOT NULL,
  `IDProduksi` varchar(4) NOT NULL,
  `TglTerimaOVK` date NOT NULL,
  `SJOVK` text NOT NULL,
  `Periode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanpakan`
--

CREATE TABLE `tbpenyerahanpakan` (
  `IDPenyerahanPakan` varchar(4) NOT NULL,
  `IDProduksi` varchar(4) NOT NULL,
  `TglTerimaPakan` date NOT NULL,
  `SJPakan` text NOT NULL,
  `Periode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpersediaanbibit`
--

CREATE TABLE `tbpersediaanbibit` (
  `IDPersediaanBibit` varchar(6) NOT NULL,
  `BulanSedia` varchar(10) NOT NULL,
  `TahunSedia` varchar(5) NOT NULL,
  `IDSupplier` varchar(6) NOT NULL,
  `Strain` varchar(10) NOT NULL,
  `JumlahSedia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpersediaanbibit`
--

INSERT INTO `tbpersediaanbibit` (`IDPersediaanBibit`, `BulanSedia`, `TahunSedia`, `IDSupplier`, `Strain`, `JumlahSedia`) VALUES
('PB001', 'Februari', '2013', 'SPL03', 'Platinum', '500'),
('PB002', 'Februari', '2014', 'SPL01', 'Starter', '2367567567'),
('PB003', 'Januari', '2013', 'SPL04', 'Starter', '2000'),
('PB004', 'Januari', '2015', 'SPL03', 'Platinum', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeternak`
--

CREATE TABLE `tbpeternak` (
  `IDPeternak` varchar(6) NOT NULL,
  `NamaPeternak` text NOT NULL,
  `Lokasi` text NOT NULL,
  `Alamat` text NOT NULL,
  `TanggalLahir` date NOT NULL,
  `NoKTP` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpeternak`
--

INSERT INTO `tbpeternak` (`IDPeternak`, `NamaPeternak`, `Lokasi`, `Alamat`, `TanggalLahir`, `NoKTP`) VALUES
('PT001', 'abul', 'barimbun', 'bajut', '1987-01-11', '33333744352243245'),
('PT002', 'udin', 'tamta', 'jkkl', '2018-12-31', '766767687755878787'),
('PT003', 'ijal', 'barimbun', 'mangkusip', '1920-10-30', '2323236755');

-- --------------------------------------------------------

--
-- Table structure for table `tbstrain`
--

CREATE TABLE `tbstrain` (
  `IDStrain` varchar(5) NOT NULL,
  `Strain` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstrain`
--

INSERT INTO `tbstrain` (`IDStrain`, `Strain`) VALUES
('S0001', 'Starter'),
('S0002', 'Platinum');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `IDSupplier` varchar(6) NOT NULL,
  `NamaSupplier` text NOT NULL,
  `Alamat` text NOT NULL,
  `NoHP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`IDSupplier`, `NamaSupplier`, `Alamat`, `NoHP`) VALUES
('SPL01', 'Haji Assad', 'Belimbing', '08675545'),
('SPL03', 'Abuk', 'Banjarbaru', '23545'),
('SPL04', 'dandi', 'Martapura', '081244555455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detpenyerahanovk`
--
ALTER TABLE `detpenyerahanovk`
  ADD PRIMARY KEY (`IDDetPenyerahanOVK`),
  ADD UNIQUE KEY `IDPenyerahanOVK` (`IDPenyerahanOVK`),
  ADD UNIQUE KEY `IDDetPenyerahanOVK` (`IDDetPenyerahanOVK`),
  ADD UNIQUE KEY `IDOVK` (`IDOVK`);

--
-- Indexes for table `detpenyerahanpakan`
--
ALTER TABLE `detpenyerahanpakan`
  ADD PRIMARY KEY (`IDDetPenyerahanPakan`);

--
-- Indexes for table `tbdatakandang`
--
ALTER TABLE `tbdatakandang`
  ADD PRIMARY KEY (`IDDataKandang`);

--
-- Indexes for table `tbjeniskandang`
--
ALTER TABLE `tbjeniskandang`
  ADD PRIMARY KEY (`IDJenisKandang`);

--
-- Indexes for table `tbovk`
--
ALTER TABLE `tbovk`
  ADD PRIMARY KEY (`IDOVK`);

--
-- Indexes for table `tbpakan`
--
ALTER TABLE `tbpakan`
  ADD PRIMARY KEY (`IDPakan`);

--
-- Indexes for table `tbpanen`
--
ALTER TABLE `tbpanen`
  ADD PRIMARY KEY (`IDPanen`);

--
-- Indexes for table `tbpemeliharaanharian`
--
ALTER TABLE `tbpemeliharaanharian`
  ADD PRIMARY KEY (`IDPHarian`);

--
-- Indexes for table `tbpemeliharaanmingguan`
--
ALTER TABLE `tbpemeliharaanmingguan`
  ADD PRIMARY KEY (`IDPMingguan`);

--
-- Indexes for table `tbpenyerahanbibit`
--
ALTER TABLE `tbpenyerahanbibit`
  ADD PRIMARY KEY (`IDProduksi`);

--
-- Indexes for table `tbpenyerahanovk`
--
ALTER TABLE `tbpenyerahanovk`
  ADD PRIMARY KEY (`IDPenyerahanOVK`);

--
-- Indexes for table `tbpenyerahanpakan`
--
ALTER TABLE `tbpenyerahanpakan`
  ADD PRIMARY KEY (`IDPenyerahanPakan`);

--
-- Indexes for table `tbpersediaanbibit`
--
ALTER TABLE `tbpersediaanbibit`
  ADD PRIMARY KEY (`IDPersediaanBibit`);

--
-- Indexes for table `tbpeternak`
--
ALTER TABLE `tbpeternak`
  ADD PRIMARY KEY (`IDPeternak`);

--
-- Indexes for table `tbstrain`
--
ALTER TABLE `tbstrain`
  ADD PRIMARY KEY (`IDStrain`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`IDSupplier`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
