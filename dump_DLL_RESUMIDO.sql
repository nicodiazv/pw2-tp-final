DROP DATABASE IF EXISTS pw2;
CREATE DATABASE pw2;
USE pw2;

CREATE TABLE `catalogo` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `usuario_tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`usuario_tipo_id`) REFERENCES `usuario_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `revista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio_suscripcion_mensual` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nro_revista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `fecha_publicacion` varchar(45) DEFAULT NULL,
  `revista_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`revista_id`),
  FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `nota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `imagen_nombre` varchar(45) DEFAULT NULL,
  `gratis` tinyint(4) DEFAULT NULL,
  `cuerpo` text NOT NULL,
  `seccion_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`seccion_id`),
  FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;


CREATE TABLE `nro_revista_tiene_notas` (
  `nro_revista_id` int(11) NOT NULL,
  `nota_id` int(11) NOT NULL,
  `nota_seccion_id` int(11) NOT NULL,
  PRIMARY KEY (`nro_revista_id`,`nota_id`,`nota_seccion_id`),
  FOREIGN KEY (`nota_id`, `nota_seccion_id`) REFERENCES `nota` (`id`, `seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `transaccion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `importe_total` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `tipo_pago_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`tipo_pago_id`) REFERENCES `tipo_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `usuario_compra_nro_revista` (
  `usuario_id` int(11) NOT NULL,
  `nro_revista_id` int(11) NOT NULL,
  `transaccion_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`nro_revista_id`,`transaccion_id`),
  FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario_suscribe_revista` (
  `usuario_id` int(11) NOT NULL,
  `revista_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `transaccion_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`revista_id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `catalogo_agrupa_revistas` (
  `catalogo_id` int(11) NOT NULL,
  `revista_id` int(11) NOT NULL,
  PRIMARY KEY (`catalogo_id`,`revista_id`),
  FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
