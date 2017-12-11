# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.7.19)
# Database: pri_lis
# Generation Time: 2017-12-11 00:43:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table blog_entries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_entries`;

CREATE TABLE `blog_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `cuisine` varchar(250) NOT NULL,
  `opening_hours` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `image_caption` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title_UNIQUE` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blog_entries` WRITE;
/*!40000 ALTER TABLE `blog_entries` DISABLE KEYS */;

INSERT INTO `blog_entries` (`id`, `title`, `cuisine`, `opening_hours`, `location`, `description`, `image`, `image_caption`, `created_at`, `updated_at`)
VALUES
	(3,'CASA VERDE','Casual Dining- American ','11am - 12 midnight','Second Floor, UP TOWN CENTER ','Casa Verde is where i get to eat really yummy big ribs for a very affordable price. With the ribs comes a sauce and a side dish of corns and c arrots. They do not offer ribs only, but also pasta and spaghetti. Another best seller here is their mighty ton burger that comes with small side dishes. Top this all off with their tall milkshake and you\'re ready to go!','casa_verde.jpg','Must try: Brian\'s Ribs, Mighty Ton Burger, Tall Milkshake','2017-12-10 19:34:49',NULL),
	(4,'SILANTRO','Fil-Mexican ','11am - 10 pm ','Third Floor, UP TOWN CENTER test','Silntro is the restaurant for you if you are a lover of Mexican comfort food! The line is always worth the wait because of their affordable beef nachos, quesedillas, and burritos. My friends and I would order only beef nachos and a burrito and we\'re already really full sometimes, even with leftovers! So if you\'re really really hungry and want to besomewhere that fits your budget, this is the place!','kiss.jpg','Must try: Beef Nachos, Silantro\'s Burrito, Mojito, Chicken Wings, Paella','2017-12-10 19:36:25',NULL),
	(6,'SUSHI NORI','Japanese','11am - 10 pm ','Second Floor, UP TOWN CENTER ','Japanese is my favorite cuisine and Sushi Nori never fails to dissapoint with their sushis such as california makis. They also have very affordable yet delicious rice bowls and salmon poke bowls. What I love about Sushi Nori is the quality of the food and you can really just taste the authenticity of it.','sushi.jpg','Must try: Salmon Poke Bowl, Rice Bowls','2017-12-10 21:28:00',NULL),
	(7,'RAMENAGI','Japanese','10am -11pm','Second Floor, UP TOWN CENTER ','I am a very big fan of Ramen and until now, Ramenagi is still my go-to place when I am craving for some. Their serving is really worth it and the broth is extremely delicious. You also get to customize your noodles like your add-ons, noddles, or you want your soup to be spicy.','ramen.jpg','Must try: Butao, Red King','2017-12-11 02:01:26',NULL);

/*!40000 ALTER TABLE `blog_entries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`)
VALUES
	(1,'jumpingshrimp27@yahoo.com','$2y$10$SbnJKp1ML9vGFTa8MxaHSepR13QC6SgxK.79/nzvxvgGv3jPCuDSe');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
