CREATE DATABASE  IF NOT EXISTS `comp353_main_project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `comp353_main_project`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: comp353_main_project
-- ------------------------------------------------------
-- Server version	5.7.20-log

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
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(512) NOT NULL,
  `manager_id` int(11) UNSIGNED NOT NULL,
  `manager_start_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  UNIQUE KEY `manager_id_UNIQUE` (`manager_id`),
  CONSTRAINT `manager_id_FOREIGN` FOREIGN KEY (`manager_id`) REFERENCES employee(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'Support',41,'1963-11-10'),(2,'Human Resources',89,'1964-11-10'),(3,'Engineering',36,'1965-11-10'),(4,'Marketing',95,'1966-11-10'),(5,'Sales',69,'1967-11-10'),(6,'Product Management',57,'1967-11-10'),(7,'Business Development',22,'1967-11-10'),(8,'Research and Development',82,'1967-11-10'),(9,'Training',1,'1967-11-10'),(10,'Accounting',51,'1999-10-01');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependent`
--

DROP TABLE IF EXISTS `dependent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependent` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(512) NOT NULL,
  `last_name` varchar(512) NOT NULL,
  `sin` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` char(1) NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sin_UNIQUE` (`sin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependent`
--

LOCK TABLES `dependent` WRITE;
/*!40000 ALTER TABLE `dependent` DISABLE KEYS */;
INSERT INTO `dependent` VALUES (1,'Ravid','Gaylord',473002455,'1963-11-10','M',166),(2,'Natalina','Kleis',108250729,'1951-11-04','F',75),(3,'Gerianne','Hastewell',519957952,'1973-08-20','F',85),(4,'Babb','Nerney',888699165,'1981-02-25','F',38),(5,'Alair','Coppins',291417731,'1945-08-28','M',172),(6,'Vere','Gieraths',217072727,'1987-02-08','F',155),(7,'Normy','Brain',794447722,'1940-03-30','M',197),(8,'Ozzie','Gerbl',800163848,'1959-08-26','M',200),(9,'Ewan','Dickey',287419085,'1979-07-28','M',81),(10,'Earvin','Mustoe',166359268,'1961-10-29','M',188),(11,'Eileen','Pitfield',709809166,'1999-12-17','F',59),(12,'Isacco','Rigney',784695114,'1943-03-20','M',149),(13,'Fonsie','Brookton',461422862,'1944-12-25','M',96),(14,'Alonzo','Pickless',436948391,'1947-09-04','M',28),(15,'Ginevra','Palmer',901866571,'1976-11-20','F',123),(16,'Jarrad','Gardiner',721502540,'1978-11-01','M',21),(17,'Shae','Morris',321487308,'1973-01-03','F',74),(18,'Welby','Winborn',104208768,'1999-10-19','M',25),(19,'Derward','Halling',747349646,'1942-05-15','M',160),(20,'Stepha','Le Teve',477765490,'1965-01-02','F',145),(21,'Rebecka','Greiser',341397604,'1977-12-29','F',132),(22,'Sal','Lecordier',753823837,'1981-08-25','M',83),(23,'Winny','Egdal',422345180,'1972-04-27','F',197),(24,'Ellary','Heaton',340903722,'1982-05-16','M',16),(25,'Enrico','Vecard',151889663,'1948-04-24','M',132),(26,'Sabina','Geall',677221043,'1973-07-29','F',197),(27,'Carline','Whooley',384507760,'1964-04-26','F',97),(28,'Cullen','Dumpleton',813760156,'1943-07-04','M',170),(29,'Tucky','Bonar',329898372,'1951-11-03','M',170),(30,'Garnet','Whitsey',477173588,'1980-05-12','F',84),(31,'Austin','Janton',429868442,'1990-03-22','M',4),(32,'Filippo','Asif',740528681,'1942-09-05','M',76),(33,'Luz','Colhoun',176207158,'1973-04-24','F',97),(34,'Cassius','Farrer',820189026,'1964-09-04','M',37),(35,'Husein','Pennycock',634014883,'1945-08-20','M',37),(36,'Saloma','Cartin',765298154,'1957-12-15','F',133),(37,'Ruddy','Doumerque',864576637,'1971-10-19','M',127),(38,'Marcelo','Assel',283026785,'1987-02-28','M',135),(39,'Lexie','Lucien',863616372,'1982-02-12','F',108),(40,'Valentino','Gabbatt',224948331,'1979-05-05','M',76),(41,'Peggie','Leonards',968988048,'1951-01-30','F',34),(42,'Ambrose','Wark',167295836,'1980-03-30','M',104),(43,'Mariele','Harraway',290994346,'1970-10-09','F',76),(44,'Gennifer','Marling',415308486,'1965-08-28','F',109),(45,'Luce','Kick',124637681,'1974-04-14','M',73),(46,'Hieronymus','Dell Casa',486302966,'1968-05-25','M',77),(47,'Deni','Dilley',280130254,'1958-04-10','F',135),(48,'Meta','Straffon',881125990,'1953-05-17','F',127),(49,'Cherie','Blowing',656586056,'1980-07-22','F',79),(50,'Gino','Coghlin',474966856,'1977-02-10','M',78),(51,'Annabella','Gelsthorpe',604733786,'1964-10-31','F',137),(52,'Armstrong','Ossipenko',456993843,'1945-09-20','M',137),(53,'Isabelita','Annwyl',506432290,'1972-06-23','F',127),(54,'Orelle','McGahey',891852676,'1974-01-26','F',161),(55,'Owen','Crampton',695765215,'1949-08-20','M',163),(56,'Webster','Pulman',733183775,'1958-11-09','M',187),(57,'Kalina','Hails',674885328,'1981-09-06','F',53),(58,'Jermain','Laise',241049066,'1949-12-26','M',157),(59,'Alberto','Deroche',851952233,'1953-11-29','M',57),(60,'Carrol','Caras',187019019,'1959-07-17','M',15),(61,'Pancho','Coppins',151592401,'1990-08-05','M',180),(62,'Winonah','Doul',313426745,'1953-11-27','F',179),(63,'Esmaria','Salvage',884765953,'1976-04-06','F',86),(64,'Dana','Edmondson',366497933,'1946-10-26','F',52),(65,'Brannon','Manser',966544944,'1944-11-12','M',111),(66,'Burton','Livesey',554411071,'1971-08-23','M',183),(67,'Carmina','Bryett',737288880,'1961-03-21','F',4),(68,'Irina','Nayer',606810551,'1961-09-12','F',176),(69,'Micky','Venes',218422096,'1953-02-21','M',164),(70,'Eldredge','Ginman',496719579,'1984-08-31','M',64),(71,'Leandra','Meach',716203353,'1985-06-12','F',63),(72,'Toddie','Kesteven',809220321,'1979-08-05','M',83),(73,'Adella','Palfrie',869195225,'1976-06-16','F',165),(74,'Nevile','Vasilechko',330354624,'1968-10-24','M',125),(75,'Ardith','Byars',925731234,'1960-11-23','F',68),(76,'Buddy','Lillecrap',980420093,'1945-11-07','M',109),(77,'Wilone','Ackers',658878539,'1993-04-10','F',58),(78,'Marj','Lacknor',245695209,'1947-01-26','F',136),(79,'Bernetta','Peyto',234040272,'1987-11-06','F',123),(80,'Arabella','Lacky',550446733,'1948-10-20','F',154),(81,'Maegan','Castano',905559703,'1954-01-02','F',129),(82,'Boony','Kienzle',804064713,'1965-11-02','M',107),(83,'Shaylynn','Rodear',839000800,'1989-10-14','F',99),(84,'Annabal','Dimmick',526123910,'1951-06-06','F',33),(85,'Farrand','Gilvary',159967810,'1949-02-07','F',167),(86,'Tannie','Kneel',267598780,'1974-06-10','M',8),(87,'Vidovik','McCarver',782965288,'1955-06-25','M',162),(88,'Ange','Merrilees',260430197,'1987-09-11','M',144),(89,'Georges','Boame',989840582,'1982-09-13','M',102),(90,'Binky','Langlois',989061860,'1997-08-25','M',134),(91,'Berte','Hurrion',182805346,'1975-02-15','F',113),(92,'Pen','Barton',579142632,'1998-06-06','M',30),(93,'Jessie','Sukbhans',205294835,'1988-10-05','F',95),(94,'Ellary','Fairclough',909132176,'1994-10-23','M',28),(95,'Kristoforo','Chrichton',268572089,'1955-05-21','M',88),(96,'Ricard','Reddington',652119671,'1990-06-14','M',153),(97,'Karly','Canby',191987587,'1981-05-28','F',57),(98,'Else','Sprigin',540569721,'1976-04-15','F',169),(99,'Marcelo','Doole',324191715,'1952-05-09','M',42),(100,'Rodolph','Creedland',158728243,'1990-01-19','M',162),(101,'Si','Gadaud',542447978,'1966-12-31','M',26),(102,'Cornell','Coppock.',673971940,'1976-06-18','M',182),(103,'Pattin','Wymer',562754035,'1942-12-08','M',188),(104,'Deva','Pettigrew',454158796,'1994-06-14','F',95),(105,'Roscoe','Krauze',737624398,'1980-02-14','M',38),(106,'Luis','Sprigin',214125098,'1979-06-26','M',72),(107,'Ivett','Perocci',649951677,'1940-08-23','F',113),(108,'Ilyse','Augustus',928123801,'1993-06-26','F',200),(109,'Vale','Bodocs',250600589,'1975-02-03','M',168),(110,'Lindon','Fulstow',808017059,'1944-03-21','M',116),(111,'Randi','Overthrow',645224862,'1992-07-10','M',190),(112,'Gipsy','Upjohn',904137513,'1997-04-05','F',130),(113,'Bar','Twigg',137012439,'1951-11-09','M',153),(114,'Tamara','Kornyshev',803391745,'1988-06-28','F',191),(115,'Prudence','Goodere',974059382,'1945-11-09','F',34),(116,'Erick','Rosendorf',196591641,'1963-10-31','M',174),(117,'Dinah','Broek',250264036,'1983-06-16','F',114),(118,'Larina','Consadine',564615657,'1999-09-17','F',193),(119,'Orland','Barnet',634597980,'1945-04-15','M',59),(120,'Thayne','Daffey',246699660,'1949-05-10','M',79),(121,'Winfred','Hartigan',436054656,'1988-12-26','M',63),(122,'Tades','Leckenby',391953658,'1977-07-19','M',49),(123,'Killy','Peacey',894070509,'1970-03-18','M',42),(124,'Abbot','Darley',752375543,'1975-02-25','M',55),(125,'Lee','Crothers',506614815,'1979-11-10','M',12),(126,'Jefferey','Tandy',389164046,'1955-03-01','M',56),(127,'Em','de Clerk',112037726,'1980-03-06','F',24),(128,'Rafe','Figin',483761067,'1986-02-15','M',120),(129,'Nola','Pawden',728628666,'1985-01-03','F',68),(130,'Jereme','Occleshaw',666045673,'1999-01-19','M',129),(131,'Peterus','Towndrow',933728543,'1990-07-22','M',146),(132,'Celina','Aleksankin',432606691,'1949-01-20','F',40),(133,'Iver','Rodge',648955009,'1963-06-16','M',88),(134,'Sholom','Scapelhorn',481532283,'1953-06-21','M',24),(135,'Corinna','Klemt',521538232,'1973-02-12','F',19),(136,'Lorain','Cornthwaite',334508728,'1999-02-18','F',44),(137,'Mano','Giacomelli',628737026,'1953-12-23','M',76),(138,'Walton','Joscelyn',364793408,'1970-09-07','M',67),(139,'April','Lorrie',943458470,'1979-10-31','F',32),(140,'Harvey','Blockwell',422161324,'1947-05-01','M',137),(141,'Georgi','Jacquest',689076318,'1963-04-12','M',65),(142,'Vinny','Frede',649659925,'1985-11-17','F',23),(143,'Kalila','Brason',765482949,'1951-03-22','F',130),(144,'Meade','Strover',473041334,'1995-10-07','M',90),(145,'Taite','Blanket',956036726,'1959-03-12','M',127),(146,'Retha','Thayre',728618732,'1968-11-21','F',42),(147,'Ambrosi','Vertey',141592290,'1992-11-06','M',174),(148,'Kip','Follet',771137812,'1984-03-05','M',22),(149,'Tani','Long',577485326,'1971-04-29','F',144),(150,'Perkin','Hatchell',648215706,'1959-03-20','M',91),(151,'Torrey','Castiglio',426048194,'1982-09-08','M',53),(152,'Garrott','Rochford',501081653,'1952-11-16','M',178),(153,'Willi','Trivett',143227139,'1987-01-27','F',90),(154,'Debora','Coster',780867460,'1985-10-09','F',162),(155,'August','Ewert',707772082,'1945-09-13','M',102),(156,'Cassey','Lundberg',252669208,'1940-03-19','F',109),(157,'Farrand','Ramas',724595723,'1956-09-18','F',122),(158,'Cart','Macura',140097989,'1985-03-23','M',10),(159,'Biddie','Stollenhof',100061928,'1986-01-19','F',134),(160,'Hildagard','Cogger',226126846,'1981-09-11','F',19),(161,'Kain','Sute',945366382,'1994-08-19','M',146),(162,'Leland','Mapston',477687599,'1972-08-18','F',178),(163,'Hamlin','Wilmut',246981387,'1967-06-20','M',16),(164,'Reilly','Paolini',435317247,'1997-02-10','M',109),(165,'Jewelle','Mowling',116407085,'1997-02-24','F',182),(166,'Hymie','Shrimpton',276450016,'1965-06-17','M',183),(167,'Wolfgang','Hedling',531329281,'1941-10-21','M',125),(168,'Nani','Hryncewicz',797622598,'1944-10-31','F',162),(169,'Kissie','Seneschal',118792589,'1954-10-18','F',69),(170,'Early','Glinde',227566032,'1988-11-07','M',140),(171,'Nikola','Giorgietto',502796387,'1958-07-01','M',38),(172,'Osmund','Nelligan',374267220,'1970-09-05','M',110),(173,'Lucian','Destouche',813910921,'1958-06-12','M',38),(174,'Edgar','Kelling',521243961,'1998-08-02','M',134),(175,'Derry','Reinhardt',213994141,'1970-07-08','M',192),(176,'Brigida','Coop',122943715,'1967-08-25','F',118),(177,'Ashely','Tallant',706245927,'1970-08-29','F',110),(178,'Rachael','Jacobsson',580039512,'1997-02-28','F',117),(179,'Jakie','Mawtus',253078530,'1945-09-22','M',126),(180,'Nico','Ruffler',290509767,'1981-08-08','M',110),(181,'Sergeant','Rennenbach',828325564,'1972-02-08','M',42),(182,'Caterina','Grocott',362064423,'1998-03-26','F',109),(183,'Lanna','Dewire',569875215,'1981-06-28','F',149),(184,'Webster','Lanfear',677366192,'1999-09-28','M',98),(185,'Gerard','Birtchnell',702818277,'1950-07-03','M',110),(186,'Bridie','La Batie',834909543,'1991-02-28','F',51),(187,'Fredi','Furzer',963777885,'1982-09-02','F',10),(188,'Clemmy','Stockney',818315236,'1986-03-01','F',133),(189,'Suki','McCumskay',343967577,'1970-11-03','F',66),(190,'Allayne','Blasoni',905524749,'1991-03-16','M',60),(191,'Robinet','Merrgen',347121239,'1965-09-03','F',34),(192,'Jessee','Tamburi',860582181,'1976-11-25','M',27),(193,'Ingra','Braddick',383105450,'1968-12-08','M',167),(194,'Kari','Longworth',493477212,'1980-10-15','F',199),(195,'Maurise','Waine',994516685,'1947-07-23','F',176),(196,'Sibelle','Borrow',436937264,'1978-12-11','F',139),(197,'Kip','Camis',760829946,'1963-08-02','F',117),(198,'Arnold','Monks',523902638,'1977-10-23','M',167),(199,'Cristiano','Camamill',756535249,'1963-04-21','M',35),(200,'Ethan','Crinson',838631478,'1942-05-08','M',182),(201,'Nonnah','Powell',484974458,'1943-10-19','F',46),(202,'Lynsey','Dullaghan',941979572,'1952-06-15','F',156),(203,'Lawton','Fiddymont',674769642,'1988-04-13','M',90),(204,'Benedetta','Glackin',416094761,'1997-03-26','F',62),(205,'Oliviero','Jude',747339338,'1967-01-11','M',19),(206,'Giuditta','Collaton',489883021,'1955-06-17','F',37),(207,'Myrwyn','McJerrow',417765220,'1961-02-25','M',39),(208,'Amie','Ainscough',508004744,'1954-05-22','F',104),(209,'Terri','Fishlee',687606261,'1992-08-22','F',80),(210,'Feodora','Cavaney',471095924,'1961-10-17','F',154),(211,'Felecia','Margiotta',126841560,'1972-09-30','F',149),(212,'Rosamond','Chaplyn',434275122,'1957-10-15','F',6),(213,'Caterina','Merigon',670981737,'1940-03-13','F',2),(214,'Gilligan','Restorick',344135639,'1987-12-25','F',113),(215,'Sileas','Dermot',136142400,'1949-01-19','F',158),(216,'Deeyn','Calder',623021285,'1942-02-25','F',54),(217,'Cahra','Peddie',615803089,'1945-06-05','F',63),(218,'Thatcher','Benedyktowicz',278236973,'1962-09-09','M',32),(219,'Thornie','O\'Dea',784445121,'1969-09-19','M',194),(220,'Marcela','Rollett',223465905,'1997-09-29','F',42),(221,'Amery','MacGillavery',127207063,'1990-11-28','M',30),(222,'Adella','Dunrige',948922732,'1941-03-16','F',197),(223,'Agretha','Mawby',318794379,'1976-06-09','F',129),(224,'Maddalena','Hanaford',127423204,'1966-05-02','F',169),(225,'Leda','Hargate',118999763,'1981-06-08','F',121),(226,'Gay','Tripean',497694044,'1972-06-22','F',22),(227,'Elyssa','Flecknell',566541439,'1961-01-09','F',56),(228,'Dur','Vela',229075848,'1946-12-06','M',2),(229,'Langston','Bleythin',619932002,'1992-02-17','M',185),(230,'Cheslie','Godley',765152627,'1961-08-31','F',179),(231,'Giuseppe','Rickett',175836533,'1958-07-06','M',128),(232,'Hi','Seiller',738209783,'1997-02-18','M',82),(233,'Daveta','Lauret',171309895,'1964-07-25','F',135),(234,'Deidre','Inker',280239381,'1950-03-11','F',85),(235,'George','McHan',725833072,'1940-12-03','F',123),(236,'Kate','Piotr',963958099,'1975-09-10','F',26),(237,'Daren','Arnholdt',192342221,'1965-09-21','M',3),(238,'Silvano','Ulster',204966466,'1943-02-28','M',85),(239,'Allene','Liddall',492719655,'1981-07-04','F',107),(240,'Perkin','Weed',604911022,'1963-04-05','M',116),(241,'Tiffie','Baison',894930236,'1974-05-07','F',127),(242,'Derick','Freshwater',880438129,'1942-06-17','M',89),(243,'Shep','Martinuzzi',280037200,'1945-07-14','M',57),(244,'Stefania','Klimschak',526723601,'1993-09-26','F',41),(245,'Flora','Davidde',167814867,'1975-12-07','F',198),(246,'Jazmin','Alphege',987178849,'1954-08-01','F',56),(247,'Cassandra','Etuck',522560669,'1983-07-20','F',43),(248,'Dolorita','Mellmoth',694200228,'1965-03-07','F',172),(249,'Cody','Edmondson',357572617,'1967-09-17','F',82),(250,'Haskel','Sim',428321817,'1981-07-26','M',107),(251,'Petunia','Novakovic',769208970,'1957-08-26','F',198),(252,'Cammi','Duckels',952896027,'1979-05-10','F',42),(253,'Johny','Ibotson',927657957,'1952-06-05','M',71),(254,'Delbert','Pickerin',705518506,'1996-11-26','M',2),(255,'Ced','O\'Hagerty',299852460,'1982-02-04','M',52),(256,'Meredeth','Beall',874836584,'1992-01-15','M',82),(257,'Kirby','Wyss',415548571,'1942-06-20','M',57),(258,'Mikey','Woodberry',328565099,'1966-05-14','M',135),(259,'Efrem','Cersey',932598528,'1976-03-31','M',17),(260,'Felicle','Giovanni',689998129,'1957-08-19','F',151),(261,'Fanechka','Rogan',805888356,'1961-06-19','F',7),(262,'Ebonee','Drewitt',704732772,'1982-01-21','F',163),(263,'Janeta','McComb',720952290,'1991-04-08','F',51),(264,'Flory','Jarrette',456641034,'1970-06-07','M',120),(265,'Phyllis','Tame',817576091,'1965-11-23','F',180),(266,'Leonie','Garrick',476848173,'1995-10-31','F',124),(267,'Felicio','Lane',316546530,'1954-04-25','M',169),(268,'Hogan','Doody',134287376,'1986-06-24','M',145),(269,'Darsie','Hessenthaler',540718323,'1941-05-25','F',143),(270,'Lolly','Sivorn',768109302,'1974-11-16','F',155),(271,'Purcell','Carling',247072439,'1950-03-19','M',71),(272,'Far','Boatswain',898796814,'1941-08-24','M',120),(273,'Edlin','Solley',945836074,'1955-03-25','M',179),(274,'Ruy','Dailey',289827265,'1957-10-29','M',175),(275,'Mikaela','Greetland',330039553,'1980-02-24','F',141),(276,'Hermy','Fonte',701997131,'1999-08-17','M',95),(277,'Ryley','Suffe',791455916,'1940-04-04','M',95),(278,'Belinda','Matteacci',555853005,'1942-08-06','F',182),(279,'Hashim','Slucock',925543383,'1965-02-22','M',42),(280,'Daniella','Ferreli',643471483,'1984-11-17','F',26),(281,'Elisabetta','Gohn',357549514,'1974-07-15','F',97),(282,'Emerson','Strowger',365875188,'1944-04-25','M',79),(283,'Westbrook','Tewkesbury.',560087597,'1971-01-10','M',184),(284,'Hurleigh','Atcheson',914532362,'1952-03-30','M',105),(285,'Nero','Fosten',833635731,'1985-08-23','M',59),(286,'Nyssa','Charley',997847245,'1982-11-29','F',20),(287,'John','Bastistini',794156419,'1960-08-27','M',15),(288,'Ernesta','Aries',658965404,'1973-02-25','F',183),(289,'Marcello','Harlock',528913671,'1991-05-02','M',31),(290,'Dannie','Maxweell',472656834,'1947-03-01','M',4),(291,'Dave','Downe',146133107,'1976-03-12','M',183),(292,'Melicent','Jedrzaszkiewicz',627206427,'1948-11-01','F',82),(293,'Hale','MacCorkell',738876320,'1951-09-13','M',42),(294,'Celestine','Hasted',793384213,'1979-04-20','F',27),(295,'Bernie','Coope',739786043,'1964-04-21','M',104),(296,'Seamus','Wheble',133047062,'1967-03-28','M',109),(297,'Dannel','Dedman',737429532,'1982-10-24','M',70),(298,'Joelie','McInnes',251104773,'1953-12-11','F',52),(299,'Olenka','Wheadon',160490817,'1991-08-06','F',123),(300,'Ula','Bouchard',878218390,'1990-02-19','F',199);
/*!40000 ALTER TABLE `dependent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sin` int(11) UNSIGNED NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(512) NOT NULL,
  `phone` char(12) DEFAULT NULL,
  `salary` DECIMAL(5,2) UNSIGNED NOT NULL,
  `gender` char(1) NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sin_UNIQUE` (`sin`),
  CONSTRAINT `department_id_FOREIGN` FOREIGN KEY(`department_id`) references department(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Tressa','Brotherhood',605857052,'1959-11-20','1408 Pawling Trail','120-252-6183',13.50,'F',6),(2,'Fernande','Fautly',268499373,'1973-12-21','73 Harbort Court','596-241-9194',13.50,'F',4),(3,'Nester','Panter',799213469,'1967-04-14','51133 Brentwood Road','137-408-0191',13.50,'M',3),(4,'Jabez','Martinson',796555673,'1993-07-28','85 Morningstar Road','129-252-6939',13.50,'M',3),(5,'Orly','Ullyatt',571255789,'1990-10-29','4 Menomonie Center','687-393-3054',13.50,'F',1),(6,'Joellen','Penrose',388456768,'1968-05-21','85617 Lunder Place','516-891-5080',13.50,'F',6),(7,'Demott','Van Salzberger',546726437,'1975-08-25','84 Rigney Center','786-765-8243',13.50,'M',1),(8,'Vinson','Cummungs',975357351,'1994-01-31','07 Sherman Pass','438-698-0881',13.50,'M',5),(9,'Judith','MacTrustam',636919039,'1992-10-09','8164 Sunfield Crossing','930-272-2446',13.50,'F',8),(10,'Rorke','Ilyas',893535672,'1994-02-16','04 Barnett Circle','569-272-8220',14.50,'M',8),(11,'Lazaro','Rosenqvist',429326728,'2000-03-13','1 Gale Drive','704-566-3790',14.50,'M',2),(12,'Jorge','Lydiatt',200076104,'1971-02-14','93685 Donald Way','582-275-4587',14.50,'M',6),(13,'Josephine','Hand',919927628,'1953-08-01','19651 Mesta Park','856-598-3371',14.50,'F',5),(14,'Brendis','McCuthais',594362881,'1956-02-21','730 Forest Run Pass','781-270-0111',14.50,'M',10),(15,'Meghan','Jorger',521758142,'1991-05-13','426 David Terrace','565-887-5772',14.50,'F',7),(16,'Ritchie','Keepin',959603070,'1984-09-13','924 Cardinal Plaza','950-635-2489',14.50,'M',4),(17,'Suki','Kunath',551746692,'1980-11-04','46445 Morning Parkway','682-637-9792',14.50,'F',3),(18,'Brod','Tudgay',905732700,'2001-08-18','209 Mitchell Plaza','183-945-3108',14.50,'M',3),(19,'Freeland','Leeds',958109802,'1995-03-13','508 Miller Point','493-823-5114',14.50,'M',10),(20,'Nolan','Dunseath',173745149,'1969-08-19','71 Buhler Crossing','805-162-9207',14.50,'M',7),(21,'Taddeusz','Heaney',468048895,'1977-06-23','7545 Mayfield Park','181-135-7123',14.50,'M',8),(22,'Bondie','Rouzet',955030058,'1959-04-06','6 Eggendart Junction','569-491-6862',14.50,'M',7),(23,'Doe','Gibbons',573815455,'1973-07-21','44638 Thierer Trail','788-733-2861',14.50,'F',6),(24,'Saree','Riediger',830101193,'1991-04-25','90 South Drive','490-816-9778',15.50,'F',4),(25,'Cassey','Frowd',910503720,'1980-11-03','4748 Mcguire Center','187-660-5966',15.50,'F',6),(26,'Alvin','Pottberry',344759659,'1950-11-20','8616 Westerfield Drive','805-129-9484',15.50,'M',5),(27,'Lyell','Conerding',947214505,'1989-07-15','01 Oak Court','217-400-1334',15.50,'M',4),(28,'Nita','Yepiskov',837855132,'1966-09-16','69702 Pawling Alley','911-141-6763',15.50,'F',5),(29,'Corrina','Colston',791419769,'1969-11-15','94 Manitowish Junction','488-554-4692',15.50,'F',2),(30,'Germayne','Duckhouse',486838323,'1988-05-13','772 Sunfield Pass','559-309-5303',15.50,'M',7),(31,'Micah','Gluyus',647678085,'1959-05-08','1227 Boyd Street','991-354-9950',15.50,'M',3),(32,'Merrill','Baxill',126787110,'2001-02-11','1113 6th Junction','386-279-1862',15.50,'M',6),(33,'Leanora','Ramshaw',671108795,'1970-10-07','25839 Center Lane','139-924-5772',15.50,'F',7),(34,'Elysee','Wrassell',947300324,'1983-08-17','04 7th Junction','733-117-9048',15.50,'F',5),(35,'Charisse','McKeown',739071354,'1978-04-08','3 Spenser Road','441-107-7327',15.50,'F',4),(36,'Roslyn','Parlour',975823285,'1990-11-17','26972 Dakota Place','379-277-7632',15.50,'F',1),(37,'Maxy','Pass',132924113,'1993-03-21','221 Lotheville Terrace','613-396-6305',15.50,'M',6),(38,'Reeva','Grinley',264895882,'1952-08-01','53 Hoffman Circle','491-825-0125',15.50,'F',2),(39,'Enrichetta','Pittoli',435297480,'1989-05-10','9 Gale Pass','400-258-2902',15.50,'F',10),(40,'Brendon','Sumption',957425966,'1960-10-24','7 North Hill','685-288-6916',15.50,'M',6),(41,'Lorri','Mokes',938165412,'2001-08-01','948 Schlimgen Place','896-722-3737',15.50,'F',5),(42,'Thia','Cornejo',668496595,'1981-01-11','34 Marquette Point','967-382-0520',15.50,'F',1),(43,'Finlay','Eldered',414206581,'1989-09-29','3 Ruskin Lane','904-852-3964',15.50,'M',3),(44,'Geraldine','Monnelly',864511159,'1952-02-22','6143 Fallview Street','717-107-6869',15.50,'F',2),(45,'Lance','Ravenscraft',496964508,'1997-07-13','06742 Leroy Road','773-271-8049',15.50,'M',10),(46,'Klaus','Willey',990847527,'1973-10-24','41 Graedel Way','686-932-5228',15.50,'M',8),(47,'Kenneth','Iacopini',777179014,'1956-04-03','5250 Crest Line Plaza','934-581-7533',15.50,'M',10),(48,'Odey','Matelyunas',198984198,'1984-09-30','6 Quincy Lane','506-871-0771',15.50,'M',6),(49,'Teresa','Maymand',231134364,'1979-04-02','8988 Raven Point','683-467-6249',16.50,'F',2),(50,'Erma','Ionn',133138246,'1960-04-18','6 Daystar Avenue','967-308-5331',16.50,'F',7),(51,'Fae','Michelle',131561407,'1966-05-06','80048 Hayes Parkway','777-220-1637',16.50,'F',1),(52,'Arnold','Neeves',500488425,'1998-06-19','6 Victoria Park','510-689-4236',16.50,'M',6),(53,'Verene','Melendez',959341173,'1980-01-20','9 Fairfield Way','211-322-1221',16.50,'F',7),(54,'Nicolais','Dericut',514436177,'1971-08-06','4 Independence Road','689-673-1707',16.50,'M',1),(55,'Mahmud','Paolino',646886636,'1977-07-12','12 Nelson Junction','937-819-8757',16.50,'M',6),(56,'Magdalena','Tunn',200833144,'1964-07-24','893 Kenwood Junction','122-736-8518',16.50,'F',5),(57,'Tymon','Uff',716944630,'1981-11-11','93601 Mendota Avenue','453-413-4451',16.50,'M',9),(58,'Kaleena','Megany',812818497,'1963-02-20','533 Lakewood Terrace','358-379-9113',16.50,'F',4),(59,'Orran','Hurley',578405456,'2001-03-09','5784 Eagle Crest Center','963-700-9636',16.50,'M',7),(60,'Johnnie','Trippitt',726713970,'1957-10-08','21717 Emmet Road','398-766-2668',16.50,'M',2),(61,'Francene','Collopy',405403909,'1998-01-05','4 Bunting Circle','631-629-2105',16.50,'F',7),(62,'Mel','Krates',379079305,'1974-04-18','2743 Debra Way','700-874-5459',16.50,'F',3),(63,'Bernie','Tilmouth',529071060,'1974-04-07','946 Banding Court','229-204-8528',16.50,'M',5),(64,'Nichole','Ferri',235515763,'1983-06-24','716 Carioca Parkway','987-680-7159',16.50,'M',6),(65,'Klemens','Cromack',948049138,'1958-04-05','147 Clarendon Lane','448-306-6071',16.50,'M',2),(66,'Timoteo','Bearns',645357480,'1983-01-08','8 Schurz Lane','987-875-1399',16.50,'M',2),(67,'Nertie','Kilmartin',306683181,'1955-05-04','1 Homewood Park','329-450-2310',16.50,'F',8),(68,'Fedora','Arnaez',530036875,'1982-05-24','4599 Crescent Oaks Way','688-239-6154',16.50,'F',3),(69,'Diane-marie','Cordrey',982803680,'1953-05-01','16646 Hazelcrest Terrace','112-988-7764',16.50,'F',2),(70,'Ulrikaumeko','Bartlomieczak',910331289,'1968-04-03','2027 Pine View Center','740-104-0670',17.99,'F',1),(71,'Concordia','Whitehorne',818466930,'1994-08-11','50085 Veith Parkway','586-392-8841',17.99,'F',10),(72,'Ludovico','Boydon',289523565,'1966-02-10','45166 Montana Crossing','202-213-3647',17.99,'M',8),(73,'Gussy','Pilger',489367799,'1994-10-23','19782 Fremont Pass','350-368-6248',17.99,'F',3),(74,'Allister','Ragate',738005544,'1960-11-14','23766 Quincy Drive','503-641-8533',17.99,'M',4),(75,'Marchelle','Romain',159308508,'1973-11-21','0 La Follette Circle','186-618-6351',17.99,'F',3),(76,'Morris','Edridge',103419488,'1972-07-09','60 Russell Center','955-833-8359',17.99,'M',2),(77,'Jaymee','Arnell',980024407,'1980-06-04','01141 Lakewood Gardens Plaza','536-812-5502',17.99,'F',8),(78,'Amara','Stowe',103974857,'1973-01-10','7 Delladonna Plaza','950-881-9483',17.99,'F',4),(79,'Arlinda','Wheildon',951666254,'1988-01-28','441 Nancy Crossing','705-786-1126',17.99,'F',5),(80,'Letizia','Cardo',211201486,'1972-08-26','17694 Lunder Lane','200-337-1007',17.99,'F',7),(81,'Nigel','Tomasini',827738440,'1960-12-24','02737 Schiller Junction','801-852-4085',17.99,'M',2),(82,'Erika','Kempshall',111921038,'1958-09-24','74 Stoughton Parkway','716-539-1748',17.99,'F',6),(83,'Retha','Sare',543678103,'1979-05-24','719 Myrtle Junction','146-504-2647',17.99,'F',8),(84,'Dewain','Carryer',338409865,'1988-08-06','00 Waxwing Drive','193-636-4637',17.99,'M',5),(85,'Der','Jeandeau',773051578,'1995-03-19','00947 Bartillon Center','403-101-0465',17.99,'M',10),(86,'Gerianne','Wybourne',482089358,'1987-04-08','18658 Sunbrook Court','315-587-9268',17.99,'F',4),(87,'Raimondo','Desport',636956070,'1974-10-18','776 Fremont Point','600-737-1124',17.99,'M',2),(88,'Violante','Prinett',809959651,'1985-11-06','1321 Becker Crossing','154-382-2203',17.99,'F',3),(89,'Curr','Chilver',198380641,'1968-12-17','661 Columbus Park','785-379-0403',17.99,'M',2),(90,'Tan','Hollyman',729183337,'1960-03-25','05278 Comanche Lane','982-953-2528',17.99,'M',1),(91,'Alexandr','Mullenger',774598435,'1983-09-24','31930 Iowa Street','744-824-8956',17.99,'M',7),(92,'Elmore','Planks',744662902,'1950-05-31','1 Spenser Plaza','423-517-6781',17.99,'M',4),(93,'Madelina','Thebeaud',763123126,'1995-12-23','11401 Ridge Oak Drive','913-637-6935',17.99,'F',7),(94,'Noreen','Ledwidge',633074589,'1998-08-18','44061 Johnson Junction','221-376-8794',17.99,'F',4),(95,'Imogen','Oldall',737445106,'1956-05-10','93770 Waubesa Avenue','994-772-3589',17.99,'F',9),(96,'Laurent','Whitney',350201904,'1981-12-31','6 Arkansas Terrace','638-430-7051',17.99,'M',4),(97,'Kati','Jakubowski',250338003,'1955-01-15','76133 Hagan Point','782-352-3377',17.99,'F',1),(98,'Dorie','Vaneschi',922778338,'1987-10-06','548 Nova Lane','791-730-8556',17.99,'M',8),(99,'Valentin','Pittwood',535329084,'2000-12-29','9611 Bluestem Place','803-864-6445',17.99,'M',3),(100,'Melvin','Luffman',486918429,'1962-08-11','8 School Drive','713-641-9435',17.99,'M',4),(101,'Mirabelle','Kolinsky',342509023,'1968-05-08','42 Express Parkway','192-223-7108',17.99,'F',3),(102,'Merrel','Bensusan',612129205,'1966-08-10','9 Lawn Alley','116-723-7022',17.99,'M',3),(103,'Duffie','Giraudat',131307804,'1988-09-08','9 Sugar Circle','571-227-7616',24.25,'M',7),(104,'Jordanna','Etty',555146155,'1999-11-04','9257 Sunnyside Road','808-525-8485',24.25,'F',1),(105,'Byrle','Lucas',918115211,'1987-12-20','37621 Dixon Pass','540-671-9274',24.25,'M',2),(106,'Joel','Hymans',959234385,'1950-10-26','75 Saint Paul Junction','284-646-8709',24.25,'M',5),(107,'Garreth','Chastel',276876437,'1968-06-01','7 Marquette Pass','998-271-6796',24.25,'M',2),(108,'Ansel','Riggeard',429283319,'1979-08-05','8554 Dovetail Court','589-773-3968',24.25,'M',3),(109,'Ella','Hrishchenko',230956579,'1963-09-05','2906 Nelson Trail','357-495-3282',24.25,'F',7),(110,'Junette','Zorzetti',271680841,'1973-09-16','4 Ridgeview Terrace','253-866-5303',24.25,'F',2),(111,'Waite','Sakins',580052029,'1953-11-14','48869 Clarendon Street','719-215-2068',24.25,'M',6),(112,'Perle','Huyghe',808079478,'1957-08-20','547 Hazelcrest Place','275-280-4481',24.25,'F',6),(113,'Misti','Brozsset',308353233,'1986-03-23','9815 Stephen Parkway','206-342-3417',24.25,'F',5),(114,'Sterne','London',545221978,'1965-09-09','09505 Roth Alley','149-671-8732',24.25,'M',6),(115,'Renie','Govenlock',938810586,'1986-11-18','5 Gale Road','324-787-2420',24.25,'F',4),(116,'Lavinia','Huntriss',195123384,'1986-07-03','698 Moland Road','432-131-4782',24.25,'F',1),(117,'Venita','Bartak',691149120,'2000-03-10','9 Huxley Street','655-678-5312',24.25,'F',10),(118,'Jorrie','Kmiec',312078787,'1967-09-22','17078 Jenna Trail','224-702-6148',24.25,'F',5),(119,'Gifford','Traylen',225951472,'1967-02-05','6088 Straubel Park','890-238-7378',24.25,'M',2),(120,'Carolann','Lehrer',246848227,'1982-07-24','64965 Prentice Alley','722-617-8412',29.25,'F',1),(121,'Gerti','Saintsbury',172585793,'1986-06-12','7953 Pawling Circle','106-616-4398',29.25,'F',9),(122,'Dosi','Ishaki',102790819,'1972-07-11','00 Sundown Pass','956-870-9944',29.25,'F',6),(123,'Jen','Orrey',412916062,'1967-03-08','7 Service Hill','693-960-3650',29.25,'F',9),(124,'Alfi','Kingshott',734565899,'1978-09-18','28993 Reinke Lane','528-106-4906',29.25,'F',7),(125,'Jacob','LAbbet',809373290,'1965-07-26','240 Banding Street','409-188-7806',29.25,'M',6),(126,'Wittie','Gearty',256600294,'2000-04-26','87 Blackbird Crossing','363-213-2419',29.25,'M',1),(127,'Stephi','Snelle',864637270,'1959-11-12','31 Delladonna Road','309-480-5131',29.25,'F',8),(128,'Frank','Kmicicki',869808485,'2000-03-10','45755 Paget Place','934-852-8881',29.25,'F',9),(129,'Claire','Plaide',769315511,'1952-02-23','52 Prairieview Point','322-257-1825',29.25,'F',7),(130,'Brigham','Brackenridge',993603520,'1966-08-13','42 Mariners Cove Park','561-497-1194',29.25,'M',8),(131,'Katheryn','Ghiraldi',649824925,'1968-07-12','26 Florence Point','927-979-2576',29.25,'F',10),(132,'Toiboid','Achromov',988263315,'1993-01-05','41231 Upham Place','766-662-8295',29.25,'M',5),(133,'Sig','Lanfear',540260581,'1982-01-26','7094 Westerfield Center','330-702-0405',29.25,'M',8),(134,'Lark','Glasscoe',317280672,'1973-08-26','4028 Warbler Drive','128-626-4694',29.25,'F',9),(135,'Sula','Donisi',776243773,'1986-02-14','79 Maple Circle','847-641-9148',29.25,'F',6),(136,'Lisbeth','Bridgstock',156135042,'1993-03-19','0 Rowland Pass','211-214-4866',29.25,'F',6),(137,'Nickey','Poxon',464962701,'1999-10-21','75974 Bay Center','281-317-4974',29.25,'M',10),(138,'Fawne','Crankhorn',875033708,'1966-08-19','8 Forest Dale Crossing','327-775-1967',29.25,'F',6),(139,'Emmalee','Guice',365011594,'1997-08-29','73905 Jackson Court','530-942-6552',29.25,'F',5),(140,'Matilde','Prydie',754565823,'1951-08-25','0 Luster Junction','478-664-6079',29.25,'F',7),(141,'Gabe','McTavish',652909955,'1979-11-17','895 Pennsylvania Avenue','321-985-4689',29.25,'M',6),(142,'Brooks','Larvent',153203212,'1972-05-12','7 Saint Paul Place','695-251-4997',45.25,'M',8),(143,'Elsinore','Paggitt',393858679,'1951-01-01','9 Gulseth Way','909-536-5876',45.25,'F',1),(144,'Guinna','Caneo',302585929,'1967-02-12','901 Homewood Drive','711-148-9317',45.25,'F',6),(145,'Rasia','Karmel',595401819,'1957-07-01','235 Swallow Hill','807-386-7947',45.25,'F',4),(146,'Kippar','Youngs',942141101,'1982-06-22','41 Carey Junction','390-435-9941',45.25,'M',7),(147,'Jabez','Metham',382999338,'1974-01-22','33 Homewood Lane','281-400-5815',45.25,'M',9),(148,'Tadd','Bramhall',370093941,'1952-06-05','4 Coolidge Circle','894-820-7246',45.25,'M',10),(149,'Halette','Pautot',916518375,'1990-07-02','13 Hoffman Plaza','578-933-2791',45.25,'F',2),(150,'Ashia','Brise',347087865,'1994-08-18','18 Lotheville Street','530-916-4769',45.25,'F',9),(151,'Emogene','Spellissy',407139379,'1979-04-25','6 Maywood Plaza','720-124-3579',45.25,'F',4),(152,'Rachael','Grishakin',781846756,'1995-01-11','9065 Forest Dale Junction','768-453-3818',45.25,'F',2),(153,'Michele','Kinsella',976991531,'1967-04-18','06879 Pennsylvania Court','962-274-2626',45.25,'F',3),(154,'Johnathan','Moncreiff',218934155,'1968-01-08','4771 Harper Trail','775-866-2215',45.25,'M',8),(155,'Stuart','Touhig',554523502,'1952-10-17','57144 Monica Terrace','807-754-6618',45.25,'M',1),(156,'Garner','Wethey',608657579,'1958-02-02','5 Drewry Trail','517-553-4530',45.25,'M',6),(157,'Dennet','Tourne',418612322,'1970-01-03','22943 Knutson Avenue','789-369-5743',45.25,'M',1),(158,'Nichol','Heys',158643769,'1967-04-13','84927 Shelley Pass','625-466-8606',45.25,'F',7),(159,'Olympie','Ullyott',854075659,'1983-10-09','5784 Chinook Lane','851-241-6305',45.25,'F',9),(160,'Cointon','Clampett',127150545,'1958-06-27','1252 8th Avenue','460-561-3821',45.25,'M',3),(161,'Torr','Botterill',644091275,'1986-09-12','11 Lighthouse Bay Center','219-892-0792',45.25,'M',7),(162,'Krystal','Chyuerton',209512162,'1979-05-07','63 Dahle Drive','281-812-0349',45.25,'F',9),(163,'Greer','McQuorkel',973939326,'1972-08-28','6 Lukken Road','568-953-7252',100.25,'F',1),(164,'Ronny','Vigneron',439968689,'1998-01-02','14729 Buhler Street','739-715-4681',100.25,'M',5),(165,'Ware','Guess',212986465,'1985-09-29','58 Forest Run Terrace','888-793-6830',100.25,'M',3),(166,'Uriah','Rodolfi',892699129,'1968-02-18','526 Basil Road','384-661-4108',35.25,'M',8),(167,'Ralph','Dunlap',292160709,'1980-12-09','337 Corben Pass','227-671-3505',35.25,'M',10),(168,'Grete','Camus',511558353,'1954-05-15','08 Barnett Place','812-472-0465',35.25,'F',1),(169,'Vassili','Fullom',221965957,'1960-10-25','930 Tomscot Way','509-292-6557',35.25,'M',9),(170,'Hayley','Matejovsky',932579276,'1969-01-21','953 Burning Wood Terrace','721-357-4049',35.25,'F',7),(171,'Inglebert','Balbeck',473511172,'1993-01-28','8790 Upham Junction','402-675-1440',35.25,'M',10),(172,'Johnath','Vassel',277198448,'1983-12-02','15 Sutherland Road','789-700-0830',10.25,'F',6),(173,'Edouard','Sansbury',757011161,'1970-12-02','56018 Basil Terrace','197-489-7571',10.25,'M',10),(174,'Papageno','Hulstrom',402039824,'1955-12-13','311 Blue Bill Park Terrace','736-135-3111',10.25,'M',9),(175,'Carley','Rany',264554612,'1958-01-22','14001 Heffernan Circle','353-584-9878',10.25,'F',2),(176,'Brenden','Gwillyam',761016769,'1992-07-31','68286 Canary Parkway','759-568-3003',10.25,'M',1),(177,'Gibby','Crookshank',988341885,'1986-12-17','4 Tomscot Center','961-355-8593',10.25,'M',10),(178,'Leroy','Janusik',696714696,'1958-06-27','1 Hanover Court','145-223-9229',10.25,'M',8),(179,'Arthur','Coulter',295672021,'1955-04-24','518 Brown Center','309-123-7092',10.25,'M',3),(180,'Anne-corinne','Querree',548956645,'1981-11-15','3 Pond Street','457-808-9945',10.25,'F',3),(181,'Alic','De\'Vere - Hunt',497089269,'1955-04-26','43915 Esch Crossing','663-116-7560',10.25,'M',5),(182,'Nikola','Liebmann',854380997,'1959-11-19','4 Dunning Crossing','770-333-3965',10.25,'M',8),(183,'Brade','Izacenko',440195122,'1950-01-18','2 Caliangt Hill','270-240-7020',10.25,'M',4),(184,'Josselyn','Bilofsky',956928128,'1956-08-26','98056 Schmedeman Street','421-231-9363',10.25,'F',5),(185,'De witt','Sweet',604706978,'1994-12-29','9 Darwin Alley','562-809-1723',10.25,'M',3),(186,'Loutitia','Gallandre',599759471,'1974-04-03','0143 Bartelt Park','148-943-0256',10.25,'F',3),(187,'Parry','Suggey',343935690,'1988-06-26','13 Nancy Lane','509-484-5570',10.25,'M',3),(188,'Avery','Greenacre',677156678,'1982-06-24','39330 Clemons Point','238-831-3298',10.25,'M',7),(189,'Ninnetta','Bravington',866667472,'1978-07-12','44 Fuller Terrace','188-152-0915',10.25,'F',8),(190,'Scarlet','Littlejohns',966451555,'1983-06-05','6 Barby Alley','409-819-2260',10.25,'F',2),(191,'Sofie','Hedau',223756954,'1980-03-28','1 Pine View Court','221-474-8180',10.25,'F',8),(192,'Jess','Tokell',705442144,'1985-12-02','621 Packers Center','837-656-2152',10.25,'F',8),(193,'Valdemar','Tyas',319564623,'1992-01-23','720 Bonner Plaza','859-700-6435',10.25,'M',6),(194,'Herby','Sainsberry',853370316,'1953-11-28','1 Algoma Junction','500-826-7877',10.25,'M',1),(195,'Renae','Habert',309237049,'1962-06-04','3499 Straubel Terrace','753-457-7404',10.25,'F',7),(196,'Angel','Izhak',589359632,'1984-08-30','058 Golf Course Avenue','901-115-4811',5.25,'M',6),(197,'Raeann','Alldread',578284481,'1982-03-04','66 Northport Point','369-740-2761',5.25,'F',5),(198,'Rupert','Ebhardt',350084411,'1993-03-23','19521 Northfield Drive','432-631-7734',5.25,'M',7),(199,'Laverne','Fetherstone',660006850,'1964-09-18','7757 Steensland Lane','789-462-0029',5.25,'F',7),(200,'Sal','Cambling',216851262,'1961-05-26','1 Ryan Hill','905-968-2675',5.25,'M',4);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `located_in`
