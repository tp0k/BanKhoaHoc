-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 08, 2024 lúc 09:29 AM
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

--
-- Đang đổ dữ liệu cho bảng `checkouts`
--

INSERT INTO `checkouts` (`id`, `cart_data`, `student_id`, `txnid`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjE4OTAwMCwidG90YWxfYW1vdW50IjoxNDQ5MDAwfX0=', 11, 'SSLCZ_TXN_663a275d6904f', 0, '2024-05-07 06:06:37', '2024-05-07 06:06:37', NULL),
(2, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjE4OTAwMCwidG90YWxfYW1vdW50IjoxNDQ5MDAwfX0=', 11, 'SSLCZ_TXN_663a27619e9a0', 0, '2024-05-07 06:06:41', '2024-05-07 06:06:41', NULL),
(3, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjE4OTAwMCwidG90YWxfYW1vdW50IjoxNDQ5MDAwfX0=', 11, 'SSLCZ_TXN_663a27b90e6f3', 0, '2024-05-07 06:08:09', '2024-05-07 06:08:09', NULL),
(4, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjE4OTAwMCwidG90YWxfYW1vdW50IjoxNDQ5MDAwfX0=', 11, 'SSLCZ_TXN_663a2aa2deefc', 0, '2024-05-07 06:20:34', '2024-05-07 06:20:34', NULL),
(5, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5c23beb00', 0, '2024-05-07 09:51:47', '2024-05-07 09:51:47', NULL),
(6, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5c26d984c', 0, '2024-05-07 09:51:50', '2024-05-07 09:51:50', NULL),
(7, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5c2958a08', 0, '2024-05-07 09:51:53', '2024-05-07 09:51:53', NULL),
(8, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5de422b36', 0, '2024-05-07 09:59:16', '2024-05-07 09:59:16', NULL),
(9, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5f8135423', 0, '2024-05-07 10:06:09', '2024-05-07 10:06:09', NULL),
(10, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a5fa74bb78', 0, '2024-05-07 10:06:47', '2024-05-07 10:06:47', NULL),
(11, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a6085d8cbe', 0, '2024-05-07 10:10:29', '2024-05-07 10:10:29', NULL),
(12, 'eyJjYXJ0Ijp7IjEiOnsidGl0bGVfZW4iOiJLaG9cdTAwZTEgaFx1MWVjZGMgbFx1MWVhZHAgdHJcdTAwZWNuaCBQeXRob24gYmFzaWMiLCJxdWFudGl0eSI6MSwicHJpY2UiOiIxODAwMDAwLjAwIiwib2xkX3ByaWNlIjoiNDAwMDAwMC4wMCIsImltYWdlIjoiNjA4MTcxNTA2ODUwMy5qcGciLCJkaWZmaWN1bHR5IjoiYmVnaW5uZXIiLCJpbnN0cnVjdG9yIjoiR1MuVFMgTFx1MDBlYSBIb1x1MDBlMGkgQlx1MWVhZmMifX0sImNhcnRfZGV0YWlscyI6eyJjYXJ0X3RvdGFsIjoxODAwMDAwLCJjb3Vwb25fY29kZSI6IlZJUDAxIiwiZGlzY291bnQiOiIzMC4wMCIsImRpc2NvdW50X2Ftb3VudCI6NTQwMDAwLCJ0YXgiOjEyNjAwMCwidG90YWxfYW1vdW50IjoxMjYwMDAwfX0=', 11, 'SSLCZ_TXN_663a639c4500c', 0, '2024-05-07 10:23:40', '2024-05-07 10:23:40', NULL);

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
(1, 'VIP01', 30.00, '2024-05-05', '2024-08-05', '2024-05-03 20:34:24', '2024-05-03 20:34:59', NULL);

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
(1, 'Khoá học lập trình Python basic', NULL, 'Vì sao học và sử dụng Python?\r\n\r\nPython là một trong những ngôn ngữ lập trình phổ biến nhất và rất súc tích. Bạn có thể tạo chương trình làm được rất nhiều việc mà không cần gõ nhiều mã lệnh.\r\n\r\nRất nhiều các công ty, tổ chức lớn như Google, NASA, Youtube sử dụng Python để lập trình. Bạn cũng có thể dùng nó để điều khiển các thiết bị máy móc phục vụ nhu cầu và sở thích.\r\n\r\nĐể khởi đầu, bạn cần một máy tính xách tay (hoặc máy tính để bàn) để chạy Python. Mọi thông tin sẽ được Giảng viên hướng dẫn trong khóa học “Trở thành lập trình viên Python tương lai” tại Học viện công nghệ CNET. Khóa học sẽ chỉ cho bạn cách sử dụng Python trong nhiều loại dự án, từ viết chương trình đầu tiên cho tới các trò chơi do chính bạn tạo ra. Mọi kiến thức được chia thành các bước ngắn, dễ thực hành.\r\n\r\nNỘI DUNG KHÓA HỌC\r\n\r\nGiới thiệu chung: Lập trình là gì, bắt đầu làm quen với Python, Bài tập chơi cùng con số\r\nBiến số, ra quyết định, Giải thuật,\r\nTrò chơi dự đoán\r\nVòng lặp for, lệnh tắt cho bảng cửu chương, Sử dụng danh sách\r\nTừ điển, tin tức mã hóa\r\nCông cụ vẽ Turtle, đừng bấm nút, vẽ một kiệt tác\r\nTrò chơi dò bom, Trò chơi vợt và bóng\r\nTải Python, quản lý tập tin, Gỡ lỗi\r\nCửa sổ nào, Xem nhanh mã lệnh\r\nBảng chú giải\r\nTHỜI LƯỢNG:\r\n\r\nHọc 02 buổi/tuần, mỗi buổi 02 tiếng (Học viên chọn 1 trong 3 ba ca sáng, chiều, tối và chọn ngày học)\r\nTổng thời lượng: 08 buổi (kéo dài 01 tháng)\r\nSố học viên tối đa: 10 học viên/lớp', NULL, 2, 2, 'paid', 1800000.00, 4000000.00, NULL, '2024-05-24 17:00:00', 1, 8, '> 14 tuổi', NULL, 'beginner', NULL, '6081715068503.jpg', '2701715068503.jpg', 'https://youtu.be/NZj6LI5a9vc?si=tLCsKEG1c3T6H0B4', 0, 'en', '2024-05-07 00:32:02', '2024-05-07 00:55:03', NULL, 'popular');

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
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT '2024-04-24 12:02:14',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Trải nghiệm khoá học scratch', 'Đây là sự kiện diễn ra thường niên với mục đích mang đến nhưng trải nghiệm tuyệt vời giúp các con hiểu hơn về công nghệ và yêu thích công nghệ hơn.', 'Aeon mall Lê Chân Hải Phòng', '3731714795688.png', 'Chào hè 2024', 'Mang đến nhưng trải nghiệm tuyệt vời giúp các con hiểu hơn về công nghệ và yêu thích công nghệ hơn', 'Học viên công nghệ Cnet', '2024-05-20', '2024-05-03 21:08:08', '2024-05-03 21:08:08', NULL);

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
(1, '[Khóa học lập trình Python basic] - Bài 1: Giới thiệu ngôn ngữ lập trình Python', 1, 'Trong khóa học lập trình python này, chúng ta sẽ sử dụng Python 3.x. Bởi vì Python 2.x là phiên bản cũ và đã được thông báo chính thức là sẽ không còn được phát triển và hỗ trợ sau 2020.', 'Ưu điểm của Python\r\nLà một ngôn ngữ lập trình dành cho người mới bắt đầu.\r\nCú pháp đơn giản, dễ đọc, dễ hiểu và dễ học.\r\nĐa nền tảng.\r\nMiễn phí và là ngôn ngữ mã nguồn mở.\r\nLà ngôn ngữ hướng đối tượng.\r\nKho thư viện hỗ trợ phong phú và đa dạng.\r\nỨng dụng trong nhiều lĩnh vực lập trình khác nhau.\r\nCó khả năng mở rộng, tương thích với các cơ sở dữ liệu và ngôn ngữ khác.\r\nNhược điểm của Python\r\nTốc độ chậm hơn so với các ngôn ngữ C/C++ hay Java.\r\nKhông phải là ngôn ngữ tốt dành cho nền tảng mobile.\r\nPython không phải lựa chọn tốt cho các bài toán cần tối ưu bộ nhớ.\r\nPython có nhiều giới hạn khi làm việc với cơ sở dữ liệu phức tạp.\r\nPython dùng để làm gì?\r\nPhát triển web và các nền tảng cho Internet\r\nPython được sử dụng cho phát triển web theo nhiều cách khác nhau:\r\n\r\nCác framework phát triển web như Django hay Pyramid.\r\nMicro-framework như Flask hay Bottle.\r\nXây dựng CMS với Plone hay django CMS.\r\nCùng với hàng loạt các thư viện đồ sộ hỗ trợ lập trình web, web crawler,…\r\nỨng dụng trong machine learning\r\nPython là ngôn ngữ lập trình phổ biến nhất được sử dụng trong machine learning và thị giác máy tính:\r\n\r\nSciPy là một gói thư viện dành cho toán học, khoa học và kỹ thuật.\r\nPandas là một thư viện dành cho phân tích dữ liệu.\r\nscikit-learn là một thư viện dành cho machine learning\r\n…\r\nLà ngôn ngữ cho mục đích giảng dạy\r\nDo là một ngôn ngữ dễ đọc, dễ hiểu và dễ học. Python là ngôn ngữ đầu tiên mà các lập trình viên tiếp cận. Tuy nhiên, điều này có vẻ không đúng ở Việt Nam chúng ta ^^.\r\n\r\nVà rất nhiều ứng dụng trong các lĩnh vực khác (mình lười trình bày rồi nên liệt kê thôi nhé, chứ không phải ứng dụng nhỏ đâu) bao gồm:\r\n\r\nPhân tích dữ liệu (Data Analysis)\r\nTự động hóa (Automation)\r\nTest tự động (Selenium)\r\nIOT\r\n…', '2024-05-07 00:49:57', '2024-05-07 00:49:57', NULL);

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
(1, 1, 'Bài 1: Giới thiệu ngôn ngữ lập trình Python', 'document', '2681715068775.docx', 'https://anandology.com/python-practice-book/index.html', '2024-05-07 00:59:35', '2024-05-07 00:59:35', NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
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
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency_value` decimal(10,2) DEFAULT NULL,
  `method` varchar(255) DEFAULT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 pending, 1 successfull, 2 fail',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `currency`, `currency_code`, `amount`, `currency_value`, `method`, `txnid`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 11, 'BDT', 'BDT', 1260000.00, 1.00, 'SSLCommerz', 'SSLCZ_TXN_663a5f8135423', 0, '2024-05-07 10:06:09', '2024-05-07 10:06:09', NULL);

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
(227, 3, 'user.index', '2024-05-06 23:53:06', '2024-05-06 23:53:06'),
(228, 3, 'user.create', '2024-05-06 23:53:06', '2024-05-06 23:53:06'),
(229, 3, 'user.show', '2024-05-06 23:53:06', '2024-05-06 23:53:06'),
(230, 3, 'user.edit', '2024-05-06 23:53:06', '2024-05-06 23:53:06'),
(231, 3, 'user.destroy', '2024-05-06 23:53:06', '2024-05-06 23:53:06'),
(232, 3, 'student.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(233, 3, 'student.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(234, 3, 'instructor.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(235, 3, 'instructor.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(236, 3, 'courseCategory.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(237, 3, 'courseCategory.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(238, 3, 'course.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(239, 3, 'course.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(240, 3, 'course.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(241, 3, 'material.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(242, 3, 'material.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(243, 3, 'material.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(244, 3, 'material.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(245, 3, 'material.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(246, 3, 'lesson.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(247, 3, 'lesson.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(248, 3, 'lesson.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(249, 3, 'lesson.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(250, 3, 'lesson.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(251, 3, 'quiz.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(252, 3, 'quiz.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(253, 3, 'quiz.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(254, 3, 'quiz.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(255, 3, 'quiz.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(256, 3, 'question.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(257, 3, 'question.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(258, 3, 'question.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(259, 3, 'question.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(260, 3, 'question.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(261, 3, 'option.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(262, 3, 'option.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(263, 3, 'option.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(264, 3, 'option.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(265, 3, 'option.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(266, 3, 'answer.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(267, 3, 'answer.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(268, 3, 'answer.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(269, 3, 'answer.edit', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(270, 3, 'answer.destroy', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(271, 3, 'review.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(272, 3, 'review.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(273, 3, 'message.index', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(274, 3, 'message.create', '2024-05-06 23:53:07', '2024-05-06 23:53:07'),
(275, 3, 'message.show', '2024-05-06 23:53:07', '2024-05-06 23:53:07');

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
  `type` enum('multiple_choice','true_false','short_answer') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 'Học sinh', NULL, '0987654321', NULL, 'hocsinh@gmail.com', '2007-06-25', NULL, '3861715070453.jpg', 'Học chuyên Tin tại chuyên Trần Phú', 'học sinh', 'Hải Phòng', NULL, NULL, NULL, NULL, NULL, 1, '$2y$12$RYOKrXbLgbk.vPRwmStHK.zXUky0FJ/pvFify6TQqFfmVO.Wjw1zG', 'en', NULL, '2024-05-07 01:27:09', '2024-05-07 01:28:46', NULL);

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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD KEY `enrollments_course_id_index` (`course_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `watchlists`
--
ALTER TABLE `watchlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
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
