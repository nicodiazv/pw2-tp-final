DELETE FROM pw2.catalogo_agrupa_revistas; 			DELETE FROM pw2.nro_revista_tiene_notas;
DELETE FROM pw2.usuario_compra_nro_revista; 		DELETE FROM pw2.usuario_suscribe_revista;
DELETE FROM pw2.nota;								DELETE FROM pw2.nro_revista;
DELETE FROM pw2.revista; 							DELETE FROM pw2.seccion;
DELETE FROM pw2.transaccion; 						DELETE FROM pw2.tipo_pago;
DELETE FROM pw2.usuario; 							DELETE FROM pw2.usuario_tipo;
DELETE FROM pw2.catalogo;

INSERT INTO `usuario_tipo` VALUES
(1,'Administrador'),
(2,'Contenidista'),
(3,'Lector');

INSERT INTO `usuario` (id,nombre,apellido,email,`password`,direccion,telefono,usuario_tipo_id) VALUES
(1,'AdminJuan','Fort','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','Direccion 1',44443434,1),
(2,'ContenidistaJuan','Perez','contenidista@gmail.com','16c1429d2df4d965ecc3bc6169617fff','Direccion 2',44443434,2),
(3,'LectorJuan','Gonzalez','lector@gmail.com','dd381a050f1987e7b5c7b73296fd49a5','Direccion 3',44443434,3),
(4,'admin','admin','admin','21232f297a57a5a743894a0e4a801fc3','Direccion 4',44443434,1),
(5,'contenidista','contenidista','contenidista','16c1429d2df4d965ecc3bc6169617fff','Direccion 5',44443434,2),
(6,'lector','lector','lector','dd381a050f1987e7b5c7b73296fd49a5','Direccion 6',44443434,3);

INSERT INTO pw2.catalogo (id,nombre,descripcion) VALUES
(1,'Deportes','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  deportes Esta es la descripcion del catalogo'),
(2,'Politica','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  politica Esta es la descripcion del catalogo'),
(3,'Ciencia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  ciencia Esta es la descripcion del catalogo'),
(4,'Espectaculos','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de espectaculos Esta es la descripcion del catalogo'),
(5,'Economia','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de otra cosa Esta es la descripcion del catalogo');

INSERT INTO `seccion` VALUES
(1,' General'),
(2,' Deportes'),
(3,' Política Nacional'),
(4,' Política Internacional'),
(5,' Economía'),
(6,' Educación'),
(7,' Espectaculos'),
(8,' Ciencia'),
(9,' Salud');

