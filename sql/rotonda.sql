-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para rotonda
DROP DATABASE IF EXISTS `rotonda`;
CREATE DATABASE IF NOT EXISTS `rotonda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rotonda`;

-- Volcando estructura para tabla rotonda.categoria_platos
DROP TABLE IF EXISTS `categoria_platos`;
CREATE TABLE IF NOT EXISTS `categoria_platos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.categoria_platos: ~7 rows (aproximadamente)
DELETE FROM `categoria_platos`;
/*!40000 ALTER TABLE `categoria_platos` DISABLE KEYS */;
INSERT INTO `categoria_platos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Plato fuerte', 'Descripción plato fuerte', '2020-03-14 23:51:55', '2020-03-14 23:51:55'),
	(2, 'Bebida', 'Descripcion Bebida', '2020-03-14 23:52:07', '2020-03-14 23:52:07'),
	(3, 'Sopa', 'Descripcion Sopa', '2020-03-14 23:52:21', '2020-03-14 23:52:21'),
	(4, 'Comida Rapida', 'Descripcion comida rapida', '2020-03-14 23:52:46', '2020-03-14 23:52:46'),
	(5, 'Postre', 'Descripcion postre', '2020-03-14 23:53:06', '2020-03-14 23:53:06'),
	(6, 'Entrada', 'Descripcion entrada', '2020-03-14 23:53:17', '2020-03-14 23:53:17'),
	(7, 'Otros', 'Descripcion otros', '2020-03-14 23:53:58', '2020-03-14 23:53:58');
/*!40000 ALTER TABLE `categoria_platos` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.detalle_pedidos
DROP TABLE IF EXISTS `detalle_pedidos`;
CREATE TABLE IF NOT EXISTS `detalle_pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_pedido` bigint(20) unsigned NOT NULL,
  `id_plato` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_pedidos_id_pedido_foreign` (`id_pedido`),
  KEY `detalle_pedidos_id_plato_foreign` (`id_plato`),
  CONSTRAINT `detalle_pedidos_id_pedido_foreign` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_pedidos_id_plato_foreign` FOREIGN KEY (`id_plato`) REFERENCES `platos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.detalle_pedidos: ~0 rows (aproximadamente)
DELETE FROM `detalle_pedidos`;
/*!40000 ALTER TABLE `detalle_pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.ingredientes
DROP TABLE IF EXISTS `ingredientes`;
CREATE TABLE IF NOT EXISTS `ingredientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.ingredientes: ~11 rows (aproximadamente)
DELETE FROM `ingredientes`;
/*!40000 ALTER TABLE `ingredientes` DISABLE KEYS */;
INSERT INTO `ingredientes` (`id`, `nombre`, `descripcion`, `precio`, `created_at`, `updated_at`) VALUES
	(1, 'carne', 'Descripcion carne', 2000, '2020-03-14 23:50:22', '2020-03-14 23:50:22'),
	(2, 'pan', 'Descripcion pan', 200, '2020-03-14 23:59:36', '2020-03-14 23:59:36'),
	(3, 'cebolla', 'Descripcion cebolla', 2000, '2020-03-14 23:59:50', '2020-03-14 23:59:50'),
	(4, 'limon', 'Descripcion Limon', 600, '2020-03-15 00:00:11', '2020-03-15 00:00:11'),
	(5, 'queso', 'Descripcion queso', 2000, '2020-03-15 00:00:25', '2020-03-15 00:00:25'),
	(6, 'tomate', 'Descripcion Tomate', 200, '2020-03-15 00:00:54', '2020-03-15 00:00:54'),
	(7, 'Agua', 'Descripción agua', 100, '2020-03-15 00:01:09', '2020-03-15 00:01:09'),
	(8, 'Azucar', 'Descripcion Azucar', 2000, '2020-03-15 00:01:26', '2020-03-15 00:01:26'),
	(9, 'Sal', 'Descripcion sal', 3000, '2020-03-15 00:01:35', '2020-03-15 00:01:35'),
	(10, 'Huevo', 'Descripcion Huevos', 300, '2020-03-15 00:01:57', '2020-03-15 00:01:57'),
	(11, 'Leche', 'Descripcion Leche', 2000, '2020-03-15 00:02:16', '2020-03-15 00:02:16');
