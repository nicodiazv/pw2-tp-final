-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: pw2
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_agrupa_revistas`
--

DROP TABLE IF EXISTS `catalogo_agrupa_revistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_agrupa_revistas` (
  `catalogo_id` int(11) NOT NULL,
  `revista_id` int(11) NOT NULL,
  PRIMARY KEY (`catalogo_id`,`revista_id`),
  KEY `fk_catalogo_has_revista_revista1_idx` (`revista_id`),
  KEY `fk_catalogo_has_revista_catalogo1_idx` (`catalogo_id`),
  CONSTRAINT `fk_catalogo_has_revista_catalogo1` FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_catalogo_has_revista_revista1` FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_agrupa_revistas`
--

LOCK TABLES `catalogo_agrupa_revistas` WRITE;
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota`
--

DROP TABLE IF EXISTS `nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `imagen_nombre` varchar(45) DEFAULT NULL,
  `gratis` tinyint(4) DEFAULT NULL,
  `seccion_id` int(11) NOT NULL,
  `cuerpo` text NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`seccion_id`),
  KEY `fk_nota_seccion1_idx` (`seccion_id`),
  KEY `fk_nota_usuario_idx` (`usuario_id`),
  CONSTRAINT `fk_nota_seccion1` FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nota_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` VALUES (1,'Aumenta el dolar','Argentina',NULL,NULL,3,'aumenta todo!!!',1),(2,'titulliiiasid','asdasdxcc',NULL,NULL,4,'dhiopjfsilgjsdilfjaeorun05u0293',1),(3,'asdasd','asdasdas',NULL,NULL,3,'asdasdasd',1),(4,'asdasdaaz','asdasdaszz',NULL,NULL,3,'asdasdasd',1),(5,'asdasdaaz','asdasdaszz',NULL,NULL,3,'asdasdasd',1),(6,'asdas','asdasa',NULL,NULL,3,'sdasdsa',1),(7,'asdsad','saasdasa',NULL,NULL,1,'asassadasd',1),(8,'Messi quiere usar la 15','Barcelona',NULL,NULL,1,'Parece de locos pero el capitan de Barcelona no quiere usar mas la 10 y pidiÃ³ usar la 15',1),(9,'adasd','aasdaasd',NULL,NULL,1,'asasdsadassasasdsadas',1),(10,'fdgdfgfd','fdgfd',NULL,NULL,1,'fdfdf',1),(11,'asdsad','asdasd',NULL,NULL,2,'asasdasd',1),(12,'56465g4','asdasd',NULL,NULL,1,'sadsadad',1),(13,'asdasdasd','asdsaasd',NULL,NULL,2,'asdassadasd',1),(14,'asdasd','asdasdsadsad',NULL,NULL,2,'asdasdasdasd',1),(15,'asdasdas','asdasdas',NULL,NULL,2,'dasdasd',1),(16,'adsadas','asdasdasdasa',NULL,NULL,3,'czxveaasddsbfdaasdasd',1),(17,'asdsadasd','asdasdassdfgdsf',NULL,NULL,2,'gfsgfdgdfgdf',1),(18,'asdas','asdasdas',NULL,NULL,2,'asdasd',1),(19,'sdfsdf','sdfsdf',NULL,NULL,2,'',1);
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nro_revista`
--

DROP TABLE IF EXISTS `nro_revista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nro_revista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `fecha_publicacion` varchar(45) DEFAULT NULL,
  `revista_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`revista_id`),
  KEY `fk_nro_revista_revista1_idx` (`revista_id`),
  CONSTRAINT `fk_nro_revista_revista1` FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nro_revista`
--

