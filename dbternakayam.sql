-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 10:43 AM
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
-- Table structure for table `log_login`
--

CREATE TABLE `log_login` (
  `no` int(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jam_msk` varchar(20) NOT NULL,
  `jam_klr` varchar(20) NOT NULL,
  `tgl_msk` date NOT NULL,
  `tgl_klr` date NOT NULL,
  `status_log` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_login`
--

INSERT INTO `log_login` (`no`, `username`, `jam_msk`, `jam_klr`, `tgl_msk`, `tgl_klr`, `status_log`) VALUES
(1, 'admin', '13:06:20', 'logged', '2018-01-24', '0000-00-00', 'online'),
(2, 'ss', '16:39:41', 'logged', '2018-01-24', '0000-00-00', 'online'),
(3, 'ss', '16:39:52', 'logged', '2018-01-24', '0000-00-00', 'online'),
(4, '11', '16:43:16', 'logged', '2018-01-24', '0000-00-00', 'online'),
(5, 'ss', '16:45:48', 'logged', '2018-01-24', '0000-00-00', 'online'),
(6, 'admin', '10:09:26', 'logged', '2018-01-25', '0000-00-00', 'online'),
(7, 'admin', '11:15:30', 'logged', '2018-01-25', '0000-00-00', 'online'),
(8, 'admin', '11:16:12', 'logged', '2018-01-25', '0000-00-00', 'online'),
(9, '11', '11:16:43', 'logged', '2018-01-25', '0000-00-00', 'online'),
(10, '11', '11:26:53', 'logged', '2018-01-25', '0000-00-00', 'online'),
(11, 'admin', '11:28:58', 'logged', '2018-01-25', '0000-00-00', 'online'),
(12, '11', '11:38:48', 'logged', '2018-01-25', '0000-00-00', 'online'),
(13, 'admin', '11:39:06', 'logged', '2018-01-25', '0000-00-00', 'online'),
(14, 'admin', '11:39:13', 'logged', '2018-01-25', '0000-00-00', 'online'),
(15, '11', '11:39:23', 'logged', '2018-01-25', '0000-00-00', 'online'),
(16, 'admin', '11:40:54', 'logged', '2018-01-25', '0000-00-00', 'online'),
(17, '11', '11:41:05', 'logged', '2018-01-25', '0000-00-00', 'online'),
(18, 'admin', '11:41:30', 'logged', '2018-01-25', '0000-00-00', 'online'),
(19, 'admin', '11:42:18', 'logged', '2018-01-25', '0000-00-00', 'online'),
(20, '11', '11:42:28', 'logged', '2018-01-25', '0000-00-00', 'online'),
(21, 'admin', '11:42:59', 'logged', '2018-01-25', '0000-00-00', 'online'),
(22, 'admin', '11:48:12', 'logged', '2018-01-25', '0000-00-00', 'online'),
(23, '11', '11:48:22', 'logged', '2018-01-25', '0000-00-00', 'online'),
(24, 'admin', '11:49:16', 'logged', '2018-01-25', '0000-00-00', 'online'),
(25, 'admin', '11:53:57', 'logged', '2018-01-25', '0000-00-00', 'online'),
(26, 'admin', '11:54:05', 'logged', '2018-01-25', '0000-00-00', 'online'),
(27, 'admin', '11:54:57', 'logged', '2018-01-25', '0000-00-00', 'online'),
(28, 'admin', '11:55:18', 'logged', '2018-01-25', '0000-00-00', 'online'),
(29, '11', '12:18:33', 'logged', '2018-01-25', '0000-00-00', 'online'),
(30, '11', '13:48:15', 'logged', '2018-01-25', '0000-00-00', 'online'),
(31, 'admin', '13:51:12', 'logged', '2018-01-25', '0000-00-00', 'online'),
(32, '11', '13:53:57', 'logged', '2018-01-25', '0000-00-00', 'online'),
(33, '11', '13:57:18', 'logged', '2018-01-25', '0000-00-00', 'online'),
(34, 'admin', '14:06:55', 'logged', '2018-01-25', '0000-00-00', 'online'),
(35, '12', '14:08:00', 'logged', '2018-01-25', '0000-00-00', 'online'),
(36, '12', '14:08:00', 'logged', '2018-01-25', '0000-00-00', 'online'),
(37, '11', '14:08:26', 'logged', '2018-01-25', '0000-00-00', 'online'),
(38, '12', '14:08:35', 'logged', '2018-01-25', '0000-00-00', 'online'),
(39, '11', '14:15:02', 'logged', '2018-01-25', '0000-00-00', 'online'),
(40, '12', '14:15:18', 'logged', '2018-01-25', '0000-00-00', 'online'),
(41, 'admin', '14:23:28', 'logged', '2018-01-25', '0000-00-00', 'online'),
(42, '12', '14:31:51', 'logged', '2018-01-25', '0000-00-00', 'online'),
(43, '12', '14:32:36', 'logged', '2018-01-25', '0000-00-00', 'online'),
(44, 'admin', '16:10:55', 'logged', '2018-01-25', '0000-00-00', 'online'),
(45, '12', '16:18:47', 'logged', '2018-01-25', '0000-00-00', 'online'),
(46, 'admin', '16:19:16', 'logged', '2018-01-25', '0000-00-00', 'online'),
(47, '12', '16:30:14', 'logged', '2018-01-25', '0000-00-00', 'online'),
(48, '12', '16:37:27', 'logged', '2018-01-25', '0000-00-00', 'online'),
(49, '12', '16:37:38', 'logged', '2018-01-25', '0000-00-00', 'online'),
(50, '12', '09:02:38', 'logged', '2018-01-26', '0000-00-00', 'online'),
(51, '12', '09:19:33', 'logged', '2018-01-26', '0000-00-00', 'online'),
(52, '12', '09:24:59', 'logged', '2018-01-26', '0000-00-00', 'online'),
(53, 'admin', '11:06:53', 'logged', '2018-01-26', '0000-00-00', 'online'),
(54, '12', '13:03:34', 'logged', '2018-01-26', '0000-00-00', 'online'),
(55, 'admin', '13:03:46', 'logged', '2018-01-26', '0000-00-00', 'online'),
(56, '12', '15:41:42', 'logged', '2018-01-28', '0000-00-00', 'online'),
(57, 'admin', '17:13:48', 'logged', '2018-01-28', '0000-00-00', 'online'),
(58, 'admin', '07:29:22', 'logged', '2018-01-29', '0000-00-00', 'online'),
(59, 'admin', '07:29:29', 'logged', '2018-01-29', '0000-00-00', 'online'),
(60, '12', '07:29:36', 'logged', '2018-01-29', '0000-00-00', 'online'),
(61, '11', '07:30:03', 'logged', '2018-01-29', '0000-00-00', 'online'),
(62, '12', '07:41:47', 'logged', '2018-01-29', '0000-00-00', 'online'),
(63, 'admin', '07:42:16', 'logged', '2018-01-29', '0000-00-00', 'online'),
(64, '12', '07:46:27', 'logged', '2018-01-29', '0000-00-00', 'online'),
(65, 'admin', '07:47:03', 'logged', '2018-01-29', '0000-00-00', 'online'),
(66, 'admin', '07:53:02', 'logged', '2018-01-29', '0000-00-00', 'online'),
(67, 'admin', '13:20:09', 'logged', '2018-01-29', '0000-00-00', 'online'),
(68, '12', '13:22:49', 'logged', '2018-01-29', '0000-00-00', 'online'),
(69, '11', '13:23:18', 'logged', '2018-01-29', '0000-00-00', 'online'),
(70, 'admin', '13:23:59', 'logged', '2018-01-29', '0000-00-00', 'online'),
(71, '11', '08:26:11', 'logged', '2018-01-30', '0000-00-00', 'online'),
(72, 'admin', '12:39:03', 'logged', '2018-01-30', '0000-00-00', 'online'),
(73, '11', '12:41:30', 'logged', '2018-01-30', '0000-00-00', 'online'),
(74, 'admin', '15:47:30', 'logged', '2018-01-30', '0000-00-00', 'online'),
(75, '11', '16:12:13', 'logged', '2018-01-30', '0000-00-00', 'online'),
(76, 'admin', '16:13:30', 'logged', '2018-01-30', '0000-00-00', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IDuser` varchar(6) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `IDPengguna` varchar(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IDuser`, `username`, `password`, `IDPengguna`, `status`) VALUES
('USR01', 'adi', 'c4ca4238a0b923820dcc509a6f75849b', 'PG001', 'ADMIN'),
('USR02', '11', '6512bd43d9caa6e02c990b0a82652dca', 'PT003', 'PETERNAK'),
('USR03', 'admin', '202cb962ac59075b964b07152d234b70', 'PG001', 'ADMIN'),
('USR04', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'PT002', 'PETERNAK');

-- --------------------------------------------------------

--
-- Table structure for table `statuspengguna`
--

CREATE TABLE `statuspengguna` (
  `IDstatus` varchar(6) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbdatakandang`
--

CREATE TABLE `tbdatakandang` (
  `IDDataKandang` varchar(6) NOT NULL,
  `IDPeternak` varchar(6) NOT NULL,
  `IDJenisKandang` varchar(6) NOT NULL,
  `Lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdatakandang`
--

INSERT INTO `tbdatakandang` (`IDDataKandang`, `IDPeternak`, `IDJenisKandang`, `Lokasi`) VALUES
('KDG01', 'PT001', 'JK002', 'Barimbun'),
('KDG02', 'PT003', 'JK001', 'Tanta'),
('KDG03', 'PT002', 'JK001', 'Pembataan');

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
('JK002', '400', '4500'),
('JK003', '800', '6000');

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
('PK001', 'starter', 'confid'),
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
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `IDPegawai` varchar(6) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Alamat` varchar(30) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`IDPegawai`, `Nama`, `Status`, `Alamat`, `TanggalLahir`, `Nohp`) VALUES
('PG001', 'Rahmat Dermawan', 'status', 'Amuntai', '1975-10-31', '081288980'),
('PG002', 'sdfsdf', 'sdfsdfs', 'dfsdf', '2018-01-18', '343');

-- --------------------------------------------------------

--
-- Table structure for table `tbpemeliharaanharian`
--

CREATE TABLE `tbpemeliharaanharian` (
  `IDPHarian` varchar(6) NOT NULL,
  `IDProduksi` varchar(6) NOT NULL,
  `MingguKe` varchar(10) NOT NULL,
  `Tanggal` date NOT NULL,
  `Umur` varchar(11) NOT NULL,
  `PakanStd` varchar(15) NOT NULL,
  `PakanAct` varchar(15) NOT NULL,
  `IDPakan` varchar(6) NOT NULL,
  `Mati` varchar(11) NOT NULL,
  `Culling` varchar(15) NOT NULL,
  `Afkir` varchar(15) NOT NULL,
  `IDOVK` varchar(6) NOT NULL,
  `OVKPakai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpemeliharaanharian`
--

INSERT INTO `tbpemeliharaanharian` (`IDPHarian`, `IDProduksi`, `MingguKe`, `Tanggal`, `Umur`, `PakanStd`, `PakanAct`, `IDPakan`, `Mati`, `Culling`, `Afkir`, `IDOVK`, `OVKPakai`) VALUES
('PH01', 'PR004', '1', '2018-01-04', '1', '21', '21', 'PK001', '21', '122', '11', 'OV001', '11'),
('PH02', 'weq', 'we', '2018-01-03', 'ee', 'ee', 'ee', 'ee', 'ee', 'ee', 'ee', 'ee', 'ee'),
('PH03', 'PR004', 'sd', '2018-01-03', '3', 'sd', 'sd', '3e', '32', 'df', 'we', '34', 'df'),
('PH04', 'PR004', 's', '2018-01-03', 'ss', 's', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss'),
('PH05', 'PR004', 'df', '2018-01-03', 'df', 'df', 'df', 'dd', 'df', 'df', 'df', 'dd', 'df'),
('PH06', 'PR004', '2', '2018-12-02', '2', '2', '3', '32', '3', '2', '23', '23', '23');

-- --------------------------------------------------------

--
-- Table structure for table `tbpemeliharaanmingguan`
--

CREATE TABLE `tbpemeliharaanmingguan` (
  `IDPMingguan` varchar(6) NOT NULL,
  `IDProduksi` varchar(6) NOT NULL,
  `MingguKe-` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanbibit`
--

CREATE TABLE `tbpenyerahanbibit` (
  `IDProduksi` varchar(6) NOT NULL,
  `IDPeternak` varchar(6) NOT NULL,
  `IDSupplier` varchar(6) NOT NULL,
  `Strain` varchar(10) NOT NULL,
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
('PR002', 'PT001', 'SPL03', 'Platinum', '2018-01-05', '33', '444', 'Feb16', 'Tidak Normal', 'KDG01'),
('PR004', 'PT003', 'SPL04', 'Starter', '2018-01-13', '200', '3000', 'Feb18', 'Normal', 'KDG02');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanovk`
--

CREATE TABLE `tbpenyerahanovk` (
  `IDPenyerahanOVK` varchar(6) NOT NULL,
  `IDProduksi` varchar(6) NOT NULL,
  `TglTerimaOVK` date NOT NULL,
  `SJOVK` text NOT NULL,
  `Periode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenyerahanovk`
--

INSERT INTO `tbpenyerahanovk` (`IDPenyerahanOVK`, `IDProduksi`, `TglTerimaOVK`, `SJOVK`, `Periode`) VALUES
('PVK01', 'PR004', '2018-01-12', '12221', 'Feb16');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenyerahanpakan`
--

CREATE TABLE `tbpenyerahanpakan` (
  `IDPenyerahanPakan` varchar(6) NOT NULL,
  `IDProduksi` varchar(6) NOT NULL,
  `TglTerimaPakan` date NOT NULL,
  `SJPakan` text NOT NULL,
  `Periode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenyerahanpakan`
--

INSERT INTO `tbpenyerahanpakan` (`IDPenyerahanPakan`, `IDProduksi`, `TglTerimaPakan`, `SJPakan`, `Periode`) VALUES
('PNP01', 'PR004', '2018-01-13', '123212111', 'Feb18');

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
('PB002', 'Februari', '2014', 'SPL01', 'Starter', '2000'),
('PB003', 'Januari', '2013', 'SPL04', 'Starter', '2000'),
('PB004', 'Januari', '2015', 'SPL03', 'Platinum', '1200');

-- --------------------------------------------------------

--
-- Table structure for table `tbpeternak`
--

CREATE TABLE `tbpeternak` (
  `IDPeternak` varchar(6) NOT NULL,
  `NamaPeternak` text NOT NULL,
  `Alamat` text NOT NULL,
  `TanggalLahir` date NOT NULL,
  `NoKTP` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpeternak`
--

INSERT INTO `tbpeternak` (`IDPeternak`, `NamaPeternak`, `Alamat`, `TanggalLahir`, `NoKTP`) VALUES
('PT001', 'abul', 'bajut', '1987-01-11', '33333744352243245'),
('PT002', 'udin', 'tanjung selatan', '2018-12-31', '766767687755878787'),
('PT003', 'ijal', 'mangkusip', '1920-10-30', '2323236755');

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
-- Indexes for table `log_login`
--
ALTER TABLE `log_login`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDuser`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_login`
--
ALTER TABLE `log_login`
  MODIFY `no` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
