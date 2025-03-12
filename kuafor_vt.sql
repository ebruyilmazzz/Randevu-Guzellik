-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Mar 2025, 11:41:21
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kuafor_vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `status` enum('pending','confirmed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekip`
--

CREATE TABLE `ekip` (
  `id` int(11) NOT NULL,
  `isim` varchar(100) NOT NULL,
  `unvan` varchar(100) NOT NULL,
  `aciklama` text NOT NULL,
  `resim` varchar(255) NOT NULL,
  `sosyal_instagram` varchar(255) DEFAULT NULL,
  `sosyal_facebook` varchar(255) DEFAULT NULL,
  `sosyal_twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `ekip`
--

INSERT INTO `ekip` (`id`, `isim`, `unvan`, `aciklama`, `resim`, `sosyal_instagram`, `sosyal_facebook`, `sosyal_twitter`) VALUES
(1, 'Beyza Yilmaz', 'Estetisyen', 'Estetik Uzmani ', 'image/estetisyen.jpg', 'nn', 'nn', 'nn'),
(2, 'Melike Keskin', 'Tirnakçi', 'Protez Tirnak Uzmani', 'image/tirnakci.jpg', 'vv', 'vv', 'vv'),
(3, 'Damla Yilmaz', 'Saç', 'Saç Uzamani', 'image/kuafor.jpg', 'bb', 'b', 'bb'),
(4, 'Ebru Yilmaz', 'Masaj', 'Profesyonel Masaj Uzmani', 'image/masajyapan.jpg', 'v', 'v', 'v'),
(5, 'Miray Ayar', 'Cilt Bakim', 'Cilt Bakim Uzmani', 'image/doktor.jpg', 'g', 'g', 'g'),
(6, 'Nisanur Yilmaz', 'Makyaj', 'Makyaj Uzmani ', 'image/makyaju.jpg', 'nn', 'nn', 'nn');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `id` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `fiyat` decimal(10,2) NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`id`, `baslik`, `aciklama`, `fiyat`, `resim`) VALUES
(5, 'asdsa', 'bbbbbbbbbbb', 23.00, 'image/kesim.jpeg'),
(10, 'fdgr', 'hrher', 0.00, 'image/cilt.jpeg'),
(11, 'dvdv', 'vrv', 152.00, 'image/boya.jpeg'),
(12, 'cvv', 'bbb', 85.00, 'image/kaÅŸ.jpeg'),
(15, 'yn', 'juj', 41.00, 'image/tÄ±rnak2.jpeg'),
(16, '6h6h', '6hh6h', 41.00, 'image/cilt.jpeg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kampanyalar`
--

CREATE TABLE `kampanyalar` (
  `kampanyaID` int(11) NOT NULL,
  `baslik` varchar(255) NOT NULL,
  `aciklama` text NOT NULL,
  `resim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kampanyalar`
--

INSERT INTO `kampanyalar` (`kampanyaID`, `baslik`, `aciklama`, `resim`) VALUES
(1, 'Cilt Bakimi', '%50 İndirim', 'image/cilt.jpeg'),
(2, 'Saç Kesim', 'Kadınlar Gününe özel %10 İndirim', 'image/kesim.jpeg'),
(3, 'Masaj', 'Huzura Erin', 'image/masajkampanya.jpeg'),
(4, 'Tırnak', 'İstediğiniz Modelde %20 İndirim', 'image/tırnak.jpg'),
(5, 'Kaş Bakım', 'Profesyonel Kaş', 'image/kaş.jpeg'),
(6, 'Makyaj', 'Profesyonel Makyaj', 'image/makyaj.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_10_134500_create_randevular_table', 1),
(5, '2025_03_10_135339_add_is_admin_to_users', 2),
(6, '2024_03_10_124519_create_appointments_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevular`
--

CREATE TABLE `randevular` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `tarih` datetime NOT NULL,
  `durum` varchar(255) NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `randevular`
--

INSERT INTO `randevular` (`id`, `email`, `tarih`, `durum`, `created_at`, `updated_at`) VALUES
(8, 'cagaw63797@kaiav.com', '2025-03-26 15:44:00', 'Aktif', '2025-03-10 10:44:46', '2025-03-10 10:44:46'),
(9, 'ebruylmaazz0505@gmail.com', '2025-03-11 07:53:00', 'Pasif', '2025-03-11 02:53:29', '2025-03-11 02:53:29'),
(10, 'yajexip396@oziere.com', '2025-03-30 12:54:00', 'Aktif', '2025-03-11 02:54:55', '2025-03-11 02:54:55'),
(11, 'ebruylmaazz0505@gmail.com', '2025-03-12 12:35:00', 'Aktif', '2025-03-11 04:35:43', '2025-03-11 04:35:43'),
(12, 'ebruylmaazz0505@gmail.com', '2025-03-11 14:34:00', 'Pasif', '2025-03-11 08:34:38', '2025-03-11 08:34:38'),
(13, 'sodopi8652@oziere.com', '2025-03-19 20:35:00', 'Aktif', '2025-03-11 08:35:44', '2025-03-11 08:35:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BjjnWfyHqMQqaWuc1Uww6q4HUkYEoAshUrhVau0I', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRU9hUVFzdDIxOHVibkdJUDVvVzlJd2R1U1J2UTVlQUppOFZqeHlvWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1741702146),
('C4eVfHwmOo7SWnC7TaTttTfnNDCJFnGjDzdyS3mx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVVBSUFVWbE5PVk1wbGJxRE5LY0JuQ0FHeGp1RHJkMjV2THpSUklLeiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHBvaW50bWVudC9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1741681309),
('CghmT8qM0tWnEvjEMAylrTcNdlv88cOkrVRDL1hj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOFZLbTRxZ1FZRnlMSklMaDFjZmJQeDFnMGFjbUZIaWtNY1Qxc1FucCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHBvaW50bWVudC9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1741758725),
('lkHmwFEFiMR59lfUJxGwcRfiXSXcXe6m91dgs0Yd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWTBIS0o4cnhONGtybjJlemloeklCRWhWeElsdjZaR213ZUdaTGZwcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9la2lwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1741769874),
('m504bqJvspGJsBCegUyEX5jeWW4Ml1e7amu0b8X0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVVVwbjRHQmtFS0M0M2ZYRVFXOVZjWUZTYUhJcWJmT1UwQzNVV29DbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHBvaW50bWVudC9jcmVhdGUiO319', 1741759716);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Ebru Yılmaz', 'ebruylmaazz0505@gmail.com', NULL, '$2y$12$qn3RnJ.mEiM5oEDXnByBj.75F2svL.btN/njCLNR3GVOJ14GXC06i', NULL, '2025-03-10 07:48:07', '2025-03-10 07:48:07', 1),
(2, 'Nisanur Yılmaz', 'cagaw63797@kaiav.com', NULL, '$2y$12$61VVFMWMtKDVdEtRAifJNOZ0vb73BKzroIqXckSs3trKy30ZNj/He', NULL, '2025-03-10 10:43:43', '2025-03-10 10:43:43', 0),
(3, 'Melike keskin', 'yajexip396@oziere.com', NULL, '$2y$12$Kr9qg3CurpIY7p1R3Vsk2eE/5o00RbQLqA5bviEiKE3fjifcUEA4.', NULL, '2025-03-11 02:54:42', '2025-03-11 02:54:42', 0),
(4, 'emine Özdemir', 'sodopi8652@oziere.com', NULL, '$2y$12$tMr7JdlZ9fdL6wzm1Tuyvuc7FZ2z8R68d7b6wPsruOmL6hqiOgZz2', NULL, '2025-03-11 08:35:29', '2025-03-11 08:35:29', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Tablo için indeksler `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Tablo için indeksler `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`id`),
  ADD KEY `randevular_email_index` (`email`);

--
-- Tablo için indeksler `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `randevular`
--
ALTER TABLE `randevular`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
