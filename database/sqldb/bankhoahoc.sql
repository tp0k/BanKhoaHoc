-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 02, 2024 lúc 03:47 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_data` longtext NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `student_id`, `created_at`, `updated_at`, `course_id`) VALUES
(6, 'hgij', 11, '2024-05-28 15:06:39', '2024-05-28 15:06:39', 5),
(7, 'dsgsd', 11, '2024-05-28 15:08:42', '2024-05-28 15:08:42', 5),
(8, 'khá dễ hiểu', 12, '2024-05-28 15:31:49', '2024-05-28 15:31:49', 1),
(9, 'Em sử dụng mac thì download như nào ạ', 12, '2024-05-28 15:35:56', '2024-05-28 15:35:56', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `valid_from`, `valid_until`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VIP01', 30.00, '2024-05-05', '2024-08-05', '2024-05-03 20:34:24', '2024-05-03 20:34:59', NULL),
(2, 'Chaohe2024', 30.00, '2024-05-20', '2024-06-20', '2024-05-10 09:23:30', '2024-05-10 09:23:30', NULL),
(3, 'VP2', 10.00, '2024-05-10', '2024-07-10', '2024-05-10 09:24:09', '2024-05-10 09:24:09', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `title_bn` varchar(255) DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_bn` text DEFAULT NULL,
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('free','paid','subscription') NOT NULL DEFAULT 'paid',
  `price` decimal(10,2) DEFAULT 0.00,
  `old_price` decimal(10,2) DEFAULT NULL,
  `subscription_price` decimal(10,2) DEFAULT NULL,
  `start_from` timestamp NULL DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `lesson` int(11) DEFAULT NULL,
  `prerequisites_en` text DEFAULT NULL,
  `prerequisites_bn` text DEFAULT NULL,
  `difficulty` enum('beginner','intermediate','advanced') DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumbnail_image` varchar(255) DEFAULT NULL,
  `thumbnail_video` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 inactive, 2 active',
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tag` enum('popular','featured','upcoming') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`id`, `title_en`, `title_bn`, `description_en`, `description_bn`, `course_category_id`, `instructor_id`, `type`, `price`, `old_price`, `subscription_price`, `start_from`, `duration`, `lesson`, `prerequisites_en`, `prerequisites_bn`, `difficulty`, `course_code`, `image`, `thumbnail_image`, `thumbnail_video`, `status`, `language`, `created_at`, `updated_at`, `deleted_at`, `tag`) VALUES
(1, 'Khoá học lập trình Python basic', NULL, 'Vì sao học và sử dụng Python?\r\n\r\nPython là một trong những ngôn ngữ lập trình phổ biến nhất và rất súc tích. Bạn có thể tạo chương trình làm được rất nhiều việc mà không cần gõ nhiều mã lệnh.\r\n\r\nRất nhiều các công ty, tổ chức lớn như Google, NASA, Youtube sử dụng Python để lập trình. Bạn cũng có thể dùng nó để điều khiển các thiết bị máy móc phục vụ nhu cầu và sở thích.\r\n\r\nĐể khởi đầu, bạn cần một máy tính xách tay (hoặc máy tính để bàn) để chạy Python. Mọi thông tin sẽ được Giảng viên hướng dẫn trong khóa học “Trở thành lập trình viên Python tương lai” tại Học viện công nghệ CNET. Khóa học sẽ chỉ cho bạn cách sử dụng Python trong nhiều loại dự án, từ viết chương trình đầu tiên cho tới các trò chơi do chính bạn tạo ra. Mọi kiến thức được chia thành các bước ngắn, dễ thực hành.\r\n\r\nNỘI DUNG KHÓA HỌC\r\n\r\nGiới thiệu chung: Lập trình là gì, bắt đầu làm quen với Python, Bài tập chơi cùng con số\r\nBiến số, ra quyết định, Giải thuật,\r\nTrò chơi dự đoán\r\nVòng lặp for, lệnh tắt cho bảng cửu chương, Sử dụng danh sách\r\nTừ điển, tin tức mã hóa\r\nCông cụ vẽ Turtle, đừng bấm nút, vẽ một kiệt tác\r\nTrò chơi dò bom, Trò chơi vợt và bóng\r\nTải Python, quản lý tập tin, Gỡ lỗi\r\nCửa sổ nào, Xem nhanh mã lệnh\r\nBảng chú giải\r\nTHỜI LƯỢNG:\r\n\r\nHọc 02 buổi/tuần, mỗi buổi 02 tiếng (Học viên chọn 1 trong 3 ba ca sáng, chiều, tối và chọn ngày học)\r\nTổng thời lượng: 08 buổi (kéo dài 01 tháng)\r\nSố học viên tối đa: 10 học viên/lớp', NULL, 2, 2, 'paid', 1800000.00, 4000000.00, NULL, NULL, 2, 8, '> 14 tuổi', NULL, 'beginner', '1', '9621715357011.png', '8331715334658.jpg', 'https://www.youtube.com/watch?v=oFgg7K2tpfk', 2, 'en', '2024-05-07 00:32:02', '2024-05-10 10:35:37', NULL, 'popular'),
(3, 'Khởi đầu đam mê - lập trình Scratch', NULL, 'Session 1: Tổng quan về Scratch\r\n\r\nSession 2: Giới thiệu một số nhóm lệnh Scratch cơ bản\r\n\r\nSession 3: Khối nếu-thì, biến số và truyền nhận tin\r\n\r\nSession 4: Trò chơi săn khủng long và bước nhảy không gian\r\n\r\nSession 5: Trò chơi hứng táo\r\n\r\nSession 6: Xây dựng trò chơi Flappy Bird\r\n\r\nSession 7: Xây dựng trò chơi đua xe\r\n\r\nSession 8: Dự án - Trò chơi bảo vệ biển đảo\r\n\r\nTất cả các hoạt động Học viên đều được hướng dẫn chi tiết từng bước. Mỗi chủ điểm đều có hình ảnh minh họa. Mục tiêu của khóa học không chỉ là hướng dẫn, mà còn là đưa ra thử thách giúp Học viên thể hiện khả năng sáng tạo và thiết kế trò chơi - ứng dụng của chính mình.', NULL, 1, 6, 'paid', 1800000.00, 4000000.00, NULL, NULL, 1, 8, '8 - 13 tuổi', NULL, 'beginner', NULL, '2801715357794.png', '6771715357794.png', 'https://www.youtube.com/watch?v=47yIB4nPTLI', 2, 'en', '2024-05-10 09:15:55', '2024-05-10 09:28:05', NULL, 'popular'),
(4, 'Khoá học lập trình web fullstack', NULL, 'Khoá học lập trình web fullstack dành cho các bạn đã có chút nền tảng về lập trình, định hướng tay ngang sang lập trình web thì khoá học này là dành cho bạn!', NULL, 3, 4, 'paid', 4400000.00, 9000000.00, NULL, NULL, 3, 24, 'đã có chút nền tảng về lập trình', NULL, 'advanced', NULL, '3061716054820.jpg', '2981716054821.jpg', 'https://www.youtube.com/watch?v=T1BpaUpLzzA', 2, 'en', '2024-05-18 10:53:41', '2024-05-25 21:22:42', NULL, 'upcoming'),
(5, 'Khóa học lập trình mobile app', NULL, 'KHÓA HỌC LẬP TRÌNH MOBILE APP dành cho tất cả các bạn muốn học từ căn bản đến nâng cao để trở thành một lập trình viên mobile app với nền tảng công cụ Flutter của Google.\r\nFlutter là gì? Nó có ưu điểm vượt trội ra sao để làm một ứng dụng mobile?\r\n\r\nFlutter được phát triển nhằm giải quyết bài toán thường gặp trong mobile là Fast Development và Native Performance. Nếu như React Native chỉ đảm bảo Fast Development và code native thuần chỉ đảm bảo Native Performance thì Flutter làm được cả 2 điều trên.\r\nLà một bộ SDK đa nền tảng, các ứng dụng Flutter có thể hoạt động trên cả iOS và Android. Nó như một thủ thuật khôn khéo để tương thích được với framework UI trên cả hai hệ điều hành này. Các ứng dụng này không biên dịch trực tiếp với các ứng dụng native của Android và iOS.\r\nBẠN SẼ HỌC ĐƯỢC GÌ?\r\n\r\nNắm vững kiến thức lập trình Flutter từ cơ bản đến nâng cao.\r\nThực hành lập trình ứng dụng Flutter như hướng dẫn trong khóa học.\r\nHọc viên có thể tự làm project cá nhân, ứng tuyển công việc thực tập, lập trình viên Flutter sau khi học xong.\r\nHọc viên có thể tự làm app bằng Flutter để đưa lên kho ứng dụng CHPlay Android, AppStore iOS.\r\nNỘI DUNG: Khóa học lập trình mobile app Flutter trang bị cho Học viên đầy đủ kiến thức, kỹ năng để có thể lập trình tạo ra một mobile app hoàn chỉnh. Bao gồm các buổi học sau:\r\n\r\nBuổi 1 - Setup flutter; Giới thiệu Flutter, Dart\r\nBuổi 2 - Lập trình Dart cơ bản - Null Safety, từ khóa late\r\nBuổi 3 - Functions with Named Parameters, Optinal Parameters\r\nBuổi 4 - StatelessWidget, StatefulWidget; một số UI cơ bản\r\nBuổi 5 - UI cơ bản trong Flutter (tiếp) - Flexible, Expanded, Stack, TextField\r\nBuổi 6 - Navigator, Routes - Chuyển màn hình\r\nBuổi 7 - Ôn tập Flutter Widget, ListView\r\nBuổi 8 - Flexible, Expanded, Stack Widget\r\nBuổi 9 - Future, async, await; Call http requests; Làm app Chat bằng Flutter và Socket.io\r\nBuổi 10 - Thực hành code UI flow cơ bản (Order List)\r\nBuổi 11 - BuildContext và InheritedWidget, Drawer Menu\r\nBuổi 12 & 13 - State management, Provider, BLoc pattern\r\nBuổi 14 - BLoC pattern cơ bản và ứng dụng\r\nBuổi 15 - SharedPreference , SQLite Database trong Flutter\r\nBuổi 16 - Thực hành tích hợp SQLite trong app Flutter\r\n\r\nVà các buổi học thực hành, làm bài tập lớn, làm đồ án kết thúc khóa.\r\n\r\nHọc kết hợp lý thuyết với thực hành ngay tại lớp. Kết thúc khóa học, Học viên làm đồ án tốt nghiệp và đăng ký tài khoản upload đồ án lên kho ứng dụng mobile.', NULL, 4, 5, 'subscription', 4400000.00, 10000000.00, NULL, NULL, 3, 16, 'KHÓA HỌC PHÙ HỢP VỚI AI?\r\n\r\nKhóa học được xây dựng từ cơ bản nhất đến nâng cao, cho phép cả những bạn chưa biết gì về lập trình có thể tiếp cận học tập. Tuy nhiên, để thuận lợi nhất, bạn cần có kiến thức cơ bản về Công nghệ thông tin, kỹ năng sử dụng máy tính, và một chiếc laptop đủ tốt.\r\n\r\nSinh viên ngành Công nghệ thông tin muốn học nâng cao kỹ năng lập trình mobile app\r\nCác bạn đang học hay vừa tốt nghiệp PTTH muốn tìm hiểu định hướng nghề nghiệp\r\nNgười đã đi làm muốn mở rộng kiến thức, kỹ năng, hay chuyển đổi nghề nghiệp', NULL, 'advanced', NULL, '2301716653958.jpg', '6731716653958.jpg', 'https://youtu.be/Hadc-GBPsmY?si=AfEeZQCpFYT0cw-v', 2, 'en', '2024-05-25 09:19:18', '2024-05-25 21:22:25', NULL, 'popular');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active 2=>inactive',
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_categories`
--

INSERT INTO `course_categories` (`id`, `category_name`, `category_status`, `category_image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Khoá học lập trình Scratch cho trẻ', 1, '3401714983380.png', '2024-05-06 01:06:10', '2024-05-07 01:02:48', NULL),
(2, 'Khoá học lập trình Python cho trẻ', 1, '7641714983329.png', '2024-05-06 01:15:29', '2024-05-07 01:03:00', NULL),
(3, 'Khoá học lập trình web-fullstack', 0, '6641714983492.png', '2024-05-06 01:18:12', '2024-05-07 01:03:21', NULL),
(4, 'Lập trình mobile app Flutter', 1, '7951714983640.png', '2024-05-06 01:20:40', '2024-05-06 01:21:09', NULL),
(5, 'Quản trị hệ thống MCSA 2019', 0, '8601714983838.png', '2024-05-06 01:23:58', '2024-05-06 01:23:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` int(11) NOT NULL,
  `course_id` varchar(255) DEFAULT NULL,
  `enrollment_date` datetime NOT NULL DEFAULT '2024-04-24 19:02:14',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `payment_id`, `course_id`, `enrollment_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 11, 446, '5', '2024-05-26 10:33:00', NULL, NULL, NULL),
(19, 12, 452, '1', '2024-05-29 05:31:00', NULL, NULL, NULL),
(20, 12, 454, '5', '2024-05-29 05:34:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `topic` text DEFAULT NULL,
  `goal` text DEFAULT NULL,
  `hosted_by` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `location`, `image`, `topic`, `goal`, `hosted_by`, `date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Trải nghiệm khoá học scratch', 'Đây là sự kiện diễn ra thường niên với mục đích mang đến nhưng trải nghiệm tuyệt vời giúp các con hiểu hơn về công nghệ và yêu thích công nghệ hơn.', 'Aeon mall Lê Chân Hải Phòng', '5951716654395.jpg', 'Chào hè 2024', 'Mang đến nhưng trải nghiệm tuyệt vời giúp các con hiểu hơn về công nghệ và yêu thích công nghệ hơn', 'Học viên công nghệ Cnet', '2024-05-20', '2024-05-03 21:08:08', '2024-05-25 09:26:35', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `instructors`
--

CREATE TABLE `instructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `contact_en` varchar(255) NOT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `bio` text DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `access_block` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `instructors`
--

INSERT INTO `instructors` (`id`, `name_en`, `name_bn`, `contact_en`, `contact_bn`, `email`, `role_id`, `bio`, `title`, `designation`, `image`, `status`, `password`, `language`, `access_block`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'GS.TS Lê Hoài Bắc', NULL, '0985642133', NULL, 'giangvien1@gmail.com', 3, 'hiện là Trưởng bộ môn Khoa học máy tính. Ông đã lấy được bằng tiến sĩ. Thạc sĩ Công nghệ thông tin, Đại học Khoa học Tự nhiên TP.HCM (HCMUS), ĐHQG-HCM năm 1999. Ông được phong hàm Giáo sư năm 2019. Ông đã đảm nhận nhiều dự án, dự án NAFOSTED của Sở Khoa học & Công nghệ Thành phố Hồ Chí Minh và các dự án của Đại học Quốc gia Thành phố Hồ Chí Minh (ĐHQG-HCM). Ông là tác giả của nhiều bài báo và bài báo khoa học trên các tạp chí quốc tế.', NULL, NULL, 'Giảng viên_GS.TS Lê Hoài Bắc_679.jpg', 1, '$2y$12$rksKv8h6f1vjORKYZ1oxn.u5OoeyneI5CPSkh4surjjurUv5amI3O', 'en', NULL, NULL, '2024-05-06 21:38:48', '2024-05-06 21:38:48', NULL),
(3, 'PGS.TS Vũ Hải Quân', NULL, '0956432175', NULL, 'giangvien@gmail.com', 3, 'hiện là Giám đốc Đại học Quốc gia TP.HCM (ĐHQG TP.HCM). Vào tháng 2 năm 2005, ông lấy bằng Tiến sĩ. từ Đại học Trento, Ý. Tháng 10 năm 2018, PGS. GS.TS Vũ Hải Quân được Đại học Công nghệ Auckland (AUT) vinh danh danh hiệu Giáo sư danh dự. Ngoài ra, ông còn thực hiện nhiều dự án phần mềm và là tác giả của một số bài báo và bài báo khoa học trên các tạp chí quốc tế.', 'Giảng viên', 'Giảng viên luyện CCNA', 'Giảng viên_PGS.TS Vũ Hải Quân_581.png', 1, '$2y$12$wmSddqdzhSJb0rlQl64Kk.exbPLbgnNqOswYT3K54Wk1fuo.7Wj0S', 'en', NULL, NULL, '2024-05-07 00:02:34', '2024-05-07 00:02:34', NULL),
(4, 'PGS.TS Hồ Bảo Quốc', NULL, '0965321475', NULL, 'giangvien2@gmail.com', 3, 'hiện là Giảng viên bộ môn Hệ thống thông tin, Khoa Công nghệ thông tin, Trường Đại học Khoa học Tự nhiên TP.HCM (HCMUS). Ông đã lấy được bằng tiến sĩ. Tiến sĩ Khoa học Máy tính tại Đại học Joseph Fourier, Pháp, năm 2004. Ông được phong hàm Phó Giáo sư năm 2015. Ông đã thực hiện nhiều dự án nghiên cứu khoa học và là tác giả của một số bài báo và bài báo khoa học trên các tạp chí quốc tế.', NULL, 'Giảng viên luyện CCNA', 'Giảng viên_PGS.TS Hồ Bảo Quốc_332.jpg', 1, '$2y$12$CLbMzg7eX7gCxt0rXPukTe/GPTIPIDvYdOR93xrWiuMIMRVODyPvO', 'en', NULL, NULL, '2024-05-07 00:03:58', '2024-05-07 00:03:58', NULL),
(5, 'TS. Nguyễn Hải Minh', NULL, '0965321456', NULL, 'giangvien3@gmail.com', 3, 'hiện đang công tác tại Khoa Khoa học Máy tính. Cô đã lấy được bằng tiến sĩ. Tiến sĩ Khoa học Thông tin của Viện Khoa học và Công nghệ Tiên tiến Nhật Bản (JAIST) năm 2013.', NULL, 'Giảng viên luyện MCSA 2019', 'Giảng viên_TS. Nguyễn Hải Minh_257.jpg', 1, '$2y$12$l3fbKoMll5Je0phGhQBGHeb.QCSd4aDHaYluji.By4PhImGIYskVK', 'en', NULL, NULL, '2024-05-07 00:06:33', '2024-05-07 00:06:33', NULL),
(6, 'Tạ Thị Phương Thảo', NULL, '0965482137', NULL, 'giangvien4@gmail.com', 3, 'Thạc sỹ công nghệ thông tin, tốt nghiệp đại học DePaul Mỹ năm 2024.', NULL, 'Thực tập sinh', 'Giảng viên_Tạ Thị Phương Thảo_369.jpg', 0, '$2y$12$7BtRGXVlc.d8GZW9QI0gzuFn5u6TuoXUSN8Ah7mVt8kuHtdMI4Nv.', 'en', NULL, NULL, '2024-05-07 00:10:19', '2024-05-07 00:10:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `course_id`, `description`, `notes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '[Khóa học lập trình Python basic] - Bài 1: Giới thiệu ngôn ngữ lập trình Python', 1, 'Trong khóa học lập trình python này, chúng ta sẽ sử dụng Python 3.x. Bởi vì Python 2.x là phiên bản cũ và đã được thông báo chính thức là sẽ không còn được phát triển và hỗ trợ sau 2020.', 'Ưu điểm của Python\r\nLà một ngôn ngữ lập trình dành cho người mới bắt đầu.\r\nCú pháp đơn giản, dễ đọc, dễ hiểu và dễ học.\r\nĐa nền tảng.\r\nMiễn phí và là ngôn ngữ mã nguồn mở.\r\nLà ngôn ngữ hướng đối tượng.\r\nKho thư viện hỗ trợ phong phú và đa dạng.\r\nỨng dụng trong nhiều lĩnh vực lập trình khác nhau.\r\nCó khả năng mở rộng, tương thích với các cơ sở dữ liệu và ngôn ngữ khác.\r\nNhược điểm của Python\r\nTốc độ chậm hơn so với các ngôn ngữ C/C++ hay Java.\r\nKhông phải là ngôn ngữ tốt dành cho nền tảng mobile.\r\nPython không phải lựa chọn tốt cho các bài toán cần tối ưu bộ nhớ.\r\nPython có nhiều giới hạn khi làm việc với cơ sở dữ liệu phức tạp.\r\nPython dùng để làm gì?\r\nPhát triển web và các nền tảng cho Internet\r\nPython được sử dụng cho phát triển web theo nhiều cách khác nhau:\r\n\r\nCác framework phát triển web như Django hay Pyramid.\r\nMicro-framework như Flask hay Bottle.\r\nXây dựng CMS với Plone hay django CMS.\r\nCùng với hàng loạt các thư viện đồ sộ hỗ trợ lập trình web, web crawler,…\r\nỨng dụng trong machine learning\r\nPython là ngôn ngữ lập trình phổ biến nhất được sử dụng trong machine learning và thị giác máy tính:\r\n\r\nSciPy là một gói thư viện dành cho toán học, khoa học và kỹ thuật.\r\nPandas là một thư viện dành cho phân tích dữ liệu.\r\nscikit-learn là một thư viện dành cho machine learning\r\n…\r\nLà ngôn ngữ cho mục đích giảng dạy\r\nDo là một ngôn ngữ dễ đọc, dễ hiểu và dễ học. Python là ngôn ngữ đầu tiên mà các lập trình viên tiếp cận. Tuy nhiên, điều này có vẻ không đúng ở Việt Nam chúng ta ^^.\r\n\r\nVà rất nhiều ứng dụng trong các lĩnh vực khác (mình lười trình bày rồi nên liệt kê thôi nhé, chứ không phải ứng dụng nhỏ đâu) bao gồm:\r\n\r\nPhân tích dữ liệu (Data Analysis)\r\nTự động hóa (Automation)\r\nTest tự động (Selenium)\r\nIOT\r\n…', '2024-05-07 00:49:57', '2024-05-07 00:49:57', NULL),
(2, '[Khóa học lập trình Python basic] - Bài 2:  Game Đấm Lá Kéo', 1, '👨‍🏫 1. Lập Trình Web cơ Bản\r\n👨‍🏫 2. Toán Logic - Toán tư duy cơ bản\r\n👨‍🏫 3. Lập Trình Python Cơ Bản đến Nâng cao\r\n👨‍🏫 4. Lập Trình Game Cơ Bản\r\n👨‍🏫 5. Lập trình Data Science - Phân tích dữ liệu Cơ Bản\r\n👨‍🏫 6. Lập Trình AI - Trí Tuệ Nhân Tạo Cơ Bản\r\n\r\nTrong Clip này mình sẽ hướng dẫn các bạn:\r\n_ Cách dùng if else elif\r\n_ Cách lồng ghép các if else\r\n_ Cách sửa lỗi thụt đầu dòng trong python\r\n_ Cùng bạn làm game Đấm Lá Kéo với máy tính\r\n_ Cùng nhau làm Game hiệu quả hơn\r\n_ Cùng làm và giải thích hình vẽ flowchart\r\n\r\nThuật ngữ tiếng anh đã giải thích:\r\n\r\nConditional statement, assignment statement, comparison statement, assign, indentation, inconsistent, tab, space, and, variable, flowchart, logic, if, else, age, select, draw, choose, test, import, random, string, integer, built-in, function, class, concatenate, input, output, input validation, wrong input.', 'Trong Clip này mình sẽ hướng dẫn các bạn:\r\n_ Cách dùng if else elif\r\n_ Cách lồng ghép các if else\r\n_ Cách sửa lỗi thụt đầu dòng trong python\r\n_ Cùng bạn làm game Đấm Lá Kéo với máy tính\r\n_ Cùng nhau làm Game hiệu quả hơn\r\n_ Cùng làm và giải thích hình vẽ flowchart', '2024-05-10 08:25:31', '2024-05-10 08:25:31', NULL),
(3, '[Khóa học lập trình Scratch cơ bản] - Bài 1: Làm quen với Scratch', 3, 'Khoá học “KHỞI ĐẦU ĐAM MÊ - LẬP TRÌNH SCRATCH” tại Học viện công nghệ CNET - Hải Phòng, trực quan và sinh động sẽ trang bị cho Học viên trẻ kiến thức cơ bản về lập trình, khơi dậy niềm đam mê với công nghệ.\r\n\r\nCác hoạt động được thiết kế trên Scratch sẽ rất đơn giản và thú vị. Scratch là một trang web và ứng dụng giúp Học viên xây dựng và chia sẻ trò chơi của mình với các lập trình viên nhí khác trên toàn thế giới. Một trong những điều tuyệt vời của Scratch là Học viên không cần biết về máy tính quá nhiều. Với Scratch, Học viên chỉ cần làm các thao tác kéo-thả để lập trình và xây dựng những trò chơi của riêng mình.\r\n\r\nCó rất nhiều ngôn ngữ lập trình trên thế giới như Python, Java, C++, PHP… Tuy nhiên, Scratch là một ngôn ngữ lập trình độc nhất trên thế giới, bởi nó được thiết kế để dành riêng cho trẻ làm quen với lập trình game và ứng dụng học tập, từ các nhà nghiên cứu của Học viện công nghệ Massachusetts (MIT).\r\n\r\nScratch là ngôn ngữ lập trình được khuyên dùng cho những người mới bắt đầu, đặc biệt là trẻ em vì nó có những ưu điểm sau:\r\n\r\nThân thiện với trẻ em\r\nChỉ cần thao tác kéo-thả để lập trình mà không cần đánh mã lệnh\r\nThiết kế và chia sẻ trò chơi nhanh chóng\r\nCó thể thấy mã lập trình của các trò chơi \r\nBao gồm nhiều loại âm thanh, hình ảnh, phông nền\r\nMiễn phí - không yêu cầu chi phí bản quyền', 'THỜI LƯỢNG:\r\n\r\nHọc 02 buổi/tuần, mỗi buổi 02 tiếng (Học viên chọn 1 trong 3 ba ca sáng, chiều, tối và chọn ngày học)\r\nTổng thời lượng: 8 buổi (kéo dài 01 tháng)\r\nSố học viên tối đa: 10 học viên/lớp', '2024-05-10 09:18:50', '2024-05-10 09:18:50', NULL),
(4, 'Bài giảng Test 1', 5, 'Bài giảng Test 1', 'Bài giảng Test 1', '2024-06-01 09:35:25', '2024-06-01 09:35:25', NULL),
(6, 'Bài giảng Test 2', 5, 'Bài giảng Test 2', 'Bài giảng Test 2', '2024-06-02 03:20:14', '2024-06-02 03:20:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('video','document','quiz') NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `content_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `materials`
--

INSERT INTO `materials` (`id`, `lesson_id`, `title`, `type`, `content`, `content_url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'Bài 1: Giới thiệu ngôn ngữ lập trình Python', 'video', '5331715356832.mp4', NULL, '2024-05-10 08:57:18', '2024-05-10 09:00:32', NULL),
(4, 2, 'Bài 2: Game Đấm Lá Kéo', 'video', '5211715356928.mp4', NULL, '2024-05-10 09:02:08', '2024-05-10 09:02:08', NULL),
(5, 3, 'Bài 1: Làm quen với Scratch', 'video', '1371715358138.mp4', NULL, '2024-05-10 09:22:18', '2024-05-10 09:22:18', NULL),
(7, 4, 'VD1', 'video', '7551717260389.mp4', NULL, '2024-06-01 09:46:29', '2024-06-01 09:46:29', NULL),
(8, 4, 'VD2', 'document', '8581717260498.docx', NULL, '2024-06-01 09:48:18', '2024-06-01 09:48:18', NULL),
(9, 4, 'VD2-test1', 'video', '2341717323800.mp4', 'vd2test1', '2024-06-02 03:23:20', '2024-06-02 03:23:20', NULL),
(10, 6, 'VD1test2', 'video', '5531717323848.mp4', NULL, '2024-06-02 03:24:08', '2024-06-02 03:24:08', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_04_24_184449_create_roles_table', 1),
(3, '2024_04_24_184553_create_instructors_table', 1),
(4, '2024_04_24_184622_create_users_table', 1),
(5, '2024_04_24_184851_create_course_categories_table', 1),
(6, '2024_04_24_184920_create_permissions_table', 1),
(7, '2024_04_24_184949_create_students_table', 1),
(8, '2024_04_24_185029_create_courses_table', 1),
(9, '2024_04_24_185115_create_enrollments_table', 1),
(10, '2024_04_24_185141_create_lessons_table', 1),
(11, '2024_04_24_185210_create_materials_table', 1),
(12, '2024_04_24_185242_create_quizzes_table', 1),
(13, '2024_04_24_185311_create_questions_table', 1),
(14, '2024_04_24_185341_create_options_table', 1),
(15, '2024_04_24_185408_create_answers_table', 1),
(16, '2024_04_24_185438_create_reviews_table', 1),
(17, '2024_04_24_185510_create_payments_table', 1),
(18, '2024_04_24_185546_create_subscriptions_table', 1),
(19, '2024_04_24_185611_create_progress_table', 1),
(20, '2024_04_24_185643_create_discussions_table', 1),
(21, '2024_04_24_185715_create_messages_table', 1),
(22, '2024_04_24_185738_create_coupons_table', 1),
(23, '2024_04_24_185802_create_checkouts_table', 1),
(24, '2024_04_24_185831_create_watchlists_table', 1),
(25, '2024_04_24_185926_add_tag_to_courses_table', 1),
(26, '2024_04_24_190001_add_column_to_user_table', 2),
(27, '2024_04_24_190036_create_events_table', 2),
(28, '2024_05_12_173448_create_vnpay_payment_table', 3),
(29, '2024_05_13_165325_create_vnpay_payment_table', 4),
(30, '2024_05_14_182125_create_vpayment_table', 5),
(31, '2024_05_14_182452_create_vpayment_table', 6),
(32, '2024_05_17_045655_create_transactions_table', 7),
(33, '2024_05_19_161309_create_carts_table', 8),
(34, '2024_05_20_173852_create_orders_table', 8),
(35, '2024_05_28_173638_create_comment_table', 9),
(36, '2024_05_31_162113_update_reviews_table', 10),
(38, '2024_06_01_181707_add_completed_to_watchlists_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `option_text` varchar(255) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `od_transacsion_id` varchar(255) NOT NULL,
  `od_course_id` varchar(255) NOT NULL,
  `od_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `od_price` decimal(10,2) DEFAULT NULL,
  `currency_value` decimal(10,2) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 successfull, 2 fail',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(51, 2, 'user.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(52, 2, 'user.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(53, 2, 'user.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(54, 2, 'user.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(55, 2, 'user.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(56, 2, 'student.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(57, 2, 'student.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(58, 2, 'student.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(59, 2, 'student.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(60, 2, 'student.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(61, 2, 'instructor.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(62, 2, 'instructor.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(63, 2, 'instructor.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(64, 2, 'instructor.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(65, 2, 'instructor.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(66, 2, 'courseCategory.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(67, 2, 'courseCategory.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(68, 2, 'courseCategory.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(69, 2, 'courseCategory.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(70, 2, 'courseCategory.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(71, 2, 'course.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(72, 2, 'course.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(73, 2, 'course.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(74, 2, 'course.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(75, 2, 'course.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(76, 2, 'material.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(77, 2, 'material.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(78, 2, 'material.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(79, 2, 'material.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(80, 2, 'material.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(81, 2, 'lesson.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(82, 2, 'lesson.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(83, 2, 'lesson.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(84, 2, 'lesson.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(85, 2, 'lesson.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(86, 2, 'event.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(87, 2, 'event.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(88, 2, 'event.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(89, 2, 'event.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(90, 2, 'event.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(91, 2, 'quiz.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(92, 2, 'quiz.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(93, 2, 'quiz.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(94, 2, 'quiz.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(95, 2, 'quiz.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(96, 2, 'question.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(97, 2, 'question.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(98, 2, 'question.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(99, 2, 'question.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(100, 2, 'question.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(101, 2, 'option.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(102, 2, 'option.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(103, 2, 'option.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(104, 2, 'option.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(105, 2, 'option.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(106, 2, 'answer.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(107, 2, 'answer.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(108, 2, 'answer.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(109, 2, 'answer.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(110, 2, 'answer.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(111, 2, 'review.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(112, 2, 'review.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(113, 2, 'review.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(114, 2, 'review.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(115, 2, 'review.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(116, 2, 'discussion.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(117, 2, 'discussion.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(118, 2, 'discussion.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(119, 2, 'discussion.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(120, 2, 'discussion.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(121, 2, 'message.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(122, 2, 'message.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(123, 2, 'message.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(124, 2, 'message.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(125, 2, 'message.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(126, 2, 'coupon.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(127, 2, 'coupon.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(128, 2, 'coupon.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(129, 2, 'coupon.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(130, 2, 'coupon.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(131, 2, 'enrollment.index', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(132, 2, 'enrollment.create', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(133, 2, 'enrollment.show', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(134, 2, 'enrollment.edit', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(135, 2, 'enrollment.destroy', '2024-05-06 23:44:05', '2024-05-06 23:44:05'),
(136, 1, 'user.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(137, 1, 'user.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(138, 1, 'user.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(139, 1, 'user.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(140, 1, 'user.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(141, 1, 'role.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(142, 1, 'role.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(143, 1, 'role.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(144, 1, 'role.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(145, 1, 'role.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(146, 1, 'student.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(147, 1, 'student.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(148, 1, 'student.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(149, 1, 'student.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(150, 1, 'student.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(151, 1, 'instructor.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(152, 1, 'instructor.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(153, 1, 'instructor.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(154, 1, 'instructor.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(155, 1, 'instructor.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(156, 1, 'courseCategory.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(157, 1, 'courseCategory.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(158, 1, 'courseCategory.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(159, 1, 'courseCategory.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(160, 1, 'courseCategory.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(161, 1, 'course.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(162, 1, 'course.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(163, 1, 'course.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(164, 1, 'course.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(165, 1, 'course.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(166, 1, 'material.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(167, 1, 'material.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(168, 1, 'material.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(169, 1, 'material.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(170, 1, 'material.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(171, 1, 'lesson.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(172, 1, 'lesson.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(173, 1, 'lesson.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(174, 1, 'lesson.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(175, 1, 'lesson.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(176, 1, 'event.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(177, 1, 'event.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(178, 1, 'event.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(179, 1, 'event.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(180, 1, 'event.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(181, 1, 'quiz.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(182, 1, 'quiz.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(183, 1, 'quiz.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(184, 1, 'quiz.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(185, 1, 'quiz.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(186, 1, 'question.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(187, 1, 'question.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(188, 1, 'question.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(189, 1, 'question.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(190, 1, 'question.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(191, 1, 'option.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(192, 1, 'option.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(193, 1, 'option.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(194, 1, 'option.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(195, 1, 'option.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(196, 1, 'answer.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(197, 1, 'answer.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(198, 1, 'answer.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(199, 1, 'answer.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(200, 1, 'answer.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(201, 1, 'review.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(202, 1, 'review.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(203, 1, 'review.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(204, 1, 'review.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(205, 1, 'review.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(206, 1, 'discussion.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(207, 1, 'discussion.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(208, 1, 'discussion.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(209, 1, 'discussion.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(210, 1, 'discussion.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(211, 1, 'message.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(212, 1, 'message.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(213, 1, 'message.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(214, 1, 'message.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(215, 1, 'message.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(216, 1, 'coupon.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(217, 1, 'coupon.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(218, 1, 'coupon.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(219, 1, 'coupon.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(220, 1, 'coupon.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(221, 1, 'enrollment.index', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(222, 1, 'enrollment.create', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(223, 1, 'enrollment.show', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(224, 1, 'enrollment.edit', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(225, 1, 'enrollment.destroy', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(226, 1, 'permission.list', '2024-05-06 23:44:58', '2024-05-06 23:44:58'),
(276, 3, 'user.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(277, 3, 'user.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(278, 3, 'user.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(279, 3, 'user.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(280, 3, 'user.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(281, 3, 'student.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(282, 3, 'student.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(283, 3, 'instructor.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(284, 3, 'instructor.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(285, 3, 'courseCategory.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(286, 3, 'courseCategory.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(287, 3, 'course.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(288, 3, 'course.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(289, 3, 'material.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(290, 3, 'material.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(291, 3, 'material.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(292, 3, 'material.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(293, 3, 'material.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(294, 3, 'lesson.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(295, 3, 'lesson.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(296, 3, 'lesson.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(297, 3, 'lesson.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(298, 3, 'lesson.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(299, 3, 'event.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(300, 3, 'event.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(301, 3, 'quiz.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(302, 3, 'quiz.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(303, 3, 'quiz.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(304, 3, 'quiz.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(305, 3, 'quiz.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(306, 3, 'question.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(307, 3, 'question.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(308, 3, 'question.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(309, 3, 'question.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(310, 3, 'question.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(311, 3, 'option.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(312, 3, 'option.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(313, 3, 'option.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(314, 3, 'option.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(315, 3, 'option.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(316, 3, 'answer.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(317, 3, 'answer.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(318, 3, 'answer.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(319, 3, 'answer.edit', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(320, 3, 'answer.destroy', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(321, 3, 'review.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(322, 3, 'review.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(323, 3, 'discussion.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(324, 3, 'discussion.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(325, 3, 'discussion.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(326, 3, 'message.index', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(327, 3, 'message.create', '2024-05-12 10:01:46', '2024-05-12 10:01:46'),
(328, 3, 'message.show', '2024-05-12 10:01:46', '2024-05-12 10:01:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `progress_percentage` int(11) NOT NULL DEFAULT 0,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `last_viewed_material_id` bigint(20) UNSIGNED DEFAULT NULL,
  `last_viewed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `option_a` varchar(255) DEFAULT NULL,
  `option_b` varchar(255) DEFAULT NULL,
  `option_c` varchar(255) DEFAULT NULL,
  `option_d` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL,
  `type` enum('multiple_choice','true_false','short_answer') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `content`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Python là ngôn ngữ lập trình nào?', 'Java', 'C++', 'Python', 'JavaScript', 'c', 'multiple_choice', '2024-05-25 21:39:21', '2024-05-25 21:39:21', NULL),
(2, 1, 'Trong Python, phương thức nào được sử dụng để nhận đầu vào từ người dùng?', 'input()', 'get_input()', 'user_input()', 'read_input()', 'a', 'multiple_choice', '2024-05-25 21:41:00', '2024-05-25 21:41:00', NULL),
(3, 1, 'Đâu là cách đơn giản nhất để tạo một list rỗng trong Python?', 'list()', '[]', 'new_list()', 'empty_list()', 'b', 'multiple_choice', '2024-05-25 21:41:31', '2024-05-25 21:41:31', NULL),
(4, 1, 'Hàm print() trong Python được sử dụng để làm gì?', 'Nhận đầu vào từ người dùng', 'Hiển thị thông điệp trên màn hình', 'Thực hiện phép tính toán', 'Tạo một list rỗng', 'b', 'multiple_choice', '2024-05-25 21:42:06', '2024-05-25 21:42:06', NULL),
(5, 1, 'Trong Python, để in ra giá trị của biến x, bạn sử dụng lệnh nào?', 'print(x)', 'display(x)', 'echo(x)', 'show(x)', 'a', 'multiple_choice', '2024-05-25 21:42:43', '2024-05-25 21:42:43', NULL),
(6, 1, 'Trong Python, để tạo một chuỗi (string) rỗng, bạn sử dụng cú pháp nào?', 'empty_string = \"\"', 'empty_string = \'\'', 'empty_string = str()', 'empty_string = str(\"\")', 'a', 'multiple_choice', '2024-05-25 21:43:24', '2024-05-25 21:43:24', NULL),
(7, 1, 'Trong Python, 3 + 4 * 5 sẽ trả về giá trị là bao nhiêu?', '35', '23', '19', '25', 'd', 'multiple_choice', '2024-05-25 21:43:55', '2024-05-25 21:43:55', NULL),
(8, 1, 'Trong Python, lệnh x = 5 có ý nghĩa gì?', 'Khai báo một biến có tên là x và gán giá trị là 5.', 'So sánh giá trị của biến x với 5.', 'Thực hiện phép tính 5 * x.', 'In ra giá trị của biến x.', 'a', 'multiple_choice', '2024-05-25 21:46:45', '2024-05-25 21:46:45', NULL),
(9, 1, 'Đâu là cách đúng để khai báo một tuple trong Python?', 'tuple = (1, 2, 3)', 'tuple = [1, 2, 3]', 'tuple = {1, 2, 3}', 'tuple = \"1, 2, 3\"', 'a', 'multiple_choice', '2024-05-25 21:47:17', '2024-05-25 21:47:17', NULL),
(10, 1, 'Trong Python, hàm len() được sử dụng để làm gì?', 'Lấy độ dài của một chuỗi (string) hoặc danh sách (list).', 'Chuyển đổi một chuỗi (string) thành chữ thường.', 'Lấy phần nguyên của một số.', 'Thực hiện phép tính lên hai số.', 'a', 'multiple_choice', '2024-05-25 21:58:34', '2024-05-25 21:58:34', NULL),
(11, 2, 'Trong Python, phép toán 2 ** 3 trả về kết quả là bao nhiêu?', '8', '6', '5', '9', 'a', 'multiple_choice', '2024-05-25 21:59:15', '2024-05-25 21:59:15', NULL),
(12, 2, 'Trong Python, để lấy giá trị của phần tử thứ hai từ danh sách my_list, bạn sử dụng cú pháp nào?', 'my_list[2]', 'my_list(2)', 'my_list[1]', 'my_list.get(2)', 'c', 'multiple_choice', '2024-05-25 22:00:24', '2024-05-25 22:00:24', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Bài tập 1', '2024-05-25 21:23:55', '2024-05-25 21:47:39', NULL),
(2, 1, 'Bài tập 2', '2024-05-25 21:47:50', '2024-05-25 21:47:50', NULL),
(3, 1, 'Bài tập 3', '2024-05-25 21:48:01', '2024-05-25 21:48:01', NULL),
(4, 1, 'Bài tập 4', '2024-05-25 21:48:12', '2024-05-25 21:48:12', NULL),
(6, 1, 'Bài tập 5', '2024-05-25 21:48:40', '2024-05-25 21:48:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `student_id`, `course_id`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 11, 5, 5, '2024-05-31 10:37:14', '2024-05-31 10:37:14', NULL),
(2, 12, 1, 4, '2024-05-31 11:30:39', '2024-05-31 11:30:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', '2024-04-24 12:02:14', NULL),
(2, 'Admin', 'admin', '2024-04-24 12:02:14', NULL),
(3, 'Giảng viên', 'instructor', '2024-04-24 12:02:14', '2024-05-04 23:47:45'),
(4, 'Học viên', 'student', '2024-04-24 12:02:14', '2024-05-06 09:29:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `contact_en` varchar(255) DEFAULT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`id`, `name_en`, `name_bn`, `contact_en`, `contact_bn`, `email`, `date_of_birth`, `gender`, `image`, `bio`, `profession`, `nationality`, `address`, `city`, `state`, `postcode`, `country`, `status`, `password`, `language`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Học sinh', NULL, '0987654321', NULL, 'hocsinh@gmail.com', '2007-06-25', NULL, '3861715070453.jpg', 'Học chuyên Tin tại chuyên Trần Phú', 'học sinh', 'Hải Phòng', NULL, NULL, NULL, NULL, NULL, 1, '$2y$12$RYOKrXbLgbk.vPRwmStHK.zXUky0FJ/pvFify6TQqFfmVO.Wjw1zG', 'en', NULL, '2024-05-07 01:27:09', '2024-05-07 01:28:46', NULL),
(12, 'Học sinh 2', NULL, '0986543217', NULL, 'hocsinh2@gmail.com', '2007-06-05', NULL, '5741715327921.png', 'Có nhu cầu học lập trình để chuẩn bị vào đại học', 'học sinh', 'Hà Nội', NULL, NULL, NULL, NULL, NULL, 1, '$2y$12$H9L2/vZ6TooSQJsK5QQkuuQ0lEgQKaz2JrEk6jUwpo8kNWVPDEDny', 'en', NULL, '2024-05-10 00:56:29', '2024-05-10 00:59:24', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `plan` enum('monthly','yearly') NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL,
  `status` enum('active','canceled','expired') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `tst_user_id` int(11) DEFAULT NULL,
  `tst_total_amount` bigint(20) DEFAULT NULL COMMENT 'Số tiền thanh toán',
  `e_wallet_provider` varchar(255) DEFAULT NULL COMMENT 'Thanh toán qua',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `payment_method`, `tst_user_id`, `tst_total_amount`, `e_wallet_provider`, `created_at`, `updated_at`) VALUES
(429, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-24 10:14:36', NULL),
(430, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-24 10:42:14', NULL),
(431, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-24 10:48:02', NULL),
(432, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-24 10:52:53', NULL),
(433, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-24 10:54:40', NULL),
(434, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-24 10:55:42', NULL),
(435, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-24 10:56:43', NULL),
(436, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-24 11:11:42', NULL),
(437, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-24 11:18:44', NULL),
(438, 'e_wallet', 11, 4400000, 'vnpay', '2024-05-25 09:35:21', NULL),
(439, 'e_wallet', 11, 1800000, 'vnpay', '2024-05-25 10:43:44', NULL),
(440, 'e_wallet', 12, 6200000, 'vnpay', '2024-05-25 20:02:10', NULL),
(441, 'e_wallet', 12, 6200000, 'vnpay', '2024-05-25 20:06:09', NULL),
(442, 'e_wallet', 12, 4400000, 'vnpay', '2024-05-25 20:11:46', NULL),
(443, 'e_wallet', 11, 6200000, 'vnpay', '2024-05-25 20:23:13', NULL),
(444, 'e_wallet', 11, 6200000, 'vnpay', '2024-05-25 20:26:50', NULL),
(445, 'e_wallet', 11, 4340000, 'vnpay', '2024-05-25 20:31:57', NULL),
(446, 'e_wallet', 11, 4340000, 'vnpay', '2024-05-25 20:32:37', NULL),
(447, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-25 20:38:20', NULL),
(448, 'e_wallet', 12, 3600000, 'vnpay', '2024-05-25 20:43:01', NULL),
(449, 'e_wallet', 12, 4400000, 'vnpay', '2024-05-25 20:54:23', NULL),
(450, 'e_wallet', 12, 4400000, 'vnpay', '2024-05-25 21:00:31', NULL),
(451, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-25 21:14:52', NULL),
(452, 'e_wallet', 12, 1800000, 'vnpay', '2024-05-28 15:29:03', NULL),
(453, 'e_wallet', 12, 4400000, 'vnpay', '2024-05-28 15:33:29', NULL),
(454, 'e_wallet', 12, 4400000, 'vnpay', '2024-05-28 15:33:48', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_en` varchar(255) NOT NULL,
  `contact_bn` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `image` varchar(255) DEFAULT NULL,
  `full_access` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>yes, 0=>no',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active 2=>inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `instructor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name_en`, `name_bn`, `email`, `contact_en`, `contact_bn`, `role_id`, `password`, `language`, `image`, `full_access`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `instructor_id`) VALUES
(1, 'SuperAdmin', NULL, 'superadmin@gmail.com', '0981234566', NULL, 1, '$2y$12$IM6zyqGfzCsvAahk8yecvOPcY1XxfN6vEYceANddVZcg.RxE.TOYa', 'en', '8791714876437.jpg', 1, 1, NULL, '2024-05-03 07:51:40', '2024-05-04 19:33:57', NULL, NULL),
(3, 'admin1', 'Admin1', 'admin1@gmail.com', '0976548934', '0976548934', 2, '$2y$12$N4BCsafhXJBA5gJ36xUo7.sTJGjPmeGk.Sj7nwd4Aqfet7veej3DK', 'en', '9301715013147.png', 0, 1, NULL, '2024-05-04 23:51:59', '2024-05-06 09:37:10', NULL, NULL),
(5, 'GS.TS Lê Hoài Bắc', NULL, 'giangvien1@gmail.com', '0985642133', NULL, 3, '$2y$12$oN5Eavk285Na1hmW2A8X9uCpEKHhbyFDzWYe0xfF.4prJcy.DikKG', 'en', 'Giảng viên_GS.TS Lê Hoài Bắc_679.jpg', 0, 1, NULL, '2024-05-06 21:38:49', '2024-05-06 21:38:49', NULL, 2),
(6, 'PGS.TS Vũ Hải Quân', NULL, 'giangvien@gmail.com', '0956432175', NULL, 3, '$2y$12$XS82WMk5ot9HFBTjv9/.qOUqsPl9Pw2aGzf1ZGHOjHOQRu1wxHwly', 'en', 'Giảng viên_PGS.TS Vũ Hải Quân_581.png', 0, 1, NULL, '2024-05-07 00:02:34', '2024-05-07 00:02:34', NULL, 3),
(7, 'PGS.TS Hồ Bảo Quốc', NULL, 'giangvien2@gmail.com', '0965321475', NULL, 3, '$2y$12$Ad6aB2dr1S0iGaBsKrh65OE0ojpz5QnkfFd3Dkw1eJBqUnyGqX34q', 'en', 'Giảng viên_PGS.TS Hồ Bảo Quốc_332.jpg', 0, 1, NULL, '2024-05-07 00:03:59', '2024-05-07 00:03:59', NULL, 4),
(8, 'TS. Nguyễn Hải Minh', NULL, 'giangvien3@gmail.com', '0965321456', NULL, 3, '$2y$12$RYTIbZfAD1q6U30HtPDHbuHV4adXZgiioeJ.ILAV2z6OBLIOCz.Ma', 'en', 'Giảng viên_TS. Nguyễn Hải Minh_257.jpg', 0, 1, NULL, '2024-05-07 00:06:33', '2024-05-07 00:06:33', NULL, 5),
(9, 'Tạ Thị Phương Thảo', NULL, 'giangvien4@gmail.com', '0965482137', NULL, 3, '$2y$12$jEj.HiBvScHtrznxBqyNcO3g2WQ46oDutukVleMPmy82gA71u4dzC', 'en', 'Giảng viên_Tạ Thị Phương Thảo_369.jpg', 0, 0, NULL, '2024-05-07 00:10:19', '2024-05-07 00:10:19', NULL, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vpayments`
--

CREATE TABLE `vpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_ids` varchar(255) DEFAULT NULL,
  `amount` bigint(20) DEFAULT NULL COMMENT 'Số tiền thanh toán',
  `transaction_code` varchar(20) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL COMMENT 'Nội dung thanh toán',
  `vnp_response_code` varchar(255) DEFAULT NULL,
  `code_vnpay` varchar(255) DEFAULT NULL COMMENT 'Mã giao dịch vnpay',
  `code_bank` varchar(255) DEFAULT NULL COMMENT 'Mã ngân hàng',
  `p_time` datetime DEFAULT NULL COMMENT 'Thời điểm giao dịch',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vpayments`
--

INSERT INTO `vpayments` (`id`, `transaction_id`, `user_id`, `course_ids`, `amount`, `transaction_code`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `p_time`, `created_at`, `updated_at`) VALUES
(123, 429, 12, '1,3', 3600000, '135', 'a', '00', '14428741', 'NCB', '2024-05-25 00:15:00', NULL, NULL),
(124, 430, 12, '3', 1800000, '2872', '3', '00', '14428762', 'NCB', '2024-05-25 00:42:00', NULL, NULL),
(125, 431, 12, '3', 1800000, '6690', 'r', '00', '14428768', 'NCB', '2024-05-25 00:48:00', NULL, NULL),
(126, 432, 12, '3,1', 3600000, '1106', 'b', '00', '14428772', 'NCB', '2024-05-25 00:53:00', NULL, NULL),
(127, 433, 12, '1', 1800000, '7325', 'a', '00', '14428773', 'NCB', '2024-05-25 00:55:00', NULL, NULL),
(128, 434, 12, '1', 1800000, '1026', 'a', '00', '14428775', 'NCB', '2024-05-25 00:56:00', NULL, NULL),
(129, 435, 12, '1,3', 3600000, '9081', 'a', '00', '14428776', 'NCB', '2024-05-25 00:57:00', NULL, NULL),
(130, 436, 12, '1,3', 3600000, '8362', 'b', '00', '14428788', 'NCB', '2024-05-25 01:14:00', NULL, NULL),
(131, 437, 12, '1,3', 3600000, '8827', 'g', '00', '14428790', 'NCB', '2024-05-25 01:19:00', NULL, NULL),
(132, 438, 11, '5', 4400000, '8079', 'app', '00', '14429743', 'NCB', '2024-05-25 23:36:00', NULL, NULL),
(133, 439, 11, '1', 1800000, '248', 'python', '00', '14429790', 'NCB', '2024-05-26 00:44:00', NULL, NULL),
(134, 440, 12, '3,5', 6200000, '2968', 'aa', '00', '14429909', 'NCB', '2024-05-26 10:03:00', NULL, NULL),
(135, 442, 12, '5', 4400000, '7534', 'app', '00', '14429913', 'NCB', '2024-05-26 10:12:00', NULL, NULL),
(136, 443, 11, '3,5', 6200000, '4133', 'thanh toán khoá học', '00', '14429923', 'NCB', '2024-05-26 10:25:00', NULL, NULL),
(137, 444, 11, '3,5', 6200000, '1843', 'thanh toán khoá học', '00', '14429926', 'NCB', '2024-05-26 10:27:00', NULL, NULL),
(138, 446, 11, '3,5', 4340000, '2915', 'Thanh toán khoá học', '00', '14429931', 'NCB', '2024-05-26 10:33:00', NULL, NULL),
(139, 448, 12, '1,3', 3600000, '3176', 'Thanh toán khoá học', '00', '14429946', 'NCB', '2024-05-26 10:46:00', NULL, NULL),
(140, 449, 12, '5', 4400000, '4487', 'thanh toán khoá app', '00', '14429953', 'NCB', '2024-05-26 10:54:00', NULL, NULL),
(141, 450, 12, '5', 4400000, '5199', 'test', '00', '14429964', 'NCB', '2024-05-26 11:01:00', NULL, NULL),
(142, 451, 12, '1', 1800000, '372', 'python', '00', '14429974', 'NCB', '2024-05-26 11:15:00', NULL, NULL),
(143, 452, 12, '1', 1800000, '167', 'mua khóa học python học sinh 2', '00', '14434145', 'NCB', '2024-05-29 05:31:00', NULL, NULL),
(144, 454, 12, '5', 4400000, '642', 'mua khóa t2', '00', '14434146', 'NCB', '2024-05-29 05:34:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `watchlists`
--

CREATE TABLE `watchlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `watchlists`
--

INSERT INTO `watchlists` (`id`, `student_id`, `course_id`, `lesson_id`, `material_id`, `created_at`, `updated_at`, `deleted_at`, `completed`) VALUES
(11, 12, 5, 4, 7, NULL, NULL, NULL, 1),
(14, 12, 5, 4, 9, NULL, NULL, NULL, 1),
(17, 12, 5, 6, 10, NULL, NULL, NULL, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_student_id_index` (`student_id`),
  ADD KEY `answers_question_id_index` (`question_id`);

--
-- Chỉ mục cho bảng `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_student_id_foreign` (`student_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_course_category_id_index` (`course_category_id`),
  ADD KEY `courses_instructor_id_index` (`instructor_id`);

--
-- Chỉ mục cho bảng `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_index` (`user_id`),
  ADD KEY `discussions_course_id_index` (`course_id`);

--
-- Chỉ mục cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrollments_student_id_index` (`student_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_contact_en_unique` (`contact_en`),
  ADD UNIQUE KEY `instructors_email_unique` (`email`),
  ADD UNIQUE KEY `instructors_contact_bn_unique` (`contact_bn`),
  ADD KEY `instructors_role_id_index` (`role_id`);

--
-- Chỉ mục cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_index` (`course_id`);

--
-- Chỉ mục cho bảng `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_lesson_id_index` (`lesson_id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_index` (`sender_id`),
  ADD KEY `messages_receiver_id_index` (`receiver_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `options_question_id_index` (`question_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_index` (`role_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_student_id_index` (`student_id`),
  ADD KEY `progress_course_id_index` (`course_id`),
  ADD KEY `progress_last_viewed_material_id_index` (`last_viewed_material_id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_quiz_id_index` (`quiz_id`);

--
-- Chỉ mục cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_index` (`course_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_student_id_index` (`student_id`),
  ADD KEY `reviews_course_id_index` (`course_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_identity_unique` (`identity`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Chỉ mục cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_student_id_index` (`student_id`),
  ADD KEY `subscriptions_course_id_index` (`course_id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_en_unique` (`contact_en`),
  ADD UNIQUE KEY `users_contact_bn_unique` (`contact_bn`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `users_instructor_id_index` (`instructor_id`);

--
-- Chỉ mục cho bảng `vpayments`
--
ALTER TABLE `vpayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `watchlists`
--
ALTER TABLE `watchlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watchlists_student_id_index` (`student_id`),
  ADD KEY `watchlists_course_id_index` (`course_id`),
  ADD KEY `watchlists_lesson_id_index` (`lesson_id`),
  ADD KEY `watchlists_material_id_index` (`material_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vpayments`
--
ALTER TABLE `vpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `instructors`
--
ALTER TABLE `instructors`
  ADD CONSTRAINT `instructors_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progress_last_viewed_material_id_foreign` FOREIGN KEY (`last_viewed_material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progress_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_instructor_id_foreign` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `watchlists`
--
ALTER TABLE `watchlists`
  ADD CONSTRAINT `watchlists_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watchlists_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
