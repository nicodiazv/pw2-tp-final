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
-- Dumping data for table `catalogo`
--

LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` VALUES (1,'Deportes','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  deportes Esta es la descripcion del catalogo','catalogo_deportes.jpg'),(2,'Politica','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  politica Esta es la descripcion del catalogo','catalogo_politica.png'),(3,'Ciencia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  ciencia Esta es la descripcion del catalogo','catalogo_ciencia.jpg'),(4,'Espectaculos','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de espectaculos Esta es la descripcion del catalogo','catalogo_espectaculos.jpg'),(5,'Economia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de otra cosa Esta es la descripcion del catalogo','catalogo_economia.jpg');
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `catalogo_agrupa_revistas`
--

LOCK TABLES `catalogo_agrupa_revistas` WRITE;
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` DISABLE KEYS */;
INSERT INTO `catalogo_agrupa_revistas` VALUES (1,2),(2,3),(2,4),(4,5),(2,6),(1,7),(2,8),(4,9),(2,10),(5,11),(5,12);
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `nota`
--

LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` VALUES (1,'Titulo de una nota de General 1','Asda Stafford Superstore, Stafford, Reino Unido','ChIJBS72pH1xekgRzI8FOKOI4Lg','-34.518121','-58.497088','1ba5b197d1a5d714f5a19f698ee97027.jpg','enlace_1',0,1,'EDITADO Cuerpo de una nota de General',2,5,'EDITADO Este este es es el el copete copete de de la la nota nota'),(2,'Titulo de una nota de General 2','Ubicación 2','0','-36.518121','-58.497088','imagen_2','enlace_2',0,1,'Cuerpo de una nota de General',2,5,'Este este es es el el copete copete de de la la nota nota'),(3,'Titulo de una nota de General 3','Ubicación 3','0','-32.518121','-56.497088','imagen_3','enlace_3',0,1,'Cuerpo de una nota de General',3,5,'Este este es es el el copete copete de de la la nota nota'),(4,'Titulo de una nota de General 4','Ubicación 4','0','-34.008121','-57.497088','imagen_4','enlace_4',0,1,'Cuerpo de una nota de General',4,1,'Este este es es el el copete copete de de la la nota nota'),(5,'Titulo de una nota de General 5','Ubicación 5','0','-34.808121','-58.007088','imagen_5','enlace_5',0,1,'Cuerpo de una nota de General',4,1,'Este este es es el el copete copete de de la la nota nota'),(6,'Titulo de una nota de General 6','Ubicación 6','0','-37.518121','-51.497088','imagen_6','enlace_6',0,1,'Cuerpo de una nota de General',6,1,'Este este es es el el copete copete de de la la nota nota'),(7,'Titulo de una nota de General 7','Ubicación 7','0','-39.518121','-60.497088','imagen_7','enlace_7',0,1,'Cuerpo de una nota de General',7,1,'Este este es es el el copete copete de de la la nota nota'),(8,'Titulo de una nota de General 8','Ubicación 8','0','-34.518121','-58.497088','imagen_8','enlace_8',0,1,'Cuerpo de una nota de General',8,1,'Este este es es el el copete copete de de la la nota nota'),(9,'Aumenta la mandarina','Tapiales, Provincia de Buenos Aires, Argentina','ChIJNyOrs8LOvJURpQZtPYLMT0E','-34.7097342','-58.50057149999999','7e8d6b75b2f7cdc82352f44975102249.jpg','asdasdasdsa',NULL,1,'aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos aldasjlasjdla ajdlasd jlkaal alksalsd akljaiop aiodjaiso aipoapodpaos',1,5,'La nueva fruta de los ricos'),(10,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.','Flores, CABA, Argentina','ChIJR--SHIDJvJUR7kEdxB0LP8k','-34.6374837','-58.4601452','bad3d7bb071a41cfec71b24adc381758.jpg','Lorem, ipsum dolor sit amet consectetur adipisicing elit.',NULL,1,'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.',5,5,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.'),(11,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.','Caballito, CABA, Argentina','ChIJLav4ETnKvJURLX3Y88KUsyc','-34.6159245','-58.4406027','97c6952eefb7466368e8b2c740b2771c.jpg','Lorem, ipsum dolor sit amet consectetur adipisicing elit.',NULL,1,'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.',7,5,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.'),(12,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.','La Matanza, Provincia de Buenos Aires, Argentina','ChIJF1WyFS_GvJURmOeYNDWENO4','-34.6775894','-58.5616913','98156515f61559aec72f7bd1c7d01293.jpg','Lorem, ipsum dolor sit amet consectetur adipisicing elit.',NULL,1,'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.',1,5,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.'),(13,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.','Villa Soldati, CABA, Argentina','ChIJa0HG7PbLvJURs8L73uCCGn4','-34.6595958','-58.442814','11af2fe904cd8fb5be6230fc8b3b478f.jpg','Lorem, ipsum dolor sit amet consectetur adipisicing elit.',NULL,1,'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Lorem, ipsum dolor sit amet consectetur adipisicing elit.',2,5,'Lorem, ipsum dolor sit amet consectetur adipisicing elit.');
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `nro_revista`
--

LOCK TABLES `nro_revista` WRITE;
/*!40000 ALTER TABLE `nro_revista` DISABLE KEYS */;
INSERT INTO `nro_revista` VALUES (1,'Numero de revista 1 de la revista Clarin','100','2020-01-01',1),(2,'Numero de revista 1 de la revista Ole','140','2020-01-01',2),(3,'Numero de revista 1 de la revista La Nacion','120','2020-01-01',3),(4,'Numero de revista 1 de la revista Pronto','150','2020-01-01',4),(5,'Numero de revista 1 de la revista Gente','160','2020-01-01',5),(6,'Numero de revista 1 de la revista UNLAM','70','2020-01-01',6),(8,'Numero de revista 2 de la revista Clarin','400','2020-01-08',1),(9,'Numero de revista 2 de la revista Ole','100','2020-01-08',2),(10,'Numero de revista 2 de la revista La Nacion','140','2020-01-08',3),(11,'Numero de revista 2 de la revista Pronto','120','2020-01-08',4),(12,'Numero de revista 2 de la revista Gente','150','2020-01-08',5),(13,'Numero de revista 2 de la revista UNLAM','160','2020-01-08',6),(15,'Numero de revista 3 de la revista Clarin','250','2020-01-15',1),(16,'Numero de revista 3 de la revista Ole','400','2020-01-15',2),(17,'Numero de revista 3 de la revista La Nacion','100','2020-01-15',3),(18,'Numero de revista 3 de la revista Pronto','140','2020-01-15',4),(19,'Numero de revista 3 de la revista Gente','120','2020-01-15',5),(20,'Numero de revista 3 de la revista UNLAM','150','2020-01-15',6),(21,'Revista asdas','213','2020-01-15',7),(22,'Revista asdx','531','2020-01-15',8),(23,'Revista zmxnz','232','2020-01-15',9),(24,'Revista a sy56y4564','51','2020-01-15',10),(25,'Revista 5665165','23','2020-01-15',11),(26,'Revista czvcew3','665','2020-01-15',12);
/*!40000 ALTER TABLE `nro_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `nro_revista_tiene_notas`
--

