-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2024 lúc 07:11 PM
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
-- Cơ sở dữ liệu: `bankhoahoc`
--

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
(1, '2024_04_14_000001_create_personal_access_tokens_table', 1),
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
(27, '2024_04_24_190036_create_events_table', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
