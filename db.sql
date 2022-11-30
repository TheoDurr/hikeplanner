-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour hikeplanner
CREATE DATABASE IF NOT EXISTS `hikeplanner` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `hikeplanner`;

-- Listage de la structure de la table hikeplanner. activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_id` bigint(20) unsigned NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `difficulty_id` bigint(20) unsigned NOT NULL,
  `weather_id` bigint(20) unsigned NOT NULL,
  `start_date` timestamp NOT NULL,
  `finish_date` timestamp NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` decimal(3,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_user_uuid_foreign` (`user_uuid`),
  KEY `activities_path_id_foreign` (`path_id`),
  KEY `activities_type_id_foreign` (`type_id`),
  KEY `activities_difficulty_id_foreign` (`difficulty_id`),
  KEY `activities_weather_id_foreign` (`weather_id`),
  CONSTRAINT `activities_difficulty_id_foreign` FOREIGN KEY (`difficulty_id`) REFERENCES `difficulty` (`id`),
  CONSTRAINT `activities_path_id_foreign` FOREIGN KEY (`path_id`) REFERENCES `paths` (`id`),
  CONSTRAINT `activities_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `activity_type` (`id`),
  CONSTRAINT `activities_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`),
  CONSTRAINT `activities_weather_id_foreign` FOREIGN KEY (`weather_id`) REFERENCES `weather` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.activities : ~5 rows (environ)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` (`id`, `user_uuid`, `path_id`, `type_id`, `difficulty_id`, `weather_id`, `start_date`, `finish_date`, `description`, `temperature`, `created_at`, `updated_at`) VALUES
	(2, '978b57d8-f7fc-43c1-92ac-3950f90554b7', 3, 1, 2, 2, '2022-11-30 18:08:33', '2022-11-30 19:08:33', 'Petite balade sympa', 21.0, '2022-11-30 19:08:43', '2022-11-30 19:08:43'),
	(3, '978b57d8-f7fc-43c1-92ac-3950f90554b7', 5, 3, 3, 1, '2022-11-19 16:56:58', '2022-11-19 19:10:58', 'Le vélo c\'était durr', 20.0, '2022-11-30 22:58:07', '2022-11-30 22:58:07'),
	(4, '978b57d8-f7fc-43c1-92ac-3950f90554b7', 8, 2, 3, 3, '2022-11-01 06:58:10', '2022-11-01 08:58:10', 'Pas très éveillé', 3.0, '2022-11-30 22:59:04', '2022-11-30 22:59:04'),
	(5, '978b57d8-f7fc-43c1-92ac-3950f90554b7', 9, 2, 1, 2, '2022-09-03 15:00:18', '2022-09-03 16:34:07', '', 15.0, '2022-11-30 23:01:12', '2022-11-30 23:01:12'),
	(6, '978b57d8-f7fc-43c1-92ac-3950f90554b7', 10, 3, 1, 4, '2022-10-16 10:01:24', '2022-10-16 11:30:24', 'Je roule sur les passants haha', 12.0, '2022-11-30 23:02:25', '2022-11-30 23:02:25');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. activity_performance
CREATE TABLE IF NOT EXISTS `activity_performance` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` bigint(20) unsigned NOT NULL,
  `waypoint_id` bigint(20) unsigned NOT NULL,
  `reach_date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_performance_activity_id_foreign` (`activity_id`),
  KEY `activity_performance_waypoint_id_foreign` (`waypoint_id`),
  CONSTRAINT `activity_performance_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`),
  CONSTRAINT `activity_performance_waypoint_id_foreign` FOREIGN KEY (`waypoint_id`) REFERENCES `waypoints` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.activity_performance : ~0 rows (environ)
/*!40000 ALTER TABLE `activity_performance` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_performance` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. activity_type
CREATE TABLE IF NOT EXISTS `activity_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.activity_type : ~2 rows (environ)
/*!40000 ALTER TABLE `activity_type` DISABLE KEYS */;
INSERT INTO `activity_type` (`id`, `label`) VALUES
	(1, 'Running'),
	(2, 'Walking'),
	(3, 'Biking');
