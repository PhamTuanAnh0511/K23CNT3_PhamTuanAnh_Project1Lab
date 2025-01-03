USE [k23cnt3_phamtuananh_2310900003]
GO
/****** Object:  Table [dbo].[pta_CT_HOA_DON]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_CT_HOA_DON](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_HoaDonID] [int] NOT NULL,
	[pta_SanPhamID] [int] NOT NULL,
	[pta_SoLuongMua] [int] NOT NULL,
	[pta_DonGiaMua] [float] NOT NULL,
	[pta_ThanhTien] [float] NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_HOA_DON]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_HOA_DON](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_MaHoaDon] [nvarchar](50) NOT NULL,
	[pta_MaKhachHang] [int] NOT NULL,
	[pta_NgayHoaDon] [date] NOT NULL,
	[pta_Email] [nvarchar](255) NULL,
	[pta_DienThoai] [nvarchar](50) NULL,
	[pta_DiaChi] [nvarchar](255) NULL,
	[pta_TongTriGia] [float] NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_KHACH_HANG]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_KHACH_HANG](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_MaKhachHang] [nvarchar](50) NULL,
	[pta_HoTenKhachHang] [nvarchar](255) NOT NULL,
	[pta_Email] [nvarchar](255) NULL,
	[pta_MatKhau] [nvarchar](255) NOT NULL,
	[pta_DienThoai] [nvarchar](50) NULL,
	[pta_DiaChi] [nvarchar](255) NULL,
	[pta_NgayDangKy] [date] NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_LOAI_SAN_PHAM]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_LOAI_SAN_PHAM](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_MaLoai] [nvarchar](50) NULL,
	[pta_TenLoai] [nvarchar](255) NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_QUAN_TRI]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_QUAN_TRI](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_TaiKhoan] [nvarchar](50) NOT NULL,
	[pta_MatKhau] [nvarchar](255) NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_SAN_PHAM]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_SAN_PHAM](
	[pta_ID] [int] IDENTITY(1,1) NOT NULL,
	[pta_MaSanPham] [nvarchar](50) NOT NULL,
	[pta_TenSanPham] [nvarchar](255) NOT NULL,
	[pta_HinhAnh] [nvarchar](255) NULL,
	[pta_SoLuong] [int] NOT NULL,
	[pta_DonGia] [float] NOT NULL,
	[pta_MaLoai] [int] NOT NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[pta_ID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[pta_TIN_TUC]    Script Date: 04/01/2025 10:36:33 SA ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[pta_TIN_TUC](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[pta_MaTT] [nvarchar](50) NOT NULL,
	[pta_TieuDe] [nvarchar](255) NOT NULL,
	[pta_MoTa] [nvarchar](255) NULL,
	[pta_NoiDung] [nvarchar](max) NULL,
	[pta_NgayDangTin] [date] NOT NULL,
	[pta_NgayCapNhat] [date] NULL,
	[pta_HinhAnh] [nvarchar](255) NULL,
	[pta_TrangThai] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
ALTER TABLE [dbo].[pta_HOA_DON] ADD  DEFAULT (getdate()) FOR [pta_NgayHoaDon]
GO
ALTER TABLE [dbo].[pta_KHACH_HANG] ADD  DEFAULT (getdate()) FOR [pta_NgayDangKy]
GO
ALTER TABLE [dbo].[pta_TIN_TUC] ADD  DEFAULT (getdate()) FOR [pta_NgayDangTin]
GO
ALTER TABLE [dbo].[pta_CT_HOA_DON]  WITH CHECK ADD FOREIGN KEY([pta_HoaDonID])
REFERENCES [dbo].[pta_HOA_DON] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_CT_HOA_DON]  WITH CHECK ADD FOREIGN KEY([pta_SanPhamID])
REFERENCES [dbo].[pta_SAN_PHAM] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_CT_HOA_DON]  WITH CHECK ADD  CONSTRAINT [FK_CTHoaDon_SanPham] FOREIGN KEY([pta_SanPhamID])
REFERENCES [dbo].[pta_SAN_PHAM] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_CT_HOA_DON] CHECK CONSTRAINT [FK_CTHoaDon_SanPham]
GO
ALTER TABLE [dbo].[pta_HOA_DON]  WITH CHECK ADD FOREIGN KEY([pta_MaKhachHang])
REFERENCES [dbo].[pta_KHACH_HANG] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_HOA_DON]  WITH CHECK ADD  CONSTRAINT [FK_HoaDon_KhachHang] FOREIGN KEY([pta_MaKhachHang])
REFERENCES [dbo].[pta_KHACH_HANG] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_HOA_DON] CHECK CONSTRAINT [FK_HoaDon_KhachHang]
GO
ALTER TABLE [dbo].[pta_SAN_PHAM]  WITH CHECK ADD FOREIGN KEY([pta_MaLoai])
REFERENCES [dbo].[pta_LOAI_SAN_PHAM] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_SAN_PHAM]  WITH CHECK ADD  CONSTRAINT [FK_SanPham_LoaiSanPham] FOREIGN KEY([pta_MaLoai])
REFERENCES [dbo].[pta_LOAI_SAN_PHAM] ([pta_ID])
GO
ALTER TABLE [dbo].[pta_SAN_PHAM] CHECK CONSTRAINT [FK_SanPham_LoaiSanPham]
GO
