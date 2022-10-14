-- Adminer 4.8.1 MySQL 5.5.5-10.9.3-MariaDB-1:10.9.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `data`;
CREATE DATABASE `data` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `data`;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `post` varchar(255) NOT NULL,
                        `user_id` int(11) DEFAULT NULL,
                        PRIMARY KEY (`id`),
                        KEY `user_id` (`user_id`),
                        CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(100) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
                                                      (1,	'amaury',	'pass'),
                                                      (2,	'amaury',	'jui'),
                                                      (3,	'amaury',	'jui'),
                                                      (4,	'amaury',	'jui');

-- 2022-10-14 13:58:37