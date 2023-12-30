-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 17, 2023 lúc 07:12 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fastfood`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `job_tittle` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `office_code` int DEFAULT NULL,
  `report_to` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `office`
--

DROP TABLE IF EXISTS `office`;
CREATE TABLE IF NOT EXISTS `office` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address_line` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `territory` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` bigint DEFAULT NULL,
  `quantity_order` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKb8bg2bkty0oksa3wiq5mp5qnc` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `product_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `count` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `product_code`, `payment_date`, `product_name`, `count`, `user_id`) VALUES
(1, '[value-3]', '0000-00-00 00:00:00', 'bánh mì', 2, NULL),
(83, 'banh-mi-kep-thit', '2023-12-17 05:27:13', 'Bánh mì kẹp thịt', 1, 38),
(84, 'burger-ga', '2023-12-17 05:27:17', 'Burger gà', 1, 38),
(85, 'ga-ran-truyen-thong-cay', '2023-12-17 05:27:19', 'Gà rán vị truyền thống cay', 1, 38),
(87, 'burger-ga', '2023-12-17 05:44:01', 'Burger gà', 1, 38),
(88, 'banh-mi-kep-thit', '2023-12-17 05:48:11', 'Bánh mì kẹp thịt', 1, 38),
(90, 'banh-mi-kep-thit', '2023-12-17 06:44:55', 'Bánh mì kẹp thịt', 1, 38),
(91, 'banh-mi-kep-thit', '2023-12-17 06:50:33', 'Bánh mì kẹp thịt', 1, 38),
(92, 'banh-mi-kep-thit', '2023-12-17 07:04:34', 'Bánh mì kẹp thịt', 1, 38),
(93, 'banh-mi-kep-thit', '2023-12-17 07:06:24', 'Bánh mì kẹp thịt', 1, 38);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `buy_price` bigint DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_hot` tinyint DEFAULT NULL,
  `product_vendor` varchar(255) DEFAULT NULL,
  `quantity_stock` int DEFAULT NULL,
  `product_line_id` int DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKcygnye4qt4oifs3gmfrudadj0` (`product_line_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `buy_price`, `photo`, `product_code`, `product_description`, `product_name`, `product_hot`, `product_vendor`, `quantity_stock`, `product_line_id`, `product_type`) VALUES
