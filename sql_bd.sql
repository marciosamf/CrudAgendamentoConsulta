-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para agendamento
CREATE DATABASE IF NOT EXISTS `agendamento` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `agendamento`;

-- Copiando estrutura para tabela agendamento.agenda
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_medico` int NOT NULL,
  `id_paciente` int NOT NULL,
  `agendamento_data` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `agendamento_hora` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `medico_id_FK` (`id_medico`),
  KEY `paciente_id_FK` (`id_paciente`),
  CONSTRAINT `medico_id_FK` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`) ON DELETE CASCADE,
  CONSTRAINT `paciente_id_FK` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela agendamento.agenda: ~8 rows (aproximadamente)
INSERT INTO `agenda` (`id`, `id_medico`, `id_paciente`, `agendamento_data`, `agendamento_hora`) VALUES
	(13, 1, 2, '2024-11-04', '14:00');

-- Copiando estrutura para tabela agendamento.medico
CREATE TABLE IF NOT EXISTS `medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela agendamento.medico: ~5 rows (aproximadamente)
INSERT INTO `medico` (`id`, `nome`) VALUES
	(1, 'Paulo'),
	(2, 'Murilo'),
	(4, 'Joao'),
	(5, 'Ana'),
	(6, 'Izabela');

-- Copiando estrutura para tabela agendamento.paciente
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela agendamento.paciente: ~10 rows (aproximadamente)
INSERT INTO `paciente` (`id`, `nome`) VALUES
	(1, 'Ana'),
	(2, 'Aparecida'),
	(4, 'Isidora'),
	(5, 'Fulaninha'),
	(6, 'Roberta'),
	(7, 'Luiza'),
	(8, 'Beatriz'),
	(9, 'Guilherme'),
	(10, 'Yuri'),
	(11, 'Enzo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
