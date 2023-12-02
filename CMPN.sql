SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- Cơ sở dữ liệu: `dichvuin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `in_tai_lieu`
--

CREATE TABLE `hoa_don` (
  `MaHoaDon` int(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `KhoGiay` char(2) NOT NULL,
  `SoMatIn` varchar(20) NOT NULL,
  `TrangThai` varchar(20) NOT NULL,
  `TenDangNhap` varchar(30) NOT NULL,
  `ThoiGianHenLay` time NOT NULL,
  `SoTrangTrongFile` int(10) NOT NULL,
  `TenFile` varchar(40) NOT NULL,
  `Pagespersheet` varchar(20) NOT NULL,
  `GioHoanThanhIn` time NOT NULL,
  `NgayHoanthanhIn` date NOT NULL,
  `GioIn` time NOT NULL,
  `NgayIn` date NOT NULL,
  `TrangBatDau` int(10) NOT NULL,
  `TrangKetThuc` int(10) NOT NULL,
  `SoBanIn` int(10) NOT NULL,
  `MaMayIn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `in_tai_lieu`
--

-- INSERT INTO `in_tai_lieu` (`TenDangNhap`, `MaMayIn`, `GioIn`, `NgayIn`, `NgayHoanthanhIn`, `GioHoanThanhIn`, `TenFile`, `SoTrangTrongFile`, `KhoGiay`, `SoMatIn`, `ThoiGianHoanThanhIn`, `NgayLay`, `ThoiGianDenLay`, `SoBanIn`, `TrangThai`) VALUES
-- ('sinhvien1', 'MAY02', '19:44:32', '2023-11-28', '2023-11-28', '19:44:32', '1701197072_TestReport.xls', 4, 'A', 4, '19:44:32', '2023-11-28', '19:44:32', 2, 'ok'),
-- ('sinhvien2', 'MAY02', '19:45:31', '2023-11-28', '2023-11-28', '19:45:31', '1701197131_TestReport.xls', 4, 'A', 4, '19:45:31', '2023-11-28', '19:45:31', 2, 'ok');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `may_in`
--

