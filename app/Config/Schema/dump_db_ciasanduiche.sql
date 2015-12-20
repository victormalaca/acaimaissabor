/*
SQLyog Community v11.32 (64 bit)
MySQL - 5.6.12-log : Database - ciasanduiche
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ciasanduiche` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `ciasanduiche`;

/*Table structure for table `cidades` */

DROP TABLE IF EXISTS `cidades`;

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidades_estados` (`estado_id`),
  CONSTRAINT `fk_cidades_estados` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cidades` */

insert  into `cidades`(`id`,`nome`,`estado_id`,`created`,`modified`) values (1,'Belo Horizonte',1,'2014-01-31 22:09:24','2014-01-31 22:09:26');

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `apelido` varchar(50) DEFAULT NULL,
  `fone_fixo` varchar(15) DEFAULT NULL,
  `fone_comercial` varchar(15) DEFAULT NULL,
  `fone_celular` varchar(15) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `clientes` */

insert  into `clientes`(`id`,`nome`,`apelido`,`fone_fixo`,`fone_comercial`,`fone_celular`,`created`,`modified`) values (5,'Victor Pinheiro','Traste','(31)3333-3333','(31)3444-4444','(31)9999-9999','2014-02-19 01:13:13','2014-02-19 01:13:13'),(6,'Rivelino Nascimento','Riva','(31)2222-2222','(31)3333-3333','(31)9888-8888','2014-02-19 01:25:36','2014-02-19 01:25:36');

/*Table structure for table `enderecos` */

DROP TABLE IF EXISTS `enderecos`;

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `observacao` varchar(200) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `cidade_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `enderecos` */

insert  into `enderecos`(`id`,`cep`,`rua`,`numero`,`bairro`,`complemento`,`observacao`,`cliente_id`,`cidade_id`,`created`,`modified`) values (8,'31.840-000','rua treze',67,'floramar','apto 101','teste de cadastro com sucesso',5,1,'2014-02-19 01:13:13','2014-02-19 01:13:13'),(9,'31.840-180','rua um',98,'guarani','casa','teste de add agora com sucesso',6,1,'2014-02-19 01:25:36','2014-02-19 01:25:36');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `estados` */

insert  into `estados`(`id`,`sigla`,`nome`,`created`,`modified`) values (1,'MG','Minas Gerais','2014-01-31 22:09:01','2014-01-31 22:09:03');

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `groups` */

insert  into `groups`(`id`,`name`) values (1,'Administradores'),(2,'Atendentes');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups` (`group_id`),
  CONSTRAINT `fk_users_groups` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`nome`,`username`,`password`,`group_id`) values (2,'Rivelino Nascimento','riva','3d57f1fd9c31558d72d7c52fdf82f1f23a7749bd',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
