-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 06:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `Kategori` varchar(50) NOT NULL,
  `Penulis` varchar(50) NOT NULL,
  `tahun_terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul_buku`, `Kategori`, `Penulis`, `tahun_terbit`) VALUES
(5, 'Ilmu Pengetahuan Sosial', 'Ilmu Pengetahuan', 'Haitani Ran', '2022-01-11'),
(9, 'Kancil', 'dongeng', 'pak sueb', '2022-01-20'),
(10, 'Memasak Lezat, Di Rumah', 'Masakan', 'Chef Arnold', '2022-01-13'),
(11, 'Apa itu NFT', 'Crypto', 'Ghozali Everyday', '2022-01-08'),
(12, 'Tokyo Revengers', 'Turun Di Jalur', 'Mickey Kun', '2022-01-21'),
(13, 'Cara Menjadi Kaya', 'Fiksi,Mitos', 'Ahmad Dani', '2022-01-14'),
(16, 'Belajar Giat', 'Pelajaran', 'Budi sastro', '2022-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjam`
--

CREATE TABLE `tbl_peminjam` (
  `kode` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `judul_buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_peminjam`
--

INSERT INTO `tbl_peminjam` (`kode`, `nama_peminjam`, `jenis_kelamin`, `judul_buku`) VALUES
(2, 'Madara', 'Laki-laki', 'Ilmu Pengetahuan Sosial'),
(9, 'arik', 'laki-laki', 'Ilmu Pengetahuan Sosial'),
(12, 'suli', 'laki', 'Kancil'),
(14, 'aaa', 'P', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Hak_Akses` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `username`, `password`, `Hak_Akses`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'operator', 'operator', 'operator', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_peminjam`
--
ALTER TABLE `tbl_peminjam`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_peminjam`
--
ALTER TABLE `tbl_peminjam`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
