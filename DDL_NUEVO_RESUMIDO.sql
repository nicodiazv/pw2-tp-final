DROP DATABASE IF EXISTS pw2;
CREATE DATABASE pw2;
USE pw2;

CREATE TABLE `catalogo` (
  `id` INT(30) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `descripcion` VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario_tipo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `apellido` VARCHAR(45) DEFAULT NULL,
  `email` VARCHAR(45) DEFAULT NULL,
  `password` VARCHAR(100) DEFAULT NULL,
  `direccion` VARCHAR(45) DEFAULT NULL,
  `telefono` VARCHAR(45) DEFAULT NULL,
  `usuario_tipo_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`usuario_tipo_id`) REFERENCES `usuario_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE `seccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `revista` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `precio_suscripcion_mensual` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nro_revista` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) DEFAULT NULL,
  `precio` VARCHAR(45) DEFAULT NULL,
  `fecha_publicacion` VARCHAR(45) DEFAULT NULL,
  `revista_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nota` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `ubicacion` VARCHAR(45) NOT NULL,
  `imagen_nombre` VARCHAR(45) DEFAULT NULL,
  `gratis` TINYINT(4) DEFAULT NULL,
  `cuerpo` TEXT NOT NULL,
  `seccion_id` INT(11) NOT NULL,
  `usuario_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`,`seccion_id`),
  FOREIGN KEY (`seccion_id`) REFERENCES `seccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nro_revista_tiene_notas` (
  `nro_revista_id` INT(11) NOT NULL,
  `nota_id` INT(11) NOT NULL,
  `nota_seccion_id` INT(11) NOT NULL,
  PRIMARY KEY (`nro_revista_id`,`nota_id`),
  FOREIGN KEY (`nota_id`, `nota_seccion_id`) REFERENCES `nota` (`id`, `seccion_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tipo_pago` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `transaccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `importe_total` VARCHAR(45) DEFAULT NULL,
  `fecha` VARCHAR(45) DEFAULT NULL,
  `tipo_pago_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`tipo_pago_id`) REFERENCES `tipo_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario_compra_nro_revista` (
  `usuario_id` INT(11) NOT NULL,
  `nro_revista_id` INT(11) NOT NULL,
  `transaccion_id` INT(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`nro_revista_id`),
  FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`nro_revista_id`) REFERENCES `nro_revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuario_suscribe_revista` (
  `usuario_id` INT(11) NOT NULL,
  `revista_id` INT(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `transaccion_id` INT(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`revista_id`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`transaccion_id`) REFERENCES `transaccion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `catalogo_agrupa_revistas` (
  `catalogo_id` INT(11) NOT NULL,
  `revista_id` INT(11) NOT NULL,
  PRIMARY KEY (`catalogo_id`,`revista_id`),
  FOREIGN KEY (`catalogo_id`) REFERENCES `catalogo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  FOREIGN KEY (`revista_id`) REFERENCES `revista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;