/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `proveedors`;
CREATE TABLE `proveedors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_persona` varchar(255) NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastnameP` varchar(255) NOT NULL,
  `lastnameM` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_persona` varchar(255) NOT NULL,
  `proveedors_id` bigint(20) unsigned NOT NULL,
  `area` varchar(255) NOT NULL,
  `motivo_visita` varchar(255) NOT NULL,
  `fecha_visita` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `visitas_proveedors_id_foreign` (`proveedors_id`),
  CONSTRAINT `visitas_proveedors_id_foreign` FOREIGN KEY (`proveedors_id`) REFERENCES `proveedors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `proveedors` (`id`, `created_at`, `updated_at`, `name_persona`, `name_company`, `type`, `state`) VALUES
(1, '2024-11-23 06:58:30', '2024-11-24 02:20:23', 'Donna Hays2', 'Wyatt and Wynn Inc2', 'computacion', 2);
INSERT INTO `proveedors` (`id`, `created_at`, `updated_at`, `name_persona`, `name_company`, `type`, `state`) VALUES
(2, '2024-12-02 23:17:25', '2024-12-02 23:17:25', 'RESPONSABLE NUEVO', 'PROVEEDOR NUEVO', 'compras', 1);


INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8RjxHpfYSgHQkPgux94ThneuxwVdtioG8D9vUOuV', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMU1pcm9lWnNDS2hWeW55WHVMaVhnR3RGVlVBdWFKUG5NUVdJNnYwdCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMToiaHR0cDovL2xvY2FsaG9zdC9hZG1pbmlzdHJhY2lvbiI7fX0=', 1733182660);


INSERT INTO `users` (`id`, `name`, `username`, `lastnameP`, `lastnameM`, `type`, `puesto`, `company`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Odessa Delgado2', 'jafisuni2', 'Mullins2', 'Shaffer2', 2, 'DUDA', 'Hatfield Knowles Associates2', 'lage@mailinator.com2', NULL, '$2y$12$ksdt6ZSi85dPBoRDMezbROy2ZVtda7Clz8wgY83GEsVmxzLLUmb7O', NULL, '2024-11-23 07:20:57', '2024-11-24 05:44:31');
INSERT INTO `users` (`id`, `name`, `username`, `lastnameP`, `lastnameM`, `type`, `puesto`, `company`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Luis Alberto2', 'luisvilla2', 'Jimenez2', 'Villa2', 1, 'DUDA', 'DST DISEÑADORES2', 'luisjivl.01@gmail.com22', NULL, '$2y$12$ZTPai7djGbpXE43pxqGJ2Opak1Wtxz3b9XDBTK/6K6pjnTRrmtYeC', NULL, '2024-11-23 18:36:30', '2024-11-24 02:55:55');
INSERT INTO `users` (`id`, `name`, `username`, `lastnameP`, `lastnameM`, `type`, `puesto`, `company`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Andrew', 'hopib', 'Petty', 'Klein', 1, 'DUDA', 'Long and Mcconnell Trading', 'matec@mailinator.com', NULL, '$2y$12$BSzXgjgB/5gVjj4iJZR5ZeH39fCH33d7E9Ns1XJlAz3PgpCqPeQOO', NULL, '2024-11-24 01:39:12', '2024-11-24 01:39:12');
INSERT INTO `users` (`id`, `name`, `username`, `lastnameP`, `lastnameM`, `type`, `puesto`, `company`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Bert Norton', 'cacusafy', 'Pruitt', 'Hayden', 1, 'DUDA', 'Powell Shaffer Plc', 'rohumowuly@mailinator.com', NULL, '$2y$12$n.5efI5QSbmK0pIEGGHZROaDSwnMkPgX6iDdzYIGBbsTJlfxyveRW', NULL, '2024-11-24 02:16:08', '2024-11-24 02:16:08'),
(5, 'Martha Peterson2', 'sofefova2', 'Kinney2', 'Small2', 1, 'DUDA', 'Parker and Santiago LLC2', 'maryzijy@mailinator.com2', NULL, '$2y$12$yhh1.qpTVn.XIUS0tWyMre8oXwuCdrxQuXXoJVluepFEjbZRUD3bW', NULL, '2024-11-24 02:48:10', '2024-11-24 02:48:42'),
(6, 'Nuevo', 'Nuevo', 'Nuevo', 'Nuevo', 1, 'DUDA', 'Nuevo', 'Nuevo@gmail.com', NULL, '$2y$12$WC90rBT0ClhBjnhkNjPz/ug4W8abVhAzUV/IuHRlqW2UsEE2zFmJu', NULL, '2024-11-24 03:26:38', '2024-11-24 03:26:38'),
(7, 'Dillon Ray', 'luisvilla2312', 'Langley', 'Davidson', 2, 'DUDA', 'Lawrence Dudley LLC', 'bixeqowy@mailinator.com', NULL, '$2y$12$ym/qnPfoMUeHYAsalZyvT.EkBlZtjqCdR5do.OKMIveQACeDMOpeG', NULL, '2024-11-24 05:56:34', '2024-11-24 05:56:34'),
(8, 'Administrador', 'admin', 'admin', 'admin', 1, 'DUDA', 'admin', 'admin@gmail.com', NULL, '$2y$12$ym/qnPfoMUeHYAsalZyvT.EkBlZtjqCdR5do.OKMIveQACeDMOpeG', NULL, '2024-11-24 05:56:34', '2024-11-24 05:56:34'),
(9, 'Usuario', 'usuario', 'usuario', 'usuario', 2, 'DUDA', 'usuario', 'usuario@gmail.com', NULL, '$2y$12$ym/qnPfoMUeHYAsalZyvT.EkBlZtjqCdR5do.OKMIveQACeDMOpeG', NULL, '2024-11-24 05:56:34', '2024-11-24 05:56:34');

INSERT INTO `visitas` (`id`, `created_at`, `updated_at`, `name_persona`, `proveedors_id`, `area`, `motivo_visita`, `fecha_visita`, `hora_entrada`, `hora_salida`, `comentarios`, `state`) VALUES
(1, '2024-11-23 07:13:39', '2024-11-23 07:14:29', 'Carlos Gonzales', 1, 'ventas', 'Asunto de trabajo', '2024-12-02', '11:38:00', '16:30:02', 'Ninguno', 1);
INSERT INTO `visitas` (`id`, `created_at`, `updated_at`, `name_persona`, `proveedors_id`, `area`, `motivo_visita`, `fecha_visita`, `hora_entrada`, `hora_salida`, `comentarios`, `state`) VALUES
(2, '2024-11-24 02:21:12', '2024-11-24 02:21:22', 'Cruz Gill', 1, 'ventas', 'Asunto personal', '2024-12-02', '13:11:00', '16:00:00', 'Hola', 1);
INSERT INTO `visitas` (`id`, `created_at`, `updated_at`, `name_persona`, `proveedors_id`, `area`, `motivo_visita`, `fecha_visita`, `hora_entrada`, `hora_salida`, `comentarios`, `state`) VALUES
(3, '2024-11-24 06:06:13', '2024-12-02 23:19:11', 'Axel Lloyd', 1, 'compras', 'Asunto de trabajo', '2024-12-02', '14:02:00', '18:35:00', '111', 1);
INSERT INTO `visitas` (`id`, `created_at`, `updated_at`, `name_persona`, `proveedors_id`, `area`, `motivo_visita`, `fecha_visita`, `hora_entrada`, `hora_salida`, `comentarios`, `state`) VALUES
(4, '2024-12-02 23:18:01', '2024-12-02 23:20:18', 'Ricardo villa', 2, 'compras', 'Recoger equipo', '2024-12-02', '17:17:00', '17:20:00', 'asd', 1),
(5, '2024-12-02 23:20:05', '2024-12-02 23:20:05', 'Honorato Camacho', 1, 'ventas', 'Asunto de tramites', '2024-12-01', '06:47:00', '11:00:00', 'Sin comentarios', 1),
(6, '2024-12-02 23:24:14', '2024-12-02 23:24:27', 'Raul Alberto', 1, 'compras', 'Asunto de seguridad', '2024-12-02', '17:23:00', '18:24:00', NULL, 1),
(7, '2024-12-02 23:28:37', '2024-12-02 23:28:37', 'Colorado Mayo', 1, 'compras', 'Asunto personal', '2024-12-01', '09:23:00', '10:00:00', 'Sin comentarios', 1),
(8, '2024-12-02 23:35:28', '2024-12-02 23:35:35', 'Maria Angeles', 2, 'computacion', 'Recoger Equipo de computo', '2024-12-02', '17:35:00', '17:35:00', NULL, 1);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;