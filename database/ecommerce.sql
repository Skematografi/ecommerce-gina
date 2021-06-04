-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 02:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` varchar(7) NOT NULL,
  `id_produk` varchar(7) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `harga`, `jumlah`) VALUES
(6, 'ODR001', 'PROD006', 12000, 1),
(7, 'ODR002', 'PROD011', 5000, 1),
(8, 'ODR003', 'PROD011', 5000, 1),
(9, 'ODR004', 'PROD014', 30000, 6),
(10, 'ODR005', 'PROD013', 25000, 1),
(11, 'ODR006', 'PROD007', 35000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telpon` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `jenis_kelamin`, `email`, `telpon`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`) VALUES
('PLGN002', 'Ilham', 'L', 'ilham@gmail.com', '021', 'Jl. Maulana Ibrahim No. 32', 'Banten', 'Lebak', 'cirinten', 53770),
('PLGN003', 'Admin', '', 'admin@gmail.com', '', '', '', '', '', 0),
('PLGN004', 'Windi', '', 'windi@gmail.com', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(7) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `telpon_pelanggan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal`, `id_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`, `kabupaten`, `kecamatan`, `alamat`, `ongkir`, `total`, `status`) VALUES
('ODR002', '2020-01-29', 'PLGN002', 'Ilham', '021', 'Lebak', 'banjarsari', 'Bitung', 10000, 15000, 0),
('ODR003', '2020-01-29', 'PLGN002', 'Wiwi', '021', 'Lebak', 'maja', 'Bitung', 10000, 15000, 0),
('ODR004', '2020-01-29', 'PLGN002', 'Endang', '023', 'Lebak', 'gunungkencana', 'Gunung', 10000, 190000, 0),
('ODR005', '2020-01-30', 'PLGN002', 'Nur', '0213333', 'Lebak', 'banjarsari', 'Banjar', 10000, 35000, 1),
('ODR006', '2020-01-30', 'PLGN002', 'Wanda', '021', 'Lebak', 'cipanas', 'Banjar', 10000, 185000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(7) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `kategori` text NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `deskripsi`, `gambar`, `harga`, `berat`, `stok`) VALUES
('PROD005', 'Pengki', 'bersih, kotor, pengki, alat sampah', 'Pengki plastik bahan terbaik.', 'pengki.jpg', 15000, 1, 0),
('PROD006', 'Hanger', 'hanger, gantungan, baju, jemuran, pakaian', 'Gantungan baju untuk jemur dan dilemari.', 'hanger.jpg', 12000, 2, 34),
('PROD007', 'Tempat Sampah', 'tempat sampah, bersih, kotor', 'Tempat sampah dalam ruangan.', 'tempat_sampah.jpg', 35000, 3, 20),
('PROD008', 'Sapu Lidi', 'sapu, lidi, bersih, kotor', 'Bahan kualitas terbaik.', '25.jpg', 13500, 1, 20),
('PROD009', 'Sapu Ijuk', 'sapu,ijuk, bersih, kotor, alat rumah tangga', 'Bahan kualitas terbaik.', '16.jpg', 17000, 1, 33),
('PROD010', 'Ember Besar', 'ember,tempat air,besar,plastik', 'Bahan kualitas terbaik.', '17.jpg', 25000, 3, 21),
('PROD011', 'Sikat Baju', 'sikat, baju, kayu,cuci', 'Bahan kualitas terbaik.', '22.jpg', 5000, 1, 50),
('PROD012', 'Sikat Toilet', 'sikat, toilet, lantai, kloset, kamar mandi, wc', 'Bahan kualitas terbaik.', '7.jpg', 25000, 2, 0),
('PROD013', 'Sikat Kloset', 'sikat, kloset, wc, kamar mandi', 'Bahan kualitas terbaik.', '5.jpg', 25000, 2, 20),
('PROD014', 'Pel Lantai', 'pel, lantai, bersih, licin', 'Bahan kualitas terbaik.', '8.jpg', 30000, 2, 11),
('PROD015', 'Kursi Plastik', 'kursi, plastik, tempat duduk', 'Bahan dari kualitas terbaik.', '20.jpg', 70000, 3, 200),
('PROD016', 'Lemari Plastik', 'lemari, tempat baju, laci, tempat simpan', 'Bahan dari kualitas terbaik.', '21.jpg', 350000, 10, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `id_role`, `status`) VALUES
(2, 'Ilham', 'ilham@gmail.com', '$2y$10$sm0Gq7n/U89TkGFNRdvwpums8vLxDX0U83RpDSIIKSuxTNRWQJT.S', 2, 1),
(9, 'Admin', 'admin@gmail.com', '$2y$10$fcI3S/kM5CJpv7Q7KSwXyOzI0i.U6JKS9trfBDhiMoVOJvSHc2MGG', 1, 1),
(10, 'Windi', 'windi@gmail.com', '$2y$10$4ki.MGRPsdEzDCW.tKBy3.rK/GJi7YINAGyNmAMiCItOhVOsR0Tpu', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `level`) VALUES
(1, 'Admin'),
(2, 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
