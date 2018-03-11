-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2018 at 01:44 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
('USR02', 'abdul', '6512bd43d9caa6e02c990b0a82652dca', 'PT003', 'PETERNAK'),
('USR03', 'admin', '202cb962ac59075b964b07152d234b70', 'PG001', 'ADMIN'),
('USR06', 'amat', '202cb962ac59075b964b07152d234b70', 'PT002', 'PETERNAK'),
('USR07', '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'PT001', 'PETERNAK');

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
('KDG03', 'PT002', 'JK003', 'Pembataan');

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
('JK001', '20m x 10m', '1500'),
('JK002', '20m x 20m', '4500'),
('JK003', '40m x 8m', '6000');

-- --------------------------------------------------------

--
-- Table structure for table `tbovk`
--

CREATE TABLE `tbovk` (
  `IDOVK` varchar(6) NOT NULL,
  `NamaOVK` varchar(30) NOT NULL,
  `Satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbovk`
--

INSERT INTO `tbovk` (`IDOVK`, `NamaOVK`, `Satuan`) VALUES
('OV001', 'SULVAC (Obat Lalat)', 'BKS'),
('OV002', 'MEDIVAC ND IB @ 1000 DS', 'VIAL'),
('OV003', 'AMMOTROL @250 GR', 'BKS');

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
('PK001', 'Starter', 'BR 1 SP'),
('PK002', 'Starter', 'WK');

-- --------------------------------------------------------

--
-- Table structure for table `tbpanen`
--

CREATE TABLE `tbpanen` (
  `IDPanen` varchar(6) NOT NULL,
  `IDProduksi` varchar(6) NOT NULL,
  `TanggalPengiriman` date NOT NULL,
  `Umur` varchar(3) NOT NULL,
  `JumlahAyam` varchar(10) NOT NULL,
  `TotalBerat` varchar(10) NOT NULL,
  `BeratRata` varchar(10) NOT NULL,
  `NamaPembeli` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpanen`
--

INSERT INTO `tbpanen` (`IDPanen`, `IDProduksi`, `TanggalPengiriman`, `Umur`, `JumlahAyam`, `TotalBerat`, `BeratRata`, `NamaPembeli`) VALUES
('PN001', 'PR004', '2018-02-10', '28', '1800', '2500', '18', 'Haji Teteh');

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE `tbpegawai` (
  `IDPegawai` varchar(6) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Alamat` text NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`IDPegawai`, `Nama`, `Status`, `Alamat`, `TanggalLahir`, `Nohp`) VALUES
('PG001', 'Rahmat Dermawan', 'PPL', 'Amuntai', '1975-10-31', '081288980008'),
('PG002', 'Sugeng Riyadi', 'MP', 'Kambitin', '1980-01-18', '081240044344'),
('PG003', 'Dessy Fatma', 'ADM', 'Tanjung Tengah', '1991-11-04', '085276778777'),
('PG004', 'Muhammad Ridha ', 'KORLAP', 'Mabuun', '2018-02-22', '082155754323');

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
('PH01', 'PR004', '1', '2018-02-06', '1', '2', '0', 'PK001', '1', '0', '0', 'OV001', '1'),
('PH02', 'PR004', '1', '2018-02-07', '1', '0', '1', 'PK002', '1', '0', '0', 'OV002', '1'),
('PH03', 'PR005', '1', '2018-02-01', '1', '0', '1', 'PK002', '1', '0', '0', 'OV003', '1'),
('PH04', 'PR002', '1', '2018-02-01', '1', '1', '0', 'PK001', '2', '0', '0', 'OV003', '1');

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
('PR002', 'PT001', 'SPL03', 'Starter', '2018-01-05', '1000', '500', 'Feb16', 'Normal', 'KDG01'),
('PR004', 'PT003', 'SPL04', 'Starter', '2018-01-13', '2000', '1500', 'Feb18', 'Normal', 'KDG02'),
('PR005', 'PT002', 'SPL04', 'Starter', '2018-02-10', '500', '1000', 'Feb18', 'Normal', 'KDG03');

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
('PVK01', 'PR004', '2018-01-12', 'so/no/7.4/17-5', 'Feb16');

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
('PNP01', 'PR004', '2018-01-13', 'so/no/7.8/18', 'Feb18');

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
  `NoKTP` varchar(25) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpeternak`
--

INSERT INTO `tbpeternak` (`IDPeternak`, `NamaPeternak`, `Alamat`, `TanggalLahir`, `NoKTP`, `foto`) VALUES
('PT001', 'abdul Qadir', 'Warukin, Kecamatan Tanta', '1987-01-11', '6309037443522432', ''),
('PT002', 'Hasbiannur', 'Tanjung selatan, Kec. Murung Pudak', '1979-12-31', '6909668765598766', ''),
('PT003', 'Rijali Fuadi', 'Desa Mangkusip, Kec. Tanta', '1975-10-02', '6309000000343533', ''),
('PT004', 'Nganu', 'Nganu', '2016-01-07', '98967666554', 'none.gif'),
('PT005', 'a', 'a', '2017-11-10', '1', 'none.gif');

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
('SPL01', 'Haji Assad', 'Belimbing', '085632123322'),
('SPL03', 'Abuk', 'Banjarbaru', '081250055455'),
('SPL04', 'dandi', 'Martapura', '081244555455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IDuser`),
  ADD KEY `IDPengguna` (`IDPengguna`);

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
-- Indexes for table `tbpegawai`
--
ALTER TABLE `tbpegawai`
  ADD PRIMARY KEY (`IDPegawai`);

--
-- Indexes for table `tbpemeliharaanharian`
--
ALTER TABLE `tbpemeliharaanharian`
  ADD PRIMARY KEY (`IDPHarian`);

--
-- Indexes for table `tbpenyerahanbibit`
--
ALTER TABLE `tbpenyerahanbibit`
  ADD PRIMARY KEY (`IDProduksi`),
  ADD KEY `IDPeternak` (`IDPeternak`),
  ADD KEY `IDSupplier` (`IDSupplier`);

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
