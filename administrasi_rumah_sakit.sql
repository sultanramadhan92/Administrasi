-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 01:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `administrasi_rumah_sakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(71, 'sultan.ramadhan', 'sultan12'),
(72, 'mangujang', '123'),
(73, 'bang', 'jago');

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` int(4) NOT NULL,
  `nama_dokter` varchar(25) NOT NULL,
  `spesialis` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_tlp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_tlp`) VALUES
(21, 'bambang', 'jantung', 'karawang', '085766342001'),
(22, 'joni pratama', 'umum', 'bekasi', '081290004356'),
(23, 'danilla', 'pernafasan', 'jakarta', '081386756421'),
(24, 'danur', 'umum', 'cikarang', '087600001111');

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE `data_pasien` (
  `no_rekammedis_inap` int(5) NOT NULL,
  `nama_pasien` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `umur` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `telepon_penanggungjawab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`no_rekammedis_inap`, `nama_pasien`, `jenis_kelamin`, `alamat`, `umur`, `tgl_masuk`, `penanggung_jawab`, `telepon_penanggungjawab`) VALUES
(11, 'saputra', 'L', 'cibitung', '26', '2020-05-02', 'hartono', '085801038872'),
(12, 'maya lestari', 'P', 'cikarang', '34', '2020-05-08', 'purwadi', '081205688950'),
(13, 'putri melati', 'P', 'cikarang', '20', '2020-05-10', 'junaedi', '081298706542'),
(14, 'makmur', 'L', 'bekasi', '40', '2020-05-17', 'supri', '081322001100');

-- --------------------------------------------------------

--
-- Table structure for table `data_perawat`
--

CREATE TABLE `data_perawat` (
  `id_perawat` int(4) NOT NULL,
  `nama_perawat` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_perawat`
--

INSERT INTO `data_perawat` (`id_perawat`, `nama_perawat`, `alamat`, `no_tlp`) VALUES
(31, 'rani', 'cibitung', '085780039876'),
(32, 'anya geraldine', 'pekayon', '08138674002'),
(33, 'berliana lovell', 'cikarang', '081230405060'),
(34, 'jess amalia', 'cikampek', '089600981111'),
(35, 'nikita willy', 'cibarusah', '081300221133');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(10) NOT NULL,
  `nama_kamar` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tarif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `kelas`, `tarif`) VALUES
(51, 'anggrek', '1', '1000000'),
(52, 'mawar', '2', '750000'),
(53, 'melati', '3', '500000'),
(54, 'sakura', '4', '250000');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `jenis`, `harga`) VALUES
(41, 'alopurinol', 'obat asam urat', '25000'),
(42, 'aminofilin', 'asma/pernapasan', '50000'),
(43, 'asam folat', 'vitamin', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `no_rekammedis_inap` int(5) NOT NULL,
  `id_kamar` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `total_hari` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_rekammedis_inap`, `id_kamar`, `id_obat`, `total_hari`) VALUES
(61, 11, 51, 41, 2),
(68, 12, 53, 43, 5),
(69, 13, 54, 42, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`no_rekammedis_inap`);

--
-- Indexes for table `data_perawat`
--
ALTER TABLE `data_perawat`
  ADD PRIMARY KEY (`id_perawat`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk1` (`no_rekammedis_inap`),
  ADD KEY `fk2` (`id_kamar`),
  ADD KEY `fk3` (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `data_dokter`
--
ALTER TABLE `data_dokter`
  MODIFY `id_dokter` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2227;

--
-- AUTO_INCREMENT for table `data_perawat`
--
ALTER TABLE `data_perawat`
  MODIFY `id_perawat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3337;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4445;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`no_rekammedis_inap`) REFERENCES `data_pasien` (`no_rekammedis_inap`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
