-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 09:46 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 'default.svg'),
(4, 'admin', 'dhenamulyana@gmail.com', '$2y$10$4ODW6MOr3/Wwpfax2wheF.YqLnIexfPn6Nt442RoR9nZItZMZBxnu', 'Mulyana', 'default.svg');

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `idalat` int(12) NOT NULL,
  `jenisa_name` int(12) NOT NULL,
  `merka_name` int(12) NOT NULL,
  `color_name` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`idalat`, `jenisa_name`, `merka_name`, `color_name`) VALUES
(1, 0, 0, 0),
(2, 0, 0, 0),
(3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `kode` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `berita` text NOT NULL,
  `tanggal` date NOT NULL,
  `image` varchar(225) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`kode`, `judul`, `berita`, `tanggal`, `image`) VALUES
(13081, 'Gelar Konser Tur, Pawerslaves Sukses Menyihir Slavers', 'Gelar Konser Tur, Pawerslaves Sukses Menyihir Slavers', '2018-08-13', 'banjo-player.jpg'),
(13082, 'Ada yang Baru niih', 'Vocalis WTF ', '2018-08-13', 'avatar-2.png'),
(14081, 'Band Name Of Hate banyak Gigs', 'Beliau banyak menerima job manggung dari bali lombok dan banyuangi', '2018-08-14', 'contact-bg.jpg'),
(270801, 'Pengarahan Musik', 'Berikan info terbaru', '2018-08-27', 'banjo-player.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `color_name` varchar(30) NOT NULL,
  `merka_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 Blocked, 1 Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `merka_id`, `status`) VALUES
(101, 'Hitam - Black', 111, 1),
(102, 'Coklat - Brown', 111, 1),
(103, 'Putih - White', 111, 1),
(104, 'Hitam - Black', 112, 1),
(105, 'Coklat - Brown', 112, 1),
(106, 'Putih - White', 112, 1),
(107, 'Hitam - Black', 113, 1),
(108, 'Coklat - Brown', 113, 1),
(109, 'Putih - White', 113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `idforum` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `idmekanik` int(11) NOT NULL,
  `deskripsi2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`idforum`, `iduser`, `subject`, `deskripsi`, `tanggal`, `idmekanik`, `deskripsi2`) VALUES
