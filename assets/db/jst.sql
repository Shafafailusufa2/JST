-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2017 at 01:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE IF NOT EXISTS `bobot` (
`id_bobot` int(10) NOT NULL,
  `param` double NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL,
  `x4` double NOT NULL,
  `x5` double NOT NULL,
  `b1` double NOT NULL,
  `z` double NOT NULL,
  `b2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_b1`
--

CREATE TABLE IF NOT EXISTS `bobot_b1` (
`id_bobot` int(10) NOT NULL,
  `b_1` double NOT NULL,
  `b_1e` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_b2`
--

CREATE TABLE IF NOT EXISTS `bobot_b2` (
`id_bobot` int(10) NOT NULL,
  `b_2` double NOT NULL,
  `b_2e` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_hidden`
--

CREATE TABLE IF NOT EXISTS `bobot_hidden` (
`id_bobot` int(10) NOT NULL,
  `x1` double NOT NULL,
  `x_1e` double NOT NULL,
  `x2` double NOT NULL,
  `x_2e` double NOT NULL,
  `x3` double NOT NULL,
  `x_3e` double NOT NULL,
  `x4` double NOT NULL,
  `x_4e` double NOT NULL,
  `x5` double NOT NULL,
  `x_5e` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bobot_output`
--

CREATE TABLE IF NOT EXISTS `bobot_output` (
`id_bobot` int(10) NOT NULL,
  `w_1` double NOT NULL,
  `w_1e` double NOT NULL,
  `w_2` double NOT NULL,
  `w_2e` double NOT NULL,
  `w_3` double NOT NULL,
  `w_3e` double NOT NULL,
  `w_4` double NOT NULL,
  `w_4e` double NOT NULL,
  `w_5` double NOT NULL,
  `w_5e` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inisialisasi`
--

CREATE TABLE IF NOT EXISTS `inisialisasi` (
`id_bobot` int(10) NOT NULL,
  `x_1` double NOT NULL,
  `x_1e` double NOT NULL,
  `x_2` double NOT NULL,
  `x_2e` double NOT NULL,
  `x_3` double NOT NULL,
  `x_3e` double NOT NULL,
  `x_4` double NOT NULL,
  `x_4e` double NOT NULL,
  `x_5` double NOT NULL,
  `x_5e` double NOT NULL,
  `b_1` double NOT NULL,
  `b_1e` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
`id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `type` varchar(30) NOT NULL,
  `persen` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `percentage`
--

CREATE TABLE IF NOT EXISTS `percentage` (
`id_percentage` int(5) NOT NULL,
  `value` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `percentage`
--

INSERT INTO `percentage` (`id_percentage`, `value`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
`id_result` int(10) NOT NULL,
  `mse` text NOT NULL,
  `epoch` int(100) NOT NULL,
  `k_jst` text NOT NULL,
  `lr_iw` double NOT NULL,
  `lr_ib` double NOT NULL,
  `lr_lw` double NOT NULL,
  `lr_lb` double NOT NULL,
  `target_mse` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelatihan`
--

CREATE TABLE IF NOT EXISTS `tb_pelatihan` (
`id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `data1` int(10) NOT NULL,
  `data2` int(10) NOT NULL,
  `data3` int(10) NOT NULL,
  `data4` int(10) NOT NULL,
  `data5` int(10) NOT NULL,
  `data6` int(10) NOT NULL,
  `k_jst` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengujian`
--

CREATE TABLE IF NOT EXISTS `tb_pengujian` (
`id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `data1` int(10) NOT NULL,
  `data2` int(10) NOT NULL,
  `data3` int(10) NOT NULL,
  `data4` int(10) NOT NULL,
  `data5` int(10) NOT NULL,
  `data6` int(10) NOT NULL,
  `k_jst` double NOT NULL,
  `persen` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_normalize`
--

CREATE TABLE IF NOT EXISTS `tb_p_normalize` (
`id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `data1` double NOT NULL,
  `data2` double NOT NULL,
  `data3` double NOT NULL,
  `data4` double NOT NULL,
  `data5` double NOT NULL,
  `data6` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_p_normalize_1`
--

CREATE TABLE IF NOT EXISTS `tb_p_normalize_1` (
`id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `data1` double NOT NULL,
  `data2` double NOT NULL,
  `data3` double NOT NULL,
  `data4` double NOT NULL,
  `data5` double NOT NULL,
  `data6` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `hiredate` date NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `hiredate`, `alamat`, `email`, `foto`) VALUES
(1, 'Arman Septian', 'admin', 'januari1993', '2016-04-03', 'Bekasi Barat', 'septian_arman@ymail.com', '04.jpg'),
(2, 'Idah', 'idah', 'januari1993', '0000-00-00', 'Bekasi Timur', 'idah.dpooh@gmail.com', ''),
(3, 'Ariel', 'ariel', 'januari1993', '0000-00-00', 'Bekasi Selatan', 'ariel@gmail.com', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobot_b1`
--
ALTER TABLE `bobot_b1`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobot_b2`
--
ALTER TABLE `bobot_b2`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobot_hidden`
--
ALTER TABLE `bobot_hidden`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `bobot_output`
--
ALTER TABLE `bobot_output`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `inisialisasi`
--
ALTER TABLE `inisialisasi`
 ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `percentage`
--
ALTER TABLE `percentage`
 ADD PRIMARY KEY (`id_percentage`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
 ADD PRIMARY KEY (`id_result`);

--
-- Indexes for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
 ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
 ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_p_normalize`
--
ALTER TABLE `tb_p_normalize`
 ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tb_p_normalize_1`
--
ALTER TABLE `tb_p_normalize_1`
 ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bobot_b1`
--
ALTER TABLE `bobot_b1`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bobot_b2`
--
ALTER TABLE `bobot_b2`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bobot_hidden`
--
ALTER TABLE `bobot_hidden`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bobot_output`
--
ALTER TABLE `bobot_output`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inisialisasi`
--
ALTER TABLE `inisialisasi`
MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `percentage`
--
ALTER TABLE `percentage`
MODIFY `id_percentage` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
MODIFY `id_result` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pelatihan`
--
ALTER TABLE `tb_pelatihan`
MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_p_normalize`
--
ALTER TABLE `tb_p_normalize`
MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_p_normalize_1`
--
ALTER TABLE `tb_p_normalize_1`
MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
