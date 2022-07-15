-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 03:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemilwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kandidat`
--

CREATE TABLE `tbl_kandidat` (
  `id_kandidat` int(10) NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `motto` text NOT NULL,
  `organisasi` enum('HMJ','SEMA','DEMA','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kandidat`
--

INSERT INTO `tbl_kandidat` (`id_kandidat`, `nama_kandidat`, `image`, `visi`, `misi`, `motto`, `organisasi`) VALUES
(3, 'adit', '1.png', 'membuat tugas', 'tugas web', 'garap lah tugase', 'HMJ'),
(4, 'Mark', 'youtube-premium-its-a-mans-world.jpg', 'gaktau', 'sedang malas', 'YNTKTS', 'HMJ'),
(5, 'wong XuXah', 'hq720_2.jpg', 'ngelu nugas teros', 'gak usah ngarap ae', 'Wong Urip kudu Xawang Xinawang ', 'HMJ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pilihan`
--

CREATE TABLE `tbl_pilihan` (
  `id_pil` int(11) NOT NULL,
  `id_kandidat` int(10) NOT NULL,
  `nim` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nim` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nim`, `nama`, `password`, `status`) VALUES
(1001, 'andri', '6bd3108684ccc9dfd40b126877f850b0', 1),
(1002, 'coba', 'c3ec0f7b054e729c5a716c8125839829', 1),
(1003, 'mana', '582fc884d6299814fbd4f12c1f9ae70f', 1),
(1011, 'Markques', 'ea82410c7a9991816b5eeeebe195e20a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_kandidat`
--
ALTER TABLE `tbl_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indexes for table `tbl_pilihan`
--
ALTER TABLE `tbl_pilihan`
  ADD PRIMARY KEY (`id_pil`),
  ADD KEY `id_kandidat` (`id_kandidat`,`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kandidat`
--
ALTER TABLE `tbl_kandidat`
  MODIFY `id_kandidat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pilihan`
--
ALTER TABLE `tbl_pilihan`
  MODIFY `id_pil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pilihan`
--
ALTER TABLE `tbl_pilihan`
  ADD CONSTRAINT `tbl_pilihan_ibfk_1` FOREIGN KEY (`id_kandidat`) REFERENCES `tbl_kandidat` (`id_kandidat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pilihan_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `tbl_user` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