/*!40000 ALTER TABLE `ingredientes` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.migrations: ~24 rows (aproximadamente)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(75, '2020_03_12_013039_create_restaurantes_table', 1),
	(76, '2020_03_12_013220_create_platos_table', 1),
	(77, '2020_03_12_013250_create_categoria_platos_table', 1),
	(78, '2020_03_12_013308_create_pedidos_table', 1),
	(79, '2020_03_12_013330_create_detalle_pedidos_table', 1),
	(80, '2020_03_12_013412_create_recetas_table', 1),
	(81, '2020_03_12_013430_create_ingredientes_table', 1),
	(82, '2020_03_12_013454_create_personas_table', 1),
	(83, '2020_03_12_013508_create_rols_table', 1),
	(84, '2020_03_12_015657_create_recetas_ingredientes_table', 1),
	(121, '2014_10_12_000000_create_users_table', 2),
	(122, '2014_10_12_100000_create_password_resets_table', 2),
	(123, '2019_08_19_000000_create_failed_jobs_table', 2),
	(124, '2020_03_09_040421_create_notas_table', 2),
	(125, '2020_03_14_175933_create_recetas_table', 2),
	(126, '2020_03_14_175951_create_rols_table', 2),
	(127, '2020_03_14_180016_create_categoria_platos_table', 2),
	(128, '2020_03_14_180037_create_restaurantes_table', 2),
	(129, '2020_03_14_180059_create_ingredientes_table', 2),
	(130, '2020_03_14_180113_create_platos_table', 2),
	(131, '2020_03_14_180125_create_personas_table', 2),
	(132, '2020_03_14_180151_create_pedidos_table', 2),
	(133, '2020_03_14_180436_create_detalle_pedidos_table', 2),
	(134, '2020_03_14_181444_create_recetas_ingredientes_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.notas
DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.notas: ~0 rows (aproximadamente)
DELETE FROM `notas`;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.pedidos
DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_persona` bigint(20) unsigned NOT NULL,
  `precio_neto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_id_persona_foreign` (`id_persona`),
  CONSTRAINT `pedidos_id_persona_foreign` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.pedidos: ~0 rows (aproximadamente)
DELETE FROM `pedidos`;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.personas
DROP TABLE IF EXISTS `personas`;
CREATE TABLE IF NOT EXISTS `personas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rol` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `personas_id_rol_foreign` (`id_rol`),
  CONSTRAINT `personas_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `rols` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.personas: ~0 rows (aproximadamente)
DELETE FROM `personas`;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.platos
DROP TABLE IF EXISTS `platos`;
CREATE TABLE IF NOT EXISTS `platos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` bigint(20) unsigned NOT NULL,
  `receta` bigint(20) unsigned NOT NULL,
  `restaurante` bigint(20) unsigned NOT NULL,
  `precio` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `platos_categoria_foreign` (`categoria`),
  KEY `platos_receta_foreign` (`receta`),
  KEY `platos_restaurante_foreign` (`restaurante`),
  CONSTRAINT `platos_categoria_foreign` FOREIGN KEY (`categoria`) REFERENCES `categoria_platos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `platos_receta_foreign` FOREIGN KEY (`receta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `platos_restaurante_foreign` FOREIGN KEY (`restaurante`) REFERENCES `restaurantes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.platos: ~3 rows (aproximadamente)
DELETE FROM `platos`;
/*!40000 ALTER TABLE `platos` DISABLE KEYS */;
INSERT INTO `platos` (`id`, `nombre`, `descripcion`, `categoria`, `receta`, `restaurante`, `precio`, `created_at`, `updated_at`) VALUES
	(1, 'Hamburguesa', 'Descripcion hamburguesa', 4, 4, 1, 6000, '2020-03-15 00:02:49', '2020-03-15 00:02:49'),
	(2, 'Sopa de Mondongo', 'Descripcion sopa de mondongo', 3, 3, 4, 2000, '2020-03-15 00:03:27', '2020-03-15 00:03:27'),
	(3, 'Jugo de limon', 'Jugo de limon', 2, 5, 3, 3000, '2020-03-15 00:03:58', '2020-03-15 00:03:58');