--

DROP TABLE IF EXISTS `located_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `located_in` (
  `location_id` int(11) UNSIGNED NOT NULL,
  `department_id` int(11) UNSIGNED NOT NULL,
  CONSTRAINT `location_id_FOREIGN` FOREIGN KEY (`location_id`) REFERENCES location(id) ON DELETE CASCADE,
  CONSTRAINT `department_id_FOREIGN-A` FOREIGN KEY (`department_id`) REFERENCES department(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `located_in`
--

LOCK TABLES `located_in` WRITE;
/*!40000 ALTER TABLE `located_in` DISABLE KEYS */;
INSERT INTO `located_in` VALUES (1,2),(1,6),(1,9),(2,1),(2,5),(2,7),(2,8),(2,9),(3,1),(3,2),(3,4),(3,5),(3,7),(3,8),(3,9),(3,10),(4,1),(4,3),(4,9),(5,1),(5,6),(5,8),(5,10);
/*!40000 ALTER TABLE `located_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `address` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'Melvin Center','684 Derek Terrace'),(2,'Milk Plaza','883 Sheridan Plaza'),(3,'Delfino Square','5 Upham Alley'),(4,'United Atrium','6651 Lillian Circle'),(5,'Munister Conglomerate','5 Cambridge Avenue');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(512) DEFAULT NULL,
  `location_id` int(11) UNSIGNED NOT NULL,
  `phase` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Biodex',4,'preliminary'),(2,'Y-Solo',5,'preliminary'),(3,'Flowdesk',3,'preliminary'),(4,'Viva',2,'intermediate'),(5,'Gembucket',2,'intermediate'),(6,'Sonair',4,'advanced'),(7,'Zapister',3,'advanced'),(8,'Konklab',3,'complete'),(9,'Latlux',1,'complete'),(10,'Opela',3,'complete'),(11,'Rank',1,'complete'),(12,'Alpha',2,'complete'),(13,'Tampflex',5,'complete'),(14,'Zathin',4,'complete'),(15,'Tresom',4,'complete'),(16,'Cardguard',2,'complete'),(17,'Deskmate',5,'complete'),(18,'Alphazap',1,'complete'),(19,'Voyatouch',1,'complete'),(20,'Solarbreeze',3,'complete'),(21,'Veradux',3,'complete'),(22,'Tamper',3,'complete'),(23,'Countmate',3,'complete'),(24,'Yamster',3,'complete'),(25,'Y-find',4,'complete'),(26,'Chumbucket',4,'complete'),(27,'Holdlamis',4,'complete'),(28,'Subin',3,'complete'),(29,'SortingPal',1,'complete'),(30,'Ronstring',3,'complete'),(31,'Sonsing',3,'complete'),(32,'Voyager',4,'complete'),(33,'Daltfresh',5,'complete'),(34,'Stim',2,'complete'),(35,'Beta',2,'complete');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responsible_for`
