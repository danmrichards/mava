# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.12)
# Database: symfony
# Generation Time: 2016-10-30 18:05:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Recreate the database.
DROP DATABASE IF EXISTS `mava_test`;
CREATE DATABASE `mava_test`;

-- Ensure we use the test database
USE `mava_test`;

# Dump of table project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workspace_id` int(11) DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_project_idx` (`workspace_id`),
  CONSTRAINT `FK_2FB3D0EE82D40A1F` FOREIGN KEY (`workspace_id`) REFERENCES `workspace` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;

INSERT INTO `project` (`id`, `workspace_id`, `title`, `description`, `due_date`)
VALUES
	(1,1,'saepe','Magni rerum consequatur laudantium nisi quo earum. Esse eveniet debitis omnis voluptatem voluptatem et. Praesentium et praesentium est. Molestiae porro consequuntur quos hic.','2016-11-05 08:10:13'),
	(2,3,'doloremque','Dignissimos et dolorem doloremque quam quia. Quibusdam ad in maiores nisi eius. Sapiente quia recusandae aut numquam laboriosam sint enim. Quod ullam at ut non eos sed amet sunt.','2016-11-05 07:30:37'),
	(3,3,'beatae','Quae sit veniam vel eos officiis et est nisi. Amet neque deleniti totam aut nisi. Omnis voluptatem velit nesciunt eligendi eos sint. Voluptates quo incidunt omnis aut enim nihil.','2016-11-04 07:59:21'),
	(4,1,'minus','Porro voluptatibus enim quia reprehenderit magni fugiat. Officiis velit alias et et quis. Distinctio ratione quis voluptates. Totam eos omnis inventore perferendis voluptatem nisi quis.','2016-11-04 13:59:23'),
	(5,2,'asperiores','Omnis inventore mollitia unde id in id. Molestiae in maxime sint doloremque similique aut est. Consectetur odio facere odio modi. Dicta ipsa temporibus sit facere cupiditate doloremque odio.','2016-11-03 15:12:10'),
	(6,2,'quos','Accusantium quidem ut eius a corrupti totam placeat delectus. Earum officiis sed autem ut voluptatem. Quod alias iste similique aut tempore pariatur et.','2016-10-31 18:32:48'),
	(7,2,'accusantium','Ad est et et cum eius voluptas numquam. Occaecati culpa aut in laudantium omnis. Aut laborum cupiditate corporis aliquid aut cumque consequuntur. Qui est maiores aliquid rerum autem qui.','2016-11-01 02:30:22');

