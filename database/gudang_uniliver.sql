-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 04:22 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_uniliver`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(30) NOT NULL,
  `nm_barang` varchar(100) NOT NULL,
  `jns_barang` int(1) NOT NULL,
  `isi_ls` varchar(9) NOT NULL,
  `harga_ls` int(12) NOT NULL,
  `harga_biji` int(12) NOT NULL,
  `stok_carton` int(30) NOT NULL,
  `stok_pcs` int(30) NOT NULL,
  `stts` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nm_barang`, `jns_barang`, `isi_ls`, `harga_ls`, `harga_biji`, `stok_carton`, `stok_pcs`, `stts`) VALUES
(1, 'livebuoy putih', 2, '2', 4343, 3434343, 19, 20, '1'),
(2, 'pepsodent', 2, '2', 30000, 200000, 13, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kd_jenisbrg` int(1) NOT NULL,
  `jns_barang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kd_jenisbrg`, `jns_barang`) VALUES
(1, 'Home Care'),
(2, 'Personal Care');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_transaksi`
--

CREATE TABLE `jenis_transaksi` (
  `kd_jenis` int(1) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_transaksi`
--

INSERT INTO `jenis_transaksi` (`kd_jenis`, `jenis`) VALUES
(1, 'Barang Masuk'),
(2, 'Barang Keluar');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(40) NOT NULL,
  `kd_barang` int(30) NOT NULL,
  `tgl_transaksi` varchar(12) NOT NULL,
  `jns_transaksi` int(1) NOT NULL,
  `carton` int(10) NOT NULL,
  `pcs` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `kd_barang`, `tgl_transaksi`, `jns_transaksi`, `carton`, `pcs`) VALUES
(1, 1, '03-06-2017', 2, 1, '0'),
(2, 1, '03-06-2017', 1, 2, '4'),
(3, 1, '30-06-2017', 1, 4, '0'),
(4, 1, '30-06-2017', 1, 0, '5'),
(5, 1, '30-06-2017', 2, 0, '7'),
(6, 1, '30-06-2017', 2, 3, '0'),
(7, 1, '18-08-2017', 1, 6, '9');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `sandi` varchar(30) NOT NULL,
  `level_akses` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `namauser`, `sandi`, `level_akses`) VALUES
(10, 'akbar', 'akbar', '1'),
(11, 'deni', 'deni', '2'),
(12, 'nono', 'nono', '3'),
(13, 'ika', 'lala', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kd_jenisbrg`);

--
-- Indexes for table `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `kd_jenisbrg` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_transaksi`
--
ALTER TABLE `jenis_transaksi`
  MODIFY `kd_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