--

DROP TABLE IF EXISTS `responsible_for`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsible_for` (
  `department_id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  CONSTRAINT `department_id_FOREIGN-B` FOREIGN KEY (`department_id`)  REFERENCES department(id) ON DELETE CASCADE,
  CONSTRAINT `project_id_FOREIGN-B` FOREIGN KEY (`project_id`)  REFERENCES project(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsible_for`
--

LOCK TABLES `responsible_for` WRITE;
/*!40000 ALTER TABLE `responsible_for` DISABLE KEYS */;
INSERT INTO `responsible_for` VALUES (1,3),(1,20),(1,27),(1,31),(1,34),(2,9),(2,18),(2,29),(3,1),(3,6),(3,14),(3,26),(3,32),(4,10),(4,24),(5,4),(5,16),(6,11),(6,19),(7,8),(7,12),(7,21),(7,28),(8,2),(8,5),(8,13),(8,22),(8,33),(8,35),(9,7),(9,15),(9,25),(10,17),(10,23),(10,30);
/*!40000 ALTER TABLE `responsible_for` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `employee_id` int(11) UNSIGNED NOT NULL,
  `supervisor_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`employee_id`,`supervisor_id`),
  CONSTRAINT `employee_id_FOREIGN-B` FOREIGN KEY (`employee_id`)  REFERENCES employee(id) ON DELETE CASCADE,
  UNIQUE KEY `employee_id_UNIQUE` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,7),(2,11),(3,17),(4,18),(5,28),(6,31),(7,115),(8,37),(9,41),(10,46),(11,20),(12,51),(13,66),(14,68),(15,70),(16,72),(17,97),(18,52),(19,77),(21,87),(22,94),(23,96),(24,123),(25,125),(26,141),(27,159),(28,115),(29,170),(30,171),(31,52),(32,200),(33,7),(34,11),(35,17),(36,18),(37,52),(38,28),(39,31),(40,37),(41,20),(42,41),(43,46),(44,51),(45,66),(46,20),(47,68),(48,70),(49,72),(50,77),(51,79),(53,87),(54,94),(55,96),(56,123),(57,125),(58,141),(59,159),(60,170),(61,171),(62,200),(63,7),(64,11),(65,17),(66,97),(67,18),(68,52),(69,28),(70,79),(71,31),(72,115),(73,37),(74,41),(75,46),(76,51),(77,79),(78,66),(80,68),(81,70),(82,72),(83,77),(84,87),(85,94),(86,96),(87,97),(88,123),(89,125),(90,141),(91,159),(92,170),(93,171),(94,52),(95,200),(96,97),(98,7),(99,11),(100,17),(101,18),(102,28),(103,31),(104,37),(105,41),(106,46),(107,51),(108,66),(109,68),(110,70),(111,72),(112,77),(113,87),(114,94),(116,96),(117,123),(118,125),(119,141),(120,159),(121,170),(122,171),(123,79),(124,200),(125,115),(126,7),(127,11),(128,17),(129,18),(130,28),(131,31),(132,37),(133,41),(134,46),(135,51),(136,66),(137,68),(138,70),(139,72),(140,77),(141,79),(142,87),(143,94),(144,96),(145,123),(146,125),(147,141),(148,159),(149,170),(150,171),(151,200),(152,7),(153,11),(154,17),(155,18),(156,28),(157,31),(158,37),(159,20),(160,41),(161,46),(162,51),(163,66),(164,68),(165,70),(166,72),(167,77),(168,87),(169,94),(170,20),(171,97),(172,96),(173,123),(174,125),(175,141),(176,159),(177,170),(178,171),(179,200),(180,7),(181,11),(182,17),(183,18),(184,28),(185,31),(186,37),(187,41),(188,46),(189,51),(190,66),(191,68),(192,70),(193,72),(194,77),(195,87),(196,94),(197,96),(198,123),(199,125),(200,115);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works_on`
--

DROP TABLE IF EXISTS `works_on`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_on` (
  `project_id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `hours_worked` int(11) UNSIGNED DEFAULT 0,
   CONSTRAINT `project_id_FOREIGN-A` FOREIGN KEY (`project_id`) REFERENCES project(id) ON DELETE CASCADE,
   CONSTRAINT `employee_id_FOREIGN-A` FOREIGN KEY (`employee_id`) REFERENCES employee(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_on`
--

LOCK TABLES `works_on` WRITE;
/*!40000 ALTER TABLE `works_on` DISABLE KEYS */;
INSERT INTO `works_on` VALUES (1,73,158),(1,75,340), (1,67,49), (1,153,13),(2,67,49),(2,166,306),(2,182,59),(2,192,59),(3,5,38),(3,70,83),(3,116,290),(3,143,233),(3,168,122),(4,8,344),(4,34,56),(4,79,166),(4,84,191),(4,132,168),(4,181,33),(4,197,73),(5,21,252),(5,133,175),(6,17,229),(6,18,188),(6,43,39),(7,95,39),(7,123,14),(7,147,163),(7,162,294),(8,20,310),(8,22,224),(8,30,148),(8,80,131),(8,103,322),(8,146,339),(9,11,65),(9,44,185),(9,66,305),(9,81,101),(9,110,148),(9,175,49),(10,24,121),(10,27,152),(10,58,31),(10,94,168),(10,100,3),(10,115,188),(10,200,238),(11,1,285),(11,12,216),(11,25,26),(11,55,188),(11,112,245),(11,114,241),(11,125,150),(11,135,126),(11,136,86),(11,172,223),(11,193,34),(11,196,308),(12,50,266),(12,59,277),(12,91,151),(12,93,146),(12,109,280),(12,140,242),(12,198,147),(13,10,114),(13,77,280),(13,98,49),(13,189,219),(14,4,116),(14,31,219),(14,62,265),(14,88,295),(14,180,49),(14,185,341),(14,186,28),(15,121,9),(15,150,121),(15,174,68),(16,13,79),(16,26,349),(16,28,300),(16,41,227),(16,56,62),(16,63,147),(16,106,169),(16,113,48),(16,118,154),(16,139,116),(16,164,195),(16,184,114),(17,14,89),(17,45,22),(17,71,310),(17,167,204),(18,38,244),(18,49,116),(18,69,284),(18,89,317),(18,105,107),(18,107,93),(18,119,84),(18,152,295),(19,6,137),(19,23,5),(19,32,296),(19,37,338),(19,40,194),(19,48,86),(19,52,73),(19,64,211),(19,82,248),(19,111,98),(19,122,134),(19,138,268),(19,141,300),(19,144,122),(19,156,312),(20,7,49),(20,90,206),(20,97,193),(20,126,218),(21,15,120),(21,53,106),(21,124,348),(21,129,158),(21,199,332),(22,9,213),(22,72,83),(22,83,2),(22,178,128),(22,191,100),(23,39,281),(23,85,49),(23,131,326),(23,137,236),(23,173,32),(24,2,266),(24,16,103),(24,35,228),(24,74,45),(24,78,224),(24,86,264),(24,92,240),(24,96,24),(24,145,244),(24,151,270),(24,183,49),(25,57,222),(25,128,300),(25,134,109),(25,159,195),(25,169,232),(26,3,349),(26,99,112),(26,102,185),(26,179,274),(26,187,200),(27,36,4),(27,54,20),(27,155,1),(27,157,23),(27,176,253),(28,33,40),(28,61,252),(28,158,105),(28,161,203),(28,170,185),(28,188,82),(28,195,344),(29,29,100),(29,60,211),(29,65,160),(29,76,272),(29,87,293),(29,149,39),(29,190,104),(30,19,11),(30,47,93),(30,117,202),(30,148,87),(30,171,208),(30,177,250),(31,51,252),(31,120,297),(31,163,171),(32,68,299),(32,101,199),(32,108,245),(32,160,136),(32,165,191),(33,46,296),(33,127,290),(33,142,300),(34,42,258),(34,104,7),(34,194,21),(35,130,118),(35,154,100);
/*!40000 ALTER TABLE `works_on` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'comp353_main_project'
--

--
-- Dumping routines for database 'comp353_main_project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-20 15:03:20