LOCK TABLES `nro_revista_tiene_notas` WRITE;
/*!40000 ALTER TABLE `nro_revista_tiene_notas` DISABLE KEYS */;
INSERT INTO `nro_revista_tiene_notas` VALUES (1,1,1),(1,2,1),(1,4,1),(1,5,1),(1,6,1),(1,7,1),(2,1,1),(2,2,1),(2,13,1),(3,1,1),(3,3,1),(3,9,1),(4,11,1),(4,12,1),(5,9,1),(5,11,1),(6,9,1),(6,10,1),(6,13,1),(8,10,1),(9,9,1),(9,10,1),(11,2,1),(13,11,1),(13,12,1),(13,13,1),(16,1,1),(16,12,1),(16,13,1),(17,13,1),(19,11,1),(21,9,1),(21,11,1),(22,9,1),(23,2,1),(23,3,1),(23,13,1),(24,1,1),(24,9,1),(24,11,1),(24,13,1),(25,3,1),(25,11,1),(26,1,1);
/*!40000 ALTER TABLE `nro_revista_tiene_notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `revista`
--

LOCK TABLES `revista` WRITE;
/*!40000 ALTER TABLE `revista` DISABLE KEYS */;
INSERT INTO `revista` VALUES (1,'Clarin','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_clarin.png','1200',5,1),(2,'Ole','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_ole.png','1300',5,1),(3,'La Nacion','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_lanacion.jpg','1400',5,1),(4,'Pronto','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_pronto.jpg','1500',5,1),(5,'Gente','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_gente.png','1600',3,1),(6,'UNLAM','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_unlam.jpg','600',3,1),(7,'El Clasico','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_elclasico.png','1800',3,1),(8,'UBA','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_uba.png','800',3,1),(9,'Telefe','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_telefe.jpg','2000',3,1),(10,'Todo Politica','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_accionPolitica.png','1400',3,1),(11,'Economia Argentina','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_economiaArgentina.png','1400',3,1),(12,'Economia Mundial','Esta es la descripcion de la revista.Esta es la descripcion de la revista','revista_economiaMundial.png','1500',3,1);
/*!40000 ALTER TABLE `revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (1,' General',1),(2,' Deportes',1),(3,' Politica Nacional',1),(4,' Politica Internacional',1),(5,' Economia',1),(6,' Educacion',1),(7,' Espectaculos',1),(8,' Ciencia',1),(9,' Salud',1);
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_pago`
--

LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
INSERT INTO `tipo_pago` VALUES (1,'Débito'),(2,'Tarjeta de crédito'),(3,'Mercado Pago');
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transaccion`
--

LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
INSERT INTO `transaccion` VALUES (1,'200','2020-01-01',1),(2,'300','2020-01-01',2),(3,'400','2020-01-01',3),(4,'500','2020-01-01',1),(5,'600','2020-01-01',2),(6,'700','2020-01-01',3),(7,'300','2020-02-01',1),(8,'200','2020-02-01',1),(9,'300','2020-02-01',1),(10,'100','2020-02-01',1),(11,'200','2020-03-01',1),(12,'300','2020-03-01',2),(13,'100','2020-04-01',3),(14,'1300','2020-07-05',2),(15,'1300','2020-07-13',1),(16,'1200','2020-07-13',3),(17,'120','2020-07-13',2),(18,'120','2020-07-13',1),(19,'140','2020-07-13',1),(20,'160','2020-07-13',1),(21,'250','2020-07-13',1),(22,'150','2020-07-13',1),(23,'100','2020-07-13',1),(24,'150','2020-07-13',1),(25,'1500','2020-07-13',1),(26,'800','2020-07-13',1),(27,'1400','2020-07-13',1),(28,'1800','2020-07-13',1),(29,'1300','2020-07-13',1),(30,'1500','2020-07-13',1),(31,'140','2020-07-13',2),(32,'160','2020-07-13',2),(33,'100','2020-07-13',1),(34,'150','2020-07-13',1),(35,'160','2020-07-13',1),(36,'150','2020-07-13',1),(37,'600','2020-07-13',2),(38,'2000','2020-07-13',2),(39,'1600','2020-07-13',1),(40,'100','2020-07-13',1),(41,'140','2020-07-13',1),(42,'160','2020-07-13',1),(43,'1600','2020-07-13',1),(44,'1500','2020-07-13',1),(45,'1800','2020-07-13',1),(46,'140','2020-07-13',1),(47,'150','2020-07-13',1),(48,'160','2020-07-13',1),(49,'160','2020-07-13',2),(50,'400','2020-07-13',2),(51,'120','2020-07-13',2),(52,'400','2020-07-13',2),(53,'1400','2020-07-13',1),(54,'1200','2020-07-13',1),(55,'1500','2020-07-13',1),(56,'600','2020-07-13',1);
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'AdminJuan','Fort','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','Direccion 1','44443434',1),(2,'ContenidistaJuan','Perez','contenidista@gmail.com','16c1429d2df4d965ecc3bc6169617fff','Direccion 2','44443434',2),(3,'LectorJuan','Gonzalez','lector@gmail.com','dd381a050f1987e7b5c7b73296fd49a5','Direccion 3','44443434',3),(4,'admin','admin','admin','21232f297a57a5a743894a0e4a801fc3','Direccion 4','44443434',1),(5,'contenidista','contenidista','contenidista','16c1429d2df4d965ecc3bc6169617fff','Direccion 5','44443434',2),(6,'lector','lector','lector','dd381a050f1987e7b5c7b73296fd49a5','Direccion 6','44443434',3),(7,'nicoLector','Diaz','e@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','Mi casa','1156031149',3),(8,'lector1','lector1','lector1','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(9,'lector2','lector2','lector2','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(10,'lector3','lector3','lector3','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(11,'lector4','lector4','lector4','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(12,'lector5','lector5','lector5','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(13,'lector6','lector6','lector6','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(14,'lector7','lector7','lector7','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(15,'lector8','lector8','lector8','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(16,'lector9','lector9','lector9','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3),(17,'lector10','lector10','lector10','dd381a050f1987e7b5c7b73296fd49a5','Mi casa','44443434',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_compra_nro_revista`
--

LOCK TABLES `usuario_compra_nro_revista` WRITE;
/*!40000 ALTER TABLE `usuario_compra_nro_revista` DISABLE KEYS */;
INSERT INTO `usuario_compra_nro_revista` VALUES (6,3,1),(3,3,2),(6,1,3),(3,1,4),(3,4,5),(3,8,6),(3,2,7),(3,5,8),(3,6,9),(3,9,11),(3,10,12),(3,11,13),(8,3,17),(9,3,18),(9,2,19),(9,13,20),(9,15,21),(9,20,22),(10,1,23),(10,20,24),(12,10,31),(12,13,32),(12,9,33),(12,20,34),(12,5,35),(13,4,36),(14,1,40),(14,10,41),(14,5,42),(15,10,46),(15,20,47),(15,5,48),(15,13,49),(15,8,50),(15,19,51),(16,8,52);
/*!40000 ALTER TABLE `usuario_compra_nro_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_suscribe_revista`
--

LOCK TABLES `usuario_suscribe_revista` WRITE;
/*!40000 ALTER TABLE `usuario_suscribe_revista` DISABLE KEYS */;
INSERT INTO `usuario_suscribe_revista` VALUES (3,2,'2020-01-01','2020-02-01',2),(6,1,'2020-01-01','2020-02-01',1),(6,2,'2020-01-01','2020-02-01',4),(6,3,'2020-01-01','2020-02-01',3),(7,2,'2020-07-05','2020-08-05',14),(8,1,'2020-07-13','2020-08-13',16),(8,2,'2020-07-13','2020-08-13',15),(10,4,'2020-07-13','2020-08-13',25),(11,2,'2020-07-13','2020-08-13',29),(11,7,'2020-07-13','2020-08-13',28),(11,8,'2020-07-13','2020-08-13',26),(11,10,'2020-07-13','2020-08-13',27),(11,12,'2020-07-13','2020-08-13',30),(13,5,'2020-07-13','2020-08-13',39),(13,6,'2020-07-13','2020-08-13',37),(13,9,'2020-07-13','2020-08-13',38),(14,5,'2020-07-13','2020-08-13',43),(14,7,'2020-07-13','2020-08-13',45),(14,12,'2020-07-13','2020-08-13',44),(16,1,'2020-07-13','2020-08-13',54),(16,4,'2020-07-13','2020-08-13',55),(16,6,'2020-07-13','2020-08-13',56),(16,10,'2020-07-13','2020-08-13',53);
/*!40000 ALTER TABLE `usuario_suscribe_revista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `usuario_tipo`
--

LOCK TABLES `usuario_tipo` WRITE;
/*!40000 ALTER TABLE `usuario_tipo` DISABLE KEYS */;
INSERT INTO `usuario_tipo` VALUES (1,'Administrador'),(2,'Contenidista'),(3,'Lector');
/*!40000 ALTER TABLE `usuario_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `voto`
--

LOCK TABLES `voto` WRITE;
/*!40000 ALTER TABLE `voto` DISABLE KEYS */;
INSERT INTO `voto` VALUES (1,3,1),(1,3,2),(2,3,3),(1,6,1),(1,6,2),(3,6,3),(2,7,3);
/*!40000 ALTER TABLE `voto` ENABLE KEYS */;
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

-- Dump completed on 2020-07-13 15:29:44
