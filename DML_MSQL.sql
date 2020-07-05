USE pw2;
DELETE FROM pw2.voto;
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

INSERT INTO `seccion` (id,nombre,aprobada) VALUES
(1,' General',1),
(2,' Deportes',1),
(3,' Política Nacional',1),
(4,' Política Internacional',1),
(5,' Economía',1),
(6,' Educación',1),
(7,' Espectaculos',1),
(8,' Ciencia',1),
(9,' Salud',1);

INSERT INTO `nota` (id, gratis, aprobada, seccion_id, usuario_id,titulo, ubicacion_place_id, ubicacion_lat, ubicacion_lng, cuerpo, ubicacion_nombre, imagen_nombre, enlace, copete) VALUES
(1,0,1,1,5,'Titulo de una nota de General 1',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 1','nota_1.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(2,0,1,2,5,'Titulo de una nota de General 2',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 2','nota_2.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(3,0,1,3,5,'Titulo de una nota de General 3',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 3','nota_3.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(4,0,1,4,1,'Titulo de una nota de General 4',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 4','nota_4.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(5,0,1,5,1,'Titulo de una nota de General 5',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 5','nota_5.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(6,0,1,6,1,'Titulo de una nota de General 6',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 6','nota_6.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(7,0,null,7,1,'Titulo de una nota de General 7',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 7','nota_7.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota'),
(8,0,null,8,1,'Titulo de una nota de General 8',0,0,0,'Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General Cuerpo de una nota de General','Ubicación 8','nota_8.jpg','https://www.minutouno.com/','Este este es es el el copete copete de de la la nota nota');


INSERT INTO `revista` (id, aprobada, usuario_id,precio_suscripcion_mensual, nombre, imagen_nombre, descripcion) VALUES
(1,1,5,1200,'Clarín','revista_clarin.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(2,1,5,1300,'Olé','revista_ole.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(3,1,5,1400,'La Nación','revista_lanacion.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(4,1,5,1500,'Pronto','revista_pronto.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(5,1,3,1600,'Gente','revista_gente.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(6,1,3,600,'UNLAM','revista_unlam.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(7,1,3,1800,'El Clasico','revista_elclasico.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(8,1,3,800,'UBA','revista_uba.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(9,1,3,2000,'Telefe','revista_telefe.jpg','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(10,1,3,1400,'Todo Politica','revista_accionPolitica.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(11,1,3,1400,'Economia Argentina','revista_economiaArgentina.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista'),
(12,1,3,1500,'Economia Mundial','revista_economiaMundial.png','Esta es la descripcion de la revista.Esta es la descripcion de la revista');

INSERT INTO `nro_revista` (id,nombre,precio,fecha_publicacion,revista_id) VALUES
(1,'Publicación 1 de la revista Clarín',100,'2020-01-01',1),
(2,'Publicación 1 de la revista Olé',140,'2020-01-01',2),
(3,'Publicación 1 de la revista La Nación',120,'2020-01-01',3),
(4,'Publicación 1 de la revista Pronto',150,'2020-01-01',4),
(5,'Publicación 1 de la revista Gente',160,'2020-01-01',5),
(6,'Publicación 1 de la revista UNLAM',70,'2020-01-01',6),
(8,'Publicación 2 de la revista Clarín',400,'2020-01-08',1),
(9,'Publicación 2 de la revista Olé',100,'2020-01-08',2),
(10,'Publicación 2 de la revista La Nación',140,'2020-01-08',3),
(11,'Publicación 2 de la revista Pronto',120,'2020-01-08',4),
(12,'Publicación 2 de la revista Gente',150,'2020-01-08',5),
(13,'Publicación 2 de la revista UNLAM',160,'2020-01-08',6),
(15,'Publicación 3 de la revista Clarín',250,'2020-01-15',1),
(16,'Publicación 3 de la revista Olé',400,'2020-01-15',2),
(17,'Publicación 3 de la revista La Nación',100,'2020-01-15',3),
(18,'Publicación 3 de la revista Pronto',140,'2020-01-15',4),
(19,'Publicación 3 de la revista Gente',120,'2020-01-15',5),
(20,'Publicación 3 de la revista UNLAM',150,'2020-01-15',6),
(21,'Publicación 1 de la revista Economica Argentina',120,'2020-01-15',11),
(22,'Publicación 2 de la revista Economica Argentina',150,'2020-02-15',11);


INSERT INTO `nro_revista_tiene_notas` (nro_revista_id, nota_id, aprobada) VALUES
(1,1,1),
(2,2,1),
(3,3,1),
(1,2,1),
(1,4,1),
(1,5,1),
(1,6,null),
(1,7,null);

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

INSERT INTO `catalogo_agrupa_revistas` (catalogo_id, revista_id) VALUES
(1,7),
(1,2),
(2,3),
(2,4),
(4,5),
(2,6),
(2,8),
(4,9),
(2,10),
(5,11),
(5,12);

INSERT INTO `voto` (puntaje, usuario_id, nota_id) VALUES
(1,1,1),
(1,1,2),
(2,1,3),
(1,3,2),
(1,3,3),
(1,4,1),
(1,4,2),
(1,4,3),
(1,4,4);
