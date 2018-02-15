CREATE DATABASE  IF NOT EXISTS `kzc353_4` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kzc353_4`;
-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: kzc353_4
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `demos`
--

DROP TABLE IF EXISTS `demos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demos` (
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`,`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demos`
--

LOCK TABLES `demos` WRITE;
/*!40000 ALTER TABLE `demos` DISABLE KEYS */;
INSERT INTO `demos` VALUES (1,1,'2018-02-16','2018-02-16 13:00:00','A'),(2,10,'2018-02-16','2018-02-16 13:15:00','C'),(3,11,'2018-02-16','2018-02-16 13:30:00','B'),(4,7,'2018-02-16','2018-02-16 14:15:00','C+'),(5,13,'2018-02-17','2018-02-17 13:00:00','B-'),(6,14,'2018-02-17','2018-02-17 13:15:00','D'),(7,19,'2018-02-17','2018-02-17 13:30:00','C-'),(8,1,'2018-02-16','2018-02-16 13:00:00','A'),(9,13,'2018-02-17','2018-02-17 13:00:00','B-'),(10,10,'2018-02-16','2018-02-16 13:15:00','C'),(11,11,'2018-02-16','2018-02-16 13:30:00','B'),(13,1,'2018-02-16','2018-02-16 13:00:00','A'),(14,27,'2018-02-17','2018-02-17 15:30:00','C'),(15,10,'2018-02-16','2018-02-16 13:15:00','C'),(16,10,'2018-02-16','2018-02-16 13:15:00','C'),(17,13,'2018-02-17','2018-02-17 13:00:00','B-'),(19,13,'2018-02-17','2018-02-17 13:00:00','B-'),(20,5,'2018-02-16','2018-02-16 14:45:00','B'),(21,8,'2018-02-16','2018-02-16 15:00:00','A'),(22,12,'2018-02-16','2018-02-16 15:15:00','C'),(23,6,'2018-02-16','2018-02-16 14:00:00','D-'),(24,30,'2018-02-17','2018-02-17 15:45:00','A+'),(26,18,'2018-02-16','2018-02-16 15:45:00','B+'),(27,20,'2018-02-16','2018-02-16 16:00:00','C+'),(29,22,'2018-02-16','2018-02-16 16:30:00','A-'),(30,23,'2018-02-17','2018-02-17 14:45:00','A'),(31,24,'2018-02-17','2018-02-17 15:00:00','B'),(32,21,'2018-02-16','2018-02-16 16:15:00','D+'),(33,25,'2018-02-17','2018-02-17 15:15:00','B-'),(34,1,'2018-02-16','2018-02-16 13:00:00','A'),(35,27,'2018-02-17','2018-02-17 15:30:00','C'),(36,30,'2018-02-17','2018-02-17 15:45:00','A+'),(38,19,'2018-02-17','2018-02-17 13:30:00','C-'),(39,25,'2018-02-17','2018-02-17 15:15:00','B-'),(42,29,'2018-02-17','2018-02-17 14:30:00','C'),(45,14,'2018-02-17','2018-02-17 13:15:00','D'),(50,23,'2018-02-17','2018-02-17 14:45:00','A'),(51,11,'2018-02-16','2018-02-16 13:30:00','B'),(52,9,'2018-02-16','2018-02-16 14:30:00','B+'),(63,28,'2018-02-17','2018-02-17 14:15:00','B'),(64,16,'2018-02-17','2018-02-17 13:45:00','A-'),(65,20,'2018-02-16','2018-02-16 16:00:00','C+'),(66,2,'2018-02-17','2018-02-17 16:00:00','B'),(69,8,'2018-02-16','2018-02-16 15:00:00','A'),(70,24,'2018-02-17','2018-02-17 15:00:00','B'),(71,18,'2018-02-16','2018-02-16 15:45:00','B+'),(72,17,'2018-02-16','2018-02-16 15:30:00','C-'),(73,15,'2018-02-17','2018-02-17 16:30:00','A'),(78,19,'2018-02-17','2018-02-17 13:30:00','C-'),(80,28,'2018-02-17','2018-02-17 14:15:00','B'),(81,26,'2018-02-17','2018-02-17 14:00:00','B'),(82,12,'2018-02-16','2018-02-16 15:15:00','C'),(83,16,'2018-02-17','2018-02-17 13:45:00','A-'),(84,4,'2018-02-17','2018-02-17 16:15:00','B-'),(85,3,'2018-02-16','2018-02-16 13:45:00','A+'),(86,22,'2018-02-16','2018-02-16 16:30:00','A-'),(87,9,'2018-02-16','2018-02-16 14:30:00','B+'),(88,7,'2018-02-16','2018-02-16 14:15:00','C+'),(90,3,'2018-02-16','2018-02-16 13:45:00','A+'),(91,29,'2018-02-17','2018-02-17 14:30:00','C'),(92,28,'2018-02-17','2018-02-17 14:15:00','B'),(93,26,'2018-02-17','2018-02-17 14:00:00','B'),(94,26,'2018-02-17','2018-02-17 14:00:00','B'),(95,5,'2018-02-16','2018-02-16 14:45:00','B'),(96,16,'2018-02-17','2018-02-17 13:45:00','A-'),(97,9,'2018-02-16','2018-02-16 14:30:00','B+'),(98,7,'2018-02-16','2018-02-16 14:15:00','C+'),(100,3,'2018-02-16','2018-02-16 13:45:00','A+');
/*!40000 ALTER TABLE `demos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `sid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `date_joined` date DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`,`tid`),
  KEY `tid_idx` (`tid`),
  CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `teams` (`tid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,1,'2018-01-11','member'),(2,10,'2018-01-01','member'),(3,11,'2018-01-11','member'),(4,7,'2018-01-23','leader'),(5,13,'2018-01-11','member'),(6,14,'2018-01-14','member'),(7,19,'2018-02-04','leader'),(8,1,'2018-01-11','member'),(9,13,'2018-01-29','leader'),(10,10,'2018-01-01','member'),(11,11,'2018-01-11','member'),(12,14,'2018-01-14','member'),(13,1,'2018-01-11','member'),(14,27,'2018-01-04','leader'),(15,10,'2018-01-01','member'),(16,10,'2018-01-03','leader'),(17,13,'2018-01-11','member'),(18,14,'2018-01-14','member'),(19,13,'2018-01-11','member'),(20,5,'2018-01-05','member'),(21,8,'2018-01-05','member'),(22,12,'2018-01-05','member'),(23,6,'2018-01-19','leader'),(24,30,'2018-01-08','leader'),(25,17,'2018-01-05','member'),(26,18,'2018-01-05','member'),(27,20,'2018-01-05','member'),(28,21,'2018-01-05','member'),(29,22,'2018-01-05','member'),(30,23,'2018-01-05','member'),(31,24,'2018-01-05','member'),(32,21,'2018-01-18','leader'),(33,25,'2018-01-05','member'),(34,1,'2018-01-19','leader'),(35,27,'2018-01-05','member'),(36,30,'2018-01-05','member'),(37,11,'2018-01-11','member'),(38,19,'2018-01-28','member'),(39,25,'2018-01-09','leader'),(42,29,'2018-01-27','leader'),(45,14,'2018-01-10','leader'),(50,23,'2018-01-20','leader'),(51,11,'2018-01-15','leader'),(52,9,'2018-01-06','leader'),(54,19,'2018-01-28','member'),(63,28,'2018-01-16','leader'),(64,16,'2018-01-12','leader'),(65,20,'2018-01-05','member'),(66,2,'2018-01-13','leader'),(69,8,'2018-01-21','leader'),(70,24,'2018-01-05','member'),(71,18,'2018-01-12','leader'),(72,17,'2018-01-05','member'),(73,15,'2018-01-09','leader'),(78,19,'2018-01-28','member'),(79,29,'2018-01-30','member'),(80,28,'2018-01-30','member'),(81,26,'2018-01-30','member'),(82,12,'2018-01-30','leader'),(83,16,'2018-01-30','member'),(84,4,'2018-01-19','leader'),(85,3,'2018-02-05','leader'),(86,22,'2018-01-07','leader'),(87,9,'2018-01-30','member'),(88,7,'2018-01-30','member'),(89,6,'2018-01-30','member'),(90,3,'2018-01-20','member'),(91,29,'2018-01-30','member'),(92,28,'2018-01-30','member'),(93,26,'2018-01-30','member'),(94,26,'2018-01-11','leader'),(95,5,'2018-01-23','leader'),(96,16,'2018-01-30','member'),(97,9,'2018-01-30','member'),(98,7,'2018-01-30','member'),(99,6,'2018-01-30','member'),(100,3,'2018-01-20','member');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Warm Up Project'),(2,'Final Project');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'Natal Gravett','Male','ngravett0@unicef.org'),(2,'Faustine Millsap','Female','fmillsap1@patch.com'),(3,'Evita Willbourne','Female','ewillbourne2@europa.eu'),(4,'Johnette Corkell','Female','jcorkell3@pcworld.com'),(5,'Patty Connett','Male','pconnett4@xing.com'),(6,'Cozmo Storres','Male','cstorres5@adobe.com'),(7,'Hastie Broggini','Male','hbroggini6@phoca.cz'),(8,'Eal Bevar','Male','ebevar7@businesswire.com'),(9,'Orville Jarnell','Male','ojarnell8@eventbrite.com'),(10,'Prue Primarolo','Female','pprimarolo9@uol.com.br'),(11,'Lamar Sabbins','Male','lsabbinsa@cbc.ca'),(12,'Eugene Killwick','Male','ekillwickb@ustream.tv'),(13,'Hadrian Finlaison','Male','hfinlaisonc@cloudflare.com'),(14,'Bonny Brazenor','Female','bbrazenord@java.com'),(15,'Maury Pavinese','Male','mpavinesee@bing.com'),(16,'Roz Feavyour','Female','rfeavyourf@blogs.com'),(17,'Rafael Eyer','Male','reyerg@squidoo.com'),(18,'Berti Yglesia','Female','byglesiah@shareasale.com'),(19,'Diane-marie Kubasiewicz','Female','dkubasiewiczi@nifty.com'),(20,'Job Klimsch','Male','jklimschj@google.com.au'),(21,'Felita Martinson','Female','fmartinsonk@mac.com'),(22,'Kerstin Stairmond','Female','kstairmondl@wikia.com'),(23,'Misha Dener','Female','mdenerm@yolasite.com'),(24,'Alberto Lathaye','Male','alathayen@trellian.com'),(25,'Smith Pauwel','Male','spauwelo@creativecommons.org'),(26,'Charlotta Josefsson','Female','cjosefssonp@ning.com'),(27,'Marven Hedge','Male','mhedgeq@canalblog.com'),(28,'Templeton Rickaert','Male','trickaertr@baidu.com'),(29,'Pammie Milch','Female','pmilchs@mtv.com'),(30,'Darius Doreward','Male','ddorewardt@pinterest.com'),(31,'Petronia Shoveller','Female','pshovelleru@histats.com'),(32,'Karen Barens','Female','kbarensv@twitpic.com'),(33,'Colas Paff','Male','cpaffw@lulu.com'),(34,'Marcelline Wardlaw','Female','mwardlawx@gizmodo.com'),(35,'Rodina Mebius','Female','rmebiusy@howstuffworks.com'),(36,'Jesse Baike','Female','jbaikez@kickstarter.com'),(37,'Lavena Toe','Female','ltoe10@statcounter.com'),(38,'Benito Jeste','Male','bjeste11@alexa.com'),(39,'Robinet Pethybridge','Male','rpethybridge12@dmoz.org'),(40,'Helen-elizabeth Turn','Female','hturn13@i2i.jp'),(41,'Leila Bertot','Female','lbertot14@skyrock.com'),(42,'Jermaine Ridolfi','Male','jridolfi15@epa.gov'),(43,'Sophronia Bruckner','Female','sbruckner16@geocities.com'),(44,'Eldin Roberds','Male','eroberds17@answers.com'),(45,'Quintana Gidney','Female','qgidney18@thetimes.co.uk'),(46,'Alison Ivakin','Female','aivakin19@xing.com'),(47,'Izabel Dollin','Female','idollin1a@timesonline.co.uk'),(48,'Sallie Easlea','Female','seaslea1b@sciencedaily.com'),(49,'Imogen Berrigan','Female','iberrigan1c@squarespace.com'),(50,'Jeremiah O\'Hern','Male','johern1d@google.ca'),(51,'Michaelina Rosiello','Female','mrosiello1e@oracle.com'),(52,'Clerkclaude Vellacott','Male','cvellacott1f@phpbb.com'),(53,'Stanford De Cleyne','Male','sde1g@rambler.ru'),(54,'Derron McGlynn','Male','dmcglynn1h@ox.ac.uk'),(55,'Etta Woolfenden','Female','ewoolfenden1i@csmonitor.com'),(56,'Skippie Eglese','Male','seglese1j@devhub.com'),(57,'Krissie Loges','Female','kloges1k@tripadvisor.com'),(58,'Sabrina Woodley','Female','swoodley1l@deviantart.com'),(59,'Bridie Hansard','Female','bhansard1m@jimdo.com'),(60,'Gertrudis Pykett','Female','gpykett1n@npr.org'),(61,'Mord Tipperton','Male','mtipperton1o@indiegogo.com'),(62,'Helen Hadkins','Female','hhadkins1p@drupal.org'),(63,'Jackqueline Chant','Female','jchant1q@kickstarter.com'),(64,'La verne Officer','Female','lverne1r@bluehost.com'),(65,'Chelsey Kettle','Female','ckettle1s@networksolutions.com'),(66,'Camilla Ivanuschka','Female','civanuschka1t@skyrock.com'),(67,'Cecilia Ewbanck','Female','cewbanck1u@toplist.cz'),(68,'Faun Whales','Female','fwhales1v@bizjournals.com'),(69,'Shaun Bretland','Male','sbretland1w@wisc.edu'),(70,'Nathanil Cockerham','Male','ncockerham1x@google.it'),(71,'Elinor Mottershead','Female','emottershead1y@joomla.org'),(72,'Milka Bridgnell','Female','mbridgnell1z@nps.gov'),(73,'Ruthe Coolson','Female','rcoolson20@nymag.com'),(74,'King Cottrell','Male','kcottrell21@yellowpages.com'),(75,'Lorin De Vere','Male','lde22@multiply.com'),(76,'Lavina Wilks','Female','lwilks23@si.edu'),(77,'Arley Escoffier','Male','aescoffier24@answers.com'),(78,'Jase Langridge','Male','jlangridge25@xinhuanet.com'),(79,'Gerrilee Jagson','Female','gjagson26@oracle.com'),(80,'Lesley Stove','Female','lstove27@youku.com'),(81,'Konstance Bambury','Female','kbambury28@i2i.jp'),(82,'Phaedra Nyland','Female','pnyland29@jimdo.com'),(83,'Codee Beyn','Female','cbeyn2a@google.ca'),(84,'Tatum Rehorek','Female','trehorek2b@netvibes.com'),(85,'Rayner Edelston','Male','redelston2c@ifeng.com'),(86,'Ilario Hinrich','Male','ihinrich2d@livejournal.com'),(87,'Hans Gilstoun','Male','hgilstoun2e@cbsnews.com'),(88,'Millard Skeleton','Male','mskeleton2f@state.tx.us'),(89,'Gregor Paridge','Male','gparidge2g@spiegel.de'),(90,'Daron Kenrat','Male','dkenrat2h@tiny.cc'),(91,'Kendricks Stainburn','Male','kstainburn2i@vkontakte.ru'),(92,'Ellene Potzold','Female','epotzold2j@fotki.com'),(93,'Maison Ciccetti','Male','mciccetti2k@utexas.edu'),(94,'Boony Innes','Male','binnes2l@redcross.org'),(95,'Cobb Bernardeau','Male','cbernardeau2m@dyndns.org'),(96,'Orelie Boullin','Female','oboullin2n@eepurl.com'),(97,'Cirstoforo Arnaldy','Male','carnaldy2o@boston.com'),(98,'Khalil Baudrey','Male','kbaudrey2p@hubpages.com'),(99,'Andrea Bramont','Male','abramont2q@icq.com'),(100,'Laurie Emsden','Female','lemsden2r@list-manage.com');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `tid` int(11) NOT NULL,
  `leader_id` int(11) DEFAULT NULL,
  `no_of_members` int(11) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,34,4),(2,66,1),(3,85,3),(4,84,1),(5,95,2),(6,23,3),(7,4,3),(8,69,2),(9,52,3),(10,16,4),(11,51,4),(12,82,2),(13,9,4),(14,45,4),(15,73,1),(16,64,3),(17,NULL,2),(18,71,2),(19,7,4),(20,NULL,2),(21,32,2),(22,86,2),(23,50,2),(24,NULL,2),(25,39,2),(26,94,3),(27,14,2),(28,63,3),(29,42,3),(30,24,2);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'comp353_warm_up_project'
--

--
-- Dumping routines for database 'comp353_warm_up_project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-14 14:48:44
