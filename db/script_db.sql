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
	`fecha` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista konectacafe.lista_ventas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `lista_ventas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `lista_ventas` AS SELECT v.id,p.nombre AS "nombre",v.cantidad, v.fecha
FROM ventas v
JOIN productos p ON p.id = v.id_producto ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
