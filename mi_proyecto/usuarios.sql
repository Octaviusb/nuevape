-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla mi_proyecto.usuarios: ~2 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `nombre`, `correo`, `contraseña`, `rol`, `terms`, `otp`, `creado_en`, `celular`, `fecha_nacimiento`) VALUES
	(1, 'Ener Octavio Buitrago', 'obuitragocamelo@yahoo.es', '$2y$10$DnlQvduWTXaWrhCNoCd0fOHH2ZCKdZ5plzZgeQ3HjKXHev6c/.WeG', 'admin', 0, 0, '2024-06-14 19:52:16', NULL, NULL),
	(2, 'Octavio Buitrago', 'ladriecol@gmail.com', '$2y$10$QMHza53eaRUmJFK7TmaAm.dsYfe7dLqRqE.rMiIcNXwSJpWZGtpbW', 'usuario', 0, 0, '2024-06-19 15:24:28', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
