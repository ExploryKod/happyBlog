-- Adminer 4.8.1 MySQL 5.5.5-10.9.3-MariaDB-1:10.9.3+maria~ubu2204 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `data`;
CREATE DATABASE `data` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `data`;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `post` varchar(255) NOT NULL,
                         `user_id` int(11) DEFAULT NULL,
                         `title` varchar(150) DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         KEY `user_id` (`user_id`),
                         CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO `posts` (`id`, `post`, `user_id`, `title`) VALUES
                                                           (1,	'dsbdjsds',	NULL,	'my title'),
                                                           (2,	'dsbdjsds',	NULL,	'my title'),
                                                           (3,	'dsbdjsds',	NULL,	'my title'),
                                                           (4,	'Une lame de mer ',	NULL,	'Lame'),
                                                           (5,	'Une lame de mer ',	NULL,	'Lame'),
                                                           (6,	'Une lame de mer ',	NULL,	'Lame'),
                                                           (7,	'Une lame de mer ',	NULL,	'Lame'),
                                                           (8,	'DSSD',	NULL,	'DSDS');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `username` varchar(100) NOT NULL,
                        `password` varchar(100) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
                                                      (10,	'AED',	'$2y$12$DYooJTrQJE51g51br4PufO6bXuufRdq3VWxhYa.ahoues0GJpsThe'),
                                                      (11,	'joana',	'$2y$12$IzlXNW356X/Fhj8oBaL2ju794rf4VcPDQnmTH7TjbDmhYiv8KGlgG'),
                                                      (12,	'joele',	'$2y$12$AF/9v10sxRvDxxJPGD.fKu6bCKx9fNx2IScUcCAy7pUqLgjO8.sKS'),
                                                      (13,	'JOE',	'$2y$12$yxwzWIUfK8CbGu67XcdnQ.9wIQAMTCSNR4HjvSdIWpPnrMJ.vpbJm'),
                                                      (14,	's',	'$2y$12$1W/Iqdzqjf1E.CovEkOuS.VlACrDFR78LFqOhSkFgfRdHPK1b6l8q'),
                                                      (15,	'amaury',	'$2y$12$XqexwozH0hy2g20BNEDJ5OKcbePvb9hmN5QgKGvbbUm0y.gAVhEGu');

-- 2022-10-16 15:42:37