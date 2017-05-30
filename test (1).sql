-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mei 2017 pada 12.49
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
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(16) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `no_telp` int(13) UNSIGNED DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `email`, `no_telp`, `tanggal_lahir`, `alamat`, `active`, `image`) VALUES
(1, '', 'cuy', '$2y$10$c6uf4dKiEhwwP3dF7xnR/.cGn9.hTAL79SyI.FWPYmYFRa14xwl8C', 'nyobs@gmail.com', NULL, '0000-00-00', '', 0, NULL),
(3, '', 'apaja', '$2y$10$wrlwHDP4VEMj6LlBuwv00OQTh3kkZI6fRoyFlghM0X3/jF/5RHEei', 'apaja@gmail.com', NULL, '0000-00-00', '', 0, NULL),
(6, '', 'uhu', '$2y$10$TXAOloPKybedO9Jpemek2e84dz6YFqbf9uD96mcG9RgSZVS3BHF96', 'uhu@gmail.com', NULL, '0000-00-00', '', 0, NULL),
(7, '', 'adirizka', '$2y$10$izbifxbvwdcTzr2WZ0JfE.38TGknxWaJV3saQKIJ9xlV.2ROP2zPi', 'adirizka@adi.com', NULL, '0000-00-00', '', 0, NULL),
(9, '', 'uhuy', '$2y$10$TG7sjYJ3flAyIDr4un6pPuSXCCwhZwTxQaq/XOrWep5yXEvqdAKjG', 'uhuy@yahoo.co.id', 0, '0000-00-00', '', 0, NULL),
(10, '', 'adi', '$2y$10$XXPQqLLgPZ99IK2UJrTVYe5fBb8QpgYl7vzvDrSQLjpyOMr3rkpUW', 'email@gmail.com', 5089, '0000-00-00', '', 0, NULL),
(11, '', 'upopo', '$2y$10$joCpwOk.7YhPD31CTW1p6u51BhFnVDNHn0c1LNQDloZavEYUbv1ZK', 'popo@gmail.com', 0, '0000-00-00', '', 0, NULL),
(12, '', 'rasis', '$2y$10$ZUp2LhsOyumFcfRuJhf5EOTbiCqGvlUX9ADTPqg.Wgwj3T7cIEwQm', 'rasis@gmail.com', 4294967295, '0000-00-00', '', 0, NULL),
(14, '', 'aaa', '$2y$10$ZdRtSbq2pL3cdbxPectaWei1xiIwSjpfd9GZbaXhunstmJ0Medtnq', 'aaa@g.com', 1111, '0000-00-00', '', 0, NULL),
(15, '', 'harits', '$2y$10$VkJ1tjy0qPMjDfYYjx0rw.JdgNAOjjjOUnm7cS0l5UDqFo7S..9C.', 'm.harits7@gmail.com', 4294967295, '0000-00-00', 'gaks', 0, 'http://i.imgur.com/Bd3DrT9.jpg'),
(16, '', 'harits', '$2y$10$sZDO4nMkDI6tp2cGaYKwkeYb2lgsyje9M1jQI7Vic.oqciEjTOjY6', 'hahaha@gmail.com', 4294967295, '0000-00-00', '', 0, 'http://i.imgur.com/YztlU6o.jpg'),
(17, '', 'Harits', '$2y$10$nSL5ECxTZEU2Y6UHIzDjFOEOW2MucdLiHFDX3r5XAia14QoHuMTwC', 'harits@gmail.com', 8787, '0000-00-00', 'ciampea', 0, 'http://i.imgur.com/G9eueAE.jpg'),
(18, '', 'yuhu', '$2y$10$DWlOPaisP/Em/CZVqIC0G.TLMsfsknZE05OxOTzJV50P7rZL8gv7W', 'yuhu@gmail.com', 4294967295, '0000-00-00', '', 0, 'http://i.imgur.com/OQUqH0f.jpg'),
(19, '', 'tron', '$2y$10$oeScDaHSFfLB.qKJHUaeg.HomzVrMYcCDs1YyfjYVu03BstP84SvS', 'tronunyu@gmail.com', 876987687, '2017-05-17', 'ciampea', 0, 'http://i.imgur.com/DgJ35nS.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rute`
--

CREATE TABLE `rute` (
  `ID_Rute` int(11) NOT NULL,
  `mulai` text NOT NULL,
  `destinasi` text NOT NULL,
  `nama_mulai` text NOT NULL,
  `nama_destinasi` text NOT NULL,
  `direction` text NOT NULL,
  `angkot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rute`
--

INSERT INTO `rute` (`ID_Rute`, `mulai`, `destinasi`, `nama_mulai`, `nama_destinasi`, `direction`, `angkot`) VALUES
(1, 'Cipinang Gading', 'Perum Yasmin', 'cipinang gading lodaya, Gang lodaya, Ranggamekar, Kota Bogor, Jawa Barat, Indonesien', 'Yasmin Centre, Curugmekar, Kota Bogor, Jawa Barat, Indonesien', '\'Jl.Ir.H.Djuanda\',-6.5994967,106.7946015|\'Jl.KaptenMuslihat\',-6.5961014,106.7905303|\'TerminalMerdeka\',-6.5925094,106.786331|\'Jl. Mawar\',-6.590228,106.7862969|\'Jl.Dr. Sumeru\',-6.5930326,106.7864844|\'Jl.BrigjenSaptajiHadiprawira\',-6.5711429,106.7684134', '1'),
(2, 'Warung Nangka', 'Lawang Saketeng / Bogor Trade Mall', 'Warung Nangka Rancamaya, Jalan Rancamaya, Rancamaya, Kota Bogor, Jawa Barat, Indonesien', 'Jalan Lawang Saketeng, Gudang, Kota Bogor, Jawa Barat, Indonesien', '\'Cipaku\',-6.6340746,106.8163628|\'Jl.Pahlawan\',-6.6097524,106.799051', '2'),
(4, 'Cimahpar', 'Warung Jambu (Via Jl. A. Sobana)', 'Cimahpar, Kota Bogor, Jawa Barat, Indonesien', 'WARUNG JAMBU BOGOR, Jalan Jendral A. Yani II, Tanah Sareal, Kota Bogor, Jawa Barat, Indonesien', '\'Jl.TumenggungWiradiredja\',-6.59010501,106.81661472', '4'),
(5, 'Ciheuleut', 'Bogor Trade Mall', 'Jalan Ciheuleut, Baranangsiang, Kota Bogor, Jawa Barat, Indonesien', 'Bogor Trade Mall, Jalan Ahmad Adnawijaya, Tegal Gundil, Kota Bogor, Jawa Barat, Indonesien', '\'RayaPajajaran\',-6.5831353,106.8063799|\'Sambu\',-6.6063459,106.8072715|\'Baranangsiang\',-6.6096958,106.8148879|\'Otista\',-6.603883,106.802095', '5'),
(6, 'Baranang Siang Indah', 'Ciparigi', 'Baranang Siang Indah, Jalan Arka Domas, Baranangsiang, Kota Bogor, Jawa Barat, Indonesien', 'Ciparigi, Kota Bogor, Jawa Barat, Indonesien', '\'Gagalur\',-6.5799059,106.8109788|\'KresnaRaya\',-6.5727072,106.8118852|\'PanduRaya\',-6.5890505,106.8166281|\'KSTubun\',-6.5669569,106.8098002|\'POMAD\',-6.5425628,106.8150141', '6'),
(15, 'situgede', 'merdeka', 'Situ Gede, Kota Bogor, Jawa Barat, Indonesien', 'Terminal Bus Merdeka Bogor, Bogor, Jawa Barat, Indonesien', '\'Smpn14\',-6.5559729,106.74958661|\'Bubulak\',-6.56995688,106.75579861|\'Laladon\',-6.57617335,106.75335914|\'Jl.Dr.Semeru\',-6.5813479,106.77737564', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id_sopir` int(16) NOT NULL,
  `nama` text NOT NULL,
  `email` text NOT NULL,
  `no_telp` bigint(13) NOT NULL,
  `no_plat` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id_sopir`, `nama`, `email`, `no_telp`, `no_plat`, `username`, `password`, `active`, `image`) VALUES
(1, '', 'ahok@gmail.com', 0, 0, 'ahok', '$2y$10$SliahgmqBmEm2784Iuq5/..BQxVzIEgzUdBottPa7n480uraX0LR.', 0, NULL),
(2, '', 'liat_depan@gmail.com', 0, 0, 'gwmahapaatuh', '$2y$10$j/UgFQflj4pC85cchT76HOHSUdZ6/PQbQ1MoHU6sqPrn4.hmsyNYO', 0, NULL),
(3, '', 'epul@gmail.com', 0, 0, 'epul', '$2y$10$wVC3A0ClKmpmJJ2kAj2XyudLZ.7SK9br4o1Bapw2unY4SUPb0dDOK', 0, NULL),
(4, '', 'amama@adkdk.com', 0, 0, 'adirizka7', '$2y$10$vCWE2P5XdvYmv8mvUk1P4uqiwM8O/qhvwMf3eLbNuhYMpw/ZsPQSi', 0, NULL),
(5, '', 'boy@gmail.com', 808, 0, 'boy', '$2y$10$YHFTP8hRki1UJyF11vWAMeQ5022I.lzCPKPu.sBfI8QoQ3EkE4zAK', 0, NULL),
(6, '', '', 0, 0, '', '$2y$10$CdTke/B1.GyxHI7FzoVJqud5bdaucBfkZiCUvY30D00H8BK2qOuze', 0, NULL),
(7, '', 'qa@gmail.com', 1111, 0, 'qa', '$2y$10$ZufEiUV09enxDY0oVy5VBev0P3fJGZwEhMW2dlHtbn3UzMYC0xteW', 0, NULL),
(8, '', 'aaa@a.com', 134, 0, 'aswf', '$2y$10$k1XwvDNdX3JQWfJQ/AMe0.4akn.kbwMBPIg3gEFbEJdqy3h7P2BFi', 0, NULL),
(9, '', 'ahay@gmail.com', 2453, 8904, 'ahay', '$2y$10$trlwIH6d5ws6yq4lYtq2J.7U8CI7s7Boax2fcPPGPR4zQ/ic0FYTC', 0, 'http://i.imgur.com/6miOLRe.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carter_angkot`
--
ALTER TABLE `carter_angkot`
  ADD PRIMARY KEY (`id_carter`),
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`),
  ADD UNIQUE KEY `id_sopir` (`id_sopir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`ID_Rute`);

--
-- Indexes for table `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `ID_Rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id_sopir` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