/*!40000 ALTER TABLE `activity_type` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. difficulty
CREATE TABLE IF NOT EXISTS `difficulty` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.difficulty : ~4 rows (environ)
/*!40000 ALTER TABLE `difficulty` DISABLE KEYS */;
INSERT INTO `difficulty` (`id`, `label`) VALUES
	(1, 'Easy'),
	(2, 'Medium'),
	(3, 'Hard');
/*!40000 ALTER TABLE `difficulty` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.failed_jobs : ~0 rows (environ)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. follows
CREATE TABLE IF NOT EXISTS `follows` (
  `follower` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `following` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  UNIQUE KEY `follows_follower_following_unique` (`follower`,`following`),
  KEY `follows_following_foreign` (`following`),
  CONSTRAINT `follows_follower_foreign` FOREIGN KEY (`follower`) REFERENCES `users` (`uuid`),
  CONSTRAINT `follows_following_foreign` FOREIGN KEY (`following`) REFERENCES `users` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.follows : ~0 rows (environ)
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. level
CREATE TABLE IF NOT EXISTS `level` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.level : ~0 rows (environ)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.migrations : ~14 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2019_08_19_000000_create_failed_jobs_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2022_10_13_145503_create_level', 1),
	(4, '2022_10_13_145647_create_users', 1),
	(5, '2022_10_16_202600_create_paths', 1),
	(6, '2022_10_16_205918_create_weather', 1),
	(7, '2022_10_16_205931_create_difficulty', 1),
	(8, '2022_10_16_205945_create_activity_type', 1),
	(9, '2022_10_16_210009_create_waypoints', 1),
	(10, '2022_10_16_210012_create_activities', 1),
	(11, '2022_10_16_210024_create_activity_performance', 1),
	(12, '2022_10_19_071006_create_password_resets', 1),
	(13, '2022_11_10_090634_update_user_table', 2),
	(14, '2022_11_16_084306_create_follow_system', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.password_resets : ~0 rows (environ)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. paths
CREATE TABLE IF NOT EXISTS `paths` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_uuid` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paths_user_uuid_foreign` (`user_uuid`),
  CONSTRAINT `paths_user_uuid_foreign` FOREIGN KEY (`user_uuid`) REFERENCES `users` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.paths : ~8 rows (environ)
/*!40000 ALTER TABLE `paths` DISABLE KEYS */;
INSERT INTO `paths` (`id`, `label`, `user_uuid`, `created_at`, `updated_at`) VALUES
	(2, 'Super trajet', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-17 15:15:04', '2022-11-30 22:56:17'),
	(3, 'Le chemin', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-17 16:55:15', '2022-11-17 16:55:15'),
	(4, 'Coucou les gars', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-23 08:14:01', '2022-11-23 08:14:01'),
	(5, 'Le samedi avec les copains', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-23 08:21:24', '2022-11-30 22:56:03'),
	(6, 'Tout petit chemin', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 14:53:32', '2022-11-24 14:53:32'),
	(7, 'Petit chemin 2', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 15:03:48', '2022-11-24 15:03:48'),
	(8, 'balade', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 15:05:26', '2022-11-30 22:55:45'),
	(9, 'belfort tous les jours', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 15:10:35', '2022-11-30 22:55:20'),
	(10, 'le marché', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 15:10:53', '2022-11-30 22:55:09'),
	(11, 'trajet du dimanche', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-24 15:40:57', '2022-11-30 22:54:58'),
	(12, 'trajet 1', '978b57d8-f7fc-43c1-92ac-3950f90554b7', '2022-11-26 19:33:57', '2022-11-30 22:54:46');
/*!40000 ALTER TABLE `paths` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.personal_access_tokens : ~0 rows (environ)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. users
CREATE TABLE IF NOT EXISTS `users` (
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `weight` smallint(5) unsigned DEFAULT NULL,
  `height` smallint(5) unsigned DEFAULT NULL,
  `max_heart_rate` smallint(5) unsigned DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `level_id` bigint(20) unsigned DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uuid`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_level_id_foreign` (`level_id`),
  CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.users : ~3 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uuid`, `username`, `password`, `firstname`, `lastname`, `email`, `email_verified_at`, `weight`, `height`, `max_heart_rate`, `birthdate`, `level_id`, `remember_token`, `created_at`, `updated_at`, `isAdmin`) VALUES
	('978b57d8-f7fc-43c1-92ac-3950f90554b7', 'simon', '$2y$10$c0FiVR/tMpFf/d/P1toF6epFYgMMPAPy5PqgfabQzOiMS.RGR.Loy', 'simon', 'eveillé', 'eveillesimon@gmail.com', '2022-10-20 14:13:05', NULL, NULL, NULL, '2002-05-08', NULL, 'jwhokEeus1dqhxFm20Zxlbw4HxJIKI3JEZOJQjyc9I5HE4B0wJW96Yzua4f7', '2022-10-20 08:28:20', '2022-11-30 23:06:31', 1),
	('978b5e48-1a91-4ff6-b5c0-cb0314bdd7ac', 'julien', '$2y$10$/IYSTBPZxjpNFY.09OOuv.u/vGzpJ7pA.ishEVeTTzJFgNczUmM.2', 'julien', '', 'test.test@test.test', '2022-10-20 08:46:38', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-20 08:46:20', '2022-11-30 22:48:22', 0),
	('978c0143-d46d-4084-b656-c1ab30c8881f', 'pierre', '$2y$10$lG95wYKDDq8MgvqTW6/I0us3mmpK9DJSOJ4K0sRMD.iz.rsOVvAXi', 'pierre', '', 'pierre@pierre.caillou', '2022-10-20 16:28:49', NULL, NULL, NULL, NULL, NULL, NULL, '2022-10-20 16:22:04', '2022-11-30 22:48:51', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. waypoints
CREATE TABLE IF NOT EXISTS `waypoints` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path_id` bigint(20) unsigned NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `index` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `waypoints_path_id_foreign` (`path_id`),
  CONSTRAINT `waypoints_path_id_foreign` FOREIGN KEY (`path_id`) REFERENCES `paths` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.waypoints : ~16 rows (environ)
/*!40000 ALTER TABLE `waypoints` DISABLE KEYS */;
INSERT INTO `waypoints` (`id`, `path_id`, `latitude`, `longitude`, `index`) VALUES
	(1, 3, 47.637800, 47.637800, 0),
	(2, 3, 47.643565, 47.643565, 1),
	(3, 3, 47.638336, 47.638336, 2),
	(4, 3, 47.642600, 47.642600, 3),
	(5, 6, 47.638848, 47.638848, 0),
	(6, 6, 47.635905, 47.635905, 1),
	(7, 7, 47.638306, 47.638306, 0),
	(8, 7, 47.638315, 47.638315, 1),
	(9, 7, 47.637061, 47.637061, 2),
	(35, 11, 47.646475, 6.855726, 0),
	(36, 11, 47.642959, 6.852585, 1),
	(37, 11, 47.638928, 6.847178, 2),
	(38, 11, 47.642600, 6.844000, 3),
	(42, 12, 47.642430, 6.863322, 0),
	(43, 12, 47.642762, 6.841075, 1),
	(44, 12, 47.645322, 6.843925, 2);
/*!40000 ALTER TABLE `waypoints` ENABLE KEYS */;

-- Listage de la structure de la table hikeplanner. weather
CREATE TABLE IF NOT EXISTS `weather` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table hikeplanner.weather : ~4 rows (environ)
/*!40000 ALTER TABLE `weather` DISABLE KEYS */;
INSERT INTO `weather` (`id`, `label`) VALUES
	(1, 'Sun'),
	(2, 'Clouds'),
	(3, 'Fog'),
	(4, 'Rain');
/*!40000 ALTER TABLE `weather` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
