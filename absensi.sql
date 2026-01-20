-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Jan 2026 pada 07.24
-- Versi server: 8.0.30
-- Versi PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_harian`
--

CREATE TABLE `absensi_harian` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('H','I','S','A') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'H',
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci,
  `dicatat_oleh` bigint UNSIGNED NOT NULL,
  `finalized_at` timestamp NULL DEFAULT NULL,
  `finalized_by` bigint UNSIGNED DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `closed_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi_harian`
--

INSERT INTO `absensi_harian` (`id`, `siswa_id`, `tanggal`, `status`, `jam_masuk`, `jam_keluar`, `catatan`, `dicatat_oleh`, `finalized_at`, `finalized_by`, `closed_at`, `closed_by`, `created_at`, `updated_at`) VALUES
(1, 60, '2026-01-19', 'I', NULL, NULL, 'keperluan keluarga', 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:39:06'),
(2, 57, '2026-01-19', 'A', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(3, 52, '2026-01-19', 'A', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(4, 50, '2026-01-19', 'S', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:39:06'),
(5, 40, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(6, 42, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(7, 33, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(8, 5, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(9, 20, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(10, 39, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(11, 31, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(12, 17, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(13, 45, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(14, 55, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(15, 51, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(16, 38, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(17, 9, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(18, 24, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(19, 34, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(20, 12, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(21, 11, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(22, 3, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(23, 43, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(24, 4, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(25, 8, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(26, 54, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(27, 58, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(28, 25, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(29, 23, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(30, 10, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(31, 22, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(32, 28, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(33, 37, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(34, 32, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(35, 21, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(36, 15, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(37, 48, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(38, 46, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(39, 35, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(40, 7, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(41, 47, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(42, 29, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(43, 36, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(44, 27, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(45, 19, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(46, 2, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(47, 44, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(48, 16, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(49, 1, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(50, 61, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(51, 56, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(52, 18, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(53, 26, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(54, 53, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(55, 13, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(56, 49, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(57, 14, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(58, 30, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(59, 41, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(60, 6, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30'),
(61, 59, '2026-01-19', 'H', '11:38:00', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2026-01-19 04:39:06', '2026-01-19 04:41:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_17_150024_create_wali_table', 1),
(5, '2026_01_17_150048_create_siswa_table', 1),
(6, '2026_01_17_150116_create_pengurus_kelas_table', 1),
(7, '2026_01_17_150150_create_settings_table', 1),
(8, '2026_01_17_150218_create_absensi_harian_table', 1),
(9, '2026_01_18_065522_add_closed_colummn_to_absensi', 1),
(10, '2026_01_18_145958_add_role_to_users', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus_kelas`
--