INSERT INTO `nota` (id,titulo,cuerpo,ubicacion,imagen_nombre,gratis,seccion_id,usuario_id) VALUES
(1,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 1','imagen_1',0,1,1),
(2,'Titulo de una nota de Deportes','Cuerpo de una nota de Deportes','Ubicación 2','imagen_2',0,2,1),
(3,'Titulo de una nota de Política Nacional','Cuerpo de una nota de Política Nacional','Ubicación 3','imagen_3',0,3,1),
(4,'Titulo de una nota de Política Internacional','Cuerpo de una nota de Política Internacional','Ubicación 4','imagen_4',0,4,1),
(5,'Titulo de una nota de Economía','Cuerpo de una nota de Economía','Ubicación 5','imagen_5',0,5,1),
(6,'Titulo de una nota de Educación','Cuerpo de una nota de Educación','Ubicación 6','imagen_6',0,6,1),
(7,'Titulo de una nota de Espectáculos','Cuerpo de una nota de Espectáulos','Ubicación 7','imagen_7',0,7,1),
(8,'Titulo de una nota de Ciencia','Cuerpo de una nota de Ciencia','Ubicación 8','imagen_8',0,8,2),
(9,'Titulo de una nota de Salud','Cuerpo de una nota de Salud','Ubicación 9','imagen_9',0,9,2),
(10,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 10','imagen_10',1,1,2),
(11,'Titulo de una nota de Deportes','Cuerpo de una nota de Deportes','Ubicación 11','imagen_11',1,2,2),
(12,'Titulo de una nota de Política Nacional','Cuerpo de una nota de Política Nacional','Ubicación 12','imagen_12',1,3,2),
(13,'Titulo de una nota de Política Internacional','Cuerpo de una nota de Política Internacional','Ubicación 13','imagen_13',1,4,3),
(14,'Titulo de una nota de Economía','Cuerpo de una nota de Economía','Ubicación 14','imagen_14',1,5,3),
(15,'Titulo de una nota de Educación','Cuerpo de una nota de Educación','Ubicación 15','imagen_15',1,6,3),
(16,'Titulo de una nota de Espectaculos','Cuerpo de una nota de Espectaculos','Ubicación 16','imagen_16',1,7,3),
(17,'Titulo de una nota de Ciencia','Cuerpo de una nota de Ciencia','Ubicación 17','imagen_17',1,8,3),
(18,'Titulo de una nota de Salud','Cuerpo de una nota de Salud','Ubicación 18','imagen_18',1,9,3);

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

INSERT INTO `nro_revista` (id,nombre,precio,fecha_publicacion,revista_id) VALUES
(1,'Numero de revista 1 de la revista Clarín',100,'2020-01-01',1),
(2,'Numero de revista 1 de la revista Olé',140,'2020-01-01',2),
(3,'Numero de revista 1 de la revista La Nación',120,'2020-01-01',3),
(4,'Numero de revista 1 de la revista Pronto',150,'2020-01-01',4),
(5,'Numero de revista 1 de la revista Gente',160,'2020-01-01',5),
(6,'Numero de revista 1 de la revista UNLAM',70,'2020-01-01',6),
(7,'Numero de revista 1 de la revista Paparazzi',250,'2020-01-01',7),
(8,'Numero de revista 2 de la revista Clarín',400,'2020-01-08',1),
(9,'Numero de revista 2 de la revista Olé',100,'2020-01-08',2),
(10,'Numero de revista 2 de la revista La Nación',140,'2020-01-08',3),
(11,'Numero de revista 2 de la revista Pronto',120,'2020-01-08',4),
(12,'Numero de revista 2 de la revista Gente',150,'2020-01-08',5),
(13,'Numero de revista 2 de la revista UNLAM',160,'2020-01-08',6),
(14,'Numero de revista 3 de la revista Paparazzi',70,'2020-01-08',7),
(15,'Numero de revista 3 de la revista Clarín',250,'2020-01-15',1),
(16,'Numero de revista 3 de la revista Olé',400,'2020-01-15',2),
(17,'Numero de revista 3 de la revista La Nación',100,'2020-01-15',3),
(18,'Numero de revista 3 de la revista Pronto',140,'2020-01-15',4),
(19,'Numero de revista 3 de la revista Gente',120,'2020-01-15',5),
(20,'Numero de revista 3 de la revista UNLAM',150,'2020-01-15',6),
(21,'Numero de revista 3 de la revista Paparazzi',160,'2020-01-15',7);

INSERT INTO `tipo_pago` (id,tipo) VALUES
(1,'Débito'),
(2,'Tarjeta de crédito'),
(3,'Mercado Pago');


INSERT INTO `nro_revista_tiene_notas` (nro_revista_id, nota_id, nota_seccion_id) VALUES
(1,1,1),
(2,2,2),
(3,3,3);

INSERT INTO `transaccion` (id, importe_total, fecha, tipo_pago_id) VALUES
(1,200,'2020-01-01',1),
(2,300,'2020-01-01',2),
(3,400,'2020-01-01',3),
(4,500,'2020-01-01',1),
(5,600,'2020-01-01',2),
(6,700,'2020-01-01',3);

INSERT INTO `usuario_compra_nro_revista` (usuario_id, nro_revista_id, transaccion_id) VALUES
(1,3,1),
(2,3,2),
(1,1,3);

INSERT INTO `usuario_suscribe_revista` (usuario_id, revista_id, transaccion_id, fecha_inicio, fecha_fin) VALUES
(1,1,1,'2020-01-01','2020-02-01'),
(1,2,2,'2020-01-01','2020-02-01'),
(1,3,3,'2020-01-01','2020-02-01');

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