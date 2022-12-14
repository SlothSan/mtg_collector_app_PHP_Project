# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.38)
# Database: mtg_cards
# Generation Time: 2022-08-04 08:44:12 +0000
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
  `cardArt` varchar(266) NOT NULL DEFAULT 'placeholder.jpeg',
  `cardType` varchar(256) DEFAULT NULL,
  `setType` varchar(256) NOT NULL DEFAULT 'M15',
  `raritySet` varchar(256) NOT NULL,
  `abilityCostGeneric` int(3) DEFAULT NULL,
  `abilityCostGreen` int(3) DEFAULT NULL,
  `abilityCostRed` int(3) DEFAULT NULL,
  `abilityCostBlue` int(3) DEFAULT NULL,
  `abilityCostBlack` int(3) DEFAULT NULL,
  `abilityCostWhite` int(3) DEFAULT NULL,
  `abilityTap` tinyint(1) NOT NULL DEFAULT '0',
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
	(1,'Green','Centaur Courser',2,1,NULL,NULL,NULL,NULL,'centaurCourserArt.jpeg','Creature - Centaur Warrior','M15','Common',NULL,NULL,NULL,NULL,NULL,NULL,0,'','\"The centaurs are truly free. Never will they be tamed by temptation or controlled by fear. They live in total harmony, a feat not yet achieved by our kind.\"\n- Ramal, sage of Westgate',3,3),
	(2,'Blue','Amphin Pathmage',3,NULL,NULL,1,NULL,NULL,'amphinPathmage.jpeg','Creature - Salamander Wizard','M15','Common',2,NULL,NULL,1,NULL,NULL,0,':Target creature can\'t be blocked this turn.','\"There are those who do not believe in the existence of the amphin. This seems somehow to be of their own design.\" - Gor Muldrak, Cryptohistories',3,2),
	(3,'Black','Accursed Spirit',3,NULL,1,NULL,NULL,NULL,'accursedSpirit.jpeg','Creature - Spirit','M15','Common',NULL,NULL,NULL,NULL,NULL,NULL,0,'Intimidate (This creature can\'t be blocked except by artifact creatures and/or creatures that share a color with it.)','Many have heard the slither of dragging armor and the soft squelch of its voice. But only its victims ever meet its icy gaze.',3,2),
	(4,'Red','Act on Impulse',2,NULL,NULL,NULL,1,NULL,'actOnImpulse.jpeg','Sorcery','M15','Uncommon',NULL,NULL,NULL,NULL,NULL,NULL,0,'Exile the top three cards of your library. Until end of turn, you may play cards exiled this way. (If you cast a spell this way, you still pay its costs. You can play a land this way only if you have an available land play remaining.)','\"You don\'t want to know what happens after I put on the goggles.\"',NULL,NULL),
	(5,'White','Battle Mastery',2,NULL,NULL,NULL,NULL,1,'battleMastery.jpeg','Enchantment - Aura\n','M15','Uncommon',NULL,NULL,NULL,NULL,NULL,NULL,0,'Enchant creature - Enchanted creature has double strike. (It deals both first-strike and regular combat damage.)','\"Boom! Boom! Boots the size of oxcarts, then an axe like a falling sun. Elves scattered. Trees scattered. Even the hills ran for the hills!\" - Clachan Tales',NULL,NULL),
	(6,'Green','Yisan, the Wanderer Bard',2,1,NULL,NULL,NULL,NULL,'yisanTheWandererBard.jpeg','Legendary Creature - Human Rogue','M15','Rare',2,1,NULL,NULL,NULL,NULL,1,'Put a verse counter on Yisan, the Wanderer Bard: Search your library for a creature card with mana value equal to the number of verse counters on Yisan, put it onto the battlefield, then shuffle.','Designed by Brian Fargo',2,3),
	(7,'Blue','Cancel',1,NULL,NULL,2,NULL,NULL,'cancelArt.jpeg','Instant','M15','Common',NULL,NULL,NULL,NULL,NULL,NULL,0,'Counter target spell.','\"What you are attempting is not against the law. It is, however, extremely foolish.\"',NULL,NULL),
	(8,'Black','In Garruks Wake',7,NULL,2,NULL,NULL,NULL,'inGarruksWake.jpeg','Sorcery','M15','Rare',NULL,NULL,NULL,NULL,NULL,NULL,0,'Destroy all creatures you don\'t control and all planeswalkers you don\'t control.','Beyond pain, beyond obsession and wild despair, there lies a place of twisted power only the most tormented souls can reach.',NULL,NULL),
	(9,'Red','Miners Bane',4,NULL,NULL,NULL,2,NULL,'minersBaneArt.jpeg','Creature - Elemental','M15','Common',2,NULL,1,NULL,NULL,NULL,0,': Miner\'s Bane gets +1/+0 and gains trample until end of turn. (It can deal excess combat damage to the player or planeswalker it\'s attacking.)','There are certain stones even dwarves know to leave in the earth.',6,3),
	(10,'White','Sungrace Pegasus',1,NULL,NULL,NULL,NULL,1,'sungracePegasus.jpeg','Creature - Pegasus','M15','Common',NULL,NULL,NULL,NULL,NULL,NULL,0,'Flying (This creature can\'t be blocked except by creatures with flying or reach.)\nLifelink (Damage dealt by this creature also causes you to gain that much life.)','The sacred feathers of the pegasus are said to have healing powers.',1,2);

/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
