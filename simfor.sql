-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2019 at 06:21 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `judul`, `detail`) VALUES
(1, 'Open Source', 'All About Open Source'),
(2, 'Programming', 'All Programming Language'),
(3, 'Hacking', 'All About Hacking'),
(4, 'Security', 'All About Security'),
(5, 'Free Room', 'Free Room, We Don\'t Care');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tgl_daftar` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `total` int(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `from_user` varchar(20) NOT NULL,
  `to_user` varchar(20) NOT NULL,
  `pesan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `reply` varchar(1000) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `id_topik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE `topik` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `detail` varchar(1000) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `topik`
--
ALTER TABLE `topik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