/*!40000 ALTER TABLE `platos` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.recetas
DROP TABLE IF EXISTS `recetas`;
CREATE TABLE IF NOT EXISTS `recetas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.recetas: ~4 rows (aproximadamente)
DELETE FROM `recetas`;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
	(2, 'Postre de maracuya', 'Descripcion postre de maracuya', '2020-03-14 23:57:23', '2020-03-14 23:57:23'),
	(3, 'Sopa de Mondongo de la casa', 'Descripcion sopa de mondongo', '2020-03-14 23:57:52', '2020-03-14 23:57:52'),
	(4, 'Hamburguesa doble carne', 'Descripción Hamburguesa doble carne', '2020-03-14 23:58:42', '2020-03-14 23:58:42'),
	(5, 'Jugo de limon', 'Descripcion jugo de limon', '2020-03-14 23:58:59', '2020-03-14 23:58:59');
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.recetas_ingredientes
DROP TABLE IF EXISTS `recetas_ingredientes`;
CREATE TABLE IF NOT EXISTS `recetas_ingredientes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_ingrediente` bigint(20) unsigned NOT NULL,
  `id_receta` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recetas_ingredientes_id_ingrediente_foreign` (`id_ingrediente`),
  KEY `recetas_ingredientes_id_receta_foreign` (`id_receta`),
  CONSTRAINT `recetas_ingredientes_id_ingrediente_foreign` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`),
  CONSTRAINT `recetas_ingredientes_id_receta_foreign` FOREIGN KEY (`id_receta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.recetas_ingredientes: ~8 rows (aproximadamente)
DELETE FROM `recetas_ingredientes`;
/*!40000 ALTER TABLE `recetas_ingredientes` DISABLE KEYS */;
INSERT INTO `recetas_ingredientes` (`id`, `id_ingrediente`, `id_receta`, `cantidad`, `estado`, `created_at`, `updated_at`) VALUES
	(2, 1, 4, 2, 1, '2020-03-15 00:05:09', '2020-03-15 00:05:09'),
	(3, 2, 4, 2, 1, '2020-03-15 00:05:44', '2020-03-15 00:05:44'),
	(4, 3, 4, 0, 0, '2020-03-15 00:05:53', '2020-03-15 00:05:53'),
	(5, 6, 4, 1, 1, '2020-03-15 00:06:02', '2020-03-15 00:06:02'),
	(6, 7, 3, 1, 1, '2020-03-15 00:08:28', '2020-03-15 00:08:28'),
	(7, 9, 3, 1, 1, '2020-03-15 00:08:35', '2020-03-15 00:08:35'),
	(8, 3, 3, 1, 1, '2020-03-15 00:08:43', '2020-03-15 00:08:43'),
	(9, 4, 2, 3, 1, '2020-03-15 17:57:49', '2020-03-15 17:57:49');
/*!40000 ALTER TABLE `recetas_ingredientes` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.restaurantes
DROP TABLE IF EXISTS `restaurantes`;
CREATE TABLE IF NOT EXISTS `restaurantes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.restaurantes: ~4 rows (aproximadamente)
DELETE FROM `restaurantes`;
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
INSERT INTO `restaurantes` (`id`, `nombre`, `direccion`, `descripcion`, `created_at`, `updated_at`) VALUES
	(1, 'Burger King', 'calle falsa 321', 'Descripcion Burger King', '2020-03-14 23:54:18', '2020-03-14 23:54:18'),
	(2, 'McDonalds', 'calle falsa 987', 'Descripcion Mcdonalds', '2020-03-14 23:54:36', '2020-03-14 23:54:36'),
	(3, 'PPC', 'calle falsa 654', 'Descripción PPC', '2020-03-14 23:55:45', '2020-03-14 23:55:45'),
	(4, 'Restaurante la Parrilla', 'calle falsa 432', 'Descripcion restaurante la Parrilla', '2020-03-14 23:56:34', '2020-03-14 23:56:34');
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.rols
DROP TABLE IF EXISTS `rols`;
CREATE TABLE IF NOT EXISTS `rols` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.rols: ~0 rows (aproximadamente)
DELETE FROM `rols`;
/*!40000 ALTER TABLE `rols` DISABLE KEYS */;
/*!40000 ALTER TABLE `rols` ENABLE KEYS */;

-- Volcando estructura para tabla rotonda.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla rotonda.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
