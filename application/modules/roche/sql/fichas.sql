CREATE TABLE IF NOT EXISTS  `roche_usuarios` (
 id int(40) NOT NULL auto_increment,
 name VARCHAR(255) NOT NULL,
 lastname VARCHAR(255) NOT NULL,
 ci VARCHAR(255) NOT NULL,
 phone VARCHAR(255) NOT NULL,
 center VARCHAR(255) NOT NULL,
 PRIMARY KEY (id)
) ENGINE=Innodb DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

ALTER TABLE `roche_usuarios` ADD UNIQUE (`ci`);

CREATE TABLE IF NOT EXISTS `roche_usuarios_ficha` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `roche_usuarios_id` int(40) NOT NULL,
  `date` date NOT NULL,
  `filepath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `roche_usuarios_ficha` CHANGE `date` `fecha_ingreso` DATE NOT NULL 