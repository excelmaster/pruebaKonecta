-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.17-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para konectacafe
CREATE DATABASE IF NOT EXISTS `konectacafe` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `konectacafe`;

-- Volcando estructura para vista konectacafe.lista_ventas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `lista_ventas` (
	`id` INT(11) NOT NULL,
	`nombre` VARCHAR(250) NOT NULL COLLATE 'utf8mb4_general_ci',
	`cantidad` INT(11) NOT NULL,
	`fecha` TIMESTAMP NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para tabla konectacafe.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `referencia` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `create_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla konectacafe.productos: ~2 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `create_date`) VALUES
	(1, 'ducales', 'csg999', 777, 56, 'saladas', 897, '2022-01-26'),
	(2, 'festival', 'csg', 500, 80, 'galletas', 2654, '2022-01-26');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla konectacafe.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK1_producto` (`id_producto`),
  CONSTRAINT `FK1_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla konectacafe.ventas: ~3 rows (aproximadamente)
DELETE FROM `ventas`;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id`, `id_producto`, `cantidad`, `fecha`) VALUES
	(4, 1, 25, '2022-01-26 20:02:26'),
	(5, 2, 1, '2022-01-26 20:02:43'),
	(6, 1, 10, '0000-00-00 00:00:00'),
	(7, 1, 10, '2022-01-26 22:25:41'),
	(8, 1, 1, '2022-01-26 22:33:04'),
	(9, 1, 1, '2022-01-26 22:33:32'),
	(10, 1, 1, '2022-01-26 22:34:01'),
	(11, 1, 1, '2022-01-26 22:34:04'),
	(12, 1, 1, '2022-01-26 22:34:15'),
	(13, 1, 1, '2022-01-26 22:35:13'),
	(14, 1, 1, '2022-01-26 22:36:14'),
	(15, 1, 1, '2022-01-26 22:36:53'),
	(16, 2, 4, '2022-01-26 22:37:15'),
	(17, 2, 4, '2022-01-26 22:38:02'),
	(18, 2, 3, '2022-01-26 22:39:01'),
	(19, 2, 2, '2022-01-26 22:41:10'),
	(20, 1, 100, '2022-01-26 22:46:44'),
	(21, 1, 6498, '2022-01-26 22:47:38');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando estructura para vista konectacafe.lista_ventas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `lista_ventas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `lista_ventas` AS SELECT v.id,p.nombre AS "nombre",v.cantidad, v.fecha
FROM ventas v
JOIN productos p ON p.id = v.id_producto ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
