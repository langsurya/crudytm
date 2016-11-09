-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 09 Nov 2016 pada 02.18
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ytm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ytm`
--

CREATE TABLE `tbl_ytm` (
  `id` int(10) NOT NULL,
  `no_kk` int(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nama_panggilan` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `umur` int(5) NOT NULL,
  `status` enum('S','T') NOT NULL,
  `jenjang_pendidikan` varchar(10) NOT NULL,
  `kelas` int(10) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `tinggal_dengan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ytm`
--

INSERT INTO `tbl_ytm` (`id`, `no_kk`, `nama_lengkap`, `nama_panggilan`, `tmpt_lahir`, `tgl_lahir`, `jk`, `umur`, `status`, `jenjang_pendidikan`, `kelas`, `alamat_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ibu`, `tinggal_dengan`, `alamat`, `photo`) VALUES
(1, 132122, 'Rahayu Mutiara', 'Tiara', 'Medan utara', '2002-11-10', 'P', 12, 'S', 'SD', 7, 'Semarang', 'Rino', 'Rini', 'Karyawan Swasta', 'Ibu', 'Semarang', '615720.jpg'),
(2, 1213, 'Amelia', 'amel', 'serang', '2016-11-09', 'P', 8, 'T', 'SD', 2, 'Serang', 'Jono', 'Juju', 'Sales', 'Paman', 'Bojong', '897887.jpg'),
(4, 8734, 'Rosdiana', 'Rosdi', 'Tangerang', '2016-11-09', 'P', 15, 'S', 'SMP', 7, 'Perumnas', 'Romla', '', 'Buruh', 'bibi', 'bojong', '685187.jpg'),
(5, 23414, 'anisa', 'nisa', 'medan', '2016-11-09', 'P', 9, 'S', 'SMA', 3, 'Medan kota', 'rosdi', '', 'manager', 'nenek', 'Jonggol', '362529.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ytm`
--
ALTER TABLE `tbl_ytm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ytm`
--
ALTER TABLE `tbl_ytm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
