CREATE TABLE IF NOT EXISTS `publicacion` (
  `id` int(40) NOT NULL AUTO_INCREMENT,
  `description` text,
  `ordinal` int(11) DEFAULT '0',
  `tipo` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `publicacion` ADD `letter` VARCHAR( 2 ) NOT NULL DEFAULT '';