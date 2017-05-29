-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 05:42 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE IF NOT EXISTS `rute` (
  `ID_Rute` int(11) NOT NULL AUTO_INCREMENT,
  `mulai` text NOT NULL,
  `destinasi` text NOT NULL,
  `nama_mulai` text NOT NULL,
  `nama_destinasi` text NOT NULL,
  `direction` text NOT NULL,
  `angkot` int(11) NOT NULL,
  PRIMARY KEY (`ID_Rute`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`ID_Rute`, `mulai`, `destinasi`, `nama_mulai`, `nama_destinasi`, `direction`, `angkot`) VALUES
(1, 'Cipinang Gading', 'Perum Yasmin', 'cipinang gading lodaya, Gang lodaya, Ranggamekar, Kota Bogor, Jawa Barat, Indonesien', 'Yasmin Centre, Curugmekar, Kota Bogor, Jawa Barat, Indonesien', '''Jl.Soemantadiredja'',-6.6445618,106.8076948|''Cipaku'',-6.6340746,106.8163628|''Jl.Pahlawan'',-6.6097524,106.799051|''Jl.Empang'',-6.6165827,106.8016144|''Jl.Ir.H.Djuanda'',-6.5994967,106.7946015|''Jl.Paledang'',-6.6001026,106.7910709|''Jl.KaptenMuslihat'',-6.5961014,106.7905303|''Jl.Veteran'',-6.5955193,106.7859247|''Jl.PerintisKemerdekaan'',-6.5932824,106.7866212|''TerminalMerdeka'',-6.5925094,106.786331|''Jl. Mawar'',-6.590228,106.7862969|''Jl.Dr. Sumeru'',-6.5930326,106.7864844|''Jl.BrigjenSaptajiHadiprawira'',-6.5711429,106.7684134', 1),
(2, 'Warung Nangka', 'Lawang Saketeng / Bogor Trade Mall', 'Warung Nangka Rancamaya, Jalan Rancamaya, Rancamaya, Kota Bogor, Jawa Barat, Indonesien', 'Jalan Lawang Saketeng, Gudang, Kota Bogor, Jawa Barat, Indonesien', '''Rancamaya'',-6.6710208,106.8266873|''Cipaku'',-6.6340746,106.8163628|''Jl.Pahlawan'',-6.6097524,106.799051|''Gg.Aut'',-6.6106667,106.8034253', 2),
(3, 'Cimahpar', 'Bogor Trade Mall', 'Cimahpar, Kota Bogor, Jawa Barat, Indonesien', 'Bogor Trade Mall, Jalan Ahmad Adnawijaya, Tegal Gundil, Kota Bogor, Jawa Barat, Indonesien', '''sancang'',-6.5912661,106.8082123|''kumbang'',-6.590509,106.8057203|''lodaya'',-6.5888884,106.8059721|''Jl.rayapajajaran'',-6.5831353,106.8063799|''Jl.Otista'',-6.603883,106.802095|''Jl.Ir.H.Djuanda'',-6.5994967,106.7946015|', 3),
(4, 'Cimahpar', 'Warung Jambu (Via Jl. A. Sobana)', 'Cimahpar, Kota Bogor, Jawa Barat, Indonesien', 'WARUNG JAMBU BOGOR, Jalan Jendral A. Yani II, Tanah Sareal, Kota Bogor, Jawa Barat, Indonesien', '''Jl.TumenggungWiradiredja'',-6.5890213,106.8201808|''AhmadAdnawijaya'',-6.5808708,106.8180651|''AhmadSobana'',-6.5818014,106.8141099|''Gagalur'',-6.5799059,106.8109788|''KresnaRaya'',-6.5727072,106.8118852|''PanduRaya'',-6.5890505,106.8166281', 4),
(5, 'Ciheuleut', 'Bogor Trade Mall', 'Jalan Ciheuleut, Baranangsiang, Kota Bogor, Jawa Barat, Indonesien', 'Bogor Trade Mall, Jalan Ahmad Adnawijaya, Tegal Gundil, Kota Bogor, Jawa Barat, Indonesien', '''Jl.Ciheuleut'',-6.6011588,106.8163078|''RayaPajajaran'',-6.5831353,106.8063799|''Sambu'',-6.6063459,106.8072715|''Baranangsiang'',-6.6096958,106.8148879|''Otista'',-6.603883,106.802095', 5),
(6, 'Baranang Siang Indah', 'Ciparigi', 'Baranang Siang Indah, Jalan Arka Domas, Baranangsiang, Kota Bogor, Jawa Barat, Indonesien', 'Ciparigi, Kota Bogor, Jawa Barat, Indonesien', '''AhmadSyam'',-6.5980808,106.8179008|''Padi'',-6.5992161,106.8155416|''Ciheuleut'',-6.6023816,106.8119785|''CiheuleutPakuan'',-6.6066883,106.8106139|''Artzimar I'',-6.5831893,106.8115094|''Gagalur'',-6.5799059,106.8109788|''KresnaRaya'',-6.5727072,106.8118852|''PanduRaya'',-6.5890505,106.8166281|''KSTubun'',-6.5669569,106.8098002|''POMAD'',-6.5425628,106.8150141', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
