-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2019 at 04:39 AM
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
-- Database: `csdlgia_caobang`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhongia`
--

CREATE TABLE `binhongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngayapdung` date DEFAULT NULL,
  `gioapdung` time DEFAULT NULL,
  `thapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mamh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhongiact`
--

CREATE TABLE `binhongiact` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoithieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `binhongiactdf`
--

CREATE TABLE `binhongiactdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoithieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settingdvvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtxk` double NOT NULL DEFAULT '0',
  `vtxb` double NOT NULL DEFAULT '0',
  `vtxtx` double NOT NULL DEFAULT '0',
  `vtch` double NOT NULL DEFAULT '0',
  `loaihinhhd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xangdau` double NOT NULL DEFAULT '0',
  `dien` double NOT NULL DEFAULT '0',
  `khidau` double NOT NULL DEFAULT '0',
  `phan` double NOT NULL DEFAULT '0',
  `thuocbvtv` double NOT NULL DEFAULT '0',
  `vacxingsgc` double NOT NULL DEFAULT '0',
  `muoi` double NOT NULL DEFAULT '0',
  `suate6t` double NOT NULL DEFAULT '0',
  `duong` double NOT NULL DEFAULT '0',
  `thocgao` double NOT NULL DEFAULT '0',
  `thuocpcb` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cskddvlt`
--

CREATE TABLE `cskddvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tencskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaihang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachikd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daugiadat`
--

