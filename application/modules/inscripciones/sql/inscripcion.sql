CREATE TABLE IF NOT EXISTS  `inscripcion` (
 id int(40) NOT NULL auto_increment,
 name VARCHAR(255) NOT NULL,
 document VARCHAR(255) NOT NULL,
 birthdate VARCHAR(255) NOT NULL,
 country VARCHAR(255) NOT NULL,
 nacionality VARCHAR(255) NOT NULL,
 title VARCHAR(255) NOT NULL,
 mail VARCHAR(255) NOT NULL,
 institution VARCHAR(255) NOT NULL,
 address VARCHAR(255) NOT NULL,
 phone VARCHAR(255) NOT NULL,
 emailinstitucion VARCHAR(255) NOT NULL,
 postnumber VARCHAR(255) NOT NULL,
 countryinstitution VARCHAR(255) NOT NULL,
 website VARCHAR(255) NOT NULL,
 position VARCHAR(255) NOT NULL,
 investigation VARCHAR(255) NOT NULL,
 cvuy VARCHAR(255) NOT NULL,
 comments TEXT NOT NULL,
 PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `inscripcionarchivo`;
CREATE TABLE IF NOT EXISTS `inscripcionarchivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inscripcion_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inscripcion_id` (`inscripcion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `inscripcionarchivo`
  ADD CONSTRAINT `fk_inscripcion_archivo` FOREIGN KEY (`inscripcion_id`) REFERENCES `inscripcion` (`id`);