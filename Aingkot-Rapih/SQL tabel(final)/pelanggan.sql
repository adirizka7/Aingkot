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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(16) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `no_telp` int(13) UNSIGNED DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `email`, `no_telp`, `tanggal_lahir`, `alamat`, `image`) VALUES
(1, 'cuy', '$2y$10$c6uf4dKiEhwwP3dF7xnR/.cGn9.hTAL79SyI.FWPYmYFRa14xwl8C', 'nyobs@gmail.com', NULL, '0000-00-00', '', NULL),
(3, 'apaja', '$2y$10$wrlwHDP4VEMj6LlBuwv00OQTh3kkZI6fRoyFlghM0X3/jF/5RHEei', 'apaja@gmail.com', NULL, '0000-00-00', '', NULL),
(6, 'uhu', '$2y$10$TXAOloPKybedO9Jpemek2e84dz6YFqbf9uD96mcG9RgSZVS3BHF96', 'uhu@gmail.com', NULL, '0000-00-00', '', NULL),
(7, 'adirizka', '$2y$10$izbifxbvwdcTzr2WZ0JfE.38TGknxWaJV3saQKIJ9xlV.2ROP2zPi', 'adirizka@adi.com', NULL, '0000-00-00', '', NULL),
(9, 'uhuy', '$2y$10$TG7sjYJ3flAyIDr4un6pPuSXCCwhZwTxQaq/XOrWep5yXEvqdAKjG', 'uhuy@yahoo.co.id', 0, '0000-00-00', '', NULL),
(10, 'adi', '$2y$10$XXPQqLLgPZ99IK2UJrTVYe5fBb8QpgYl7vzvDrSQLjpyOMr3rkpUW', 'email@gmail.com', 5089, '0000-00-00', '', NULL),
(11, 'upopo', '$2y$10$joCpwOk.7YhPD31CTW1p6u51BhFnVDNHn0c1LNQDloZavEYUbv1ZK', 'popo@gmail.com', 0, '0000-00-00', '', NULL),
(12, 'rasis', '$2y$10$ZUp2LhsOyumFcfRuJhf5EOTbiCqGvlUX9ADTPqg.Wgwj3T7cIEwQm', 'rasis@gmail.com', 4294967295, '0000-00-00', '', NULL),
(14, 'aaa', '$2y$10$ZdRtSbq2pL3cdbxPectaWei1xiIwSjpfd9GZbaXhunstmJ0Medtnq', 'aaa@g.com', 1111, '0000-00-00', '', NULL),
(15, 'harits', '$2y$10$VkJ1tjy0qPMjDfYYjx0rw.JdgNAOjjjOUnm7cS0l5UDqFo7S..9C.', 'm.harits7@gmail.com', 4294967295, '0000-00-00', 'gaks', 'http://i.imgur.com/Bd3DrT9.jpg'),
(16, 'harits', '$2y$10$sZDO4nMkDI6tp2cGaYKwkeYb2lgsyje9M1jQI7Vic.oqciEjTOjY6', 'hahaha@gmail.com', 4294967295, '0000-00-00', '', 'http://i.imgur.com/YztlU6o.jpg'),
(17, 'Harits', '$2y$10$nSL5ECxTZEU2Y6UHIzDjFOEOW2MucdLiHFDX3r5XAia14QoHuMTwC', 'harits@gmail.com', 8787, '0000-00-00', 'ciampea', 'http://i.imgur.com/G9eueAE.jpg'),
(18, 'yuhu', '$2y$10$DWlOPaisP/Em/CZVqIC0G.TLMsfsknZE05OxOTzJV50P7rZL8gv7W', 'yuhu@gmail.com', 4294967295, '0000-00-00', '', 'http://i.imgur.com/OQUqH0f.jpg'),
(19, 'tron', '$2y$10$oeScDaHSFfLB.qKJHUaeg.HomzVrMYcCDs1YyfjYVu03BstP84SvS', 'tronunyu@gmail.com', 876987687, '2017-05-17', 'ciampea', 'http://i.imgur.com/DgJ35nS.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