CREATE TABLE `daugiadat` (
  `id` int(10) UNSIGNED NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgddbanhsdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dkdaugia` text COLLATE utf8_unicode_ci,
  `htdaugia` text COLLATE utf8_unicode_ci,
  `thdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daugiadatct`
--

CREATE TABLE `daugiadatct` (
  `id` int(10) UNSIGNED NOT NULL,
  `vitridiadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiasan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiadaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvidaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daugiadatctdf`
--

CREATE TABLE `daugiadatctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `vitridiadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiasan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiadaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvidaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diabanhd`
--

CREATE TABLE `diabanhd` (
  `id` int(10) UNSIGNED NOT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diabanhd`
--

INSERT INTO `diabanhd` (`id`, `town`, `district`, `diaban`, `level`, `created_at`, `updated_at`) VALUES
(1, NULL, 'TPCB', 'Thành Phố Cao Bằng', 'H', '2019-01-06 08:12:58', '2019-01-06 08:12:58'),
(2, NULL, 'HHA', 'Huyện Hòa An', 'H', '2019-01-06 08:13:12', '2019-01-06 08:13:12'),
(3, NULL, 'HTN', 'Huyện Thông Nông', 'H', '2019-01-06 08:13:29', '2019-01-06 08:13:29'),
(4, NULL, 'HHQ', 'Huyện Hà Quảng', 'H', '2019-01-06 08:13:43', '2019-01-06 08:13:43'),
(5, NULL, 'HTL', 'Huyện Trà Lĩnh', 'H', '2019-01-06 08:13:55', '2019-01-06 08:13:55'),
(6, NULL, 'HQU', 'Huyện Quảng Uyên', 'H', '2019-01-06 08:14:13', '2019-01-06 08:14:13'),
(7, NULL, 'HTK', 'Huyện Trùng Khánh', 'H', '2019-01-06 08:14:24', '2019-01-06 08:14:24'),
(8, NULL, 'HPH', 'Huyện Phục Hòa', 'H', '2019-01-06 08:14:36', '2019-01-06 08:14:36'),
(9, NULL, 'HHL', 'Huyện Hạ Lang', 'H', '2019-01-06 08:14:57', '2019-01-06 08:14:57'),
(10, NULL, 'HTA', 'Huyện Thạch An', 'H', '2019-01-06 08:15:13', '2019-01-06 08:15:13'),
(11, NULL, 'HNB', 'Huyện Nguyên Bình', 'H', '2019-01-06 08:15:25', '2019-01-06 08:15:25'),
(12, NULL, 'HBL', 'Huyện Bảo Lạc', 'H', '2019-01-06 08:15:38', '2019-01-06 08:15:38'),
(13, NULL, 'HBLA', 'Huyện Bảo Lâm', 'H', '2019-01-06 08:15:48', '2019-01-06 08:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloaiql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlienhe` text COLLATE utf8_unicode_ci,
  `emailql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailqt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `mahuyen`, `tendv`, `district`, `diachi`, `phanloaiql`, `ttlienhe`, `emailql`, `emailqt`, `created_at`, `updated_at`) VALUES
(1, 'STCCB', 'Sở Tài Chính', NULL, 'Trung tâm hành chính - Phường Đề Thám - Tp Cao Bằng', NULL, '', '', '', '2019-01-06 08:24:10', '2019-01-06 08:24:10'),
(2, 'SGTVT', 'Sở Giao Thông Vận Tải', NULL, 'Số 83, phố Xuân Trường, phường Hợp Giang, thành phố Cao Bằng, tỉnh Cao Bằng', NULL, '', '', '', '2019-01-06 08:26:34', '2019-01-06 08:26:34'),
(3, 'SCT', 'Sở Công Thương', NULL, 'Số 108 - Đường Hoàng Văn Thụ - Thành Phố Cao Bằng, Tỉnh Cao Bằng', NULL, '', '', '', '2019-01-06 08:28:27', '2019-01-06 08:28:27'),
(4, 'SXD', 'Sở Xây Dựng', NULL, 'Số 023 Bế Văn Đàn, Phường Hợp Giang, Thành Phố Cao Bằng', NULL, '', '', '', '2019-01-06 08:29:36', '2019-01-06 08:29:36'),
(5, 'STNMT', 'Sở Tài nguyên & Môi trường', NULL, '126 Bế Văn Đàn, P. Hợp giang, Cao Bằng', NULL, '', '', '', '2019-01-06 08:31:11', '2019-01-06 08:31:11'),
(6, 'SNNPTNN', 'Sở Nông Nghiệp & PTNT', NULL, 'Phường Hợp Giang, thành phố Cao Bằng, tỉnh Cao Bằng', NULL, '', '', '', '2019-01-06 08:33:45', '2019-01-06 08:33:45'),
(7, 'SYT', 'Sở Y Tế', NULL, 'Số 031, phố Hiến Giang, phường Hợp Giang, Thành phố Cao Bằng, Cao Bằng ', NULL, '', '', '', '2019-01-06 08:34:34', '2019-01-06 08:34:34'),
(8, 'SGDDT', 'Sở Giáo dục & Đào tạo', NULL, 'Số 035 Bế Văn Đàn, P.Hợp Giang, TP Cao Bằng', NULL, '', '', '', '2019-01-06 08:35:51', '2019-01-06 08:35:51'),
(9, 'BQLKKTT', 'Ban quản lý khu kinh tế tỉnh', NULL, 'Số 052, phố Kim Đồng - phường Hợp Giang - Thành phố Cao Bằng, tỉnh Cao Bằng', NULL, '', '', '', '2019-01-06 08:37:01', '2019-01-06 08:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `dkgdoanhnghiep`
--

CREATE TABLE `dkgdoanhnghiep` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloaidn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dkghoso`
--

CREATE TABLE `dkghoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socongvan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayquyetdinh` date DEFAULT NULL,
  `ngaythuchien` date DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloaidkg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoichuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dkghosoct`
--

CREATE TABLE `dkghosoct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvitinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiahienhanh` double NOT NULL DEFAULT '0',
  `mucgiamoi` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dkghosoctdf`
--

CREATE TABLE `dkghosoctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvitinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiahienhanh` double NOT NULL DEFAULT '0',
  `mucgiamoi` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmctthamdinhgiahh`
--

CREATE TABLE `dmctthamdinhgiahh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhomhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmctthamdinhgiahh`
--

INSERT INTO `dmctthamdinhgiahh` (`id`, `manhom`, `nhomhh`, `tenhh`, `qccl`, `dvt`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 8 - 10kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 02:39:59', '2018-12-11 02:50:19'),
(2, '01', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng dưới 11-15kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:45:43', '2018-12-11 08:45:43'),
(3, '01', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 15,1 - 20kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:46:13', '2018-12-11 08:46:13'),
(4, '01', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 20,1 - 25kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:46:48', '2018-12-11 08:46:48'),
(5, '01', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 8-10kg/con)', '', 'kg', 'TD', '2018-12-11 08:47:56', '2018-12-11 08:47:56'),
(6, '01', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 11-15kg/con)', '', 'kg', 'TD', '2018-12-11 08:48:18', '2018-12-11 08:48:18'),
(7, '01', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 15,1-20kg/con)', '', 'kg', 'TD', '2018-12-11 08:48:34', '2018-12-11 08:48:34'),
(8, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tuốt lúa liên hoàn vừa tuốt lúa, vừa sàng thóc, gắn đầu nổ 4 mã lực, có ống hút thóc vào KH: 5TG - 70D công suất tuốt và sàng 300-400 kh/h', 'xuất xứ Trung Quốc', 'Cái', 'TD', NULL, NULL),
(9, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tuốt lúa thùng sơn sắt chống rỉ đạp bằng chân', 'Xuất xứ từ Trung Quốc', 'Cái ', 'TD', NULL, NULL),
(10, '01', 'Máy móc nông cụ nông nghiệp', 'Máy cắt lúa cầm tay gắn đầu nổ 2 kỳ, 2 mã lực (Trung Quốc) KH;TL-20 tencall, động cư IE4-6F gồm : dao 2 đầu, dây deo, tuýp đồ', '', 'Cái', 'TD', NULL, NULL),
(11, '01', 'Máy móc nông cụ nông nghiệp', 'Máy cắt lúa cầm tay, gắn đầu nổ 4 kỳ ,\r\ncông suất 4 mã lưc KH: GX25 (Nhập \r\nkhẩu nguyên chiếc từ Thái Lan - Nhật)', 'Xuất xứ từ Trung Quốc', 'Cái ', 'TD', NULL, NULL),
(12, '01', 'Máy móc nông cụ nông nghiệp', 'Máy cày, bừa cầm tay 8 mã lực (Trung Quốc)\r\nKH ; GL61-loại 3 số, Bộ phạn gồm ; Bộ hộp; 01 đôi bánh lồng, 01 đoi bánh bám; 01 đôi lốp; 01 cái cày; 01 cái bừa; 0,5 lít dầu cầu; 02 dây cu loa; 01 túi đựng dụng cụ đồ nghề ốc vít lắp ráp và 01 đầu máy nổ D8(R1', 'xuất xứ Trung Quốc (lắp ráp tại VIệt Nam)', 'Cái', 'TD', NULL, NULL),
(13, '01', 'Máy móc nông cụ nông nghiệp', 'Máy xay xát 3 tác dụng (Trung Quốc) Gồm; 01 Mô tơ 3KW+01 đầu sát liền hoàn + 01 đầu đập liên hoàn + 01 dầu đập nghiền ngô + 1 đầu nghiền bột thớt ngang + cu roa, ốc vít..đủ bộ', '', 'Cái ', 'TD', NULL, NULL),
(14, '01', 'Máy móc nông cụ nông nghiệp', 'Máy quạt thóc làm băng tôn quay tay (Trung Quốc)', '', 'Cái', 'TD', NULL, NULL),
(15, '01', 'Máy móc nông cụ nông nghiệp', 'Máy quạt thóc gắn mô tơ 1,5 KW loại 4 chân sắt, khung sơn chống rỉ ( Trung Quốc sản xuất)', '', 'Cái ', 'TD', NULL, NULL),
(16, '01', 'Máy móc nông cụ nông nghiệp', 'Máy thái thức ăn gia súc quay bằng tay loại 6 lưỡi dao, khung sơn chống rỉ (Trung Quốc)', '', 'Cái', 'TD', NULL, NULL),
(17, '01', 'Máy móc nông cụ nông nghiệp', 'Đầu nổ 4 kỳ công xuất 4 mã lực (Trung Quốc)', '', 'Cái ', 'TD', NULL, NULL),
(18, '01', 'Máy móc nông cụ nông nghiệp', 'Máy nghiền bột khô loại I, gắn mô tơ quấn bằn dây đồng 100%, Mô tơ 2,2 KW(Trung Quốc)', '', 'Cái', 'TD', NULL, NULL),
(19, '01', 'Máy móc nông cụ nông nghiệp', 'Máy nghiền bột khô gắn mô tơ loại to có chân chéo, gắn mô tơ 2,5-3,0 kw (Trung Quốc)', '', 'Cái ', 'TD', NULL, NULL),
(20, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tẽ ngô 3 tác dụng (Tx ngô,tuốt lạc,vò đỗ) chạy bằng đầu nổ 4 kỳ, đầu buli, dây cu roa, phụ kiện đầy đủ (Trung Quốc)', '', 'Cái', 'TD', NULL, NULL),
(21, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tẽ ngô 01 bắp gắn mô tơ điện 1,5 KW (Trung Quốc)', '', 'Cái ', 'TD', NULL, NULL),
(22, '01', 'Máy móc nông cụ nông nghiệp', 'Máy bơm nước ruộng liên doanh Việt - Trung Quốc công suất 0,75KW sản xuất tại VIệt Nam', '', 'Cái', 'TD', NULL, NULL),
(23, '01', 'Máy móc nông cụ nông nghiệp', 'Máy bơm nước ruộng công suất 0,75KW mã hiệu AKIDO liên doanh Việt-Nhật (Sản xuất tại Việt Nam)', '', 'Cái ', 'TD', NULL, NULL),
(24, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tẽ ngô hình phễu vuông chứa nhiều quả, sắt sơn chống rỉ, chạy điện mô tơ 2,2KW (Trung Quốc)', '', 'Cái', 'TD', NULL, NULL),
(25, '01', 'Máy móc nông cụ nông nghiệp', 'Máy bơm nước động cơ 4 kỳ máy 152F chạy bằng xăng trắng, gồm củ sả nước + trõ hút nước có đầu lọc rác (Trung Quốc)', '', 'Cái ', 'TD', NULL, NULL),
(26, '01', 'Máy móc nông cụ nông nghiệp', 'Bừa sắt 9 răng (Việt Nam)', '', 'Cái', 'TD', NULL, NULL),
(27, '01', 'Máy móc nông cụ nông nghiệp', 'Cày sắt 51 Việt Nam gồm thân cày, lưỡi và diệp', '', 'Cái ', 'TD', NULL, NULL),
(28, '01', 'Máy móc nông cụ nông nghiệp', 'Cày sắt 52 Việt Nam gồm: thân cày + lưỡi cày + diệp cày', '', 'Cái', 'TD', NULL, NULL),
(29, '01', 'Máy móc nông cụ nông nghiệp', 'Dầu nổ máy cày 8 mã lực D8 hiệu changi_R180, động cơ dầu DIESEL-ENGINE', 'Xuất xứ Trung Quốc', 'Cái ', 'TD', NULL, NULL),
(30, '01', 'Máy móc nông cụ nông nghiệp', 'Máy bơm nước thả chìm ddiienj 1 pha hãng Heibao công suất 1,5 KW , hiệu suất 33m3/H, vòng quay 2860r/min, ký hiệu XK06-003 - 00185', 'xuất xứ Trung Quốc', 'Cái', 'TD', NULL, NULL),
(31, '01', 'Máy móc nông cụ nông nghiệp', 'Xe rùa loại khung và thanh chống sắt sơn chống rỉ 03, càng cua nổi , tôn liên Xô chống rỉ dày 2,5 mm tay nắm càng cua bọc nhựa cỡ bánh lốp 350g', '', 'Cái ', 'TD', NULL, NULL),
(32, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tuốt lúa chạy xăng loại 1 gồm ; động cơ 4 kỳ + Thùng tuốt bằng sắt sơn chống rỉ + dây cu loa + Khung bệ ..đủ bộ', '', 'Cái', 'TD', NULL, NULL),
(33, '01', 'Máy móc nông cụ nông nghiệp', 'Máy thái đa năng (Trung Quôc) Máy thái tất cả các loại rau củ quả cho gia súc gia cầm, Cao 1,3m bằng sắt dầy sơn màu xanh mô tơ lõi đồng 1,5KW ; Bao gồm đầy đủ các phụ kiện kèm theo', '', 'Cái ', 'TD', NULL, NULL),
(34, '01', 'Máy móc nông cụ nông nghiệp', 'Bánh lồng công nông 8 mã lực KH : GL61 - loại 3 số', '', 'Cái', 'TD', NULL, NULL),
(35, '01', 'Máy móc nông cụ nông nghiệp', ' Hộp số + tay càng máy cày công nông 8 mã lực KH ; GL61 - loại 3 số', '', 'Cái ', 'TD', NULL, NULL),
(36, '01', 'Máy móc nông cụ nông nghiệp', 'Máy tuốt lúa liên hoàn vừa tuốt vừa sàng thóc gắn đầu nổ 4 mã lực, có ống hút thóc vào KH ; 5TG65; 5T G 68', '', 'Cái', 'TD', NULL, NULL),
(37, '01', 'Máy móc nông cụ nông nghiệp', 'Đàu nổ máy cày 8 mã lực hiệu Quan chai Trung Quốc đã bao gồm cả 2,5 lít dầu nhờn, 2 lít đầu máy', '', 'Cái ', 'TD', NULL, NULL),
(38, '01', 'Máy móc nông cụ nông nghiệp', 'Máy thái thức ăn gia súc đa năng: máy thái tất cả các loại rau,củ,quả,cho gia súc gia cầm (Thái cây khô, cây sắn, caaycor voi ) cao 1,3 m bằng sắt dây, sơn xanh, nặng 35kg, mô tơ điện lõi đồng Trung Quốc 2,5 KW , dây cu roa, ốc vít phụ kiện đầy đủ', 'Xuất xứ Việt Nam', 'Cái', 'TD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dmdvkcb`
--

CREATE TABLE `dmdvkcb` (
  `id` int(10) UNSIGNED NOT NULL,
  `madv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmgiadvgddt`
--

CREATE TABLE `dmgiadvgddt` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmgiarung`
--

CREATE TABLE `dmgiarung` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmgiathuemuanhaxh`
--

CREATE TABLE `dmgiathuemuanhaxh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmhanghoa_cpi`
--

CREATE TABLE `dmhanghoa_cpi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyenso` double NOT NULL DEFAULT '0',
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` double NOT NULL DEFAULT '999',
  `theodoi` double NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmhhdvk`
--

CREATE TABLE `dmhhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmhhdvk`
--

INSERT INTO `dmhhdvk` (`id`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `xuatxu`, `dvt`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', '01.0001', 'Gạo tẻ thường (Khang dân hoặc tương đương)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(2, '01', '01.0002', 'Gạo tẻ ngon (tám thơm hoặc tương đương)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(3, '01', '01.0003', 'Gạo nếp thường (hạt tròn, địa phương)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(4, '01', '01.0004', 'Sắn lát', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(5, '01', '01.0005', 'Bánh mì loại 85-100 garm', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(6, '01', '01.0006', 'Bún tươi, loại bún rối', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(7, '01', '01.0007', 'Mì ăn liền (hiệu Hảo Hảo), vị tôm chua cay, gói nylon 70-100 gram', NULL, NULL, 'đ/gói', 'TD', NULL, NULL),
(8, '01', '01.0008', 'Miến dong loại 1', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(9, '01', '01.0009', 'Thịt lợn mông sấn (heo đùi)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(10, '01', '01.0010', 'Thịt lợn nạc thăn (heo nạc thăn)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(11, '01', '01.0011', 'Thịt lợn ba chỉ (heo ba rọi), loại ba chỉ', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(12, '01', '01.0012', 'Thịt bò thăn loại 1', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(13, '01', '01.0013', 'Thịt bò bắp', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(14, '01', '01.0014', 'Tim lợn tươi', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(15, '01', '01.0015', 'Gà ta còn sống', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(16, '01', '01.0016', 'Gà công nghiệp làm sẵn, nguyên con, bỏ lòng', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(17, '01', '01.0017', 'Gà ta làm sẵn nguyên con, bỏ lòng', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(18, '01', '01.0018', 'Vịt còn sống, loại 1-1,5kg/con', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(19, '01', '01.0019', 'Ngan làm sẵn, nguyên con, bỏ lòng', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(20, '01', '01.0020', 'Vịt làm sẵn, nguyên con, bỏ lòng', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(21, '01', '01.0021', 'Giò lụa, loại 1 kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(22, '01', '01.0022', 'Trứng gà ta không đóng gói, bán rời', NULL, NULL, 'đ/10 quả', 'TD', NULL, NULL),
(23, '01', '01.0023', 'Trứng vịt, loại vừa', NULL, NULL, 'đ/10 quả', 'TD', NULL, NULL),
(24, '01', '01.0024', 'Cá quả, loại 2 con/kg (cá lóc)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(25, '01', '01.0025', 'Cá chép, loại 2 con/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(26, '01', '01.0026', 'Cá trắm', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(27, '01', '01.0027', 'Cá biển loại 4', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(28, '01', '01.0028', 'Tôm rảo, tôm nuôi nước ngọt 40-45 con/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(29, '01', '01.0029', 'Cua biển tươi (còn sống) loại 2-3 con/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(30, '01', '01.0030', 'Lạc nhân loại 1, hạt to đều, sáng vỏ, (đậu phộng)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(31, '01', '01.0031', 'Đậu xanh hạt loại 1', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(32, '01', '01.0032', 'Đậu tương hạt (đậu nành) loại 1', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(33, '01', '01.0033', 'Bắp cải trắng loại to vừa khoảng 0,5-1kg/bắp', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(34, '01', '01.0034', 'Cải xanh', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(35, '01', '01.0035', 'Su hào loại 3-4 củ/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(36, '01', '01.0036', 'Bí xanh', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(37, '01', '01.0037', 'Cà chua tươi, quả to vừa, 8-10 quả/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(38, '01', '01.0038', 'Khoai tây, loại củ to vừa, 8-10 củ/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(39, '01', '01.0039', 'Cam ngọt, vỏ xanh, Việt Nam (4-5 quả/kg)', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(40, '01', '01.0040', 'Chuối tiêu, loại 6-8 quả/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(41, '01', '01.0041', 'Thanh Long 2 quả/kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(42, '01', '01.0042', 'Xoài', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(43, '01', '01.0043', 'Bột ngọt AJINOMOTO gói 454 gram', NULL, NULL, 'đ/gói', 'TD', NULL, NULL),
(44, '01', '01.0044', 'Bột canh Hải Châu thường, gói khoảng 200-250garm', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(45, '01', '01.0045', 'Muối hạt', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(46, '01', '01.0046', 'Dầu thực vật', NULL, NULL, 'đ/lit', 'TD', NULL, NULL),
(47, '01', '01.0047', 'Đường trắng kết tinh, nội, gói 1kg', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(48, '01', '01.0048', 'Sữa bò tươi tiệt trùng hộp giấy 1 lít, có đường, hiệu Vinamilk', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(49, '01', '01.0049', 'Sữa đậu nành hộp giấy 150-200ml, nhãn Fami-hiệu Vinasoy', NULL, NULL, 'đ/hộp', 'TD', NULL, NULL),
(50, '01', '01.0050', 'Sữa đặc hộp 300-400g nhãn Ông Thọ-Vinamilk', NULL, NULL, 'đ/hộp', 'TD', NULL, NULL),
(51, '01', '01.0051', 'Sữa bột dùng cho trẻ em 1 tuổi, hôp 400-600g, nhãn DIELAC', NULL, NULL, 'đ/hộp', 'TD', NULL, NULL),
(52, '01', '01.0052', 'Sữa bột, hộp sắt 400 gram, nhãn ENSURE', NULL, NULL, 'đ/hộp', 'TD', NULL, NULL),
(53, '01', '01.0053', 'Cà phê bột, hiệu Trung Nguyên, gói 200-300gram', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(54, '01', '01.0054', 'Cà phê hoà tan, nhãn 3in 1, hiệu NESCAFE, đóng hộp có 20 gói nhỏ, 16-18 gram', NULL, NULL, 'đ/hộp', 'TD', NULL, NULL),
(55, '01', '01.0055', 'Chè búp khô (trà) Thái Nguyên, loại 1', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(56, '01', '02.0001', 'Nước khoáng Lavie, chai nhựa 500ml', NULL, NULL, 'đ/chai', 'TD', NULL, NULL),
(57, '01', '02.0002', 'Coca Cola chai', NULL, NULL, 'đ/két (24 chai)', 'TD', NULL, NULL),
(58, '01', '02.0003', '7 Up lon', NULL, NULL, 'đ/thùng (24 lon)', 'TD', NULL, NULL),
(59, '01', '02.0004', 'Rượu Vodka Hà nội 39,5 độ, chai thuỷ tinh khoảng 750ml', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(60, '01', '02.0005', 'Rượu vang nội chai 750ml', NULL, NULL, 'đ/chai 750ml', 'TD', NULL, NULL),
(61, '01', '02.0006', 'Bia chai Hà Nội/Sài gòn', NULL, NULL, 'đ/két (24 chai)', 'TD', NULL, NULL),
(62, '01', '02.0007', 'Bia lon Heineken, 300-500ml', NULL, NULL, 'đ/két (24 chai)', 'TD', NULL, NULL),
(63, '01', '02.0008', 'Bia hộp Hà Nội/Sài gòn', NULL, NULL, 'đ/thùng (24 lon)', 'TD', NULL, NULL),
(64, '01', '02.0009', 'Thuốc lá 555 (Việt Nam sản xuất)', NULL, NULL, 'đ/bao', 'TD', NULL, NULL),
(65, '01', '02.0010', 'Thuốc lá Vinataba', NULL, NULL, 'đ/bao', 'TD', NULL, NULL),
(66, '01', '03.0001', 'Vải pha sợi tổng hợp mỏng để may áo (khoảng 70% polyester, 30% bông, ghi rõ xuất xứ, khổ vải......)', NULL, NULL, 'đ/mét', 'TD', NULL, NULL),
(67, '01', '03.0010', 'Công may quần âu nam/ nữ', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(68, '01', '04.0001', 'Xi măng PCB30', NULL, NULL, 'đ/bao', 'TD', NULL, NULL),
(69, '01', '04.0002', 'Thép XD phi 6-8 LD', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(70, '01', '04.0003', 'Cát vàng thô, mua rời dưới 2 m3/lần, tại nơi cung ứng (không phải nơi khai thác)', NULL, NULL, 'đ/m3', 'TD', NULL, NULL),
(71, '01', '04.0004', 'Cát đen thô, mua rời dưới 2 m3/lần, tại nơi cung ứng (không phải nơi khai thác)', NULL, NULL, 'đ/m3', 'TD', NULL, NULL),
(72, '01', '04.0005', 'Gạch xây, gạch ống 2 lỗ, cỡ rộng 10 x dài 22, loại 1, mua rời tại nơi cung ứng', NULL, NULL, 'đ/viên', 'TD', NULL, NULL),
(73, '01', '04.0006', 'Gạch xây, gạch đặc lò gia công, mua rời tại nơi cung ứng', NULL, NULL, 'đ/viên', 'TD', NULL, NULL),
(74, '01', '04.0007', 'Ống nhựa phi 90 cấp I', NULL, NULL, 'đ/mét', 'TD', NULL, NULL),
(75, '01', '04.0008', 'Ống nhựa phi 20', NULL, NULL, 'đ/mét', 'TD', NULL, NULL),
(76, '01', '04.0009', 'Ngói lợp loại 22viên/m2, loại 1, mua lẻ dưới 10m2', NULL, NULL, 'đ/viên', 'TD', NULL, NULL),
(77, '01', '04.0010', 'Sơn tường trong nhà ghi rõ nhãn hiệu (NIPPON-VATAX....), thùng 18lít, mua cả thùng', NULL, NULL, 'đ/thùng', 'TD', NULL, NULL),
(78, '01', '04.0011', 'Sơn tường ngoài nhà, ghi rõ nhãn hiệu (NIPPON, Dulux...), thùng 18lít, mua cả thùng', NULL, NULL, 'đ/thùng', 'TD', NULL, NULL),
(79, '01', '04.0012', 'Công lao động phổ thông (thợ phụ nề)', NULL, NULL, 'đ/công', 'TD', NULL, NULL),
(80, '01', '04.0013', 'Nước máy sinh hoạt', NULL, NULL, 'đ/m3', 'TD', NULL, NULL),
(81, '01', '04.0014', 'Gas Petro (VN,SG) 13kg/bình', NULL, NULL, 'đ/b/13 kg', 'TD', NULL, NULL),
(82, '01', '04.0015', 'Dầu hỏa', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(83, '01', '04.0016', 'Than tổ ong cỡ vừa', NULL, NULL, 'đ/viên', 'TD', NULL, NULL),
(84, '01', '05.0001', 'Máy điều hòa nhiệt độ, lấy một nhãn hiệu ........, 1 chiều 9000 PTU, Model...........,hàng VN lắp, phụ kiện TQ, không kể công lắp và phụ kiện lắp máy vào nhà', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(85, '01', '05.0002', 'Tủ lạnh 2 cửa, 150lít-200 lít, ghi rõ nhãn hiệu Samsung, LG, Toshiba, Model...', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(86, '01', '05.0003', 'Ti vi 21\" LG', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(87, '01', '05.0004', 'Máy giặt lồng đứng 7kg, tự động, (ghi rõ Model, nhãn hiệu)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(88, '01', '05.0005', 'Máy giặt lồng ngang 7kg, tự động, (ghi rõ Model, nhãn hiệu)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(89, '01', '05.0006', 'Bình nước nóng trực tiếp, (ghi rõ Model, nhãn hiệu, công suất...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(90, '01', '05.0007', 'Máy bơm nước gia đình, (ghi rõ Model, nhãn hiệu, công suất...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(91, '01', '05.0008', 'Máy vi tính để bàn đồng bộ, Hiệu FPT, (ghi rõ cấu hình)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(92, '01', '05.0009', 'Máy tính xách tay (Laptop) nhãn hiệu Acer, HP, Dell, Lenovo... ( ghi rõ cấu hình)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(93, '01', '05.0010', 'Quạt đứng (quạt cây) thân, đế, vỏ nhựa, 400mm, 220V, có lồng nhựa bảo hiểm, hiệu Vinawind hoặc tương đương', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(94, '01', '05.0011', 'Bóng đèn Compact đui xoáy, 8W, tiết kiệm điện năng', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(95, '01', '05.0012', 'Bếp ga đôi, hiệu RINNAI, loại mỏng, hàng liên doanh Nhật-Việt', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(96, '01', '05.0013', 'Nồi cơm điện (Model, nhãn hiệu, dung tích, xuất xứ...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(97, '01', '05.0014', 'Lò vi sóng, (Model, nhãn hiệu, công suất, dung tích,, xuất xứ...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(98, '01', '05.0015', 'ấm đun nước siêu tốc, ghi rõ nhãn hiệu', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(99, '01', '06.0001', 'Zinnat tablets, hoạt chất Cefuroxim 500mg, Viên nén bao phim, Hộp 1 vỉ x 10 viên, Hãng sản xuất: Glaxo Operations UK Ltd; Nước sản xuất : UK', NULL, NULL, 'đ/10 viên', 'TD', NULL, NULL),
(100, '01', '06.0002', 'Efferalgan,Hoạt chất Paracetamol 500mg,Viên nén sủi bọt,Hộp 4 vỉ x 4 viên, hộp 10 vỉ x 4 viên ,Hãng sản xuất: Bristol Myers Squibb;Nước sản xuất:France', NULL, NULL, 'đ/10 viên', 'TD', NULL, NULL),
(101, '01', '06.0003', 'Thuốc cảm thông thường', NULL, NULL, 'đ/lọ 100 viên', 'TD', NULL, NULL),
(102, '01', '06.0004', 'Thuốc ampi nội 250mg', NULL, NULL, 'đ/lọ 100 viên', 'TD', NULL, NULL),
(103, '01', '06.0005', 'Thuốc thú y', NULL, NULL, 'đ/chai', 'TD', NULL, NULL),
(104, '01', '06.0006', 'Thuốc bảo vệ thực vật', NULL, NULL, 'đ/gói', 'TD', NULL, NULL),
(105, '01', '06.0007', 'Thức ăn chăn nuôi sản xuất Công nghiệp', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(106, '01', '07.0001', 'Xe ô tô 4 chỗ hãng TOYOTA mới, ghi rõ năm sản xuất', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(107, '01', '07.0002', 'Xe máy HONDA, LD, nhãn Wave RS, 1 lOcc', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(108, '01', '07.0003', 'Xe máy ga, nhãn Lead 125cc Honda', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(109, '01', '07.0004', 'Xe đạp điện (hiệu hãng, xuất xứ...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(110, '01', '07.0005', 'Lốp ô tô', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(111, '01', '07.0006', 'Ắc quy ô tô hiệu Bosch hoặc tương đương', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(112, '01', '07.0007', 'Lốp xe máy nội, hiệu Sao vàng hoặc tương đương', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(113, '01', '07.0008', 'Săm xe máy nội, hiệu Sao vàng hoặc tương đương', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(114, '01', '07.0009', 'Xích xe máy liên doanh HONDA', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(115, '01', '07.0010', 'Xăng A95 không chì, lấy giá bán lẻ tại cây xăng đại lý', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(116, '01', '07.0011', 'Xăng A92 không chì hoặc tương đương, lấy giá bán lẻ tại cây xăng đại lý', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(117, '01', '07.0012', 'Dầu Diezel, lấy giá bán lẻ tại cây xăng đại lý', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(118, '01', '07.0013', 'Dầu xe máy, can nhựa 0,75ml, hiệu SHELL', NULL, NULL, 'đ/lít', 'TD', NULL, NULL),
(119, '01', '07.0014', 'Bảo dưỡng toàn bộ xe máy, chỉ tính công thợ', NULL, NULL, 'đ/lần', 'TD', NULL, NULL),
(120, '01', '07.0015', 'Rửa xe máy', NULL, NULL, 'đ/lần', 'TD', NULL, NULL),
(121, '01', '07.0016', 'Trông giữ xe máy', NULL, NULL, 'đ/lần', 'TD', NULL, NULL),
(122, '01', '07.0017', 'Vé ô tô đi đường dài (tuyên dài 200-300 km, chọn 1 tuyến), xe 50 chỗ, máy lạnh', NULL, NULL, 'đ/km', 'TD', NULL, NULL),
(123, '01', '07.0018', 'Vé xe buýt đi trong nội tỉnh, dưới 30km', NULL, NULL, 'đ/vé', 'TD', NULL, NULL),
(124, '01', '07.0019', 'Taxi lấy giá 10km đầu, loại xe 4 chỗ kiểu xe TOYOTA, (hãng taxi)', NULL, NULL, 'đ/km', 'TD', NULL, NULL),
(125, '01', '08.0001', 'Máy điện thoại cố định loại thường, (hiệu, model, xuất xứ....)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(126, '01', '08.0002', 'Máy ảnh kỹ thuật số, (nhãn hiệu, quy cách, xuất xứ...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(127, '01', '09.0001', 'Vở (tập) ô ly học sinh (ghi rõ số trang)', NULL, NULL, 'đ/quyển', 'TD', NULL, NULL),
(128, '01', '09.0002', 'Giấy trắng ram, khổ A4, Bãi Bằng', NULL, NULL, 'đ/ram', 'TD', NULL, NULL),
(129, '01', '09.0003', 'Bút bi Thiên Long, một màu', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(130, '01', '10.0001', 'Đàn ghi ta nội, (nhãn hiệu, quy cách, xuất xứ....)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(131, '01', '10.0002', 'Sách tiểu thuyết tác giả Viêt Nam, (số trang, kích thước )', NULL, NULL, 'đ/quyển', 'TD', NULL, NULL),
(132, '01', '10.0003', 'Từ điển Anh Việt 180.000 từ', NULL, NULL, 'đ/quyển', 'TD', NULL, NULL),
(133, '01', '10.0004', 'Chụp ảnh mầu, kèm 1 ảnh, cỡ 13xl8cm', NULL, NULL, 'đ/kiểu', 'TD', NULL, NULL),
(134, '01', '10.0005', 'In một ảnh màu cỡ 13 X 18 cm, giấy bóng', NULL, NULL, 'đ/ảnh', 'TD', NULL, NULL),
(135, '01', '10.0006', 'Phí thuê bao truyền hình cáp (của TH địa phương)', NULL, NULL, 'đ/tháng', 'TD', NULL, NULL),
(136, '01', '10.0007', 'Phí thuê bao Internet hàng tháng (giá của TH địa phương)', NULL, NULL, 'đ/tháng', 'TD', NULL, NULL),
(137, '01', '10.0008', 'Vợt cầu lông hàng nội, (loại, kiểu, xuất xứ...)', NULL, NULL, 'đ/đôi', 'TD', NULL, NULL),
(138, '01', '10.0009', 'Vợt bóng bàn, (loại, kiểu, xuất xứ...)', NULL, NULL, 'đ/đôi', 'TD', NULL, NULL),
(139, '01', '10.0010', 'Quả bóng đá hàng nội', NULL, NULL, 'đ/quả', 'TD', NULL, NULL),
(140, '01', '10.0011', 'Ghế ngồi mat xa (kiểu, quy cách, công suất, hiệu, xuất xứ...)', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(141, '01', '10.0012', 'Vé bơi lội (người lớn)', NULL, NULL, 'đ/giờ', 'TD', NULL, NULL),
(142, '01', '10.0013', 'Thuê sân đá bóng theo giờ', NULL, NULL, 'đ/giờ', 'TD', NULL, NULL),
(143, '01', '10.0014', 'Thuê sân chơi tennis theo giờ không bao gồm dịch vụ nhặt bóng', NULL, NULL, 'đ/giờ', 'TD', NULL, NULL),
(144, '01', '10.0015', 'Búp bê nhựa (loại, cỡ, xuất xứ...)', NULL, NULL, 'đ/con', 'TD', NULL, NULL),
(145, '01', '10.0016', 'Thú nhồi bông loại vừa (loại, cỡ, xuất xứ...)', NULL, NULL, 'đ/con', 'TD', NULL, NULL),
(146, '01', '10.0017', 'Hoa hồng', NULL, NULL, 'đ/10 bông', 'TD', NULL, NULL),
(147, '01', '10.0018', 'Hoa cúc', NULL, NULL, 'đ/10 bông', 'TD', NULL, NULL),
(148, '01', '10.0019', 'Vé xem phim tại rạp, loại bình thường, ghế hạng A', NULL, NULL, 'đ/vé', 'TD', NULL, NULL),
(149, '01', '10.0020', 'Du lịch trọn gói trong nước cho 1 người chuyến 2 ngày 1 đêm (từ đâu, đến đâu...)', NULL, NULL, 'đ/ngày/người', 'TD', NULL, NULL),
(150, '01', '10.0021', 'Du lịch trọn gói đi Thái Lan hoặc tương đương, cho 1 người chuyến 4 ngày 3 đêm.', NULL, NULL, 'đ/ngày/người', 'TD', NULL, NULL),
(151, '01', '10.0022', 'Phòng khách sạn loại thường, hai giường đơn, có tivi, điều hoà, nước nóng, điện thoại cố định, vệ sinh khép kín', NULL, NULL, '', 'TD', NULL, NULL),
(152, '01', '10.0023', 'Phòng khách sạn 3 sao hai giường đơn, có tivi, điêu hòa nước nóng, điện thoại cố định, vệ sinh khép kín,Wifí', NULL, NULL, 'đ/ngày-đêm', 'TD', NULL, NULL),
(153, '01', '10.0024', 'Phòng nhà khách tư nhân, 1 giường, điều hoà, nước nóng-lạnh, phòng vệ sinh khép kín', NULL, NULL, '', 'TD', NULL, NULL),
(154, '01', '11.0001', 'Phao tròn', NULL, NULL, 'đ/chiếc', 'TD', NULL, NULL),
(155, '01', '11.0002', 'Phân U rê', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(156, '01', '11.0003', 'Phân Dap', NULL, NULL, 'đ/kg', 'TD', NULL, NULL),
(157, '01', '11.0004', 'Vàng 99,99%, kiểu nhẫn tròn 1-2 chỉ', NULL, NULL, 'đ/chỉ', 'TD', NULL, NULL),
(158, '01', '11.0005', 'Đô la Mỹ, loại tờ 50-100USD', NULL, NULL, 'đ/USD', 'TD', NULL, NULL),
(159, '01', '11.0006', 'Euro (NHTM)', NULL, NULL, 'đ/Euro', 'TD', NULL, NULL),
(160, '01', '11.0007', 'Nhân dân tệ (NHTM)', NULL, NULL, 'đ/NDT', 'TD', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dmmhbinhongia`
--

CREATE TABLE `dmmhbinhongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `mamh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenmh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmmhbinhongia`
--

INSERT INTO `dmmhbinhongia` (`id`, `mamh`, `tenmh`, `hienthi`, `phanloai`, `created_at`, `updated_at`) VALUES
(1, 'XD', 'Xăng Dầu', 'Xăng, dầu', 'dkgxangdau', '2018-10-04 04:38:49', '2018-10-04 04:38:49'),
(2, 'DBL', 'Điện bán lẻ', 'Điện bán lẻ', 'dkgdien', '2018-10-04 05:24:25', '2018-10-04 05:27:07'),
(3, 'KDMHL', 'Khí dầu mỏ hóa lỏng (LPG)', 'Khí dầu hóa lỏng', 'dkgkhidau', '2018-10-05 07:56:17', '2018-10-05 07:56:17'),
(4, 'PDURENPK', ' Phân đạm urê; phân NPK', 'Phân đạm ure; phân NPK', 'dkgphan', '2018-10-05 07:56:42', '2018-10-05 08:01:39'),
(5, 'TBVTV', 'Thuốc bảo vệ thực vật, bao gồm: thuốc trừ sâu, thuốc trừ bệnh, thuốc trừ cỏ', 'Thuốc bảo vệ thực vật', 'dkgthuocbvtv', '2018-10-06 02:29:14', '2018-10-18 07:15:18'),
(6, 'VXGSGC', 'Vac-xin phòng bệnh cho gia súc, gia cầm', 'Vắc xin phòng bệnh gia súc, gia cầm', 'dkgvacxingsgc', '2018-10-18 07:07:12', '2018-10-18 07:07:12'),
(7, 'MA', 'Muối ăn', 'Muối ăn', 'dkgmuoi', '2018-10-18 07:07:29', '2018-10-18 07:07:29'),
(8, 'STED6T', 'Sữa dành cho trẻ em dưới 06 tuổi', 'Sữa dành cho TE dưới 6 tuổi', 'dkgsuate6t', '2018-10-18 07:07:51', '2018-10-18 07:07:51'),
(9, 'DADTL', 'Đường ăn, bao gồm đường trắng và đường tinh luyện', 'Đường ăn', 'dkgduong', '2018-10-18 07:08:08', '2018-10-18 07:17:49'),
(10, 'TGTT', 'Thóc, gạo tẻ thường', 'Thóc, gạo tẻ thường', 'dkgthocgao', '2018-10-18 07:08:28', '2018-10-18 07:18:00'),
(11, 'TPCB', 'Thuốc phòng bệnh, chữa bệnh cho người thuộc danh mục thuốc chữa bệnh thiết yếu sử dụng tại cơ sở khám bệnh, chữa bệnh.', 'Thuốc phòng, chữa bệnh', 'dkgthuocpcb', '2018-10-18 07:08:57', '2018-10-18 07:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `dmphilephi`
--

CREATE TABLE `dmphilephi` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmqdgiadat`
--

CREATE TABLE `dmqdgiadat` (
  `id` int(10) UNSIGNED NOT NULL,
  `soquyetdinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sohieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `ngayquyetdinh` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmthamdinhgiahh`
--

CREATE TABLE `dmthamdinhgiahh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmthamdinhgiahh`
--

INSERT INTO `dmthamdinhgiahh` (`id`, `manhom`, `tennhom`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'Giá hàng hóa trợ cấp trung ương', 'TD', '2019-01-07 02:26:53', '2019-01-07 02:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `dmthuetn`
--

CREATE TABLE `dmthuetn` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masopnhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaden` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoctn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dmvlxd`
--

CREATE TABLE `dmvlxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dtapdungdvlt`
--

CREATE TABLE `dtapdungdvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `madtad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendtad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dvkcb`
--

CREATE TABLE `dvkcb` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dvkcbct`
--

CREATE TABLE `dvkcbct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dvkcbctdf`
--

CREATE TABLE `dvkcbctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general-configs`
--

CREATE TABLE `general-configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `tendonvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maqhns` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilapbieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci,
  `thongtinhd` text COLLATE utf8_unicode_ci,
  `thoihanlt` double NOT NULL DEFAULT '0',
  `thoihanvt` double NOT NULL DEFAULT '0',
  `thoihangs` double NOT NULL DEFAULT '0',
  `thoihantacn` double NOT NULL DEFAULT '0',
  `sodvvt` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general-configs`
--

INSERT INTO `general-configs` (`id`, `tendonvi`, `maqhns`, `diachi`, `tel`, `thutruong`, `ketoan`, `nguoilapbieu`, `diadanh`, `setting`, `thongtinhd`, `thoihanlt`, `thoihanvt`, `thoihangs`, `thoihantacn`, `sodvvt`, `created_at`, `updated_at`) VALUES
(1, 'Sở Tài Chính Tỉnh Cao Bằng', '4800427944', 'Trung tâm hành chính - Phường Đề Thám - Tp Cao Bằng', 'Email: stccaobang@mof.gov.vn - Điện thoại: 026.3852221', 'Hoàng Tố Quyên', 'Chưa có', 'Chưa có', 'Tỉnh Cao Bằng', '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\"},\"giadaugiadat\":{\"index\":\"1\"},\"giathuedatnuoc\":{\"index\":\"1\"},\"giarung\":{\"index\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\"},\"gianuocsh\":{\"index\":\"1\"},\"giathuetscong\":{\"index\":\"1\"},\"giadvgddt\":{\"index\":\"1\"},\"giadvkcb\":{\"index\":\"1\"},\"giahhdvk\":{\"index\":\"1\"},\"giathuetn\":{\"index\":\"1\"},\"gialephitruocba\":{\"index\":\"1\"},\"giaphilephi\":{\"index\":\"1\"},\"bog\":{\"index\":\"1\"},\"bpbog\":{\"index\":\"1\"},\"dangkygia\":{\"index\":\"1\"},\"dkgxangdau\":{\"index\":\"1\"},\"dkgdien\":{\"index\":\"1\"},\"dkgkhidau\":{\"index\":\"1\"},\"dkgphan\":{\"index\":\"1\"},\"dkgthuocbvtv\":{\"index\":\"1\"},\"dkgvacxingsgc\":{\"index\":\"1\"},\"dkgmuoi\":{\"index\":\"1\"},\"dkgsuate6t\":{\"index\":\"1\"},\"dkgduong\":{\"index\":\"1\"},\"dkgthocgao\":{\"index\":\"1\"},\"dkgthuocpcb\":{\"index\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"kkgia\":{\"index\":\"1\"},\"dvlt\":{\"index\":\"1\"},\"tpcnte6t\":{\"index\":\"1\"},\"tacn\":{\"index\":\"1\"},\"dvvt\":{\"index\":\"1\"},\"vtxk\":{\"index\":\"1\"},\"vtxtx\":{\"index\":\"1\"},\"vlxd\":{\"index\":\"1\"},\"xmtxd\":{\"index\":\"1\"},\"dvhdtm\":{\"index\":\"1\"},\"csdlthamdinhgia\":{\"index\":\"1\"},\"thamdinhgia\":{\"index\":\"1\"},\"thamdinhgiahh\":{\"index\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"},\"giacpi\":{\"index\":\"1\"}}', '', 0, 0, 0, 0, 0, '2019-01-06 08:11:47', '2019-01-07 02:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `giacacloaidat`
--

CREATE TABLE `giacacloaidat` (
  `id` int(10) UNSIGNED NOT NULL,
  `maso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` text COLLATE utf8_unicode_ci,
  `hienthi` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadat` double NOT NULL DEFAULT '0',
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giadvgddt`
--

CREATE TABLE `giadvgddt` (
  `id` int(10) UNSIGNED NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giadvgddtct`
--

CREATE TABLE `giadvgddtct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `giadv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giadvgddtctdf`
--

CREATE TABLE `giadvgddtctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `giadv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giahhdvk`
--

CREATE TABLE `giahhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdunglk` date DEFAULT NULL,
  `soqdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giahhdvkct`
--

CREATE TABLE `giahhdvkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giahhdvkctdf`
--

CREATE TABLE `giahhdvkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gianuocsh`
--

CREATE TABLE `gianuocsh` (
  `id` int(10) UNSIGNED NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gianuocshct`
--

CREATE TABLE `gianuocshct` (
  `id` int(10) UNSIGNED NOT NULL,
  `doituong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giachuathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giacothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmttyle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhtien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gianuocshctdf`
--

CREATE TABLE `gianuocshctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `doituong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giachuathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giacothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmttyle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhtien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giarung`
--

CREATE TABLE `giarung` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giarungct`
--

CREATE TABLE `giarungct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loairung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiasd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiat50` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiat1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiaxp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giarungctdf`
--

CREATE TABLE `giarungctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loairung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiasd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiat50` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiat1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiaxp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuedatnuoc`
--

CREATE TABLE `giathuedatnuoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuedatnuocct`
--

CREATE TABLE `giathuedatnuocct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuedatnuocctdf`
--

CREATE TABLE `giathuedatnuocctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuemuanhaxh`
--

CREATE TABLE `giathuemuanhaxh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuemuanhaxhct`
--

CREATE TABLE `giathuemuanhaxhct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loainha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hesodc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuemuanhaxhctdf`
--

CREATE TABLE `giathuemuanhaxhctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loainha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hesodc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuetscong`
--

CREATE TABLE `giathuetscong` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuetscongct`
--

CREATE TABLE `giathuetscongct` (
  `id` int(10) UNSIGNED NOT NULL,
  `tents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hdthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ththue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotienthuenam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giathuetscongctdf`
--

CREATE TABLE `giathuetscongctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `tents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soluong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hdthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ththue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotienthuenam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giavtxk`
--

CREATE TABLE `giavtxk` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ytcauthanhgia` text COLLATE utf8_unicode_ci,
  `thydggadgia` text COLLATE utf8_unicode_ci,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giavtxkct`
--

CREATE TABLE `giavtxkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sokm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sltglk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphittlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphikhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkddtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphibhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiqllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tchiphisxkdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphidvklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhtblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sltg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphikh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkddt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphibh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tchiphisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphidvk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhtb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaitrinhctcp` text COLLATE utf8_unicode_ci,
  `giahllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giahl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giavtxkctdf`
--

CREATE TABLE `giavtxkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemdau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemcuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sokm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sltglk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphittlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphikhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkddtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphibhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiqllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tchiphisxkdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphidvklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhtblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sltg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphinc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphikh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxkddt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphisxc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphitc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphibh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphiql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tchiphisxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chiphidvk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanhtb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giathanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaitrinhctcp` text COLLATE utf8_unicode_ci,
  `giahllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giahl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hsgia_chitiet_cpi`
--

CREATE TABLE `hsgia_chitiet_cpi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyenso` double NOT NULL DEFAULT '0',
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` double NOT NULL DEFAULT '999',
  `giatu` double NOT NULL DEFAULT '0',
  `giaden` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hsgia_cpi`
--

CREATE TABLE `hsgia_cpi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgnhap` date DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hstonghop_chitiet_cpi`
--

CREATE TABLE `hstonghop_chitiet_cpi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quyenso` double NOT NULL DEFAULT '0',
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` double NOT NULL DEFAULT '999',
  `giahh` double NOT NULL DEFAULT '0',
  `chiso` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hstonghop_cpi`
--

CREATE TABLE `hstonghop_cpi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgnhap` date DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdkg`
--

CREATE TABLE `kkdkg` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theoqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdkgct`
--

CREATE TABLE `kkdkgct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkdkgctdf`
--

CREATE TABLE `kkdkgctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quycach` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` double DEFAULT NULL,
  `giakk` double DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvhdtm`
--

CREATE TABLE `kkgiadvhdtm` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvhdtmct`
--

CREATE TABLE `kkgiadvhdtmct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvhdtmctdf`
--

CREATE TABLE `kkgiadvhdtmctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvlt`
--

CREATE TABLE `kkgiadvlt` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macskd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvltct`
--

CREATE TABLE `kkgiadvltct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madtad` text COLLATE utf8_unicode_ci,
  `apdung` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiadvltctdf`
--

CREATE TABLE `kkgiadvltctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `sohieu` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `mucgialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucgiakk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madtad` text COLLATE utf8_unicode_ci,
  `apdung` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiatacn`
--

CREATE TABLE `kkgiatacn` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiatacnct`
--

CREATE TABLE `kkgiatacnct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `cpnvlttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpncttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpsxclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvpxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpvllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdcsxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpkhtscdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdvmnlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbtklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tcpsxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpqldnlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cptclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgttblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lndklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbctlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuettdblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuegtgtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbdctlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvltt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnctt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpsxc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvpx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpvl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdcsx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpkhtscd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdvmn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbtk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tcpsx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpqldn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cptc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgttb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lndk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuettdb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuegtgt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbdct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiatacnctdf`
--

CREATE TABLE `kkgiatacnctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `cpnvlttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpncttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpsxclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvpxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpvllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdcsxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpkhtscdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdvmnlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbtklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tcpsxlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpqldnlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cptclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgttblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lndklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbctlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuettdblk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuegtgtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbdctlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvltt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnctt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpsxc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpnvpx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpvl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdcsx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpkhtscd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpdvmn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbtk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tcpsx` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpbh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpqldn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cptc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgttb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lndk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuettdb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuegtgt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gbdct` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavlxd`
--

CREATE TABLE `kkgiavlxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavlxdct`
--

CREATE TABLE `kkgiavlxdct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavlxdctdf`
--

CREATE TABLE `kkgiavlxdctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavtxtx`
--

CREATE TABLE `kkgiavtxtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ytcauthanhgia` text COLLATE utf8_unicode_ci,
  `thydggadgia` text COLLATE utf8_unicode_ci,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavtxtxct`
--

CREATE TABLE `kkgiavtxtxct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiavtxtxctdf`
--

CREATE TABLE `kkgiavtxtxctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiaxmtxd`
--

CREATE TABLE `kkgiaxmtxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiaxmtxdct`
--

CREATE TABLE `kkgiaxmtxdct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgiaxmtxdctdf`
--

CREATE TABLE `kkgiaxmtxdctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgs`
--

CREATE TABLE `kkgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thqd` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `socv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaycvlk` date DEFAULT NULL,
  `ngayhieuluc` date DEFAULT NULL,
  `ttnguoinop` text COLLATE utf8_unicode_ci,
  `ngaynhan` date DEFAULT NULL,
  `sohsnhan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `ngaychuyen` datetime DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgsct`
--

CREATE TABLE `kkgsct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `giaQlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaClk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCnclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCkhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCcmlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCbhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCqllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaTClk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCPlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZdvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaQ` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCnc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCkh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCcm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCbh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaTC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZ` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kkgsctdf`
--

CREATE TABLE `kkgsctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `giaQlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaClk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCttlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCnclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCkhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCklk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCcmlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtclk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCbhlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCqllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaTClk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCPlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZdvlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaQ` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCnc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCkh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCcm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCtc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCbh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaTC` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaCP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZ` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaZdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lephitruocba`
--

CREATE TABLE `lephitruocba` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` text COLLATE utf8_unicode_ci,
  `ngayapdung` date DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lephitruocbact`
--

CREATE TABLE `lephitruocbact` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhanhieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tentm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socho` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatinhlptb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lephitruocbactdf`
--

CREATE TABLE `lephitruocbactdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhanhieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tentm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socho` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatinhlptb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loaivbqlnn`
--

CREATE TABLE `loaivbqlnn` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaivb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenvb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_10_14_022915_create_general-configs_table', 1),
(3, '2018_03_29_163043_create_district_table', 1),
(4, '2018_04_02_084739_create_town_table', 1),
(5, '2018_04_24_220044_create_diabanhd_table', 1),
(6, '2018_05_02_150447_create_viewpage_table', 1),
(7, '2018_10_02_101124_create_dmqdgiadat_table', 1),
(8, '2018_10_02_110427_create_giacacloaidat_table', 1),
(9, '2018_10_04_110618_create_dmmhbinhongia_table', 1),
(10, '2018_10_04_124126_create_binhongia_table', 1),
(11, '2018_10_05_083407_create_binhongiactdf_table', 1),
(12, '2018_10_05_102036_create_binhongiact_table', 1),
(13, '2018_10_06_090515_create_thamdinhgia_table', 1),
(14, '2018_10_06_104037_create_thamdinhgiactdf_table', 1),
(15, '2018_10_06_150517_create_thamdinhgiact_table', 1),
(16, '2018_10_08_145025_create_lephitruocba_table', 1),
(17, '2018_10_08_145259_create_lephitruocbactdf_table', 1),
(18, '2018_10_08_145835_create_nhomlephitruocba_table', 1),
(19, '2018_10_08_154301_create_lephitruocbact_table', 1),
(20, '2018_10_09_135927_create_giathuedatnuoc_table', 1),
(21, '2018_10_09_135940_create_giathuedatnuocctdf_table', 1),
(22, '2018_10_09_135950_create_giathuedatnuocct_table', 1),
(23, '2018_10_10_095952_create_dmgiarung_table', 1),
(24, '2018_10_10_101838_create_giarung_table', 1),
(25, '2018_10_10_102400_create_giarungctdf_table', 1),
(26, '2018_10_10_141136_create_giarungct_table', 1),
(27, '2018_10_10_151535_create_nhomthuetn_table', 1),
(28, '2018_10_10_152849_create_dmthuetn_table', 1),
(29, '2018_10_11_104332_create_thuetainguyen_table', 1),
(30, '2018_10_11_123305_create_thuetainguyenctdf_table', 1),
(31, '2018_10_11_150409_create_thuetainguyenct_table', 1),
(32, '2018_10_12_093605_create_nhomdvkcb_table', 1),
(33, '2018_10_12_095823_create_dmdvkcb_table', 1),
(34, '2018_10_12_104557_create_dvkcb_table', 1),
(35, '2018_10_12_105151_create_dvkcbctdf_table', 1),
(36, '2018_10_12_123706_create_dvkcbct_table', 1),
(37, '2018_10_13_092848_create_register_table', 1),
(38, '2018_10_13_103856_create_company_table', 1),
(39, '2018_10_15_102631_create_ttdntd_table', 1),
(40, '2018_10_15_150722_create_cskddvlt_table', 1),
(41, '2018_10_15_152805_create_kkgiadvlt_table', 1),
(42, '2018_10_16_085916_create_dtapdungdvlt_table', 1),
(43, '2018_10_16_094818_create_kkgiadvltctdf_table', 1),
(44, '2018_10_16_110239_create_kkgiadvltct_table', 1),
(45, '2018_10_18_094133_create_nhomhhdvk_table', 1),
(46, '2018_10_18_100022_create_dmhhdvk_table', 1),
(47, '2018_10_18_102622_create_giahhdvk_table', 1),
(48, '2018_10_18_103443_create_giahhdvkctdf_table', 1),
(49, '2018_10_18_111812_create_giahhdvkct_table', 1),
(50, '2018_10_22_085407_create_vanbanqlnn_table', 1),
(51, '2018_10_22_091816_create_loaivbqlnn_table', 1),
(52, '2018_10_31_145541_create_kkgs_table', 1),
(53, '2018_10_31_145657_create_kkgsct_table', 1),
(54, '2018_10_31_145751_create_kkgsctdf_table', 1),
(55, '2018_11_01_153815_create_dmphilephi_table', 1),
(56, '2018_11_01_161226_create_philephi_table', 1),
(57, '2018_11_02_102813_create_philephictdf_table', 1),
(58, '2018_11_02_105902_create_philephict_table', 1),
(59, '2018_11_05_093753_create_daugiadat_table', 1),
(60, '2018_11_05_095547_create_daugiadatctdf_table', 1),
(61, '2018_11_05_111141_create_daugiadatct_table', 1),
(62, '2018_11_10_095553_create_giathuetscong_table', 1),
(63, '2018_11_10_103038_create_giathuetscongctdf_table', 1),
(64, '2018_11_12_093705_create_giathuetscongct_table', 1),
(65, '2018_11_12_141855_create_gianuocsh_table', 1),
(66, '2018_11_12_142336_create_gianuocshctdf_table', 1),
(67, '2018_11_12_143114_create_gianuocshct_table', 1),
(68, '2018_11_13_141757_create_dmgiadvgddt_table', 1),
(69, '2018_11_13_144350_create_giadvgddt_table', 1),
(70, '2018_11_13_145111_create_giadvgddtctdf_table', 1),
(71, '2018_11_13_145357_create_giadvgddtct_table', 1),
(72, '2018_11_14_092955_create_dmgiathuemuanhaxh_table', 1),
(73, '2018_11_14_100203_create_giathuemuanhaxh_table', 1),
(74, '2018_11_14_100403_create_giathuemuanhaxhctdf_table', 1),
(75, '2018_11_14_100412_create_giathuemuanhaxhct_table', 1),
(76, '2018_11_20_093809_create_kkgiatacn_table', 1),
(77, '2018_11_20_093843_create_kkgiatacnctdf_table', 1),
(78, '2018_11_20_093850_create_kkgiatacnct_table', 1),
(79, '2018_11_22_094519_create_giavtxk_table', 1),
(80, '2018_11_22_094529_create_giavtxkctdf_table', 1),
(81, '2018_11_22_094536_create_giavtxkct_table', 1),
(82, '2018_11_29_143107_create_ngaynghile_table', 1),
(83, '2018_12_04_092145_create_kkgiavtxtx_table', 1),
(84, '2018_12_04_092935_create_kkgiavtxtxctdf_table', 1),
(85, '2018_12_04_133347_create_kkgiavtxtxct_table', 1),
(86, '2018_12_10_173115_create_dmthamdinhgiahh_table', 1),
(87, '2018_12_10_173442_create_dmctthamdinhgiahh_table', 1),
(88, '2018_12_11_095329_create_thamdinhgiahh_table', 1),
(89, '2018_12_11_095342_create_thamdinhgiahhctdf_table', 1),
(90, '2018_12_11_095351_create_thamdinhgiahhct_table', 1),
(91, '2018_12_12_091849_create_thgiahhdvk_table', 1),
(92, '2018_12_12_091903_create_thgiahhdvkctdf_table', 1),
(93, '2018_12_12_091910_create_thgiahhdvkct_table', 1),
(94, '2018_12_13_104322_create_dkgdoanhnghiep_table', 1),
(95, '2018_12_14_092929_create_dkghoso_table', 1),
(96, '2018_12_14_093813_create_dkghosoct_table', 1),
(97, '2018_12_14_095408_create_dmhanghoa_cpi_table', 1),
(98, '2018_12_14_095427_create_hsgia_cpi_table', 1),
(99, '2018_12_14_095442_create_hsgia_chitiet_cpi_table', 1),
(100, '2018_12_14_095457_create_hstonghop_chitiet_cpi_table', 1),
(101, '2018_12_14_095507_create_hstonghop_cpi_table', 1),
(102, '2018_12_14_152539_create_dkghosoctdf_table', 1),
(103, '2018_12_25_154217_create_dmvlxd_table', 1),
(104, '2018_12_26_094917_create_kkgiavlxd_table', 1),
(105, '2019_01_05_100612_create_kkgiavlxdctdf_table', 1),
(106, '2019_01_05_110017_create_kkgiavlxdct_table', 1),
(107, '2019_01_05_144656_create_kkdkg_table', 1),
(108, '2019_01_05_144706_create_kkdkgct_table', 1),
(109, '2019_01_05_144715_create_kkdkgctdf_table', 1),
(110, '2019_01_05_165248_create_kkgiaxmtxd_table', 1),
(111, '2019_01_05_165550_create_kkgiaxmtxdctdf_table', 1),
(112, '2019_01_05_165558_create_kkgiaxmtxdct_table', 1),
(113, '2019_01_06_094056_create_kkgiadvhdtm_table', 1),
(114, '2019_01_06_094105_create_kkgiadvhdtmct_table', 1),
(115, '2019_01_06_094112_create_kkgiadvhdtmctdf_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ngaynghile`
--

CREATE TABLE `ngaynghile` (
  `id` int(10) UNSIGNED NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tungay` date DEFAULT NULL,
  `denngay` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhomdvkcb`
--

CREATE TABLE `nhomdvkcb` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhomhhdvk`
--

CREATE TABLE `nhomhhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomhhdvk`
--

INSERT INTO `nhomhhdvk` (`id`, `manhom`, `tennhom`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'GIá hàng hóa thị trường', 'TD', '2019-01-07 02:22:23', '2019-01-07 02:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `nhomlephitruocba`
--

CREATE TABLE `nhomlephitruocba` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhomxe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhomthuetn`
--

CREATE TABLE `nhomthuetn` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `philephi`
--

CREATE TABLE `philephi` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `philephict`
--

CREATE TABLE `philephict` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptcp` text COLLATE utf8_unicode_ci,
  `mucthuphi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `philephictdf`
--

CREATE TABLE `philephictdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ptcp` text COLLATE utf8_unicode_ci,
  `mucthuphi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` text COLLATE utf8_unicode_ci,
  `ma` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settingdvvt` text COLLATE utf8_unicode_ci,
  `vtxk` double NOT NULL DEFAULT '0',
  `vtxb` double NOT NULL DEFAULT '0',
  `vtxtx` double NOT NULL DEFAULT '0',
  `vtch` double NOT NULL DEFAULT '0',
  `loaihinhhd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xangdau` double NOT NULL DEFAULT '0',
  `dien` double NOT NULL DEFAULT '0',
  `khidau` double NOT NULL DEFAULT '0',
  `phan` double NOT NULL DEFAULT '0',
  `thuocbvtv` double NOT NULL DEFAULT '0',
  `vacxingsgc` double NOT NULL DEFAULT '0',
  `muoi` double NOT NULL DEFAULT '0',
  `suate6t` double NOT NULL DEFAULT '0',
  `duong` double NOT NULL DEFAULT '0',
  `thocgao` double NOT NULL DEFAULT '0',
  `thuocpcb` double NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgia`
--

CREATE TABLE `thamdinhgia` (
  `id` int(10) UNSIGNED NOT NULL,
  `diadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `ppthamdinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvyeucau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` date DEFAULT NULL,
  `sotbkl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hosotdgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguonvon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `songaykq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgiact`
--

CREATE TABLE `thamdinhgiact` (
  `id` int(10) UNSIGNED NOT NULL,
  `tents` text COLLATE utf8_unicode_ci,
  `dacdiempl` text COLLATE utf8_unicode_ci,
  `thongsokt` text COLLATE utf8_unicode_ci,
  `nguongoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` double NOT NULL DEFAULT '1',
  `nguyengiadenghi` double NOT NULL DEFAULT '0',
  `giadenghi` double NOT NULL DEFAULT '0',
  `nguyengiathamdinh` double NOT NULL DEFAULT '0',
  `giatritstd` double NOT NULL DEFAULT '0',
  `giaththamdinh` double NOT NULL DEFAULT '0',
  `giakththamdinh` double NOT NULL DEFAULT '0',
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgiactdf`
--

CREATE TABLE `thamdinhgiactdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `tents` text COLLATE utf8_unicode_ci,
  `dacdiempl` text COLLATE utf8_unicode_ci,
  `thongsokt` text COLLATE utf8_unicode_ci,
  `nguongoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` double NOT NULL DEFAULT '1',
  `nguyengiadenghi` double NOT NULL DEFAULT '0',
  `giadenghi` double NOT NULL DEFAULT '0',
  `nguyengiathamdinh` double NOT NULL DEFAULT '0',
  `giatritstd` double NOT NULL DEFAULT '0',
  `giaththamdinh` double NOT NULL DEFAULT '0',
  `giakththamdinh` double NOT NULL DEFAULT '0',
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgiahh`
--

CREATE TABLE `thamdinhgiahh` (
  `id` int(10) UNSIGNED NOT NULL,
  `diadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `ppthamdinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvyeucau` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihan` date DEFAULT NULL,
  `sotbkl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hosotdgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguonvon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `songaykq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgiahhct`
--

CREATE TABLE `thamdinhgiahhct` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` text COLLATE utf8_unicode_ci,
  `nhomhh` text COLLATE utf8_unicode_ci,
  `tenhh` text COLLATE utf8_unicode_ci,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` double NOT NULL DEFAULT '1',
  `nguyengiadenghi` double NOT NULL DEFAULT '0',
  `giadenghi` double NOT NULL DEFAULT '0',
  `nguyengiathamdinh` double NOT NULL DEFAULT '0',
  `giatritstd` double NOT NULL DEFAULT '0',
  `giaththamdinh` double NOT NULL DEFAULT '0',
  `giakththamdinh` double NOT NULL DEFAULT '0',
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thamdinhgiahhctdf`
--

CREATE TABLE `thamdinhgiahhctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` text COLLATE utf8_unicode_ci,
  `nhomhh` text COLLATE utf8_unicode_ci,
  `tenhh` text COLLATE utf8_unicode_ci,
  `qccl` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` double NOT NULL DEFAULT '1',
  `nguyengiadenghi` double NOT NULL DEFAULT '0',
  `giadenghi` double NOT NULL DEFAULT '0',
  `nguyengiathamdinh` double NOT NULL DEFAULT '0',
  `giatritstd` double NOT NULL DEFAULT '0',
  `giaththamdinh` double NOT NULL DEFAULT '0',
  `giakththamdinh` double NOT NULL DEFAULT '0',
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thgiahhdvk`
--

CREATE TABLE `thgiahhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaybc` date DEFAULT NULL,
  `ngaychotbc` date DEFAULT NULL,
  `ttbc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thgiahhdvkct`
--

CREATE TABLE `thgiahhdvkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychotbc` date DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thgiahhdvkctdf`
--

CREATE TABLE `thgiahhdvkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaychotbc` date DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuetainguyen`
--

CREATE TABLE `thuetainguyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuetainguyenct`
--

CREATE TABLE `thuetainguyenct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatttn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuetainguyenctdf`
--

CREATE TABLE `thuetainguyenctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatttn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `town`
--

CREATE TABLE `town` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttlienhe` text COLLATE utf8_unicode_ci,
  `emailql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailqt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `songaylv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `mahuyen`, `maxa`, `tendv`, `town`, `district`, `diachi`, `ttlienhe`, `emailql`, `emailqt`, `songaylv`, `created_at`, `updated_at`) VALUES
(1, 'STCCB', 'PQLG', 'Phòng Quản lý Giá', NULL, 'TPCB', 'Thành phố Cao Bằng', '', '', '', '2', '2019-01-06 08:40:55', '2019-01-06 08:40:55'),
(2, 'STCCB', 'PCS', 'Phòng Công Sản', NULL, 'TPCB', 'Thành phố Cao Bằng', '', '', '', '2', '2019-01-06 08:41:40', '2019-01-06 08:41:40'),
(3, 'STCCB', 'PTCKHTPCB', 'Phòng TC-KH Thành Phố Cao Bằng', NULL, 'TPCB', 'Thành phố Cao Bằng', '', '', '', '2', '2019-01-06 08:42:45', '2019-01-06 08:44:10'),
(4, 'STCCB', 'PTCKHHHA', 'Phòng TC-KH huyện Hòa An', NULL, 'HHA', 'Huyện Hòa An', '', '', '', '2', '2019-01-06 08:43:59', '2019-01-06 08:43:59'),
(5, 'STCCB', 'PTCKHHTN', 'Phòng TC-KH huyện Thông Nông', NULL, 'HTN', 'Huyện Thông Nông', '', '', '', '2', '2019-01-06 08:44:59', '2019-01-06 08:52:17'),
(6, 'STCCB', 'PTCKHHHQ', 'Phòng TC-KH huyện Hà Quảng', NULL, 'HHQ', 'Huyện Hà Quảng', '', '', '', '2', '2019-01-06 08:47:17', '2019-01-06 08:52:56'),
(7, 'STCCB', 'PTCKHHTL', 'Phòng TC-KH huyện Trà Lĩnh', NULL, 'HTL', 'Huyện Trà Lĩnh', '', '', '', '2', '2019-01-06 08:48:17', '2019-01-06 08:53:05'),
(8, 'STCCB', 'PTCKHHQU', 'Phòng TC-KH huyện Quảng Uyên', NULL, 'HQU', 'Huyện Quảng Uyên', '', '', '', '2', '2019-01-06 08:50:14', '2019-01-06 08:50:14'),
(9, 'STCCB', 'PTCKHHTK', 'Phòng TC-KH huyện Trùng Khánh', NULL, 'HTK', 'Huyện Trùng Khánh', '', '', '', '2', '2019-01-06 08:54:32', '2019-01-06 08:54:32'),
(10, 'STCCB', 'PTCKHHPH', 'Phòng TC-KH huyện Phục Hòa', NULL, 'HPH', 'Huyện Phục Hòa', '', '', '', '2', '2019-01-06 08:55:10', '2019-01-06 08:55:10'),
(11, 'STCCB', 'PTCKHHHL', 'Phòng TC-KH huyện Hạ Lang', NULL, 'HHL', 'Huyện Hạ Lang', '', '', '', '2', '2019-01-06 08:55:47', '2019-01-06 08:55:47'),
(12, 'STCCB', 'PTCKHHTA', 'Phòng TC-KH huyện Thạch An', NULL, 'HTA', 'Huyện Thạch An', '', '', '', '2', '2019-01-06 08:56:40', '2019-01-06 08:56:40'),
(13, 'STCCB', 'PTCKHHNB', 'Phòng TC-KH huyện Nguyên Bình', NULL, 'HNB', 'Huyện Nguyên Bình', '', '', '', '2', '2019-01-06 08:57:20', '2019-01-06 08:57:20'),
(14, 'STCCB', 'PTCKHHBL', 'Phòng TC-KH huyện Bảo Lạc', NULL, 'HBL', 'Huyện Bảo Lạc', '', '', '', '2', '2019-01-06 08:58:37', '2019-01-06 08:58:37'),
(15, 'STCCB', 'PTCKHHBLA', 'Phòng TC-KH huyện Bảo Lâm', NULL, 'HBLA', 'Huyện Bảo Lâm', '', '', '', '2', '2019-01-06 08:59:18', '2019-01-06 08:59:18'),
(16, 'BQLKKTT', 'PQLBQLKKT', 'Phòng quản lý Ban quản lý khu kinh tế tỉnh', NULL, 'TPCB', 'Thành phố Cao Bằng', '', '', '', '2', '2019-01-07 02:59:15', '2019-01-07 02:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `ttdntd`
--

CREATE TABLE `ttdntd` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucdanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidknopthue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `settingdvvt` text COLLATE utf8_unicode_ci,
  `vtxk` double NOT NULL DEFAULT '0',
  `vtxb` double NOT NULL DEFAULT '0',
  `vtxtx` double NOT NULL DEFAULT '0',
  `vtch` double NOT NULL DEFAULT '0',
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `emailxt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttnguoitao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `maxa`, `mahuyen`, `town`, `district`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `ttnguoitao`, `phanloai`, `created_at`, `updated_at`) VALUES
(1, 'Sở Tài Chính', 'sotaichinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STCCB', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadaugiadat\":{\"index\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuedatnuoc\":{\"index\":\"1\"},\"kkgiathuedatnuoc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuedatnuoc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giarung\":{\"index\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"gianuocsh\":{\"index\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuetscong\":{\"index\":\"1\"},\"kkgiathuetscong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetscong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadvgddt\":{\"index\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadvkcb\":{\"index\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giahhdvk\":{\"index\":\"1\"},\"dmgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiahhdvk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"gialephitruocba\":{\"index\":\"1\"},\"dmgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgialephitruocba\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giaphilephi\":{\"index\":\"1\"},\"dmgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiaphilephi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuetn\":{\"index\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"bog\":{\"index\":\"1\"},\"dmbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"bpbog\":{\"index\":\"1\"},\"kkbpbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thbpbog\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dangkygia\":{\"index\":\"1\"},\"dkgxangdau\":{\"index\":\"1\"},\"ttdndkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgxangdau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgdien\":{\"index\":\"1\"},\"ttdndkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgdien\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgkhidau\":{\"index\":\"1\"},\"ttdndkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgkhidau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgphan\":{\"index\":\"1\"},\"ttdndkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgphan\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocbvtv\":{\"index\":\"1\"},\"ttdndkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocbvtv\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgvacxingsgc\":{\"index\":\"1\"},\"ttdndkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgvacxingsgc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgmuoi\":{\"index\":\"1\"},\"ttdndkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgmuoi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgsuate6t\":{\"index\":\"1\"},\"ttdndkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgsuate6t\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgduong\":{\"index\":\"1\"},\"ttdndkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgduong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthocgao\":{\"index\":\"1\"},\"ttdndkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthocgao\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocpcb\":{\"index\":\"1\"},\"ttdndkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocpcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"ttdvlt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"dvlt\":{\"index\":\"1\"},\"kkdvlt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thdvlt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"dvvt\":{\"index\":\"1\",\"xdttdn\":\"1\"},\"vtxk\":{\"index\":\"1\"},\"dmvtxk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvtxk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvtxk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"vtxtx\":{\"index\":\"1\"},\"dmvtxtx\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvtxtx\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvtxtx\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"tacn\":{\"index\":\"1\"},\"kktacn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thtacn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"tpcnte6t\":{\"index\":\"1\"},\"kktpcnte6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thtpcnte6t\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"vlxd\":{\"index\":\"1\"},\"dmvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvlxd\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"xmtxd\":{\"index\":\"1\"},\"kkxmtxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thxmtxd\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"dvhdtm\":{\"index\":\"1\"},\"kkdvhdtm\":{\"index\":\"1\"},\"thdvhdtm\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"csdlthamdinhgia\":{\"index\":\"1\"},\"thamdinhgia\":{\"index\":\"1\"},\"kkthamdinhgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgia\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thamdinhgiahh\":{\"index\":\"1\"},\"dmthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgiahh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"giacpi\":{\"index\":\"1\"},\"dmgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiacpi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"system\":{\"index\":\"1\"},\"towns\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"companies\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"users\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"per\":\"1\"},\"register\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:24:10', '2019-01-07 03:37:38'),
(2, 'Sở Giao Thông Vận Tải', 'sogiaothongvantai', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SGTVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:26:34', '2019-01-06 08:26:34'),
(3, 'Sở Công Thương', 'socongthuong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SCT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:28:27', '2019-01-06 08:28:27'),
(4, 'Sở Xây Dựng', 'soxaydung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SXD', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:29:36', '2019-01-06 08:29:36'),
(5, 'Sở Tài nguyên & Môi trường', 'sotainguyenmoitruong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STNMT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:31:11', '2019-01-06 08:31:11'),
(6, 'Sở Nông Nghiệp & PTNT', 'sonongnghiep', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SNNPTNN', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:33:45', '2019-01-06 08:33:45'),
(7, 'Sở Y Tế', 'soyte', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SYT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:34:34', '2019-01-06 08:34:34'),
(8, 'Sở Giáo dục & Đào tạo', 'sogiaoducdaotao', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SGDDT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiathuedatnuoc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuedatnuoc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiathuetscong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetscong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadvgddt\":{\"index\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiahhdvk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgialephitruocba\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiaphilephi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"bpbog\":{\"index\":\"1\"},\"kkbpbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thbpbog\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dangkygia\":{\"index\":\"1\"},\"dkgxangdau\":{\"index\":\"1\"},\"ttdndkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgxangdau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgdien\":{\"index\":\"1\"},\"ttdndkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgdien\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgkhidau\":{\"index\":\"1\"},\"ttdndkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgkhidau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgphan\":{\"index\":\"1\"},\"ttdndkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgphan\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocbvtv\":{\"index\":\"1\"},\"ttdndkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocbvtv\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgvacxingsgc\":{\"index\":\"1\"},\"ttdndkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgvacxingsgc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgmuoi\":{\"index\":\"1\"},\"ttdndkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgmuoi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgsuate6t\":{\"index\":\"1\"},\"ttdndkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgsuate6t\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgduong\":{\"index\":\"1\"},\"ttdndkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgduong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthocgao\":{\"index\":\"1\"},\"ttdndkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthocgao\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocpcb\":{\"index\":\"1\"},\"ttdndkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocpcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"dvlt\":{\"index\":\"1\"},\"kkdvlt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thdvlt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"dvvt\":{\"index\":\"1\",\"xdttdn\":\"1\"},\"vtxk\":{\"index\":\"1\"},\"dmvtxk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvtxk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvtxk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"vtxtx\":{\"index\":\"1\"},\"dmvtxtx\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvtxtx\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvtxtx\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"tacn\":{\"index\":\"1\"},\"kktacn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thtacn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"tpcnte6t\":{\"index\":\"1\"},\"kktpcnte6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thtpcnte6t\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"vlxd\":{\"index\":\"1\"},\"dmvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvlxd\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"kkthamdinhgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgia\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgiahh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"},\"dmgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiacpi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"system\":{\"index\":\"1\"},\"towns\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"users\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"per\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:35:51', '2019-01-07 03:18:26'),
(9, 'Ban quản lý khu kinh tế tỉnh', 'banquanlykhukinhte', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'BQLKKTT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadaugiadat\":{\"index\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuedatnuoc\":{\"index\":\"1\"},\"kkgiathuedatnuoc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuedatnuoc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giarung\":{\"index\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"gianuocsh\":{\"index\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuetscong\":{\"index\":\"1\"},\"kkgiathuetscong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetscong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadvgddt\":{\"index\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadvkcb\":{\"index\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiahhdvk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiahhdvk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgialephitruocba\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgialephitruocba\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiaphilephi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiaphilephi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"bpbog\":{\"index\":\"1\"},\"kkbpbog\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thbpbog\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dangkygia\":{\"index\":\"1\"},\"dkgxangdau\":{\"index\":\"1\"},\"ttdndkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgxangdau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgxangdau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgdien\":{\"index\":\"1\"},\"ttdndkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgdien\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgdien\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgkhidau\":{\"index\":\"1\"},\"ttdndkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgkhidau\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgkhidau\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgphan\":{\"index\":\"1\"},\"ttdndkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgphan\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgphan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocbvtv\":{\"index\":\"1\"},\"ttdndkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocbvtv\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocbvtv\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgvacxingsgc\":{\"index\":\"1\"},\"ttdndkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgvacxingsgc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgvacxingsgc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgmuoi\":{\"index\":\"1\"},\"ttdndkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgmuoi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgmuoi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgsuate6t\":{\"index\":\"1\"},\"ttdndkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgsuate6t\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgsuate6t\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgduong\":{\"index\":\"1\"},\"ttdndkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgduong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgduong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthocgao\":{\"index\":\"1\"},\"ttdndkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthocgao\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthocgao\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"dkgthuocpcb\":{\"index\":\"1\"},\"ttdndkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thdkgthuocpcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkdkgthuocpcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"kkvtxk\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thvtxk\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"vtxtx\":{\"index\":\"1\"},\"dvhdtm\":{\"index\":\"1\"},\"kkdvhdtm\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thdvhdtm\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\",\"xdttdn\":\"1\"},\"kkthamdinhgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgia\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkthamdinhgiahh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"ththamdinhgiahh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"},\"dmgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiacpi\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiacpi\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"system\":{\"index\":\"1\"},\"towns\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"companies\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"users\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"per\":\"1\"},\"register\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:37:01', '2019-01-07 03:08:43'),
(10, 'Phòng Quản lý Giá', 'phongquanlygia', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PQLG', 'STCCB', NULL, 'TPCB', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:40:55', '2019-01-06 08:40:55'),
(11, 'Phòng Công Sản', 'phongcongsan', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PCS', 'STCCB', NULL, 'TPCB', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:41:40', '2019-01-06 08:41:40'),
(12, 'Phòng TC-KH Thành Phố Cao Bằng', 'phongtckhtpcaobang', 'e10adc3949ba59abbe56e057f20f883e', '', 'Kích hoạt', 'PTCKHTPCB', 'STCCB', NULL, 'TPCB', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:42:45', '2019-01-06 08:46:17'),
(13, 'Phòng TC-KH huyện Hòa An', 'phongtckhhoaan', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHHA', 'STCCB', NULL, 'HHA', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:43:59', '2019-01-06 08:43:59'),
(14, 'Phòng TC-KH huyện Thông Nông', 'phongtckhthongnong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHTN', 'STCCB', NULL, 'HTN', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:44:59', '2019-01-06 08:44:59'),
(15, 'Phòng TC-KH huyện Hà Quảng', 'phongtckhhaquang', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHHQ', 'STCCB', NULL, 'HHQ', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:47:17', '2019-01-06 08:47:17'),
(16, 'Phòng TC-KH huyện Trà Lĩnh', 'phongtckhtralinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHTL', 'STCCB', NULL, 'HTL', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:48:17', '2019-01-06 08:48:17'),
(17, 'Phòng TC-KH huyện Quảng Uyên', 'phongtckhquanguyen', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHQU', 'STCCB', NULL, 'HQU', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:50:14', '2019-01-06 08:50:14'),
(18, 'Phòng TC-KH huyện Trùng Khánh', 'phongtckhtrungkhanh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHTK', 'STCCB', NULL, 'HTK', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:54:32', '2019-01-06 08:54:32'),
(19, 'Phòng TC-KH huyện Phục Hòa', 'phongtckhphuchoa', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHPH', 'STCCB', NULL, 'HPH', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:55:10', '2019-01-06 08:55:10'),
(20, 'Phòng TC-KH huyện Hạ Lang', 'phongtckhhalang', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHHL', 'STCCB', NULL, 'HHL', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:55:47', '2019-01-06 08:55:47'),
(21, 'Phòng TC-KH huyện Thạch An', 'phongtckhthachan', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHTA', 'STCCB', NULL, 'HTA', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:56:40', '2019-01-06 08:56:40'),
(22, 'Phòng TC-KH huyện Nguyên Bình', 'phongtckhnguyenbinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHNB', 'STCCB', NULL, 'HNB', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:57:20', '2019-01-06 08:57:20'),
(23, 'Phòng TC-KH huyện Bảo Lạc', 'phongtckhbaolac', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHBL', 'STCCB', NULL, 'HBL', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:58:37', '2019-01-06 08:58:37'),
(24, 'Phòng TC-KH huyện Bảo Lâm', 'phongtckhbaolam', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHBLA', 'STCCB', NULL, 'HBLA', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-06 08:59:18', '2019-01-06 08:59:18'),
(25, 'Phòng quản lý Ban quản lý khu kinh tế tỉnh', 'qlbanquanlykhukinhte', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PQLBQLKKT', 'BQLKKTT', NULL, 'TPCB', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-01-07 02:59:15', '2019-01-07 02:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `vanbanqlnn`
--

CREATE TABLE `vanbanqlnn` (
  `id` int(10) UNSIGNED NOT NULL,
  `kyhieuvb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvbanhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaivb` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybanhanh` date DEFAULT NULL,
  `ngayapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tieude` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viewpage`
--

CREATE TABLE `viewpage` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `viewpage`
--

INSERT INTO `viewpage` (`id`, `ip`, `session`, `created_at`, `updated_at`) VALUES
(1, '::1', 'vk7bF3nux8hS1gHohb1nWH9vpKbY6YVcJYvY9Jbc', '2019-01-06 09:00:18', '2019-01-06 09:00:18'),
(2, '::1', 'Ip7PN3qh4mEnCHJxsdhXPrdIkNruHhNQhV7WwbQW', '2019-01-07 02:03:38', '2019-01-07 02:03:38'),
(3, '::1', 'FqoW7bMjym7A9iG0fBofCj3FMFy8zg8jrusExrA3', '2019-01-07 02:44:52', '2019-01-07 02:44:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhongia`
--
ALTER TABLE `binhongia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binhongiact`
--
ALTER TABLE `binhongiact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binhongiactdf`
--
ALTER TABLE `binhongiactdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daugiadat`
--
ALTER TABLE `daugiadat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daugiadatct`
--
ALTER TABLE `daugiadatct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daugiadatctdf`
--
ALTER TABLE `daugiadatctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diabanhd`
--
ALTER TABLE `diabanhd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkgdoanhnghiep`
--
ALTER TABLE `dkgdoanhnghiep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkghoso`
--
ALTER TABLE `dkghoso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkghosoct`
--
ALTER TABLE `dkghosoct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dkghosoctdf`
--
ALTER TABLE `dkghosoctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmctthamdinhgiahh`
--
ALTER TABLE `dmctthamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmgiadvgddt`
--
ALTER TABLE `dmgiadvgddt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmgiarung`
--
ALTER TABLE `dmgiarung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmgiathuemuanhaxh`
--
ALTER TABLE `dmgiathuemuanhaxh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmhanghoa_cpi`
--
ALTER TABLE `dmhanghoa_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmhhdvk`
--
ALTER TABLE `dmhhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmphilephi`
--
ALTER TABLE `dmphilephi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmthamdinhgiahh`
--
ALTER TABLE `dmthamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmthuetn`
--
ALTER TABLE `dmthuetn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmvlxd`
--
ALTER TABLE `dmvlxd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvkcb`
--
ALTER TABLE `dvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvkcbct`
--
ALTER TABLE `dvkcbct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giadvgddt`
--
ALTER TABLE `giadvgddt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giadvgddtct`
--
ALTER TABLE `giadvgddtct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giadvgddtctdf`
--
ALTER TABLE `giadvgddtctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giahhdvk`
--
ALTER TABLE `giahhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gianuocsh`
--
ALTER TABLE `gianuocsh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gianuocshct`
--
ALTER TABLE `gianuocshct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gianuocshctdf`
--
ALTER TABLE `gianuocshctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giarung`
--
ALTER TABLE `giarung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giarungct`
--
ALTER TABLE `giarungct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giarungctdf`
--
ALTER TABLE `giarungctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuemuanhaxh`
--
ALTER TABLE `giathuemuanhaxh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuemuanhaxhct`
--
ALTER TABLE `giathuemuanhaxhct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuemuanhaxhctdf`
--
ALTER TABLE `giathuemuanhaxhctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuetscong`
--
ALTER TABLE `giathuetscong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuetscongct`
--
ALTER TABLE `giathuetscongct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giathuetscongctdf`
--
ALTER TABLE `giathuetscongctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giavtxk`
--
ALTER TABLE `giavtxk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giavtxkct`
--
ALTER TABLE `giavtxkct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giavtxkctdf`
--
ALTER TABLE `giavtxkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hsgia_chitiet_cpi`
--
ALTER TABLE `hsgia_chitiet_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hsgia_cpi`
--
ALTER TABLE `hsgia_cpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hsgia_cpi_mahs_unique` (`mahs`);

--
-- Indexes for table `hstonghop_chitiet_cpi`
--
ALTER TABLE `hstonghop_chitiet_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hstonghop_cpi`
--
ALTER TABLE `hstonghop_cpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hstonghop_cpi_mahs_unique` (`mahs`);

--
-- Indexes for table `kkdkg`
--
ALTER TABLE `kkdkg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdkgct`
--
ALTER TABLE `kkdkgct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkdkgctdf`
--
ALTER TABLE `kkdkgctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvhdtm`
--
ALTER TABLE `kkgiadvhdtm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvhdtmct`
--
ALTER TABLE `kkgiadvhdtmct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvhdtmctdf`
--
ALTER TABLE `kkgiadvhdtmctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvlt`
--
ALTER TABLE `kkgiadvlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiatacn`
--
ALTER TABLE `kkgiatacn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiatacnct`
--
ALTER TABLE `kkgiatacnct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiatacnctdf`
--
ALTER TABLE `kkgiatacnctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavlxd`
--
ALTER TABLE `kkgiavlxd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavlxdct`
--
ALTER TABLE `kkgiavlxdct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavlxdctdf`
--
ALTER TABLE `kkgiavlxdctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavtxtx`
--
ALTER TABLE `kkgiavtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavtxtxct`
--
ALTER TABLE `kkgiavtxtxct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiavtxtxctdf`
--
ALTER TABLE `kkgiavtxtxctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiaxmtxd`
--
ALTER TABLE `kkgiaxmtxd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiaxmtxdct`
--
ALTER TABLE `kkgiaxmtxdct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgiaxmtxdctdf`
--
ALTER TABLE `kkgiaxmtxdctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgs`
--
ALTER TABLE `kkgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgsct`
--
ALTER TABLE `kkgsct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kkgsctdf`
--
ALTER TABLE `kkgsctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lephitruocba`
--
ALTER TABLE `lephitruocba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lephitruocbactdf`
--
ALTER TABLE `lephitruocbactdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaivbqlnn`
--
ALTER TABLE `loaivbqlnn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngaynghile`
--
ALTER TABLE `ngaynghile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhomdvkcb`
--
ALTER TABLE `nhomdvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `philephi`
--
ALTER TABLE `philephi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `philephict`
--
ALTER TABLE `philephict`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `philephictdf`
--
ALTER TABLE `philephictdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgia`
--
ALTER TABLE `thamdinhgia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgiahh`
--
ALTER TABLE `thamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgiahhct`
--
ALTER TABLE `thamdinhgiahhct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thamdinhgiahhctdf`
--
ALTER TABLE `thamdinhgiahhctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thgiahhdvk`
--
ALTER TABLE `thgiahhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thgiahhdvkct`
--
ALTER TABLE `thgiahhdvkct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thgiahhdvkctdf`
--
ALTER TABLE `thgiahhdvkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuetainguyen`
--
ALTER TABLE `thuetainguyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ttdntd`
--
ALTER TABLE `ttdntd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vanbanqlnn`
--
ALTER TABLE `vanbanqlnn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viewpage`
--
ALTER TABLE `viewpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhongia`
--
ALTER TABLE `binhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `binhongiact`
--
ALTER TABLE `binhongiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `binhongiactdf`
--
ALTER TABLE `binhongiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daugiadat`
--
ALTER TABLE `daugiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daugiadatct`
--
ALTER TABLE `daugiadatct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daugiadatctdf`
--
ALTER TABLE `daugiadatctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diabanhd`
--
ALTER TABLE `diabanhd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dkgdoanhnghiep`
--
ALTER TABLE `dkgdoanhnghiep`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dkghoso`
--
ALTER TABLE `dkghoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dkghosoct`
--
ALTER TABLE `dkghosoct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dkghosoctdf`
--
ALTER TABLE `dkghosoctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmctthamdinhgiahh`
--
ALTER TABLE `dmctthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmgiadvgddt`
--
ALTER TABLE `dmgiadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmgiarung`
--
ALTER TABLE `dmgiarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmgiathuemuanhaxh`
--
ALTER TABLE `dmgiathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmhanghoa_cpi`
--
ALTER TABLE `dmhanghoa_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmhhdvk`
--
ALTER TABLE `dmhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dmphilephi`
--
ALTER TABLE `dmphilephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmthamdinhgiahh`
--
ALTER TABLE `dmthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dmthuetn`
--
ALTER TABLE `dmthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dmvlxd`
--
ALTER TABLE `dmvlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dvkcb`
--
ALTER TABLE `dvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dvkcbct`
--
ALTER TABLE `dvkcbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giadvgddt`
--
ALTER TABLE `giadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giadvgddtct`
--
ALTER TABLE `giadvgddtct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giadvgddtctdf`
--
ALTER TABLE `giadvgddtctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giahhdvk`
--
ALTER TABLE `giahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gianuocsh`
--
ALTER TABLE `gianuocsh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gianuocshct`
--
ALTER TABLE `gianuocshct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gianuocshctdf`
--
ALTER TABLE `gianuocshctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giarung`
--
ALTER TABLE `giarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giarungct`
--
ALTER TABLE `giarungct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giarungctdf`
--
ALTER TABLE `giarungctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuemuanhaxh`
--
ALTER TABLE `giathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuemuanhaxhct`
--
ALTER TABLE `giathuemuanhaxhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuemuanhaxhctdf`
--
ALTER TABLE `giathuemuanhaxhctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuetscong`
--
ALTER TABLE `giathuetscong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuetscongct`
--
ALTER TABLE `giathuetscongct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuetscongctdf`
--
ALTER TABLE `giathuetscongctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giavtxk`
--
ALTER TABLE `giavtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giavtxkct`
--
ALTER TABLE `giavtxkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giavtxkctdf`
--
ALTER TABLE `giavtxkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hsgia_chitiet_cpi`
--
ALTER TABLE `hsgia_chitiet_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hsgia_cpi`
--
ALTER TABLE `hsgia_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hstonghop_chitiet_cpi`
--
ALTER TABLE `hstonghop_chitiet_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hstonghop_cpi`
--
ALTER TABLE `hstonghop_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdkg`
--
ALTER TABLE `kkdkg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdkgct`
--
ALTER TABLE `kkdkgct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkdkgctdf`
--
ALTER TABLE `kkdkgctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvhdtm`
--
ALTER TABLE `kkgiadvhdtm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvhdtmct`
--
ALTER TABLE `kkgiadvhdtmct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvhdtmctdf`
--
ALTER TABLE `kkgiadvhdtmctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvlt`
--
ALTER TABLE `kkgiadvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiatacn`
--
ALTER TABLE `kkgiatacn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiatacnct`
--
ALTER TABLE `kkgiatacnct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiatacnctdf`
--
ALTER TABLE `kkgiatacnctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavlxd`
--
ALTER TABLE `kkgiavlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavlxdct`
--
ALTER TABLE `kkgiavlxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavlxdctdf`
--
ALTER TABLE `kkgiavlxdctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavtxtx`
--
ALTER TABLE `kkgiavtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavtxtxct`
--
ALTER TABLE `kkgiavtxtxct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiavtxtxctdf`
--
ALTER TABLE `kkgiavtxtxctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiaxmtxd`
--
ALTER TABLE `kkgiaxmtxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiaxmtxdct`
--
ALTER TABLE `kkgiaxmtxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiaxmtxdctdf`
--
ALTER TABLE `kkgiaxmtxdctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgs`
--
ALTER TABLE `kkgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgsct`
--
ALTER TABLE `kkgsct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgsctdf`
--
ALTER TABLE `kkgsctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lephitruocba`
--
ALTER TABLE `lephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lephitruocbactdf`
--
ALTER TABLE `lephitruocbactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loaivbqlnn`
--
ALTER TABLE `loaivbqlnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `ngaynghile`
--
ALTER TABLE `ngaynghile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhomdvkcb`
--
ALTER TABLE `nhomdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `philephi`
--
ALTER TABLE `philephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `philephict`
--
ALTER TABLE `philephict`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `philephictdf`
--
ALTER TABLE `philephictdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgia`
--
ALTER TABLE `thamdinhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgiahh`
--
ALTER TABLE `thamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgiahhct`
--
ALTER TABLE `thamdinhgiahhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgiahhctdf`
--
ALTER TABLE `thamdinhgiahhctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thgiahhdvk`
--
ALTER TABLE `thgiahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thgiahhdvkct`
--
ALTER TABLE `thgiahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thgiahhdvkctdf`
--
ALTER TABLE `thgiahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thuetainguyen`
--
ALTER TABLE `thuetainguyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ttdntd`
--
ALTER TABLE `ttdntd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `vanbanqlnn`
--
ALTER TABLE `vanbanqlnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `viewpage`
--
ALTER TABLE `viewpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
