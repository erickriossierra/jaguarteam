-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: uady
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `entidades`
--

DROP TABLE IF EXISTS `entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `nombre_abre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidades`
--

LOCK TABLES `entidades` WRITE;
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
INSERT INTO `entidades` VALUES (1,'Aguascalientes','Ags.'),(2,'Baja California','BC'),(3,'Baja California Sur','BCS'),(4,'Campeche','Camp.'),(5,'Coahuila de Zaragoza','Coah.'),(6,'Colima','Col.'),(7,'Chiapas','Chis.'),(8,'Chihuahua','Chih.'),(9,'Distrito Federal','DF'),(10,'Durango','Dgo.'),(11,'Guanajuato','Gto.'),(12,'Guerrero','Gro.'),(13,'Hidalgo','Hgo.'),(14,'Jalisco','Jal.'),(15,'México','Mex.'),(16,'Michoacán de Ocampo','Mich.'),(17,'Morelos','Mor.'),(18,'Nayarit','Nay.'),(19,'Nuevo León','NL'),(20,'Oaxaca','Oax.'),(21,'Puebla','Pue.'),(22,'Querétaro','Qro.'),(23,'Quintana Roo','Q. Roo'),(24,'San Luis Potosí','SLP'),(25,'Sinaloa','Sin.'),(26,'Sonora','Son.'),(27,'Tabasco','Tab.'),(28,'Tamaulipas','Tamps.'),(29,'Tlaxcala','Tlax.'),(30,'Veracruz de Ignacio de la Llave','Ver.'),(31,'Yucatán','Yuc.'),(32,'Zacatecas','Zac.');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28  1:57:34
