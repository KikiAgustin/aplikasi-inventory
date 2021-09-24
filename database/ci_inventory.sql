-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 02:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kd_absen` int(10) NOT NULL,
  `tgl_absen` date NOT NULL,
  `waktu_absen` varchar(25) NOT NULL,
  `kd_user` int(10) NOT NULL,
  `absen` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kd_absen`, `tgl_absen`, `waktu_absen`, `kd_user`, `absen`, `keterangan`) VALUES
(1, '2021-06-20', '14:49', 1, 'Masuk', 'Terlambat'),
(2, '2021-06-24', '07:09', 1, 'Masuk', 'Tepat Waktu'),
(3, '2021-06-25', '07:30', 1, 'Masuk', 'Tepat Waktu');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(10) NOT NULL,
  `kd_kategori` int(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `stok` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `kd_bk` int(10) NOT NULL,
  `tgl_bk` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `jumlah_bk` int(25) NOT NULL,
  `keterangan` text NOT NULL,
  `kd_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `kd_bm` int(10) NOT NULL,
  `tgl_bm` date NOT NULL,
  `kd_barang` int(10) NOT NULL,
  `kd_suplayer` int(10) NOT NULL,
  `jumlah_bm` int(25) NOT NULL,
  `keterangan` text NOT NULL,
  `kd_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `kd_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suplayer`
--

CREATE TABLE `suplayer` (
  `kd_suplayer` int(10) NOT NULL,
  `nama_suplayer` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `kd_user` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kd_pegawai` int(10) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`kd_user`, `username`, `password`, `level`, `nama`, `kd_pegawai`, `posisi`) VALUES
(1, 'kiki', '0d61130a6dd5eea85c2c5facfe1c15a7', 1, 'Kiki Agustin', 13136775, 'Admin'),
(3, 'mia', '5102ecd3d47f6561de70979017b87a80', 2, 'Mia Sri Lestari', 13136777, 'HRD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`kd_bk`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`kd_bm`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `suplayer`
--
ALTER TABLE `suplayer`
  ADD PRIMARY KEY (`kd_suplayer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kd_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `kd_bk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `kd_bm` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `kd_kategori` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suplayer`
--
ALTER TABLE `suplayer`
  MODIFY `kd_suplayer` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `kd_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
