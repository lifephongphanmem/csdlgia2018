-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2018 at 09:27 AM
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
-- Database: `csdlgia_972btc`
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
  `trangthai` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhongia`
--

INSERT INTO `binhongia` (`id`, `ngayapdung`, `gioapdung`, `thapdung`, `mahs`, `mamh`, `soqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '2018-10-05', '09:00:00', NULL, 'T1538710129', 'XD', '001', 'Mức giá bắt đầu áp dụng từ 9:00 ngày 05/10/2018', 'CB', '2018-10-05 03:28:49', '2018-10-08 07:24:29'),
(17, '2018-10-05', '09:00:00', NULL, 'T1538811109', 'XD', 'sadsd', 'sdá', 'CHT', '2018-10-06 07:31:49', '2018-10-06 07:31:49');

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

--
-- Dumping data for table `binhongiact`
--

INSERT INTO `binhongiact` (`id`, `mahs`, `tenhh`, `giatoithieu`, `giatoida`, `thapdung`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'T1538710129', 'A', '10000', '11000', '1', '', '2018-10-05 07:34:51', '2018-10-06 02:32:05'),
(3, 'T1538710129', 'B', '500', '1000', '2', '', '2018-10-05 07:45:12', '2018-10-05 07:45:12'),
(4, 'T1538811109', 'a', '10000', '10000', '1', '', '2018-10-06 07:31:50', '2018-10-06 07:31:50');

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
  `settingdvvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vtxk` double NOT NULL DEFAULT '0',
  `vtxb` double NOT NULL DEFAULT '0',
  `vtxtx` double NOT NULL DEFAULT '0',
  `vtch` double NOT NULL DEFAULT '0',
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tailieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `maxa`, `mahuyen`, `tendn`, `diachi`, `tel`, `fax`, `email`, `diadanh`, `chucdanh`, `nguoiky`, `noidknopthue`, `settingdvvt`, `vtxk`, `vtxb`, `vtxtx`, `vtch`, `ghichu`, `trangthai`, `tailieu`, `giayphepkd`, `level`, `avatar`, `pl`, `created_at`, `updated_at`) VALUES
(2, '1234567890', 'PTCQHBT', 'Công ty TNHH phát triển phần mềm Cuộc Sống1', 'Quận Hai Bà Trưng - Thành Phố Hà Nội', '0436343965', '87612121', 'minhtranlife@gmail.com', 'TP. Hà Nội', 'Giám đốc', 'Nguyễn Thị Minh Tuyết', 'Chi cục thuế TP Hà Nội', '', 0, 0, 0, 0, NULL, 'CD', 'sđa', '09876543', 'DVLT', 'no-image-available.jpg', '', '2018-10-15 02:43:46', '2018-10-15 08:01:34'),
(3, '1234567890', 'PTCQHBT', 'Công ty TNHH Thức ăn chăn nuôi1', 'Hà Nội', '0976543', '09876543', 'minhtranlife@gmail.com', 'Hà Nội', 'Giám đốc ', 'Nguyễn Văn A', 'Chi cục thuế TP Hà Nội', '', 0, 0, 0, 0, NULL, 'CD', 'sđá', '09876543', 'TACN', 'no-image-available.jpg', 'PP', '2018-10-17 07:06:44', '2018-10-17 07:14:17');

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

--
-- Dumping data for table `cskddvlt`
--

INSERT INTO `cskddvlt` (`id`, `macskd`, `maxa`, `mahuyen`, `tencskd`, `loaihang`, `diachikd`, `telkd`, `link`, `avatar`, `town`, `district`, `created_at`, `updated_at`) VALUES
(1, '1234567890_1539591802', '1234567890', 'PTCQHBT', 'Khách sạn Quốc Tế', '3', 'Hà Nội', '09876543', 'http:://phanmemcuocsong.com', 'no-image-available.jpg', '', 'QCG', '2018-10-15 08:23:22', '2018-10-16 01:54:47');

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
(1, NULL, 'QCG', 'Quận Cầu Giấy', 'H', '2018-10-01 08:01:14', '2018-10-01 08:01:14'),
(5, NULL, 'QHBT', 'Quận Hai Bà Trưng', 'H', '2018-10-02 03:01:39', '2018-10-02 03:01:39'),
(6, NULL, 'QBD', 'Quận Ba Đình', 'H', '2018-10-02 03:01:39', '2018-10-02 03:01:39');

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
(3, 'STCHN', 'Sở Tài Chính Hà Nội', NULL, 'Thành Phố Hà Nội', NULL, '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2018-10-04 01:47:12', '2018-10-04 01:47:12');

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

--
-- Dumping data for table `dmdvkcb`
--

