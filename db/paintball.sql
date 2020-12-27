-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2020 at 03:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paintball`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `stok`) VALUES
('B001', 'Paintball Marker', 50),
('B002', 'Peluru Paintball', 200),
('B003', 'Masker / Google', 50),
('B004', 'Body Protector', 50);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` varchar(10) NOT NULL,
  `jenis_booking` varchar(10) NOT NULL,
  `tgl_booking` date DEFAULT NULL,
  `kode_jadwal` varchar(10) DEFAULT NULL,
  `kode_member` varchar(10) NOT NULL,
  `biaya` int(11) NOT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `konfirmasi` varchar(10) NOT NULL,
  `nama_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kode_booking`, `jenis_booking`, `tgl_booking`, `kode_jadwal`, `kode_member`, `biaya`, `bayar`, `kembali`, `konfirmasi`, `nama_file`) VALUES
('S001', 'Biasa', '2020-12-11', 'J003', 'M001', 175000, 175000, 0, 'Sudah', ''),
('S002', 'Event', NULL, NULL, 'M001', 425000, 425000, 0, 'Sudah', ''),
('S003', 'Biasa', '2020-12-10', 'J001', 'M001', 90000, 0, 0, 'Belum', ''),
('S004', 'Event', NULL, NULL, 'M001', 50000, 0, 0, 'Belum', ''),
('S005', 'Biasa', '2020-12-12', 'J006', 'M001', 105000, 0, 0, 'Belum', ''),
('S006', 'Biasa', '2020-12-20', 'J004', 'M001', 100000, 0, 0, 'Belum', ''),
('S007', 'Event', NULL, NULL, 'M002', 425000, 0, 0, 'Belum', NULL),
('S008', 'Biasa', '2020-12-05', 'J002', 'M002', 130000, 0, 0, 'Belum', NULL),
('S009', 'Biasa', '2020-12-16', 'J003', 'M001', 85000, NULL, NULL, 'Belum', NULL),
('S010', 'Event', NULL, NULL, 'M001', 425000, NULL, NULL, 'Belum', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_booking`
--

CREATE TABLE `detail_booking` (
  `kode_detail_booking` varchar(10) NOT NULL,
  `kode_booking` varchar(10) NOT NULL,
  `kode_event` varchar(10) DEFAULT NULL,
  `kode_subPaket` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_booking`
--

INSERT INTO `detail_booking` (`kode_detail_booking`, `kode_booking`, `kode_event`, `kode_subPaket`) VALUES
('DS001', 'S001', NULL, 'SP005'),
('DS002', 'S001', NULL, 'SP010'),
('DS003', 'S002', 'E001', NULL),
('DS004', 'S003', NULL, 'SP003'),
('DS005', 'S004', 'E002', NULL),
('DS006', 'S005', NULL, 'SP010'),
('DS007', 'S006', NULL, 'SP009'),
('DS008', 'S007', 'E001', NULL),
('DS009', 'S008', NULL, 'SP010'),
('DS010', 'S008', NULL, 'SP007'),
('DS011', 'S009', NULL, 'SP002'),
('DS012', 'S010', 'E001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `kode_event` varchar(10) NOT NULL,
  `nama_event` varchar(50) NOT NULL,
  `biaya_daftar` int(11) NOT NULL,
  `tgl_buka` date NOT NULL,
  `tgl_tutup` date NOT NULL,
  `tgl_start_play` date NOT NULL,
  `tgl_end_play` date NOT NULL,
  `jam_play` time NOT NULL,
  `jam_end` time NOT NULL,
  `info` varchar(100) NOT NULL,
  `hadiah` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`kode_event`, `nama_event`, `biaya_daftar`, `tgl_buka`, `tgl_tutup`, `tgl_start_play`, `tgl_end_play`, `jam_play`, `jam_end`, `info`, `hadiah`, `status`) VALUES
('E001', 'Turnament Paintball Player League 2020', 425000, '2020-11-20', '2020-12-20', '2020-12-21', '2020-11-23', '09:00:00', '17:00:00', 'Lokasi: Jungle paintball Jogja, 1 team terdiri dari 5 orang', 10000000, 'Buka'),
('E002', 'Turnament ML Season 2', 50000, '2020-11-21', '2020-12-30', '2021-01-01', '2021-01-05', '08:00:00', '20:00:00', '1 team terdiri dari 5 orang', 1000000, 'Buka');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `kode_fasilitas` varchar(10) NOT NULL,
  `kode_subPaket` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`kode_fasilitas`, `kode_subPaket`, `kode_barang`) VALUES
