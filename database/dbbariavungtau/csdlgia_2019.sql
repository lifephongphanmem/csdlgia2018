-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 24, 2019 lúc 03:16 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdlgia_2019`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bannhataidinhcu`
--

CREATE TABLE `bannhataidinhcu` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiathuemua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiemkc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiemht` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bannhataidinhcu`
--

INSERT INTO `bannhataidinhcu` (`id`, `district`, `manhom`, `tenduan`, `mota`, `dientich`, `dvt`, `dongiathuemua`, `dongiaban`, `thoidiemkc`, `thoidiemht`, `ttqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'TPBR', NULL, 'Dự án 1', NULL, NULL, NULL, '50000', '10000000', '2019-09-16', '2019-09-16', 'Số QD', 'ghi chú', NULL, '2019-09-16 03:27:39', '2019-09-16 03:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhongia`
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
-- Cấu trúc bảng cho bảng `binhongiact`
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
-- Cấu trúc bảng cho bảng `binhongiactdf`
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
-- Cấu trúc bảng cho bảng `chisogiatieudung`
--

CREATE TABLE `chisogiatieudung` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinbc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybaocao` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
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
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
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
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`id`, `maxa`, `mahuyen`, `tendn`, `diachi`, `tel`, `fax`, `email`, `diadanh`, `chucdanh`, `nguoiky`, `noidknopthue`, `ghichu`, `trangthai`, `tailieu`, `giayphepkd`, `level`, `avatar`, `pl`, `mahs`, `settingdvvt`, `vtxk`, `vtxb`, `vtxtx`, `vtch`, `loaihinhhd`, `xangdau`, `dien`, `khidau`, `phan`, `thuocbvtv`, `vacxingsgc`, `muoi`, `suate6t`, `duong`, `thocgao`, `thuocpcb`, `created_at`, `updated_at`) VALUES
(1, '09876543', NULL, 'Doanh nghiệp TPCNTE', 'Thành phố Cao Bằng', '09876543', '09876543', 'minhtranlife@gmail.com', 'Cao Bằng', 'Giám đốc', 'Nguyễn Văn A', 'Chi cục thuế Tỉnh Bà Rịa Vũng Tàu', NULL, 'Chưa kích hoạt', '09876543.txt', '09876543', NULL, NULL, NULL, '1568086056', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:29:14', '2019-09-10 03:29:14'),
(2, '12344566', NULL, 'Doanh nghiệp TPCNTE', 'Thành phố Cao Bằng', '09876543', '09876543', 'minhtranlife@gmail.com', 'Cao Bằng', 'Giám đốc', 'Nguyễn Văn A', 'Chi cục thuế Tỉnh Bà Rịa Vũng Tàu', NULL, 'Chưa kích hoạt', '12344566.xls', '09876543', NULL, NULL, NULL, '1568086266', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:31:56', '2019-09-10 03:31:56'),
(3, 'uuuuu', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', 'uuuuu.PDF', 'dsadsa', NULL, NULL, NULL, '1568087359', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:50:48', '2019-09-10 03:50:48'),
(4, '21212121', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', '21212121.PDF', 'dsadsa', NULL, NULL, NULL, '1568087599', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:53:39', '2019-09-10 03:53:39'),
(5, '2121212112', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', '2121212112.PDF', 'dsadsa', NULL, NULL, NULL, '1568087682', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:55:04', '2019-09-10 03:55:04'),
(6, '21212121121', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', '21212121121.PDF', 'dsadsa', NULL, NULL, NULL, '1568087789', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:56:43', '2019-09-10 03:56:43'),
(7, '2121212112111', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', '2121212112111.PDF', 'dsadsa', NULL, NULL, NULL, '1568087904', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:58:50', '2019-09-10 03:58:50'),
(8, '21212121121111', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', '21212121121111.PDF', 'dsadsa', NULL, NULL, NULL, '1568087950', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 03:59:36', '2019-09-10 03:59:36'),
(9, 'abc', NULL, 'Doanh nghiêp Xăng dầu 01', '12121', '12121', '12121', 'minhtranlife@gmail.com', 'dsadsad', 'dsadsad', 'dsadsad', 'dsad', NULL, 'Chưa kích hoạt', 'abc.PDF', 'dsadsa', NULL, NULL, NULL, '1568087995', NULL, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019-09-10 04:00:14', '2019-09-10 04:00:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companylvcc`
--

CREATE TABLE `companylvcc` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manghe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `companylvcc`
--

INSERT INTO `companylvcc` (`id`, `mahs`, `maxa`, `manganh`, `manghe`, `mahuyen`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '1568085863', '09876543', 'BOG', 'XD', 'PTCKHTPVT', 'CXD', '2019-09-10 03:25:29', '2019-09-10 03:25:29'),
(2, '1568086056', '09876543', 'BOG', 'XD', 'PTCKHTPVT', 'XD', '2019-09-10 03:28:26', '2019-09-10 03:29:14'),
(3, '1568086266', '12344566', 'VLXD', 'VLXD', 'PVLXD', 'XD', '2019-09-10 03:31:30', '2019-09-10 03:31:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cskddvlt`
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
-- Cấu trúc bảng cho bảng `cungcapgia`
--

CREATE TABLE `cungcapgia` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `cungcapgiact`
--

CREATE TABLE `cungcapgiact` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahanghoa` text COLLATE utf8_unicode_ci,
  `tenhanghoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongsokt` text COLLATE utf8_unicode_ci,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cungcapgiactdf`
--

CREATE TABLE `cungcapgiactdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahanghoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhanghoa` text COLLATE utf8_unicode_ci,
  `thongsokt` text COLLATE utf8_unicode_ci,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugiadat`
--

CREATE TABLE `daugiadat` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdpagia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqddaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdgiakhoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdkqdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugiadat`
--

INSERT INTO `daugiadat` (`id`, `maxa`, `mahuyen`, `tenduan`, `thoidiem`, `dientich`, `soqdpagia`, `soqddaugia`, `soqdgiakhoidiem`, `soqdkqdaugia`, `mahs`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'TPBRPPT', 'TPBR', 'dự án đấu giá đất', '2019-09-19', '1000000', 'Số quyết định phê duyệt', 'Số QUyết định đấu giá', 'Số Quyết định phê duyệt giá', 'Số quyết định công nhận', '123456', 'HHT', '2019-09-19 07:21:29', '2019-09-20 03:58:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugiadatct`
--

CREATE TABLE `daugiadatct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaiduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakhoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugiadatct`
--

INSERT INTO `daugiadatct` (`id`, `mahs`, `loaidat`, `tenduong`, `loaiduong`, `vitri`, `qdgiadato`, `qdgiadattmdv`, `qdgiadatsxkd`, `qdgiadatnn`, `qdgiadatnuoits`, `qdgiadatmuoi`, `qdpddato`, `qdpddattmdv`, `qdpddatsxkd`, `qdpddatnn`, `qdpddatnuoits`, `qdpddatmuoi`, `giakhoidiem`, `giadaugia`, `created_at`, `updated_at`) VALUES
(1, '123456', 'Loại đất1', 'Tên đường2', 'Loại đường3', 'Vị trí4', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '2019-09-20 03:04:42', '2019-09-20 03:32:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugiadatctdf`
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
-- Cấu trúc bảng cho bảng `daugiadatts`
--

CREATE TABLE `daugiadatts` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `dientichdat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientichsanxd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdpagia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqddaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdgiakhoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqdkqdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugiadatts`
--

INSERT INTO `daugiadatts` (`id`, `mahuyen`, `maxa`, `tenduan`, `thoidiem`, `dientichdat`, `dientichsanxd`, `soqdpagia`, `soqddaugia`, `soqdgiakhoidiem`, `soqdkqdaugia`, `mahs`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'TPBR', 'TPBRPPT', 'dự án đấu giá đất và tài sản gắn liền đất', '2019-09-21', '10000', '12100', 'QD1', 'QD2', 'QD3', 'QD4', 'TPBR1569051734', 'HHT', '2019-09-21 07:42:14', '2019-09-21 07:59:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugiadattsct`
--

CREATE TABLE `daugiadattsct` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaiduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakhoidiemdat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giakhoidiemsanxd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadaugiadat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giadaugiasanxd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugiadattsct`
--

INSERT INTO `daugiadattsct` (`id`, `loaidat`, `tenduong`, `loaiduong`, `vitri`, `qdgiadato`, `qdgiadattmdv`, `qdgiadatsxkd`, `qdgiadatnn`, `qdgiadatnuoits`, `qdgiadatmuoi`, `qdpddato`, `qdpddattmdv`, `qdpddatsxkd`, `qdpddatnn`, `qdpddatnuoits`, `qdpddatmuoi`, `giakhoidiemdat`, `giakhoidiemsanxd`, `giadaugiadat`, `giadaugiasanxd`, `mahs`, `created_at`, `updated_at`) VALUES
(1, 'Loại đất', 'Tên đường', 'Loại đường', 'Vị trí', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', 'TPBR1569051734', '2019-09-21 08:13:13', '2019-09-21 08:13:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diabanhd`
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
-- Đang đổ dữ liệu cho bảng `diabanhd`
--

INSERT INTO `diabanhd` (`id`, `town`, `district`, `diaban`, `level`, `created_at`, `updated_at`) VALUES
(1, NULL, 'TPBR', 'Thành phố Bà Rịa', 'H', '2019-07-11 09:34:17', '2019-07-11 09:34:17'),
(2, NULL, 'TPVT', 'Thành phố Vũng Tàu', 'H', '2019-07-11 09:34:40', '2019-07-11 09:34:40'),
(3, NULL, 'HXM', 'Huyện Xuyên Mộc', 'H', '2019-07-11 09:34:56', '2019-07-11 09:34:56'),
(4, NULL, 'HLD', 'Huyện Long Điền', 'H', '2019-07-11 09:35:15', '2019-07-11 09:35:15'),
(5, NULL, 'HCD', 'Huyện Côn Đảo', 'H', '2019-07-11 09:35:37', '2019-07-11 09:35:37'),
(6, NULL, 'HTT', 'Huyện Tân Thành', 'H', '2019-07-11 09:35:54', '2019-07-11 09:35:54'),
(7, NULL, 'HCDU', 'Huyện Châu Đức', 'H', '2019-07-11 09:36:19', '2019-07-11 09:36:19'),
(8, NULL, 'HDD', 'Huyện Đất Đỏ', 'H', '2019-07-11 09:36:44', '2019-07-11 09:36:44'),
(9, 'TPBRPPT', 'TPBR', 'Phường Phước Trung', 'X', '2019-09-14 03:46:46', '2019-09-14 03:46:46'),
(10, 'TPVTP1', 'TPVT', 'Phường 1', 'X', '2019-09-18 08:14:03', '2019-09-18 08:14:03'),
(11, 'TPBRPPH', 'TPBR', 'Phường Phước Hiệp', 'X', '2019-09-23 01:56:35', '2019-09-23 01:56:35'),
(12, 'TPBRPPHU', 'TPBR', 'Phường Phước Hưng', 'X', '2019-09-23 01:56:58', '2019-09-23 02:05:18'),
(13, 'TPBRPPN', 'TPBR', 'Phường Phước Nguyên', 'X', '2019-09-23 01:57:41', '2019-09-23 01:57:41'),
(14, 'TPBRPLT', 'TPBR', 'Phường Long Tâm', 'X', '2019-09-23 01:58:07', '2019-09-23 01:58:07'),
(15, 'TPBRPLTO', 'TPBR', 'Phường Long Toàn', 'X', '2019-09-23 01:58:26', '2019-09-23 01:58:49'),
(16, 'TPBRPLH', 'TPBR', 'Phường Long Hương', 'X', '2019-09-23 02:01:38', '2019-09-23 02:01:38'),
(17, 'TPBRPKD', 'TPBR', 'Phường Kim Định', 'X', '2019-09-23 02:02:11', '2019-09-23 02:02:11'),
(18, 'TPBRXTH', 'TPBR', 'Xã Tân Hưng', 'X', '2019-09-23 02:02:38', '2019-09-23 02:02:38'),
(19, 'TPBRXHL', 'TPBR', 'Xã Hòa Long', 'X', '2019-09-23 02:03:07', '2019-09-23 02:03:07'),
(20, 'TPBRXLP', 'TPBR', 'Xã Long Phước', 'X', '2019-09-23 02:03:21', '2019-09-23 02:03:21'),
(21, 'TPVTP2', 'TPVT', 'Phường 2', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(22, 'TPVTP3', 'TPVT', 'Phường 3', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(23, 'TPVTP4', 'TPVT', 'Phường 4', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(24, 'TPVTP5', 'TPVT', 'Phường 5', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(25, 'TPVTP6', 'TPVT', 'Phường 6', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(26, 'TPVTP7', 'TPVT', 'Phường 7', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(27, 'TPVTP8', 'TPVT', 'Phường 8', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(28, 'TPVTP9', 'TPVT', 'Phường 9', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(29, 'TPVTP10', 'TPVT', 'Phường 10', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(30, 'TPVTP11', 'TPVT', 'Phường 11', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(31, 'TPVTP12', 'TPVT', 'Phường 12', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(32, 'TPVTPTT', 'TPVT', 'Phường Thắng Tam', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(33, 'TPVTPNAN', 'TPVT', 'Phường Nguyễn An Ninh', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(34, 'TPVTPTN', 'TPVT', 'Phường Thắng Nhất', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(35, 'TPVTPRD', 'TPVT', 'Phường Rạch Dừa', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(36, 'TPVTXLS', 'TPVT', 'Xã Long Sơn', 'X', '2019-09-23 02:07:55', '2019-09-23 02:07:55'),
(37, 'HXMTTPB', 'HXM', 'Thị Trấn Phước Bửu', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(38, 'HXMXTL', 'HXM', 'Xã Tân Lâm', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(39, 'HXMXBL', 'HXM', 'Xã Bàu Lâm', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(40, 'HXMXXM', 'HXM', 'Xã Xuyên Mộc', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(41, 'HXMXHH', 'HXM', 'Xã Hòa Hội', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(42, 'HXMXHHI', 'HXM', 'Xã Hòa Hiệp', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(43, 'HXMXBT', 'HXM', 'Xã Bông Trang', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(44, 'HXMXBR', 'HXM', 'Xã Bưng Riềng', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(45, 'HXMXBC', 'HXM', 'Xã Bình Châu', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(46, 'HXMXHB', 'HXM', 'Xã Hòa Bình', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(47, 'HXMXPT', 'HXM', 'Xã Phước Thuận', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(48, 'HXMXPTA', 'HXM', 'Xã Phước Tân', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(49, 'HXMXHHU', 'HXM', 'Xã Hòa Hưng', 'X', '2019-09-23 02:16:37', '2019-09-23 02:16:37'),
(50, 'HLDXAN', 'HLD', 'Xã An Nhứt', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(51, 'HLDXPT', 'HLD', 'Xã Phước Tỉnh', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(52, 'HLDXTP', 'HLD', 'Xã Tam Phước', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(53, 'HLDTTLH', 'HLD', 'Thị Trấn Long Hải', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(54, 'HLDTTLD', 'HLD', 'Thị Trấn Long Điền', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(55, 'HLDXPH', 'HLD', 'Xã Phước Hưng', 'X', '2019-09-23 02:24:32', '2019-09-23 02:24:32'),
(56, 'HTTXCP', 'HTT', 'Xã Châu Pha', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(57, 'HTTXTT', 'HTT', 'Xã Tóc Tiên', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(58, 'HTTXSX', 'HTT', 'Xã Sông Xoài', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(59, 'HTTXHD', 'HTT', 'Xã Hắc Dịch', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(60, 'HTTXTH', 'HTT', 'Xã Tân Hải', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(61, 'HTTXTHO', 'HTT', 'Xã Tân Hòa', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(62, 'HTTXPH', 'HTT', 'Xã Phước Hòa', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(63, 'HTTXMX', 'HTT', 'Xã Mỹ Xuân', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(64, 'HTTTTPM', 'HTT', 'Thị Trấn Phú Mỹ', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(65, 'HTTXTP', 'HTT', 'Xã Tân Phước', 'X', '2019-09-23 02:28:28', '2019-09-23 02:28:28'),
(66, 'HCDUXQT', 'HCDU', 'Xã Quảng Thành', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(67, 'HCDUXSN', 'HCDU', 'Xã Suối Nghệ', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(68, 'HCDUXDB', 'HCDU', 'Xã Đá Bạc', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(69, 'HCDUXXB', 'HCDU', 'Xã Xà Bang', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(70, 'HCDUXKL', 'HCDU', 'Xã Kim Long', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(71, 'HCDUTTNG', 'HCDU', 'Thị trấn Ngãi Giao', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(72, 'HCDUXBT', 'HCDU', 'Xã Bình Trung', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(73, 'HCDUXSB', 'HCDU', 'Xã Sơn Bình', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(74, 'HCDUXSR', 'HCDU', 'Xã Suối Rao', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(75, 'HCDUXCB', 'HCDU', 'Xã Cù Bị', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(76, 'HCDUXNT', 'HCDU', 'Xã Nghĩa Thành', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(77, 'HCDUXLL', 'HCDU', 'Xã Láng Lớn', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(78, 'HCDUXBC', 'HCDU', 'Xã Bàu Chinh', 'X', '2019-09-23 02:33:07', '2019-09-23 02:39:01'),
(79, 'HCDUXBG', 'HCDU', 'Xã Bình Giã', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(80, 'HCDUXBB', 'HCDU', 'Xã Bình Ba', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(81, 'HCDUXXS', 'HCDU', 'Xã Xuân Sơn', 'X', '2019-09-23 02:33:07', '2019-09-23 02:33:07'),
(82, 'HDDTTPH', 'HDD', 'Thị trấn Phước Hải', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(83, 'HDDXLA', 'HDD', ' Xã Lộc An', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(84, 'HDDXPH', 'HDD', 'Xã Phước Hội', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(85, 'HDDXLM', 'HDD', 'Xã Long Mỹ', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(86, 'HDDTTDD', 'HDD', 'Thị trấn Đất Đỏ', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(87, 'HDDXPLT', 'HDD', 'Xã Phước Long Thọ', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(88, 'HDDXLT', 'HDD', 'Xã Long Tân', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45'),
(89, 'HDDXLD', 'HDD', 'Xã Láng Dài', 'X', '2019-09-23 02:40:45', '2019-09-23 02:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
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
  `tendvhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendvcqhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `mahuyen`, `tendv`, `district`, `diachi`, `phanloaiql`, `ttlienhe`, `emailql`, `emailqt`, `tendvhienthi`, `tendvcqhienthi`, `created_at`, `updated_at`) VALUES
(1, 'STCBRVT', 'Sở tài chính tỉnh Bà Rịa- Vũng Tàu', NULL, 'Số 11 đường Trường Chinh, Phường Phước Trung, TP Bà Rịa, Tỉnh Bà Rịa Vũng Tàu', NULL, 'Điện thoại: 064.3852328, Fax: 064.3850162, Email: sotc@baria-vungtau.gov.vn', 'sotcbariavungtau@gmail.com', 'sotcbariavungtau@gmail.com', NULL, NULL, '2019-07-11 09:38:53', '2019-07-11 09:38:53'),
(2, 'UBNDTBRVT', 'UBND Tỉnh Bà Rịa -Vũng Tàu', NULL, 'SỐ 01 - PHẠM VĂN ĐỒNG - PHƯỜNG PHƯỚC TRUNG - THÀNH PHỐ BÀ RỊA - TỈNH BÀ RỊA - VŨNG TÀU', NULL, 'Điện thoại: (0254) 372.73.87 | E-mail: congthongtin@baria-vungtau.gov.vn', 'ubndtinhbariavungtau@gmail.com', 'ubndtinhbariavungtau@gmail.com', NULL, NULL, '2019-07-12 02:22:58', '2019-07-12 02:22:58'),
(3, 'SCTTBRVT', 'Sở Công Thương Tỉnh Bà Rịa - Vũng Tàu', NULL, 'Số 01 Phạm Văn Đồng, Phường Phước Trung, thành phố Bà Rịa, tỉnh Bà rịa – Vũng Tàu. ', NULL, 'Điện thoại: 0254 3542677 – Fax: 0254 3856344 – Email: soct@baria-vungtau.gov.vn ', 'socongthuongbariavungtau@gmail.com', 'socongthuongbariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:28:57', '2019-07-12 07:28:57'),
(4, 'SYTBRVT', 'Sở Y Tế Bà Rịa - Vũng Tàu', NULL, ' Số 01, đường Phạm Văn Đồng, phường Phước Trung, TP Bà Rịa, tỉnh Bà Rịa - Vũng Tàu ', NULL, 'Điện thoại: (0254) 3852652 - Fax: (0254) 3807182 ', 'soytebariavungtau@gmail.com', 'soytebariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:30:36', '2019-07-12 07:30:36'),
(5, 'SGDDTBRVT', 'Sở Giáo dục và đào tạo Bà Rịa - Vũng Tàu', NULL, 'Khối B3 trung tâm hành chính - chính trị tỉnh; Số 198 Bạch Đằng, P. Phước Trung, Tp. Bà Rịa, tỉnh Bà Rịa-Vũng Tàu', NULL, 'Điện Thoại:  02543541500 - Email: phongcntt.sobariavungtau@moet.edu.vn', 'sogiaoducdaotaobariavungtau@gmail.com', 'sogiaoducdaotaobariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:32:30', '2019-07-12 07:32:30'),
(6, 'SNNPTNNBRVT', 'Sở Nông nghiệp và phát triển nông thông Bà Rịa - Vũng Tàu', NULL, 'Số 9 Huỳnh Ngọc Hay, Phường Phước Hiệp, TP.Bà Rịa - tỉnh Bà Rịa - Vũng Tàu', NULL, 'Điện thoại: 02543 829891 Fax: 02543 731193 Email: sonnptnt@baria-vungtau.gov.vn', 'sonnptntbariavungtau@gmail.com', 'sonnptntbariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:35:04', '2019-07-12 07:35:04'),
(7, 'SXDBRVT', 'Sở Xây dựng Bà Rịa - Vũng Tàu', NULL, 'SỐ 01 - PHẠM VĂN ĐỒNG - P. PHƯỚC TRUNG - TP. BÀ RỊA', NULL, ' ĐT: 064. 3511680 - FAX: 064.3852234', 'soxaydungbariavungtau@gmail.com', 'soxaydungbariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:36:46', '2019-07-12 07:36:46'),
(8, 'STNMTBRVT', 'Sở Tài Nguyên và Môi trường Bà Rịa - Vũng Tàu', NULL, 'Số 1 đường Phạm Văn Đồng, phường Phước Trung, thành phố Bà Rịa ', NULL, 'Điện thoại: 0254.385.2539 - FAX: 0254.385.7876', 'sotainguyenmoitruongbariavungtau@gmail.com', 'sotainguyenmoitruongbariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:39:15', '2019-07-12 07:39:15'),
(9, 'SGTVTBRVT', 'Sở Giao thông vận tải Bà Rịa - Vũng Tàu', NULL, 'SỐ 198 - BẠCH ĐẰNG - P. PHƯỚC TRUNG - TP. BÀ RỊA - T. BRVT', NULL, 'Điện thoại: (84-254) 3727840 | Fax: (84-254) 3727828 | E-mail: sogtvt@baria-vungtau.gov.vn', 'sogiaothongvantaibariavungtau@gmail.com', 'sogiaothongvantaibariavungtau@gmail.com', NULL, NULL, '2019-07-12 07:41:27', '2019-07-12 07:41:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkgdoanhnghiep`
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
-- Cấu trúc bảng cho bảng `dkghoso`
--

CREATE TABLE `dkghoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `dkghosoct`
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
-- Cấu trúc bảng cho bảng `dkghosoctdf`
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
-- Cấu trúc bảng cho bảng `dmctthamdinhgiahh`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmdvkcb`
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
-- Cấu trúc bảng cho bảng `dmgiadatduan`
--

CREATE TABLE `dmgiadatduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhomduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhomduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmgiadatduan`
--

INSERT INTO `dmgiadatduan` (`id`, `manhomduan`, `tennhomduan`, `created_at`, `updated_at`) VALUES
(1, 'A', 'Các dự án giao đất', NULL, NULL),
(3, 'B', 'Các dự án thuê đất', NULL, NULL),
(4, 'C', 'Các dự án chuyển mục đich sử dụng đất', NULL, NULL),
(5, 'D', 'Các dự án bồi thường', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmgiadvgddt`
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
-- Cấu trúc bảng cho bảng `dmgiarung`
--

CREATE TABLE `dmgiarung` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmgiarung`
--

INSERT INTO `dmgiarung` (`id`, `manhom`, `tennhom`, `created_at`, `updated_at`) VALUES
(1, 'RTN', 'Rừng tự nhiên', '2018-10-10 03:05:48', '2018-10-10 03:05:48'),
(2, 'RTR', 'Rừng trồng', '2018-10-10 03:17:37', '2018-10-10 03:17:37'),
(3, 'RTHTGK', 'Rừng trồng theo hình thức giao khoán', '2018-10-10 03:17:58', '2018-10-10 03:17:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmgiathuemuanhaxh`
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
-- Cấu trúc bảng cho bảng `dmhanghoa`
--

CREATE TABLE `dmhanghoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahanghoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhanghoa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongsokt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmhanghoa_cpi`
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
-- Cấu trúc bảng cho bảng `dmhhdvk`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmmhbinhongia`
--

CREATE TABLE `dmmhbinhongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `mamh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenmh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dangkykekhai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmnganhkd`
--

CREATE TABLE `dmnganhkd` (
  `id` int(10) UNSIGNED NOT NULL,
  `manganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennganh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmnganhkd`
--

INSERT INTO `dmnganhkd` (`id`, `manganh`, `tennganh`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, 'BOG', 'Mặt hàng bình ổn giá', 'TD', NULL, NULL),
(2, 'VLXD', 'Vật liệu xây dựng', 'KTD', NULL, '2019-09-13 01:49:28'),
(3, 'XMTXD', 'Xi măng, thép xây dựng', 'TD', NULL, NULL),
(4, 'DVHDTMCK', 'Dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu', 'KTD', NULL, '2019-09-05 08:26:54'),
(5, 'THAN', 'Than', 'KTD', NULL, '2019-09-05 08:54:45'),
(6, 'TACN', 'Thức ăn chăn nuôi', 'TD', NULL, NULL),
(7, 'GIAY', 'Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước', 'KTD', NULL, '2019-09-05 09:03:04'),
(8, 'SACH', 'Sách giáo khoa', 'KTD', NULL, '2019-09-05 09:03:12'),
(9, 'ETANOL', 'Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)', 'TD', NULL, NULL),
(10, 'KCBTN', 'Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước', 'TD', NULL, NULL),
(11, 'TPCNTE6T', 'Thực phẩm chức năng cho trẻ em dưới 6 tuổi', 'TD', NULL, NULL),
(12, 'DVLT', 'Dịch vụ lưu trú', 'TD', NULL, NULL),
(13, 'DVVT', 'Dịch vụ vận tải', 'TD', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmnghekd`
--

CREATE TABLE `dmnghekd` (
  `id` int(10) UNSIGNED NOT NULL,
  `manganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manghe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennghe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmnghekd`
--

INSERT INTO `dmnghekd` (`id`, `manganh`, `manghe`, `tennghe`, `mahuyen`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, 'BOG', 'XD', 'Kê khai giá Xăng Dầu', 'STCBRVT', 'TD', NULL, '2019-09-05 08:50:33'),
(2, 'BOG', 'DBL', 'Kê khai giá Điện bán lẻ', 'STCBRVT', 'TD', NULL, '2019-09-05 08:50:44'),
(3, 'BOG', 'KDMHL', 'Kê khai giá Khí dầu mỏ hóa lỏng (LPG)', 'STCBRVT', 'TD', NULL, '2019-09-05 08:50:54'),
(4, 'BOG', 'PDURENPK', 'Kê khai giá Phân đạm urê; phân NPK', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:52:15'),
(5, 'BOG', 'TBVTV', 'Kê khai giá Thuốc bảo vệ thực vật, bao gồm: thuốc trừ sâu, thuốc trừ bệnh, thuốc trừ cỏ', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:52:31'),
(6, 'BOG', 'VXGSGC', 'Kê khai giá Vac-xin phòng bệnh cho gia súc, gia cầm', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:52:46'),
(7, 'BOG', 'MA', 'Kê khai giá Muối ăn', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:52:59'),
(8, 'BOG', 'STED6T', 'Kê khai giá Sữa dành cho trẻ em dưới 06 tuổi', 'SCTTBRVT', 'TD', NULL, '2019-09-05 08:51:29'),
(9, 'BOG', 'DADTL', 'Kê khai giá Đường ăn, bao gồm đường trắng và đường tinh luyện', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:53:22'),
(10, 'BOG', 'TGTT', 'Kê khai giá Thóc, gạo tẻ thường', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:53:41'),
(11, 'BOG', 'TPCB', 'Kê khai giá Thuốc phòng bệnh, chữa bệnh cho người thuộc danh mục thuốc chữa bệnh thiết yếu sử dụng tại cơ sở khám bệnh, chữa bệnh.', 'SYTBRVT', 'TD', NULL, '2019-09-05 08:51:51'),
(12, 'VLXD', 'VLXD', 'Kê khai giá vật liệu xây dựng', 'SXDBRVT', 'TD', NULL, '2019-09-05 08:37:43'),
(13, 'XMTXD', 'XMTXD', 'Kê khai giá xi măng, thép xây dựng', 'STCBRVT', 'TD', NULL, '2019-09-05 08:26:40'),
(14, 'DVHDTMCK', 'DVHDTMCK', 'Kê khai giá dịch vụ hỗ trợ hoạt động thương mại tại cửa khẩu', 'BQLKKTT', 'TD', NULL, '2019-08-29 02:48:46'),
(15, 'THAN', 'THAN', 'Kê khai giá than', 'STCCB', 'TD', NULL, '2019-08-30 08:30:43'),
(16, 'TACN', 'TACN', 'Kê khai giá thức ăn chăn nuôi', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:31:41'),
(17, 'GIAY', 'GIAY', 'Kê khai giá Giấy in, viết (dạng cuộn), giấy in báo sản xuất trong nước', 'STCCB', 'TD', NULL, '2019-08-30 08:30:43'),
(18, 'SACH', 'SACH', 'Kê khai giá sách giáo khoa', 'STCBRVT', 'TD', NULL, '2019-09-05 08:27:21'),
(19, 'ETANOL', 'ETANOL', 'Kê khai giá Etanol nhiên liệu không biến tính, khí tự nhiên hóa lỏng(LNG); khí thiên nhiên nén (CNG)', 'STCBRVT', 'TD', NULL, '2019-09-05 08:27:39'),
(20, 'KCBTN', 'KCBTN', 'Kê khai giá Dịch vụ khám chữa bệnh cho người tại cơ sở khám chữa bệnh tư nhân; khám chữa bệnh theo yêu cầu tại cơ sở khám chữa bệnh của nhà nước', 'SYTBRVT', 'TD', NULL, '2019-09-05 08:31:12'),
(21, 'TPCNTE6T', 'TPCNTE6T', 'Kê khai giá Thực phẩm chức năng cho trẻ em dưới 6 tuổi', 'SCTTBRVT', 'TD', NULL, '2019-09-05 08:30:49'),
(22, 'DVLT', 'DVLT', 'Kê khai giá dịch vụ lưu trú', 'UBNDTBRVT', 'TD', NULL, '2019-09-05 08:32:40'),
(23, 'DVVT', 'VTXK', 'Kê khai giá Cước vận tải hành khách bằng ôtô tuyến cố định', 'SGTVTBRVT', 'TD', NULL, '2019-09-05 08:28:32'),
(24, 'DVVT', 'VTXB', 'Kê khai giá Cước vận tải hành khách bằng xe buýt theo tuyến cố định', 'SGTVTBRVT', 'KTD', NULL, '2019-09-05 08:30:21'),
(25, 'DVVT', 'VTXTX', 'Kê khai giá Cước vận tải hành khách bằng xe taxi', 'SGTVTBRVT', 'TD', NULL, '2019-09-05 08:28:48'),
(26, 'DVVT', 'VCHK', 'Kê khai giá Cước vận chuyển hành khách: xe buýt, xe điện, bè mảng', 'SGTVTBRVT', 'KTD', NULL, '2019-09-05 08:30:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmnhomhanghoa`
--

CREATE TABLE `dmnhomhanghoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmphilephi`
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
-- Cấu trúc bảng cho bảng `dmqdgiadat`
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
-- Cấu trúc bảng cho bảng `dmthamdinhgiahh`
--

CREATE TABLE `dmthamdinhgiahh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmthuetn`
--

CREATE TABLE `dmthuetn` (
  `id` int(10) UNSIGNED NOT NULL,
  `matn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmthuetn`
--

INSERT INTO `dmthuetn` (`id`, `matn`, `manhom`, `cap1`, `cap2`, `cap3`, `cap4`, `cap5`, `dvt`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(569, 'II1', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', '', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(570, 'II2020101', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá khối để xẻ (trừ đá hoa trắng, granit và dolomit)', 'Đá khối để xẻ có diện tích bề mặt dưới 0,1m2', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(571, 'II2020102', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá khối để xẻ (trừ đá hoa trắng, granit và dolomit)', 'Đá khối để xẻ có diện tích bề mặt từ 0,1m2 đến 0,3m2', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(572, 'II2020103', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá khối để xẻ (trừ đá hoa trắng, granit và dolomit)', 'Đá khối để xẻ có diện tích bề mặt từ 0,3m2 đến 0,6m2', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(573, 'II2020104', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá khối để xẻ (trừ đá hoa trắng, granit và dolomit)', 'Đá khối để xẻ có diện tích bề mặt từ 0,6m2 đến 01m2', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(574, 'II2020105', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá khối để xẻ (trừ đá hoa trắng, granit và dolomit)', 'Đá khối để xẻ có diện tích bề mặt từ 01m2 trở lên', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(575, 'II2020301', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá sau nổ mìn, đá xô bồ (khoáng sản khai thác)', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(576, 'II2020302', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá hộc và đá base', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(577, 'II2020303', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá cấp phối', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(578, 'II2020304', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá dăm các loại', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(579, 'II2020305', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá lô ca', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(580, 'II2020306', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá xây dựng', 'Đá làm vật liệu xây dựng thông thường', 'Đá chẻ, đá bazan dạng cột', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(581, 'II3020301', '01', 'Khoáng sản không kim loại', 'Đất khai thác để san lấp, xây dựng công trình', 'Đá sản xuất xi măng', 'Đá làm phụ gia sản xuất xi măng', 'Đá puzolan (khoáng sản khai thác)', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(582, 'II501', '01', 'Khoáng sản không kim loại', 'Cát', 'Cát san lấp (bao gồm cả cát nhiễm mặn)', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(583, 'II50201', '01', 'Khoáng sản không kim loại', 'Cát', 'Cát xây dựng', 'Cát đen dùng trong xây dựng', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(584, 'II50202', '01', 'Khoáng sản không kim loại', 'Cát', 'Cát xây dựng', 'Cát vàng dùng trong xây dựng', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(585, 'II6', '01', 'Khoáng sản không kim loại', 'Cát làm thủy tinh (cát trắng)', '', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(586, 'II7', '01', 'Khoáng sản không kim loại', 'Đất làm gạch (sét làm gạch, ngói)', '', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(587, 'II801', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá Granite màu ruby', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(588, 'II802', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá Granite màu đỏ', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(589, 'II803', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá Granite màu tím, màu trắng', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(590, 'II804', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá Granite màu khác', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:07', '2019-09-23 02:58:07'),
(591, 'II805', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá gabro và diorit', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:08', '2019-09-23 02:58:08'),
(592, 'II806', '01', 'Khoáng sản không kim loại', 'Đá Granite', 'Đá granite, gabro, diorit khai thác (không đồng nhất', '', '', 'm3', NULL, 'TD', '2019-09-23 02:58:08', '2019-09-23 02:58:08'),
(593, 'II19', '01', 'Khoáng sản không kim loại', 'Than bùn', '', '', '', 'tấn', NULL, 'TD', '2019-09-23 02:58:08', '2019-09-23 02:58:08'),
(594, 'II2407', '01', 'Khoáng sản không kim loại', 'Khoáng sản không kim loại khác', NULL, '', '', 'tấn', NULL, 'TD', '2019-09-23 02:58:08', '2019-09-23 02:58:08'),
(595, 'III10101', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Cẩm, lai, lát', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(596, 'III10102', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Cẩm, lai, lát', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(597, 'III10103', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Cẩm, lai, lát', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(598, 'III102', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Cẩm liên (cà gần)', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(599, 'III103', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Dáng hương (giáng hương)', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(600, 'III104', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Du sam', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(601, 'III10501', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gõ đỏ (Cà te/Hồ bì)', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(602, 'III10502', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gõ đỏ (Cà te/Hồ bì)', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(603, 'III10503', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gõ đỏ (Cà te/Hồ bì)', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(604, 'III10601', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(605, 'III10602', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(606, 'III10603', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(607, 'III10701', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ mật (Gõ mật)', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(608, 'III10702', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ mật (Gõ mật)', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(609, 'III10703', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Gụ mật (Gõ mật)', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(610, 'III108', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Hoàng đàn', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(611, 'III109', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Huệ mộc, Sưa (Trắc thối/Huỳnh đàn đỏ)', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(612, 'III110', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Huỳnh đường', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(613, 'III11101', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Hương', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(614, 'III11102', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Hương', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(615, 'III11103', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Hương', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(616, 'III112', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Hương tía', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(617, 'III113', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Lát', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(618, 'III114', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Mun', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(619, 'III115', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Muồng đen', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:58', '2019-09-23 02:59:58'),
(620, 'III11601', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Pơ mu', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(621, 'IlI11602', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Pơ mu', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(622, 'III11603', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Pơ mu', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(623, 'III117', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Sơn huyết', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(624, 'III118', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trai', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(625, 'III11901', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trắc', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(626, 'III11902', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trắc', '25cm≤D<35cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(627, 'III11903', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trắc', '35cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(628, 'III11904', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trắc', '50cm≤D<65cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(629, 'III11905', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Trắc', 'D≥65 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(630, 'III12001', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Các loai khăc', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(631, 'III12002', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Các loai khăc', '25cm≤D<35cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(632, 'III12003', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Các loai khăc', '35cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(633, 'III12004', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm I', 'Các loai khăc', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(634, 'III201', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Cấm xe', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(635, 'III20201', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Đinh (đinh hương)', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(636, 'III20202', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Đinh (đinh hương)', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(637, 'III20203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Đinh (đinh hương)', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(638, 'III20301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Lim xanh', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(639, 'III20302', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Lim xanh', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(640, 'III20303', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Lim xanh', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(641, 'III20401', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Nghiến', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(642, 'III20402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Nghiến', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(643, 'III20403', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Nghiến', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(644, 'III20501', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Kiền kiền', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(645, 'III20502', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Kiền kiền', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(646, 'III20503', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Kiền kiền', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(647, 'III206', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Da đá', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(648, 'III207', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Sao xanh', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(649, 'III208', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Sến', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(650, 'III209', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Sến mật', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(651, 'III210', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Sến mủ', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(652, 'III211', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Táu mật', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(653, 'III212', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Trai ly', '', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(654, 'III21301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Xoay', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(655, 'III21302', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Xoay', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(656, 'III21303', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Xoay', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(657, 'III21401', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Các loại khác', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(658, 'III21402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Các loại khác', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(659, 'III21403', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm II', 'Các loại khác', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 02:59:59', '2019-09-23 02:59:59'),
(660, 'III301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Bằng lăng', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(661, 'III30201', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Cà chắc (cà chí)', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(662, 'III30202', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Cà chắc (cà chí)', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(663, 'III30203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Cà chắc (cà chí)', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(664, 'III303', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Cà ổi', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(665, 'III30401', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Chò chỉ', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(666, 'III30402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Chò chỉ', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(667, 'III30403', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Chò chỉ', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(668, 'III305', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Chò chai', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(669, 'III306', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Chua khét, trường chua', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(670, 'III307', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Dạ hương', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(671, 'III30801', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Giỗi', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(672, 'III30802', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Giỗi', '25cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(673, 'III30803', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Giỗi', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(674, 'III309', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Dầu gió', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(675, 'III310', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Huỳnh', '', '', 'm', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(676, 'III311', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Re mit', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(677, 'III312', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Re hương', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(678, 'III313', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Săng lẻ', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(679, 'III314', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Sao đen', '', '', 'm', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(680, 'III315', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Sao cát', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(681, 'III316', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Trường mật', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(682, 'III317', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Trường chua', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(683, 'III318', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Vên Vên', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(684, 'III31901', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Các loại khác', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(685, 'III31902', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Các loại khác', '25cm≤D<35cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(686, 'III31903', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Các loại khác', '35cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(687, 'III31904', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm III', 'Các loại khác', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(688, 'III40101', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Bô bô', 'Chiều dài <2m', '', 'm3', NULL, 'TD', '2019-09-23 03:00:00', '2019-09-23 03:00:00'),
(689, 'III40102', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Bô bô', 'Chiều dài ≥2m', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(690, 'III402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Chặc khế', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(691, 'III403', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Cóc đá', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(692, 'III404', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Dầu các loại', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(693, 'III405', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Re (De)', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(694, 'III406', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Gội tía', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(695, 'III407', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Mỡ', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(696, 'III408', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Sến bo bo', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(697, 'III409', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Lim sừng', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(698, 'III410', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Thông', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(699, 'III411', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Thông lông gà', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(700, 'III412', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Thông ba lá', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(701, 'III41301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Thông nàng', 'D<35 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(702, 'III41302', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Thông nàng', 'D≥35 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(703, 'III414', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Vàng tâm', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(704, 'III41501', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Các loại khác', 'D<25cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(705, 'III41502', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Các loại khác', '25cm≤D<35cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(706, 'III41503', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Các loại khác', '35cm≤D<50cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(707, 'III41504', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm IV', 'Các loại khác', 'D≥50 cm', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(708, 'III50101', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Chò xanh', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(709, 'III50102', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Chò xót', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(710, 'III50103', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Dải ngựa', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(711, 'III50104', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Dầu', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(712, 'III50105', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Dầu đỏ', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(713, 'III50106', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Dầu đồng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(714, 'III50107', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Dầu nước', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(715, 'III50108', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Lim vang (lim xẹt)', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(716, 'III50109', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Muồng (Muồng cánh dán', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(717, 'III50110', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Sa mộc', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(718, 'III50111', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Sau sau (Táu hậu)', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(719, 'III50112', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', 'Thông hai lá', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(720, 'III5011301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', '', 'D<25cm', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(721, 'III5011302', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', '', '25cm≤D<50cm', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(722, 'III5011303', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm V', '', 'D≥50 cm', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(723, 'III50201', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Bạch đàn', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(724, 'III50202', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Cáng lò', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(725, 'III50203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Chò', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(726, 'III50204', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Chò nâu', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(727, 'III50205', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Keo', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(728, 'III50206', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Kháo vàng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:01', '2019-09-23 03:00:01'),
(729, 'III50207', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Mận rừng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(730, 'III50208', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Phay', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(731, 'III50209', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Trám hồng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(732, 'III50210', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Xoan đào', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(733, 'III50211', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', 'Sấu', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(734, 'III5021201', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', '', 'D<25cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(735, 'III5021202', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', '', '25cm≤D<50cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(736, 'III5021203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VI', '', 'D≥50 cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(737, 'III50301', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Gáo vàng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(738, 'III50302', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Lồng mức', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(739, 'III50303', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Mò cua (Mù cua/Sữa)', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(740, 'III50304', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Trám trắng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(741, 'III50305', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Vang trứng', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(742, 'III50306', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', 'Xoăn', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(743, 'III5021203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', '', 'D<25cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(744, 'III5021203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', '', '25cm≤D<50cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(745, 'III5021203', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VII', '', 'D≥50 cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(746, 'III50401', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VIII', 'Bồ đề', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(747, 'III50402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VIII', 'Bộp (đa xanh)', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(748, 'III50403', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VIII', 'Trụ mỏ', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(749, 'III5040401', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VIII', '', 'D<25cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(750, 'III5040402', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Gỗ nhóm VIII', '', 'D≥25 cm', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(751, 'III505', '02', 'Sản phẩm của rừng tự nhiên', 'Gỗ nhóm V, VI, VII, VIII và các loại gỗ khác', 'Các loại gỗ khác', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(752, 'III601', '02', 'Sản phẩm của rừng tự nhiên', 'Cành, ngọn, gốc, rễ', 'Cành, ngọn', '', '', 'm3', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(753, 'III7', '02', 'Sản phẩm của rừng tự nhiên', 'Củi', '', '', '', 'Ste', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(754, 'III80101', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Tre', 'D<5cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(755, 'III80102', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Tre', '5cm≤D<6cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(756, 'III80103', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Tre', '6cm≤D<10cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(757, 'III80104', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Tre', 'D≥10 cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(758, 'III802', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Trúc', '', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(759, 'III80301', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Nứa', 'D<7cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(760, 'III80302', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Nứa', 'D≥7cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(761, 'III80401', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Mai', 'D<6cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(762, 'III80402', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Mai', '6cm≤D<10cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(763, 'III80403', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Mai', 'D≥10 cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(764, 'III80501', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Vầu', 'D<6cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(765, 'III80502', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Vầu', '6cm≤D<10cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:02', '2019-09-23 03:00:02'),
(766, 'III80503', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Vầu', 'D≥10 cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(767, 'III806', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Tranh', '', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(768, 'III807', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Giang', '', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(769, 'III80701', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Giang', 'D<6cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(770, 'III80702', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Giang', '6cm≤D<10cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(771, 'III80703', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Giang', 'D≥10 cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(772, 'III80801', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Lồ ô', 'D<6cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(773, 'III80802', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Lồ ô', '6cm≤D<10cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(774, 'III80803', '02', 'Sản phẩm của rừng tự nhiên', 'Tre, trúc, nứa, mai, giang, tranh, vầu, lồ ô', 'Lồ ô', 'D≥10 cm', '', 'cây', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(775, 'III90101', '02', 'Sản phẩm của rừng tự nhiên', 'Trầm hương, kỳ nam', 'Trăm hương', 'loại 1', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(776, 'III90102', '02', 'Sản phẩm của rừng tự nhiên', 'Trầm hương, kỳ nam', 'Trăm hương', 'loại 2', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(777, 'III90103', '02', 'Sản phẩm của rừng tự nhiên', 'Trầm hương, kỳ nam', 'Trăm hương', 'Loại 3', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(778, 'III90201', '02', 'Sản phẩm của rừng tự nhiên', 'Trầm hương, kỳ nam', 'Kỳ nam', 'Loại 1', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(779, 'III90202', '02', 'Sản phẩm của rừng tự nhiên', 'Trầm hương, kỳ nam', 'Kỳ nam', 'Loại 2', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(780, 'III100101', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Hồi', 'Tươi', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(781, 'III100102', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Hồi', 'Khô', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(782, 'III100201', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Quế', 'Tươi', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(783, 'III100202', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Quế', 'Khô', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(784, 'III100301', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Sa nhân', 'Taxi', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(785, 'III100302', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Sa nhân', 'Khô', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(786, 'III100401', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Thảo quả', 'Tươi', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(787, 'III100402', '02', 'Sản phẩm của rừng tự nhiên', 'Hồi, quế, sa nhân, thảo quả', 'Thảo quả', 'Khô', '', 'kg', NULL, 'TD', '2019-09-23 03:00:03', '2019-09-23 03:00:03'),
(788, 'IV102', '03', 'Hải sản tự nhiên', 'Ngọc trai, bào ngư, hải sâm', 'Bào ngư', '', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(789, 'IV103', '03', 'Hải sản tự nhiên', 'Ngọc trai, bào ngư, hải sâm', 'Hải sâm', '', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(790, 'IV20101', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Cá', 'Cá loại 1, 2, 3', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(791, 'IV20102', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Cá', 'Cá loại khác', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(792, 'IV202', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Cua', '', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(793, 'IV204', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Mực', '', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(794, 'IV20501', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Tôm', 'Tôm hùm', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(795, 'IV20502', '03', 'Hải sản tự nhiên', 'Hải sản tự nhiên khác', 'Tôm', 'Tôm khác', '', 'kg', NULL, 'TD', '2019-09-23 03:01:42', '2019-09-23 03:01:42'),
(796, 'V10101', '04', 'Nước thiên nhiên', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp chất lượng trung bình (so với tiêu chuẩn đóng chai phải lọc bỏ một số hợp chất để hợp quy với Bộ Y tế)', '', 'm3', NULL, 'TD', '2019-09-23 03:02:43', '2019-09-23 03:02:43'),
(797, 'V10102', '04', 'Nước thiên nhiên', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp', 'Nước khaongs thiên nhiên, nước nóng thiên nhiên dùng dể đóng chai, đóng hộp chất lượng cao (lọc, khử vi khuẩn, vi sinh, không phải lọc một số hợp chất vô cơ)', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(798, 'V10104', '04', 'Nước thiên nhiên', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên đóng chai, đóng hộp', 'Nước khoáng thiên nhiên dùng để ngâm, tắm, trị bệnh, dịch vụ du lịch….', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(799, 'V10201', '04', 'Nước thiên nhiên', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(800, 'V10202', '04', 'Nước thiên nhiên', 'Nước khoáng thiên nhiên, nước nóng thiên nhiên, nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', 'Nước thiên nhiên tinh lọc đóng chai, đóng hộp', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(801, 'V201', '04', 'Nước thiên nhiên', 'Nước thiên nhiên dùng cho sản xuất kinh doanh nước sạch', 'Nước mặt', '', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(802, 'V202', '04', 'Nước thiên nhiên', 'Nước thiên nhiên dùng cho sản xuất kinh doanh nước sạch', 'Nước dưới đát (nước ngầm)', '', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(803, 'V301', '04', 'Nước thiên nhiên', 'Nước thiên nhiên dùng cho mục đích khác', 'Nước thiên nhiên dùng cho sản xuất rượu, bia, nước giải khát, nước đá', '', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(804, 'V302', '04', 'Nước thiên nhiên', 'Nước thiên nhiên dùng cho mục đích khác', 'Nước thiên nhiên dùng cho khai khoáng', '', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(805, 'V303', '04', 'Nước thiên nhiên', 'Nước thiên nhiên dùng cho mục đích khác', 'Nước thiên nhiên dùng mục đích khác (làm mát, vệ sinh công nghiệp, xây dựng, dùng cho sản xuất, chế biến thủy sản, hải sản, nông sản …..', '', '', 'm3', NULL, 'TD', '2019-09-23 03:02:44', '2019-09-23 03:02:44'),
(806, 'VI', '05', 'Yến sào thiên nhiên', '', '', '', '', 'kg', NULL, 'TD', '2019-09-23 03:03:34', '2019-09-23 03:03:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmvlxd`
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

--
-- Đang đổ dữ liệu cho bảng `dmvlxd`
--

INSERT INTO `dmvlxd` (`id`, `tennhom`, `ten`, `level`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, 'Đá xây dựng các loại', NULL, 'NHOM', 'TD', '2018-12-25 08:58:24', '2018-12-25 09:05:21'),
(2, 'Gạch xây dựng: gạch đặc, gạch lỗ;', NULL, 'NHOM', 'TD', '2018-12-25 08:58:48', '2018-12-25 08:58:48'),
(3, 'Cát xây, cát bê tông, cát trát', NULL, 'NHOM', 'TD', '2018-12-25 08:59:07', '2018-12-25 08:59:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dtapdungdvlt`
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
-- Cấu trúc bảng cho bảng `dvkcb`
--

CREATE TABLE `dvkcb` (
  `id` int(10) UNSIGNED NOT NULL,
  `thoidiem` date DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenbv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dvkcbct`
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
-- Cấu trúc bảng cho bảng `dvkcbctdf`
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
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `general-configs`
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
  `emailql` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `general-configs`
--

INSERT INTO `general-configs` (`id`, `tendonvi`, `maqhns`, `diachi`, `tel`, `thutruong`, `ketoan`, `nguoilapbieu`, `diadanh`, `setting`, `thongtinhd`, `thoihanlt`, `thoihanvt`, `thoihangs`, `thoihantacn`, `sodvvt`, `emailql`, `created_at`, `updated_at`) VALUES
(1, 'Sở Tài Chính Tỉnh Bà Rịa - Vũng Tàu', 'STC', 'Số 11 Trường Chinh, phường Phước Trung, TP Bà Rịa, tỉnh Bà Rịa-Vũng Tàu', 'Điện thoại: 064.3852328, Fax: 064.3850162, Email: sotc@baria-vungtau.gov.vn', 'Lê Ngọc Khánh', ' Lê Thế Thời', 'Lê Thế Thời', 'Bà Rịa - Vũng Tàu', '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\"},\"giadatduan\":{\"index\":\"1\"},\"giadaugiadat\":{\"index\":\"1\"},\"daugiadatts\":{\"index\":\"1\"},\"giathuetn\":{\"index\":\"1\"},\"giarung\":{\"index\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\"},\"giathuenhacongvu\":{\"index\":\"1\"},\"bannhataidinhcu\":{\"index\":\"1\"},\"gianuocsh\":{\"index\":\"1\"},\"giadvgddt\":{\"index\":\"1\"},\"giadvkcb\":{\"index\":\"1\"},\"giathitruong\":{\"index\":\"1\"},\"thanhlytaisan\":{\"index\":\"1\"},\"giagocvlxd\":{\"index\":\"1\"},\"muataisan\":{\"index\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"kkgia\":{\"index\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"}}', '', 0, 0, 0, 0, 0, 'minhtranlife@gmail.com', '2019-09-05 02:33:20', '2019-09-21 07:12:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giacacloaidat`
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
  `giavt1` double NOT NULL DEFAULT '0',
  `giavt2` double NOT NULL DEFAULT '0',
  `giavt3` double NOT NULL DEFAULT '0',
  `giavt4` double NOT NULL DEFAULT '0',
  `hesok` double NOT NULL DEFAULT '1',
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
-- Cấu trúc bảng cho bảng `giacacloaidath`
--

CREATE TABLE `giacacloaidath` (
  `id` int(10) UNSIGNED NOT NULL,
  `maso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `magoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `macapdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `capdo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` text COLLATE utf8_unicode_ci,
  `hienthi` text COLLATE utf8_unicode_ci,
  `ngaynhap` date DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giavt1` double NOT NULL DEFAULT '0',
  `giavt2` double NOT NULL DEFAULT '0',
  `giavt3` double NOT NULL DEFAULT '0',
  `giavt4` double NOT NULL DEFAULT '0',
  `hesok` double NOT NULL DEFAULT '1',
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
-- Cấu trúc bảng cho bảng `giadatdiaban`
--

CREATE TABLE `giadatdiaban` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maloaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khuvuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `mdsd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giavt1` double NOT NULL DEFAULT '0',
  `giavt2` double NOT NULL DEFAULT '0',
  `giavt3` double NOT NULL DEFAULT '0',
  `giavt4` double NOT NULL DEFAULT '0',
  `giavt5` double NOT NULL DEFAULT '0',
  `hesok` double NOT NULL DEFAULT '1',
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadatdiabandm`
--

CREATE TABLE `giadatdiabandm` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giadatdiabandm`
--

INSERT INTO `giadatdiabandm` (`id`, `maloaidat`, `loaidat`, `created_at`, `updated_at`) VALUES
(1, 'DTL', 'Đất trồng lúa', NULL, NULL),
(2, 'DTCHNK', 'Đất trồng cây hàng năm khác', NULL, NULL),
(3, 'DTCLN', 'Đất trồng cây lâu năm', NULL, NULL),
(4, 'DLN', 'Đất lâm nghiệp', NULL, NULL),
(5, 'DNTTS', 'Đất nuôi trồng thủy sản', NULL, NULL),
(6, 'DOTNT', 'Đất ở tại nông thôn', NULL, NULL),
(7, 'DTMDVTNT', 'Đất thương mại, dịch vụ tại nông thôn', NULL, NULL),
(8, 'DSXKDPNNTNN', 'Đất sản xuất, kinh doanh phi nông nghiệp không phải là đát thương mại, dịch vụ tại nông thôn', NULL, NULL),
(9, 'DOTDT', 'Đất ở tại đô thị', NULL, NULL),
(10, 'DTMDVTDT', 'Đất thương mại, dịch vụ tại đô thị', NULL, NULL),
(11, 'DSXKDPNNTDT', 'Đất sản xuất kinh doanh phi nông nghiệp không phải là đất thương mại, dịch vụ tại đô thi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadatduan`
--

CREATE TABLE `giadatduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaidat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaiduong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdgiadatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddato` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddattmdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatsxkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatnuoits` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdpddatmuoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhomduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giadatduan`
--

INSERT INTO `giadatduan` (`id`, `mahuyen`, `maxa`, `tenduan`, `thoidiem`, `dientich`, `soqd`, `loaidat`, `tenduong`, `loaiduong`, `vitri`, `qdgiadato`, `qdgiadattmdv`, `qdgiadatsxkd`, `qdgiadatnn`, `qdgiadatnuoits`, `qdgiadatmuoi`, `qdpddato`, `qdpddattmdv`, `qdpddatsxkd`, `qdpddatnn`, `qdpddatnuoits`, `qdpddatmuoi`, `manhomduan`, `trangthai`, `thaotac`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'TPBR', 'TPBRPPT', 'Dự án giao đất', '2019-09-14', '10000', 'Số qd', 'Loại đất', 'Tên đường', 'Loại đường', 'Vị trí', '1', '2', '3', '4', '5', '6', '11', '12', '13', '14', '15', '16', 'A', NULL, NULL, NULL, '2019-09-14 03:52:30', '2019-09-14 03:52:30'),
(2, 'TPVT', 'TPVTP1', 'Dự án phường 1', '2019-09-18', '10000', 'Số QD', 'Loại đất', 'Tên Đường', 'Loại đường', 'Vị trí', '1000', '1000', '1000', '1000', '1000', '1000', '1200', '1200', '1200', '1200', '1200', '1200', 'A', NULL, NULL, NULL, '2019-09-18 08:16:10', '2019-09-18 08:16:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadvgddt`
--

CREATE TABLE `giadvgddt` (
  `id` int(10) UNSIGNED NOT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khuvuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadvgddtct`
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
-- Cấu trúc bảng cho bảng `giadvgddtctdf`
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
-- Cấu trúc bảng cho bảng `giagocvlxd`
--

CREATE TABLE `giagocvlxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttthaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giagocvlxdct`
--

CREATE TABLE `giagocvlxdct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giagoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qcad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giagocvlxdctdf`
--

CREATE TABLE `giagocvlxdctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giagoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qcad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giahhdvk`
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
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdunglk` date DEFAULT NULL,
  `soqdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giahhdvkct`
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
-- Cấu trúc bảng cho bảng `giahhdvkctdf`
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
-- Cấu trúc bảng cho bảng `gianuocsachshdm`
--

CREATE TABLE `gianuocsachshdm` (
  `id` int(10) UNSIGNED NOT NULL,
  `madoituong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doituongsd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gianuocsachshdm`
--

INSERT INTO `gianuocsachshdm` (`id`, `madoituong`, `doituongsd`, `created_at`, `updated_at`) VALUES
(1, '01', 'Nước sinh hoạt đồng bào dân tộc', '2019-09-23 08:18:37', '2019-09-23 08:18:59'),
(2, '02', 'Nước sinh hoạt nông thôn (Từ 0-10m3)', '2019-09-23 08:19:28', '2019-09-23 08:19:28'),
(3, '03', 'Nước sinh hoạt nông thôn (Trên 10m3)', '2019-09-23 08:19:50', '2019-09-23 08:19:50'),
(4, '04', 'Nước sinh hoạt đô thị (Từ 0-10m3)', '2019-09-23 08:20:20', '2019-09-23 08:20:20'),
(5, '05', 'Nước sinh hoạt đô thị (Trên 10m3)', '2019-09-23 08:20:49', '2019-09-23 08:20:49'),
(6, '06', 'Hành chính sự nghiệp', '2019-09-23 08:21:08', '2019-09-23 08:21:08'),
(7, '07', 'Sản xuất vật chất (Bán trực tiếp cho khách hàng)', '2019-09-23 08:21:39', '2019-09-23 08:21:39'),
(8, '08', 'Sản xuất vật chất (Bán qua đồng hồ tổng Khu công nghiệp)', '2019-09-23 08:22:10', '2019-09-23 08:22:10'),
(9, '09', 'Kinh doanh dịch vụ', '2019-09-23 08:22:28', '2019-09-23 08:22:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gianuocsh`
--

CREATE TABLE `gianuocsh` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `diaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doituong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giachuathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giacothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmttyle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhtien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gianuocsh`
--

INSERT INTO `gianuocsh` (`id`, `mahs`, `soqd`, `ngayapdung`, `ghichu`, `diaban`, `doituong`, `mota`, `giachuathue`, `thuevat`, `giacothue`, `phibvmttyle`, `phibvmt`, `thanhtien`, `dvt`, `trangthai`, `username`, `thaotac`, `created_at`, `updated_at`) VALUES
(3, '1569228772', '01', '2019-09-23', 'Ghi chú', NULL, NULL, 'Giá nước sinh hoạt năm 2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CB', NULL, NULL, '2019-09-23 08:53:37', '2019-09-23 09:20:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gianuocshct`
--

CREATE TABLE `gianuocshct` (
  `id` int(10) UNSIGNED NOT NULL,
  `madoituong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doituongsd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giachuathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giacothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmttyle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phibvmt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thanhtien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gianuocshct`
--

INSERT INTO `gianuocshct` (`id`, `madoituong`, `doituongsd`, `giachuathue`, `thuevat`, `giacothue`, `phibvmttyle`, `phibvmt`, `thanhtien`, `mahs`, `trangthai`, `created_at`, `updated_at`) VALUES
(190, '01', 'Nước sinh hoạt đồng bào dân tộc', '1000', NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 09:10:22'),
(191, '02', 'Nước sinh hoạt nông thôn (Từ 0-10m3)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(192, '03', 'Nước sinh hoạt nông thôn (Trên 10m3)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(193, '04', 'Nước sinh hoạt đô thị (Từ 0-10m3)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(194, '05', 'Nước sinh hoạt đô thị (Trên 10m3)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(195, '06', 'Hành chính sự nghiệp', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(196, '07', 'Sản xuất vật chất (Bán trực tiếp cho khách hàng)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(197, '08', 'Sản xuất vật chất (Bán qua đồng hồ tổng Khu công nghiệp)', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37'),
(198, '09', 'Kinh doanh dịch vụ', NULL, NULL, NULL, NULL, NULL, NULL, '1569228772', 'XD', '2019-09-23 08:52:52', '2019-09-23 08:53:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gianuocshctdf`
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
-- Cấu trúc bảng cho bảng `giarung`
--

CREATE TABLE `giarung` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` text COLLATE utf8_unicode_ci,
  `mota` text COLLATE utf8_unicode_ci,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `thoidiem` date DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giarungct`
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
-- Cấu trúc bảng cho bảng `giarungctdf`
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
-- Cấu trúc bảng cho bảng `giathitruong`
--

CREATE TABLE `giathitruong` (
  `id` int(10) UNSIGNED NOT NULL,
  `thang` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybc` date DEFAULT NULL,
  `mahuyen` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathitruongct`
--

CREATE TABLE `giathitruongct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaigia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` double DEFAULT NULL,
  `nguontt` text COLLATE utf8_unicode_ci,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathitruongct`
--

INSERT INTO `giathitruongct` (`id`, `mahs`, `manhom`, `tennhom`, `mahh`, `tenhh`, `dacdiemkt`, `dvt`, `loaigia`, `dongia`, `nguontt`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(71, 'SCTTBRVT1568693184', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0020', 'Sữa bột dùng cho trẻ em dưới 06 tuổi', 'Ghi rõ quy cách', 'đ/kg ', 'Giá bán lẻ', NULL, 'Các nguồn thông tin khác', NULL, 'CXD', NULL, NULL),
(72, 'SCTTBRVT1568693184', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0008', 'Gas đun', 'Loại bình 12kg (không kể tiền\nbình)', 'đ/kg', 'Giá bán lẻ', NULL, 'Các nguồn thông tin khác', NULL, 'CXD', NULL, NULL),
(73, 'SCTTBRVT1568693184', '07', 'GIAO THÔNG', '07.0006', 'Xăng E5 Ron 92', NULL, 'đ/lít', 'Giá bán lẻ', NULL, 'Các nguồn thông tin khác', NULL, 'CXD', NULL, NULL),
(74, 'SCTTBRVT1568693184', '07', 'GIAO THÔNG', '07.0007', 'Xăng Ron 95', NULL, 'đ/lít', 'Giá bán lẻ', NULL, 'Các nguồn thông tin khác', NULL, 'CXD', NULL, NULL),
(75, 'SCTTBRVT1568693184', '07', 'GIAO THÔNG', '07.0008', 'Dầu Diezel', NULL, 'đ/lít', 'Giá bán lẻ', NULL, 'Các nguồn thông tin khác', NULL, 'CXD', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathitruongdm`
--

CREATE TABLE `giathitruongdm` (
  `id` int(10) UNSIGNED NOT NULL,
  `matt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemkt` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathitruongdm`
--

INSERT INTO `giathitruongdm` (`id`, `matt`, `manhom`, `tennhom`, `mahh`, `tenhh`, `dacdiemkt`, `dvt`, `mahuyen`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0001', 'Thóc, gạo tẻ thường', 'Khang dân hoặc tương đương', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:05:25'),
(2, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0002', 'Gạo tẻ ngon', 'Tám thơm hoặc tương đương', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(3, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0003', 'Thịt lợn hơi (Thịt heo hơi)', NULL, 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(4, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0004', 'Thịt lợn nạc thăn (Thịt heo nạc thăn)', NULL, 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(5, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0005', 'Thịt bò thăn', 'Loại 1 hoặc phổ biến', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(6, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0006', 'Thịt bò bắp', 'Bắp hoa hoặc bắp lõi, loại 200 - 300 gram/ cái', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(7, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0007', 'Gà ta', 'Còn sống, loại 1,5 -2kg/1 con hoặc phổ biến', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(8, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0008', 'Gà công nghiệp', 'Làm sẵn, nguyên con, bỏ lòng, loại 1,5 - 2kg /1 con hoặc phổ biến', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(9, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0009', 'Giò lụa', 'Loại 1 kg', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(10, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0010', 'Cá quà (cá lóc)', 'Loại 2-con/1 kg hoặc phổ biến', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(11, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0011', 'Cá chép', 'Loại 2 con/1 kg hoặc phổ biến', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(12, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0012', 'Tôm rào, tôm nuôi nước ngọt', 'Loại 40-45 con/kg', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(13, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0013', 'Bắp cài trắng', 'Loại to vừa khoảng 0,5-1 kg/bắp ', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(14, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0014', 'Cải xanh', 'Cải ngọt hoặc cải cay theo mùa', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(15, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0015', 'Bí xanh', 'Quả từ 1-2 kg hoặc phổ biến', 'đ/lít', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(16, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0016', 'Cà chua', 'Quà to vừa, 8-10 quà/kg', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(17, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0017', 'Muối hạt', 'Gói 01 kg', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(18, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0018', 'Dầu thực vật', 'Chai 01 lít', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(19, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0019', 'Đường trắng kết tinh, nội', 'Gói 01 kg', 'đ/kg ', 'UBNDTBRVT', 'TD', '2019-09-05 07:04:52', '2019-09-05 07:04:52'),
(20, 'TT1162018TTBTC', '01', 'LƯƠNG THỰC, THỰC PHẨM', '01.0020', 'Sữa bột dùng cho trẻ em dưới 06 tuổi', 'Ghi rõ quy cách', 'đ/kg ', 'SCTTBRVT', 'TD', '2019-09-05 07:13:31', '2019-09-05 07:13:31'),
(137, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0001', 'Giống lúa Khang dân đột biến, cấp NC', '', 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:20:06'),
(138, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0002', 'Giống lúa Bẳc thơm số 7, cấp NC', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(139, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0003', 'Giống lúa Hương thơm số 1, cấp NC', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(140, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0004', 'Giống lúa Nếp 87, cấp NC', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(141, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0005', 'Giống lúa Nếp 97, cấp NC', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(142, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0006', 'Giống lúa Thiên ưu 8, cấp XN1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(143, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0007', 'Giống lúa RVT, cấp XN1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(144, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0008', 'Giống lúa Đài thơm 8, cấp XN1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(145, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0009', 'Giống lúa OM6976', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(146, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0010', 'Giống lúa Khang dân 18', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(147, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0011', 'Giống lúa ĐB6', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(148, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0012', 'Giống lúa T10', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(149, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0013', 'Giống lúa Q5', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(150, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0014', 'Giống lúa Xi23', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(151, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0015', 'Giống lúa ĐV 108', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(152, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0016', 'Giống lúa HN6', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(153, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0017', 'Giống lúa OM4900', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(154, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0018', 'Giống lúa OM6162', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(155, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0019', 'Giống lúa VND95-20', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(156, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0020', 'Giống lúa khác phổ biến', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(157, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0022', 'Giống ngô HN88, cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(158, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0023', 'Giống ngô SSC2095, cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(159, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0024', 'Giống ngô LVN10, cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(160, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0025', 'Giống ngô SSC586', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(161, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0026', 'Giống ngô HN68', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(162, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0027', 'Giống ngô B21', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(163, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0028', 'Giống ngô B9698', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(164, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0029', 'Giống ngô LVN4 F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(165, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0030', 'Giống ngô VN2', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(166, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0031', 'Giống ngô MX10,', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(167, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0032', 'Giống ngô LVN61', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(168, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0033', 'Giống ngô CP333', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:50', '2019-09-05 07:18:50'),
(169, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0034', 'Giống ngô MX2', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(170, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0035', 'Giống ngô MX4', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(171, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0036', 'Giống ngô khác phổ biến', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(172, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0037', 'Hạt giống Bắp cải Nhật Bản, cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(173, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0038', 'Hạt giống Dưa chuột Thái Lan, cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(174, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0039', 'Hạt giống Bí xanh sặt Việt Nam, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(175, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0040', 'Hạt giống Khổ qua lai VG Trung Quốc, c ấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(176, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0041', 'Hạt giống Bí ngô mật số 08,  cấp F1', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(177, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0042', 'Hạt giống Xà lách Hải Phòng, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(178, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0043', 'Hạt giống cải bẹ Đại Bình Phổ 818 Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(179, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0044', 'Hạt giống cải mơ Hoàng Mai GRQ, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(180, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0045', 'H ạt gi ống C ải bẹ Mào gà GRQ09, c ấp xác nh ận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(181, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0046', 'Hạt giống Cải ngọt Quảng Phù Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(182, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0047', 'Hạt giống Cải xanh lùn Thanh Giang Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(183, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0048', 'Hạt giống Cải củ lá ngắn số 13 Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(184, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0049', 'Hạt giống Đậu đũa cao sản số 5 Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(185, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0050', 'Hạt giống Đậu tứ quý số 1 Trung Quốc, cấp xác nhận', NULL, 'đ/kg ', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(186, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0051', 'Vac-xin Lở mồm long móng', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(187, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0052', 'Vac-xin Tai xanh (PRRS)', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(188, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0053', 'Vac-xin tụ huyết trùng', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(189, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0054', 'Vac-xin dịch tả l ợn', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(190, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0055', 'Vac-xin cúm gia cầm', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(191, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0056', 'Vac-xin dịch tả vịt', NULL, 'Đồng/liều', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(192, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0057', 'Thuốc thú ý', 'Chứa các hoạt chất:\nAmpicillin, Amoxicillin;\nColistin; Florfenicol; Tylosin;\nDoxycyclin; Gentamycine;\nSpiramycin; Oxytetracyline;\nKanammycin; Streptomycin;\nLincomycin; Celphalexin;\nFlumequin.', 'đ/lít, kg,\nliều, chai,\ngói, can, lọ,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(193, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0058', 'Thuốc trừ sâu', 'Chứa hoạt chất Fenobucarb;\nPymethrozin; Dinoteíuran;\nEthofenprox ; Buprofezin ;\nImidacloprid ; Fipronil', 'đ/lít, kg,\nliều, chai,\ngói, can, lọ,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(194, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0059', 'Thuốc trừ bệnh', 'Chứa hoạt chất: Isoprothiolane;\nTricyclazole; Kasugamycin;\nFenoxanil; Fosetyl-alùminium;\nMetalaxy; Mancozeb; Zined.', 'đ/lít, kg,\nliều, chai,\ngói, can, lọ,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(195, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0060', 'Thuốc trừ cỏ', 'Chứa hoạt chất: Glyphosate;\nPretilachlor; Quinclorac;\nAmetryn.', 'đ/lít, kg,\nliều, chai,\ngói, can, lọ,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(196, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0061', 'Phân đạm urê', 'Có hàm lượng Nitơ (N) tổng số\n> 46%;', 'đ/kg, gói,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(197, 'TT1162018TTBTC', '02', 'VẬT TƯ NÔNG NGHIỆP', '02.0062', 'Phân NPK', 'Có tổng hàm lượng các chất\ndinh dưỡng Nitơ tổng số (Nts),\nlân hữu hiệu (P205hh), kali\nhữu hiệu (K20hh) > 18%', 'đ/kg, gói,\nbao', 'SNNPTNNBRVT', 'TD', '2019-09-05 07:18:51', '2019-09-05 07:18:51'),
(202, 'TT1162018TTBTC', '03', 'ĐỒ UỐNG', '03.0001', 'Nước khoáng', 'Chai nhụa 500ml', 'đ/chai', 'UBNDTBRVT', 'TD', '2019-09-05 07:26:16', '2019-09-05 07:26:16'),
(203, 'TT1162018TTBTC', '03', 'ĐỒ UỐNG', '03.0002', 'Rượu vang nội', 'Chai 750ml', 'đ/chai', 'UBNDTBRVT', 'TD', '2019-09-05 07:26:16', '2019-09-05 07:26:16'),
(204, 'TT1162018TTBTC', '03', 'ĐỒ UỐNG', '03.0003', 'Nước giải khát có ga', 'Thùng 24 lon 330ml loại phổ\nbiến', 'đ/thùng 24\nlon', 'UBNDTBRVT', 'TD', '2019-09-05 07:26:16', '2019-09-05 07:26:16'),
(205, 'TT1162018TTBTC', '03', 'ĐỒ UỐNG', '03.0004', 'B a lon', 'Thùng 24 lon 330ml loại phổ\nbiến', 'đ/thùng 24\nlon', 'UBNDTBRVT', 'TD', '2019-09-05 07:26:16', '2019-09-05 07:26:16'),
(206, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0001', 'Xi măng', 'PCB30 bao 50kg', 'đ/bao', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(207, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0002', 'Thép xây dựng', 'Ghi rõ quy cách', 'đ/kg', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(208, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0003', 'Cát xây', 'Mua rời dưới 2m3/lần, tại nơi\ncung úng (không phải nơi khai\nthác)', 'đ/m3', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(209, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0004', 'Cát vàng', 'Mua rời dưới 2m3/lần, tại nơi\ncung úng (không phải nơi khai\nthác)', 'đ/m3', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(210, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0005', 'Cát đen đổ nền', 'Mua rời dưới 2m3/lần, tại nơi\ncung úng (không phải nơi khai\nthác)', 'đ/m3', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(211, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0006', 'Gạch xây', 'Gạch ống 2 lỗ, cỡ rộng 10 X dài\n22, loại 1, mua rời tại nơi cung\nứng hoặc tương đương', 'đ/viên', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(212, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0007', 'ống nhựa', 'Phi 90 loại 1', 'đ/m', 'SXDBRVT', 'TD', '2019-09-05 07:28:16', '2019-09-05 07:28:16'),
(213, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0008', 'Gas đun', 'Loại bình 12kg (không kể tiền\nbình)', 'đ/kg', 'SCTTBRVT', 'TD', '2019-09-05 07:29:26', '2019-09-05 07:29:26'),
(214, 'TT1162018TTBTC', '04', 'VẬT LIỆU XÂY DỰNG, CHẤT ĐỐT, NƯỚC SINH HOẠT', '04.0009', 'Nước sạch sinh hoạt', 'Ghi rõ tên doanh nghiệp cung\ncấp, địa bàn cung cấp', 'đ/m3', 'STCBRVT', 'TD', '2019-09-05 07:33:51', '2019-09-05 07:33:51'),
(215, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0001', 'Thuốc tim mạch', 'Hoạt chất Amlodipin 10 mg\nhoặc Hoạt chất Atorvastatin\nlOmg hoặc Hoạt chất Nifedipin\n20mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(216, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0002', 'Thuốc chống nhiễm, điều trị ký sinh trùng', 'Hoạt chất Ceíìưoxim 500mg\nhoặc Hoạt chất Amoxicilin\n500mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(217, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0003', 'Thuốc dị ứng và các trường hợp quá mẫn cảm', 'Hoạt chất Cinnarizin 25mg\nhoặc Hoạt chất Fexofenadin\n60mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(218, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0004', 'Thuốc giảm đau, hạ sốt, chống viêm không sicroid và thuốc điều trị gút', 'Hoạt chất Paracetamol 500mg\nhoặc Hoạt chất Alpha\nChymotrypsin 4.2mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(219, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0005', 'Thuốc tác dụng trên đường hô hấp', 'Hoạt chất N-acetylcystein\n200mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(220, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0006', 'Thuốc vitamin và khoáng chất', 'Vitamin BI hoặc B6 hoặc B12', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(221, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0007', 'Thuốc đường tiêu hóa', 'Hoạt chất Omeprazone 20 mg\nhoặc Hoạt chất Domperdone\n10 mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(222, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0008', 'Hóc môn và các thuốc tác động vào hệ nội tiết', 'Hoạt chất Methyl Prednisolon\n4mg hoặc Hoạt chất Gliclazid\n30 mg hoặc Hoạt chất\nMetformin 500mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:18', '2019-09-05 07:41:18'),
(223, 'TT1162018TTBTC', '05', 'THUỐC CHỮA BỆNH CHO NGƯỜI', '05.0009', 'Thuốc khác', 'Hoạt chất Sulfamethoxazol\n400mg', 'đ/đơn vị đóng gói nhò nhất (ví dụ: đ/hộp đ/vỉ 10 viên; đ/vỉ 8 iên; d/lọ 10ml; đ/vỉ 10 ống 2ml…)\n', 'SYTBRVT', 'TD', '2019-09-05 07:41:19', '2019-09-05 07:41:19'),
(224, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0001', 'Khám bệnh', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(225, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0002', 'Ngày giường điều trị nội trú nội\nkhoa, loại 1', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(226, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0003', 'Siêu âm', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(227, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0004', 'X-quang số hóa 1 phim', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(228, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0005', 'Xét nghiệm tế bào cặn nước tiếu\nhoặc cặn Adis', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(229, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0006', 'Điện tâm đồ', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(230, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0007', 'Nội soi thực quàn-dạ dày- tá\ntràng ống mềm không sinh thiết', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(231, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0008', 'Hàn composite cổ răng', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(232, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0009', 'Châm cứu (có kim dài)', 'Giá dịch vụ khám bệnh, chữa bệnh không thuộc phạm vi thanh toán của Quỹ bảo hiểm y tế trong các cơ sở khám bệnh, chữa bệnh của nhà nước', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(233, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0010', 'Khám bệnh', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(234, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0011', 'Ngày giường điều trị nội trú nội\nkhoa, loại 1', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/ngày', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(235, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0012', 'Siêu âm', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(236, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0013', 'X-quang số hóa 1 phim', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(237, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0014', 'Xét nghiệm tế bào cặn nưóc tiểu\nhoặc cặn Adis', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(238, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0015', 'Điện tâm đồ', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(239, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0016', 'Nội soi thực quàn-dạ dày- tá\ntràng ống mềm không sinh thiết', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(240, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0017', 'Hàn composite cổ răng', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(241, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0018', 'Châm cứu (có kim dài)', 'Giá dich vu khám bênh, chữa bệnh theo yêu cầu tại cơ sở khám bệnh, chữa bệnh của Nhà nươc', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(242, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0019', 'Khám bệnh', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(243, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0020', 'Ngày giường điều trị nội trú nội\nkhoa, loại 1', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/ngày', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(244, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0021', 'Siêu âm', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(245, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0022', 'X-quang số hóa 1 phim', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(246, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0023', 'Xét nghiệm tế bào cặn nước tiểu\nhoặc cặn Adis', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(247, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0024', 'Điện tâm đồ', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(248, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0025', 'Nội soi thực quản-dạ dày- tá\ntràng ống mềm không sinh thiết', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(249, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0026', 'Hàn composite cổ răng', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(250, 'TT1162018TTBTC', '06', 'DỊCH VỤ Y TẾ', '06.0027', 'Châm cứu (có kim dài)', 'Giá dịch vụ khám bệnh, chữa bệnh tại cơ sở khám bệnh, chữa bênh tư nhân', 'đ/lượt', 'SYTBRVT', 'TD', '2019-09-05 07:49:02', '2019-09-05 07:49:02'),
(251, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0001', 'Trông giữ xe máy', NULL, 'đ/luọt', 'STCBRVT', 'TD', '2019-09-05 07:51:00', '2019-09-05 07:51:00'),
(252, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0002', 'Trông giữ ô tô', NULL, 'đ/luọt', 'STCBRVT', 'TD', '2019-09-05 07:51:00', '2019-09-05 07:51:00'),
(253, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0003', 'Giá cước ô tô đi đường dài', 'Chọn 1 tuyến phổ biến, xe\nđường dài máy lạnh', 'đ/vé', 'SGTVTBRVT', 'TD', '2019-09-05 07:53:04', '2019-09-05 07:53:04'),
(254, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0004', 'Giá cước xe buýt công cộng', 'Đi trong nội tỉnh, dưới 30km', 'đ/vé', 'SGTVTBRVT', 'TD', '2019-09-05 07:53:04', '2019-09-05 07:53:04'),
(255, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0005', 'Giá cước taxi', 'Lấy giá l0km đầu, loại xe 4\nchỗ', 'đ/km', 'SGTVTBRVT', 'TD', '2019-09-05 07:53:04', '2019-09-05 07:53:04'),
(256, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0006', 'Xăng E5 Ron 92', NULL, 'đ/lít', 'SCTTBRVT', 'TD', '2019-09-05 07:54:09', '2019-09-05 07:54:09'),
(257, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0007', 'Xăng Ron 95', NULL, 'đ/lít', 'SCTTBRVT', 'TD', '2019-09-05 07:54:09', '2019-09-05 07:54:09'),
(258, 'TT1162018TTBTC', '07', 'GIAO THÔNG', '07.0008', 'Dầu Diezel', NULL, 'đ/lít', 'SCTTBRVT', 'TD', '2019-09-05 07:54:09', '2019-09-05 07:54:09'),
(259, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0001', 'Dịch vụ giáo dục trường mầm\nnon công lập', 'Ghi rõ tên trường', 'Đồng/tháng', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(260, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0002', 'Dịch vụ giáo dục trường trung\nhọc cơ sờ công lập (lớp 8', 'Ghi rõ tên trường', 'Đồng/tháng', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(261, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0003', 'Dịch vụ giáo dục trường trung\nhọc phổ thông công lập (lóp 11)', 'Ghi rõ tên trường', 'Đồng/tháng', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(262, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0004', 'Dịch vụ giáo dục đào tạo nghề\ncông lập', 'Ghi rõ tên trường, ngành nghề\nđào tạo', 'Đồng/tháng\nlìoặc\nđồng/tín chỉ', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(263, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0005', 'Dịch vụ giáo dục đào tạo trung\ncấp, trường thuộc cấp Bộ quản lý', 'Ghi rõ tên trường, ngành nghề\nđào tạo', 'Đồng/tháng\nlìoặc\nđồng/tín chỉ', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(264, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0006', 'Dịch vụ giáo dục đào tạo cao\nđẳng công lập', 'Ghi rõ tên trường, ngành nghề\nđào tạo', 'Đồng/tháng\nlìoặc\nđồng/tín chỉ', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(265, 'TT1162018TTBTC', '08', 'DỊCH VỤ GIÁO DỤC', '08.0008', 'Dịch vụ giáo dục đào tạo đại học\ncông lập hoặc tương đương đại\nhọc công lập', 'Ghi rõ tên trường, ngành nghề\nđào tạo', 'Đồng/tháng\nlìoặc\nđồng/tín chỉ', 'SGDDTBRVT', 'TD', '2019-09-05 07:56:49', '2019-09-05 07:56:49'),
(266, 'TT1162018TTBTC', '09', 'GIẢI TRÍ VÀ DU LỊCH', '09.0001', 'Du lịch trọn gói trong nước', 'Cho 1 người chuyến 2 ngày 1\nđêm (tò đâu, đến đâu...)', 'đ/người/\nchuyến', 'STCBRVT', 'TD', '2019-09-05 07:59:10', '2019-09-05 07:59:10'),
(267, 'TT1162018TTBTC', '09', 'GIẢI TRÍ VÀ DU LỊCH', '09.0002', 'Phòng khách sạn 3 sao hoặc\ntương đương', 'Hai giường đơn hoặc 1 giuờng\nđôi, có tivi, điêu hòa nước\nnóng, điện thoại cố định, vệ\nsinh khép kín,Wifí', 'đ/ngày-đêm', 'STCBRVT', 'TD', '2019-09-05 07:59:10', '2019-09-05 07:59:10'),
(268, 'TT1162018TTBTC', '09', 'GIẢI TRÍ VÀ DU LỊCH', '09.0003', 'Phòng nhà khách tư nhân', '1 giường, điều hoà, nước\nnóng-lạnh, phòng vệ sinh khép\nkín', 'đ/ngày-đêm', 'STCBRVT', 'TD', '2019-09-05 07:59:10', '2019-09-05 07:59:10'),
(269, 'TT1162018TTBTC', '10', 'VÀNG, ĐÔ LA MỸ', '10.0001', 'Vàng 99,99%', 'Kiểu nhẫn tròn 1 chỉ', '1000 đ/chỉ', 'STCBRVT', 'TD', '2019-09-05 07:59:48', '2019-09-05 07:59:48'),
(270, 'TT1162018TTBTC', '10', 'VÀNG, ĐÔ LA MỸ', '10.0002', 'Đô la Mỹ', 'Loại tờ 100USD', 'đ/USD', 'STCBRVT', 'TD', '2019-09-05 07:59:48', '2019-09-05 07:59:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathitruongtt`
--

CREATE TABLE `giathitruongtt` (
  `id` int(10) UNSIGNED NOT NULL,
  `matt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathitruongtt`
--

INSERT INTO `giathitruongtt` (`id`, `matt`, `ttqd`, `mota`, `ghichu`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, 'TT1162018TTBTC', 'Thông tư 116/2018/TT-BTC', '', '', 'TD', '2019-09-05 06:55:35', '2019-09-05 06:55:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathuedatnuoc`
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
-- Cấu trúc bảng cho bảng `giathuedatnuocct`
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
-- Cấu trúc bảng cho bảng `giathuedatnuocctdf`
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
-- Cấu trúc bảng cho bảng `giathuemuanhaxh`
--

CREATE TABLE `giathuemuanhaxh` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` text COLLATE utf8_unicode_ci,
  `mota` text COLLATE utf8_unicode_ci,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiathue` double DEFAULT NULL,
  `dongiathuemua` double DEFAULT NULL,
  `thoidiemkc` date DEFAULT NULL,
  `thoidiemht` date DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathuemuanhaxh`
--

INSERT INTO `giathuemuanhaxh` (`id`, `district`, `tenduan`, `mota`, `dientich`, `dvt`, `dongiathue`, `dongiathuemua`, `thoidiemkc`, `thoidiemht`, `ttqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'TPBR', 'DỰ án thuê mua nhà ở xã hội', NULL, NULL, NULL, 1000000, 570000, '2019-09-13', '2019-09-13', 'Số QĐ', '', NULL, '2019-09-13 02:05:47', '2019-09-16 04:05:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathuemuanhaxhct`
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
-- Cấu trúc bảng cho bảng `giathuemuanhaxhctdf`
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
-- Cấu trúc bảng cho bảng `giathuenhacongvu`
--

CREATE TABLE `giathuenhacongvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenduan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongiathue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiemkc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiemht` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathuenhacongvu`
--

INSERT INTO `giathuenhacongvu` (`id`, `district`, `manhom`, `tenduan`, `mota`, `dientich`, `dvt`, `dongiathue`, `thoidiemkc`, `thoidiemht`, `ttqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'TPBR', NULL, 'Dự án 1', NULL, NULL, NULL, '1100000', '2019-09-18', '2019-09-18', 'Số QD', '', 'HCB', '2019-09-18 03:25:24', '2019-09-18 03:31:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathuenhactxd`
--

CREATE TABLE `giathuenhactxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `tents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiempl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dacdiemktkt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadiemtdgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoidiemtdg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phuongphaptdg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdichtdg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendvyctdg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dientichchothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giachothue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giatritstd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoihantdg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giathuetscong`
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
-- Cấu trúc bảng cho bảng `giathuetscongct`
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
-- Cấu trúc bảng cho bảng `giathuetscongctdf`
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
-- Cấu trúc bảng cho bảng `giavtxk`
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
-- Cấu trúc bảng cho bảng `giavtxkct`
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
-- Cấu trúc bảng cho bảng `giavtxkctdf`
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
-- Cấu trúc bảng cho bảng `hsgia_chitiet_cpi`
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
-- Cấu trúc bảng cho bảng `hsgia_cpi`
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
-- Cấu trúc bảng cho bảng `hstonghop_chitiet_cpi`
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
-- Cấu trúc bảng cho bảng `hstonghop_cpi`
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
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkcuocvchk`
--

CREATE TABLE `kkcuocvchk` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkcuocvchkct`
--

CREATE TABLE `kkcuocvchkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkcuocvchkctdf`
--

CREATE TABLE `kkcuocvchkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkdkg`
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `kkdkgct`
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
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkdkgctdf`
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
-- Cấu trúc bảng cho bảng `kkgiadvhdtm`
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
-- Cấu trúc bảng cho bảng `kkgiadvhdtmct`
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
-- Cấu trúc bảng cho bảng `kkgiadvhdtmctdf`
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
-- Cấu trúc bảng cho bảng `kkgiadvlt`
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
-- Cấu trúc bảng cho bảng `kkgiadvltct`
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
-- Cấu trúc bảng cho bảng `kkgiadvltctdf`
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
-- Cấu trúc bảng cho bảng `kkgiaetanol`
--

CREATE TABLE `kkgiaetanol` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiaetanolct`
--

CREATE TABLE `kkgiaetanolct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiaetanolctdf`
--

CREATE TABLE `kkgiaetanolctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiagiay`
--

CREATE TABLE `kkgiagiay` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiagiayct`
--

CREATE TABLE `kkgiagiayct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiagiayctdf`
--

CREATE TABLE `kkgiagiayctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiakcbtn`
--

CREATE TABLE `kkgiakcbtn` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiakcbtnct`
--

CREATE TABLE `kkgiakcbtnct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiakcbtnctdf`
--

CREATE TABLE `kkgiakcbtnctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiasach`
--

CREATE TABLE `kkgiasach` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiasachct`
--

CREATE TABLE `kkgiasachct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiasachctdf`
--

CREATE TABLE `kkgiasachctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiatacn`
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
-- Cấu trúc bảng cho bảng `kkgiatacnct`
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
-- Cấu trúc bảng cho bảng `kkgiatacnctdf`
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
-- Cấu trúc bảng cho bảng `kkgiathan`
--

CREATE TABLE `kkgiathan` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiathanct`
--

CREATE TABLE `kkgiathanct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiathanctdf`
--

CREATE TABLE `kkgiathanctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiavlxd`
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
-- Cấu trúc bảng cho bảng `kkgiavlxdct`
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
-- Cấu trúc bảng cho bảng `kkgiavlxdctdf`
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
-- Cấu trúc bảng cho bảng `kkgiavtxb`
--

CREATE TABLE `kkgiavtxb` (
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
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiavtxbct`
--

CREATE TABLE `kkgiavtxbct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiavtxbctdf`
--

CREATE TABLE `kkgiavtxbctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tthhdv` text COLLATE utf8_unicode_ci,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thuevat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kkgiavtxtx`
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
-- Cấu trúc bảng cho bảng `kkgiavtxtxct`
--

CREATE TABLE `kkgiavtxtxct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `madichvu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaixe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
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
-- Cấu trúc bảng cho bảng `kkgiavtxtxctdf`
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
-- Cấu trúc bảng cho bảng `kkgiaxmtxd`
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
-- Cấu trúc bảng cho bảng `kkgiaxmtxdct`
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
-- Cấu trúc bảng cho bảng `kkgiaxmtxdctdf`
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
-- Cấu trúc bảng cho bảng `kkgs`
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
-- Cấu trúc bảng cho bảng `kkgsct`
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
-- Cấu trúc bảng cho bảng `kkgsctdf`
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
-- Cấu trúc bảng cho bảng `lephitruocba`
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
-- Cấu trúc bảng cho bảng `lephitruocbact`
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
-- Cấu trúc bảng cho bảng `lephitruocbactdf`
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
-- Cấu trúc bảng cho bảng `loaivbqlnn`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
(67, '2018_11_13_141757_create_dmgiadvgddt_table', 1),
(68, '2018_11_13_144350_create_giadvgddt_table', 1),
(69, '2018_11_13_145111_create_giadvgddtctdf_table', 1),
(70, '2018_11_13_145357_create_giadvgddtct_table', 1),
(71, '2018_11_14_092955_create_dmgiathuemuanhaxh_table', 1),
(72, '2018_11_14_100203_create_giathuemuanhaxh_table', 1),
(73, '2018_11_14_100403_create_giathuemuanhaxhctdf_table', 1),
(74, '2018_11_14_100412_create_giathuemuanhaxhct_table', 1),
(75, '2018_11_20_093809_create_kkgiatacn_table', 1),
(76, '2018_11_20_093843_create_kkgiatacnctdf_table', 1),
(77, '2018_11_20_093850_create_kkgiatacnct_table', 1),
(78, '2018_11_22_094519_create_giavtxk_table', 1),
(79, '2018_11_22_094529_create_giavtxkctdf_table', 1),
(80, '2018_11_22_094536_create_giavtxkct_table', 1),
(81, '2018_11_29_143107_create_ngaynghile_table', 1),
(82, '2018_12_04_092145_create_kkgiavtxtx_table', 1),
(83, '2018_12_04_092935_create_kkgiavtxtxctdf_table', 1),
(84, '2018_12_04_133347_create_kkgiavtxtxct_table', 1),
(85, '2018_12_10_173115_create_dmthamdinhgiahh_table', 1),
(86, '2018_12_10_173442_create_dmctthamdinhgiahh_table', 1),
(87, '2018_12_11_095329_create_thamdinhgiahh_table', 1),
(88, '2018_12_11_095342_create_thamdinhgiahhctdf_table', 1),
(89, '2018_12_11_095351_create_thamdinhgiahhct_table', 1),
(90, '2018_12_12_091849_create_thgiahhdvk_table', 1),
(91, '2018_12_12_091903_create_thgiahhdvkctdf_table', 1),
(92, '2018_12_12_091910_create_thgiahhdvkct_table', 1),
(93, '2018_12_13_104322_create_dkgdoanhnghiep_table', 1),
(94, '2018_12_14_092929_create_dkghoso_table', 1),
(95, '2018_12_14_095408_create_dmhanghoa_cpi_table', 1),
(96, '2018_12_14_095427_create_hsgia_cpi_table', 1),
(97, '2018_12_14_095442_create_hsgia_chitiet_cpi_table', 1),
(98, '2018_12_14_095457_create_hstonghop_chitiet_cpi_table', 1),
(99, '2018_12_14_152539_create_dkghosoctdf_table', 1),
(100, '2018_12_25_154217_create_dmvlxd_table', 1),
(101, '2018_12_26_094917_create_kkgiavlxd_table', 1),
(102, '2019_01_05_100612_create_kkgiavlxdctdf_table', 1),
(103, '2019_01_05_110017_create_kkgiavlxdct_table', 1),
(104, '2019_01_05_144656_create_kkdkg_table', 1),
(105, '2019_01_05_144706_create_kkdkgct_table', 1),
(106, '2019_01_05_144715_create_kkdkgctdf_table', 1),
(107, '2019_01_05_165248_create_kkgiaxmtxd_table', 1),
(108, '2019_01_05_165550_create_kkgiaxmtxdctdf_table', 1),
(109, '2019_01_05_165558_create_kkgiaxmtxdct_table', 1),
(110, '2019_01_06_094056_create_kkgiadvhdtm_table', 1),
(111, '2019_01_06_094105_create_kkgiadvhdtmct_table', 1),
(112, '2019_01_06_094112_create_kkgiadvhdtmctdf_table', 1),
(113, '2019_01_09_172822_create_thanhlytaisan_table', 1),
(114, '2019_01_16_141257_create_dmhanghoa_table', 1),
(115, '2019_01_16_141700_create_dmnhomhanghoa_table', 1),
(116, '2019_01_21_093851_create_cungcapgia_table', 1),
(117, '2019_01_21_093903_create_cungcapgiactdf_table', 1),
(118, '2019_01_21_093910_create_cungcapgiact_table', 1),
(119, '2019_01_28_184408_create_muataisan_table', 1),
(120, '2019_01_30_093711_create_chisogiatieudung_table', 1),
(121, '2019_03_14_090625_create_kkgiavtxb_table', 1),
(122, '2019_03_14_102243_create_kkgiavtxbctdf_table', 1),
(123, '2019_03_18_101123_create_kkgiavtxbct_table', 1),
(124, '2019_03_20_090650_create_giagocvlxd_table', 1),
(125, '2019_03_21_092949_create_giagocvlxdct_table', 1),
(126, '2019_03_21_093720_create_giagocvlxdctdf_table', 1),
(127, '2019_03_25_100756_create_thgiagocvlxd_table', 1),
(128, '2019_03_25_142921_create_thgiagocvlxdct_table', 1),
(129, '2019_03_28_103520_create_kkcuocvchk_table', 1),
(130, '2019_03_28_103649_create_kkcuocvchkct_table', 1),
(131, '2019_03_28_143939_create_kkcuocvchkctdf_table', 1),
(132, '2019_04_02_083733_create_kkgiathan_table', 1),
(133, '2019_04_02_083851_create_kkgiathanctdf_table', 1),
(134, '2019_04_02_083858_create_kkgiathanct_table', 1),
(135, '2019_04_02_094750_create_kkgiagiay_table', 1),
(136, '2019_04_02_094801_create_kkgiagiayctdf_table', 1),
(137, '2019_04_02_094808_create_kkgiagiayct_table', 1),
(138, '2019_04_02_141411_create_kkgiasach_table', 1),
(139, '2019_04_02_141421_create_kkgiasachctdf_table', 1),
(140, '2019_04_02_141429_create_kkgiasachct_table', 1),
(141, '2019_04_03_090306_create_kkgiaetanol_table', 1),
(142, '2019_04_03_090317_create_kkgiaetanolct_table', 1),
(143, '2019_04_03_090324_create_kkgiaetanolctdf_table', 1),
(144, '2019_04_04_145144_create_kkgiakcbtn_table', 1),
(145, '2019_04_04_145156_create_kkgiakcbtnctdf_table', 1),
(146, '2019_04_04_145203_create_kkgiakcbtnct_table', 1),
(147, '2019_05_06_081746_create_gianuocshct_table', 1),
(148, '2019_05_06_101112_create_dkghosoct_table', 1),
(149, '2019_05_06_101157_create_hstonghop_cpi_table', 1),
(150, '2019_05_07_090938_create_giacacloaidath_table', 1),
(151, '2019_05_15_083308_create_giadatduan_table', 1),
(152, '2019_05_15_090615_create_dmgiadatduan_table', 1),
(153, '2019_06_26_084357_create_giathuenhactxd_table', 1),
(154, '2019_07_12_164937_create_giadatdiaban_table', 1),
(155, '2019_07_15_095229_create_giadatdiabandm_table', 1),
(156, '2019_08_03_095203_create_giathitruongtt_table', 1),
(157, '2019_08_03_120749_create_giathitruongdm_table', 1),
(158, '2019_08_05_090605_create_giathitruong_table', 1),
(159, '2019_08_05_090730_create_giathitruongct_table', 1),
(160, '2019_08_08_095154_create_dmnganhkd_table', 1),
(161, '2019_08_08_095216_create_dmnghekd_table', 1),
(162, '2019_08_09_101321_create_companylvcc_table', 1),
(163, '2019_08_21_145259_create_ttdntdct_table', 1),
(164, '2019_08_22_150553_create_jobs_table', 1),
(165, '2019_08_22_150605_create_failed_jobs_table', 1),
(166, '2019_09_16_100259_create_giathuenhacongvu_table', 2),
(167, '2019_09_16_100610_create_bannhataidinhcu_table', 2),
(168, '2019_09_16_151054_create_gianuocsachshdm_table', 3),
(169, '2019_09_21_142221_create_daugiadatts_table', 4),
(170, '2019_09_21_142232_create_daugiadattsct_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muataisan`
--

CREATE TABLE `muataisan` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
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
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngaynghile`
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
-- Cấu trúc bảng cho bảng `nhomdvkcb`
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
-- Cấu trúc bảng cho bảng `nhomhhdvk`
--

CREATE TABLE `nhomhhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomlephitruocba`
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
-- Cấu trúc bảng cho bảng `nhomthuetn`
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

--
-- Đang đổ dữ liệu cho bảng `nhomthuetn`
--

INSERT INTO `nhomthuetn` (`id`, `manhom`, `tennhom`, `sapxep`, `theodoi`, `created_at`, `updated_at`) VALUES
(2, '01', 'GIÁ TÍNH THUẾ TÀI NGUYÊN ĐỐI VỚI KHOÁNG SẢN KHÔNG KIM LOẠI', '2', 'TD', NULL, NULL),
(3, '02', 'GIÁ TÍNH THUẾ TÀI NGUYÊN ĐỐI VỚI SẢN PHẨM CỦA RỪNG TỰ NHIÊN', '3', 'TD', NULL, NULL),
(4, '03', 'GIÁ TÍNH THUẾ TÀI NGUYÊN ĐỐI VỚI HẢI SẢN TỰ NHIÊN', '4', 'TD', NULL, '2019-09-06 07:41:54'),
(5, '04', 'GIÁ TÍNH THUẾ TÀI NGUYÊN ĐỐI VỚI NƯỚC THIÊN NHIÊN', NULL, 'TD', '2019-09-06 07:44:28', '2019-09-06 07:44:28'),
(6, '05', 'GIÁ TÍNH THUẾ TÀI NGUYÊN ĐỐI VỚI YẾN SÀO THIÊN NHIÊN', NULL, 'TD', '2019-09-06 07:44:28', '2019-09-06 07:44:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `philephi`
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
-- Cấu trúc bảng cho bảng `philephict`
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
-- Cấu trúc bảng cho bảng `philephictdf`
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
-- Cấu trúc bảng cho bảng `register`
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
-- Cấu trúc bảng cho bảng `thamdinhgia`
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
  `tttstd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `thamdinhgiact`
--

CREATE TABLE `thamdinhgiact` (
  `id` int(10) UNSIGNED NOT NULL,
  `mats` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `thamdinhgiactdf`
--

CREATE TABLE `thamdinhgiactdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `mats` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `thamdinhgiahh`
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
-- Cấu trúc bảng cho bảng `thamdinhgiahhct`
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
-- Cấu trúc bảng cho bảng `thamdinhgiahhctdf`
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
-- Cấu trúc bảng cho bảng `thanhlytaisan`
--

CREATE TABLE `thanhlytaisan` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sohd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayhd` date DEFAULT NULL,
  `benban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tents` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongsokt` text COLLATE utf8_unicode_ci,
  `giakhoidiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giaban` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thgiagocvlxd`
--

CREATE TABLE `thgiagocvlxd` (
  `id` int(10) UNSIGNED NOT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaybc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvbc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvcq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diabanbc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttthaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congbo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thgiagocvlxdct`
--

CREATE TABLE `thgiagocvlxdct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhhdv` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giagoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qcad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thgiahhdvk`
--

CREATE TABLE `thgiahhdvk` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaybc` date DEFAULT NULL,
  `ngaychotbc` date DEFAULT NULL,
  `ttbc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `congbo` text COLLATE utf8_unicode_ci,
  `trangthai` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thgiahhdvkct`
--

CREATE TABLE `thgiahhdvkct` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaychotbc` date DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `thgiahhdvkctdf`
--

CREATE TABLE `thgiahhdvkctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `ngaychotbc` date DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `thuetainguyen`
--

CREATE TABLE `thuetainguyen` (
  `id` int(10) UNSIGNED NOT NULL,
  `matn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cap5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuetainguyenct`
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
-- Cấu trúc bảng cho bảng `thuetainguyenctdf`
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
-- Cấu trúc bảng cho bảng `town`
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
  `tendvhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tendvcqhienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvuky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chucvukythay` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoiky` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `town`
--

INSERT INTO `town` (`id`, `mahuyen`, `maxa`, `tendv`, `town`, `district`, `diachi`, `ttlienhe`, `emailql`, `emailqt`, `songaylv`, `tendvhienthi`, `tendvcqhienthi`, `chucvuky`, `chucvukythay`, `nguoiky`, `diadanh`, `created_at`, `updated_at`) VALUES
(1, 'STCBRVT', 'PTCKHTPVT', 'Phòng TC-KH Thành Phố Vũng Tàu', NULL, 'TPVT', 'Thành Phố Vũng Tàu', '', 'phongtckhtpvungtau@gmail.com', 'phongtckhtpvungtau@gmail.com', '2', 'Phòng TC-KH Thành Phố Vũng Tàu', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Thành phố Vũng Tàu', '2019-07-12 02:08:04', '2019-07-12 02:08:04'),
(2, 'STCBRVT', 'PTCKHTPBR', 'Phòng TC-KH thành phố Bà Rịa', NULL, 'TPBR', 'Thành phố Bà Rịa', '', 'phongtckhtpbaria@gmail.com', 'phongtckhtpbaria@gmail.com', '2', 'Phòng TC-KH thành phố Bà Rịa', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Thành phố Bà Rịa', '2019-07-12 02:09:54', '2019-07-12 02:09:54'),
(3, 'STCBRVT', 'PTCKHHTT', 'Phòng TC-KH huyện Tân Thành', NULL, 'HTT', 'Huyện Tân Thành', '', 'phongtckhhtanthanh@gmail.com', 'phongtckhhtanthanh@gmail.com', '2', 'Phòng TC-KH huyện Tân Thành', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Tân Thành', '2019-07-12 02:11:34', '2019-07-12 02:11:34'),
(4, 'STCBRVT', 'PTCKHHCD', 'Phòng TC-KH huyện Châu Đức', NULL, 'HCDU', 'Huyện Châu Đức', '', 'phongtckhhchauduc@gmail.com', 'phongtckhhchauduc@gmail.com', '2', 'Phòng TC-KH huyện Châu Đức', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Châu Đức', '2019-07-12 02:13:10', '2019-07-12 02:13:10'),
(5, 'STCBRVT', 'PTCKHHLD', 'Phòng TC-KH huyện Long Điền', NULL, 'HLD', 'Huyện Long Điền', '', 'phongtckhhlongdien@gmail.com', 'phongtckhhlongdien@gmail.com', '2', 'Phòng TC-KH huyện Long Điền', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Long Điền', '2019-07-12 02:15:07', '2019-07-12 02:15:07'),
(6, 'STCBRVT', 'PTCKHHDD', 'Phòng TC-KH huyện Đất Đỏ', NULL, 'HDD', 'Huyện Đất Đỏ', '', 'phongtckhhdatdo@gmail.com', 'phongtckhhdatdo@gmail.com', '2', 'Phòng TC-KH huyện Đất Đỏ', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Đất Đỏ', '2019-07-12 02:16:33', '2019-07-12 02:16:33'),
(7, 'STCBRVT', 'PTCKHHXM', 'Phòng TC-KH huyện Xuyên Mộc', NULL, 'HXM', 'Huyện Xuyên Mộc', '', 'phongtckhhxuyenmoc@gmail.com', 'phongtckhhxuyenmoc@gmail.com', '2', 'Phòng TC-KH huyện Xuyên Mộc', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Xuyên Mộc', '2019-07-12 02:18:13', '2019-07-12 02:18:13'),
(8, 'STCBRVT', 'PTCKHHCDA', 'Phòng TC-KH huyện Côn Đảo', NULL, 'HCD', 'Huyện Côn Đảo', '', 'phongtckhhcondao@gmail.com', 'phongtckhhcondao@gmail.com', '2', 'Phòng TC-KH huyện Côn Đảo', 'Sở Tài Chính tỉnh Bà Rịa - Vũng Tàu', 'Trưởng phòng', 'Phó phòng', 'Nguyễn Văn A', 'Huyện Côn Đảo', '2019-07-12 02:19:50', '2019-07-12 02:19:50'),
(9, 'UBNDTBRVT', 'UBNDTPVT', 'UBND Thành phố Vũng Tàu', NULL, 'TPVT', '89 Lý Thường Kiệt, Phường 1, Thành phố Vũng Tàu, tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: 0254 3852 677 - Fax: 0254 3857 021 - Email: vungtau@baria-vungtau.gov.vn', 'ubndtpvungtau@gmail.com', 'ubndtpvungtau@gmail.com', '2', 'UBND Thành phố Vũng Tàu', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Thành phố Vũng Tàu', '2019-07-12 07:06:01', '2019-07-12 07:06:01'),
(10, 'UBNDTBRVT', 'UBNDTPBR', 'UBND Thành phố Bà Rịa', NULL, 'TPBR', '137 Đường 27/4 phường Phước Hiệp,Thành phố Bà Rịa, tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: (0254)3825105 - Fax: (0254)3828514 - Email: baria@baria-vungtau.gov.vn ', 'ubndtpbaria@gmail.com', 'ubndtpbaria@gmail.com', '2', 'UBND Thành phố Bà Rịa', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Thành phố Bà Rịa', '2019-07-12 07:08:02', '2019-07-12 07:08:02'),
(11, 'UBNDTBRVT', 'UBNDHLD', 'UBND huyện Long Điền', NULL, 'HLD', 'Số 310, đường Võ Thị Sáu, thị trấn Long Điền, huyện Long Điền, tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: 02543.862 019 - Email: longdien@baria-vungtau.gov.vn ', 'ubndhlongdien@gmail.com', 'ubndhlongdien@gmail.com', '2', 'UBND huyện Long Điền', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Huyện Long Điền', '2019-07-12 07:09:34', '2019-07-12 07:14:15'),
(12, 'UBNDTBRVT', 'UBNDHDD', 'UBND huyện Đất Đỏ', NULL, 'HDD', 'Khu phố Hoà Hội, thị trấn Đất Đỏ, huyện Đất Đỏ, tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: 0254 3688244 - Email: datdo@baria-vungtau.gov.vn', 'ubndhdatdo@gmail.com', 'ubndhdatdo@gmail.com', '2', 'UBND huyện Đất Đỏ', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Huyện Đất Đỏ', '2019-07-12 07:12:03', '2019-07-12 07:12:03'),
(13, 'UBNDTBRVT', 'UBNDHCD', 'UBND huyện Châu Đức', NULL, 'HCDU', '70 Trần Hưng Đạo, thị trấn Ngãi Giao, Huyện Châu Đức - Tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: (0254-)3881109 - 3883158, Fax: (0254-)3961781 - 3883158, Email: chauduc@baria-vungtau.gov.vn', 'ubndhchauduc@gmail.com', 'ubndhchauduc@gmail.com', '2', 'UBND huyện Châu Đức', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Huyện Châu Đức', '2019-07-12 07:13:53', '2019-07-12 07:13:53'),
(14, 'UBNDTBRVT', 'UBNDHXM', 'UBND huyện Xuyên Mộc', NULL, 'HXM', '151 Quốc lộ 55 TT Phước Bửu - Huyện Xuyên Mộc - Tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: 0254.3771667, Fax: 0254.3874165. Email: xuyenmoc@baria-vungtau.gov.vn', 'ubndhxuyenmoc@gmail.com', 'ubndhxuyenmoc@gmail.com', '2', 'UBND huyện Xuyên Mộc', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Huyện Xuyên Mộc', '2019-07-12 07:17:57', '2019-07-12 07:17:57'),
(15, 'UBNDTBRVT', 'UBNDHCDA', 'UBND huyện Côn Đảo', NULL, 'HCD', 'Số 28 đường Tôn Đức Thắng, huyện Côn Đảo, Tỉnh Bà Rịa - Vũng Tàu', 'Điện thoại: (0254) 3830.157 - Fax: (0254) 3830206, Email: condao@baria-vungtau.gov.vn', 'ubndhcondao@gmail.com', 'ubndhcondao@gmail.com', '2', 'UBND huyện Côn Đảo', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Chủ tịch', 'Phó chủ tịch', 'Nguyễn Văn A', 'Huyện Côn Đảo', '2019-07-12 07:19:43', '2019-07-12 07:19:43'),
(16, 'SXDBRVT', 'PVLXD', 'Phòng Vật liệu xây dựng', NULL, 'TPVT', 'Thành Phố Vũng Tàu', '', 'phongvatlieuxaydung@gmail.com', '', '5', 'Sở Xây Dựng', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Giám đốc', 'Phó Giám đốc', 'Nguyễn Văn A', 'Thành phố Vũng Tàu', '2019-09-05 08:44:29', '2019-09-05 08:44:29'),
(17, 'SYTBRVT', 'PYT', 'Phòng Y Tế', NULL, 'TPBR', 'Thành Phố Vũng Tàu', '', 'phongyte@gmail.com', '', '5', 'Sở Y Tế', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Giám đốc', 'Phó Giám đốc', 'Nguyễn Văn A', 'Bà Rịa - Vũng Tàu', '2019-09-05 09:10:25', '2019-09-05 09:10:25'),
(18, 'SGTVTBRVT', 'PQLVT', 'Phòng quản lý vận tải', NULL, '', 'Thành Phố Vũng Tàu', '', 'phongqlvantai@gmail.com', '', '5', 'Sở Giao Thông Vận Tải', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Giám đốc', 'Phó Giám đốc', 'Nguyễn Văn A', 'Bà Rịa - Vũng Tàu', '2019-09-05 09:13:10', '2019-09-05 09:13:10'),
(19, 'SCTTBRVT', 'PCT', 'Phòng Công Thương', NULL, 'TPBR', 'Bà Rịa- vũng tàu', '', 'phongcongthuong@gmail.com', '', '5', 'Sở Công Thương', 'UBND tỉnh Bà Rịa - Vũng Tàu', 'Giám đốc', 'Phó Giám đốc', 'Nguyễn Văn A', 'Bà Rịa - Vũng Tàu', '2019-09-05 09:53:27', '2019-09-05 09:53:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttdntd`
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
-- Cấu trúc bảng cho bảng `ttdntdct`
--

CREATE TABLE `ttdntdct` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manganh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manghe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `maxa`, `mahuyen`, `town`, `district`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `ttnguoitao`, `phanloai`, `created_at`, `updated_at`) VALUES
(1, 'Sở tài chính tỉnh Bà Rịa- Vũng Tàu', 'sotaichinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STCBRVT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiadatduan\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"daugiadatts\":{\"index\":\"1\"},\"kkdaugiadatts\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thdaugiadatts\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuetn\":{\"index\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiarung\":{\"index\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"gianuocsh\":{\"index\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathitruong\":{\"index\":\"1\"},\"dmgiathitruong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathitruong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathitruong\":{\"approve\":\"1\",\"edit\":\"1\",\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"thgiagocvlxd\":{\"index\":\"1\",\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"kkny\":{\"index\":\"1\"},\"thkknygia\":{\"search\":\"1\",\"baocao\":\"1\",\"edit\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-07-11 09:38:53', '2019-09-21 07:17:43'),
(2, 'Phòng TC-KH Thành Phố Vũng Tàu', 'phongtckhtpvungtau', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHTPVT', 'STCBRVT', NULL, 'TPVT', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:08:04', '2019-07-12 02:08:04'),
(3, 'Phòng TC-KH thành phố Bà Rịa', 'phongtckhtpbaria', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHTPBR', 'STCBRVT', NULL, 'TPBR', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:09:54', '2019-07-12 02:09:54'),
(4, 'Phòng TC-KH huyện Tân Thành', 'phongtckhhtanthanh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHTT', 'STCBRVT', NULL, 'HTT', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:11:34', '2019-07-12 02:11:34'),
(5, 'Phòng TC-KH huyện Châu Đức', 'phongtckhhchauduc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHCD', 'STCBRVT', NULL, 'HCDU', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:13:10', '2019-07-12 02:13:10'),
(6, 'Phòng TC-KH huyện Long Điền', 'phongtckhhlongdien', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHLD', 'STCBRVT', NULL, 'HLD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:15:07', '2019-07-12 02:15:07'),
(7, 'Phòng TC-KH huyện Đất Đỏ', 'phongtckhhdatdo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHDD', 'STCBRVT', NULL, 'HDD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:16:33', '2019-07-12 02:16:33'),
(8, 'Phòng TC-KH huyện Xuyên Mộc', 'phongtckhhxuyenmoc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHXM', 'STCBRVT', NULL, 'HXM', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:18:13', '2019-07-12 02:18:13'),
(9, 'Phòng TC-KH huyện Côn Đảo', 'phongtckhhcondao', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCKHHCDA', 'STCBRVT', NULL, 'HCD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:19:50', '2019-07-12 02:19:50'),
(10, 'UBND Tỉnh Bà Rịa -Vũng Tàu', 'ubndtinh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'UBNDTBRVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 02:22:58', '2019-07-12 02:22:58'),
(11, 'UBND Thành phố Vũng Tàu', 'ubndtpvungtau', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDTPVT', 'UBNDTBRVT', NULL, 'TPVT', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:06:01', '2019-07-12 07:06:01'),
(12, 'UBND Thành phố Bà Rịa', 'ubndtpbaria', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDTPBR', 'UBNDTBRVT', NULL, 'TPBR', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:08:02', '2019-07-12 07:08:02'),
(13, 'UBND huyện Long Điền', 'ubndhlongdien', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDHLD', 'UBNDTBRVT', NULL, 'HLD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:09:34', '2019-07-12 07:09:34'),
(14, 'UBND huyện Đất Đỏ', 'ubndhdatdo', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDHDD', 'UBNDTBRVT', NULL, 'HDD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:12:03', '2019-07-12 07:12:03'),
(15, 'UBND huyện Châu Đức', 'ubndhchauduc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDHCD', 'UBNDTBRVT', NULL, 'HCDU', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:13:53', '2019-07-12 07:13:53'),
(16, 'UBND huyện Xuyên Mộc', 'ubndhxuyenmoc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDHXM', 'UBNDTBRVT', NULL, 'HXM', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:17:57', '2019-07-12 07:17:57'),
(17, 'UBND huyện Côn Đảo', 'ubndhcondao', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'UBNDHCDA', 'UBNDTBRVT', NULL, 'HCD', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:19:43', '2019-07-12 07:19:43'),
(18, 'Sở Công Thương Tỉnh Bà Rịa - Vũng Tàu', 'socongthuong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SCTTBRVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:28:57', '2019-07-12 07:28:57'),
(19, 'Sở Y Tế Bà Rịa - Vũng Tàu', 'soyte', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SYTBRVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:30:37', '2019-07-12 07:30:37'),
(20, 'Sở Giáo dục và đào tạo Bà Rịa - Vũng Tàu', 'sogiaoducdaotao', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SGDDTBRVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:32:31', '2019-07-12 07:32:31'),
(21, 'Sở Nông nghiệp và phát triển nông thông Bà Rịa - Vũng Tàu', 'sonnptnt', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SNNPTNNBRVT', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:35:04', '2019-07-12 07:35:04'),
(22, 'Sở Xây dựng Bà Rịa - Vũng Tàu', 'soxaydung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SXDBRVT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathuenhacongvu\":{\"index\":\"1\"},\"kkgiathuenhacongvu\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuenhacongvu\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"bannhataidinhcu\":{\"index\":\"1\"},\"kkbannhataidinhcu\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thbannhataidinhcu\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiagocvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiagocvlxd\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"kkny\":{\"index\":\"1\",\"approve\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:36:46', '2019-09-16 02:58:08'),
(23, 'Sở Tài Nguyên và Môi trường Bà Rịa - Vũng Tàu', 'sotainguyenmoitruong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STNMTBRVT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadatduan\":{\"index\":\"1\"},\"kkgiadatduan\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadatduan\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giadaugiadat\":{\"index\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:39:15', '2019-09-09 05:01:13'),
(24, 'Sở Giao thông vận tải Bà Rịa - Vũng Tàu', 'sogiaothongvantai', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'SGTVTBRVT', NULL, NULL, 'H', NULL, '{\"csdlmucgiahhdv\":{\"index\":\"1\"},\"dmgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiacldat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"thgiacldat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiadaugiadat\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadaugiadat\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kkgiathuetn\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetn\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiathuedatnuoc\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuedatnuoc\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiarung\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiarung\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiathuemuanhaxh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuemuanhaxh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgianuocsh\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgianuocsh\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"kkgiathuetscong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiathuetscong\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvgddt\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvgddt\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"dmgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\"},\"kkgiadvkcb\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"thgiadvkcb\":{\"baocao\":\"1\",\"congbo\":\"1\",\"timkiem\":\"1\"},\"giathitruong\":{\"index\":\"1\"},\"kkgiathitruong\":{\"index\":\"1\",\"create\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"approve\":\"1\"},\"kknygia\":{\"index\":\"1\"},\"ttdn\":{\"approve\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\"},\"vbqlnn\":{\"index\":\"1\"},\"vbgia\":{\"index\":\"1\"}}', NULL, NULL, NULL, NULL, NULL, '2019-07-12 07:41:27', '2019-09-05 08:18:03'),
(25, 'Phòng Vật liệu xây dựng', 'phongvatlieuxaydung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PVLXD', 'SXDBRVT', NULL, 'TPVT', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-05 08:44:29', '2019-09-05 08:44:29'),
(26, 'Phòng Y Tế', 'phongyte', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PYT', 'SYTBRVT', NULL, 'TPBR', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-05 09:10:25', '2019-09-05 09:10:25'),
(27, 'Phòng quản lý vận tải', 'phongqlvantai', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PQLVT', 'SGTVTBRVT', NULL, '', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-05 09:13:10', '2019-09-05 09:13:10'),
(28, 'Phòng Công Thương', 'phongcongthuong', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PCT', 'SCTTBRVT', NULL, 'TPBR', 'X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-05 09:53:28', '2019-09-05 09:53:28'),
(29, 'Doanh nghiệp TPCNTE', 'paviet', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '09876543', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:29:14', '2019-09-10 03:29:14'),
(30, 'Doanh nghiệp TPCNTE', 'pavietnam123', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '12344566', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:31:56', '2019-09-10 03:31:56'),
(31, 'Doanh nghiêp Xăng dầu 01', 'minh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', 'uuuuu', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:50:48', '2019-09-10 03:50:48'),
(32, 'Doanh nghiêp Xăng dầu 01', 'minh1', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '21212121', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:53:39', '2019-09-10 03:53:39'),
(33, 'Doanh nghiêp Xăng dầu 01', 'minh12', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '2121212112', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:55:04', '2019-09-10 03:55:04'),
(34, 'Doanh nghiêp Xăng dầu 01', 'minh2', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '21212121121', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:56:43', '2019-09-10 03:56:43'),
(35, 'Doanh nghiêp Xăng dầu 01', 'minh23', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '2121212112111', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:58:50', '2019-09-10 03:58:50'),
(36, 'Doanh nghiêp Xăng dầu 01', 'minhv', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', '21212121121111', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 03:59:36', '2019-09-10 03:59:36'),
(37, 'Doanh nghiêp Xăng dầu 01', 'minhabc', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Chờ xét duyệt', 'abc', NULL, NULL, NULL, 'DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-09-10 04:00:15', '2019-09-10 04:00:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanbanqlnn`
--

CREATE TABLE `vanbanqlnn` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Cấu trúc bảng cho bảng `viewpage`
--

CREATE TABLE `viewpage` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `viewpage`
--

INSERT INTO `viewpage` (`id`, `ip`, `session`, `created_at`, `updated_at`) VALUES
(1, '::1', '7dvzlDRzbggFdKJfREIigVXLr2zudn3csmeiYIW0', '2019-09-05 06:54:09', '2019-09-05 06:54:09'),
(2, '::1', 'JOiL9sG8sqosPxDRc1e71iWQlGAIhbDCC9HPzITH', '2019-09-05 08:16:00', '2019-09-05 08:16:00'),
(3, '::1', 'VOvlu1Ld0d3sqQ9MWmud7rUAzDfqvE3aHUpR5fNg', '2019-09-06 01:28:24', '2019-09-06 01:28:24'),
(4, '::1', 'XXQ4IHF4NK5oiWm8CgJ6sJYxepB7kaqKL4juEsNF', '2019-09-09 02:29:07', '2019-09-09 02:29:07'),
(5, '::1', 'Vyn7QyCyoUFikpRq6U7hr57kJ6YfVjOyUAQ9pX7U', '2019-09-09 02:29:07', '2019-09-09 02:29:07'),
(6, '::1', '7KcFThcn8Iff2xJXtNwqzeKYPsutkbIyz5YBwBzh', '2019-09-09 03:07:18', '2019-09-09 03:07:18'),
(7, '::1', 'pzr8Lp9lLOFJ7TV2v8uRFKVxahhNjxR8ZMY9jqo6', '2019-09-10 03:22:53', '2019-09-10 03:22:53'),
(8, '::1', 'rHltZVdevYDCEcr6598uqR8mYjvqaYstmOkxi2In', '2019-09-12 01:50:42', '2019-09-12 01:50:42'),
(9, '::1', 'jDw3B2NJWWqTxFr6JtdPfaLhHkSzVUXSDP4jE8DP', '2019-09-12 01:50:42', '2019-09-12 01:50:42'),
(10, '::1', 'KFMU9LjY7pYdiJaCQbHtVYdUDJQ6jbUB7PJ3JjJH', '2019-09-13 01:43:58', '2019-09-13 01:43:58'),
(11, '::1', 'vift6rV7h20mf5pYMIt52rVfR7PlnxzatjjoT1jc', '2019-09-13 01:43:58', '2019-09-13 01:43:58'),
(12, '::1', '8oFgUfwvuwR55W8Lg7KE8Qsv0zne0GvrdVOj4VSY', '2019-09-13 01:50:15', '2019-09-13 01:50:15'),
(13, '::1', 'nO1hcEcw9kAi004ulsfKvNBFsXWbq1PLKowfSI0t', '2019-09-14 01:53:32', '2019-09-14 01:53:32'),
(14, '::1', 'VUoR3AnO9Ot0nqE18QwRv89hFjplqWX5Rt9uMjRu', '2019-09-14 01:53:32', '2019-09-14 01:53:32'),
(15, '::1', 'kfp4Lo8U9UscOPdAt0GmysYtTiEiejKLQFbZFDjj', '2019-09-14 07:25:15', '2019-09-14 07:25:15'),
(16, '::1', 'udU7vlo0nAlTupMBeqj8DfA1kWbhkNt4DTNIbrgT', '2019-09-16 02:33:26', '2019-09-16 02:33:26'),
(17, '::1', 'G8rE6KcN2weN11Fo4pIMjIoWfr14TepNbHgunkgg', '2019-09-16 07:36:18', '2019-09-16 07:36:18'),
(18, '::1', 'AkFDooBlM6MnRBR7IzrZVmCYxTx81XljSBJZeZzD', '2019-09-17 09:12:31', '2019-09-17 09:12:31'),
(19, '::1', 'jaNgylhglZLRkQUaOmdDHFMTFodCcDOG5UxPPRZB', '2019-09-18 07:46:05', '2019-09-18 07:46:05'),
(20, '::1', '6mvnmkkVT0CuDAXSrnXEAWLDCX2oA2DgV3qPCPu2', '2019-09-19 06:48:43', '2019-09-19 06:48:43'),
(21, '::1', 'KrVMJZkIDEWIkrwPQDLP2msd1HqDJ8JoHUswyMXY', '2019-09-21 07:02:53', '2019-09-21 07:02:53'),
(22, '::1', 'fSxiBktD1kLTT5TxABsRk1Z3EDfPzO2zUA2qAsl4', '2019-09-21 07:02:53', '2019-09-21 07:02:53'),
(23, '::1', 'mqiN1Aoe4vlTo4lQo0Zhz7ocrUI3mgOjIBwM2gLp', '2019-09-23 01:52:36', '2019-09-23 01:52:36'),
(24, '::1', 'hJ7SryUnzZNsMCDac1I5NZmwE1fxdkamihr38MW6', '2019-09-23 01:52:36', '2019-09-23 01:52:36'),
(25, '::1', 'zYMewBqJEkguBjTZJRogKo7DdBhOMI4zqCq3Ovsz', '2019-09-23 08:16:20', '2019-09-23 08:16:20'),
(26, '::1', 'RbCg9kGqIsaqPTriuYE7tNse68C87FoMUCJj4TPF', '2019-09-23 11:56:53', '2019-09-23 11:56:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bannhataidinhcu`
--
ALTER TABLE `bannhataidinhcu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhongia`
--
ALTER TABLE `binhongia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhongiact`
--
ALTER TABLE `binhongiact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhongiactdf`
--
ALTER TABLE `binhongiactdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chisogiatieudung`
--
ALTER TABLE `chisogiatieudung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `companylvcc`
--
ALTER TABLE `companylvcc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cskddvlt`
--
ALTER TABLE `cskddvlt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cungcapgia`
--
ALTER TABLE `cungcapgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cungcapgiact`
--
ALTER TABLE `cungcapgiact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cungcapgiactdf`
--
ALTER TABLE `cungcapgiactdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daugiadat`
--
ALTER TABLE `daugiadat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daugiadatct`
--
ALTER TABLE `daugiadatct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daugiadatctdf`
--
ALTER TABLE `daugiadatctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daugiadatts`
--
ALTER TABLE `daugiadatts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `daugiadattsct`
--
ALTER TABLE `daugiadattsct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diabanhd`
--
ALTER TABLE `diabanhd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dkgdoanhnghiep`
--
ALTER TABLE `dkgdoanhnghiep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dkghoso`
--
ALTER TABLE `dkghoso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dkghosoct`
--
ALTER TABLE `dkghosoct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dkghosoctdf`
--
ALTER TABLE `dkghosoctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmctthamdinhgiahh`
--
ALTER TABLE `dmctthamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmgiadatduan`
--
ALTER TABLE `dmgiadatduan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmgiadvgddt`
--
ALTER TABLE `dmgiadvgddt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmgiarung`
--
ALTER TABLE `dmgiarung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmgiathuemuanhaxh`
--
ALTER TABLE `dmgiathuemuanhaxh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmhanghoa`
--
ALTER TABLE `dmhanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmhanghoa_cpi`
--
ALTER TABLE `dmhanghoa_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmhhdvk`
--
ALTER TABLE `dmhhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmnganhkd`
--
ALTER TABLE `dmnganhkd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmnghekd`
--
ALTER TABLE `dmnghekd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmnhomhanghoa`
--
ALTER TABLE `dmnhomhanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmphilephi`
--
ALTER TABLE `dmphilephi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmthamdinhgiahh`
--
ALTER TABLE `dmthamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmthuetn`
--
ALTER TABLE `dmthuetn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmvlxd`
--
ALTER TABLE `dmvlxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dvkcb`
--
ALTER TABLE `dvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dvkcbct`
--
ALTER TABLE `dvkcbct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giacacloaidath`
--
ALTER TABLE `giacacloaidath`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadatdiaban`
--
ALTER TABLE `giadatdiaban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadatdiabandm`
--
ALTER TABLE `giadatdiabandm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadatduan`
--
ALTER TABLE `giadatduan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadvgddt`
--
ALTER TABLE `giadvgddt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadvgddtct`
--
ALTER TABLE `giadvgddtct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giadvgddtctdf`
--
ALTER TABLE `giadvgddtctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giagocvlxd`
--
ALTER TABLE `giagocvlxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giagocvlxdct`
--
ALTER TABLE `giagocvlxdct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giagocvlxdctdf`
--
ALTER TABLE `giagocvlxdctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giahhdvk`
--
ALTER TABLE `giahhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gianuocsachshdm`
--
ALTER TABLE `gianuocsachshdm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gianuocsh`
--
ALTER TABLE `gianuocsh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gianuocshct`
--
ALTER TABLE `gianuocshct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gianuocshctdf`
--
ALTER TABLE `gianuocshctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giarung`
--
ALTER TABLE `giarung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giarungct`
--
ALTER TABLE `giarungct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giarungctdf`
--
ALTER TABLE `giarungctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathitruong`
--
ALTER TABLE `giathitruong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathitruongct`
--
ALTER TABLE `giathitruongct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathitruongdm`
--
ALTER TABLE `giathitruongdm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathitruongtt`
--
ALTER TABLE `giathitruongtt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuemuanhaxh`
--
ALTER TABLE `giathuemuanhaxh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuemuanhaxhct`
--
ALTER TABLE `giathuemuanhaxhct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuemuanhaxhctdf`
--
ALTER TABLE `giathuemuanhaxhctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuenhacongvu`
--
ALTER TABLE `giathuenhacongvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuenhactxd`
--
ALTER TABLE `giathuenhactxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuetscong`
--
ALTER TABLE `giathuetscong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuetscongct`
--
ALTER TABLE `giathuetscongct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giathuetscongctdf`
--
ALTER TABLE `giathuetscongctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giavtxk`
--
ALTER TABLE `giavtxk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giavtxkct`
--
ALTER TABLE `giavtxkct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giavtxkctdf`
--
ALTER TABLE `giavtxkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hsgia_chitiet_cpi`
--
ALTER TABLE `hsgia_chitiet_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hsgia_cpi`
--
ALTER TABLE `hsgia_cpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hsgia_cpi_mahs_unique` (`mahs`);

--
-- Chỉ mục cho bảng `hstonghop_chitiet_cpi`
--
ALTER TABLE `hstonghop_chitiet_cpi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hstonghop_cpi`
--
ALTER TABLE `hstonghop_cpi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hstonghop_cpi_mahs_unique` (`mahs`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Chỉ mục cho bảng `kkcuocvchk`
--
ALTER TABLE `kkcuocvchk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkcuocvchkct`
--
ALTER TABLE `kkcuocvchkct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkcuocvchkctdf`
--
ALTER TABLE `kkcuocvchkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkdkg`
--
ALTER TABLE `kkdkg`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkdkgct`
--
ALTER TABLE `kkdkgct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkdkgctdf`
--
ALTER TABLE `kkdkgctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvhdtm`
--
ALTER TABLE `kkgiadvhdtm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvhdtmct`
--
ALTER TABLE `kkgiadvhdtmct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvhdtmctdf`
--
ALTER TABLE `kkgiadvhdtmctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvlt`
--
ALTER TABLE `kkgiadvlt`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaetanol`
--
ALTER TABLE `kkgiaetanol`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaetanolct`
--
ALTER TABLE `kkgiaetanolct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaetanolctdf`
--
ALTER TABLE `kkgiaetanolctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiagiay`
--
ALTER TABLE `kkgiagiay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiagiayct`
--
ALTER TABLE `kkgiagiayct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiagiayctdf`
--
ALTER TABLE `kkgiagiayctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiakcbtn`
--
ALTER TABLE `kkgiakcbtn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiakcbtnct`
--
ALTER TABLE `kkgiakcbtnct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiakcbtnctdf`
--
ALTER TABLE `kkgiakcbtnctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiasach`
--
ALTER TABLE `kkgiasach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiasachct`
--
ALTER TABLE `kkgiasachct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiasachctdf`
--
ALTER TABLE `kkgiasachctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiatacn`
--
ALTER TABLE `kkgiatacn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiatacnct`
--
ALTER TABLE `kkgiatacnct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiatacnctdf`
--
ALTER TABLE `kkgiatacnctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiathan`
--
ALTER TABLE `kkgiathan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiathanct`
--
ALTER TABLE `kkgiathanct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiathanctdf`
--
ALTER TABLE `kkgiathanctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavlxd`
--
ALTER TABLE `kkgiavlxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavlxdct`
--
ALTER TABLE `kkgiavlxdct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavlxdctdf`
--
ALTER TABLE `kkgiavlxdctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxb`
--
ALTER TABLE `kkgiavtxb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxbct`
--
ALTER TABLE `kkgiavtxbct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxbctdf`
--
ALTER TABLE `kkgiavtxbctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxtx`
--
ALTER TABLE `kkgiavtxtx`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxtxct`
--
ALTER TABLE `kkgiavtxtxct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiavtxtxctdf`
--
ALTER TABLE `kkgiavtxtxctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaxmtxd`
--
ALTER TABLE `kkgiaxmtxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaxmtxdct`
--
ALTER TABLE `kkgiaxmtxdct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgiaxmtxdctdf`
--
ALTER TABLE `kkgiaxmtxdctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgs`
--
ALTER TABLE `kkgs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgsct`
--
ALTER TABLE `kkgsct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kkgsctdf`
--
ALTER TABLE `kkgsctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lephitruocba`
--
ALTER TABLE `lephitruocba`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lephitruocbactdf`
--
ALTER TABLE `lephitruocbactdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaivbqlnn`
--
ALTER TABLE `loaivbqlnn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muataisan`
--
ALTER TABLE `muataisan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ngaynghile`
--
ALTER TABLE `ngaynghile`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhomdvkcb`
--
ALTER TABLE `nhomdvkcb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `philephi`
--
ALTER TABLE `philephi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `philephict`
--
ALTER TABLE `philephict`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `philephictdf`
--
ALTER TABLE `philephictdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgia`
--
ALTER TABLE `thamdinhgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgiahh`
--
ALTER TABLE `thamdinhgiahh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgiahhct`
--
ALTER TABLE `thamdinhgiahhct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thamdinhgiahhctdf`
--
ALTER TABLE `thamdinhgiahhctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanhlytaisan`
--
ALTER TABLE `thanhlytaisan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thgiagocvlxd`
--
ALTER TABLE `thgiagocvlxd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thgiagocvlxdct`
--
ALTER TABLE `thgiagocvlxdct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thgiahhdvk`
--
ALTER TABLE `thgiahhdvk`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thgiahhdvkct`
--
ALTER TABLE `thgiahhdvkct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thgiahhdvkctdf`
--
ALTER TABLE `thgiahhdvkctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuetainguyen`
--
ALTER TABLE `thuetainguyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `town`
--
ALTER TABLE `town`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttdntd`
--
ALTER TABLE `ttdntd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ttdntdct`
--
ALTER TABLE `ttdntdct`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `vanbanqlnn`
--
ALTER TABLE `vanbanqlnn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `viewpage`
--
ALTER TABLE `viewpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bannhataidinhcu`
--
ALTER TABLE `bannhataidinhcu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `binhongia`
--
ALTER TABLE `binhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `binhongiact`
--
ALTER TABLE `binhongiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `binhongiactdf`
--
ALTER TABLE `binhongiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `chisogiatieudung`
--
ALTER TABLE `chisogiatieudung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `companylvcc`
--
ALTER TABLE `companylvcc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cungcapgia`
--
ALTER TABLE `cungcapgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cungcapgiact`
--
ALTER TABLE `cungcapgiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `cungcapgiactdf`
--
ALTER TABLE `cungcapgiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `daugiadat`
--
ALTER TABLE `daugiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `daugiadatct`
--
ALTER TABLE `daugiadatct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `daugiadatctdf`
--
ALTER TABLE `daugiadatctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `daugiadatts`
--
ALTER TABLE `daugiadatts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `daugiadattsct`
--
ALTER TABLE `daugiadattsct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `diabanhd`
--
ALTER TABLE `diabanhd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `dkgdoanhnghiep`
--
ALTER TABLE `dkgdoanhnghiep`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dkghoso`
--
ALTER TABLE `dkghoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dkghosoct`
--
ALTER TABLE `dkghosoct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dkghosoctdf`
--
ALTER TABLE `dkghosoctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmctthamdinhgiahh`
--
ALTER TABLE `dmctthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmgiadatduan`
--
ALTER TABLE `dmgiadatduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `dmgiadvgddt`
--
ALTER TABLE `dmgiadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmgiarung`
--
ALTER TABLE `dmgiarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dmgiathuemuanhaxh`
--
ALTER TABLE `dmgiathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmhanghoa`
--
ALTER TABLE `dmhanghoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmhanghoa_cpi`
--
ALTER TABLE `dmhanghoa_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmhhdvk`
--
ALTER TABLE `dmhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmnganhkd`
--
ALTER TABLE `dmnganhkd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `dmnghekd`
--
ALTER TABLE `dmnghekd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `dmnhomhanghoa`
--
ALTER TABLE `dmnhomhanghoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmphilephi`
--
ALTER TABLE `dmphilephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmthamdinhgiahh`
--
ALTER TABLE `dmthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmthuetn`
--
ALTER TABLE `dmthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=807;
--
-- AUTO_INCREMENT cho bảng `dmvlxd`
--
ALTER TABLE `dmvlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dvkcb`
--
ALTER TABLE `dvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dvkcbct`
--
ALTER TABLE `dvkcbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giacacloaidath`
--
ALTER TABLE `giacacloaidath`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giadatdiaban`
--
ALTER TABLE `giadatdiaban`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giadatdiabandm`
--
ALTER TABLE `giadatdiabandm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `giadatduan`
--
ALTER TABLE `giadatduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giadvgddt`
--
ALTER TABLE `giadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giadvgddtct`
--
ALTER TABLE `giadvgddtct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giadvgddtctdf`
--
ALTER TABLE `giadvgddtctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giagocvlxd`
--
ALTER TABLE `giagocvlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giagocvlxdct`
--
ALTER TABLE `giagocvlxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giagocvlxdctdf`
--
ALTER TABLE `giagocvlxdctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giahhdvk`
--
ALTER TABLE `giahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `gianuocsachshdm`
--
ALTER TABLE `gianuocsachshdm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `gianuocsh`
--
ALTER TABLE `gianuocsh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `gianuocshct`
--
ALTER TABLE `gianuocshct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
--
-- AUTO_INCREMENT cho bảng `gianuocshctdf`
--
ALTER TABLE `gianuocshctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giarung`
--
ALTER TABLE `giarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giarungct`
--
ALTER TABLE `giarungct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giarungctdf`
--
ALTER TABLE `giarungctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathitruong`
--
ALTER TABLE `giathitruong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathitruongct`
--
ALTER TABLE `giathitruongct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT cho bảng `giathitruongdm`
--
ALTER TABLE `giathitruongdm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT cho bảng `giathitruongtt`
--
ALTER TABLE `giathitruongtt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxh`
--
ALTER TABLE `giathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxhct`
--
ALTER TABLE `giathuemuanhaxhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxhctdf`
--
ALTER TABLE `giathuemuanhaxhctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuenhacongvu`
--
ALTER TABLE `giathuenhacongvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giathuenhactxd`
--
ALTER TABLE `giathuenhactxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuetscong`
--
ALTER TABLE `giathuetscong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuetscongct`
--
ALTER TABLE `giathuetscongct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuetscongctdf`
--
ALTER TABLE `giathuetscongctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giavtxk`
--
ALTER TABLE `giavtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giavtxkct`
--
ALTER TABLE `giavtxkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giavtxkctdf`
--
ALTER TABLE `giavtxkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hsgia_chitiet_cpi`
--
ALTER TABLE `hsgia_chitiet_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hsgia_cpi`
--
ALTER TABLE `hsgia_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hstonghop_chitiet_cpi`
--
ALTER TABLE `hstonghop_chitiet_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `hstonghop_cpi`
--
ALTER TABLE `hstonghop_cpi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkcuocvchk`
--
ALTER TABLE `kkcuocvchk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkcuocvchkct`
--
ALTER TABLE `kkcuocvchkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkcuocvchkctdf`
--
ALTER TABLE `kkcuocvchkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkdkg`
--
ALTER TABLE `kkdkg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkdkgct`
--
ALTER TABLE `kkdkgct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkdkgctdf`
--
ALTER TABLE `kkdkgctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvhdtm`
--
ALTER TABLE `kkgiadvhdtm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvhdtmct`
--
ALTER TABLE `kkgiadvhdtmct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvhdtmctdf`
--
ALTER TABLE `kkgiadvhdtmctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvlt`
--
ALTER TABLE `kkgiadvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaetanol`
--
ALTER TABLE `kkgiaetanol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaetanolct`
--
ALTER TABLE `kkgiaetanolct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaetanolctdf`
--
ALTER TABLE `kkgiaetanolctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiagiay`
--
ALTER TABLE `kkgiagiay`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiagiayct`
--
ALTER TABLE `kkgiagiayct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiagiayctdf`
--
ALTER TABLE `kkgiagiayctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiakcbtn`
--
ALTER TABLE `kkgiakcbtn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiakcbtnct`
--
ALTER TABLE `kkgiakcbtnct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiakcbtnctdf`
--
ALTER TABLE `kkgiakcbtnctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiasach`
--
ALTER TABLE `kkgiasach`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiasachct`
--
ALTER TABLE `kkgiasachct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiasachctdf`
--
ALTER TABLE `kkgiasachctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiatacn`
--
ALTER TABLE `kkgiatacn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiatacnct`
--
ALTER TABLE `kkgiatacnct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiatacnctdf`
--
ALTER TABLE `kkgiatacnctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiathan`
--
ALTER TABLE `kkgiathan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiathanct`
--
ALTER TABLE `kkgiathanct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiathanctdf`
--
ALTER TABLE `kkgiathanctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavlxd`
--
ALTER TABLE `kkgiavlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavlxdct`
--
ALTER TABLE `kkgiavlxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavlxdctdf`
--
ALTER TABLE `kkgiavlxdctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxb`
--
ALTER TABLE `kkgiavtxb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxbct`
--
ALTER TABLE `kkgiavtxbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxbctdf`
--
ALTER TABLE `kkgiavtxbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxtx`
--
ALTER TABLE `kkgiavtxtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxtxct`
--
ALTER TABLE `kkgiavtxtxct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxtxctdf`
--
ALTER TABLE `kkgiavtxtxctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaxmtxd`
--
ALTER TABLE `kkgiaxmtxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaxmtxdct`
--
ALTER TABLE `kkgiaxmtxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgiaxmtxdctdf`
--
ALTER TABLE `kkgiaxmtxdctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgs`
--
ALTER TABLE `kkgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgsct`
--
ALTER TABLE `kkgsct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `kkgsctdf`
--
ALTER TABLE `kkgsctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lephitruocba`
--
ALTER TABLE `lephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `lephitruocbactdf`
--
ALTER TABLE `lephitruocbactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loaivbqlnn`
--
ALTER TABLE `loaivbqlnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT cho bảng `muataisan`
--
ALTER TABLE `muataisan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ngaynghile`
--
ALTER TABLE `ngaynghile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nhomdvkcb`
--
ALTER TABLE `nhomdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `philephi`
--
ALTER TABLE `philephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `philephict`
--
ALTER TABLE `philephict`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `philephictdf`
--
ALTER TABLE `philephictdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `register`
--
ALTER TABLE `register`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgia`
--
ALTER TABLE `thamdinhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiahh`
--
ALTER TABLE `thamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiahhct`
--
ALTER TABLE `thamdinhgiahhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiahhctdf`
--
ALTER TABLE `thamdinhgiahhctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thanhlytaisan`
--
ALTER TABLE `thanhlytaisan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thgiagocvlxd`
--
ALTER TABLE `thgiagocvlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thgiagocvlxdct`
--
ALTER TABLE `thgiagocvlxdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thgiahhdvk`
--
ALTER TABLE `thgiahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thgiahhdvkct`
--
ALTER TABLE `thgiahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thgiahhdvkctdf`
--
ALTER TABLE `thgiahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thuetainguyen`
--
ALTER TABLE `thuetainguyen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `town`
--
ALTER TABLE `town`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `ttdntd`
--
ALTER TABLE `ttdntd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `ttdntdct`
--
ALTER TABLE `ttdntdct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT cho bảng `vanbanqlnn`
--
ALTER TABLE `vanbanqlnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `viewpage`
--
ALTER TABLE `viewpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