INSERT INTO `dmdvkcb` (`id`, `madv`, `manhom`, `magoc`, `capdo`, `tendichvu`, `dvt`, `gc`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, 'TD', '2018-10-12 03:16:15', '2018-10-12 03:16:15'),
(2, '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, 'TD', '2018-10-12 03:18:20', '2018-10-12 03:18:20'),
(3, 'HSTC', '02', '02', '1', 'Ngày điều trị Hồi sức tích cực (ICU)/ghép tạng hoặc ghép tủy hoặc ghép tế bào gốc', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:25:27', '2018-10-12 03:27:40'),
(4, 'HSCC', '02', '02', '1', 'Ngày giường bệnh Hồi sức cấp cứu', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:25:48', '2018-10-12 03:27:52'),
(5, 'BNK', '02', '02', '1', 'Ngày giường bệnh Nội khoa:', '', NULL, NULL, 'TD', '2018-10-12 03:26:13', '2018-10-12 03:28:04'),
(6, 'L1', '02', 'BNK', '2', 'Loại 1: Các khoa: Truyền nhiễm, Hô hấp, Huyết học, Ung thư, Tim mạch, Tâm thần, Thần kinh, Nhi, Tiêu hoá, Thận học; Nội tiết; Dị ứng (đối với bệnh nhân dị ứng thuốc nặng: Stevens Jonhson hoặc Lyell)', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:28:34', '2018-10-12 03:30:18'),
(7, 'L2', '02', 'BNK', '2', 'Loại 2: Các Khoa: Cơ-Xương-Khớp, Da liễu, Dị ứng, Tai-Mũi-Họng, Mắt, Răng Hàm Mặt, Ngoại, Phụ -Sản không mổ; YHDT hoặc PHCN cho nhóm người bệnh tổn thương tủy sống, tai biến mạch máu não, chấn thương sọ não.', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:29:24', '2018-10-12 03:30:24'),
(8, 'L3', '02', 'BNK', '2', 'Loại 3: Các khoa: YHDT, Phục hồi chức năng', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:30:04', '2018-10-12 03:30:31'),
(9, 'BNKB', '02', '02', '1', 'Ngày giường bệnh ngoại khoa, bỏng:', '', NULL, NULL, 'TD', '2018-10-12 03:31:19', '2018-10-12 03:31:19'),
(10, 'L1', '02', 'BNKB', '2', 'Loại 1: Sau các phẫu thuật loại đặc biệt; Bỏng độ 3-4 trên 70% diện tích cơ thể', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:32:00', '2018-10-12 03:32:49'),
(11, 'L2', '02', 'BNKB', '2', 'Loại 2: Sau các phẫu thuật loại 1; Bỏng độ 3-4 từ 25 -70% diện tích cơ thể', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:33:14', '2018-10-12 03:33:20'),
(12, 'L3', '02', 'BNKB', '2', 'Loại 3: Sau các phẫu thuật loại 2; Bỏng độ 2 trên 30% diện tích cơ thể, Bỏng độ 3-4 dưới 25% diện tích cơ thể', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:33:46', '2018-10-12 03:33:46'),
(13, 'L4', '02', 'BNKB', '2', 'Loại 4: Sau các phẫu thuật loại 3; Bỏng độ 1, độ 2 dưới 30% diện tích cơ thể', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:34:19', '2018-10-12 03:34:19'),
(14, 'GBBN', '02', '02', '1', 'Ngày giường bệnh ban ngày', 'ngày', NULL, NULL, 'TD', '2018-10-12 03:34:57', '2018-10-12 03:34:57'),
(15, 'CDHA', '03', '03', '1', 'Chuẩn đoán bằng hình ảnh', '', NULL, NULL, 'TD', '2018-10-12 07:26:39', '2018-10-12 07:27:00'),
(16, 'SA', '03', 'CDHA', '2', 'Siêu âm', '', NULL, NULL, 'TD', '2018-10-12 07:27:23', '2018-10-12 07:27:23'),
(17, '04C1.1.3', '03', 'SA', '3', 'Siêu âm', 'lần', NULL, NULL, 'TD', '2018-10-12 07:27:52', '2018-10-12 07:27:52'),
(18, '03C4.1.3', '03', 'SA', '3', 'Siêu âm + đo trục nhãn cầu', 'lần', NULL, NULL, 'TD', '2018-10-12 07:28:25', '2018-10-12 07:28:25'),
(19, 'saddadtt', '03', 'SA', '3', 'Siêu âm đầu dò âm đạo, trực tràng', 'lần', NULL, NULL, 'TD', '2018-10-12 07:29:11', '2018-10-12 07:29:11'),
(20, '03C4.1.1', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu', 'lần', NULL, NULL, 'TD', '2018-10-12 07:29:42', '2018-10-12 07:29:42'),
(21, '03C4.1.6', '03', 'SA', '3', 'Siêu âm Doppler màu tim + cản âm', 'lần', NULL, NULL, 'TD', '2018-10-12 07:31:15', '2018-10-12 07:31:15'),
(22, '03C4.1.5', '03', 'SA', '3', 'Siêu âm tim gắng sức', 'lần', NULL, NULL, 'TD', '2018-10-12 07:31:36', '2018-10-12 07:31:36'),
(23, '04C1.1.4', '03', 'SA', '3', 'Siêu âm Doppler màu tim 4 D (3D REAL TIME)', 'lần', NULL, NULL, 'TD', '2018-10-12 07:32:11', '2018-10-12 07:32:11'),
(24, '04C1.1.5', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu qua thực quản', 'lần', NULL, NULL, 'TD', '2018-10-12 07:32:51', '2018-10-12 07:32:51'),
(25, '04C1.1.6', '03', 'SA', '3', 'Siêu âm trong lòng mạch hoặc Đo dự trữ lưu lượng động mạch vành FFR', 'lần', NULL, NULL, 'TD', '2018-10-12 07:33:18', '2018-10-12 07:33:18');

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

--
-- Dumping data for table `dmgiarung`
--

INSERT INTO `dmgiarung` (`id`, `manhom`, `tennhom`, `created_at`, `updated_at`) VALUES
(1, 'RTN', 'Rừng tự nhiên', '2018-10-10 03:05:48', '2018-10-10 03:05:48'),
(2, 'RTR', 'Rừng trồng', '2018-10-10 03:17:37', '2018-10-10 03:17:37'),
(3, 'RTHTGK', 'Rừng trồng theo hình thức giao khoán', '2018-10-10 03:17:58', '2018-10-10 03:17:58');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmhhdvk`
--

INSERT INTO `dmhhdvk` (`id`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `dvt`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'T1', 'Toán 11', 'sách giáo khoa', '', 'TD', '2018-10-18 03:15:02', '2018-10-18 03:20:54'),
(2, '01', 'T2', 'Toán 2', 'sách giáo khoa', '', 'TD', '2018-10-18 03:16:58', '2018-10-18 03:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `dmmhbinhongia`
--

CREATE TABLE `dmmhbinhongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `mamh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenmh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmmhbinhongia`
--

INSERT INTO `dmmhbinhongia` (`id`, `mamh`, `tenmh`, `hienthi`, `created_at`, `updated_at`) VALUES
(1, 'XD', 'Xăng Dầu', NULL, '2018-10-04 04:38:49', '2018-10-04 04:38:49'),
(2, 'DBL', 'Điện bán lẻ', NULL, '2018-10-04 05:24:25', '2018-10-04 05:27:07'),
(3, 'KDMHL', 'Khí dầu mỏ hóa lỏng (LPG)', NULL, '2018-10-05 07:56:17', '2018-10-05 07:56:17'),
(4, 'PDURENPK', ' Phân đạm urê; phân NPK', NULL, '2018-10-05 07:56:42', '2018-10-05 08:01:39'),
(5, 'TBVTV', 'Thuốc bảo vệ thực vật, bao gồm: thuốc trừ sâu, thuốc trừ bệnh, thuốc trừ cỏ', 'Thuốc bảo vệ thực vật', '2018-10-06 02:29:14', '2018-10-18 07:15:18'),
(6, 'VXGSGC', 'Vac-xin phòng bệnh cho gia súc, gia cầm', NULL, '2018-10-18 07:07:12', '2018-10-18 07:07:12'),
(7, 'MA', 'Muối ăn', NULL, '2018-10-18 07:07:29', '2018-10-18 07:07:29'),
(8, 'STED6T', 'Sữa dành cho trẻ em dưới 06 tuổi', NULL, '2018-10-18 07:07:51', '2018-10-18 07:07:51'),
(9, 'DADTL', 'Đường ăn, bao gồm đường trắng và đường tinh luyện', 'Đường', '2018-10-18 07:08:08', '2018-10-18 07:17:49'),
(10, 'TGTT', 'Thóc, gạo tẻ thường', 'Thóc, gạo', '2018-10-18 07:08:28', '2018-10-18 07:18:00'),
(11, 'TPCB', 'Thuốc phòng bệnh, chữa bệnh cho người thuộc danh mục thuốc chữa bệnh thiết yếu sử dụng tại cơ sở khám bệnh, chữa bệnh.', 'Thuốc phòng chữa bệnh cho người', '2018-10-18 07:08:57', '2018-10-18 07:18:18');

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

--
-- Dumping data for table `dmqdgiadat`
--

INSERT INTO `dmqdgiadat` (`id`, `soquyetdinh`, `sohieu`, `mota`, `ngayquyetdinh`, `ghichu`, `created_at`, `updated_at`) VALUES
(2, '001', NULL, 'Quyết định thay đổi giá đất 5 năm 2018-2023', '2018-12-31', '', '2018-10-02 04:02:36', '2018-10-02 04:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `dmthuetn`
--

CREATE TABLE `dmthuetn` (
  `id` int(10) UNSIGNED NOT NULL,
  `masopnhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `masp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatu` double NOT NULL DEFAULT '0',
  `giaden` double NOT NULL DEFAULT '0',
  `gc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuoctn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmthuetn`
--

INSERT INTO `dmthuetn` (`id`, `masopnhom`, `manhom`, `mahh`, `magoc`, `macapdo`, `capdo`, `masp`, `tenhh`, `dacdiemkt`, `dvt`, `giatu`, `giaden`, `gc`, `thoidiem`, `sapxep`, `theodoi`, `thuoctn`, `created_at`, `updated_at`) VALUES
(1, '', '01', 'I', '01', '', '1', '', 'Khoáng sản kim loại', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', '01', 'I1', 'I', '', '2', '', 'Sắt', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', '01', 'I101', 'I1', '', '3', '', 'Sắt kim loại', '', 'tấn', 8000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', '01', 'I102', 'I1', '', '3', '', 'Quặng Manhetit (có từ tính)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', '01', 'I10201', 'I102', '', '4', '', 'Quặng Manhetit có hàm lượng Fe<30%', '', 'tấn', 250000, 350000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', '01', 'I10202', 'I102', '', '4', '', 'Quặng Manhetit có hàm lượng 30%≤Fe<40%', '', 'tấn', 350000, 450000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', '01', 'I10203', 'I102', '', '4', '', 'Quặng Manhetit có hàm lượng 40%≤Fe<50%', '', 'tấn', 450000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', '01', 'I10204', 'I102', '', '4', '', 'Quặng Manhetit có hàm lượng 50%≤Fe<60%', '', 'tấn', 700000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', '01', 'I10205', 'I102', '', '4', '', 'Quặng Manhetit có hàm lượng Fe≥60%', '', 'tấn', 850000, 1200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', '01', 'I103', 'I1', '', '3', '', 'Quặng Limonit (không từ tính)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', '01', 'I10301', 'I103', '', '4', '', 'Quặng limonit có hàm lượng Fe≤30%', '', 'tấn', 150000, 210000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '', '01', 'I10302', 'I103', '', '4', '', 'Quặng limonit có hàm lượng 30%<Fe≤40%', '', 'tấn', 210000, 280000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '', '01', 'I10303', 'I103', '', '4', '', 'Quặng limonit có hàm lượng 40%<Fe≤50%', '', 'tấn', 280000, 340000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', '01', 'I10304', 'I103', '', '4', '', 'Quặng limonit có hàm lượng 50%<Fe≤60%', '', 'tấn', 340000, 420000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', '01', 'I10305', 'I103', '', '4', '', 'Quặng limonit có hàm lượng Fe>60%', '', 'tấn', 420000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '', '01', 'I104', 'I1', '', '3', '', 'Quặng sắt Deluvi', '', 'tấn', 150000, 180000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '', '01', 'I2', 'I', '', '2', '', 'Mangan (Măng-gan)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '', '01', 'I201', 'I2', '', '3', '', 'Quặng mangan có hàm lượng Mn≤20%', '', 'tấn', 490000, 700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '', '01', 'I202', 'I2', '', '3', '', 'Quặng mangan có hàm lượng 20%<Mn≤25%', '', 'tân', 700000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '', '01', 'I203', 'I2', '', '3', '', 'Quặng mangan có hàm lượng 25%<Mn≤30%', '', 'tấn', 1000000, 1300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '', '01', 'I204', 'I2', '', '3', '', 'Quặng mangan có hàm lượng 30<Mn≤35%', '', 'tấn', 1300000, 1600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, '', '01', 'I205', 'I2', '', '3', '', 'Quặng mangan có hàm lượng 35%<Mn≤40%', '', 'tấn', 1600000, 2100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, '', '01', 'I206', 'I2', '', '3', '', 'Quặng mangan có hàm lượng Mn>40%', '', 'tấn', 2100000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, '', '01', 'I3', 'I', '', '2', '', 'Titan', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, '', '01', 'I301', 'I3', '', '3', '', 'Quặng titan gốc (ilmenit)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, '', '01', 'I30101', 'I301', '', '4', '', 'Quặng gốc titan có hàm lượng TiO2≤10%', '', 'tấn', 110000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, '', '01', 'I30102', 'I301', '', '4', '', 'Quặng gốc titan có hàm lượng 10%<TiO2≤15%', '', 'tấn', 150000, 210000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, '', '01', 'I30103', 'I301', '', '4', '', 'Quặng gốc titan có hàm lượng 15%<TiO2≤20%', '', 'tấn', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '', '01', 'I30104', 'I301', '', '4', '', 'Quặng gốc titan có hàm lượng TiO2>20%', '', 'tấn', 385000, 550000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '', '01', 'I302', 'I3', '', '3', '', 'Quặng titan sa khoáng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '', '01', 'I30201', 'I302', '', '4', '', 'Quặng Titan sa khoáng chưa qua tuyển tách', '', 'tấn', 1000000, 1300, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, '', '01', 'I30202', 'I302', '', '4', '', 'Titan sa khoáng đã qua tuyển tách (tinh quặng Titan)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '', '01', 'I3020201', 'I30202', '', '5', '', 'Ilmenit', '', 'tấn', 1950000, 2600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '', '01', 'I3020202', 'I30202', '', '5', '', 'Quặng Zircon có hàm lượng ZrO2<65%', '', 'tấn', 6600000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '', '01', 'I3020203', 'I30202', '', '5', '', 'Quặng Zircon có hàm lượng ZrO2≥65%', '', 'tấn', 15000000, 18000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '', '01', 'I3020204', 'I30202', '', '5', '', 'Rutil', '', 'tấn', 7700000, 11000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '', '01', 'I3020205', 'I30202', '', '5', '', 'Monazite', '', 'tấn', 24500000, 35000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, '', '01', 'I3020206', 'I30202', '', '5', '', 'Manhectic', '', 'tấn', 700000, 850000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '', '01', 'I3020207', 'I30202', '', '5', '', 'Xi titan', '', 'tấn', 10500000, 15000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '', '01', 'I3020208', 'I30202', '', '5', '', 'Các sản phẩm còn lại', '', 'tấn', 3000000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, '', '01', 'I4', 'I', '', '2', '', 'Vàng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, '', '01', 'I401', 'I4', '', '3', '', 'Quặng vàng gốc', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, '', '01', 'I40101', 'I401', '', '4', '', 'Quặng vàng có hàm lượng Au<2 gram/tấn', '', 'tấn', 910000, 1300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, '', '01', 'I40102', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 2≤Au<3 gram/tấn', '', 'tấn', 1330000, 1900000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '', '01', 'I40103', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 3≤Au<4 gram/tấn', '', 'tấn', 1900000, 2500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, '', '01', 'I40104', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 4≤Au<5 gram/tấn', '', 'tấn', 2500000, 3200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, '', '01', 'I40105', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 5≤Au<6 gram/tấn', '', 'tấn', 3200000, 3800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, '', '01', 'I40106', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 6≤Au<7 gram/tẩn', '', 'tấn', 3800000, 4500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, '', '01', 'I40107', 'I401', '', '4', '', 'Quặng vàng có hàm lượng 7≤Au<8 gram/tấn', '', 'tấn', 4500000, 5100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, '', '01', 'I40108', 'I401', '', '4', '', 'Quặng vàng có hàm lượng Au≥8 gram/tấn', '', 'tấn', 5100000, 6200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, '', '01', 'I402', 'I4', '', '3', '', 'Vàng kim loại (vàng cốm);', '', 'kg', 750000000, 1000000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(52, '', '01', 'I403', 'I4', '', '3', '', 'Tinh quặng vàng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, '', '01', 'I40301', 'I403', '', '4', '', 'Tinh quặng vàng có hàm lượng 82<Au≤240 gram/tấn', '', 'tấn', 154000000, 220000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(54, '', '01', 'I40302', 'I403', '', '4', '', 'Tinh quặng vàng có hàm lượng Au>240 gram/tấn', '', 'tấn', 175000000, 250000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(55, '', '01', 'I5', 'I', '', '2', '', 'Đất hiếm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, '', '01', 'I501', 'I5', '', '3', '', 'Quặng đất hiếm về hàm lượng TR203≤1%', '', 'tấn', 84000, 120000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, '', '01', 'I502', 'I5', '', '3', '', 'Quặng đất hiếm có hàm lượng 1%<TR203≤2%', '', 'tấn', 133000, 190000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, '', '01', 'I503', 'I5', '', '3', '', 'Quặng đất hiếm có hàm lượng 2%<TR203≤3%', '', 'tấn', 190000, 270000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, '', '01', 'I504', 'I5', '', '3', '', 'Quặng đất hiểm có hàm lượng 3%<TR203≤4%', '', 'tấn', 270000, 350000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(60, '', '01', 'I505', 'I5', '', '3', '', 'Quặng đất hiếm có hàm tượng 4%<TR203≤5%', '', 'tấn', 350000, 430000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(61, '', '01', 'I506', 'I5', '', '3', '', 'Quặng đất hiếm có hàm lượng 5%<TR203≤10%', '', 'tấn', 490000, 700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, '', '01', '1507', '15', '', '3', '', 'Quặng đất hiểm có hàm lượng >10% TR203', '', 'tấn', 1050000, 1500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, '', '01', 'I6', 'I', '', '2', '', 'Bạch kim, bạc, thiếc', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, '', '01', 'I601', 'I6', '', '3', '', 'Bạch kim', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, '', '01', 'I602', 'I6', '', '3', '', 'Bạc kim loại', '', 'kg', 16000000, 19200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, '', '01', 'I603', 'I6', '', '3', '', 'Thiếc', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, '', '01', 'I60301', 'I603', '', '4', '', 'Quặng thiếc gốc', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, '', '01', 'I6030101', 'I60301', '', '5', '', 'Quặng thiếc gốc có hàm lượng 0,2%<SnO2≤0,4%', '', 'tấn', 896000, 1280000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, '', '01', 'I6030102', 'I60301', '', '5', '', 'Quặng thiếc gốc có hàm lượng 0,4%<SnO2<0,6%', '', 'tấn', 1280000, 1790000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, '', '01', 'I6030103', 'I60301', '', '5', '', 'Quặng thiếc gốc có hàm lượng 0,6%<SnO2≤0,8%', '', 'tấn', 1790000, 2300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, '', '01', 'I6030104', 'I60301', '', '5', '', 'Quặng thiếc gốc có hàm lượng 0,8%<SnO2≤1%', '', 'tấn', 2300000, 2810000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, '', '01', 'I6030105', 'I60301', '', '5', '', 'Quặng thiếc gốc có hàm lượng SnO2>1%', '', 'tấn', 2810000, 3372000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, '', '01', 'I60302', 'I603', '', '4', '', 'Tinh quặng thiếc có hàm lượng SnO2≥70% (sa khoáng, quặng gốc)', '', 'tấn', 170000000, 204000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, '', '01', 'I60303', 'I603', '', '4', '', 'Thiếc kim loại', '', 'tấn', 255000000, 320000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, '', '01', 'I7', 'I', '', '2', '', 'Wolfram, Antimoan', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, '', '01', 'I701', 'I7', '', '3', '', 'Wolfram', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, '', '01', 'I70101', 'I701', '', '4', '', 'Quặng wolfram có hàm lượng 0,1%<WO3≤0,3%', '', 'tấn', 1295000, 1850000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, '', '01', 'I70102', 'I701', '', '4', '', 'Quặng wolfram có hàm lượng 0,3%<WO3≤0,5%', '', 'tấn', 1939000, 2770000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, '', '01', 'I70103', 'I701', '', '4', '', 'Quặng wolfram có hàm lượng 0,5%<WO3≤0,7%', '', 'tấn', 2905000, 4150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, '', '01', 'I70104', 'I701', '', '4', '', 'Quặng wolfram có hàm lượng 0,7%<WO3≤1%', '', 'tấn', 4150000, 5070000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, '', '01', 'I70105', 'I701', '', '4', '', 'Quặng wolfram có hàm lượng WO3>1%', '', 'tấn', 5070000, 6084000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, '', '01', 'I702', 'I7', '', '3', '', 'Antimoan', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, '', '01', 'I70201', 'I702', '', '4', '', 'Antimoan kim loại', '', 'tấn', 100000000, 120000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, '', '01', 'I70202', 'I702', '', '4', '', 'Quặng Antimoan', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, '', '01', 'I7020201', 'I70202', '', '5', '', 'Quặng antimon có hàm lượng Sb<5%', '', 'tấn', 6041000, 8630000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, '', '01', 'I7020202', 'I70202', '', '5', '', 'Quặng antimon có hàm lượng 5≤Sb<10%', '', 'tấn', 10080000, 14400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, '', '01', 'I7020203', 'I70202', '', '5', '', 'Quặng antimon có hàm lượng 10%<Sb≤15%', '', 'tấn', 14400000, 20130000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, '', '01', 'I7020204', 'I70202', '', '5', '', 'Quăng antimon có hàm lượng 15%<Sb≤0%', '', 'tấn', 20130000, 28750000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, '', '01', 'I7020205', 'I70202', '', '5', '', 'Quăng antimon có hàm lượng Sb>20%', '', 'tấn', 28750000, 34500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, '', '01', 'I8', 'I', '', '2', '', 'Chì, kẽm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, '', '01', 'I801', 'I8', '', '3', '', 'Chì, kẽm kim loại', '', 'tấn', 37000000, 45000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, '', '01', 'I802', 'I8', '', '3', '', 'Tinh quặng chì, kẽm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, '', '01', 'I80201', 'I802', '', '4', '', 'Tinh quặng chì', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, '', '01', 'I8020101', 'I80201', '', '5', '', 'Tinh quặng chì có hàm lượng Pb<50%', '', 'tấn', 11550000, 16500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, '', '01', 'I8020102', 'I80201', '', '5', '', 'Tinh quặng chì có hàm lượng Pb≥50%', '', 'tấn', 16500000, 23571000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, '', '01', 'I80202', 'I802', '', '4', '', 'Tinh quặng kẽm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, '', '01', 'I8020201', 'I80202', '', '5', '', 'Tinh quặng kẽm có hàm lượng Zn<50%', '', 'tấn', 4000000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, '', '01', 'I8020202', 'I80202', '', '5', '', 'Tinh quặng kẽm có hàm lượng Zn≥50%', '', 'tấn', 5000000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, '', '01', 'I803', 'I8', '', '3', '', 'Quặng chì, kẽm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, '', '01', 'I80301', 'I803', '', '4', '', 'Quặng chì + kẽm hàm lượng Pb+Zn<5%', '', 'Tấn', 560000, 800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, '', '01', 'I80302', 'I803', '', '4', '', 'Quặng chì + kẽm hàm lượng 5%<Pb+Zn<10%', '', 'Tấn', 931000, 1330000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, '', '01', 'I80303', 'I803', '', '4', '', 'Quặng chì + kẽm hàm lượng 10%<Pb+Zn<15%', '', 'Tấn', 1330000, 1870000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, '', '01', 'I80304', 'I803', '', '4', '', 'Quặng chì + kẽm hàm lượng Pb+Zn>15%', '', 'Tấn', 1870000, 2244000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, '', '01', 'I9', 'I', '', '2', '', 'Nhôm, Bauxit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, '', '01', 'I901', 'I9', '', '3', '', 'Quặng bauxit trầm tích', '', 'tấn', 52500, 75000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, '', '01', 'I902', 'I9', '', '3', '', 'Quặng bauxit laterit', '', 'tấn', 260000, 390000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, '', '01', 'I10', 'I', '', '2', '', 'Đồng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, '', '01', 'I1001', 'I10', '', '3', '', 'Quặng đồng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, '', '01', 'I100101', 'I1001', '', '4', '', 'Quặng đồng có hàm lượng Cu<0,5%', '', 'tấn', 483000, 690000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, '', '01', 'I100102', 'I1002', '', '4', '', 'Quặng đồng có hàm lượng 0,5%≤Cu <1%', '', 'tấn', 959000, 1370000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, '', '01', 'I100103', 'I1003', '', '4', '', 'Quặng đồng có hàm lượng 1%≤Cu<2%', '', 'tấn', 1603000, 2290000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, '', '01', 'I100104', 'I1004', '', '4', '', 'Quặng đồng có hàm lượng 2%≤Cu<3%', '', 'tấn', 2290000, 3210000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, '', '01', 'I100105', 'I1005', '', '4', '', 'Quặng đồng có hàm lượng 3%≤Cu<4%', '', 'tấn', 3210000, 4120000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, '', '01', 'I100106', 'I1006', '', '4', '', 'Quặng đồng có hàm lượng 4%≤Cu<5%', '', 'tấn', 4120000, 5500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, '', '01', 'I100107', 'I1007', '', '4', '', 'Quặng đồng có hàm lượng Cu≥5%', '', 'tấn', 5500000, 6600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, '', '01', 'I1002', 'I10', '', '3', '', 'Tinh quặng đồng có hàm lượng 18%≤Cu<20%', '', 'tấn', 16500000, 19800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, '', '01', 'I11', 'I', '', '2', '', 'Nikel (Quặng Nikel)', '', 'tấn', 2240000, 3200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, '', '01', 'I12', 'I', '', '2', '', 'Cô-ban (coban), mô-Iip-đen (molipden), thủy ngân, ma-nhê (magie), va-na-đi (vanadi)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, '', '01', 'I1201', 'I12', '', '3', '', 'Molipden', '', 'tấn', 2800000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, '', '01', 'I1202', 'I12', '', '3', '', 'Cô-ban (coban), thủy ngân, va-na-đi (vanadi)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, '', '01', 'I13', 'I', '', '2', '', 'Khoáng sản kim loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, '', '01', 'I1301', 'I13', '', '3', '', 'Tinh quặng Bismuth hàm lượng 10%≤Bi<20%', '', 'tấn', 11400000, 13700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, '', '01', 'I1302', 'I13', '', '3', '', 'Quặng Crôm hàm lượng Cr≥40%', '', 'tấn', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, '', '02', 'II', '02', '', '1', '', 'Khoáng sản không kim loại', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, '', '02', 'II1', 'II', '', '2', '', 'Đất khai thác để san lấp, xây dựng công trình', '', 'm3', 49000, 70000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, '', '02', 'II2', 'II', '', '2', '', 'Đá, sỏi', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, '', '02', 'II201', 'II2', '', '3', '', 'Sỏi', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, '', '02', 'II20101', 'II201', '', '4', '', 'Sạn trắng', '', 'm3', 400000, 480000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, '', '02', 'II20102', 'II201', '', '4', '', 'Các loại cuội, sỏi, sạn khác', '', 'm3', 168000, 240000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, '', '02', 'II202', 'II2', '', '3', '', 'Đá xây dựng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, '', '02', 'II20201', 'II202', '', '4', '', 'Đá khối để x3 (trừ đá hoa trắng, granit và dolomit)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, '', '02', 'II2020101', 'II20201', '', '5', '', 'Đá khối để xẻ có diện tích bề mặt dưới 0,1 m2', '', 'm3', 700000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, '', '02', 'II2020102', 'II20201', '', '5', '', 'Đá khối đế xẻ có diện tích bề rnặt từ 0,1m2 đến dưới 0,3m2', '', 'm3', 1400000, 2000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, '', '02', 'II2020103', 'II20201', '', '5', '', 'Đá khối để xẻ có diện tích bề mặt từ 0,3 đến dưới 0,6 m2', '', 'm3', 4200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, '', '02', 'II2020104', 'II20201', '', '5', '', 'Đá khối để xẻ có diện tích bề mặt từ 0,6 đến dưới 01 m2', '', 'm3', 6000000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, '', '02', 'II2020105', 'II20201', '', '5', '', 'Đá khối để xẻ có diện tích bề mật từ 01 m2 trở lên', '', 'm3', 8000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, '', '02', 'II20202', 'II202', '', '4', '', 'Đá mỹ nghệ (bao gồm tất cả các loại đá làm mỹ nghệ)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, '', '02', 'II2020201', 'II20202', '', '5', '', 'Đá mỹ nghệ có độ nguyên khối dưới 0,4 m3', '', 'm3', 700000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, '', '02', 'II2020202', 'II20202', '', '5', '', 'Đá mỹ nghệ có độ nguyên khối đến từ 0,4 m3 đến dưới 1 m3', '', 'm3', 1400000, 2000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, '', '02', 'II2020203', 'II20202', '', '5', '', 'Đá mỹ nghệ có độ nguyên khối từ 1 m3 đến dưới 3 m3', '', 'm3', 2100000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, '', '02', 'II2020204', 'II20202', '', '5', '', 'Đá mỹ nghệ có độ nguyên khối trên 3m3', '', 'm3', 3000000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, '', '02', 'II20203', 'II202', '', '4', '', 'Đá làm vật liệu xây dựng thông thường', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, '', '02', 'II2020301', 'II20203', '', '5', '', 'Đá sau nổ mìn, đá xô bồ (khoáng sản khai thác)', '', 'm3', 70000, 100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, '', '02', 'II2020302', 'II20203', '', '5', '', 'Đá hộc và đá base', '', 'm3', 77000, 110000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, '', '02', 'II2020303', 'II20203', '', '5', '', 'Đá cấp phối', '', 'm3', 140000, 200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, '', '02', 'II2020304', 'II20203', '', '5', '', 'Đá dăm các loại', '', 'm3', 168000, 240000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, '', '02', 'II2020305', 'II20203', '', '5', '', 'Đá lô ca', '', 'm3', 140000, 200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, '', '02', 'II2020306', 'II20203', '', '5', '', 'Đá chẻ, đá bazan dạng cột', '', 'm3', 280000, 400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, '', '02', 'II3', 'II', '', '2', '', 'Đá nung vôi và sản xuất xi măng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, '', '02', 'II301', 'II3', '', '3', '', 'Đá vôi sản xuất vôi công nghiệp (khoáng sản khai thác)', '', 'm3', 161000, 230000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, '', '02', 'II302', 'II3', '', '3', '', 'Đá sản xuất xi măng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, '', '02', 'II30201', 'II302', '', '4', '', 'Đá vôi sản xuất xi măng (khoáng sản khai thác)', '', 'm3', 105000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, '', '02', 'II30202', 'II302', '', '4', '', 'Đá sét sản xuất XI măng (khoáng sản khai thác)', '', 'm3', 63000, 90000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, '', '02', 'II30203', 'II302', '', '4', '', 'Đá làm phụ gia sản xuất xi măng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, '', '02', 'II3020301', 'II30203', '', '5', '', 'Đá puzolan (khoáng sản khai thác)', '', 'm3', 100000, 120000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, '', '02', 'II3020302', 'II30203', '', '5', '', 'Đá cát kết silic (khoáng sản khai thác)', '', 'm3', 45000, 60000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, '', '02', 'II3020303', 'II30203', '', '5', '', 'Đá cát kết đen (khoáng sản khai thác)', '', 'm3', 45000, 60000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, '', '02', 'II3020304', 'II30203', '', '5', '', 'Quặng laterit sốt (khoáng sản khai thác)', '', 'tấn', 105000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, '', '02', '', '', '', '5', '', '', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, '', '02', '', '', '', '5', '', '', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, '', '02', 'III4', 'II', '', '2', '', 'Đá hoa trắng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, '', '02', 'II401', 'II4', '', '3', '', 'Đá hoa trắng (không phân loại màu sắc, chất lượng) kích thước ≥0,4 m3 sau khai thác', '', 'm3', 700000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, '', '02', 'II402', 'II4', '', '3', '', 'Đá hoa trắng dạng khối (≥ 0,4m3) để xẻ làm ốp lát', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, '', '02', 'II40201', 'II402', '', '4', '', 'Loại 1 - trắng đều', '', 'm3', 15000000, 18000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, '', '02', 'II40202', 'II402', '', '4', '', 'Loại 2 - vân vệt', '', 'm3', 10500000, 15000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, '', '02', 'II40203', 'II402', '', '4', '', 'Loại 3 - màu xám hoặc màu khác', '', 'm3', 7000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, '', '02', 'II403', 'II4', '', '3', '', 'Đá hoa trắng sản xuất bột carbonat', '', 'm3', 280000, 400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, '', '02', 'II5', 'II', '', '2', '', 'Cát', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, '', '02', 'II501', 'II5', '', '3', '', 'Cát san tấp (bao gồm cả cát nhiễm mặn)', '', 'm3', 56000, 80000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, '', '02', 'II502', 'II5', '', '3', '', 'Cát xây dựng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, '', '02', 'II50201', 'II502', '', '4', '', 'Cát đen dùng trong xây dựng', '', 'm3', 70000, 100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, '', '02', 'II50202', 'II502', '', '4', '', 'Cát vàng dùng trong xây dựng', '', 'm3', 245000, 350000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, '', '02', 'II503', 'II5', '', '3', '', 'Cát vàng sản xuất công nghiệp (khoáng sản khai thác)', '', 'm3', 105000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, '', '02', 'II6', 'II', '', '2', '', 'Cát làm thủy tinh (cát trắng)', '', 'm3', 245000, 350000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, '', '02', 'II7', 'II', '', '2', '', 'Đất làm gạch (sét làm gạch, ngói)', '', 'm3', 119000, 170000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, '', '02', 'II8', 'II', '', '2', '', 'Đá Granite', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, '', '02', 'II801', 'II8', '', '3', '', 'Đá Granite màu ruby', '', 'm3', 6000000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, '', '02', 'II802', 'II8', '', '3', '', 'Đá Granite màu đỏ', '', 'm3', 4200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, '', '02', 'II803', 'II8', '', '3', '', 'Đá Granite màu tím, trắng', '', 'm3', 1750000, 2500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, '', '02', 'II804', 'II8', '', '3', '', 'Đá Graniíe màu khác', '', 'm3', 2800000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, '', '02', 'II805', 'II8', '', '3', '', 'Đá gabro và diorit', '', 'm3', 3500000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, '', '02', 'II806', 'II8', '', '3', '', 'Đá granite, gabro, diorit khai thác (không đồng nhất về màu sắc, độ hạt, độ thu hồi)', '', 'm3', 800000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, '', '02', 'II9', 'II', '', '2', '', 'Sét chịu lửa', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, '', '02', 'II901', 'II9', '', '3', '', 'Sét chịu lửa màu trắng, xám, xám trắng', '', 'tấn', 266000, 380000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, '', '02', '902', '902', '', '3', '', 'Sét chịu lửa các màu còn lợi', '', 'tấn', 126000, 180000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, '', '02', 'II10', 'II', '', '2', '', 'Dolomit, quartzite', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, '', '02', 'II1001', 'II10', '', '3', '', 'Dolomit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, '', '02', 'II100101', 'II1001', '', '4', '', 'Đá Dolomit sau nổ mìn (khoáng sản khai thác)', '', 'm3', 84000, 120000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, '', '02', 'II100102', 'II1001', '', '4', '', 'Đá Dolomit có kich thước ≥0,4 m3 sau khai thác (không phân loại màu sắc, chất lượng)', '', 'm3', 315000, 450000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, '', '02', 'II100103', 'II1001', '', '4', '', 'Đá khối Dolomit dùng để xẻ', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, '', '02', 'II10010301', 'II100103', '', '5', '', 'Đá khối dùng để xẻ tính theo sản phẩm có diện tích bề mặt dưới 0,3m2', '', 'm3', 2800000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, '', '02', 'II10010302', 'II100103', '', '5', '', 'Đá khối dùng để xẻ tính theo sản phẩm có diện tích bề mặt từ 0,3 m2 đến dưới 0,6 m2', '', 'm3', 5600000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, '', '02', 'II10010303', 'II100103', '', '5', '', 'Đà khối dùng để xẻ tính theo sản phẩm có diện tích bề mặt từ 0,6 m2 đến dưới 1 m2', '', 'm3', 8000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, '', '02', 'II10010304', 'II100103', '', '5', '', 'Đá khối dùng để xẻ tính theo sản phẩm có diện tich bề mặt từ 1 m2 trở lên', '', 'm3', 10000000, 12000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, '', '02', 'II100104', 'II1001', '', '4', '', 'Đá Dolomit sử dụng làm nguyên liệu sản xuất công nghiệp', '', 'm3', 140000, 200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, '', '02', 'II1002', 'II10', '', '3', '', 'Quarzit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, '', '02', 'II100201', 'II1002', '', '4', '', 'Quặng Quarzit thường', '', 'tấn', 112000, 160000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, '', '02', 'II100202', 'II1002', '', '4', '', 'Quăng Quarzit (thạch anh tinh thể)', '', 'tấn', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, '', '02', 'II100203', 'II1002', '', '4', '', 'Đá Quarzit (sử dụng áp điện)', '', 'tấn', 1500000, 1800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, '', '02', 'II1003', 'II10', '', '3', '', 'Pyrophylit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, '', '02', 'II100301', 'II1003', '', '4', '', 'Pyrophylit (khoáng sản khai thác)', '', 'tấn', 100000, 136000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, '', '02', 'II100302', 'II1003', '', '4', '', 'Pyrophilit có hàm lượng 25%<AL203≤30%', '', 'tấn', 152600, 218000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, '', '02', 'II100303', 'II1003', '', '4', '', 'Pyrophilit có hàm lượng 30%<AL203≤33%', '', 'tấn', 329700, 471000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, '', '02', 'II100304', 'II1003', '', '4', '', 'Pyrophilit có hàm lượng AL203>33%', '', 'tấn', 471000, 565000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, '', '02', 'II11', 'II', '', '2', '', 'Cao lanh (Kaolin/đất sét trắng/đất sét trầm tích; Quặng Felspat làm nguyên liệu gốm sứ)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, '', '02', 'II1101', 'II11', '', '3', '', 'Cao lanh (khoáng sản khai thác, chưa rây)', '', 'tấn', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, '', '02', 'II1102', 'II11', '', '3', '', 'Cao tanh dưới rây', '', 'tấn', 560000, 800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, '', '02', 'II1103', 'II11', '', '3', '', 'Quặng Felspat làm nguyên liệu gốm sứ (khoáng sản khai thác)', '', 'tấn', 245000, 350000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, '', '02', 'II12', 'II', '', '2', '', 'Mica, thạch anh kỹ thuật', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, '', '02', 'II1201', 'II12', '', '3', '', 'Mica', '', 'tấn', 1200000, 1600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, '', '02', 'II1202', 'II12', '', '3', '', 'Thạch anh kỹ thuật', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, '', '02', 'II120201', 'II1202', '', '4', '', 'Thạch anh kỹ thuật', '', 'tấn', 250000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, '', '02', 'II120202', 'II1202', '', '4', '', 'Thạch anh bột', '', 'tấn', 1050000, 1500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, '', '02', 'II120203', 'II1202', '', '4', '', 'Thạch anh hạt', '', 'tấn', 1500000, 1800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, '', '02', 'II13', 'II', '', '2', '', 'Pirite, phosphorite', '', 'tấn', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, '', '02', 'II1301', 'II13', '', '3', '', 'Quặng Pirite', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, '', '02', 'II1302', 'II13', '', '3', '', 'Quặng phosphorit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, '', '02', 'II130201', 'II1302', '', '4', '', 'Quặng Phosphorite có hàm lượng P2O5<20%', '', 'tấn', 350000, 500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, '', '02', 'II130202', 'II1302', '', '4', '', 'Quặng Phosphorite có hàm lượng 20%≤P2O5<30%', '', 'tấn', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, '', '02', 'II130203', 'II1302', '', '4', '', 'Quặng Phosphorite có hàm lượng P2O5≥30%', '', 'tấn', 600000, 800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, '', '02', 'II14', 'II', '', '2', '', 'Apatit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, '', '02', 'II1401', 'II14', '', '3', '', 'Apatit loại I', '', 'tấn', 1400000, 1700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, '', '02', 'II1402', 'II14', '', '3', '', 'Apatit loại II', '', 'tấn', 850000, 1100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, '', '02', 'II1403', 'II14', '', '3', '', 'Apatit loại III', '', 'tấn', 350000, 500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, '', '02', 'II1404', 'II14', '', '3', '', 'Apatit loại tuyển', '', 'tấn', 1100000, 1400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, '', '02', 'II15', 'II', '', '2', '', 'Secpentin (Quặng secpentin)', '', 'tấn', 125000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, '', '02', 'II16', 'II', '', '2', '', 'Than antraxit hầm lò', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, '', '02', 'II1601', 'II16', '', '3', '', 'Than sạch trong than khai thác (cám 0-15, cục -15)', '', 'tấn', 1306000, 1567200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, '', '02', 'II1602', 'II16', '', '3', '', 'Than cục', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, '', '02', 'II160201', 'II1602', '', '4', '', 'Than cục 1a, 1b,1c', '', 'tấn', 2784600, 3978000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, '', '02', 'II160202', 'II1602', '', '4', '', 'Than cục 2a, 2b', '', 'tấn', 3281000, 4202400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, '', '02', 'II160203', 'II1602', '', '4', '', 'Than cục 3a, 3b', '', 'tấn', 3438000, 4149600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, '', '02', 'II160204', 'II1602', '', '4', '', 'Than cục 4a, 4b', '', 'tấn', 3404520, 4863600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, '', '02', 'II160205', 'II1602', '', '4', '', 'Than cục 5a, 5b', '', 'tấn', 3050880, 4358400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, '', '02', 'II160206', 'II1602', '', '4', '', 'Than cục don 6a, 6b, 6c', '', 'tấn', 2747000, 3296000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, '', '02', 'II160207', 'II1602', '', '4', '', 'Than cục don 7a, 7b, 7c', '', 'tấn', 1351560, 1930800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, '', '02', 'II160208', 'II1602', '', '4', '', 'Than cục don 8a, 8b, 8c', '', 'tấn', 828000, 1112400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, '', '02', 'II1603', 'II16', '', '3', '', 'Than cám', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, '', '02', 'II160301', 'II1603', '', '4', '', 'Than cám 1', '', 'tấn', 2606000, 3127200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, '', '02', 'III60302', 'III603', '', '4', '', 'Than cám 2', '', 'tấn', 2713000, 3255600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, '', '02', 'II160303', 'II1603', '', '4', '', 'Than cám 3a, 3b, 3c', '', 'tấn', 2237760, 3196800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, '', '02', 'II160304', 'II1603', '', '4', '', 'Than cám 4a, 4b', '', 'tấn', 1706880, 2438400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, '', '02', 'II160305', 'II1603', '', '4', '', 'Than cám 5a, 5b', '', 'tấn', 1349040, 1927200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, '', '02', 'II160306', 'II1603', '', '4', '', 'Than cám 6a, 6b', '', 'tấn', 1065120, 1521600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, '', '02', 'III60307', 'III603', '', '4', '', 'Than cám 7a, 7b, 7c', '', 'tấn', 803040, 1147200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, '', '02', 'II1604', 'II16', '', '3', '', 'Than bùn', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, '', '02', 'II160401', 'II1604', '', '4', '', 'Than bùn tuyển 1a, 1b', '', 'tấn', 805000, 966000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, '', '02', 'II160402', 'II1604', '', '4', '', 'Than bùn tuyển 2a, 2b', '', 'tấn', 715000, 886800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, '', '02', 'II160403', 'II1604', '', '4', '', 'Than bùn tuyển 3a, 3b, 3c', '', 'tấn', 568000, 741600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, '', '02', 'II160404', 'II1604', '', '4', '', 'Than bùn tuyển 4a, 4b, 4c', '', 'tấn', 464520, 663600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, '', '02', 'II17', 'II', '', '2', '', 'Than antraxit lộ thiên', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, '', '02', 'II1701', 'II17', '', '3', '', 'Than sạch trong than khai thác (cám 0-15, cục -15)', '', 'tấn', 1306000, 1567200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, '', '02', 'II1702', 'II17', '', '3', '', 'Than cục', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, '', '02', 'II170201', 'II1702', '', '4', '', 'Than cục 1a, 1b, 1c', '', 'tấn', 2784600, 3978000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, '', '02', 'II170202', 'II1702', '', '4', '', 'Than cục 2a, 2b', '', 'tấn', 3281000, 4202400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, '', '02', 'II170203', 'II1702', '', '4', '', 'Than cục 3a, 3b', '', 'tấn', 3438000, 4149600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, '', '02', 'II170204', 'II1702', '', '4', '', 'Than cục 4a, 4b', '', 'tấn', 3404520, 4863600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, '', '02', 'II170205', 'II1702', '', '4', '', 'Than cục 5a, 5b', '', 'tấn', 3050880, 4358400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, '', '02', 'II170206', 'II1702', '', '4', '', 'Than cục don 6a, 6b, 6c', '', 'tấn', 2747000, 3296000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, '', '02', 'II170207', 'II1702', '', '4', '', 'Than cục don 7a, 7b, 7c', '', 'tấn', 1351560, 1930800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, '', '02', 'II170208', 'II1702', '', '4', '', 'Than cục don 8a, 8b, 8c', '', 'tấn', 828000, 1112400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, '', '02', 'II1703', 'II17', '', '3', '', 'Than cám', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, '', '02', 'II170301', 'II1703', '', '4', '', 'Than cám 1', '', 'tấn', 2606000, 3127200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, '', '02', 'II170302', 'II1703', '', '4', '', 'Than cám 2', '', 'tấn', 2713000, 3255600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, '', '02', 'II170303', 'II1703', '', '4', '', 'Than cám 3a, 3b, 3c', '', 'tấn', 2237760, 3196800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, '', '02', 'II170304', 'II1703', '', '4', '', 'Than cám 4a, 4b', '', 'tấn', 1706880, 2438400, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, '', '02', 'II170305', 'II1703', '', '4', '', 'Than cám 5a, 5b', '', 'tấn', 1349040, 1927200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, '', '02', 'II170306', 'II1703', '', '4', '', 'Than cám 6a, 6b', '', 'tấn', 1065120, 1521600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, '', '02', 'II170307', 'II1703', '', '4', '', 'Than cám 7a, 7b, 7c', '', 'tấn', 803040, 1147200, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, '', '02', 'II1704', 'II17', '', '3', '', 'Than bùn', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, '', '02', 'II170401', 'II1704', '', '4', '', 'Than bùn tuyển 1a, lb', '', 'tấn', 805000, 966000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, '', '02', 'II170402', 'II1704', '', '4', '', 'Than bùn tuyển 2a, 2b', '', 'tấn', 715000, 886800, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, '', '02', 'II170403', 'II1704', '', '4', '', 'Than bùn tuyển 3a, 3b, 3c', '', 'tấn', 568000, 741600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, '', '02', 'II170404', 'II1704', '', '4', '', 'Than bùn tuyển 4a, 4b, 4c', '', 'tấn', 464520, 663600, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, '', '02', 'II18', 'II', '', '2', '', 'Than nâu, than mỡ', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, '', '02', 'II1801', 'II18', '', '3', '', 'Than nâu', '', 'tấn', 365000, 500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, '', '02', 'II1802', 'II18', '', '3', '', 'Than mỡ', '', 'tấn', 1750000, 2500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, '', '02', 'II19', 'II', '', '2', '', 'Than bùn', '', 'tấn', 280000, 400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, '', '02', 'II20', 'II', '', '2', '', 'Kim cương, rubi, sapphire', '', 'kg', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, '', '02', 'II2001', 'II20', '', '3', '', 'Ru bi', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, '', '02', 'II200101', 'II2001', '', '4', '', 'Rubi làm tranh đá quý, bột mài kích thước nhỏ hơn 2mm', '', 'kg', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, '', '02', 'II200102', 'II2001', '', '4', '', 'Rubi trang sức không khuyết tật ≥ 2mm', '', 'viên', 25000000, 30000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, '', '02', 'II200103', 'II2001', '', '4', '', 'Rubi trang sức khuyết tật ≥ 2mm', '', 'viên', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, '', '02', 'II200104', 'II2001', '', '4', '', 'Ám tiêu đá hoa chứa rubi khuyết tật nguồn gốc pegmatit', '', 'kg', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, '', '02', 'II2002', 'II20', '', '3', '', 'Sapphire', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, '', '02', 'II200201', 'II2002', '', '4', '', 'Sapphire trang sức không khuyết tật ≥ 2mm', '', 'viên', 25000000, 30000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, '', '02', 'II200202', 'II2002', '', '4', '', 'Sapphire trang sức khuyết tật ≥ 2mm', '', 'viên', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, '', '02', '11200203', '112002', '', '4', '', 'Sapphire làm tranh đá quý kích thước nhỏ 2mm', '', 'kg', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, '', '02', 'II2003', 'II20', '', '3', '', 'Corindon', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, '', '02', 'II200301', 'II2003', '', '4', '', 'Corindon làm tranh đá quý kích thước nhỏ hơn 2,5 mm', '', 'kg', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, '', '02', 'II200302', 'II2003', '', '4', '', 'Corindon trang sức hoặc kích thước lớn hơn 2,5 mm', '', 'viên', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dmthuetn` (`id`, `masopnhom`, `manhom`, `mahh`, `magoc`, `macapdo`, `capdo`, `masp`, `tenhh`, `dacdiemkt`, `dvt`, `giatu`, `giaden`, `gc`, `thoidiem`, `sapxep`, `theodoi`, `thuoctn`, `created_at`, `updated_at`) VALUES
(292, '', '02', 'II21', 'II', '', '2', '', 'Emerald, alexandrite, opan', '', 'kg', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, '', '02', 'II22', 'II', '', '2', '', 'Adit, rodolite, pyrope, berin, spinen, topaz', '', 'kg', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, '', '02', 'II2201', 'II22', '', '3', '', 'Berin, mã não có màu xanh da trời, xanh nước biển, sáng ngọc', '', 'viên', 600000, 720000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, '', '02', 'II23', 'II', '', '2', '', 'Thạch anh tinh thể màu; cryolite; opan quý màu trắng, đỏ lửa; fenspat, birusa; nefrite', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, '', '02', 'II2301', 'II23', '', '3', '', 'Thạch anh ám khói, trong suốt, tóc', '', 'tấn', 800000000, 960000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, '', '02', 'II2302', 'II23', '', '3', '', 'Anmetit (thạch anh tím)', '', 'tấn', 1000000000, 1200000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, '', '02', 'II2303', 'II23', '', '3', '', 'Thạch anh tinh thể khác', '', 'tấn', 25000000, 30000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, '', '02', 'II24', 'II', '', '2', '', 'Khoáng sản không kim loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, '', '02', 'II2401', 'II24', '', '3', '', 'Barit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, '', '02', 'II240101', 'II2401', '', '4', '', 'Quặng Barit khai thác', '', 'tấn', 315000, 450000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(302, '', '02', 'II240102', 'II2401', '', '4', '', 'Tinh quặng Barit hàm lượng 60%≤BaSO4<70%', '', 'tấn', 600000, 800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(303, '', '02', 'II240103', 'II2401', '', '4', '', 'Tinh quặng Barit hàm lượng BaSO4≥70%', '', 'tấn', 800000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(304, '', '02', 'II2402', 'II24', '', '3', '', 'Fluorit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(305, '', '02', 'II240201', 'II2402', '', '4', '', 'Quặng Fluorit khai thác', '', 'tấn', 350000, 500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(306, '', '02', 'II240202', 'II2402', '', '4', '', 'Quặng Fluorit có hàm lượng 50%≤CaF2<70%', '', 'tấn', 2500000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(307, '', '02', 'II240203', 'II2402', '', '4', '', 'Quặng Fluorit có hàm lượng 70%≤CaF2<90%', '', 'tấn', 3000000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(308, '', '02', 'II2403', 'II24', '', '3', '', 'Quặng Diatomite khai thác', '', 'tấn', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(309, '', '02', 'II2404', 'II24', '', '3', '', 'Graphit', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(310, '', '02', 'II240401', 'II2404', '', '4', '', 'Quặng Graphit khai thác', '', 'tấn', 600000, 720000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(311, '', '02', 'II240402', 'II2404', '', '4', '', 'Tinh quặng Graphit', '', 'tấn', 6600000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, '', '02', 'II240201', 'II2402', '', '4', '', 'Quặng Fluorit khai thác', '', 'tấn', 350000, 500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, '', '02', 'II2405', 'II24', '', '3', '', 'Quặng Tacl (Tale)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, '', '02', 'II240501', 'II2405', '', '4', '', 'Quặng Tacl khai thác', '', 'tấn', 630000, 900000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, '', '02', 'II240502', 'II2405', '', '4', '', 'Bột Tacl', '', 'tấn', 1120000, 1600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, '', '02', 'II2406', 'II24', '', '3', '', 'Quặng Sericite', '', 'tấn', 350000, 420000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, '', '02', 'II2407', 'II24', '', '3', '', 'Bùn khoáng', '', 'tấn', 910000, 1300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, '', '02', 'II2408', 'II24', '', '3', '', 'Sét Bentonite', '', 'm3', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, '', '02', 'II2409', 'II24', '', '3', '', 'Quặng Silic', '', 'tấn', 560000, 680000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, '', '02', 'II2410', 'II24', '', '3', '', 'Quặng Magnesit', '', 'tấn', 875000, 1250000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, '', '02', 'II2411', 'II24', '', '3', '', 'Đá phong thủy', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, '', '02', 'II241101', 'II2411', '', '4', '', 'Gỗ hóa thạch (đường kinh (8-15) cm x chiều cao (20-30) cm', '', 'viên', 2000000, 2400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, '', '02', 'II241102', 'II2411', '', '4', '', 'Gỗ hóa thạch (đường kính (8-15) cm x chiều cao trên 30 cm', '', 'viên', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, '', '02', 'II241103', 'II2411', '', '4', '', 'Đá sắt nazodac giàu corindon hoặc safia', '', 'kg', 5000, 6000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, '', '02', 'II241I04', 'II241I', '', '4', '', 'Calcite hồng, trắng, xanh', '', 'kg', 500, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, '', '02', 'II241105', 'II2411', '', '4', '', 'Fluorit có màu xanh da trời, tím, xanh Cửu long', '', 'kg', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, '', '02', 'II241106', 'II2411', '', '4', '', 'Đá vôi, phiến vôi trang trí non bộ, phong thủy', '', 'tấn', 1000000, 1200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, '', '02', 'II241107', 'II2411', '', '4', '', 'Tourmaline đen', '', 'viên', 500000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, '', '02', 'II241108', 'II2411', '', '4', '', 'Granat có màu đỏ đậm, đỏ nâu, nâu, làm tranh đá quý, bột mài kích thước nhỏ hơn 2,5mm', '', 'kg', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, '', '02', 'II241109', 'II2411', '', '4', '', 'Granat có màu đỏ đậm, đỏ nâu, nâu trang sức bán quý hoặc có kích thước từ 2,5mm trở lên', '', 'viên', 400000, 480000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, '', '03', 'III', '03', '', '1', '', 'Sản phẩm của rừng tự nhiên', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, '', '03', 'III1', 'III', '', '2', '', 'Gỗ nhóm I', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, '', '03', 'III101', 'III1', '', '3', '', 'Cẩm lai, lát', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, '', '03', 'III10101', 'III101', '', '4', '', 'D<25cm', '', 'm3', 10500000, 14500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, '', '03', 'III10102', 'III101', '', '4', '', '25cm≤D<50cm', '', 'm3', 21300000, 28000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, '', '03', 'III10103', 'III101', '', '4', '', 'D≥50 cm', '', 'm3', 31200000, 36000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, '', '03', 'III102', 'III1', '', '3', '', 'Cẩm liên (cà gần)', '', 'm3', 5110000, 7300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, '', '03', 'III103', 'III1', '', '3', '', 'Dáng hương (giáng hương)', '', 'm3', 20000000, 26000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, '', '03', 'III104', 'III1', '', '3', '', 'Du sam', '', 'm3', 18000000, 24000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, '', '03', 'III105', 'III1', '', '3', '', 'Gõ đỏ (Cà te/Hồ bì)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, '', '03', 'III10501', 'III105', '', '4', '', 'D<25cm', '', 'm3', 5200000, 6500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, '', '03', 'III10502', 'III105', '', '4', '', '25cm≤D<50cm', '', 'm3', 19600000, 28000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, '', '03', 'III10503', 'III105', '', '4', '', 'D≥50 cm', '', 'm3', 28200000, 35000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, '', '03', 'III106', 'III1', '', '3', '', 'Gụ', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, '', '03', 'III10601', 'III106', '', '4', '', 'D<25cm', '', 'm3', 4800000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, '', '03', 'III10602', 'III106', '', '4', '', '25cm≤D<50cm', '', 'm3', 10200000, 12000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, '', '03', 'III10603', 'III106', '', '4', '', 'D≥50 cm', '', 'm3', 13300000, 16000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, '', '03', 'III107', 'III1', '', '3', '', 'Gụ mật (Gõ mật)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, '', '03', 'III10701', 'III107', '', '4', '', 'D<25cm', '', 'm3', 3300000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, '', '03', 'III10702', 'III107', '', '4', '', '25cm≤D<50cm', '', 'm3', 6500000, 8500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, '', '03', 'III10703', 'III107', '', '4', '', 'D≥50 cm', '', 'm3', 11500000, 15000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, '', '03', 'III108', 'III1', '', '3', '', 'Hoàng đàn', '', 'm3', 35000000, 40000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, '', '03', 'III109', 'III1', '', '3', '', 'Huê mộc, Sưa (Trắc thối/Huỳnh đàn đỏ)', '', 'm3', 2800000000, 4000000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, '', '03', 'III110', 'III1', '', '3', '', 'Huỳnh đường', '', 'm3', 7000000, 8400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, '', '03', 'III111', 'III1', '', '3', '', 'Hương', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, '', '03', 'III11101', 'III111', '', '4', '', 'D<25cm', '', 'm3', 5600000, 7500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, '', '03', 'III11102', 'III111', '', '4', '', '25cm≤D<50cm', '', 'm3', 13900000, 18700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, '', '03', 'III11103', 'III111', '', '4', '', 'D≥50 cm', '', 'm3', 21400000, 22800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, '', '03', 'III112', 'III1', '', '3', '', 'Hương tía', '', 'm3', 14000000, 16800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, '', '03', 'III113', 'III1', '', '3', '', 'Lát', '', 'm3', 9500000, 11400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(361, '', '03', 'III114', 'III1', '', '3', '', 'Mun', '', 'm3', 15000000, 17000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(362, '', '03', 'II1115', 'II11', '', '3', '', 'Muằng đen', '', 'm3', 4620000, 6600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(363, '', '03', 'III116', 'III1', '', '3', '', 'Pơ mu', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(364, '', '03', 'III11601', 'III116', '', '4', '', 'D<25cm', '', 'm3', 6552000, 9360000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(365, '', '03', 'III11602', 'III116', '', '4', '', '25cm≤D<50cm', '', 'm3', 12600000, 18000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(366, '', '03', 'III11603', 'III116', '', '4', '', 'D≥50 cm', '', 'm3', 18000000, 24000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(367, '', '03', 'III117', 'III1', '', '3', '', 'Sơn huyết', '', 'm3', 7000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(368, '', '03', 'III118', 'III1', '', '3', '', 'Trai', '', 'm3', 7700000, 11000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(369, '', '03', 'III119', 'III1', '', '3', '', 'Trắc', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(370, '', '03', 'III11901', 'III119', '', '4', '', 'D≤25cm', '', 'm3', 7300000, 7500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(371, '', '03', 'III11902', 'III119', '', '4', '', '25cm≤D<35cm', '', 'm3', 12400000, 14500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(372, '', '03', 'III11903', 'III119', '', '4', '', '35cm≤D<50cm', '', 'm3', 21600000, 28000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(373, '', '03', 'III11904', 'III119', '', '4', '', '50cm≤D<65cm', '', 'm3', 51730000, 73900000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(374, '', '03', 'III11905', 'III119', '', '4', '', 'D≥65cm', '', 'm3', 128600000, 180000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(375, '', '03', 'III120', 'III1', '', '3', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(376, '', '03', 'III12001', 'III120', '', '4', '', 'D<25cm', '', 'm3', 4200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(377, '', '03', 'III12002', 'III120', '', '4', '', '25cm≤D<35cm', '', 'm3', 7600000, 8400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(378, '', '03', 'III12003', 'III120', '', '4', '', '35cm≤D<50cm', '', 'm3', 10600000, 12000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(379, '', '03', 'III12004', 'III120', '', '4', '', 'D≥50 cm', '', 'm3', 16300000, 23000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(380, '', '03', 'III2', 'III', '', '2', '', 'Gỗ nhóm II', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(381, '', '03', 'III201', 'III2', '', '3', '', 'Cẩm xe', '', 'm3', 6400000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(382, '', '03', 'III202', 'III2', '', '3', '', 'Đinh (đinh hương)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(383, '', '03', 'III20201', 'III202', '', '4', '', 'D<25cm', '', 'm3', 7600000, 9500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(384, '', '03', 'III20202', 'III202', '', '4', '', '25cm≤D<50cm', '', 'm3', 11400000, 13000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(385, '', '03', 'I1I20203', 'I1I202', '', '4', '', 'D≥50 cm', '', 'm3', 13000000, 17000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(386, '', '03', 'III203', 'III2', '', '3', '', 'Lim xanh', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(387, '', '03', 'III20301', 'III203', '', '4', '', 'D<25cm', '', 'm3', 6700000, 7600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(388, '', '03', 'III20302', 'III203', '', '4', '', '25cm≤D<50cm', '', 'm3', 10800000, 14000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(389, '', '03', 'III20303', 'III203', '', '4', '', 'D≥50 cm', '', 'm3', 14000000, 16000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(390, '', '03', 'III204', 'III2', '', '3', '', 'Nghiến', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(391, '', '03', 'III20401', 'III204', '', '4', '', 'D<25cm', '', 'm3', 3800000, 4800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(392, '', '03', 'III20402', 'III204', '', '4', '', '25cm≤D<50cm', '', 'm3', 7500000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(393, '', '03', 'III20403', 'III204', '', '4', '', 'D≥50 cm', '', 'm3', 10200000, 11500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(394, '', '03', 'III205', 'III2', '', '3', '', 'Kiền kiền', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(395, '', '03', 'III20501', 'III205', '', '4', '', 'D<25cm', '', 'm3', 4200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(396, '', '03', 'III20502', 'III205', '', '4', '', '25cm≤D<50cm', '', 'm3', 7300000, 9000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(397, '', '03', 'III20503', 'III205', '', '4', '', 'D≥50 cm', '', 'm3', 13300000, 15000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(398, '', '03', 'III206', 'III2', '', '3', '', 'Da đá', '', 'm3', 4550000, 6500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(399, '', '03', 'III207', 'III2', '', '3', '', 'Sao xanh', '', 'm3', 5500000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(400, '', '03', 'III208', 'III2', '', '3', '', 'Sến', '', 'm3', 7600000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(401, '', '03', 'III209', 'III2', '', '3', '', 'Sến mật', '', 'm3', 5500000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(402, '', '03', 'III210', 'III2', '', '3', '', 'Sến mủ', '', 'm3', 3700000, 4400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(403, '', '03', 'III211', 'III2', '', '3', '', 'Táu mật', '', 'm3', 7800000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(404, '', '03', 'III212', 'III2', '', '3', '', 'Trai ly', '', 'm', 11500000, 13800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(405, '', '03', 'III213', 'III2', '', '3', '', 'Xoay', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(406, '', '03', 'III21301', 'III213', '', '4', '', 'D<25cm', '', 'm3', 3100000, 3700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(407, '', '03', 'III21302', 'III213', '', '4', '', '25cm≤D<50cm', '', 'm3', 4500000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(408, '', '03', 'III21303', 'III213', '', '4', '', 'D≥50 cm', '', 'm3', 6500000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(409, '', '03', 'III214', 'III2', '', '3', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(410, '', '03', 'III21401', 'III214', '', '4', '', 'D<25cm', '', 'm3', 3400000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(411, '', '03', 'III21402', 'III214', '', '4', '', '25cm≤D<50cm', '', 'm3', 6300000, 9000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(412, '', '03', 'III21403', 'III214', '', '4', '', 'D≥50 cm', '', 'm3', 10500000, 12000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(413, '', '03', 'III3', 'III', '', '2', '', 'Gỗ nhóm III', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(414, '', '03', 'III301', 'III3', '', '3', '', 'Bằng lăng', '', 'm3', 3800000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(415, '', '03', 'III302', 'III3', '', '3', '', 'Cà chắc (cà chí)', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(416, '', '03', 'III30201', 'III302', '', '4', '', 'D<25cm', '', 'm3', 2700000, 3100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(417, '', '03', 'III30202', 'III302', '', '4', '', '25cm≤D<50cm', '', 'm3', 3800000, 4200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(418, '', '03', 'III30203', 'III302', '', '4', '', 'D≥50 cm', '', 'm3', 4200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(419, '', '03', 'III303', 'III3', '', '3', '', 'Cà ổi', '', 'm3', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(420, '', '03', 'III304', 'III3', '', '3', '', 'Chò chỉ', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(421, '', '03', 'III30401', 'III304', '', '4', '', 'D<25cm', '', 'm3', 2900000, 3200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(422, '', '03', 'III30402', 'III304', '', '4', '', '25cm≤D<50cm', '', 'm3', 4100000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(423, '', '03', 'III30403', 'III304', '', '4', '', 'D≥50 cm', '', 'm3', 9000000, 10000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(424, '', '03', 'III305', 'III3', '', '3', '', 'Chò chai', '', 'm3', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(425, '', '03', 'III306', 'III3', '', '3', '', 'Chua khét, trường chua', '', 'm3', 5400000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(426, '', '03', 'III307', 'III3', '', '3', '', 'Dạ hương', '', 'm3', 6000000, 7200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(427, '', '03', 'III308', 'III3', '', '3', '', 'Giỗi', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(428, '', '03', 'III30801', 'III308', '', '4', '', 'D<25cm', '', 'm3', 6300000, 9000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(429, '', '03', 'III30802', 'III308', '', '4', '', '25cm≤D<50cm', '', 'm3', 9100000, 13000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(430, '', '03', 'III30803', 'III308', '', '4', '', 'D≥50 cm', '', 'm3', 13000000, 18000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(431, '', '03', 'III309', 'III3', '', '3', '', 'Dầu gió', '', 'm3', 4000000, 4400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(432, '', '03', 'III310', 'III3', '', '3', '', 'Huỳnh', '', 'm', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(433, '', '03', 'III311', 'III3', '', '3', '', 'Re mit', '', 'm3', 4300000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(434, '', '03', 'III312', 'III3', '', '3', '', 'Re hương', '', 'm3', 4500000, 5400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(435, '', '03', 'III313', 'III3', '', '3', '', 'Săng lẻ', '', 'm3', 6000000, 7200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(436, '', '03', 'III314', 'III3', '', '3', '', 'Sao đen', '', 'm', 4300000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(437, '', '03', 'III315', 'III3', '', '3', '', 'Sao cát', '', 'm3', 3500000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(438, '', '03', 'III316', 'III3', '', '3', '', 'Trường mật', '', 'm3', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(439, '', '03', 'III317', 'III3', '', '3', '', 'Trường chua', '', 'm3', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(440, '', '03', 'III318', 'III3', '', '3', '', 'Vên vên', '', 'm3', 4000000, 4400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(441, '', '03', 'III319', 'III3', '', '3', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(442, '', '03', 'III31901', 'III319', '', '4', '', 'D<25cm', '', 'm3', 1700000, 2400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(443, '', '03', 'III31902', 'III319', '', '4', '', '25cm≤D<35cm', '', 'm3', 3300000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(444, '', '03', 'III31903', 'III319', '', '4', '', '35cm≤D<50cm', '', 'm3', 5600000, 6600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(445, '', '03', 'III31904', 'III319', '', '4', '', 'D≥50 cm', '', 'm3', 7700000, 8000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(446, '', '03', 'III4', 'III', '', '2', '', 'Gỗ nhóm IV', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(447, '', '03', 'III401', 'III4', '', '3', '', 'Bô bô', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(448, '', '03', 'III40101', 'III401', '', '4', '', 'Chiều dài <2m', '', 'm3', 1600000, 2000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(449, '', '03', 'III40102', 'III401', '', '4', '', 'Chiều dài ≥2m', '', 'm3', 2800000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(450, '', '03', 'III402', 'III4', '', '3', '', 'Chặc khế', '', 'm3', 3500000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(451, '', '03', 'III403', 'III4', '', '3', '', 'Cóc đá', '', 'm3', 2100000, 2600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(452, '', '03', 'III404', 'III4', '', '3', '', 'Dầu các loại', '', 'm3', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(453, '', '03', 'III405', 'III4', '', '3', '', 'Re (De)', '', 'm3', 6000000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(454, '', '03', 'III406', 'III4', '', '3', '', 'Gội tía', '', 'm3', 6000000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(455, '', '03', 'III407', 'III4', '', '3', '', 'Mỡ', '', 'm3', 1100000, 1200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(456, '', '03', 'III408', 'III4', '', '3', '', 'Sến bo bo', '', 'm3', 3000000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(457, '', '03', 'III409', 'III4', '', '3', '', 'Lim sừng', '', 'm3', 3000000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(458, '', '03', 'III410', 'III4', '', '3', '', 'Thông', '', 'm3', 2500000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(459, '', '03', 'III411', 'III4', '', '3', '', 'Thông lông gà', '', 'm3', 4500000, 5400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(460, '', '03', 'III412', 'III4', '', '3', '', 'Thông ba lá', '', 'm3', 2900000, 3300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(461, '', '03', 'III413', 'III4', '', '3', '', 'Thông nàng', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(462, '', '03', 'III41301', 'III413', '', '4', '', 'D<35cm', '', 'm3', 1800000, 2100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(463, '', '03', 'III41302', 'III413', '', '4', '', 'D≥35cm', '', 'm3', 3500000, 4100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(464, '', '03', 'III414', 'III4', '', '3', '', 'Vàng tâm', '', 'm3', 6000000, 7000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(465, '', '03', 'III415', 'III4', '', '3', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(466, '', '03', 'III41501', 'III415', '', '4', '', 'D<25cm', '', 'm3', 1300000, 1800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(467, '', '03', 'III41502', 'III415', '', '4', '', '25cm≤D<35cm', '', 'm3', 2500000, 3200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(468, '', '03', 'III4I503', 'III4I5', '', '4', '', '35cm≤D<50cm', '', 'm3', 3900000, 4200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(469, '', '03', 'III41504', 'III415', '', '4', '', 'D≥50 cm', '', 'm3', 5200000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(470, '', '03', 'III5', 'III', '', '2', '', 'Gỗ nhóm V, VI, VII, VIII', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(471, '', '03', '', '', '', '5', '', 'và các loại gỗ khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(472, '', '03', 'III501', 'III5', '', '3', '', 'Gỗ nhóm V', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(473, '', '03', 'III50101', 'III501', '', '4', '', 'Chò xanh', '', 'm3', 5000000, 6000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(474, '', '03', 'III50102', 'III501', '', '4', '', 'Chò xót', '', 'm3', 2300000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(475, '', '03', 'III50103', 'III501', '', '4', '', 'Dải ngựa', '', 'm3', 3400000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(476, '', '03', 'III50104', 'III501', '', '4', '', 'Dầu', '', 'm3', 3800000, 4500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(477, '', '03', 'III50105', 'III501', '', '4', '', 'Dầu đỏ', '', 'm3', 3400000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(478, '', '03', 'III50106', 'III501', '', '4', '', 'Dầu đồng', '', 'm3', 3200000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(479, '', '03', 'III50107', 'III501', '', '4', '', 'Dầu nước', '', 'm3', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(480, '', '03', 'III50108', 'III501', '', '4', '', 'Lim vang (lim xẹt)', '', 'm3', 4500000, 5400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(481, '', '03', 'III50109', 'III501', '', '4', '', 'Muồng (Muồng cánh dán)', '', 'm3', 1900000, 2200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(482, '', '03', 'III50110', 'III501', '', '4', '', 'Sa mộc', '', 'm3', 4500000, 5400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(483, '', '03', 'III50111', 'III501', '', '4', '', 'Sau sau (Táu hậu)', '', 'm3', 700000, 900000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(484, '', '03', 'III50112', 'III501', '', '4', '', 'Thông hai lá', '', 'm3', 3000000, 3500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(485, '', '03', 'III50113', 'III501', '', '4', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(486, '', '03', 'III5011301', 'III50113', '', '5', '', 'D<25cm', '', 'm3', 1260000, 1800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(487, '', '03', 'III5011302', 'III50113', '', '5', '', '25cm≤D<50cm', '', 'm3', 2500000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(488, '', '03', 'III5011303', 'III50113', '', '5', '', 'D≥50cm', '', 'm3', 4400000, 5500000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(489, '', '03', 'III502', 'III5', '', '3', '', 'Gỗ nhóm VI', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(490, '', '03', 'III50201', 'III502', '', '4', '', 'Bạch đàn', '', 'm3', 2000000, 2400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(491, '', '03', 'III50202', 'III502', '', '4', '', 'Cáng lò', '', 'm3', 3000000, 3600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(492, '', '03', 'III50203', 'III502', '', '4', '', 'Chò', '', 'm3', 3200000, 4300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(493, '', '03', 'III50204', 'III502', '', '4', '', 'Chò nâu', '', 'm3', 4000000, 4800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(494, '', '03', 'III50205', 'III502', '', '4', '', 'Keo', '', 'm3', 2000000, 2400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(495, '', '03', 'III50206', 'III502', '', '4', '', 'Kháo vàng', '', 'm3', 2200000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(496, '', '03', 'III50207', 'III502', '', '4', '', 'Mận rừng', '', 'm3', 1900000, 2200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(497, '', '03', 'III50208', 'III502', '', '4', '', 'Phay', '', 'm3', 1900000, 2200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(498, '', '03', 'III50209', 'III502', '', '4', '', 'Trám hồng', '', 'm3', 2400000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(499, '', '03', 'III50210', 'III502', '', '4', '', 'Xoan đào', '', 'm3', 3100000, 3700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(500, '', '03', 'III50211', 'III502', '', '4', '', 'Sấu', '', 'm3', 8820000, 12600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(501, '', '03', 'III50212', 'III502', '', '4', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(502, '', '03', 'III5021201', 'III50212', '', '5', '', 'D<25cm', '', 'm3', 910000, 1300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(503, '', '03', 'III5021202', 'III50212', '', '5', '', '25cm≤D<50cm', '', 'm3', 2000000, 2600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(504, '', '03', 'III5021203', 'III50212', '', '5', '', 'D≥50cm', '', 'm3', 3500000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(505, '', '03', 'III503', 'III5', '', '3', '', 'Gỗ nhóm VII', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(506, '', '03', 'III50301', 'III503', '', '4', '', 'Gáo vàng', '', 'm3', 2100000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(507, '', '03', 'III50302', 'III503', '', '4', '', 'Lồng mức', '', 'm3', 2800000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(508, '', '03', 'III50303', 'III503', '', '4', '', 'Mò cua (Mù cua/Sữa)', '', 'm3', 2100000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(509, '', '03', 'III50304', 'III503', '', '4', '', 'Trám trắng', '', 'm3', 2300000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(510, '', '03', 'III50305', 'III503', '', '4', '', 'Vang trứng', '', 'm3', 2800000, 3000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(511, '', '03', 'III50306', 'III503', '', '4', '', 'Xoăn', '', 'm3', 1400000, 2000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(512, '', '03', 'III50307', 'III503', '', '4', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(513, '', '03', 'III5021203', 'III50212', '', '5', '', 'D<25cm', '', 'm3', 1000000, 1300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(514, '', '03', 'III5021203', 'III50212', '', '5', '', '25cm≤D<50cm', '', 'm3', 2000000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(515, '', '03', 'III5021203', 'III50212', '', '5', '', 'D≥50cm', '', 'm3', 3500000, 4000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(516, '', '03', 'III504', 'III5', '', '3', '', 'Gỗ nhóm VIII', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(517, '', '03', 'III50401', 'III504', '', '4', '', 'Bồ đề', '', 'm3', 1100000, 1200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(518, '', '03', 'III50402', 'III504', '', '4', '', 'Bộp (đa xanh)', '', 'm3', 4100000, 5000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(519, '', '03', 'III50403', 'III504', '', '4', '', 'Trụ mỏ', '', 'm3', 840000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(520, '', '03', 'III50404', 'III504', '', '4', '', 'Các loại khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(521, '', '03', 'III5040401', 'III50404', '', '5', '', 'D<25cm', '', 'm3', 800000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(522, '', '03', 'III5040402', 'III50404', '', '5', '', 'D≥25cm', '', 'm3', 1960000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(523, '', '03', 'III505', 'III5', '', '3', '', 'Các loại gỗ khác', '', 'm3', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(524, '', '03', 'III6', 'III', '', '2', '', 'Cành, ngọn, gốc, rễ', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(525, '', '03', 'III601', 'III6', '', '3', '', 'Cành, ngọn', '', 'm3', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(526, '', '03', 'III602', 'III6', '', '3', '', 'Gốc, rễ', '', 'm3', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(527, '', '03', 'III7', 'III', '', '2', '', 'Củi', '', 'kg', 490000, 700000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(528, '', '03', 'III8', 'III', '', '2', '', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(529, '', '03', 'III801', 'III8', '', '3', '', 'Tre', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(530, '', '03', '1II80101', '1II801', '', '4', '', 'D<5cm', '', 'cây', 7700, 11000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(531, '', '03', 'III80102', 'III801', '', '4', '', '5cm≤D<6cm', '', 'cây', 12600, 18000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(532, '', '03', 'III80103', 'III801', '', '4', '', '6cm≤D<10cm', '', 'cây', 21000, 30000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(533, '', '03', 'III80104', 'III801', '', '4', '', 'D≥10 cm', '', 'cây', 30000, 40000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(534, '', '03', 'III802', 'III8', '', '3', '', 'Trúc', '', 'cây', 7000, 10000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(535, '', '03', 'III803', 'III8', '', '3', '', 'Nứa', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(536, '', '03', 'III80301', 'III803', '', '4', '', 'D<7cm', '', 'cây', 2800, 4000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(537, '', '03', 'III80302', 'III803', '', '4', '', 'D≥7cm', '', 'cây', 5600, 8000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(538, '', '03', 'III804', 'III8', '', '3', '', 'Mai', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(539, '', '03', 'III80401', 'III804', '', '4', '', 'D<6cm', '', 'cây', 12600, 18000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(540, '', '03', 'III80402', 'III804', '', '4', '', '6cm≤D<10cm', '', 'cây', 21000, 30000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(541, '', '03', 'III80403', 'III804', '', '4', '', 'D≥10 cm', '', 'cây', 30000, 40000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(542, '', '03', 'III805', 'III8', '', '3', '', 'Vầu', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(543, '', '03', 'III80501', 'III805', '', '4', '', 'D<6cm', '', 'cây', 7700, 11000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(544, '', '03', 'III80502', 'III805', '', '4', '', '6cm≤D<10cm', '', 'cây', 14700, 21000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(545, '', '03', 'III80503', 'III805', '', '4', '', 'D≥10 cm', '', 'cây', 21000, 26000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(546, '', '03', 'III806', 'III8', '', '3', '', 'Tranh', '', 'cây', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(547, '', '03', 'III807', 'III8', '', '3', '', 'Giang', '', 'cây', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(548, '', '03', 'III80701', 'III807', '', '4', '', 'D<6cm', '', 'cây', 4200, 6000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(549, '', '03', 'III80702', 'III807', '', '4', '', '6cm≤D<10cm', '', 'cây', 7000, 10000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(550, '', '03', '1II80703', '1II807', '', '4', '', 'D≥10 cm', '', 'cây', 12600, 18000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(551, '', '03', 'III808', 'III8', '', '3', '', 'Lồ ô', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(552, '', '03', 'III80801', 'III808', '', '4', '', 'D<6cm', '', 'cây', 5600, 8000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(553, '', '03', 'III80802', 'III808', '', '4', '', '6cm≤D<10cm', '', 'cây', 10500, 15000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(554, '', '03', 'III80803', 'III808', '', '4', '', 'D≥10 cm', '', 'cây', 15000, 20000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(555, '', '03', 'III9', 'III', '', '2', '', 'Trầm hương, kỳ nam', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(556, '', '03', 'III901', 'III9', '', '3', '', 'Trăm hương', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(557, '', '03', 'III90101', 'III901', '', '4', '', 'loại 1', '', 'kg', 350000000, 500000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(558, '', '03', 'III90102', 'III901', '', '4', '', 'loại 2', '', 'kg', 70000000, 100000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(559, '', '03', 'III90103', 'III901', '', '4', '', 'Loại 3', '', 'kg', 14000000, 20000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(560, '', '03', 'III902', 'III9', '', '3', '', 'Kỳ nam', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(561, '', '03', 'III90201', 'III902', '', '4', '', 'Loại 1', '', 'kg', 770000000, 1000000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(562, '', '03', 'III90202', 'III902', '', '4', '', 'Loại 2', '', 'kg', 539000000, 770000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(563, '', '03', 'III10', 'III', '', '2', '', 'Hồi, quế, sa nhân, thảo quả', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(564, '', '03', 'III1001', 'III10', '', '3', '', 'Hồi', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(565, '', '03', 'III100101', 'III1001', '', '4', '', 'Tươi', '', 'kg', 56000, 80000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(566, '', '03', 'III110102', 'III1101', '', '4', '', 'Khô', '', 'kg', 80000, 100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(567, '', '03', 'III1002', 'III10', '', '3', '', 'Quế', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(568, '', '03', 'III100201', 'III1002', '', '4', '', 'Tươi', '', 'kg', 25000, 30000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(569, '', '03', 'III100202', 'III1002', '', '4', '', 'Khô', '', 'kg', 90000, 110000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(570, '', '03', 'III1003', 'III10', '', '3', '', 'Sa nhân', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(571, '', '03', 'III100301', 'III1003', '', '4', '', 'Tươi', '', 'kg', 105000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(572, '', '03', 'III100302', 'III1003', '', '4', '', 'Khô', '', 'kg', 210000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(573, '', '03', 'III1004', 'III10', '', '3', '', 'Thảo quả', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(574, '', '03', 'III100401', 'III1004', '', '4', '', 'Tươi', '', 'kg', 84000, 120000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(575, '', '03', 'III100402', 'III1004', '', '4', '', 'Khô', '', 'kg', 280000, 400000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(576, '', '03', 'III11', 'III', '', '2', '', 'Các sản phẩm khác của rừng tự nhiên', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(577, '', '04', 'IV', '04', '', '1', '', 'Hải sản tự nhiên', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(578, '', '04', 'IV1', 'IV', '', '2', '', 'Ngọc trai, bảo ngư, hải sâm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(579, '', '04', 'IV101', 'IV1', '', '3', '', 'Ngọc trai', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(580, '', '04', 'IV102', 'IV1', '', '3', '', 'Bào ngư', '', 'kg', 300000, 360000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(581, '', '04', 'IV103', 'IV1', '', '3', '', 'Hải sâm', '', 'kg', 420000, 600000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(582, '', '04', 'IV2', 'IV', '', '2', '', 'Hải sản tự nhiên khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(583, '', '04', 'IV201', 'IV2', '', '3', '', 'Cá', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(584, '', '04', 'IV20101', 'IV201', '', '4', '', 'Cá loại 1, 2, 3', '', 'kg', 42000, 60000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(585, '', '04', 'IV20102', 'IV201', '', '4', '', 'Cá loại khác', '', 'kg', 21000, 30000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(586, '', '04', 'IV202', 'IV2', '', '3', '', 'Cua', '', 'kg', 170000, 200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(587, '', '04', 'IV204', 'IV2', '', '3', '', 'Mực', '', 'kg', 70000, 95000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(588, '', '04', 'IV205', 'IV2', '', '3', '', 'Tôm', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(589, '', '04', 'IV20501', 'IV205', '', '4', '', 'Tôm hùm', '', 'kg', 616000, 880000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(590, '', '04', 'IV20502', 'IV205', '', '4', '', 'Tôm khác', '', 'kg', 105000, 150000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(591, '', '04', 'IV206', 'IV2', '', '3', '', 'Khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(592, '', '05', 'V', '05', '', '1', '', 'Nước thiên nhiên', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(593, '', '05', 'V1', 'V', '', '2', '', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(594, '', '05', 'V101', 'V1', '', '3', '', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(595, '', '05', 'V10101', 'V101', '', '4', '', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên dùng để đóng chai, đóng hộp chất lượng trung bình (so với tiêu chuẩn đóng chai phải lọc bỏ một số hợp chất để hợp quy với Bộ Y tế)', '', 'm3', 200000, 450000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(596, '', '05', 'V10102', 'V101', '', '4', '', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên dùng để đóng chai, đóng hộp chất lượng cao (lọc, khử vi khuẩn, vi sinh, không phải lọc một số hợp chất vô cơ)', '', 'm3', 450000, 1100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(597, '', '05', 'V10103', 'V101', '', '4', '', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp', '', '', 1100000, 2200000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(598, '', '05', 'V10104', 'V101', '', '4', '', 'Nước khoáng thiên nhiên dùng để ngâm, tắm, trị bệnh, dịch vụ du lịch...', '', 'm3', 20000, 32000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(599, '', '05', 'V102', 'V1', '', '3', '', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(600, '', '05', 'V10201', 'V102', '', '4', '', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', 'm3', 100000, 300000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(601, '', '05', 'V10202', 'V102', '', '4', '', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', 'm3', 500000, 1000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(602, '', '05', 'V2', 'V', '', '2', '', 'Nước thiên nhiên dùng cho sản xuất kinh doanh nước sạch', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(603, '', '05', 'V301', 'V3', '', '3', '', 'Nước mặt', '', 'm3', 2000, 6000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(604, '', '05', 'V302', 'V3', '', '3', '', 'Nước dưới đất (nước ngầm)', '', 'm3', 3000, 9000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(605, '', '05', 'V3', 'V', '', '2', '', 'Nước thiên nhiên dùng cho mục đích khác', '', '', 0, 0, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `dmthuetn` (`id`, `masopnhom`, `manhom`, `mahh`, `magoc`, `macapdo`, `capdo`, `masp`, `tenhh`, `dacdiemkt`, `dvt`, `giatu`, `giaden`, `gc`, `thoidiem`, `sapxep`, `theodoi`, `thuoctn`, `created_at`, `updated_at`) VALUES
(606, '', '05', 'V301', 'V3', '', '3', '', 'Nước thiên nhiên dùng cho sản xuất rượu, bia, nước giải khát, nước đá', '', 'm3', 40000, 100000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(607, '', '05', 'V302', 'V3', '', '3', '', 'Nước thiên nhiên dùng cho khai khoáng', '', 'm3', 40000, 50000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(608, '', '05', 'V303', 'V3', '', '3', '', 'Nước thiên nhiên dùng mục đích khác (làm mát, vệ sinh công nghiệp, xây dựng, dùng hco sản xuất, chế biến thủy sản, hải sản, nông sản...)', '', 'm3', 3000, 7000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(609, '', '05', 'V4', 'V', '', '2', '', 'Khí CO2 thu hồi từ nước khoáng thiên nhiên', '', '', 2300000, 2800000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(610, '', '05', 'VI', '6', '', '1', '', 'Yến sào thiên nhiên', '', 'kg', 51100000, 73000000, '', '', '', 'TD', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `dtapdungdvlt`
--

INSERT INTO `dtapdungdvlt` (`id`, `madtad`, `tendtad`, `created_at`, `updated_at`) VALUES
(1, '01', 'Khách hàng người nước ngoài', NULL, NULL),
(2, '02', 'Khách hàng đối tác', NULL, NULL),
(3, '03', 'Khách hàng đặt phòng qua mạng', NULL, NULL);

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

--
-- Dumping data for table `dvkcb`
--

INSERT INTO `dvkcb` (`id`, `maxa`, `mahuyen`, `district`, `soqd`, `ngayapdung`, `trangthai`, `mahs`, `manhom`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'PTCQCG', NULL, NULL, 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-12', 'CB', 'PTCQCG1539322861', '01', 'Giá trên chưa bao gồm các vật tư ', '2018-10-12 05:41:01', '2018-10-12 07:01:13'),
(2, 'PTCQCG', NULL, NULL, '001', '2018-10-17', 'CHT', 'PTCQCG1539762510', '02', '', '2018-10-17 07:48:30', '2018-10-17 07:48:30');

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

--
-- Dumping data for table `dvkcbct`
--

INSERT INTO `dvkcbct` (`id`, `maxa`, `mahuyen`, `district`, `mahs`, `madv`, `manhom`, `magoc`, `capdo`, `tendichvu`, `dvt`, `gc`, `sapxep`, `giadv`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'PTCQCG1539322861', '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, '150000', '2018-10-12 05:41:01', '2018-10-12 06:51:25'),
(2, NULL, NULL, NULL, 'PTCQCG1539322861', '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, '250000', '2018-10-12 05:41:01', '2018-10-12 06:51:59'),
(3, NULL, NULL, NULL, 'PTCQCG1539762510', 'HSTC', '02', '02', '1', 'Ngày điều trị Hồi sức tích cực (ICU)/ghép tạng hoặc ghép tủy hoặc ghép tế bào gốc', 'ngày', NULL, NULL, '100000', '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(4, NULL, NULL, NULL, 'PTCQCG1539762510', 'HSCC', '02', '02', '1', 'Ngày giường bệnh Hồi sức cấp cứu', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(5, NULL, NULL, NULL, 'PTCQCG1539762510', 'BNK', '02', '02', '1', 'Ngày giường bệnh Nội khoa:', '', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(6, NULL, NULL, NULL, 'PTCQCG1539762510', 'L1', '02', 'BNK', '2', 'Loại 1: Các khoa: Truyền nhiễm, Hô hấp, Huyết học, Ung thư, Tim mạch, Tâm thần, Thần kinh, Nhi, Tiêu hoá, Thận học; Nội tiết; Dị ứng (đối với bệnh nhân dị ứng thuốc nặng: Stevens Jonhson hoặc Lyell)', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(7, NULL, NULL, NULL, 'PTCQCG1539762510', 'L2', '02', 'BNK', '2', 'Loại 2: Các Khoa: Cơ-Xương-Khớp, Da liễu, Dị ứng, Tai-Mũi-Họng, Mắt, Răng Hàm Mặt, Ngoại, Phụ -Sản không mổ; YHDT hoặc PHCN cho nhóm người bệnh tổn thương tủy sống, tai biến mạch máu não, chấn thương sọ não.', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(8, NULL, NULL, NULL, 'PTCQCG1539762510', 'L3', '02', 'BNK', '2', 'Loại 3: Các khoa: YHDT, Phục hồi chức năng', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(9, NULL, NULL, NULL, 'PTCQCG1539762510', 'BNKB', '02', '02', '1', 'Ngày giường bệnh ngoại khoa, bỏng:', '', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(10, NULL, NULL, NULL, 'PTCQCG1539762510', 'L1', '02', 'BNKB', '2', 'Loại 1: Sau các phẫu thuật loại đặc biệt; Bỏng độ 3-4 trên 70% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(11, NULL, NULL, NULL, 'PTCQCG1539762510', 'L2', '02', 'BNKB', '2', 'Loại 2: Sau các phẫu thuật loại 1; Bỏng độ 3-4 từ 25 -70% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(12, NULL, NULL, NULL, 'PTCQCG1539762510', 'L3', '02', 'BNKB', '2', 'Loại 3: Sau các phẫu thuật loại 2; Bỏng độ 2 trên 30% diện tích cơ thể, Bỏng độ 3-4 dưới 25% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(13, NULL, NULL, NULL, 'PTCQCG1539762510', 'L4', '02', 'BNKB', '2', 'Loại 4: Sau các phẫu thuật loại 3; Bỏng độ 1, độ 2 dưới 30% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(14, NULL, NULL, NULL, 'PTCQCG1539762510', 'GBBN', '02', '02', '1', 'Ngày giường bệnh ban ngày', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30');

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

--
-- Dumping data for table `dvkcbctdf`
--

INSERT INTO `dvkcbctdf` (`id`, `maxa`, `mahuyen`, `district`, `madv`, `manhom`, `magoc`, `capdo`, `tendichvu`, `dvt`, `gc`, `sapxep`, `giadv`, `created_at`, `updated_at`) VALUES
(15, 'PTCQHBT', NULL, NULL, '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, NULL, '2018-10-12 04:38:59', '2018-10-12 04:38:59'),
(16, 'PTCQHBT', NULL, NULL, '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, NULL, '2018-10-12 04:38:59', '2018-10-12 04:38:59'),
(17, 'PTCQCG', NULL, NULL, 'CDHA', '03', '03', '1', 'Chuẩn đoán bằng hình ảnh', '', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(18, 'PTCQCG', NULL, NULL, 'SA', '03', 'CDHA', '2', 'Siêu âm', '', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(19, 'PTCQCG', NULL, NULL, '04C1.1.3', '03', 'SA', '3', 'Siêu âm', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(20, 'PTCQCG', NULL, NULL, '03C4.1.3', '03', 'SA', '3', 'Siêu âm + đo trục nhãn cầu', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(21, 'PTCQCG', NULL, NULL, 'saddadtt', '03', 'SA', '3', 'Siêu âm đầu dò âm đạo, trực tràng', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(22, 'PTCQCG', NULL, NULL, '03C4.1.1', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(23, 'PTCQCG', NULL, NULL, '03C4.1.6', '03', 'SA', '3', 'Siêu âm Doppler màu tim + cản âm', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(24, 'PTCQCG', NULL, NULL, '03C4.1.5', '03', 'SA', '3', 'Siêu âm tim gắng sức', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(25, 'PTCQCG', NULL, NULL, '04C1.1.4', '03', 'SA', '3', 'Siêu âm Doppler màu tim 4 D (3D REAL TIME)', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(26, 'PTCQCG', NULL, NULL, '04C1.1.5', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu qua thực quản', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(27, 'PTCQCG', NULL, NULL, '04C1.1.6', '03', 'SA', '3', 'Siêu âm trong lòng mạch hoặc Đo dự trữ lưu lượng động mạch vành FFR', 'lần', NULL, NULL, NULL, '2018-10-12 07:36:51', '2018-10-12 07:36:51'),
(28, 'PTCQCG', NULL, NULL, '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, NULL, '2018-10-16 03:16:00', '2018-10-16 03:16:00'),
(29, 'PTCQCG', NULL, NULL, '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, NULL, '2018-10-16 03:16:00', '2018-10-16 03:16:00');

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
  `hienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadat` double NOT NULL DEFAULT '0',
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giacacloaidat`
--

INSERT INTO `giacacloaidat` (`id`, `maso`, `magoc`, `macapdo`, `capdo`, `vitri`, `hienthi`, `ngaynhap`, `soqd`, `giadat`, `sapxep`, `ghichu`, `mahuyen`, `username`, `thaotac`, `created_at`, `updated_at`) VALUES
(1, '1', '', '1', '1', 'Khu vực 1', NULL, NULL, '', 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 07:24:48', '2018-10-02 08:30:24'),
(2, '2', '', '2', '1', 'Khu vực 2', NULL, NULL, '001', 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 07:28:36', '2018-10-02 08:00:39'),
(3, '3', '', '3', '1', 'Khu vực 3', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 08:04:09', '2018-10-02 08:04:09'),
(16, '1.1', '1', '1', '2', '1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 09:29:15', '2018-10-02 09:29:15'),
(17, '1.2', '1', '2', '2', '1.2', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 09:29:39', '2018-10-02 09:29:39'),
(18, '1.1.1', '1.1', '1', '3', '1.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 09:30:26', '2018-10-02 09:30:26'),
(19, '1.1.1.1', '1.1.1', '1', '4', '1.1.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 09:33:21', '2018-10-02 09:33:21'),
(27, '1.2.1', '1.2', '1', '3', '1.2.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:56:51', '2018-10-02 12:56:51'),
(28, '2.1', '2', '1', '2', '2.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:57:32', '2018-10-02 12:57:32'),
(29, '3.1', '3', '1', '2', '3.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:57:48', '2018-10-02 12:57:48'),
(30, '3.1.1', '3.1', '1', '3', '3.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:58:18', '2018-10-02 12:58:18'),
(31, '1.3', '1', '3', '2', '1.3', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:58:42', '2018-10-02 12:58:42'),
(32, '1.3.1', '1.3', '1', '3', '1.3.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 12:59:11', '2018-10-02 12:59:11'),
(33, '4', NULL, '4', '1', 'Khu vực 4', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:02:04', '2018-10-02 13:02:04'),
(34, '4.1', '4', '1', '2', '4.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:02:13', '2018-10-02 13:02:13'),
(35, '5', NULL, '5', '1', 'Khu vực 5', NULL, NULL, '', 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:02:25', '2018-10-02 13:03:02'),
(36, '5.1', '5', '1', '2', '5.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:03:09', '2018-10-02 13:03:09'),
(37, '5.1.1', '5.1', '1', '3', '5.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:07:25', '2018-10-02 13:07:25'),
(38, '5.1.1.1', '5.1.1', '1', '4', '5.1.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:07:37', '2018-10-02 13:07:37'),
(39, '5.1.1.1.1', '5.1.1.1', '1', '5', '5.1.1.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:07:52', '2018-10-02 13:07:52'),
(40, '5.1.1.1.1.1', '5.1.1.1.1', '1', '6', '5.1.1.1.1.1', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:08:18', '2018-10-02 13:08:18'),
(41, '5.1.1.1.1.1.1', '5.1.1.1.1.1', '1', '7', '5.1.1.1.1.1.1', NULL, NULL, '001', 4000000, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:08:38', '2018-10-04 01:26:33'),
(42, '5.2', '5', '2', '2', '5.2', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:09:09', '2018-10-02 13:09:09'),
(44, '1.4', '1', '4', '2', '1.4', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-10-02 13:23:28', '2018-10-02 13:23:28'),
(45, '1', NULL, '1', '1', 'Quận 1', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:32:37', '2018-10-03 02:32:37'),
(46, '1.1', '1', '1', '2', 'Quận 1- Huyện 1', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:32:47', '2018-10-03 02:32:47'),
(47, '1.1.1', '1.1', '1', '3', 'Quận 1- Huyện 1- Xã 1', NULL, NULL, '', 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:33:03', '2018-10-03 02:33:25'),
(48, '1.1.1.1', '1.1.1', '1', '4', 'Quận 1- Huyện 1- Xã 1- Phường 1', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:33:49', '2018-10-03 02:33:49'),
(49, '1.1.1.1.1', '1.1.1.1', '1', '5', 'Quận 1- Huyện 1- Xã 1- Phường 1 - Tổ 1 ', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:34:20', '2018-10-03 02:34:20'),
(50, '1.1.1.1.1.1', '1.1.1.1.1', '1', '6', 'Quận 1- Huyện 1- Xã 1- Phường 1 - Tổ 1 - Xóm 1', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:34:38', '2018-10-03 02:34:38'),
(51, '1.1.1.1.1.1.1', '1.1.1.1.1.1', '1', '7', 'Quận 1- Huyện 1- Xã 1- Phường 1 - Tổ 1  - Xóm 1 - Nhà 1', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-10-03 02:35:02', '2018-10-03 02:35:02');

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
  `ngayapdung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giahhdvk`
--

INSERT INTO `giahhdvk` (`id`, `mahs`, `maxa`, `mahuyen`, `district`, `manhom`, `ngayapdung`, `soqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'QCG1539836665', NULL, NULL, 'QCG', '01', '2018-11-18', '0011', 'ghi chú1', 'CB', '2018-10-18 04:24:25', '2018-10-18 06:49:17');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoithieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giahhdvkct`
--

INSERT INTO `giahhdvkct` (`id`, `mahs`, `maxa`, `mahuyen`, `district`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `dvt`, `giatoithieu`, `giatoida`, `created_at`, `updated_at`) VALUES
(1, 'QCG1539836665', NULL, NULL, NULL, '01', 'T1', 'Toán 11', 'sách giáo khoa', '', '110000', '130000', '2018-10-18 04:24:25', '2018-10-18 06:43:54'),
(2, 'QCG1539836665', NULL, NULL, NULL, '01', 'T2', 'Toán 2', 'sách giáo khoa', '', '150000', '156000', '2018-10-18 04:24:25', '2018-10-18 06:44:01');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoithieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatoida` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giarung`
--

INSERT INTO `giarung` (`id`, `mahs`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'T1539155888', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-10', 'a', 'CB', '2018-10-10 07:18:08', '2018-10-10 07:37:58');

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

--
-- Dumping data for table `giarungct`
--

INSERT INTO `giarungct` (`id`, `mahs`, `mahuyen`, `maxa`, `district`, `manhom`, `loairung`, `mucdo`, `dongiasd`, `dongiat50`, `dongiat1`, `dongiaxp`, `created_at`, `updated_at`) VALUES
(1, 'T1539155888', 'T', NULL, NULL, 'RTN', 'Rừng gỗ trữ lượng nghèo thường xanh', 'Trung bình', '2070001', '1980001', '4000001', '3030001', '2018-10-10 07:18:08', '2018-10-10 07:29:51'),
(2, 'T1539155888', NULL, NULL, NULL, 'RTN', 'Rừng gỗ trữ lượng nghèo thường xanh', 'Trung bình', '2070000', '1980000', '4000000', '303000', '2018-10-10 07:18:08', '2018-10-10 07:18:08'),
(3, 'T1539155888', NULL, NULL, NULL, 'RTR', 'Tràm nước', 'Trung bình', '6100000', '5800000', '120000', '6799000', '2018-10-10 07:18:08', '2018-10-10 07:18:08');

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
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giathuedatnuoc`
--

INSERT INTO `giathuedatnuoc` (`id`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `district`, `mahs`, `created_at`, `updated_at`) VALUES
(1, 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-09', NULL, 'CB', 'QCG', 'QCG1539073968', '2018-10-09 08:32:48', '2018-10-09 08:53:58');

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

--
-- Dumping data for table `giathuedatnuocct`
--

INSERT INTO `giathuedatnuocct` (`id`, `mahs`, `vitri`, `mota`, `dientich`, `dongia`, `created_at`, `updated_at`) VALUES
(1, 'QCG1539073968', 'Địa bàn cấp huyện thuộc Danh mục địa bàn có điều kiện kinh tế - xã hội khó khăn', 'Vùng sâu vùng xa', '1000000', '1500', '2018-10-09 08:32:48', '2018-10-09 08:32:48'),
(2, 'QCG1539073968', 'Khu Kinh tế được thành lập theo quy định của Chính phủ', 'Nhà Xưởng', '100000000', '30000', '2018-10-09 08:32:48', '2018-10-09 08:32:48'),
(3, 'QCG1539073968', 'Dự án sử dụng đất trong Cụm công nghiệp', 'Khu công nghiệp', '100000', '30000', '2018-10-09 08:32:48', '2018-10-09 08:32:48');

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

--
-- Dumping data for table `kkgiadvlt`
--

INSERT INTO `kkgiadvlt` (`id`, `mahs`, `macskd`, `maxa`, `mahuyen`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `dvt`, `plhs`, `thoihan`, `created_at`, `updated_at`) VALUES
(2, '1234567890_15395918021539674740', '1234567890_1539591802', '1234567890', 'PTCQHBT', '2018-10-16', '001', '', NULL, '2018-10-19', 'Test1', '2018-10-17', '1', '- Mức giá nêu trên đã bao gồm thuế giá GTGT', '2018-10-17 10:34:14', 'Lý do', 'DD', 'Đồng/giường/ngày đêm', NULL, 'Trước thời hạn', '2018-10-16 07:25:40', '2018-10-17 03:45:07');

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

--
-- Dumping data for table `kkgiadvltct`
--

INSERT INTO `kkgiadvltct` (`id`, `mahs`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `madtad`, `apdung`, `created_at`, `updated_at`) VALUES
(1, '1234567890_15395918021539674740', 'Loại 1', 'QCCL', '101,102,103,104', '', '30000', '50000', '01', NULL, '2018-10-16 07:25:40', '2018-10-16 07:25:40'),
(2, '1234567890_15395918021539674740', 'Loại 1', 'QCCL', '101,102,103,104', '', '500000', '600000', '01', NULL, '2018-10-16 07:25:40', '2018-10-16 08:50:42'),
(3, '1234567890_15395918021539674740', 'a', 'acdsxc', 'sadsa', '', '600000', '700000', '02', NULL, '2018-10-16 07:25:40', '2018-10-16 08:51:53'),
(4, '1234567890_15395918021539674740', 'A', 'A', 'A', 'A', '150000', '200000', '02', NULL, '2018-10-16 07:25:41', '2018-10-16 07:25:41'),
(5, '1234567890_15395918021539674740', 'a', 'a', 'a', NULL, '500000', '600000', '01', NULL, '2018-10-16 08:52:10', '2018-10-16 08:52:10');

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

--
-- Dumping data for table `kkgiadvltctdf`
--

INSERT INTO `kkgiadvltctdf` (`id`, `maxa`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `madtad`, `apdung`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'Loại 1', 'QCCL', '101,102,103,104', '', '30000', '50000', '01', NULL, '2018-10-16 02:49:25', '2018-10-16 03:50:50'),
(2, '1234567890', 'Loại 1', 'QCCL', '101,102,103,104', NULL, NULL, NULL, '01', NULL, '2018-10-16 02:49:27', '2018-10-16 02:49:27'),
(13, '1234567890', 'a', 'acdsxc', 'sadsa', '', '0', '0', '02', NULL, '2018-10-16 02:56:58', '2018-10-16 03:50:30'),
(18, '1234567890', 'A', 'A', 'A', 'A', '150000', '200000', '02', NULL, '2018-10-16 03:36:02', '2018-10-16 03:50:23');

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

--
-- Dumping data for table `lephitruocba`
--

INSERT INTO `lephitruocba` (`id`, `mahs`, `soqd`, `ngayapdung`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'T1539053227', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-01-01', 'HT', '2018-10-09 02:47:07', '2018-10-09 03:48:57'),
(2, 'T1539155764', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-10', 'CHT', '2018-10-10 07:16:05', '2018-10-10 07:16:05');

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

--
-- Dumping data for table `lephitruocbact`
--

INSERT INTO `lephitruocbact` (`id`, `mahs`, `manhom`, `nhanhieu`, `tentm`, `ttlv`, `socho`, `giatinhlptb`, `created_at`, `updated_at`) VALUES
(1, 'T1539053227', NULL, 'a', 'a', 'a', NULL, '100000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(2, 'T1539053227', NULL, 'a', 'a', 'a', NULL, '100000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(3, 'T1539053227', NULL, 'a', 'b', 'c', NULL, '1000000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(4, 'T1539053227', 'OTONKD9', 'TOYOTA', 'Camry LE', '2.5', '5', '1500000000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(5, 'T1539053227', 'OTONKD9', 'TOYOTA', 'Rush', '1.5', '7', '668000000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(6, 'T1539053227', 'OTONKD9', 'TOYOTA', 'FOTUNER', '2.8', '7', '1350000000', '2018-10-09 02:47:07', '2018-10-09 02:47:07'),
(7, 'T1539053227', 'OTONKD9', 'TOYOTA', 'Innova', '2.0', '7', '860000000', '2018-10-09 03:14:38', '2018-10-09 03:19:13');

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
(7, '2018_10_02_101124_create_dmqdgiadat_table', 2),
(8, '2018_10_02_110427_create_giacacloaidat_table', 3),
(9, '2018_10_04_110618_create_dmmhbinhongia_table', 4),
(10, '2018_10_04_124126_create_binhongia_table', 5),
(11, '2018_10_05_083407_create_binhongiactdf_table', 6),
(12, '2018_10_05_102036_create_binhongiact_table', 7),
(13, '2018_10_06_090515_create_thamdinhgia_table', 8),
(14, '2018_10_06_104037_create_thamdinhgiactdf_table', 9),
(15, '2018_10_06_150517_create_thamdinhgiact_table', 10),
(16, '2018_10_08_145025_create_lephitruocba_table', 11),
(17, '2018_10_08_145259_create_lephitruocbactdf_table', 11),
(18, '2018_10_08_145835_create_nhomlephitruocba_table', 11),
(19, '2018_10_08_154301_create_lephitruocbact_table', 12),
(20, '2018_10_09_135927_create_giathuedatnuoc_table', 13),
(21, '2018_10_09_135940_create_giathuedatnuocctdf_table', 13),
(22, '2018_10_09_135950_create_giathuedatnuocct_table', 13),
(24, '2018_10_10_095952_create_dmgiarung_table', 14),
(25, '2018_10_10_101838_create_giarung_table', 15),
(26, '2018_10_10_102400_create_giarungctdf_table', 16),
(27, '2018_10_10_141136_create_giarungct_table', 17),
(28, '2018_10_10_151535_create_nhomthuetn_table', 18),
(29, '2018_10_10_152849_create_dmthuetn_table', 19),
(30, '2018_10_11_104332_create_thuetainguyen_table', 20),
(31, '2018_10_11_123305_create_thuetainguyenctdf_table', 21),
(32, '2018_10_11_150409_create_thuetainguyenct_table', 22),
(33, '2018_10_12_093605_create_nhomdvkcb_table', 23),
(34, '2018_10_12_095823_create_dmdvkcb_table', 24),
(35, '2018_10_12_104557_create_dvkcb_table', 25),
(36, '2018_10_12_105151_create_dvkcbctdf_table', 26),
(37, '2018_10_12_123706_create_dvkcbct_table', 27),
(38, '2018_10_13_092848_create_register_table', 28),
(39, '2018_10_13_103856_create_company_table', 29),
(40, '2018_10_15_102631_create_ttdntd_table', 30),
(41, '2018_10_15_150722_create_cskddvlt_table', 31),
(42, '2018_10_15_152805_create_kkgiadvlt_table', 32),
(43, '2018_10_16_085916_create_dtapdungdvlt_table', 33),
(45, '2018_10_16_094818_create_kkgiadvltctdf_table', 34),
(46, '2018_10_16_110239_create_kkgiadvltct_table', 35),
(47, '2018_10_17_091729_create_ttngaynghile_table', 36),
(48, '2018_10_18_094133_create_nhomhhdvk_table', 37),
(49, '2018_10_18_100022_create_dmhhdvk_table', 38),
(50, '2018_10_18_102622_create_giahhdvk_table', 39),
(51, '2018_10_18_103443_create_giahhdvkctdf_table', 39),
(52, '2018_10_18_111812_create_giahhdvkct_table', 40);

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

--
-- Dumping data for table `nhomdvkcb`
--

INSERT INTO `nhomdvkcb` (`id`, `manhom`, `tennhom`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'Dịch vụ khám bệnh', 'TD', '2018-10-12 02:50:15', '2018-10-12 02:50:15'),
(2, '02', 'Dịch vụ ngày giường bệnh', 'TD', '2018-10-12 02:52:56', '2018-10-12 02:52:56'),
(3, '03', 'Dịch vụ kỹ thuật và xét nghiệm', 'TD', '2018-10-12 02:53:33', '2018-10-12 02:53:33'),
(4, '01', 'Sách giáo khoa', 'TD', '2018-10-18 02:55:43', '2018-10-18 02:55:43');

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
(1, '01', 'Sách giáo khoa', 'TD', '2018-10-18 02:56:27', '2018-10-18 02:59:01'),
(2, 'VLXD', 'Vật liệu xây dựng', 'TD', '2018-10-18 07:02:11', '2018-10-18 07:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `nhomlephitruocba`
--

CREATE TABLE `nhomlephitruocba` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhomxe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomlephitruocba`
--

INSERT INTO `nhomlephitruocba` (`id`, `manhom`, `nhomxe`, `created_at`, `updated_at`) VALUES
(1, 'OTONKD9', 'Ôtô 9 chỗ ngồi trở xuống nhập khẩu', '2018-10-08 08:23:00', '2018-10-08 08:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `nhomthuetn`
--

CREATE TABLE `nhomthuetn` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomthuetn`
--

INSERT INTO `nhomthuetn` (`id`, `manhom`, `tennhom`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '01', 'KHOÁNG SẢN KIM LOẠI', '1', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '02', 'KHOÁNG SẢN KHÔNG KIM LOẠI (THAN,ĐÁ)', '2', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '03', 'KHOÁNG SẢN KHÔNG KIM LOẠI (GỖ)', '3', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '04', 'HẢI SẢN TỰ NHIÊN', '4', 'TD', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '05', 'NƯỚC THIÊN NHIÊN', '5', 'TD', '0000-00-00 00:00:00', '2018-10-10 09:20:33'),
(6, '06', 'YẾN SÀO THIÊN NHIÊN', '6', 'KTD', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `settingdvvt` text COLLATE utf8_unicode_ci,
  `vtxk` double NOT NULL DEFAULT '0',
  `vtxb` double NOT NULL DEFAULT '0',
  `vtxtx` double NOT NULL DEFAULT '0',
  `vtch` double NOT NULL DEFAULT '0',
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

--
-- Dumping data for table `thamdinhgia`
--

INSERT INTO `thamdinhgia` (`id`, `diadiem`, `thoidiem`, `ppthamdinh`, `mucdich`, `dvyeucau`, `thoihan`, `sotbkl`, `hosotdgia`, `nguonvon`, `phanloai`, `trangthai`, `quy`, `mahuyen`, `maxa`, `mahs`, `thuevat`, `songaykq`, `filedk`, `filedk1`, `filedk2`, `filedk3`, `filedk4`, `created_at`, `updated_at`) VALUES
(1, 'a', '2018-10-06', 'a', 'a', 'a', '2018-11-25', 'ád', 'a', 'Cả hai', NULL, 'CB', NULL, NULL, 'PTCQCG', 'PTCQCG1538813755', 'Giá bao gồm thuế VAT', '50', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:15:55', '2018-10-08 03:27:45'),
(5, 'sa', '2018-10-06', 'a', 'a', 'a', '2018-10-16', 'a', 'a', 'Cả hai', NULL, 'HHT', NULL, NULL, 'PTCQCG', 'PTCQCG1538814223', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:23:43', '2018-10-10 04:14:37'),
(6, 'a', '2018-10-06', 'a', 'a', 'a', '2018-10-16', 'a', 'a', 'Cả hai', NULL, 'CHT', '4', NULL, 'PTCQCG', 'PTCQCG1538815994', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:53:14', '2018-10-08 02:10:52');

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

--
-- Dumping data for table `thamdinhgiact`
--

INSERT INTO `thamdinhgiact` (`id`, `tents`, `dacdiempl`, `thongsokt`, `nguongoc`, `dvt`, `sl`, `nguyengiadenghi`, `giadenghi`, `nguyengiathamdinh`, `giatritstd`, `giaththamdinh`, `giakththamdinh`, `gc`, `mahs`, `created_at`, `updated_at`) VALUES
(3, 'a', 'a', 'a', 'a', 'a', 1, 50000, 5, 60000, 60000, 5, 0, '', 'PTCQCG1538814223', '2018-10-06 08:23:43', '2018-10-10 04:14:59'),
(4, 'Máy tính để bàn', '', 'Corei5- ram8G-HDD1TB', '', 'chiếc', 2, 5000000, 10000000, 6000000, 12000000, 10000000, 0, '', 'PTCQCG1538815994', '2018-10-06 08:53:14', '2018-10-06 08:53:14');

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

--
-- Dumping data for table `thamdinhgiactdf`
--

INSERT INTO `thamdinhgiactdf` (`id`, `tents`, `dacdiempl`, `thongsokt`, `nguongoc`, `dvt`, `sl`, `nguyengiadenghi`, `giadenghi`, `nguyengiathamdinh`, `giatritstd`, `giaththamdinh`, `giakththamdinh`, `gc`, `mahuyen`, `maxa`, `created_at`, `updated_at`) VALUES
(1, 'a', 'A', 'a', 'A', 'A', 1, 3000, 3000, 35000, 35000, 3000, 0, 'A', NULL, 'PTCQHBT', '2018-10-06 03:54:03', '2018-10-06 04:26:24'),
(2, 'b', '', '', '', '', 1, 0, 0, 0, 0, 0, 0, '', NULL, 'PTCQHBT', '2018-10-06 03:54:12', '2018-10-06 03:54:12'),
(3, 'c', 'đặc điểm', 'thông số', 'nguồn gốc', 'đơn vị tính', 2, 10000, 20000, 30000, 60000, 20000, 0, 'Ghi chú', NULL, 'PTCQHBT', '2018-10-06 03:58:00', '2018-10-06 03:58:00'),
(4, 'D', 'D', 'D', 'D', 'D', 3, 10000, 30000, 20000, 60000, 30000, 0, 'D', NULL, 'PTCQHBT', '2018-10-06 04:17:30', '2018-10-06 04:25:21'),
(9, 'Máy tính xách tay', 'Xách tay', 'CoreI5-Ram 2G', '', 'chiếc', 2, 70000, 140000, 750000, 1500000, 140000, 0, '', NULL, NULL, '2018-10-08 01:57:52', '2018-10-08 01:57:52'),
(10, 'Máy tính xách tay', 'Xách tay', 'CoreI5-Ram 2G', '', 'chiếc', 2, 70000, 140000, 750000, 1500000, 140000, 0, '', NULL, NULL, '2018-10-08 01:57:54', '2018-10-08 01:57:54'),
(11, 'Máy tính xách tay', 'Xách tay', 'CoreI5-Ram 2G', '', 'chiếc', 2, 70000, 140000, 750000, 1500000, 140000, 0, '', NULL, NULL, '2018-10-08 01:58:16', '2018-10-08 01:58:16');

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

--
-- Dumping data for table `thuetainguyen`
--

INSERT INTO `thuetainguyen` (`id`, `mahs`, `ngayapdung`, `maxa`, `mahuyen`, `district`, `soqd`, `ghichu`, `manhom`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'QCG1539246116', '2018-10-11', NULL, NULL, 'QCG', 'Số 2018/QĐ-BTC ngày 09/10/2017', 'Ghi chú', '01', 'CB', '2018-10-11 08:21:56', '2018-10-11 08:50:52');

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

--
-- Dumping data for table `thuetainguyenct`
--

INSERT INTO `thuetainguyenct` (`id`, `mahs`, `maxa`, `mahuyen`, `district`, `manhom`, `magoc`, `mahh`, `capdo`, `tenhh`, `dvt`, `giatttn`, `created_at`, `updated_at`) VALUES
(1, 'QCG1539246116', NULL, NULL, NULL, '01', '01', 'I', '1', 'Khoáng sản kim loại', '', NULL, '2018-10-11 08:21:56', '2018-10-11 08:21:56'),
(2, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I1', '2', 'Sắt', '', NULL, '2018-10-11 08:21:56', '2018-10-11 08:21:56'),
(3, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1', 'I101', '3', 'Sắt kim loại', 'tấn', '1115000', '2018-10-11 08:21:56', '2018-10-11 08:32:16'),
(4, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1', 'I102', '3', 'Quặng Manhetit (có từ tính)', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(5, 'QCG1539246116', NULL, NULL, NULL, '01', 'I102', 'I10201', '4', 'Quặng Manhetit có hàm lượng Fe<30%', 'tấn', '5000000', '2018-10-11 08:21:57', '2018-10-11 08:28:46'),
(6, 'QCG1539246116', NULL, NULL, NULL, '01', 'I102', 'I10202', '4', 'Quặng Manhetit có hàm lượng 30%≤Fe<40%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(7, 'QCG1539246116', NULL, NULL, NULL, '01', 'I102', 'I10203', '4', 'Quặng Manhetit có hàm lượng 40%≤Fe<50%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(8, 'QCG1539246116', NULL, NULL, NULL, '01', 'I102', 'I10204', '4', 'Quặng Manhetit có hàm lượng 50%≤Fe<60%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(9, 'QCG1539246116', NULL, NULL, NULL, '01', 'I102', 'I10205', '4', 'Quặng Manhetit có hàm lượng Fe≥60%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(10, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1', 'I103', '3', 'Quặng Limonit (không từ tính)', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(11, 'QCG1539246116', NULL, NULL, NULL, '01', 'I103', 'I10301', '4', 'Quặng limonit có hàm lượng Fe≤30%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(12, 'QCG1539246116', NULL, NULL, NULL, '01', 'I103', 'I10302', '4', 'Quặng limonit có hàm lượng 30%<Fe≤40%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(13, 'QCG1539246116', NULL, NULL, NULL, '01', 'I103', 'I10303', '4', 'Quặng limonit có hàm lượng 40%<Fe≤50%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(14, 'QCG1539246116', NULL, NULL, NULL, '01', 'I103', 'I10304', '4', 'Quặng limonit có hàm lượng 50%<Fe≤60%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(15, 'QCG1539246116', NULL, NULL, NULL, '01', 'I103', 'I10305', '4', 'Quặng limonit có hàm lượng Fe>60%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(16, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1', 'I104', '3', 'Quặng sắt Deluvi', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(17, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I2', '2', 'Mangan (Măng-gan)', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(18, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I201', '3', 'Quặng mangan có hàm lượng Mn≤20%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(19, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I202', '3', 'Quặng mangan có hàm lượng 20%<Mn≤25%', 'tân', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(20, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I203', '3', 'Quặng mangan có hàm lượng 25%<Mn≤30%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(21, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I204', '3', 'Quặng mangan có hàm lượng 30<Mn≤35%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(22, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I205', '3', 'Quặng mangan có hàm lượng 35%<Mn≤40%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(23, 'QCG1539246116', NULL, NULL, NULL, '01', 'I2', 'I206', '3', 'Quặng mangan có hàm lượng Mn>40%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(24, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I3', '2', 'Titan', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(25, 'QCG1539246116', NULL, NULL, NULL, '01', 'I3', 'I301', '3', 'Quặng titan gốc (ilmenit)', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(26, 'QCG1539246116', NULL, NULL, NULL, '01', 'I301', 'I30101', '4', 'Quặng gốc titan có hàm lượng TiO2≤10%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(27, 'QCG1539246116', NULL, NULL, NULL, '01', 'I301', 'I30102', '4', 'Quặng gốc titan có hàm lượng 10%<TiO2≤15%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(28, 'QCG1539246116', NULL, NULL, NULL, '01', 'I301', 'I30103', '4', 'Quặng gốc titan có hàm lượng 15%<TiO2≤20%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(29, 'QCG1539246116', NULL, NULL, NULL, '01', 'I301', 'I30104', '4', 'Quặng gốc titan có hàm lượng TiO2>20%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(30, 'QCG1539246116', NULL, NULL, NULL, '01', 'I3', 'I302', '3', 'Quặng titan sa khoáng', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(31, 'QCG1539246116', NULL, NULL, NULL, '01', 'I302', 'I30201', '4', 'Quặng Titan sa khoáng chưa qua tuyển tách', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(32, 'QCG1539246116', NULL, NULL, NULL, '01', 'I302', 'I30202', '4', 'Titan sa khoáng đã qua tuyển tách (tinh quặng Titan)', '', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(33, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020201', '5', 'Ilmenit', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(34, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020202', '5', 'Quặng Zircon có hàm lượng ZrO2<65%', 'tấn', NULL, '2018-10-11 08:21:57', '2018-10-11 08:21:57'),
(35, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020203', '5', 'Quặng Zircon có hàm lượng ZrO2≥65%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(36, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020204', '5', 'Rutil', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(37, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020205', '5', 'Monazite', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(38, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020206', '5', 'Manhectic', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(39, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020207', '5', 'Xi titan', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(40, 'QCG1539246116', NULL, NULL, NULL, '01', 'I30202', 'I3020208', '5', 'Các sản phẩm còn lại', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(41, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I4', '2', 'Vàng', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(42, 'QCG1539246116', NULL, NULL, NULL, '01', 'I4', 'I401', '3', 'Quặng vàng gốc', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(43, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40101', '4', 'Quặng vàng có hàm lượng Au<2 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(44, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40102', '4', 'Quặng vàng có hàm lượng 2≤Au<3 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(45, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40103', '4', 'Quặng vàng có hàm lượng 3≤Au<4 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(46, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40104', '4', 'Quặng vàng có hàm lượng 4≤Au<5 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(47, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40105', '4', 'Quặng vàng có hàm lượng 5≤Au<6 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(48, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40106', '4', 'Quặng vàng có hàm lượng 6≤Au<7 gram/tẩn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(49, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40107', '4', 'Quặng vàng có hàm lượng 7≤Au<8 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(50, 'QCG1539246116', NULL, NULL, NULL, '01', 'I401', 'I40108', '4', 'Quặng vàng có hàm lượng Au≥8 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(51, 'QCG1539246116', NULL, NULL, NULL, '01', 'I4', 'I402', '3', 'Vàng kim loại (vàng cốm);', 'kg', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(52, 'QCG1539246116', NULL, NULL, NULL, '01', 'I4', 'I403', '3', 'Tinh quặng vàng', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(53, 'QCG1539246116', NULL, NULL, NULL, '01', 'I403', 'I40301', '4', 'Tinh quặng vàng có hàm lượng 82<Au≤240 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(54, 'QCG1539246116', NULL, NULL, NULL, '01', 'I403', 'I40302', '4', 'Tinh quặng vàng có hàm lượng Au>240 gram/tấn', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(55, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I5', '2', 'Đất hiếm', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(56, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I501', '3', 'Quặng đất hiếm về hàm lượng TR203≤1%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(57, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I502', '3', 'Quặng đất hiếm có hàm lượng 1%<TR203≤2%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(58, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I503', '3', 'Quặng đất hiếm có hàm lượng 2%<TR203≤3%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(59, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I504', '3', 'Quặng đất hiểm có hàm lượng 3%<TR203≤4%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(60, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I505', '3', 'Quặng đất hiếm có hàm tượng 4%<TR203≤5%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(61, 'QCG1539246116', NULL, NULL, NULL, '01', 'I5', 'I506', '3', 'Quặng đất hiếm có hàm lượng 5%<TR203≤10%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(62, 'QCG1539246116', NULL, NULL, NULL, '01', '15', '1507', '3', 'Quặng đất hiểm có hàm lượng >10% TR203', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(63, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I6', '2', 'Bạch kim, bạc, thiếc', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(64, 'QCG1539246116', NULL, NULL, NULL, '01', 'I6', 'I601', '3', 'Bạch kim', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(65, 'QCG1539246116', NULL, NULL, NULL, '01', 'I6', 'I602', '3', 'Bạc kim loại', 'kg', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(66, 'QCG1539246116', NULL, NULL, NULL, '01', 'I6', 'I603', '3', 'Thiếc', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(67, 'QCG1539246116', NULL, NULL, NULL, '01', 'I603', 'I60301', '4', 'Quặng thiếc gốc', '', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(68, 'QCG1539246116', NULL, NULL, NULL, '01', 'I60301', 'I6030101', '5', 'Quặng thiếc gốc có hàm lượng 0,2%<SnO2≤0,4%', 'tấn', NULL, '2018-10-11 08:21:58', '2018-10-11 08:21:58'),
(69, 'QCG1539246116', NULL, NULL, NULL, '01', 'I60301', 'I6030102', '5', 'Quặng thiếc gốc có hàm lượng 0,4%<SnO2<0,6%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(70, 'QCG1539246116', NULL, NULL, NULL, '01', 'I60301', 'I6030103', '5', 'Quặng thiếc gốc có hàm lượng 0,6%<SnO2≤0,8%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(71, 'QCG1539246116', NULL, NULL, NULL, '01', 'I60301', 'I6030104', '5', 'Quặng thiếc gốc có hàm lượng 0,8%<SnO2≤1%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(72, 'QCG1539246116', NULL, NULL, NULL, '01', 'I60301', 'I6030105', '5', 'Quặng thiếc gốc có hàm lượng SnO2>1%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(73, 'QCG1539246116', NULL, NULL, NULL, '01', 'I603', 'I60302', '4', 'Tinh quặng thiếc có hàm lượng SnO2≥70% (sa khoáng, quặng gốc)', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(74, 'QCG1539246116', NULL, NULL, NULL, '01', 'I603', 'I60303', '4', 'Thiếc kim loại', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(75, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I7', '2', 'Wolfram, Antimoan', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(76, 'QCG1539246116', NULL, NULL, NULL, '01', 'I7', 'I701', '3', 'Wolfram', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(77, 'QCG1539246116', NULL, NULL, NULL, '01', 'I701', 'I70101', '4', 'Quặng wolfram có hàm lượng 0,1%<WO3≤0,3%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(78, 'QCG1539246116', NULL, NULL, NULL, '01', 'I701', 'I70102', '4', 'Quặng wolfram có hàm lượng 0,3%<WO3≤0,5%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(79, 'QCG1539246116', NULL, NULL, NULL, '01', 'I701', 'I70103', '4', 'Quặng wolfram có hàm lượng 0,5%<WO3≤0,7%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(80, 'QCG1539246116', NULL, NULL, NULL, '01', 'I701', 'I70104', '4', 'Quặng wolfram có hàm lượng 0,7%<WO3≤1%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(81, 'QCG1539246116', NULL, NULL, NULL, '01', 'I701', 'I70105', '4', 'Quặng wolfram có hàm lượng WO3>1%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(82, 'QCG1539246116', NULL, NULL, NULL, '01', 'I7', 'I702', '3', 'Antimoan', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(83, 'QCG1539246116', NULL, NULL, NULL, '01', 'I702', 'I70201', '4', 'Antimoan kim loại', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(84, 'QCG1539246116', NULL, NULL, NULL, '01', 'I702', 'I70202', '4', 'Quặng Antimoan', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(85, 'QCG1539246116', NULL, NULL, NULL, '01', 'I70202', 'I7020201', '5', 'Quặng antimon có hàm lượng Sb<5%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(86, 'QCG1539246116', NULL, NULL, NULL, '01', 'I70202', 'I7020202', '5', 'Quặng antimon có hàm lượng 5≤Sb<10%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(87, 'QCG1539246116', NULL, NULL, NULL, '01', 'I70202', 'I7020203', '5', 'Quặng antimon có hàm lượng 10%<Sb≤15%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(88, 'QCG1539246116', NULL, NULL, NULL, '01', 'I70202', 'I7020204', '5', 'Quăng antimon có hàm lượng 15%<Sb≤0%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(89, 'QCG1539246116', NULL, NULL, NULL, '01', 'I70202', 'I7020205', '5', 'Quăng antimon có hàm lượng Sb>20%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(90, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I8', '2', 'Chì, kẽm', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(91, 'QCG1539246116', NULL, NULL, NULL, '01', 'I8', 'I801', '3', 'Chì, kẽm kim loại', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(92, 'QCG1539246116', NULL, NULL, NULL, '01', 'I8', 'I802', '3', 'Tinh quặng chì, kẽm', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(93, 'QCG1539246116', NULL, NULL, NULL, '01', 'I802', 'I80201', '4', 'Tinh quặng chì', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(94, 'QCG1539246116', NULL, NULL, NULL, '01', 'I80201', 'I8020101', '5', 'Tinh quặng chì có hàm lượng Pb<50%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(95, 'QCG1539246116', NULL, NULL, NULL, '01', 'I80201', 'I8020102', '5', 'Tinh quặng chì có hàm lượng Pb≥50%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(96, 'QCG1539246116', NULL, NULL, NULL, '01', 'I802', 'I80202', '4', 'Tinh quặng kẽm', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(97, 'QCG1539246116', NULL, NULL, NULL, '01', 'I80202', 'I8020201', '5', 'Tinh quặng kẽm có hàm lượng Zn<50%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(98, 'QCG1539246116', NULL, NULL, NULL, '01', 'I80202', 'I8020202', '5', 'Tinh quặng kẽm có hàm lượng Zn≥50%', 'tấn', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(99, 'QCG1539246116', NULL, NULL, NULL, '01', 'I8', 'I803', '3', 'Quặng chì, kẽm', '', NULL, '2018-10-11 08:21:59', '2018-10-11 08:21:59'),
(100, 'QCG1539246116', NULL, NULL, NULL, '01', 'I803', 'I80301', '4', 'Quặng chì + kẽm hàm lượng Pb+Zn<5%', 'Tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(101, 'QCG1539246116', NULL, NULL, NULL, '01', 'I803', 'I80302', '4', 'Quặng chì + kẽm hàm lượng 5%<Pb+Zn<10%', 'Tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(102, 'QCG1539246116', NULL, NULL, NULL, '01', 'I803', 'I80303', '4', 'Quặng chì + kẽm hàm lượng 10%<Pb+Zn<15%', 'Tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(103, 'QCG1539246116', NULL, NULL, NULL, '01', 'I803', 'I80304', '4', 'Quặng chì + kẽm hàm lượng Pb+Zn>15%', 'Tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(104, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I9', '2', 'Nhôm, Bauxit', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(105, 'QCG1539246116', NULL, NULL, NULL, '01', 'I9', 'I901', '3', 'Quặng bauxit trầm tích', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(106, 'QCG1539246116', NULL, NULL, NULL, '01', 'I9', 'I902', '3', 'Quặng bauxit laterit', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(107, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I10', '2', 'Đồng', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(108, 'QCG1539246116', NULL, NULL, NULL, '01', 'I10', 'I1001', '3', 'Quặng đồng', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(109, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1001', 'I100101', '4', 'Quặng đồng có hàm lượng Cu<0,5%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(110, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1002', 'I100102', '4', 'Quặng đồng có hàm lượng 0,5%≤Cu <1%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(111, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1003', 'I100103', '4', 'Quặng đồng có hàm lượng 1%≤Cu<2%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(112, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1004', 'I100104', '4', 'Quặng đồng có hàm lượng 2%≤Cu<3%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(113, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1005', 'I100105', '4', 'Quặng đồng có hàm lượng 3%≤Cu<4%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(114, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1006', 'I100106', '4', 'Quặng đồng có hàm lượng 4%≤Cu<5%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(115, 'QCG1539246116', NULL, NULL, NULL, '01', 'I1007', 'I100107', '4', 'Quặng đồng có hàm lượng Cu≥5%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(116, 'QCG1539246116', NULL, NULL, NULL, '01', 'I10', 'I1002', '3', 'Tinh quặng đồng có hàm lượng 18%≤Cu<20%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(117, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I11', '2', 'Nikel (Quặng Nikel)', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(118, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I12', '2', 'Cô-ban (coban), mô-Iip-đen (molipden), thủy ngân, ma-nhê (magie), va-na-đi (vanadi)', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(119, 'QCG1539246116', NULL, NULL, NULL, '01', 'I12', 'I1201', '3', 'Molipden', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(120, 'QCG1539246116', NULL, NULL, NULL, '01', 'I12', 'I1202', '3', 'Cô-ban (coban), thủy ngân, va-na-đi (vanadi)', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(121, 'QCG1539246116', NULL, NULL, NULL, '01', 'I', 'I13', '2', 'Khoáng sản kim loại khác', '', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(122, 'QCG1539246116', NULL, NULL, NULL, '01', 'I13', 'I1301', '3', 'Tinh quặng Bismuth hàm lượng 10%≤Bi<20%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00'),
(123, 'QCG1539246116', NULL, NULL, NULL, '01', 'I13', 'I1302', '3', 'Quặng Crôm hàm lượng Cr≥40%', 'tấn', NULL, '2018-10-11 08:22:00', '2018-10-11 08:22:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `town`
--

INSERT INTO `town` (`id`, `mahuyen`, `maxa`, `tendv`, `town`, `district`, `diachi`, `ttlienhe`, `emailql`, `emailqt`, `created_at`, `updated_at`) VALUES
(3, 'STCHN', 'PTCQCG', 'Phòng Tài Chính Quận Cầu Giấy', NULL, 'QCG', 'Quận Cầu Giấy - Thành Phố Hà Nội', '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2018-10-04 01:49:30', '2018-10-04 01:49:30'),
(4, 'STCHN', 'PTCQHBT', 'Phòng tài chính quận Hai Bà Trưng', NULL, 'QHBT', 'Quận Hai Bà Trưng - Thành Phố Hà Nội', '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2018-10-04 01:50:27', '2018-10-04 01:52:09');

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
-- Table structure for table `ttngaynghile`
--

CREATE TABLE `ttngaynghile` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaytu` date DEFAULT NULL,
  `ngayden` date DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `maxa`, `mahuyen`, `town`, `district`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `ttnguoitao`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trần', 'minhtran', '107e8cf7f2b4531f6b2ff06dbcf94e10', 'minhtranlife@gmail.com', 'Kích hoạt', NULL, NULL, NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Sở Tài Chính Hà Nội', 'stchanoi', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STCHN', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-04 01:47:12', '2018-10-04 01:47:12'),
(6, 'Phòng Tài Chính Quận Cầu Giấy', 'ptcquancaugiay', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCQCG', 'STCHN', NULL, 'QCG', 'X', NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-04 01:49:30', '2018-10-04 01:49:30'),
(7, 'Phòng tài chính quận Hai Bà Trưng', 'ptcquanhaibatrung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCQHBT', 'STCHN', NULL, 'QHBT', 'X', NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-04 01:50:27', '2018-10-04 01:50:27'),
(9, 'Công ty TNHH phát triển phần mềm Cuộc Sống', 'pmcuocsong', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '1234567890', 'PTCQHBT', NULL, NULL, 'DVLT', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 15/10/2018 09:43:46', '2018-10-15 02:43:46', '2018-10-15 02:43:46'),
(10, 'Công ty TNHH Thức ăn chăn nuôi', 'tnhhthucan', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '1234567890', 'PTCQHBT', NULL, NULL, 'TACN', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 17/10/2018 14:06:44', '2018-10-17 07:06:44', '2018-10-17 07:06:44'),
(11, 'Administrator', 'admin', 'fcea920f7412b5da7be0cf42b8c93759', 'minhtranlife@gmail.com', 'Kích hoạt', NULL, NULL, NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, '::1', 'EsH1kwkDuD4vYzG5eulr8WvBEb7oVN7WNMi8a0xy', '2018-10-02 01:41:11', '2018-10-02 01:41:11'),
(2, '::1', 'Wg3L2U3CJJJyYnxbCfMJ3obbT4mVMlFa41b9wtGh', '2018-10-02 12:44:02', '2018-10-02 12:44:02'),
(3, '::1', '8LV27pGloVmwzOn3aKhCDan9WXEpsmiYRxfEnPVA', '2018-10-04 01:18:55', '2018-10-04 01:18:55'),
(4, '::1', 'zKVYNuFovWAdnOOH84PoH9xnwDLrofseA1dDB9wZ', '2018-10-05 01:14:48', '2018-10-05 01:14:48'),
(5, '::1', 'DFAKkNmPSyxAG8LZXgMAfrnKn6J8wtsMdEfZruH2', '2018-10-06 01:47:02', '2018-10-06 01:47:02'),
(6, '::1', 'maUjfbTQJbevwn11N5KfLGcUfImph2GarnMLBTMC', '2018-10-06 02:56:26', '2018-10-06 02:56:26'),
(7, '::1', 'OofGf7TH12O9U8JpdKQBVYDwKtuT1b2dl8AiGHSc', '2018-10-08 02:18:39', '2018-10-08 02:18:39'),
(8, '::1', 'hzsUuJAIjTRZEfHJxEuK07RchKYrmYg09TRRKWjf', '2018-10-08 06:37:56', '2018-10-08 06:37:56'),
(9, '::1', 'zlbYv0J8SHoP1iggDzdMEGrAXRlJExtwX4T64jF0', '2018-10-09 01:51:11', '2018-10-09 01:51:11'),
(10, '::1', 'YXmq1KkUjFWxLpIlGCnUmiaUJ7HQr5Nv4VxgbIcg', '2018-10-10 02:12:18', '2018-10-10 02:12:18'),
(11, '::1', 'FUlejCLRsPcuOyPkwPS2kGmmOE1WPQwq7ZfS1WGT', '2018-10-12 02:26:38', '2018-10-12 02:26:38'),
(12, '::1', 'wbQ8X3iZ4iE5MLxgijiwso5WhcYuVDf4Q5djnuXa', '2018-10-13 02:01:49', '2018-10-13 02:01:49'),
(13, '127.0.0.1', '9dbfHObYRHFt7nEpEkx1YvNxqgma1TgWYW1jTUfd', '2018-10-15 01:56:43', '2018-10-15 01:56:43'),
(14, '::1', '9dbfHObYRHFt7nEpEkx1YvNxqgma1TgWYW1jTUfd', '2018-10-15 02:25:24', '2018-10-15 02:25:24'),
(15, '::1', 'kiJMssxwzvP0iW2k7bJiS7u91Lu1o3T3p5Sjq0zH', '2018-10-15 02:44:20', '2018-10-15 02:44:20'),
(16, '::1', 'VS9nXW7PrQ4OI5OkO0ENOfjwYuXuluCMovW71wEM', '2018-10-15 03:40:12', '2018-10-15 03:40:12'),
(17, '::1', '9HfYEj83ZLGoyLB4biDg4tVQkoPNv6AHzzA3E8WE', '2018-10-15 07:08:36', '2018-10-15 07:08:36'),
(18, '::1', 'YUWkqIvA5BtjCtACpyMJh95mWZO7G0ZWC7D6Opfb', '2018-10-15 07:21:15', '2018-10-15 07:21:15'),
(19, '::1', 'C3xE9nJXukRAMI7a3yqYHgQRA62WXVSEbblHScZE', '2018-10-16 01:52:18', '2018-10-16 01:52:18'),
(20, '::1', 'jKVHxqa70KQWVAOlUegTzJcSaOAIfGyv7sShmLRM', '2018-10-16 07:12:48', '2018-10-16 07:12:48'),
(21, '::1', '4qimHDLpLKdPHtcuhOPltBDHjZdfxRBHDH17wuiN', '2018-10-17 01:50:12', '2018-10-17 01:50:12'),
(22, '::1', '3PqhNE4F0zlxOr1vfggbpo1kD7GbkeHR9uzD0tM6', '2018-10-17 03:00:39', '2018-10-17 03:00:39'),
(23, '::1', '1Os3xnKLrSFfUqOESSE37nRaAMHfYbfR9CXaNYGj', '2018-10-18 02:22:37', '2018-10-18 02:22:37');

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
-- Indexes for table `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmgiarung`
--
ALTER TABLE `dmgiarung`
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
-- Indexes for table `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmthuetn`
--
ALTER TABLE `dmthuetn`
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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `ttngaynghile`
--
ALTER TABLE `ttngaynghile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `binhongiact`
--
ALTER TABLE `binhongiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `binhongiactdf`
--
ALTER TABLE `binhongiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diabanhd`
--
ALTER TABLE `diabanhd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `dmgiarung`
--
ALTER TABLE `dmgiarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dmhhdvk`
--
ALTER TABLE `dmhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dmthuetn`
--
ALTER TABLE `dmthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;
--
-- AUTO_INCREMENT for table `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dvkcb`
--
ALTER TABLE `dvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dvkcbct`
--
ALTER TABLE `dvkcbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `giahhdvk`
--
ALTER TABLE `giahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `giarung`
--
ALTER TABLE `giarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `giarungct`
--
ALTER TABLE `giarungct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `giarungctdf`
--
ALTER TABLE `giarungctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kkgiadvlt`
--
ALTER TABLE `kkgiadvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lephitruocba`
--
ALTER TABLE `lephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `lephitruocbactdf`
--
ALTER TABLE `lephitruocbactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `nhomdvkcb`
--
ALTER TABLE `nhomdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thamdinhgia`
--
ALTER TABLE `thamdinhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `thuetainguyen`
--
ALTER TABLE `thuetainguyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `town`
--
ALTER TABLE `town`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ttdntd`
--
ALTER TABLE `ttdntd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ttngaynghile`
--
ALTER TABLE `ttngaynghile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `viewpage`
--
ALTER TABLE `viewpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