CREATE TABLE `pengurus_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date DEFAULT NULL,
  `tugas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengurus_kelas`
--

INSERT INTO `pengurus_kelas` (`id`, `siswa_id`, `jabatan`, `periode_awal`, `periode_akhir`, `tugas`, `created_at`, `updated_at`) VALUES
(2, 33, 'sekretaris', '2025-12-18', NULL, 'Menginput absensi harian jika dibutuhkan.', '2026-01-18 11:53:22', '2026-01-19 02:17:20'),
(3, 60, 'Bendahara', '2025-07-05', '2026-03-05', NULL, '2026-01-19 02:11:08', '2026-01-19 02:11:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2b5mrFmyT51o62FFqkZFJlOhu3oRpA0n6A8wXiCJ', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibFQxWnFQRENDYmQ2Uko0UWRLRlFQNXNQZkNzMEY0UmlHT1gyQ2FGaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1768880516),
('NgRqetgpudkFx2oLWkj12iD04ykKgl78CLlXESOc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaFhsblJYQzMxTXEwNXJ5ZU1IR1VqSGwwdUJVOWU0Nnk0bEFXQXhrMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYnNlbnNpIjtzOjU6InJvdXRlIjtzOjEzOiJhYnNlbnNpLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768882245),
('pImDtFlyGS1iPuBMjEgBSdMD1KZDrttRn4GCi46Z', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoic3dtTUlWMFJzNkJNbGwzMVVjdzdBVGl1VHlJS2FqQThBUDBTYnpHQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYnNlbnNpIjtzOjU6InJvdXRlIjtzOjEzOiJhYnNlbnNpLmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1768797877),
('snuQMXoIRilasmfX40MyaDtafL0E41Ot8Mbndowo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMVE2ZUgwSUFHRWNSaUZPcHVLSURvQmhXSzdxVVd1c2U4dmh3aWdURyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1768890238);

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `key` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `settings`
--

INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`) VALUES
('jam_masuk_batas', '07:00', '2026-01-18 02:47:40', '2026-01-18 02:47:40'),
('jurusan', 'RPL', '2026-01-18 02:47:40', '2026-01-18 02:47:40'),
('nama_kelas', 'XII RPL 3', '2026-01-18 02:47:40', '2026-01-19 02:17:44'),
('tahun_ajaran', '2025/2026', '2026-01-18 02:47:40', '2026-01-18 02:47:40'),
('tingkat', 'XII', '2026-01-18 02:47:40', '2026-01-18 12:00:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `wali_id` bigint UNSIGNED DEFAULT NULL,
  `nis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `wali_id`, `nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telepon`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, '8776546', 'Reza Ghiyats Fikri', 'L', 'Parisianville', '2010-03-09', '84705 Kuphal Gardens\r\nSouth Flaviebury, CA 14093', '080757092317', 1, '2026-01-18 02:47:43', '2026-01-19 02:53:17'),
(2, 5, '12204772', 'Raymundo Zieme', 'L', 'East Nayelihaven', '2008-01-29', '661 Giovanna Square Apt. 732\nWest Emersonview, ND 07826', '082328304284', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(3, 6, '12271711', 'Lorena Reinger', 'P', 'West Reidhaven', '2009-09-24', '70176 Simonis Shore\nHayesbury, CA 72017-3419', '080444136774', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(4, 4, '12395189', 'Marguerite Stracke', 'P', 'Reillychester', '2009-03-03', '613 Wendell Ford Suite 735\nEast Wilburnmouth, IN 15759-4377', '084874238351', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(5, 5, '0086131791', 'Chelsea Avril Salsabila Az-zahra', 'P', 'Bartolettiside', '2010-11-11', 'Jln,Temas Dsn.Gembongan Ds.Gembongan Wetan Kec.Gedeg Kab.Mojokerto', '087784545319', 1, '2026-01-18 02:47:43', '2026-01-18 12:40:36'),
(6, 14, '12674322', 'Zetta Schinner', 'P', 'Port Bret', '2008-09-10', '13472 Koepp Isle Suite 647\nSouth Mauricio, VT 54823', '083679004518', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(7, 13, '12065662', 'Prof. Chyna Zboncak', 'P', 'Haleyside', '2010-01-05', '4897 Howell Lights Apt. 724\nDamianchester, PA 21531-4640', '086711552823', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(8, 3, '12428882', 'Mckayla Littel', 'P', 'Odaberg', '2008-04-19', '9039 Arturo Garden Suite 990\nPort Thea, DC 80797', '085485082576', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(9, 4, '12347944', 'Jalen Cassin', 'L', 'DuBuquestad', '2009-04-29', '658 Dexter Wall Suite 404\nWest Edmondmouth, IA 78368-7492', '084715955901', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(10, 7, '12358433', 'Mrs. Antonette Stehr', 'P', 'Port Mortimer', '2010-03-20', '116 Prohaska Vista\nWest Madisyn, AK 30314-3185', '080812218509', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(11, 1, '12166906', 'Justus Deckow', 'L', 'Yazminville', '2009-04-21', '76865 Mitchell Burgs\nEast Trudie, WY 00178', '082235061788', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(12, 13, '0075871352', 'jsadkjhhdakhk', 'P', 'Pfannerstillshire', '2009-01-15', 'Blooto Mojokerto', '082762953082', 1, '2026-01-18 02:47:43', '2026-01-19 02:03:21'),
(13, 13, '12696559', 'Shanelle Tremblay', 'P', 'Hermanntown', '2009-05-18', '5788 Hermann Fords Suite 897\nNew Rebeka, TN 94366', '086593222593', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(14, 13, '12331452', 'Travis Harris', 'L', 'Port Rashadshire', '2008-04-06', '1311 Marian Isle\nPort Aliyahstad, GA 71075-2448', '087116421078', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(15, 15, '0081778107', 'Navilatus zahra', 'P', 'Hettiemouth', '2009-08-03', '91440 Simone Terrace Apt. 821\r\nNorth Larueberg, MT 15655', '080555229374', 1, '2026-01-18 02:47:43', '2026-01-19 02:19:36'),
(16, 3, '09937665463', 'Reza Ghiyats Fikri', 'L', 'East Hymanport', '2010-01-29', '28773 Madeline Center\r\nLake Effie, SD 14425', '083900819213', 1, '2026-01-18 02:47:43', '2026-01-19 02:52:44'),
(17, 5, '12181781', 'Eliane Muller', 'P', 'Swaniawskimouth', '2010-04-13', '9037 Lisandro Meadow Apt. 795\nGoodwinmouth, VT 89216', '083545945541', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(18, 7, '12284430', 'Russ Collins', 'L', 'West Eldridge', '2008-06-27', '320 Lucio Hill Apt. 582\nEast Rusty, HI 47955-1516', '083454794136', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(19, 11, '12349782', 'Prof. Nash Wisozk', 'L', 'North Eribertoborough', '2008-12-05', '69584 Akeem Canyon\nBotsfordside, VT 67431-8939', '080751219711', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(20, 4, '0075871351', 'Destiana Putri Natalia', 'P', 'North Brentfurt', '2009-01-10', '2210 Price Stravenue\r\nBrentfurt, WV 84637-7062', '083695323102', 1, '2026-01-18 02:47:43', '2026-01-19 02:04:40'),
(21, 2, '12986239', 'Muhammad Strosin', 'L', 'East Daisy', '2008-12-18', '5371 Reyes Plains Suite 617\nHughshire, WV 01598-6351', '083356740159', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(22, 7, '12569935', 'Mrs. Destiny Mann DVM', 'P', 'Jerrellton', '2009-06-19', '1399 Daniella Terrace Suite 654\nJohnsfort, MN 86913-1438', '082946611038', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(23, 8, '12084244', 'Miss Reanna Dare', 'P', 'South Geraldineville', '2011-01-12', '869 Zulauf Coves\nEast Alysaland, NV 57526', '080463953950', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(24, 3, '12168227', 'Janet D\'Amore', 'P', 'Aliyaside', '2009-10-18', '944 Powlowski Squares\nCristville, NY 74892', '087762018866', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(25, 8, '12135950', 'Miss Molly Brakus', 'P', 'Beahanfort', '2008-08-05', '158 Marshall Station\nHermanhaven, MA 07788', '080154760371', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(26, 10, '12458598', 'Sanford Heidenreich', 'L', 'South Chanelbury', '2010-04-05', '335 Crona Ways Apt. 297\nFletahaven, MS 40892-9643', '084383964794', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(27, 2, '12666184', 'Prof. Marquis Parker Sr.', 'L', 'Harberton', '2009-03-09', '2393 Beier Streets Apt. 875\nWest Alycia, FL 00160', '088349147990', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(28, 9, '12986933', 'Mrs. Emie Schmeler', 'P', 'New Annabellview', '2009-08-06', '8232 Jadyn Creek\nBuckridgefort, MI 04010', '085700062281', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(29, 13, '12977502', 'Prof. Isaias Homenick', 'L', 'South Ismael', '2008-06-03', '71600 Assunta Drive Suite 310\nWest Madeline, ME 36870', '087579560696', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(30, 3, '12585135', 'Wyatt Lakin', 'L', 'West Lillieport', '2009-07-31', '732 Kertzmann Views Suite 385\nSouth Carlistad, MN 25940', '087683021516', 1, '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(31, 19, '0088263000', 'Duta Pandu Pratama', 'L', 'Coleshire', '2009-10-08', '4353 Geovanny Track\r\nEast Lonnieview, KY 79820-9353', '088776429025', 1, '2026-01-18 11:53:22', '2026-01-19 02:07:21'),
(32, 30, '0079654954', 'MUHAMMAD ABDUL HAFIDH MISBAHUL MUNIR', 'L', 'Lakinberg', '2008-01-19', '98021 Hauck Ways\r\nLake Stewart, MD 76835-8070', '089059675760', 1, '2026-01-18 11:53:22', '2026-01-19 02:26:04'),
(33, 21, '0084079593', 'Bayu Setiawan', 'L', 'Koelpinport', '2008-05-30', '299 Cathryn Groves Apt. 584\r\nClementinamouth, IN 71442', '089632304545', 1, '2026-01-18 11:53:22', '2026-01-18 12:38:54'),
(34, 22, '3894279879', 'jdkjakskck', 'P', 'Waelchichester', '2010-08-15', '1795 Kunde Cliff\r\nWest Terrellfurt, WY 47872-0593', '084751373413', 1, '2026-01-18 11:53:22', '2026-01-19 02:07:02'),
(35, 21, '12169494', 'Prof. Brant Hodkiewicz I', 'L', 'North Charlie', '2008-03-19', '313 Diamond Hill\nHiltonbury, SC 97934-4164', '088119605070', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(36, 24, '12319691', 'Prof. Keshaun Kunze', 'L', 'Angusshire', '2008-05-04', '8313 Jeffrey Harbor\nNorth Lawrencemouth, OK 69627-8777', '089553205285', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(37, 20, '12535585', 'Ms. Maud Funk MD', 'P', 'Brodyborough', '2010-07-13', '842 Colten Trail\nHoldenmouth, WI 48297', '087123493356', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(38, 17, '12526574', 'Giovanni Glover', 'L', 'Lake Jacquelynshire', '2008-10-01', '760 Vernon Roads\nPeggietown, OH 24396', '084479004105', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(39, 28, '0083285364', 'Dinda Fitaloka', 'P', 'Powlowskiport', '2009-04-19', '894 Lakin Harbor\r\nArdellaborough, WV 65582-3818', '083632042229', 1, '2026-01-18 11:53:22', '2026-01-19 02:05:18'),
(40, 25, '0073901921', 'Arsya Rifqi Pramudya', 'L', 'Ignacioport', '2009-03-29', '385 Ericka Radial\r\nWest Laurynton, IN 30246-8522', '089818541879', 1, '2026-01-18 11:53:22', '2026-01-18 12:33:52'),
(41, 21, '12931898', 'Zelda Daugherty', 'P', 'Schoenmouth', '2008-07-27', '8142 Green Centers Suite 580\nNorth Saulfort, WI 02868', '088202450737', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(42, 21, '0073053503', 'Avisa Aswa Azzahra', 'P', 'North Leilanibury', '2009-07-29', 'Dsn.Pakis Ds.Pakis Kulon Trowulan Mojokerto', '089169286405', 1, '2026-01-18 11:53:22', '2026-01-18 12:38:07'),
(43, 20, '12681280', 'Lucius Nienow', 'L', 'Lake Linnie', '2009-02-28', '7339 Cronin Highway Suite 139\nLeorachester, NV 17895-3248', '086837000740', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(44, 26, '12016065', 'Rebeca Lueilwitz', 'P', 'Port Madaline', '2008-04-17', '7556 Carmela Haven Suite 280\nNorth Katlynnton, NE 99989-0994', '088933159413', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(45, 24, '12187091', 'Esmeralda Leannon DVM', 'P', 'Clementinemouth', '2009-07-13', '41174 Mertz Circle Apt. 008\nMullerview, CA 92882-0010', '083340184496', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(46, 20, '12135057', 'Prof. Alysson Nienow DVM', 'P', 'Marlonville', '2008-11-03', '63678 Julien Stravenue\nCreminton, NC 24710-6891', '089322918105', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(47, 19, '12121818', 'Prof. Conner Prosacco MD', 'L', 'Lake Elenora', '2008-05-27', '6326 Raymond Harbors\nDarehaven, MI 01327-0079', '084806561761', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(48, 23, '12054433', 'Nelda Effertz', 'P', 'South Katherinebury', '2009-11-23', '426 Sammy Crest Apt. 349\nSouth Jamal, VT 05624-7480', '081015067671', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(49, 23, '12942368', 'Test', 'P', 'Lake Gonzalo', '2009-03-19', '558 Walker Brook Apt. 534\r\nNorth Gregoryport, FL 16898', '083357390692', 1, '2026-01-18 11:53:22', '2026-01-19 02:55:38'),
(50, 24, '0074157472', 'Anis Eka Budianti', 'P', 'Wintheisershire', '2009-05-22', 'Ds.Cakarayam Prajurit kulon Kota Mojokerto', '082323943325', 1, '2026-01-18 11:53:22', '2026-01-19 02:09:35'),
(51, 16, '12838892', 'Felix Spinka', 'L', 'North Westley', '2008-12-14', '792 Thiel Forks\nEast Kyleighfurt, OH 47993-4281', '084843681636', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(52, 21, '0072456013', 'Akhmad Ardin Ariandillah', 'L', 'South Nyasia', '2009-07-16', 'Dsn.Pakis Ds.Pakis wetan Trowulan Mojokerto', '082561466361', 1, '2026-01-18 11:53:22', '2026-01-18 12:33:10'),
(53, 16, '0082397723', 'SHAFIRA AGUSTINA RAMADHANI', 'P', 'Leaburgh', '2010-05-26', '266 Heaney Via Apt. 117\r\nLake Trey, DC 61850', '084538407714', 1, '2026-01-18 11:53:22', '2026-01-19 02:27:03'),
(54, 17, '12605439', 'Melyssa Donnelly', 'P', 'East Carmella', '2009-07-26', '1993 Morar Forks\nStewartborough, NE 24629-1016', '087771968703', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(55, 24, '0075949356', 'Farel Bintang Pamungkas', 'L', 'South Alycia', '2010-03-18', '676 Hailey Fields Apt. 546\r\nStiedemannborough, NV 83881', '088016622708', 1, '2026-01-18 11:53:22', '2026-01-19 02:08:33'),
(56, 28, '12144771', 'Rosie Balistreri I', 'P', 'Lake Crawfordborough', '2010-08-07', '1974 Bashirian Lane Suite 945\nBeckerstad, SC 98780-0686', '080329786526', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(57, 27, '0088727558', 'Aditya Wahyu Habbibulloh', 'L', 'Marquardtfort', '2008-03-12', '943 Rutherford Square Suite 680\r\nAileenburgh, GA 10473', '088201044111', 1, '2026-01-18 11:53:22', '2026-01-18 12:28:12'),
(58, 16, '12708506', 'Micaela Klein', 'P', 'East Broderickfort', '2010-05-16', '6177 Hermann Forges\nEast Miastad, OR 93255-5017', '081494634364', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(59, 25, '12853309', 'Zoe Windler', 'P', 'Port Nanniemouth', '2010-04-11', '305 Rempel Dam Suite 753\nMurlshire, UT 50528-5671', '084132487575', 1, '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(60, 21, '0085257573', 'Adelia zahrotul arifah', 'P', 'Coleberg', '2009-12-31', '66963 Pagerluyung RT/01 RW/35 Gedeg Mojokerto', '081378893232', 1, '2026-01-18 11:53:22', '2026-01-18 12:26:20'),
(61, 3, '099320992', 'Reza Ghiyats Fikri', 'L', NULL, NULL, '28773 Madeline Center\r\nLake Effie, SD 14425', '083900819213', 1, '2026-01-19 02:35:09', '2026-01-19 02:35:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wali_kelas',
  `siswa_id` bigint UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `siswa_id`, `is_active`, `last_login_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wali Kelas', 'wali@demo.id', NULL, '$2y$12$UozcEJuQxyJyx6OFpwlkU.hmdF6VS7.BjLXvjqzoq81P4csrC788y', 'wali_kelas', NULL, 1, '2026-01-20 06:23:57', NULL, '2026-01-18 02:47:45', '2026-01-20 06:23:57'),
(2, 'Sekretaris Kelas', 'sekre@demo.id', NULL, '$2y$12$qP1e93RjbZGMW4hANiZ2geuSWFL351OwUwX5XS2r.4oASU1TNF6EO', 'sekretaris', 21, 1, '2026-01-20 03:47:16', NULL, '2026-01-18 02:47:45', '2026-01-20 03:47:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali`
--

CREATE TABLE `wali` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wali`
--

INSERT INTO `wali` (`id`, `nama`, `telepon`, `email`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Xander Ward', '088397552262', 'jdooley@example.com', '52542 Sonia Crest Apt. 753\nPort Lucilemouth, MS 19333', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(2, 'Vinnie Kuphal', '085387881311', 'melany68@example.com', '271 Randi Coves Apt. 677\nSouth Ahmad, NM 12556', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(3, 'Nettie McKenzie', '089043206689', 'sthompson@example.com', '57876 Casimer Stream Suite 131\nFeilmouth, VA 41887-5228', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(4, 'Ida Kautzer', '089698866618', 'lwehner@example.net', '871 Doyle Islands\nBeierborough, WA 55266', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(5, 'Dr. Rocio Monahan V', '083550033361', 'aniya.lueilwitz@example.com', '93011 Deckow Station\nKesslerland, MN 10576-9875', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(6, 'Joana Champlin', '089452911124', 'chanel29@example.org', '202 Nitzsche Point\nNorth Novella, ND 69153', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(7, 'Dr. Berneice Jacobson V', '083337276812', 'kariane28@example.com', '334 Nolan Brooks Suite 380\nJacobiville, UT 36520', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(8, 'Preston Herman', '089523256361', 'hoeger.connor@example.net', '5661 Wunsch Grove\nVerliehaven, NV 34233-1462', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(9, 'Austen Blanda', '087919121470', 'padberg.coy@example.net', '803 Marlen Manor Apt. 862\nPort Kamryn, NM 12475-7637', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(10, 'Tony Hintz', '087134273772', 'eveline87@example.org', '9661 Myriam Mall\nLake Sven, LA 58953', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(11, 'Ms. Deborah Wintheiser Sr.', '083867883131', 'jude94@example.org', '342 Funk Lodge\nLydiamouth, NY 04684-6455', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(12, 'Mr. Tanner Dicki Sr.', '085622892955', 'tad.bechtelar@example.com', '70790 Emie Center\nSouth Rick, VT 97136-9486', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(13, 'Conrad Fay', '086654369027', 'wilhelm27@example.com', '64894 Connelly Island\nMichelebury, LA 07524', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(14, 'Palma Bashirian', '088728590957', 'jerrell69@example.net', '7636 Tremblay Summit\nReingerview, AL 56176', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(15, 'Coralie Kuhlman', '080077231716', 'huel.jammie@example.org', '449 Becker Falls Apt. 320\nOlafchester, NY 68641-8042', '2026-01-18 02:47:43', '2026-01-18 02:47:43'),
(16, 'Isadore Brakus', '082906480715', 'pschuster@example.com', '6215 Stroman Plains\nLake Kaitlintown, CO 81245', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(17, 'Colleen Denesik', '089287221003', 'daniela73@example.com', '6869 Hayes Spurs Apt. 502\nPort Bartland, WY 42717', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(18, 'Prof. Kathryn Klein', '085133413865', 'walsh.winfield@example.org', '3852 Pacocha Roads\nRhiannaville, WA 35544', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(19, 'Syble Gleason', '081371512547', 'amani05@example.net', '31801 Gerhold Turnpike\nJocelynfurt, GA 00295-8013', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(20, 'Henri Armstrong', '089403656956', 'ccollier@example.com', '1531 Osinski Curve Apt. 101\nRaynorton, AR 76576-2923', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(21, 'Susanna Erdman I', '083958323342', 'kendrick.pollich@example.org', '8687 Reinger Spurs Apt. 597\nKemmermouth, CA 95386', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(22, 'Ms. Britney Gorczany MD', '080354435602', 'gbogan@example.net', '6775 Howell Underpass\nWest Carlee, AZ 43827', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(23, 'Lawson Botsford', '080572768699', 'jaylan06@example.org', '35560 Sandra Loop Apt. 618\nCandidaville, MI 19847-8480', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(24, 'Dr. Lamont Gleason', '089014203061', 'hazle40@example.net', '7144 Mueller Meadow Suite 478\nNew Codyview, IA 64200-6748', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(25, 'Alison Renner', '085483873945', 'murray38@example.net', '996 Medhurst Well\nGenesisburgh, UT 81556-9219', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(26, 'Mr. Lew Medhurst', '089292238136', 'xavier92@example.org', '1486 Jasen Circles Apt. 071\nWest Coralieton, ND 98180', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(27, 'Hiram Nitzsche MD', '089953744265', 'hintz.roberta@example.org', '575 Thea Rue Suite 143\nNew Marilouville, IN 12606', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(28, 'Mabelle O\'Keefe', '080140045677', 'witting.chaim@example.org', '4072 Euna Junction\nImogenefurt, AK 48852-9880', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(29, 'Dr. Santina McGlynn V', '086596380053', 'bkoch@example.net', '4662 Lemke Prairie\nEast Savannah, RI 53178', '2026-01-18 11:53:22', '2026-01-18 11:53:22'),
(30, 'Miss Nelle Pfeffer DDS', '088475369101', 'lucy74@example.org', '98771 Celestine Junctions\nBarbarafort, VT 37021-1279', '2026-01-18 11:53:22', '2026-01-18 11:53:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_harian`
--
ALTER TABLE `absensi_harian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `absensi_harian_siswa_id_tanggal_unique` (`siswa_id`,`tanggal`),
  ADD KEY `absensi_harian_dicatat_oleh_foreign` (`dicatat_oleh`),
  ADD KEY `absensi_harian_finalized_by_foreign` (`finalized_by`),
  ADD KEY `absensi_harian_tanggal_status_index` (`tanggal`,`status`),
  ADD KEY `absensi_harian_closed_by_foreign` (`closed_by`),
  ADD KEY `absensi_harian_closed_at_index` (`closed_at`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengurus_kelas`
--
ALTER TABLE `pengurus_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengurus_kelas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pengurus_kelas_jabatan_periode_awal_index` (`jabatan`,`periode_awal`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_wali_id_foreign` (`wali_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_siswa_id_unique` (`siswa_id`),
  ADD KEY `users_role_index` (`role`);

--
-- Indeks untuk tabel `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_harian`
--
ALTER TABLE `absensi_harian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengurus_kelas`
--
ALTER TABLE `pengurus_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `wali`
--
ALTER TABLE `wali`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_harian`
--
ALTER TABLE `absensi_harian`
  ADD CONSTRAINT `absensi_harian_closed_by_foreign` FOREIGN KEY (`closed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `absensi_harian_dicatat_oleh_foreign` FOREIGN KEY (`dicatat_oleh`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_harian_finalized_by_foreign` FOREIGN KEY (`finalized_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `absensi_harian_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengurus_kelas`
--
ALTER TABLE `pengurus_kelas`
  ADD CONSTRAINT `pengurus_kelas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_wali_id_foreign` FOREIGN KEY (`wali_id`) REFERENCES `wali` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