(1, 25000, NULL, 'banh-mi-kep-thit', 'Bánh mì kẹp thịt: ăn một lần nhớ mãi vị đậm đà của miếng thịt thơm nồng và giòn tan cùng bánh mì mềm ngon.', 'Bánh mì kẹp thịt', 1, NULL, NULL, 1, 'bread'),
(2, 22000, NULL, 'banh-mi-kep-cha-bong', 'Bánh mì kẹp chà bông, món ăn vặt phổ biến của Việt Nam, được làm từ bánh mì mềm dai, chà bông giòn tan.', 'Bánh mì kẹp chà bông', NULL, NULL, NULL, 1, 'bread'),
(3, 25000, NULL, 'banh-mi-thit-nuong', 'Bánh mì thịt nướng: thơm ngon, giòn tan, với lớp thịt nướng mềm mại và gia vị đậm đà, hài hòa với bánh mì mềm và giòn.', 'Bánh mì thịt nướng', NULL, NULL, NULL, 1, 'bread'),
(4, 25000, NULL, 'banh-mi-cha-ca', 'Bánh mì chả cá là món ăn Việt Nam truyền thống, kết hợp giữa bánh mì nóng giòn và chả cá thơm ngon, hương vị đặc biệt.', 'Bánh mì chả cá', NULL, NULL, NULL, 1, 'bread'),
(5, 30000, NULL, 'banh-mi-thit-ga', 'Bánh mì thịt gà: thơm ngon, giòn tan, với lớp thịt gà xé nhỏ, rau sống và sốt tương đậm đà, mang lại hương vị tuyệt vời.', 'Bánh mì thịt gà', NULL, NULL, NULL, 1, 'bread'),
(6, 25000, NULL, 'banh-mi-cha-lua', 'Bánh mì chả lụa là món ăn đường phố phổ biến tại Việt Nam, với vỏ bánh giòn tan và miếng chả lụa thơm ngon bên trong.', 'Bánh mì chả lụa', 0, NULL, NULL, 1, 'bread'),
(7, 30000, NULL, 'burger-ga', 'Hamburger gà là loại bánh nhân thịt gà. Lớp vỏ bánh mềm, xốp bao trọn nguyên liệu hấp dẫn bên trong.', 'Burger gà', 1, NULL, NULL, 2, 'burger'),
(8, 30000, NULL, 'burger-bo', 'Bánh mì hamburger bò chiếm ưu thế hơn trong thực đơn bán hàng bởi độ ngậy, vị ngon quyến rũ đến từ lớp mỡ.', 'Burger bò', 0, NULL, NULL, 2, 'burger'),
(9, 30000, NULL, 'burger-tom', 'Đây là loại nhân độc đáo, mới lạ được các nhãn hiệu lớn ra mắt thời gian gần đây, dành riêng cho các tín đồ yêu thích hải sản', 'Burger tôm', NULL, NULL, NULL, 2, 'burger'),
(10, 30000, NULL, 'burger-heo', 'Thịt heo được tẩm ướp như loại nhân thịt bò, xay nhỏ nhưng không nát, giữ lại trọn vẹn độ ẩm thơm mềm khi nướng vàng ươm.', 'Burger heo', NULL, NULL, NULL, 2, 'burger'),
(11, 49000, NULL, 'ga-ran-truyen-thong-cay', 'Sự kết hợp hoà quyện của món gà rán truyền thống và bột ớt cay Norang! Mang tới hương vị gà rán cay tươi mới.', 'Gà rán vị truyền thống cay', 1, NULL, NULL, 3, 'garan'),
(12, 45000, NULL, 'ga-ran-sot-toi', 'Gà rán đúng điệu là đây! Sự kết hợp hoàn hảo giữa tỏi chiên và gà rán giòn rụm. Mang lại hương vị tuyệt vời cho bạn.', 'Gà rán sốt tỏi', NULL, NULL, NULL, 3, 'garan'),
(13, 40000, NULL, 'ga-ran-sot-gia-vi', 'Gà rán sốt gia vị với sốt gia vị được nhập khẩu nguyên chất từ Hàn Quốc hoà quyện cùng gà rán truyền thống giòn.', 'Gà rán sốt gia vị', 0, NULL, NULL, 3, 'garan'),
(14, 15000, NULL, 'cafe-truyen-thong', 'Cà phê Việt Nam truyền thống với hương vị đậm đà luôn thu hút khách hàng nam ở độ tuổi trưởng thành.', 'Cà phê', 1, NULL, NULL, 4, 'nuoc'),
(15, 20000, NULL, 'tra-vai', 'Đang vào mùa vải chín nên trà vải khi pha chế vào mùa này sẽ siêu ngon và đặc biệt hơn với những mùa khác.', 'Trà vải', NULL, NULL, NULL, 4, 'nuoc'),
(16, 25000, NULL, 'tra-dau', 'Trà dâu được nhiều bạn nữ yêu thích không chỉ vì vị chua, ngọt hấp dẫn mà dâu còn chứa nhiều vitamin tốt cho sức khỏe.', 'Trà dâu', NULL, NULL, NULL, 4, 'nuoc'),
(17, 25000, NULL, 'tra-trai-cay-nhiet-doi', 'Nếu bạn thích thưởng thức sự đa dạng của các loại trái cây thì trong một ly trà trà trái cây nhiệt đới là lựa chọn thích hợp cho bạn.', 'Trà trái cây nhiệt đới', 1, NULL, NULL, 4, 'nuoc'),
(19, 20000, NULL, 'tra-dao', 'Trà đào có hương thơm đặc trưng của quả đào chín mọng, vị chua chua ngọt ngọt thanh mát. Vừa giúp giải khát, giải nhiệt cho những ngày hè, vừa giúp bổ sung vitamin có lợi cho sức khỏe.', 'Trà đào', 1, NULL, NULL, 4, 'nuoc'),
(20, 17000, NULL, 'pepsi', 'Pepsi tươi nước giải khát có gas với hương vi thanh mát, mang đến cho bạn cảm giác sảng khoái tươi mát bất tận.', 'Pepsi', 1, NULL, NULL, 4, 'nuoc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_line`
--

DROP TABLE IF EXISTS `product_line`;
CREATE TABLE IF NOT EXISTS `product_line` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT NULL,
  `product_line` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product_line`
--

INSERT INTO `product_line` (`id`, `description`, `product_line`) VALUES
(1, NULL, 'Bánh mì'),
(2, NULL, 'Burger'),
(3, NULL, 'Gà rán'),
(4, NULL, 'Đồ uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_MODERATOR'),
(3, 'ROLE_ADMIN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UKr43af9ap4edm43mmtq01oddj6` (`username`),
  UNIQUE KEY `UK6dotkott2kjsp8vw4d0m25fb7` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ten`, `address`, `email`, `password`, `username`, `role`) VALUES
(1, NULL, NULL, 'demo@devcamp.edu.vn', '$2a$10$m22VYDp4qF8vHJl4mNBXs.c5FlQ53qWP543kZIZIXPThM46M.SuI6', 'DevcampUser', 0),
(35, NULL, NULL, 'giahuydao33@gmail.com', '$2a$10$kZKFyvbq7Xnb1j7ZR4H3kuGZ10cPVzndmJrE71N11o/BsZ.Tt8U6e', 'Huy', 0),
(36, NULL, NULL, 'giahuydao34@gmail.com', '$2a$10$KJvEBR6KTMlcqagcVfWk/eETb37r6ecjbrIfgzuhPFPL8Vs4U1TK6', 'Huy1', 0),
(38, 'Phuc Dinh', NULL, 'dtphuc2k2@gmail.com', '123456789', 'Phuc', 0),
(57, 'Quan  AP', NULL, NULL, '123456789', 'Quan', 1),
(58, NULL, NULL, '', '123', 'Phuc1', 0),
(66, NULL, NULL, NULL, '12345', 'phucdinh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `FKh8ciramu9cc9q3qcqiv4ue8a6` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(35, 1),
(36, 1);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FKb8bg2bkty0oksa3wiq5mp5qnc` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FKcygnye4qt4oifs3gmfrudadj0` FOREIGN KEY (`product_line_id`) REFERENCES `product_line` (`id`);

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `FKh8ciramu9cc9q3qcqiv4ue8a6` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FKhfh9dx7w3ubf1co1vdev94g3f` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
