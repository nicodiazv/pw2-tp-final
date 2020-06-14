DELETE FROM pw2.catalogo_agrupa_revistas;
DELETE FROM pw2.nro_revista_tiene_notas;
DELETE FROM pw2.usuario_compra_nro_revista;
DELETE FROM pw2.usuario_suscribe_revista;
DELETE FROM pw2.nota;
DELETE FROM pw2.nro_revista;
DELETE FROM pw2.revista;
DELETE FROM pw2.seccion;
DELETE FROM pw2.tipo_pago;
DELETE FROM pw2.transaccion;
DELETE FROM pw2.usuario;
DELETE FROM pw2.usuario_tipo;
DELETE FROM pw2.catalogo;

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

-- Dumping data for table `catalogo`--
LOCK TABLES `catalogo` WRITE;
/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO pw2.catalogo (id,nombre,descripcion) VALUES
(1,'Deportes','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  deportes Esta es la descripcion del catalogo'),
(2,'Politica','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  politica Esta es la descripcion del catalogo'),
(3,'Ciencia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  ciencia Esta es la descripcion del catalogo'),
(4,'Espectaculos','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de espectaculos Esta es la descripcion del catalogo'),
(5,'Economia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de otra cosa Esta es la descripcion del catalogo');
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;
UNLOCK TABLES;





-- Dumping data for table `nota` --
LOCK TABLES `nota` WRITE;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
INSERT INTO `nota` VALUES
(1,'Aumenta el dolar','Argentina',NULL,NULL,3,'aumenta todo!!!',1),
(2,'titulliiiasid','asdasdxcc',NULL,NULL,4,'dhiopjfsilgjsdilfjaeorun05u0293',1),
(3,'asdasd','asdasdas',NULL,NULL,3,'asdasdasd',1),
(4,'asdasdaaz','asdasdaszz',NULL,NULL,3,'asdasdasd',1),
(5,'asdasdaaz','asdasdaszz',NULL,NULL,3,'asdasdasd',1),
(6,'asdas','asdasa',NULL,NULL,3,'sdasdsa',1),
(7,'asdsad','saasdasa',NULL,NULL,1,'asassadasd',1),
(8,'Messi quiere usar la 15','Barcelona',NULL,NULL,1,'Parece de locos pero el capitan de Barcelona no quiere usar mas la 10 y pidiÃ³ usar la 15',1),
(9,'adasd','aasdaasd',NULL,NULL,1,'asasdsadassasasdsadas',1),
(10,'fdgdfgfd','fdgfd',NULL,NULL,1,'fdfdf',1),
(11,'asdsad','asdasd',NULL,NULL,2,'asasdasd',1),
(12,'56465g4','asdasd',NULL,NULL,1,'sadsadad',1),
(13,'asdasdasd','asdsaasd',NULL,NULL,2,'asdassadasd',1),
(14,'asdasd','asdasdsadsad',NULL,NULL,2,'asdasdasdasd',1),
(15,'asdasdas','asdasdas',NULL,NULL,2,'dasdasd',1),
(16,'adsadas','asdasdasdasa',NULL,NULL,3,'czxveaasddsbfdaasdasd',1),
(17,'asdsadasd','asdasdassdfgdsf',NULL,NULL,2,'gfsgfdgdfgdf',1),
(18,'asdas','asdasdas',NULL,NULL,2,'asdasd',1),
(19,'sdfsdf','sdfsdf',NULL,NULL,2,'',1);
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `nro_revista` --
LOCK TABLES `nro_revista` WRITE;
/*!40000 ALTER TABLE `nro_revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `nro_revista` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `nro_revista_tiene_notas` --
LOCK TABLES `nro_revista_tiene_notas` WRITE;
/*!40000 ALTER TABLE `nro_revista_tiene_notas` DISABLE KEYS */;
/*!40000 ALTER TABLE `nro_revista_tiene_notas` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `revista` --
LOCK TABLES `revista` WRITE;
/*!40000 ALTER TABLE `revista` DISABLE KEYS */;
INSERT INTO `revista` (id,nombre,precio_suscripcion_mensual) VALUES
(1,'Clarín',1200),
(2,'Olé',1300),
(3,'La Nación',1400),
(4,'Pronto',1500),
(5,'Gente',1600),
(6,'UNLAM',600),
(7,'El Clasico',1800),
(8,'UBA',800),
(9,'Telefe',2000),
(10,'Todo Politica',1400),
(11,'Economia Argentina',1400),
(12,'Economia Mundial',1500);

/*!40000 ALTER TABLE `revista` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `seccion` --
LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES
(1,'Deporte'),
(2,'Espectaculos'),
(3,'Economia'),
(4,'Politica');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;


-- Dumping data for table `tipo_pago` --
LOCK TABLES `tipo_pago` WRITE;
/*!40000 ALTER TABLE `tipo_pago` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pago` ENABLE KEYS */;
UNLOCK TABLES;


-- Dumping data for table `transaccion` --
LOCK TABLES `transaccion` WRITE;
/*!40000 ALTER TABLE `transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `usuario` --
LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (nombre,apellido,email,password,direccion,telefono,usuario_tipo_id) VALUES
('AdminJuan','Fort','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',NULL,NULL,1),
('ContenidistaJuan','Perez','contenidista@gmail.com','16c1429d2df4d965ecc3bc6169617fff',NULL,NULL,2),
('LectorJuan','Gonzalez','lector@gmail.com','dd381a050f1987e7b5c7b73296fd49a5',NULL,NULL,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `usuario_compra_nro_revista` --
LOCK TABLES `usuario_compra_nro_revista` WRITE;
/*!40000 ALTER TABLE `usuario_compra_nro_revista` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_compra_nro_revista` ENABLE KEYS */;
UNLOCK TABLES;



-- Dumping data for table `usuario_suscribe_revista` --
LOCK TABLES `usuario_suscribe_revista` WRITE;
/*!40000 ALTER TABLE `usuario_suscribe_revista` DISABLE KEYS */;
INSERT INTO `usuario_suscribe_revista` VALUES
(1,1,1,1,'2020-01-01','2020-02-01'),
(1,1,2,2,'2020-01-01','2020-02-01'),
(1,1,3,3,'2020-01-01','2020-02-01');
/*!40000 ALTER TABLE `usuario_suscribe_revista` ENABLE KEYS */;
UNLOCK TABLES;

-- Dumping data for table `catalogo_agrupa_revistas` --
LOCK TABLES `catalogo_agrupa_revistas` WRITE;
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` DISABLE KEYS */;
INSERT INTO `catalogo_agrupa_revistas` VALUES
(1,1),
(1,2),
(2,3),
(2,4),
(4,5),
(2,6),
(1,7),
(2,8),
(4,9),
(2,10),
(5,11),
(5,12);
/*!40000 ALTER TABLE `catalogo_agrupa_revistas` ENABLE KEYS */;
UNLOCK TABLES;

-- Dumping data for table `usuario_tipo` --
LOCK TABLES `usuario_tipo` WRITE;
/*!40000 ALTER TABLE `usuario_tipo` DISABLE KEYS */;
INSERT INTO `usuario_tipo` VALUES
(1,'Administrador'),
(2,'Contenidista'),
(3,'Lector');
/*!40000 ALTER TABLE `usuario_tipo` ENABLE KEYS */;
UNLOCK TABLES;