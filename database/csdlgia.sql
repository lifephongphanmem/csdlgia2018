-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 18, 2019 lúc 04:15 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csdlgia`
--

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
  `trangthai` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhongia`
--

INSERT INTO `binhongia` (`id`, `ngayapdung`, `gioapdung`, `thapdung`, `mahs`, `mamh`, `soqd`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, '2018-10-05', '09:00:00', NULL, 'T1538710129', 'XD', '001', 'Mức giá bắt đầu áp dụng từ 9:00 ngày 05/10/2018', 'HHT', '2018-10-05 03:28:49', '2019-04-11 08:09:08'),
(17, '2018-10-05', '09:00:00', NULL, 'T1538811109', 'XD', 'sadsd', 'sdá', 'CB', '2018-10-06 07:31:49', '2019-04-11 08:08:46'),
(18, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2018-12-13 07:14:01', '2018-12-13 07:14:01'),
(19, '2018-01-01', '09:00:00', NULL, 'T1554969919', 'XD', 'Số quyết định 1', '213', 'CHT', '2019-04-11 08:05:19', '2019-04-11 08:05:19'),
(20, '2018-01-01', '09:00:00', NULL, 'T1554969960', 'XD', '321', '2313', 'CHT', '2019-04-11 08:06:00', '2019-04-11 08:06:00');

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

--
-- Đang đổ dữ liệu cho bảng `binhongiact`
--

INSERT INTO `binhongiact` (`id`, `mahs`, `tenhh`, `giatoithieu`, `giatoida`, `thapdung`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'T1538710129', 'A', '10000', '11000', '1', '', '2018-10-05 07:34:51', '2018-10-06 02:32:05'),
(3, 'T1538710129', 'B', '500', '1000', '2', '', '2018-10-05 07:45:12', '2018-10-05 07:45:12'),
(4, 'T1538811109', 'a', '10000', '10000', '1', '', '2018-10-06 07:31:50', '2018-10-06 07:31:50'),
(5, 'T1554969919', 'đáasdasda', '25000', '300000', '1', '', '2019-04-11 08:05:19', '2019-04-11 08:05:19'),
(6, 'T1554969960', 'đấ', '20000', '30000', '1', 'sda', '2019-04-11 08:06:00', '2019-04-11 08:06:00');

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
  `loaihinhhd` text COLLATE utf8_unicode_ci,
  `xangdau` double NOT NULL DEFAULT '0',
  `dien` double NOT NULL DEFAULT '0',
  `khidau` double DEFAULT '0',
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

INSERT INTO `company` (`id`, `maxa`, `mahuyen`, `tendn`, `diachi`, `tel`, `fax`, `email`, `diadanh`, `chucdanh`, `nguoiky`, `noidknopthue`, `settingdvvt`, `vtxk`, `vtxb`, `vtxtx`, `vtch`, `ghichu`, `trangthai`, `tailieu`, `giayphepkd`, `level`, `avatar`, `pl`, `loaihinhhd`, `xangdau`, `dien`, `khidau`, `phan`, `thuocbvtv`, `vacxingsgc`, `muoi`, `suate6t`, `duong`, `thocgao`, `thuocpcb`, `created_at`, `updated_at`) VALUES
(2, '1234567890', 'PTCQHBT', 'Công ty TNHH phát triển phần mềm Cuộc Sống1', 'Quận Hai Bà Trưng - Thành Phố Hà Nội', '0436343965', '87612121', 'minhtranlife@gmail.com', 'TP. Hà Nội', 'Giám đốc', 'Nguyễn Thị Minh Tuyết', 'Chi cục thuế TP Hà Nội', '', 0, 0, 0, 0, NULL, 'CD', 'sđa', '09876543', 'DVLT', 'no-image-available.jpg', '', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-10-15 02:43:46', '2018-10-15 08:01:34'),
(5, '0987654321', 'PTCQHBT', 'Công ty TNHH thực phẩm chức năng trẻ em ABC', 'Liên Ninh, Thanh Trì, Hà Nội', '09876543', '09876543', 'minhtranlife@gmail.com', 'Hà Nội', 'Giám đốc', 'Trần Đức Minh', 'Chi cục thuế Thanh Trì', '', 0, 0, 0, 0, NULL, 'Chờ duyệt', 'sdsad', '987yt', 'TPCNTE6T', 'no-image-available.jpg', 'SX', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-19 07:31:14', '2018-11-19 07:31:14'),
(6, '123456789', 'PTCQCG', 'Công ty TNHH thức ăn chăn nuôi ABC1', 'Liên Ninh, Thanh Trì, Hà Nội', '834567890', '09876543', 'minhtranlife@gmail.com', 'Hà Nội', 'Giám đốc', 'Trần Đức Minh', 'Chi cục thuế Thanh Trì', '', 0, 0, 0, 0, NULL, 'CD', 'sdsad', '987yt', 'TACN', 'no-image-available.jpg', 'SX', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018-11-20 02:35:18', '2018-11-20 02:36:54'),
(7, '123456789', 'PTCQCG', 'Doanh nghiệp dịch vụ vận tải', 'Liên Ninh, Thanh Trì, Hà Nội', '09876543', '09876543', 'minhtranlife@gmail.com', 'Hà Nội', 'Giám đốc', 'Trần Đức Minh', 'Chi cục thuế Thanh Trì', '{\"dvvt\":{\"vtxk\":\"1\",\"vtxb\":\"1\",\"vtxtx\":\"1\",\"vtch\":\"1\"}}', 1, 1, 1, 1, NULL, 'Chờ duyệt', 'sdsad', '987yt', 'DKG', 'no-image-available.jpg', 'dkgkhidau', '{\"dvvt\":{\"vtxk\":\"1\",\"vtxb\":\"1\",\"vtxtx\":\"1\",\"vtch\":\"1\"}}', 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2018-11-21 07:35:24', '2018-11-21 08:52:57'),
(9, '0098765432', 'PTCQCG', 'Doanh nghiệp đăng ký giá', 'Liên Ninh, Thanh Trì, Hà Nội', '09876543', '09876543', 'minhtranlife@gmail.com', 'Hà Nội', 'Giám đốc', 'Trần Đức Minh', 'Chi cục thuế Thanh Trì', '{\"dkg\":{\"xangdau\":\"1\",\"dien\":\"1\",\"khidau\":\"1\",\"phan\":\"1\",\"thuocbvtv\":\"1\",\"vacxingsgc\":\"1\",\"muoi\":\"1\",\"suate6t\":\"1\",\"duong\":\"1\",\"thocgao\":\"1\",\"thuocpcb\":\"1\"}}', 0, 0, 0, 0, NULL, 'Chờ duyệt', '98765', '-0987654', 'DKG', 'no-image-available.jpg', 'dkgxangdau', '{\"dkg\":{\"xangdau\":\"1\",\"dien\":\"1\",\"khidau\":\"1\",\"phan\":\"1\",\"thuocbvtv\":\"1\",\"vacxingsgc\":\"1\",\"muoi\":\"1\",\"suate6t\":\"1\",\"duong\":\"1\",\"thocgao\":\"1\",\"thuocpcb\":\"1\"}}', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-06 07:39:42', '2018-12-06 07:39:42');

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

--
-- Đang đổ dữ liệu cho bảng `cskddvlt`
--

INSERT INTO `cskddvlt` (`id`, `macskd`, `maxa`, `mahuyen`, `tencskd`, `loaihang`, `diachikd`, `telkd`, `link`, `avatar`, `town`, `district`, `created_at`, `updated_at`) VALUES
(1, '1234567890_1539591802', '1234567890', 'PTCQHBT', 'Khách sạn Quốc Tế', '3', 'Hà Nội', '09876543', 'http:://phanmemcuocsong.com', 'no-image-available.jpg', '', 'QCG', '2018-10-15 08:23:22', '2018-10-16 01:54:47');

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
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diadiem` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donvi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgddbanhsdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dkdaugia` text COLLATE utf8_unicode_ci,
  `htdaugia` text COLLATE utf8_unicode_ci,
  `thdaugia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `daugiadat`
--

INSERT INTO `daugiadat` (`id`, `soqd`, `diadiem`, `donvi`, `tgdaugia`, `tgddbanhsdaugia`, `dkdaugia`, `htdaugia`, `thdaugia`, `ghichu`, `mahs`, `trangthai`, `district`, `maxa`, `mahuyen`, `created_at`, `updated_at`) VALUES
(1, '1Kèm theo Quyết định số 53/2018/QĐ-UBND ngày 31/12/2018', 'Trung tâm dịch vụ đấu giá tài sản thành phố Đà Nẵng - Địa chỉ: Số 08 Phan Bội Châu, quận Hải Châu, thành phố Đà Nẵng', 'Công ty cổ phần Lilama 7, địa chỉ: Số 332 đường 2/9 quận Hải Châu, thành phố Đà Nẵng.', 'Đến trước 16 giờ 00 ngày 12/11/2018 tại nơi có tài sản', 'Đến trước 16 giờ 00 ngày 12/11/2018 tại Trung tâm dịch vụ đấu giá tài sản thành phố Đà Nẵng.', 'Người tham gia đấu giá đã hoàn thành việc đăng ký, mua hồ sơ và nộp tiền đặt trước đúng thời hạn quy định', 'Bỏ phiếu gián tiếp', 'Trước 10 giờ 00 ngày 15/11/2018 tại Trung tâm dịch vụ đấu giá tài sản thành phố Đà Nẵng', 'Tiền mua hồ sơ 500.000 đồng/hồ sơ', 'T1541402991', 'HT', 'QCG', NULL, NULL, '2018-11-05 07:29:51', '2018-11-05 08:13:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daugiadatct`
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

--
-- Đang đổ dữ liệu cho bảng `daugiadatct`
--

INSERT INTO `daugiadatct` (`id`, `vitridiadiem`, `mucgiasan`, `mucgiadaugia`, `donvidaugia`, `mahs`, `created_at`, `updated_at`) VALUES
(1, 'Vị trí đất số 01 thửa 2 với diện tích 100.000m2', '2000000000', '2500000000', '', 'T1541402991', '2018-11-05 07:29:51', '2018-11-05 07:49:19'),
(2, 'Lô số 03, đường 12 - Khu công nghiệp Tiên Sơn - Diện tích 505.000m2', '3000000000', '0', '', NULL, '2018-11-05 07:46:11', '2018-11-05 07:46:11'),
(3, 'Lô số 03, đường 12 - Khu công nghiệp Tiên Sơn - Diện tích 505.000m2', '3000000000', '0', '', NULL, '2018-11-05 07:46:14', '2018-11-05 07:46:14'),
(4, 'Lô số 03, đường 12 - Khu công nghiệp Tiên Sơn - Diện tích 505.000m2', '3000000000', '0', '', NULL, '2018-11-05 07:46:14', '2018-11-05 07:46:14'),
(5, 'Lô số 03, đường 12 - Khu công nghiệp Tiên Sơn - Diện tích 505.000m2', '3000000000', '0', '', NULL, '2018-11-05 07:46:15', '2018-11-05 07:46:15'),
(6, 'Lô số 03, đường 12 - Khu công nghiệp Tiên Sơn - Diện tích 505.000m2', '3000000000', '0', '', NULL, '2018-11-05 07:46:26', '2018-11-05 07:46:26'),
(8, 'Lô 03 đường 12 Khu đô thị Gamuda', '15000000000', '0', '', 'T1541402991', '2018-11-05 07:47:30', '2018-11-05 07:47:30');

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
(1, NULL, 'QCG', 'Quận Cầu Giấy', 'H', '2018-10-01 08:01:14', '2018-10-01 08:01:14'),
(5, NULL, 'QHBT', 'Quận Hai Bà Trưng', 'H', '2018-10-02 03:01:39', '2018-10-02 03:01:39'),
(6, NULL, 'QBD', 'Quận Ba Đình', 'H', '2018-10-02 03:01:39', '2018-10-02 03:01:39');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `mahuyen`, `tendv`, `district`, `diachi`, `phanloaiql`, `ttlienhe`, `emailql`, `emailqt`, `created_at`, `updated_at`) VALUES
(3, 'STCHN', 'Sở Tài Chính Hà Nội', NULL, 'Thành Phố Hà Nội', NULL, '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2018-10-04 01:47:12', '2018-10-04 01:47:12');

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
  `phanloai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giayphepkd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloaidn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dkgdoanhnghiep`
--

INSERT INTO `dkgdoanhnghiep` (`id`, `maxa`, `mahuyen`, `tendn`, `diachi`, `tel`, `fax`, `email`, `ghichu`, `phanloai`, `giayphepkd`, `phanloaidn`, `username`, `created_at`, `updated_at`) VALUES
(1, '12345678910', 'PTCQCG', 'Cty Xăng dầu', 'Địa chỉ doanh nghiệp', '', '', '', '', 'dkgxangdau', '', '', NULL, '2019-01-03 07:38:15', '2019-01-03 07:38:15'),
(2, '123456789', 'PTCQHBT', 'Cty Xăng dầu 1', 'Địa chỉ doanh nghiệp 1', '', '', '', '', 'dkgxangdau', '', '', NULL, '2019-01-03 07:38:42', '2019-01-03 07:38:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dkghoso`
--

CREATE TABLE `dkghoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `dkghoso`
--

INSERT INTO `dkghoso` (`id`, `maxa`, `mahs`, `soqd`, `socongvan`, `ngayquyetdinh`, `ngaythuchien`, `trangthai`, `phanloai`, `phanloaidkg`, `ttnguoichuyen`, `ngaychuyen`, `ghichu`, `created_at`, `updated_at`) VALUES
(2, '123456789', '1234567891554968277', NULL, '23', '2018-01-01', '2018-12-31', 'DC', 'dkgkhidau', '321', 'Test chuyển', '2019-04-11', '3123', '2019-04-11 07:37:57', '2019-04-11 07:40:11'),
(3, '0098765432', '00987654321554975247', NULL, '321', '2018-01-01', '2018-12-31', 'DC', 'dkgkhidau', '321', 'tdtdtdt', '2019-04-11', '3132', '2019-04-11 09:34:07', '2019-04-11 09:34:28'),
(4, '123456789', '1234567891563375266', NULL, '0231', '2018-01-01', '2019-01-01', 'DC', 'dkgkhidau', '23132', 'ádasd', '2019-07-17', '23132', '2019-07-17 14:54:26', '2019-07-17 14:54:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `dkghosoct`
--

INSERT INTO `dkghosoct` (`id`, `mahs`, `tenhhdv`, `quycach`, `donvitinh`, `mucgiahienhanh`, `mucgiamoi`, `created_at`, `updated_at`) VALUES
(1, 'T1544841731', '12', '22', '6', 3, 4, '2018-12-15 02:42:11', '2018-12-15 02:42:11'),
(2, 'T1544841731', '1', '2', '5', 3, 4, '2018-12-15 02:42:11', '2018-12-15 02:42:11'),
(3, 'mã1544846292', 'a', 'b', '1', 25000, 30000, '2018-12-15 03:58:12', '2018-12-15 03:58:12'),
(4, 'mã1544846292', 'b', 'c', 'Lít', 20000, 22000, '2018-12-15 03:58:12', '2018-12-15 03:58:12'),
(6, NULL, '1', '2', '5', 3, 4, '2018-12-15 04:44:08', '2018-12-15 04:44:08'),
(7, NULL, '1', '2', '5', 3, 4, '2018-12-15 04:44:29', '2018-12-15 04:44:29'),
(8, NULL, '1', '2', '5', 3, 4, '2018-12-15 04:44:35', '2018-12-15 04:44:35'),
(12, 'mã1544846292', 'Tesst', 'tot', 'lit', 25000, 30000, '2018-12-15 05:55:36', '2018-12-15 05:55:36'),
(13, '00987654321544854044', '1', '2', 'kg', 3000, 40000, '2018-12-15 06:07:24', '2018-12-15 06:07:24'),
(14, '00987654321544857075', 'te', 'fa', 'a', 58200, 200000, '2018-12-15 06:57:56', '2018-12-15 06:57:56'),
(15, 'mã1546047680', 'a', 'a', 'Lít', 25000, 30000, '2018-12-29 01:41:20', '2018-12-29 01:41:20'),
(16, 'mã1546049237', 'a', 's', 'lít', 25000, 30000, '2018-12-29 02:07:17', '2018-12-29 02:07:17'),
(17, 'mã1546049532', 'a', 'a', 'lít', 10000, 20000, '2018-12-29 02:12:12', '2018-12-29 02:12:12'),
(18, '00987654321546402409', 'a', '1', 'lít', 10000, 20000, '2019-01-02 04:13:29', '2019-01-02 04:13:29'),
(19, '1234567891554955530', 'sdasd', 'adasd', 'sadas', 5000, 50000, '2019-04-11 04:05:30', '2019-04-11 04:05:30'),
(20, '1234567891554955530', 'ádasasd', 'sadasd', 'sda', 5000, 30000, '2019-04-11 04:05:31', '2019-04-11 04:05:31'),
(21, '1234567891554968277', 'sadasd', 'ádad', ' sad', 36000, 300000, '2019-04-11 07:37:58', '2019-04-11 07:37:58'),
(22, '1234567891554968277', 'dsdad', 'ádada', 'sad', 20000, 30000, '2019-04-11 07:39:21', '2019-04-11 07:39:21'),
(23, '00987654321554975247', 'sadasd', 'ádad', ' sad', 300000, 0, '2019-04-11 09:34:07', '2019-04-11 09:34:07'),
(24, '1234567891563375266', 'sadasd', 'ádad', ' sad', 0, 0, '2019-07-17 14:54:26', '2019-07-17 14:54:26');

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

--
-- Đang đổ dữ liệu cho bảng `dkghosoctdf`
--

INSERT INTO `dkghosoctdf` (`id`, `mahs`, `tenhhdv`, `quycach`, `donvitinh`, `mucgiahienhanh`, `mucgiamoi`, `created_at`, `updated_at`) VALUES
(6, '0098765432', 'sadasd', 'ádad', ' sad', 0, 0, '2019-04-11 09:34:35', '2019-04-11 09:34:35');

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

--
-- Đang đổ dữ liệu cho bảng `dmctthamdinhgiahh`
--

INSERT INTO `dmctthamdinhgiahh` (`id`, `manhom`, `nhomhh`, `tenhh`, `qccl`, `dvt`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '011', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 8 - 10kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 02:39:59', '2018-12-11 02:50:19'),
(2, '011', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng dưới 11-15kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:45:43', '2018-12-11 08:45:43'),
(3, '011', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 15,1 - 20kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:46:13', '2018-12-11 08:46:13'),
(4, '011', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 20,1 - 25kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 'TD', '2018-12-11 08:46:48', '2018-12-11 08:46:48'),
(5, '011', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 8-10kg/con)', '', 'kg', 'TD', '2018-12-11 08:47:56', '2018-12-11 08:47:56'),
(6, '011', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 11-15kg/con)', '', 'kg', 'TD', '2018-12-11 08:48:18', '2018-12-11 08:48:18'),
(7, '011', 'Con giống gia súc', 'Con giống lợn thịt lai (siêu Nạc) (Trong lượng 15,1-20kg/con)', '', 'kg', 'TD', '2018-12-11 08:48:34', '2018-12-11 08:48:34');

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

--
-- Đang đổ dữ liệu cho bảng `dmdvkcb`
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
-- Cấu trúc bảng cho bảng `dmgiadvgddt`
--

CREATE TABLE `dmgiadvgddt` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmgiadvgddt`
--

INSERT INTO `dmgiadvgddt` (`id`, `manhom`, `tennhom`, `created_at`, `updated_at`) VALUES
(1, 'GDMNGDPTCL', 'Giáo dục mầm non, giáo dục phổ thông công lập', '2018-11-13 07:32:34', '2018-11-13 07:32:34'),
(3, 'GDDHGDNNCL', 'Giáo dục đại học, giáo dục nghề nghiệp công lập thuộc tỉnh quản lý (đối với chương trình đào tạo đại trà trình độ đào tạo trung cấp, cao đẳng tại các cơ sở giáo dục công lập chưa tự đảm bảo kinh phí chi thường xuyên và chi đầu tư).                        ', '2018-11-13 07:41:42', '2018-11-13 07:41:42');

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

--
-- Đang đổ dữ liệu cho bảng `dmgiathuemuanhaxh`
--

INSERT INTO `dmgiathuemuanhaxh` (`id`, `manhom`, `tennhom`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'MTDBNXH', 'Mức giá tối đa để bán nhà ở xã hội', NULL, '2018-11-14 02:45:00', '2018-11-14 02:47:52'),
(2, 'MTDTNXH', 'Mức giá tối đa để cho thuê nhà ở xã hội                 ', NULL, '2018-11-14 02:45:26', '2018-11-14 02:45:26'),
(3, 'MTDTMNXH', 'Mức giá tối đa để cho thuê mua nhà ở xã hội                                ', NULL, '2018-11-14 02:46:01', '2018-11-14 02:46:01');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmhhdvk`
--

INSERT INTO `dmhhdvk` (`id`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `dvt`, `theodoi`, `created_at`, `updated_at`) VALUES
(3, '01', '1.001', 'Thóc tẻ thường', 'Khô', 'đ/kg', 'TD', '2018-11-26 11:45:33', '2018-11-26 11:45:33'),
(4, '01', '1.002', 'Gạo tẻ thường', '', 'đ/kg', 'TD', '2018-11-26 11:46:07', '2018-11-26 11:46:07'),
(5, '01', '1.003', 'Gạo tám thơm, nàng hương', '', 'đ/kg', 'TD', '2018-11-26 11:46:26', '2018-11-26 11:46:26'),
(6, '01', '1.004', 'Thịt lợn thăn', '', 'đ/kg', 'TD', '2018-11-26 11:46:56', '2018-11-26 11:46:56'),
(7, '01', '1.005', 'Thịt lợn mông sấn', '', 'đ/kg', 'TD', '2018-11-26 11:47:15', '2018-11-26 11:47:15'),
(8, '01', '1.006', 'Thịt bò thăn loại 1', '', 'đ/kg', 'TD', '2018-11-26 11:47:40', '2018-11-26 11:47:40'),
(9, '01', '1.007', 'Gà công nghiệp làm sẵn', '', 'đ/kg', 'TD', '2018-11-26 11:48:46', '2018-11-26 11:48:46'),
(10, '01', '1.008', 'Gà ta còn sống', '', 'đ/kg', 'TD', '2018-11-26 11:49:07', '2018-11-26 11:49:07'),
(11, '01', '1.009', 'Cá quả/lóc', '', 'đ/kg', 'TD', '2018-11-26 11:49:26', '2018-11-26 11:49:26'),
(12, '01', '1.010', 'Cá chép/trắm', '', 'đ/kg', 'TD', '2018-11-26 11:49:43', '2018-11-26 11:49:43'),
(13, '01', '1.011', 'Cá biển loại 4', '', 'đ/kg', 'TD', '2018-11-26 11:50:01', '2018-11-26 11:52:57'),
(14, '01', '1.012', 'Cá thu', '', 'đ/kg', 'TD', '2018-11-26 11:50:19', '2018-11-26 11:50:19'),
(15, '01', '1.013', 'Giò lụa', '', 'đ/kg', 'TD', '2018-11-26 11:50:34', '2018-11-26 11:50:34'),
(16, '01', '1.014', 'Rau bắp cải/cải xanh', '', 'đ/kg', 'TD', '2018-11-26 11:50:49', '2018-11-26 11:50:49'),
(17, '01', '1.015', 'Su hào/bí xanh', '', 'đ/kg', 'TD', '2018-11-26 11:51:04', '2018-11-26 11:51:04'),
(18, '01', '1.016', 'Cà chua', '', 'đ/kg', 'TD', '2018-11-26 11:54:34', '2018-11-26 11:54:34'),
(19, '01', '1.017', 'Dầu ăn thực vật', '', 'đ/lít', 'TD', '2018-11-26 11:55:23', '2018-11-27 02:30:52'),
(20, '01', '1.018', 'Muối hạt', '', 'đ/kg', 'TD', '2018-11-26 11:55:49', '2018-11-26 11:55:49'),
(21, '01', '1.019', 'Đường RE', '', 'đ/kg', 'TD', '2018-11-26 11:56:12', '2018-11-26 11:56:12'),
(22, '01', '1.020', 'Sữa', '', 'đ/kg', 'TD', '2018-11-26 11:56:29', '2018-11-26 11:56:29'),
(23, '01', '1.021', 'Bia chai HN/SG', '', 'đ/két (24 chai)', 'TD', '2018-11-27 01:57:10', '2018-11-27 02:31:06'),
(24, '01', '1.022', 'Bia hộp HN/SG', '', 'đ/thùng (24 lon)', 'TD', '2018-11-27 01:57:31', '2018-11-27 02:31:11'),
(25, '01', '1.023', 'Cocacola chai', '', 'đ/két (24 chai)', 'TD', '2018-11-27 01:57:52', '2018-11-27 02:31:17'),
(26, '01', '1.024', '7 Up lon', '', 'đ/thùng (24 lon)', 'TD', '2018-11-27 01:58:12', '2018-11-27 02:31:27'),
(27, '01', '1.025', 'Rượu vang nội chai', '', 'đ/chai 750ml', 'TD', '2018-11-27 01:58:32', '2018-11-27 02:31:32'),
(28, '01', '1.026', 'Thuốc cảm thông thường', '', 'đ/lọ 100 viên', 'TD', '2018-11-27 01:59:31', '2018-11-27 02:31:43'),
(29, '01', '1.027', 'Thuốc Ampi nội 250mg', '', 'đ/lọ 100 viên', 'TD', '2018-11-27 02:00:03', '2018-11-27 02:31:47'),
(30, '01', '1.028', 'Thuốc thú y', '', 'đ/chai', 'TD', '2018-11-27 02:00:19', '2018-11-27 02:31:55'),
(31, '01', '1.029', 'Thuốc bảo vệ thực vật', '', 'đ/chai', 'TD', '2018-11-27 02:01:28', '2018-11-27 02:32:00'),
(32, '01', '1.030', 'Thức ăn chăn nuôi sản xuất CN', '', 'đ/kg', 'TD', '2018-11-27 02:01:45', '2018-11-27 02:01:45'),
(33, '01', '1.031', 'Lốp xe máy nội Loại 1', '', 'đ/chiếc', 'TD', '2018-11-27 02:02:37', '2018-11-27 02:32:19'),
(34, '01', '1.032', 'Tivi 21 inch LG', '', 'đ/chiếc', 'TD', '2018-11-27 02:03:08', '2018-11-27 02:32:24'),
(35, '01', '1.033', 'Tủ lạnh 150l 2 cửa', '', 'đ/chiếc', 'TD', '2018-11-27 02:03:23', '2018-11-27 02:32:29'),
(36, '01', '1.034', 'Phao tròn', '', 'đ/chiếc', 'TD', '2018-11-27 02:03:38', '2018-11-27 02:32:34'),
(37, '01', '1.035', 'Phao U rê', '', 'đ/kg-đ/bao', 'TD', '2018-11-27 02:04:25', '2018-11-27 02:32:43'),
(38, '01', '1.036', 'Phân Dap', '', 'đ/kg-đ/bao', 'TD', '2018-11-27 02:05:00', '2018-11-27 02:32:55'),
(39, '01', '1.037', 'Xi măng PCB30', '', 'đ/kg-đ/bao', 'TD', '2018-11-27 02:05:19', '2018-11-27 02:32:59'),
(40, '01', '1.038', 'Thép XD phi 6-8', '', 'đ/kg', 'TD', '2018-11-27 02:05:40', '2018-11-27 02:05:40'),
(41, '01', '1.039', 'Ống nhựa phi 90 cấp I', '', 'đ/mét', 'TD', '2018-11-27 02:06:36', '2018-11-27 02:33:08'),
(42, '01', '1.040', 'Ống nhựa phi 20', '', 'đ/mét', 'TD', '2018-11-27 02:06:56', '2018-11-27 02:33:13'),
(43, '01', '1.041', 'Xăng 92', '', 'đ/lít', 'TD', '2018-11-27 02:07:19', '2018-11-27 02:33:29'),
(44, '01', '1.042', 'Dầu hỏa', '', 'đ/lít', 'TD', '2018-11-27 02:07:33', '2018-11-27 02:33:33'),
(45, '01', '1.043', 'Điêden', '', 'đ/lít', 'TD', '2018-11-27 02:07:52', '2018-11-27 02:33:37'),
(46, '01', '1.044', 'Gas Petro (VN, SG)', '', 'đ/b/13kg', 'TD', '2018-11-27 02:08:41', '2018-11-27 02:33:48'),
(47, '01', '1.045', 'Cước ôtô liên tỉnh', '', 'đ/vé', 'TD', '2018-11-27 02:09:45', '2018-11-27 02:33:55'),
(48, '01', '1.046', 'Cước taxi', '', 'đ/km', 'TD', '2018-11-27 02:10:45', '2018-11-27 02:34:05'),
(49, '01', '1.047', 'Cước xe buýt', '', 'đ/vé', 'TD', '2018-11-27 02:11:28', '2018-11-27 02:34:11'),
(50, '01', '1.048', 'Công may quần âu nam/nữ', '', 'đ/chiếc', 'TD', '2018-11-27 02:11:48', '2018-11-27 02:34:21'),
(51, '01', '1.049', 'Trông giữ xe máy', '', 'đ/lần/chiếc', 'TD', '2018-11-27 02:12:37', '2018-11-27 02:34:27'),
(52, '01', '1.050', 'Vàng 99,9% (vàng trang sức)', '', 'triệu đồng/chỉ', 'TD', '2018-11-27 02:13:33', '2018-11-27 02:34:39'),
(53, '01', '1.053', 'Đôla Mỹ (NHTM)', '', 'đ/USD', 'TD', '2018-11-27 02:16:27', '2018-11-27 02:34:46'),
(54, '01', '1.056', 'Euro (NHTM)', '', 'đ/Euro', 'TD', '2018-11-27 02:16:55', '2018-11-27 02:34:51'),
(55, '01', '1.057', 'Nhân dân tệ (NHTM)', '', 'đ/NDT', 'TD', '2018-11-27 02:17:12', '2018-11-27 02:34:56'),
(56, '02', '2.001', 'Thóc tẻ thường', '', 'đ/kg', 'TD', '2018-11-27 02:21:56', '2018-11-27 02:21:56'),
(57, '02', '2.002', 'Gạo NL loại 1', '', 'đ/kg', 'TD', '2018-11-27 02:22:12', '2018-11-27 02:22:12'),
(58, '02', '2.003', 'Gạo NL loại 2', '', 'đ/kg', 'TD', '2018-11-27 02:22:27', '2018-11-27 02:22:51'),
(59, '02', '2.004', 'Gạo TP XK 5% tấm', '', 'đ/kg', 'TD', '2018-11-27 02:22:46', '2018-11-27 02:22:46'),
(60, '02', '2.005', 'Gạo TP XK 25% tấm', '', 'đ/kg', 'TD', '2018-11-27 02:23:05', '2018-11-27 02:23:05'),
(61, '02', '2.006', 'Lợn hơi', '', 'đ/kg', 'TD', '2018-11-27 02:23:25', '2018-11-27 02:23:25'),
(62, '02', '2.007', 'Cá Basa', '', 'đ/kg', 'TD', '2018-11-27 02:23:39', '2018-11-27 02:23:39'),
(63, '02', '2.008', 'Tôm', '', 'đ/kg', 'TD', '2018-11-27 02:23:54', '2018-11-27 02:23:54'),
(64, '02', '2.009', 'Đường RE', '', 'đ/kg', 'TD', '2018-11-27 02:24:06', '2018-11-27 02:24:06'),
(65, '02', '2.010', 'Đường RS', '', 'đ/kg', 'TD', '2018-11-27 02:24:21', '2018-11-27 02:24:21'),
(66, '02', '2.011', 'Xoài', '', 'đ/kg', 'TD', '2018-11-27 02:24:45', '2018-11-27 02:24:45'),
(67, '02', '2.012', 'Thanh long', '', 'đ/kg', 'TD', '2018-11-27 02:25:01', '2018-11-27 02:25:01'),
(68, '02', '2.013', 'Cà phê nhân loại I', '', 'đ/kg', 'TD', '2018-11-27 02:25:14', '2018-11-27 02:25:14'),
(69, '02', '2.014', 'Hạt tiêu đen', '', 'đ/kg', 'TD', '2018-11-27 02:25:26', '2018-11-27 02:25:26'),
(70, '02', '2.015', 'Hạt điều', '', 'đ/kg', 'TD', '2018-11-27 02:25:38', '2018-11-27 02:25:38'),
(71, '02', '2.016', 'Chè búp tươi', '', 'đ/kg', 'TD', '2018-11-27 02:25:50', '2018-11-27 02:25:50'),
(72, '02', '2.017', 'Đậu tương (nành)', '', 'đ/kg', 'TD', '2018-11-27 02:26:01', '2018-11-27 02:26:01'),
(73, '02', '2.018', 'Lạc nhân loại I', '', 'đ/kg', 'TD', '2018-11-27 02:26:14', '2018-11-27 02:26:14'),
(74, '02', '2.019', 'Mía cây', '', 'đ/kg', 'TD', '2018-11-27 02:26:58', '2018-11-27 02:26:58'),
(75, '02', '2.020', 'Bông hạt', '', 'đ/kg', 'TD', '2018-11-27 02:27:10', '2018-11-27 02:27:10'),
(76, '02', '2.021', 'Bông xơ	', '', 'đ/kg', 'TD', '2018-11-27 02:27:26', '2018-11-27 02:27:26'),
(77, '02', '2.022', 'Sợi', '', 'đ/kg', 'TD', '2018-11-27 02:27:38', '2018-11-27 02:27:38'),
(78, '02', '2.023', 'Cao su', '', 'đ/kg', 'TD', '2018-11-27 02:27:50', '2018-11-27 02:28:10'),
(79, '02', '2.024', 'Ngô hạt', '', 'đ/kg', 'TD', '2018-11-27 02:28:03', '2018-11-27 02:28:03'),
(80, '02', '2.025', 'Sắn lát', '', 'đ/kg', 'TD', '2018-11-27 02:28:23', '2018-11-27 02:28:23'),
(81, '02', '2.026', 'Muối', '', 'đ/kg', 'TD', '2018-11-27 02:28:40', '2018-11-27 02:28:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmmhbinhongia`
--

CREATE TABLE `dmmhbinhongia` (
  `id` int(10) UNSIGNED NOT NULL,
  `mamh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenmh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hienthi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phanloai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dangkykekhai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmmhbinhongia`
--

INSERT INTO `dmmhbinhongia` (`id`, `mamh`, `tenmh`, `hienthi`, `phanloai`, `dangkykekhai`, `created_at`, `updated_at`) VALUES
(1, 'XD', 'Xăng Dầu', 'Xăng, dầu', 'dkgxangdau', 'dangky', '2018-10-04 04:38:49', '2019-07-17 15:54:42'),
(2, 'DBL', 'Điện bán lẻ', 'Điện bán lẻ', 'dkgdien', 'dangky', '2018-10-04 05:24:25', '2019-04-02 02:21:49'),
(3, 'KDMHL', 'Khí dầu mỏ hóa lỏng (LPG)', 'Khí dầu hóa lỏng', 'dkgkhidau', 'dangky', '2018-10-05 07:56:17', '2019-07-17 15:51:32'),
(4, 'PDURENPK', ' Phân đạm urê; phân NPK', 'Phân đạm ure; phân NPK', 'dkgphan', 'dangky', '2018-10-05 07:56:42', '2018-10-05 08:01:39'),
(5, 'TBVTV', 'Thuốc bảo vệ thực vật, bao gồm: thuốc trừ sâu, thuốc trừ bệnh, thuốc trừ cỏ', 'Thuốc bảo vệ thực vật', 'dkgthuocbvtv', 'dangky', '2018-10-06 02:29:14', '2018-10-18 07:15:18'),
(6, 'VXGSGC', 'Vac-xin phòng bệnh cho gia súc, gia cầm', 'Vắc xin phòng bệnh gia súc, gia cầm', 'dkgvacxingsgc', 'dangky', '2018-10-18 07:07:12', '2018-10-18 07:07:12'),
(7, 'MA', 'Muối ăn', 'Muối ăn', 'dkgmuoi', 'dangky', '2018-10-18 07:07:29', '2018-10-18 07:07:29'),
(8, 'STED6T', 'Sữa dành cho trẻ em dưới 06 tuổi', 'Sữa dành cho TE dưới 6 tuổi', 'dkgsuate6t', 'dangky', '2018-10-18 07:07:51', '2018-10-18 07:07:51'),
(9, 'DADTL', 'Đường ăn, bao gồm đường trắng và đường tinh luyện', 'Đường ăn', 'dkgduong', 'dangky', '2018-10-18 07:08:08', '2018-10-18 07:17:49'),
(10, 'TGTT', 'Thóc, gạo tẻ thường', 'Thóc, gạo tẻ thường', 'dkgthocgao', 'dangky', '2018-10-18 07:08:28', '2018-10-18 07:18:00'),
(11, 'TPCB', 'Thuốc phòng bệnh, chữa bệnh cho người thuộc danh mục thuốc chữa bệnh thiết yếu sử dụng tại cơ sở khám bệnh, chữa bệnh.', 'Thuốc phòng, chữa bệnh', 'dkgthuocpcb', 'dangky', '2018-10-18 07:08:57', '2018-10-18 07:18:18');

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

--
-- Đang đổ dữ liệu cho bảng `dmphilephi`
--

INSERT INTO `dmphilephi` (`id`, `manhom`, `tennhom`, `dvt`, `created_at`, `updated_at`) VALUES
(2, '01', 'Phí kiểm tra Nhà nước về chất lượng hàng hóa', '', '2018-12-03 05:51:43', '2018-12-03 05:51:43'),
(3, '02', 'Phí thử nghiệm chất lượng sản phẩm, vật tư, nguyên vật liệu', NULL, '2018-12-03 05:52:18', '2018-12-03 05:52:18'),
(4, '03', 'Phí đấu thầu, đấu giá', NULL, '2018-12-03 05:52:31', '2018-12-03 05:52:31'),
(5, '04', 'Phí thẩm định kết quả đấu thầu', NULL, '2018-12-03 05:52:45', '2018-12-03 05:52:45'),
(6, '05', 'Phí khai thác tư liệu tại các Bảo tàng, khu di tích lịch sử, văn hóa', NULL, '2018-12-03 05:53:06', '2018-12-03 05:53:06'),
(7, '06', 'Phí giám định di vật, cổ vật, bảo vật quốc gia', NULL, '2018-12-03 05:53:23', '2018-12-03 05:53:23'),
(8, '07', 'Phí giới thiệu việc làm', NULL, '2018-12-03 05:53:38', '2018-12-03 05:53:38'),
(9, '08', 'Phí dự thi, dự tuyển', NULL, '2018-12-03 05:53:52', '2018-12-03 05:53:52'),
(10, '09', 'Phí kiểm nghiệm trang thiết bị y tế', NULL, '2018-12-03 05:54:11', '2018-12-03 05:54:11'),
(11, '10', 'Phí kiểm định phương tiện đo lường', NULL, '2018-12-03 05:54:22', '2018-12-03 05:54:22'),
(12, '11', 'Phí giám định tư pháp', NULL, '2018-12-03 05:54:42', '2018-12-03 05:54:42'),
(13, '12', 'Phí sử dụng bến, bãi, mặt nước', NULL, '2018-12-03 05:54:53', '2018-12-03 05:54:53'),
(14, '13', 'Phí kiểm nghiệm dư lượng thuộc bảo vệ thực vật và sản phẩm thực vật', NULL, '2018-12-03 05:55:12', '2018-12-03 05:55:12'),
(15, '14', 'Phí kiểm nghiệm chất lượng thức ăn chăn nuôi', NULL, '2018-12-03 05:55:22', '2018-12-03 05:55:22'),
(16, '15', 'Phí kiểm tra vệ sinh thú y', NULL, '2018-12-03 05:55:33', '2018-12-03 05:55:33');

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

--
-- Đang đổ dữ liệu cho bảng `dmqdgiadat`
--

INSERT INTO `dmqdgiadat` (`id`, `soquyetdinh`, `sohieu`, `mota`, `ngayquyetdinh`, `ghichu`, `created_at`, `updated_at`) VALUES
(2, '001', NULL, 'Quyết định thay đổi giá đất 5 năm 2018-2023', '2018-12-31', '', '2018-10-02 04:02:36', '2018-10-02 04:02:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmthamdinhgiahh`
--

CREATE TABLE `dmthamdinhgiahh` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theodoi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tennhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmthamdinhgiahh`
--

INSERT INTO `dmthamdinhgiahh` (`id`, `manhom`, `theodoi`, `tennhom`, `created_at`, `updated_at`) VALUES
(1, '011', 'TD', 'Loại hàng hóa được tài trợ của chính phủ', '2018-12-10 10:54:56', '2018-12-11 02:51:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmthuetn`
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
-- Đang đổ dữ liệu cho bảng `dmthuetn`
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

--
-- Đang đổ dữ liệu cho bảng `dtapdungdvlt`
--

INSERT INTO `dtapdungdvlt` (`id`, `madtad`, `tendtad`, `created_at`, `updated_at`) VALUES
(1, '01', 'Khách hàng người nước ngoài', NULL, NULL),
(2, '02', 'Khách hàng đối tác', NULL, NULL),
(3, '03', 'Khách hàng đặt phòng qua mạng', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dvkcb`
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
-- Đang đổ dữ liệu cho bảng `dvkcb`
--

INSERT INTO `dvkcb` (`id`, `maxa`, `mahuyen`, `district`, `soqd`, `ngayapdung`, `trangthai`, `mahs`, `manhom`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'PTCQCG', NULL, NULL, 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-12', 'CB', 'PTCQCG1539322861', '01', 'Giá trên chưa bao gồm các vật tư ', '2018-10-12 05:41:01', '2018-10-12 07:01:13'),
(2, 'PTCQCG', NULL, NULL, '001', '2018-10-17', 'CHT', 'PTCQCG1539762510', '02', '', '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(3, 'PTCQCG', NULL, NULL, '001', '2018-10-19', 'CHT', 'PTCQCG1539921182', '02', 'GHi chú', '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(4, 'PTCQCG', NULL, NULL, '003', '2018-10-19', 'CHT', 'PTCQCG1539922809', '03', 'GHi chú', '2018-10-19 04:20:09', '2018-10-19 04:20:09');

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

--
-- Đang đổ dữ liệu cho bảng `dvkcbct`
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
(14, NULL, NULL, NULL, 'PTCQCG1539762510', 'GBBN', '02', '02', '1', 'Ngày giường bệnh ban ngày', 'ngày', NULL, NULL, NULL, '2018-10-17 07:48:30', '2018-10-17 07:48:30'),
(15, NULL, NULL, NULL, 'PTCQCG1539921182', 'HSTC', '02', '02', '1', 'Ngày điều trị Hồi sức tích cực (ICU)/ghép tạng hoặc ghép tủy hoặc ghép tế bào gốc', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(16, NULL, NULL, NULL, 'PTCQCG1539921182', 'HSCC', '02', '02', '1', 'Ngày giường bệnh Hồi sức cấp cứu', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(17, NULL, NULL, NULL, 'PTCQCG1539921182', 'BNK', '02', '02', '1', 'Ngày giường bệnh Nội khoa:', '', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(18, NULL, NULL, NULL, 'PTCQCG1539921182', 'L1', '02', 'BNK', '2', 'Loại 1: Các khoa: Truyền nhiễm, Hô hấp, Huyết học, Ung thư, Tim mạch, Tâm thần, Thần kinh, Nhi, Tiêu hoá, Thận học; Nội tiết; Dị ứng (đối với bệnh nhân dị ứng thuốc nặng: Stevens Jonhson hoặc Lyell)', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(19, NULL, NULL, NULL, 'PTCQCG1539921182', 'L2', '02', 'BNK', '2', 'Loại 2: Các Khoa: Cơ-Xương-Khớp, Da liễu, Dị ứng, Tai-Mũi-Họng, Mắt, Răng Hàm Mặt, Ngoại, Phụ -Sản không mổ; YHDT hoặc PHCN cho nhóm người bệnh tổn thương tủy sống, tai biến mạch máu não, chấn thương sọ não.', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(20, NULL, NULL, NULL, 'PTCQCG1539921182', 'L3', '02', 'BNK', '2', 'Loại 3: Các khoa: YHDT, Phục hồi chức năng', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(21, NULL, NULL, NULL, 'PTCQCG1539921182', 'BNKB', '02', '02', '1', 'Ngày giường bệnh ngoại khoa, bỏng:', '', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(22, NULL, NULL, NULL, 'PTCQCG1539921182', 'L1', '02', 'BNKB', '2', 'Loại 1: Sau các phẫu thuật loại đặc biệt; Bỏng độ 3-4 trên 70% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(23, NULL, NULL, NULL, 'PTCQCG1539921182', 'L2', '02', 'BNKB', '2', 'Loại 2: Sau các phẫu thuật loại 1; Bỏng độ 3-4 từ 25 -70% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(24, NULL, NULL, NULL, 'PTCQCG1539921182', 'L3', '02', 'BNKB', '2', 'Loại 3: Sau các phẫu thuật loại 2; Bỏng độ 2 trên 30% diện tích cơ thể, Bỏng độ 3-4 dưới 25% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(25, NULL, NULL, NULL, 'PTCQCG1539921182', 'L4', '02', 'BNKB', '2', 'Loại 4: Sau các phẫu thuật loại 3; Bỏng độ 1, độ 2 dưới 30% diện tích cơ thể', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(26, NULL, NULL, NULL, 'PTCQCG1539921182', 'GBBN', '02', '02', '1', 'Ngày giường bệnh ban ngày', 'ngày', NULL, NULL, NULL, '2018-10-19 03:53:02', '2018-10-19 03:53:02'),
(27, NULL, NULL, NULL, 'PTCQCG1539922809', 'CDHA', '03', '03', '1', 'Chuẩn đoán bằng hình ảnh', '', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(28, NULL, NULL, NULL, 'PTCQCG1539922809', 'SA', '03', 'CDHA', '2', 'Siêu âm', '', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(29, NULL, NULL, NULL, 'PTCQCG1539922809', '04C1.1.3', '03', 'SA', '3', 'Siêu âm', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(30, NULL, NULL, NULL, 'PTCQCG1539922809', '03C4.1.3', '03', 'SA', '3', 'Siêu âm + đo trục nhãn cầu', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(31, NULL, NULL, NULL, 'PTCQCG1539922809', 'saddadtt', '03', 'SA', '3', 'Siêu âm đầu dò âm đạo, trực tràng', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(32, NULL, NULL, NULL, 'PTCQCG1539922809', '03C4.1.1', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:09', '2018-10-19 04:20:09'),
(33, NULL, NULL, NULL, 'PTCQCG1539922809', '03C4.1.6', '03', 'SA', '3', 'Siêu âm Doppler màu tim + cản âm', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:10', '2018-10-19 04:20:10'),
(34, NULL, NULL, NULL, 'PTCQCG1539922809', '03C4.1.5', '03', 'SA', '3', 'Siêu âm tim gắng sức', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:10', '2018-10-19 04:20:10'),
(35, NULL, NULL, NULL, 'PTCQCG1539922809', '04C1.1.4', '03', 'SA', '3', 'Siêu âm Doppler màu tim 4 D (3D REAL TIME)', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:10', '2018-10-19 04:20:10'),
(36, NULL, NULL, NULL, 'PTCQCG1539922809', '04C1.1.5', '03', 'SA', '3', 'Siêu âm Doppler màu tim hoặc mạch máu qua thực quản', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:10', '2018-10-19 04:20:10'),
(37, NULL, NULL, NULL, 'PTCQCG1539922809', '04C1.1.6', '03', 'SA', '3', 'Siêu âm trong lòng mạch hoặc Đo dự trữ lưu lượng động mạch vành FFR', 'lần', NULL, NULL, NULL, '2018-10-19 04:20:10', '2018-10-19 04:20:10');

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

--
-- Đang đổ dữ liệu cho bảng `dvkcbctdf`
--

INSERT INTO `dvkcbctdf` (`id`, `maxa`, `mahuyen`, `district`, `madv`, `manhom`, `magoc`, `capdo`, `tendichvu`, `dvt`, `gc`, `sapxep`, `giadv`, `created_at`, `updated_at`) VALUES
(15, 'PTCQHBT', NULL, NULL, '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, NULL, '2018-10-12 04:38:59', '2018-10-12 04:38:59'),
(16, 'PTCQHBT', NULL, NULL, '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, NULL, '2018-10-12 04:38:59', '2018-10-12 04:38:59'),
(28, 'PTCQCG', NULL, NULL, '', '01', '01', '1', 'Khám bệnh', 'lần', NULL, NULL, NULL, '2018-10-16 03:16:00', '2018-10-16 03:16:00'),
(29, 'PTCQCG', NULL, NULL, '', '01', '01', '1', 'Hội chẩn để xác định ca bệnh khó (chuyên gia/ca; Chỉ áp dụng đối với trường hợp mời chuyên gia đơn vị khác đến hội chẩn tại cơ sở khám, chữa bệnh).', 'lần', NULL, NULL, NULL, '2018-10-16 03:16:00', '2018-10-16 03:16:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `general-configs`
--

INSERT INTO `general-configs` (`id`, `tendonvi`, `maqhns`, `diachi`, `tel`, `thutruong`, `ketoan`, `nguoilapbieu`, `diadanh`, `setting`, `thongtinhd`, `thoihanlt`, `thoihanvt`, `thoihangs`, `thoihantacn`, `sodvvt`, `created_at`, `updated_at`) VALUES
(1, 'Sở Tài Chính tỉnh Cuộc Sống', '09876543', 'Cuộc Sống - Thành Phố Hà Nội', 'Cuộc Sống', 'Nguyễn Thị Minh Tuyết', 'Nguyễn Thị Mỹ Hạnh', 'Nguyễn Thị Mỹ Hường', 'Cuộc Sống', '{\"csdlmucgiahhdv\":{\"index\":\"1\",\"congbo\":\"1\"},\"dinhgia\":{\"index\":\"1\"},\"giacldat\":{\"index\":\"1\",\"congbo\":\"1\"},\"giadaugiadat\":{\"index\":\"1\",\"congbo\":\"1\"},\"giathuedatnuoc\":{\"index\":\"1\",\"congbo\":\"1\"},\"giarung\":{\"index\":\"1\",\"congbo\":\"1\"},\"giathuemuanhaxh\":{\"index\":\"1\",\"congbo\":\"1\"},\"gianuocsh\":{\"index\":\"1\",\"congbo\":\"1\"},\"giathuetscong\":{\"index\":\"1\",\"congbo\":\"1\"},\"giadvgddt\":{\"index\":\"1\",\"congbo\":\"1\"},\"giadvkcb\":{\"index\":\"1\",\"congbo\":\"1\"},\"giahhdvk\":{\"index\":\"1\",\"congbo\":\"1\"},\"giathuetn\":{\"index\":\"1\",\"congbo\":\"1\"},\"gialephitruocba\":{\"index\":\"1\",\"congbo\":\"1\"},\"giaphilephi\":{\"index\":\"1\",\"congbo\":\"1\"},\"bog\":{\"index\":\"1\",\"congbo\":\"1\"},\"bpbog\":{\"index\":\"1\",\"congbo\":\"1\"},\"dangkygia\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgxangdau\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgdien\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgkhidau\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgphan\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgthuocbvtv\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgvacxingsgc\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgmuoi\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgsuate6t\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgduong\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgthocgao\":{\"index\":\"1\",\"congbo\":\"1\"},\"dkgthuocpcb\":{\"index\":\"1\",\"congbo\":\"1\"},\"kknygia\":{\"index\":\"1\",\"congbo\":\"1\"},\"kkgia\":{\"index\":\"1\"},\"dvlt\":{\"index\":\"1\",\"congbo\":\"1\"},\"tpcnte6t\":{\"index\":\"1\",\"congbo\":\"1\"},\"tacn\":{\"index\":\"1\",\"congbo\":\"1\"},\"dvvt\":{\"index\":\"1\"},\"vtxk\":{\"index\":\"1\",\"congbo\":\"1\"},\"vtxtx\":{\"index\":\"1\"},\"csdlthamdinhgia\":{\"index\":\"1\",\"congbo\":\"1\"},\"thamdinhgia\":{\"index\":\"1\",\"congbo\":\"1\"},\"thamdinhgiahh\":{\"index\":\"1\",\"congbo\":\"1\"},\"csdlvbqlnn\":{\"index\":\"1\",\"congbo\":\"1\"},\"vbgia\":{\"index\":\"1\",\"congbo\":\"1\"},\"csdlttpvctqlnn\":{\"index\":\"1\",\"congbo\":\"1\"}}', '', 0, 0, 0, 0, 0, '2018-11-07 09:17:11', '2019-01-02 07:24:20');

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
-- Đang đổ dữ liệu cho bảng `giacacloaidat`
--

INSERT INTO `giacacloaidat` (`id`, `maso`, `magoc`, `macapdo`, `capdo`, `vitri`, `hienthi`, `ngaynhap`, `soqd`, `giadat`, `sapxep`, `ghichu`, `mahuyen`, `username`, `thaotac`, `created_at`, `updated_at`) VALUES
(55, '1', NULL, '1', '1', 'Phường Mai Dịch', NULL, NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-11-06 02:06:41', '2018-11-06 02:06:41'),
(56, '1.1', '1', '1', '2', 'Đường Phạm Văn Đồng', 'Phường Mai Dịch', NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-11-06 02:09:02', '2018-11-06 02:09:02'),
(57, '1.1.1', '1.1', '1', '3', 'Ngõ 1', 'Phường Mai Dịch - Đường Phạm Văn Đồng', NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-11-06 02:09:27', '2018-11-06 02:09:27'),
(58, '1.1.1.1', '1.1.1', '1', '4', 'Ngách 1', 'Phường Mai Dịch - Đường Phạm Văn Đồng - Ngõ 1', NULL, '001', 1000000, NULL, NULL, 'QCG', NULL, NULL, '2018-11-06 02:09:50', '2018-11-26 02:45:43'),
(60, '1', NULL, '1', '1', 'Đường Kim Ngưu', NULL, NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-11-08 02:39:12', '2018-11-08 02:39:12'),
(61, '1.1', '1', '1', '2', 'Ngõ 2', 'Đường Kim Ngưu', NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-11-08 02:39:23', '2018-11-08 02:39:23'),
(62, '1.1.1', '1.1', '1', '3', 'Ngách 1', 'Đường Kim Ngưu - Ngõ 2', NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-11-08 02:39:33', '2018-11-08 02:39:33'),
(64, '1.1.2', '1.1', '2', '3', 'Ngách 2', 'Đường Kim Ngưu - Ngõ 2', NULL, NULL, 0, NULL, NULL, 'QHBT', NULL, NULL, '2018-11-08 02:39:58', '2018-11-08 02:39:58'),
(65, '1.1.1.1.1', '1.1.1.1', '1', '5', 'cách ngõ 1m', 'Phường Mai Dịch - Đường Phạm Văn Đồng - Ngõ 1 - Ngách 1', NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-12-03 11:49:57', '2018-12-03 11:49:57'),
(66, '1.1.1.1.1.1', '1.1.1.1.1', '1', '6', 'ngõ 1', 'Phường Mai Dịch - Đường Phạm Văn Đồng - Ngõ 1 - Ngách 1 - cách ngõ 1m', NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-12-03 11:50:21', '2018-12-03 11:50:21'),
(67, '1.1.1.1.1.1.1', '1.1.1.1.1.1', '1', '7', 'ngõ 2', 'Phường Mai Dịch - Đường Phạm Văn Đồng - Ngõ 1 - Ngách 1 - cách ngõ 1m - ngõ 1', NULL, NULL, 0, NULL, NULL, 'QCG', NULL, NULL, '2018-12-03 11:51:12', '2018-12-03 11:51:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giadvgddt`
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

--
-- Đang đổ dữ liệu cho bảng `giadvgddt`
--

INSERT INTO `giadvgddt` (`id`, `soqd`, `ngayapdung`, `ghichu`, `mahs`, `trangthai`, `manhom`, `created_at`, `updated_at`) VALUES
(2, 'Kèm theo Quyết định số 53/2016/QĐ-UBND ngày 31/12/20161', '2018-11-13', 'a1', 'T1542099291', 'CB', 'GDMNGDPTCL', '2018-11-13 08:54:51', '2018-11-13 09:24:51');

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

--
-- Đang đổ dữ liệu cho bảng `giadvgddtct`
--

INSERT INTO `giadvgddtct` (`id`, `mahs`, `mota`, `giadv`, `created_at`, `updated_at`) VALUES
(1, 'T1542099291', 'Trường mầm non', '52000', '2018-11-13 08:54:51', '2018-11-13 09:16:26'),
(2, 'T1542099291', 'Trung học cơ sở', '40000', '2018-11-13 09:16:08', '2018-11-13 09:16:08');

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
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdunglk` date DEFAULT NULL,
  `soqdlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giahhdvk`
--

INSERT INTO `giahhdvk` (`id`, `mahs`, `maxa`, `mahuyen`, `district`, `manhom`, `ngayapdung`, `soqd`, `ghichu`, `trangthai`, `ngayapdunglk`, `soqdlk`, `created_at`, `updated_at`) VALUES
(3, 'QCG1543635747', NULL, NULL, 'QCG', '01', '2018-12-01', '002', '', 'HT', '2018-11-18', '001', '2018-12-01 03:42:27', '2018-12-02 04:01:08');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giahhdvkct`
--

INSERT INTO `giahhdvkct` (`id`, `mahs`, `maxa`, `mahuyen`, `district`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `dvt`, `gialk`, `gia`, `created_at`, `updated_at`) VALUES
(3, 'QCG1543635747', NULL, NULL, NULL, '01', '1.001', 'Thóc tẻ thường', 'Khô', 'đ/kg', '150000', '130000', '2018-12-01 03:42:27', '2018-12-01 04:41:44'),
(4, 'QCG1543635747', NULL, NULL, NULL, '01', '1.002', 'Gạo tẻ thường', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(5, 'QCG1543635747', NULL, NULL, NULL, '01', '1.003', 'Gạo tám thơm, nàng hương', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(6, 'QCG1543635747', NULL, NULL, NULL, '01', '1.004', 'Thịt lợn thăn', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(7, 'QCG1543635747', NULL, NULL, NULL, '01', '1.005', 'Thịt lợn mông sấn', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(8, 'QCG1543635747', NULL, NULL, NULL, '01', '1.006', 'Thịt bò thăn loại 1', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(9, 'QCG1543635747', NULL, NULL, NULL, '01', '1.007', 'Gà công nghiệp làm sẵn', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(10, 'QCG1543635747', NULL, NULL, NULL, '01', '1.008', 'Gà ta còn sống', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(11, 'QCG1543635747', NULL, NULL, NULL, '01', '1.009', 'Cá quả/lóc', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(12, 'QCG1543635747', NULL, NULL, NULL, '01', '1.010', 'Cá chép/trắm', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:27', '2018-12-01 03:42:27'),
(13, 'QCG1543635747', NULL, NULL, NULL, '01', '1.011', 'Cá biển loại 4', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(14, 'QCG1543635747', NULL, NULL, NULL, '01', '1.012', 'Cá thu', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(15, 'QCG1543635747', NULL, NULL, NULL, '01', '1.013', 'Giò lụa', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(16, 'QCG1543635747', NULL, NULL, NULL, '01', '1.014', 'Rau bắp cải/cải xanh', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(17, 'QCG1543635747', NULL, NULL, NULL, '01', '1.015', 'Su hào/bí xanh', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(18, 'QCG1543635747', NULL, NULL, NULL, '01', '1.016', 'Cà chua', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(19, 'QCG1543635747', NULL, NULL, NULL, '01', '1.017', 'Dầu ăn thực vật', '', 'đ/lít', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(20, 'QCG1543635747', NULL, NULL, NULL, '01', '1.018', 'Muối hạt', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(21, 'QCG1543635747', NULL, NULL, NULL, '01', '1.019', 'Đường RE', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(22, 'QCG1543635747', NULL, NULL, NULL, '01', '1.020', 'Sữa', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(23, 'QCG1543635747', NULL, NULL, NULL, '01', '1.021', 'Bia chai HN/SG', '', 'đ/két (24 chai)', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(24, 'QCG1543635747', NULL, NULL, NULL, '01', '1.022', 'Bia hộp HN/SG', '', 'đ/thùng (24 lon)', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(25, 'QCG1543635747', NULL, NULL, NULL, '01', '1.023', 'Cocacola chai', '', 'đ/két (24 chai)', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(26, 'QCG1543635747', NULL, NULL, NULL, '01', '1.024', '7 Up lon', '', 'đ/thùng (24 lon)', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(27, 'QCG1543635747', NULL, NULL, NULL, '01', '1.025', 'Rượu vang nội chai', '', 'đ/chai 750ml', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(28, 'QCG1543635747', NULL, NULL, NULL, '01', '1.026', 'Thuốc cảm thông thường', '', 'đ/lọ 100 viên', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(29, 'QCG1543635747', NULL, NULL, NULL, '01', '1.027', 'Thuốc Ampi nội 250mg', '', 'đ/lọ 100 viên', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(30, 'QCG1543635747', NULL, NULL, NULL, '01', '1.028', 'Thuốc thú y', '', 'đ/chai', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(31, 'QCG1543635747', NULL, NULL, NULL, '01', '1.029', 'Thuốc bảo vệ thực vật', '', 'đ/chai', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(32, 'QCG1543635747', NULL, NULL, NULL, '01', '1.030', 'Thức ăn chăn nuôi sản xuất CN', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(33, 'QCG1543635747', NULL, NULL, NULL, '01', '1.031', 'Lốp xe máy nội Loại 1', '', 'đ/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(34, 'QCG1543635747', NULL, NULL, NULL, '01', '1.032', 'Tivi 21 inch LG', '', 'đ/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(35, 'QCG1543635747', NULL, NULL, NULL, '01', '1.033', 'Tủ lạnh 150l 2 cửa', '', 'đ/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(36, 'QCG1543635747', NULL, NULL, NULL, '01', '1.034', 'Phao tròn', '', 'đ/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(37, 'QCG1543635747', NULL, NULL, NULL, '01', '1.035', 'Phao U rê', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(38, 'QCG1543635747', NULL, NULL, NULL, '01', '1.036', 'Phân Dap', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(39, 'QCG1543635747', NULL, NULL, NULL, '01', '1.037', 'Xi măng PCB30', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(40, 'QCG1543635747', NULL, NULL, NULL, '01', '1.038', 'Thép XD phi 6-8', '', 'đ/kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(41, 'QCG1543635747', NULL, NULL, NULL, '01', '1.039', 'Ống nhựa phi 90 cấp I', '', 'đ/mét', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(42, 'QCG1543635747', NULL, NULL, NULL, '01', '1.040', 'Ống nhựa phi 20', '', 'đ/mét', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(43, 'QCG1543635747', NULL, NULL, NULL, '01', '1.041', 'Xăng 92', '', 'đ/lít', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(44, 'QCG1543635747', NULL, NULL, NULL, '01', '1.042', 'Dầu hỏa', '', 'đ/lít', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(45, 'QCG1543635747', NULL, NULL, NULL, '01', '1.043', 'Điêden', '', 'đ/lít', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(46, 'QCG1543635747', NULL, NULL, NULL, '01', '1.044', 'Gas Petro (VN, SG)', '', 'đ/b/13kg', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(47, 'QCG1543635747', NULL, NULL, NULL, '01', '1.045', 'Cước ôtô liên tỉnh', '', 'đ/vé', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(48, 'QCG1543635747', NULL, NULL, NULL, '01', '1.046', 'Cước taxi', '', 'đ/km', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(49, 'QCG1543635747', NULL, NULL, NULL, '01', '1.047', 'Cước xe buýt', '', 'đ/vé', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(50, 'QCG1543635747', NULL, NULL, NULL, '01', '1.048', 'Công may quần âu nam/nữ', '', 'đ/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(51, 'QCG1543635747', NULL, NULL, NULL, '01', '1.049', 'Trông giữ xe máy', '', 'đ/lần/chiếc', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(52, 'QCG1543635747', NULL, NULL, NULL, '01', '1.050', 'Vàng 99,9% (vàng trang sức)', '', 'triệu đồng/chỉ', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(53, 'QCG1543635747', NULL, NULL, NULL, '01', '1.053', 'Đôla Mỹ (NHTM)', '', 'đ/USD', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(54, 'QCG1543635747', NULL, NULL, NULL, '01', '1.056', 'Euro (NHTM)', '', 'đ/Euro', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28'),
(55, 'QCG1543635747', NULL, NULL, NULL, '01', '1.057', 'Nhân dân tệ (NHTM)', '', 'đ/NDT', NULL, NULL, '2018-12-01 03:42:28', '2018-12-01 03:42:28');

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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giahhdvkctdf`
--

INSERT INTO `giahhdvkctdf` (`id`, `maxa`, `mahuyen`, `district`, `manhom`, `mahhdv`, `tenhhdv`, `dacdiemkt`, `dvt`, `gialk`, `gia`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'QCG', '01', '1.001', 'Thóc tẻ thường', 'Khô', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(2, NULL, NULL, 'QCG', '01', '1.002', 'Gạo tẻ thường', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(3, NULL, NULL, 'QCG', '01', '1.003', 'Gạo tám thơm, nàng hương', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(4, NULL, NULL, 'QCG', '01', '1.004', 'Thịt lợn thăn', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(5, NULL, NULL, 'QCG', '01', '1.005', 'Thịt lợn mông sấn', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(6, NULL, NULL, 'QCG', '01', '1.006', 'Thịt bò thăn loại 1', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(7, NULL, NULL, 'QCG', '01', '1.007', 'Gà công nghiệp làm sẵn', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(8, NULL, NULL, 'QCG', '01', '1.008', 'Gà ta còn sống', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:39', '2018-12-10 08:41:39'),
(9, NULL, NULL, 'QCG', '01', '1.009', 'Cá quả/lóc', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(10, NULL, NULL, 'QCG', '01', '1.010', 'Cá chép/trắm', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(11, NULL, NULL, 'QCG', '01', '1.011', 'Cá biển loại 4', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(12, NULL, NULL, 'QCG', '01', '1.012', 'Cá thu', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(13, NULL, NULL, 'QCG', '01', '1.013', 'Giò lụa', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(14, NULL, NULL, 'QCG', '01', '1.014', 'Rau bắp cải/cải xanh', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(15, NULL, NULL, 'QCG', '01', '1.015', 'Su hào/bí xanh', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(16, NULL, NULL, 'QCG', '01', '1.016', 'Cà chua', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(17, NULL, NULL, 'QCG', '01', '1.017', 'Dầu ăn thực vật', '', 'đ/lít', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(18, NULL, NULL, 'QCG', '01', '1.018', 'Muối hạt', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(19, NULL, NULL, 'QCG', '01', '1.019', 'Đường RE', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(20, NULL, NULL, 'QCG', '01', '1.020', 'Sữa', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(21, NULL, NULL, 'QCG', '01', '1.021', 'Bia chai HN/SG', '', 'đ/két (24 chai)', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(22, NULL, NULL, 'QCG', '01', '1.022', 'Bia hộp HN/SG', '', 'đ/thùng (24 lon)', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(23, NULL, NULL, 'QCG', '01', '1.023', 'Cocacola chai', '', 'đ/két (24 chai)', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(24, NULL, NULL, 'QCG', '01', '1.024', '7 Up lon', '', 'đ/thùng (24 lon)', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(25, NULL, NULL, 'QCG', '01', '1.025', 'Rượu vang nội chai', '', 'đ/chai 750ml', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(26, NULL, NULL, 'QCG', '01', '1.026', 'Thuốc cảm thông thường', '', 'đ/lọ 100 viên', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(27, NULL, NULL, 'QCG', '01', '1.027', 'Thuốc Ampi nội 250mg', '', 'đ/lọ 100 viên', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(28, NULL, NULL, 'QCG', '01', '1.028', 'Thuốc thú y', '', 'đ/chai', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(29, NULL, NULL, 'QCG', '01', '1.029', 'Thuốc bảo vệ thực vật', '', 'đ/chai', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(30, NULL, NULL, 'QCG', '01', '1.030', 'Thức ăn chăn nuôi sản xuất CN', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(31, NULL, NULL, 'QCG', '01', '1.031', 'Lốp xe máy nội Loại 1', '', 'đ/chiếc', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(32, NULL, NULL, 'QCG', '01', '1.032', 'Tivi 21 inch LG', '', 'đ/chiếc', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(33, NULL, NULL, 'QCG', '01', '1.033', 'Tủ lạnh 150l 2 cửa', '', 'đ/chiếc', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(34, NULL, NULL, 'QCG', '01', '1.034', 'Phao tròn', '', 'đ/chiếc', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(35, NULL, NULL, 'QCG', '01', '1.035', 'Phao U rê', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(36, NULL, NULL, 'QCG', '01', '1.036', 'Phân Dap', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(37, NULL, NULL, 'QCG', '01', '1.037', 'Xi măng PCB30', '', 'đ/kg-đ/bao', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(38, NULL, NULL, 'QCG', '01', '1.038', 'Thép XD phi 6-8', '', 'đ/kg', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(39, NULL, NULL, 'QCG', '01', '1.039', 'Ống nhựa phi 90 cấp I', '', 'đ/mét', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(40, NULL, NULL, 'QCG', '01', '1.040', 'Ống nhựa phi 20', '', 'đ/mét', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(41, NULL, NULL, 'QCG', '01', '1.041', 'Xăng 92', '', 'đ/lít', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(42, NULL, NULL, 'QCG', '01', '1.042', 'Dầu hỏa', '', 'đ/lít', NULL, NULL, '2018-12-10 08:41:40', '2018-12-10 08:41:40'),
(43, NULL, NULL, 'QCG', '01', '1.043', 'Điêden', '', 'đ/lít', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(44, NULL, NULL, 'QCG', '01', '1.044', 'Gas Petro (VN, SG)', '', 'đ/b/13kg', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(45, NULL, NULL, 'QCG', '01', '1.045', 'Cước ôtô liên tỉnh', '', 'đ/vé', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(46, NULL, NULL, 'QCG', '01', '1.046', 'Cước taxi', '', 'đ/km', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(47, NULL, NULL, 'QCG', '01', '1.047', 'Cước xe buýt', '', 'đ/vé', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(48, NULL, NULL, 'QCG', '01', '1.048', 'Công may quần âu nam/nữ', '', 'đ/chiếc', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(49, NULL, NULL, 'QCG', '01', '1.049', 'Trông giữ xe máy', '', 'đ/lần/chiếc', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(50, NULL, NULL, 'QCG', '01', '1.050', 'Vàng 99,9% (vàng trang sức)', '', 'triệu đồng/chỉ', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(51, NULL, NULL, 'QCG', '01', '1.053', 'Đôla Mỹ (NHTM)', '', 'đ/USD', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(52, NULL, NULL, 'QCG', '01', '1.056', 'Euro (NHTM)', '', 'đ/Euro', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(53, NULL, NULL, 'QCG', '01', '1.057', 'Nhân dân tệ (NHTM)', '', 'đ/NDT', NULL, NULL, '2018-12-10 08:41:41', '2018-12-10 08:41:41'),
(54, NULL, NULL, 'QCG', '02', '2.001', 'Thóc tẻ thường', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(55, NULL, NULL, 'QCG', '02', '2.002', 'Gạo NL loại 1', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(56, NULL, NULL, 'QCG', '02', '2.003', 'Gạo NL loại 2', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(57, NULL, NULL, 'QCG', '02', '2.004', 'Gạo TP XK 5% tấm', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(58, NULL, NULL, 'QCG', '02', '2.005', 'Gạo TP XK 25% tấm', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(59, NULL, NULL, 'QCG', '02', '2.006', 'Lợn hơi', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(60, NULL, NULL, 'QCG', '02', '2.007', 'Cá Basa', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:44', '2018-12-29 02:45:44'),
(61, NULL, NULL, 'QCG', '02', '2.008', 'Tôm', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(62, NULL, NULL, 'QCG', '02', '2.009', 'Đường RE', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(63, NULL, NULL, 'QCG', '02', '2.010', 'Đường RS', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(64, NULL, NULL, 'QCG', '02', '2.011', 'Xoài', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(65, NULL, NULL, 'QCG', '02', '2.012', 'Thanh long', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(66, NULL, NULL, 'QCG', '02', '2.013', 'Cà phê nhân loại I', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(67, NULL, NULL, 'QCG', '02', '2.014', 'Hạt tiêu đen', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(68, NULL, NULL, 'QCG', '02', '2.015', 'Hạt điều', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(69, NULL, NULL, 'QCG', '02', '2.016', 'Chè búp tươi', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(70, NULL, NULL, 'QCG', '02', '2.017', 'Đậu tương (nành)', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(71, NULL, NULL, 'QCG', '02', '2.018', 'Lạc nhân loại I', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(72, NULL, NULL, 'QCG', '02', '2.019', 'Mía cây', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:45', '2018-12-29 02:45:45'),
(73, NULL, NULL, 'QCG', '02', '2.020', 'Bông hạt', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(74, NULL, NULL, 'QCG', '02', '2.021', 'Bông xơ	', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(75, NULL, NULL, 'QCG', '02', '2.022', 'Sợi', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(76, NULL, NULL, 'QCG', '02', '2.023', 'Cao su', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(77, NULL, NULL, 'QCG', '02', '2.024', 'Ngô hạt', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(78, NULL, NULL, 'QCG', '02', '2.025', 'Sắn lát', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46'),
(79, NULL, NULL, 'QCG', '02', '2.026', 'Muối', '', 'đ/kg', NULL, NULL, '2018-12-29 02:45:46', '2018-12-29 02:45:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gianuocsh`
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

--
-- Đang đổ dữ liệu cho bảng `gianuocsh`
--

INSERT INTO `gianuocsh` (`id`, `soqd`, `ngayapdung`, `ghichu`, `mahs`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'Kèm theo Quyết định số 53/2016/QĐ-UBND ngày 31/12/2016', '2018-11-12', '', 'T1542014413', 'HT', '2018-11-12 09:20:13', '2018-11-12 11:30:25'),
(2, 'Kèm theo Quyết định số 53/2016/QĐ-UBND ngày 31/12/2016', '2018-12-03', '', 'T1543828384', 'CHT', '2018-12-03 09:13:04', '2018-12-03 09:13:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gianuocshct`
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

--
-- Đang đổ dữ liệu cho bảng `gianuocshct`
--

INSERT INTO `gianuocshct` (`id`, `doituong`, `giachuathue`, `thuevat`, `giacothue`, `phibvmttyle`, `phibvmt`, `thanhtien`, `mahs`, `created_at`, `updated_at`) VALUES
(1, 'Hộ nông dân1', '2850', '150', '3000', '10', '285', '3285', 'T1542014413', '2018-11-12 09:20:13', '2018-11-12 09:20:13'),
(3, 'Kinh doanh', '1', '1', '1', '1', '1', '1', 'T1542014413', '2018-11-12 11:30:13', '2018-11-12 11:30:13');

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
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giarung`
--

INSERT INTO `giarung` (`id`, `mahs`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `district`, `created_at`, `updated_at`) VALUES
(1, 'T1539155888', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-10', 'a', 'CB', 'QHBT', '2018-10-10 07:18:08', '2018-10-10 07:37:58'),
(2, 'QHBT1541666896', 'Kèm theo Quyết định số 53/2016/QĐ-UBND ngày 31/12/20161', '2018-11-08', 'a', 'CHT', 'QHBT', '2018-11-08 08:48:16', '2018-11-08 08:50:03');

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

--
-- Đang đổ dữ liệu cho bảng `giarungct`
--

INSERT INTO `giarungct` (`id`, `mahs`, `mahuyen`, `maxa`, `district`, `manhom`, `loairung`, `mucdo`, `dongiasd`, `dongiat50`, `dongiat1`, `dongiaxp`, `created_at`, `updated_at`) VALUES
(1, 'T1539155888', 'T', NULL, NULL, 'RTN', 'Rừng gỗ trữ lượng nghèo thường xanh', 'Trung bình', '2070001', '1980001', '4000001', '3030001', '2018-10-10 07:18:08', '2018-10-10 07:29:51'),
(2, 'T1539155888', NULL, NULL, NULL, 'RTN', 'Rừng gỗ trữ lượng nghèo thường xanh', 'Trung bình', '2070000', '1980000', '4000000', '303000', '2018-10-10 07:18:08', '2018-10-10 07:18:08'),
(3, 'T1539155888', NULL, NULL, NULL, 'RTR', 'Tràm nước', 'Trung bình', '6100000', '5800000', '120000', '6799000', '2018-10-10 07:18:08', '2018-10-10 07:18:08'),
(4, 'QHBT1541666896', NULL, NULL, NULL, 'RTR', 'a11', 'dầy1', '1500000', '1600000000', '15000000', '160000000', '2018-11-08 08:48:16', '2018-11-08 08:48:16');

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
-- Cấu trúc bảng cho bảng `giathuedatnuoc`
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
-- Đang đổ dữ liệu cho bảng `giathuedatnuoc`
--

INSERT INTO `giathuedatnuoc` (`id`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `district`, `mahs`, `created_at`, `updated_at`) VALUES
(1, 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-09', NULL, 'CB', 'QCG', 'QCG1539073968', '2018-10-09 08:32:48', '2018-10-09 08:53:58');

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

--
-- Đang đổ dữ liệu cho bảng `giathuedatnuocct`
--

INSERT INTO `giathuedatnuocct` (`id`, `mahs`, `vitri`, `mota`, `dientich`, `dongia`, `created_at`, `updated_at`) VALUES
(1, 'QCG1539073968', 'Địa bàn cấp huyện thuộc Danh mục địa bàn có điều kiện kinh tế - xã hội khó khăn', 'Vùng sâu vùng xa', '1000000', '1500', '2018-10-09 08:32:48', '2018-10-09 08:32:48'),
(2, 'QCG1539073968', 'Khu Kinh tế được thành lập theo quy định của Chính phủ', 'Nhà Xưởng', '100000000', '30000', '2018-10-09 08:32:48', '2018-10-09 08:32:48'),
(3, 'QCG1539073968', 'Dự án sử dụng đất trong Cụm công nghiệp', 'Khu công nghiệp', '100000', '30000', '2018-10-09 08:32:48', '2018-10-09 08:32:48');

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
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` text COLLATE utf8_unicode_ci,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathuemuanhaxh`
--

INSERT INTO `giathuemuanhaxh` (`id`, `manhom`, `mahs`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'MTDBNXH', 'T1542183157', 'Kèm theo Quyết định số 53/2016/QĐ-UBND ngày 31/12/20161', '2018-11-14', '', 'HT', '2018-11-14 08:12:37', '2018-11-14 08:59:39');

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

--
-- Đang đổ dữ liệu cho bảng `giathuemuanhaxhct`
--

INSERT INTO `giathuemuanhaxhct` (`id`, `mahs`, `loainha`, `dongia`, `thoigian`, `hesodc`, `created_at`, `updated_at`) VALUES
(1, 'T1542183094', 'Nhà ở riêng lẻ 1 tầng', '5440100', '', 'K1', '2018-11-14 08:11:34', '2018-11-14 08:11:34'),
(2, 'T1542183157', 'Nhà ở riêng lẻ 1 tầng', '5440100', '', 'K1', '2018-11-14 08:12:37', '2018-11-14 08:12:37'),
(3, NULL, 'a', '1', '1', '1', '2018-11-14 08:25:33', '2018-11-14 08:25:33'),
(4, NULL, 'a', '1', '1', '1', '2018-11-14 08:25:34', '2018-11-14 08:25:34'),
(5, NULL, 'a', '1', '1', '1', '2018-11-14 08:25:35', '2018-11-14 08:25:35'),
(6, NULL, 'a', '1', '1', '1', '2018-11-14 08:25:38', '2018-11-14 08:25:38');

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
-- Cấu trúc bảng cho bảng `giathuetscong`
--

CREATE TABLE `giathuetscong` (
  `id` int(10) UNSIGNED NOT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thongtinhs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giathuetscong`
--

INSERT INTO `giathuetscong` (`id`, `maxa`, `mahuyen`, `district`, `nam`, `thongtinhs`, `ghichu`, `mahs`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'PTCQCG', NULL, NULL, '2018', 'Thuê tài sản công quận Cầu Giấy năm 2018', 'Ghi chú', 'PTCQCG1541993173', 'CB', '2018-11-12 03:26:13', '2018-11-12 03:31:01');

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

--
-- Đang đổ dữ liệu cho bảng `giathuetscongct`
--

INSERT INTO `giathuetscongct` (`id`, `tents`, `soluong`, `dvt`, `dongiathue`, `dvthue`, `hdthue`, `ththue`, `sotienthuenam`, `mahs`, `created_at`, `updated_at`) VALUES
(3, 'a', '1', '2', '3', '5', '4', '6', '7', 'PTCQCG1541993173', '2018-11-12 03:26:13', '2018-11-12 03:26:13');

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

--
-- Đang đổ dữ liệu cho bảng `giavtxk`
--

INSERT INTO `giavtxk` (`id`, `maxa`, `mahuyen`, `mahs`, `ngaynhap`, `ngayhieuluc`, `socv`, `socvlk`, `ngaycvlk`, `ytcauthanhgia`, `thydggadgia`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ngaychuyen`, `lydo`, `trangthai`, `plhs`, `thoihan`, `created_at`, `updated_at`) VALUES
(17, '123456789', 'PTCQHBT', '1234567891542942621', '2018-11-23', '2018-11-25', '001', '001', NULL, 'a', 'b', 'Tester', '2018-11-23', '0', '2018-11-23 15:54:44', 's', 'DD', NULL, 'Trước thời hạn', '2018-11-23 03:10:21', '2018-11-23 08:55:54');

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

--
-- Đang đổ dữ liệu cho bảng `giavtxkct`
--

INSERT INTO `giavtxkct` (`id`, `mahs`, `madichvu`, `loaixe`, `diemdau`, `diemcuoi`, `mota`, `qccl`, `dvt`, `sokm`, `sltglk`, `chiphisxkdlk`, `chiphittlk`, `chiphinllk`, `chiphinclk`, `chiphikhlk`, `chiphisxkddtlk`, `chiphiclk`, `chiphisxclk`, `chiphitclk`, `chiphibhlk`, `chiphiqllk`, `tchiphisxkdlk`, `chiphidvklk`, `giathanhtblk`, `giathanhlk`, `sltg`, `chiphisxkd`, `chiphitt`, `chiphinl`, `chiphinc`, `chiphikh`, `chiphisxkddt`, `chiphic`, `chiphisxc`, `chiphitc`, `chiphibh`, `chiphiql`, `tchiphisxkd`, `chiphidvk`, `giathanhtb`, `giathanh`, `giaitrinhctcp`, `giahllk`, `giahl`, `ghichu`, `thuevat`, `created_at`, `updated_at`) VALUES
(3, '1234567891542942621', NULL, 'Xe 7 chỗ', NULL, NULL, 'Hà Nội - Hải Phòng1', 'Quy cách chất lượng1', 'người1', '100 km1', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', NULL, NULL, NULL, 'Ghi chú1', NULL, '2018-11-23 03:10:21', '2018-11-23 03:10:21'),
(4, '1234567891542942621', NULL, 'Xe 7 chỗ', NULL, NULL, 'Hà Nội - Hải Phòng', 'Quy cách chất lượng', 'người', '100 km', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', NULL, NULL, NULL, 'Ghi chú1', NULL, '2018-11-23 03:10:21', '2018-11-23 03:10:21');

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

--
-- Đang đổ dữ liệu cho bảng `giavtxkctdf`
--

INSERT INTO `giavtxkctdf` (`id`, `maxa`, `madichvu`, `loaixe`, `diemdau`, `diemcuoi`, `mota`, `qccl`, `dvt`, `sokm`, `sltglk`, `chiphisxkdlk`, `chiphittlk`, `chiphinllk`, `chiphinclk`, `chiphikhlk`, `chiphisxkddtlk`, `chiphiclk`, `chiphisxclk`, `chiphitclk`, `chiphibhlk`, `chiphiqllk`, `tchiphisxkdlk`, `chiphidvklk`, `giathanhtblk`, `giathanhlk`, `sltg`, `chiphisxkd`, `chiphitt`, `chiphinl`, `chiphinc`, `chiphikh`, `chiphisxkddt`, `chiphic`, `chiphisxc`, `chiphitc`, `chiphibh`, `chiphiql`, `tchiphisxkd`, `chiphidvk`, `giathanhtb`, `giathanh`, `giaitrinhctcp`, `giahllk`, `giahl`, `ghichu`, `thuevat`, `created_at`, `updated_at`) VALUES
(1, '123456789', NULL, 'Xe 4 chỗ', NULL, NULL, 'Giá mở cửa1', 'Huydai i101', 'km', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '2018-12-04 02:30:06', '2018-12-05 07:50:46');

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

--
-- Đang đổ dữ liệu cho bảng `kkdkg`
--

INSERT INTO `kkdkg` (`id`, `mahs`, `maxa`, `mahuyen`, `theoqd`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ngaychuyen`, `lydo`, `trangthai`, `plhs`, `thoihan`, `phanloai`, `ghichu`, `ipt1`, `ipf1`, `ipt2`, `ipf2`, `ipt3`, `ipf3`, `ipt4`, `ipf4`, `ipt5`, `ipf5`, `created_at`, `updated_at`) VALUES
(2, '00987654321554172863', '0098765432', 'PTCQCG', 'sad ád', '2019-04-02', '0204201', '02012', '2019-02-02', '2019-04-02', 'test chuyển', NULL, NULL, '2019-04-02 09:41:34', NULL, 'CD', NULL, NULL, 'dkgxangdau', 'sadas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 02:41:03', '2019-04-02 02:41:34'),
(3, '00987654321554190123', '0098765432', 'PTCQCG', 'sad ád', '2019-04-02', '0321', '321312', '2019-01-02', '2019-04-02', NULL, NULL, NULL, NULL, NULL, 'CC', NULL, NULL, 'dkgxangdau', 'sadasdsa dsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 07:28:43', '2019-04-02 07:28:43');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kkdkgct`
--

INSERT INTO `kkdkgct` (`id`, `maxa`, `mahuyen`, `mahs`, `tenhh`, `quycach`, `dvt`, `gialk`, `giakk`, `ghichu`, `created_at`, `updated_at`) VALUES
(2, '0098765432', 'PTCQCG', '00987654321554172863', 'dâsd', 'ádasd', 'áda', '250000', '300000', NULL, '2019-04-02 02:41:03', '2019-04-02 02:41:03'),
(3, '0098765432', 'PTCQCG', '00987654321554190123', 'asdsad ad', 'ádasd', 'sadasda', '250000', '300000', NULL, '2019-04-02 07:28:43', '2019-04-02 07:28:43');

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

--
-- Đang đổ dữ liệu cho bảng `kkgiadvlt`
--

INSERT INTO `kkgiadvlt` (`id`, `mahs`, `macskd`, `maxa`, `mahuyen`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `dvt`, `plhs`, `thoihan`, `created_at`, `updated_at`) VALUES
(2, '1234567890_15395918021539674740', '1234567890_1539591802', '1234567890', 'PTCQHBT', '2018-10-16', '001', '', NULL, '2018-10-19', 'Test1', '2018-10-17', '1', '- Mức giá nêu trên đã bao gồm thuế giá GTGT', '2018-10-17 10:34:14', 'Lý do', 'DD', 'Đồng/giường/ngày đêm', NULL, 'Trước thời hạn', '2018-10-16 07:25:40', '2018-10-17 03:45:07');

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

--
-- Đang đổ dữ liệu cho bảng `kkgiadvltct`
--

INSERT INTO `kkgiadvltct` (`id`, `mahs`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `madtad`, `apdung`, `created_at`, `updated_at`) VALUES
(1, '1234567890_15395918021539674740', 'Loại 1', 'QCCL', '101,102,103,104', '', '30000', '50000', '01', NULL, '2018-10-16 07:25:40', '2018-10-16 07:25:40'),
(2, '1234567890_15395918021539674740', 'Loại 1', 'QCCL', '101,102,103,104', '', '500000', '600000', '01', NULL, '2018-10-16 07:25:40', '2018-10-16 08:50:42'),
(3, '1234567890_15395918021539674740', 'a', 'acdsxc', 'sadsa', '', '600000', '700000', '02', NULL, '2018-10-16 07:25:40', '2018-10-16 08:51:53'),
(4, '1234567890_15395918021539674740', 'A', 'A', 'A', 'A', '150000', '200000', '02', NULL, '2018-10-16 07:25:41', '2018-10-16 07:25:41'),
(5, '1234567890_15395918021539674740', 'a', 'a', 'a', NULL, '500000', '600000', '01', NULL, '2018-10-16 08:52:10', '2018-10-16 08:52:10');

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

--
-- Đang đổ dữ liệu cho bảng `kkgiadvltctdf`
--

INSERT INTO `kkgiadvltctdf` (`id`, `maxa`, `loaip`, `qccl`, `sohieu`, `ghichu`, `mucgialk`, `mucgiakk`, `madtad`, `apdung`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'Loại 1', 'QCCL', '101,102,103,104', '', '30000', '50000', '01', NULL, '2018-10-16 02:49:25', '2018-10-16 03:50:50'),
(2, '1234567890', 'Loại 1', 'QCCL', '101,102,103,104', NULL, NULL, NULL, '01', NULL, '2018-10-16 02:49:27', '2018-10-16 02:49:27'),
(13, '1234567890', 'a', 'acdsxc', 'sadsa', '', '0', '0', '02', NULL, '2018-10-16 02:56:58', '2018-10-16 03:50:30'),
(18, '1234567890', 'A', 'A', 'A', 'A', '150000', '200000', '02', NULL, '2018-10-16 03:36:02', '2018-10-16 03:50:23');

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

--
-- Đang đổ dữ liệu cho bảng `kkgiatacn`
--

INSERT INTO `kkgiatacn` (`id`, `mahs`, `maxa`, `mahuyen`, `thqd`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `plhs`, `thoihan`, `created_at`, `updated_at`) VALUES
(1, '1234567891542685220', '123456789', 'PTCQCG', 'a1', '2018-11-20', 'a1', '', NULL, '2018-11-20', 'Test', '2018-11-20', '0', '', '2018-11-20 14:42:05', 'aádsadasd', 'DD', NULL, 'Trước thời hạn', '2018-11-20 03:40:20', '2018-11-20 07:43:42'),
(3, '1234567891542700787', '123456789', 'PTCQCG', '', '2018-11-20', 'sadsad1', '', NULL, '2018-11-20', NULL, NULL, NULL, '', NULL, NULL, 'CC', NULL, NULL, '2018-11-20 07:59:47', '2018-11-20 07:59:47'),
(4, '1234567891554172210', '123456789', 'PTCQCG', 'f áda', '2019-04-02', '020', '02', '2019-01-01', '2019-04-02', NULL, NULL, NULL, '', NULL, NULL, 'CC', NULL, NULL, '2019-04-02 02:30:10', '2019-04-02 02:30:10');

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

--
-- Đang đổ dữ liệu cho bảng `kkgiatacnct`
--

INSERT INTO `kkgiatacnct` (`id`, `maxa`, `mahuyen`, `mahs`, `tenhh`, `qccl`, `dvt`, `ghichu`, `cpnvlttlk`, `cpncttlk`, `cpsxclk`, `cpnvpxlk`, `cpvllk`, `cpdcsxlk`, `cpkhtscdlk`, `cpdvmnlk`, `cpbtklk`, `cpklk`, `tcpsxlk`, `cpbhlk`, `cpqldnlk`, `cptclk`, `tgttblk`, `lndklk`, `gbctlk`, `thuettdblk`, `thuegtgtlk`, `gbdctlk`, `cpnvltt`, `cpnctt`, `cpsxc`, `cpnvpx`, `cpvl`, `cpdcsx`, `cpkhtscd`, `cpdvmn`, `cpbtk`, `cpk`, `tcpsx`, `cpbh`, `cpqldn`, `cptc`, `tgttb`, `lndk`, `gbct`, `thuettdb`, `thuegtgt`, `gbdct`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'PTCQCG', '1234567891542685220', 'a12', 'a34', 'a23', 'a45', '1', '2', NULL, '3', '4', '5', '6', '7', '8', '9', '45', '10', '11', '12', '78', '13', '14', '15', '16', '17', '17', '16', NULL, '15', '14', '13', '12', '11', '10', '9', '117', '8', '7', '6', '138', '5', '4', '3', '2', '1', '2018-11-20 03:40:20', '2018-11-20 03:58:17'),
(4, '123456789', 'PTCQCG', '1234567891542700787', 'a', 'a', 'a', 'a', '1', '1', NULL, '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '2', '0', '0', '0', '2', '2', '0', '0', NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '3', '3', '2018-11-20 07:59:47', '2018-11-20 07:59:47'),
(5, '123456789', 'PTCQCG', '1234567891554172210', 'á', 'á', 'á', 'sa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-02 02:30:10', '2019-04-02 02:30:10');

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
  `ghichu` text COLLATE utf8_unicode_ci,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kkgiavtxtx`
--

INSERT INTO `kkgiavtxtx` (`id`, `maxa`, `mahuyen`, `mahs`, `ngaynhap`, `ngayhieuluc`, `socv`, `socvlk`, `ngaycvlk`, `ytcauthanhgia`, `thydggadgia`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ngaychuyen`, `lydo`, `trangthai`, `plhs`, `thoihan`, `ghichu`, `dvt`, `created_at`, `updated_at`) VALUES
(1, '123456789', 'PTCQHBT', '1234567891543997979', '2018-12-05', '2018-12-05', '001', '', NULL, '', '', 'Test 1', '2018-12-06', '0', '2018-12-06 09:36:07', 'Test', 'DD', NULL, 'Trước thời hạn', '', NULL, '2018-12-05 08:19:39', '2018-12-06 02:39:25');

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
  `qccl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kkgiavtxtxct`
--

INSERT INTO `kkgiavtxtxct` (`id`, `mahs`, `maxa`, `madichvu`, `loaixe`, `qccl`, `mota`, `dvtlk`, `sllk`, `dongialk`, `dvt`, `sl`, `dongia`, `created_at`, `updated_at`) VALUES
(1, '1234567891543997979', '123456789', NULL, 'Loại xe khác', 'Huydai i101', 'Giá mở cửa1', 'km', '0.61', '60001', 'km', '0.51', '50001', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(2, '1234567891543997979', '123456789', NULL, 'Xe 4 chỗ', 'Huydai i10', 'Từ 601m đến 21 km ', 'km', '1', '9000', 'km', '1', '10000', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(3, '1234567891543997979', '123456789', NULL, 'Xe 4 chỗ', 'Huydai i10', 'Từ 22km tiếp theo', 'km', '1', '8500', 'km', '1', '8000', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(4, '1234567891543997979', '123456789', NULL, 'Xe 4 chỗ', 'Huydai i10', 'Thời gian chờ', 'giờ', '1', '35000', 'giờ', '1', '36000', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(5, '1234567891543997979', '123456789', NULL, 'Xe 5 chỗ', 'Toyota Vios', 'Giá từ 1.1km-> 20km', 'km', '1', '14500', 'km', '1', '15000', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(6, '1234567891543997979', '123456789', NULL, 'Xe 5 chỗ', 'Toyota Vios', 'Mở cửa', 'km', '1', '11000', 'km', '1', '10500', '2018-12-05 08:19:39', '2018-12-05 08:19:39'),
(7, '1234567891543997979', '123456789', NULL, 'Xe 5 chỗ', '', 'Giá từ 20.1km  trở lên', 'km', '1', '12000', 'km', '1', '11500', '2018-12-05 08:19:39', '2018-12-05 08:19:39');

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
  `dvtlk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sllk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongialk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dongia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `kkgs`
--

INSERT INTO `kkgs` (`id`, `mahs`, `maxa`, `mahuyen`, `thqd`, `ngaynhap`, `socv`, `socvlk`, `ngaycvlk`, `ngayhieuluc`, `ttnguoinop`, `ngaynhan`, `sohsnhan`, `ghichu`, `ngaychuyen`, `lydo`, `trangthai`, `plhs`, `thoihan`, `created_at`, `updated_at`) VALUES
(2, '09876543211542623942', '0987654321', 'PTCQHBT', 'a', '2018-11-19', 'a', '', NULL, '2018-11-19', 'h', '2018-11-19', '0', '', '2018-11-19 18:21:54', 'asadasd', 'BTL', NULL, 'Trước thời hạn', '2018-11-19 10:39:02', '2018-11-20 07:24:09');

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

--
-- Đang đổ dữ liệu cho bảng `kkgsct`
--

INSERT INTO `kkgsct` (`id`, `maxa`, `mahuyen`, `mahs`, `tenhh`, `qccl`, `dvt`, `ghichu`, `giaQlk`, `giaClk`, `giaCttlk`, `giaCvtlk`, `giaCnclk`, `giaCkhlk`, `giaCklk`, `giaCclk`, `giaCcmlk`, `giaCtclk`, `giaCbhlk`, `giaCqllk`, `giaTClk`, `giaCPlk`, `giaZlk`, `giaZdvlk`, `giaQ`, `giaC`, `giaCtt`, `giaCvt`, `giaCnc`, `giaCkh`, `giaCk`, `giaCc`, `giaCcm`, `giaCtc`, `giaCbh`, `giaCql`, `giaTC`, `giaCP`, `giaZ`, `giaZdv`, `created_at`, `updated_at`) VALUES
(1, '098765', 'PTCQCG', '0987651540974523', 'a1', 'a3', 'a2', 'a4', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '2018-10-31 08:28:43', '2018-10-31 08:28:43'),
(2, '098765', 'PTCQCG', '0987651540974523', 'd', 'da', 'd', 'da', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '2018-10-31 08:43:51', '2018-10-31 08:46:51'),
(3, '0987654321', 'PTCQHBT', '09876543211542623942', 'a1', 'a3', 'a2', 'a4', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '2018-11-19 10:39:02', '2018-11-19 10:39:02');

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

--
-- Đang đổ dữ liệu cho bảng `kkgsctdf`
--

INSERT INTO `kkgsctdf` (`id`, `maxa`, `tenhh`, `qccl`, `dvt`, `ghichu`, `giaQlk`, `giaClk`, `giaCttlk`, `giaCvtlk`, `giaCnclk`, `giaCkhlk`, `giaCklk`, `giaCclk`, `giaCcmlk`, `giaCtclk`, `giaCbhlk`, `giaCqllk`, `giaTClk`, `giaCPlk`, `giaZlk`, `giaZdvlk`, `giaQ`, `giaC`, `giaCtt`, `giaCvt`, `giaCnc`, `giaCkh`, `giaCk`, `giaCc`, `giaCcm`, `giaCtc`, `giaCbh`, `giaCql`, `giaTC`, `giaCP`, `giaZ`, `giaZdv`, `created_at`, `updated_at`) VALUES
(2, '0987654321', 'a1', 'a3', 'a2', 'a4', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '2018-11-19 09:15:01', '2018-11-19 10:38:48');

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

--
-- Đang đổ dữ liệu cho bảng `lephitruocba`
--

INSERT INTO `lephitruocba` (`id`, `mahs`, `soqd`, `ngayapdung`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'T1539053227', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-01-01', 'HT', '2018-10-09 02:47:07', '2018-10-09 03:48:57'),
(2, 'T1539155764', 'Số 2018/QĐ-BTC ngày 09/10/2017', '2018-10-10', 'HT', '2018-10-10 07:16:05', '2018-11-09 08:31:56');

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

--
-- Đang đổ dữ liệu cho bảng `lephitruocbact`
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
(52, '2018_10_18_111812_create_giahhdvkct_table', 40),
(53, '2018_10_22_085407_create_vanbanqlnn_table', 41),
(54, '2018_10_22_091816_create_loaivbqlnn_table', 41),
(55, '2018_10_31_145541_create_kkgs_table', 42),
(56, '2018_10_31_145657_create_kkgsct_table', 42),
(57, '2018_10_31_145751_create_kkgsctdf_table', 42),
(58, '2018_11_01_153815_create_dmphilephi_table', 43),
(59, '2018_11_01_161226_create_philephi_table', 44),
(60, '2018_11_02_102813_create_philephictdf_table', 45),
(61, '2018_11_02_105902_create_philephict_table', 46),
(62, '2018_11_05_093753_create_daugiadat_table', 47),
(63, '2018_11_05_095547_create_daugiadatctdf_table', 47),
(64, '2018_11_05_111141_create_daugiadatct_table', 48),
(65, '2018_11_10_095553_create_giathuetscong_table', 49),
(66, '2018_11_10_103038_create_giathuetscongctdf_table', 50),
(67, '2018_11_12_093705_create_giathuetscongct_table', 51),
(68, '2018_11_12_141855_create_gianuocsh_table', 52),
(69, '2018_11_12_142336_create_gianuocshctdf_table', 52),
(70, '2018_11_12_143114_create_gianuocshct_table', 53),
(71, '2018_11_13_141757_create_dmgiadvgddt_table', 54),
(72, '2018_11_13_144350_create_giadvgddt_table', 55),
(73, '2018_11_13_145111_create_giadvgddtctdf_table', 55),
(74, '2018_11_13_145357_create_giadvgddtct_table', 55),
(75, '2018_11_14_092955_create_dmgiathuemuanhaxh_table', 56),
(76, '2018_11_14_100203_create_giathuemuanhaxh_table', 57),
(77, '2018_11_14_100403_create_giathuemuanhaxhctdf_table', 57),
(78, '2018_11_14_100412_create_giathuemuanhaxhct_table', 57),
(79, '2018_11_20_093809_create_kkgiatacn_table', 58),
(80, '2018_11_20_093843_create_kkgiatacnctdf_table', 58),
(81, '2018_11_20_093850_create_kkgiatacnct_table', 58),
(82, '2018_11_22_094519_create_giavtxk_table', 59),
(83, '2018_11_22_094529_create_giavtxkctdf_table', 59),
(84, '2018_11_22_094536_create_giavtxkct_table', 59),
(85, '2018_11_29_143107_create_ngaynghile_table', 60),
(86, '2018_12_04_092145_create_kkgiavtxtx_table', 61),
(87, '2018_12_04_092935_create_kkgiavtxtxctdf_table', 61),
(88, '2018_12_04_133347_create_kkgiavtxtxct_table', 62),
(89, '2018_12_10_173115_create_dmthamdinhgiahh_table', 63),
(90, '2018_12_10_173442_create_dmctthamdinhgiahh_table', 63),
(91, '2018_12_11_095329_create_thamdinhgiahh_table', 64),
(92, '2018_12_11_095342_create_thamdinhgiahhctdf_table', 64),
(93, '2018_12_11_095351_create_thamdinhgiahhct_table', 64),
(94, '2018_12_13_104322_create_dkgdoanhnghiep_table', 65),
(95, '2018_12_14_092929_create_dkghoso_table', 66),
(96, '2018_12_14_093813_create_dkghosoct_table', 66),
(97, '2018_12_14_152539_create_dkghosoctdf_table', 67),
(98, '2018_12_12_091849_create_thgiahhdvk_table', 68),
(99, '2018_12_12_091903_create_thgiahhdvkctdf_table', 68),
(100, '2018_12_12_091910_create_thgiahhdvkct_table', 68),
(101, '2018_12_14_095408_create_dmhanghoa_cpi_table', 68),
(102, '2018_12_14_095427_create_hsgia_cpi_table', 68),
(103, '2018_12_14_095442_create_hsgia_chitiet_cpi_table', 68),
(104, '2018_12_14_095457_create_hstonghop_chitiet_cpi_table', 68),
(105, '2018_12_14_095507_create_hstonghop_cpi_table', 68),
(106, '2018_12_25_154217_create_dmvlxd_table', 68),
(107, '2018_12_26_094917_create_kkgiavlxd_table', 68),
(108, '2019_01_05_100612_create_kkgiavlxdctdf_table', 68),
(109, '2019_01_05_110017_create_kkgiavlxdct_table', 68),
(110, '2019_01_05_144656_create_kkdkg_table', 68),
(111, '2019_01_05_144706_create_kkdkgct_table', 68),
(112, '2019_01_05_144715_create_kkdkgctdf_table', 68),
(113, '2019_01_05_165248_create_kkgiaxmtxd_table', 68),
(114, '2019_01_05_165550_create_kkgiaxmtxdctdf_table', 68),
(115, '2019_01_05_165558_create_kkgiaxmtxdct_table', 68),
(116, '2019_01_06_094056_create_kkgiadvhdtm_table', 68),
(117, '2019_01_06_094105_create_kkgiadvhdtmct_table', 68),
(118, '2019_01_06_094112_create_kkgiadvhdtmctdf_table', 68),
(119, '2019_01_09_172822_create_thanhlytaisan_table', 68),
(120, '2019_01_16_141257_create_dmhanghoa_table', 68),
(121, '2019_01_16_141700_create_dmnhomhanghoa_table', 68),
(122, '2019_01_21_093851_create_cungcapgia_table', 68),
(123, '2019_01_21_093903_create_cungcapgiactdf_table', 68),
(124, '2019_01_21_093910_create_cungcapgiact_table', 68),
(125, '2019_01_28_184408_create_muataisan_table', 68),
(126, '2019_01_30_093711_create_chisogiatieudung_table', 68),
(127, '2019_03_14_090625_create_kkgiavtxb_table', 68),
(128, '2019_03_14_102243_create_kkgiavtxbctdf_table', 68),
(129, '2019_03_18_101123_create_kkgiavtxbct_table', 68);

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

--
-- Đang đổ dữ liệu cho bảng `nhomdvkcb`
--

INSERT INTO `nhomdvkcb` (`id`, `manhom`, `tennhom`, `theodoi`, `created_at`, `updated_at`) VALUES
(1, '011', 'Giá hàng hóa trợ cấp trung ương', 'TD', '2018-10-12 02:50:15', '2018-12-10 11:26:13'),
(2, '02', 'Dịch vụ ngày giường bệnh', 'TD', '2018-10-12 02:52:56', '2018-10-12 02:52:56'),
(3, '03', 'Dịch vụ kỹ thuật và xét nghiệm', 'TD', '2018-10-12 02:53:33', '2018-10-12 02:53:33');

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

--
-- Đang đổ dữ liệu cho bảng `nhomhhdvk`
--

INSERT INTO `nhomhhdvk` (`id`, `manhom`, `tennhom`, `theodoi`, `created_at`, `updated_at`) VALUES
(3, '01', 'Giá bán lẻ hàng hóa thị trường', 'TD', '2018-11-26 11:44:20', '2018-11-26 11:57:24'),
(4, '02', 'Giá mua nông sản', 'TD', '2018-11-26 11:44:38', '2018-11-26 11:44:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomlephitruocba`
--

CREATE TABLE `nhomlephitruocba` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhomxe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomlephitruocba`
--

INSERT INTO `nhomlephitruocba` (`id`, `manhom`, `nhomxe`, `created_at`, `updated_at`) VALUES
(1, '01', 'Ôtô 9 chỗ ngồi trở xuống nhập khẩu', '2018-10-08 08:23:00', '2018-10-08 08:23:00'),
(2, '02', 'Ô tô 9 chỗ ngồi trở xuống sản xuất, lắp ráp trong nước.', '2018-11-27 02:41:53', '2018-11-27 02:41:53'),
(3, '03', 'Xe máy nhập khẩu.', '2018-11-27 02:42:09', '2018-11-27 02:42:09'),
(4, '04', 'Xe máy lắp ráp trong nước.', '2018-11-27 02:42:36', '2018-11-27 02:42:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomthuetn`
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
-- Đang đổ dữ liệu cho bảng `nhomthuetn`
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
-- Cấu trúc bảng cho bảng `philephi`
--

CREATE TABLE `philephi` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `soqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayapdung` date DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `philephi`
--

INSERT INTO `philephi` (`id`, `manhom`, `mahs`, `mota`, `soqd`, `ngayapdung`, `ghichu`, `trangthai`, `dvt`, `created_at`, `updated_at`) VALUES
(6, '12', 'T1543821729', 'MỨC THU PHÍ SỬ DỤNG CÔNG TRÌNH KẾT CẤU HẠ TẦNG, CÔNG TRÌNH DỊCH VỤ, TIỆN ÍCH CÔNG CỘNG TRONG KHU VỰC CỬA KHẨU TRÊN ĐỊA BÀN TỈNH LẠNG SƠN', 'Quyết số 53 /2016/QĐ-UBND ngày 31/12/2016 của Ủy ban nhân dân tỉnh Lạng Sơn', '2018-01-01', '', 'CHT', 'đồng/xe/lần ra, vào', '2018-12-03 07:22:09', '2018-12-03 07:25:23');

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

--
-- Đang đổ dữ liệu cho bảng `philephict`
--

INSERT INTO `philephict` (`id`, `mahs`, `ptcp`, `mucthuphi`, `ghichu`, `created_at`, `updated_at`) VALUES
(3, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải dưới 02 tấn, xe ba bánh và các loại xe tương tự chở hàng hóa xuất khẩu là rau, củ tươi các loại.', '100000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(4, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải dưới 02 tấn, xe ba bánh và các loại xe tương tự chở hàng hóa xuất khẩu, nhập khẩu (không thuộc đối tượng 1 nêu trên).', '150000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(5, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải từ 02 đến dưới 04 tấn', '200000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(6, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải từ 04 tấn đến dưới 10 tấn', '300000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(7, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải từ 10 tấn đến dưới 18 tấn; xe chở hàng bằng container 20 fit', '500000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(8, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô có trọng tải từ 18 tấn trở lên; xe chở hàng bằng container 40 fit', '800000', NULL, '2018-12-03 07:22:10', '2018-12-03 07:22:10'),
(9, 'T1543821729', 'Phương tiện vận tải chở hàng hóa xuất khẩu, nhập khẩu - Xe ô tô chở quặng xuất khẩu', '0', 'Nhân hệ số 5 đối với các mức giá trên', '2018-12-03 07:22:10', '2018-12-03 07:22:10');

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
  `loaihinhhd` text COLLATE utf8_unicode_ci,
  `xangdau` double NOT NULL DEFAULT '0',
  `dien` double NOT NULL DEFAULT '0',
  `khidau` double DEFAULT '0',
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
  `filedk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filedk4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thamdinhgia`
--

INSERT INTO `thamdinhgia` (`id`, `diadiem`, `thoidiem`, `ppthamdinh`, `mucdich`, `dvyeucau`, `thoihan`, `sotbkl`, `hosotdgia`, `nguonvon`, `phanloai`, `trangthai`, `quy`, `mahuyen`, `maxa`, `mahs`, `thuevat`, `songaykq`, `filedk`, `filedk1`, `filedk2`, `filedk3`, `filedk4`, `created_at`, `updated_at`) VALUES
(1, 'Địa điểm thẩm định', '2018-12-11', 'Phương pháp thẩm định', 'Mục đích thẩm định', 'đơn vị yêu cầu thẩm định', '2018-12-21', 'số tbkl', '001', 'Cả hai', NULL, 'CB', '4', NULL, 'PTCQCG', 'PTCQCG1544513831', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:15:55', '2018-12-11 07:48:49'),
(5, 'sa', '2018-10-06', 'a', 'a', 'a', '2018-10-16', 'a', 'a', 'Cả hai', NULL, 'HHT', NULL, NULL, 'PTCQCG', 'PTCQCG1538814223', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:23:43', '2018-10-10 04:14:37'),
(6, 'a', '2018-10-06', 'a', 'a', 'a', '2018-10-16', 'a', 'a', 'Cả hai', NULL, 'HT', '4', NULL, 'PTCQCG', 'PTCQCG1538815994', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-10-06 08:53:14', '2018-11-09 08:51:54'),
(7, 'Địa điểm thẩm định', '2018-12-11', ' Phương pháp thẩm định', 'Mục đích thẩm định', 'đơn vị yêu cầu thẩm định', '2018-12-21', 'Thông báo kết luận', '0001', 'Cả hai', NULL, 'CHT', '4', NULL, 'PTCQCG', 'PTCQCG1544513446', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '2018-12-11 07:30:47', '2018-12-11 07:30:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thamdinhgiact`
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
-- Đang đổ dữ liệu cho bảng `thamdinhgiact`
--

INSERT INTO `thamdinhgiact` (`id`, `tents`, `dacdiempl`, `thongsokt`, `nguongoc`, `dvt`, `sl`, `nguyengiadenghi`, `giadenghi`, `nguyengiathamdinh`, `giatritstd`, `giaththamdinh`, `giakththamdinh`, `gc`, `mahs`, `created_at`, `updated_at`) VALUES
(3, 'a', 'a', 'a', 'a', 'a', 1, 50000, 5, 60000, 60000, 5, 0, '', 'PTCQCG1538814223', '2018-10-06 08:23:43', '2018-10-10 04:14:59'),
(4, 'Máy tính để bàn', '', 'Corei5- ram8G-HDD1TB', '', 'chiếc', 2, 5000000, 10000000, 6000000, 12000000, 10000000, 0, '', 'PTCQCG1538815994', '2018-10-06 08:53:14', '2018-10-06 08:53:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thamdinhgiactdf`
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
-- Đang đổ dữ liệu cho bảng `thamdinhgiactdf`
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

--
-- Đang đổ dữ liệu cho bảng `thamdinhgiahh`
--

INSERT INTO `thamdinhgiahh` (`id`, `diadiem`, `thoidiem`, `ppthamdinh`, `mucdich`, `dvyeucau`, `thoihan`, `sotbkl`, `hosotdgia`, `nguonvon`, `phanloai`, `trangthai`, `quy`, `mahuyen`, `maxa`, `mahs`, `thuevat`, `songaykq`, `filedk`, `filedk1`, `filedk2`, `filedk3`, `filedk4`, `manhom`, `created_at`, `updated_at`) VALUES
(1, 'Địa điểm thẩm định', '2018-12-11', 'Phương pháp thẩm định', 'Mục đích thẩm định', 'đơn vị yêu cầu thẩm định', '2018-12-21', 'số tbkl', '001', 'Cả hai', NULL, 'CB', '4', NULL, 'PTCQCG', 'PTCQCG1544513831', 'Giá bao gồm thuế VAT', '10', NULL, NULL, NULL, NULL, NULL, '011', '2018-12-11 07:37:11', '2018-12-11 08:19:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thamdinhgiahhct`
--

CREATE TABLE `thamdinhgiahhct` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `thamdinhgiahhct`
--

INSERT INTO `thamdinhgiahhct` (`id`, `manhom`, `nhomhh`, `tenhh`, `qccl`, `dvt`, `sl`, `nguyengiadenghi`, `giadenghi`, `nguyengiathamdinh`, `giatritstd`, `giaththamdinh`, `giakththamdinh`, `gc`, `mahs`, `created_at`, `updated_at`) VALUES
(1, '011', 'Con giống gia súc', 'Lợn nái hậu bị móng cái thuần chủng (trọng lượng từ 8 - 10kg)', 'Xuất xứ: Đông Triều, Quảng Ninh', 'kg', 1, 55000, 55000, 65000, 65000, 55000, 0, '', 'PTCQCG1544513831', '2018-12-11 07:37:11', '2018-12-11 07:45:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thamdinhgiahhctdf`
--

CREATE TABLE `thamdinhgiahhctdf` (
  `id` int(10) UNSIGNED NOT NULL,
  `manhom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `dvt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
-- Đang đổ dữ liệu cho bảng `thuetainguyen`
--

INSERT INTO `thuetainguyen` (`id`, `mahs`, `ngayapdung`, `maxa`, `mahuyen`, `district`, `soqd`, `ghichu`, `manhom`, `trangthai`, `created_at`, `updated_at`) VALUES
(2, 'QCG1539246116', '2018-10-11', NULL, NULL, 'QCG', 'Số 2018/QĐ-BTC ngày 09/10/2017', 'Ghi chú', '01', 'HT', '2018-10-11 08:21:56', '2018-11-09 08:12:21');

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

--
-- Đang đổ dữ liệu cho bảng `thuetainguyenct`
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

--
-- Đang đổ dữ liệu cho bảng `thuetainguyenctdf`
--

INSERT INTO `thuetainguyenctdf` (`id`, `maxa`, `mahuyen`, `district`, `manhom`, `magoc`, `mahh`, `capdo`, `tenhh`, `dvt`, `giatttn`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'QCG', '01', '01', 'I', '1', 'Khoáng sản kim loại', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(2, NULL, NULL, 'QCG', '01', 'I', 'I1', '2', 'Sắt', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(3, NULL, NULL, 'QCG', '01', 'I1', 'I101', '3', 'Sắt kim loại', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(4, NULL, NULL, 'QCG', '01', 'I1', 'I102', '3', 'Quặng Manhetit (có từ tính)', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(5, NULL, NULL, 'QCG', '01', 'I102', 'I10201', '4', 'Quặng Manhetit có hàm lượng Fe<30%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(6, NULL, NULL, 'QCG', '01', 'I102', 'I10202', '4', 'Quặng Manhetit có hàm lượng 30%≤Fe<40%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(7, NULL, NULL, 'QCG', '01', 'I102', 'I10203', '4', 'Quặng Manhetit có hàm lượng 40%≤Fe<50%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(8, NULL, NULL, 'QCG', '01', 'I102', 'I10204', '4', 'Quặng Manhetit có hàm lượng 50%≤Fe<60%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(9, NULL, NULL, 'QCG', '01', 'I102', 'I10205', '4', 'Quặng Manhetit có hàm lượng Fe≥60%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(10, NULL, NULL, 'QCG', '01', 'I1', 'I103', '3', 'Quặng Limonit (không từ tính)', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(11, NULL, NULL, 'QCG', '01', 'I103', 'I10301', '4', 'Quặng limonit có hàm lượng Fe≤30%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(12, NULL, NULL, 'QCG', '01', 'I103', 'I10302', '4', 'Quặng limonit có hàm lượng 30%<Fe≤40%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(13, NULL, NULL, 'QCG', '01', 'I103', 'I10303', '4', 'Quặng limonit có hàm lượng 40%<Fe≤50%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(14, NULL, NULL, 'QCG', '01', 'I103', 'I10304', '4', 'Quặng limonit có hàm lượng 50%<Fe≤60%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(15, NULL, NULL, 'QCG', '01', 'I103', 'I10305', '4', 'Quặng limonit có hàm lượng Fe>60%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(16, NULL, NULL, 'QCG', '01', 'I1', 'I104', '3', 'Quặng sắt Deluvi', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(17, NULL, NULL, 'QCG', '01', 'I', 'I2', '2', 'Mangan (Măng-gan)', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(18, NULL, NULL, 'QCG', '01', 'I2', 'I201', '3', 'Quặng mangan có hàm lượng Mn≤20%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(19, NULL, NULL, 'QCG', '01', 'I2', 'I202', '3', 'Quặng mangan có hàm lượng 20%<Mn≤25%', 'tân', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(20, NULL, NULL, 'QCG', '01', 'I2', 'I203', '3', 'Quặng mangan có hàm lượng 25%<Mn≤30%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(21, NULL, NULL, 'QCG', '01', 'I2', 'I204', '3', 'Quặng mangan có hàm lượng 30<Mn≤35%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(22, NULL, NULL, 'QCG', '01', 'I2', 'I205', '3', 'Quặng mangan có hàm lượng 35%<Mn≤40%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(23, NULL, NULL, 'QCG', '01', 'I2', 'I206', '3', 'Quặng mangan có hàm lượng Mn>40%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(24, NULL, NULL, 'QCG', '01', 'I', 'I3', '2', 'Titan', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(25, NULL, NULL, 'QCG', '01', 'I3', 'I301', '3', 'Quặng titan gốc (ilmenit)', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(26, NULL, NULL, 'QCG', '01', 'I301', 'I30101', '4', 'Quặng gốc titan có hàm lượng TiO2≤10%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(27, NULL, NULL, 'QCG', '01', 'I301', 'I30102', '4', 'Quặng gốc titan có hàm lượng 10%<TiO2≤15%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(28, NULL, NULL, 'QCG', '01', 'I301', 'I30103', '4', 'Quặng gốc titan có hàm lượng 15%<TiO2≤20%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(29, NULL, NULL, 'QCG', '01', 'I301', 'I30104', '4', 'Quặng gốc titan có hàm lượng TiO2>20%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(30, NULL, NULL, 'QCG', '01', 'I3', 'I302', '3', 'Quặng titan sa khoáng', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(31, NULL, NULL, 'QCG', '01', 'I302', 'I30201', '4', 'Quặng Titan sa khoáng chưa qua tuyển tách', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(32, NULL, NULL, 'QCG', '01', 'I302', 'I30202', '4', 'Titan sa khoáng đã qua tuyển tách (tinh quặng Titan)', '', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(33, NULL, NULL, 'QCG', '01', 'I30202', 'I3020201', '5', 'Ilmenit', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(34, NULL, NULL, 'QCG', '01', 'I30202', 'I3020202', '5', 'Quặng Zircon có hàm lượng ZrO2<65%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(35, NULL, NULL, 'QCG', '01', 'I30202', 'I3020203', '5', 'Quặng Zircon có hàm lượng ZrO2≥65%', 'tấn', NULL, '2018-11-09 08:07:30', '2018-11-09 08:07:30'),
(36, NULL, NULL, 'QCG', '01', 'I30202', 'I3020204', '5', 'Rutil', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(37, NULL, NULL, 'QCG', '01', 'I30202', 'I3020205', '5', 'Monazite', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(38, NULL, NULL, 'QCG', '01', 'I30202', 'I3020206', '5', 'Manhectic', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(39, NULL, NULL, 'QCG', '01', 'I30202', 'I3020207', '5', 'Xi titan', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(40, NULL, NULL, 'QCG', '01', 'I30202', 'I3020208', '5', 'Các sản phẩm còn lại', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(41, NULL, NULL, 'QCG', '01', 'I', 'I4', '2', 'Vàng', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(42, NULL, NULL, 'QCG', '01', 'I4', 'I401', '3', 'Quặng vàng gốc', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(43, NULL, NULL, 'QCG', '01', 'I401', 'I40101', '4', 'Quặng vàng có hàm lượng Au<2 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(44, NULL, NULL, 'QCG', '01', 'I401', 'I40102', '4', 'Quặng vàng có hàm lượng 2≤Au<3 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(45, NULL, NULL, 'QCG', '01', 'I401', 'I40103', '4', 'Quặng vàng có hàm lượng 3≤Au<4 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(46, NULL, NULL, 'QCG', '01', 'I401', 'I40104', '4', 'Quặng vàng có hàm lượng 4≤Au<5 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(47, NULL, NULL, 'QCG', '01', 'I401', 'I40105', '4', 'Quặng vàng có hàm lượng 5≤Au<6 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(48, NULL, NULL, 'QCG', '01', 'I401', 'I40106', '4', 'Quặng vàng có hàm lượng 6≤Au<7 gram/tẩn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(49, NULL, NULL, 'QCG', '01', 'I401', 'I40107', '4', 'Quặng vàng có hàm lượng 7≤Au<8 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(50, NULL, NULL, 'QCG', '01', 'I401', 'I40108', '4', 'Quặng vàng có hàm lượng Au≥8 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(51, NULL, NULL, 'QCG', '01', 'I4', 'I402', '3', 'Vàng kim loại (vàng cốm);', 'kg', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(52, NULL, NULL, 'QCG', '01', 'I4', 'I403', '3', 'Tinh quặng vàng', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(53, NULL, NULL, 'QCG', '01', 'I403', 'I40301', '4', 'Tinh quặng vàng có hàm lượng 82<Au≤240 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(54, NULL, NULL, 'QCG', '01', 'I403', 'I40302', '4', 'Tinh quặng vàng có hàm lượng Au>240 gram/tấn', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(55, NULL, NULL, 'QCG', '01', 'I', 'I5', '2', 'Đất hiếm', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(56, NULL, NULL, 'QCG', '01', 'I5', 'I501', '3', 'Quặng đất hiếm về hàm lượng TR203≤1%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(57, NULL, NULL, 'QCG', '01', 'I5', 'I502', '3', 'Quặng đất hiếm có hàm lượng 1%<TR203≤2%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(58, NULL, NULL, 'QCG', '01', 'I5', 'I503', '3', 'Quặng đất hiếm có hàm lượng 2%<TR203≤3%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(59, NULL, NULL, 'QCG', '01', 'I5', 'I504', '3', 'Quặng đất hiểm có hàm lượng 3%<TR203≤4%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(60, NULL, NULL, 'QCG', '01', 'I5', 'I505', '3', 'Quặng đất hiếm có hàm tượng 4%<TR203≤5%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(61, NULL, NULL, 'QCG', '01', 'I5', 'I506', '3', 'Quặng đất hiếm có hàm lượng 5%<TR203≤10%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(62, NULL, NULL, 'QCG', '01', '15', '1507', '3', 'Quặng đất hiểm có hàm lượng >10% TR203', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(63, NULL, NULL, 'QCG', '01', 'I', 'I6', '2', 'Bạch kim, bạc, thiếc', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(64, NULL, NULL, 'QCG', '01', 'I6', 'I601', '3', 'Bạch kim', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(65, NULL, NULL, 'QCG', '01', 'I6', 'I602', '3', 'Bạc kim loại', 'kg', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(66, NULL, NULL, 'QCG', '01', 'I6', 'I603', '3', 'Thiếc', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(67, NULL, NULL, 'QCG', '01', 'I603', 'I60301', '4', 'Quặng thiếc gốc', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(68, NULL, NULL, 'QCG', '01', 'I60301', 'I6030101', '5', 'Quặng thiếc gốc có hàm lượng 0,2%<SnO2≤0,4%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(69, NULL, NULL, 'QCG', '01', 'I60301', 'I6030102', '5', 'Quặng thiếc gốc có hàm lượng 0,4%<SnO2<0,6%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(70, NULL, NULL, 'QCG', '01', 'I60301', 'I6030103', '5', 'Quặng thiếc gốc có hàm lượng 0,6%<SnO2≤0,8%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(71, NULL, NULL, 'QCG', '01', 'I60301', 'I6030104', '5', 'Quặng thiếc gốc có hàm lượng 0,8%<SnO2≤1%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(72, NULL, NULL, 'QCG', '01', 'I60301', 'I6030105', '5', 'Quặng thiếc gốc có hàm lượng SnO2>1%', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(73, NULL, NULL, 'QCG', '01', 'I603', 'I60302', '4', 'Tinh quặng thiếc có hàm lượng SnO2≥70% (sa khoáng, quặng gốc)', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(74, NULL, NULL, 'QCG', '01', 'I603', 'I60303', '4', 'Thiếc kim loại', 'tấn', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(75, NULL, NULL, 'QCG', '01', 'I', 'I7', '2', 'Wolfram, Antimoan', '', NULL, '2018-11-09 08:07:31', '2018-11-09 08:07:31'),
(76, NULL, NULL, 'QCG', '01', 'I7', 'I701', '3', 'Wolfram', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(77, NULL, NULL, 'QCG', '01', 'I701', 'I70101', '4', 'Quặng wolfram có hàm lượng 0,1%<WO3≤0,3%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(78, NULL, NULL, 'QCG', '01', 'I701', 'I70102', '4', 'Quặng wolfram có hàm lượng 0,3%<WO3≤0,5%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(79, NULL, NULL, 'QCG', '01', 'I701', 'I70103', '4', 'Quặng wolfram có hàm lượng 0,5%<WO3≤0,7%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(80, NULL, NULL, 'QCG', '01', 'I701', 'I70104', '4', 'Quặng wolfram có hàm lượng 0,7%<WO3≤1%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(81, NULL, NULL, 'QCG', '01', 'I701', 'I70105', '4', 'Quặng wolfram có hàm lượng WO3>1%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(82, NULL, NULL, 'QCG', '01', 'I7', 'I702', '3', 'Antimoan', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(83, NULL, NULL, 'QCG', '01', 'I702', 'I70201', '4', 'Antimoan kim loại', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(84, NULL, NULL, 'QCG', '01', 'I702', 'I70202', '4', 'Quặng Antimoan', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(85, NULL, NULL, 'QCG', '01', 'I70202', 'I7020201', '5', 'Quặng antimon có hàm lượng Sb<5%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(86, NULL, NULL, 'QCG', '01', 'I70202', 'I7020202', '5', 'Quặng antimon có hàm lượng 5≤Sb<10%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(87, NULL, NULL, 'QCG', '01', 'I70202', 'I7020203', '5', 'Quặng antimon có hàm lượng 10%<Sb≤15%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(88, NULL, NULL, 'QCG', '01', 'I70202', 'I7020204', '5', 'Quăng antimon có hàm lượng 15%<Sb≤0%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(89, NULL, NULL, 'QCG', '01', 'I70202', 'I7020205', '5', 'Quăng antimon có hàm lượng Sb>20%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(90, NULL, NULL, 'QCG', '01', 'I', 'I8', '2', 'Chì, kẽm', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(91, NULL, NULL, 'QCG', '01', 'I8', 'I801', '3', 'Chì, kẽm kim loại', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(92, NULL, NULL, 'QCG', '01', 'I8', 'I802', '3', 'Tinh quặng chì, kẽm', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(93, NULL, NULL, 'QCG', '01', 'I802', 'I80201', '4', 'Tinh quặng chì', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(94, NULL, NULL, 'QCG', '01', 'I80201', 'I8020101', '5', 'Tinh quặng chì có hàm lượng Pb<50%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(95, NULL, NULL, 'QCG', '01', 'I80201', 'I8020102', '5', 'Tinh quặng chì có hàm lượng Pb≥50%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(96, NULL, NULL, 'QCG', '01', 'I802', 'I80202', '4', 'Tinh quặng kẽm', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(97, NULL, NULL, 'QCG', '01', 'I80202', 'I8020201', '5', 'Tinh quặng kẽm có hàm lượng Zn<50%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(98, NULL, NULL, 'QCG', '01', 'I80202', 'I8020202', '5', 'Tinh quặng kẽm có hàm lượng Zn≥50%', 'tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(99, NULL, NULL, 'QCG', '01', 'I8', 'I803', '3', 'Quặng chì, kẽm', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(100, NULL, NULL, 'QCG', '01', 'I803', 'I80301', '4', 'Quặng chì + kẽm hàm lượng Pb+Zn<5%', 'Tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(101, NULL, NULL, 'QCG', '01', 'I803', 'I80302', '4', 'Quặng chì + kẽm hàm lượng 5%<Pb+Zn<10%', 'Tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(102, NULL, NULL, 'QCG', '01', 'I803', 'I80303', '4', 'Quặng chì + kẽm hàm lượng 10%<Pb+Zn<15%', 'Tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(103, NULL, NULL, 'QCG', '01', 'I803', 'I80304', '4', 'Quặng chì + kẽm hàm lượng Pb+Zn>15%', 'Tấn', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(104, NULL, NULL, 'QCG', '01', 'I', 'I9', '2', 'Nhôm, Bauxit', '', NULL, '2018-11-09 08:07:32', '2018-11-09 08:07:32'),
(105, NULL, NULL, 'QCG', '01', 'I9', 'I901', '3', 'Quặng bauxit trầm tích', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(106, NULL, NULL, 'QCG', '01', 'I9', 'I902', '3', 'Quặng bauxit laterit', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(107, NULL, NULL, 'QCG', '01', 'I', 'I10', '2', 'Đồng', '', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(108, NULL, NULL, 'QCG', '01', 'I10', 'I1001', '3', 'Quặng đồng', '', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(109, NULL, NULL, 'QCG', '01', 'I1001', 'I100101', '4', 'Quặng đồng có hàm lượng Cu<0,5%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(110, NULL, NULL, 'QCG', '01', 'I1002', 'I100102', '4', 'Quặng đồng có hàm lượng 0,5%≤Cu <1%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(111, NULL, NULL, 'QCG', '01', 'I1003', 'I100103', '4', 'Quặng đồng có hàm lượng 1%≤Cu<2%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(112, NULL, NULL, 'QCG', '01', 'I1004', 'I100104', '4', 'Quặng đồng có hàm lượng 2%≤Cu<3%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(113, NULL, NULL, 'QCG', '01', 'I1005', 'I100105', '4', 'Quặng đồng có hàm lượng 3%≤Cu<4%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(114, NULL, NULL, 'QCG', '01', 'I1006', 'I100106', '4', 'Quặng đồng có hàm lượng 4%≤Cu<5%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(115, NULL, NULL, 'QCG', '01', 'I1007', 'I100107', '4', 'Quặng đồng có hàm lượng Cu≥5%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(116, NULL, NULL, 'QCG', '01', 'I10', 'I1002', '3', 'Tinh quặng đồng có hàm lượng 18%≤Cu<20%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(117, NULL, NULL, 'QCG', '01', 'I', 'I11', '2', 'Nikel (Quặng Nikel)', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(118, NULL, NULL, 'QCG', '01', 'I', 'I12', '2', 'Cô-ban (coban), mô-Iip-đen (molipden), thủy ngân, ma-nhê (magie), va-na-đi (vanadi)', '', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(119, NULL, NULL, 'QCG', '01', 'I12', 'I1201', '3', 'Molipden', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(120, NULL, NULL, 'QCG', '01', 'I12', 'I1202', '3', 'Cô-ban (coban), thủy ngân, va-na-đi (vanadi)', '', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(121, NULL, NULL, 'QCG', '01', 'I', 'I13', '2', 'Khoáng sản kim loại khác', '', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(122, NULL, NULL, 'QCG', '01', 'I13', 'I1301', '3', 'Tinh quặng Bismuth hàm lượng 10%≤Bi<20%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33'),
(123, NULL, NULL, 'QCG', '01', 'I13', 'I1302', '3', 'Quặng Crôm hàm lượng Cr≥40%', 'tấn', NULL, '2018-11-09 08:07:33', '2018-11-09 08:07:33');

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
  `songaylv` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `town`
--

INSERT INTO `town` (`id`, `mahuyen`, `maxa`, `tendv`, `town`, `district`, `diachi`, `ttlienhe`, `emailql`, `emailqt`, `songaylv`, `created_at`, `updated_at`) VALUES
(3, 'STCHN', 'PTCQCG', 'Phòng Tài Chính Quận Cầu Giấy', NULL, 'QCG', 'Quận Cầu Giấy - Thành Phố Hà Nội', '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2', '2018-10-04 01:49:30', '2018-10-04 01:49:30'),
(4, 'STCHN', 'PTCQHBT', 'Phòng tài chính quận Hai Bà Trưng', NULL, 'QHBT', 'Quận Hai Bà Trưng - Thành Phố Hà Nội', '', 'minhtranlife@gmail.com', 'minhtranlife@gmail.com', '2', '2018-10-04 01:50:27', '2018-10-04 01:52:09'),
(5, 'PTCQCG', '', NULL, NULL, NULL, 'asdas á', NULL, NULL, NULL, NULL, '2018-12-13 02:29:24', '2018-12-13 02:29:24');

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

--
-- Đang đổ dữ liệu cho bảng `ttdntd`
--

INSERT INTO `ttdntd` (`id`, `maxa`, `mahuyen`, `tendn`, `diachi`, `tel`, `fax`, `email`, `diadanh`, `chucdanh`, `nguoiky`, `noidknopthue`, `giayphepkd`, `tailieu`, `settingdvvt`, `vtxk`, `vtxb`, `vtxtx`, `vtch`, `ghichu`, `trangthai`, `level`, `lydo`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 'PTCQHBT', 'Công ty TNHH phát triển phần mềm Cuộc Sống1', 'Quận Hai Bà Trưng - Thành Phố Hà Nội1', '0436343965', '87612121', 'minhtranlife@gmail.com', 'TP. Hà Nội', 'Giám đốc', 'Nguyễn Thị Minh Tuyết', 'Chi cục thuế TP Hà Nội', '09876543', 'sđa', '', 0, 0, 0, 0, NULL, 'CD', 'DVLT', NULL, '2018-11-16 07:23:15', '2018-11-16 07:23:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ttngaynghile`
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
  `phanloai` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `status`, `maxa`, `mahuyen`, `town`, `district`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `ttnguoitao`, `phanloai`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trần', 'minhtran', '107e8cf7f2b4531f6b2ff06dbcf94e10', 'minhtranlife@gmail.com', 'Kích hoạt', NULL, NULL, NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(5, 'Sở Tài Chính Hà Nội', 'stchanoi', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, 'STCHN', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-10-04 01:47:12', '2018-10-04 01:47:12'),
(6, 'Phòng Tài Chính Quận Cầu Giấy', 'ptcquancaugiay', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCQCG', 'STCHN', NULL, 'QCG', 'X', NULL, NULL, NULL, NULL, NULL, NULL, '', '2018-10-04 01:49:30', '2018-10-04 01:49:30'),
(7, 'Phòng tài chính quận Hai Bà Trưng', 'ptcquanhaibatrung', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', 'PTCQHBT', 'STCHN', NULL, 'QHBT', 'X', NULL, '', NULL, NULL, NULL, NULL, '', '2018-10-04 01:50:27', '2018-11-08 07:44:14'),
(9, 'Công ty TNHH phát triển phần mềm Cuộc Sống', 'pmcuocsong', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '1234567890', 'PTCQHBT', NULL, NULL, 'DVLT', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 15/10/2018 09:43:46', '', '2018-10-15 02:43:46', '2018-10-15 02:43:46'),
(10, 'Công ty TNHH Thức ăn chăn nuôi', 'tnhhthucan', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '1234567890', 'PTCQHBT', NULL, NULL, 'TACN', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 17/10/2018 14:06:44', '', '2018-10-17 07:06:44', '2018-10-17 07:06:44'),
(11, 'Administrator', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', NULL, NULL, NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(13, 'Công ty TNHH thực phẩm chức năng trẻ em ABC', 'tpcnabc', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '0987654321', 'PTCQHBT', NULL, NULL, 'TPCNTE6T', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 19/11/2018 14:31:14', '', '2018-11-19 07:31:14', '2018-11-19 07:31:14'),
(14, 'Công ty TNHH thức ăn chăn nuôi ABC', 'tacn', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '123456789', 'PTCQCG', NULL, NULL, 'TACN', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 20/11/2018 09:35:18', '', '2018-11-20 02:35:18', '2018-11-20 02:35:18'),
(15, 'Doanh nghiệp dịch vụ vận tải', 'dvvt', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '123456789', 'PTCQHBT', NULL, NULL, 'DVVT', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 21/11/2018 14:35:24', '', '2018-11-21 07:35:24', '2018-11-21 07:45:23'),
(16, 'Quản trị hệ thống', 'sa', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Kích hoạt', NULL, NULL, NULL, NULL, 'HT', 'sa', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL),
(17, 'Doanh nghiệp đăng ký giá', 'dndangkygia', 'e10adc3949ba59abbe56e057f20f883e', 'minhtranlife@gmail.com', 'Kích hoạt', '0098765432', 'PTCQCG', NULL, NULL, 'DKG', NULL, NULL, NULL, NULL, NULL, 'Minh Trần(minhtran) - 06/12/2018 14:39:42', 'dkgkhidau', '2018-12-06 07:39:42', '2018-12-06 07:39:42'),
(21, 'Tên doanh nghiệp', 'Testdn1', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, 'DKG', NULL, NULL, NULL, NULL, NULL, 'Administrator(admin)02/01/2019 15:50:54', 'dkgxangdau', '2019-01-02 08:50:54', '2019-01-02 08:55:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vanbanqlnn`
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

--
-- Đang đổ dữ liệu cho bảng `vanbanqlnn`
--

INSERT INTO `vanbanqlnn` (`id`, `kyhieuvb`, `dvbanhanh`, `loaivb`, `ngaybanhanh`, `ngayapdung`, `tieude`, `ghichu`, `phanloai`, `ipt1`, `ipf1`, `ipt2`, `ipf2`, `ipt3`, `ipf3`, `ipt4`, `ipf4`, `ipt5`, `ipf5`, `created_at`, `updated_at`) VALUES
(1, 'TTQD2018', 'DVBH', 'thongtulientich', '2018-10-11', '2018-10-12', 'A', 'A', 'tw', 'TTQD20181.doc', 'D:\\xampp\\tmp\\php47A1.tmp', 'TTQD2018&2.sql', 'TTQD2018&2.sql', NULL, NULL, NULL, NULL, NULL, NULL, '2018-10-22 03:12:21', '2018-10-22 04:06:24');

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
(23, '::1', '1Os3xnKLrSFfUqOESSE37nRaAMHfYbfR9CXaNYGj', '2018-10-18 02:22:37', '2018-10-18 02:22:37'),
(24, '::1', 'yUnZCDleJGF4xK3lptyqGTeWxpRVEGsBfDzhfyZk', '2018-10-18 07:35:20', '2018-10-18 07:35:20'),
(25, '::1', 'zP0G0E3WpOZEGAwNLOohqT7vaWlpmFLIe0ybUdcI', '2018-10-19 02:04:22', '2018-10-19 02:04:22'),
(26, '::1', 'td9PpE83XQ7YhMGFqp2y6UWdynDScgBNf9Nn4wWV', '2018-10-19 04:32:04', '2018-10-19 04:32:04'),
(27, '::1', 'ScxHToqBRM9vM3ZdWEnCmM9AXLJGZlJOh6val2ui', '2018-10-19 07:45:51', '2018-10-19 07:45:51'),
(28, '::1', 'XYBl5jIWOZFj8pbqRYOOgtitxDmlhTubkmSCOM6d', '2018-10-19 07:45:58', '2018-10-19 07:45:58'),
(29, '::1', 'aTkm1unjnlYGb4ykeULdRjBou9E4tzWSvJhnj92e', '2018-10-19 08:15:11', '2018-10-19 08:15:11'),
(30, '::1', 'sKiDr7Pdjw5xA0pqrAlweoihZSJ1mbmsvmMgGKkb', '2018-10-22 01:36:13', '2018-10-22 01:36:13'),
(31, '::1', 'LMwW00hJr9yvWPUom2OBhclLAKVZsRukchAXpnRm', '2018-10-22 01:36:14', '2018-10-22 01:36:14'),
(32, '::1', 'ar3M2oCOozlD1CSx7SEAzAYL6NgzBiX2ABCuDhQx', '2018-10-22 01:38:54', '2018-10-22 01:38:54'),
(33, '::1', 'F8PxQ80a7h8QB3scjYATbjrrgnrtEQfRaJrjRktc', '2018-10-22 01:41:48', '2018-10-22 01:41:48'),
(34, '::1', 'cJVWqrg0nBayqstZeOA73sqNM0uS7GSkdq6OpX00', '2018-10-22 01:47:31', '2018-10-22 01:47:31'),
(35, '::1', 'JuDod53GTC0E13s1SP9v3lPPO4tP39QCttnZlJFS', '2018-10-30 09:14:52', '2018-10-30 09:14:52'),
(36, '::1', 'WfQqWmDj9jpn8B0T32a7aEh0BL1EVXReTSSwmbEz', '2018-10-31 02:48:21', '2018-10-31 02:48:21'),
(37, '::1', 'bMkWg3m8137lk9LVZbumqZ7wQiwLjzWhDB66ciKQ', '2018-10-31 03:04:08', '2018-10-31 03:04:08'),
(38, '::1', 'AR9lyomxFEOJWkbzdll1ROnKRbRZgo3Jj6UaGCZN', '2018-10-31 03:08:12', '2018-10-31 03:08:12'),
(39, '::1', 'bqyNRk5UFpnGApuErhs7EEdB1jESwWZtrEFvxH9g', '2018-10-31 06:55:50', '2018-10-31 06:55:50'),
(40, '::1', 'IDGZSL3dr6XrKhlvEdITwT3Wt8RxYJseH40gohD8', '2018-10-31 07:32:55', '2018-10-31 07:32:55'),
(41, '::1', 'Mvlm2RrKfEtNX8rSQ0llVvYeRujYlF44SjqehGif', '2018-10-31 07:34:26', '2018-10-31 07:34:26'),
(42, '::1', 'TIAOR7nWbecLuZQM3H2Ewq9X6BFmpjMupMJMC0I8', '2018-11-01 02:07:04', '2018-11-01 02:07:04'),
(43, '::1', 'BOMxkwnOYTO7Xa5r5XdtKWttepkzZbpReXE9I9fJ', '2018-11-01 03:02:17', '2018-11-01 03:02:17'),
(44, '::1', 'PtLPcZ5ZyWZ68CLTfYplxHEps5ZuDFVAGJ9nGJXJ', '2018-11-01 07:31:53', '2018-11-01 07:31:53'),
(45, '::1', '58o2Yrx26cPz3PzvG8oVpbTvFjoVjpyhAPdL7asy', '2018-11-02 02:41:50', '2018-11-02 02:41:50'),
(46, '::1', 'VCGLa027g0p98LGdn2YHjAOOqKn9wOaRNekFFWl5', '2018-11-02 07:02:28', '2018-11-02 07:02:28'),
(47, '::1', 'ia4wIgBlRmyBM1hHBp9c9bMcgyFOOa3rFdEEgMf1', '2018-11-03 03:22:50', '2018-11-03 03:22:50'),
(48, '::1', 'ZggDi3UGVgC6k9Pyn682Sxx0iCD6Vv8rlWIMbBF4', '2018-11-03 16:12:57', '2018-11-03 16:12:57'),
(49, '::1', 'jX7ksUi4bAsRM6J6pzFkVUFrbrlJQUUdGV3p9AOp', '2018-11-04 01:23:49', '2018-11-04 01:23:49'),
(50, '::1', 'yjISJwmZCz6jbTKBzxtLgRvldlSocIfrtD3G3VtI', '2018-11-04 08:12:56', '2018-11-04 08:12:56'),
(51, '::1', 'UYf7VdUTXixrFZn7Pi2yGKkQwc4KJstWJBkv1czd', '2018-11-05 02:30:15', '2018-11-05 02:30:15'),
(52, '::1', 'MZigfiBDN7shGX74XiKophWCtzZBOWIbLH8nyjEU', '2018-11-06 01:56:04', '2018-11-06 01:56:04'),
(53, '::1', '8f2IaOzFaNf1NUhvR0lkwExM5BE53VvyGM1IAh7O', '2018-11-07 02:55:17', '2018-11-07 02:55:17'),
(54, '::1', 'B2T4CM7c41RbV4RWKptcoNQ3qu4ZBUdQdSJ9su1K', '2018-11-07 03:52:25', '2018-11-07 03:52:25'),
(55, '::1', 'IpUp3JRfEc2hYCbbtrHpDjTVWlH1JC2lbw3Is1hk', '2018-11-07 07:32:29', '2018-11-07 07:32:29'),
(56, '::1', '2MUhsTTdcg0RulVtpfiOgZyxGFNjf7vbRMBajvTy', '2018-11-07 07:35:49', '2018-11-07 07:35:49'),
(57, '::1', 'cVX4vlMB4qiApW6RGgc1dAU48RG5RcxespYvZESn', '2018-11-08 01:55:36', '2018-11-08 01:55:36'),
(58, '::1', 'd44xVIRMO3rp0ugGLWg6H8zRRuXcVafXizPVxLUf', '2018-11-08 02:25:12', '2018-11-08 02:25:12'),
(59, '::1', 'vhOaI6fuOXyk1pF7aZFQakR46zhMBF1SZCPk0qtP', '2018-11-08 07:15:20', '2018-11-08 07:15:20'),
(60, '::1', 'dh48PVtE20THPts5xg3P3MjiGnEKORQEo4vPUBMS', '2018-11-09 02:11:10', '2018-11-09 02:11:10'),
(61, '::1', 'QI4QWwDaX8bTA4x4j9LAmq2eTEXU2w2UTBnFKXKO', '2018-11-09 02:38:02', '2018-11-09 02:38:02'),
(62, '::1', 'QJ0PLgOOFxgJgt94A5QhvyKNqH71PHKHCZOy70ll', '2018-11-09 07:13:49', '2018-11-09 07:13:49'),
(63, '::1', 'osu4BRRUcyGCigJgP4QDxOyD91Bzzy8uMqFLtBjP', '2018-11-09 07:22:47', '2018-11-09 07:22:47'),
(64, '::1', '9EZVjuNU3AuCn7NwHMk0kjoF6HFPqrSuETBuKAcg', '2018-11-10 01:02:43', '2018-11-10 01:02:43'),
(65, '::1', 'pRXYL8WzSnnHFWobDFOPqU6HJQ3vqdHi2eAICFgn', '2018-11-10 03:23:21', '2018-11-10 03:23:21'),
(66, '::1', 'loXUgTiQs1dTpIxkTRAFxq5qwwuDedn9BsbWzWiy', '2018-11-12 02:34:39', '2018-11-12 02:34:39'),
(67, '::1', '59lb9DLNf1EIrKHX4AiSgyxumDFk1LYvfrIZc1Ik', '2018-11-12 04:03:07', '2018-11-12 04:03:07'),
(68, '::1', 'VBlGMwGy8mYFaz4zq3g8fpXRPlChYRT9Hv2JXGVz', '2018-11-12 07:12:10', '2018-11-12 07:12:10'),
(69, '::1', 'hFirJD6UdMzdK9UYputQQoScFrmGAgUAUaRclRUI', '2018-11-13 02:14:50', '2018-11-13 02:14:50'),
(70, '::1', 'EIz82OjLIXwnPnJeY8iV1sAM2lxaegS6K3Yt2rJ2', '2018-11-13 06:55:47', '2018-11-13 06:55:47'),
(71, '::1', 'yMDShGZRmUL6AipLRu8DgcVjXXOOJj5sQlzvyM3q', '2018-11-14 02:02:57', '2018-11-14 02:02:57'),
(72, '::1', 'i4mbPs2aNG9IDYIvhhfRPkD4GMr9lMBn40nZA0c9', '2018-11-14 07:45:18', '2018-11-14 07:45:18'),
(73, '::1', '8dM2nioRH43wahqQ7DOt5knz4vs5dS5Q3U4I0tjh', '2018-11-14 09:28:20', '2018-11-14 09:28:20'),
(74, '::1', 'IiYuZh1FmjxzQOx0fsAgdgqCU13b1ex3c830KNaL', '2018-11-15 01:46:31', '2018-11-15 01:46:31'),
(75, '::1', 'DUngd8j6tZBKJtm3Hrf6O2VKctHaONeEPntaWS2I', '2018-11-15 06:54:47', '2018-11-15 06:54:47'),
(76, '::1', 'eZJKl2ODxpsqA1L9L3DHg4GwKYY18nEmPo64iiqR', '2018-11-15 07:04:19', '2018-11-15 07:04:19'),
(77, '::1', 'HG1oeCw8YTJ1i04ZDrQ2XGZSopRcngDqYgFZSetK', '2018-11-16 02:21:43', '2018-11-16 02:21:43'),
(78, '::1', 'gSlHf6wV7HuOpXRm3ur2DkFFsEE1Y5KznBc1I8VZ', '2018-11-16 04:23:01', '2018-11-16 04:23:01'),
(79, '::1', 'qwHG9Gsv18Us5epRjyJTmEA4svjA3Fy0kpfMkNud', '2018-11-19 02:23:31', '2018-11-19 02:23:31'),
(80, '::1', 'q26IU6AaqmxjNlCIzgOgH8gmvHiqTil0m9URnyE7', '2018-11-19 02:52:57', '2018-11-19 02:52:57'),
(81, '::1', 'Z6FWiALYCdjyX4lauAd6w07IRVZJ1ymXOKBHdQu9', '2018-11-19 07:30:33', '2018-11-19 07:30:33'),
(82, '::1', 'mPIVwcQsi4nj7Kgj80DO0fHhqR2xqNFbLl5T4tE5', '2018-11-19 07:46:01', '2018-11-19 07:46:01'),
(83, '::1', '8KBuw4hiQ6uvmXBtrQ5FzTJbgT9nQQLxKjZMDS4O', '2018-11-20 01:39:48', '2018-11-20 01:39:48'),
(84, '::1', 'x1pS6hN17TrKjxx54gxK6YHnhX6fhq8qsV73CIXh', '2018-11-20 01:52:02', '2018-11-20 01:52:02'),
(85, '::1', 'bHoT46vkLRm26A9yYs8Ono2Kh6DYTt2qZ3ojZvh6', '2018-11-20 07:40:24', '2018-11-20 07:40:24'),
(86, '::1', 'A82Nw3KWKAbZs3l6mgGZFl5eRj3emqEUolAJAnIO', '2018-11-21 03:30:06', '2018-11-21 03:30:06'),
(87, '::1', 'G5IdanVBw1RDaaa7K1t3asYdjsVgb4gO2b87FT2M', '2018-11-21 03:58:56', '2018-11-21 03:58:56'),
(88, '::1', 'pKAg4uKgzgUKncunxKFYhQWmhLrBNlqRDeBecV86', '2018-11-21 07:02:13', '2018-11-21 07:02:13'),
(89, '::1', 'ueDLpbVrP6h6KEQDe8Y8vq8TdGm4L87uhXjdd1jN', '2018-11-21 08:03:24', '2018-11-21 08:03:24'),
(90, '::1', 'VyAXbfcyw9g2woileH3hKMiA8XmbjTGO8Q3iH7bj', '2018-11-22 02:10:02', '2018-11-22 02:10:02'),
(91, '::1', 'IYTnpnN9JrZQhpPkHXqHH8OZpQVzu67tBFxR6PrC', '2018-11-22 02:21:14', '2018-11-22 02:21:14'),
(92, '::1', 'Cu3p8zimTfrcqQsNk9HxDHnTO8HVUjEGy0IWSno9', '2018-11-22 05:10:07', '2018-11-22 05:10:07'),
(93, '::1', 'IqsyFqFmV9gf2Z1JSOdQtaNondLsGciEqSfSqmDI', '2018-11-23 01:34:22', '2018-11-23 01:34:22'),
(94, '::1', 'okdgm7eeInVZJH3q7WOI6XiDKErlgC5m25l90PuV', '2018-11-23 02:28:07', '2018-11-23 02:28:07'),
(95, '::1', 'STiNd0flzJS8KRNjmQUMUJTNGBZfVnCgZANS476Z', '2018-11-23 06:54:17', '2018-11-23 06:54:17'),
(96, '::1', '5OST4Wmr9Zj5LyKIWH8JQ7TqElwJVCessNHHpUc2', '2018-11-26 02:20:23', '2018-11-26 02:20:23'),
(97, '::1', 'vOHRM58vo1Va6Flgl1ewGTWIZoiQkTIEX1SfaekM', '2018-11-26 06:54:58', '2018-11-26 06:54:58'),
(98, '::1', 'AB4z73dx027ttQUw54PVfSjuarWjf3sOwpMsIdnh', '2018-11-26 10:29:37', '2018-11-26 10:29:37'),
(99, '::1', '38Dk77rio7W9SGNgEpZVI7BT7z7mnFwryQzeixNY', '2018-11-27 01:53:06', '2018-11-27 01:53:06'),
(100, '::1', 'AKFduhk5m6PVyYhUyqeELULr0j5GyuYeIeYg8X8w', '2018-11-28 02:09:23', '2018-11-28 02:09:23'),
(101, '::1', 'Jb61edir7L9wBlLh6MmLJblKOpy28EPlbzno240b', '2018-11-28 07:14:41', '2018-11-28 07:14:41'),
(102, '::1', 'h6WxhCgX2Eax1vUBKx8AKiT7mi3DBhYIJmjQDzvJ', '2018-11-28 07:56:04', '2018-11-28 07:56:04'),
(103, '::1', '3aGvmymTk5O8rSbLQ4EMsBJqQsOW3EU7jtq4izb1', '2018-11-29 01:55:05', '2018-11-29 01:55:05'),
(104, '::1', 'bWdOMrCYRtg6RGlXN4KswJMlN0zT6X9sA5eC0mHO', '2018-11-29 02:13:48', '2018-11-29 02:13:48'),
(105, '::1', 'k46vpqfjnbf9M8txrrCgX2HGhzlgfXgabPcdoWC4', '2018-11-29 07:18:55', '2018-11-29 07:18:55'),
(106, '::1', '3HOwcth7OFCz5dI5rjTuHFQptG2CPRtnXi2eTrIv', '2018-11-30 02:48:08', '2018-11-30 02:48:08'),
(107, '::1', 'yGw5rr5UT5SfrTjT5PW59RsQwkFsi0ADQN84lMoH', '2018-11-30 07:17:28', '2018-11-30 07:17:28'),
(108, '::1', 'ljRdu1OINDYliEs87Rzb3Lo9YygYcBm49YpdNBow', '2018-12-01 02:52:34', '2018-12-01 02:52:34'),
(109, '::1', '8IJVaGcXIOp4zEOXdl5ZtYbzDjV3V3zZ1quuj19I', '2018-12-02 02:29:51', '2018-12-02 02:29:51'),
(110, '::1', 'gR24liRXXW3LhzdJpKK2hwhyPntU583qUnDyf2Li', '2018-12-03 02:10:45', '2018-12-03 02:10:45'),
(111, '::1', 'qNpqpKtEf5ZuPdYUYTrlJsPcKrM3YQazihxfiw11', '2018-12-04 02:09:54', '2018-12-04 02:09:54'),
(112, '::1', 'nNEhML7R7eGtqHGXpKhXRZginDVzimj6shOa6Zpk', '2018-12-04 02:59:03', '2018-12-04 02:59:03'),
(113, '::1', '0sb8dnRLngZOGhyn5XB70y7EVy8mVOQNkVUSqzAi', '2018-12-05 02:41:10', '2018-12-05 02:41:10'),
(114, '::1', '96xE9d9HxnH1Hl0mSR3LF5PDj26l6QE3fmJbEY4o', '2018-12-05 07:14:02', '2018-12-05 07:14:02'),
(115, '::1', 'ebNpKtCfmtyxAIdCXh7L5s1vllR4s6SScozl23W9', '2018-12-06 02:10:19', '2018-12-06 02:10:19'),
(116, '::1', 'dAOFWmU8YkL5xVmVtBNQOItgkMFRAVgrXh1dw7K6', '2018-12-06 03:13:32', '2018-12-06 03:13:32'),
(117, '::1', 'rA4qAK5s9VmBcEzJJdUXwpM6FdM6mges4cAKJP7T', '2018-12-06 07:03:36', '2018-12-06 07:03:36'),
(118, '::1', 'CFT40jScHhAup9sKFz40qZWWNvoYm57RlOcn0syt', '2018-12-06 07:12:24', '2018-12-06 07:12:24'),
(119, '::1', 'iR5nSV1tdhkj3Wkid8tyBp9RkwL3tYvmz99Tp1Ly', '2018-12-07 02:00:45', '2018-12-07 02:00:45'),
(120, '::1', '7AOXtKM11etfxWT0BWscGs94qIm9lM7U2FFW7boB', '2018-12-07 03:03:30', '2018-12-07 03:03:30'),
(121, '::1', 'UyNil0fd62XPvqMSvt9OQBFaKLvTLqg8NQv3oYeF', '2018-12-07 06:57:31', '2018-12-07 06:57:31'),
(122, '::1', 'vTWCLJKF0D0tAe8ALEJ6zCVY01sNnZ6HcgIuypS2', '2018-12-08 07:38:04', '2018-12-08 07:38:04'),
(123, '::1', 'plfTy9RJo9Qi3szIPzwHSALjpmxrRxaSTL1UOvty', '2018-12-08 08:04:35', '2018-12-08 08:04:35'),
(124, '::1', 'hWZU54rAuxICt7i027eF8oJnvAXDc2Kb0Oocgi22', '2018-12-10 02:04:38', '2018-12-10 02:04:38'),
(125, '::1', 'wk7VFyIUsUwGmlN42LMMURzrLBkGFEdoI6iiTzbT', '2018-12-10 04:22:28', '2018-12-10 04:22:28'),
(126, '::1', 'CCGPmKOK1aKeXqbH2wiPzl10ssPPiy9oMhbIToeV', '2018-12-11 02:13:18', '2018-12-11 02:13:18'),
(127, '::1', 'rC0TxjaPdF1zsRckXto10UXhHmWGy7Qicmwi2YOV', '2018-12-11 07:09:32', '2018-12-11 07:09:32'),
(128, '127.0.0.1', 'DXEGo7prallHFHjjDqeW5SzWQwlyfGFuiDljOtC5', '2018-12-12 07:58:54', '2018-12-12 07:58:54'),
(129, '127.0.0.1', 'VWvrfvOQM0IQiogqGxIda7lwUstuegIt3MxJdYcI', '2018-12-13 01:32:14', '2018-12-13 01:32:14'),
(130, '127.0.0.1', '0zzeFhKC1sersgXbLIPXZ1VI6dbwWwABaJg5EW5S', '2018-12-13 01:37:15', '2018-12-13 01:37:15'),
(131, '127.0.0.1', 'hqujdKk0xHAmroEnthXezqVGxySHp0QH72S0VUaK', '2018-12-13 04:04:15', '2018-12-13 04:04:15'),
(132, '127.0.0.1', 'sIWtJWRCS4wvKx9ILySlk61rY75yylVqGEW81KNs', '2018-12-13 07:10:07', '2018-12-13 07:10:07'),
(133, '127.0.0.1', 'mvVIrmPTkITaBT28j4Xxir8kjs9WMgVJMCygmvNe', '2018-12-13 07:10:07', '2018-12-13 07:10:07'),
(134, '127.0.0.1', 'ATRI4F3r63VOsDGZNAK89L17ycMYbXawsTHE2cSn', '2018-12-14 01:59:09', '2018-12-14 01:59:09'),
(135, '127.0.0.1', 'Phzr6k63Sdz773XOnnurRpLuGcOvf42oXCjpLR2D', '2018-12-14 01:59:09', '2018-12-14 01:59:09'),
(136, '127.0.0.1', 'VuuPYpUfVJ5fXRzocSDLKemVDbRhtDmwuHjVlrJU', '2018-12-15 01:49:38', '2018-12-15 01:49:38'),
(137, '127.0.0.1', 'WNukknIej3izVt2w42BO9zyZTiP4kWLRj0ySkv5p', '2018-12-15 01:49:38', '2018-12-15 01:49:38'),
(138, '127.0.0.1', 'VoooGXsqmGYhL6ihlNkgfIsrPhsuIlzNKv3zzARj', '2018-12-18 02:16:07', '2018-12-18 02:16:07'),
(139, '127.0.0.1', 'Bob470wdbgO3AWsqjnTdcYp6RTY8DlbWj7lo3Cej', '2018-12-25 08:19:25', '2018-12-25 08:19:25'),
(140, '127.0.0.1', 'MR6VlUxVsJeimjk9cuTGUrRZnQuktS5fgOLdQ19Y', '2018-12-28 09:08:32', '2018-12-28 09:08:32'),
(141, '127.0.0.1', 'hKhl5HSzd872Gj0S03znZso1uVZIaRMhAmfq98Mx', '2018-12-29 01:38:59', '2018-12-29 01:38:59'),
(142, '127.0.0.1', 'lqWfLejpluGCbiO45XQ1zNW6YkRsvvqmq9KxSZCx', '2019-01-02 02:43:59', '2019-01-02 02:43:59'),
(143, '127.0.0.1', 'p1gM2sJQ6dcURDgACDjRX7PzVEidhVaeawFguxOq', '2019-01-03 03:04:34', '2019-01-03 03:04:34'),
(144, '127.0.0.1', 'AOh82dkr6q8GKiC9xB69ksIq6HrdMuIPvzgodmBn', '2019-01-05 03:20:41', '2019-01-05 03:20:41'),
(145, '127.0.0.1', 'Ed5ZJmMTjtIRTaIPyyjeABRY5jZ5sN3JNXM605M6', '2019-01-05 03:20:42', '2019-01-05 03:20:42'),
(146, '127.0.0.1', 'AYvY38TP82dKExtRpm6OTnykj3dkpDCDV7ncyZuX', '2019-01-22 09:21:43', '2019-01-22 09:21:43'),
(147, '127.0.0.1', 'GfUBDnsxSEK23j8gKs9jqmMEZkfGGcuaKRWdhv12', '2019-01-22 09:21:43', '2019-01-22 09:21:43'),
(148, '127.0.0.1', 'Jz1lNyjARKznw2Sz22QinsyNWvVC8ALBIqGuDiuN', '2019-03-19 02:32:21', '2019-03-19 02:32:21'),
(149, '127.0.0.1', '4qOp9Tbc7ss3RXreVcvsI2QN2GHxIaS4xhOXbUbX', '2019-03-19 07:34:36', '2019-03-19 07:34:36'),
(150, '127.0.0.1', 'btLoNI9vK1aPIC4MFpXMAKgiZCBGBy4ScKsHYARN', '2019-03-27 07:33:03', '2019-03-27 07:33:03'),
(151, '127.0.0.1', 'pfONfK1g1dwI7k3is97IQsJk4Xz7QzlOzmSBaSu1', '2019-04-03 02:09:23', '2019-04-03 02:09:23'),
(152, '127.0.0.1', 'Q1pz43NYXXRodmQgFncGOPuuam90QT6d7cWhUolH', '2019-04-03 08:00:47', '2019-04-03 08:00:47'),
(153, '127.0.0.1', 'ccZgK3dYKjUzXHLheZsTqWTfc9801kWmMB8sQw0Z', '2019-04-04 03:17:00', '2019-04-04 03:17:00'),
(154, '127.0.0.1', 'DriJJB7Q3wDAvrb7u61Wt0tu4yndc56e9eHTBYn5', '2019-04-08 02:23:14', '2019-04-08 02:23:14'),
(155, '127.0.0.1', 'lRpIOb3PoesKlPhuo84Nvt4Txe6T9nd3DdDXbCET', '2019-04-11 02:43:43', '2019-04-11 02:43:43'),
(156, '127.0.0.1', 'mEvmABJLSfttBWFrf0mMF1IGxcbkaMAk4Y441PmY', '2019-04-11 09:27:37', '2019-04-11 09:27:37'),
(157, '127.0.0.1', 'zrt9t6hVAeqCPBBzFsISyHIP3pLJ0RvQ1pBPctjb', '2019-04-12 09:22:42', '2019-04-12 09:22:42'),
(158, '127.0.0.1', 'KCPOGYqCEqXFTznC2zNaycKdiOZQa0xcaKMD2ppb', '2019-05-04 02:16:49', '2019-05-04 02:16:49'),
(159, '127.0.0.1', 'tr0OaBIGpccws2UMuAKC8qODp2thStMAmUSCDYcp', '2019-06-05 01:38:53', '2019-06-05 01:38:53'),
(160, '127.0.0.1', 'wcOcSsGH1Z84NZY1HONamoiPICdjPIkS7Tj0UO2S', '2019-07-17 14:48:22', '2019-07-17 14:48:22'),
(161, '127.0.0.1', '259HeCgIMic9sSbkmT0f80v6tCtFrCGRzkqTrVxE', '2019-07-17 15:29:07', '2019-07-17 15:29:07');

--
-- Chỉ mục cho các bảng đã đổ
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanloai` (`phanloai`);

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
-- Chỉ mục cho bảng `ttngaynghile`
--
ALTER TABLE `ttngaynghile`
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
-- AUTO_INCREMENT cho bảng `binhongia`
--
ALTER TABLE `binhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `binhongiact`
--
ALTER TABLE `binhongiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT cho bảng `cskddvlt`
--
ALTER TABLE `cskddvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `daugiadatct`
--
ALTER TABLE `daugiadatct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `daugiadatctdf`
--
ALTER TABLE `daugiadatctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `diabanhd`
--
ALTER TABLE `diabanhd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dkgdoanhnghiep`
--
ALTER TABLE `dkgdoanhnghiep`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `dkghoso`
--
ALTER TABLE `dkghoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `dkghosoct`
--
ALTER TABLE `dkghosoct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT cho bảng `dkghosoctdf`
--
ALTER TABLE `dkghosoctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `dmctthamdinhgiahh`
--
ALTER TABLE `dmctthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `dmdvkcb`
--
ALTER TABLE `dmdvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT cho bảng `dmgiadvgddt`
--
ALTER TABLE `dmgiadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dmgiarung`
--
ALTER TABLE `dmgiarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dmgiathuemuanhaxh`
--
ALTER TABLE `dmgiathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT cho bảng `dmmhbinhongia`
--
ALTER TABLE `dmmhbinhongia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `dmnhomhanghoa`
--
ALTER TABLE `dmnhomhanghoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dmphilephi`
--
ALTER TABLE `dmphilephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `dmqdgiadat`
--
ALTER TABLE `dmqdgiadat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `dmthamdinhgiahh`
--
ALTER TABLE `dmthamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `dmthuetn`
--
ALTER TABLE `dmthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;
--
-- AUTO_INCREMENT cho bảng `dmvlxd`
--
ALTER TABLE `dmvlxd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dtapdungdvlt`
--
ALTER TABLE `dtapdungdvlt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dvkcb`
--
ALTER TABLE `dvkcb`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `dvkcbct`
--
ALTER TABLE `dvkcbct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT cho bảng `dvkcbctdf`
--
ALTER TABLE `dvkcbctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT cho bảng `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giacacloaidat`
--
ALTER TABLE `giacacloaidat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT cho bảng `giadvgddt`
--
ALTER TABLE `giadvgddt`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giadvgddtct`
--
ALTER TABLE `giadvgddtct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giadvgddtctdf`
--
ALTER TABLE `giadvgddtctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giahhdvk`
--
ALTER TABLE `giahhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `giahhdvkct`
--
ALTER TABLE `giahhdvkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT cho bảng `giahhdvkctdf`
--
ALTER TABLE `giahhdvkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT cho bảng `gianuocsh`
--
ALTER TABLE `gianuocsh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `gianuocshct`
--
ALTER TABLE `gianuocshct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `gianuocshctdf`
--
ALTER TABLE `gianuocshctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giarung`
--
ALTER TABLE `giarung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giarungct`
--
ALTER TABLE `giarungct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `giarungctdf`
--
ALTER TABLE `giarungctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuoc`
--
ALTER TABLE `giathuedatnuoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuocct`
--
ALTER TABLE `giathuedatnuocct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `giathuedatnuocctdf`
--
ALTER TABLE `giathuedatnuocctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxh`
--
ALTER TABLE `giathuemuanhaxh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxhct`
--
ALTER TABLE `giathuemuanhaxhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `giathuemuanhaxhctdf`
--
ALTER TABLE `giathuemuanhaxhctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giathuetscong`
--
ALTER TABLE `giathuetscong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `giathuetscongct`
--
ALTER TABLE `giathuetscongct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `giathuetscongctdf`
--
ALTER TABLE `giathuetscongctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `giavtxk`
--
ALTER TABLE `giavtxk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `giavtxkct`
--
ALTER TABLE `giavtxkct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `giavtxkctdf`
--
ALTER TABLE `giavtxkctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT cho bảng `kkdkg`
--
ALTER TABLE `kkdkg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `kkdkgct`
--
ALTER TABLE `kkdkgct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `kkgiadvltct`
--
ALTER TABLE `kkgiadvltct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `kkgiadvltctdf`
--
ALTER TABLE `kkgiadvltctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `kkgiatacn`
--
ALTER TABLE `kkgiatacn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `kkgiatacnct`
--
ALTER TABLE `kkgiatacnct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `kkgiatacnctdf`
--
ALTER TABLE `kkgiatacnctdf`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `kkgiavtxtxct`
--
ALTER TABLE `kkgiavtxtxct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `kkgsct`
--
ALTER TABLE `kkgsct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `kkgsctdf`
--
ALTER TABLE `kkgsctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `lephitruocba`
--
ALTER TABLE `lephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `lephitruocbact`
--
ALTER TABLE `lephitruocbact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `nhomhhdvk`
--
ALTER TABLE `nhomhhdvk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `nhomlephitruocba`
--
ALTER TABLE `nhomlephitruocba`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `nhomthuetn`
--
ALTER TABLE `nhomthuetn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `philephi`
--
ALTER TABLE `philephi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `philephict`
--
ALTER TABLE `philephict`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiact`
--
ALTER TABLE `thamdinhgiact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiactdf`
--
ALTER TABLE `thamdinhgiactdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiahh`
--
ALTER TABLE `thamdinhgiahh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `thamdinhgiahhct`
--
ALTER TABLE `thamdinhgiahhct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `thuetainguyenct`
--
ALTER TABLE `thuetainguyenct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT cho bảng `thuetainguyenctdf`
--
ALTER TABLE `thuetainguyenctdf`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT cho bảng `town`
--
ALTER TABLE `town`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `ttdntd`
--
ALTER TABLE `ttdntd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `ttngaynghile`
--
ALTER TABLE `ttngaynghile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `vanbanqlnn`
--
ALTER TABLE `vanbanqlnn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `viewpage`
--
ALTER TABLE `viewpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