(1, 6, 'test 2 subject', 'dadada', '2018-08-16', 0, ''),
(2, 4, 'test baru', 'daadada', '2018-08-16', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenisalat`
--

CREATE TABLE `jenisalat` (
  `jenisa_id` int(11) NOT NULL,
  `jenisa_name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:Blocked, 1:Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisalat`
--

INSERT INTO `jenisalat` (`jenisa_id`, `jenisa_name`, `status`) VALUES
(1, 'Gitar Akustik', 1),
(2, 'Gitar Elektrik', 1),
(3, 'Bass Akustik', 1),
(4, 'Bass Elektrik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE `mekanik` (
  `idmekanik` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`idmekanik`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 'default.svg'),
(4, 'mekanik1', 'qwwe@gmail.com', '$2y$10$6YWqbjzXfmN6W4wS0UktB.Np4C4qiZUs7WPXdtSBJSBaau9USwpYK', 'qwwe', 'default.svg'),
(5, 'mekanik2', 'mekanik2@mekanik.com', '$2y$10$oK5pgdYfuoaZHZCBG9L.vuNaqMCIzXUbNNNuEYepXw.WuoW4t2UWC', 'mekanik2', 'default.svg');

-- --------------------------------------------------------

--
-- Table structure for table `merkalat`
--

CREATE TABLE `merkalat` (
  `merka_id` int(11) NOT NULL,
  `merka_name` varchar(30) NOT NULL,
  `jenisa_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 Blocked, 1 Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merkalat`
--

INSERT INTO `merkalat` (`merka_id`, `merka_name`, `jenisa_id`, `status`) VALUES
(111, 'Ibanes Akustik', 1, 1),
(112, 'Yamaha Akustik', 1, 1),
(113, 'Cord Akustik', 1, 1),
(201, 'Ibanes', 2, 1),
(202, 'Cord', 2, 1),
(203, 'Fender', 2, 1),
(204, 'Gilmor', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `username`, `email`, `password`, `name`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', 'default.svg'),
(4, 'King', 'king@gmail.com', '$2y$10$opLwKWOhDRjwcP8cg3IcaeVVjARW7gcu7meWzqlzLoujNRvOfXa16', 'Gus Erik', 'default.svg'),
(5, 'mdmulyana', 'dhenamulyana@gmail.com', '$2y$10$fKSLrA8ooEjp.6l.5KiH/u.hyvJQe2doobWJYvPSRLQuOdP.fqYPa', 'Mulyana', 'default.svg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_service`
--

CREATE TABLE `pesanan_service` (
  `idservice` int(11) NOT NULL,
  `iduser` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `jenisa_name` int(15) NOT NULL,
  `merka_name` int(15) NOT NULL,
  `color_name` int(15) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.svg 	',
  `jenis_service` varchar(20) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_service`
--

INSERT INTO `pesanan_service` (`idservice`, `iduser`, `name`, `jenisa_name`, `merka_name`, `color_name`, `image`, `jenis_service`, `deskripsi`) VALUES
(4, '4', 'dhena mulyana', 0, 0, 0, 'default.svg 	', 'Costum', 'deskripsi'),
(5, '4', 'dhena mulyana', 0, 0, 0, 'IMG_9538.PNG', 'Service', 'dadadad'),
(6, '4', 'dena', 0, 0, 0, 'IMG_9538.PNG', 'Costum', 'dadadd'),
(7, '4', 'mdmulyana', 0, 0, 0, 'IMG_9537.PNG', 'Service', 'aaadaa'),
(8, '4', 'Daad', 0, 0, 0, 'IMG_9537.PNG', 'Costum', 'dadaada'),
(11, '6', 'dauddd', 0, 0, 0, '', 'Service', 'dadadad'),
(12, '6', 'asasas', 0, 0, 0, '', 'Costum', 'dadadd'),
(13, '6', 'adasa', 0, 0, 0, '', 'Costum', 'asasasa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nameplg` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` int(50) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `email`, `password`, `nameplg`, `alamat`, `notelp`, `photo`) VALUES
(1, 'ardianta', 'ardianta_pargo@yahoo.co.id', '$2y$10$HIEq2w.8Et9RsJmY4TMKye4aVCxOd9xJTOtG4vyOEmo.GIBxaPQHK', 'Ardianta Pargo', '', 0, 'default.svg'),
(3, 'petanikode', 'info@petanikode.com', '$2y$10$uXa.Hz9rr8gkv4ztaqf6FO84iW64gXHbeyEOy1tIQ5wmqMjTk0yQa', 'Petani Kode', '', 0, 'default.svg'),
(4, 'mdmulyana', 'dhenamulyana@gmail.com', '$2y$10$AWmUc3BV4.eujSxhpTKoGe3VZMAdyXSKUXtyi04bjE.KH2n/Swyj2', 'Mulyana', 'ajjad', 998, 'default.svg'),
(5, 'jon', 'jon@jon.com', '$2y$10$eZggOuEJpJDoNi4zYDAJ6u19qYqTO8rl9tqz.66MqkPzdHkeyiIku', 'jon', 'jon', 999, 'default.svg'),
(6, 'daud', 'daud01@gmail.com', '$2y$10$8DjBznQ1EoDEM9qJ8vLfqeKliCP1PhBjSvLzEiXlXXYfG85nM93/a', 'daud', 'tes', 9878, 'default.svg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`idalat`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`idforum`);

--
-- Indexes for table `jenisalat`
--
ALTER TABLE `jenisalat`
  ADD PRIMARY KEY (`jenisa_id`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`idmekanik`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `merkalat`
--
ALTER TABLE `merkalat`
  ADD PRIMARY KEY (`merka_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pesanan_service`
--
ALTER TABLE `pesanan_service`
  ADD PRIMARY KEY (`idservice`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `idalat` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `idforum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `idmekanik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pesanan_service`
--
ALTER TABLE `pesanan_service`
  MODIFY `idservice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
