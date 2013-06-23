DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE IF NOT EXISTS `proyectos` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `tipo_de_trabajo` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `orden` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_categoria` (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- Dependencia a categorias

ALTER TABLE `proyectos` ADD CONSTRAINT `fk_proyectos_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;