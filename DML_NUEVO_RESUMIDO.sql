USE pw2;
DELETE FROM pw2.catalogo_agrupa_revistas; 			DELETE FROM pw2.nro_revista_tiene_notas;
DELETE FROM pw2.usuario_compra_nro_revista; 		DELETE FROM pw2.usuario_suscribe_revista;
DELETE FROM pw2.nota;								DELETE FROM pw2.nro_revista;
DELETE FROM pw2.revista; 							DELETE FROM pw2.seccion;
DELETE FROM pw2.transaccion; 						DELETE FROM pw2.tipo_pago;
DELETE FROM pw2.usuario; 							DELETE FROM pw2.usuario_tipo;
DELETE FROM pw2.catalogo;

INSERT INTO `usuario_tipo` VALUES (1,'Administrador'), (2,'Contenidista'), (3,'Lector');
INSERT INTO `tipo_pago` (id,tipo) VALUES (1,'Débito'), (2,'Tarjeta de crédito'), (3,'Mercado Pago');

INSERT INTO `usuario` (id,nombre,apellido,email,`password`,direccion,telefono,usuario_tipo_id) VALUES
(1,'AdminJuan','Fort','admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','Direccion 1',44443434,1),
(2,'ContenidistaJuan','Perez','contenidista@gmail.com','16c1429d2df4d965ecc3bc6169617fff','Direccion 2',44443434,2),
(3,'LectorJuan','Gonzalez','lector@gmail.com','dd381a050f1987e7b5c7b73296fd49a5','Direccion 3',44443434,3),
(4,'admin','admin','admin','21232f297a57a5a743894a0e4a801fc3','Direccion 4',44443434,1),
(5,'contenidista','contenidista','contenidista','16c1429d2df4d965ecc3bc6169617fff','Direccion 5',44443434,2),
(6,'lector','lector','lector','dd381a050f1987e7b5c7b73296fd49a5','Direccion 6',44443434,3);

INSERT INTO pw2.catalogo (id,nombre,imagen_nombre,descripcion) VALUES
(1,'Deportes','catalogo_deportes.jpg','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  deportes Esta es la descripcion del catalogo'),
(2,'Politica','catalogo_politica.png','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  politica Esta es la descripcion del catalogo'),
(3,'Ciencia','catalogo_ciencia.jpg','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de  ciencia Esta es la descripcion del catalogo'),
(4,'Espectaculos','catalogo_espectaculos.jpg','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de espectaculos Esta es la descripcion del catalogo'),
(5,'Economia','catalogo_economia.jpg','Esta es la descripcion del catalogo, por ejemplo la descripcion del catalogo que tiene las revistas de otra cosa Esta es la descripcion del catalogo');

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

INSERT INTO `nota` (id,titulo,cuerpo,ubicacion_nombre,ubicacion_place_id,ubicacion_lat,ubicacion_lng,imagen_nombre,enlace,gratis,aprobada,seccion_id,usuario_id,copete) VALUES
(1,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 1',0,0,0,'imagen_1','enlace_1',0,0,1,1,'copete copete copete copete copete copete'),
(2,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 2',0,0,0,'imagen_2','enlace_2',0,0,2,1,'copete copete copete copete copete copete'),
(3,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 3',0,0,0,'imagen_3','enlace_3',0,0,3,1,'copete copete copete copete copete copete'),
(4,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 4',0,0,0,'imagen_4','enlace_4',0,0,4,1,'copete copete copete copete copete copete'),
(5,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 5',0,0,0,'imagen_5','enlace_5',0,0,5,1,'copete copete copete copete copete copete'),
(6,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 6',0,0,0,'imagen_6','enlace_6',0,0,6,1,'copete copete copete copete copete copete'),
(7,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 7',0,0,0,'imagen_7','enlace_7',0,0,7,1,'copete copete copete copete copete copete'),
(8,'Titulo de una nota de General','Cuerpo de una nota de General','Ubicación 8',0,0,0,'imagen_8','enlace_8',0,0,8,1,'copete copete copete copete copete copete');



INSERT INTO `revista` (id,nombre,precio_suscripcion_mensual,imagen_nombre, descripcion) VALUES
(1,'Clarín',1200,'revista_clarin.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(2,'Olé',1300,'revista_ole.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(3,'La Nación',1400,'revista_lanacion.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(4,'Pronto',1500,'revista_pronto.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(5,'Gente',1600,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(6,'UNLAM',600,'revista_unlam.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(7,'El Clasico',1800,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(8,'UBA',800,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(9,'Telefe',2000,'revista_telefe.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(10,'Todo Politica',1400,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(11,'Economia Argentina',1400,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(12,'Economia Mundial',1500,null,'Esta es la descripcion de la revista.Esta es la descripcion de la revista');

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

