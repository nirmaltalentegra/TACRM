-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: tacrm
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

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
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_type` (
  `account_type_id` int NOT NULL AUTO_INCREMENT,
  `account_mode` tinyint NOT NULL DEFAULT '1',
  `account_type` varchar(64) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`account_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_type`
--

LOCK TABLES `account_type` WRITE;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` VALUES (1,1,'General','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Faculty Salary','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'Batch','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'Branch','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,1,'Travel','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,2,'Student Fees','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,1,'Seminar','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,2,'Consultation Fee','2016-06-21 02:16:28','2016-06-21 02:16:28'),(9,1,'Electricity Bill','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,1,'Telephone Bill','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,1,'Transport','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `payee_name` varchar(64) NOT NULL,
  `amount_type` int NOT NULL,
  `branch_id` int NOT NULL,
  `payable_for` tinyint NOT NULL DEFAULT '0',
  `student_id` int NOT NULL DEFAULT '0',
  `total_amount` float(9,2) NOT NULL,
  `primary_date` date NOT NULL,
  `due_date` date NOT NULL,
  `payment_type` tinyint NOT NULL DEFAULT '0',
  `account_type` tinyint NOT NULL DEFAULT '0',
  `paid_amount` float(9,2) NOT NULL,
  `due_amount` float(9,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_mode_id` tinyint NOT NULL DEFAULT '1',
  `comments` text NOT NULL,
  `account_status` int NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_groups`
--

DROP TABLE IF EXISTS `arbac_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_groups`
--

LOCK TABLES `arbac_groups` WRITE;
/*!40000 ALTER TABLE `arbac_groups` DISABLE KEYS */;
INSERT INTO `arbac_groups` VALUES (1,'Admin','Super Admin Group'),(2,'User','User Group'),(3,'Default','Default Access Group'),(4,'Expert','Expert Group'),(5,'Manager','Manager Access Group'),(6,'Limited Access','Limited Access Group'),(7,'View only','View Only'),(8,'Service provider','service provider');
/*!40000 ALTER TABLE `arbac_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perm_to_group`
--

DROP TABLE IF EXISTS `arbac_perm_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perm_to_group` (
  `perm_id` int unsigned NOT NULL DEFAULT '0',
  `group_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perm_to_group`
--

LOCK TABLES `arbac_perm_to_group` WRITE;
/*!40000 ALTER TABLE `arbac_perm_to_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_perm_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perm_to_user`
--

DROP TABLE IF EXISTS `arbac_perm_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perm_to_user` (
  `perm_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perm_to_user`
--

LOCK TABLES `arbac_perm_to_user` WRITE;
/*!40000 ALTER TABLE `arbac_perm_to_user` DISABLE KEYS */;
INSERT INTO `arbac_perm_to_user` VALUES (34,9),(35,9),(41,9);
/*!40000 ALTER TABLE `arbac_perm_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_perms`
--

DROP TABLE IF EXISTS `arbac_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_perms` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_perms`
--

LOCK TABLES `arbac_perms` WRITE;
/*!40000 ALTER TABLE `arbac_perms` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_pms`
--

DROP TABLE IF EXISTS `arbac_pms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_pms` (
  `id` int unsigned NOT NULL,
  `sender_id` int unsigned NOT NULL,
  `receiver_id` int unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_pms`
--

LOCK TABLES `arbac_pms` WRITE;
/*!40000 ALTER TABLE `arbac_pms` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_pms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_system_variables`
--

DROP TABLE IF EXISTS `arbac_system_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_system_variables` (
  `id` int unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_system_variables`
--

LOCK TABLES `arbac_system_variables` WRITE;
/*!40000 ALTER TABLE `arbac_system_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_system_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_user_to_group`
--

DROP TABLE IF EXISTS `arbac_user_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_user_to_group` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `group_id` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_user_to_group`
--

LOCK TABLES `arbac_user_to_group` WRITE;
/*!40000 ALTER TABLE `arbac_user_to_group` DISABLE KEYS */;
INSERT INTO `arbac_user_to_group` VALUES (1,1);
/*!40000 ALTER TABLE `arbac_user_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_user_variables`
--

DROP TABLE IF EXISTS `arbac_user_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_user_variables` (
  `id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_user_variables`
--

LOCK TABLES `arbac_user_variables` WRITE;
/*!40000 ALTER TABLE `arbac_user_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `arbac_user_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `arbac_users`
--

DROP TABLE IF EXISTS `arbac_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `arbac_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  `login_attempts` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arbac_users`
--

LOCK TABLES `arbac_users` WRITE;
/*!40000 ALTER TABLE `arbac_users` DISABLE KEYS */;
INSERT INTO `arbac_users` VALUES (1,'admin@dqserv.com','3783a5063e48003fd64eb62d2f06125430b4d63e62aeda455564932654079c80','Admin',0,'2021-07-08 15:29:14','2021-07-08 15:29:14','2021-07-08 15:00:00',NULL,'2021-06-27 00:00:00','FVTn1cgaIHvNrmkJ',NULL,NULL,'81.129.76.123',NULL),(8,'teststaff@test.com','a5f6d0307e403fc289c251dc13d484556d5029d4c57425ac0b734d9fb87f9bd0','teststaff',0,'2021-07-05 16:24:22','2021-07-05 16:24:22','2021-07-05 16:00:00',NULL,NULL,NULL,NULL,NULL,'49.37.173.172',NULL),(9,'test1@test.com','a383bd0d712670e6e1c9842ecf684b3ccfc87a20640670e6430633d06c92d6fa','teststaff1',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `arbac_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `associations`
--

DROP TABLE IF EXISTS `associations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `associations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `association` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `associations`
--

LOCK TABLES `associations` WRITE;
/*!40000 ALTER TABLE `associations` DISABLE KEYS */;
INSERT INTO `associations` VALUES (1,'Full Time',NULL,NULL),(2,'Part Time',NULL,NULL),(3,'Correspondence/Distance Learning',NULL,NULL);
/*!40000 ALTER TABLE `associations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_pattern`
--

DROP TABLE IF EXISTS `batch_pattern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batch_pattern` (
  `batch_pattern_id` int NOT NULL AUTO_INCREMENT,
  `batch_pattern` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_pattern_id`),
  UNIQUE KEY `batch_pattern` (`batch_pattern`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_pattern`
--

LOCK TABLES `batch_pattern` WRITE;
/*!40000 ALTER TABLE `batch_pattern` DISABLE KEYS */;
INSERT INTO `batch_pattern` VALUES (1,'Weekdays',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(2,'Weekends',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(3,'Alternate Days',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(4,'Weekly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00'),(5,'Monthly',1,'2016-06-21 01:05:54','2016-06-21 00:00:00');
/*!40000 ALTER TABLE `batch_pattern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batch_type`
--

DROP TABLE IF EXISTS `batch_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batch_type` (
  `batch_type_id` int NOT NULL AUTO_INCREMENT,
  `batch_type_name` varchar(64) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batch_type`
--

LOCK TABLES `batch_type` WRITE;
/*!40000 ALTER TABLE `batch_type` DISABLE KEYS */;
INSERT INTO `batch_type` VALUES (1,'Online',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Webminar',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Seminar',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Instructor-Led Training',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Classroom Training',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `batch_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches`
--

DROP TABLE IF EXISTS `batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches` (
  `batch_id` int NOT NULL AUTO_INCREMENT,
  `course_id` int unsigned DEFAULT NULL,
  `category_id` int NOT NULL,
  `batch_code` varchar(64) DEFAULT NULL,
  `batch_title` varchar(128) NOT NULL,
  `description` text,
  `faculty_id` int DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `batch_type` int NOT NULL,
  `batch_pattern` int NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `week_days` varchar(64) NOT NULL,
  `student_enrolled` int NOT NULL,
  `batch_capacity` int NOT NULL,
  `iscorporate` tinyint NOT NULL DEFAULT '0',
  `currency_id` int NOT NULL,
  `batch_fee_type` tinyint NOT NULL,
  `fees` decimal(9,2) DEFAULT NULL,
  `course_fee_type` tinyint NOT NULL DEFAULT '1',
  `course_fee` float(9,2) NOT NULL,
  `batch_status` int NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `added_by` int DEFAULT NULL,
  `is_deleted` tinyint NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_id`),
  KEY `course_name` (`course_id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `branch_id` (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches`
--

LOCK TABLES `batches` WRITE;
/*!40000 ALTER TABLE `batches` DISABLE KEYS */;
INSERT INTO `batches` VALUES (8,2,8,NULL,'Redhat Certification Program - Admin','Redhat Certification Program - Admin',0,1,1,1,'2021-07-11 00:00:00','2021-07-31 00:00:00','NA',12,30,0,1,1,15000.00,1,15000.00,8,1,NULL,1,NULL,'2021-06-29 17:39:39','2021-06-29 17:39:39'),(12,1,7,NULL,'Online course for Redhat','Online course for Redhat',30,1,1,2,'2021-07-11 00:00:00','2021-07-31 00:00:00','1,7',0,25,0,1,1,5000.00,1,1000.00,8,1,NULL,1,NULL,'2021-06-30 11:23:16','2021-06-30 11:23:16'),(13,2,8,NULL,'Blockchain Ethereum - Jul10','Blockchain Ethereum - Jul10',30,1,1,1,'2021-07-10 00:00:00','2021-08-30 00:00:00','1',0,19,0,1,0,1500.00,1,1000.00,8,1,NULL,1,NULL,'2021-06-30 20:50:20','2021-06-30 20:50:20'),(16,1,8,'Batch014','batch test 122','batch test 122',30,5,1,3,'2021-07-15 00:00:00','2021-08-07 00:00:00','2,3',0,1,0,1,1,1111.00,1,1000.00,7,1,NULL,1,NULL,'2021-07-03 06:23:48','2021-07-03 06:23:48');
/*!40000 ALTER TABLE `batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `batches_students`
--

DROP TABLE IF EXISTS `batches_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `batches_students` (
  `batch_student_id` int NOT NULL AUTO_INCREMENT,
  `batch_id` int NOT NULL,
  `student_id` int NOT NULL,
  `faculty_id` int DEFAULT NULL,
  `student_rating` int DEFAULT NULL,
  `student_comments` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `faculty_rating` int DEFAULT NULL,
  `faculty_comments` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `certified` enum('Yes','No') DEFAULT 'No',
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`batch_student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batches_students`
--

LOCK TABLES `batches_students` WRITE;
/*!40000 ALTER TABLE `batches_students` DISABLE KEYS */;
INSERT INTO `batches_students` VALUES (1,8,1,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-29 17:42:20','2021-07-06 08:31:54'),(2,8,2,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-29 17:43:49','0000-00-00 00:00:00'),(3,8,3,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-29 17:44:35','2021-06-29 17:45:48'),(4,1,4,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 09:53:47','2021-06-30 10:16:55'),(5,10,5,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 10:27:51','0000-00-00 00:00:00'),(6,11,6,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 11:02:16','2021-06-30 11:03:54'),(7,12,7,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 11:23:43','0000-00-00 00:00:00'),(8,4,8,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 12:04:28','0000-00-00 00:00:00'),(9,13,9,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-06-30 20:51:29','2021-06-30 20:52:29'),(10,13,10,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-03 11:45:14','2021-07-06 12:22:43'),(13,16,13,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-03 13:57:41','0000-00-00 00:00:00'),(14,16,14,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-03 14:08:53','0000-00-00 00:00:00'),(16,16,16,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-03 14:20:34','0000-00-00 00:00:00'),(17,12,17,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-06 09:53:16','0000-00-00 00:00:00'),(18,13,18,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-06 10:06:08','0000-00-00 00:00:00'),(19,12,19,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-06 13:17:22','2021-07-06 13:18:08'),(20,16,20,NULL,NULL,NULL,NULL,NULL,'No',0,'2021-07-06 14:04:59','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `batches_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch` (
  `branch_id` int unsigned NOT NULL AUTO_INCREMENT,
  `branch_code` varchar(64) NOT NULL,
  `branch_type` int NOT NULL,
  `branch_name` varchar(128) NOT NULL DEFAULT '',
  `branch_reg_date` date NOT NULL,
  `branch_address` text NOT NULL,
  `branch_area` varchar(64) NOT NULL,
  `land_mark` text NOT NULL,
  `city_id` int NOT NULL,
  `zipcode` int NOT NULL,
  `country_id` int NOT NULL,
  `phone` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `manager_id` int unsigned NOT NULL DEFAULT '0',
  `branch_status` int NOT NULL,
  `ispublic` tinyint unsigned NOT NULL DEFAULT '1',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `autoresp_email_id` int unsigned NOT NULL DEFAULT '0',
  `signature` text,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `name` (`branch_name`),
  UNIQUE KEY `branch_code` (`branch_code`),
  KEY `manager_id` (`manager_id`),
  KEY `autoresp_email_id` (`autoresp_email_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'branch1',2,'test','2011-06-30','test','test','test',2,575001,1,'1234567890','1234567890','0',0,14,1,0,0,'testing','2016-06-23 18:56:21','2016-06-28 00:22:22'),(5,'branch3',4,'branch3','2021-07-09','branch3','branch3','branch3',1,11111,1,'1122334456','8877665549','branch3@test.com',1,8,0,0,1,'test','2021-07-01 10:58:11','2021-07-01 12:21:29'),(6,'BR001',2,'Mangalore','2021-07-02','Mangalore','Mangalore','layout123',3,575014,1,'2356988745','987456985','test@as.com',2,8,1,0,236598745,'asm','2021-07-02 14:04:25','2021-07-02 14:04:25'),(7,'Branch004',3,'branch22','2021-07-31','test address','test area','test',3,555555,1,'9999933222','8877665588','branch22@test.com',2,14,0,0,1,'test','2021-07-03 06:33:19','2021-07-06 07:00:11');
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_type`
--

DROP TABLE IF EXISTS `branch_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch_type` (
  `branch_type_id` int NOT NULL AUTO_INCREMENT,
  `branch_type_name` varchar(64) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`branch_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_type`
--

LOCK TABLES `branch_type` WRITE;
/*!40000 ALTER TABLE `branch_type` DISABLE KEYS */;
INSERT INTO `branch_type` VALUES (1,'Head Office',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Branch',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Franchisee',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'3rd Party',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `branch_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidate_requirement`
--

DROP TABLE IF EXISTS `candidate_requirement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidate_requirement` (
  `candidate_req_id` int NOT NULL AUTO_INCREMENT,
  `candidate_req_details` varchar(128) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`candidate_req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_requirement`
--

LOCK TABLES `candidate_requirement` WRITE;
/*!40000 ALTER TABLE `candidate_requirement` DISABLE KEYS */;
INSERT INTO `candidate_requirement` VALUES (1,'Looking to Start After 2 Weeks',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(2,'Looking to Start After 4 Weeks',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(3,'Need to Arrange for a Demo Class',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(4,'Need to Start the Class ASAP',1,'2016-06-19 15:20:23','2016-06-19 15:20:23'),(5,'Looking for Placement',1,'2016-06-19 15:20:23','2016-06-19 15:20:23');
/*!40000 ALTER TABLE `candidate_requirement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `category_name` varchar(128) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,0,'Tuition',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(2,0,'Test Preparation',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(3,0,'Language Learning',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(4,0,'IT Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(5,0,'School',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(6,0,'College',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(7,0,'Online Courses',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(8,0,'Certificate',1,'2016-06-27 18:21:04','2016-06-27 18:21:04'),(10,8,'Long term course',1,'2016-06-27 18:21:04','2016-06-28 00:30:09'),(11,10,'short term course',1,'2016-06-28 00:24:31','2016-06-28 00:29:57'),(13,2,'test category1',1,'2021-07-02 08:46:53','2021-07-02 09:09:54'),(14,6,'test category2',1,'2021-07-02 08:50:42','2021-07-02 09:09:34'),(15,0,'Webinars',1,'2021-07-02 10:37:48','0000-00-00 00:00:00'),(16,0,'Blockchain',1,'2021-07-04 19:54:33','2021-07-06 06:52:46');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(64) NOT NULL,
  `state_id` int NOT NULL,
  `country_id` int NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Chennai',1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Thrichy',1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Bangalore',2,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` varchar(128) NOT NULL,
  `country_short` varchar(10) NOT NULL,
  `active` tinyint NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'India','IND',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'United States of America','USA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Singapore','SG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'United Kingdom','UK',1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_fee_type`
--

DROP TABLE IF EXISTS `course_fee_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_fee_type` (
  `course_fee_type_id` int NOT NULL AUTO_INCREMENT,
  `course_fee_type` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`course_fee_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_fee_type`
--

LOCK TABLES `course_fee_type` WRITE;
/*!40000 ALTER TABLE `course_fee_type` DISABLE KEYS */;
INSERT INTO `course_fee_type` VALUES (1,'Paid',1,'2016-06-19 15:17:34','2016-06-19 15:17:34'),(2,'Free',1,'2016-06-19 15:17:34','2016-06-19 15:17:34');
/*!40000 ALTER TABLE `course_fee_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses_catalog`
--

DROP TABLE IF EXISTS `courses_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses_catalog` (
  `course_id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `course_code` varchar(40) DEFAULT NULL,
  `course_name` varchar(200) DEFAULT NULL,
  `course_summary` text,
  `course_contents` text,
  `course_duration` varchar(64) NOT NULL,
  `course_fee_type` tinyint NOT NULL DEFAULT '1',
  `course_duration_in` varchar(64) DEFAULT NULL,
  `course_fees` float(10,2) DEFAULT NULL,
  `is_deleted` tinyint DEFAULT NULL,
  `added_by` int NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `notes` text,
  `active` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`course_id`),
  UNIQUE KEY `course_code` (`course_code`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_catalog`
--

LOCK TABLES `courses_catalog` WRITE;
/*!40000 ALTER TABLE `courses_catalog` DISABLE KEYS */;
INSERT INTO `courses_catalog` VALUES (1,8,'RH124','Redhat System Administration I','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','',1,NULL,1000.00,NULL,0,NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,8,'RH134','Redhat System Administration II','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','\r\n    Understand and use essential tools for handling files, directories, command-line environments, and documentation\r\n    Operate running systems, including booting into different run levels, identifying processes, starting and stopping virtual machines, and controlling services\r\n    Configure local storage using partitions and logical volumes\r\n    Create and configure file systems and file system attributes, such as permissions, encryption, access control lists, and network file systems\r\n    Deploy, configure, and maintain systems, including software installation, update, and core services\r\n    Manage users and groups, including use of a centralized directory for authentication\r\n    Manage security, including basic firewall and SELinux configuration\r\n','',1,NULL,NULL,NULL,0,NULL,NULL,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,8,'code67','Test course','Test course','','',2,NULL,NULL,NULL,0,NULL,'',1,'2016-06-27 18:43:56','2016-06-27 18:43:56'),(4,8,'certi123','Test course','','','',0,NULL,NULL,NULL,0,NULL,'',1,'2016-06-27 18:57:04','2016-06-27 18:57:04'),(6,11,'it123','test IT course','','','',0,NULL,NULL,NULL,0,NULL,'',1,'2016-06-28 00:49:43','2016-06-28 00:49:43'),(7,10,'it1234','test IT courses','','','',1,NULL,2000.00,NULL,0,NULL,'',1,'2016-06-28 00:50:26','2016-06-28 00:50:26'),(11,11,'code1234','course test1','course test1','course test1','1',1,'1`',1111.00,1,1,'2021-07-06 16:43:36','course test1',1,'2021-07-02 10:27:55','0000-00-00 00:00:00'),(12,15,'Web-Redhat','Webinar on Redhat administration','Webinar on Redhat administration','Webinar on Redhat administration','10',1,'hours',15000.00,1,1,'2021-07-06 16:43:27','NA',1,'2021-07-02 10:39:57','2021-07-06 06:57:07'),(13,14,'code12345','course test15','course test15','course test15','1',1,NULL,2900.00,1,1,'2021-07-06 16:43:02','course test15',1,'2021-07-06 13:59:43','2021-07-06 14:00:17');
/*!40000 ALTER TABLE `courses_catalog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `currency` (
  `currency_id` int NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(64) NOT NULL,
  `currency_symbol` varchar(11) NOT NULL,
  `currency_short` varchar(11) NOT NULL,
  `country_id` int NOT NULL,
  `conversion` decimal(9,2) NOT NULL,
  `active` int NOT NULL,
  `created` int NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currency`
--

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (1,'INR','Rs','Rs',1,0.00,1,0);
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degree_types`
--

DROP TABLE IF EXISTS `degree_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `degree_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `degree_type` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degree_types`
--

LOCK TABLES `degree_types` WRITE;
/*!40000 ALTER TABLE `degree_types` DISABLE KEYS */;
INSERT INTO `degree_types` VALUES (1,'Secondary',NULL,NULL),(2,'Higher Secondary',NULL,NULL),(3,'Graduation',NULL,NULL),(4,'Advanced Diploma',NULL,NULL),(5,'Post Graduation',NULL,NULL),(6,'Doctorate/PhD',NULL,NULL),(7,'Diploma',NULL,NULL),(8,'Certification',NULL,NULL),(9,'Other',NULL,NULL);
/*!40000 ALTER TABLE `degree_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delegations`
--

DROP TABLE IF EXISTS `delegations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delegations` (
  `id` int NOT NULL COMMENT 'Id of delegation',
  `manager_id` int NOT NULL COMMENT 'Manager wanting to delegate',
  `delegate_id` int NOT NULL COMMENT 'Employee having the delegation',
  PRIMARY KEY (`id`),
  KEY `manager_id` (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Delegation of approval';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegations`
--

LOCK TABLES `delegations` WRITE;
/*!40000 ALTER TABLE `delegations` DISABLE KEYS */;
/*!40000 ALTER TABLE `delegations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `department` (
  `id` int unsigned NOT NULL,
  `pid` int unsigned NOT NULL DEFAULT '0',
  `sla_id` int unsigned NOT NULL DEFAULT '0',
  `email_id` int unsigned NOT NULL DEFAULT '0',
  `autoresp_email_id` int unsigned NOT NULL DEFAULT '0',
  `manager_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `signature` text,
  `ispublic` tinyint unsigned NOT NULL DEFAULT '1',
  `group_membership` tinyint(1) NOT NULL DEFAULT '0',
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`pid`),
  KEY `manager_id` (`manager_id`),
  KEY `autoresp_email_id` (`autoresp_email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,0,1,0,0,1,0,'Support',NULL,1,0,'2021-05-08 15:46:21','2021-05-08 15:46:21');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `designation` (
  `id` int NOT NULL,
  `name` varchar(64) NOT NULL,
  `position` int NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designation`
--

LOCK TABLES `designation` WRITE;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` VALUES (1,'President',1,'2021-04-21 22:49:10','2016-03-20 20:13:04'),(2,'Vice President',2,'2021-04-21 22:49:10','2016-03-20 20:13:27'),(3,'General Manager',3,'2021-04-21 22:49:10','2016-03-20 20:13:40'),(4,'Regional Manager',4,'2021-04-21 22:49:10','2016-03-20 20:14:29'),(5,'Manager',5,'2021-04-21 22:49:10','2016-03-20 20:14:39'),(6,'Senior Engineer',6,'2021-04-21 22:49:10','2016-03-20 20:14:54'),(7,'Engineer',7,'2021-04-21 22:49:10','2016-03-20 20:15:17'),(8,'Coordinator',7,'2021-04-21 22:49:10','2016-03-20 20:15:50'),(9,'Admin Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:04'),(10,'Sales Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:16'),(11,'Account Executive',7,'2021-04-21 22:49:10','2016-03-20 20:16:50'),(12,'Permanent Employee',7,'2021-04-21 22:49:10','2016-03-20 20:19:05'),(13,'Temporary Employee',8,'2021-04-21 22:49:10','2016-03-20 20:19:19'),(14,'Contract',8,'2021-04-21 22:49:10','2016-03-20 20:19:32');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `faculty_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `middlename` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` int NOT NULL,
  `gender` varchar(64) NOT NULL,
  `dob` date NOT NULL,
  `primary_skill` varchar(64) NOT NULL,
  `linkedin` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `education` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `experience` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `online_teaching_experience` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `minimum_fee` int NOT NULL,
  `maximum_fee` int NOT NULL,
  `isteachonline` tinyint NOT NULL,
  `registered_date` timestamp NOT NULL,
  `lastlogin` timestamp NOT NULL,
  `active` tinyint NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `Institute_name` varchar(64) NOT NULL,
  `degree_type` varchar(64) NOT NULL,
  `degree_name` varchar(64) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `association` varchar(64) NOT NULL COMMENT 'Parttime, full time, correspondence ',
  `speciality` int NOT NULL,
  `score` int NOT NULL,
  PRIMARY KEY (`faculty_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty_skill`
--

DROP TABLE IF EXISTS `faculty_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty_skill` (
  `faculty_id` int NOT NULL,
  `skill_id` int NOT NULL,
  `from_level` varchar(32) NOT NULL,
  `to_level` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty_skill`
--

LOCK TABLES `faculty_skill` WRITE;
/*!40000 ALTER TABLE `faculty_skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `faculty_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grade_level`
--

DROP TABLE IF EXISTS `grade_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grade_level` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `grade_level_name` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade_level`
--

LOCK TABLES `grade_level` WRITE;
/*!40000 ALTER TABLE `grade_level` DISABLE KEYS */;
INSERT INTO `grade_level` VALUES (1,'Beginner',NULL,NULL),(2,'Intermediate',NULL,NULL),(3,'Expert',NULL,NULL),(4,'Preschool, Kindergarten, KG, Nursery',NULL,NULL),(5,'Grade 1',NULL,NULL),(6,'Grade 2',NULL,NULL),(7,'Grade 3',NULL,NULL),(8,'Grade 4',NULL,NULL),(9,'Grade 5',NULL,NULL),(10,'Grade 6',NULL,NULL),(11,'Grade 7',NULL,NULL),(12,'Grade 8',NULL,NULL),(13,'Grade 9',NULL,NULL),(14,'Grade 10',NULL,NULL),(15,'GCSE',NULL,NULL),(16,'O level',NULL,NULL),(17,'Grade 11',NULL,NULL),(18,'AS level',NULL,NULL),(19,'A2 level',NULL,NULL),(20,'A level',NULL,NULL),(21,'Grade 12',NULL,NULL),(22,'Diploma',NULL,NULL),(23,'Bachelors/Undergraduate',NULL,NULL),(24,'Masters/Postgraduate',NULL,NULL),(25,'MPhil',NULL,NULL),(26,'Doctorate/PhD',NULL,NULL),(27,'Adult/Casual learning',NULL,NULL);
/*!40000 ALTER TABLE `grade_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `grade_id` int NOT NULL AUTO_INCREMENT,
  `grade_name` varchar(32) NOT NULL,
  `active` tinyint NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`grade_id`),
  UNIQUE KEY `grade_name` (`grade_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest_level`
--

DROP TABLE IF EXISTS `interest_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interest_level` (
  `interest_level_id` int NOT NULL AUTO_INCREMENT,
  `interest_level` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`interest_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest_level`
--

LOCK TABLES `interest_level` WRITE;
/*!40000 ALTER TABLE `interest_level` DISABLE KEYS */;
INSERT INTO `interest_level` VALUES (1,'Need to Push',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Not Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Willing to join',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Willing not now',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'Highly Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'Interested',0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `interest_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leads`
--

DROP TABLE IF EXISTS `leads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `leads` (
  `lead_id` int NOT NULL AUTO_INCREMENT,
  `source_id` int NOT NULL,
  `staff_id` int NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `alt_mobile` varchar(16) NOT NULL,
  `ref_name` varchar(64) NOT NULL,
  `ref_mobile` varchar(16) NOT NULL,
  `comments` text NOT NULL,
  `branch_id` int NOT NULL DEFAULT '0',
  `course_id` int NOT NULL DEFAULT '0',
  `country_id` int NOT NULL DEFAULT '1',
  `active` tinyint NOT NULL DEFAULT '1',
  `status` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`lead_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leads`
--

LOCK TABLES `leads` WRITE;
/*!40000 ALTER TABLE `leads` DISABLE KEYS */;
INSERT INTO `leads` VALUES (1,1,1,'Jagan','Babu','Ranga','jaganr@gmail.com','9911001111','9922110011','','','',0,0,0,0,0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `leads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_roles_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2021_05_03_081005_subjects',1),(6,'2021_05_03_081927_create_subjects_table',1),(8,'2021_05_03_085023_create_profiles_table',2),(9,'2021_05_04_163734_create_sub_levels_table',3),(10,'2021_05_05_104545_create_associations_table',4),(11,'2021_05_05_104637_create_degree_types_table',4),(12,'2021_05_24_191246_create_student_posts_table',1),(13,'2021_05_24_191140_create_grade_level_table',1),(14,'2021_05_15_060148_create_pending_user_emails_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `manager` varchar(16) NOT NULL DEFAULT '',
  `status` int unsigned NOT NULL DEFAULT '0',
  `domain` varchar(256) NOT NULL DEFAULT '',
  `extra` text,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'TesNow','Vivek',1,'dqserv.com','','2016-01-25 20:46:40','2016-03-21 12:34:45'),(2,'DQServ','',0,'',NULL,'2016-03-03 04:54:55','2016-04-23 01:19:58');
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_user_emails`
--

DROP TABLE IF EXISTS `pending_user_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pending_user_emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pending_user_emails_user_type_user_id_index` (`user_type`,`user_id`),
  KEY `pending_user_emails_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_user_emails`
--

LOCK TABLES `pending_user_emails` WRITE;
/*!40000 ALTER TABLE `pending_user_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_user_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_job` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `speciality_strength` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postalcode` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_tech` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `user_education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `professional_exp` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `teaching_details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `profile_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` int NOT NULL DEFAULT '1' COMMENT '1-ACTIVE; 0-INACTIVE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (29,100,NULL,NULL,NULL,NULL,'2021-06-01 14:21:32','2021-06-08 14:47:38','Male','1998-02-01','Piano','New Delhi','123456','[{\"subject\":26,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":27,\"from_level\":\"2\",\"to_level\":\"3\"}]','[{\"institution\":\"Mahatma college of Engineering, New Delhi\",\"deg_type\":\"3\",\"deg_name\":\"ECE\",\"startdate\":\"2015-06-01\",\"enddate\":\"2019-06-01\",\"association\":\"1\",\"speciality\":\"Electronics\",\"score\":\"76\"}]','[{\"organisation\":\"SoftDesk Electricals\",\"designation\":\"Electrical Engineeer\",\"e_startdate\":\"2019-01-01\",\"e_enddate\":\"2020-12-01\",\"association\":\"1\",\"job_description\":\"Electrical Engineeer at softdesk Electricals\"}]','[{\"i_charge\":\"Monthly\",\"min_fee\":\"300\",\"max_fee\":\"350\",\"fee_details\":\"does not vary\",\"tot_exp\":\"2\",\"online_exp\":\"1\",\"travel\":\"No\",\"travel_kms\":null,\"avail_online_teach\":\"Yes\",\"digital_pen\":\"Yes\",\"help_homework_assig\":\"Yes\",\"currently_emp\":\"Yes\",\"oppor_interest\":\"full_time\"}]','[{\"profile_des\":\"I teach one to one and also in group. My way of teaching is very friendly and syllabus related. I don\'t force the kids to do lessons if they don\'t want to. The classes also works as per the child\'s moods. (Younger kids) I teach both elders and younger kids. Students below 5yrs old are taught more.\",\"one_acc\":\"yes\"}]',1),(30,101,'Sayooj','Sayooj Company','Math Reasoning Teacher','Name','2021-06-01 15:09:17','2021-06-01 15:11:19','Female','1990-03-17','Math Reasoning','Mangalore, India','123456','[{\"subject\":28,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":29,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":30,\"from_level\":\"2\",\"to_level\":\"3\"}]','[{\"institution\":\"Nehru College of Engineering\",\"deg_type\":\"5\",\"deg_name\":\"B.Tech\",\"startdate\":\"2016-05-01\",\"enddate\":\"2018-03-06\",\"association\":\"3\",\"speciality\":\"Math Reasoning\",\"score\":\"88\"}]','[{\"organisation\":\"St.Thomas\",\"designation\":\"Math and aptitude tutor\",\"e_startdate\":\"2018-03-12\",\"e_enddate\":\"2020-06-22\",\"association\":\"1\",\"job_description\":\"My Job is teaching Math and aptitude for students\"}]','[{\"i_charge\":\"Weekly\",\"min_fee\":\"400\",\"max_fee\":\"500\",\"fee_details\":\"does not vary\",\"tot_exp\":\"2\",\"online_exp\":\"1\",\"travel\":\"yes\",\"travel_kms\":\"12\",\"avail_online_teach\":\"Yes\",\"digital_pen\":\"Yes\",\"help_homework_assig\":\"Yes\",\"currently_emp\":\"No\",\"oppor_interest\":\"full_time\"}]','[{\"profile_des\":\"I am following the type of teaching style which is mostly adaptable in real life and will help you to easily understand. I am also focusing on makeing students prepare to compete in many comparative exams so that it can be very useful for them.\",\"one_acc\":\"yes\"}]',1),(31,102,NULL,NULL,NULL,NULL,'2021-06-01 15:24:48','2021-06-01 15:25:51','Female','1997-02-19','Chemistry and physics','The Nilgiris,India','123456','[{\"subject\":2,\"from_level\":\"2\",\"to_level\":\"3\"},{\"subject\":1,\"from_level\":\"3\",\"to_level\":\"3\"},{\"subject\":3,\"from_level\":\"2\",\"to_level\":\"3\"}]','[{\"institution\":\"Mahatma college of Engineering, New Delhi\",\"deg_type\":\"6\",\"deg_name\":\"B.Tech\",\"startdate\":\"2018-01-03\",\"enddate\":\"2021-05-31\",\"association\":\"1\",\"speciality\":\"Physics\",\"score\":\"88\"}]','[{\"organisation\":\"VLBS school\",\"designation\":\"Physics Tutor\",\"e_startdate\":\"2018-06-30\",\"e_enddate\":\"2021-02-01\",\"association\":\"2\",\"job_description\":\"Working as a Physics Tutor for VLBS school\"}]','[{\"i_charge\":\"Monthly\",\"min_fee\":\"300\",\"max_fee\":\"350\",\"fee_details\":\"Does not vary\",\"tot_exp\":\"2\",\"online_exp\":\"1\",\"travel\":\"yes\",\"travel_kms\":\"3\",\"avail_online_teach\":\"Yes\",\"digital_pen\":\"Yes\",\"help_homework_assig\":\"Yes\",\"currently_emp\":\"No\",\"oppor_interest\":\"part_time\"}]','[{\"profile_des\":\"I have been solving doubts of students since two years related to chemistry, physics, and maths. I had practised all type of questions from basic to jee advance level. I love to interact with students and explain the things more logical and fun way so that they withhold the concept for a long time.\",\"one_acc\":\"yes\"}]',1),(32,110,NULL,NULL,NULL,NULL,'2021-06-02 19:40:27','2021-06-02 19:40:57','Male','1982-02-21','AWS','Chennai','600017','[{\"subject\":31,\"from_level\":\"1\",\"to_level\":\"3\"}]','[{\"institution\":\"ME\",\"deg_type\":\"6\",\"deg_name\":\"CS\",\"startdate\":\"0982-02-21\",\"enddate\":\"1987-11-11\",\"association\":\"1\",\"speciality\":null,\"score\":null}]','[{\"organisation\":\"digitalq\",\"designation\":\"Govt. Official\",\"e_startdate\":\"1982-02-22\",\"e_enddate\":\"1982-02-22\",\"association\":\"1\",\"job_description\":\"test\"}]','[{\"i_charge\":\"Weekly\",\"min_fee\":\"400\",\"max_fee\":\"500\",\"fee_details\":\"does not vary\",\"tot_exp\":\"2\",\"online_exp\":\"1\",\"travel\":\"yes\",\"travel_kms\":\"12\",\"avail_online_teach\":\"Yes\",\"digital_pen\":\"Yes\",\"help_homework_assig\":\"Yes\",\"currently_emp\":\"No\",\"oppor_interest\":\"full_time\"}]','[{\"profile_des\":\"test agr\",\"one_acc\":\"yes\"}]',1),(33,114,NULL,NULL,NULL,NULL,'2021-06-10 10:00:26','2021-06-10 10:00:26',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(34,121,NULL,NULL,NULL,NULL,'2021-07-04 19:46:51','2021-07-04 19:47:15','Male','1978-02-12','aws','chennai','600001',NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Teacher',NULL,NULL),(2,'Student/Parent',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `skill_id` int NOT NULL AUTO_INCREMENT,
  `skill_name` varchar(64) NOT NULL,
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  PRIMARY KEY (`skill_id`),
  UNIQUE KEY `skill_name` (`skill_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'DevOps','2021-04-21 23:25:52','2021-04-21 23:25:52'),(2,'Dockers','2021-04-21 23:25:52','2021-04-21 23:25:52');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source`
--

DROP TABLE IF EXISTS `source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `source` (
  `source_id` int NOT NULL AUTO_INCREMENT,
  `source_details` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source`
--

LOCK TABLES `source` WRITE;
/*!40000 ALTER TABLE `source` DISABLE KEYS */;
INSERT INTO `source` VALUES (1,'Google',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(2,'Email',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(3,'Friends',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(4,'SMS',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(5,'Online Promotion',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(6,'Trainer/Staff ref',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(7,'School campus',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(8,'Student Ref',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(9,'News Paper',1,'2016-06-19 15:07:25','2016-06-19 15:07:25'),(10,'Corporate/Company',1,'2016-06-19 15:07:25','2016-06-19 15:07:25');
/*!40000 ALTER TABLE `source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `staff_id` int unsigned NOT NULL,
  `org_id` int NOT NULL DEFAULT '1',
  `dept_id` int unsigned NOT NULL DEFAULT '1',
  `branch_id` int NOT NULL DEFAULT '1',
  `role_id` int unsigned NOT NULL DEFAULT '3',
  `manager_id` int NOT NULL DEFAULT '0',
  `designation_id` int NOT NULL DEFAULT '7',
  `firstname` varchar(132) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_ext` varchar(6) DEFAULT NULL,
  `mobile` varchar(24) NOT NULL,
  `signature` text NOT NULL,
  `lang` varchar(16) DEFAULT NULL,
  `timezone` varchar(64) DEFAULT NULL,
  `notes` text,
  `sms_notification` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isvisible` tinyint unsigned NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`staff_id`),
  KEY `dept_id` (`dept_id`),
  KEY `issuperuser` (`isadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,1,3,1,3,1,7,'Web','Admin','000','000','9980487456','--\r\nWebadmin',NULL,NULL,NULL,0,0,0,'2016-05-24 19:07:40','2021-06-22 01:22:39'),(2,1,3,2,3,1,7,'Vivek','Staff','000','000','9980487456','--\r\nstaff',NULL,NULL,NULL,0,0,0,'2016-05-24 19:07:40','2021-06-22 01:22:39'),(8,0,0,1,0,0,0,'test','staff','111-2222-9999','','8877665123','',NULL,NULL,NULL,0,1,1,'2021-07-05 16:23:14','2021-07-05 16:23:14'),(9,2,1,1,0,8,14,'test 1','staff1','111-2222-9999','','8877665123','teststaff1',NULL,NULL,NULL,1,1,1,'2021-07-06 05:34:31','2021-07-06 05:34:31');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_branch_access`
--

DROP TABLE IF EXISTS `staff_branch_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_branch_access` (
  `staff_id` int unsigned NOT NULL DEFAULT '0',
  `branch_id` int unsigned NOT NULL DEFAULT '0',
  `role_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`staff_id`,`branch_id`),
  KEY `dept_id` (`branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_branch_access`
--

LOCK TABLES `staff_branch_access` WRITE;
/*!40000 ALTER TABLE `staff_branch_access` DISABLE KEYS */;
INSERT INTO `staff_branch_access` VALUES (1,2,2,1),(1,3,3,1);
/*!40000 ALTER TABLE `staff_branch_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_details`
--

DROP TABLE IF EXISTS `staff_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_details` (
  `staff_id` int NOT NULL,
  `firstname` varchar(132) DEFAULT NULL,
  `lastname` varchar(32) DEFAULT NULL,
  `father_name` varchar(64) NOT NULL,
  `husband_name` varchar(64) NOT NULL,
  `phone` varchar(24) NOT NULL,
  `phone_ext` varchar(6) DEFAULT NULL,
  `mobile` varchar(24) NOT NULL,
  `home_phone` int NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `dob` date NOT NULL,
  `dob_place` varchar(64) NOT NULL,
  `martial_status` varchar(64) NOT NULL,
  `children` tinyint NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `joined_date` date NOT NULL,
  `education` text NOT NULL,
  `specialization` text NOT NULL,
  `achivement_awards` text NOT NULL,
  `events_attended` int NOT NULL,
  `event_trained` int NOT NULL,
  `fulltime` char(3) DEFAULT 'Yes',
  `sms_notification` tinyint(1) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `isvisible` tinyint unsigned NOT NULL DEFAULT '1',
  `onvacation` tinyint unsigned NOT NULL DEFAULT '0',
  `assigned_only` tinyint unsigned NOT NULL DEFAULT '0',
  `change_passwd` tinyint unsigned NOT NULL DEFAULT '0',
  `max_page_size` int unsigned NOT NULL DEFAULT '0',
  `auto_refresh_rate` int unsigned NOT NULL DEFAULT '0',
  `default_signature_type` enum('none','mine','dept') NOT NULL DEFAULT 'none',
  `default_paper_size` enum('Letter','Legal','Ledger','A4','A3') NOT NULL DEFAULT 'Letter',
  `extra` text,
  `permissions` text,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_details`
--

LOCK TABLES `staff_details` WRITE;
/*!40000 ALTER TABLE `staff_details` DISABLE KEYS */;
INSERT INTO `staff_details` VALUES (1,'manju','shri','','','1234567891','111','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-24','BE','','',0,0,'no',1,0,1,0,1,0,3,3,'none','Legal','',''),(2,'geetha','s','','','','','1234567890',0,'','1988-03-02','mangalore','single',0,'','2016-06-23','B com','','',0,0,'yes',0,0,1,0,1,0,7,7,'mine','Legal','',''),(9,'test 1','staff1','','','111-2222-9999','','8877665123',0,NULL,'0000-00-00','','',0,'','0000-00-00','','','',0,0,'Yes',0,1,1,1,1,0,0,0,'none','Letter',NULL,NULL);
/*!40000 ALTER TABLE `staff_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_sms_notify`
--

DROP TABLE IF EXISTS `staff_sms_notify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff_sms_notify` (
  `staff_id` int unsigned NOT NULL DEFAULT '0',
  `dept_id` int unsigned NOT NULL DEFAULT '0',
  `sms_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`staff_id`,`dept_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_sms_notify`
--

LOCK TABLES `staff_sms_notify` WRITE;
/*!40000 ALTER TABLE `staff_sms_notify` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_sms_notify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_type` int NOT NULL DEFAULT '1',
  `status` varchar(64) NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,1,'New',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,'Pending',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,'Overdue',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,1,'Closed',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,4,'Enrolled',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,3,'Qualified',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,6,'Ongoing',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(8,6,'Upcoming',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(9,6,'Completed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(10,6,'Cancelled',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(11,6,'Postponed',1,'2016-06-19 23:15:22','2016-06-19 23:15:22'),(12,3,'Processed',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(13,3,'Disqualified',1,'2016-06-19 23:16:55','2016-06-19 23:16:55'),(14,5,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,5,'old',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,7,'new',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,5,'Head-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(18,5,'Branch-Office',1,'2021-04-21 23:19:39','2021-04-21 23:19:39'),(19,5,'Franchise',1,'2021-04-21 23:21:02','2021-04-21 23:21:02'),(20,5,'3rd-Party',1,'2021-04-21 23:21:02','2021-04-21 23:21:02');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_type`
--

DROP TABLE IF EXISTS `status_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_type` (
  `status_type_id` int NOT NULL AUTO_INCREMENT,
  `status_type` varchar(64) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`status_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_type`
--

LOCK TABLES `status_type` WRITE;
/*!40000 ALTER TABLE `status_type` DISABLE KEYS */;
INSERT INTO `status_type` VALUES (1,'general',1,'2016-06-19 18:15:41','2016-06-19 18:15:41'),(2,'expense',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(3,'lead',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(4,'enquiry',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(5,'branch',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(6,'batch',1,'2016-06-19 18:14:55','2016-06-19 18:14:55'),(7,'staff',1,'2016-06-24 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `status_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_posts`
--

DROP TABLE IF EXISTS `student_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student_posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `st_location` varchar(200) DEFAULT NULL,
  `st_subjects` varchar(200) DEFAULT NULL,
  `st_requirement` longtext,
  `st_level` varchar(100) DEFAULT NULL,
  `st_i_want` varchar(100) DEFAULT NULL,
  `meeting_options` varchar(200) DEFAULT NULL,
  `km_travel` varchar(200) DEFAULT NULL,
  `st_gender_prfer` varchar(100) DEFAULT NULL,
  `tut_wantd` varchar(100) DEFAULT NULL,
  `i_need_smeone` varchar(100) DEFAULT NULL,
  `st_budget` varchar(200) DEFAULT NULL,
  `ass_due_date` date DEFAULT NULL,
  `status` int DEFAULT '1' COMMENT '1- active, 0-inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_posts`
--

LOCK TABLES `student_posts` WRITE;
/*!40000 ALTER TABLE `student_posts` DISABLE KEYS */;
INSERT INTO `student_posts` VALUES (29,105,'Whitefield, Bengaluru, Karnataka, India','[\"4\"]','I need a tutor who can take classes one on one personally only for some chapters that I require to understand for an upcoming test. Do not want a permanent teacher, the classes would be charged on an hourly basis. Need for chemistry And math, Grade 11','17','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"500\",\"Hour\"]',NULL,1,'2021-06-01 15:40:08','2021-06-01 15:40:08'),(30,107,'Online Maths (CBSE) tutor needed in Maduravoyal','[\"28\"]','I am looking out for Maths tutor for my son who is studying 8th STD ( CBSE ) . his level of understanding the maths is at beginner level, need to push him hard to understand maths. I need a tutor who can able to drive him and understand tricks of Maths.','12','Tutoring','[\"Online\",\"Home\",\"Travel\"]','5','Only female','One','Part Time','[\"300\",\"Hour\"]',NULL,1,'2021-06-01 15:57:14','2021-06-01 15:57:14'),(31,107,'Online C programming tutor required in Whitefield','[\"7\"]','Dear sir, I am looking for a tutor for my son B.Arvind studying in BItS Pilani 1st year mechanical for C programming . Will you be interested in taking this up . He has not learnt computer science in 12th and he studied biology .\r\nI am looking for an online tutor. We need 3-4 hours classes per week in the evenings.','3','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"500\",\"Hour\"]',NULL,1,'2021-06-01 21:13:34','2021-06-01 21:13:34'),(32,109,'Delhi','[\"4\"]','Online Quantitative Aptitude tutor required in Central Delhi. I\'m preparing for AFCAT II and I have some trouble with Mathematics.','3','Tutoring','[\"Online\"]',NULL,'Preferably male','One','Part Time','[\"600\",\"Hour\"]',NULL,1,'2021-06-01 21:17:30','2021-06-01 21:17:30'),(33,109,'E-city, Bengaluru','[\"7\"]','Online Software assignment help tutor required in Electronic City.  This is an individual assignment. Using INNOSLATE, Please perform a functional analysis (decomposition) of \'to manage\' (more specifically, \'Manage a Project\') which should include a very thorough decomposition. You must use INNOSLATE. Ensure you number your functions and go down 3 levels (F0, F1, F1.1)','23','Tutoring','[\"Online\"]',NULL,'Preferably male','One','Part Time','[\"250\",\"Hour\"]',NULL,1,'2021-06-01 21:19:06','2021-06-01 21:19:06'),(34,108,'Test','[\"1\",\"4\"]','test maths','1','Tutoring','[\"Online\"]',NULL,'Only male','More than one','Part Time','[\"200\",\"Hour\"]',NULL,1,'2021-06-02 15:07:46','2021-06-02 15:07:46'),(35,109,'Bengaluru','[\"1\",\"2\"]','I\'m looking for 10th Botony Homework','14','Assignment','[\"Online\",\"Home\",\"Travel\"]','5','Only male','One','Part Time','[\"2\",\"Hour\"]',NULL,1,'2021-06-08 14:44:13','2021-06-08 14:44:13'),(36,115,'Chrompet','[\"4\"]','This is test message from srividhya checking the post requirement','11','Tutoring','[\"Online\"]',NULL,'No Preference','One','Part Time','[\"240\",\"Hour\"]',NULL,1,'2021-06-22 09:49:21','2021-06-22 09:49:21');
/*!40000 ALTER TABLE `student_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL COMMENT 'from users table',
  `name` varchar(500) NOT NULL,
  `course_id` int NOT NULL,
  `fees_payable` float(10,2) NOT NULL,
  `fees_paid` float(10,2) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  `added_by` int NOT NULL,
  `course_completed` int NOT NULL DEFAULT '0',
  `completion_date` timestamp NULL DEFAULT NULL,
  `student_did` varchar(200) NOT NULL,
  `certificate_id` varchar(200) NOT NULL,
  `student_enrollment_id` varchar(200) NOT NULL,
  `is_deleted` enum('Yes','No') DEFAULT 'No',
  `created` timestamp NOT NULL,
  `updated` timestamp NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `batch_id` int DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,105,'Nelson',2,10000.00,5000.00,1,1,0,'0000-00-00 00:00:00','','','','Yes','2021-06-29 17:42:20','2021-07-06 08:31:54','2021-07-05 22:57:31',8),(2,112,'Vivek',2,12000.00,3000.00,1,1,0,NULL,'','','','Yes','2021-06-29 17:43:49','0000-00-00 00:00:00','2021-07-05 22:57:56',8),(3,118,'Asmitha',2,13000.00,2000.00,1,1,1,'2021-07-30 00:00:00','','','','No','2021-06-29 17:44:35','2021-06-29 17:45:48',NULL,8),(4,109,'Wasim Akram Syed',1,2.00,35000.00,1,1,1,'2021-06-25 00:00:00','','','','No','2021-06-30 09:53:47','2021-06-30 10:16:55',NULL,1),(5,108,'ag raj',4,1.00,1.00,1,1,0,NULL,'','','','No','2021-06-30 10:27:51','0000-00-00 00:00:00',NULL,10),(6,108,'ag raj',7,1.00,1210.00,1,1,1,'2021-06-25 00:00:00','','','','No','2021-06-30 11:02:16','2021-06-30 11:03:54',NULL,11),(7,112,'Vivek',1,3000.00,5000.00,1,1,0,NULL,'','','','Yes','2021-06-30 11:23:43','0000-00-00 00:00:00','2021-07-05 22:58:08',12),(8,105,'Nelson',4,1.00,45000.00,1,1,0,NULL,'','','','No','2021-06-30 12:04:28','0000-00-00 00:00:00',NULL,4),(9,112,'Vivek',2,1000.00,500.00,1,1,1,'2021-06-30 00:00:00','','','','Yes','2021-06-30 20:51:29','2021-06-30 20:52:29','2021-07-03 11:36:58',13),(10,119,'John',2,1.00,1500.00,1,1,1,'2021-07-04 00:00:00','stud did','certi id','','Yes','2021-07-03 11:45:14','2021-07-06 12:22:43','2021-07-05 22:58:35',13),(13,113,'Somashree',1,1.00,1111.00,1,1,0,NULL,'','','','No','2021-07-03 13:57:41','0000-00-00 00:00:00',NULL,16),(14,115,'Srivdhya Vivek',1,1.00,1111.00,1,1,0,NULL,'','','','No','2021-07-03 14:08:53','0000-00-00 00:00:00',NULL,16),(16,111,'john',1,1.00,1111.00,1,1,0,NULL,'','','','No','2021-07-03 14:20:34','0000-00-00 00:00:00',NULL,16),(17,108,'ag raj',1,2.00,5000.00,1,1,0,NULL,'','','','No','2021-07-06 09:53:16','0000-00-00 00:00:00',NULL,12),(18,108,'ag raj',2,1.00,1500.00,1,1,0,NULL,'','','','No','2021-07-06 10:06:08','0000-00-00 00:00:00',NULL,13),(19,119,'John',1,1.00,5000.00,1,1,1,'2021-07-07 00:00:00','stud did1','certi id1','/RH124/16','No','2021-07-06 13:17:22','2021-07-06 13:18:08',NULL,12),(20,119,'John',1,1.00,1111.00,1,1,0,NULL,'','','Batch014/RH124/17','No','2021-07-06 14:04:59','0000-00-00 00:00:00',NULL,16);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_levels`
--

DROP TABLE IF EXISTS `sub_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sub_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_levels`
--

LOCK TABLES `sub_levels` WRITE;
/*!40000 ALTER TABLE `sub_levels` DISABLE KEYS */;
INSERT INTO `sub_levels` VALUES (1,'Beginner',NULL,NULL),(2,'Intermediate',NULL,NULL),(3,'Expert',NULL,NULL);
/*!40000 ALTER TABLE `sub_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'Physics',NULL,NULL),(2,'Chemistry',NULL,NULL),(3,'Thermodynamics',NULL,NULL),(4,'Maths',NULL,NULL),(5,'Zoology',NULL,NULL),(6,'Electronics','2021-05-05 03:25:44','2021-05-05 03:25:44'),(7,'Computer Science','2021-05-05 03:27:56','2021-05-05 03:27:56'),(8,'computer network','2021-05-05 03:29:47','2021-05-05 03:29:47'),(9,'Java','2021-05-05 03:30:29','2021-05-05 03:30:29'),(12,'Geospace','2021-05-05 03:47:08','2021-05-05 03:47:08'),(13,'Mysql and PHP','2021-05-05 05:42:59','2021-05-05 05:42:59'),(14,'oracle cloud','2021-05-05 23:38:28','2021-05-05 23:38:28'),(15,'sample subject','2021-05-06 06:09:22','2021-05-06 06:09:22'),(24,'sub','2021-05-19 05:50:44','2021-05-19 05:50:44'),(25,'Thermodyna',NULL,NULL),(26,'Piano','2021-06-01 14:24:20','2021-06-01 14:24:20'),(27,'Piano keyboard','2021-06-01 14:24:51','2021-06-01 14:24:51'),(28,'English','2021-06-01 15:11:57','2021-06-01 15:11:57'),(29,'Math Reasoning','2021-06-01 15:12:14','2021-06-01 15:12:14'),(30,'Finance and management Accounting','2021-06-01 15:12:44','2021-06-01 15:12:44'),(31,'aws','2021-06-02 19:41:22','2021-06-02 19:41:22');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payments`
--

DROP TABLE IF EXISTS `tbl_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `student_id` int NOT NULL,
  `course_id` int NOT NULL,
  `date` datetime NOT NULL,
  `amount_paid` float NOT NULL,
  `note` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payments`
--

LOCK TABLES `tbl_payments` WRITE;
/*!40000 ALTER TABLE `tbl_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_templates`
--

DROP TABLE IF EXISTS `tbl_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_templates` (
  `template_id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `template_data` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_dts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_templates`
--

LOCK TABLES `tbl_templates` WRITE;
/*!40000 ALTER TABLE `tbl_templates` DISABLE KEYS */;
INSERT INTO `tbl_templates` VALUES (1,'Student Certificate','<!DOCTYPE>\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n<title>Certificates</title>\r\n<style>\r\n@font-face {\r\n    font-family: Arial;\r\n    src: url(certificate_files/arial.ttf);\r\n}\r\n\r\n@font-face {\r\n    font-family: certificate;\r\n    src: url(certificate_files/certificate.ttf);\r\n}\r\n@font-face {\r\n    font-family: Old English Text MT;\r\n    src: url(certificate_files/OTT.ttf);\r\n}	\r\n\r\n</style>\r\n</head>\r\n\r\n<body>\r\n<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:10px solid #28829F; border-radius:10px;\">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:6px solid #ffffff;\">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"border:2px solid #28829F; \">\r\n  <tr>\r\n    <td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" class=\"printimg\">\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"padding:8px;\"><img src=\"$image_url/logo.jpg\" width=\"257\"></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"font-family:Old English Text MT;\"><h1>$course Course Certification</h1></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"\"  height=\"200\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n          <tr>\r\n            <td align=\"center\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:22px; color: #333333; padding-top:10px;\"><p>Be it known that the faculty of Talentegra  Technology Services hereby confirms that</p></td>\r\n          </tr>\r\n          <tr>\r\n            <td height=\"60\" align=\"center\" style=\"font-family: Old English Text MT; font-size:36px; color:#28829F; border-bottom:  1px dashed #28829F;\">$student_name</td>\r\n          </tr>\r\n          <tr>\r\n            <td align=\"center\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:22px; color: #333333; padding-top:10px;\"><p>has successfully completed the $course  Certification Program, and the comprehensive examination required to receive  certification as an $course Course Completion Program.</p></td>\r\n          </tr>\r\n        </table></td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\" style=\"height:90px;\">&nbsp;</td>\r\n      </tr>\r\n      <tr>\r\n        <td align=\"center\" valign=\"middle\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n             <tr>\r\n               <td width=\"32%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                 <tbody>\r\n                   <tr>\r\n                     <th scope=\"col\" style=\"border-bottom:  1px dashed #000000;\">$completion_date</th>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"font-family:Arial\">Date</td>\r\n                   </tr>\r\n                 </tbody>\r\n               </table></td>\r\n               <td width=\"43%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><img src=\"$image_url/medal.png\" width=\"112\" height=\"231\"></td>\r\n               <td width=\"25%\" align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n                 <tbody>\r\n                   <tr>\r\n                     <th scope=\"col\" style=\"border-bottom:  1px dashed #000000;\">&nbsp;</th>\r\n                   </tr>\r\n                   <tr>\r\n                     <td align=\"center\" style=\"font-family:Arial;\">Head Training - Talentegra</td>\r\n                   </tr>\r\n                 </tbody>\r\n               </table></td>\r\n             </tr>\r\n             <tr>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n               <td align=\"center\" valign=\"middle\" style=\"border-bottom:0px solid #333333; font-family:Arial; font-size:16px; color: #333333; padding-top:10px;\">&nbsp;</td>\r\n             </tr>\r\n             </table></td>\r\n      </tr>\r\n      \r\n     \r\n    </table></td>\r\n  </tr>\r\n</table>\r\n</td>\r\n  </tr>\r\n</table>\r\n</td>\r\n  </tr>\r\n</table>\r\n</body>\r\n</html>','Active','2021-06-29 12:59:21');
/*!40000 ALTER TABLE `tbl_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_details` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `middle_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `martial_status` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `husband_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guardian` tinyint NOT NULL DEFAULT '0',
  `guardian_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `guardian_mobile` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `father_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `mother_name` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `salary` int DEFAULT NULL,
  `present_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `permanent_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `area` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `city` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `zipcode` int DEFAULT NULL,
  `mobile` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` int DEFAULT NULL,
  `qualification` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `occupation` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `physically_challenged` tinyint NOT NULL DEFAULT '1',
  `physically_challenged_details` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_email`
--

DROP TABLE IF EXISTS `user_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_email` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `flags` int unsigned NOT NULL DEFAULT '0',
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `address` (`address`),
  KEY `user_email_lookup` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_email`
--

LOCK TABLES `user_email` WRITE;
/*!40000 ALTER TABLE `user_email` DISABLE KEYS */;
INSERT INTO `user_email` VALUES (1,1,0,'vivekra@talentegra.com'),(2,0,0,'srividhyav@talentegra.com');
/*!40000 ALTER TABLE `user_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_mobile`
--

DROP TABLE IF EXISTS `user_mobile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_mobile` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `flags` int unsigned NOT NULL DEFAULT '0',
  `mobile_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mobile_no` (`mobile_no`),
  KEY `user_mobile_lookup` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_mobile`
--

LOCK TABLES `user_mobile` WRITE;
/*!40000 ALTER TABLE `user_mobile` DISABLE KEYS */;
INSERT INTO `user_mobile` VALUES (1,1,0,'9841533114'),(2,2,1,'9841934874');
/*!40000 ALTER TABLE `user_mobile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `org_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `default_email_id` int DEFAULT NULL,
  `default_mobile_no` int DEFAULT NULL,
  `user_type` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iam_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `only_acc` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `temp_email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `last_login` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (100,0,'Ashwin Joy','sangeetha@acrasolutions.com','2021-06-01 14:18:25',NULL,NULL,'',0,0,'Teacher','Individual Teacher','$2y$10$gHp8b3VMiH.M2B.U6aZPFe8oENA6/4yKgu6WIceyHvR49SgO2zPUK',NULL,'+91 9943106345',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 14:17:53','2021-06-08 14:48:14','2021-06-08 14:48:14'),(101,0,'Sayooj','sangeetha@acrainfotech.com','2021-06-01 15:08:49',NULL,NULL,'',0,0,'Teacher','Tutoring Company','$2y$10$dJRLPiMrbRJ7RPwoWvKRg.f.P7iTsYfq7I96hXz0e/c4eSCmbxKsG',NULL,'+91 9932567943',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 15:08:28','2021-06-01 19:07:32','2021-06-01 19:07:32'),(102,0,'Meena','meena57108@gmail.com','2021-06-01 15:24:21',NULL,NULL,'',0,0,'Teacher','Individual Teacher','$2y$10$/PeUuOq.XHtrurq2scKQ7.bNWlUo5PMk.tRIUq/cKQGMMJ5sOUgL6',NULL,'+919943654327',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 15:23:59','2021-06-01 16:38:35','2021-06-01 16:38:35'),(105,0,'Nelson','wasim@acrainfotech.com','2021-06-01 15:37:49',NULL,NULL,'',0,0,'Student/Parent','Student/Parent','$2y$10$oqLpzYAD7AnXU.VRx4vNkeCSKpQFhUrstpMG4zY0mqkgSnOK/2MYO',NULL,'9562195621',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 15:37:24','2021-06-08 13:25:54','2021-06-08 13:25:54'),(107,0,'Johnson','wasimakramsyed1989@gmail.com','2021-06-01 15:54:21',NULL,NULL,'',0,0,'Student/Parent','Student/Parent','$2y$10$3AQcVzcbChoLkbYc3T/iLeRzwygbaKkRJfrSuXSns/bDkFDHcvVW.',NULL,'9876598765',NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 15:53:56','2021-06-01 21:14:05','2021-06-01 21:14:05'),(108,0,'ag raj','agrmax@gmail.com','2021-06-01 20:04:55',NULL,NULL,'',0,0,'Student/Parent','Student/Parent','$2y$10$Fr47aTuE2kAVe5QEwDVUHO1hLFlcBI7YH6VxxO6/pBr3uNBkV6scG',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 20:03:17','2021-06-02 15:09:24','2021-06-02 15:09:24'),(109,0,'Wasim Akram Syed','wasimdeep@gmail.com','2021-06-01 21:15:56',NULL,NULL,'',0,0,'Student/Parent','Student/Parent','$2y$10$h7RG1IYu07prwuOIlR9zPeUcn2XqTjLFmvRX6vKfKk3GqGkAzpjau',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-01 21:15:45','2021-06-08 14:46:34','2021-06-08 14:46:34'),(110,0,'AGR','agrmax@digitalq.co.in','2021-06-02 19:43:28',NULL,NULL,'',0,0,'Teacher','Individual Teacher','$2y$10$gFVoilyYt1fKQ2lfRd0pcOgemf0JU8U1lGFubRjKrmHz9fDU8/d9C',NULL,'1234567',NULL,NULL,'yes',NULL,0,NULL,'2021-06-02 15:10:14','2021-06-02 19:44:19','2021-06-02 19:44:19'),(111,0,'john','info@acrainfotech.com','2021-06-08 13:28:20','ff12345we','gg12345we','',0,0,'Student/Parent','Student/Parent','$2y$10$jSksiIm9g3ciYD27Ou1eHu.m/1fhcU3dmLcc988B5bxOyY/voMFKG',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-08 13:27:07','2021-06-08 14:35:45','2021-06-08 14:35:45'),(112,0,'Vivek','billing@talentegra.com','2021-06-09 21:41:07','ff12345we','gg12345we','',0,0,'Student/Parent','Student/Parent','$2y$10$Txl0VQuaf.bDWFSqrcWJEejtCxcsZwkvYYZBhIjNQJDWUj/X6iUMq',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-09 21:14:22','2021-06-09 22:56:19','2021-06-09 22:56:19'),(113,0,'Somashree','somashree@techarima.com','2021-06-10 07:48:14','ff12345we','gg12345we','',0,0,'Student/Parent','Student/Parent','$2y$10$9SC84BuKpVZxafEwLn009.wV.wg6DOmbHvUyqq2tmiYzdiNb7NGPq',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-10 07:46:56','2021-06-10 09:55:57','2021-06-10 09:55:57'),(114,0,'Somashree','somashree@talentegra.com','2021-06-10 09:59:53','ff12345we','gg12345we','',0,0,'Teacher','Individual Teacher','$2y$10$OyIh2RB3jQmaOk8CVOdFouqBvWyAK/Ha3m8u1orz5t.xCwJ7s.EsG',NULL,NULL,NULL,NULL,'yes',NULL,0,NULL,'2021-06-10 09:58:04','2021-06-10 12:48:14','2021-06-10 12:48:14'),(115,NULL,'Srivdhya Vivek','srividhyav@talentegra.com','2021-06-22 09:47:51','ff12345we','gg12345we',NULL,NULL,NULL,'Student/Parent','Student/Parent','$2y$10$vu5bDuXCPbPVTea3pSCrAOJY4hstfBkrjOFfMhiELPVuix3YDvQry',NULL,NULL,NULL,NULL,'yes',NULL,NULL,NULL,'2021-06-22 09:47:01','2021-06-22 09:50:10','2021-06-22 09:50:10'),(116,NULL,'Rk','newstudent@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,'9999933333',NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-28 14:05:44',NULL,NULL),(117,NULL,'SS','ss@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,'9999933332',NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-28 14:12:11',NULL,NULL),(118,NULL,'Asmitha','asmitharshetty@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,'',NULL,'9874563698',NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-29 17:44:35',NULL,NULL),(119,NULL,'John','John@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,'Student/Parent',NULL,'',NULL,'9999933987',NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-03 11:45:14',NULL,NULL),(121,NULL,'Arun','arunkumar@digitalq.co.in',NULL,'ff12345we','gg12345we',NULL,NULL,NULL,'Teacher','Individual Teacher','$2y$10$v1Bk790IPZi.zwNFvZQG8eQJiKMf.H8w48N2Lph5Y.1ozBC61Ply.',NULL,'43242342342',NULL,NULL,'yes',NULL,NULL,NULL,'2021-07-04 19:45:06','2021-07-04 19:47:48','2021-07-04 19:47:48'),(122,NULL,'vivekra','vivekra@digitalqits.com',NULL,'ff12345we','gg12345we',NULL,NULL,NULL,'Student/Parent','Student/Parent','$2y$10$rnCZkCp1ysZcijGgfPSLY.Tx6L3/ndnZ1FvWuh9/gIVzfDMhFD87G',NULL,NULL,NULL,NULL,'yes',NULL,NULL,NULL,'2021-07-04 19:48:51','2021-07-04 19:48:51',NULL);
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

-- Dump completed on 2021-07-08 19:26:21
