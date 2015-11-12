CREATE DATABASE  IF NOT EXISTS `pnss` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `pnss`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pnss
-- ------------------------------------------------------
-- Server version	5.6.27-0ubuntu0.14.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'category 2','blog'),(3,'category','event'),(4,'category 2','event'),(5,'Yousaf Event','event'),(6,'Yousaf Event','Select Type');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'Inauguration Ceremony',NULL,'1445235082',NULL,'PNSS-1','Lahore ','Pakistan',NULL,NULL,3),(2,'Project Seminar (Faculty)',NULL,'1445235082',NULL,'PNSS-1','Islamabad','Pakistan',NULL,NULL,NULL),(3,'Submission of Proposals by Universities',NULL,'1445235082',NULL,'Submission','Islamabad','Pakistan',NULL,NULL,NULL),(4,'Proposal Evaluation	',NULL,'1445235082',NULL,'Proposal','Karachi','Pakistan',NULL,NULL,NULL),(5,'MoU/Award of work','','1476835200',NULL,'Award','Islamabad','Pakistan',1,NULL,3),(6,'Yousaf Event','ghgfghjfhgfhgfgfhgfg','1466294400','0Eoyaz89.jpg','PNSS-1','Islamabad','Pakistan',1,'City Seminar Center 2',4),(7,'!st','ksjdhkjshdkjfhsdkjfhskdhfksdh','1466294400','0Eoyaz89.jpg','Project','Kashmir','Pakistan',1,'Town Hall',3),(8,'2nd','lkjfljsfdlsjdlfjsdljfsljdflskdj','1466294400','0Eoyaz89.jpg','Project','Kashmir','Pakistan',1,'Town Hall',3),(9,'3rd','shfjgkhfdkjghsdkjfkjhfkhdkjfhkd','1466294400','0Eoyaz89.jpg','Project','Kashmir','Pakistan',1,'Town Hall',3);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`post_id`),
  KEY `fk_images_posts_idx` (`post_id`),
  CONSTRAINT `fk_images_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `button` tinyint(1) DEFAULT NULL,
  `buttonText` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buttonLink` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `have_images` tinyint(1) DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci,
  `icon` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'PNSS Program Overview','<p>The PNSSP will be implemented through collaboration between the national space agency of Pakistan, SUPARCO, and selected universities nationwide. As conceptualized, this project will be fully sponsored and supervised by SUPARCO. The mechanism to impart know-how about satellite design and development to students is through design seminars, workshops and continuous guidance from SUPARCO engineers and senior experts.<br />\r\nThis program will focus to enhance the capacity of universities in space engineering and technology through collaboration in design and development of small satellites for research, technology evaluation, and component validation purposes. It will also provide the opportunity for students to work in inter-disciplinary, inter-university and competitive technical project teams. The PNSSP is being launched with an idea to uplift the overall level of universities/institutes in the domain space technology through series of student satellites. In a nutshell, PNSS program will benefit the education sector as well as space industry of Pakistan.</p>\r\n\r\n<h2>PNSS Program Objectives</h2>\r\n\r\n<p>The key objectives of the Pakistan National Student Satellite Program (PNSSP) are:<br />\r\nEducational Objectives</p>\r\n\r\n<ul>\r\n <li>To propagate Space knowledge into overall educational system of Pakistan at national level.</li>\r\n <li>To create awareness about space technology and nationwide interest particularly in academia of the country.</li>\r\n <li>To inculcate / promote research culture in satellite engineering and technology related fields at university level.</li>\r\n <li>To provide an opportunity for students of leading national universities and institutes to have hands-on experience with the design, fabrication, and realization of a space mission at a minimum cost. </li>\r\n <li>To foster and promote cooperation / collaboration in satellite engineering and technology related areas of mutual interest between SUPARCO and leading universities and institutes of the country.</li>\r\n</ul>\r\n\r\n<p>Technical Objectives</p>\r\n\r\n<ul>\r\n <li>To encourage the use of low-cost technology for space applications.</li>\r\n <li>To develop and qualify small student satellite bus indigenously.</li>\r\n <li>To undertake a well coordinated capacity building program within academia.</li>\r\n <li>To demonstrate standard system-level design, development & integration process to students and impart confidence through in-orbit demonstration of student-designed hardware & software.</li>\r\n</ul>\r\n\r\n<h2>PNSS Program Implementation Philosophy</h2>\r\n\r\n<p><br />\r\nIn view of the fact that level of space knowledge and infrastructure in most of the national universities is either completely inexistent or only rudimentary, the PNSSP is conceived to be implemented in three phases. The level of participation of universities will be progressively augmented in each phase depending upon their motivation level and outcomes/experiences from earlier phases. Hence, a series of satellites will be launched in this program, wherein Pakistan National Student Satellite-1 (PNSS-1) will be the first of the series.</p>\r\n\r\n<h2><br />\r\nPNSSP – Phase 1 (PNSS-1)</h2>\r\n\r\n<p><br />\r\nThe first student satellite, PNSS-1, is aimed to be launched in first phase of this program. In PNSS-1, the responsibility of System Engineering and Program Management will principally lie with SUPARCO. However, participation will be encouraged from selected universities and/or personnel from academia, which already have relevant experience of Space Systems Engineering. In this phase, the design and development of satellite units shall be primarily assigned to the university students in the form of independent projects in order to exploit and polish their skills of hardware and software design. During the whole design process, SUPARCO will continuously supervise and monitor the student activities and its final outcome shall be a fully functional Engineering Model of their respective unit. Manufacturing of Flight Models (FM) of these units, their integration and testing will be the responsibility of SUPARCO. The PNSS-1 is targeted to be launched by the end 2016. </p>\r\n\r\n<h2><br />\r\nPNSSP – Phase 2 (PNSS-2) and Phase 3 (PNSS-3)</h2>\r\n\r\n<p><br />\r\nThe mission objectives and system requirements for these satellites would be different from PNSS-1 satellite. The involvement of universities in these phases will be enhanced based on the experience gained in the preceding phase (PNSS-1). For instance, their involvement in mission design and analysis, system and subsystem engineering may be enhanced depending upon the knowledge absorbed and facilities development during the first phase of the program. The ultimate goal is to develop a low-cost small satellite, capable of operating small scientific or technological payloads, and gradually enabling the universities to undertake design and development of low-cost student satellites independently.</p>','overview','',1,'Download Form','link to form download','img1.jpg',NULL,'<p>Yousaf The PNSSP will be implemented through collaboration between the national space agency of Pakistan, SUPARCO, and selected universities nationwide. As conceptualized, this project will be fully sponsored and supervised by SUPARCO. The mechanism to impart know-how about satellite design and development to students is through design seminars, workshops and continuous guidance from SUPARCO engineers and senior experts. This program will focus to enhance the capacity of universities in space engineering and technology through collaboration in design and development of small satellites for research, technology evaluation, and component validation purposes. It will also provide the opportunity for students to work in inter-disciplinary, inter-university and competitive technical project teams. The PNSSP is being launched with an idea to uplift the overall level of universities/institutes in the domain space technology through series of student satellites. In a nutshell, PNSS program will benefit the education sector as well as space industry of Pakistan.</p>',NULL,0),(2,'To make the planet lively','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.','join','',0,'','',NULL,NULL,NULL,'fa-globe',0),(3,'To save the Rain Water','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.','join','',0,'','',NULL,NULL,NULL,'fa-umbrella',0),(4,'To make Forests Greener','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel.','join','',0,'','',NULL,NULL,NULL,'fa-tree',0),(5,'Major Gen (R) Ahmed Bilal','<p>Pakistan Space and Upper Atmosphere Research Commission (SUPARCO), the national space agency, was established in 1961 as a Committee and was granted the status of a Commission in 1981. SUPARCO is mandated to conduct R&D in space science, space technology, and their peaceful applications in the country. It works towards developing indigenous capabilities in space technology and promoting space applications for socio-economic uplift of the country.</p>','message','',0,'','','chairman1.jpg',NULL,'<p>Pakistan Space and Upper Atmosphere Research Commission (SUPARCO), the national space agency, was established in 1961 as a Committee and was granted the status of a Commission in 1981. SUPARCO is mandated to conduct R&D in space science, space technology, and their peaceful applications in the country. It works towards developing indigenous capabilities in space technology and promoting space applications for socio-economic uplift of the country.</p>',NULL,0),(6,'96 number of elephants<br>killed every day in Africa.','','slide',NULL,0,NULL,NULL,'img2.jpg',NULL,NULL,NULL,0),(7,'Green is the power','Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Nulla convallis egestas rhoncus. Donec facilisis fermentum<br>sem, ac viverra ante luctus vel.','slide',NULL,NULL,NULL,NULL,'img2.jpg',NULL,NULL,NULL,0),(8,'Water for everyone','Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Nulla convallis egestas rhoncus. Donec facilisis fermentum<br>sem, ac viverra ante luctus vel.','slide',NULL,NULL,NULL,NULL,'img2.jpg',NULL,NULL,NULL,0),(18,'GEn koi tn hosi',NULL,'gallery',NULL,NULL,NULL,NULL,'img2.jpg',NULL,NULL,NULL,0),(20,'New Gallery',NULL,'gallery',NULL,NULL,NULL,NULL,'0Eoyaz85.jpg',NULL,NULL,NULL,0),(23,'New Blog Post','<p>Its just an example.</p>','blog','1446163200',NULL,NULL,NULL,'0Eoyaz88.jpg',NULL,'<p>Its an example excerpt.</p>',NULL,1),(24,'new posts','lakdflksdjflksjdflkjsldjfslkdjflsjdlfkjsldjflskjd','blog','1430033',NULL,NULL,NULL,'img2.jpg',NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'Power Control Unit (PCU)'),(2,'Power Distribution Unit (PDU)'),(3,'Battery (BAT)'),(4,'Solar Panel (SPU)'),(5,'Earth Sensor (ERS)'),(6,'Sun Sensor (SNS)'),(7,'GPS Receiver'),(8,'Reaction Wheel (RWL)'),(9,'Magnetometer (MGM)'),(10,'Magnetotorquer (MGT)'),(11,'On-Board Computer (OBC)'),(12,'Data Handling Unit (DHU)'),(13,'Telemetry Transmitter (TMT)'),(14,'Telecommand Receiver (TCR)'),(15,'Receive Reject Filter (RRF)'),(16,'Transmit Reject Filter (TRF)'),(17,'Hybrid Coupler (HYB)'),(18,'Power Divider/Combiner (PDC)'),(19,'Deployable Transmit Antenna (DTA)'),(20,'Deployable Receive Antenna (DRA)'),(21,'Experimental Payload (EXP)');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (1,'University of Engineering and Technology, Lahore (UET)','#'),(2,'The Islamia University of Bahawalpur, Bahawalpur (IUB)','#'),(3,'Government College University, Lahore (GCU)','#'),(4,'Univerity of the Punjab, Lahore (PU)',NULL),(5,'University of Lahore, Lahore (UOL)',NULL),(6,'University of Engineering and Technology, Taxila (UET, Taxila)',NULL),(7,'Mirpur University of Science and Technology, AJ&K (MUST)',NULL),(8,'Qurtuba University of Science and Information Technology, D.I Khan (QU)',NULL),(9,'Ghulam Ishaq Khan Institute of Engineering Sciences & Technology, Topi (GIKI)',NULL),(10,'IQRA University, Islamabad',NULL),(11,'Air University, Islamabad (AU)',NULL),(12,'NUST Military College of Signals (MCS)',NULL),(13,'Institute of Space Technology, Islamabad (IST)',NULL),(14,'COMSATS Institute of Information Technology (CIIT), Islamabad',NULL),(15,'University of Engineering and Technology, Peshawar (UET, Peshawar)',NULL),(16,'Pakistan Institute of Engineering and Applied Sciences, Islamabad (PIEAS)',NULL),(17,'NUST School of Electrical Engineering and Computer Science (SEECS)',NULL),(18,'University of Karachi, Karachi (UOK)',NULL),(19,'NUST College of Aeronautical Engineering (CAE)',NULL),(20,'NED University of Engineering & Technology, Karachi (NEDUET)',NULL),(21,'Balochistan University of Engineering & Technology, Khuzdar (BUETK)',NULL),(22,'National University of Computer and Emerging Sciences, Islamabad (FAST-NU)',NULL),(23,'Sir Syed University of Engineering and Technology, Karachi (SSUET)',NULL),(24,'Balochistan University of Information Technology, Engineering and Management Sciences, Quetta (BUITEMS)',NULL);
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL COMMENT '1 = admin, 0 = normal user ',
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` time(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$liBjNTU0lPZ2MwK5LJLKV.UiT/FVhvxeWgyN.kNRCcZFBMQJsNbLC',1,NULL,NULL);
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

-- Dump completed on 2015-11-12 16:27:22
