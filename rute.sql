-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mei 2017 pada 12.51
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`ID_Rute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rute`
--
ALTER TABLE `rute`
  MODIFY `ID_Rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
