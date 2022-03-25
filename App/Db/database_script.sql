CREATE DATABASE `noticias`;



CREATE TABLE `Noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text,
	`autor` TEXT,
  `status` enum('s','n') DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);