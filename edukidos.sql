-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 07:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edukidos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` varchar(255) NOT NULL,
  `id_kategori` int(255) NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `harga_jual` int(255) NOT NULL,
  `harga_beli` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `id_kategori`, `nama_bahan`, `harga_jual`, `harga_beli`) VALUES
('2', 1, 'AC 230', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `no_telp`) VALUES
('1', 'Edrian', 'bogor', '08888');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
('1', 'A3'),
('2', 'Indoor');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id_order` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `no_po` text NOT NULL,
  `urgensi` int(1) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` text NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `file` text NOT NULL,
  `panjang` int(255) NOT NULL,
  `lebar` int(255) NOT NULL,
  `biaya_design` int(255) NOT NULL,
  `harga_bahan` int(255) NOT NULL,
  `catatan` text NOT NULL,
  `finishing` text NOT NULL,
  `status` int(1) NOT NULL,
  `status_bayar` int(1) NOT NULL,
  `spk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id_order`, `tgl_order`, `no_po`, `urgensi`, `nama`, `no_telp`, `kategori`, `id_barang`, `jumlah`, `file`, `panjang`, `lebar`, `biaya_design`, `harga_bahan`, `catatan`, `finishing`, `status`, `status_bayar`, `spk`) VALUES
('62a8bf46aad36', '2022-06-14', '123123', 1, '1', '', '1', '2', 1, '62a8bf46aad36.png', 100, 122, 3, 3, 'asdasdasdasdasdasdasd', '', 1, 0, 'ayyash');

--
-- Triggers `orderan`
--
DELIMITER $$
CREATE TRIGGER `barang_keluar` AFTER INSERT ON `orderan` FOR EACH ROW UPDATE stok  
SET 
  stok = stok-NEW.jumlah
WHERE 
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_beli` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_beli`, `id_barang`, `jumlah`, `tgl_beli`) VALUES
(1, '2', 1, '2022-06-13');

--
-- Triggers `pembelian`
--
DELIMITER $$
CREATE TRIGGER `barang_masuk` AFTER INSERT ON `pembelian` FOR EACH ROW UPDATE stok
SET
 stok = stok+NEW.jumlah
WHERE
  id_barang = NEW.id_barang
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` varchar(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_barang` varchar(255) NOT NULL,
  `stok` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_barang`, `stok`) VALUES
('2', 188);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `role`) VALUES
(1, 'ayyash', 'Ayyash Mumtaz Hafidz', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_beli`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_beli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
