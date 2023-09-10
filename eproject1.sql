-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 25, 2021 lúc 07:13 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eproject1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `datefeedback` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'COD', 1),
(2, 'Internet Banking', 1),
(3, 'Pay at the store', 1),
(4, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: chưa xử lý; 2: đang xử lý; 3: đã xử lý; 4: hủy;',
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productportfolio`
--

CREATE TABLE `productportfolio` (
  `id` int(11) NOT NULL,
  `portfolio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productportfolio`
--

INSERT INTO `productportfolio` (`id`, `portfolio`, `status`) VALUES
(1, 'MAKE-UP', 1),
(2, 'NAIL ARTS', 1),
(3, 'HAIR', 1),
(4, 'JEWELLRY', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productportfolio` int(5) NOT NULL,
  `name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brandid`, `productportfolio`, `name`, `price`, `image`, `description`, `status`) VALUES
(10, 8, 1, 'KEM CHỐNG NẮNG CAO CẤP COSRX', 390000, 'timthumb.jpg', '<p>Sản phẩm với những th&agrave;nh phần tự nhi&ecirc;n th&acirc;n thiệt với mọi l&agrave;n da. Với chỉ số chống nắng SPF50+, PA++++ tạo n&ecirc;n lớp bảo vệ ho&agrave;n hảo khỏi tia UVA/ UVB v&agrave; c&aacute;c t&aacute;c động m&ocirc;i trường kh&aacute;c.</p>\r\n', 1),
(11, 8, 1, 'MẶT NẠ NGỦ COSRX PROPOLIS', 350000, 'COSRX PROPOLIS HONEY.jpg', 'Mặt nạ dưỡng ẩm 3 trong 1 có thể được sử dụng như mặt nạ qua đêm, kem dưỡng hoặc mặt nạ rửa\r\nĐược làm giàu với hơn 87% chiết xuất keo ong và sáp ong tự nhiên, mặt nạ này cung cấp dưỡng ẩm chuyên sâu với độ ẩm sảng khoái.', 1),
(12, 8, 1, 'COSRX FULL FIT HONEY GLOW KIT', 530000, 'COSRX FULL FIT HONEY GLOW KIT.jpg', 'COSRX Full Fit Honey Glow Trial Kit bao gồm 3 sản phẩm:\r\n\r\nNƯỚC HOA HỒNG COSRX PROPOLIS SYNERGY TONER (30ML)\r\nTINH CHẤT COSRX PROPOLIS LIGHT AMPOULE (10ML)\r\nKEM DƯỠNG COSRX PROPOLIS LIGHT CREAM (15ML)\r\n', 1),
(13, 8, 1, 'NƯỚC CÂN BẰNG CẤP ẨM COSRX HYD', 450000, 'nuoccanbang.jpg', 'Nước cân bằng cấp ẩm COSRX Hydrium Watery Toner', 1),
(15, 9, 1, 'Tinh Dầu Phục Hồi Làn Da Whoo ', 1640000, '0-51103882.jpg', 'Tinh dầu phục hồi làn da Whoo First Care Moisture Anti - Aging Essence\r\nĐánh thức sinh khí làn da. Hỗ trợ da tăng sinh khí, tăng độ tươi sáng. Giải nhiệt cho da, giảm vết ửng đỏ.', 1),
(16, 9, 1, 'Cushion Kem Hỗ Trợ Bảo Vệ Da', 11480000, '0-51102997.jpg', 'Cushion Kem Hỗ Trợ Bảo Vệ Da Whoo Jin Hea Yoon Cushion Sun Balm SPF50+/PA+++ đến từ thương hiệu Whoo nổi tiếng của Hàn Quốc, sản phẩm hỗ trợ bảo vệ da khỏi tia tử ngoại, hỗ trợ hiệu chỉnh làn da một cách tự nhiên, hỗ trợ dưỡng trắng, hỗ trợ giảm nhăn, thay lót nền và phấn phủ trang điểm', 1),
(17, 10, 1, 'TINH CHẤT NGĂN NGỪA LÃO HÓA', 990000, 'FCAS-2020_111173151_SwsFirstCareSerum.jpg', 'Công thức mới cải tiến vượt bậc!\r\nTinh chất đầu tiên bán chạy số 1 trên thị trường của Sulwhasoo\r\nThành phần dưỡng chất JAUM ActivatorTM thế hệ thứ 5, mạnh mẽ nhất từ trước đến nay\r\nTăng cường khả năng phục hồi tự nhiên của làn da mỗi ngày\r\nCải thiện nếp nhăn, cấp ẩm, hỗ trợ khả năng bảo vệ của hàng rào da, đồng thời giúp làn da sáng rạng rỡ và trong trẻo hơn', 1),
(18, 10, 1, 'PHẤN NƯỚC TRANG ĐIỂM DƯỠNG TRẮNG', 1400000, 'Make-up_111172349_SnowiseBrightening.jpg', 'BAO BÌ SẢN PHẨM CÓ THAY ĐỔI TÙY VÀO ĐỢT NHẬP HÀNG\r\n\r\nPhấn nước dưỡng trắng và kiềm dầu cho làn da bừng sáng, sắc da trong trẻo, mịn mượt và long lanh như sương mai.', 1),
(19, 10, 1, 'MẶT NẠ LỘT LÀM SẠCH TẾ BÀO CHẾT', 1060000, 'Mask_111173044_SWSCLARIFYINGMASK150ml_1_600x.jpg', 'Sản phẩm mặt nạ dạng lột, giúp làm sạch tế bào sừng chết và các tạp chất trên bề mặt da, cho hiệu quả làn da mịn màng.\r\n*Đặc tính sản phẩm mặt nạ lột Sulwhasoo:\r\n• Sự kết hợp của thành phần Ngọc Trúc và mật ong, tạo nên sự hài hòa hoàn, mang đến sức sống tươi mới cho làn da.\r\n• Mặt nạ dạng lột cho hiệu quả làm tinh khiết và phục hồi da.\r\n• Mùi hương thảo dược thiên nhiên đem đến trả nghiệm thư giãn cho làn da.', 1),
(20, 10, 1, 'COMBO TINH CHẤT THÔNG ĐỎ CAO CẤP', 8500000, 'SWS_TTpromo_06-02_906e5724.png', 'Quà kèm sản phẩm:\r\n\r\n1.Bộ dưỡng chống lão hoá toàn diện Thông đỏ x1\r\n2.Sữa rửa mặt chống lão hoá toàn diện Thông đỏ x1\r\n3.Mẫu thử tinh chất kích hoạt chống lão hóa đầu tiên Sulwhasoo First Care Activating Serum 0.7ml x5\r\n4.Tinh chất Nhân sâm cô đặc giải cứu làn da x1\r\nTinh chất ngăn ngừa lão hóa cao cấp toàn diện cải tiến chứa gấp đôi chiết xuất DAA ngăn ngừa lão hóa từ Thông Đỏ giúp cung cấp năng lượng cho làn da và điều trị những dấu hiệu lão hóa hiệu quả', 1),
(21, 11, 1, 'Nước thần Hoàng Kim Ngăn Ngừa Lão Hóa Da', 499000, '2066623_L.jpg', 'Nước thần tái sinh da Su:m37 Elixir Essence Secreta thuộc vào dòng cao cấp Losec Summa. Đây là loại tinh chất đặc biệt hơn so với Serum cũng như Ampoule ngày đêm. Nước thần này rất đậm đặc, điều trị và tái sinh da vượt trội. Chuyên phục hồi cho những làn da đã bị tổn thương sau điều trị như lăn kim… Nước thần tái sinh da Su:m37 Losec Summa Elixir Essence Secreta có chứa hàm lượng dinh dưỡng rất cao. Trong đó có các thành phần được lên men suốt thời gian dài của 10 loại cây giúp duy trì làn da khỏe mạnh và rạng rỡ.', 1),
(28, 2, 2, '3CE RED RECIPE LONG LASTING NAIL LACQUER #RD10', 105000, '1624556204_rd10-2.jpg', '<p>aaaaaaaaaa</p>\r\n', 1),
(31, 31, 4, 'Tiffany T Kim cương và Turquoise Wire Nhẫn', 51800000, '1624588599_aaaaaaaaaa.jpg', '', 1),
(32, 31, 4, 'Trang sức Tiffany & Co. & Co. Vàng hồng 18K Band', 18000000, 'tiffany-co-band-ring-33133189.jpg', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `showbrands`
--

CREATE TABLE `showbrands` (
  `id` int(11) NOT NULL,
  `brandname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `imagelogo` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `showbrands`
--

INSERT INTO `showbrands` (`id`, `brandname`, `imagelogo`, `status`) VALUES
(8, 'Cosrx', 'logo-cosrx.jpg', 1),
(9, 'Whoo', 'whoo-ohui.png', 1),
(10, 'Sulwhasoo', 'Sulwhasoo.png', 1),
(11, 'SU:M 37', 'logo-sum-37.jpg', 1),
(12, 'Laneige', 'Laneige.png', 1),
(30, '3CE', '3ce-logo.jpg', 1),
(31, 'Tiffany & Co.', 'd5f45dc9e8bb04c1dc4415cd394e9c25.jpg', 1),
(33, 'Moroccanoil', 'moroccanoil_logo_3fc8e4bfa4ae4d4ab09d14fcd514ca4a_grande.jpg', 1),
(34, 'Buccellati', '29e6b2abf9e37f831c1b4e2cdd8c03ad.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `mobile`, `address`, `email`, `status`) VALUES
(21, 'tanh', 'c4ca4238a0b923820dcc509a6f75849b', 'Tuan Anh', 1234567890, 'Bằng Trai, Vĩnh Hồng, Hải Dương', 'tanh@gmail.com', 1),
(33, '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '', '', 1),
(34, 'hien', '202cb962ac59075b964b07152d234b70', 'thúy hiền', 964476333, 'Sồi Cầu', 'tanh30102002@gmail.c', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`productid`,`orderid`);

--
-- Chỉ mục cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productportfolio`
--
ALTER TABLE `productportfolio`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `showbrands`
--
ALTER TABLE `showbrands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `productportfolio`
--
ALTER TABLE `productportfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `showbrands`
--
ALTER TABLE `showbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
