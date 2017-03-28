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
-- Table structure for table `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `carreras_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`carreras_id`),
  KEY `fk_Alumnos_carreras1_idx` (`carreras_id`),
  CONSTRAINT `fk_Alumnos_carreras1` FOREIGN KEY (`carreras_id`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnos`
--

LOCK TABLES `alumnos` WRITE;
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` VALUES (1,'Ivan','Chacon','Chavez',2),(4,'Pedrito','Alvares','Vazques',1);
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carreras`
--

DROP TABLE IF EXISTS `carreras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carreras`
--

LOCK TABLES `carreras` WRITE;
/*!40000 ALTER TABLE `carreras` DISABLE KEYS */;
INSERT INTO `carreras` VALUES (1,'Lic. Contador Público'),(2,'Lic. Administración y Tecnologías de la Información'),(3,'Lic. Mercadotecnia y Negocios Internacionales'),(4,'Lic. Administración');
/*!40000 ALTER TABLE `carreras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clasificacion_empresa`
--

DROP TABLE IF EXISTS `clasificacion_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clasificacion_empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(45) DEFAULT NULL,
  `numeros` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clasificacion_empresa`
--

LOCK TABLES `clasificacion_empresa` WRITE;
/*!40000 ALTER TABLE `clasificacion_empresa` DISABLE KEYS */;
INSERT INTO `clasificacion_empresa` VALUES (1,'Micro','0 - 10'),(2,'Pequeña','11 - 49'),(3,'Mediana','50 - 250'),(4,'Gran Empresa','250 >');
/*!40000 ALTER TABLE `clasificacion_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonias`
--

DROP TABLE IF EXISTS `colonias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonias`
--

LOCK TABLES `colonias` WRITE;
/*!40000 ALTER TABLE `colonias` DISABLE KEYS */;
INSERT INTO `colonias` VALUES (1,'Sin Asignar'),(2,'Centro'),(3,'Francisco de Montejo'),(5,'Chuburna'),(6,'Pensiones Etapa II');
/*!40000 ALTER TABLE `colonias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `depto` varchar(255) DEFAULT NULL,
  `empresas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (1,'Contacto Nuevo','correo@nuevo.com','0000','Gerencia General',1);
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `despachos`
--

DROP TABLE IF EXISTS `despachos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despachos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `colegio` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `despachos`
--

LOCK TABLES `despachos` WRITE;
/*!40000 ALTER TABLE `despachos` DISABLE KEYS */;
INSERT INTO `despachos` VALUES (2,'Asociados 2','3453');
/*!40000 ALTER TABLE `despachos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `giro_id` int(11) NOT NULL DEFAULT '1',
  `calle` varchar(255) DEFAULT NULL,
  `num_inter` varchar(255) DEFAULT NULL,
  `num_exter` varchar(255) DEFAULT NULL,
  `cruzamientos` varchar(255) DEFAULT NULL,
  `colonia_id` varchar(255) DEFAULT NULL,
  `cp` varchar(255) DEFAULT NULL,
  `clasificacion_empresa_id` int(11) NOT NULL DEFAULT '1',
  `nombre_comercial` varchar(255) DEFAULT NULL,
  `nombre_razon_social` varchar(255) DEFAULT NULL,
  `entidades_id` int(11) NOT NULL DEFAULT '31',
  `sector_id` int(11) NOT NULL DEFAULT '1',
  `subsector_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`,`giro_id`,`clasificacion_empresa_id`,`entidades_id`,`sector_id`,`subsector_id`),
  KEY `fk_empresas_giro1_idx` (`giro_id`),
  KEY `fk_empresas_entidades1_idx` (`entidades_id`),
  KEY `fk_empresas_clasificacion_empresa1_idx` (`clasificacion_empresa_id`),
  KEY `fk_empresas_sector1_idx` (`sector_id`),
  KEY `fk_empresas_subsector1_idx` (`subsector_id`),
  KEY `giro_id` (`giro_id`),
  CONSTRAINT `fk_empresas_clasificacion_empresa1` FOREIGN KEY (`clasificacion_empresa_id`) REFERENCES `clasificacion_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_entidades1` FOREIGN KEY (`entidades_id`) REFERENCES `entidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_giro1` FOREIGN KEY (`giro_id`) REFERENCES `giro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_empresas_subsector1` FOREIGN KEY (`subsector_id`) REFERENCES `subsector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,1,'87','500','281','57 y 54','3','97000',2,'Mayuquita','Mayuquita SA de CV',1,1,1),(2,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(3,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(4,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(5,1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,31,1,1),(6,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'modal bitacora',NULL,31,1,1),(7,1,NULL,NULL,NULL,NULL,NULL,NULL,1,'Modal Practica',NULL,31,1,1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `estatus_practicas`
--

DROP TABLE IF EXISTS `estatus_practicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estatus_practicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estatus_practicas`
--

LOCK TABLES `estatus_practicas` WRITE;
/*!40000 ALTER TABLE `estatus_practicas` DISABLE KEYS */;
INSERT INTO `estatus_practicas` VALUES (1,'Activa'),(2,'Cancelada'),(3,'Finalizada'),(4,'Pendiente');
/*!40000 ALTER TABLE `estatus_practicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giro`
--

DROP TABLE IF EXISTS `giro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giro`
--

LOCK TABLES `giro` WRITE;
/*!40000 ALTER TABLE `giro` DISABLE KEYS */;
INSERT INTO `giro` VALUES (1,'Sin Asignar',1);
/*!40000 ALTER TABLE `giro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `practicas_profesionales`
--

DROP TABLE IF EXISTS `practicas_profesionales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `practicas_profesionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresas_id` int(11) DEFAULT NULL,
  `despacho_id` int(11) DEFAULT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `tipo_practica_id` int(11) DEFAULT NULL,
  `registroCP` varchar(255) DEFAULT NULL,
  `practica_inicio` date DEFAULT NULL,
  `practica_fin` date DEFAULT NULL,
  `apoyo_economico` int(11) NOT NULL,
  `constancia` varchar(45) DEFAULT NULL,
  `info` text,
  `Alumnos_id` int(11) DEFAULT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_practicas_profesionales_tipo_practica1_idx` (`tipo_practica_id`),
  CONSTRAINT `fk_practicas_profesionales_tipo_practica1` FOREIGN KEY (`tipo_practica_id`) REFERENCES `tipo_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `practicas_profesionales`
--

LOCK TABLES `practicas_profesionales` WRITE;
/*!40000 ALTER TABLE `practicas_profesionales` DISABLE KEYS */;
INSERT INTO `practicas_profesionales` VALUES (2,0,2,'juanito perez',2,'3453','2017-03-21','2017-09-26',0,NULL,'',1,1),(3,1,0,'Pepe pecas',1,'','2017-03-27','2017-03-27',0,NULL,'',1,1),(5,0,2,'jose perez',2,'3453','2017-03-28','2017-03-28',1,NULL,'ninguna',5,1),(6,1,0,'joselo',1,'','2017-03-28','2017-03-28',1,NULL,'',4,3),(7,0,2,'Pepe pecas',2,'3453','2017-03-28','2017-03-28',1,NULL,'',4,1);
/*!40000 ALTER TABLE `practicas_profesionales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sector`
--

DROP TABLE IF EXISTS `sector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sector`
--

LOCK TABLES `sector` WRITE;
/*!40000 ALTER TABLE `sector` DISABLE KEYS */;
INSERT INTO `sector` VALUES (1,'Sin Asignar',1),(2,'Comercial',1);
/*!40000 ALTER TABLE `sector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsector`
--

DROP TABLE IF EXISTS `subsector`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subsector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `sector_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`sector_id`),
  KEY `fk_subsector_sector1_idx` (`sector_id`),
  CONSTRAINT `fk_subsector_sector1` FOREIGN KEY (`sector_id`) REFERENCES `sector` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsector`
--

LOCK TABLES `subsector` WRITE;
/*!40000 ALTER TABLE `subsector` DISABLE KEYS */;
INSERT INTO `subsector` VALUES (1,'Sin Asignar',1);
/*!40000 ALTER TABLE `subsector` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_practica`
--

DROP TABLE IF EXISTS `tipo_practica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_practica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_practica`
--

LOCK TABLES `tipo_practica` WRITE;
/*!40000 ALTER TABLE `tipo_practica` DISABLE KEYS */;
INSERT INTO `tipo_practica` VALUES (1,'Depedencias'),(2,'Despachos'),(3,'Empresas');
/*!40000 ALTER TABLE `tipo_practica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador'),(2,'Prácticas Profesionales'),(3,'CEDENE');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido_p` varchar(255) DEFAULT NULL,
  `apellido_m` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo_usuario_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`tipo_usuario_id`),
  KEY `fk_usuarios_tipo_usuario_idx` (`tipo_usuario_id`),
  CONSTRAINT `fk_usuarios_tipo_usuario` FOREIGN KEY (`tipo_usuario_id`) REFERENCES `tipo_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Ivan Eduardo','Chavez','Chacon','admin','21232f297a57a5a743894a0e4a801fc3',1,1),(2,'Manuel','Basulto','Triay','practicaspro','87da37cf526180f41089d45505a65823',2,1),(3,'Cedene','cedene','cedene','cedene','9f3428e0ddbbe5951a23dae13d020e99',3,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-28  1:56:50