('F001', 'SP001', 'B001'),
('F002', 'SP001', 'B002'),
('F003', 'SP001', 'B003'),
('F004', 'SP001', 'B004'),
('F005', 'SP002', 'B001'),
('F006', 'SP002', 'B002'),
('F007', 'SP002', 'B003'),
('F008', 'SP002', 'B004');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kode_jadwal` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `rentang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kode_jadwal`, `jam`, `rentang`) VALUES
('J001', '08:00:00', '08:00 - 10:00'),
('J002', '09:00:00', '09:00 - 11:00'),
('J003', '10:00:00', '10:00 - 12:00'),
('J004', '11:00:00', '11:00 - 13:00'),
('J005', '12:00:00', '12:00 - 14:00'),
('J006', '13:00:00', '13:00 - 15:00'),
('J007', '14:00:00', '14:00 - 16:00'),
('J008', '15:00:00', '15:00 - 17:00'),
('J009', '16:00:00', '16:00 - 18:00'),
('J010', '17:00:00', '17:00 - 19:00'),
('J011', '18:00:00', '18:00 - 20:00'),
('J012', '19:00:00', '19:00 - 21:00'),
('J013', '20:00:00', '20:00 - 22:00');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `kode_member` varchar(10) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `pass_awal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`kode_member`, `nama_member`, `email`, `username`, `pass`, `pass_awal`) VALUES
('M001', 'wahyu', 'wahyuimam55555@gmail.com', 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'imam'),
('M002', 'dian', 'dian@gmail.com', 'dian', 'f97de4a9986d216a6e0fea62b0450da9', 'pass_awal'),
('M003', 'Wahyu Imam', 'imam@gmail.com', 'wahyuimam', '029570e3bfafff83319b25b58f0b11d5', 'wahyuimam');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `kode_paket` varchar(10) NOT NULL,
  `nama_paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kode_paket`, `nama_paket`) VALUES
('P001', 'Starter Pack'),
('P002', 'Shoting Target'),
('P003', 'Field Charger / Pax'),
('P004', 'Reload'),
('P005', 'Food & Beverages (Optimal)');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `kode_user` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `pass_awal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`kode_user`, `username`, `pass`, `pass_awal`) VALUES
('A001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sub_paket`
--

CREATE TABLE `sub_paket` (
  `kode_subPaket` varchar(10) NOT NULL,
  `kode_paket` varchar(10) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `ketentuan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_paket`
--

INSERT INTO `sub_paket` (`kode_subPaket`, `kode_paket`, `nama_sub`, `ketentuan`, `harga`) VALUES
('SP001', 'P001', 'Senin - Jumat', '08:00 - 17:00', 80000),
('SP002', 'P001', 'Senin - Jumat', '18:00 - 22:00', 85000),
('SP003', 'P001', 'Sabtu - Minggu', '08:00 - 17:00', 90000),
('SP004', 'P001', 'Sabtu - Minggu', '18:00 - 22:00', 95000),
('SP005', 'P002', '50 paints', '', 70000),
('SP006', 'P003', 'Incl: Games (25 Paints), Property, Photo Session', 'Maximmum 2 Hours', 45000),
('SP007', 'P004', 'Per 25 Paints', '', 25000),
('SP008', 'P005', 'Senin - Jumat', '08:00 - 17:00 Include Meals Box & Drink', 96000),
('SP009', 'P005', 'Senin - Jumat', '18:00 - 22:00 Include Meals Box & Drink', 100000),
('SP010', 'P005', 'Sabtu - Minggu', '08:00 - 17:00 Include Meals Box & Drink', 105000),
('SP011', 'P005', 'Sabtu - Minggu', '18:00 - 22:00 Include Meals Box & Drink', 110000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `kode_member` (`kode_member`),
  ADD KEY `kode_jadwal` (`kode_jadwal`);

--
-- Indexes for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD PRIMARY KEY (`kode_detail_booking`),
  ADD KEY `kode_booking` (`kode_booking`),
  ADD KEY `kode_subPaket` (`kode_subPaket`),
  ADD KEY `kode_event` (`kode_event`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`kode_event`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`kode_fasilitas`),
  ADD KEY `kode_sub_paket` (`kode_subPaket`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kode_jadwal`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kode_member`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kode_paket`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `sub_paket`
--
ALTER TABLE `sub_paket`
  ADD PRIMARY KEY (`kode_subPaket`),
  ADD KEY `kode_paket` (`kode_paket`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`kode_member`) REFERENCES `member` (`kode_member`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`kode_jadwal`) REFERENCES `jadwal` (`kode_jadwal`);

--
-- Constraints for table `detail_booking`
--
ALTER TABLE `detail_booking`
  ADD CONSTRAINT `detail_booking_ibfk_1` FOREIGN KEY (`kode_booking`) REFERENCES `booking` (`kode_booking`),
  ADD CONSTRAINT `detail_booking_ibfk_2` FOREIGN KEY (`kode_subPaket`) REFERENCES `sub_paket` (`kode_subPaket`),
  ADD CONSTRAINT `detail_booking_ibfk_3` FOREIGN KEY (`kode_event`) REFERENCES `event` (`kode_event`);

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`kode_subPaket`) REFERENCES `sub_paket` (`kode_subPaket`),
  ADD CONSTRAINT `fasilitas_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `sub_paket`
--
ALTER TABLE `sub_paket`
  ADD CONSTRAINT `sub_paket_ibfk_1` FOREIGN KEY (`kode_paket`) REFERENCES `paket` (`kode_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
