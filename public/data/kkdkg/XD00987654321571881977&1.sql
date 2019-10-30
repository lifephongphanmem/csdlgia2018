-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 08:44 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdlgia_vp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kkdkgct`
--

CREATE TABLE `kkdkgct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` text COLLATE utf8_unicode_ci,
  `dvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkdonvisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkqcpc` text COLLATE utf8_unicode_ci,
  `nksanluongdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nksanluongtt` double NOT NULL DEFAULT '0',
  `nksanluonggc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiamuackdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiamuacktt` double NOT NULL DEFAULT '0',
  `nkgiamuackgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuedvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuett` double NOT NULL DEFAULT '0',
  `nkthueghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuettdbdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuettdbtt` double NOT NULL DEFAULT '0',
  `nkthuettdbgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuephikdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuephiktt` double NOT NULL DEFAULT '0',
  `nkthuephikgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nktienkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nktienktt` double NOT NULL DEFAULT '0',
  `nktienkgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphitcdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphitctt` double NOT NULL DEFAULT '0',
  `nkchiphitcgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphibhdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphibhtt` double NOT NULL DEFAULT '0',
  `nkchiphibhgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphiqldvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkchiphiqltt` double NOT NULL DEFAULT '0',
  `nkchiphiqlgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiathanh1spdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiathanh1sptt` double NOT NULL DEFAULT '0',
  `nkgiathanh1spgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkloinhuandkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkloinhuandktt` double NOT NULL DEFAULT '0',
  `nkloinhuandkgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuegtgtkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkthuegtgtktt` double NOT NULL DEFAULT '0',
  `nkthuegtgtkgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiabandkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgiabandktt` double NOT NULL DEFAULT '0',
  `nkgiabandkgc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nkgtgiamuack` text COLLATE utf8_unicode_ci,
  `nkgtthuenk` text COLLATE utf8_unicode_ci,
  `nkgtthuettdb` text COLLATE utf8_unicode_ci,
  `nkgtthuephik` text COLLATE utf8_unicode_ci,
  `nkgttienk` text COLLATE utf8_unicode_ci,
  `nkgtchiphitc` text COLLATE utf8_unicode_ci,
  `nkgtchiphibh` text COLLATE utf8_unicode_ci,
  `nkgtchiphiql` text COLLATE utf8_unicode_ci,
  `nkgtloinhuandk` text COLLATE utf8_unicode_ci,
  `nkgtthuegtgt` text COLLATE utf8_unicode_ci,
  `nkgtgiabandk` text COLLATE utf8_unicode_ci,
  `sxdonvisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxqcpc` text COLLATE utf8_unicode_ci,
  `sxchiphinvldvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphinvlsl` double NOT NULL DEFAULT '1',
  `sxchiphinvldg` double NOT NULL DEFAULT '0',
  `sxchiphincdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphincsl` double NOT NULL DEFAULT '1',
  `sxchiphincdg` double NOT NULL DEFAULT '0',
  `sxchiphinvpxdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphinvpxsl` double NOT NULL DEFAULT '1',
  `sxchiphinvpxdg` double NOT NULL DEFAULT '0',
  `sxchiphivldvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphivlsl` double NOT NULL DEFAULT '0',
  `sxchiphivldg` double NOT NULL DEFAULT '0',
  `sxchiphidcsxdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphidcsxsl` double NOT NULL DEFAULT '1',
  `sxchiphidcsxdg` double NOT NULL DEFAULT '0',
  `sxchiphikhtscddvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphikhtscdsl` double NOT NULL DEFAULT '1',
  `sxchiphikhtscddg` double NOT NULL DEFAULT '0',
  `sxchiphidvmndvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphidvmnsl` double NOT NULL DEFAULT '1',
  `sxchiphidvmndg` double NOT NULL DEFAULT '0',
  `sxchiphitienkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphitienksl` double NOT NULL DEFAULT '1',
  `sxchiphitienkdg` double NOT NULL DEFAULT '0',
  `sxchiphibhdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphibhsl` double NOT NULL DEFAULT '1',
  `sxchiphibhdg` double NOT NULL DEFAULT '0',
  `sxchiphiqldndvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphiqldnsl` double NOT NULL DEFAULT '1',
  `sxchiphiqldndg` double NOT NULL DEFAULT '0',
  `sxchiphitcdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxchiphitcsl` double NOT NULL DEFAULT '1',
  `sxchiphitcdg` double NOT NULL DEFAULT '0',
  `sxloinhuandkdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxloinhuandksl` double NOT NULL DEFAULT '1',
  `sxloinhuandkdg` double NOT NULL DEFAULT '0',
  `sxgiabanctdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxgiabanctsl` double NOT NULL DEFAULT '1',
  `sxgiabanctdg` double NOT NULL DEFAULT '0',
  `sxthuettdbdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxthuettdbsl` double NOT NULL DEFAULT '1',
  `sxthuettdbdg` double NOT NULL DEFAULT '0',
  `sxthuegtgtdvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxthuegtgtsl` double NOT NULL DEFAULT '1',
  `sxthuegtgtdg` double NOT NULL DEFAULT '0',
  `sxgiabandvt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sxgiabansl` double NOT NULL DEFAULT '1',
  `sxgiabandg` double NOT NULL DEFAULT '0',
  `sxgtchiphisx` text COLLATE utf8_unicode_ci,
  `sxgtchiphibh` text COLLATE utf8_unicode_ci,
  `sxgtchiphiqldn` text COLLATE utf8_unicode_ci,
  `sxgtchiphitc` text COLLATE utf8_unicode_ci,
  `sxgtloinhuandk` text COLLATE utf8_unicode_ci,
  `sxgtthuettdb` text COLLATE utf8_unicode_ci,
  `sxgtthuegtgt` text COLLATE utf8_unicode_ci,
  `sxgtgiaban` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kkdkgct`
--
ALTER TABLE `kkdkgct`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kkdkgct`
--
ALTER TABLE `kkdkgct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
