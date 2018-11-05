-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 02:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bengkel`
--

CREATE TABLE `bengkel` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `jenis` varchar(7) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(7) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bengkel`
--

INSERT INTO `bengkel` (`id`, `id_produk`, `nama_produk`, `jenis`, `harga`, `stok`, `keterangan`) VALUES
(206, 'YM 01', 'Yamalube Oil', 'Barang', 40000, 40, 'Tersedia'),
(212, 'RT01', 'Rante Motor', 'Barang', 70000, 47, 'Tersedia'),
(209, 'VN01', 'Ven Bel', 'Barang', 30000, 43, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--
-- Error reading structure for table belajar_bengkel.detailpenjualan: #1932 - Table 'belajar_bengkel.detailpenjualan' doesn't exist in engine
-- Error reading data for table belajar_bengkel.detailpenjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `belajar_bengkel`.`detailpenjualan`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` int(11) NOT NULL,
  `nonota` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `jenis` varchar(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_produk` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `nonota`, `tanggal_transaksi`, `nama_produk`, `jenis`, `harga`, `jumlah`, `total`, `id_produk`) VALUES
(6, 1, '2018-03-01', 'Yamalube Oil', 'Barang', 40000, 1, 40000, 'YM 01'),
(7, 2, '2018-03-01', 'Ven Bel', 'Barang', 30000, 1, 180000, 'VN01'),
(8, 2, '2018-03-01', 'Ban Mobil', 'Barang', 150000, 1, 180000, 'TR01'),
(9, 3, '2018-03-03', 'Ban Motor', 'Barang', 100000, 2, 280000, 'TR02'),
(10, 3, '2018-03-03', 'Ban Dalam Motor', 'Barang', 40000, 2, 280000, 'TR03'),
(11, 4, '2018-03-06', 'Rante Motor', 'Barang', 70000, 1, 70000, 'RT01'),
(12, 5, '2018-03-07', 'Rante Motor', 'Barang', 70000, 2, 140000, 'RT01'),
(13, 6, '2018-03-13', 'Yamalube Oil', 'Barang', 40000, 2, 80000, 'YM 01'),
(14, 7, '2018-05-31', 'Yamalube Oil', 'Barang', 40000, 1, 40000, 'YM 01');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `id_produk` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Aqkly Hermawan', 'aqkly.hermawan@gmail.com', 'siaptempur'),
(2, 'Resti Asfiani', 'asfiani.resti123@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--
-- Error reading structure for table belajar_bengkel.penjualan: #1932 - Table 'belajar_bengkel.penjualan' doesn't exist in engine
-- Error reading data for table belajar_bengkel.penjualan: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `belajar_bengkel`.`penjualan`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama_bengkel` varchar(35) NOT NULL,
  `alamat` varchar(53) NOT NULL,
  `pemilik` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama_bengkel`, `alamat`, `pemilik`) VALUES
(1, 'Bengkel Urang Sunda', 'Jl.jakarta Bandung', 'Aqkly Hermawan');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_transaksi`
--

CREATE TABLE `tambah_transaksi` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(35) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(35) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` int(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--
-- Error reading structure for table belajar_bengkel.tblbarang: #1932 - Table 'belajar_bengkel.tblbarang' doesn't exist in engine
-- Error reading data for table belajar_bengkel.tblbarang: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `belajar_bengkel`.`tblbarang`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `tblsementara`
--
-- Error reading structure for table belajar_bengkel.tblsementara: #1932 - Table 'belajar_bengkel.tblsementara' doesn't exist in engine
-- Error reading data for table belajar_bengkel.tblsementara: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `belajar_bengkel`.`tblsementara`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nonota` int(10) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `nama_pelanggan` varchar(35) NOT NULL,
  `harga` int(35) NOT NULL,
  `uang_bayar` int(35) NOT NULL,
  `uang_kembali` int(35) NOT NULL,
  `admin` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nonota`, `tanggal_transaksi`, `nama_pelanggan`, `harga`, `uang_bayar`, `uang_kembali`, `admin`) VALUES
(6, 2, '2018-03-01', 'Salwa Annisa', 180000, 200000, 20000, 'Resti Asfiani'),
(5, 1, '2018-03-01', 'Aprillia nurarifah', 40000, 50000, 10000, 'Resti Asfiani'),
(7, 3, '2018-03-03', 'Aulia Yasmin', 280000, 300000, 20000, 'Resti Asfiani'),
(8, 4, '2018-03-06', 'Mutia Danisya', 70000, 100000, 30000, 'Aqkly Hermawan'),
(9, 5, '2018-03-07', 'Sofiah Jamilah', 140000, 150000, 10000, 'Resti Asfiani'),
(10, 6, '2018-03-13', 'juned', 80000, 100000, 20000, 'Resti Asfiani'),
(11, 7, '2018-05-31', 'Junaidi', 40000, 50000, 10000, 'Resti Asfiani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bengkel`
--
ALTER TABLE `bengkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tambah_transaksi`
--
ALTER TABLE `tambah_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bengkel`
--
ALTER TABLE `bengkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tambah_transaksi`
--
ALTER TABLE `tambah_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
