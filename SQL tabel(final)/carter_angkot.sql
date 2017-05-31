-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2017 pada 06.33
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carter_angkot`
--

CREATE TABLE `carter_angkot` (
  `id_carter` int(16) NOT NULL,
  `id_pelanggan` int(16) NOT NULL,
  `id_sopir` int(16) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `lokasi_awal` text NOT NULL,
  `tujuan` text NOT NULL,
  `Keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan_tambahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `carter_angkot`
--

INSERT INTO `carter_angkot` (`id_carter`, `id_pelanggan`, `id_sopir`, `tanggal_pemesanan`, `lokasi_awal`, `tujuan`, `Keterangan`, `status`, `keterangan_tambahan`) VALUES
(5, 19, 10, '2017-06-09', 'kok error tadi', 'gak tau lah', 'woooooyiogko5jmirkmjgk', 1, 'rt'),
(7, 19, 10, '2017-06-09', 'halo pak', 'cihuy', 'nyoba ja', 1, 'rt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carter_angkot`
--
ALTER TABLE `carter_angkot`
  ADD PRIMARY KEY (`id_carter`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carter_angkot`
--
ALTER TABLE `carter_angkot`
  MODIFY `id_carter` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
