# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.38)
# Database: mtg_cards
# Generation Time: 2022-08-01 12:55:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cards
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cards`;

CREATE TABLE `cards` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(50) NOT NULL,
  `title` varchar(256) NOT NULL,
  `genericCost` int(3) DEFAULT NULL,
  `greenCost` int(3) DEFAULT NULL,
  `blackCost` int(3) DEFAULT NULL,
  `blueCost` int(3) DEFAULT NULL,
  `redCost` int(3) DEFAULT NULL,
  `whiteCost` int(3) DEFAULT NULL,
  `cardArt` varchar(266) NOT NULL,
  `cardType` varchar(256) DEFAULT NULL,
  `setType` varchar(256) NOT NULL DEFAULT 'M15',
  `raritySet` varchar(256) NOT NULL,
  `abilityCostGeneric` int(3) DEFAULT NULL,
  `abilityCostGreen` int(3) DEFAULT NULL,
  `abilityCostRed` int(3) DEFAULT NULL,
  `abilityCostBlue` int(3) DEFAULT NULL,
  `abilityCostBlack` int(3) DEFAULT NULL,
  `abilityCostWhite` int(3) DEFAULT NULL,
  `abilityTap` tinyint(1) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `designerFlavourText` varchar(1000) DEFAULT NULL,
  `power` int(3) DEFAULT NULL,
  `toughness` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;

INSERT INTO `cards` (`id`, `color`, `title`, `genericCost`, `greenCost`, `blackCost`, `blueCost`, `redCost`, `whiteCost`, `cardArt`, `cardType`, `setType`, `raritySet`, `abilityCostGeneric`, `abilityCostGreen`, `abilityCostRed`, `abilityCostBlue`, `abilityCostBlack`, `abilityCostWhite`, `abilityTap`, `description`, `designerFlavourText`, `power`, `toughness`)
VALUES
	(1,'green','Centaur Courser',2,1,NULL,NULL,NULL,NULL,'centaurCourserArt.jpeg','Creature - Centaur Warrior','M15','common',NULL,NULL,NULL,NULL,NULL,NULL,0,'','\"The centaurs are truly free. Never will they be tamed by temptation or controlled by fear. They live in total harmony, a feat not yet achieved by our kind.\"\n- Ramal, sage of Westgate',3,3),
	(2,'blue','Amphin Pathmage',3,NULL,NULL,1,NULL,NULL,'amphinPathmage.jpeg','Creature - Salamander Wizard','M15','common',2,NULL,NULL,1,NULL,NULL,0,':Target creature can\'t be blocked this turn.','\"There are those who do not believe in the existence of the amphin. This seems somehow to be of their own design.\" - Gor Muldrak, Cryptohistories',3,2);

/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
