-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th6 17, 2017 lúc 04:56 PM
-- Phiên bản máy phục vụ: 5.7.18-0ubuntu0.16.04.1
-- Phiên bản PHP: 5.6.30-12~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopOnline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `title`) VALUES
(1, 'Car'),
(2, 'House'),
(3, 'Food');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category_id`, `user_id`, `content`, `image`) VALUES
(1, 'Aston Martin AM-RB 001', 80000, 1, 1, 'Aston Martin AM-RB 001 được thiết kế lấy cảm hứng từ xe đua F1, kết hợp giữa hãng xe Anh Quốc và đội đua Red Bull Racing. Siêu xe có giá 3,9 triệu USD được giới thiệu cuối tháng trước. Đây cũng là siêu xe chạy phố đầu tiên được thiết kế bởi kỹ sư hàng đầu của giải đua F1, Andrian Newey. Cung cấp sức mạnh cho xe là khối động cơ V12 hút khí tự nhiên và hệ thống bảo tồn năng lượng của một chiếc xe đua công thức 1. Theo nhà sản xuất, Aston Martin AM-RB 001 có số lượng hạn chế dưới 150 xe. Chiếc hypercar đầu tiên sẽ đến tay khách hàng vào năm 2018, trong khi bản chạy thử sẽ xuất hiện tên đường vào năm sau.', '17-06-2017_16290455119.jpg'),
(2, 'Ferrari LaFerrari Aperta', 40000, 1, 1, 'Siêu xe mui trần Ferrari LaFerrari Aperta đã xuất hiện trên đường chạy thử tại Maranello, nơi đặt trụ sở của Ferrari, hồi tháng 7. Theo những thông tin đã công bố trước đó, LaFerrari Aperta sẽ bán ra thị trường vào năm 2017. Theo hãng siêu xe Italy, phiên bản mui trần LaFerrari Aperta mang những đặc tính vận hành tương tự như bản coupe, dù trọng lượng xe tăng lên. Do đó, cung cấp sức mạnh cho xe vẫn là động cơ V12 6,2 lít cùng với hệ thống hybrid HY-KERN, cho công suất lên đến 950 mã lực. Khách hàng lựa của siêu xe mui trần này có thể lựa chọn mui mềm hoặc mui carbon. Số lượng sản xuất của LaFerrari Aperta giới hạn dưới 100 xe, giá bán có thể lên đến 3,8 triệu USD tùy vào các tùy chọn.', '17-06-2017_18018103950.jpg'),
(3, 'McLaren P1 LM', 60000, 1, 2, 'McLaren P1 LM là phiên bản nâng cấp của những chiếc P1, được sản xuất bởi Lanzante Motorsport. So với những chiếc xe chạy trên đường đua P1 GTR, phiên bản P1LM có trọng lượng nhẹ hơn, thay đổi một số chi tiết ở hệ thống làm mát và cánh gió sau. Giá bán của siêu xe này ở mức khoảng 3,7 triệu USD. ', 'x2.jpg'),
(4, 'Bugatti Vision GranTurismo', 80000, 1, 3, 'Theo thống kê của GT Spirit, những chiếc Bugatti Vision GranTurismo sẽ có giá khoảng 3 triệu USD, cao hơn so với Bugatti Chiron ra mắt cách đây không lâu. ', 'x3.jpg'),
(5, 'Mercedes-AMG R50', 10000, 1, 3, 'Thương hiệu xe Đức cũng lên kế hoạch tham gia vào phân khúc hypercar, với việc giới thiệu mẫu xe lấy cảm hứng từ xe đua công thức 1. Mercedes-AMG R50 được phát triển nhân kỷ niệm sinh nhật lần thứ 50 của AMG vào năm sau. Theo những thông tin ban đầu, siêu xe này có sức mạnh khoảng 1.300 mã lực kết hợp động cơ đốt trong và động cơ điện. Giá bán của Mercedes-AMG R50 ước tính khoảng 3 triệu USD. ', 'x4.jpg'),
(8, 'This Treehouse in Cape Town, South Africa Is a Sight to Behold', 230000, 2, 1, 'Even though this South African home isn\'t technically a treehouse, it might as well be. A local firm named Malan Vorster Architecture Interior Design was tasked with creating a modern, cabin-like abode on a tree-rich property. The results: This home, which they dubbed the \"Paarman Treehouse\" and built on stilts to allow for elevated views amongst nature.\r\n\r\nThe home was built out of four cylindrical volumes that are covered in timber slats to help keep it from standing out like a sore thumb in the forest. Inside, the home is covered in untreated wood and other materials that are intended to weather over time and create a rustic look. Floor-to-ceiling windows, some of which open up, only further help the homeowner enjoy their surroundings.', '17-06-2017_57059091545.jpg'),
(9, 'The Christie House', 187500, 2, 1, 'Wright\'s first house design in New Jersey, the Christie House was built in 1940 on over seven acres of land. The 3-bedroom, 3.5 bathroom home, located in Bernardsville, is currently listed for $1,875,00.\r\n\r\nAside from incredible interior space and eye-catching design, there is also a cozy artist\'s studio on the property.', '17-06-2017_60589483545.png'),
(10, 'Tirranna', 7500, 2, 1, '\"Tirranna\" is an Aboriginal word that translates to \"running waters,\" which is perfectly fitting for this home as it sits above a waterfall on 15 lush acres of land in New Canaan, Connecticut. The mid-century gem has an impressive seven bedrooms and eight bathrooms, and is listed for $7.2 million.', '17-06-2017_80982639754.jpg'),
(11, 'Jerk Chicken', 50, 3, 1, '\"This was a truly fantastic dish. I enjoyed the wonderful blend of the various seasonings used in the marinade, and the chicken came out so moist and tender.\"', '17-06-2017_8348229484.jpg'),
(12, 'Whiskey Grilled Baby Back Ribs', 23, 3, 1, '\"These were fabulous! Absolutely fall-off-the-bone delicious! I tripled the recipe for a family cook out. The ribs were gone in the first 15 minutes!\"', '17-06-2017_65096908924.jpg'),
(13, 'Grilled Shrimp', 12, 3, 1, '\"These were so good! The combination of flavors in the marinade was excellent. Big thumbs up.\"', '17-06-2017_54628936065.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'huylee', 'huylee@gmail.com', '$2y$10$7JYh77o74ecK2NwgybWPp.A.3lIosdlhtC9lfOgOiUM/X58.caZ3S', 'vnAXmZPWhDDkHj9lw3KwPzUwWrWtgc2h5IUdcvrmjR3bgYsemlB2c61XRQjh', NULL, NULL),
(2, 'tony', 'tony@gmail.com', '$2y$10$Vd9eIGASdBmQcUFhW7SFlu1FY/nh6f2ZA6aPKKNo0yMp4/kg4LTXW', NULL, NULL, NULL),
(3, 'lavie', 'lavie@gmail.com', '$2y$10$rXyH49y.Ntpp/sacbRyk9e1pTn3o9js5OE73IUtNKyzjLOZBsKb26', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_foreign` (`category_id`),
  ADD KEY `products_created_by_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
