-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Mei 2017 pada 06.34
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
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(16) NOT NULL,
  `email` text NOT NULL,
  `no_telp` bigint(13) NOT NULL,
  `no_plat` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `email`, `no_telp`, `no_plat`, `username`, `password`, `image`) VALUES
(1, 'ahok@gmail.com', 0, 0, 'ahok', '$2y$10$SliahgmqBmEm2784Iuq5/..BQxVzIEgzUdBottPa7n480uraX0LR.', NULL),
(2, 'liat_depan@gmail.com', 0, 0, 'gwmahapaatuh', '$2y$10$j/UgFQflj4pC85cchT76HOHSUdZ6/PQbQ1MoHU6sqPrn4.hmsyNYO', NULL),
(3, 'epul@gmail.com', 0, 0, 'epul', '$2y$10$wVC3A0ClKmpmJJ2kAj2XyudLZ.7SK9br4o1Bapw2unY4SUPb0dDOK', NULL),
(4, 'amama@adkdk.com', 0, 0, 'adirizka7', '$2y$10$vCWE2P5XdvYmv8mvUk1P4uqiwM8O/qhvwMf3eLbNuhYMpw/ZsPQSi', NULL),
(5, 'boy@gmail.com', 808, 0, 'boy', '$2y$10$YHFTP8hRki1UJyF11vWAMeQ5022I.lzCPKPu.sBfI8QoQ3EkE4zAK', NULL),
(7, 'qa@gmail.com', 1111, 0, 'qa', '$2y$10$ZufEiUV09enxDY0oVy5VBev0P3fJGZwEhMW2dlHtbn3UzMYC0xteW', NULL),
(8, 'aaa@a.com', 134, 0, 'aswf', '$2y$10$k1XwvDNdX3JQWfJQ/AMe0.4akn.kbwMBPIg3gEFbEJdqy3h7P2BFi', NULL),
(9, 'ahay@gmail.com', 2453, 8904, 'ahay', '$2y$10$trlwIH6d5ws6yq4lYtq2J.7U8CI7s7Boax2fcPPGPR4zQ/ic0FYTC', 'http://i.imgur.com/6miOLRe.jpg'),
(10, 'ahoy@gmail.com', 89797976789, 5776, 'ahoy', '$2y$10$Np45IJfbj7yiYinEu0kp5uuXG.KhueRU8VXkXHsBtX.UhM.bw61fi', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