CREATE TABLE `may_in` (
  `MaMayIn` varchar(8) NOT NULL,
  `CoSo` varchar(1) NOT NULL,
  `Toa` varchar(2) NOT NULL,
  `LoaiMayIn` varchar(10) NOT NULL,
  `TrangThaiHoatDong` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `may_in`
--

INSERT INTO `may_in` (`MaMayIn`, `CoSo`, `Toa`, `LoaiMayIn`, `TrangThaiHoatDong`) VALUES
('MAY02', '1', 'B10', 'Lazer', 'Hoàn Thành'),
('MAY03', '2', 'H3', 'Lazer', 'Hoàn Thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_ly`
--

CREATE TABLE `quan_ly` (
  `MaMayIn` varchar(8) NOT NULL,
  `TenDangNhap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

CREATE TABLE `sinh_vien` (
  `TenDangNhap` varchar(30) NOT NULL,
  `MSSV` int(7) NOT NULL,
  `HoTenDem` varchar(40) NOT NULL,
  `Ten` varchar(10) NOT NULL,
  `Khoa` varchar(3) NOT NULL,
  `SoTrangSoHuu` int(11) NOT NULL,
  `LopSinhHoat` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`TenDangNhap`, `MSSV`, `HoTenDem`, `Ten`, `Khoa`, `SoTrangSoHuu`, `LopSinhHoat`) VALUES
('hiuchoet123', 2110168, 'Le Trung', 'Hieu', 'K21', 6, 'MTKH04'),
('taivoslno1', 2110516, 'Vo Tan', 'Tai', 'K22', 4, 'MTKH01'),
('khanhmap1213', 2110250, 'Lai Nguyen Tuan', 'Khanh', 'K21', 15, 'MTKH03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spso`
--

CREATE TABLE `spso` (
  `TenDangNhap` varchar(30) NOT NULL,
  `MaSPSO` varchar(8) NOT NULL,
  `HoTenDem` varchar(40) NOT NULL,
  `Ten` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_lichsumuagiay`
--

CREATE TABLE `sv_lichsumuagiay` (
  `TenDangNhap` varchar(30) NOT NULL,
  `SoTrangMua` int(11) NOT NULL,
  `NgayMuaGiay` date NOT NULL,
  `GioMuaGiay` time NOT NULL,
  `TongSoTienThanhToan` int(11) NOT NULL,
  `PhuongThucThanhToan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sv_lichsumuagiay`
--

-- INSERT INTO `sv_lichsumuagiay` (`TenDangNhap`, `SoTrangMua`, `NgayMuaGiay`, `GioMuaGiay`, `TongSoTienThanhToan`,'PhuongThucThanhToan') VALUES
-- ('sinhvien1', 2, '2023-11-28', '19:44:32', 200000,'Momo'),
-- ('sinhvien1', 4, '0000-00-00', '11:05:05', 50000,'Credit'),
-- ('sinhvien2', 2, '2023-11-28', '19:45:31', 200000,'ZaloPay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `TenDangNhap` varchar(30) NOT NULL,
  `ThoiDiemMoTaiKhoan` date NOT NULL,
  `MatKhau` varchar(30) NOT NULL,
  `NgayDangNhapCuoi` date NOT NULL,
  `GioDangNhapCuoi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`TenDangNhap`, `ThoiDiemMoTaiKhoan`, `MatKhau`, `NgayDangNhapCuoi`, `GioDangNhapCuoi`) VALUES
('hiuchoet123', '2023-10-19', '143243223456', '2023-11-24', '00:00:11'),
('taivoslno1', '2022-12-15', '123452126', '0000-00-00', '00:00:11'),
('khanhmap1213', '0000-00-00', '123421312356', '0000-00-00', '00:00:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_email`
--

CREATE TABLE `tai_khoan_email` (
  `TenDangNhap` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan_sdt`
--

CREATE TABLE `tai_khoan_sdt` (
  `TenDangNhap` varchar(30) NOT NULL,
  `SDT` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `in_tai_lieu`
--
-- ALTER TABLE `hoa_don`
--   ADD PRIMARY KEY (`MaHoaDon`),
--   ADD KEY `MaHoaDon` (`MaHoaDon`);
--
-- Chỉ mục cho bảng `may_in`
--
ALTER TABLE `may_in`
  ADD PRIMARY KEY (`MaMayIn`);

--
-- Chỉ mục cho bảng `quan_ly`
--
ALTER TABLE `quan_ly`
  ADD PRIMARY KEY (`MaMayIn`,`TenDangNhap`),
  ADD KEY `TenDangNhap` (`TenDangNhap`);

--
-- Chỉ mục cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD PRIMARY KEY (`TenDangNhap`),
  ADD UNIQUE KEY `MSSV` (`MSSV`);

--
-- Chỉ mục cho bảng `spso`
--
ALTER TABLE `spso`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- Chỉ mục cho bảng `sv_lichsumuagiay`
--
ALTER TABLE `sv_lichsumuagiay`
  ADD PRIMARY KEY (`TenDangNhap`,`SoTrangMua`,`NgayMuaGiay`,`GioMuaGiay`,`TongSoTienThanhToan`,`PhuongThucThanhToan`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- Chỉ mục cho bảng `tai_khoan_email`
--
ALTER TABLE `tai_khoan_email`
  ADD PRIMARY KEY (`TenDangNhap`,`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `tai_khoan_sdt`
--
ALTER TABLE `tai_khoan_sdt`
  ADD PRIMARY KEY (`TenDangNhap`,`SDT`),
  ADD UNIQUE KEY `SDT` (`SDT`);
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `in_tai_lieu`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `sinh_vien` (`TenDangNhap`),
  ADD CONSTRAINT `hoa_don_ibfk_2` FOREIGN KEY (`MaMayIn`) REFERENCES `may_in` (`MaMayIn`);

--
-- Các ràng buộc cho bảng `quan_ly`
--
ALTER TABLE `quan_ly`
  ADD CONSTRAINT `quan_ly_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `spso` (`TenDangNhap`),
  ADD CONSTRAINT `quan_ly_ibfk_2` FOREIGN KEY (`MaMayIn`) REFERENCES `may_in` (`MaMayIn`);

--
-- Các ràng buộc cho bảng `sinh_vien`
--
ALTER TABLE `sinh_vien`
  ADD CONSTRAINT `sinh_vien_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `tai_khoan` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `spso`
--
ALTER TABLE `spso`
  ADD CONSTRAINT `spso_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `tai_khoan` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `sv_lichsumuagiay`
--
ALTER TABLE `sv_lichsumuagiay`
  ADD CONSTRAINT `sv_lichsumuagiay_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `sinh_vien` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `tai_khoan_email`
--
ALTER TABLE `tai_khoan_email`
  ADD CONSTRAINT `tai_khoan_email_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `tai_khoan` (`TenDangNhap`);

--
-- Các ràng buộc cho bảng `tai_khoan_sdt`
--
ALTER TABLE `tai_khoan_sdt`
  ADD CONSTRAINT `tai_khoan_sdt_ibfk_1` FOREIGN KEY (`TenDangNhap`) REFERENCES `tai_khoan` (`TenDangNhap`);
COMMIT;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