LOCK TABLES `nro_revista` WRITE;
/*!40000 ALTER TABLE `nro_revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `nro_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nro_revista_tiene_notas`
--

DROP TABLE IF EXISTS `nro_revista_tiene_notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nro_revista_tiene_notas` (
  `nro_revista_id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `nota_seccion_id` int(11) NOT NULL,
  PRIMARY KEY (`nro_revista_id`,`nota_id`,`nota_seccion_id`),
  KEY `fk_nro_revista_has_nota_nota1_idx` (`nota_id`,`nota_seccion_id`),
  KEY `fk_nro_revista_has_nota_nro_revista1_idx` (`nro_revista_id`),
  CONSTRAINT `fk_nro_revista_has_nota_nota1` FOREIGN KEY (`nota_id`, `nota_seccion_id`) REFERENCES `nota` (`id`, `seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nro_revista_has_nota_nro_revista1` FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nro_revista_tiene_notas`
--

LOCK TABLES `nro_revista_tiene_notas` WRITE;
/*!40000 ALTER TABLE `nro_revista_tiene_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nro_revista_tiene_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `revista`
--

DROP TABLE IF EXISTS `revista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `revista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio_suscripcion_mensual` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `revista`
--

LOCK TABLES `revista` WRITE;
/*!40000 ALTER TABLE `revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,'Deporte'),(2,'Espectaculos'),(3,'Economia'),(4,'Politica');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pago`
--

DROP TABLE IF EXISTS `tipo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion`
--

DROP TABLE IF EXISTS `transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `importe_total` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `tipo_pago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`tipo_pago_id`),
  KEY `fk_transaccion_tipo_pago1_idx` (`tipo_pago_id`),
  CONSTRAINT `fk_transaccion_tipo_pago1` FOREIGN KEY (`tipo_pago_id`) REFERENCES `tipo_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `usuario_tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuario_tipo_id`),
  KEY `fk_usuario_usuario_tipo_idx` (`usuario_tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Contenidista','Perez','contenidista@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,2),(12,'Admin','Lopez','admin@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1),(13,'Lector','Gonzales','lector@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_compra_nro_revista`
--

DROP TABLE IF EXISTS `usuario_compra_nro_revista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_compra_nro_revista` (
  `usuario_id` int(11) NOT NULL,
  `usuario_usuario_tipo_id` int(11) NOT NULL,
  `nro_revista_id` int(11) NOT NULL,
  `transaccion_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`usuario_usuario_tipo_id`,`nro_revista_id`,`transaccion_id`),
  KEY `fk_usuario_has_nro_revista_nro_revista1_idx` (`nro_revista_id`),
  KEY `fk_usuario_has_nro_revista_usuario1_idx` (`usuario_id`,`usuario_usuario_tipo_id`),
  KEY `fk_usuario_compra_nro_revista_transaccion1_idx` (`transaccion_id`),
  CONSTRAINT `fk_usuario_compra_nro_revista_transaccion1` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_nro_revista_nro_revista1` FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_nro_revista_usuario1` FOREIGN KEY (`usuario_id`, `usuario_usuario_tipo_id`) REFERENCES `usuario` (`id`, `usuario_tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_compra_nro_revista`
--

LOCK TABLES `usuario_compra_nro_revista` WRITE;
/*!40000 ALTER TABLE `usuario_compra_nro_revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_compra_nro_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_suscribe_revista`
--

DROP TABLE IF EXISTS `usuario_suscribe_revista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_suscribe_revista` (
  `usuario_id` int(11) NOT NULL,
  `usuario_usuario_tipo_id` int(11) NOT NULL,
  `revista_id` int(11) NOT NULL,
  `transaccion_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`usuario_id`,`usuario_usuario_tipo_id`,`revista_id`,`transaccion_id`),
  KEY `fk_usuario_has_revista_revista1_idx` (`revista_id`),
  KEY `fk_usuario_has_revista_usuario1_idx` (`usuario_id`,`usuario_usuario_tipo_id`),
  KEY `fk_usuario_suscribe_revista_transaccion1_idx` (`transaccion_id`),
  CONSTRAINT `fk_usuario_has_revista_revista1` FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_revista_usuario1` FOREIGN KEY (`usuario_id`, `usuario_usuario_tipo_id`) REFERENCES `usuario` (`id`, `usuario_tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_suscribe_revista_transaccion1` FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_suscribe_revista`
--

LOCK TABLES `usuario_suscribe_revista` WRITE;
/*!40000 ALTER TABLE `usuario_suscribe_revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_suscribe_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_tipo`
--

DROP TABLE IF EXISTS `usuario_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_tipo`
--

LOCK TABLES `usuario_tipo` WRITE;
/*!40000 ALTER TABLE `usuario_tipo` DISABLE KEYS */;
INSERT INTO `usuario_tipo` VALUES (1,'admin'),(2,'contenidista'),(3,'lector');
/*!40000 ALTER TABLE `usuario_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pw2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-10 23:03:35
