-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: survey
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `campuses`
--

DROP TABLE IF EXISTS `campuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campuses` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `campus` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campuses`
--

LOCK TABLES `campuses` WRITE;
/*!40000 ALTER TABLE `campuses` DISABLE KEYS */;
INSERT INTO `campuses` VALUES (1,'Aba','2022-08-22 12:29:50','2022-08-22 12:29:50'),(2,'Abeokuta','2022-08-22 12:29:50','2022-08-22 12:29:50'),(3,'Abuja','2022-08-22 12:30:35','2022-08-22 12:30:35'),(4,'Ado-ekiti','2022-08-22 12:30:35','2022-08-22 12:30:35'),(5,'Akure','2022-08-22 12:30:59','2022-08-22 12:30:59'),(6,'Benin','2022-08-22 12:34:10','2022-08-22 12:34:10'),(7,'Calabar','2022-08-22 12:34:10','2022-08-22 12:34:10'),(8,'Delta','2022-08-22 12:34:41','2022-08-22 12:34:41'),(9,'Port-harcourt','2022-08-22 12:34:41','2022-08-22 12:34:41'),(10,'Uyo','2022-08-22 12:34:58','2022-08-22 12:34:58'),(11,'Yenogoa','2022-08-22 12:34:58','2022-08-22 12:34:58'),(12,'Enugu','2022-08-22 12:35:22','2022-08-22 12:35:22'),(13,'Onitsha','2022-08-22 12:35:22','2022-08-22 12:35:22'),(14,'Owerri','2022-08-22 12:35:40','2022-08-22 12:35:40'),(15,'Ibadan','2022-08-22 12:35:40','2022-08-22 12:35:40'),(16,'Ilorin','2022-08-22 12:37:03','2022-08-22 12:37:03'),(17,'Lagos','2022-08-22 12:37:03','2022-08-22 12:37:03'),(18,'Osogbo','2022-08-22 12:37:20','2022-08-22 12:37:20'),(19,'Jalingo','2022-08-22 12:37:20','2022-08-22 12:37:20'),(20,'Kaduna','2022-08-22 12:37:45','2022-08-22 12:37:45'),(21,'Lafia','2022-08-22 12:37:45','2022-08-22 12:37:45'),(22,'Yola','2022-08-22 12:37:55','2022-08-22 12:37:55');
/*!40000 ALTER TABLE `campuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes` (
  `student_class` varchar(15) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES ('Basic 7',1),('Basic 8',2),('Basic 9',3),('SSS 1',4),('SSS 2',5),('SSS 3',6);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `question_tab` varchar(200) NOT NULL,
  `targets_id` int DEFAULT NULL,
  `classes_id` int DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_targets` (`targets_id`),
  KEY `fk_classes` (`classes_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`targets_id`) REFERENCES `targets` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'is html easy to learn?',1,1,'2021-11-12 11:35:07',NULL),(2,'who is the ceo of google',1,1,'2021-11-12 11:40:48',NULL),(3,'gsdfjksdfsdjkfsdjhdsjfjkdfjkdfdsdddf',1,1,'2021-11-12 11:35:07',NULL),(4,'who is the ceo of facebook',1,3,'2021-11-12 11:40:36',NULL),(5,'who is google ceo',1,2,'2021-11-12 11:37:50','2021-11-16 14:17:15'),(6,'sdxdasdasdasdasd',1,2,'2021-11-12 11:37:50',NULL),(7,'fcgdgrcfdxbf',1,2,'2021-11-12 11:37:50',NULL),(8,'sdxdasdasdasdasd',1,2,'2021-11-12 11:37:50',NULL),(9,'do you understand the concept of oop?',1,4,'2021-11-12 11:38:39',NULL),(10,'sdsdsdasdas',1,4,'2021-11-12 11:38:39',NULL),(11,'what is ur name',2,NULL,'2021-11-15 17:22:50',NULL),(12,'please sing for me',2,NULL,'2021-11-15 17:22:50',NULL),(13,'jhfjgjkugjkjkh',2,NULL,'2021-11-15 17:22:50',NULL),(14,'please dance for me',2,NULL,'2021-11-15 17:22:50',NULL),(15,'asdfsdfsfsdfcsdfsd',2,NULL,'2021-11-15 17:23:42',NULL),(16,'zxcxvscsdfcsdcdfedwcsafwed',2,NULL,'2021-11-15 17:23:42',NULL),(17,'asdfsdfsfsdfcsdfsd',2,NULL,'2021-11-15 17:23:42',NULL),(18,'zxcxvscsdfcsdcdfedwcsafwed',2,NULL,'2021-11-15 17:23:42',NULL),(19,'is html easy to learn',2,1,NULL,NULL),(20,'qwertyrtr',1,2,NULL,NULL),(21,'goodere',2,2,NULL,NULL),(23,'erweweffsd',2,2,NULL,NULL),(24,'errsdfsdfsd',1,1,NULL,NULL),(25,'qwere',1,3,NULL,NULL),(26,'dfewrdfs',1,5,NULL,NULL),(27,'question1',1,4,NULL,NULL),(28,'question3',1,6,NULL,NULL),(29,'question4',1,5,NULL,NULL),(30,'question1',1,4,NULL,NULL),(31,'question3',1,6,NULL,NULL),(32,'question4',1,5,NULL,NULL),(33,'OOP is better than procedurial programming?',1,5,'2021-11-16 11:32:28',NULL),(34,'html is the best thing to learn while starting programming?',1,5,'2021-11-16 11:32:28',NULL),(35,'question4',1,5,'2021-11-16 11:32:28',NULL),(36,'question1',1,4,'2021-11-16 11:32:51',NULL),(37,'question3',1,6,'2021-11-16 11:32:51',NULL),(38,'question4',1,5,'2021-11-16 11:32:51',NULL),(39,'Questions_tab',1,1,'2022-09-15 19:40:39',NULL),(40,'do you like the class',1,1,'2022-09-15 19:40:39',NULL),(41,'will you want me to be your future teacher',1,1,'2022-09-15 19:40:40',NULL),(42,'what will you do with your coding knowledge',1,1,'2022-09-15 19:40:40',NULL),(43,'Questions_tab',1,2,'2022-09-15 19:42:28',NULL),(44,'\"do you like the class\"',1,2,'2022-09-15 19:42:28',NULL),(45,'Questions_tab',1,5,'2022-09-15 19:47:59',NULL),(46,'\"do you like the class\"',1,5,'2022-09-15 19:47:59',NULL),(47,'Questions_tab',1,4,'2022-09-15 19:59:45',NULL),(48,'\"do you like the class\"',1,4,'2022-09-15 19:59:45',NULL),(49,'will you want me to be your future teacher\'s',1,4,'2022-09-15 19:59:45',NULL),(50,'what will you do with your coding knowledge',1,4,'2022-09-15 19:59:45',NULL),(51,'\"do you like the class\"',1,3,'2022-09-15 21:27:01',NULL),(52,'will you want me to be your future teacher\'s',1,3,'2022-09-15 21:27:01',NULL),(53,'what will you do with your coding knowledge',1,3,'2022-09-15 21:27:01',NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `responses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `response_tab` varchar(200) NOT NULL,
  `questions_id` bigint NOT NULL,
  `classes_id` int DEFAULT NULL,
  `targets_id` int NOT NULL,
  `users_id` bigint NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_id` (`classes_id`),
  KEY `targets_id` (`targets_id`),
  KEY `questions_id` (`questions_id`),
  KEY `users_id` (`users_id`),
  CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`targets_id`) REFERENCES `targets` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `responses_ibfk_4` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `responses_ibfk_5` FOREIGN KEY (`questions_id`) REFERENCES `questions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
INSERT INTO `responses` VALUES (34,'4',11,NULL,2,16,NULL),(35,'3',12,NULL,2,16,NULL),(36,'3',13,NULL,2,16,NULL),(37,'3',14,NULL,2,16,NULL),(38,'2',15,NULL,2,16,NULL),(39,'2',16,NULL,2,16,NULL),(40,'2',17,NULL,2,16,NULL),(41,'1',18,NULL,2,16,NULL),(42,'4',19,NULL,2,16,NULL),(43,'1',21,NULL,2,16,NULL),(44,'4',23,NULL,2,16,NULL),(45,'4',11,NULL,2,15,NULL),(46,'3',12,NULL,2,15,NULL),(47,'1',13,NULL,2,15,NULL),(48,'1',14,NULL,2,15,NULL),(49,'1',15,NULL,2,15,NULL),(50,'1',16,NULL,2,15,NULL),(51,'4',17,NULL,2,15,NULL),(52,'3',18,NULL,2,15,NULL),(53,'1',19,NULL,2,15,NULL),(54,'2',21,NULL,2,15,NULL),(55,'4',23,NULL,2,15,NULL),(56,'4',11,NULL,2,17,NULL),(57,'1',12,NULL,2,17,NULL),(58,'4',13,NULL,2,17,NULL),(59,'4',14,NULL,2,17,NULL),(60,'4',15,NULL,2,17,NULL),(61,'3',16,NULL,2,17,NULL),(62,'1',17,NULL,2,17,NULL),(63,'1',18,NULL,2,17,NULL),(64,'3',19,NULL,2,17,NULL),(65,'1',21,NULL,2,17,NULL),(66,'1',23,NULL,2,17,NULL),(67,'4',10,4,2,5,NULL),(68,'4',27,4,2,5,NULL),(69,'1',30,4,2,5,NULL),(70,'2',33,4,2,5,NULL),(71,'3',36,4,2,5,NULL),(72,'4',1,1,2,13,NULL),(73,'1',2,1,2,13,NULL),(74,'4',3,1,2,13,NULL),(75,'1',19,1,2,13,NULL),(76,'3',24,1,2,13,NULL),(77,'3',1,1,2,13,NULL),(78,'3',2,1,2,13,NULL),(79,'1',3,1,2,13,NULL),(80,'4',19,1,2,13,NULL),(81,'4',24,1,2,13,NULL),(82,'3',4,3,2,6,NULL),(83,'4',25,3,2,6,NULL),(84,'1',4,3,2,6,NULL),(85,'4',25,3,2,6,NULL),(86,'2',4,3,2,6,NULL),(87,'4',25,3,2,6,NULL),(88,'1',4,3,2,6,NULL),(89,'4',25,3,2,6,NULL),(90,'4',4,3,2,6,NULL),(91,'3',25,3,2,6,NULL),(92,'3',4,3,2,6,NULL),(93,'1',25,3,2,6,NULL),(94,'4',4,3,2,6,NULL),(95,'4',25,3,2,6,NULL),(96,'2',4,3,2,6,NULL),(97,'4',25,3,2,6,NULL),(98,'2',1,1,2,13,NULL),(99,'4',2,1,2,13,NULL),(100,'1',3,1,2,13,NULL),(101,'4',19,1,2,13,NULL),(102,'4',24,1,2,13,NULL),(103,'2',4,3,1,6,NULL),(104,'4',25,3,1,6,NULL),(105,'2',4,3,1,6,NULL),(106,'4',25,3,1,6,NULL),(107,'4',4,3,1,6,NULL),(108,'3',25,3,1,6,NULL),(109,'2',4,3,1,6,NULL),(110,'3',25,3,1,6,NULL),(111,'2',4,3,1,6,NULL),(112,'4',25,3,1,6,NULL),(113,'2',4,3,1,6,NULL),(114,'3',25,3,1,6,NULL),(115,'4',4,3,1,6,NULL),(116,'3',25,3,1,6,NULL),(117,'4',11,NULL,2,19,NULL),(118,'2',12,NULL,2,19,NULL),(119,'1',13,NULL,2,19,NULL),(120,'3',14,NULL,2,19,NULL),(121,'4',15,NULL,2,19,NULL),(122,'3',16,NULL,2,19,NULL),(123,'4',17,NULL,2,19,NULL),(124,'2',18,NULL,2,19,NULL),(125,'4',19,NULL,2,19,NULL),(126,'4',21,NULL,2,19,NULL),(127,'3',23,NULL,2,19,NULL),(128,'1',9,4,1,5,NULL),(129,'4',10,4,1,5,NULL),(130,'3',27,4,1,5,NULL),(131,'4',30,4,1,5,NULL),(132,'1',36,4,1,5,NULL),(133,'4',9,4,1,5,NULL),(134,'3',10,4,1,5,NULL),(135,'2',27,4,1,5,NULL),(136,'4',30,4,1,5,NULL),(137,'3',36,4,1,5,NULL),(138,'4',9,4,1,5,NULL),(139,'4',10,4,1,5,NULL),(140,'4',27,4,1,5,NULL),(141,'4',30,4,1,5,NULL),(142,'3',36,4,1,5,NULL),(143,'3',9,4,1,5,NULL),(144,'3',10,4,1,5,NULL),(145,'2',27,4,1,5,NULL),(146,'3',30,4,1,5,NULL),(147,'3',36,4,1,5,NULL),(148,'4',11,NULL,2,4,NULL),(149,'2',12,NULL,2,4,NULL),(150,'2',13,NULL,2,4,NULL),(151,'4',14,NULL,2,4,NULL),(152,'4',15,NULL,2,4,NULL),(153,'3',16,NULL,2,4,NULL),(154,'4',17,NULL,2,4,NULL),(155,'3',18,NULL,2,4,NULL),(156,'4',19,NULL,2,4,NULL),(157,'3',21,NULL,2,4,NULL),(158,'2',23,NULL,2,4,NULL);
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `targets`
--

DROP TABLE IF EXISTS `targets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `targets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `personnel` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `targets`
--

LOCK TABLES `targets` WRITE;
/*!40000 ALTER TABLE `targets` DISABLE KEYS */;
INSERT INTO `targets` VALUES (1,'students'),(2,'educator');
/*!40000 ALTER TABLE `targets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `admission_num` varchar(25) DEFAULT NULL,
  `classes_id` int DEFAULT NULL,
  `targets_id` int DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `campus_id` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `campus_id` (`campus_id`),
  KEY `targets_id` (`targets_id`),
  KEY `classes_id` (`classes_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campuses` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`targets_id`) REFERENCES `targets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `users_ibfk_3` FOREIGN KEY (`classes_id`) REFERENCES `classes` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'paul','peter','1234',NULL,NULL,2,'81dc9bdb52d04dc20036dbd8313ed055',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(2,'samuel','saul','55555',NULL,NULL,2,'c5fe25896e49ddfe996db7508cf00534',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(3,'sa','ba','6565',NULL,NULL,2,'e615c82aba461681ade82da2da38004a',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(4,'re','re','232',NULL,NULL,2,'232',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(5,'samuel','samson',NULL,'1201',4,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(6,'job','susan',NULL,'1202',3,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(7,'paul','pogba',NULL,'1203',5,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(8,'judas','saul',NULL,'1204',5,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(9,'samuel','peter',NULL,'1205',4,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(10,'steve','brin',NULL,'1206',5,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(11,'jacob','abraham',NULL,'1207',2,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(12,'james','eric',NULL,'1217',4,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(13,'ada','aba',NULL,'1209',1,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(14,'adama','ababa',NULL,'1210',1,1,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(15,'bunmi','seun','08034288553',NULL,NULL,2,'12345',1,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(16,'James','Brown','08143219479',NULL,NULL,2,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(17,'Temi','Tope','09152308989',NULL,NULL,2,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(18,'Adedoyin','Samuel','08033445566',NULL,NULL,2,'12345',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(19,'SARAH','APET','08063582789',NULL,NULL,2,'aherceo2',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(20,'','','',NULL,NULL,2,'',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(21,'Abayomi','Apetu','08035229720',NULL,NULL,2,'aherceo2$',0,'2022-08-22 12:48:57','2022-08-22 12:48:57'),(22,'','',NULL,'',2,1,'12345',NULL,'2022-08-22 16:50:51','2022-08-22 16:50:51'),(23,'harry','kane',NULL,'1431',2,1,'12345',NULL,'2022-08-22 16:50:51','2022-08-22 16:50:51'),(24,'diogo','dalot',NULL,'1432',2,1,'12345',NULL,'2022-08-22 16:50:51','2022-08-22 16:50:51'),(25,'lionel ','messi',NULL,'1430',5,1,'12345',NULL,'2022-08-22 16:54:53','2022-08-22 16:54:53'),(26,'phil','kane',NULL,'1433',5,1,'12345',NULL,'2022-08-22 16:54:53','2022-08-22 16:54:53'),(27,'diogo','dalot',NULL,'1434',5,1,'12345',NULL,'2022-08-22 16:54:53','2022-08-22 16:54:53'),(28,'paul','peter',NULL,'1435',5,1,'12345',NULL,'2022-08-22 16:54:53','2022-08-22 16:54:53'),(29,'sammy','young',NULL,'1436',1,1,'12345',1,'2022-08-22 16:59:26','2022-08-22 16:59:26'),(30,'harry','maguire',NULL,'1437',1,1,'12345',1,'2022-08-22 16:59:26','2022-08-22 16:59:26'),(31,'daley ','blind',NULL,'1438',1,1,'12345',1,'2022-08-22 16:59:26','2022-08-22 16:59:26'),(32,'paul','pascal',NULL,'1439',1,1,'12345',1,'2022-08-22 16:59:26','2022-08-22 16:59:26'),(33,'sammy','young',NULL,'1436',1,1,'12345',1,'2022-08-22 17:04:30','2022-08-22 17:04:30'),(34,'harry','maguire',NULL,'1437',1,1,'12345',1,'2022-08-22 17:04:30','2022-08-22 17:04:30'),(35,'daley','mark',NULL,'1438',1,1,'12345',1,'2022-08-22 17:04:30','2022-08-22 17:04:30'),(36,'paul','pascal',NULL,'1439',1,1,'12345',1,'2022-08-22 17:04:30','2022-08-22 17:04:30'),(37,'sammy','young',NULL,'1436',1,1,'12345',1,'2022-08-22 17:05:12','2022-08-22 17:05:12'),(38,'harry','maguire',NULL,'1437',1,1,'12345',1,'2022-08-22 17:05:12','2022-08-22 17:05:12'),(39,'daley','mark',NULL,'1438',1,1,'12345',1,'2022-08-22 17:05:12','2022-08-22 17:05:12'),(40,'paul','pascal',NULL,'1439',1,1,'12345',1,'2022-08-22 17:05:12','2022-08-22 17:05:12'),(41,'sam','john','09099999999',NULL,NULL,2,'12345678',5,'2022-09-15 12:42:04','2022-09-15 12:42:04'),(42,'dammy','drake','08012345678',NULL,NULL,2,'12345678',10,'2022-09-15 12:47:29','2022-09-15 12:47:29'),(43,'dammy','drake','08012345678',NULL,NULL,2,'12345678',10,'2022-09-15 12:55:03','2022-09-15 12:55:03'),(44,'james','garner','08077777777',NULL,NULL,2,'12345678',8,'2022-09-15 12:55:51','2022-09-15 12:55:51'),(45,'fandy','jan','09012121212',NULL,NULL,2,'25d55ad283aa400af464c76d713c07ad',21,'2022-09-15 12:59:39','2022-09-15 12:59:39'),(46,'tommy','lasisi','09012312312',NULL,NULL,2,'25d55ad283aa400af464c76d713c07ad',4,'2022-09-15 13:15:43','2022-09-15 13:15:43'),(47,'daniel','saul','07011111111',NULL,NULL,2,'81dc9bdb52d04dc20036dbd8313ed055',17,'2022-09-15 13:32:15','2022-09-15 13:32:15'),(48,'james','aruna',NULL,'1231',5,1,'827ccb0eea8a706c4c34a16891f84e7b',17,'2022-09-16 00:12:45','2022-09-16 00:12:45'),(49,'peter','samson',NULL,'1232',5,1,'827ccb0eea8a706c4c34a16891f84e7b',17,'2022-09-16 00:12:45','2022-09-16 00:12:45'),(50,'durk','williams',NULL,'1233',5,1,'827ccb0eea8a706c4c34a16891f84e7b',17,'2022-09-16 00:12:45','2022-09-16 00:12:45'),(51,'peterson ','james',NULL,'1234',5,1,'827ccb0eea8a706c4c34a16891f84e7b',17,'2022-09-16 00:12:45','2022-09-16 00:12:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-16 10:39:25