/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table task
# ------------------------------------------------------------

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `due_date` datetime NOT NULL,
  `attachment` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_1_idx_idx` (`project_id`),
  KEY `fk_task_2_idx_idx` (`user_id`),
  CONSTRAINT `FK_527EDB25166D1F9C` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`),
  CONSTRAINT `FK_527EDB25A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;

INSERT INTO `task` (`id`, `project_id`, `user_id`, `title`, `description`, `due_date`, `attachment`)
VALUES
	(1,2,12,'modi','Voluptatem at qui eaque nihil. Eos fugit natus quaerat quibusdam alias. Accusamus aut dolores perspiciatis itaque doloribus qui. Eligendi quae recusandae facere quo.','2016-12-05 23:01:48',NULL),
	(2,3,13,'quas','Consequatur nisi fuga dolores aut velit illo. Sint voluptas a aperiam voluptas aut qui neque. Eos fugit nostrum non et et et fugit.','2017-01-21 09:38:54',NULL),
	(3,5,17,'impedit','Perferendis sit est magnam ut nemo possimus. Totam iste perspiciatis harum animi et ad rerum. Fugiat et facere quisquam. Quod velit velit ut rem repellendus ut sit laudantium.','2016-11-19 12:46:09',NULL),
	(4,5,15,'ut','Rerum ratione rerum repellendus ducimus nulla voluptatem. Ipsa eius repellat adipisci. Voluptas doloremque esse dolor qui illo placeat harum voluptatem.','2017-01-30 14:09:22',NULL),
	(5,7,18,'harum','Nihil laboriosam sed recusandae. Hic rerum delectus dolorum voluptas cupiditate aut. Aut ullam qui ea voluptatem aut cum vitae.','2017-01-02 08:35:06',NULL),
	(6,3,16,'et','Impedit recusandae omnis consequatur ut repellendus. Nihil reprehenderit non ut rem esse magnam iure. Sed velit aut omnis quod cupiditate.','2016-12-07 14:40:09',NULL),
	(7,1,15,'eum','Tenetur a cumque ut et rerum dolore. Et beatae totam nulla quisquam. Saepe perspiciatis doloremque voluptates unde.','2016-11-29 09:48:36',NULL),
	(8,6,13,'voluptatibus','Laboriosam sit enim adipisci sint velit. Autem quia modi ducimus odio fuga vitae expedita. Vero animi fugiat corporis. Et officia et necessitatibus quasi.','2016-11-06 20:47:51',NULL),
	(9,1,19,'cumque','Cum ratione animi maxime enim est. Provident vel tenetur asperiores animi ipsa. Optio odio aspernatur qui dolor blanditiis suscipit.','2017-01-21 16:19:59',NULL),
	(10,2,14,'quibusdam','Culpa dolores consectetur quod doloremque. Aut cupiditate aperiam occaecati adipisci veritatis vel voluptas. Cumque sed modi odit.','2016-12-01 10:14:46',NULL),
	(11,3,14,'voluptatem','Quia et aliquid neque voluptas est totam. Sunt dolores est tempora qui minus officia. Consequuntur voluptates non quasi minima. Repudiandae laborum dolor quasi totam qui ipsam iusto.','2016-12-11 00:07:44',NULL),
	(12,3,19,'officiis','Saepe aspernatur quasi et sit. Omnis atque inventore consequatur mollitia ducimus. Doloribus ad labore quos. Quia quia unde quos error modi saepe eos.','2016-12-30 16:19:59',NULL),
	(13,7,20,'sunt','Dolorem impedit et cumque. Qui ut non perspiciatis voluptatem voluptatem eligendi provident sed. Magni qui sint quos aut quibusdam labore. Quod est qui dolor reprehenderit.','2016-11-05 20:52:00',NULL),
	(14,7,16,'voluptas','Vero voluptates fugit officiis explicabo. Libero sit ducimus minima. Suscipit id tempore voluptatibus recusandae et deleniti tenetur.','2016-11-01 08:24:05',NULL),
	(15,1,18,'vitae','Recusandae eligendi vel est repellat. Vitae neque optio quod et consectetur ut expedita ratione. Qui sed ut repudiandae.','2016-11-25 15:14:16',NULL);

/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`)
VALUES
	(12,'morissette.erna','morissette.erna','wkohler@johnson.com','wkohler@johnson.com',0,'knjipnfbb00ssg4ko0wscogggks4oc8','R4Usi|L@vH',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(13,'kaley86','kaley86','ffadel@hotmail.com','ffadel@hotmail.com',0,'1z5gktqeb600gg8wsks4k400c8g8w0s','3a)bQsrunw0{:0&,`vGW',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(14,'letha.koepp','letha.koepp','marquis.conroy@gmail.com','marquis.conroy@gmail.com',0,'e84djb2fh2osgs04g8oo8o0g0sgwokw','0G|$7[}Ag',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(15,'jackeline78','jackeline78','obins@ledner.com','obins@ledner.com',0,'k4t6asn86dwoow0k80kswo40o4oock4','<*d,-R\"(?w4v9bOW&VH',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(16,'verna58','verna58','spencer.lemke@yahoo.com','spencer.lemke@yahoo.com',0,'iovm1t4gh2osk4cwwgkcgwssg440gs0','bOWS%hSz_rQk&|X+*KrK',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(17,'braun.larue','braun.larue','ethelyn92@yahoo.com','ethelyn92@yahoo.com',0,'huq15giyp6o0kw40cococogokcs8oo4','V7\\ert=[]g]',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(18,'dorthy.hermann','dorthy.hermann','dmarvin@hotmail.com','dmarvin@hotmail.com',0,'o3cpztav61w44coos0oskss0cggos0k','_OD\'+j',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(19,'bergnaum.franz','bergnaum.franz','jaskolski.odell@ruecker.com','jaskolski.odell@ruecker.com',0,'cmujaaoncf4gw0wsgsk44socgwok8g0','Vb~6E/`WM',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(20,'torphy.louie','torphy.louie','runolfsdottir.jayne@wuckert.info','runolfsdottir.jayne@wuckert.info',0,'e4eptah7mu8gcc8o44g0k4gsk4s8ws8','o=T!xnR',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL),
	(21,'roberts.reagan','roberts.reagan','coralie24@yahoo.com','coralie24@yahoo.com',0,'975u78ilxao8k8g04ooswsccw00g884','kw%cM,1}Z',NULL,0,0,NULL,NULL,NULL,'a:0:{}',0,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table workspace
# ------------------------------------------------------------

DROP TABLE IF EXISTS `workspace`;

CREATE TABLE `workspace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `workspace` WRITE;
/*!40000 ALTER TABLE `workspace` DISABLE KEYS */;

INSERT INTO `workspace` (`id`, `name`, `description`)
VALUES
	(1,'accusantium','Atque possimus aut dolores quis totam incidunt ducimus aperiam. Est quia assumenda minima sunt. Similique ut culpa natus consequatur reiciendis sit. Nihil ut porro amet laborum iure molestiae et.'),
	(2,'ea','Voluptatem laudantium perferendis eveniet quam vero fuga. Omnis temporibus maxime sint suscipit laudantium. Magni non voluptas fuga non autem non non. Et neque itaque ex quaerat.'),
	(3,'sed','Ex beatae reprehenderit exercitationem corrupti dolorem reprehenderit ut ducimus. Molestiae consequatur sint consequatur est qui doloremque.');

/*!40000 ALTER TABLE `workspace` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
