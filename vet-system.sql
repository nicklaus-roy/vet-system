-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: animal_haven
-- ------------------------------------------------------
-- Server version	5.7.9-log

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contact_number` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Doe','John','',2,NULL),(2,'Dela Cruz','Juan','C',4,'911'),(3,'Roy','Nicklaus','C',3,'09774247959'),(4,'anonymous','anonymous','anonymous',NULL,'anonymous');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_body` varchar(455) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date_time_sent` timestamp NULL DEFAULT NULL,
  `subject` varchar(455) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `official_receipts`
--

DROP TABLE IF EXISTS `official_receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `official_receipts` (
  `receipt_number` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_date` date DEFAULT NULL,
  `customer` varchar(455) DEFAULT NULL,
  `remarks` varchar(455) DEFAULT NULL,
  `payment_method` varchar(45) DEFAULT NULL,
  `total_sales` float(10,2) DEFAULT NULL,
  `amount_given` float(10,2) DEFAULT NULL,
  `customer_change` float(10,2) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `check_number` varchar(45) DEFAULT NULL,
  `amount_due` float(10,2) DEFAULT NULL,
  `discount` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`receipt_number`)
) ENGINE=InnoDB AUTO_INCREMENT=831 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `official_receipts`
--

LOCK TABLES `official_receipts` WRITE;
/*!40000 ALTER TABLE `official_receipts` DISABLE KEYS */;
INSERT INTO `official_receipts` VALUES (812,'2016-10-04','1',NULL,'cash',1000.00,1000.00,0.00,NULL,NULL,NULL,NULL),(813,'2017-10-04','1',NULL,'cash',1150.00,2000.00,850.00,NULL,NULL,NULL,NULL),(814,'2017-10-04','1',NULL,'cash',1000.00,1200.00,200.00,NULL,NULL,NULL,NULL),(815,'2017-10-04','',NULL,'cash',780.00,1000.00,220.00,NULL,NULL,NULL,NULL),(816,'2017-10-04','',NULL,'check',150.00,NULL,NULL,'Metrobank','454612',NULL,NULL),(817,'2017-10-05','3',NULL,'cash',750.00,1000.00,250.00,NULL,NULL,NULL,NULL),(818,'2017-10-05','',NULL,'check',150.00,200.00,50.00,'Metrobank','4545454',NULL,NULL),(819,'2017-10-06','','None','cash',150.00,150.00,15.00,NULL,NULL,0.00,NULL),(820,'2017-10-07','','None','cash',150.00,150.00,15.00,NULL,NULL,0.00,NULL),(821,'2017-10-07','','None','cash',150.00,200.00,65.00,NULL,NULL,0.00,NULL),(822,'2017-10-07','','None','check',150.00,150.00,0.00,'aasa','4545',0.00,NULL),(823,'2017-10-07','','None','cash',150.00,150.00,15.00,NULL,NULL,135.00,15.00),(824,'2017-10-07','','','cash',150.00,150.00,30.00,NULL,NULL,120.00,30.00),(825,'2017-10-07','4','non','cash',150.00,150.00,15.00,NULL,NULL,135.00,15.00),(826,'2017-10-07','4','none','cash',150.00,150.00,15.00,NULL,NULL,135.00,15.00),(827,'2017-10-07','4','none','check',2510.00,3000.00,992.00,'Meeas','15454',2008.00,502.00),(828,'2017-10-07','4','none','check',2510.00,3000.00,992.00,'Meeas','15454',2008.00,502.00),(829,'2017-10-07','4','none','check',2510.00,3000.00,992.00,'Meeas','15454',2008.00,502.00),(830,'2017-10-07','4','none','check',2510.00,3000.00,992.00,'Meeas','15454',2008.00,502.00);
/*!40000 ALTER TABLE `official_receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pets` (
  `id` varchar(45) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `species` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pets`
--

LOCK TABLES `pets` WRITE;
/*!40000 ALTER TABLE `pets` DISABLE KEYS */;
INSERT INTO `pets` VALUES ('PET-1',1,'Doggo','Dog'),('PET-2',1,'Moon Moon','Dog'),('PET-3',1,'Dogoo','small mammal'),('PET-4',3,'Dollar','dog'),('PET-5',4,'Anonymous','Anonymous');
/*!40000 ALTER TABLE `pets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Vitamins'),(2,'Dewormers/Entoparaciticles'),(3,'Vaccines'),(4,'Shampoos'),(5,'Cologne'),(6,'Soaps/Powders'),(7,'Antibiotics'),(8,'Anti Ticks & Flea Preparators');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(455) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `description` varchar(455) DEFAULT NULL,
  `reorder_quantity` int(11) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `product_category_id` int(11) NOT NULL,
  `supplier_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`product_category_id`,`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (6,'Lc Vit',5,130.00,'sample.png','Vitamins - 60mL',20,NULL,1,'1'),(8,'Papi Multivitamins Syrup',56,200.00,NULL,'120 ml',50,NULL,1,'1'),(9,'Barfy',43,100.00,NULL,'60 ml',30,NULL,1,'1'),(10,'Forza Animal DS',50,260.00,NULL,'120 ml',20,NULL,1,'1'),(11,'Pet Tabs',65,550.00,NULL,'60 tablet',50,NULL,1,'1'),(12,'V-22 Tablet',59,50.00,NULL,'30 tablet',30,NULL,1,'1'),(13,'Prazel',65,160.00,NULL,'60ml',30,NULL,1,'1'),(14,'Papi Pivantel',54,360.00,'s','60ml',40,NULL,2,'1'),(15,'ARV',47,150.00,NULL,'60ml',30,NULL,3,'1'),(16,'Froutline',58,450.00,NULL,'100ml',40,NULL,8,'1'),(17,'L4',54,350.00,NULL,'5ml',30,NULL,3,'1'),(18,'CR',65,500.00,NULL,'6ml',30,NULL,3,'1'),(19,'L Selen',43,450.00,NULL,'250ml',30,NULL,4,'1'),(20,'Bayopet',69,135.00,NULL,'100ml',30,NULL,3,'1'),(21,'Tick Medication',45,500.00,NULL,'300 grams',10,NULL,6,'2'),(22,'Rabies x02',60,2000.00,NULL,'Anti Rabbies Medication',10,NULL,3,'15');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` varchar(45) NOT NULL,
  `service_id` varchar(45) NOT NULL,
  `pet_id` varchar(45) DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `reservation_date` date DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT NULL,
  `is_home_service` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`,`client_id`,`service_id`),
  KEY `fk_reservations_reservation_time_slots1_idx` (`time_from`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (58,'1','','','01:00:00','2017-10-06','01:00:00',NULL,NULL),(59,'1','SRV-1','','08:15:00','2017-10-06','11:15:00',NULL,NULL);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `receipt_number` int(11) NOT NULL,
  `original_amount` float(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`,`product_id`,`receipt_number`),
  KEY `fk_sales_products1_idx` (`product_id`),
  KEY `fk_sales_receipts1_idx` (`receipt_number`),
  CONSTRAINT `fk_or_num` FOREIGN KEY (`receipt_number`) REFERENCES `official_receipts` (`receipt_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (15,150.00,1,15,813,NULL),(16,780.00,3,10,815,NULL),(17,150.00,1,15,816,NULL),(18,450.00,3,15,817,NULL),(20,150.00,1,15,818,NULL),(21,-52.50,1,15,819,NULL),(22,-52.50,1,15,820,NULL),(23,135.00,1,15,821,NULL),(24,150.00,1,15,822,NULL),(25,135.00,1,15,823,NULL),(26,120.00,1,15,824,NULL),(27,135.00,1,15,826,150.00),(28,360.00,3,15,827,450.00),(29,208.00,1,10,827,260.00),(30,440.00,1,11,827,550.00),(31,360.00,3,15,828,450.00),(32,208.00,1,10,828,260.00),(33,440.00,1,11,828,550.00),(34,360.00,3,15,829,450.00),(35,208.00,1,10,829,260.00),(36,440.00,1,11,829,550.00),(37,360.00,3,15,830,450.00),(38,208.00,1,10,830,260.00),(39,440.00,1,11,830,550.00);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` varchar(45) NOT NULL,
  `name` varchar(455) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `duration_in_min` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES ('SRV-1','Grooming',1000.00,180),('SRV-2','Surgery',500.00,NULL),('SRV-3','Vaccination',0.00,15),('SRV-5','Deworming',300.00,30),('SRV-6','Consultation',250.00,30);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_rendered`
--

DROP TABLE IF EXISTS `services_rendered`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_rendered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` float(10,2) DEFAULT NULL,
  `actual_price` float(10,2) DEFAULT NULL,
  `remarks` varchar(455) DEFAULT NULL,
  `service_id` varchar(45) NOT NULL,
  `pet_id` varchar(45) NOT NULL,
  `receipt_number` int(11) NOT NULL,
  PRIMARY KEY (`id`,`service_id`,`pet_id`,`receipt_number`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_rendered`
--

LOCK TABLES `services_rendered` WRITE;
/*!40000 ALTER TABLE `services_rendered` DISABLE KEYS */;
INSERT INTO `services_rendered` VALUES (7,1000.00,1000.00,NULL,'SRV-1','PET-1',813),(8,1000.00,1000.00,NULL,'SRV-1','PET-2',814),(9,1000.00,1000.00,NULL,'SRV-1','PET-1',812),(10,300.00,300.00,NULL,'SRV-5','PET-4',817),(11,250.00,250.00,NULL,'SRV-6','PET-5',827),(12,1000.00,1000.00,NULL,'SRV-1','PET-5',827),(13,250.00,250.00,NULL,'SRV-6','PET-5',828),(14,1000.00,1000.00,NULL,'SRV-1','PET-5',828),(15,250.00,250.00,NULL,'SRV-6','PET-5',829),(16,1000.00,1000.00,NULL,'SRV-1','PET-5',829),(17,250.00,200.00,NULL,'SRV-6','PET-5',830),(18,1000.00,800.00,NULL,'SRV-1','PET-5',830);
/*!40000 ALTER TABLE `services_rendered` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` varchar(45) NOT NULL,
  `name` varchar(455) DEFAULT NULL,
  `contact_number` varchar(455) DEFAULT NULL,
  `address` varchar(455) DEFAULT NULL,
  `email` varchar(455) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES ('1','Axon Farm Depot',NULL,NULL,NULL),('10','Manz Enterprises',NULL,NULL,NULL),('11','Togalabz Agroharvesters Trading',NULL,NULL,NULL),('12','Rising Sun Commercial',NULL,NULL,NULL),('13','VetMate Farma Corp.',NULL,NULL,NULL),('14','Plaridel Products',NULL,NULL,NULL),('15','WillMed Medical Distributer',NULL,NULL,NULL),('16','Bedan',NULL,NULL,NULL),('2','Belmah Laboratories',NULL,NULL,NULL),('3','Dunsk Kuhner Corp',NULL,NULL,NULL),('4','EVR Vet Options',NULL,NULL,NULL),('5','JFL Agri Ventures',NULL,NULL,NULL),('6','Nutratech',NULL,NULL,NULL),('7','Symphonix Integrated Corp',NULL,NULL,NULL),('8','Pet One Inc.',NULL,NULL,NULL),('9','Mikolas',NULL,NULL,NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(455) DEFAULT NULL,
  `role` varchar(455) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','password','admin',NULL,NULL,NULL),(2,'client','password','client','John','','Doe'),(3,'Nicklaus, Roy','password','client','Nicklaus','Calpase','Roy'),(4,'Juan Dela Cruz','password','client','Juan','C','Dela Cruz');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'animal_haven'
--

--
-- Dumping routines for database 'animal_haven'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-07  2:06:42
